<?php
global $roles,$admin;

$usuario		= get_user_by('id',$user_id);
$meta			= get_user_meta( $user_id );
$display_name	= isset( $usuario->display_name ) ? $usuario->display_name : '';

$html .='<div class="editor user_edit_create" data-id_usuario="'.$user_id.'">';
$html .='<div class="cabecera_editor cabecera_edit_user">';
	/*COLOR PRIMARIO-----------------------*/
	$html .='<div class="titulo_cabecera isSelected" data-header="user">Datos del usuario</div>';
	
	/*COLOR SECUNDARIO-------------------*/
	$html .='<div class="titulo_cabecera" data-header="history">Historial de compra</div>';
	
	/*GUARDAR--------------*/
	$html.= '<div id="guardar_usuario" class="guardar_informacion">Guardar</div>';
$html .='</div>';

$html .= '<div data-user_content="history" class="hideContent">';
	if( isset( $usuario->data->ID ) ){
		$html.= reservaciones_usuario( $usuario->ID );
	};
$html.='</div>';
	$html.='<div class="form_user_1" data-user_content="user" class="">';
		$html .='<div class="upcoming_reservations user_billing_data">';
			$html .= '<h2>INFORMACIÓN</h2>';	
		$html .='</div>';
		$inputs_user = array(
			'user_data_nombre'	=> array(
				'type'			=> 'text',
				'value'			=> $display_name,
				'placeholder'	=> 'Nombre completo',
				'class'			=> 'third_input',
				'name'			=> 'wp_user[display_name]',
			),
			'user_data_direccion'	=> array(
				'type'			=> 'mail',
				'value'			=> isset( $usuario->user_email ) ? $usuario->user_email : '',
				'placeholder'	=> 'Mail',
				'class'			=> 'third_input',
				'name'			=> 'wp_user[user_email]',
			),
			'user_data_birth'	=> array(
				'type'			=> 'date',
				'value'			=> isset( $meta['user_nacimiento'] ) ? reset( $meta['user_nacimiento'] ) : '',
				'placeholder'	=> 'Fecha de Nacimiento DD-MM-AA',
				'class'			=> 'third_input',
				'name'			=> 'wp_user[user_nacimiento]',
			),
			'user_data_pass'	=> array(
				'type'			=> 'password',
				'value'			=> '',
				'placeholder'	=> 'Cambiar Contraseña',
				'class'			=> 'third_input user_data_pass',
				'name'			=> 'wp_user[pass_user]',
			),
			'user_data_confirm_pass'	=> array(
				'type'			=> 'password',
				'value'			=> '',
				'placeholder'	=> 'Confirma tu contraseña',
				'class'			=> 'third_input user_data_confirm_pass',
			),
		);
		$html.= print_inputs( $inputs_user, false );
		
		$html .='<div class="upcoming_reservations user_billing_data">';
			$html .= '<h2>Datos de facturación</h2>';	
		$html .='</div>';
		
		$facturacion = get_user_meta( $user_id,'_facturacion', true );
		
		$inputs_user = array(
			'nombre_facturacion'	=> array(
				'type'			=> 'text',
				'value'			=> isset( $facturacion['nombre'] ) ? $facturacion['nombre'] : '',
				'placeholder'	=> 'Nombre',
				'maxlength'		=> 50,
				'class'			=> 'third_input',
				'name'			=> 'facturacion[nombre]',
			),
			'apellidos_facturacion'	=> array(
				'type'			=> 'text',
				'value'			=> isset( $facturacion['apellidos'] ) ? $facturacion['apellidos'] : '',
				'placeholder'	=> 'Apellidos',
				'maxlength'		=> 50,
				'class'			=> 'third_input',
				'name'			=> 'facturacion[apellidos]',
			),
			'email_facturacion'	=> array(
				'type'			=> 'email',
				'value'			=> isset( $facturacion['email'] ) ? $facturacion['email'] : '',
				'placeholder'	=> 'Email',
				'class'			=> 'third_input',
				'name'			=> 'facturacion[email]',
			),
			'user_data_address'	=> array(
				'type'			=> 'text',
				'value'			=> isset( $facturacion['calleyNumero'] ) ? $facturacion['calleyNumero'] : '',
				'placeholder'	=> 'Dirección',
				'name'			=> 'facturacion[calleyNumero]',
			),
			'user_data_city'	=> array(
				'type'			=> 'text',
				'value'			=> isset( $facturacion['ciudad'] ) ? $facturacion['ciudad'] : '',
				'placeholder'	=> 'Ciudad',
				'class'			=> 'third_input',
				'name'			=> 'facturacion[ciudad]',
			),
			'user_data_colonia'	=> array(
				'type'			=> 'text',
				'value'			=> isset( $facturacion['colonia'] ) ? $facturacion['colonia'] : '',
				'placeholder'	=> 'Colonia',
				'class'			=> 'third_input',
				'name'			=> 'facturacion[colonia]',
			),
			'user_data_addressuser_data_town'	=> array(
				'type'			=> 'text',
				'value'			=> isset( $facturacion['estado'] ) ? $facturacion['estado'] : '',
				'placeholder'	=> 'Estado',
				'class'			=> 'half_input',
				'name'			=> 'facturacion[estado]',
			),
			'user_data_cp'		=> array(
				'type'			=> 'number',
				'value'			=> isset( $facturacion['cp'] ) ? $facturacion['cp'] : '',
				'placeholder'	=> 'C.P.',
				'class'			=> 'half_input',
				'name'			=> 'facturacion[cp]',
			),
			'user_data_phone'		=> array(
				'type'			=> 'tel',
				'value'			=> isset( $facturacion['telefono'] ) ? $facturacion['telefono'] : '',
				'placeholder'	=> 'Teléfono',
				'class'			=> 'half_input',
				'name'			=> 'facturacion[telefono]',
			),
		);
		$html.= print_inputs( $inputs_user, false );
		
		
		/*ROLES--------------------------------*/
		if( $admin->permisos('Gafa') ){
			$html .='<div class="upcoming_reservations user_billing_data">';
				$html .= '<h2>Rol de usuario</h2>';
			$html .='</div>';
			$rol_usuario = (int)get_user_meta( $user_id,'rol',true );
			
			$html.='<div class="rolSelect user_data_role" data-name="rol" data-value="'.$rol_usuario.'">';
				$html.='<span class="rol_text">Rol '.get_role_name( $rol_usuario ).'</span>';
				$html.='<div class="rol_options">';
					foreach( $roles as $k=>$rol ){
						$html.='<p data-value="'.$k.'">Rol '.$rol.'</p>';
					};
				$html.='</div>';
			$html.= '</div>';
		};
		if( $admin->permisos('FrontDesk') ){
			$html .='<div class="upcoming_reservations user_billing_data"><h2>Clases del usuario</h2></div>';
			$html.= expiracion_clases( $user_id, true);
		};
	$html .='</div>';
$html.='</div>';
?>