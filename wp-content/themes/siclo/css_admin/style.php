<?php 
global $colores;

$colores_paginas = array(
	COMPRAR_CLASES	=> BLACK,
	CUENTA_USUARIO	=> A_OSCURO,
	INVITA			=> N_CLARO,
	CHECKOUT		=> BLACK,
	THANKYOU		=> V_OSCURO,
	CALENDARIO		=> N_CLARO,
	FAQS			=> A_OSCURO,
	TERMINOS		=> A_OSCURO,
	POLITICAS		=> A_OSCURO,
	ADMINISTRADOR	=> 'white',
);
$colors_post_type = array(
	'instructor'	=> R_OSCURO,
	'ubicacion'		=> V_OSCURO,
	'clase'			=> V_OSCURO,
	'cron_gift_card'=> N_OSCURO,
);
if( is_user_logged_in() ){
	$colores_paginas[CUENTA_USUARIO] = A_OSCURO;
};
?>
<style type="text/css">
@font-face{
   font-family: "Gotham";
   src: url("<?php plantilla();?>/fonts/GothamRnd-Medium.otf");
}

*{
	margin:0px;
	padding:0px;
	font-weight:400 !important;
}
body,html{
	display:block;
	min-height:100%;
    font-family: "Gotham";
	font-weight:400;
	font-size:<?php echo MEDIUM;?>;
	color: <?php echo BLACK;?>;
	overflow-x: hidden;
}
ol,ul {
	list-style-position: inside;
}
img{
	max-width:100%;
	height:auto;
	border: 0px solid;
}
a{
	color:inherit;
	text-decoration:none;
	<?php compatible('transition:1s opacity ease;');?>
}
hr {
    border: 0px;
    height: 1px;
    background: <?php echo GRIS;?>;
    margin: 10px 0px;
	background-color:transparent !important;
}
[data-link]{
	cursor:pointer;
}
a:hover,[data-link]:hover{
	opacity:0.6;
}
.oculto{
	display:none !important;
}
.escondido,.filtrado{
	display:none;
}
::-webkit-inner-spin-button {
   display: none;
}
::-webkit-scrollbar {
    width: 5px;
	padding:2px;
}
::-webkit-scrollbar-thumb {
    background-color: <?php echo GRIS;?>;
	border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover{
	background-color: <?php echo GRIS_C?>;
}
::-webkit-scrollbar-track {
    background-color: whitesmoke;
}
::-webkit-scrollbar-track:hover {
	border:1px solid <?php echo GRIS_C?>;;
}

body>.contenido{
	opacity:0;
};
/*generales----------------------*/
a.boton{
	display:block;
}
.boton {
    color: white;
    line-height: 43px;
	<?php compatible('border-radius: 10px;');?>
    box-shadow: 0px 4px 0px <?php echo A_OSCURO;?>;
    cursor: pointer;
    font-weight: 800;
	text-align:center;
	display:block;
}
.boton:hover,.boton:focus {
    position: relative;
    top: 4px;
    box-shadow: none !important;
}
.r_oscuro.boton {
    box-shadow: 0px 4px 0px rgba(255, 0, 182, 0.38);
}
.n_claro.boton {
    box-shadow:0px 4px 0px rgba(255, 176, 0, 0.38);
}
.v_oscuro.boton {
    box-shadow:0px 4px 0px <?php echo AMARILLO;?>;
}
input, select, textarea {
    text-align: center;
    width: 63%;
    padding: 13px;
    box-sizing: border-box;
    font-size: <?php echo SMALL;?>;
    background: <?php echo GRIS_C;?>;
    border: 1px solid <?php echo GRIS_C;?>;
    margin-bottom: 10px;
	color:  <?php echo GRIS;?>;
	font-weight:800;
}
.checkbox {
    display: inline-block;
    vertical-align: middle;
    margin-right: 13px;
    height: 15px;
    width: 15px;
    border: 1px solid <?php echo GRIS;?>;
	<?php compatible('border-radius: 100%;');?>
    cursor: pointer;
}
.checkbox:hover {
    box-shadow: 0px 0px 0px 4px white inset;
    background: <?php echo GRIS;?>;
}
.checkbox.checked{
    box-shadow: 0px 0px 0px 4px white inset;
    background: <?php echo BLACK;?>;
}
/*ERROR GAFA*/
.gafa-mensaje,.gafa-error{
	position: fixed;
	top: -61px;
	width: 88%;
	background-image: url("<?php plantilla(); ?>/images/X2.png");
	background-repeat:no-repeat;
	background-position:right 35px center;
	background-color:<?php echo BLACK;?>;
	z-index: 2147483647;
	line-height: 19px;
	font-size: <?php echo SMALL;?>;
	cursor: pointer;
	color: <?php echo R_OSCURO; ?>;
	font-weight: 100;
	padding: 28px 6%;
	left: 0px;
	text-align: center;
}
.gafa-error {
	background-color:rgba(255, 23, 0, 0.8);
	color:white;
}
.gafa-error h1,.gafa-mensaje h1 {
	font-size: <?php echo LARGE;?>;
	font-weight: 100;
	margin-bottom:15px;
	text-transform:uppercase;
}
/*PREGUNTAS GAFA*/
div#pregunta_gafa {
	position: fixed;
	z-index: 999;
	background: #FFF;
	padding: 80px;
	top: 30%;
	right: 0px;
	left: 50%;
	width: 360px;
	margin-left: -275px;
	text-align: center;
	border: 1px solid #808080;
}

