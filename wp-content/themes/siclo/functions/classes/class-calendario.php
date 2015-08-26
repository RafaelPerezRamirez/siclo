<?php

class Calendario{
	public $tipo;
	public $data_tipo;
	public $classe;
	public $fecha_inicio;
	public $fecha_fin;
	public $hora_min;
	public $hora_max;
	public $instructores;
	
	function __construct( $data = false ){
		
		$this->tipo			= isset( $data['tipo'] )		? $data['tipo']			: 'global';
		$this->data_tipo	= isset( $data['data_tipo'] ) 	? $data['data_tipo']	: false;
		$this->fecha_inicio	= isset( $data['fecha_inicio'] )? $data['fecha_inicio']	: strtotime( date_i18n( 'Y-m-d' ) );
		$this->ID			= isset( $data['ID'] )			? $data['ID']			: false;
		$this->fecha_fin	= isset( $data['fecha_fin'] )	? $data['fecha_fin']	: $this->fecha_inicio+ dias(7);
		$this->hora_min		= isset( $data['hora_min'] )	? $data['hora_min']		: 6;
		$this->hora_max		= isset( $data['hora_max'] )	? (int)$data['hora_max']+1		: 25;
		$this->classe		= isset( $data['classe'] )		? $data['classe']		: 'ubicacion';
		$this->instructores	= array();
	}
	public function imprimir_cabecera_back( $semana = false, $tipo_reserva = false, $front_end = false ){
		$dia_i			= $this->fecha_inicio;
		$numero_dia_i	= date('d',$dia_i);
		
		$dia_f			= $this->fecha_fin-dias(1);
		$numero_dia_f	= date('d',$dia_f);
		
		$titulo		= $numero_dia_i.' de '.date_i18n( ' M', $dia_i ).' al '.$numero_dia_f.' de '.date_i18n( ' M', $dia_f );
		
		if( $front_end ){
			echo '<small class="gris3 p1 text-center center-block" data-calendario="'.$this->ID.'">Semana del <span class="str">'.$titulo.'</span></small>';
		}else{
			$class = $semana && $semana == $this->ID ? ' semana_activa' : '';
			return '<span class="inlineB week_button '.$class.'" data-calendario="'.$this->ID.'">Semana del '.$titulo.'</span>';
		};
	}
	public function imprimir( $imprimir = true, $clase = '', $defecto = false, $front = false ){
		
		
		$dias	= ( $this->fecha_fin-$this->fecha_inicio ) / dias(1);/*NUMERO DE DIAS A IMPRIMIR*/
		
		$clases_format = array();
		
		switch( $this->classe ){
			case 'ubicacion':
				$ubicacion = new Ubicacion( $this->data_tipo );
				$clases_format = $ubicacion->get_clases( $this->fecha_inicio, $this->fecha_fin, true );
			break;
			case 'salon':
				$salon = new Salon( $this->data_tipo );
				$clases_format = $salon->get_clases( true, $this->fecha_inicio, $this->fecha_fin );
			break;
			case 'de_instructor':
				$instructor = new Instructor( $this->data_tipo );
				$clases_format = $instructor->get_clases( $this->fecha_inicio, $this->fecha_fin, true );
				if( !$clases_format ){ return; };
			break;
			default:
				return;
			break;
		};
		$html = '';
		
		$id_c = isset( $this->ID ) && $this->ID != false ? 'id="'.$this->ID.'"' : '';
		$html.= '<div '.$id_c.' class="calendario calendario_'.$this->tipo.' '.$clase.'">';
			for( $i = 0; $i < $dias; $i++ ){
				/*IMPRIMIMOS TODOS LOS DIAS :)*/
				$html.= $this->print_dia( $i, $clases_format, $imprimir, $defecto, $front );
			};
		$html.= '</div>';
		if( $imprimir ){
			echo $html;
		}else{
			return $html;
		};
	}
	private function print_horas_guia(){
		$html		= '';
		$html.= '<section class="dia dia_menu"><h2></h2>';
			for( $h = $this->hora_min; $h < $this->hora_max; $h++ ){
				$html.= '<section class="hora centrado_vertical"><h2 class="elemento_centrado">'.$h.':00hs</h2></section>';
			};
		$html.= '</section>';
		return $html;
	}
	public function print_dia( $dia = 0, $clases_format = array(), $imprimir = true, $defecto = false, $front = false ){
		$dia		= $this->fecha_inicio+dias($dia);
		$numero_dia	= date('d',$dia);
		$titulo		= '<strong>'.$numero_dia.'</strong>'.date_i18n( ' l', $dia );
		$html		= '';
		
		
		$html.= '<section class="dia col text-center">';
			$html.= $this->print_horas_guia();
			$html.= '<div class="contenedor_dia contcal gris4">';
				$html.= '<h2 class="titlecal text-center gris3 color_gris2">'.$titulo.'<small class="repetir_semana color_v_oscuro" style="display:none;" data-dia_repetir="'.$dia.'">Repetir anterior</small></h2>';
				for( $h = $this->hora_min; $h < $this->hora_max; $h++ ){
					/*HORAS*/
					$html.= '<section class="hora" data-hora="'.$h.'" data-dia="'.$dia.'">';
						$html.= '<h2>'.$h.':00hs</h2>';
						if( isset( $clases_format[$h.'_'.$numero_dia] ) ){
							$cantidad = count( $clases_format[$h.'_'.$numero_dia] );
							foreach( $clases_format[$h.'_'.$numero_dia] as $clase ){
								$c = new Clase( $clase->ID );
								$this->instructores[ $c->instructor ] = true;
								
								
								$data_link	= 'data-link="'.get_permalink( $c->ID ).'"';
								if( $c->is_completa() || !$imprimir ){
									$data_link = '';
								};
								$css = $defecto && $defecto == $c->ID ? 'clase_calendario centrado_vertical reserva_usando' : 'clase_calendario centrado_vertical';
								if( !$front ){
									$html.= '<article '.$data_link.' data-clase_calendario="'.$c->ID.'" class="'.$css.' text blanco" ><div class="elemento_centrado" data-instructor="'.$c->instructor.'">';
										$html.= get_the_title( $c->instructor ).'<time>'.date_i18n( 'g:i A', $c->fecha ).'</time><small>'.$c->tipo.'</small>';
									$html.= '</div></article>';
								}else{
									$data_cc = $data_link !== 'data-selclase="'.get_permalink( $c->ID ).'"' ? '' : '';
									$tipo	= $c->tipo ? $c->tipo : '<br/>';
									$small = "";
									
									$status = get_post_field('post_status',$c->ID);
									
									$pasada = $c->fecha < current_time('timestamp');
									
									
									if( /*$c->is_completa() || $status == 'publish'*/ $pasada ){
										$css .= ' clase_pasada';
									};
									
									if($tipo !== '<br/>'){
										$small .= '<small>'.$tipo.'</small>';
									};
									
									$html.= 
									'<div '.$data_cc.' class="'.$css.' text blanco" data-clase_calendario="'.$c->ID.'" data-instructor="'.$c->instructor.'">'.
										"<div class='large'>".get_the_title( $c->instructor )."</div>".
										"<small class='superSmall'>".$small."</small>".
										"<div class='medium'><strong>".date_i18n( 'g:i A', $c->fecha )."</strong></div>".
									"</div>";
								};
							};
						};
					$html.= '</section>';
				};
			$html.= '</div>';
		$html.= '</section>';
		
		if( $imprimir ){
			echo $html;
		}else{
			return $html;
		};
	}
	public function print_dias_reserva(){
		$html = '<div class="instructor_incoming_days">';
		for( $d = 0;$d<7;$d++ ){
			$dia	= $this->fecha_inicio+dias($d);
			$html.=	  '<span class="inlineB" data-fecha="'.date('d',$dia).'">'.date_i18n( 'l', $dia ).'</span>';
		};
		
		$html .= '</div>';
		return $html;
	}
	public function selector_instructores(){
		if( !count( $this->instructores ) ){ return; };
		?>
        <select name="select" class="form-control gris3 selector_change_instructor">
            <option value="" selected>Filtra por: Instructor</option>
            <?php
			foreach( $this->instructores as $id => $extra ){
				echo '<option value="'.$id.'">'.get_the_title( $id ).'</option>';
			};
			?>
        </select>
        <?php
	}
}
?>