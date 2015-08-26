<?php get_header();

$ubicacion	= new Ubicacion( 38 ); /*PARK PLAZA POR DEFECTO*/
$calendario	= $ubicacion->get_calendar(  );
$html_calendario	= $calendario->imprimir( false, '', false,true);
?>
        <section class="top top_with_video">
            <div class="title text-center center-block">
                <h4>En sus marcas, listos...</h4>
                <h4><span class="color_azul">¡Rueda!</span></h4>
                <div><a href="<?php echo get_home_url();?>/?go_to=reserva" data-go="reserva" class="text-center btn azul2 bot1">RESERVAR</a> <a href="<?php echo get_home_url();?>/?go_to=compra_class" data-go="compra_class" class="text-center btn azul bot1 compc">COMPRAR CLASES</a></div>
            </div>
            <video id="video_home" autoplay loop poster="<?php plantilla();?>/videos/poster_video.jpg">
            	<source src="<?php plantilla();?>/videos/home_mp4.mp4" type="video/mp4">
            </video>
        </section>
        <div class="page">
            <section class="reserva" id="reserva">
                <div class="calendario">
                    <div class="row">
                        <?php /*<div class="col-xs-2 contenedor_rounded">
                            <div class="rounded azul">1</div> <div class="rounded gris2">2</div>
                        </div>*/?>
                    </div>
                    <div class="top2 vertical-align">
                        <div class="itemtop2 dd">
                            <?php $calendario->imprimir_cabecera_back( false, false, true );?>
                        </div>
                        <div class="itemtop2">
                            <?php $calendario->selector_instructores();?>
                        </div>
                        <div class="itemtop2">
                            <span class="text-center center-block large"><a href="<?php echo $ubicacion->permalink;?>" class="link_to_ub">PARK PLAZA <img src="<?php plantilla();?>/images/info.png" width="56" height="55"/></a></span>
                        </div>
                        <div class="itemtop2 desp">
                            <span class="color_gris2 text-right medium">Selecciona tu clase y entra en el <span class="color_azul">Sí</span>clo.</span>
                            <big class="color_negro ponte"> ¡Ponte a <span class="color_azul">rodar</span>!</big>
                        </div>
                    </div>
                    <div class="fechas"><?php echo $html_calendario;?><img class="soft_ope" src="<?php plantilla();?>/images/soft.jpg" width="636" height="200" alt=""/></div>
                </div>
                <div class="reservacion" id="ajax_reservacion"></div>
            </section>
            <hr>
            <?php print_codigo_descuento();?>
            <section class="compra_clases" id="compra_class">
                <h2 class="large center-block aprovecha_h2">¡Aprovecha nuestros paquetes y ponte a rodar!</h2>
                <h3 class="center-block aprovecha_h3">Ahorra en cada una de tus clases y disfruta ser parte del <span class="color_azul">Sí</span>clo</h3>
				<?php
                    $checkout = new Checkout();
                    $checkout->imprimir_paquetes_home();
                ?>
            </section>
            <hr>
        </div>
<?php get_footer();?>
