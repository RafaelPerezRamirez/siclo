<?php
$s = new Salon( $id_salon );



$calendario		= $s->get_calendar( 'calendario_semana_1' );
$calendario2	= $s->get_calendar( 'calendario_semana_2', 7 );

$semana			= isset( $_POST['semana'] ) ? $_POST['semana'] : 'calendario_semana_1';
$activa1		= $semana == 'calendario_semana_1' ? 'semana_activa' : '';
$activa2		= $semana == 'calendario_semana_2' ? 'semana_activa' : '';


$html .= '<header class="header_cal_backend v_oscuro">';
	$html.='<div class="titulos_cab_cal">';
		$html.= $calendario->imprimir_cabecera_back( $semana );
		$html.= $calendario2->imprimir_cabecera_back( $semana );
	$html .= '</div>';
	$html.='<div class="botones_cab_cal">';
		/*
		$html.= '<span class="boton_calendario '.$activa1.'" data-calendario="calendario_semana_1">Semana 1</span>';
		$html.= '<span class="boton_calendario '.$activa2.'" data-calendario="calendario_semana_2">Semana 2</span>';
		*/
	$html .= '</div>';
$html .= '</header>';

/*SEMANA 1*/
$html.= $calendario->imprimir( false, $activa1, $defecto );
/*SEMANA 2*/
$html.= $calendario2->imprimir( false, $activa2, $defecto );
?>