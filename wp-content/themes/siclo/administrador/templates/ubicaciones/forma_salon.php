<?php

$s = new Salon( $id_salon );

$html .= '<header class="header_mapa_backend">';
	$html.='<div class="titulos_mapa_cal">';
		$html.= '<h2>Mapa del Salón</h2>';
	$html .= '</div>';
	$html.= '<div id="guardar_forma_salon" class="boton v_oscuro disabled">Confirmar Cambios</div>';
$html .= '</header>';



$html.= $s->imprimir_forma();
?>