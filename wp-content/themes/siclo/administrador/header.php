<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="icon" href="<?php plantilla();?>/eliminar/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Meta SEO -->
    <!-- Meta Facebook -->
    <?php
		etiquetas_og();
		estilos_web_admin();
		require_once("assets/css/css_admin.php");
	?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <?php
    	scripts_web();
		require_once("assets/js/js_admin.php");
	?>
    <!-- Comienza WP Head -->
    <?php wp_head();?>
	<!-- BEGIN gbRichEdit5 -->
	<script src="<?php admin();?>/assets/js/gre/jquery.gre.js"></script>
    <!-- Google Analytics -->
</head>
<body <?php body_class('oyendo_menu'); ?>>
	<?php $this->role ? $this->menu->print_menu() : false;?>
    <div class="contenido centrado_vertical">
    	<div id="ajax_web" class="elemento_centrado centrado_web">