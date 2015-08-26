<?php require_once('../wp-load.php');
foreach( get_users() as $user ){
	//update_user_meta( $user->ID,'cantidad_clases',array());
	$clases = get_user_meta( $user->ID,'cantidad_clases',true);
	
	if( !is_array( $clases ) ){
		update_user_meta( $user->ID,'cantidad_clases',array());
		mario( $clases );
	};
};
?>