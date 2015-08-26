<?php global $nuevos_colores;?>
<style type="text/css">
*{
	margin:0px;
	padding:0px;
	font-weight:400 !important;
}
body,html{
	display:block;
	min-height:100%;
	font-weight:400;
	overflow-x: hidden;
}/*
html{
	background-image:url("<?php plantilla();?>/images/fodo_1.jpg");
	background-position:center top 31px;
	background-repeat:no-repeat;
	background-attachment:fixed;
}
body{

}*/
ol,ul {
	list-style-position: inside;
}
img{
	height:auto;
	border: 0px solid;
}
a{
	color:inherit;
	text-decoration:none;
	<?php compatible('transition:1s opacity ease;');?>
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
    width: 2px;
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
}
.disabled {
    pointer-events: none;
    opacity: 0.2;
}
.target.no_tarjeta {
    opacity: 0.1;
}
/*generales----------------------*/
a.boton{
	display:block;
}
.checkbox {
	margin-top: 4px;
	margin-left: -5px;
	border-radius: 10px!important;
    display: inline-block;
    vertical-align: middle;
    margin-right: 13px;
    height: 20px;
    width: 20px;
    border: 1px solid <?php echo GRIS;?>;
	<?php compatible('border-radius: 100%;');?>
    cursor: pointer;
}

.checkbox.checked{
    background-image: url("<?php plantilla();?>/images/iconos/check.png");
    background-position:center;
    background-repeat: no-repeat;
    width: 20px;
    height: 20px;
    border-radius: 10px!important;
}
.top_with_video {
    position: relative;
}
/*ERROR GAFA*/
[data-hoverinfo] {
    position: relative;
}
[data-hoverinfo]:hover {
    background-color: #eceae5;
}
[data-hoverinfo]:hover .data_hover{
	display:block;
}
.data_hover {
    position: absolute;
    top: 100%;
    right: 20%;
    color: <?= BLANCO_NUEVO;?>;
    display: block;
    text-align: right;
	background-image:url("<?php plantilla();?>/images/menu/marco_roll_over_menu1.png");
	background-position: 90% 0;
	background-repeat:no-repeat;
	padding-top: 10px;
	padding-right: 5px;
	display:none;
	white-space: nowrap;
}
.int_data_hover{
    padding: 3px 20px;
    background-color: #0BA2FF;
    border-radius: 6px;
	font-size: 11px;
}
.container-fluid,.gafa-mensaje,.gafa-error {
    transition: 0.5s transform linear;
}
.navbar{
    transition: 0.5s all linear !important;
	<?php if( !is_home() ){
		echo 'background-color:white !important;';
	};?>
}
.gafa-mensaje,.gafa-error{
	position: fixed;
	transform	: translateY( -100% );
	right: 0px;
	background-image: url("<?php plantilla(); ?>/images/X2.png");
	background-repeat:no-repeat;
	background-position:right 35px center;
	background-color:<?= AZUL2_NUEVO;?>;
	z-index: 2147483647;
	line-height: 19px;
	font-size: <?php echo SMALL;?>;
	cursor: pointer;
	color: <?php echo BLACK; ?>;
	font-weight: 100;
	padding: 6px 6%;
	left: 0px;
	text-align: left;
	border-bottom: 3px solid #14b3ff;
	background-size: 13px;
}
.gafa-error {
	background-color:<?= NEGRO_NUEVO;?>;
	color:white;
	border-bottom: 3px solid rgb(0, 0, 0);
}
.gafa-error h1,.gafa-mensaje h1 {
	font-size: <?php echo LARGE;?>;
	font-weight: 100;
	margin-bottom:0px;
	color:white;
	margin-top: 5px;
}
/*PREGUNTAS GAFA*/
div#pregunta_gafa {
	position: fixed;
	z-index: 999;
	background: <?= BLANCO_NUEVO;?>;
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
	background-color: <?= AZUL2_NUEVO;?>;
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
/*SECCIONES VERTICAL ALIGN----------------------------------------------------------*/

/*NUEVO CSS----------------------------------------------------------*/

@font-face
{
 font-family: 'gotham1';
 src: url('<?php plantilla();?>/fonts/GothamRnd-Medium.otf');
}
@font-face
{
 font-family: 'gotham2';
 src: url('<?php plantilla();?>/fonts/GothamRnd-light.otf');
}
::-webkit-input-placeholder{
	color: #d5d5d5;
}
small{
	font-family:'gotham1';
	font-size: 11px;
}
.str{
	font-family:'gotham1';
	font-family: 13px!important;
}
.medium{
	font-family:'gotham2';
	font-size: 14px;
}
.large{
	font-family:'gotham1';
	font-size: 17px;
}
big{
	font-family:'gotham1';
	font-size: 32px;
}
h4{
	font-family:'gotham1';
	font-size: 52px;
}
h5{
	font-family:'gotham2';
	font-size: 50px;
	line-height: 38px;
}
h3{
	font-family:'gotham2';
	font-size: 90px;
	line-height: 45px;
	color: <?= GRIS1_NUEVO;?>;
}
/*colores--------------------------*/
<?php
	foreach( $nuevos_colores as $clase => $color ){
		echo '.'.$clase.' { background-color: '.$color.'; }';
		echo '.color_'.$clase.' { color: '.$color.'; }';
	};
?>
.color_gris2{
	color: #9D9999;;
}
.amarillo{
	color: white!important;
}
/*colores---------------------------------*/

/*REDES---------*/
.redes_en_abierto {
    display: none;
}
.redes_en_abierto .medium>* {
    display: inline-block !important;
    vertical-align: middle;
	margin: 0px 5px;
}
.redes_menu{
	background-image:url("<?php plantilla();?>/images/menu/redes.png");
	background-repeat:no-repeat;
	background-position:left center;
	display: inline-block;
	width: 36px;
	height: 30px;
}
.calendario.calendario_front_end {
   background-color: rgba(255, 255, 255, 0.9);
   padding-bottom:19px;
}
.container-fluid {
  padding-right: 0px;
  padding-left: 0px;
  padding-bottom: 0px!important;
}
.container {
  padding-right: 0px;
  padding-left: 0px;
}
.page{
	padding: 8em;
	padding-bottom: 0em!important;
}
input
{
	font-family:'gotham2';
    font-size:11px!important;
    letter-spacing: 1px;
    border-radius: 4px!important;
}
.bicicleta.bici_select{
	background: <?= AZUL_NUEVO;?>!important;
	color: white!important;
}

