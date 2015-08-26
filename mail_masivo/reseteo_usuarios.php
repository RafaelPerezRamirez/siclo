<?php require_once('../wp-load.php');
foreach( get_users() as $user ){
	update_user_meta( $user->ID,'cantidad_clases',array());
	update_user_meta( $user->ID, '_tarjetas' , null );
	update_user_meta( $user->ID, '_id_conekta', null );
	update_user_meta( $user->ID, 'ya_compro', null);
};
?>