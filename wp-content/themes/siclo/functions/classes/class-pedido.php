<?php

class Pedido{
	public $ID;
	public $timestamp;
	public $comprador;
	public $transaccion;
	public $respuesta;
	public $productos;
	public $paquete;
	public $info_paquete;
	public $expiracion;

	function __construct( $id = false ){
		if( !$id ){ return; };
		$this->ID			= $id;
		$this->timestamp    = get_the_date( 'Y-m-d H:i:s', $id );

		$data = get_post_meta( $id );

		$this->comprador	= get_post_field('post_author',$this->ID);
		$this->transaccion	= isset( $data['transaccion'] )				? reset( $data['transaccion'] )				: false;
		$this->respuesta	= isset( $data['respuesta_transaccion'] )	? reset( $data['respuesta_transaccion'] )	: false;
		$this->paquete		= isset( $data['_paquete'] )				? reset( $data['_paquete'] )	: false;
		$this->info_paquete	= isset( $data['_info_paquete'] )			? unserialize( reset( $data['_info_paquete'] ) )	: false;
		$this->productos	= isset( $data['_productos'] )			? unserialize( reset( $data['_productos'] ) )	: false;
		$this->expiracion	= isset( $data['_expiracion'] )				? reset( $data['_expiracion'] )	: false;
	}
	public function get_array_data(){
		return get_object_vars( $this );
	}
	public function print_historial(  ){
		$paquete= $this->paquete != 'regalo' ? new Paquete( $this->paquete ) : new Paquete_regalo( $this->paquete, true );
		$data	= $paquete->data;
		$precio_unitario = (float)$data['cantidad'] != 0 ? (float)$data['precio'] / (float)$data['cantidad'] : 0;

		$texto_clases = (int)$data['cantidad'] > 1 ? 'CLASES' : 'CLASE';

		$cantidad	= $this->info_paquete ? $this->info_paquete->data['cantidad'] : $data['cantidad'];
		$precio		= $this->info_paquete ? $this->info_paquete->data['precio'] : $data['precio'];

		echo
		'<div class="up2 hcompra">
			<div class="row vertical-align">
				<div class="col-xs-3">
					<h5 class="color_negro cc text-center">'.$cantidad.'</h5>
					<small class="color_negro text-center center-block">'.$texto_clases.'</small>
				</div>
				<div class="col-xs-5">
					<small class="color_gris1">'.precio( $precio ).'</small>
					<br>
					<small class="color_gris2">'.$this->expiracion.'</small>
				</div>
				<div class="col-xs-4">';
					if( $this->paquete != 'regalo' ){
					echo '<a href="'.get_home_url().'/?go_to=compra_class&paquete_compra='.$this->paquete.'" class="btn azul2 bot3 color_blanco">RECOMPRAR</a>';
					};
		echo
				'</div>
			</div>
		</div>';
	}
};
?>
