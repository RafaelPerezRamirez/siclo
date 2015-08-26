<?php

class Paquete{
	public $data;
	public $id;
	public $timestamp;
	public $forze;
	
	/*
	**ESTA VARIABLE SOLO SERVIRÁ PARA COMPROBAR USUARIO EN BACK
	*/
	protected $comprador;

	function __construct( $id_paquete = false, $forze = false, $comprador = false ){
		if( !$id_paquete ){ return; };
		global $current_user;

		$this->forze = $forze;
		$this->id = $id_paquete;
		$this->timestamp    = get_the_date( 'Y-m-d H:i:s', $id_paquete );
		
		$this->comprador = $comprador ? $comprador : $current_user->ID;
		$this->get_paquete();
	}
	public function get_array_data(){
		return get_object_vars( $this );
	}
	public function get_paquete(){
		$this->data = false;
		$paquete = get_post( $this->id );
		if( !$paquete ){ return; };

		$precio	= $this->filtros_precio();

		$this->data = array(
			'ID'		=> $this->id,
			'cantidad'	=> (int)get_post_meta( $this->id	,'_cantidad',true ),
			'precio'	=> $precio,
			'color'		=> (string)get_post_meta( $this->id	,'_color',true ),
			'expiracion'=> (string)get_post_meta( $this->id	,'_expiracion',true ),
		);
	}
	protected function filtros_precio( $precio = false ){
		if( !$precio ){
			$precio = (float)get_post_meta( $this->id	,'_precio',true );
		};
		if( is_user_logged_in() ){
			/*
			**SI HAY USUARIO LOGUEADO REVISAMOS
			**SI TIENE CUPONES
			*/
			$cupones = Cupon::get_cupones( $this->comprador );
			if( $cupones ){
				foreach( $cupones as $identificador => $setting ){
					$cupon			= new Cupon( $identificador );
					$mensaje_cupon	= $cupon->get_mensajes();
					if( $mensaje_cupon->ok ){
						/*
						**SI NO HAY ERRORES EN EL CUPÓN seteamos
						**PRECIO
						*/
						$precio -=$cupon->get_descuento();
						if( $precio < 0 ){
							$precio = 0;
						};
					};
				};
			};
		};

		return $precio;
	}
	public function imprimir_paquete( $id_defecto = false ){
		if( !$this->data ){ return; };
		$data = $this->data;

		$precio_unitario = (float)$data['cantidad'] != 0 ? (float)$data['precio'] / (float)$data['cantidad'] : 0;

		if( !$id_defecto ){
			echo '<article class="paquete">';
				echo '<div class="'.$data['color'].' circulo">'.$data['cantidad'].'</div>';
				echo '<div class="precios">'.precio( $precio_unitario ).' c/u<br/><small class="color_gris">'.precio( $data['precio'] ).'</small></div>';
				echo '<a class="boton a_claro" href="'.get_permalink( CHECKOUT ).'?com='.$data['ID'].'">¡ A Rodar !</a>';
			echo '</article>';
		}else{
			$id_defecto = isset( $id_defecto['ID'] ) ? $id_defecto['ID'] : 0;/*SETEAMOS ID SELECCIONADO*/
			$clase = array( 'paquete', 'paquete_checkout', 'sin_seleccionar' );
			if( $id_defecto == $data['ID'] ){
				$clase[] = 'seleccionado';
			};
			$soft = '';/*
			if( $data['cantidad'] == '50' ){
				$soft = '<small class="color_gris smallMargin softopening">Soft Opening</small><br/>';
			}*/

			$clase_texto = $data['cantidad'] == 1 ? 'CLASE' : 'CLASES';
			echo '<article data-idpaquete="'.$data['ID'].'" class="'.implode(' ', $clase).'">';
				echo '<div class="circulo">'.$data['cantidad'].'</div>';
				echo '<div class="small color_gris2 center-block text-center titclase">'.$clase_texto.'</div>';
				echo '<div class="precios"><span class="precio_unitario_paquete">'.precio( $data['precio'] ).'<br/></span>'. $soft .'<small class="color_gris smallMargin">Expira: '.$data['expiracion'].' días</small></div>';
			echo '</article>';
		};
	}
	public function fecha_expiracion( $expiracion = false, $formateado = true ){
		if( !$expiracion ){
			$expiracion = expiracion_primer_paquete();
		};
		return $formateado ? date_i18n('d F Y', current_time('timestamp')+dias($expiracion) ) : date_i18n('Y-m-d', current_time('timestamp')+dias($expiracion) );
	}
};
class Paquete_regalo extends Paquete{
	public function get_paquete(){
		if( !$this->forze ){
			if( is_user_logged_in() && get_user_meta($this->comprador, 'ya_compro', true) ){ return; };
		};
		$precio	= $this->filtros_precio( 200 );
		if( is_user_logged_in() && !get_user_meta($this->comprador, 'ya_compro', true) && get_user_meta($this->comprador,'codigo_aplicado',true) ){
			$precio = 150;
		};
		$this->data = array(
			'ID'		=> 'regalo',
			'cantidad'	=> 1,
			'precio'	=> $precio,
			'color'		=> 'red',
			'expiracion'=> expiracion_primer_paquete(),
		);
	}
	public function imprimir_paquete( $id_defecto = false ){
		if( !$this->data ){ return; };
		$data = $this->data;

		$precio_unitario = (float)$data['cantidad'] != 0 ? (float)$data['precio'] / (float)$data['cantidad'] : 0;

		if( !$id_defecto ){
			echo '<article class="paquete">';
				echo '<div class="'.$data['color'].' circulo">'.$data['cantidad'].'</div>';
				echo '<div class="precios">'.precio( $precio_unitario ).' c/u<br/><small class="color_gris">'.precio( $data['precio'] ).'</small></div>';
				echo '<a class="boton a_claro" href="'.get_permalink( CHECKOUT ).'?com='.$data['ID'].'">¡ A Rodar !</a>';
			echo '</article>';
		}else{
			$id_defecto = isset( $id_defecto['ID'] ) ? $id_defecto['ID'] : 0;/*SETEAMOS ID SELECCIONADO*/
			$clase = array( 'paquete', 'paquete_checkout', 'sin_seleccionar' );
			echo '<article data-idpaquete="'.$data['ID'].'" class="'.implode(' ', $clase).'">';
				echo '<div class="circulo"><img src="'.plantilla(false).'/images/gift.png"/></div>';
				echo '<div class="small center-block text-center titclase">PRIMERA</div>';
				echo '<div class="precios">CLASE<br/><small class="precio_ajax_regalo">'.precio( $data['precio'] ).'</small></div>';
			echo '</article>';
		};
	}
}
?>
