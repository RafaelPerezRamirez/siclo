<?php

class Logo_prensa{
	public $ID;
	public $link;
	public $img;
	
	function __construct( $id = 0 ){
		$data = get_post_meta( $id );
		
		$this->ID			= $id;
		$this->link	= isset( $data['informacion_link'] )? reset( $data['informacion_link'] ) : false;
		$this->img	= isset( $data['informacion_logo'] )? _processed_value( reset( $data['informacion_logo'] ) , 'image_media') : false;
	}
	public function imprimir_loop(){
		echo 
		'<a href="'.$this->link.'" class="logo_prensa"><img src="'.$this->img.'"/></a>';
	}
}
?>