hr{
	 border-top: 1px solid #e0e0e0!important;
}
.hrmenu{
	border-top: 1px solid #53c8ff!important;
	width: 300px;
	margin-top: 10px;
	margin-bottom:23px;
}
.p1{
	padding: 0.5em;
}
.p2{
	padding: 1em;
}
.navbar{
	border: none;
	padding-top: 23px;
}
.abrio_menu.navbar{
	padding-top: 23px !important;
}
.navbar.menu_pequenna {
    background-color: white;
	padding-top: 0px;
}
.navbar-default{
	background: rgba(0,0,0,0);
}
.navbar small{
	font-size: 13px;
}
.uno{
	margin-top: 9px;
}
.navbar-right{
	margin-right: 0px!important;
}
.container-fluid{
	min-height: 100vh;
	position: relative;
}
.container-fluid>*{
	z-index:2;
/* 	position:relative; */
}
.container-fluid>.top {
    z-index: 1;
	overflow:hidden;
	<?php compatible("transform: translateX(0);");?>
}
#video_home {
position: fixed;
  left: 0px;
  top: 0px;
  right: 0px;
  bottom: 0px;
  height:100%;
  width: 100%;
  margin: 0px !important;
  background-color: white;
  z-index: -2;
  pointer-events: none;
  background-color: rgb(229, 228, 229);
  z-index:1;
  -webkit-transform:translateX(0);
}
div.page {
    background-color: white;
    position: relative;
    z-index: 2;
	/*overflow:hidden;*/
}
footer{
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	padding-left: 1em;
	padding-right: 1em;
}
.navbar-header>.spam>a{
	width:200px;
}
.navbar-header>.spam {
    width: 0px !important;
	overflow:visible;
}
.navbar-header>.spam,.navbar-header>.spam * {
    line-height: 59px;
    display: inline-block;
}
.logo{
	height: 40px;
	margin-top: 0px;
}
.icon{
	text-align: center;
  	display: inline-block;
  	width: 55px;
  	padding: 1em;
}
.icon2{
	text-align: center;
  	display: inline-block;
  	width: 35px;
  	padding: 0.5em;
}
.icons{
	margin-top: 10px;
	width: 190px;
}
.icons2{
	margin-top: 12px;
}
.up{
	margin-top: 7px;
	cursor: pointer;
	margin-left: 30px;
}
.up img{
	width: 47px;
	margin-top: -9px;
}
.letram{
	width: 160px;
	text-align: center;
	border-left: solid 1px #eceae5;
}
.indexfront .col-xs-4{
	border-left: solid 1px #eceae5;
	height: 52px;
  	margin-top: -13px;
	text-align:center;
	cursor:pointer;
}
.indexfront .col-xs-4 a {
    display: block;
    height: 100%;
}
.abrio_menu .indexfront .col-xs-4 {
    border-color: #109FE3;
}
.itemmenu .medium {
    font-size: 14px;
}
.itemmenu .color_gris1 {
    color: #0F84BC;
  font-size: 11px;
  font-family: 'gotham2';
}
.indexfront .col-xs-4 img{
	margin-top: 14px;
}
.indexfront .clases_actuales{
	line-height: 50px;
    font-size: 17px !important;
}
.clases_actuales{
	font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif!important;
	color: <?= GRIS1_NUEVO;?>!important;
}
.up2{
	margin-top: 7px;
}
.botontop{
	margin-top: 40px;
}
.bot1{
	margin-right: 10px;
	font-family:'gotham2';
	border: 0px;
	border-radius: 0px;
	color: white;
	width: 239px;
	padding-top: 1em;
	padding-bottom: 1em;
	font-size: 12px;
	letter-spacing: 2px;
	margin-top: 35px;
	font-size: 14px;
}
.compc{
	margin-left: 22px;
}
.bot2{
	font-family:'gotham2';
	border: 0px;
	border-radius: 0px;
	color: white;
	font-size: 10px;
	line-height: 21px;
	border-radius: 3px;
	width: 300px;
	text-align: center;
}
.clases_nueva .btn {
	padding: 2px 10px!important;
 }
.bot3{
	border: none;
	border-radius: 0px;
	padding: 0.8em;
}
.top{
    background-repeat: no-repeat;
    background-size: 100% 100%;
    width: 100vw;
    height: 100vh;
	background-size: cover;
	background-position: center;
	margin-bottom: 13px;
}
.col {
  margin-top: -20px!important;
}
.title{
	position: relative;
	top:40%;
	left: 0.5%;
	z-index:3;
}
.menuabierto{
	padding: 20px;
	padding-bottom: 6em;
	position: fixed;
	z-index: 90;
	display: none;
	top: 0px;
	left: 0px;
	right: 0px;
	bottom: 0px;
	height: initial !important;
	box-shadow: 0px 0px 0px 20px white inset;
	padding-top: 50px;
	height: 100vh !important;
}
.menuabierto a{
	text-decoration: none;
	display:block;
}
.menuabierto a.instructores_menu{
	display:none;
}
.itemmenu:hover hr {
  width: 90%;
  <?php compatible("transition: all 1s ease;");?>
}
.aprovecha_h2 {
    font-size: 28px !important;
    margin-bottom: 0px;
}

.aprovecha_h3 {
    margin-top: 0px;
    line-height: 31px;
    font-size: 13px;
}
.checkout_solo_clases .block_paquetes_ee {
    position: absolute;
    top: 50%;
    <?php compatible("transform: translateY(-50%);");?>
    margin-top: 27px;
    left: 0px;
    width: 36%;
    pointer-events: none;
}
.checkout_solo_clases .paquetes_check {
	display: -webkit-flex;
	display: -moz-flex;
	display: -o-flex;
}
.checkout_solo_clases .cabecera>small {
    display: none;
}
.checkout_solo_clases .paquetes_check .paquete {
	<?php compatible("flex: 1;");?>
}
[data-idpaquete="regalo"] {
    background: <?= VERDE2_NUEVO;?> !important;
}
[data-idpaquete="regalo"] .precios small {
    color: <?= NEGRO_NUEVO;?>;
}
/*data-paquete para calendario*/
#info [data-idpaquete="regalo"] {
    background: <?= BLANCO_NUEVO;?> !important;
}
#info [data-idpaquete="regalo"].seleccionado {
    background: rgba(205,255,0,.9) !important;
}
#info [data-idpaquete="regalo"] * {
    color: black !important;
}

.checkout_solo_clases [data-idpaquete="regalo"] .precios {
	font-weight: 100 !important;
}
#reserva [data-idpaquete="regalo"] img {
    height: 50px;
}

