<?php

class Reserva{
	public $ID;
	public $timestamp;
	public $timestamp_legible;
	public $comprador;
	public $clase;
	public $bici;
	public $bici_id_real;
	public $expiracion;
	public $mensaje;

	function __construct( $id = false ){
		$this->mensaje = new Mensajes();

		if( !$id ){ return; };
		/*ESTO ES SOLO CUANDO SE PIDE INFO*/

		$data = get_post_meta( $id );

		$this->ID			= $id;
		$this->timestamp    = isset( $data['timestamp'] )	? reset( $data['timestamp'] )				: false;
		$this->timestamp_legible    = $this->timestamp	? date_i18n( 'Y-m-d H:i:s',$this->timestamp )				: false;
		$this->clase		= isset( $data['clase'] )		? reset( $data['clase'] )				: false;
		$this->comprador	= isset( $data['comprador'] )	? reset( $data['comprador'] )			: false;
		$this->bici			= isset( $data['bici'] )		? unserialize( reset( $data['bici'] ) )	: false;
		$this->bici_id_real= $this->bici ? $this->get_id_bici_front() : '';
		$this->expiracion	= isset( $data['expiracion'] )	? reset( $data['expiracion'] )			: expiracion_primer_paquete(true);
	}
	public function get_array_data(){
		return get_object_vars( $this );
	}
	public function get_id_bici_front(){

		/*NECESITAMOS VER LA FORMA DEL SALÓN PARA APLICAR*/
		$clase = new Clase( $this->clase );
		$forma = $clase->get_forma();
		$posicion = 1;
		foreach( $forma as $y => $fila ){
			/*FILA*/
			if( count( array_intersect($fila,array(0,0,0,0,0,0,0,0,0,0,0) ) ) == count( $fila ) ){
				/*SALTAMOS FILAS VACIAS*/
				continue;
			};
			foreach( $fila as $x => $celda ){
				if( (int)$y === (int)$this->bici[1] && (int)$x === (int)$this->bici[0] ){
					return $posicion;
				};
				if( $celda == 1 || $celda == 2 ){
					$posicion++;
				};
			};
		};
		return 0;
		//mario( $forma );
	}
	public function set_reserva( $data = false, $comprador = false ){
		if( !$data || !$comprador || !isset( $data['clase'] ) || !isset( $data['bici'] ) ){ return; };

		$this->clase		= $data['clase'];
		$this->bici			= $data['bici'];
		$this->comprador	= $comprador;
	}
	public function actualizar( $data = false ){
		if( !$data || !$this->ID || !isset( $data['bici'] ) || !isset( $data['clase'] ) ){ return; };


			if( $data['clase'] != $this->clase || $data['bici'] != $this->bici ){
				/*
					SI HAY ALGUN CAMBIO EN CLASE O BICI TENEMOS
					QUE ACTUALIZAR FORMAS
				*/
				/*COMPROBAMOS SI HAY UNA NUEVA CLASE*/
				$clase_new	= $data['clase'] != $this->clase ? new Clase( $data['clase'] ) : false;
				$clase_old	= new Clase( $this->clase );/*SIEMPRE TOCARÁ ACTUALIZAR LA VIEJA*/

				$bici_new	= $data['bici'] != $this->bici ? $data['bici'] : false;/*DISTINTA BICI*/
				$bici_old	= $this->bici;

				if( !$clase_new ){
					/*
						=	CLASE
						!	BICI
					*/
					/*
						TOCA ACTUALIZAR FORMA DE LA CLASE
					*/

					/*LIBERAMOS LA BICI*/

					if( $clase_old->bici_ocupada( $bici_old ) && $clase_old->bici_disponible( $bici_new ) ){
						/*SE PUEDEN MODIFICAR LAS FORMAS DEL SALON*/
						$forma = $clase_old->get_forma();

						$forma[(int)$bici_new[1]][(int)$bici_new[0]]	= '2';
						$forma[(int)$bici_old[1]][(int)$bici_old[0]]	= '1';

						$clase_old->actualizar_forma( $forma );
						/*ACTUALIZAMOS EL DATO DE LA BICI EN LA RESERVA*/
						update_post_meta($this->ID, 'bici', $bici_new );
					};
				}else{
					/*
						!=	CLASE
						=	BICI
					*/
					if( $clase_old->bici_ocupada( $bici_old ) && $clase_new->bici_disponible( $data['bici'] ) ){
						$forma_old = $clase_old->get_forma();
						$forma_new = $clase_new->get_forma();


						$forma_old[(int)$bici_old[1]][(int)$bici_old[0]]			= '1';
						$forma_new[(int)$data['bici'][1]][(int)$data['bici'][0]]	= '2';

						$clase_old->actualizar_forma( $forma_old );
						$clase_new->actualizar_forma( $forma_new );

						update_post_meta($this->ID, 'clase', $data['clase'] );
						if( $bici_new ){
							/*ACTUALIZAMOS EL DATO DE LA BICI EN LA RESERVA*/
							update_post_meta($this->ID, 'bici', $bici_new );
						};
					};
				};
			};
	}
	public function comprar(){
		if( $this->ID ){
			$this->mensaje->add_error('No se puede volver a comprar una reserva');
			return;
		};
		$comprador	= get_user_by( 'id', $this->comprador );
		$clase		= get_post( $this->clase );/*SOLO PARA CHEQUEO*/


		if( !$comprador || !$this->bici || !$clase ){
			$this->mensaje->add_error('Falta información para poder finalizar la reserva');
			return;
		};
		$fecha_publi= $clase->post_date;
		unset( $clase );

		//var_dump( numero_clases_user( $comprador->ID ) );
		if( (int)numero_clases_user( $comprador->ID ) < 1 ){
			$this->mensaje->add_error('El usuario no tiene clases suficiente, debe comprarlas en el front.');
			return;
		};
		$clase = new Clase( $this->clase );

		if( !$clase->reservar_bici( $this->bici ) ){
			/*COMPROBAMOS DISPONIBILIDAD*/
			$this->mensaje->add_error('La bicicleta que intentas comprar ya no se encuentra disponible, por favor, selecciona otra.');
			return;
		};
		$restada = restar_clases( $this->comprador, 1 );

		/*CREAMOS LA RESERVA :)*/
		$args = array(
			'post_title'	=> "",
			'post_status'	=> 'publish',
			'post_type'		=> 'reserva',
			'post_author'	=> $this->comprador,
			'post_date'		=> $fecha_publi,
		);

		$id_reserva = wp_insert_post( $args );

		if($id_reserva){
			$this->ID = $id_reserva;
			update_post_meta($id_reserva, 'bici', $this->bici);
			update_post_meta($id_reserva, 'clase', $this->clase);
			update_post_meta($id_reserva, 'comprador', $this->comprador);
			update_post_meta($id_reserva, 'expiracion', $restada );
			update_post_meta($id_reserva, 'timestamp', current_time('timestamp') );
		}else{
			$this->mensajes->add_error( 'Hubo un error en la generación de la reserva' );
			return;
		};
		/*AHORA DEBEMOS HACER UN UPDATE DE LA RESERVA EN LA CLASE!!*/
		mail_nueva_reservacion( $id_reserva, $this->comprador );
		$this->redirect = array(
			'inforeserva'	=> $id_reserva,
		);
	}
	public function imprimir_thankyou(){
		$this->print_historial();
	}
	public function print_historial( $future = false ){
		$post_clase = get_post( $this->clase );
		if( !$post_clase ){ return; };

		if( $future ){
			/*LIMITAR A UNA HORA ANTES*/
			$fecha_post		= (int)strtotime( $post_clase->post_date );
			$fecha_actual	= (int)current_time('timestamp');

			if( ($fecha_post-$fecha_actual) < 3600*12 ){
				$future = false;
			};
		};

		$clase = new Clase( $this->clase );

		$numero_dia	= date('d',$clase->fecha);
		$titulo		= date_i18n( 'l ', $clase->fecha ).$numero_dia.date_i18n( ' F', $clase->fecha );
		?>
        <div class="up2 hcompra2 <?php if( $future ){ echo 'reserva_futura';};?>" data-reserva_cuenta="<?= $this->ID;?>">
            <div class="row vertical-align">
                <div class="col-xs-9">
                    <div class="large"><span class="color_gris2">CLASE: </span><?= get_the_title( $clase->instructor );?> <small class="color_azul">Bici: <?= $this->get_id_bici_front();?></small></div>
                    <?= '<small class="color_gris2">'.get_the_title( $clase->get_ubicacion() ).' / '.date_i18n( 'l j F Y', $clase->fecha ).' / '.date_i18n( 'g:i a', $clase->fecha ).'</small>';?>
                </div>
                <div class="col-xs-3">
                	<?php if( $future ){?>
                        <div class="cancel text-center center-block color_azul">
                            <small>x</small>
                            <br>
                            <small>cancelar</small>
                        </div>
					<?php };?>
                </div>
            </div>
        </div>
        <?php
	}
	public function eliminar(){
		/*LIMITAMOS SOLO A RESERVAS FUTURAS*/
		$post_reserva = get_post( $this->ID );
		if( $post_reserva->post_status !== 'future' ){ return; };

		/*UPDATE DE FORMA DE LA CLASE*/
		$clase	= new Clase( $this->clase );
		$forma	= $clase->get_forma();
		$bici	= $this->bici;

		if( !isset( $forma[$bici[1]][$bici[0]] ) ){ return; };

		$forma[$bici[1]][$bici[0]] = 1;

		$clase->actualizar_forma( $forma );

		/*SUMAMOS LA CLASE AL USUARIO*/
		sumar_clases( $this->comprador, 1, $this->expiracion );

		/*ELIMINAR CLASES*/
		return eliminar( $this->ID );
	}
	public function imprimir_historial_back( $pendientes = true ){

		$clase = new Clase( $this->clase );
		$numero_dia	= date('d',$clase->fecha);
		$titulo		= date_i18n( 'l ', $clase->fecha ).$numero_dia;

		$comprador	= get_user_by('id', $this->comprador );

		if( !$comprador ){ return; };

			$userTitle = '<span class="upcoming_reservations_date">'.$titulo.'</span><span class="upcoming_reservations_span upcoming_reservation_address">'.get_the_title( $clase->get_ubicacion() ).'</span><span class="upcoming_reservation_separator">/</span><span class="upcoming_reservation_user">'.$comprador->display_name.'</span><span class="upcoming_reservation_separator">/</span><span class="upcoming_reservations_span upcoming_reservation_time">'.date_i18n( 'g:i A', $clase->fecha ).'</span>';


		if( $pendientes ){
			return print_single_option(
				$this->ID ,
				array(
					'titulo'	=> $userTitle,
					'extra'	=> editar_opcion(
							false,
							false,
							false,
							'eliminar_reserva basic_bookings symbols',
							'<img src="'.imagenes(false).'/trash_bookings.png" />',
							$this->ID
						).editar_opcion(
							$this->ID,
							'editar_reserva',
							false,
							'basic_bookings symbols',
							'<img src="'.imagenes(false).'/editar.png" />'
						),
					'class'	=> 'bookings_bottom_single',
				),
				false
			);
		}else{
			return print_single_option(
				$this->ID ,
				array(
					'titulo'	=> $userTitle,
					'class'	=> 'bookings_bottom_single bookings_bottom_single_pastReservations',
				),
				false
			);
		};
	}
};
?>
