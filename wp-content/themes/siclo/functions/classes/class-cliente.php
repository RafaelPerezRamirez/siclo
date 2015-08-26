<?php

class Cliente{
	public $ID;

	public $nombre;
	public $timestamp;
	public $mail;
	public $nacimiento;

	public $total_clases;
	public $clases;

	function __construct( $id = 0 ){
		$this->ID			= $id;

		$this->timestamp    = get_the_date( 'Y-m-d H:i:s', $id );
		$usuario	= get_user_by('id', $this->ID);

		$this->nombre		= $usuario->display_name;
		$this->mail			= $usuario->user_email;
		$this->nacimiento	= get_user_meta( $this->ID, 'user_nacimiento',true );

		$this->clases		= numero_clases_user( $this->ID, true );
		$this->total_clases	= count( $this->clases );
	}
	public function get_array_data(){
		return get_object_vars( $this );
	}
}?>
