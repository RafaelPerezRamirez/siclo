<style type="text/css">
@font-face
{
 font-family: 'gotham1';
 src: url('<?php plantilla();?>/fonts/GothamRnd-Medium.otf');
}
input, select, textarea{
    padding: 0em!important;
    margin-bottom: 10px!important;
    height: 36px;
	background-color:white;
    margin-left: 10px!important;
    border-radius: 3px;
}
#panel_final input, #panel_final select{
    background: #eeeeee!important;
    box-shadow: -7px 6px 5px 0px rgba(240,240,240,1)!important;
}
#panel_final textarea{
    text-align: left;
    padding: 0.8em!important;
    background: white;
    width: 45%;
    border: solid 1px #dedede;
    height: 130px;
	text-transform:none !important;
}
html{
	background-image:url("<?php  plantilla();?>/images/back.jpg")!important;
    background-position: center center;
    background-repeat:no-repeat;
    height: 100vh;
    background-size: cover;
    background-attachment: fixed!important;
}
body.logged-in,.logged-in #menu_sup,.logged-in #submenu_ad{
	min-width:1390px;
	box-sizing:border-box;
}
<?php
if( $this->role ){
	echo 'body>.contenido.centrado_vertical{
		display:none;
	}';
};?>
div#cargando {
    background-color: rgba(255,255,255,0.9);
    background-image: url("<?php plantilla();?>/eliminar/logos/logo_admin.png");
}
.editar_elemento{
    position: absolute;
	background-image:url("<?php imagenes()?>/editar.png");
	width: 15px;
    height: 54px;
	background-position: center;
	background-repeat: no-repeat;
	cursor: alias;
    padding-right: 5px;
    padding-left: 30px;
    border-right: solid 1px <?php echo GRIS_C?>;
    top: 0px;
    left: 0px;
}
.usando .editar_elemento{
	background-image:url("<?php imagenes()?>/editar2.png");
}
.editar_elemento:hover {
	background-color: #23cffd;
}
.eliminar_post {
    cursor: pointer;
}

.eliminar_post:hover {
    opacity: 0.3;
}
/*MENU*/
#logo {
    position: static;
    width: auto;
    margin-left: 0px;
}
[data-accion]{
	cursor:pointer;
}
.menu_d{
	color:<?php echo GRIS_O;?>;
	font-size:11px;
}
.role{
	background-image:url("<?php imagenes();?>/role.png");
	background-size: contain;
	background-position: center;
	background-repeat: no-repeat;
	width: 35px;
	color: #FFF;
	font-weight: 800;
	text-align: center;
	text-indent: 4px;
	box-sizing: border-box;
}
.menu_u_ad strong {
    display: block;
    color: black;
    font-weight: 800;
}

.menu_u_ad {
    line-height: initial;
    text-align: left;
    margin: 0px 16px;
    letter-spacing: 1px;
}
div#menu_sup {
    padding: 0px 71px;
}
#submenu_ad {
    border-bottom: solid 2px #d8d6d4;
    top: 77px;
    background: #ffffff;
	height:94px;
	line-height: 30px;
    padding: 0px 0px!important;
}
div#menu_sup {
	height: 77px;
	line-height: 77px;
    border-bottom: solid 1px #d8d6d4;
}
#submenu_ad>div {
    height: 92px;
    min-width: 143px;
    display: inline-block;
    vertical-align: middle;
    text-align: center;
    text-transform: uppercase;
    padding: 0px 10px;
    box-sizing: border-box;
    font-size: 10px;
    border-right: 1px solid #ebebeb;
    color: #000000;
	cursor:pointer;
	padding: 1.2em;
}
#submenu_ad>div:hover,#submenu_ad>div.usando{
    color: <?php echo GRIS_C2;?>;
}
/*RECIPIENTES*/
#recipientes{
	background: #FFF;
	position: fixed;
	top: 171px;
	left: 0px;
	bottom: 0px;
}
.panel {
	position: absolute;
	left: -800px;
	background: #FFF;
	top: 0px;
	bottom: 0px;
	<?php compatible('transition: 0.5s all ease;');?>
    <?php compatible('box-shadow: 7px 0px 9px -9px rgba(84,84,84,1);'); ?>
}
.panel .panel{
	z-index : -1;
}
.panel.panel_abierto{
	left: 100%;
}
.panel_normal {
    width: 200px;
    padding: 63px 0px;
}

.panel_normal header{
    position: absolute;
    left: 0px;
    right: 0px;
    line-height: 46px;
    color: <?php echo GRIS_C2;?>;
	font-size: 8px;
}

.panel_normal header {
    color: #c6c5c6;
    text-transform: uppercase;
    background: #f2f1f1;
    top: 0px;
}