[data-idpaquete="regalo"] * {
    color: 000 !important;
}
.contmenu{
	margin-top: 50px;
}
.indexfront{
	position: absolute;
	z-index: 100;
}
.reservacion{
	display:none;
	background: rgba(255,255,255,.9);
}
.top2{
	margin-top: -15px;
}
.top2.vertical-align {
  overflow: hidden;
  clear: both;
  padding-top: 10px;
  padding-bottom: 16px;
}
.itemtop2{
	width: 24%;
	display: inline-block;
	margin-top: 10px;
}
.itemtop2.desp > * {
	white-space: nowrap;
}
.rounded{
  font-size: 11px;
  text-align: center;
  line-height: 25px;
  border-radius: 3px;
  color: rgb(255, 255, 255);
  display: block;
	margin-top: 15px;
  font-family: "gotham2";
}
.vertical-align {
  	display: flex;
  	align-items: center;
  	justify-content: center;
  	flex-direction: row;
}
.boton2{
	color: white;
	background: #222222 url("<?php plantilla();?>/images/iconos/pleca.png") 138px 9px no-repeat;
	padding: 0.5em;
	font-size: 10px;
}
.col{
	display: inline-block;
	width: 14.28%;
	margin-top: 20px;
	position: relative;
   	padding-top: 81px;
	vertical-align: top;
}
.titlecal {
  padding: 2em;
  font-size: 10px;
  position: absolute;
  top: -8px!important;
  left: 0px;
  right: 0px;
  line-height: 21px;
  text-transform: uppercase;
  letter-spacing: 3px;
  white-space:nowrap;
}
.contcal{
	overflow: hidden;
}
.print_info_calendar{
	display: none;
}
.text{
	margin-left: 4px;
	padding: 1.5em;
	border: solid 1px #ecebeb;
	cursor: pointer;
}
.clase_calendario {
    min-height: 95px;
    margin-bottom: 6px;
}
.clase_pasada{
	pointer-events:none;
	opacity:0.6;
}
.text:hover{
	background: <?= AZUL2_NUEVO;?>;
	color: white;
	-webkit-box-shadow: -4px 3px 5px 0px rgba(207,207,207,1);
	-moz-box-shadow: -4px 3px 5px 0px rgba(207,207,207,1);
	box-shadow: -4px 3px 5px 0px rgba(207,207,207,1);
}
.text[data-clase_calendario]:hover .botoncal{
	opacity: 1;
}
.brr{
	margin-top: -20px;
}
.paquetes{
	padding: 2em;
}
.pack{
	display: inline-block;
	width: 33%;
}
.paquete{
	background: rgba(255,255,255,.9);
	width: 30%;
	display: inline-block;
	padding: 0.8em;
	margin-top: 20px;
	border: solid 1px #ecebeb;
	cursor: pointer;
	margin-left: 10px;
	-webkit-box-shadow: -4px 4px 5px -1px rgba(194,194,194,1);
  	-moz-box-shadow: -4px 4px 5px -1px rgba(194,194,194,1);
  	box-shadow: -4px 4px 5px -1px rgba(194,194,194,1);
	vertical-align:top;
}
.checkout_solo_clases .circulo{
	text-align: center;
	font-family:'gotham2';
	font-size: 105px!important;
	line-height: 55px;
	margin-bottom: 7px;
}
.circulo{
	text-align: center;
	font-family:'gotham2';
	font-size: 55px!important;
	line-height: 55px;
	margin-bottom: 7px;
}
.precios{
	text-align: center;
	font-family:'gotham1';
	font-size: 10px;
}
.precios small{
	color: <?= GRIS2_NUEVO;?>;
}
.seleccionado[data-idpaquete="277"]{
	background: <?= AZUL2_NUEVO;?>;
	border: solid 1px <?= AZUL2_NUEVO;?>;
	color: white!important;
}
.seleccionado[data-idpaquete="269"]{
	background: <?= VERDE_NUEVO;?>;
	border: solid 1px <?= VERDE_NUEVO;?>;
	color: white!important;
}
.seleccionado[data-idpaquete="271"]{
	background: <?= ROSA_NUEVO;?>;
	border: solid 1px <?= ROSA_NUEVO;?>;
	color: white!important;
}
.seleccionado[data-idpaquete="273"]{
	background: <?= VIOLETA_NUEVO;?>;
	border: solid 1px <?= VIOLETA_NUEVO;?>;
	color: white!important;
}
.seleccionado[data-idpaquete="275"]{
	background: <?= NARANJA_NUEVO;?>;
	border: solid 1px <?= NARANJA_NUEVO;?>;
	color: white!important;
}
.seleccionado .precios small {
   color: white;
}
.seleccionado .small{
	color: white!important;
}
#fancy {
    position: fixed;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    background-color: white;
    z-index: 2000;
    text-align: center;
	cursor:pointer;
}
#iframe_vimeo {
    display: inline-block;
	width: 70vw;
	height: 70vh;
	transform: translateY(15vh);
}

.cerrar_fancy {
    position: absolute;
    top: 10px;
    right: 10px;
	cursor:pointer;
}
div#fancy.fancy_siclo {
    padding: 0px;
}
.fancy_siclo #cont_text_fancy {
    border: none;
    padding: 0px;
	background:none;
}
.tarjeta .info_user_checkout{
	display: none;
}
.info_user_checkout .precio_unitario_paquete {
    display: none;
}
.checkout_solo_clases .columna_general {
    display: inline-block;
    vertical-align: top;
}
.checkout_solo_clases .boton{
	padding: 0.5em;
	padding: 0.5em;
	margin-top: 9px;
}
.checkout_solo_clases .terminos_condiciones, .checkout_solo_clases .fijo_abajo{
	display: inline-block;
}
.fancy_pagina #cont_text_fancy {
    background-color: white;
    height: 100%;
    padding: 4%;
    overflow: auto;
	  margin: 0px !important;
}

#fancy.fancy_pagina {
    padding: 5%;
}
[data-id_fancy] {
    cursor: pointer;
}

[data-id_fancy]:hover {
    text-decoration: underline;
}
.tarjetas_user{
	margin-top: 25px;
}
.eliminar_tarjeta{
	color: <?= AZUL2_NUEVO;?>;
	font-size: 20px;
	cursor: pointer;
	margin-left: 5px;
	line-height: 10px;
	display:none;
}
.cards{
	margin-top: 50px;
	margin-bottom: 20px;
}
.clase_salon{
	width: 690px;
	position: relative;
	margin-top: 80px;
}
.cards{
	text-align: center;
	margin-top:15px;
}
.target{
	display: inline-block;
	width: 15%;
}
.profesor_salon .elemento_centrado{
	font-size: 16px;
	font-family: 'gotham2';
	color: white;
	background: <?= AZUL2_NUEVO?>;
	width: 100px;
	height: 100px;
	line-height: 100px;
	border-radius: 50px;

}
.profesor_salon{
	position: absolute;
	top: -26px;
	left: 285px;
	height: 20px;
}
div.bicicleta.centrado_vertical{
	background: transparent!important;
}
.bicicleta{
	background: #eeeeee;
	color: <?= GRIS2_NUEVO;?>!important;
	width: 48px;
	height: 48px;
	line-height: 50px;
	border-radius: 50px;
	text-align: center;
	display: inline-block;
	margin-bottom: 5px;
	margin-left: 14px;
	transition: transform .5s ease;
	margin-top: 9px;
}
.bicicleta:hover{
	background:<?= AZUL2_NUEVO?>;
	color: white!important;
	transform: scale(0.9);
}
.forma_0,.forma_3{
	opacity: 0;
	pointer-events: none;
}
.forma_1:hover{
	cursor: pointer;
}
.forma_2, .forma_2:hover{
	background: url("<?php plantilla()?>/images/cover.png");
	background-size: cover;
    background-repeat: no-repeat;
    color: transparent!important;
}
.lifo2{
	text-align: right;
	font-family:'gotham2';
	font-size: 11px;
	margin-left: -80px;
}
.lifo{
	text-align: center;
	font-family:'gotham2';
	font-size: 11px;
}
.lf{
	margin-left: 50%;
}
.fr, .right {
	display: inline-block;
}
.item{
	width: 49%;
	display: inline-block;
	border-bottom: solid 1px #dedede;
	padding-bottom:10px;
}
.datos{
	padding-left: 1.5em;
}
.biciblanco hr {
    margin: 18px 0px;
}
.biciblanco .row {
    margin: 0px;
}
.nombre_ub_c {
    padding-left: 0.6em;
}
.d1{
	border-right: solid 1px #dedede;
}
.form1, .clases_nueva {
  	margin-top: 15px;
  	padding-top: 1em;
  	padding-bottom: 1em;
  	padding-left: 4em;
	padding-right: 4em;
	padding-top: 6em;
	padding-bottom: 6em;
}
.ccv{
	width: 24%;
	display: inline-block;
	position:relative;
}
div.ccv {
    width: 36px !important;
    height: 30px !important;
  margin-left: 10px;
}
.page-id-7 div.ccv {
    height: 50px !important;
    vertical-align: middle;
    line-height: 30px;
	display:inline-block !important;
}

