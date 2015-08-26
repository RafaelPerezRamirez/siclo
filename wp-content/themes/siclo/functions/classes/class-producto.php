<?php

class Producto{
	public $ID;
	public $timestamp;
	
	public $titulo;
	public $foto;
	public $precio;

	function __construct( $id = false ){
		if( !$id ){ return; };

		$this->ID = $id;
		$data = get_post_meta( $this->ID );
		$this->timestamp    = get_the_date( 'Y-m-d H:i:s', $this->ID );
		
		$this->titulo	= get_the_title( $this->ID );
		$this->foto		= isset( $data['informacion_imagen'] )	? _processed_value( reset( $data['informacion_imagen'] ), 'image_media' ) : false;
		$this->precio	= isset( $data['informacion_precio'] )	? reset( $data['informacion_precio'] ) : false;
	}
	public function get_array_data(){
		return get_object_vars( $this );
	}
};
