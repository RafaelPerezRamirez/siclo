<?php require_once('../../../../../wp-load.php');
global $current_user;

$mensajes = new Mensajes();

if( !isset( $_POST['security'] ) || !isset( $_POST['token'] ) || !is_user_logged_in() ){
	$mensajes->add_error('6969');
	die( $mensajes->imprimir('JSON') );
};

$tarjeta			= $_POST['token'];

$pago = new Pago_Conekta();
$pago->set_tarjeta( $tarjeta );

$pago->eliminar_tarjeta( $current_user->ID );

die( $pago->mensajes->imprimir('JSON') );
?>