.panel_normal footer {
    position: absolute;
    left: 0px;
    right: 0px;
    bottom: 0px;
    color: #000000;
    text-align: center;
    line-height: 85px;
    font-size: 11px;
    font-weight: bold;
    text-transform: uppercase;
}
div#recipientes [data-id] {
    padding-top: 1.8em;
    padding-bottom: 1.5em;
    background-color: #f6f6f6;
    font-weight: 800;
    font-size: 12px;
	color: <?php echo GRIS;?>;
	cursor:pointer;
	position:relative;
    padding-left: 68px;
    text-transform: uppercase;
    margin-bottom: 10px;
    border: solid 1px #e9e9e9;
    <?php compatible('box-shadow: -7px 6px 5px 0px rgba(240,240,240,1)!important;'); ?>
}
#lista_usuarios .bookings_bottom_single, #lista_instructores .bookings_bottom_single{
    background-color: white!important;
    border: solid 1px #dedede!important;
    <?php compatible('box-shadow: -7px 6px 5px 0px rgba(240,240,240,1)!important;'); ?>
    margin-left: 8px;
    width: 90%;
}
[data-id="config_paquetes"], [data-id="config_redes"], [data-id="config_faqs"],
[data-id="config_pag1"], [data-id="config_pag2"], [data-id="config_pag3"]{
    background-color: white!important;
    border: solid 1px #dedede!important;
    <?php compatible('box-shadow: -7px 6px 5px 0px rgba(240,240,240,1)!important;'); ?>
    margin-left: 8px;
    width: 79%;
    line-height: 7px;
    font-size: 10px!important;
    letter-spacing: 1px;
    height: 7px;
    text-indent: -55px;
}
#lista_reservaciones .bookings_bottom_single, #nueva_reservacion .bookings_bottom_single{
    background-color: white!important;
    border: solid 1px #dedede!important;
    <?php compatible('box-shadow: -7px 6px 5px 0px rgba(240,240,240,1)!important;'); ?>
    margin-left: 8px;
    width: 84%;
}
div#recipientes [data-id].usando,div#recipientes .viendo,#lista_nueva_reservacion .usando {
    background-color: #23cffd!important;
	color: white;
}
.reserva_usando{
    background: #23cefc;
	color: white;
	box-shadow:none !important;
}
[data-id_clase="1062"]
{
    margin-bottom: 20px;
}
/*LISTA SALONES*/
div#lista_salones_ubi [data-id].usando,div#lista_salones_ubi .viendo {
    background: #23cffd;
}
div#opciones_del_salon {
    <?php compatible('box-shadow: inset 1px 0px 5px 0px rgba(120,120,120,0.45);'); ?>
    width: 200px;
    margin-left: -1px;
    padding: 0px;
	padding-top:16px;
    background: #e8e8e8;
    padding: 1em;
}
#opciones_del_salon header {
    height: 45px;
    background: #fdfdfd;
}
div#opciones_del_salon>div {
    margin: 0 auto;
    height: 29%;
    box-sizing: border-box;
    background-position: center;
    background-repeat: no-repeat;
    background-color: whitesmoke;
    width: 185px;
}
div#opciones_del_salon>.opcion_salon:first-of-type{
    margin-top: 50px;
}
div#opciones_del_salon>[data-id].usando{
    background-color: #23cffd!important;
}
.opcion_salon[data-id="mapa_salon"] {
	background-image:url("<?php imagenes()?>/mapa_salon.png");
}
.opcion_salon[data-id="mapa_salon"].usando{
	background-image:url("<?php imagenes()?>/mapa_blanco.png");
}
.opcion_salon[data-id="calendario_salon"] {
	background-image:url("<?php imagenes()?>/calendario.png");
}
.opcion_salon[data-id="calendario_salon"].usando{
	background-image:url("<?php imagenes()?>/calendario_blanco.png");
}
.opcion_salon[data-id="reservaciones_salon"] {
	background-image:url("<?php imagenes()?>/reservaciones.png");
}
.opcion_salon[data-id="reservaciones_salon"].usando{
	background-image:url("<?php imagenes()?>/reserva_blanco.png");
}

.contenedor_dia>h2>small {
    color: #23cffd;
	<?php if( $this->permisos('Administrador') ){?>
		display: block !important;
	<?php };?>
    font-size: 10px;
	cursor:pointer;
}
#calendario_reservacion .contenedor_dia>h2>small{
	display:none !important;
}
.contenedor_dia>h2>small:hover{
	opacity:0.6;
}
/*EDITOR*/
.editor {
    width: 97.3%;
    top: 12px;
    margin-bottom: 0px;
    overflow-y: auto;
    box-sizing: border-box;
    left: 18px;
    right: 18px;
    bottom: 0px;
}
.cabecera_editor>* {
    display: inline-block;
    vertical-align: middle;
    color: #b1acac;
    background-color: #e8e8e8;
    color: #898989;
}
.volver_atras{
    letter-spacing: 2px;
    border: none;
    border-radius: 3px;
    position: relative!important;
    display: inline-block;
    vertical-align: middle;
    color: white;
    background-color: #bcbcbc;
    top: 0px;
    left: 17px!important;
    height: 30px;
    line-height: 33px;
    font-size: 10px;
}
.cabecera_editor .eliminar_clase{
    display: none;
}
.cabecera_editor {
    background: #ffffff;
    border-bottom: 1px solid #e1e1e1;
    line-height: 50px;
	font-size:12px;
	position:relative;
}
.eliminar_ubicacion,.eliminar_clase{
    padding: 0px 16px;
}

