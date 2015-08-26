<?php

class Clase{
	public $ID;
	public $timestamp;
	public $timestamp_legible;
	public $salon;

	public $instructor;
	public $horario;
	public $fecha;

	public $bicis_totales;
	public $bicis_disponibles;
	public $bicis_tomadas;

	public $forma;
	public $permalink;
	public $tipo; 

	function __construct( $id = 0 ){
		$data = get_post_meta( $id );

		$this->ID			= $id;
		$this->timestamp    = isset( $data['timestamp'] )	? reset( $data['timestamp'] )				: false;
		$this->timestamp_legible    = $this->timestamp	? date_i18n( 'Y-m-d H:i:s',$this->timestamp )				: false;
		$this->instructor	= isset( $data['instructor'] )	? reset( $data['instructor'] ) : false;
		$this->salon		= isset( $data['salon'] )	? reset( $data['salon'] ) : false;
		$this->forma		= isset( $data['forma'] )	? unserialize( reset( $data['forma'] ) ) : false;
		$this->horario		= $id ? get_the_date( 'Y-m-d H:i', $this->ID ) : false;
		$this->fecha		= $id ? strtotime( get_the_date( 'Y-m-d H:i:s', $this->ID ) ) : false;

		$this->bicis_totales		= $this->cantidad_bicis( 2 );
		$this->bicis_disponibles	= $this->cantidad_bicis( 1 );
		$this->bicis_tomadas		= $this->bicis_totales - $this->bicis_disponibles;

		$this->permalink	= $id ? get_permalink( $this->ID ) : '';
		$this->tipo			= isset( $data['tipo'] )	? reset( $data['tipo'] ) : '';
	}
	public function get_array_data(){
		return get_object_vars( $this );
	}
	public function get_ubicacion(){
		$salon = new Salon( $this->salon );

		return $salon->ubicacion;
	}
	public function get_forma(){
		$forma = $this->forma;

		if( !$forma ){
			/*AGARRAMOS LA FORMA POR DEFECTO SI ES QUE NO HAY*/
			$salon = new Salon( $this->salon );
			$forma = $salon->forma;
		};
		return $forma;
	}
	public function is_completa(){
		$forma = $this->get_forma();
		$completa = true;

		foreach( $forma as $y => $fila ){
			/*FILA*/
			foreach( $fila as $x => $celda ){
				if( (int)$celda === 1 ){
					$completa = false;
				};
			};
		};
		return $completa;
	}
	public function cantidad_bicis( $tipo_bici = 2 ){
		$forma =  $this->get_forma();
		if( !$forma ){ return; };
		$posicion = 0;
		foreach( $forma as $y => $fila ){
			/*FILA*/
			if( count( array_intersect($fila,array(0,0,0,0,0,0,0,0,0,0,0) ) ) == count( $fila ) ){
				/*SALTAMOS FILAS VACIAS*/
				continue;
			};
			foreach( $fila as $x => $celda ){
				if( (int)$celda <= $tipo_bici && (int)$celda !== 0 ){
					$posicion++;
				};
			};
		};

		return $posicion;
	}
	public function imprimir_forma( $print = true, $defecto = false ){
		$forma =  $this->get_forma();
		//mario( $forma );
		if( !$forma ){ return; };
		$html = '';

		$html.= '<div class="clase_salon" data-id_mapa="'.$this->ID.'">';
			$posicion = 1;
			foreach( $forma as $y => $fila ){
				/*FILA*/
				if( count( array_intersect($fila,array(0,0,0,0,0,0,0,0,0,0,0) ) ) == count( $fila ) ){
					/*SALTAMOS FILAS VACIAS*/
					continue;
				};
				foreach( $fila as $x => $celda ){
					$class = 'bicicleta forma_'.$celda;
					if( $defecto && $defecto[0] == $x && $defecto[1] == $y ){
						$class = 'bicicleta reserva_usando forma_1';
					};
					$html.= '<div class="'.$class.'" data-x="'.$x.'" data-y="'.$y.'">'.$posicion.'</div>';
					if( $celda == 1 || $celda == 2 ){
						$posicion++;
					};
				};
			};
			$html.= '<div class="profesor_salon" data-link="'.get_permalink( $this->instructor ).'"><div class="bicicleta centrado_vertical"><h2 class="elemento_centrado">'.get_the_title( $this->instructor ).'</h2></div></div>';
		$html.= '</div>';
		if( $print ){
			echo $html;
		}else{
			return $html;
		};
	}
	public function get_reservas(  ){
		$args = array(
			'post_type'			=> 'reserva',
			'posts_per_page'	=> -1,
			'post_status'		=> 'future',
			'meta_query'		=> array(
				array(
					'key'		=> 'clase',
					'value'		=> $this->ID,
					'compare'	=> '=',
				),
			),
		);
		$data = get_posts( $args );

		return $data;
	}
	public function bici_disponible( $bici = array() ){
		if( !$bici || count( $bici ) != 2 ){ return; };
		$forma = $this->get_forma();


		$bicicleta	= isset( $forma[(int)$bici[1]][(int)$bici[0]] ) && $forma[(int)$bici[1]][(int)$bici[0]] == '1' ? true : false;

		return $bicicleta;
	}
	public function bici_ocupada( $bici = array() ){
		if( !$bici || count( $bici ) != 2 ){ return; };
		$forma = $this->get_forma();

		$bicicleta	= isset( $forma[(int)$bici[1]][(int)$bici[0]] ) && $forma[(int)$bici[1]][(int)$bici[0]] == '2' ? true : false;
		return $bicicleta;
	}
	public function reservar_bici( $bici = array() ){
		if( !$this->bici_disponible( $bici ) ){ return; };
		$forma = $this->get_forma();

		$forma[(int)$bici[1]][(int)$bici[0]]	= '2';

		$this->actualizar_forma( $forma );
		return true;
	}
	public function liberar_bici( $bici = array() ){
		if( !$this->bici_ocupada( $bici ) ){ return; };
		$forma = $this->get_forma();

		$forma[(int)$bici[1]][(int)$bici[0]]	= '1';

		$this->actualizar_forma( $forma );
		return true;
	}
	public function actualizar_forma( $forma = false ){
		if( !$forma ){ return; };

		update_post_meta( $this->ID,'forma',$forma );
	}
	public function eliminar(){
		/*ELIMINAR CLASES*/
		$reservaciones = $this->get_reservas();
		if( $reservaciones ){
			foreach( $reservaciones as $reserva ){
				$r = new Reserva( $reserva->ID );
				$r->eliminar();
			};
		};
		eliminar( $this->ID );
	}
	public function crear(  $salon = false, $instructor = false, $fecha = false, $tipo = '' ){
		if( !$salon || !$instructor || !$fecha ){ return; };

		$nuevo = crear( 'clase', false, $fecha );

		if( $nuevo ){
			$this->ID = $nuevo;
			update_post_meta( $nuevo, 'salon', $salon );
			update_post_meta( $nuevo, 'instructor', $instructor );
			update_post_meta( $nuevo, 'tipo', $tipo );
			update_post_meta($nuevo, 'timestamp', current_time('timestamp') );
		};
	}
	public function actualizar( $salon = false, $instructor = false, $fecha = false, $tipo = '' ){
		if( !$instructor || !$fecha ){ return; };
		update_post_meta( $this->ID, 'instructor', $instructor );
		update_post_meta( $this->ID, 'tipo', $tipo );
		actualizar_fecha( $this->ID, $fecha );
	}
	public function imprimir_reservaciones(  ){
		global $admin;
		$html = '';
		$bicis_totales		= $this->cantidad_bicis( 2 );
		$bicis_disponibles	= $this->cantidad_bicis( 1 );
		$bicis_tomadas		= $bicis_totales-$bicis_disponibles;

		$html_reservas		= '';



		$reservaciones	=  $this->get_reservas(  );
		if( $reservaciones ){
			/*VAMOS A PROCESAR PARA QUE SE ORDENEN POR NUMERO DE BICI*/
			usort($reservaciones, "ordernar_reservas_por_bici");
			foreach( $reservaciones as $r ){
				$reserva	= new Reserva( $r->ID );
				$bici		= $reserva->bici;

				$comprador	= get_user_by('id', $reserva->comprador);

				if( $comprador ){
					$comprador = $comprador->display_name;
				}else{
					$comprador = 'Invitado';
				};

				$html_reservas.= '
				<div class="bookings_bottom_single">
					<div class="basic_bookings bookings_time single_booking_name">'.$comprador.'</div>
					<div class="basic_bookings bookings_time bokings_bike">
						<img src="'.imagenes(false).'/bike.png" /><span>'.$reserva->get_id_bici_front().'</span>
					</div>';

					if( $admin->permisos('FrontDesk') ){
						$html_reservas.=
						'<div class="basic_bookings symbols eliminar_post eliminar_reserva" data-id_post="'.$reserva->ID.'">
							<img src="'.imagenes(false).'/trash_bookings.png" />
						</div>
						<div class=\'basic_bookings symbols\' data-recipiente=\'panel_final\' data-accion=\'{"funcion":"editar_reserva","attr":'.$reserva->ID.'}\'>
							<img src="'.imagenes(false).'/editar.png" />
						</div>';
					};

				$html_reservas.=
				'</div>';
			};
		};

		$link_imprimir = strpos( $this->permalink, '?' ) === false ? $this->permalink.'?imprimir_reserva=true' : $this->permalink.'&imprimir_reserva=true';


		$html.= '<div class="bookings_top_single" data-dia="'.date_i18n( 'd', $this->fecha ).'">';
			$html.= '<div class="basic_bookings bookings_time">'.date_i18n( 'g:i A', $this->fecha ).'</div>';
			$html.= '<div class="basic_bookings bookings_date">'.date_i18n( 'd \d\e F', $this->fecha ).'</div>';
			$html.= '<div class="basic_bookings bookings_instructor">'.get_the_title( $this->instructor ).'</div>';
			$html.= '<div class="basic_bookings bookings_available">'.$bicis_disponibles.'<br><div class="span_disponible small color_gris">DISPONIBLES</div></div>';
			$html.= '<div class="basic_bookings bookings_taken">'.$bicis_tomadas.'<br><div class="span_disponible small color_gris">RESERVADAS</div></div>';
			if( $reservaciones ){
				$html.= '<div class="basic_bookings bookings_edit"></div>';
				$html.= '<a class="bookings_print" target="_blank" href="'.$link_imprimir.'"></a>';
			};
		$html.= '</div>';
		$html.= '<div class="bookings_bottom">'.$html_reservas.'</div>';

		return $html;
	}
	public function imprimir_para_impreso(){
		?>
        <style type="text/css" media="all">
			*{
				padding:0px;
				margin:0px;
			}
			.reservas_de_clases {
				text-align: left;
				font-size: 12px;
				font-family: Arial;
			}

			.reservas_de_clases th {
				text-align: center;
				text-transform: uppercase;
				font-size: 15px;
				padding: 5px;
			}

			tr.info td {
				background-color: rgb(231, 231, 231);
				border-color: white;
				padding: 3px;
			}

			tr.cabecera_data td,tr.data td {
				padding: 3px;
				text-align: center;
				font-size: 10px;
			}

			tr.cabecera_data td {
				background-color: silver;
			}
        </style>
        <table width="100%" border="1" align="center" cellpadding="3" cellspacing="0" class="reservas_de_clases" bordercolor="silver">
          <tbody>
            <tr>
              <th colspan="3" scope="col">Clase #<?= $this->ID;?></th>
            </tr>
            <tr class="info">
              <td>Fecha y hora</td>
              <td colspan="2"><?= date_i18n( 'l, d \d\e F \d\e\l Y H:i \h\s\.',$this->fecha );?></td>
            </tr>
            <tr class="info">
              <td>Salón</td>
              <td colspan="2"><?= get_the_title( $this->salon );?></td>
            </tr>
            <tr class="info">
              <td>Instructor</td>
              <td colspan="2"><?= get_the_title( $this->instructor );?></td>
            </tr>
            <tr class="cabecera_data">
              <td>Alumno</td>
              <td>N° de bicicleta</td>
              <td>Asistencia</td>
            </tr>
            <?php
				$reservaciones	=  $this->get_reservas(  );

				if( $reservaciones ){
					$format_bici	= array();
					$total_bicis	= $this->cantidad_bicis(2);

					foreach( $reservaciones as $r ){
						$reserva	= new Reserva( $r->ID );

						$comprador	= get_user_by('id', $reserva->comprador);

						if( $comprador ){
							$comprador = $comprador->display_name;
						}else{
							$comprador = 'Invitado';
						};

						$bici_id = (int)$reserva->get_id_bici_front();

						$format_bici[$bici_id] = array(
							'comprador'	=> $comprador,
							'bici_id'	=> $bici_id,
						);
					};
					ksort( $format_bici );


					for( $i = 1; $i<= $total_bicis; $i++ ){
						$comprador = isset( $format_bici[$i] ) ? $format_bici[$i]['comprador'] : '';


						echo '<tr class="data">
							<td>'.$comprador.'</td>
							<td>'.$i.'</td>
							<td></td>
						</tr>';
					};
				};
			?>
          </tbody>
        </table>
        <script>print();</script>
		<?php
	}
	public function duplicar( $fecha = false ){
		if( !$fecha ){ return; };
		$this->crear( $this->salon, $this->instructor, $fecha, $this->tipo );
	}
}?>
