<?php

class Checkout{
	public $mensaje;
	public $paquete;
	public $metodos_pago;
	public $comprador;
	public $productos;
	private $gift_card;
	
	
	function __construct( $paquete = false, $gift = false, $comprador = false, $productos = false ){
		global $current_user;
		if( $paquete ){
			if( $paquete == 'regalo' ){
				$this->paquete = new Paquete_regalo( $paquete );
			}else{
				$this->paquete = new Paquete( $paquete );
			};
		}elseif( isset( $_GET['paquete_compra'] ) ){
			$this->paquete = new Paquete( (int)$_GET['paquete_compra'] );
		};
		
		$this->gift_card = $gift;
		
		$this->comprador = $comprador ? $comprador : $current_user->ID;
		
		$this->registrar_metodos_pago();
		
		$this->mensaje = new Mensajes();

		$this->invitado = isset( $_POST['invitado'] ) ? $_POST['invitado'] : false;
		if( $productos ){
			$this->productos = $productos;
		};
	}
	private function registrar_metodos_pago(){
		$this->metodos_pago = array();
		$this->metodos_pago['conekta'] = new Pago_Conekta();
	}
	public function finalizar_compra( $guardar_tarjeta = false ){
		/*
		**EN CASO DE NO HABER PRECIO Y NO HABER PRODUCTOS
		**NOS VAMOS
		*/
		if( !isset( $this->paquete->data['precio'] ) && !$this->productos ){ return; };
		
		/*SETEAMOS EL METODO FINAL DE PAGO*/
		$pago = $this->metodos_pago['conekta'];/*facilitamos el acceso en una variable*/
		
		$pago->set_monto( $this->paquete, $this->productos );
		$pago->set_comprador( $this->comprador );
		$pago->set_clases( $this->paquete->data['cantidad'] );
		
		$pago->procesar_compra( $this->invitado, $guardar_tarjeta );
		
		if( !$pago->mensajes->ok ){
			foreach( $pago->mensajes->mensajes as $mensaje ){
				$this->mensaje->add_error( $mensaje );
			};
			return;
		};
		check_codigo_activacion( $this->comprador );
		if( $this->invitado ){
			$this->procesar_invitado( $this->invitado, $this->comprador );
		};
		if( !$this->gift_card ){
			update_user_meta($this->comprador, 'ya_compro', true);/*ACTUALIZAMOS PARA QUE SE MUESTRE QUE YA REALIZÓ UNA COMPRA*/
		};
		if( Cupon::get_cupones( $this->comprador ) ){
			Cupon::eliminar_cupones( $this->comprador );
		};
		
		$this->redirect = array(
			'infopedido'	=> $pago->idPedido,
		);
	}
	public function procesar_invitado(){
		procesar_invitado( $this->invitado, $this->paquete );
	}
	public function imprimir( $user = false ){
		/*ESTA FUNCION ESTÁ APLICADA EN EL CALENDARIO*/
		global $current_user;
		if( $user ){
			$current_user = $user;
		};
		if( !is_user_logged_in() ){
			return;
		};
		$clases_del_user = numero_clases_user( $this->comprador );
		$clase_check = $this->gift_card ? 'checkout check_gift' : 'checkout';
		echo '<div class="'.$clase_check.'">';
			$this->imprimir_paquetes_check();
			echo '<div class="primer_paso_check oculto">';
				echo '<div class="columna_general info_user_checkout">';
					echo '<h1>Bienvenido al <img src="'.plantilla( false ).'/eliminar/logos/pequeños/azulgris.png" width="67" height="26" alt="Siclo"/></h1>';
					echo '<h2>'.$current_user->display_name.'</h2>';
					echo '<hr/>';
				echo '</div>';
				if( $this->gift_card ){ $this->imprimir_data_gift(); };
				echo '<div class="columna_general form_final_compra">';
					if( count( $this->metodos_pago ) ){
						foreach( $this->metodos_pago as $metodo ){
							$metodo->formulario( true, 'Confirmar' );
						};
					};
				echo '</div>';
			echo '</div>';
		echo '</div>';
		if( !$clases_del_user && isset( $_GET['bici'] ) ){
			echo '<script type="text/javascript">$(document).ready(function(){$(".paquete").first().trigger("click");});</script>';
		};
	}
	public function imprimir_paquetes_home( $user = false ){
		global $current_user;
		if( $user ){
			$current_user = $user;
		};
		$usuario_log = false;
		/*ESTA EXTRAÑA FUNCIÓN ESTÁ HECHA PARA DIFICULTAR EL TRABAJO DE LA WEB*/
		echo '<div class="checkout checkout_solo_clases">';
			$this->imprimir_paquetes_check();
			echo '<div class="primer_paso_check oculto">';
				echo '<div class="volver_a_paquetes"><img src="'.plantilla( false ).'/images/cerrar.png"></div>';
				echo '<div class="columna_general info_user_checkout">';
					if( is_user_logged_in() ){
						/*logueado*/
						usuarioinfo( true, $current_user, false );
						$usuario_log = true;
					}else{
						/*no logueado*/
						acceso_siclo("AJAX", false, true);
					};
				echo '</div>';
				$clases = $usuario_log ? '' : ' disabled';
				echo '<div class="columna_general form_final_compra'.$clases.'">';
					if( count( $this->metodos_pago ) ){
						foreach( $this->metodos_pago as $metodo ){
							$metodo->formulario( true, 'Pagar ahora', true );
						};
					};
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
	public function imprimir_gift_home( $user = false ){
		/*ESTA FUNCION ESTÁ APLICADA EN EL CALENDARIO*/
		global $current_user;
		if( $user ){
			$current_user = $user;
		};
		$clases_del_user = numero_clases_user( $this->comprador );
		echo '<div class="checkout check_gift checkout_solo_clases">';
			$this->imprimir_paquetes_check();
			echo '<div class="primer_paso_check oculto">';
				echo '<div class="volver_a_paquetes"><img src="'.plantilla( false ).'/images/cerrar.png"></div>';
				echo '<div class="columna_general info_user_checkout">';
					if( is_user_logged_in() ){
						/*logueado*/
						usuarioinfo( true, $current_user, false );
						$usuario_log = true;
					}else{
						/*no logueado*/
						acceso_siclo("AJAX", false, true);
					};
				echo '</div>';
				$clases = is_user_logged_in() ? '' : ' disabled';
				echo '<div class="columna_general form_final_compra'.$clases.'">';
					if( count( $this->metodos_pago ) ){
						foreach( $this->metodos_pago as $metodo ){
							$metodo->formulario( true, 'Pagar ahora', true );
						};
					};
				echo '</div>';
			echo '</div>';
		echo '</div>';
		if( !$clases_del_user && isset( $_GET['bici'] ) ){
			echo '<script type="text/javascript">$(document).ready(function(){$(".paquete").first().trigger("click");});</script>';
		};
	}
	private function imprimir_paquetes_check(  ){
		$data = isset( $this->paquete->data ) ? $this->paquete->data : 'CHECKOUT';
		$clase= 'paquetes_check';
		if( $this->gift_card ){
			$clase.= ' tipo_gift_card';
			echo '<h1 class="titulo_gift_card large"><img src="'.plantilla(false).'/images/regalo.png"/>Regala <span class="color_azul">Sí</span>clo <span class="aprovecha_h3">Selecciona paquete de regalo, fecha de envío y correo de envío</span></h1>';
			echo '<div class="'.$clase.'">';
				echo '<div class="nueva_maq_gift">';
					imprimir_paquetes( $data, true );
				echo '</div>';
				$this->calendario_gift();
				$this->imprimir_data_gift();
			echo '</div>';
		}else{
			echo '<div class="'.$clase.'">';
				imprimir_paquetes( $data );
			echo '</div>';
		};
	}
	private function calendario_gift(  ){
		
		echo '<div class="calendario_gift_card">';
			print_calendar();
		echo '</div>';
	}
	private function imprimir_data_gift(  ){
		echo '<div class="columna_general data_friend">';
			$inputs_user = array(
				'name_invitado'	=> array(
					'type'			=> 'text',
					'value'			=> '',
					'placeholder'	=> 'Nombre completo'
				),
				'mail_invitado'	=> array(
					'type'			=> 'email',
					'value'			=> '',
					'placeholder'	=> 'Mail a quien regalas'
				),
				'mensaje_invitado'	=> array(
					'value'			=> '',
					'placeholder'	=> 'Mensaje',
					'tag'			=> 'textarea',
				),
			);
			echo '<div class="entradas_regalo">';
				print_inputs( $inputs_user );
			echo '</div>';
			echo '<div class="regala_ahora">Regala Ahora</div>';
		echo '</div>';
	}
};
?>