div#pregunta_gafa .boton {
	margin: 15px 0px;
	background-color: <?php echo A_CLARO;?>;
}

div#aceptar_pregunta_gafa {
	margin-top: 13px !important;
}
/*CARGANDO*/
#cargando {
	background-color: rgba(255,255,255,0.8);
}
.cover{
	position: fixed;
	<?php compatible('transform: translateZ(0);');?>
	top: 0px;
	left: 0px;
	bottom: 0px;
	right: 0px;
	z-index:999;
	background-position: center center;
	background-repeat: no-repeat;
}
.fondo_web_home{
	background-image: url('<?php plantilla(); ?>/eliminar/fondo_webs.jpg');
	background-position:center;
	background-size:cover;
	position: fixed;
	top: 0px;
	right: 0px;
	bottom: 0px;
	left: 0px;
	pointer-events: none;
	z-index: -2;
}
#cont_video{
	z-index: -1;
	pointer-events:none;
}
#cont_video.video_en_groso{
	z-index: 0;
}
#cont_video.video_en_groso,#cont_video.video_en_groso * {
    pointer-events: initial;
}
#texto_home.video_en_groso,#play_home.video_en_groso{
	opacity:0;
	pointer-events:none;
}
#texto_home,#play_home{
	<?php compatible('transition:0.5s all ease;');?>
}
#video_home,#video_dos {
    position: absolute;
    top: 0px;
    left: 0px;
    min-height: 100%;
    min-width: 100%;
    opacity: 0;
    margin-left: 0 !important;
	z-index:-1;
}
#video_dos {
    width: 100%;
    height: 100%;
    min-height: initial;
    min-width: initial;
    background: black;
}
.contenido {
    margin: 0 auto;
	padding-top: 100px !important;
	padding-bottom:10px;
	width: 1400px;
}

body.home .contenido {
    padding: 0px 42px;
    color: white;
}
.menu_abierto.oyendo_menu,.menu_abierto .oyendo_menu {
    margin-left: 289px;
}

.oyendo_menu {
	<?php compatible('transition: 1s margin-left ease;');?>
}
/*SECCIONES VERTICAL ALIGN----------------------------------------------------------*/
.centrado_vertical:after {
    content: '';
    display: inline-block;
    height: 100%;
    width: 0.01%;
    vertical-align: middle;
}
.elemento_centrado {
    display: inline-block;
    width: 99.08%;
    vertical-align: middle;
}
.centrado_vertical {
    text-align: center;
}
/*CIRCULOS-----------------------------------------------------------------------------*/
.circulo {
	<?php compatible('border-radius: 100%;');?>
    width: 146px;
    height: 146px;
    display: inline-block;
    text-align: center;
    line-height: 146px;
}
.print_info_calendar .circulo {
	margin-left: 10px;
	height: 50px;
	width: 50px;
	line-height: 50px;
	font-size: <?php echo SMALL;?>;
	vertical-align: middle;
}
.reservar {
    background: <?php echo AMARILLO;?>;
	font-size: <?php echo LARGE; ?>;
	box-shadow: 0px 0px 0px 110px <?php echo R_OSCURO;?> inset;
	transition: 1s all ease;
	cursor:pointer;
	opacity:1 !important;
}
.reservar:hover {
	box-shadow: 0px 0px 0px 0px <?php echo R_OSCURO;?> inset;
}
/*MENU-----------------------------------------------------------------------------*/
body.home div#redes_web {
    position: fixed;
    bottom: 4px;
    right: 28px;
}
div#redes_web>a {
	background-image: url('<?php plantilla(); ?>/images/menu/redes.png');
	display:inline-block;
	width:37px;
	height:37px;
	vertical-align: middle;
	margin-left: 7px;
}
div#redes_web>a:nth-of-type(2) {
    background-position-x: 37px;
}
div#redes_web>a:nth-of-type(3) {
    background-position-x: 80px;
}
div#redes_web>a:nth-of-type(4) {
    background-position-x: 125px;
}
.toogle_menu{
	cursor:pointer;
    top: 34px;
    left: 24px;
	<?php compatible('transition: 1s transform ease;');?>
	position:absolute;
}
#toogle_menu {
    position: fixed;
}