.page-id-7 div.ccv>img {
    display: inline-block;
    float: none !important;
}
.data_ccv {
    background-color: white;
    position: absolute;
    top: 100%;
    right: 0px;
    padding: 10px;
    width: 210px;
    display: none;
	z-index: 1;
}

.data_ccv img {
    width: 100%;
}

.ccv:hover .data_ccv {
    display: block;
}
.page-id-7 .ccv{
	vertical-align: top;
}
.alert{
	padding: 0px !important;
	margin: 0px !important;
}
.cabecera{
	margin-bottom: 16px;
}
#clases .cabecera{
	margin-top: 0px;
}
.cantidad_clases_cuenta {
    border-top: 1px solid #dedede;
    margin: 34px 3px;
    padding: 11px;
    text-align: center;
    margin-bottom: 0px;
}
#clases .btn {
    margin: 0 auto;
    width: 100%;
}
.page-id-7 .annadir_tarjeta {
    margin: 0 auto;
}
.form-control, input{
	margin-left: 3px;
}
input{
	border: 0px solid transparent;
}
.page-id-7 input.form-control,.single-cron_gift_card input.form-control {
	width: 300px;
	margin: auto;
}
.itemtop2 * {
    padding: 0px !important;
    line-height: 34px;
}
.selector_change_instructor{
	margin-left: 15px;
	border: solid 1px #c1c1c1;
	-webkit-appearance: none;
  	-webkit-border-radius: 0px;
  	height: 32px;
  	background-image:url(<?php plantilla()?>/images/iconos/down.png);
  	background-repeat:no-repeat;
  	background-position: right center;
	line-height: initial !important;
	text-indent: 10px;
	font-size: 11px;
	font-family: 'gotham1';
}
.checkout_solo_clases select{
	-webkit-appearance: none;
  	-webkit-border-radius: 0px;
  	height: 32px;
  	background-image:url(<?php plantilla()?>/images/iconos/down.png);
  	background-repeat:no-repeat;
  	background-position: right center;
}
.fdb{
	margin-top: 10px;
}
.f1{
	background-image:url(<?php plantilla()?>/images/iconos/form1.png);
  	background-repeat:no-repeat;
  	background-position: right center;
}
.f2{
	background-image:url(<?php plantilla()?>/images/iconos/form2.png);
  	background-repeat:no-repeat;
  	background-position: right center;
}
footer{
	padding: 1.1em;
}
footer a{
	color: #939393;
}

.dia.dia_menu {
    display: none;
}
.hora>h2 {
    display: none;
}
.cuenta{
  padding: 7em 0px;
  max-width: 1288px;
  margin: 0 auto;
}
.bienvenido_cuenta {
    display: block;
    font-size: 25px;
}

.cuenta>.row {
    padding-top: 6vh;
}
.share{
	padding: 3em;
	border: 1px solid #eeeded;
}
div.titulo_row_cuenta {
    margin-top: 10px;
}

.titulo_row_cuenta {
    border-bottom: 1px solid #dedede;
    padding-bottom: 17px;
    margin-bottom: 16px;
}
.sub_titulo_cuenta {
    text-align: center;
    font-family: "gotham1";
    padding-top: 11px;
    padding-bottom: 11px;
}
.page-id-7 .tarjetas_user {
    margin-top: 0px;
}
.cuenta small {
    font-family: "gotham2";
}
.codigo{
	background: white;
	padding-left: 2em;
	padding-right: 2em;
	padding-top: 0.5em;
	padding-bottom: 0.5em;
	text-align: center;
	border: 1px solid #eeeded;
}
.hcompra{
	border: solid 1px #ecebeb;
	padding: 1em;
}
.hcompra .bot3 {
    font-size: 10px;
}
.hcompra2{
	border: solid 2px transparent;
	padding: 1em;
}
.hcompra2 small {
    white-space: nowrap;
}
.hcompra2.reserva_futura{
	border: solid 2px #b8e5fd;

}
.cancel{
	opacity: 0;
	cursor: pointer;
}
.hcompra2.reserva_futura:hover{
	border: solid 2px #40d7ff;
}
.hcompra2:hover .cancel{
	opacity: 1;
}
.cc{
	line-height: 28px!important;
}

