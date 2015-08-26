<?php
$html .= header_secciones('Editar FAQS', 'guardar_faqs');
$html .= '<hr class="hrconf1">';

$html .='<div class="upcoming_reservations user_billing_data"><h2>Añadir FAQ:</h2></div>';
$html .= '<div class="pregunta_back pb1">';
	$html .= '<input type="text" name="nueva[titulo]" value="" placeholder="Nueva pregunta" class="input_np"/>';
	$html .= '<textarea name="nueva[contenido]" placeholder="Nueva respuesta"></textarea>';
$html .= '</div>';

$faqs = get_posts(array(
	'post_type'			=> 'faq',
	'posts_per_page'	=> -1,
));
if( $faqs ){
	$html .='<div class="upcoming_reservations user_billing_data"><h2>Listado de FAQS:</h2></div>';
	foreach( $faqs as $faq ){
		$html .= '<div class="pregunta_back" data-id_post="'.$faq->ID.'">';
			$html .='<div class="eliminar_post eliminar_faq" data-id_post="'.$faq->ID.'"><img src="'.imagenes(false).'/eliminar.png"/></div>';
			$html .= '<input type="text" name="faq[titulo]" value="'.get_the_title( $faq->ID ).'" placeholder="Pregunta" class=""/>';
			$html .= '<textarea name="faq[contenido]" placeholder="Respuesta">'.apply_filters('the_content',$faq->post_content).'</textarea>';
		$html .= '</div>';
	};
};
?>