<?php

class Entrada{
	public $ID;
	public $fecha;
	
	public $titulo;
	public $texto;
	public $subtitulo;
	public $link_externo;
	public $img;
	
	function __construct( $id = 0 ){
		$data = get_post_meta( $id );
		
		$this->ID			= $id;
		$this->fecha		= strtotime( get_post_field('post_date', $this->ID) );
		
		$this->titulo		= get_the_title( $this->ID );
		$this->texto		= apply_filters('the_content', get_post_field('post_content', $this->ID));
		$this->subtitulo	= isset( $data['informacion_subtitulo'] )	? reset( $data['informacion_subtitulo'] ) : false;
		$this->link_externo	= isset( $data['informacion_link'] )		? reset( $data['informacion_link'] ) : false;
		$this->img			= isset( $data['informacion_imagen'] )		? _processed_value( reset( $data['informacion_imagen'] ) , 'image_media') : false;
	}
	public function imprimir_loop(){
		echo 
		'<div class="row article">
			<div class="col-md-2">
				<img src="'.$this->img.'" class="center-block img-responsive">
			</div>
			<div class="col-md-10">
				<span class="large">'.$this->titulo.'</span>
				<div class="medium">'.$this->subtitulo.'</div>
				<small color_gris1>'.date_i18n('d \d\e F Y', $this->fecha).'</small>
				<br>
				<p class="medium text-right"><small><a href="#"><span><img src="'.plantilla(false).'/images/tip1.jpg"></span>Leer articulo completo</a></small></p>
				<img src="'.plantilla(false).'/images/barra.jpg" class="center-block img-responsive">
				<br>
				<div class="color_gris2 small cont_entrada">'.$this->texto.'</div>
			</div>
		</div>
		<hr>';
	}
}
?>