.toogle_menu:hover,body.menu_abierto .toogle_menu {
	<?php compatible('transform: rotateZ(90deg);');?>
}

div#menu_sup>*,.menu_d>* {
    display: inline-block;
    vertical-align: middle;
}
.menu_d {
    float: right;
	text-align: center;
}
div#menu_sup,#submenu_ad {
    line-height: 85px;
    padding: 0px 36px;
    color: white;
	position: fixed;
	left: 0px;
	right: 0px;
	top: 0px;
	z-index: 9;
	height:85px;
}
div#menu_sup::after {
    content: '';
    clear: both;
    display: block;
}
#logo {
    margin-left: 107px;
	position: fixed;
	left: 36px;
	top: 27px;
	width:103px;
	<?php compatible('transition:0.2s padding-left ease;');?>
}
.boton_menu {
    border: 1px solid #FFF;
	line-height: 12px;
	padding: 7px;
	<?php compatible('border-radius: 20px;');?>
	margin: 0px 30px;
	min-width: 150px;
	text-align: center;
	font-size: <?php echo SMALL;?>;
	letter-spacing:1px;
	opacity:1 !important;
}

body.home .boton_menu:hover{
	border: 1px solid <?php echo R_OSCURO; ?>;
	background:<?php echo R_OSCURO; ?>;
}

#menu_lateral {
    position: fixed;
    top: 0px;
    bottom: 0px;
    left: -289px;
    background: #a3a4a5;
    padding: 0px 10px;
    width: 269px;
    text-align: center;
    color: white;
	z-index:10;
}
.cont_links_menu {
    line-height: 81px;
    padding-top: 91px;
}

.cont_links_menu>a {
    display: block;
    border-bottom: 1px solid <?php echo GRIS;?>;
	opacity:1 !important;
}
.cont_links_menu>a:hover, .cont_links_menu>a.link_actual{
	background:<?php echo GRIS;?>;
}
.footer_menu {
    position: absolute;
    bottom: 0px;
    left: 0px;
    padding: 0px 29px;
    padding-bottom: 31px;
    right: 0px;
    text-align: left;
    font-size: <?php echo SMALL;?>;
    letter-spacing: 1px;
    line-height: 20px;
}

.footer_menu>a {
    display: block;
}
#menu_user {
	border:0px !important;
}/*
#menu_user.link_actual {
	width: 213px !important;
}*/
.logout_user {
    position: absolute;
    top: 100px;
    right: 20px;
    display: block;
    line-height: initial;
    font-size: <?php echo SMALL;?>;
    text-transform: uppercase;
}
.clases_menu {
    width: 28px;
    font-size: 8px;
    min-width: initial;
    height: 28px;
    padding: 0px;
    line-height: 28px;
    margin: 0px;
}
body.home .clases_menu:hover {
    background-color: transparent;
    color: white;
    border-color: white;
}
/*COLORES PAGINAS: */
<?php 
foreach( $colores_paginas as $id => $color ){
	echo '.page-id-'.$id.' #menu_sup { background: '.$color.'; }';
	
	echo '.page-id-'.$id.' #menu_sup .link_actual{ color: '.$color.';background-color:white; }';
	
	echo '.page-id-'.$id.' .boton_menu:hover{ background:#FFF;color: '.$color.'; }';
};

foreach( $colors_post_type as $id => $color ){
	echo '.post-type-archive-'.$id.' #menu_sup, .single-'.$id.' #menu_sup { background: '.$color.'; }';
	
	echo '.post-type-archive-'.$id.' #menu_sup .link_actual,.single-'.$id.' #menu_sup .link_actual{ color: '.$color.';background-color:white; }';
	
	echo '.post-type-archive-'.$id.' .boton_menu:hover,.single-'.$id.' #menu_sup .boton_menu:hover{ background:#FFF;color: '.$color.'; }';
	
};