.equipo{
	width: 100%;
	margin-top: 70px;
}
.compartir{
	text-align: center;
}
.botleft{
	margin-left: 10px;
}
.regale{
	margin-bottom: 200px;
}
.regalepad{
	padding: 5em;
	border: solid 1px #e8e8e8;
}
.parallax_circulos{
	position: fixed;
	z-index: 1;
	pointer-events:none;
}
#parallax1{
	bottom: -24%;
	left: -8%;
}
#parallax2{
	top: 55%;
	right: -17%;
}
#parallax3{
	left: -20%;
}
#parallax4{
	right: -9%;
}
#parallax5{
	right: -10%;
}
.primer_paso_check{
	background: white;
	padding: 0.14em;
	margin-top: 20px;
	position: relative;
}
.volver_a_paquetes{
	cursor: pointer;
	position: absolute;
	cursor: pointer;
	width: 20px;
	right: 10px;
	top: 5px;
}
.compra_clases{
	margin-top: 80px;
}
.compra_clases .paquete{
	width: 13.8%;
	padding-top: 2.3em;
	padding-bottom: 2.3em;
	margin-left: 0px;
	margin-right: 3.3%;
}
.compra_clases .paquetes_check :last-child{
	margin-right: 0;
}
.compra_clases .paquete .circulo{
	text-align: center;
	font-family:'gotham2';
	font-size: 80px;
	line-height: 100px;
	margin-bottom: 20px;
}
.checkout.checkout_solo_clases {
    margin-top: 30px;
}
.pfr{
	padding: 2em;
	max-width: 1440px;
	margin: 0 auto;
	margin-top: 90px;
}
.faq{
	display: block;
}
.terminos{
	display: none;
}
ul li{
	list-style: none;
}
ul li a{
	cursor: pointer;
	color: #40d7ff;
}
ul li a:hover{
	text-decoration: none;
	color: #40d7ff;
}
.inactive{
	color: black;
}
.article{
	margin-bottom: 50px;
}
.infoi{
	margin-top: 40px;
}
.rate_widget {
    border:     1px solid #CCC;
    overflow:   visible;
    padding:    10px;
    position:   relative;
    width:      180px;
    height:     32px;
}
.ratings_stars {
    background: url('<?php plantilla();?>/images/star_empty.png') no-repeat;
    float:      left;
    height:     24px;
    padding:    2px;
    width:      12px;
	cursor:pointer;
}
.ratings_stars:nth-child(even) {
    background-position: -12px 0px;
}
.star_s{
    background: url('<?php plantilla();?>/images/star_sel.png') no-repeat;
}
.ratings_over {
    background: url('<?php plantilla();?>/images/star_highlight.png') no-repeat;
}
.primer_paso_check{
	background: <?= GRIS4_NUEVO?>;
}
.checkout_solo_clases .form_final_compra{
	width: 55%;
	margin-left: 2.3%;
	margin-bottom:25px;
}
.checkout_solo_clases .primer_paso_check{
	<?php compatible("box-shadow: -2px 0px 1px 0px rgba(232,232,232,1);");?>
	min-height:215px;
}
.checkout_solo_clases .clases_nueva{
	margin-top: 0px!important;
	padding-right: 5em;
	padding:20px;
}
.checkout_solo_clases .columna_general.info_user_checkout {
    width: 36%;
}
.checkout_solo_clases .form_siclo{
	margin-top: 8px!important;
	padding: 21px;
	padding-left: 20%;
	  padding-top: 23px;
}
.checkout_solo_clases .form_siclo .cabecera {
    text-align: left;
	margin-bottom: 23px;
}
.checkout_solo_clases .form_siclo .cabecera>small {
    float: right;
    margin-top: 4px;
    margin-right: 4px;
}
.checkout_solo_clases .form-group {
  margin-bottom: 5px;
}
.checkout_solo_clases .tarjetas_user {
    margin-top: 0px;
}
.clases_nueva .titclase {
    margin-top: 16px;
}
.checkout_solo_clases .form_acceso, .checkout_solo_clases .clases_nueva{
	background: <?= GRIS4_NUEVO;?>!important;
	border-right: solid 1px #f1f1f1;
}
.checkout_solo_clases .tarjetas_user small{
	display: none;
}
.d_tarjeta{
	background:  #efeeee;
	color: #989898;
	padding-top: 1.4em;
	padding-bottom: 0.9em;
	padding-left: 1em;
	padding-right: 11.6em;
	border-radius: 3px;
	font-size: 11px;
	letter-spacing: 4px;
	font-weight: normal;
}
#info .d_tarjeta{
	padding-right: 10em;
}
.checkout_solo_clases .d_tarjeta{
	padding-right: 11.6em;
}
.single_tarjeta{
	width: 400px;
	margin: 0 auto;
	position: relative;
	margin-bottom: 7px;

}
.checkout_solo_clases .single_tarjeta{
	width: 425px;
	margin: 0 auto;
	position: relative;
	margin-bottom: 7px;
}
.checkout_solo_clases .annadir_tarjeta{
	width: 366px!important;
	margin: 0 auto;
	position: relative;
}
.imground{
	border-radius: 3px;
	margin-left: -2px;
}
.finalizar_compra_ya,.regala_ahora,.aplicar_descuento{
	background: <?= AZUL2_NUEVO;?>;
	padding: 1em;
	margin: 0 auto;
	color: white;
	cursor: pointer;
	font-family:'gotham2';
	border: 0px;
	border-radius: 3px;
	font-size: 11px;
	text-align: center;
}
.finalizar_compra_ya:hover,.regala_ahora:hover,.aplicar_descuento:hover{
	color:black;
}
#info .finalizar_compra_ya{
	width: 100% !important;
}
.fijo_abajo{
	width: 100%;
}
.checkout_solo_clases .fijo_abajo{
	width: 50%;
}
.checkout_solo_clases .finalizar_compra_ya{
	margin-top: 16px;
	padding: 0.9em;
}
.annadir_tarjeta{
	font-size: 8px;
	  text-align: center;
	  padding: 1em;
	  background: #efeeee;
	  color: #989898;
	  margin-bottom: 30px;
	  border-radius: 5px;
	  margin-top: 25px;
	  width: 100%;
}
.terminos_condiciones{
	margin: 0 auto;
	position: relative;
	width: 225px;
	font-size: 12px;
	color:#bababa;
}
.guardar_pregunta_tarj{
	font-size: 12px;
	color: <?= GRIS2_NUEVO;?>;
}
.terminos_condiciones .checkbox,.guardar_pregunta_tarj .checkbox {
	display: inline-block;
	vertical-align: middle;
	margin-right: 13px;
	height: 13px;
	width: 13px;
	border: 1px solid <?php echo GRIS;?>;
	border-radius: 4px !important;
	cursor: pointer;
}
.terminos_condiciones .checkbox:hover {
	box-shadow: 0px 0px 0px 4px white inset;
	background: <?php echo GRIS;?>;
}
.terminos_condiciones .checkbox.checked{
	box-shadow: 0px 0px 0px 4px white inset;
	background: black;
}
.n_tarjeta{
	display: none;
}
.single_tarjeta img{
	margin-top: -5px;
	border: none;
}
.back{
	cursor: pointer;
}
.back:hover{
	background: <?= AZUL2_NUEVO;?>;
}

