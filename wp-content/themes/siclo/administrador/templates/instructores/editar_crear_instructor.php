<?php 
global $admin;

$permisos_admin = $admin->permisos('Administrador');

$instructor = new Instructor( $instructor_id );
$ubicacion = new Ubicacion( $instructor_id );
$display_name	= isset( $usuario->display_name ) ? $usuario->display_name : '';

$inputs_instructor = array(
	'instructor_data_nombre'	=> array(
		'type'			=> 'text',
		'value'			=> $instructor->nombre,
		'placeholder'	=> 'Nombre completo',
		'name'			=> 'wp_user[nombre]',
		'class'			=> 'third_input',
	),
	'instructor_data_fecha'	=> array(
		'type'			=> 'text',
		'value'			=> $instructor->nacimiento,
		'placeholder'	=> 'Lugar Nacimiento',
		'name'			=> 'nacimiento',
		'class'			=> 'third_input',
	),
	'instructor_data_mail'	=> array(
		'type'			=> 'mail',
		'value'			=> $instructor->mail,
		'placeholder'	=> 'Mail',
		'class'			=> 'third_input',
		'name'			=> 'mail',
	),
	'instructor_data_phone'	=> array(
		'type'			=> 'text',
		'value'			=> $instructor->telefono,
		'placeholder'	=> 'Teléfono',
		'class'			=> 'third_input',
		'name'			=> 'telefono',
	),
);

$html .='<div class="editor instructor_editor" data-id_instructor="'.$instructor->ID.'">';
	$html .='<div class="cabecera_editor cabecera_edit_user">';
		if( $permisos_admin ){
			$html .='<div class="eliminar_instructor eliminar_post" data-id_post="'.$instructor->ID.'"><img src="'.imagenes(false).'/eliminar.png"/></div>';
			$html .='<div class="titulo_cabecera instructor_cabecera_current" data-instructor="datos">Datos del instructor</div>';
			$html .='<div class="titulo_cabecera" data-instructor="proximas">Próximas clases</div>';
			/*GUARDAR--------------*/
			$html.= '<div id="guardar_instructor" class="guardar_informacion">Guardar</div>';
		}else{
			$html.= '<br/>';
		};
	$html .='</div>';
	if( $permisos_admin ){
		
		$html.='<div data-user_content="datos" class="form_user_1">';
			$html .='<div class="upcoming_reservations user_billing_data">';
				$html .= '<h2>INFORMACIÓN</h2>';
			$html .='</div>';
			$html.= print_inputs( $inputs_instructor, false );
			$html.='<div class="instructor_data_upload inlineB half_input">';
				//FOTO PRINCIPAL----------------------
				$style_foto = $instructor->foto ? 'style="background-image:url('.$instructor->foto.')"' : '';
				$html.='<div data-name="foto_principal" class="inlineB b_d-attach" data-value="'.$instructor->foto.'" '.$style_foto.'></div>';
			$html.='</div>';
			$html .= $instructor->preguntas_back();
		$html .='</div>';
	};
	$oculto_cal = $permisos_admin ? 'hideContent' : '';
	/*CALENDARIO INSTRUCTOR--------------------------------------------*/
	$html.= '<div class="instructor_incoming_classes '.$oculto_cal.'" data-user_content="proximas">';
		$html.= reservaciones_instructor( $instructor_id );
	$html.= '</div>';
$html.= '</div>';
?>