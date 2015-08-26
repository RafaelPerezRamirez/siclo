<?php

class PagoFacil{
	public $request_url;
	public $data;
	
	private $idSucursal;
	private $idUsuario;
	private $monto;
	private $divisa;
	
	public $mensajes;
	public $idPedido;
	private $test;
	private $comprador;
	private $clases;
	
	function __construct( $data = false ){
		$this->test = true;
		
		$this->data = $data ? $data : array();
		
		$this->idSucursal = 'b9e967458d61f71d0539273431df4ddc798bd94e';
		$this->idUsuario = '41fe7a2ec2f39b03061f678c3ef1bd43aea991b4';
		$this->divisa = 'MXN';
		$this->mensajes = new Mensajes; 
		
		if( $this->test ){
			$this->request_url = 'https://www.pagofacil.net/st/public/Wsrtransaccion/index/format/json/?method=transaccion';
		}else{
			$this->request_url = 'https://www.pagofacil.net/ws/public/Wsrtransaccion/index/format/json/?method=transaccion';
		};
	}
	public function set_monto( $data = false ){
		if( $data === false ){ return; };
		$this->paquete	= $data->data['ID'];
		
		$this->monto	= (float)$data->data['precio'];
	}
	public function set_clases( $clases = false ){
		if( $clases === false ){ return; };
		$this->clases = (int)$clases;
	}
	
	public function set_comprador( $comprador = false ){
		if( $comprador === false ){ return; };
		$this->comprador = $comprador;
	}
	public function set_facturacion( $data = false ){
		if( $data === false ){ return; };
		
		foreach( $data as $d ){
			$this->data[$d[0]] = $d[1];
		};
	}
	public function set_tarjeta( $data = false ){
		if( $data === false ){ return; };
		foreach( $data as $k => $v ){
			$this->data[$k] = $v;
		};
	}
	public function procesar_compra( $invitado = false ){
		/*COMPROBACION Y FINALIZACION DE COMPRA*/
		if( $this->validate_fields() ){
			$this->process_payment( $invitado );
		};
	}
	