.b_tarjeta, .n_tarjeta{
	margin-right: 15px;
}
#fancy{
	background: rgba(255, 255, 255, 0.7);
	padding: 7em;
}
div#fancy.fancy_siclo {
    background: rgba(0, 0, 0, 0.7);
}
#cont_text_fancy{
	padding: 115px;
	position:relative;
	cursor:initial;
}
.h1_thank{
	color: #f73a84;
	font-family: 'gotham2';
}
.mini_dex_thank{
	color: <?= GRIS2_NUEVO;?>;
}
.mini{
	margin-top: 15px!important;
	width: 260px;
	margin: 0 auto;
	position: relative;
}
.volver_thankyou{
	margin: 0 auto;
	position: relative;
	margin-top: 20px;
	width: 20%;
	color: black;
	border: solid 1px black;
	padding: 1em;
	background: #faf9f7;
	font-family: 'gotham2';
	font-size: 11px;
}
.form_siclo article{
	  width: 170px!important;
}
.historial{
	max-height: 50vh;
	overflow: auto;
}
iframe{
	display: none;
}
.paqinline1{
	width: 25%;
}
.paqinline2{
	width: 75%;
}
.paqinline3{
	width: 40%;
}
.paqinline4{
	width: 60%;
}
.icon2 {
    display: none;
}
.paqinline1, .paqinline2, .paqinline3, .paqinline4{
	display: inline-block;
}
.dos{
	display: none;
}
body.page{
	padding: 0em;
	max-width: initial;
}
.circulo{
	font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif!important;
}
.checkout_solo_clases  .precios{
	font-size: 14px;
	font-weight: bold!important;
}
.precios{
	font-size: 12px;
	font-weight: bold!important;
}
.titclase{
	font-size: 10px!important;
	font-family: "gotham1"!important;
}
.checkout_solo_clases .paquete[data-idpaquete="277"]:hover{
	background:<?= AZUL2_NUEVO;?>!important;
	border: 1px solid <?= AZUL2_NUEVO;?>;
}
.checkout_solo_clases .paquete[data-idpaquete="269"]:hover{
	background:<?= VERDE_NUEVO;?>!important;
	border: 1px solid <?= VERDE_NUEVO;?>;
}
.checkout_solo_clases .paquete[data-idpaquete="271"]:hover{
	background:<?= ROSA_NUEVO;?>!important;
	border: 1px solid <?= ROSA_NUEVO;?>;
}
.checkout_solo_clases .paquete[data-idpaquete="273"]:hover{
	background:<?= VIOLETA_NUEVO;?>!important;
	border: 1px solid <?= VIOLETA_NUEVO;?>;
}
.checkout_solo_clases .paquete[data-idpaquete="275"]:hover{
	background:<?= NARANJA_NUEVO;?>!important;
	border: 1px solid <?= NARANJA_NUEVO;?>;
}
.checkout_solo_clases .paquete:hover small, .checkout_solo_clases .paquete:hover .small{
	color: white!important;
}
.fechas{
	margin-bottom:100px;
}
.soft_ope {
    margin: 0 auto;
    display: block;
	max-width:90%;
}
.imp_nom{
	font-family:'gotham2';
	font-size: 17px;
	color: <?= GRIS1_NUEVO;?>!important;
}
.slogan{
	font-family:'gotham1';
	font-size: 32px;
	padding: 3em;
}
.slogan2{
	margin-left: 460px!important;
}
.cont_red{
	display: inline-block;
}
a.redes_menu.red_facebook{
	background-position: -5px -35px;
}
a.redes_menu.red_youtube {
	background-position: -43px -35px;
}
a.redes_menu.red_instagram {
	background-position: -79px -35px;
}
a.redes_menu.red_twitter {
	background-position: -118px -35px;
}
a.redes_menu.red_facebook:hover{
	background-position: -5px -2px;
}
a.redes_menu.red_youtube:hover {
	background-position: -43px -2px;
}
a.redes_menu.red_instagram:hover {
	background-position: -79px -2px;
}
a.redes_menu.red_twitter:hover {
	background-position: -118px -2px;
}
.spot{
	margin-top: 6px;
	margin-right: 30px;
	background-image: url('<?php plantilla();?>/images/iconos/spot1.png');
	width: 36px;
	height: 36px;
	cursor: pointer;
}
.spot:hover{
	background-image: url('<?php plantilla();?>/images/iconos/spot.png');
}
#info .color_gris1{
	font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif!important;
	letter-spacing: 1px;
	font-size: 20px;
}
#info .color_gris2{
	font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif!important;
}
.content{
	padding: 5em;
	padding-top: 0px!important;
	text-align: justify;
}
#tabs{
	position: fixed;
	margin-top: 0px;
}
.hrdown{
	position: relative;
	top: -10px;
}
.guardar_pregunta_tarj{
	margin-bottom: 30px;
	margin-left: 10px;
}
.page-id-7 .registroinfo,.single-cron_gift_card .registroinfo {
	position: relative;
	top: 195px;
}
#info .bot2, #info .form_acceso input, .checkout .form_acceso input,.checkout .bot2 {
    width: 100% !important;
    margin-left: 0px !important;
}
.d1.p2 input {
	display: block;
	text-align: left;
	width: 100%;
	padding: 0 12px;
	margin: 5px 0;
}
.d1.p2 > h1 {
	font-size: 25px;
}
.btn-cuenta {
	width: 100%;
}
.btn-cuenta:first-of-type {
	margin-bottom: 30px;
}
.toggleDatosUsuario, .toggleChangePassword {
	background: #efeeee;
	color: #989898;
	text-align: center;
	height: 30px;
	line-height: 30px;
	font-size: 8px;
	border-radius: 5px;
	margin-bottom: 15px;
	cursor: pointer;
	text-transform: uppercase;
	letter-spacing: 2px;
}
.toggleDatosUsuario:hover, .toggleChangePassword:hover {
	opacity: .7;
}
.userInfoCont, .cambio_contrasenna {
	display: none;
}
.page-id-7 .d1.p2 input.ccv {
	width: 20%;
	display: inline-block;
	vertical-align: top;
	margin-top: 0px;
	margin-left: 5px;
}
.page-id-7 .d1.p2 .alert {
	margin-top: 0;
	float: right;
	position: relative;
	top: 3px;
}
.page-id-7 .btn.crear_tarjeta {
	width: 100%;
	text-align: center;
}
.page-id-7.logged-in .guardar_pregunta_tarj {
	display: none;
}
.img_con_logo {
	display: none;
}
.page-id-7 .eliminar_tarjeta{
	display:inline-block;
}
.page-id-7 .d_tarjeta {
    padding-right: 9.5em;
}
/*THAJKYOU*/
.thankyou_fancy {
    width: 320px;
    margin: 0 auto;
    font-family: 'gotham2';
	padding: 20px;
    background-position: center bottom -371px;
    background-repeat: no-repeat;
	/*background-image:url("<?php plantilla()?>/images/circulos/c1.png");*/
	background-color: rgba(255,255,255,.9);
	position:relative;
}

.thankyou_fancy>h2 {
    font-size: 38px;
    margin: 0px;
}

.thankyou_fancy>h3 {
    font-size: 15px;
    margin: 0px;
}

.thankyou_fancy>hr {
    margin: 0px;
    margin-bottom: 13px;
}

.links_thankyou>* {
    display: inline-block;
    vertical-align: middle;
}

.separador_th {
    margin: 10px;
}
.links_thankyou .cerrar_fancy {
    position: static;
}
.checkout_solo_clases [data-idpaquete="regalo"].paquete:hover .small,.checkout_solo_clases [data-idpaquete="regalo"].paquete:hover small{
	color: black !important;
}
/*GIFT CARD*/
#section_gift_card {
    display: block;
	margin-bottom: 200px;
}
.titulo_gift_card {
    font-size: 28px !important;
}

.titulo_gift_card>* {
    display: inline-block;
    vertical-align: middle;
}
.titulo_gift_card .aprovecha_h3 {
    color: rgb(102, 102, 102);
    margin-left: 20px;
	font-family: "gotham2";
}

.titulo_gift_card>img {
    margin-right: 12px;
    position: relative;
    bottom: 6px;
}

.paquetes_check.tipo_gift_card>* {
    display: inline-block;
    vertical-align: top;
}

.nueva_maq_gift {
    width: 30%;
	bottom: 22px;
	position:relative;
}

.calendario_gift_card {
	width: 26%;
	border: 1px solid #e7e7e7;
	margin: 0 2%;
	border-top:0px;
	border-bottom:0px;
}
.tipo_gift_card .circulo {
    font-size: 56px !important;
    margin-bottom: 0px;
    line-height: 52px;
}

.tipo_gift_card .titclase {
    display: none;
}

