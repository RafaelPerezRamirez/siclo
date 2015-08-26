<?php require_once('../../../../../wp-load.php');
global $current_user;

$mensajes = new Mensajes();

if( !isset( $_POST['security'] ) || !isset( $_POST['invitado1'] ) || !isset( $_POST['invitado2'] ) || !is_user_logged_in() ){
	$mensajes->add_error('ERROR: 6969');
	$mensajes->imprimir( 'JSON' );
	die();
};
$invitado1 = strip_tags( $_POST['invitado1'] );
$invitado2 = strip_tags( $_POST['invitado2'] );

/*COMPROBAMOS ERRORES--------------------------------------------------------------------------------------*/
if( $invitado1 === $invitado2 ){
	$mensajes->add_error('Por favor, envía dos correos electrónicos distintos para invitar');
};
if( email_exists( $invitado1 ) ){
	$mensajes->add_error('La dirección de correo "'.$invitado1.'" ya pertenece a un usuario activo de la web');
	$mensajes->add_data('invitado_1');
};
if( email_exists( $invitado2 ) ){
	$mensajes->add_error('La dirección de correo "'.$invitado2.'" ya pertenece a un usuario activo de la web');
	$mensajes->add_data('invitado_2');
};
if( !$mensajes->ok ){
	$mensajes->imprimir( 'JSON' );
	die();
};

/*GUARDAMOS INVITACIONES :)--------------------------------------------------------------------------------------*/
$ok = annadir_invitados( $current_user->ID, array( $invitado1, $invitado2 ) );

if( $ok === true ){
	$mensajes->add_mensaje('Se han añadido correctamente como invitados los dos usuarios');
}else{
	$mensajes->add_error( $ok['mensaje'] );
	$mensajes->add_data( $ok['data'], true );
};
$mensajes->imprimir( 'JSON' );
die();
?>