<?php 
set_time_limit ( 0 );
require_once('../../../../../wp-load.php');
global $current_user;
if( !isset( $_POST['security'] ) || !isset( $_POST['token'] ) || !is_user_logged_in() ){
	echo '<!--DATA_AJAX--><div id="data_en_asd">';
	echo '</div><!--DATA_AJAXEND-->';
	die( json_encode(array(
		'ok'		=> false,
		'mensaje'	=> 'ERROR: 6969',
	) ) );
};
/*
**VARIABLES
*/
$tarjeta			= $_POST['token'];
$paquete			= $_POST['paquete'];
$guardar_tarjeta	= isset( $_POST['guardar_tarjeta'] )	? $_POST['guardar_tarjeta']	: false;
$comprador			= isset( $_POST['cliente'] )			? $_POST['cliente']			: $current_user->ID;
/*
**VARIABLE ESPECIAL PARA RECIBIR PRODUCTOS DESDE EL BACKEND
*/
$productos			= isset( $_POST['productos'] )			? $_POST['productos']		: false;

$checkout = new Checkout( $paquete, false, $comprador, $productos );

if( !$checkout->paquete->data && !$productos ){
	/*
	**AÑADIMOS LA COMPROBACIÓN DE PRODUCTOS
	*/
	echo '<!--DATA_AJAX--><div id="data_en_asd">';
	echo '</div><!--DATA_AJAXEND-->';
	
	$mensaje = $paquete == 'regalo' ? 'Ya ha realizado una compra previa, este paquete no puede ser seleccionado' : 'El paquete que intenta comprar no existe';
	die( json_encode(array(
		'ok'		=> false,
		'mensaje'	=> $mensaje
	) ) );
};
$checkout->metodos_pago['conekta']->set_tarjeta( $tarjeta );


$checkout->finalizar_compra( $guardar_tarjeta );

if( !$checkout->mensaje->ok ){
	echo '<!--DATA_AJAX--><div id="data_en_asd">';
	echo '</div><!--DATA_AJAXEND-->';
	die( $checkout->mensaje->imprimir( 'JSON' ) );
};
$redirect = $checkout->redirect;


/*TODO OK COMPROBAMOS SI TAMBIEN TOCA RESERVAR*/
if( isset( $_POST['reserva'] ) ){
	/*SI YA TIENE COMPLETAMOS LA COMPRA DE FORMA AUTOMÁTICA*/
	$reserva = new Reserva();
	
	$data = $_POST['reserva'];
	//$data['bici']	= unserialize( str_replace('\\','', $data['bici'] ) );
	
	$reserva->set_reserva( $data, $comprador );
	$reserva->comprar();
	
	if( !$reserva->mensaje->ok || !$reserva->redirect ){
	echo '<!--DATA_AJAX--><div id="data_en_asd">';
	echo '</div><!--DATA_AJAXEND-->';
		die( $reserva->mensaje->imprimir( 'JSON' ) );
	}else{
		$redirect =  array_merge( $redirect, $reserva->redirect );
	};
};

echo '<!--DATA_AJAX--><div id="data_en_asd">';
	thankyou_page( $redirect );
echo '</div><!--DATA_AJAXEND-->';
die( json_encode(array(
	'ok'		=> true,
	'mensaje'	=> $redirect,
) ) );
?>