<?php
$html .= header_secciones('Editar Paquetes', 'guardar_paquetes');
$html .= '<hr class="hrconf1">';

$info_paquetes = get_posts(array(
	'post_type'			=> 'paquete',
	'posts_per_page'	=> -1,
	'fields'			=> 'ids',
));

if( $info_paquetes ){
	foreach( $info_paquetes as $id ){
		$p	= new Paquete( $id );
		$html .= '<div class="paquetes_en_back" data-id_post="'.$id.'">';
			$html .= '<div class="upcoming_reservations user_billing_data"><h2>Paquete de '.$p->data['cantidad'].' clases:</h2></div>';
			
			$html .= '<input type="text" name="paquete[cantidad]" value="'.$p->data['cantidad'].'" placeholder="Cantidad" class="half_input"/>';
			$html .= '<input type="text" name="paquete[precio]" value="'.$p->data['precio'].'" placeholder="Precio" class="half_input"/>';
			$html .= '<input type="number" name="paquete[expiracion]" value="'.$p->data['expiracion'].'" placeholder="Días de expiración" class="half_input"/>';

			$html .= '<label class="half_input bloque_label">Cantidad</label>';
			$html .= '<label class="half_input bloque_label">Precio $</label>';
			$html .= '<label class="half_input bloque_label">Expiración</label>';
		$html .= '</div>';
	};
};

?>