/*COLORES BACKGROUND_CLASE*/
$backgrounds = $colores;
foreach( $backgrounds as $clase => $color ){
	echo '.'.$clase.' { background-color: '.$color.'; }';
};
foreach( $backgrounds as $clase => $color ){
	echo '.color_'.$clase.' { color: '.$color.'; }';
};

?>


/*HOME------------------------------------------------------*/
div#contenedor_home {
    position: relative;
}

.reproductores_home {
    position: absolute;
    right: 0px;
    top: 50%;
    margin-top: -75px;
    opacity: 0.3;
    cursor: pointer;
	<?php compatible('transition: 0.5s opacity ease;');?>
	z-index: 2;
}

.reproductores_home:hover {
    opacity: 0.6;
}

section#texto_home {
    text-align: left;
}

section#texto_home img {
	display: inline-block;
	vertical-align: text-bottom;
	height: 20px;
	width: auto;
	position: relative;
	bottom: 2px;
}
section#texto_home>h1 {
	font-size: <?php echo BIG;?>;
	font-weight: 400;
	line-height: 68px;
}

section#texto_home>small {
    font-size:<?php echo LARGE;?>;
	margin-top:65px;
	margin-bottom:33px;
	display:block;
}
/*PAQUETES*/
.paquete {
    display: inline-block;
    vertical-align: top;
	margin: 20px;
}
.paquete .circulo {
    font-size: <?php echo BIG;?>;
    color: white;
    font-weight: 800;
    width: 186px;
    height: 186px;
    line-height: 186px;
}
.paquete .precios {
    font-size: <?php echo LARGE;?>;
    margin-top: 9px;
    margin-bottom: 15px;
    font-weight: 800;
	text-align:center;
}
.paquete .precios small {
    font-weight: 400;
    font-size: <?php echo SMALL;?>;
}
.paquete .boton {
    width: 144px;
    margin: 0 auto;
}
/*ACCESO---------------------------------------------------------*/
.form_siclo h1, .info_user_checkout>h1 {
    color: <?php echo GRIS;?>;
    font-size: <?php echo LARGE;?> !important;
    padding-bottom: 50px;
}

.form_siclo h1 img, .info_user_checkout>h1 img {
    height: 21px;
    width: auto;
    display: inline-block;
    vertical-align: text-bottom;
    position: relative;
    bottom: 1px;
}

.form_siclo {
    width: 357px;
    margin: 0 auto;
	text-align:center;
}
.form_siclo .boton {
    line-height: 51px;
}
/*CUENTA USER*/
.columna_general {
    width: 337px;
    display: inline-block;
    padding: 19px;
	vertical-align:top;
}
.columna_general>h1,.datos_usuario_facturacion>h1,.tarjetas_user>h1 {
	text-align: left;
	margin-bottom: 25px;
	font-size: <?php echo SMALL;?>;
	line-height: 26px;
}
h1.img_con_logo {
    font-size: <?php echo LARGE;?>;
}

h1.img_con_logo img {
    display: inline-block;
    vertical-align: initial;
    position: relative;
    top: 3px;
}
div#clases_disponibles_cuenta>img {
	position: absolute;
	bottom: -94px;
	left: -184px;
	z-index: -1;
	pointer-events:none;
}

div#clases_disponibles_cuenta {
    position: relative;
    padding-top: 65px;
}
div#clases_disponibles_cuenta>div>h1 {
    font-size: <?php echo MEDIUM;?>;
	font-weight:400;
}
.clases_usuario {
    font-size: <?php echo BIG;?>;
    font-weight: 800;
    margin-top: 5px;
}
div#clases_disponibles_cuenta .boton {
	margin:0 auto;
    margin-top: 24px;
    width: 151px;
}
.clase_historial {
    font-size: <?php echo SMALL;?>;
    text-align: left;
    font-weight: 400;
    padding-top: 15px;
    padding-bottom: 10px;
}

.clase_historial>strong {
    display: block;
    font-size: <?php echo LARGE;?>;
	margin-bottom: 3px;
}
.historial {
    max-height: 213px;
    overflow: auto;
    border-bottom: 1px solid rgb(233, 233, 233);
    padding: 0px 10px;
}
/*INVITA*/
.form_invita {
    margin-top: 30px;
}
/*CHECKOUT*/
.paquete_checkout {
	opacity:0.3;
	cursor:pointer;
	text-align:center;
}
.paquete_checkout.seleccionado{
	opacity:1;
	cursor:initial;
}
.paquete_checkout.sin_seleccionar{
	opacity:1;
}
.checkout .columna_general>h1 {
    text-align: center;
}
.info_user_checkout h2 {
    text-transform: uppercase;
}

