<?php
global $post;
$clase		= new Clase( $post->ID );
?><!doctype html>
<html lang="es">
<head>
    <title>Siclo.com</title>
    <meta charset="utf-8" /> 
    <meta property="og:title" content="Siclo.com" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php plantilla();?>/images/share/share_facebook.jpg" />
    <meta name="twitter:image:src" content="<?php plantilla();?>/images/share/share_facebook.jpg">
    <meta property="og:description" content="Acabo de reservar con <?= get_the_title( $clase->instructor );?> en Síclo. ¡A mi nadie me pedalea la bici!" />
</head>
<body>
<?php
if( !isset( $_GET['imprimir_reserva'] ) ){?>
	<script type="text/javascript">document.location.href="<?= get_home_url();?>";</script>
	<?php
}else{
	$clase->imprimir_para_impreso();
};?>
</body>
</html>