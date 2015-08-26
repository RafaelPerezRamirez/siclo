<?php 
get_header();

$ubicacion = new Ubicacion( $post->ID );
$ubicacion->imprimir_single();


get_footer();
?>