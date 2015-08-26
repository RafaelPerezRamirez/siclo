<?php

$data_post	= get_post( $id_post );

$titulo		= get_the_title( $id_post );
$contenido	= apply_filters('the_content',$data_post->post_content);

$html .= header_secciones('Editando '.$titulo, 'guardar_pagina');
$html .= '<hr class="hrconf1">';
$html .= '<br>';
$html .= '<textarea class="contenido_pag_admin" name="informacion_pagina" data-id="'.$id_post.'">'.$contenido.'</textarea>';

?>