.info_user_checkout h1 {
    margin-bottom: 0px;
    padding-bottom: 44px;
}

.info_user_checkout hr {
    margin-top: 25px;
    margin-bottom: 30px;
}
#cvt {
    width: 22%;
}

#numeroTarjeta {
    width: 77%;
    margin-right: 1%;
}

#mesExpiracion,#anyoExpiracion {
    width: 49%;
    margin-right: 2%;
}

#anyoExpiracion {
    margin-right: 0px;
}

.terminos_condiciones {
    margin-top: 10px;
    margin-bottom: 20px;
    text-align: left;
	border:1px solid transparent;
    font-size: <?php echo SMALL;?>;
}
/*THAKYOU*/
.form_siclo .h1_thank {
    color: <?php echo V_OSCURO;?> !important;
    font-size: 53px !important;
    /*border-bottom: 3px solid;*/
    padding-bottom: 16px;
    margin-bottom: 37px;
}

small.mini_dex_thank {
    font-size: <?php echo SMALL;?>;
}

hr.mini {
    margin: 31px auto;
    margin-bottom: 24px;
    height: 7px;
    width: 35px;
}
.volver_thankyou{
	margin-top: 30px;
}
.form_thankyou .clase_historial {
    text-align: center;
}
/*INSTRUCTORES*/
.instructor {
    display: inline-block;
    position: relative;
    margin: 42px;
}
.instructor figure {
	<?php compatible('border-radius: 100%;');?>
    width: 280px;
    height: 280px;
    overflow: hidden;
    border: 10px solid;
    border-color: <?php echo R_OSCURO; ?>;
}
.instructor:nth-child(3n-1) figure {
    border-color: <?php echo A_CLARO; ?>;
}.instructor:nth-child(3n) figure {
    border-color: <?php echo AMARILLO; ?>;
}
.instructor h1 {
    font-size: <?php echo LARGE;?>;
    margin-top: 10px;
}
.single_instructor {
    position: relative;
}
h1.single_titulo_inst {
	text-align: left;
	font-size: <?php echo BIG;?>;
	font-weight: 100;
	padding-top:20px;
}
.volver_atras {
    position: fixed;
    top: 133px;
    left: 145px;
}

.volver_atras .boton {
    padding: 0px 20px;
	font-weight: 100;
}
.boton.a_oscuro {
    box-shadow: 0px 4px 0px <?php echo A_CLARO;?>;
}
.extra_ins {
    text-align: left;
}
img.circulo_instructor {
  position: absolute;
  top: 35px;
  right: 40px;
  z-index: -1;
  pointer-events: none;
}

.single_foto_instructor {
  position: fixed;
  bottom: -10px;
  right: 61%;
  left: 0px;
  width: auto;
  padding-bottom: 0px;
}
.mas_info_inst {
    width: 60%;
    margin-left: 40%;
}
section.preguntas_instructor {
    font-size: <?php echo LARGE;?>;
    text-align: left;
    line-height: 30px;
}
.columna_instructor>h2 {
    font-size: <?php echo LARGE;?>;
    font-weight: 100;
    margin-bottom: 20px;
}
.columna_instructor {
    padding: 19px 0px;
    width: 48%;
}
section.columna_general.columna_instructor.proximas_clases {
    margin-right: 2%;
}
.una_palabra {
    text-transform: uppercase;
    font-size: <?php echo SMALL;?>;
    margin-top: 20px;
}
.pregunta_instructor {
    font-size: <?php echo SMALL;?>;
    text-align: left;
    /*border-bottom: 1px solid <?php echo VIOLETA;?>;*/
    padding: 15px 0px;
    padding-right: 34px;
    cursor: pointer;
	background-image:url('<?php plantilla();?>/images/mas_pregunta.png');
	background-repeat:no-repeat;
	background-position:right center;
}
.pregunta_instructor.pregunta_abierta{
	background-image:url('<?php plantilla();?>/images/menos_pregunta.png');
}
.pregunta_instructor>h2 {
    font-size: <?php echo MEDIUM;?>;
    font-weight: 800;
}
.respuesta{
	padding-top:15px;
	overflow: hidden;
}
.clase_cuadrada {
    padding: 10px 20px;
    text-align: left;
    margin: 9px 0px;
    text-transform: uppercase;
    font-size: <?php echo SMALL;?>;
}
/*UBICACIONES*/
.ubicacion {
	border: 0px !important;
	margin: 30px auto;
	box-sizing: border-box;
	max-width: 1258px;
}
.marco{
	height: 364px;
	background-size: cover;
	background-position: center;
	background-blend-mode: multiply;
	color: #FFF;
	position: relative;
}
.botones_ub_ind {
	position: absolute;
	right: 0px;
	top: 50%;
	margin-top: -70px;
}
.info_ubi_loop {
    text-align: left;
    padding-left: 45px;
    padding-right: 374px;
}

