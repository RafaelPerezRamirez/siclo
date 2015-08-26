<?php

class Pago_Conekta{
	public $data;
	
	public $privatekey;
	public $publickey;
	
	private $monto;
	private $paquete_clase;
	
	private $productos;
	
	private $divisa;
	private $token;
	
	public $mensajes;
	public $idPedido;
	private $test;
	private $comprador;
	private $clases;
	private $paquete_objeto;
	
	function __construct( $data = false ){
		$this->test = true;
		
		$this->data = $data ? $data : array();
		
		$this->privatekey	= DESARROLLO ? 'key_hn7iUhjstbfZRUk6tXs8Eg' : 'key_J6U3pyizu7snwr8xihUE5g';
		$this->publickey	= DESARROLLO ? 'key_JzxkrHDZAuAFTaDNjVY3E9A' : 'key_ez1yTAe9vf9ZgrSsXx8uStg';
		
		$this->divisa = 'MXN';
		$this->mensajes = new Mensajes; 
		
	}
	public function get_monto(){
		return $this->monto;
	}
	public function set_monto( $data = false, $productos = false ){
		$monto = 0;
		
		if( $data ){
			/*
			**CONFIGURAMOS PRECIO DE LOS PAQUETES
			*/
			$this->paquete			= $data->data['ID'];
			$this->paquete_objeto	= $data->data['ID'] == 'regalo' ? new Paquete_regalo( 'regalo', true ) : new Paquete( $data->data['ID'] );
			
			$this->paquete_clase	= (int)$data->data['cantidad'];
			$monto					+= (int)$data->data['precio'];
		};
		if( $productos ){
			/*
			**CONFIGURAMOS PRECIO DE LOS PRODUCTOS
			*/
			$array_paquetes = array();
			foreach( $productos as $info ){
				$p		= new Producto( $info['ID_producto'] );
				
				$precio		= (int)$p->precio;
				$cantidad	= (int)$info['cantidad'];
				
				$monto		+= $precio*$cantidad;
				/*
				**SETEAMOS EL ARRAY DE PRODUCTOS PARA ALMACENAR
				*/
				$array_paquetes[] = array(
					'producto'	=> $p,
					'cantidad'	=> $cantidad,
				);
			};
			$this->productos = $array_paquetes;
		};
		$this->monto			= $monto.'00';
	}
	public function set_clases( $clases = false ){
		if( $clases === false ){ return; };
		$this->clases = (int)$clases;
	}
	