.titulo_cabecera {
    padding: 0px 30px;
}

.selector_editor {
	position: relative;
	width: 50px;
	height: 50px;
	text-align: center;
}
.caja_muestra {
    height: 20px;
    width: 20px;
    display: inline-block;
    vertical-align: middle;
    border-radius: 100%;
	cursor:pointer;
}
.caja_muestra:hover{
	opacity:0.6;
}
.caja_muestra img {
    display: inline-block;
    vertical-align: top;
}
.cont_circ {
    display: inline-block;
    vertical-align: middle;
    height: 36px;
    width: 40px;
    box-sizing: border-box;
    line-height: 48px;
    box-shadow: 0px 0px 1px silver;
}
.cc_drop{
	background-color: white;
	width: 200px;
	box-sizing: border-box;
	box-shadow: 0px 0px 2px;
}
.dropdown {
	position: absolute;
	top: 100%;
	left: 0px;
	margin-left: -77px;
	z-index: 1;
	display: none;
	line-height: initial;
	padding:1px;
	background-image:url("<?php imagenes();?>/triangulo.png");
	background-position:center top;
	background-repeat:no-repeat;
	padding-top: 9px;
	margin-top: -3px;
}
.dropdown.drop_viendo{
	display:block;
}
.dropdown.drop_colores .cont_circ>* {
	height: 23px;
	width: 23px;
	border-radius: 100%;
	cursor: pointer;
	display: inline-block;
}
.dropdown.drop_colores .cont_circ:hover {
    opacity: 0.5;
}
#guardar_clase {
    font-size: 10px;
    position: absolute;
    right: 34px;
    top: 0px;
    bottom: 0px;
    background: #3fc8f4;
    width: 190px !important;
    text-align: center;
    text-transform: uppercase;
	line-height: 35px;
	cursor:pointer;
	color:white;
}
.guardar_informacion {
    right: 0px;
    top: 0px;
    bottom: 0px;
    background: #23cefc;
    color: white!important;
    text-align: center;
    text-transform: uppercase;
    font-weight: 800;
    letter-spacing: 3px;
    background-repeat: no-repeat;
    background-position: 146px 13px;
    line-height: 53px;
    cursor:pointer;
    color:black;
    margin-right: 19px;
}
/*Aqui poner estilos nuevos*/
.b_i, .b_d {
	display: inline-block;
	vertical-align: top;
}
.b_i {
	width: 56%;
    margin-top: 28px;
}
.b_d {
	width: 44%;
	padding-bottom: 24px;
	border-bottom: 1px solid <?php echo GRIS_C?>;
}
.b_i input {
	background-color: #fff;
	color: <?php echo GRIS;?>;
	font-weight: 400;
	text-align: left;
	margin-bottom: 0;
	padding: 20px 0 20px 40px;
    text-indent: 10px;
}
.b_i input[name=telefono], .b_i input[name=mail_contacto] {
	width: 50%;
}
.b_d .b_d-title {
	font-size: 16px;
	color: #000;
	text-transform: uppercase;
	font-weight: 800;
	margin: 30px 0 15px 35px;
}
.b_d .b_d-desc {
	font-size: 10px;
	color: <?php echo GRIS?>;
	margin-left: 15px;
	margin-bottom: 15px;
}
.b_d .b_d_i, .b_d .b_d_d{
	display: inline-block;
	vertical-align: top;
	width: 50%;
}
.b_d .b_d_d {
	padding-right: 30px;
	box-sizing: border-box;
}
.b_d_d-desc {
	margin-top: 20px;
}
.b_d-attach img {
	width: 26px;
	transform: rotate(180deg);
	top: 9px;
}
.cabecera .editor_option {
    margin-left: 10px;
    display: inline-block;
    vertical-align: top;
    text-align: center;
    height: 27px;
    box-sizing: border-box;
    cursor: pointer;
}
#panel_final .cabecera .editor_option{
    border: solid 2px black;
    width: 39px;
}
.cabecera .editor_option img {
	display: block;
	line-height: 50px;
    margin: 0 auto;
}
.editor textarea {
	width: 100%;
	border: 0;
	padding: 40px;
	font-size: 15px;
	color: <?php echo GRIS?>;
	box-sizing: border-box;
	height: 300px;
	resize: none;
}
.b_d-attach span {
	border-left: 1px solid <?php echo GRIS_C?>;
	position: absolute;
	right: 5px;
	top: 0;
	bottom: 0;
	line-height: 30px;
	padding: 0 0 0 5px;
	cursor: pointer;
}
#toolbar-{
	display:none;
}
/*CALENDARIO SALON*/
.calendario.calendario_back_end {
	min-height:100%;
	overflow: hidden;
	display:none;
	text-align:center;
}
.calendario.calendario_back_end.semana_activa{
	display:block;
}
.calendario_back_end .hora {
	width: 100px;
	border-radius: 0px;
	position: relative;
}
.calendario_back_end .clase_calendario:hover{
	opacity:0.3 !important;
}
.header_cal_backend.v_oscuro>* {
    display: inline-block;
    vertical-align: middle;
}