.info_ubi_loop h1 {
    font-size: <?php echo BIG;?>;
    margin-bottom: 20px;
}

.info_ubi_loop address {
    font-size: <?php echo MEDIUM;?>;
    font-style: normal;
    font-weight: 400;
}

.botones_ub_ind .circulo,.informacion_ubicacion .circulo {
    margin: 0px 20px;
	font-size:<?php echo MEDIUM;?>;
	font-weight:400;
	letter-spacing:1px;
}
.botones_ub_ind .circulo.more_info {
	font-size:<?php echo MEDIUM;?>;
	font-weight:800;
}


.more_info {
    background-position: center;
    background-size: contain;
    color: <?php echo BLACK;?>;
}
.ubicacion_individual {
    width: 90%;
    max-width: 1390px;
	margin:10px auto;
}

.ubicacion_individual .foto_ubicacion {
    float: left;
    margin-right: 34px;
    margin-bottom: 10px;
	max-width: 69%;
}

.ubica_texto {
    text-align: justify;
    font-size: <?php echo MEDIUM;?>;
    line-height: 25px;
    padding-top: 24px;
}
.informacion_ubicacion .circulo {
    color: white;
    float: right;
    margin-bottom: 40px;
}

.informacion_ubicacion hr {
    clear: right;
    margin-top: 40px;
}

.informacion_ubicacion h1,.informacion_ubicacion address {
    text-align: left;
	font-weight:800;
}
.informacion_ubicacion address {
	font-weight: 400;
}
.informacion_ubicacion h1 {
    font-size: <?php echo LARGE;?>;
    margin-bottom: 23px;
}

.informacion_ubicacion address {
    font-style: normal;
    line-height: 18px;
}
.en_menu{
    border: 0px solid;
    display: block;
    vertical-align: middle;
    font-size: 35px;
    font-weight: 800;
    text-align: left;
    margin-bottom: 10px;
	height: 0px;
	overflow:hidden;
	box-sizing:border-box;
}
.en_menu,.marco,.marco>.elemento_centrado,.ubicacion{
	<?php compatible('transition:0.8s all ease;');?>
}
.en_menu>div {
    color: white;
    padding: 15px;
}

.como_titulo .en_menu{
	height: 74px;
	display:block !important
}
.como_titulo .en_menu *{
	display:block !important
}
.como_titulo * {
    display: none;
}

.como_titulo {
    margin: 0px;
    width: 100%;
	border:0px;
}
.como_titulo .marco {
    display: block;
    height: 94px;
    background: transparent !important;
	padding: 0px;
	margin-bottom:10px;
}

.como_titulo .marco>.elemento_centrado {
    display: inline-block;
    width: 100%;
}

/*CALENDARIO*/
/*
.page-id-40 {
    background: <?php echo V_OSCURO;?>;
}*/

.dia {
    display: inline-block;
    vertical-align: top;
	text-align:center;
/* 	margin-right:15px; */
}

.hora {
    /*border: 3px solid <?php echo V_OSCURO;?>;*/
    width: 140px;
}
.hora>h2{
	display:none;
}
.dia>h2>strong,.contenedor_dia>h2>strong {
    display: block;
    font-size: <?php echo LARGE;?>;
}

.dia>h2,.contenedor_dia>h2 {
    font-size: <?php echo SMALL;?>;
    font-weight: 800;
	min-height: 73px;
	background: white;
	position:relative;
	/*margin-top:-15px;*/
	padding-bottom:10px;
	padding-top: 15px;
}
.clase_calendario {
    border: 1px solid #ececec;
    box-sizing: border-box;
	font-weight: 800;
	font-size: <?php echo SMALL;?>;
	opacity:0.3;
	background: <?php echo N_CLARO;?>;
	margin-bottom:5px;
}
.clase_calendario[data-link]{
	opacity:1;
	cursor: pointer;
	background:none;
	height:140px;
	background-color:<?php echo N_CLARO;?>;
}
.clase_calendario[data-link]:hover {
    background: url("<?php plantilla();?>/images/circulos/over_calendario.jpg");
	background-position:center;
	background-size:cover;
}
.clase_calendario time {
    display: block;
    margin-top: 11px;
}

