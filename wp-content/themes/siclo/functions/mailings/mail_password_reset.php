<?php
function mail_password_reset($user, $pass){
	$html =
		'<p>Tu password ha sido restablecido. Esta es tu nueva contraseña '. $pass .'</p>';
		
	$headers = array('Content-Type: text/html; charset=UTF-8');
		
	$mail = $user->user_email;
	
	wp_mail($mail, 'Tu password ha sido restablecido', $html, $headers);
};