.header_cal_backend {
    text-align: center;
    padding-top: 11px;
    padding-bottom: 5px;
}

.titulos_cab_cal {
    color: white;
    margin-right: 48px;
}
.boton_calendario {
    color: black;
    width: 119px;
    background: #efefef;
    display: inline-block;
    line-height: 33px;
    border-radius: 3px;
    margin: 0px 5px;
    text-transform: uppercase;
    cursor: pointer;
    font-size: 11px;
    opacity: 0.4;
}
.boton_calendario:hover, .boton_calendario.semana_activa {
	opacity:1;
}
.calendario_back_end .dia>h2>strong, .contenedor_dia>h2>strong {
    display: initial;
    font-size: 11px;
}

.calendario_back_end .dia>h2, .contenedor_dia>h2 {
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif!important;
    color: #87898a!important;
    font-size: 11px!important;
    background-color: #ececec;
    min-height: 20px;
}
#panel_final .clase_calendario {
    <?php compatible('box-shadow: -4px 3px 5px 0px rgba(207,207,207,1);'); ?>
    margin-top: 6px;
    opacity: 1;
    color: #87898a;
    background: white;
	height:66px;
	cursor:pointer;
}
#panel_final .clase_calendario:hover{
    border: solid 1px #23cffd;
    background: #23cffd;
    color: white;
    opacity: 1!important;
}
.calendario_back_end .hora:last-child {
   width: 100px !important;
   height: 66px !important;
   box-sizing: border-box;
   margin-left: 0px !important;
}
/*MAPA SALON*/
#panel_final .clase_salon {
    width: 700px;
	position:relative;
	bottom:0px !important;
}
#panel_final .bicicleta {
    width: 43px;
    height: 43px;
    line-height: 43px;
    box-shadow: none;
    font-size: 14px;
    font-weight: 400;
    color: transparent!important;
}
#panel_final .profesor_salon {
    left: 255px;
    width: 188px;
    height: 128px;
	top:0px !important;
}
#panel_final .profesor_salon .bicicleta {
    border-radius: 100px;
    width: 100px;
    height: 100px;
    font-size: 10px;
    padding: 6px;
    font-weight: 100 !important;
    background-color: #23cefc;
    color: white;
    border: none;
}
#panel_final .forma_0{
	pointer-events: initial !important;
	cursor:pointer;
	opacity:1;
}
#panel_final .forma_0:hover{
	opacity:0.6;
}
.clase_salon.edicion_de_forma .forma_1 {
    background-color: #23cefc;
    color: white;
    box-shadow: initial !important;
}
.header_mapa_backend {
    padding: 7px 31px;
    line-height: 35px;
    margin-bottom: 33px;
    padding-top: 15px;
}

.header_mapa_backend>* {
    display: inline-block;
}

div#guardar_forma_salon,.confirmar_cambios_sec {
    float: right;
    width: 181px;
    line-height: 34px;
	font-size:<?php echo SMALL;?>;
}

.titulos_mapa_cal h2 {
    font-weight: 100;
    letter-spacing: 1px;
}
.disabled {
    opacity: 0.1;
}
/*USUARIOS-----------------------------------*/
.panel_doble {
    width: 640px;
	left: -640px;
}
.sistema_filtros .cabecera {
    margin-top: -9px;
    position: static !important;
    box-shadow: none;
	text-align:left;
	line-height: 50px;
	border-bottom: 1px solid <?php echo GRIS_C;?>;
	background-color: #fcfcfc;
}
.panel_doble>header >* {
    float: left;
     width: 50%;

}
.sistema_filtros .cabecera .editor_option {
    padding-top: 0px;
    padding-bottom: 0px;
	border-right-color: <?php echo GRIS_C;?>;
}
input.buscador_filtro {
    text-align: left;
    position: relative;
    top: 6px;
	background-color: #fcfcfc;
	border-color:transparent;
}
.filtro_letras {
    float: left;
    width: 40px;
    text-align: center;
    padding: 7px 0px;
    background: white;
	position: relative;
	z-index: 1;
}

.filtro_letras>div {
    margin: 4px auto;
    color: <?php echo GRIS;?>;
    font-weight: 100;
    text-transform: uppercase;
    cursor: pointer;
    border-radius: 100%;
    width: 20px;
    height: 20px;
    line-height: 20px;
    font-size: 12px!important;
}

.filtro_letras>div:hover,.filtro_letras>div.viendo_letra {
    background: #23cefc;
    color: white;
    font-size: 12px;
}
.deshabilitado{
	pointer-events : none;
	opacity:0.3;
}

.editor_option.lupa_filtros img {
    display: inline-block;
}

