<?php
$id_usuarios = get_users();
$analitica = new Analitica_usuarios( $id_usuarios );

$html .= header_secciones('Métricas y reportes de usuarios','descargar_usuarios','Descargar lista usuarios');
$html .= '<hr class="hrconf1">';

$html.= $analitica->usuarios_por_clases();
$html.= $analitica->usuarios_por_fechas();
?>