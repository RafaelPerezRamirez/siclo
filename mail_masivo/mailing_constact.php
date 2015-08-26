<?php require_once('../wp-load.php');

$lines =file('test.csv');

foreach($lines as $data){
	$data		= explode(',',$data);
	$nombre		= isset( $data[0] ) ? trim( $data[0] ) : false;
	$mail		= isset( $data[1] ) ? trim( $data[1] ) : false;
	$new_contra	= false;/*
		VARIABLE IMPORTANTE PARA IMPRIMIR SI HAY UNA NUEVA CONTRASEÑA O NO
		DEPENDE SI EL USUARIO EXISTÍA O NO
	*/
	
	if( !$nombre || !$mail ){ continue; };
	
	/*COMPROBAMOS SI EXISTE O NO EL USUARIO*/
	$user = email_exists( $mail );
	if( !$user ){
		$user = username_exists( $mail );
	};
	if( !$user ){
		/*CREAMOS PASSWORD*/
		$new_contra = randomPassword_mail();
		/*CREAMOS USUARIO*/
		$user	= wp_create_user( $mail, $new_contra, $mail );
		if ( is_wp_error($user) ){
			mario( $mail );
			mario( $user );
			continue;
		};
		wp_update_user( array( 'ID' => $user, 'display_name' => $nombre ) );
		/*ACTUALIZAMOS NOMBRE*/
	};
	$user	= get_user_by('id',$user);
	/*ACTUALIZAMOS USUARIO A UNA CLASE*/
	sumar_clases( $user->ID, 1 );
	/*ENVIAMOS MAIL*/
	mail_invitacion_constact_contact( $user, $new_contra );
};
function randomPassword_mail() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>