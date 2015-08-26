<?php require_once('../../../../../wp-load.php');

if( !isset( $_POST['id'] ) ){
	die();
};
$ubicacion = new Ubicacion( $_POST['id'] );
$ubicacion->imprimir_single();
?>