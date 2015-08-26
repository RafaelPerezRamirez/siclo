<?php

class Analitica_profesores extends Analitica{
	/*
	** GRÁFICA POR DÍA EN PARK PLAZA
	** USUARIOS QUE RESERVARON POR CLASE
	** PORCENTAJE DE USUARIOS POR CLASE
	*/
	public function usuarios_por_profesor( $inicio = false, $fin = false, $grafica = 'usuarios_por_clases' ){
		if( !$fin ){
			$fin	= current_time( 'timestamp' );
		};
		if( !$inicio ){
			$inicio	= current_time( 'timestamp' )-dias(14);
		};
		$unix_time_inicio	= strtotime( $inicio );
		$unix_time_fin		= strtotime( $fin );
		$dias				= ($unix_time_fin-$unix_time_inicio)/60/60/24;
		$html				= '';
		
		$profesores = get_posts(array(
			'post_type'			=> 'instructor',
			'posts_per_page'	=> -1,
			'fields'			=> 'ids',
		));
		if( !$profesores ){ return; };
		$html.= $this->js_css();
		foreach( $profesores as $profe_id ){
			$data				= array(
				'fechas'	=> array(),
			);
			$profe				= new Instructor( $profe_id );
			$clases_por_fecha	= $profe->get_clases( $inicio, $fin, true, true );
			
			$maximo_bicis_dia	= 0;
			if( $clases_por_fecha ){
				foreach( $clases_por_fecha as $fecha => $clase_array ){
					if( !count( $clase_array ) ){ continue; };
					
					/*SETEAMOS EL DIA EN EL QUE TRABAJAMOS*/
					if( !isset( $data['fechas'][$fecha] ) ){
						$data['fechas'][$fecha] = array();
					};
					/*RECORREMOS LAS CLASES*/
					foreach( $clase_array as $clase_objeto ){
						$clase = new Clase( $clase_objeto->ID );
						
						$bicis_totales		= $clase->cantidad_bicis( 2 );
						$bicis_disponibles	= $clase->cantidad_bicis( 1 );
						$bicis_tomadas		= $bicis_totales-$bicis_disponibles;
						
						if( $maximo_bicis_dia < $bicis_tomadas ){
							$maximo_bicis_dia = $bicis_tomadas;
						};
						
						$data['fechas'][$fecha][] = array(
							'hora'		=> date_i18n( 'H:i', $clase->fecha ),
							'asistencia'=> $bicis_tomadas,
							'totales'	=> $bicis_totales,
							'id_clase'	=> $clase->ID,
							'instructor'=> get_the_title( $clase->instructor ),
						);
					};
				};
				$data['maximo']			= $maximo_bicis_dia;
				$data['instructor']		= $profe->nombre;
				$data['instructor_foto']= $profe->foto;
				
				/*UNA VEZ SETEADA LA INFORMACIÓN LA IMPRIMIMOS*/
				$html.= $this->crear_grafica( 'usuarios_por_clases' , $data);
				$html.= $this->crear_grafica( 'porcentaje_por_clases' , $data);
			};
		};
		
		
		
		return $html;
	}
	/*
	** USUARIOS NUEVOS, TOTALES POR FECHA
	*/
	public function usuarios_por_fechas( $inicio = false, $fin = false ){
		if( !$fin ){
			$fin	= date_i18n( 'Y-m-d' );
		};
		if( !$inicio ){
			$inicio	= date_i18n( 'Y-m-d', current_time('timestamp')-dias(30) );
		};
		$unix_time_inicio	= strtotime( $inicio );
		$unix_time_fin		= strtotime( $fin );
		
		$dias			= ($unix_time_fin-$unix_time_inicio)/60/60/24;
		$usuarios		= $this->info;
		$usuarios_nuevos= $this->select_usuarios_fecha( $inicio, $fin );
		$data			= array(
			'fechas'	=> array(),
			'globales'	=> array(
				'nuevos'	=> count( $usuarios_nuevos ),
				'totales'	=> count( $usuarios ),
			),
		);
		$html			= '';
		
		/*VAMOS A GUARDAR CUÁNTOS USUARIOS HABÍAN*/
		$usuarios_antes	= count( $usuarios ) - count( $usuarios_nuevos );
		
		/*POR CADA DIA VAMOS A TRAER la información*/
		for( $dia = 0; $dia<=$dias;$dia++ ){
			$fecha			= $unix_time_inicio+dias( $dia );
			$fecha_string	= date_i18n('Y-m-d',$fecha);
			
			$usuarios_fecha	= $this->select_usuarios_fecha( $fecha_string );
			
			$nuevos_usuarios= count( $usuarios_fecha );
			$usuarios_antes+= $nuevos_usuarios;
			
			$data['fechas'][ $fecha_string ] = array(
				'nuevos'	=> $nuevos_usuarios,
				'totales'	=> $usuarios_antes,
			);
		};
		/*UNA VEZ SETEADA LA INFORMACIÓN LA IMPRIMIMOS*/
		$html.= $this->js_css();
		$html.= $this->crear_grafica('usuarios_por_fechas', $data);
		
		return $html;
	}
	private function crear_grafica( $tipo = 'usuarios_por_fechas', $data = false ){
		$html = '';
		
		$html.= '<figure class="grafica grafica_'.$tipo.' grafica_instructores">';
			$html.= call_user_func( array($this,'grafica_'.$tipo), $data);
		$html.= '</figure>';
		return $html;
	}
	private function grafica_usuarios_por_fechas( $data = false ){
		if( !$data ){ return; };
		$html = '<h2 class="grafica-titulo">Usuarios nuevos/totales por fecha</h2>';
		$html.= '<div class="grafica-cuerpo">';
			$totales= $data['globales']['totales'];
			$nuevos	= $data['globales']['nuevos'];
			
			/*CREACIÓN DE COLUMNAS*/
			foreach( $data['fechas'] as $fecha => $info ){
				if( (int)$info['nuevos'] === 0 ){ continue; };
				$html.= '<div class="grafica-columna">';
					$porcentaje_nuevos_fecha	= (int)( ($info['nuevos']*100)/$totales );
					$porcentaje_totales_fecha	= (int)( ($info['totales']*100)/$totales );
					
					$html.= '<div class="grafica-barra a_claro" style="height:'.$porcentaje_nuevos_fecha.'%;"><div class="grafica-numero-barra">'.$info['nuevos'].'</div></div>';
					$html.= '<div class="grafica-barra a_oscuro" style="height:'.$porcentaje_totales_fecha.'%;"><div class="grafica-numero-barra">'.$info['totales'].'</div></div>';
					$html.= '<footer class="grafica-footer">'.date_i18n( 'd m Y', strtotime( $fecha ) ).'</footer>';
				$html.= '</div>';
			};
			/*TOTALES*/
			$porcentaje_nuevos	= (int)( ($nuevos*100)/$totales );
			$html.= '<div class="grafica-columna grafica-totales">';
				$html.= '<div class="grafica-barra a_claro" style="height:'.$porcentaje_nuevos.'%;"><div class="grafica-numero-barra">'.$nuevos.'</div></div>';
				$html.= '<div class="grafica-barra a_oscuro" style="height:100%;"><div class="grafica-numero-barra">'.$totales.'</div></div>';
				$html.= '<footer class="grafica-footer">total</footer>';
			$html.= '</div>';
		$html.= '</div>';
		/*Leyenda*/
		$html.= '<div class="leyenda">
			<span class="bloque-leyenda a_claro"></span> Usuarios nuevos
			<span class="bloque-leyenda a_oscuro"></span> Usuarios totales
		</div>';
		
		return $html;
	}
	private function grafica_usuarios_por_clases( $data = false, $porcentajes = false ){
		if( !$data ){ return; };
		if( !count( $data['fechas'] ) ){ return; };
		
		$texto_titulo		= !$porcentajes ? 'Usuarios de '.$data['instructor'] : 'Porcentaje de '.$data['instructor'];
		$image_instructor	= !empty( $data['instructor_foto'] ) ? '<img src="'.$data['instructor_foto'].'" class="grafica-instructor-foto"/>' : '';
		
		$html = '<h2 class="grafica-titulo">'.$texto_titulo.' '.$image_instructor.'</h2>';
		
		$html.= '<div class="grafica-cuerpo">';
			
			$maximo	= $data['maximo'];
			
			/*CREACIÓN DE COLUMNAS*/
			foreach( $data['fechas'] as $fecha => $info ){
				$html.= '<div class="grafica-columna">';
					foreach( $info as $k => $info_este ){
						$colores = array(
							'a_claro',
							'n_claro',
							'v_claro',
							'a_oscuro',
							'n_oscuro',
							'v_oscuro',
							'black',
							'r_claro',
						);
						if( !$porcentajes ){
							/*ENTREGA USUARIOS QUE HAN IDO EN LAS CLASES*/
							$porcentaje	= $maximo == 0 ? 0 : (int)( ($info_este['asistencia']*100)/$maximo );
							$html.= 
							'<div class="grafica-barra '.$colores[$k].'" style="height:'.$porcentaje.'%;" title="Instructor: '.$info_este['instructor'].'">
								<div class="grafica-numero-barra">'.$info_este['asistencia'].'</div>
								<div class="grafica-barra-footer">'.$info_este['hora'].'</div>
							</div>';
						}else{
							/*ENTREGA EL PORCENTAJE DE USUARIOS POR CLASE*/
							$porcentaje	= (int)( ($info_este['asistencia']*100)/$info_este['totales'] );
							$html.= 
							'<div class="grafica-barra '.$colores[$k].'" style="height:'.$porcentaje.'%;" title="Instructor: '.$info_este['instructor'].'">
								<div class="grafica-numero-barra">'.$porcentaje.'%</div>
								<div class="grafica-barra-footer">'.$info_este['hora'].'</div>
							</div>';
						};
					};
					$html.= '<footer class="grafica-footer">'.$fecha.'</footer>';
				$html.= '</div>';
			};
		$html.= '</div>';
		
		return $html;
	}
	private function grafica_porcentaje_por_clases( $data = false ){
		return $this->grafica_usuarios_por_clases( $data, true );
	}
	private function select_usuarios_fecha( $start = '', $end = '' ){
		global $wpdb;
		
		if( empty($start) )
			$date = date_i18n('Y-m-d');
		
		if ( empty($end) )
			$end = $start;
		
		
		$start_dt	= new DateTime($start. ' 00:00:00');
		$s			= $start_dt->format('Y-m-d H:i:s');
		
		$end_dt		= new DateTime($end.' 23:59:59');
		$e			= $end_dt->format('Y-m-d H:i:s');
		
		$sql		= $wpdb->prepare("SELECT wp_users.* FROM wp_users WHERE 1=1 AND CAST(user_registered AS DATE) BETWEEN %s AND %s ORDER BY user_login ASC",$s,$e);
		
		$users		= $wpdb->get_results($sql);
		
		return $users;
	}
};
?>