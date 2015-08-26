<?php
$reserva	= new Reserva( $id_reserva );
$clase		= $reserva->clase		? new Clase( $reserva->clase )	: false;
$bici		= $reserva->bici		? $reserva->bici				: false;
$comprador	= $reserva->comprador	? $reserva->comprador			: false;

$id_clase	= $clase	? $clase->ID	: '';

if( $id_clase === '' ){
	$html.= '<div id="crear_reserva_agarrar_user"></div>';
};

$salon		= $clase	? new Salon( $clase->salon )	: false;
$ubicacion	= $salon	? $salon->ubicacion				: false;

$html.= '<div id="editor_reservaciones" class="editor" data-id_reserva="'.$reserva->ID.'">';
	$html .='<div class="cabecera_editor cabecera_edit_user">';
	$html .='<div class="trash_res eliminar_reserva eliminar_post eliminar_reserva_interna" data-id_post="'.$reserva->ID.'"><img src="'.imagenes(false).'/eliminar.png"/></div>';
		$html.= '<div class="volver_atras reservacion_atras">&lt;&lt; Volver a reservaciones</div>';
		/*GUARDAR--------------*/
		$html.= '<div id="guardar_reserva" class="guardar_informacion">Guardar</div>';
	$html .='</div>';
	/*UBICACIONES*/
	$html.= '<div class="upcoming_reservations"><h2>Selecciona ubicación</h2></div>';
	$html.= '<div id="ubicaciones_reservacion" class="flex_box secuencia_reserva">';
		$html.= menu_ubicaciones( true, $ubicacion );
	$html.= '</div>';
	/*SALONES*/
	$html.= '<div class="upcoming_reservations"><h2>Selecciona Salón</h2></div>';
	$html.= '<div id="salones_reservacion" class="flex_box secuencia_reserva">';
		if( $ubicacion ){
			$html.= ver_menu_salon( array( $ubicacion, 'edicion_reservaciones' ), $salon->ID );
		};
	$html.= '</div>';
	/*CALENDARIO*/
	$html.= '<div class="upcoming_reservations"><h2>Selecciona Clase</h2></div>';
	$html.= '<div id="calendario_reservacion" class="secuencia_reserva">';
		if( $salon ){
			$html.= configuracion_calendario_salon( $salon->ID, $clase->ID );
		};
	$html.= '</div>';
	/*MAPA*/
	$html.= '<div class="upcoming_reservations"><h2>Selecciona Bici</h2></div>';
	$html.= "<div id='mapa_reservacion' data-clase='".$id_clase."' data-bici='".json_encode( $bici )."' class='secuencia_reserva'>";
		if( $clase ){
			$html.= $clase->imprimir_forma( false, $bici );
		};
	$html.= '</div>';
$html.= '</div>';

?>