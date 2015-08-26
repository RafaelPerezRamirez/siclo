<?php
/*UBICACIONES---------------------------------------------------------------------*/
if( !function_exists('menu_ubicaciones') ){
	function menu_ubicaciones( $para_reservaciones = 'false', $defecto = false ){
		global $admin;

		$html = '';
		$ubicaciones = get_posts(array(
			'posts_per_page'	=> -1,
			'post_type'			=> 'ubicacion',
			'fields'			=> 'ids',
			'orderby'			=> 'title',
			'order'				=> 'ASC',
		));

		if( $ubicaciones ){
			foreach( $ubicaciones as $u ){
				if( $para_reservaciones !== true ){
					$args = array(
						'accion'	=> array(
							'funcion'	=> 'ver_menu_salon',
							'attr'		=> $u,
						),
						'recipiente'	=> 'lista_salones_ubi',
						'titulo'		=> get_the_title( $u ),
					);

					if( $admin->permisos('Administrador') ){
						$args['extra'] = editar_opcion( $u,'html_configuracion_salon' );
					};

					$html .= print_single_option( $u, $args, false );
				}else{
					//RESERVACIONES
					$args = array(
						'accion'	=> array(
							'funcion'	=> 'ver_menu_salon',
							'attr'		=> array( $u, 'edicion_reservaciones' ),
						),
						'recipiente'	=> 'salones_reservacion',
						'titulo'		=> get_the_title( $u ),
					);
					if( $u == $defecto ){
						$args['class']	= 'reserva_usando';
					};
					$html .= print_single_option(
						$u,
						$args,
						false
					);
				};
			};
		};
		return $html;
	};
};
if( !function_exists('ver_menu_salon') ){
	function ver_menu_salon( $id = false, $defecto = false ){
		global $admin;
		if( !$id ){ return; };
		$panel_estudios	= true;
		$edicion		= false;/*VARIABLE PARA EDITAR EN RESERVACIONES*/

		$html = '';

		if( is_array( $id ) ){
			if( $id[1] === 'edicion_reservaciones' ){
				$edicion = true;
			}else{
				$panel_estudios = $id[1];
			};
			$id = $id[0];
		};

		$salones = get_posts(array(
			'post_type'			=> 'salon',
			'posts_per_page'	=> -1,
			'meta_query'		=> array(
				array(
					'key'		=> 'ubicacion',
					'value'		=> $id,
					'compare'	=> '=',
				),
			),
			'orderby'			=> 'title',
			'order'				=> 'ASC',
			'fields'		=> 'ids',
		));
		if( $salones ){
			foreach( $salones as $s ){
				$args = array(
					'class'		=> 'salon_lista',
					'accion'	=> array(
						'funcion'	=> 'abrir_panel_from_id',
						'attr'		=> 'opciones_del_salon',
						'tipo'		=> 'js',
					),
				);
				if( $edicion ){
					$args['accion']	= array(
						'funcion'	=> 'configuracion_calendario_salon',
					);
				}else{
					if( $panel_estudios !== true ){
						/*PARA VISUALIZACION DE RESERVACIONES*/
						$args['accion']	= array(
							'funcion'	=> 'configuracion_reservaciones_salon',
						);
					};
				};
				$args['titulo']	= get_the_title( $s );

				if( $panel_estudios === true ){
					if( !$edicion ){
						/*SI NO EDITAMOS*/
						if( $admin->permisos('Administrador') ){
							$args['extra']	= editar_opcion( $s,'editar_nombre_salon','js' );
						};
					}else{
						/*ES SALON PARA EDITAR RESERVACION*/
						$args['accion']['attr']	= $s;
						$args['recipiente']		= 'calendario_reservacion';
					};
				}else{
					$args['accion']['attr']	= $s;
					$args['recipiente']		= 'panel_final';
				};
				if( $edicion && $defecto == $s ){
					/*RESERVA POR DEFECTO*/
					$args['class']	= 'reserva_usando';
				};
				$html .= print_single_option(
					$s,
					$args,
					false
				);
			};
		};

		return $html;
	};
};
if( !function_exists('configuracion_mapa_salon') ){
	function configuracion_mapa_salon( $id_salon = false ){
		global $admin;
		if( !$admin->permisos('Administrador') ){ return; };
		if( !$id_salon ){ return; };
		$html = '';
		require_once("templates/ubicaciones/forma_salon.php");
		return $html;
	};
};
if( !function_exists('configuracion_calendario_salon') ){
	function configuracion_calendario_salon( $id_salon = false, $defecto = false ){
		global $admin;
		if( !$id_salon ){ return; };
		if( !$admin->permisos('FrontDesk') ){ return; };

		$html = '';
		require_once("templates/ubicaciones/calendario_salon.php");
		return $html;
	};
};
if( !function_exists('configuracion_reservaciones_salon') ){
	function configuracion_reservaciones_salon( $id_salon = false ){
		if( !$id_salon ){ return; };
		$html = '';
		require_once("templates/ubicaciones/reservaciones_salon.php");
		return $html;
	};
};
if( !function_exists('html_configuracion_salon') ){
	function html_configuracion_salon( $id_ubicacion = false ){
		global $admin;
		if( !$admin->permisos( 'Gafa' ) && $id_ubicacion == false ){
			/*SOLO GAFA PUEDE CREAR NUEVOS*/
			return;
		}elseif( !$admin->permisos( 'Administrador' ) ){
			/*SOLO LOS QUE TIENEN ALMENOS ADMIN PUEDEN EDITAR*/
			return;
		};

		$html = '';
		require_once("templates/ubicaciones/editar_crear_salon.php");
		return $html;
	};
};
function menu_iframe(){
	return '<iframe id="iframne_wp" src="'.get_home_url().'/wp-admin/edit.php?post_type=producto"></iframe>';
};
/*NUEVA COMPRA*/
function panel_compra_back( $id_user = false ){
	global $admin;
	if( !$id_user ){ return; };
	if( !$admin->permisos('FrontDesk') ){ return; };
	
	$html = '';
	require_once("templates/compra/compra_clases.php");
	return $html;
};
/*MÉTRICAS Y REPORTES*/
if( !function_exists('metricas_web') ){
	function metricas_web( $data = false ){
		global $admin;
		if( !$admin->permisos( 'Gafa' ) ){return;}

		$html  = '';
		$html .= print_single_option( 'metrica_usuarios', array(
			'accion'	=> array(
				'funcion'	=> 'metricas_usuarios',
				'attr'		=> false,
			),
			'recipiente'	=> 'panel_final',
			'titulo'		=> 'De usuarios',
		), false );
		$html .= print_single_option( 'metrica_profesores', array(
			'accion'	=> array(
				'funcion'	=> 'metrica_profesores',
				'attr'		=> false,
			),
			'recipiente'	=> 'panel_final',
			'titulo'		=> 'De Profesores',
		), false );
		$html .= print_single_option( 'metricas_clases', array(
			'accion'	=> array(
				'funcion'	=> 'descargar_db',
				'attr'		=> false,
			),
			'recipiente'	=> 'panel_final',
			'titulo'		=> 'Descargar DB',
		), false );

		return $html;
	};
};
if( !function_exists('metricas_usuarios') ){
	function metricas_usuarios(){
		global $admin;
		if( !$admin->permisos( 'Gafa' ) ){return;};

		$html = '';
		require_once("templates/metricas/metricas_usuarios.php");
		return $html;
	};
};
if( !function_exists('metrica_profesores') ){
	function metrica_profesores(){
		global $admin;
		if( !$admin->permisos( 'Gafa' ) ){return;};

		$html = '';
		require_once("templates/metricas/metrica_profesores.php");
		return $html;
	};
};
if( !function_exists('descargar_db') ){
	function descargar_db(){
		global $admin;
		if( !$admin->permisos( 'Gafa' ) ){return;};

		$html = '';
		require_once("templates/metricas/descargar_db.php");
		return $html;
	};
};
if( !function_exists('guardar_ubicacion') ){
	function guardar_ubicacion( $data = false ){
		global $admin;
		if( !$data ){ return; };
		if( !$admin->permisos( 'Administrador' ) ){ return; };

		$formateo_data = array();
		foreach( $data as $d ){
			$formateo_data[$d[0]] = $d[1];
		};
		$ubicacion = false;


		if( isset( $formateo_data['ID'] ) && $formateo_data['ID'] !== 'false' ){
			/*EDITAR*/
			$ubicacion = new Ubicacion( $formateo_data['ID'] );
		}else{
			/*CREAR*/
			$ubicacion = new Ubicacion(  );
			$id_nueva = $ubicacion->crear(  );
			$ubicacion = new Ubicacion( $id_nueva );
		};
		if( !$ubicacion->ID ){ return 'Ha ocurrido un error con la ubicación y no se ha guardado la información'; };

		return $ubicacion->actualizar_data( $formateo_data );
	};
};
if( !function_exists('eliminar_post') ){
	function eliminar_post( $id_post = false ){
		global $admin;
		if( !$id_post ){ return; };
		$post = get_post( $id_post );

		$a_eliminar = false;

		switch( $post->post_type ){
			case 'ubicacion':
				if( !$admin->permisos('Gafa') ){return 'No';};
				$a_eliminar = new Ubicacion( $id_post );
			break;
			case 'salon':
				if( !$admin->permisos('Gafa') ){return;};
				$a_eliminar = new Salon( $id_post );
			break;
			case 'reserva':
				if( !$admin->permisos('FrontDesk') ){ return; };
				$a_eliminar = new Reserva( $id_post );
			break;
			case 'clase':
				if( !$admin->permisos('Administrador') ){return;};
				$a_eliminar = new Clase( $id_post );
			break;
			case 'faq':
				eliminar( $id_post );
				return;
			break;
			default:
				return;
			break;
		};
		$a_eliminar->eliminar();
	};
};
if( !function_exists('actualizar_nombre_ajax') ){
	function actualizar_nombre_ajax( $data = false ){
		global $admin;
		if( !$data || !isset( $data[0] ) || !isset( $data[1] ) ){ return; };
		if( !$admin->permisos('Administrador') ){ return; };
		actualizar_nombre( $data[0], $data[1] );
	};
};
if( !function_exists('crear_salon') ){
	function crear_salon( $ubicacion = false ){
		global $admin;
		if( !$ubicacion ){ return; };
		if( !$admin->permisos( 'Gafa' ) ){ return; };

		$s = new Salon();
		$s->crear( $ubicacion );
		return ver_menu_salon( $ubicacion );
	};
};
if( !function_exists('editar_crear_clase_panel') ){
	function editar_crear_clase_panel( $id_clase = false ){
		global $admin;
		if( !$admin->permisos( 'Administrador' ) ){ return; };

		if( is_array( $id_clase ) ){
			$dia		= reset( $id_clase );
			$id_clase	= 0;
		};
		$html = '';
		require_once("templates/ubicaciones/editar_crear_clase.php");
		return $html;
	};
};
if( !function_exists('traer_profes_selector') ){
	function traer_profes_selector( $defecto = false, $especial = false ){

		$html = '<div class="decidir_profe">';
			$ins = get_posts(array(
				'post_type'			=> 'instructor',
				'posts_per_page'	=> -1,
				'orderby'			=> 'title',
				'order'				=> 'ASC',
				'fields'		=> 'ids',
			));
			if( $ins ){
				$html.= $especial ? '<select id="nombre_instructores_r">' : '';
				foreach( $ins as $i ){
					$instructor = new Instructor( $i );
					$selected = (string)$defecto === (string)$i ? true : false;
					$html .= $instructor->imprimir_loop( false, $selected, $especial );
				};
				$html.= $especial ? '</select>' : '';
			};
		$html .= '</div>';
		return $html;
	};
};
if( !function_exists('crear_clase') ){
	function crear_clase( $data = false ){
		global $admin;
		if( !$admin->permisos( 'Administrador' ) ){ return; };
		if( !$data  ){ return; };

		$format_data = array();

		foreach( $data as $d ){
			$format_data[$d[0]] = $d[1];
		};
		$fecha	= date_i18n( 'Y-m-d',$format_data['dia'] ).' '.$format_data['hora'].':'.$format_data['minutos'].':00';
		$clase = new Clase( $format_data['ID'] );

		if( isset( $format_data['ID'] ) && $format_data['ID'] != 0 ){
			/*EDITAR*/
			$clase->actualizar( $format_data['salon'], $format_data['instructor'], $fecha, $tipo = $format_data['tipo'] );
		}else{
			/*CREAR*/
			$clase->crear( $format_data['salon'], $format_data['instructor'], $fecha, $tipo = $format_data['tipo'] );
		};
	};
};
if( !function_exists('actualizar_forma_salon') ){
	function actualizar_forma_salon( $data = false ){
		if( !$data || !isset( $data['ID'] ) || !isset( $data['forma'] ) ){ return; };

		$salon = new Salon( $data['ID'] );
		$salon->actualizar_forma( $data['forma'] );

		return 'El salón ha sido actualizado correctamente';
	};
};
/*USUARIOS-----------------------------------------------------------------------*/
if( !function_exists('menu_usuarios') ){
	function menu_usuarios( $funcion = 'ver_opciones_usuario' ){
		global $letras;

		$buffer = $letras;

		$html = '';
		$usuarios = new WP_User_Query(array(
			'posts_per_page'	=> -1,
			'orderby'			=> 'display_name',
			'order'				=> 'ASC',
		));

		if( $usuarios->results ){
			foreach( $usuarios->results as $u ){
				$nombre	= strip_tags( $u->display_name );
				$mail	= strip_tags( $u->user_email );
				$inicial= strtolower( $nombre[0] );

				if( !isset( $buffer[$inicial] ) ){
					$buffer[$inicial] = '';
				};
				$attr	= $funcion === 'editar_reserva' || $funcion === 'nueva_compra'	? false	: $u->ID;
				$clase_e= $attr !== false				? 'basic_bookings symbols'	: 'basic_bookings symbols creando_reserva';
				$img	= $funcion !== 'editar_reserva' && $funcion !== 'nueva_compra' ? '<img src="'.imagenes(false).'/editar.png" />' : '<img src="'.imagenes(false).'/ojo.png" />';
				/*PARA LA FUNCION NUEVA COMPRA VAMOS A MANDARLE QUE ES JS*/
				$tipo_accion = $funcion === 'nueva_compra' ? 'js' : false;


				$buffer[$inicial] .= print_single_option(
					utf8_uri_encode( strtolower( $nombre ).' '.strtolower( $mail ) ),
					array(
						'titulo'		=> $nombre,
						'extra'			=> editar_opcion(
							$attr,
							$funcion,
							$tipo_accion,
							$clase_e,
							$img
						),
						'data_info'		=> $u->ID,
						'class'			=> 'bookings_bottom_single',
					),
					false
				);
				//echo( $buffer[$inicial] );
			};
			$html .= informacion_letras( $buffer );
		};

		return $html;
	};
};
if( !function_exists('ver_opciones_usuario') ){
	function ver_opciones_usuario( $user_id = false ){
		if( !$user_id ){ return; };
		$html = '';
		require_once("templates/usuarios/editar_crear_usuario.php");
		return $html;
	};
};
if( !function_exists('guardar_usuario_back') ){
	function guardar_usuario_back( $data = array() ){
		global $admin;
		if( !$admin->permisos('FrontDesk') ){ return; };
		if( !count( $data ) ){ return; };

		$data_format = array();
		foreach( $data as $info ){
			$data_format[$info[0]] = $info[1];
		};

		if( !isset( $data_format['ID'] ) || $data_format['ID'] == 'false' ){
			$mail_usuario	= isset( $data_format['wp_user']['user_email'] ) ? strip_tags( $data_format['wp_user']['user_email'] ) : false;
			$nombre_user	= isset( $data_format['wp_user']['display_name'] ) ? strip_tags( $data_format['wp_user']['display_name'] ) : false;
			$pass_user		= isset( $data_format['wp_user']['pass_user'] ) ? strip_tags( $data_format['wp_user']['pass_user'] ) : false;

			if( !$mail_usuario || !$nombre_user || !$pass_user ){
				return '<script>alert("Falta información para la creación de una cuenta");</script>';
			};
			if( !is_email( $mail_usuario ) ){
				return '<script>alert("El mail que has escrito no tiene un formato válido");</script>';
			};
			/*CHECAMOS MAIL EXISTENTE*/
			if( email_exists( $mail_usuario ) ){
				return '<script>alert("El mail que estás escribiendo ya tiene un usuario asignado");</script>';
			};
			/*CREAMOS USUARIO*/
			$user_id = wp_create_user( $mail_usuario, $pass_user, $mail_usuario );

			if ( is_wp_error($user_id) ){
				return '<script>alert("'. $user_id->get_error_message().'");</script>';
			};
			wp_update_user( array( 'ID' => $user_id, 'display_name' => $nombre_user ) );
			check_codigo_activacion( $user_id );
		};

		$id_user	= isset( $user_id )						? $user_id : $data_format['ID'];
		$facturacion= isset( $data_format['facturacion'] )	? $data_format['facturacion'] : false;
		$user_wp	= isset( $data_format['wp_user'] )		? $data_format['wp_user'] : false;
		$clases_user= isset( $data_format['clases_user'] )	? $data_format['clases_user'] : false;
		$meta		= $data_format;
		unset( $meta['ID'], $meta['facturacion'], $meta['wp_user'], $meta['clases_user'] );

		if( $facturacion ){ guardar_facturacion( $facturacion, $id_user, true ); };
		if( $meta ){
			if( !$admin->permisos('Gafa') && isset( $meta['rol'] ) ){
				$meta['rol'] = 0;
			};
			foreach( $meta as $meta_key=>$meta_value ){
				update_user_meta( $id_user, $meta_key, $meta_value );
			};
		};
		if( $user_wp ){
			$mensaje = salvar_cuenta( $id_user, $user_wp, false );
		};
		if( $clases_user ){
			/*
			**FORMATEAMOS TODO PRIMERO
			**PARA TENER UNA BUENA ESTRUCTURA
			*/
			$formateadas = $clases_definitivas = array();
			$key_primero = 0;
			foreach( $clases_user as $value ){
				if( $value[0] === 'numero' && $value[1] ){
					$formateadas[$key_primero]['cantidad'] = $value[1];
				}elseif( $value[0] === 'fecha' && $value[1] ){
					$formateadas[$key_primero]['fecha'] = $value[1];
					$key_primero++;
				};
			};

			/*UNA VEZ FORMATEADO VAMOS A CONFIGURAR CÓMO TIENEN QUE QUEDAR LAS CLASES DEL USUARIO*/
			foreach( $formateadas as $format ){
				if( isset( $format['cantidad'] ) && (int)$format['cantidad'] > 0 ){
					for( $i = 1; $i <= $format['cantidad'] ; $i++ ){
						$clases_definitivas[] = $format['fecha'];
					};
				};
			};
			$clases_definitivas = array_filter( $clases_definitivas );
			update_user_meta( $id_user,'cantidad_clases',$clases_definitivas );
		};
		return $mensaje;
	};
};
/*INTRUCTORES-------------------------------------------------------*/
if( !function_exists('menu_instructores') ){
	function menu_instructores(){
		global $letras;

		$buffer = $letras;

		$html = '';
		$instructores = get_posts(array(
			'post_type'			=> 'instructor',
			'posts_per_page'	=> -1,
			'orderby'			=> 'title',
			'order'				=> 'ASC',
			'fields'		=> 'ids',
		));

		if( $instructores ){
			foreach( $instructores as $i ){
				$instructor = new Instructor( $i );

				$nombre = $instructor->nombre;
				$inicial= strtolower( $nombre[0] );

				if( !isset( $buffer[$inicial] ) ){
					$buffer[$inicial] = '';
				};

				$buffer[$inicial] .= print_single_option( gen_slug( strtolower( $nombre ) ), array(
					'titulo'		=> '<img src="'.$instructor->foto.'"/>'.$nombre,
					'extra'			=> /*editar_opcion(
						$u->ID,
						'eliminar_usuario',
						'js',
						'basic_bookings symbols',
						'<img src="'.imagenes(false).'/trash_bookings.png" />'
					).*/editar_opcion(
						$instructor->ID,
						'ver_datos_instructor',
						false,
						'basic_bookings symbols',
						'<img src="'.imagenes(false).'/editar.png" />'
					),
					'class'			=> 'bookings_bottom_single',
				), false );

			};
			$html .= informacion_letras( $buffer );
		};

		return $html;
	};
};
function gen_slug($str){
    # special accents
    $a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','Œ','œ','R','r','R','r','R','r','S','s','S','s','S','s','Š','š','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ÿ','Z','z','Z','z','Ž','ž','?','ƒ','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?');
    $b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
    return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','-',''),str_replace($a,$b,$str)));
}
if( !function_exists('ver_datos_instructor') ){
	function ver_datos_instructor( $instructor_id ){
		$html = '';
		require_once("templates/instructores/editar_crear_instructor.php");
		return $html;
	};
};
if( !function_exists('guardar_instructor_back') ){
	function guardar_instructor_back( $data = array() ){
		global $admin;
		if( !$admin->permisos('Administrador') ){ return; };
		if( !count( $data ) ){ return; };

		$data_format = array();
		foreach( $data as $info ){
			if( !isset( $info[1] ) ){ $info[1] = ''; };
			$data_format[$info[0]] = $info[1];
		};

		if( !isset( $data_format['ID'] ) || $data_format['ID'] == 'false' ){
			/*NUEVO INSTRUCTOR*/
			$nuevo_instructor = crear( 'instructor' );
		};

		$id_instructor	= isset( $nuevo_instructor ) ? $nuevo_instructor : $data_format['ID'];
		$nombre			= isset( $data_format['wp_user']['nombre'] ) ? $data_format['wp_user']['nombre'] : false;
		$preguntas		= isset( $data_format['preguntas'] ) ? $data_format['preguntas'] : false;
		$meta			= $data_format;
		unset( $meta['ID'], $meta['wp_user'], $meta['preguntas'] );

		if( $preguntas ){
			$format_preguntas = array();
			foreach( $preguntas as $respuesta ){
				if( !isset( $respuesta[0] ) || !isset( $respuesta[1] ) ){ continue; };
				$format_preguntas[$respuesta[0]] = $respuesta[1];
			};
			update_post_meta( $id_instructor, '_preguntas', $format_preguntas );
		};
		if( $meta ){
			foreach( $meta as $meta_key=>$meta_value ){
				update_post_meta( $id_instructor, $meta_key, $meta_value );
			};
		};
		if( $nombre ){
			actualizar_nombre( $id_instructor, $nombre );
		};
	};
};