.tipo_gift_card .paquete {
    height: 113px;
}
.tipo_gift_card .precios,.tipo_gift_card .precios * {
    font-size: 10px !important;
    margin-top: 11px;
}

.tipo_gift_card .circulo img {
    height: 43px;
}
.titulo_gift_card>.color_azul {
      vertical-align: baseline;
}
/* calendar styles */
div#cont_calendario {
    width: 240px;
    margin: 0 auto;
	font-family: "gotham2";
}
#cont_calendario .navigation {
    position: relative;
	line-height: 25px;
	font-size: 10px;
	font-weight: 800;
	text-align:center;
	padding-top:5px;
}
#cont_calendario .navigation>* {
    display: inline-block;
    vertical-align: middle;
	cursor:pointer;
}
#cont_calendario .navigation .prev,#cont_calendario .navigation .next {
	height:20px;
	width:20px;
	background-repeat:no-repeat;
	background-position:center;
}
#cont_calendario .navigation .prev{
	float: left;
	background-image:url("<?php plantilla();?>/images/prev_c.png");
}
#cont_calendario .navigation .next {
	float: right;
	background-image:url("<?php plantilla();?>/images/next_c.png");
}
#cont_calendario table {
    border-collapse: collapse;
    font-size: 0.9em;
    table-layout: fixed;
	width:100%;
}
#cont_calendario table th {
	border: 0 none;
	font-weight: bold;
	text-align: center;
	padding: 4px 0px;
	text-transform: uppercase;
}
#cont_calendario table td,#cont_calendario table th {
    border: 0 none;
    padding: 2px;
	font-size: 10px;
}
#cont_calendario table td a,#cont_calendario table th span {
	border: 1px solid #eff1e9;
	display: block;
	text-align: center;
	line-height: 23px;
	width:30px;
	color:white;

}
#cont_calendario table td.current a:hover {
    background-color: <?= AMARILLO_NUEVO;?>;
}
#cont_calendario table td.current a,#cont_calendario table th span{
	color:#9d9d9d;
}
#cont_calendario table td.current.today a{
	color:<?= BLANCO_NUEVO;?> !important;
    background-color: <?= AZUL2_NUEVO;?> !important;
}
#cont_calendario .navigation .title {
    text-transform: uppercase;
    font-size: 11px;
}
/*gift inputs invi*/
.paquetes_check.tipo_gift_card .data_friend {
    width: 39%;
}
.entradas_regalo {
    box-shadow: 0px 2px 5px -1px rgb(194, 194, 194);
    padding: 8px 39px;
}
.entradas_regalo>input,.entradas_regalo>textarea {
    display: block;
    width: 100%;
    padding: 0px;
    margin: 10px 0px;
    text-indent: 11px;
    height: 29px;
    background-color: rgb(239, 238, 238);
	border: 1px solid rgba(0, 0, 0, 0);
	font-size:11px;
	color:rgb(51,51,51);
}
.entradas_regalo>textarea {
	height: 76px;
	font-family: "gotham2";
	padding: 5px 10px;
	text-indent: 0px;
	resize: none;
}

.regala_ahora {
    margin-top: 15px;
    width: 279px;
}
.regala_ahora:hover{
	color:<?= NEGRO_NUEVO?>;
}
#compra_class,#section_gift_card {
	  margin-bottom:100px;
}
.page_cron_gift {
    text-align: center;
    width: 477px;
    margin: 10px auto;
    font-family: "gotham2";
    margin-top: 50px;
	max-width:90%;
}

.page_cron_gift>h2, .page_cron_gift>h2>strong {
    margin-top: 38px;
    font-size: 17px !important;
}

.page_cron_gift>h1 {
    margin-top: 13px;
    font-size: 31px;
}

.page_cron_gift>hr {
    margin-top: 32px;
    margin-bottom: 28px;
}

.mensaje_invitador cite {
    line-height: 20px;
    font-size: 19px;
    font-style: normal;
}

.page_cron_gift>a {
    display: block;
    line-height: 48px;
    width: 233px;
    margin: 0 auto;
    margin-top: 30px;
    margin-bottom: 30px;
    border-radius: 3px;
    text-transform: uppercase;
    color: white;
}
/*INSTRUCTORES HOME*/
#cont_cont_canvas{
	position:relative;
}
#equipo_canvas {
    position: relative;
    text-align: center;
	padding-top:30px;
	z-index:0;
	/*margin-left: 8%;*/
    width: 100%;
}
#equipo_canvas [data-instructor="4806"]{
	display:none;
}
#equipo_canvas .mas_info_prof {
    position: relative;
    bottom: 10px;
}
.canvas_e_i,.canvas_e_d {
    position: absolute;
    top: 50%;
    z-index: 9;
    margin: 10px;
    cursor: pointer;
	<?php compatible("transform: translateY(-50%);");?>
	<?php compatible("transition: 1s opacity ease;");?>
}
#cont_canvas{
	position:relative;
	overflow-x:auto;
}
.canvas_e_i {
    left: 0px;
}

.canvas_e_d {
    right: 0px;
}

.canvas_e_i:hover, .canvas_e_d:hover {
    opacity: 0.6;
}
.i_en_c {
    display: inline-block;
    width: 25%;
    vertical-align: bottom;
    position: relative;
    position: absolute;
    bottom: 0px;
    z-index: 1;
  <?php compatible("filter: grayscale(100%);");?>
}
.i_en_c img {
    max-width: 100%;
    height: auto;
	opacity:1 !important;
}

.i_en_c:first-child {
    position: relative;
    margin: 0px;
    z-index: 2;
    left: 0px;
}
.i_en_c:hover,.instruc_no_hover {
  <?php compatible("filter: grayscale(0%);");?>
}
.info_en_c {
    position: absolute;
    z-index: 20;
    font-family: "gotham2";
}
.i_name {
    display: block;
    padding-right: 89px;
    width: 244px;
    line-height: 34px;
    padding-bottom: 18px;
	background-image:url("<?php plantilla();?>/images/equipo/globo_i2.png");
	background-repeat:no-repeat;
	background-position:left top;
	color:white;
  margin-right: 0px;
  margin-left: auto;
}

.mas_info_prof {
    margin-right: 100px;
    background-color: white;
    line-height: 37px;
    text-align: center;
    vertical-align: middle;
    box-shadow: 3px 3px 0px -1px rgba(0, 0, 0, 0.08);
    padding-left: 28px;
    font-size: 13px;
	color:#282728;
	white-space:nowrap;
}
.ir_mas_i_i{
    font-family: "gotham1";
	border-left: 1px solid #bcc1ca;
	color:black;
    display: inline-block;
    line-height: 24px;
    padding-left: 15px;
    margin-left: 28px;
    padding-right: 32px;
    cursor:pointer;
	background-image:url("<?php plantilla()?>/images/equipo/see_more_info.png");
	background-repeat:no-repeat;
	background-position:right 15px center;
}
.ir_mas_i_i:hover{
    opacity:0.6;
}
/*instructores loop*/
.instructor_loop {
    display: inline-block;
    vertical-align: bottom;
    width: 300px;
    margin: 30px 10px;
}
.instructor_loop img {
    max-width: 100%;
    height: auto;
}

