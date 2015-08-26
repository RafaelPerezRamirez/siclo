<?php

class Salon{
	public $ID;
	public $timestamp;
	public $ubicacion;
	public $forma;

	function __construct( $id = 0 ){
		$data = get_post_meta( $id );

		$this->ID			= $id;
		$this->timestamp    = get_the_date( 'Y-m-d H:i:s', $id );
		$this->ubicacion	= isset( $data['ubicacion'] )	? reset( $data['ubicacion'] )			: false;
		$this->forma		= isset( $data['forma'] )		? unserialize( reset( $data['forma'] ) ): $this->forma_vacia();
		//mario( $this->forma );
	}
	public function get_array_data(){
		return get_object_vars( $this );
	}
	private function forma_vacia(){
		/*
			0: nada
			1: libre
			2: ocupada
			3: profe
		*/
		$forma = array();
		for( $i = 0;$i<11;$i++ ){
			$forma[] = array();
		};
		foreach( $forma as $k=> $f ){
			for( $i = 0;$i<11;$i++ ){
				if( $k < 2 && $i < 7 && $i > 3 ){
					/*BUSCAMOS POSICIONES PARA EL MAESTRO*/
					$forma[$k][] = 3;
				}elseif( $k < 3 && 2 == 99 ){
					$forma[$k][] = 1;
				}else{
					$forma[$k][] = 0;
				};
			};
		};


		//update_post_meta( $this->ID,'forma',$forma );
		return $forma;
	}
	public function imprimir_forma(){
		$forma =  $this->forma;

		if( !$forma ){ return; };

		$html = '';

		$html.= '<div class="clase_salon center-block edicion_de_forma">';
			$posicion = 1;
			foreach( $forma as $y => $fila ){
				/*FILA*/
				foreach( $fila as $x => $celda ){
					$html.= '<div class="bicicleta forma_'.$celda.'" data-celda="'.$celda.'" data-x="'.$x.'" data-y="'.$y.'">'.$posicion.'</div>';
					$posicion++;
				};
			};
			$html.= '<div class="profesor_salon"><div class="bicicleta centrado_vertical"><h2 class="elemento_centrado">Instructor</h2></div></div>';
		$html.= '</div>';

		return $html;
	}
	public function get_calendar( $ID = false, $inicio = false ){
		$args = array(
			'tipo'		=> 'back_end',
			'data_tipo'	=> $this->ID,
			'classe'	=> 'salon',
		);
		if( $ID ){
			$args['ID']	= $ID;
		};
		if( $inicio ){
			$args['fecha_inicio']	=  strtotime( date_i18n( 'Y-m-d' ) )+ dias( $inicio );
		};

		$calendario = new Calendario( $args );

		return $calendario;
	}
	public function crear( $ubicacion = false ){
		if( !$ubicacion ){ return; };
		$nuevo = crear( 'salon' );
		if( $nuevo ){
			update_post_meta( $nuevo,'ubicacion',$ubicacion );
		};
	}
	public function get_clases( $todas = true, $inicio = false, $fin = false, $especial = false ){
		$status = $todas ? array('future', 'publish') : array('future');
		$clases_format = array();

		$args = array(
			'post_type'			=> 'clase',
			'posts_per_page'	=> -1,
			'post_status'		=> $status,
			'meta_query'		=> array(
				array(
					'key'		=> 'salon',
					'value'		=> $this->ID,
					'compare'	=> '=',
				),
			),
			'order'				=> 'ASC',
			//'fields'			=> 'ids',
		);
		if( $inicio && $fin ){
			$args['date_query'] = array(
				array(
					'after'     =>  formateo_fecha( $inicio ),
					'before'    =>  formateo_fecha( $fin ),
					'inclusive' => true,
				),
			);
		};
		$clases = get_posts( $args );
		if( $especial ){
			return $clases;
		};
		if( $clases ){
			$clases_format = formateo_clases_cal( $clases );
		};
		return $clases_format;
	}
	public function actualizar_forma( $forma = false ){
		if( !$forma ){ return; };

		update_post_meta( $this->ID,'forma',$forma );
	}
	public function eliminar(){
		/*AÑADIR ELIMINACION DE SALONES*/
		$clases = $this->get_clases( false );
		if( $clases ){
			foreach( $clases as $clase ){
				$c = new Clase( $clase );
				$c->eliminar();
			};
		};
		eliminar( $this->ID );
	}
}
?>
