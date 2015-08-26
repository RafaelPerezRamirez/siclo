<?php require_once('../../../../../wp-load.php');

if( !isset( $_POST['id'] ) ){
	die();
};
$instructor = new Instructor( $_POST['id'] );
$instructor->votar( $_POST['valor'] );
$instructor->print_estrellas();
?>