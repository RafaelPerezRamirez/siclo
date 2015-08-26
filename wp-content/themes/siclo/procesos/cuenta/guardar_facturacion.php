<?php require_once('../../../../../wp-load.php');
if( !isset( $_POST['security'] ) || !is_user_logged_in() ){
	die( json_encode(array(
		'ok'		=> false,
		'mensaje'	=> 'ERROR: 6969',
	) ) );
};
global $current_user;

guardar_facturacion( $_POST['data'], $current_user->ID );

die( json_encode(array(
	'ok'		=> true,
	'mensaje'	=> 'Los datos han sido guardados correctamente.',
) ) );
?>