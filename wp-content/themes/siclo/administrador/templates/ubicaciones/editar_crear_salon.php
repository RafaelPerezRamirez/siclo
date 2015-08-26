<?php
global $admin;
$ubicacion = new Ubicacion( $id_ubicacion );

$html .='<div class="editor" data-id_post="'.$ubicacion->ID.'">';


	/*CABECERA--------------------------------------------------------------------------------------*/
	$html .='<div class="cabecera_editor cabecera_edit_salon">';
		if( $admin->permisos('Gafa') ){
			$html .='<div class="eliminar_ubicacion eliminar_post no_color" data-id_post="'.$ubicacion->ID.'"><img class="img_eliminar_salon" src="'.imagenes(false).'/eliminar.png"/></div>';
		};
		/*COLOR PRIMARIO-----------------------*/
		$html .='<div class="titulo_cabecera cab_salon">Selecciona el color principal &gt;</div>';
		$html .='<div id="color_principal" class="selector_editor no_color">';
			$html .='<div data-name="colores[fondo]" data-value="'.$ubicacion->colores['fondo'].'" class="caja_muestra '.$ubicacion->colores['fondo'].'"></div>';
			$html .= imprimir_colores();
		$html .='</div>';
		
		/*COLOR SECUNDARIO-------------------*/
		$html .='<div class="titulo_cabecera cab_salon">Selecciona el color secundario &gt;</div>';
		$html .='<div id="color_secundario" class="selector_editor no_color">';
			$html .='<div data-name="colores[boton]"  data-value="'.$ubicacion->colores['boton'].'" class="caja_muestra '.$ubicacion->colores['boton'].'"></div>';
			$html .= imprimir_colores();
		$html .='</div>';
		
		/*CIRCULO------------*/
		$html .='<div class="titulo_cabecera cab_salon">Selecciona el círculo &gt;</div>';
		$html .='<div id="circulo" class="selector_editor no_color">';
			$html .='<div data-name="colores[fondo_boton]" data-value="'.$ubicacion->colores['fondo_boton'].'" class="caja_muestra"><img src="'.get('imagen_circulo',1,1,$ubicacion->colores['fondo_boton']).'"/></div>';
			$html .= imprimir_circulos();
		$html .='</div>';
		
		/*GUARDAR--------------*/
		$html.= '<div id="guardar_ubicacion" class="guardar_informacion cab_salon">Guardar</div>';
	$html .='</div>';

	/*CUERPO----------------------------------------------------------------------------------------------*/
	$html.='<div class="b_i">';
		$html.='<input type="text" name="nombre" placeholder="Nombre completo" value="'.$ubicacion->nombre.'"/>';
		$html.='<input type="text" name="direccion" placeholder="Dirección" value="'.$ubicacion->direccion.'"/>';
		$html.='<input type="tel" name="telefono" placeholder="Teléfono" value="'.$ubicacion->telefono.'"/>';
		$html.='<input type="email" name="mail_contacto" placeholder="Mail" value="'.$ubicacion->mail_contacto.'"/>';
	$html.='</div>';
	$html.='<div class="b_d">';
		$html.='<div class="b_d_i">';
			$html.='<p class="b_d-title">imagenes</p>';
			$html.='<p class="b_d-desc">Foto principal home de ubicaciones.<br/>Tamaño: 900 x 500</p>';
			$style_foto = $ubicacion->foto !== '' ? 'style="background-image:url('.$ubicacion->foto.')"' : '';
			$html.='<div class="b_d-attach" id="foto_principal" data-name="foto_principal" data-value="'.$ubicacion->foto.'" '.$style_foto.'></div>';
		$html.='</div>';
		$html.='<div class="b_d_d">';
			$html.='<p class="b_d-desc b_d_d-desc">Adjunta los archivos de 700 x 400 px con máximo de 800k de peso.</p>';
			foreach( $ubicacion->galeria as $k=>$galeria ){
				$style_foto = $galeria !== '' ? 'style="background-image:url('.$galeria.')"' : '';
				$html.='<div id="galeria_ub_'.$k.'" data-name="galeria[]" data-value="'.$galeria.'" class="b_d-attach" '.$style_foto.'></div>';
			};
		$html.='</div>';
	$html.='</div>';
	$html.='<div class="editor_texto">';
		$html.='<div class="cabecera">';
			$html.='<div class="editor_option subrayar">';
				$html.='<img src="'.imagenes(false).'/subrayar.png" />';
			$html.='</div>';
			$html.='<div class="editor_option tachar">';
				$html.='<img src="'.imagenes(false).'/tachar.png" />';
			$html.='</div>';
			$html.='<div class="editor_option negrita">';
				$html.='<img src="'.imagenes(false).'/upercase.png" />';
			$html.='</div>';
			/*$html.='<div class="editor_option">';
				$html.='<img src="'.imagenes(false).'/subrayar.png" />';
			$html.='</div>';*/
		$html.='</div>';
	$html.='</div>';
	$html.='<textarea class="gre" name="descripcion" placeholder="Escribe la descripcion de este estudio con un maximo de 500 caracteres">'.$ubicacion->descripcion.'</textarea>';
	
	
$html .= '</div>';
$html .= '<script type="text/javascript">$(".gre").gre({
	content_css_url	: "'.admin(false).'/assets/js/gre/editor.css",
	width			: "100%",
});$("iframe.gre").width("100%");</script>';
?>
