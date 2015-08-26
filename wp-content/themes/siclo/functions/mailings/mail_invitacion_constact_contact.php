<?php
function mail_invitacion_constact_contact( $user, $new_contra ){
	/*$user			= objeto usuario*/
	/*$new_contra	= si es falso no imprimir el texto de nueva contraseña*/
	$pass = "";
	if($new_contra = false){
		$pass = "Tu contraseña es: " . $new_contra;
	}
	$name = $user->display_name;
	
	$html = 
		'<div style="width: 950px; background-color:  #21d848; margin: auto; box-sizing: border-box; padding: 28px 0;">'.
			'<img src="http://siclo.com/wp-content/themes/siclo/images/mailings/2.0/logo.png" style="width: 128px; margin: 0 auto 20px; display: block;"/>'.
			'<div style="width: 640px; background-color: #fff; padding: 30px 0; margin: auto; position: relative;">'.
				'<h2 style="text-align: center; font-size: 30px; font-family: Helvetica; font-weight: 400; padding: 0 0 30px; border-bottom: 1px solid #dedede; color: #414040; margin: 0;">En sus marcas, listos... ¡Rueda!</h2>'.
				'<p style="text-transform: uppercase; color: #dedede; text-align: center; font-family: Helvetica; font-size: 13px; margin-bottom: 50px;">clase gratis</p>'.
				'<p style="font-size: 42px; text-align: center; font-weight: 300; font-family: Helvetica; border-bottom: 3px solid #21d848; padding-bottom: 45px; width: 490px; margin: auto; color: #535151; line-height: 50px;">Hola '. $name .',</p>'.
				'<p style="font-size: 24px; line-height: 30px; font-family: Helvetica; font-weight: 300; text-align: center; color: #414040; width: 490px; margin: 70px auto;">¡Bienvenido a Síclo! Nos da mucho gusto que formes parte de nuestra comunidad, desde este momento cuentas con una clase gratis disponible en tu cuenta.</p>'.
				'<p style="font-size: 24px; line-height: 30px; font-family: Helvetica; font-weight: 300; text-align: center; color: #414040; width: 490px; margin: 70px auto;">¡Entra a siclo.com y reserva tu clase cuando quieras!<br/>Tu nombre de usuario es: '. $user->user_login .'<br/>'. $pass .'</p>'.
				'<p style="font-size: 33px; font-family: Helvetica; font-weight: 300; color: #414040; text-align: center; width: 490px; margin: 0 auto 125px;">Ruedo, luego existo.</p>'.
				'<div style="border-top: 1px solid #dedede; position: absolute; bottom: 0; left: 0; right: 0; padding: 15px 0;">'.
					'<div style="width: 49%; display: inline-block; vertical-align: top; border-right: 1px solid #dedede;">'.
						'<img src="http://siclo.com/wp-content/themes/siclo/images/mailings/2.0/present.png" style="display: inline-block; vertical-align: middle; margin-left: 40px;" />'.
						'<div style="display: inline-block; vertical-align: top; width: 200px; margin-left: 17px;">'.
							'<img src="http://siclo.com/wp-content/themes/siclo/images/mailings/2.0/regala_siclo.png" />'.
							'<p style="color: #9b9a9a; font-family: Helvetica; font-size: 8px;">Envíala a tus amigos, regala y pónganse a rodar.</p>'.
						'</div>'.
					'</div>'.
					'<div style="width: 49%; display: inline-block; vertical-align: top;">'.
						'<img src="http://siclo.com/wp-content/themes/siclo/images/mailings/2.0/telefono.png" style="display: inline-block; vertical-align: middle; margin-left: 27px;" />'.
						'<div style="display: inline-block; vertical-align: middle; margin-left: 20px;">'.
							'<p style="font-family: Helvetica; color: #767474; font-size: 11px; margin: 0 0 5px;"><span style="font-family: Helvetica; font-size: 11px; font-weight: 800; text-transform: uppercase; color: #000;">Teléfono: </span><a href="tel:67-67-65-67" style="color: inherit;">67 67 65 67</a></p>'.
							'<p style="font-family: Helvetica; color: #767474; font-size: 11px; margin: 0;"><span style="font-family: Helvetica; font-size: 11px; font-weight: 800; text-transform: uppercase; color: #000;">Correo: </span><a href="mailto:hola@siclo.com" style="color: inherit;">hola@siclo.com</a></p>'.
						'</div>'.
					'</div>'.
				'</div>'.
			'</div>'.
			'<a style="background-color: #000; color: #fff; text-align: center; font-size: 10px; font-family: Helvetica; height: 30px; width: 210px; margin: 30px auto 0; text-transform: uppercase; line-height: 30px; border-radius: 5px; display: block;" href="http://siclo.com/?go_to=compra_class">seguir rodando</a>'.
		'</div>';

	
	$headers = array('Content-Type: text/html; charset=UTF-8');
		
	$mail = $user->user_email;
	
	wp_mail($mail, 'Cuentas con una clase gratis', $html, $headers);

};