.editor_option.lupa_filtros {
    line-height: 65px;
}
.resultado_busqueda .bookings_bottom_single, .instructor_single_question {
    padding: 10px !important;
    line-height: 30px;
    padding-left: 30px !important;
	color:<?php echo GRIS;?> !important;
	box-shadow:0px 0px 0px 4px white inset !important;
	cursor: initial !important;
}
.resultado_busqueda .bookings_bottom_single:nth-child(even), .instructor_single_question {
    background: whitesmoke;
}
.resultado_busqueda .basic_bookings {
    line-height: 25px;
}
.cabecera_letra span {
    display: inline-block;
    text-align: center;
    font-weight: 800;
    font-size: 17px;
    text-transform: uppercase;
    width: 30px;
    background: white;
}
.cabecera_letra {
	padding: 5px 0px;
	box-shadow: 0px -13px 0px 0px white inset,0px -16px 0px 0px black inset;
	margin-right: 5px;
}
.sistema_filtros {
    position: absolute;
    left: 0px;
    right: 0px;
    top: 63px;
    bottom: 0px;
}
.resultado_busqueda{
	position: relative;
}
.cont_scroll{
	position:relative;
	overflow:auto;
}
.bookings_bottom_single>img {
    display: inline-block;
    height: 23px;
    vertical-align: middle;
    margin-right: 13px;
    border-radius: 100%;
    background-color: <?php echo GRIS;?>;
}
/*RESERVACIONES*/
#reservaciones_menu, #nueva_reservacion, #nueva_compra, #panel_configuraciones{
	width:400px;
}
.filtro_activo{
	background:#23cefc!important;
    color: white!important;
}
.filtro_busqueda {
    cursor: pointer;
}

.filtro_busqueda:hover {
    background-color: <?php echo GRIS_C;?> !important;
}

.decidir_profe .instructor figure {
    width: 50px;
    height: 50px;
    border-width: 3px;
    margin: 0 auto;
}

.decidir_profe .instructor>h1 {
    font-size: 15px;
}

.decidir_profe .instructor {
	margin: 23px;
	padding: 10px 0px;
	opacity:0.4;
}
.decidir_profe .instructor.selected{
	opacity:1;
	background-color: whitesmoke;
}
.cont_editor_ubi {
    /*margin-left: 170px;*/
    height: 94%;
    position: absolute;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    z-index: 1;
}
select, .cont_editor_ubi input{
	background:white;
}
.volver_atras {
   padding: 0px 10px;
   cursor: pointer;
}

.volver_atras:hover {
   opacity: 0.6;
}
/*RESERVACIONES EDIT*/
.flex_box {
    display: flex;
}

.flex_box>* {
    flex-grow: 1;
    text-align: center;
}
#calendario_reservacion .calendario_back_end .hora:last-child {
    display: none !important;
}
#mapa_reservacion .forma_0 {
    opacity: 0 !important;
    pointer-events: none;
}
#mapa_reservacion .forma_3, #mapa_reservacion .profesor_salon {
    pointer-events: none;
}
/*NUEVA_RESERVACIONES*/
div#nueva_reservacion {
    padding-top: 0px;
    margin-top: 7px;
}
div#nueva_reservacion .sistema_filtros,div#nueva_compra .sistema_filtros{
    top:0px;
}
/*SUBIDA DE IMAGENES*/
.media-modal-close {
    font-size: 0px;
}
.media-menu .media-menu-item {
    display: none;
}

a.media-menu-item.active {
    display: block;
}
/*DETALLES*/
.volver_atras {
    position: absolute;
    top: 0px;
    left: 51px;
}
/*PANEL DE CONFIGURACIONES*/
.contenido_pag_admin {
    min-height: 500px;
}
.pregunta_back>* {
    margin-bottom: 0px;
}

