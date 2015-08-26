<?php

$opciones = get_redes();

$html .= header_secciones('Configurar links de redes sociales', 'guardar_redes');
$html .= '<hr class="hrconf1">';

$html .='<div class="upcoming_reservations user_billing_data"><h2>Facebook:</h2></div>';
$html.='<input class="input_redes third_input" type="text" placeholder="Link:" value="'.$opciones['facebook'].'" name="facebook">';

$html .='<div class="upcoming_reservations user_billing_data"><h2>Instagram:</h2></div>';
$html.='<input class="input_redes third_input" type="text" placeholder="Link:" value="'.$opciones['instagram'].'" name="instagram">';

$html .='<div class="upcoming_reservations user_billing_data"><h2>Vimeo:</h2></div>';
$html.='<input class="input_redes third_input" type="text" placeholder="Link:" value="'.$opciones['youtube'].'" name="youtube">';

$html .='<div class="upcoming_reservations user_billing_data"><h2>Twitter:</h2></div>';
$html.='<input class="input_redes third_input" type="text" placeholder="Link:" value="'.$opciones['twitter'].'" name="twitter">';

?>