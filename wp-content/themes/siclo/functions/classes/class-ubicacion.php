<?php

class Ubicacion{
	public $ID;
	public $timestamp;
	public $permalink;
	public $nombre;
	public $descripcion;
	public $foto;
	public $galeria;
	public $direccion;
	public $telefono;
	public $mail_contacto;
	public $colores;

	function __construct( $id = false ){
		$data = get_post_meta( $id );

		$this->ID			= $id;
		$this->timestamp    = get_the_date( 'Y-m-d H:i:s', $id );
		$this->nombre		= get_the_title( $this->ID );
		$this->foto			= isset( $data['foto_principal'] ) ? reset( $data['foto_principal'] ) : false;
		$this->permalink	= get_permalink( $this->ID );
		$this->descripcion	= isset( $data['descripcion'] ) ? reset( $data['descripcion'] ) : false;
		$this->colores		= isset( $data['colores'] ) ? unserialize( reset( $data['colores'] ) ) : array(
			'fondo'		=> 'r_claro',
			'boton'		=> 'a_claro',
			'fondo_boton'	=> reset( get_posts(array(
				'posts_per_page'	=> 1,
				'fields'		=> 'ids',
				'post_type'		=> 'circulo',
			))),
		);
		$this->galeria		= isset( $data['galeria'] ) ? unserialize( reset( $data['galeria'] ) ) : array( '','','','' );
		$this->direccion	= isset( $data['direccion'] ) ? reset( $data['direccion'] ) : false;
		$this->telefono		= isset( $data['telefono'] ) ? reset( $data['telefono'] ) : false;
		$this->mail_contacto= isset( $data['mail_contacto'] ) ? reset( $data['mail_contacto'] ) : false;
	}
	public function get_array_data(){
		return get_object_vars( $this );
	}
	public function get_foto(){
		if( !$this->foto ){ return; };
		return '<img class="foto_ubicacion" src="'.$this->foto.'"/>';
	}
	public function get_galeria(){
		$galeria= array();
		$html	= '';
		foreach( $this->galeria as $g ){
			if( $g !== '' ){
				$galeria[] = $g;
			};
		};
		if( !count( $galeria ) ){ return; };

		if( 2 === 2 /*count( $galeria ) === 1*/ ){
			$html = '<img class="foto_ubicacion" src="'.reset( $galeria ).'"/>';
		}else{
			foreach( $galeria as $k=>$g ){
				if( $k == 0 ){
					$html .= '<marquee behavior="scroll" direction="left" scrollamount="30" class="foto_ubicacion">';
				}else{
					$html .= '<img src="'.$g.'"/>';
				};
			};
			$html .= '</marquee>';
		};
		return $html;
	}
	public function ub_en_menu(){
		/*SI HAY DEFAULT LE ASIGNAMOS OTRA CLASE :)*/
		$clases = array( 'en_menu', 'color_'.$this->colores['boton'], 'selected_ub', $this->colores['fondo'] );
		$string = '<div class="'.implode(' ',$clases).'" data-id_menu="'.$this->ID.'"><div class="'.$this->colores['fondo'].'">'.$this->nombre.'</div></div>';
		return $string;
	}
	public function imprimir_loop( $como_titulo = false ){
			$fondo_boton = isset( $this->colores['fondo_boton'] ) ? get('imagen_circulo',1,1,$this->colores['fondo_boton']) : plantilla(false).'/eliminar/instructores/circulo_ubi.png';
			$clases = $como_titulo ? 'ubicacion como_titulo color_'.$this->colores['boton'] : 'ubicacion color_'.$this->colores['boton'];

			echo '<article class="'.$clases.'" data-ub="'.$this->ID.'">';
				echo '<div class="marco centrado_vertical" style="background-image: url('.$this->foto.');"><div class="elemento_centrado">';

					echo $this->ub_en_menu();

					echo '<div class="info_ubi_loop">';
						echo '<h1>'.$this->nombre.'</h1>';
						echo '<address>'.$this->direccion.'<br/>Tel: <a href="tel:'.$this->telefono.'">'.$this->telefono.'</a></address>';
					echo '</div>';
					echo '<div class="botones_ub_ind">';
						if( $this->get_clases() ){
							echo '<a class="circulo '.$this->colores['boton'].'" href="'.get_permalink( CALENDARIO ).'?ub='.$this->ID.'">Reservar</a>';
						};
						echo '<a class="circulo more_info" href="'.$this->permalink.'" style="background-image:url('.$fondo_boton.')">info</a>';
					echo '</div>';
				echo '</div></div>';
			echo '</article>';
	}
	public function imprimir_single(){?>
		<div class="ubicacion">
			<div class="ubic_item1">
				<img class="img-responsive" src="<?php plantilla(); ?>/images/bicis.jpg" alt="bicis">
			</div><!--
		--><div class="ubic_item2">
				<div class="title_info"><big><?= $this->nombre?></big></div>
				<div class="ubi_info">
					<div class="info_down">
						<?=
						'<span class="info_lugar"><span class="icon_info"><img src="'.plantilla(false).'/images/iconos/mail.png"></span><span class="medium info_dato"> <a href="mailto:'.$this->mail_contacto.'">'. $this->mail_contacto.'</a></span></span>'.
						'<span class="info_lugar"><span class="icon_info"><img src="'.plantilla(false).'/images/iconos/phon.png"></span><span class="medium info_dato"> <a href="tel:'.$this->telefono.'">'.$this->telefono.'</a></span></span>';?>
					</div>
					<div class="info_down">
						<hr class="hr_info">
					</div>
					<div class="info_down">
						<div class="info_lugar inlinfo inlinfo1">
							<span class="icon_info"><img src="<?php plantilla(); ?>/images/iconos/mark.png"></span>
						</div><!--
					--><div class="medium inlinfo inlinfo2"> <?= $this->direccion;?></div>
					</div>
                    <div id="id_para_maps" class="mapa_info"></div>
                    <?php $this->script_map();?>
				</div>
			</div>
		</div>
		<?php
	}
	private function script_map(){
		if( !$this->direccion ){ return; };?>
		<script type="text/javascript" async>
			function iniciar_mapa(){
				/*CREAMOS MAPA*/
				var mapOptions = {
					zoom: 15,
					zoomControl: false,/*
					streetViewControl: false,
					panControl: true,*/
					backgroundColor: '#d9d9d9',
					/*mapMaker : false,*/
				};
				//mapOptions.center = new google.maps.LatLng("46.5588603", "0");
				var map = new google.maps.Map(document.getElementById( "id_para_maps") , mapOptions );

				/*CODIFICAMOS DIRECCION*/
				var geocoder = new google.maps.Geocoder();
				var sAddress = "<?= $this->direccion;?>";

				geocoder.geocode( { "address": sAddress}, function(results, status) {
					if( status == google.maps.GeocoderStatus.OK ){
						var resultado = results[0].geometry.location;

						console.log( resultado );

						centrado = new google.maps.LatLng(resultado.A, resultado.F);

						var marker = new google.maps.Marker({
							position: centrado,
							map: map,
							title: "<?= $this->nombre;?>"
						});
						map.setCenter( centrado );
					}else{
						alert("","conexion");
					};
				});
			};
			iniciar_mapa();
        </script>
        <?php
	}
	public function print_info_calendar(){
		$fondo_boton = isset( $this->colores['fondo_boton'] ) ? get('imagen_circulo',1,1,$this->colores['fondo_boton']) : plantilla(false).'/eliminar/instructores/circulo_ubi.png';

		echo '<h2 class="print_info_calendar">';
			echo $this->nombre;
			echo '<a class="circulo more_info" href="'.$this->permalink.'" style="background-image:url('.$fondo_boton.')">info</a>';
		echo '</h2>';
	}
	public function get_calendar( $fecha_inicio = false ){
		$args = array(
			'tipo' => 'front_end',
			'data_tipo' => $this->ID,
		);
		if( $fecha_inicio ){
			$args['fecha_inicio'] = $fecha_inicio;
		};
		$calendario = new Calendario( $args );

		return $calendario;
	}
	public function get_salones( $inicio = false, $fin = false ){
		return get_posts(array(
			'post_type'			=> 'salon',
			'posts_per_page'	=> -1,
			'meta_query'		=> array(
				array(
					'key'		=> 'ubicacion',
					'value'		=> $this->ID,
					'compare'	=> '=',
				),
			),
			'fields'		=> 'ids',
		));
	}
	public function get_clases( $inicio = false, $fin = false, $todas = true, $analitica = false ){
		$clases_format	= array();
		$status			= $todas ? array('future','publish') : 'future';

		$inicio	= $inicio	? $inicio	: strtotime( date_i18n( 'Y-m-d' ) );
		$fin	= $fin		? $fin		: $inicio+ dias(7);

		$salones = $this->get_salones();
		if( $salones ){
			$args = array(
				'post_type'			=> 'clase',
				'posts_per_page'	=> -1,
				'date_query' => array(
					array(
						'after'     =>  formateo_fecha( $inicio ),
						'before'    =>  formateo_fecha( $fin ),
						'inclusive' => true,
					),
				),
				'post_status'		=> $status,
				'meta_query'		=> array(
					array(
						'key'		=> 'salon',
						'value'		=> $salones,
						'compare'	=> 'IN',
					),
				),
			);
			if( $analitica ){
				$args['order'] = 'ASC';
			};
			$clases = get_posts( $args );
			$clases_format = formateo_clases_cal( $clases, $analitica );
		};

		return $clases_format;
	}
	public function crear(){
		return crear( 'ubicacion' );
	}
	public function actualizar_data( $formateo_data = false ){
		if( !$formateo_data || !isset( $formateo_data['ID'] ) || !$formateo_data['ID'] ){ return 'No hay información en la consulta'; };

		foreach( $formateo_data as $k =>$data ){
			if( $k === 'nombre' ){
				/*NOMBRE*/
				actualizar_nombre( $this->ID , $data );
			}else{
				/*EXTRAS*/
				update_post_meta( $this->ID,$k,$data );
			};
		};


		return 'ok';
	}
	public function eliminar(){
		/*AÑADIR ELIMINACION DE SALONES*/
		$salones = $this->get_salones();
		if( $salones ){
			foreach( $salones as $salon ){
				$s = new Salon( $salon );
				$s->eliminar();
			};
		};
		eliminar( $this->ID );
	}
};
?>