.pregunta_back>textarea {
    min-height: 200px;
    border-bottom: 2px solid;
	width:100% !important;
}
.pregunta_back {
    width: 96%;
    position: relative;
    margin: 0 auto;
}
.pb1{
    text-align: center;
}
.eliminar_post.eliminar_faq {
    position: absolute;
    right: 10px;
    top: 3px;
}
.half_input.bloque_label {
    display: inline-block;
    text-align: center;
    text-transform: uppercase;
    font-size: 12px;
    padding: 10px 0px;
}
.paquetes_en_back input {
    margin-bottom: 0px;
}
/*RETOQUES INSTRUCTOR*/
.nueva_columna {
    vertical-align: top;
    width: 270px;
}
.nueva_columna input{
    padding: 10px!important;
    width: 379px;
    margin-right: 42px;
    text-align:left;
    background:#eeeeee;
    color: #b0b0b0;
}
.nueva_columna_titulo {
    background: none !important;
}
.nueva_columna_titulo h2{
	text-indent:0px !important;
}
.especial_instructor {
    text-align: center;
    padding: 0px 54px;
    width: 420px;
    margin: 0 auto;
}
.nueva_columna:last-child {
    margin-bottom: 120px;
}
div#cargando_pregunta {
    background: rgba(255, 255, 255, 0.9);
}
#lista_instructores .bookings_bottom_single>img {
    display: none;
}
/*AJUSTES RESERVA*/
.nueva_cabe_fer {
    text-align: right;
    margin-right: 18px;
    padding-top: 20px;
}
.titulo_fer_n {
    float: left;
    padding-left: 22px;
    font-size: 22px;
    line-height: 16px;
}
.imx{
    padding-top: 12px;
    display: block;
    margin: 0 auto;
}
div#lista_ubicaciones {
    margin: 0 auto;
    width: 86%;
}
#ubicaciones_menu_salon{
    margin-left: -1px;
    background: #f3f3f3;
    border: none;
    <?php compatible('box-shadow: 7px 0px 9px -9px rgba(84,84,84,1)!important;'); ?>
}
#opciones_del_salon header{
    background: #ffffff!important;
}
#ubicaciones_menu_salon header{
    background: #fafafa;
}
div#lista_salones_ubi [data-id] {
    background: #fefefe!important;
    padding-left: 80px;
}
div#lista_salones_ubi [data-id].usando, div#lista_salones_ubi .viendo {
    background: #23cffd!important;
}
#opciones_del_salon .opcion_salon{
    background-color: white!important;
}
div#lista_salones_ubi {
    width: 86%;
    margin: 0 auto;
}
div#panel_final {
    z-index: -10;
	overflow:auto;
}
.boton{
    font-size: 10px!important;
    background: #3fc8f4!important;
    box-shadow: 0px 0px 0px transparent!important;
    border-radius: 3px!important;
    text-transform: uppercase;
}
.boton:hover{
    top: 0px;
}
.header_cal_backend.v_oscuro{
    background-color: transparent!important;
}
.titulos_cab_cal h2 {
  line-height: 3;
  background: #23cffd;
  font-size: 11px;
  padding-left: 3em;
  padding-right: 3em;
}
.b_d .b_d-attach, .instructor_data_upload .b_d-attach, .calendario_back_end .hora:last-child{
    background-color: #d0d0d0!important;
    margin-top: 6px;
    margin-right: 6px;
}
<?php if( !$this->permisos('Administrador') ){?>
.calendario_back_end .hora:last-child{
	display:none !important;
}
.calendario_back_end .hora{
	pointer-events:none !important;
}
#calendario_reservacion .calendario_back_end .hora{
	pointer-events:initial !important;
}
<?php };?>
.incoming_current_week{
    line-height: 3;
    background: #23cffd;
    font-size: 11px;
    padding-left: 3em;
    padding-right: 3em;
    color: white!important;
}

