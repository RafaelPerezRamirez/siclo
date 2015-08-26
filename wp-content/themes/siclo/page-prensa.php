<?php get_header();?>
<div class="pfr">
	<big class="text-center center-block">Prensa</big>
    <?php logos_de_prensa();?>
	<div class="publicaciones">
		<hr>
		<span class="medium color_gris1 text-center center-block">Últimas publicaciones</span>
		<hr>
        <?php print_prensa_loop();?>
	</div>
</div>
<?php
get_footer();
?>
