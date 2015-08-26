<?php require_once('../../../../../wp-load.php');
global $current_user;
if( !isset( $_POST['security'] ) || !is_user_logged_in() ){
	die( json_encode(array(
		'ok'		=> false,
		'mensaje'	=> 'ERROR: 6969',
	) ) );
};
cambio_contrasenna_proceso( $_POST['user_password'], $_POST['user_password2'] );
?>