.clase_calendario small {
    text-transform: uppercase;
    font-weight: 100;
}
.dia_menu .hora>h2 {
    display: initial;
    font-weight: 400;
    font-size: <?php echo MEDIUM;?>;
    letter-spacing: 3px;
}

.dia_menu .hora {
    background: none !important;
    color: white;
}
.dia_menu {
    display: none;
}
.contenedor_dia {
    display: inline-block;
}
.calendario_front_end {
    width: 1220px;
    margin: 0 auto;
}
/*MAPA DE LA CLASE*/
.clase_salon {
    width: 1100px;
    text-align: center;
    margin: 0 auto;
    position: relative;
}
.bicicleta {
	width: 80px;
	height: 80px;
	display: inline-block;
	line-height: 80px;
	background: <?php echo GRIS_C;?>;
	<?php compatible('border-radius: 100%;');?>
	margin: 10px;
	box-shadow: 0px 0px 0px 12px <?php echo GRIS_C;?> inset,0px 0px 0px 14px #ccc inset;
	color: <?php echo GRIS;?>;
	font-size: <?php echo LARGE;?>;
	font-weight: 400;
}/*
.bici_select.bicicleta{
	background: <?php echo V_OSCURO;?>;
	box-shadow: 0px 0px 0px 15px <?php echo V_OSCURO;?> inset,0px 0px 0px 18px white inset;
	color: white;
}*/
.forma_2 {
<?php /*?>   box-shadow: 0px 0px 0px 2.4px <?php echo R_CLARO;?> inset,0px 0px 0px 4.8px <?php echo A_CLARO;?> inset,0px 0px 0px 6.5px <?php echo R_CLARO;?> inset,0px 0px 0px 10.4px <?php echo N_CLARO;?>  inset,0px 0px 0px 14.79px <?php echo R_CLARO;?> inset,0px 0px 0px 17.47px <?php echo BLACK;?> inset,0px 0px 0px 23.798px <?php echo R_CLARO;?> inset;
    background: <?php echo N_CLARO;?>;
<?php */?>
    color: transparent;
	background:url("<?php plantilla()?>/images/circulos/circulo1.png");
	box-shadow:none;
	background-position: center;
	background-size: contain;
	cursor: not-allowed;
}
.forma_1 {
    cursor: pointer;
}

.forma_1:hover {
    opacity: 0.6;
}
.forma_3{
	opacity:0;
}
.forma_0{
    pointer-events: none;
	opacity: 0;
}
.profesor_salon {
    position: absolute;
    top: 0px;
    left: 400px;
    width: 280px;
}
.profesor_salon .bicicleta {
    line-height: initial;
    width: 150px;
    height: 80px;
    font-size: <?php echo SMALL;?>;
    padding: 20px;
    box-sizing: border-box;
    box-shadow: none;
	color: <?php echo V_OSCURO;?>;
	border: 2px solid <?php echo V_OSCURO;?>;
	background-color: white;
	border-radius:0px;
}
#comprar_bici {
    box-shadow: 0px 4px 0px <?php echo V_CLARO;?>;
}
/*PAGES*/
.pagina {
    margin: 0 auto;
    width: 1024px;
    display: block;
	padding-left: 25px;
	max-width:90%;
	box-sizing: border-box;
}
.pagina h2{
	color:<?php echo BLACK;?>;
}
.pagina_individual>h2 {
    right: initial;
    margin: 0 auto;
}

.pagina_individual {
    padding: 0px;
    box-shadow: none !important;
}
.cont_page {
    padding-top: 10px;
	text-align:justify;
	font-size:<?php echo SMALL;?>;
}

.cont_page h2 {
    margin-top: 20px;
    margin-bottom: 10px;
    font-size: <?php echo MEDIUM;?>;
    text-transform: inherit;
	color: <?php echo BLACK;?>;
	text-align:center;
}
marquee img {
    display: inline-block;
}
.clase_cuadrada:hover {
	background: <?php echo R_OSCURO ?>;
	opacity: 1;
	color:white;
}
.volver_thankyou.boton.amarillo {
	background: #ffd731;
	box-shadow: 0px 4px 0px orange;
	color: #000;
	font-weight: 400;
}
h1.titulo_gift_card {
    font-size: <?php echo LARGE;?>;
	padding: 0px 13px;
    text-align: left;
}

