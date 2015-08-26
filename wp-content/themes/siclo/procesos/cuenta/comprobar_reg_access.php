<?php require_once('../../../../../wp-load.php');

if( !isset( $_POST['security'] ) ){
	die('ERROR: 6969');
};
if( email_exists( strip_tags( $_POST['mail'] ) ) ){
	echo json_encode( true );
}else{
	echo json_encode( false );
};
?>