<?php 
get_header();
$instructor = new Instructor( $post->ID );
$instructor->imprimir_single();
get_footer();
?>