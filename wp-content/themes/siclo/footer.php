		<?php 
		if( is_home() || is_singular('instructor') ){
			get_equipo();
		};
		if( !is_page( ADMINISTRADOR ) ){?>
            <footer class="negro color_gris2">
                    <div class="row">
                        <div class="col-xs-3 lifo">
                            <a href="<?php echo get_permalink( TERMINOS );?>">Términos y condiciones</a>
                        </div>
                        <div class="col-xs-2 lifo">
                            <a href="<?php echo get_permalink( FAQS );?>">Preguntas frecuentes</a>
                        </div>
                        <div class="col-xs-7 lifo2">
                            <a href="http://gafa.mx/" target="_blank">©Powered by: GAFA</a>
                        </div>
                    </div>
                    <?php /*<a href="#" class="inline">Nosotros</a>*/?>
            </footer>
        <?php };?>
    </div>
    <div id="redes_footer_movil" class="redes_en_abierto">
        <div class="itemmenu">
            <div class="medium color_blanco"><span class="spot"></span><?php redes_menu_abierto();?></div>
        </div>
    </div>
	<div id="w_f"><?php wp_footer();?></div>
	<?php if( is_home() && 2==3 ){
		echo
		'<img src="'.plantilla(false).'/images/circulos/c1.png" id="parallax1" class="parallax_circulos">'.
        '<img src="'.plantilla(false).'/images/circulos/c2.png" id="parallax2" class="parallax_circulos">'.
        '<img src="'.plantilla(false).'/images/circulos/c3.png" id="parallax3" class="parallax_circulos">'.
        '<img src="'.plantilla(false).'/images/circulos/c4.png" id="parallax4" class="parallax_circulos">'.
        '<img src="'.plantilla(false).'/images/circulos/c5.png" id="parallax5" class="parallax_circulos">';
	};?>
</body>
<script src="<?php plantilla()?>/js/scrolling-nav.js"></script>
<script src="<?php plantilla()?>/js/script.js"></script>
<script src="<?php plantilla()?>/js/jquery.easing.min.js"></script>
</html>