<?php 
get_header();

if( have_posts() ){
	while( have_posts() ){
		the_post();
		$ubicacion = new Ubicacion( $post->ID );
		$ubicacion->imprimir_single( false, false );
	};
};

get_footer();
?>