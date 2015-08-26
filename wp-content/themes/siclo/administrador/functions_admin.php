<?php
global $admin,$letras,$roles;

$letras = array(
	'a' => '',
	'b' => '',
	'c' => '',
	'f' => '',
	'e' => '',
	'f' => '',
	'g' => '',
	'h' => '',
	'i' => '',
	'j' => '',
	'k' => '',
	'l' => '',
	'm' => '',
	'n' => '',
	'o' => '',
	'p' => '',
	'q' => '',
	'r' => '',
	's' => '',
	't' => '',
	'u' => '',
	'v' => '',
	'w' => '',
	'x' => '',
	'y' => '',
	'z' => '',
);
$roles = array(
	'0'	=> 'Cliente',
	'1'	=> 'Gafa',
	'2'	=> 'Administrador',
	'3'	=> 'FrontDesk',
	'4'	=> 'Instructor',
);




if( !function_exists('imagenes') ){
	function imagenes( $print = true ){
		$data = admin(false).'/assets/images';
		if( $print ){
			echo $data;
		}else{
			return $data;
		};
	};
};
require_once("class-admin.php");
require_once("classes/class-menu.php");
require_once("classes/analiticas/inicio.php");


$admin = new Admin();
if( !function_exists('get_role_name') ){
	function get_role_name( $rol = 0 ){
		global $roles;
		return isset( $roles[$rol] ) ? $roles[$rol] : false;
	};
};
if( !function_exists('iniciar_recipientes') ){
	function iniciar_recipientes(){
		require_once('recipientes.php');
	};
};
if( !function_exists('iniciar_recipientes') ){
	function iniciar_recipientes(){
		require_once('recipientes.php');
	};
};
if( !function_exists('print_single_option') ){
	function print_single_option( $id = false, $m = false, $print = true ){
		if( !$id || !$m ){ return; };
		$class		= isset($m['class'] )		? 'class=\''.$m['class'].'\'' : '';
		$accion		= isset($m['accion'] )		? 'data-accion=\''.json_encode( $m['accion'] ).'\'' : '';
		$recipiente	= isset($m['recipiente'] )	? 'data-recipiente=\''.$m['recipiente'].'\'' : '';
		$extra		= isset($m['extra'] )		? $m['extra'] : '';
		$data_info	= isset($m['data_info'] )	? 'data-info=\''.$m['data_info'].'\'' : '';
		
		$data = '<div '.$class.' data-id=\''.$id.'\' '.$accion.' '.$recipiente.' '.$data_info.'>'.$m['titulo'].$extra.'</div>';
		if( $print ){
			echo $data;
		}else{
			return $data;
		};
	};
};
if( !function_exists('editar_opcion') ){
	function editar_opcion( $data = false, $funcion = false, $tipo = false, $clase = '', $html = '', $id_post = '', $recipiente = 'panel_final' ){
		$text_action = '';
		
		if( $funcion ){
			$accion = array(
				'funcion'	=> $funcion,
				'attr'		=> $data,
			);
			if( $tipo ){
				$accion['tipo'] = $tipo;
			};
			$text_action = "data-accion='".json_encode( $accion )."'";
		};
		if( !$clase ){
			$clase = 'editar_elemento esconder_hijos';
		};
		if( $id_post ){
			$id_post = "data-id_post='".$id_post."'";
		};
		
		return "<span ".$id_post." ".$text_action." data-recipiente='".$recipiente."' class='".$clase."'>".$html."</span>";
	};
};
if( !function_exists('get_numero_bici') ){
	function get_numero_bici( $bici = false ){
		if( !$bici || !isset( $bici[0] ) || !isset( $bici[1] ) ){ return; };
		$y	= (int)$bici[0];
		$x	= (int)$bici[1];
		
		return ( $y+($x*11) )+1;/*BASE 11*/
	};
};
if( !function_exists('sistema_filtros') ){
	function sistema_filtros( $contenedores = array() ){
		if( !$contenedores ){ return; };
		?>
		<div class="sistema_filtros contenedor_altura">
        	<header class="cabecera restar_altura">
            	<div class="editor_option lupa_filtros"><img src="<?php imagenes();?>/lupa.png"/></div>
            	<div class="editor_option"><input type="text" placeholder="Buscador..." class="buscador_filtro"/></div>
            </header>
            <?php
			abecedario_filtro();
			foreach( $contenedores as $c ){
				echo '<div class="cont_scroll"><div id="'.$c.'" class="resultado_busqueda"></div></div>';
			};
			?>
        </div>
		<?php
	};
};
if( !function_exists('abecedario_filtro') ){
	function abecedario_filtro(  ){
		global $letras;
		echo '<div class="filtro_letras">';
			foreach( $letras as $l =>$data ){
				echo '<div data-letra="'.$l.'">'.$l.'</div>';
			};
		echo '</div>';
	};
};
if( !function_exists('informacion_letras') ){
	function informacion_letras( $letras = false, $multiple_data = false ){
		if( !$letras ){ return ''; };
		$html		= '';
		$script_data= array();
		
		foreach( $letras as $k => $data ){
			if( !$data ){ continue; };
			$html .= '<div class="division_letras" data-letra="'.$k.'">';
				$html .= '<div class="cabecera_letra"><span>'.$k.'</span></div>';
				$html .= $data;
			$html .= '</div>';
			
			$script_data[$k] = true;
		};
		/*SCRIPTS LETRAS*/
		
		$html.='<script type="text/javascript">habilitar_letras( '.json_encode( $script_data ).' );</script>';
		
		if( !$multiple_data ){
			return $html;
		}else{
			return array(
				'html'	=> $html,
				'data'	=> $script_data,
			);
		};
	};
};
function imprimir_colores(){
	global $colores;
	$html = '';
	$html .='<div class="dropdown drop_colores"><div class="cc_drop">';
		foreach( $colores as $n=>$color ){
			$html .='<div class="cont_circ"><span data-opcion="'.$n.'" class="'.$n.'"></span></div>';
		};
	$html .='</div></div>';
	return $html;
};
function imprimir_circulos(){
	$circulos = get_posts(array(
		'posts_per_page'	=> -1,
		'post_type'			=> 'circulo',
		'fields'			=> 'ids',
	));
	$html = '';
	$html .='<div class="dropdown drop_colores"><div class="cc_drop">';
		foreach( $circulos as $c ){
			$html .='<div data-opcion="'.$c.'" class="cont_circ"><img src="'.get('imagen_circulo',1,1,$c).'"/></div>';
		};
	$html .='</div></div>';
	return $html;
};
if( !function_exists('reservaciones_usuario') ){
	function reservaciones_usuario( $user_id = false ){
		if( !$user_id ){ return; };
		$html = '';
		
		/*IMPRIMIR RESERVACIONES--------------*/
		$reservas_pendientes= array();
		$reservas_pasadas	= array();
		
		$reservas = get_posts(array(
			'posts_per_page'	=> -1,
			'post_type'			=> 'reserva',
			'author'			=> $user_id,
			'post_status'		=> array('future','publish'),
		));
		if( $reservas ){
			foreach( $reservas as $reserva ){
				$r = new Reserva( $reserva->ID );
				if( $reserva->post_status == 'future' ){
					$reservas_pendientes[]	= $r->imprimir_historial_back(  );
				}else{
					$reservas_pasadas[]		= $r->imprimir_historial_back( false );
				};
			};
		};
		if( count( $reservas_pendientes ) ){
			$html .='<div class="upcoming_reservations">';
				$html .= '<h2>Próximas reservaciones</h2>';	
			$html .='</div>';
			foreach( $reservas_pendientes as $rp ){
				$html .= $rp;
			};
		};
		if( count( $reservas_pasadas ) ){
			$html .='<div class="upcoming_reservations past_reservations">';
				$html .= '<h2>Compras pasadas</h2>';
			$html .='</div>';
			foreach( $reservas_pasadas as $rpas ){
				$html .= $rpas;
			};
		};
		return '<div class="user_edit_create">'.$html.'</div>';
	};
};
if( !function_exists('reservaciones_instructor') ){
	function reservaciones_instructor( $id_instructor = false ) {
		if( !$id_instructor ){ return; };
		$instructor = new Instructor( $id_instructor );
		$html = '';
		//$html = header_secciones('Reservaciones');
		$html.= '<div class="instructor_incoming_calendar">';
			/*SETEAMOS LOS CALENDARIOS*/
			$calendario = new Calendario( array(
				'tipo'		=> 'back_end',
				'data_tipo'	=> $instructor->ID,
				'ID'		=> 'semana_1',
			));
			$calendario2 = new Calendario( array(
				'tipo'		=> 'back_end',
				'data_tipo'	=> $instructor->ID,
				'ID'		=> 'semana_2',
				'fecha_inicio'	=> strtotime( date_i18n( 'Y-m-d' ) )+ dias( 7 ),
			));
			$html.= '<div class="nueva_cabe_fer">';
				$html.= '<span class="titulo_fer_n">Reservaciones</span>';
				$html.= $calendario->imprimir_cabecera_back( 'semana_1', true );
				$html.= $calendario2->imprimir_cabecera_back( 'semana_1', true );
				
			$html.= '</div>';
			/*CABECERA DIAS-----*/
			$html .= $calendario->print_dias_reserva();
		$html.= '</div>';
		
		/*SEMANA 1*/
		$html .= '<div id="semana_1" class="calendario_back_end">';
			foreach( $instructor->get_clases() as $clase ){
				$html.= $clase->imprimir_reservaciones();
			}
		$html.= '</div>';
		/*SEMANA 2*/
		$html .= '<div id="semana_2" class="calendario_back_end escondido">';
			foreach( $instructor->get_clases( strtotime( date_i18n( 'Y-m-d' ) )+dias(7) ) as $clase ){
				$html.= $clase->imprimir_reservaciones();
			}
		$html.= '</div>';
		return $html;
	};
};
if( !function_exists('reservaciones_salon') ){
	function reservaciones_salon( $id_salon = false ) {
		if( !$id_salon ){ return; };
		$salon	= new Salon( $id_salon );
		
		$html= '<div class="instructor_incoming_calendar">';
			/*SETEAMOS LOS CALENDARIOS*/
			$calendario = new Calendario( array(
				'tipo'		=> 'back_end',
				'data_tipo'	=> $salon->ID,
				'ID'		=> 'semana_1',
			));
			$calendario2 = new Calendario( array(
				'tipo'		=> 'back_end',
				'data_tipo'	=> $salon->ID,
				'ID'		=> 'semana_2',
				'fecha_inicio'	=> strtotime( date_i18n( 'Y-m-d' ) )+ dias( 7 ),
			));
			$html.= '<div class="nueva_cabe_fer">';
				$html.= '<span class="titulo_fer_n">Reservaciones</span>';
				$html.= $calendario->imprimir_cabecera_back( 'semana_1', true );
				$html.= $calendario2->imprimir_cabecera_back( 'semana_1', true );
			$html.= '</div>';
			
			/*CABECERA DIAS-----*/
			$html .= $calendario->print_dias_reserva();
		$html.= '</div>';
		
		/*SEMANA 1*/
		$html .= '<div id="semana_1" class="calendario_back_end">';
			foreach( $salon->get_clases( true, strtotime( date_i18n( 'Y-m-d' ) ), strtotime( date_i18n( 'Y-m-d' ) )+dias(7), true ) as $clase ){
				$c = new Clase( $clase->ID );
				$html.= $c->imprimir_reservaciones();
			}
		$html.= '</div>';
		/*SEMANA 2*/
		$html .= '<div id="semana_2" class="calendario_back_end escondido">';
			foreach( $salon->get_clases( true, strtotime( date_i18n( 'Y-m-d' ) )+dias(8), strtotime( date_i18n( 'Y-m-d' ) )+dias(15), true ) as $clase ){
					$c = new Clase( $clase->ID );
					$html.= $c->imprimir_reservaciones();
			}
		$html.= '</div>';
		
		return $html;
	};
};
function header_secciones( $text = false, $id_el = false, $texto_boton = 'Confirmar Cambios' ){
	if( !$text ){ return; };
	
	
	$extra = $id_el ? '<div id="'.$id_el.'" class="boton v_oscuro confirmar_cambios_sec">'.$texto_boton.'</div>' : '';
	
	return '<header class="header_mapa_backend cabecera_general_final"><div class="titulos_mapa_cal"><h2>'.$text.'</h2></div>'.$extra.'</header>';
}
function add_media_upload_scripts() {
	if ( is_admin() ) { return; };
	wp_enqueue_media();
}
add_action('wp_enqueue_scripts', 'add_media_upload_scripts');
require_once("ajax.php");
?>