.inlineB{
    vertical-align: middle!important;
}
.especial_instructor .half_input{
    padding: 0em!important;
    height: 35px;
    margin-right: 20px;
    width: 127px;
    background-color: #ededed;
    -webkit-appearance: none;
    -webkit-border-radius: 0px;
    border: solid 2px #c0c0c0;
    background-image:url(<?php plantilla()?>/images/iconos/down.png);
    background-repeat:no-repeat;
    background-position: right center;
    line-height: initial !important;
    text-indent: 15px;
    font-size: 11px;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif!important;
}
.especial_instructor .guardar_informacion{
    margin-top: 45px;
    border-radius: 5px;
    position: relative!important;
}
.botoneliminar{
    font-size: 11px!important;
    width: 90px;
    background: #909090;
    color: white;
    line-height: 34px;
    text-align: center;
    margin-left: -22px;
    cursor: pointer;
    border-radius: 5px;
}
.guardar_informacion, .botoneliminar{
    display: inline-block;
}
#submenu_ad>div:hover, #submenu_ad>div.usando{
    height: 92px;
    padding: 1.2em;
    border: solid 1px #23cefc!important;
    background: #23cefc;
    color: white!important;
}
#nombre_instructores_r{
    padding: 0em!important;
    height: 35px;
    margin-right: 65px;
    width: 378px;
    background-color: #ededed;
    -webkit-appearance: none;
    -webkit-border-radius: 0px;
    border: solid 2px #c0c0c0;
    background-image:url(<?php plantilla()?>/images/iconos/down.png);
    background-repeat:no-repeat;
    background-position: right center;
    line-height: initial !important;
    text-indent: 15px;
    font-size: 11px;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif!important;
}
.cont_editor_ubi .cabecera_editor{
    background-color: white;
}
.reloj{
    vertical-align: middle;
    margin-right: 79px;
    margin-left: -22px;
}
.hrinline{
    display: inline-block;
    width: 80px;
    vertical-align: middle;
}
.editor{
    position: absolute;
}
hr {
    border: 0px;
    height: 1px;
    background: #CF2323;
    margin: 10px 0px;
    background-color: rgb(216, 216, 216)!important;
}
.hrinline1 {
    position: absolute;
    top: 108px;
    left: 36%;
    display: inline-block;
    width: 275px;
    vertical-align: middle;
}
.hrinline2 {
    position: absolute;
    top: 204px;
    left: 36%;
    display: inline-block;
    width: 275px;
    vertical-align: middle;
}
.hrinline3 {
    position: absolute;
    width: 275px;
    top: 298px;
    left: 36%;
    display: inline-block;
    vertical-align: middle;
}
.hrcorto {
    margin: 0 auto;
    width: 160px!important;
}
.select_instructor {
    margin-top: 45px;
}
.basic_bookings.bookings_time{
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif!important;
}
.span_disponible{
    letter-spacing: 1px;
    font-size: 8px;
    line-height: 0px;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif!important;
}
.buscador_usuarios{
    text-align: center;
    color: <?php echo GRIS?>;
    font-size: 10px;
    line-height: 55px;
}
.form_user_1{
    margin-top: 15px;
}
.inxt_inline {
    position: absolute;
    top: 268px;
    left: 49%;
    width: 48%;
}
input.input_inst {
    display: block;
    width: 97%;
}
.trash_res{
    background-color: transparent!important;
    padding-top: 20px;
}
.trash_res.eliminar_reserva.eliminar_post.eliminar_reserva_interna {
    width: 4%;
    padding-top: 13px;
}
.reservacion_atras{
    margin-left: -10px!important;
    color: white!important;
}
div#guardar_reserva {
    vertical-align: middle!important;
    right: 0px;
    position: absolute;
    height: 32px;
    top: 16px;
}
.hrconf1{
    margin-top: -28px!important;
    width: 94%;
    margin: 0 auto;
}
.paquetes_en_back .half_input {
    width: 25.2%;
}
.bloque_label {
    margin-left: 12px;
    font-size: 10px!important;
    color: #b0b0b0
}
.input_redes{
    font-size: 10px;
    color: #b0b0b0;
    text-align: left;
}
.input_np{
    margin: 0 auto;
}
.paquetes_en_back {
    margin-left: 23px;
}
textarea.contenido_pag_admin {
    margin-left: 30px!important;
}
.cambios_nombre {
    width: 125%;
    margin-left: -51px!important;
}
/*RETOQUES FQS*/
.pregunta_back textarea {
    display: none;
}
input[type="date"]:before {
    content: attr(placeholder) !important;
    color: #aaa;
}
input#user_data_birth{
    text-align: center;
}
#ubicaciones_menu header {
    text-indent: 10px;
}
span.titulo_fer_n {
    position: relative;
    top: 14px;
}
.editor_option.lupa_filtros {
  margin-left: 20px;
  position: relative;
  top: 6px;
}
.bookings_bottom_single,.resultado_busqueda .bookings_bottom_single{
	cursor:pointer !important;
}
#lista_usuarios .bookings_bottom_single:hover,#lista_instructores .bookings_bottom_single:hover,#lista_nueva_reservacion .bookings_bottom_single:hover,#lista_reservaciones .bookings_bottom_single:hover,#lista_configuraciones>div:hover{
    background-color: #23cffd!important;
	color: white !important;
}
.bookings_bottom_single.bookings_bottom_single_pastReservations {
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif!important;
    background-color: white!important;
}
span.upcoming_reservations_date {
    margin-left: 14px;
}
#color_principal, #color_secundario, #circulo, .titulo_cabecera.cab_salon {
    display: none;
}
.b_d_d{
    display: none!important;
}
/*ACHICHAR INSTRUCTORES*/
#instructores_menu {
    width: 400px;
}

#instructores_menu .cont_scroll {
    padding-right: 0px;
}

#lista_instructores {
    width: 95%;
}
#contenedor_descarga_db {
    display: block;
    margin: 20px;
}

#db_contenedor {
    width: 90%;
    margin: 10px auto;
}

#contenedor_descarga_db .boton {
    width: 200px;
    margin: 10px;
    display: inline-block;
}
.gafa-mensaje, .gafa-error {
    top: 0px !important;
    transform: none !important;
}
/*CSS INTERMEDIO EN SECCIÓN COMPRA BACK*/
#cont_compra_paquetes .paquete{
    margin: 0px;
}
.paquete_compra {
    background: rgba(255,255,255,.9);
    width: 123px;
    display: inline-block;
    padding: 0.4em;
    margin-top: 25px!important;
    border: solid 1px rgb(236, 235, 235);
    cursor: pointer;
    margin-left: 6px!important;
    -webkit-box-shadow: -4px 4px 5px -1px rgb(194, 194, 194);
    -moz-box-shadow: -4px 4px 5px -1px rgba(194,194,194,1);
    box-shadow: -4px 4px 5px -1px rgb(194, 194, 194);
    vertical-align: top;
}
.paquete_compra span.p_c_cantidad{
    font-size: 58px;
    font-family: HelveticaNeue-Light, 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
    color: #3C3C3C;
}
.paquete_compra span {
    display: block;
}
span.p_c_precio.pa_chico {
    font-size: 12px;
    font-weight: bolder!important;
}
.chico_especial{
    text-transform: uppercase!important;
}
#cont_compra_paquetes {
	text-align: center;
    width: 100%;
    margin: 0px;
    height: 345px;
    display: inline-block;
    max-height: initial;
}
.paquete_compra.paquete.seleccionado {
    background-color: #3fc8f4 !important;
}
.paquete_compra.paquete:hover {
    background-color: rgb(246, 246, 246);
}
.paquete_compra.paquete.seleccionado *{
	color:white !important;
}
.target {
    display: inline-block;
    vertical-align: middle;
    margin: 10px;
}

#finalizar_compra_checkout .columna_general {
    width: 90%;
    display: block;
}