	public function set_comprador( $comprador = false ){
		if( $comprador === false ){ return; };
		$this->comprador = $comprador;
	}
	public function set_tarjeta( $data = false ){
		if( $data === false ){ return; };
		
		$this->token = $data;
	}
	public function procesar_compra( $invitado = false, $guardar_tarjeta = false ){
		/*COMPROBACION Y FINALIZACION DE COMPRA*/
		if( $this->validate_fields() ){
			$this->process_payment( $invitado, $guardar_tarjeta );
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
	public function annadir_tarjeta( $id_user = false ){
		if( !$id_user || !$this->token ){ return; };
		require_once("conekta/Conekta.php");
		Conekta::setApiKey( $this->privatekey );

		/*CREAMOS USUARIO*/
		$id_comprador = get_user_meta( $id_user, '_id_conekta', true );
		if( !$id_comprador ){
			try {
				$comprador = get_user_by( 'id', $id_user );
				
				$customer = Conekta_Customer::create(array(
					"name"	=> $comprador->display_name,
					"email"	=> $comprador->user_email,
					"cards"	=>  array( $this->token ),
				));
				
				update_user_meta( $id_user, '_id_conekta', $customer->id );
				
				$primera_tarjeta = reset( $customer->cards );
				
				$tarjeta = array(
					'token'		=> $primera_tarjeta->id,
					'nombre'	=> $primera_tarjeta->name,
					'digitos'	=> $primera_tarjeta->last4,
					'brand'		=> $primera_tarjeta->brand,
				);
				guardar_tarjeta_en_user( $tarjeta, $id_user );
				$this->mensajes->add_mensaje('Tarjeta añadida correctamente');
				/*COMO ES LA PRIMERA VEZ CONFIGURAMOS EL TOKEN CON LA TARJETA ACTIVA DEL USUARIO*/
				$this->token = $primera_tarjeta->id;
			} catch (Conekta_Error $e) {
				//El pago no pudo ser procesado
				$mensaje	= $e->getMessage();
				$this->mensajes->add_error( $mensaje );
				return;
			}
		}else{
			$tarjetas = get_tarjetas( $id_user );
			if( !isset( $tarjetas[$this->token] ) ){
				try {
					/*añadimos tarjeta al usuario*/
					$customer = Conekta_Customer::find( $id_comprador );
					
					$card = $customer->createCard(array('token' => $this->token ));
					
					$tarjeta = array(
						'token'		=> $card->id,
						'nombre'	=> $card->name,
						'digitos'	=> $card->last4,
						'brand'		=> $card->brand,
					);
					guardar_tarjeta_en_user( $tarjeta, $id_user );
					$this->mensajes->add_mensaje('Tarjeta añadida correctamente');
				} catch (Conekta_Error $e) {
					//El pago no pudo ser procesado
					$mensaje	= $e->getMessage();
					$this->mensajes->add_error( $mensaje );
					return;
				}
			}else{
				$this->mensajes->add_error('La tarjeta ya existe en tu cuenta');
			};
		};
	}
	public function eliminar_tarjeta( $id_user = false ){
		if( !$id_user || !$this->token ){ return; };
		require_once("conekta/Conekta.php");
		Conekta::setApiKey( $this->privatekey );

		/*CREAMOS USUARIO*/
		$id_comprador = get_user_meta( $id_user, '_id_conekta', true );
		
		if( !$id_comprador ){ $this->mensajes->add_error('Tu usuario no existe en el sistema, ponte en contacto con Siclo para solucionar este problema');return; };
		
		
		$tarjetas = get_tarjetas( $id_user );
		
		if( isset( $tarjetas[$this->token] ) ){
			
			/*BORRADO EN CONKECTA*/
			$customer	= Conekta_Customer::find($id_comprador);
			$cards		= $customer->cards;
			foreach( $cards as $card ){
				if( $card->id == $this->token ){
					$card->delete();
				};
			};
			/*BORRADO EN WEB*/
			eliminar_tarjeta_en_user( $this->token, $id_user );
			
			$this->mensajes->add_mensaje('Tarjeta eliminada correctamente');
		}else{
			$this->mensajes->add_error('La tarjeta ya se ha eliminado de tu cuenta');
		};
	}
	public function process_payment( $invitado = false, $guardar_tarjeta = false ) {
		require_once("conekta/Conekta.php");
		
		Conekta::setApiKey( $this->privatekey );
		
		/*CREAMOS USUARIO*/
		$id_comprador = get_user_meta( $this->comprador, '_id_conekta', true );
		if( !$id_comprador ){
			try {
				$comprador = get_user_by( 'id', $this->comprador );
				
				$customer = Conekta_Customer::create(array(
					"name"	=> $comprador->display_name,
					"email"	=> $comprador->user_email,
					"cards"	=>  array( $this->token ),
				));
				
				update_user_meta( $this->comprador, '_id_conekta', $customer->id );
				
				/*COMO ES LA PRIMERA VEZ CONFIGURAMOS EL TOKEN CON LA TARJETA ACTIVA DEL USUARIO*/
				$this->token = reset( $customer->cards );
				$this->token = $this->token->id;
			} catch (Conekta_Error $e) {
				//El pago no pudo ser procesado
				$mensaje	= $e->getMessage();
				$this->mensajes->add_error( $mensaje );
				return;
			}
		}else{
			/*ES UN USUARIO YA CREADO*/
			/*TOCA COMPROBAR QUE EL TOKEN SEA EXISTENTE*/
			$tarjetas = get_tarjetas( $this->comprador );
			if( !isset( $tarjetas[$this->token] ) && $guardar_tarjeta ){
				try {
					/*añadimos tarjeta al usuario*/
					$customer = Conekta_Customer::find( $id_comprador );
					
					$card = $customer->createCard(array('token' => $this->token ));
					
					$tarjeta = array(
						'token'		=> $card->id,
						'nombre'	=> $card->name,
						'digitos'	=> $card->last4,
						'brand'		=> $card->brand,
					);
					if( $guardar_tarjeta ){
						guardar_tarjeta_en_user( $tarjeta, $this->comprador );
					};
					
				$this->token = $tarjeta['token'];
				} catch (Conekta_Error $e) {
					//El pago no pudo ser procesado
					$mensaje	= $e->getMessage();
					$this->mensajes->add_error( $mensaje );
					return;
				}
			};
		};
		$data_user = get_user_by('id', $this->comprador);
		
		/*GENERAMOS DATOS DE TRANSACCION*/
		$transaccion = array(
			"amount"		=> $this->monto,
			"currency"		=> "MXN",
			"description"	=> "Compra en Síclo.com",
			"card"			=> $this->token,
			"details"=> array(
				"email"		=> $data_user->user_email,
				"line_items"=> array(),
			),
		);
		/*
		**GENERAREMOS LOS DATOS DE LOS LINE_ITEMS
		**TANTO EN PRODUCTOS COMO EN PAQUETES
		*/
		if( $this->paquete_objeto ){
			$transaccion['details']["line_items"][]= array(
				"name"			=> "Paquete de ".$this->paquete_objeto->data['cantidad']." clases",
				"unit_price"	=> $this->paquete_objeto->data['precio'],
				"description"	=> "Paquete de ".$this->paquete_objeto->data['cantidad']." clases",
				"quantity"		=> 1,
				"type"			=> "paquete-clases"
			);
		};
		if( $this->productos ){
			foreach( $this->productos as $producto ){
				$transaccion['details']["line_items"][]= array(
					"name"			=> $producto['producto']->titulo,
					"unit_price"	=> $producto['producto']->precio,
					"description"	=> $producto['producto']->titulo,
					"quantity"		=> $producto['cantidad'],
					"type"			=> "producto-back"
				);
			};
		};
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
			/*GUARDAMOS ENVÍO DE DATOS*/
			update_post_meta($idPedido, 'transaccion'	, $transaccion);
			update_post_meta($idPedido, '_info_paquete'	, $this->paquete_objeto);
			update_post_meta($idPedido, '_paquete'		, $this->paquete);
			update_post_meta($idPedido, '_productos'	, $this->productos);
			update_post_meta($idPedido, '_expiracion'	, $this->paquete_objeto->fecha_expiracion( $this->paquete_objeto->data['expiracion'], true ));/*SE GUARDA PARA MOSTRARLO EN EL HISTORIAL*/
		}else{
			$this->mensajes->add_error( 'No se ha podido finalizar la transaccion.' );
			return;
		};
		$transaccion["reference_id"]	= urlencode($idPedido);
		
		
		try {
			$pago = Conekta_Charge::create( $transaccion );
			
			/*GUARDAMOS SIEMPRE RESPUESTA*/
			update_post_meta($idPedido, 'respuesta_transaccion', serialize( $pago ) );
			
			$tarjeta = array(
				'token'		=> $this->token,
				'nombre'	=> $pago->payment_method->name,
				'digitos'	=> $pago->payment_method->last4,
				'brand'		=> $pago->payment_method->brand,
			);
			if( $guardar_tarjeta ){ guardar_tarjeta_en_user( $tarjeta, $this->comprador ); };
			mail_de_compra_clases( $idPedido );
			$this->finalizar_compra( $invitado );
			return;
		} catch (Conekta_Error $e) {
			//El pago no pudo ser procesado
			$mensaje	= $e->getMessage();
			$this->mensajes->add_error( $mensaje );
			
			/*GUARDAMOS SIEMPRE RESPUESTA*/
			update_post_meta($idPedido, 'respuesta_transaccion', $mensaje );
			return;
		}
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
			sumar_clases( $this->comprador, $this->clases, $this->paquete_objeto->fecha_expiracion( $this->paquete_objeto->data['expiracion'], false ) );
		};
		actualizar_status( $this->idPedido, 'publish' );
	}
	public function formulario( $tarjeta = false , $texto_boton = false, $formato_esp = false ){		
		$clases = array( 'guardar_datos_facturacion','boton','r_oscuro' );
		$clase_facturacion = array( 'datos_usuario_facturacion' );
		
		if( !$tarjeta ){ echo '<h1 class="color_gris ">Información de tarjeta</h1>'; };
		
		
		echo '<form class="ch-pay" method="post" name="transaccionWF" enctype="application/x-www- form-urlencoded" />';
			
			if( $tarjeta ){
				$clases[] = 'finalizar_compra_ya';
				unset( $clases[0] );
				
				$clase_facturacion[] = 'escondido';
				
				$hay_tarjetas = tarjetas_usuario_cuenta( true );
				if( $formato_esp ){
					$this->html_annadir_tarjeta_solo_clases( $hay_tarjetas );
				}else{
					$this->html_annadir_tarjeta( $hay_tarjetas );
				};
			};
		echo '</form>';
		
		if( $tarjeta ){
			echo $this->html_codigo_descuento();
			echo '<div class="terminos_condiciones"><div class="checkbox"></div><span data-id_fancy="'.TERMINOS.'">Acepto términos y condiciones</span></div>';
		};
        echo '<div class="fijo_abajo"><div class="'.implode( ' ', $clases ).'">'.$texto_boton.'</div></div>';
	}
	public function html_codigo_descuento(){
		if( is_page( CHECKOUT ) ){ return; };
		return 
		'<div class="bloque_descuento_check">'.
			'<input class="form-control gris3" placeholder="Código de descuento" type="text" name="codigo_descuento"/>'.
			'<span class="boton aplicar_descuento">Aplicar código</span>'.
		'</div>';
	}
	public function html_annadir_tarjeta( $hay_tarjetas = false, $guardar = false, $print = true ){
		$html = '';
		/*CARGA DE SCRIPTS*/
		$html.= '<script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.3.2/js/conekta.js"></script>
			<script type="text/javascript">
				//Conekta.setPublishableKey("'.$this->publickey.'");
			</script>';
		
		$inputs_user = array(
			'nombreTarjeta'.time()	=> array(
				'type'			=> 'text',
				'value'			=> '',
				'placeholder'	=> 'Nombre del tarjetahabiente',
				'conekta'		=> 'data-conekta="card[name]"',
				'class'			=> 'gris3 form-control fdb f1',
			),
			'numeroTarjeta'.time()	=> array(
				'type'			=> 'number',
				'value'			=> '',
				'placeholder'	=> 'Número de la tarjeta',
				'maxlength'		=> 20,
				'conekta'		=> 'data-conekta="card[number]"',
				'class'			=> 'gris3 form-control fdb f2',
			),
		);
		$inputs_user_2 = array(
			'cvt'.time()	=> array(
				'type'			=> 'number',
				'value'			=> '',
				'placeholder'	=> 'Cvv',
				'maxlength'		=> 4,
				'conekta'		=> 'data-conekta="card[cvc]"',
				'class'			=> 'form-control fdb ccv',
			),
		);
		$clase_form = 'data_tarjeta';
		
		if( $hay_tarjetas ){
			$clase_form .= ' escondido';
			$html.= '<div class="annadir_tarjeta color_gris btn azul2 bot1 text-center center-block fdb">+ AÑADIR NUEVA TARJETA</div>';
		};
		
		$html.= '<div class="'.$clase_form.'">
				<div class="cards">
					<div class="target" data-tarjeta_img="visa">
						<img src="'.plantilla(false).'/images/tarjeta1.jpg">
					</div>
					<div class="target" data-tarjeta_img="amex">
						<img src="'.plantilla(false).'/images/tarjeta2.jpg">
					</div>
					<div class="target" data-tarjeta_img="master">
						<img src="'.plantilla(false).'/images/tarjeta3.jpg">
					</div>
				</div>
				<form class="form2">';
					$html.=	print_inputs( $inputs_user, false );
					$html.= '<div class="ExpDate">';
						$html.= $this->mes_exp();
						$html.= $this->anyo_ext();
						$html.=	print_inputs( $inputs_user_2, false );
						$html.= 
						'<div class="ccv">'.
							'<img src="'.plantilla(false).'/images/iconos/alert.png" class="alert">'.
						'</div>';
					$html.= '</div>';
					if( $guardar ){
						$html.= '<div class="boton a_oscuro crear_tarjeta btn azul2 bot2 text-center center-block fdb">GUARDAR TARJETA</div>';
					};
				$html.=	'</form>';
			$html.=	 '<div class="guardar_pregunta_tarj"><div class="checkbox"></div>Guardar datos de mi tarjeta</div>';
		$html.=	 '</div>';
		
		if( $print ){
			echo $html;
		}else{
			return $html;
		};
	}
	private function anyo_ext(){
		$html= '<select id="anyoExpiracion'.time().'" data-conekta="card[exp_year]" class="gris3 form-control fdb ccv">';
			$anno = date_i18n('Y');
			for( $i = 0; $i<= 10 ; $i++ ){
				$a	= (int)$anno+$i;
				$html.= '<option value="'.$a.'">'.$a.'</option>';
			};
		$html.= '</select>';
		return $html;
	}
	private function mes_exp(){
		/*MES----------------------------------------------------------------------------------*/
		$html= '<select id="mesExpiracion'.time().'" data-conekta="card[exp_month]" class="gris3 form-control fdb ccv">';
			$meses = array(
				array(
					'nombre'	=> '01',
					'value'		=> '1',
				),
				array(
					'nombre'	=> '02',
					'value'		=> '2',
				),
				array(
					'nombre'	=> '03',
					'value'		=> '3',
				),
				array(
					'nombre'	=> '04',
					'value'		=> '4',
				),
				array(
					'nombre'	=> '05',
					'value'		=> '5',
				),
				array(
					'nombre'	=> '06',
					'value'		=> '6',
				),
				array(
					'nombre'	=> '07',
					'value'		=> '7',
				),
				array(
					'nombre'	=> '08',
					'value'		=> '8',
				),
				array(
					'nombre'	=> '09',
					'value'		=> '9',
				),
				array(
					'nombre'	=> '10',
					'value'		=> '10',
				),
				array(
					'nombre'	=> '11',
					'value'		=> '11',
				),
				array(
					'nombre'	=> '12',
					'value'		=> '12',
				),
			);
			foreach( $meses as $mes ){
				$html.= '<option value="'.$mes['value'].'">'.$mes['nombre'].'</option>';
			};
		$html.= '</select>';
		return $html;
	}
	public function html_annadir_tarjeta_solo_clases( $hay_tarjetas = false, $guardar = false ){
		/*CARGA DE SCRIPTS*/
		echo '<script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.3.2/js/conekta.js"></script>';
		
		$inputs_user = array(
			'nombreTarjeta'.time()	=> array(
				'type'			=> 'text',
				'value'			=> '',
				'placeholder'	=> 'Nombre del tarjetahabiente',
				'conekta'		=> 'data-conekta="card[name]"',
				'class'			=> 'gris3 form-control fdb f1',
			),
			'numeroTarjeta'.time()	=> array(
				'type'			=> 'number',
				'value'			=> '',
				'placeholder'	=> 'Número de la tarjeta',
				'maxlength'		=> 20,
				'conekta'		=> 'data-conekta="card[number]"',
				'class'			=> 'gris3 form-control fdb f2',
			),
		);
		$inputs_user_2 = array(
			'cvt'.time()	=> array(
				'type'			=> 'number',
				'value'			=> '',
				'placeholder'	=> 'Cvv',
				'maxlength'		=> 4,
				'conekta'		=> 'data-conekta="card[cvc]"',
				'class'			=> 'form-control fdb ccv',
			),
		);
		$clase_form = 'data_tarjeta';
		
		if( $hay_tarjetas ){
			$clase_form .= ' escondido';
			echo '<div class="annadir_tarjeta color_gris btn azul2 bot1 text-center center-block fdb">+ AÑADIR NUEVA TARJETA</div>';
		};
		
		echo '<div class="'.$clase_form.'">';
			?>
				<div class="cards">
					<div class="target" data-tarjeta_img="visa">
						<img src="<?php plantilla()?>/images/tarjeta1.jpg">
					</div>
					<div class="target" data-tarjeta_img="amex">
						<img src="<?php plantilla()?>/images/tarjeta2.jpg">
					</div>
					<div class="target" data-tarjeta_img="master">
						<img src="<?php plantilla()?>/images/tarjeta3.jpg">
					</div>
				</div>
				<form class="form2">
                <div class="cont_especial_solo_clases">
					<?php 
						print_inputs( $inputs_user );
						echo $this->mes_exp();
						echo $this->anyo_ext();
						print_inputs( $inputs_user_2 );
					?>
                    <div class="ccv">
                        <img src="<?php plantilla()?>/images/iconos/alert.png" class="alert">
                    </div>
                </div>
			<?php
			if( $guardar ){
				echo '<div class="boton a_oscuro crear_tarjeta btn azul2 bot1 text-center center-block fdb">GUARDAR TARJETA</div>';
			};
			?>
				</form>
			<?php
			echo '<div class="guardar_pregunta_tarj"><div class="checkbox"></div>Guardar datos de mi tarjeta</div>';
		echo '</div>';
	}
};
?>