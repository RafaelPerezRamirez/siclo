<?php get_header();
echo '<section class="pagina columna_instructor preguntas_instructor pagina_individual">';
	echo '<h2 class=""><strong>';the_title();echo '</strong></h2>';
	echo '<div class="cont_page color_gris">'.apply_filters('the_content', $post->post_content).'</div>';
echo '</section>';
get_footer();?>