[data-conekta="card[name]"],[data-conekta="card[number]"] {
    float: left;
    width: 50%;
}

.ExpDate {
    width: 50%;
    margin-left: 52%;
}

[data-conekta="card[cvc]"] {
    width: 50%;
    display: inline-block;
}

div.ccv {
    display: inline-block;
    vertical-align: middle;
    position: relative;
    margin-left: 10px;
}

div.ccv .data_ccv {
    position: absolute;
    display: none;
    top: 100%;
    right: 10px;
    width: 145px;
    background-color: white;
    padding: 10px;
    border: 1px solid silver;
}

div.ccv:hover .data_ccv {
    display: block;
}

.crear_tarjeta {
    display: none;
    pointer-events: none;
}

#finalizar_compra_back {
    margin-top: 10px;
}
.eliminar_tarjeta {
    display: none !important;
}
.columna_compra {
    max-height: 300px;
    overflow: auto;
}
.producto_compra>* {
    display: inline-block;
    vertical-align: middle;
    width: 20%;
    text-align: center;
}
.p_p_imagen {
    border-radius: 100%;
    overflow: hidden;
    width: 50px;
    height: 50px;
	display:inline-block;
}
.c_pp_imagen {
    text-align: left;
    padding-left: 12px;
}
.producto_compra {
    padding-left: 19px;
    margin-top: 5px;
}
.producto_compra>img {
    border-radius: 100%;
    height: 70px;
    width: auto;
    margin-right: 10px;
	max-width:100px;
}
.resumen_producto {
    padding: 10px;
    border-bottom: 1px solid rgb(236, 228, 228);
	font-size: 10px;
}

.resumen_producto>* {
    display: inline-block;
    vertical-align: middle;
    width: 20%;
}
.foto_pp {
    display: inline-block;
    overflow: hidden;
    border-radius: 100%;
    width: 50px;
    height: 50px;
}

#resumen_compra {
    padding: 20px 25px;
    padding-top: 0px;
}

.subtotal_compra {
    padding: 20px;
    text-transform: uppercase;
}

#subtotales_compra {
	letter-spacing: 1px;
}
.tipo_tarjeta{
    border: 1px solid whitesmoke;
    width: 90%;
    margin: 20px auto;
    padding: 1%;
	box-shadow: -4px 4px 5px -1px rgb(194, 194, 194);
}

.subtotal_compra .precio {
    margin-left: 40px;
    font-size: 20px;
}
#iframne_wp{
	width:100%;
	height:100%;
}
.p_c_cantidad {
    font-size: 70px;
}
.pa_chico {
    font-size: 10px;
    display: block;
	margin:2px 0px
}
#finalizar_compra_checkout {
    margin: 0 auto;
    padding: 25px 20px;
}

#cont_compra_productos {
    display: inline-block;
    vertical-align: top;
    margin: 0px;
    margin-left: 28px;
    height: 772px;
    max-height: initial;
}
.page-id-84 .paquete_compra br{
    display: none;
}
.contenedorbloque1compras, #cont_compra_productos{
    display: inline-block;
    vertical-align: top;
}
.contenedorbloque1compras{
    width: 45%!important;
}
#cont_compra_productos{
    width: 50%;
    margin-left: 2%;
}
.page-id-84 .upcoming_reservations h2{
    line-height: 20px;
    color: black;
    font-size: 12px;
    text-transform: capitalize!important;
    letter-spacing: 0px!important;
    font-weight: lighter;
}
.page-id-84 .tipo_tarjeta{
    padding-bottom: 25px!important; */
    padding-top: 25px!important; */
}
.page-id-84 span.p_p_titulo, .page-id-84 .p_p_precio {
    background: #eeeeee!important;
    line-height: 40px;
    vertical-align: middle;
    border: solid 1px #e9e9e9;
    <?php compatible('box-shadow: -7px 6px 5px 0px rgba(240,240,240,1);'); ?>
}
.producto_cantidad{
    height: 42px;
    margin-top: 6px;
}
.bloque_para_finalizar.tipo_tarjeta {
    display: block!important;
    width: 100%!important;
    margin: initial;
    margin-top: 25px!important;
}
.bloque_para_finalizar.tipo_tarjeta .upcoming_reservations h2 {
    font-size: 8px!important;
    color: #898989!important;
}
.annadir_tarjeta.color_gris.btn.azul2.bot1.text-center.center-block.fdb {
    text-indent: 18px;
    font-size: 12px;
}
#subtotales_compra .subtotal_compra.color_gris strong {
    font-size: 12px;
}
#cont_compra_productos .producto_compra.color_gris {
    font-size: 12px;
    color: black!important;
}
#finalizar_compra_checkout .c_pp_imagen{
    display: none;
}
#subtotales_compra .foto_pp{
    display: none;
}
.paquete_compra[data-idpaquete="regalo"] .p_c_cantidad {
    color: transparent!important;
    background-image: url('<?php plantilla(); ?>/images/gift.png');
    background-repeat: no-repeat;
    background-position: center center;
    background-size: 55%;
}

</style>
<?php
	@include('css_admin_rog.php');
?>