	public function validate_fields(){
		$ok = true;
		if( $this->test ){
			return $ok;
		};
		if (!$this->isCreditCardNumber( $this->data['numeroTarjeta'] )){
			$ok = false;
			$this->mensajes->add_error( 'Por favor, escriba un numero de tarjeta válido' );
		};

		if (!$this->isCorrectExpireDate($this->data['mesExpiracion'], $this->data['anyoExpiracion'])){
			$ok = false;
			$this->mensajes->add_error( 'La fecha de expiración de la tarjeta es inválida' );
		};
		if (!$this->data['cvt']){
			$ok = false;
			$this->mensajes->add_error( 'Por favor, escriba un código de seguridad. ' );
		};
		return $ok;
	}
	public function process_payment( $invitado = false ) {
		$transaction = array(
			'idServicio'        => urlencode('3'),
			'idSucursal'        => urlencode($this->idSucursal),
			'idUsuario'         => urlencode($this->idUsuario),
			'nombre'            => urlencode($this->data['nombre']),
			'apellidos'         => urlencode($this->data['apellidos']),
			'numeroTarjeta'     => urlencode($this->data['numeroTarjeta']),
			'cvt'               => urlencode($this->data['cvt']),
			'cp'                => urlencode($this->data['cp']),
			'mesExpiracion'     => urlencode($this->data['mesExpiracion']),
			'anyoExpiracion'    => urlencode($this->data['anyoExpiracion']),
			'monto'             => urlencode($this->monto),//formato 1000.00
			'email'             => urlencode($this->data['email']),
			'telefono'          => urlencode($this->data['telefono']), // son 10 digitos
			'celular'           => urlencode($this->data['telefono']), // son 10 digitos
			'calleyNumero'      => urlencode($this->data['calleyNumero']),
			'colonia'           => urlencode($this->data['colonia']),
			'municipio'         => urlencode($this->data['colonia']),
			'estado'            => urlencode($this->data['estado']),
			'pais'              => urlencode($this->data['pais']),
			'param1'            => '',
			'param2'            => '',
			'param3'            => '',
			'param4'            => '',
			'param5'            => '',
			'ip'                => urlencode($this->getIpBuyer()),
			'httpUserAgent'     => urlencode($_SERVER['HTTP_USER_AGENT']),
			'divisa'			=> urlencode( $this->divisa ),
		);
		
		//CREAR PEDIDO
		
		$args = array(
			'post_title'	=> "",
			'post_status'	=> 'pending',
			'post_type'		=> 'pedido',
			'post_author'	=> $this->comprador,
		);
		
		$idPedido = wp_insert_post( $args );
		
		if($idPedido){
			$this->idPedido = $idPedido;
			update_post_meta($idPedido, 'transaccion', $transaction);
			update_post_meta($idPedido, '_paquete', $this->paquete);
		}else{
			$this->mensajes->add_error( 'No se ha podido finalizar la transaccion.' );
			return;
		};
		
							
		$transaccion['idPedido'] = urlencode($idPedido);
		
		$data='';
		
		foreach ($transaction as $key => $value){
			$data.="&data[$key]=$value";
		}
		//echo( '<a href="'.$this->request_url.$data.'">link</a>' );
		
		$response = wp_remote_post( 
			$this->request_url.$data, 
			array(
				'method' => 'POST',
				'timeout' => 120,
				'httpversion' => '1.0',
				'sslverify' => false
			)
		);
		
		if (  !is_wp_error($response) && $response['response']['code'] >= 200 && $response['response']['code'] < 300  ) { 
			
			$response = json_decode($response['body'],true);
			update_post_meta($idPedido, 'respuesta_transaccion', $response);
			
			$response = $response['WebServices_Transacciones']['transaccion'];
			
			
			if( $this->test ||  ( $response["autorizado"] == "1" && strtolower($response['status']) == 'success' ) ) {
				/*TODO OK :) CREAR CUENTA Y HABILITAR USUARIO*/
				
				$this->finalizar_compra( $invitado );
			}else{
				if(isset($response['texto'])){
					/*IMPRIMIMOS QUÉ ERROR TIRAR*/
					$this->mensajes->add_error( sprintf( 'Transacciónn fallida %s : %s', $response['texto'], $response['pf_message'] ) );
					
					foreach( $response['error'] as $k => $v ){
						$this->mensajes->add_error( $v );
					}
				}else{
					/*ERROR DESCONOCIDO*/
					$this->mensajes->add_error( 'Ha ocurrido un error desconocido en la transacción' );
				}

			}
			
		}else{
			/*ERROR DESCONOCIDO*/
			$this->mensajes->add_error( 'Ha ocurrido un error desconocido en la transacción' );
		}
	}
	private function getIpBuyer()
	{
		if(isset($_SERVER["HTTP_CLIENT_IP"]))
		{
			if (!empty($_SERVER["HTTP_CLIENT_IP"]))
			{
				if (strtolower($_SERVER["HTTP_CLIENT_IP"]) != "unknown")
				{
					return $_SERVER["HTTP_CLIENT_IP"];
				}
			}
		}
		
		if(isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
		{
			if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
			{
				if (strtolower($_SERVER["HTTP_X_FORWARDED_FOR"]) != "unknown")
				{
					return $_SERVER["HTTP_X_FORWARDED_FOR"];
				}
			}
		}
		
		return $_SERVER['REMOTE_ADDR'];
		
	}
	private function isCreditCardNumber($toCheck)
	{
		if (!is_numeric($toCheck))
			return false;

		$number = preg_replace('/[^0-9]+/', '', $toCheck);
		$strlen = strlen($number);
		$sum    = 0;

		if ($strlen < 13)
			return false;

		for ($i=0; $i < $strlen; $i++)
		{
			$digit = substr($number, $strlen - $i - 1, 1);
			if($i % 2 == 1)
			{
				$sub_total = $digit * 2;
				if($sub_total > 9)
				{
					$sub_total = 1 + ($sub_total - 10);
				}
			}
			else
			{
				$sub_total = $digit;
			}
			$sum += $sub_total;
		}

		if ($sum > 0 AND $sum % 10 == 0)
			return true;

		return false;
	}
	
	private function isCorrectExpireDate($month, $year)
	{
		$now       = time();
		$result    = false;
		$thisYear  = (int)date('y', $now);
		$thisMonth = (int)date('m', $now);

		if (is_numeric($year) && is_numeric($month))
		{
			if($thisYear == (int)$year)
			{
				$result = (int)$month >= $thisMonth;
			}			
			else if($thisYear < (int)$year)
			{
				$result = true;
			}
		}

		return $result;
	}
	
	private function finalizar_compra( $invitado = false ){
		if( !$invitado ){
			/*CUANDO TIENES UN INVITADO NO HAY QUE SUMAR CLASES*/
			sumar_clases( $this->comprador, $this->clases );
		};
		actualizar_status( $this->idPedido, 'publish' );
	}
	public function formulario( $tarjeta = false , $texto_boton = false ){
		global $current_user;
		
		$clases = array( 'guardar_datos_facturacion','boton','a_claro' );
		$clase_facturacion = array( 'datos_usuario_facturacion' );
		
		echo '<form class="ch-pay" method="post" name="transaccionWF" enctype="application/x-www- form-urlencoded" />';
			
			if( $tarjeta ){
				$clases[] = 'finalizar_compra_ya';
				unset( $clases[0] );
				
				$clase_facturacion[] = 'escondido';
				$inputs_user = array(
					'numeroTarjeta'	=> array(
						'type'			=> 'number',
						'value'			=> '1234123412341234',
						'placeholder'	=> 'Número de la tarjeta',
						'largo'			=> 16,
					),
					'cvt'	=> array(
						'type'			=> 'number',
						'value'			=> '123',
						'placeholder'	=> 'Cvv',
						'largo'			=> 3,
					),
					'mesExpiracion'	=> array(
						'type'			=> 'number',
						'value'			=> '12',
						'placeholder'	=> 'MM',
						'largo'			=> 2,
					),
					'anyoExpiracion'	=> array(
						'type'			=> 'number',
						'value'			=> '19',
						'placeholder'	=> 'YY',
						'largo'			=> 2,
					),
				);
				echo '<div class="data_tarjeta">';
					print_inputs( $inputs_user );
				echo '</div>';
			};
			$facturacion_user = is_user_logged_in() ? get_user_meta( $current_user->ID,'_facturacion', true ) : false;
			
			$inputs_user = array(
				'nombre'	=> array(
					'type'			=> 'text',
					'value'			=> isset( $facturacion_user['nombre'] ) ? $facturacion_user['nombre'] : '',
					'placeholder'	=> 'Nombre',
					'maxlength'		=> 50,
				),
				'apellidos'	=> array(
					'type'			=> 'text',
					'value'			=> isset( $facturacion_user['apellidos'] ) ? $facturacion_user['apellidos'] : '',
					'placeholder'	=> 'Apellidos',
					'maxlength'		=> 50,
				),
				'email'	=> array(
					'type'			=> 'email',
					'value'			=> isset( $facturacion_user['email'] ) ? $facturacion_user['email'] : '',
					'placeholder'	=> 'Email'
				),
				'telefono'	=> array(
					'type'			=> 'tel',
					'value'			=> isset( $facturacion_user['telefono'] ) ? $facturacion_user['telefono'] : '',
					'placeholder'	=> 'Teléfono',
					'maxlength'		=> 10,
				),/*
				'celular'	=> array(
					'type'			=> 'tel',
					'value'			=> isset( $facturacion_user['celular'] ) ? $facturacion_user['celular'] : '',
					'placeholder'	=> 'Celular',
					'maxlength'		=> 10,
				),*/
				'calleyNumero'	=> array(
					'type'			=> 'text',
					'value'			=> isset( $facturacion_user['calleyNumero'] ) ? $facturacion_user['calleyNumero'] : '',
					'placeholder'	=> 'Calle y número',
					'maxlength'		=> 45,
				),
				'colonia'	=> array(
					'type'			=> 'text',
					'value'			=> isset( $facturacion_user['colonia'] ) ? $facturacion_user['colonia'] : '',
					'placeholder'	=> 'Colonia',
					'maxlength'		=> 30,
				),/*
				'municipio'	=> array(
					'type'			=> 'text',
					'value'			=> isset( $facturacion_user['municipio'] ) ? $facturacion_user['municipio'] : '',
					'placeholder'	=> 'Municipio',
					'maxlength'		=> 30,
				),*/
				'estado'	=> array(
					'type'			=> 'text',
					'value'			=> isset( $facturacion_user['estado'] ) ? $facturacion_user['estado'] : '',
					'placeholder'	=> 'Estado',
					'maxlength'		=> 45,
				),
				'pais'	=> array(
					'type'			=> 'hidden',
					'value'			=> 'México',
					'placeholder'	=> 'País',
					'maxlength'		=> 50,
				),
				'cp'	=> array(
					'type'			=> 'number',
					'value'			=> isset( $facturacion_user['cp'] ) ? $facturacion_user['cp'] : '',
					'placeholder'	=> 'Código Postal',
					'maxlength'		=> 9,
				),
			);
			echo '<div class="'.implode( ' ', $clase_facturacion ).'">';
				echo '<h1 class="color_gris ">Datos facturación</h1>';
				print_inputs( $inputs_user );
			echo '</div>';
		echo '</form>';
		
		if( $tarjeta ){
			echo '<div class="terminos_condiciones color_gris"><div class="checkbox"></div>Acepto términos y condiciones</div>';
		};
		
		if( !$texto_boton ){ $texto_boton = 'Guardar datos de facturación'; };
        echo '<div class="'.implode( ' ', $clases ).'">'.$texto_boton.'</div>';
	}
};
?>