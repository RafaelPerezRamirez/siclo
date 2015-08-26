<?php require_once('../../../../../wp-load.php');
global $current_user;
if( !isset( $_POST['security'] ) || !is_user_logged_in() ){
	die( json_encode(array(
		'ok'		=> false,
		'mensaje'	=> 'ERROR: 6969',
	) ) );
};

$reserva_id	= isset( $_POST['reserva_id'] )	? strip_tags( $_POST['reserva_id'] ) : false;

$reserva = $data_to_mail = new Reserva( $reserva_id );

/*CHECK MISMO COMPRADOR*/
if( (int)$current_user->ID !== (int)$reserva->comprador ){
	die( json_encode(array(
		'ok'		=> false,
		'mensaje'	=> 'Debes ser el comprador de la reserva para proceder',
	) ) );
};
$reserva->eliminar();

$c	= numero_clases_user( $current_user->ID );

mail_clase_cancelada( $data_to_mail, $current_user );

die( json_encode(array(
	'ok'		=> true,
	'mensaje'	=> 'Tu reserva se ha cancelado correctamente',
	'clases'	=> $c,
) ) );

?>