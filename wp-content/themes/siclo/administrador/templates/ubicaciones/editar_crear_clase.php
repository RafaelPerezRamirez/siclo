<?php
$clase	= new Clase( $id_clase );

$dia	= isset( $dia )	? $dia : $clase->fecha;
$hora	= $clase->fecha	? date_i18n( 'H', $clase->fecha ) : '06';
$minutos= $clase->fecha	? date_i18n( 'i', $clase->fecha ) : false;

$html .= '<input type="hidden" name="dia" value="'.$dia.'"/>';

$html.= '<div class="cont_editor_ubi">';
	$html.= '<div class="editor" data-id_clase="'.$clase->ID.'">';
		$html .='<div class="cabecera_editor">';
		$html .='<div class="eliminar_clase eliminar_post" data-id_post="'.$clase->ID.'"></div>';
			$html.= '<div class="volver_atras">&lt; CALENDARIO</div>';
			/*GUARDAR--------------*/
		$html .='</div>';
		$html .='<div class="select_instructor">';
			$html.= '<div class="especial_instructor cont_ed_border">';
				$html.= '<div class="upcoming_reservations nueva_columna_titulo"><h2>INSTRUCTOR</h2><hr class="hrinline1"></div>';
				$html.= traer_profes_selector( $clase->instructor, true );
			$html.= '</div>';
			/*DEFINIMOS HORARIO*/
			$html.= '<div class="nueva_columna especial_instructor">';
				$html.= '<div class="upcoming_reservations nueva_columna_titulo"><h2>HORARIO</h2><hr class="hrinline2"></div>';
				$html.='<span><img src="'.imagenes(false).'/reloj.png" class="reloj"></span>';
				$html.='<select class="half_input" name="hora">';
					for( $h = 6; $h < 24; $h++ ){
						$selected = $h == (int)$hora ? ' selected="selected"' : '';
						$html.='<option value="'.$h.'"'.$selected.'>'.$h.'</option>';
					};
				$html.= '</select>';
				$html.='<select class="half_input" name="minutos">';
					$minutos = array(
						'00',
						'15',
						'30',
						'45',
					);
					foreach( $minutos as $m ){
						$selected = $m == (int)$minutos ? ' selected="selected"' : '';
						$html.='<option value="'.$m.'"'.$selected.'>'.$m.'</option>';
					};
				$html.= '</select>';
			$html.= '</div>';
			/*TIPO DE SALON*/
			$html.= '<div class="nueva_columna especial_instructor">';
				$html.= '<div class="upcoming_reservations nueva_columna_titulo"><h2>TIPO DE CLASE</h2><hr class="hrinline3"></div>';
				$html.= '<input type="text" name="tipo" value="'.$clase->tipo.'" placeholder="Tipo de clase"/>';
				$html.= '<div id="guardar_clase" class="guardar_informacion">Guardar</div>';
				$html.= '<div class="eliminar_clase botoneliminar" data-id_post="'.$id_clase.'">Eliminar</div>';
			$html.= '</div>';
		$html .='</div>';
	$html.= '</div>';
$html.= '</div>';
?>