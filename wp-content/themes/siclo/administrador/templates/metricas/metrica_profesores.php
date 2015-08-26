<?php
$id_usuarios = get_users();
$analitica = new Analitica_profesores( $id_usuarios );

$html .= header_secciones('Métricas y reportes de profesores');
$html .= '<hr class="hrconf1">';

$html.= $analitica->usuarios_por_profesor();
?>