.calendario_gift_card {
	padding: 0px 15px;
	/*border-left: 1px solid silver;*/
	display: inline-block;
}

.calendario_gift_card>h2 {
    text-align: left;
}
.paquetes_check.tipo_gift_card {
    text-align: left;
	display: inline-block;
}

.tipo_gift_card .paquete .circulo {
    width: 101px;
    height: 101px;
    line-height: 101px;
    font-size: 48px;
}

.tipo_gift_card .paquete .precios {
    font-size: <?php echo MEDIUM;?>;
}
.checkout.check_gift {
    max-width: 1140px;
    margin: 0px auto;
    padding: 0px 20px;
}
.tipo_gift_card .paquete.paquete_checkout {
    margin: 20px 17px;
}
.primer_paso_check {
	clear: both;
	padding-top: 20px;
	margin-top: 20px;
	/*border-top: 4px solid <?php echo A_CLARO;?>;*/
	padding-bottom: 50px;
}
.columna_general.form_final_compra {
    width: 700px;
}
#cont_calendario{
	margin-bottom:20px;
}
textarea#mensaje_invitado {
    min-height: 97px;
}
.check_gift .columna_general {
    width: 380px;
    box-sizing: border-box;
}
/*TARJETAS*/
.single_tarjeta>* {
    display: inline-block;
    vertical-align: middle;
    margin: 0px 5px;
    font-size: <?php echo SMALL;?>;
}
.single_tarjeta {
    box-sizing: border-box;
    border-bottom: 1px solid <?php echo GRIS_C;?>;
    padding: 6px 0px;
    text-align: left;
	position:relative;
}
.d_tarjeta {
    font-weight: 800;
    font-size: <?php echo SMALL;?>;
}
.d_tarjeta>* {
    display: inline-block;
    vertical-align: sub;
    font-weight: 400;
    font-size: <?php echo MEDIUM;?>;
}
.annadir_tarjeta {
    line-height: 50px;
    border-bottom: 1px solid <?php echo GRIS_C;?>;
    text-align: left;
    cursor: pointer;
    font-size: <?php echo SMALL;?>;
}
.eliminar_tarjeta {
    position: absolute;
    top: 0px;
    line-height: 39px;
    right: 0px;
    font-size: <?php echo LARGE;?>;
    cursor: pointer;
}
.eliminar_tarjeta:hover{
	opacity:0.6;
}
img.b_tarjeta {
    height: 30px;
}
.annadir_tarjeta:hover {
    color: silver;
}
/*CAMBIOS*/
.fijo_abajo {
    text-align: center;
    position: fixed;
    bottom: 0px;
    left: 0px;
    right: 0px;
    padding: 10px;
    background: white;
	z-index:1;
}
.fijo_abajo>* {
    width: 240px;
    display: inline-block;
}
/*ROGELIO*/
.symbols {
	float: right;
}
.bookings_bottom {
	height: 0px;
	overflow: hidden;
	transition: all .3s ease;
	-webkit-transition: all .3s ease;
}
.bookings_bottom_single {
	overflow: hidden;
	border-bottom: 2px dotted <?php echo GRIS_C;?>;
}
.basic_bookings img {
	position: relative;
	top: 3px;
}
.basic_bookings.single_booking_name {
	font-weight: 400;
}
.bokings_bike img {
	margin-right: 12px;
}
.basic_bookings.symbols {
	float: right;
	border-right: 0px;
}
.bookings_bottom_activo {
	height: auto;
}
.form_siclo > input, .columna_general > input, .datos_usuario_facturacion > input, .data_tarjeta > input {
	font-family: 'Gotham';
	font-weight: 400;
	color: <?php echo GRIS_F  ?>;
	display:block;
	padding: 13px 0px;
	display:inline-block;
}
.columna_general > textarea{
	padding: 13px 0px;
}
.a_claro {
	font-weight: 400;
}
/*RETOQUES CLASE*/
.single-clase #ajax_web {
    display: block;
}

.single-clase>.contenido::after {
    display: none;
}

.profesor_salon {
    top: 99px;
}
.clase_salon {
    bottom: 103px;
}
.form_acceso input{
    margin-left: 0px!important;
    width: 355px;
    height: 50px;
}
</style>