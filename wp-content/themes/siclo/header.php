<!--
 ______   ______   ______  ______       __    __   __  __   
/\  ___\ /\  __ \ /\  ___\/\  __ \     /\ "-./  \ /\_\_\_\  
\ \ \__ \\ \  __ \\ \  __\\ \  __ \    \ \ \-./\ \\/_/\_\/_ 
 \ \_____\\ \_\ \_\\ \_\   \ \_\ \_\    \ \_\ \ \_\ /\_\/\_\
  \/_____/ \/_/\/_/ \/_/    \/_/\/_/     \/_/  \/_/ \/_/\/_/
 
 Desarrollado por: gafa.mx
-->
<!doctype html>
<html lang="es">
<head>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8" /> 
    <link rel="icon" href="<?php plantilla() ?>/images/icon.png" sizes="32x32" type="image/png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <?php estilos_web();?>
    <?php etiquetas_og();?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <?php scripts_web();?>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAemA1nnXcX9LglN9-4GS-97-zbB2vm3h0"></script>
    <?php wp_head();?>
	
	<script>
	 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	 ga('create', 'UA-64716833-1', 'auto');
	 ga('send', 'pageview');
	
	</script>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" <?php body_class('oyendo_menu'); ?>>
	<?php menu_web();?>
    <div class="container-fluid">