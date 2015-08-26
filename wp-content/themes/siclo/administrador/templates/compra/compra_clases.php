<?php
$cliente = new Cliente( $id_user );
$paquetes = imprimir_paquetes( false,false,$id_user );
$productos = get_productos();
$tarjetas = get_tarjetas( $id_user );
$conekta = new Pago_Conekta();
	
/*SI NO HAY PAQUETES NOS VAMOS*/
if( !$paquetes ){ return; };

$html.= '<div id="editor_compras" class="editor" data-cliente="'.$cliente->ID.'">';
	/*CABECERA*/
	$html .='<div class="cabecera_editor cabecera_edit_user"></div>';
	$html.= '<div id="finalizar_compra_checkout">';
		$html.= '<div class="contenedorbloque1compras">';
			$html.= '<div id="cont_compra_paquetes" class="columna_compra tipo_tarjeta">';
				$html.= '<div class="upcoming_reservations"><h2>Selecciona el paquete que deseas comprar</h2></div>';
				if( $paquetes ){
					foreach( $paquetes as $paquete ){
						$data = $paquete->data;
						
						$html.= 
						'<div class="paquete_compra paquete" data-idpaquete="'.$paquete->id.'" data-precio="'.$data['precio'].'">'.
							'<span class="p_c_cantidad">'.$data['cantidad'].'</span>'.
							'<span class="color_gris pa_chico chico_especial">clases</span><br/>'.
							'<span class="p_c_precio pa_chico">'.precio( $data['precio'] ).'</span>'.
							'<span class="pa_chico color_gris">Exp: '.$paquete->fecha_expiracion( $data['expiracion'] ).'</span>'.
						'</div>';
					};
					unset( $data );
				};
			$html.= '</div>';
			$html.= '<div class="bloque_para_finalizar tipo_tarjeta" style="display:none;">';
				$html.= 
				'<div class="upcoming_reservations"><h2>Resumen de compra</h2></div>'.
				'<div id="subtotales_compra" class="tipo_tarjeta">'.
					'<div id="resumen_compra" class="color_gris"></div>'.
					'<div class="subtotal_compra color_gris"><strong>Subtotal:</strong><span class="precio"></span></div>'.
				'</div>';
				
				$html.= '<div class="upcoming_reservations"><h2>Seleccione la tarjeta con la cual desea realizar la compra</h2></div>';
				$html.= '<div class="columna_general tipo_tarjeta">';
					$html.= '<div class="cont_tarjetas_info tarjetas_user">';
						$html.= html_tarjetas( $tarjetas, false, true );
					$html .='</div>';
					$html.= $conekta->html_annadir_tarjeta( true, true, false );
					$html.= '<div id="finalizar_compra_back" class="boton">Finalizar compra</div>';
				$html .='</div>';
			$html .='</div>';
		$html .='</div>';	
		$html.= '<div id="cont_compra_productos" class="columna_compra tipo_tarjeta">';
			$html.= '<div class="upcoming_reservations"><h2>Selecciona los productos que desees añadir al carro</h2></div>';
			if( $productos ){
				foreach( $productos as $producto ){
					$html.= 
					'<div class="producto_compra color_gris" data-idproducto="'.$producto->ID.'" data-precio="'.$producto->precio.'">'.
						'<span class="c_pp_imagen"><span class="p_p_imagen"><img src="'.$producto->foto.'"/></span></span>'.
						'<span class="p_p_titulo">'.$producto->titulo.'</span>'.
						'<span class="p_p_precio">'.precio( $producto->precio ).'</span>'.
						'<input class="producto_cantidad" type="number" placeholder="0" value=""/>'.
					'</div>';
				};
			};
		$html.= '</div>';
$html .='</div>';
	$html .='</div>';