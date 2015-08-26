<?php
function mail_nueva_reservacion( $id_reserva = false, $user ){
	if( !$id_reserva ){ return; };
	$pedido = new Reserva( $id_reserva );
	$claseID = $pedido->clase;
	$clase = new Clase($claseID);
	$fecha_clase = $clase->fecha;
	$fecha = date_i18n('d-F-Y', $fecha_clase);
	$hora = date_i18n('h:i A', $fecha_clase);
	$bici = $pedido->get_id_bici_front();
	$user	= get_user_by('id',$user);
	$name = $user->display_name;
				
	$html = 
		'<div style="max-width: 950px; background-color: rgb(118, 0, 255); margin: auto; box-sizing: border-box; padding: 28px 0; font-family: Helvetica;">'.
			'<img src="http://siclo.com/wp-content/themes/siclo/images/mailings/2.0/logo.png" style="width: 128px; margin: 0 auto 20px; display: block;"/>'.
			'<div style="width: 640px; background-color: #fff; padding: 30px 0 0; margin: auto;">'.
				'<p style="text-transform: uppercase; color: #dedede; text-align: center; font-family: Helvetica; font-size: 10px; margin-bottom: 30px;">confirmación de reservación</p>'.
				'<div style="display: block; vertical-align: top; max-width: 415px; padding: 0 30px; box-sizing: border-box; margin: auto; text-align: center;">'.
					'<p style="font-size: 27px; line-height: 30px; font-weight: 300; font-family: Helvetica; border-bottom: 3px solid rgb(118, 0, 255); padding-bottom: 25px; width: 100%; margin: auto; color: #535151;">Hola '. $name .',</p>'.
					'<p style="font-size: 16px; font-family: Helvetica; font-weight: 300; color: #535151; width: 100%; margin: 30px auto;">Muchas felicidades por tu siguiente Síclo.</p>'.
					'<div style="font-size: 16px; color: #535151; font-weight: 800; padding: 20px 0; border-top: 1px solid #939598;">'.
						'<span style="display: inline-block; margin: 0 5px;">Park Plaza</span>'.
						'<span style="display: inline-block; margin: 0 5px;">'. $fecha .'</span>'.
						'<span style="display: inline-block; margin: 0 5px;">'. $hora .'</span>'.
					'</div>'.
					'<div style="padding: 20px 0; border-top: 1px solid #939598;">'.
						'Tu bici: ' . $bici .		
					'</div>'.
					'<div style="padding: 20px 0; border-top: 1px solid #939598; border-bottom: 1px solid #939598; font-size: 16px;">'.
						'Javier Barros Sierra 540, Santa Fé. Torres 2 - PB'.		
					'</div>'.
				'</div>'.
				'<div style="display: block; vertical-align: top; max-width: 600px; margin: 30px auto; padding: 0 30px; box-sizing: border-box; border: 1px solid #dedede; box-shadow: -1px 0 1px 0 #dedede;">'.					
					'<p style="text-align: center; font-size: 15px; font-family: Helvetica;">Recomendaciones...</p>'.
					'<p style="font-size: 12px; font-family: Helvetica; text-align: justify; color: #939598;">Llegar al menos 10 minutos antes para que te dé tiempo de prepararte para la clase.</p>'.
					'<p style="font-size: 12px; font-family: Helvetica; text-align: justify; color: #939598;">Si sabes que vas a llegar tarde, te pedimos que por favor nos avises antes de que haya empezado la clase, para que podamos guardar tu lugar hasta 10 minutos después de que inicie la clase. </p>'.
					'<p style="font-size: 12px; font-family: Helvetica; text-align: justify; color: #939598;">Por respeto a todos nuestros usuarios e instructores, si llegas 10 minutos después de haber empezado la clase no podremos permitir que entres.</p>'.
					'<p style="font-size: 12px; font-family: Helvetica; text-align: justify; color: #939598;">No te preocupes, si tuviste un contratiempo podrás cancelar la clase sin ningún cargo siempre y cuando sea con al menos doce horas de anticipación.</p>'.
					'<p style="font-size: 12px; font-family: Helvetica; text-align: justify; color: #939598;">Comprar paquete de clases: Muchas gracias por reservar la bicicleta '. $bici .'.</p>'.
				'</div>'.
				'<p style="font-size: 30px; text-align: center; color: #414040;">A mí nadie me pedalea la bici</p>'.
				'<div style="border-top: 1px solid #dedede; padding: 15px 0;">'.
					'<div style="width: 49%; display: inline-block; vertical-align: top; border-right: 1px solid #dedede;">'.
						'<img src="http://siclo.com/wp-content/themes/siclo/images/mailings/2.0/present.png" style="display: inline-block; vertical-align: middle; margin-left: 40px;" />'.
						'<div style="display: inline-block; vertical-align: top; max-width: 200px; margin-left: 17px;">'.
							'<img src="http://siclo.com/wp-content/themes/siclo/images/mailings/2.0/regala_siclo.png" />'.
							'<p style="color: #9b9a9a; font-family: Helvetica; font-size: 8px;">Envíala a tus amigos, regala y pónganse a rodar.</p>'.
						'</div>'.
					'</div>'.
					'<div style="width: 49%; display: inline-block; vertical-align: top;">'.
						'<img src="http://siclo.com/wp-content/themes/siclo/images/mailings/2.0/telefono.png" style="display: inline-block; vertical-align: middle; margin-left: 27px;" />'.
						'<div style="display: inline-block; vertical-align: middle; margin-left: 20px; max-width: 200px;">'.
							'<p style="font-family: Helvetica; color: #767474; font-size: 11px; margin: 0 0 5px;"><span style="font-family: Helvetica; font-size: 11px; font-weight: 800; text-transform: uppercase; color: #000;">Teléfono: </span><a href="" style="color: inherit;">(55)10 78 44 58</a></p>'.
							'<p style="font-family: Helvetica; color: #767474; font-size: 11px; margin: 0;"><span style="font-family: Helvetica; font-size: 11px; font-weight: 800; text-transform: uppercase; color: #000;">Correo: </span><a href="mailto:hola@siclo.com" style="color: inherit;">hola@siclo.com</a></p>'.
						'</div>'.
					'</div>'.
				'</div>'.
			'</div>'.
			'<a style="background-color: #000; color: #fff; text-align: center; font-size: 10px; font-family: Helvetica; height: 30px; width: 210px; margin: 30px auto 0; text-transform: uppercase; line-height: 30px; border-radius: 5px; display: block;" href="http://siclo.com/?go_to=compra_class">seguir rodando</a>'.
		'</div>';

		
	$headers = array('Content-Type: text/html; charset=UTF-8');
	
	$mail = $user->user_email;
	
	wp_mail($mail, 'Tu clase ha sido reservada', $html, $headers);
};
