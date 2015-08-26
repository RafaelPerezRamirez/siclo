<?php 
get_header();

if( have_posts() ){
	echo '<div id="loop_instructores" class="cuenta">';
		while( have_posts() ){
			the_post();
			$instructor = new Instructor( $post->ID );
			echo $instructor->imprimir_loop_movil();
		};
	echo '</div>';
};

get_footer();
?>