/*RESERVACIONES*/
if( !function_exists('panel_reservaciones') ){
	function panel_reservaciones(){
		global $letras;

		$buffer_datos = $letras;

		$buffer_usuarios = $buffer_instructores = $buffer_ubicaciones = array();

		$html = '';
		$reservaciones = get_posts(array(
			'post_type'			=> 'reserva',
			'posts_per_page'	=> -1,
			'orderby'			=> 'title',
			'order'				=> 'ASC',
			'fields'			=> 'ids',
			'post_status'		=> 'future',
		));
		if( $reservaciones ){

			foreach( $reservaciones as $r ){

				/*TENEMOS LA RESERVACION*/
				$reservacion= new Reserva( $r );

				/*USUARIO-------------------------------------*/
				$usuario	= get_user_by('id', $reservacion->comprador );
				$nombre		= $usuario->display_name;
				$inicial= strtolower( $nombre[0] );

				if( !isset( $buffer_datos[$inicial] ) ){
					$buffer_datos[$inicial] = '';
				};
				if( !isset ($buffer_usuarios[$reservacion->comprador]) ){
					/*NO REPETIMOS USUARIOS*/
					$buffer_usuarios[$reservacion->comprador] = true;
					$buffer_datos[$inicial] .= print_single_option( strtolower( $nombre ), array(
						'titulo'		=> $nombre,
						'extra'			=> editar_opcion(
							$reservacion->comprador,
							'reservaciones_usuario',
							false,
							'basic_bookings symbols esconder_hijos',
							'<img src="'.imagenes(false).'/ojo.png" />'
						),
						'class'			=> 'bookings_bottom_single filtrado_usuario',
					), false );
				};

				/*INSTRUCTOR-------------------------------------*/
				$clase = new Clase( $reservacion->clase );

				$instructor = new Instructor( $clase->instructor );
				$nombre		= $instructor->nombre;
				$inicial= strtolower( $nombre[0] );

				if( !isset( $buffer_datos[$inicial] ) ){
					$buffer_datos[$inicial] = '';
				};
				if( !isset ($buffer_instructores[$instructor->ID]) ){
					/*NO REPETIMOS INSTRUCTORES*/
					$buffer_instructores[$instructor->ID] = true;
					$buffer_datos[$inicial] .= print_single_option( strtolower( $nombre ), array(
						'titulo'		=> $nombre,
						'extra'			=> editar_opcion(
							$instructor->ID,
							'reservaciones_instructor',
							false,
							'basic_bookings symbols esconder_hijos',
							'<img src="'.imagenes(false).'/ojo.png" />'
						),
						'class'			=> 'bookings_bottom_single filtrado_instructor',
					), false );
				};
				/*UBICACIONES-------------------------------------*/

				$salon		= new Salon( $clase->salon );
				$ubicacion	= new Ubicacion( $salon->ubicacion );

				$nombre		= $ubicacion->nombre;
				$inicial= strtolower( $nombre[0] );

				if( !isset( $buffer_datos[$inicial] ) ){
					$buffer_datos[$inicial] = '';
				};
				if( !isset ($buffer_ubicaciones[$ubicacion->ID]) ){
					/*NO REPETIMOS UBICACIONES*/
					$buffer_ubicaciones[$ubicacion->ID] = true;
					$buffer_datos[$inicial] .= print_single_option( strtolower( $nombre ), array(
						'titulo'		=> $nombre,
						'extra'			=> editar_opcion(
							array( $ubicacion->ID, false ),
							'ver_menu_salon',
							false,
							'basic_bookings symbols esconder_hijos',
							'<img src="'.imagenes(false).'/ojo.png" />',
							false,
							'cont_reservacion_ubi'
						),
						'class'			=> 'bookings_bottom_single filtrado_ubicacion',
					), false );
				};
			};
			$html .= informacion_letras( $buffer_datos );
			$html .= '<script>habilitar_filtros(  );</script>';
		};

		return $html;
	};
};
if( !function_exists('editar_reserva') ){
	function editar_reserva( $id_reserva = false ){
		global $admin;
		if( !$admin->permisos('FrontDesk') ){ return; };
		$html = '';
		require_once("templates/reservas/editar_crear_reserva.php");
		return $html;
	};
};
if( !function_exists('imprimir_forma') ){
	function imprimir_forma( $id_clase = false ){
		if( !$id_clase ){ return; };
		$clase		= new Clase( $id_clase );
		$html = $clase->imprimir_forma( false );
		return $html;
	};
};
if( !function_exists('guardar_reserva') ){
	function guardar_reserva( $data = false ){
		global $admin;
		if( !$admin->permisos('FrontDesk') ){ return; };
		if( !$data || !isset( $data['ID'] ) || !isset( $data['clase'] ) || !isset( $data['bici'] ) ){ return; };

		$id_reserva	= $data['ID'];

		$reserva	= new Reserva( $id_reserva );

		/*COMPROBAMOS ANTES DE ACTUALIZAR*/
		if( $reserva->ID == 'false' ){
			if( !isset( $data['comprador'] ) ){
				return '<script>alert("No hay ningún comprador seleccionado");</script>';
			};
			/*CREAMOS RESERVA*/
			$reserva = new Reserva();
			$reserva->set_reserva( $data, $data['comprador'] );
			$reserva->comprar();

			if( !isset( $reserva->redirect ) ){
				$reserva->mensaje->escribir = false;
				return $reserva->mensaje->imprimir();
			};
			return '<script>alert("La reserva se ha creado correctamente","mensaje");</script>';;
		};
		$reserva->actualizar( $data );
	};
};
/*CONFIGURACIONES----------*/
if( !function_exists('configuraciones_web') ){
	function configuraciones_web(){
		$html  = '';
		$html .= print_single_option( 'config_paquetes', array(
			'accion'	=> array(
				'funcion'	=> 'config_paquetes',
				'attr'		=> false,
			),
			'recipiente'	=> 'panel_final',
			'titulo'		=> 'Paquetes',
		), false );
		$html .= print_single_option( 'config_redes', array(
			'accion'	=> array(
				'funcion'	=> 'config_redes',
				'attr'		=> false,
			),
			'recipiente'	=> 'panel_final',
			'titulo'		=> 'Redes sociales',
		), false );
		$html .= print_single_option( 'config_pag1', array(
			'accion'	=> array(
				'funcion'	=> 'config_pag',
				'attr'		=> 97,
			),
			'recipiente'	=> 'panel_final',
			'titulo'		=> 'Términos y condiciones',
		), false );
		$html .= print_single_option( 'config_faqs', array(
			'accion'	=> array(
				'funcion'	=> 'config_faqs',
				'attr'		=> false,
			),
			'recipiente'	=> 'panel_final',
			'titulo'		=> 'Preguntas frecuentes',
		), false );
		$html .= print_single_option( 'config_pag2', array(
			'accion'	=> array(
				'funcion'	=> 'config_pag',
				'attr'		=> 99,
			),
			'recipiente'	=> 'panel_final',
			'titulo'		=> 'Políticas de privacidad',
		), false );
		$html .= print_single_option( 'config_pag3', array(
			'accion'	=> array(
				'funcion'	=> 'config_pag',
				'attr'		=> DESARROLLO ? 1217 : 1690,
			),
			'recipiente'	=> 'panel_final',
			'titulo'		=> '¿Quiénes Somos?',
		), false );


		return $html;
	};
};
if( !function_exists('config_paquetes') ){
	function config_paquetes(){
		$html = '';
		require_once ("templates/configuraciones/paquetes.php");
		return $html;
	};
};
if( !function_exists('config_redes') ){
	function config_redes(){
		$html = '';
		require_once ("templates/configuraciones/redes.php");
		return $html;
	};
};
if( !function_exists('config_faqs') ){
	function config_faqs(){
		$html = '';
		require_once ("templates/configuraciones/faqs.php");
		return $html;
	};
};
if( !function_exists('config_pag') ){
	function config_pag( $id_post = false ){
		if( !$id_post ){ return 'Hubo un error con el id enviado'; };
		$html = '';
		require_once ("templates/configuraciones/pagina.php");
		return $html;
	};
};
if( !function_exists('guardar_redes') ){
	function guardar_redes( $data = false ){
		global $admin;
		if( !$admin->permisos('Gafa') ){ return; };
		if( !$data ){ return; };
		$format_data = get_redes();
		foreach( $data as $d ){
			$format_data[$d[0]] = $d[1];
		};
		update_option('redes_sociales',$format_data);
	};
};
if( !function_exists('guardar_pagina') ){
	function guardar_pagina( $data = false ){
		global $admin;
		if( !$admin->permisos('Gafa') ){ return; };
		if( !$data ){ return; };
		if( !isset( $data['id'] ) || ( $data['id'] !== '97' && $data['id'] !== '99' && $data['id'] != '1217' && $data['id'] != '1690' ) ){ return; };

		$texto = isset( $data['value'] ) ? $data['value'] : false;
		if( !$texto ){ return; };
		actualizar_contenido( $data['id'], $texto );
	};
};
if( !function_exists('actualizar_faqs') ){
	function actualizar_faqs( $data = false ){
		global $admin;
		if( !$admin->permisos('Gafa') ){ return; };
		if( !$data ){ return; };

		foreach( $data as $d ){
			if( !$d['id'] ){
				$d['id'] = crear( 'faq' );
			};

			actualizar_nombre( $d['id'], $d['titulo'] );
			actualizar_contenido( $d['id'], $d['texto'] );
		};
	};
};
if( !function_exists('actualizar_paquetes') ){
	function actualizar_paquetes( $data = false ){
		global $admin;
		if( !$data ){ return; };
		if( !$admin->permisos('Gafa') ){ return; };

		foreach( $data as $d ){
			if( !$d['id'] ){ continue; };
			update_post_meta( $d['id'],'_cantidad',$d['cantidad'] );
			update_post_meta( $d['id'],'_cantidad',$d['cantidad'] );
			update_post_meta( $d['id'],'_expiracion',$d['expiracion'] );
		};
	};
};
/*REPETIR SEMANA ANTERIOR*/
if( !function_exists('repetir_semana_anterior') ){
	function repetir_semana_anterior( $dia = false ){
		global $admin;
		if( !$dia ){ return; };
		if( !$admin->permisos('Administrador') ){ return; };
		$anterior = $dia- dias(7);

		$entradas = get_posts(array(
			'post_type'			=> 'clase',
			'posts_per_page'	=> -1,
			'fields'			=> 'ids',
			'post_status'		=> array('future','publish'),
			'date_query' => array(
				array(
					'year'  => date_i18n('Y', $anterior),
					'month' => date_i18n('m', $anterior),
					'day'   => date_i18n('d', $anterior),
				),
			),
		));
		if( !$entradas ){ return '<script>alert("No hay clases asignadas en la semana anterior")</script>'; };

		foreach( $entradas as $id ){
			$c = new Clase( $id );

			$fecha = $c->fecha+dias(7);
			$fecha	= date_i18n( 'Y-m-d',$fecha ).' '.date_i18n( 'H',$fecha ).':'.date_i18n( 'i',$fecha ).':00';
			$c->duplicar( $fecha );
		};
	};
};
if( !function_exists('descargar_db_ajax') ){
	function descargar_db_ajax(){
		$callStartTime = microtime(true);

		require_once("classes/excell/PHPExcel.php");
		define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

		$html = '';

		$objPHPExcel = new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("Wisquimas")
									 ->setLastModifiedBy("Wisquimas")
									 ->setTitle("Base de datos Síclo")
									 ->setSubject("Estructura completa de objetos del sistema")
									 ->setDescription("")
									 ->setKeywords("office PHPExcel php")
									 ->setCategory("");

		/*DICCIONARIO DE PROPIEDADES*/
		$letras_array = array(
			'A',
			'B',
			'C',
			'D',
			'E',
			'F',
			'G',
			'H',
			'I',
			'J',
			'K',
			'L',
			'M',
			'N',
			'O',
			'P',
			'Q',
			'R',
			'S',
			'T',
			'U',
			'V',
			'W',
			'X',
			'Y',
			'Z',
		);


		/*UBICACIONES---------------------------------------------------------------*/
		$objPHPExcel->setActiveSheetIndex(0);/*SETEAMOS HOJA*/


		$hojas = array(
			array(
				'clase'		=> 'Ubicacion',
				'nombre'	=> 'Ubicaciones',
				'post_type'	=> 'ubicacion',
			),
			array(
				'clase'		=> 'Salon',
				'nombre'	=> 'Salones',
				'post_type'	=> 'salon',
			),
			array(
				'clase'		=> 'Reserva',
				'nombre'	=> 'Reservaciones',
				'post_type'	=> 'reserva',
			),
			array(
				'clase'		=> 'Pedido',
				'nombre'	=> 'Pedidos',
				'post_type'	=> 'pedido',
			),
			array(
				'clase'		=> 'Paquete',
				'nombre'	=> 'Paquetes',
				'post_type'	=> 'paquete',
			),
			array(
				'clase'		=> 'Instructor',
				'nombre'	=> 'Instructores',
				'post_type'	=> 'instructor',
			),
			array(
				'clase'		=> 'Cupon',
				'nombre'	=> 'Cupones',
				'post_type'	=> 'cupon',
			),
			array(
				'clase'		=> 'Clase',
				'nombre'	=> 'Clases',
				'post_type'	=> 'clase',
			),
			array(
				'clase'		=> 'Cliente',
				'nombre'	=> 'Clientes',
				'post_type'	=> 'users',
			),
			array(
				'clase'		=> 'Producto',
				'nombre'	=> 'Productos',
				'post_type'	=> 'producto',
			),
		);
		foreach ( $hojas as $indice_hoja => $hoja) {
			if( $indice_hoja != 0 ){
				/*CREAMOS UNA HOJA NUEVA POR CADA DATO, MENOS LA PRIMERA VEZ*/
				$objPHPExcel->createSheet();
			};
			/*
			** CREAMOS LA LLAMADA A BASE DE DATOS DEL post_type
			** Y PROCESAMOS
			*/
			/*HACK para clientes*/
			if( $hoja['post_type'] === 'users' ){
				$posts_ = get_users(array(
					'fields'			=> 'ids',
				));
			}else{
				$posts_ = get_posts(array(
					'post_type'			=> $hoja['post_type'],
					'posts_per_page'	=> -1,
					'post_status'   => 'any',
					'fields'			=> 'ids',
				));
			};

			if( $posts_ ){
				foreach ($posts_ as $k => $id_ub) {
					$indice = $k+2;

					/*HACK PARA CUPONES*/
					if( $hoja['post_type'] === 'cupon' ){
						$u		= new $hoja['clase']( get_the_title( $id_ub ) );
					}else{
						$u		= new $hoja['clase']( $id_ub );
					};
					$data	= $u->get_array_data();

					$indice_letras = 0;
					foreach( $data as $titulo => $valor ){
						$letra = $letras_array[$indice_letras];
						if( $k == 0 ){
							/*
							**SETEAMOS LA CABECERA
							*/
							$objPHPExcel->setActiveSheetIndex( $indice_hoja )->setCellValue($letra.'1', (string)$titulo);
						};
						if( is_object( $valor ) ){
							$valor_format = print_r( $valor,true);
						}elseif( is_array( $valor ) ){
							$valor_format = print_r( $valor,true);
						}else{
							$valor_format = $valor;
						};

						$objPHPExcel->setActiveSheetIndex( $indice_hoja )->setCellValue($letra.$indice, $valor_format);
						$indice_letras++;
					};

				}
			};

			// Rename worksheet
			$objPHPExcel->getActiveSheet()->setTitle( $hoja['nombre'] );
		}


		/*FINALIZAR CREACION DE HOJAS------------------------------*/
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		
		/*
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save(str_replace('ajax.php', 'archivos_excell'.DIRECTORY_SEPARATOR.'excell.xlsx', __FILE__));
		*/


		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save(str_replace('ajax.php', 'archivos_excell'.DIRECTORY_SEPARATOR.'excell.xls', __FILE__));

		/*FINALIZADO*/
		$callEndTime = microtime(true);
		$callTime = $callEndTime - $callStartTime;

		$html.= 'El proceso tardó '.sprintf('%.4f',$callTime)." segundos".EOL;
		$html.= date('H:i:s')." Finalizada la creación de archivos".EOL;

		$html.= '<a href="'.admin(false).'/archivos_excell/excell.xls" class="boton">Descargar para Excell5</a>';
		//$html.= '<a href="'.admin(false).'/archivos_excell/excell.xls" class="boton">Descargar para Excell2007</a>';

		return $html;
	};
};
?>
