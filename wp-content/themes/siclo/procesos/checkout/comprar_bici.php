<?php require_once('../../../../../wp-load.php');
global $current_user;

if( !isset( $_POST['security'] ) || !isset( $_POST['clase'] ) || !isset( $_POST['bici'] )  ){
	echo '<!--DATA_AJAX--><div id="data_en_asd">';
	echo '</div><!--DATA_AJAXEND-->';
	die( json_encode(array(
		'ok'		=> false,
		'mensaje'	=> 'ERROR: 6969',
	) ) );
};

if( !is_user_logged_in() || numero_clases_user( $current_user->ID ) < 1 ){
	/*LUEGO LO CHECAMOS*/
	echo '<!--DATA_AJAX--><div id="data_en_asd">';
	echo '</div><!--DATA_AJAXEND-->';
	die( json_encode(array(
		'ok'		=> false,
		'mensaje'	=> 'No tienes clases suficientes para poder realizar la compra',
	) ) );
};


/*CREAMOS UNA RESERVA*/
unset( $_POST['security'] );
$reserva = new Reserva();
$reserva->set_reserva( $_POST, $current_user->ID );
$reserva->comprar();

if( !$reserva->mensaje->ok || !$reserva->redirect ){
	echo '<!--DATA_AJAX--><div id="data_en_asd">';
	echo '</div><!--DATA_AJAXEND-->';
	$reserva->mensaje->imprimir( 'JSON' );
};
echo '<!--DATA_AJAX--><div id="data_en_asd">';
	thankyou_page(  $reserva->redirect );
echo '</div><!--DATA_AJAXEND-->';
die( json_encode(array(
	'ok'		=> true,
	'mensaje'	=> $reserva->redirect,
) ) );
?>