.instructor_loop .i_name {
  padding: 0px;
  background-image: none;
  font-size: 13px;
  width: 150px;
  line-height: 30px;
  margin: 7px auto;
  border-radius: 5px;
}

.instructor_loop .info_en_loop {
    text-align: center;
}

.instructor_loop .mas_info_prof {
display: inline-block;
  margin: 0px auto;
  font-size: 10px;
  padding-left: 16px;
}
#loop_instructores {
    text-align: center;
}
.nombre_estrellas_ins big {
    font-size: 58px;
}
/*CALENDARIO INSTRUCTOR*/
.infoi .clase_calendario>.large {
    display: none;
}

.infoi .clase_calendario {
    padding: 0px;
    min-height: initial;
    line-height: 18px;
}
.infoi .calendario_front_end {
    margin: 33px 0px;
    font-size: 10px;
    width: 505px;
}

.infoi .titlecal {
    white-space: initial;
    line-height: 13px;
    text-align: center;
    padding: 11px 5px;
    font-size: 8px;
	letter-spacing: 2px;
}

.infoi .col {
    padding-top: 66px;
}

.infoi .clase_calendario .medium {
    font-size: 10px;
}
.infoi .clase_calendario small {
  font-size: 8px;
  color: rgb(146, 145, 145);
  font-family: 'gotham2';
}
.infoi .clase_calendario:hover small {
    color: white;
}
.infoi .titlecal strong {
    display: block;
}
.nombre_estrellas_ins>div,.nombre_estrellas_ins>ul {
    display: none;
}

.nombre_estrellas_ins {
    min-width: 100%;
    display: block;
}

.descripcion_instruct {
    min-width: 100%;
		white-space: pre-wrap;
}

.infoi>* {
    display: block !important;
}

.div_cal_i {
    margin-top: 0px;
}
/*EXPIRACION CUENTA*/
.bloque_expiracion {
    border: 1px solid rgb(225, 225, 225);
    border-right: none;
    border-left: none;
    border-bottom: none;
    margin: 0px 24px;
    box-shadow: 0px 3px 0px 0px white inset,0px -3px 0px 0px white inset;
    padding: 3px 0px;
    margin-bottom: 1px;
	background-color:#f7f6f6;
}

.bloque_expiracion>h2 {
    font-size: 15px;
    margin: 9px;
    font-family: "gotham1";
    margin-bottom: 5px;
	color:#666666;
}

.bloque_expiracion>p {
    font-size: 11px;
    font-family: "gotham2";
	color:#bfbebe;
}

.bloque_expiracion:last-of-type {
    border-bottom: 1px solid rgb(225, 225, 225);
    margin-bottom: 17px;
}

.smallMargin {
	margin-left: 5px;
}
/*ARREGLOS*/
.data_tarjeta select, .data_tarjeta .cvv {
    vertical-align: middle;
    margin-top: 0px;
}
.link_social {
    display: block;
    margin-top: 10px;
}
/*CÓDIGO PROMOCIONAL*/
#codigo_promocional>h1 {
    text-align: center;
    font-size: 24px !important;
    margin-bottom: 28px;
}

#codigo_promocional>p {
    text-align: center;
    line-height: 16px;
    margin-bottom: 0px;
    font-family: "gotham2";
    font-size: 14px;
	color:#898789;
}

#codigo_promocional>p strong {
    font-family: "gotham1";
	color:#333333;
}

.cuadro_codigo {
    margin: 35px 0px;
    background-color: #f5f5f5;
    line-height: 76px;
    text-align: center;
	box-shadow: -4px 4px 5px -1px rgb(194, 194, 194);
	font-size:15px;
    font-family: "gotham2";
	white-space:nowrap;
}
.cuadro_codigo>.cuadrito {
    background-color: white;
    display: inline-block;
    vertical-align: middle;
    line-height: 36px;
    width: 224px;
    margin: 0px 20px;
	border:1px solid #dddcdc;
}

.cuadro_codigo>.separador_codigo {
    display: inline-block;
    margin: 0px 22px;
}
.compartir_codig {
    display: inline-block;
    margin-right: 19px;
}
.bloque_descuento_check>* {
    display: inline-block;
    vertical-align: middle;
    width: 48%;
    margin: 0px;
}

.bloque_descuento_check>span {
    margin-top: 0px !important;
    line-height: 33px;
    margin-left: 4%;
    padding: 0px !important;
}

.bloque_descuento_check {
    margin: 10px 0px;
}
#info .paquete.primera_con_codigo.seleccionado {
    background: <?= R_OSCURO;?> !important;
}
/*QUIENES SOMOS*/
.page-quienes-somos {
    font-size: 24px;
    text-align: center;
    font-family: "gotham2";
}
.cont_somos{
	width:492px;
	max-width:100%;
	margin:0 auto;
}
.cont_somos p {
    margin-bottom: 38px;
}
.ubicacion {
    margin-top: 125px!important;
    margin: 0 auto;
    width: 81%;
}
.ubic_item1{
	width: 59%;
	margin-right: 1%;
	display: inline-block;
	vertical-align: top;
}
.ubic_item2{
	width: 40%;
	display: inline-block;
	vertical-align: top;
}
.ubi_info{
	padding: 1.5em;
	background: #f9f9f9;
}
.icon_info{
  width: 36px;
  height: 36px;
  background: rgb(233, 233, 233);
  display: inline-block;
  vertical-align: middle;
  line-height: 34px;
  text-align: center;
}
.info_down{
	margin-bottom: 25px;
}
.inlinfo1{
	width: 12.8%;
}
.inlinfo2{
	width: 87%;
}
.inlinfo{
	display: inline-block;
	vertical-align: top;
	font-size:12px;
}
.mapa_info{
	border: none;
	display: block!important;
	width: 100%;
  	height: 330px;
}
.hr_info{
	line-height: 20px;
}
.title_info{
	margin-bottom: 17px;
}
span.info_lugar {
  vertical-align: middle;
  display: inline-block;
  width: 50%;
}
.info_dato{
	margin-left: 10px;
	font-size:14px;
}
.info_down>div {
    display: inline-block;
    vertical-align: middle;
	font-size:14px;
}
.link_to_ub img {
    height: 30px;
    width: auto;
    display: inline-block;
    vertical-align: middle;
    position: relative;
    bottom: 5px;
}
.link_to_ub {
    text-decoration: none !important;
}
.icon_info img {
    max-width: 70%;
    height: auto;
    max-height: 70%;
}
.cintillo_menu {
    font-family: "gotham2";
    position: absolute;
    top: 0px;
    left: 0px;
    right: 0px;
    text-align: center;
    color: white;
    padding: 6px;
	font-size: 12px;
	letter-spacing: 0.2px;
}
.cintillo_menu strong {
    font-family: "gotham1";
	font-size: 12px;
}
.navbar.con_citillo {
    padding-top: 29px!important;
}
.cintillo_menu span {
    display: inline-block;
    border-bottom: 1px dotted;
	text-transform:uppercase;
}
.cintillo_menu br{
	display:none;
}
</style>
