<?php
$codigo = get_codigo( $author );
$imagen = generar_imagen_codigo( $codigo );
?><!doctype html>
<html lang="es">
<head>
    <title>Siclo.com</title>
    <meta charset="utf-8" /> 
    <meta property="og:title" content="Siclo.com" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?= $imagen;?>" />
    <meta property="og:image:width" content="601" />
    <meta property="og:image:height" content="356" />
    <meta property="og:description" content="Unete a Síclo conmigo. Usa este código ( <?= $codigo;?> ) y te regalamos $50 extras en tu primera clase." />
</head>
<body>
<script type="text/javascript">document.location.href="<?= get_home_url();?>";</script>
</body>
</html>