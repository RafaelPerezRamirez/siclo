<?php

class Cupon{
	protected	$ID;
	public 		$timestamp;
	protected	$identificador;
	private		$descuento;
	protected	$mensajes;
	private		$usos_por_usuario;
	private		$usuarios_que_usaron;

	function __construct( $identificador = '' ){
		$this->mensajes = new Mensajes();
		$this->timestamp    = get_the_date( 'Y-m-d H:i:s', $identificador );
		$this->identificador = $identificador;

		$this->check_existencia();

		$this->set_meta();
	}
	public function get_array_data(){
		return get_object_vars( $this );
	}
	private function set_meta(){
		if( !$this->mensajes->ok ){ return; };
		$meta = get_post_meta( $this->ID );

		$this->usos_por_usuario = isset( $meta['opciones_usos_por_usuario'] ) && !empty( $meta['opciones_usos_por_usuario'] ) ? reset( $meta['opciones_usos_por_usuario'] ) : false;
		$this->usuarios_que_usaron = $this->get_usuarios_que_usaron( $meta );
		$this->descuento = isset( $meta['opciones_descuento'] ) ? (int)reset( $meta['opciones_descuento'] ) : false;
	}
	public function get_descuento(){
		return $this->descuento;
	}
	private function get_usuarios_que_usaron( $meta = array() ){
		if( isset( $meta['usuarios_que_usaron'] ) ){
			$usuarios_que_usaron = reset( $meta['usuarios_que_usaron'] );
			return unserialize( $usuarios_que_usaron );
		}else{
			return array();
		};
	}
	public function get_mensajes(){
		return $this->mensajes;
	}
	public function check_limite_por_usuario( $user_id = false ){
		$usuarios	= (array)$this->usuarios_que_usaron;
		$ok			= true;
		if( isset( $usuarios[$user_id] ) ){
			/*
			** Comprobamos si el usuario ya pasó su límite de usos
			*/
			if( (int)$usuarios[$user_id] >= $this->usos_por_usuario ){
				$this->mensajes->add_error('No puedes aplicar este cupón ya que ha llegado al límite de usos');
				$ok = false;
			};
		};
		return $ok;
	}
	/*
	**La estructura de usuarios será:
	**
	**	['id_user']	=> (int)
	*/
	public function aplicar_cupon(){
		global $current_user;
		if( !$this->mensajes->ok ){ return; };

		if( !is_user_logged_in() ){
			/*SI NO HAY USUARIO NOS VAMOS*/
			$this->mensajes->add_error('No hay ningún usuario al que se le pueda aplicar el cupón');
			return;
		};
		$user_id = $current_user->ID;

		if( $this->check_limite_por_usuario( $user_id ) ){
			/*SI EL CUP+ON NO LLEGÓ A SU LIMITE SE APLICA*/
			$mensajes = $this::annadir_cupon_a_user( $user_id, $this->identificador );
			if( $mensajes ){
				if( !$mensajes->ok ){
					$this->mensajes->add_error($mensajes->get_lista_mensajes());
				}else{
					$this->mensajes->add_mensaje($mensajes->get_lista_mensajes());
				};
			}else{
				$this->mensajes->add_error('Ha ocurrido un error desconocido, por favor, ponte en contacto con nosotros para solucionar este problema.');
			};
		};
	}
	private function check_existencia(){
		global $wpdb;
		$postid = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_title = '".$this->identificador."' AND post_type = 'cupon'" );

		if( !empty($postid) ){
			$this->ID	= $postid;
		}else{
			$this->mensajes->add_error('El cupón no existe');
		};
	}
	/*
	**Añadir cupon en usuario
	*/
	static public function annadir_cupon_a_user( $user_id = false, $identificador = false ){
		$mensajes	= new Mensajes(false);

		if( !$user_id || !$identificador ){
			$mensajes->add_error('No recibimos la información de forma correcta');
		}else{
			$cupon	= new Cupon($identificador);

			if( !$cupon->mensajes->ok ){
				$mensajes->add_error($cupon->mensajes->get_lista_mensajes());
			}else{
				$cupones= Cupon::get_cupones( $user_id );
				$ok		= true;
				if( $cupones ){
					if( isset( $cupones[$identificador] ) ){
						$mensajes->add_error('Ya tienes aplicado este cupón');
						$ok = false;
					};
				};
				/*
				**ahora que sabemos que el usuario tiene el cupón
				**vamos a comprobar si no pasó el límite de usos
				*/
				if( !$cupon->check_limite_por_usuario( $user_id ) ){
					$ok = false;
				};
				/*
				**Si todo ok, continuamos
				*/
				if( $ok ){
					/*
					**SI NO HAY PROBLEMA ACTUALIZAMOS LA LISTA DE CUPONES DEL USER
					*/
					$cupones = array();/*FORMATEAMOS TODO*/
					$cupones[$identificador] = true;
					update_user_meta($user_id,'cupones_aplicados',$cupones);
					$mensajes->add_mensaje( "El cupón $identificador se ha aplicado correctamente" );
				};
			};
		};
		return $mensajes;
	}
	public function annadir_uso( $user_id = false ){
		if( !$user_id ){ return; };
		$usuarios_usaron= $this->usuarios_que_usaron;

		$usos_usuario	= isset( $usuarios_usaron[$user_id] ) ? (int)$usuarios_usaron[$user_id] : 0;
		$usuarios_usaron[$user_id] = $usos_usuario+1;

		update_post_meta( $this->ID,'usuarios_que_usaron',$usuarios_usaron );
	}
	static public function get_cupones( $user_id = false ){
		if( !$user_id ){ return; };
		return get_user_meta($user_id,'cupones_aplicados',true);
	}
	static public function eliminar_cupones( $user_id = false ){
		if( !$user_id ){ return; };
		/*
		**Debemos añadir al registro el usuarios que usaron
		*/
		$cupones		= Cupon::get_cupones( $user_id );

		if( $cupones ){
			foreach( $cupones as $id => $xx ){
				$cupon	= new Cupon( $id );
				$errores= $cupon->get_mensajes();
				if( $errores->ok ){
					$cupon->annadir_uso( $user_id );
				};
			};
		};
		return update_user_meta($user_id,'cupones_aplicados',null);
	}
}
