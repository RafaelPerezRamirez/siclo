<?php require_once('../../../../../wp-load.php');

if( !isset( $_POST['security'] ) ){
	die( json_encode(array(
		'ok'		=> false,
		'mensaje'	=> 'ERROR: 6969',
	) ) );
};
$mail_usuario	= isset( $_POST['mail_usuario'] )	? strip_tags( $_POST['mail_usuario'] ) : false;
$nombre_user	= isset( $_POST['nombre_user'] )	? strip_tags( $_POST['nombre_user'] ) : false;
$pass_user		= isset( $_POST['pass_user'] )		? strip_tags( $_POST['pass_user'] ) : false;
$ajax			= isset( $_POST['redireccion'] )	? strip_tags( $_POST['redireccion'] ) : false;
$clase_id		= isset( $_POST['clase_mostrada'] )	? strip_tags( $_POST['clase_mostrada'] ) : false;

if( !$mail_usuario || !$pass_user ){
	die( json_encode(array(
		'ok'		=> false,
		'mensaje'	=> 'ERROR: 6969',
	) ) );
};

if( $user = email_exists( $mail_usuario ) ){
	/*ACCESO*/
	$user = get_user_by( 'id', $user );
	
	$cred = array(
		'user_login'	=> $user->data->user_login,
		'user_password'	=> $pass_user,
	);
	$user = wp_signon( $cred, false );
	if ( is_wp_error($user) ){
		die( json_encode(array(
			'ok'		=> false,
			'mensaje'	=> $user->get_error_message(),
		) ) );
	};
// 	enviar_mail_registro( $user );
	/*MANDAMOS OK*/
	ajax_registro( $ajax, $user, $clase_id );
	die( json_encode(array(
		'ok'		=> true,
	) ) );
}else{
	/*REGISTRO*/
	$user_id = wp_create_user( $mail_usuario, $pass_user, $mail_usuario );
	
	if ( is_wp_error($user_id) ){
		die( json_encode(array(
			'ok'		=> false,
			'mensaje'	=> $user_id->get_error_message(),
		) ) );
	};
	wp_update_user( array( 'ID' => $user_id, 'display_name' => $nombre_user ) );
	update_user_meta($user_id, 'cantidad_clases', array());
	check_codigo_activacion( $user_id );
	
	/*ACCESO*/
	$cred = array(
		'user_login'	=> $mail_usuario,
		'user_password'	=> $pass_user,
	);
	$user = wp_signon( $cred, false );
	if ( is_wp_error($user) ){
		die( json_encode(array(
			'ok'		=> false,
			'mensaje'	=> $user->get_error_message(),
		) ) );
	};
	enviar_mail_registro( $user );
	ajax_registro( $ajax, $user, $clase_id );
	die( json_encode(array(
		'ok'		=> true,
	) ) );
};
?>