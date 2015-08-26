<?php
global $logos_web,$colores,$nuevos_colores;

add_theme_support( 'title-tag' );
/*IDS WEBS*/
define('COMPRAR_CLASES',4);
define('CUENTA_USUARIO',7);
define('INVITA',10);
define('CHECKOUT',13);
define('THANKYOU',22);
define('CALENDARIO',40);
define('ADMINISTRADOR',84);
define('FAQS',93);
define('TERMINOS',97);
define('POLITICAS',99);
define('PRENSA',763);
if( DESARROLLO ){
	define('QUIENES_SOMOS',1217);
}else{
	define('QUIENES_SOMOS',1690);
};

$logos_web = array(
	CUENTA_USUARIO	=> 'logo_wb.png',
	INVITA			=> 'logo_nw.png',
	CHECKOUT		=> 'logo_v_w.png',
	THANKYOU		=> 'logo_a_w.png',
	CALENDARIO		=> 'logo_nw.png',
	FAQS			=> 'logo_wb.png',
	TERMINOS		=> 'logo_wb.png',
	POLITICAS		=> 'logo_wb.png',
	ADMINISTRADOR	=> 'logo_admin.png',
	'instructor'	=> 'logo_w_r.png',
	'ubicacion'		=> 'logo_vc_w.png',
	'clase'			=> 'logo_vc_w.png',
	'cron_gift_card'=> 'logo_v_w.png',
);
/*COLORES*/
define('V_OSCURO','#20d747');
define('V_CLARO','#cdff00');
define('AMARILLO','#ffdc4a');/*?*/
define('N_CLARO','#FFB000');
define('N_OSCURO','#ff1700');
define('ROJO','#ff1700');
define('R_CLARO','#ff7aab');
define('R_OSCURO','#ff00b6');
define('VIOLETA','#0037F4');
define('A_OSCURO','#0037F4');
define('A_CLARO','#3ea8f4');
define('BLACK','#000000');
define('GRIS','#898989');
define('GRIS_C','#f0f0f0');
define('GRIS_C2','#d7dada');
define('GRIS_O','#201c09');
define('GRIS_F','#9b9b9b');


/*NUEVOS COLORES--------------------*/
/*
GUARDAMOS LOS COLORES ORIGINALES, ABAJO CAMBIARAN
define('ROSA_NUEVO','rgb(255, 0, 183)');
define('ROJO_NUEVO','rgb(255,24,0)');
define('AZUL_NUEVO','rgb(44, 44, 255)');
define('AMARILLO_NUEVO','rgb(255, 222, 0)');
define('VERDE_NUEVO','rgb(33, 216, 72)');
define('VERDE2_NUEVO','rgb(206,255,0)');//CLARO
define('NARANJA_NUEVO','rgb(255, 147, 30)');
define('VIOLETA_NUEVO','rgb(118, 0, 255)');
define('AZUL2_NUEVO','rgb(63,169,245)');//CLARO
define('NEGRO_NUEVO','#000000');
define('BLANCO_NUEVO','white');
define('GRIS1_NUEVO','rgb(102, 102, 102)');
define('GRIS2_NUEVO','#bababa');
define('GRIS3_NUEVO','#efefef');
define('GRIS4_NUEVO','#faf9f9');
*/

define('ROSA_NUEVO','rgb(255, 0, 183)');
define('ROJO_NUEVO','rgb(255,24,0)');
define('AZUL_NUEVO','rgb(63,169,245)');
define('AMARILLO_NUEVO','rgb(255, 222, 0)');
define('VERDE_NUEVO','rgb(33, 216, 72)');
define('VERDE2_NUEVO','rgb(206,255,0)');/*CLARO*/
define('NARANJA_NUEVO','rgb(255, 147, 30)');
define('VIOLETA_NUEVO','rgb(118, 0, 255)');
define('AZUL2_NUEVO','rgb(63,169,245)');/*CLARO*/
define('NEGRO_NUEVO','#000000');
define('BLANCO_NUEVO','white');
define('GRIS1_NUEVO','rgb(102, 102, 102)');
define('GRIS2_NUEVO','#bababa');
define('GRIS3_NUEVO','#efefef');
define('GRIS4_NUEVO','#faf9f9');

/*ID PRIMER PAQUETE*/
define('PRIMER_PAQUETE',277);
define('PARK_PLAZA',38);
$nuevos_colores = array(
	'azul'		=> AZUL_NUEVO,
	'azul2'		=> AZUL2_NUEVO,
	'rojo'		=> ROJO_NUEVO,
	'verde'		=> VERDE_NUEVO,
	'verde2'	=> VERDE2_NUEVO,
	'naranja'	=> NARANJA_NUEVO,
	'violeta'	=> VIOLETA_NUEVO,
	'rosa'		=> ROSA_NUEVO,
	'negro'		=> NEGRO_NUEVO,
	'blanco'	=> BLANCO_NUEVO,
	'amarillo'	=> AMARILLO_NUEVO,
	'gris1'		=> GRIS1_NUEVO,
	'gris2'		=> GRIS2_NUEVO,
	'gris3'		=> GRIS3_NUEVO,
	'gris4'		=> GRIS4_NUEVO,
);
/*ESTE ARRAY DE ABAJO ES PARA EL BACK*/
$colores = array(
	'v_oscuro'	=> VERDE2_NUEVO,
	'v_claro'	=> VERDE_NUEVO,
	'amarillo'	=> AMARILLO_NUEVO,
	'n_claro'	=> N_CLARO,
	'n_oscuro'	=> NARANJA_NUEVO,
	'rojo'		=> ROJO_NUEVO,
	'r_claro'	=> ROSA_NUEVO,
	'r_oscuro'	=> ROSA_NUEVO,
	'violeta'	=> VIOLETA_NUEVO,
	'a_oscuro'	=> AZUL2_NUEVO,
	'a_claro'	=> AZUL_NUEVO,
	'black'		=> NEGRO_NUEVO,
	'gris'		=> GRIS,
	'gris_c'	=> GRIS_C,
	'gris_c2'	=> GRIS_C2,
	'gris_o'	=> GRIS_O,
);

/*TAMAÑOS TIPOGRAFICOS*/
define('SMALL','13px');
define('MEDIUM','15px');
define('LARGE','18px');
define('BIG','72px');

if( is_admin() ){
	//header("Location: ".get_home_url());
};

require_once( "functions/inicio.php" );


if( !function_exists('menu_web') ){
	function menu_web(){
		if( is_page( ADMINISTRADOR ) ){ return; };
		menu_lateral();
		$cintillo = cintillo_menu();
		
		$clases_menu = $cintillo ? ' con_citillo' : '';
		?>
            <nav class="navbar navbar-default navbar-fixed-top<?php echo $clases_menu;?>" role="navigation">
                <div class="container">
                    <div class="navbar-header page-scroll">
                    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    		<img src="<?php plantilla()?>/images/iconos/button.png" class="iconmenu">
		                    <span class="sr-only">Toggle navigation</span>
		                </button>
                        <div class="spam"><a href="<?php echo get_home_url();?>"><img src="<?php plantilla()?>/images/logo.png" class="img-responsive logo"></a></div>
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav navbar-right uno">
                            <li>
                                <div class="row icons"><?php compartir_web();?></div>
                            </li>
                            <li class="spot">
                            	
                            </li>
                            <li class="letram">
                                <a href="<?php echo get_home_url();?>/?go_to=compra_class" data-go="compra_class" class="page-scroll color_gris1 scrolling"><small>COMPRAR CLASES</small></a>
                            </li>
                            <li class="letram">
                                <a href="<?php echo get_home_url();?>/?go_to=reserva" data-go="reserva" class="page-scroll color_gris1"><small>RESERVAR</small></a>
                            </li>
                            <li>
                            	<?php menu_usuario();?>
                            </li>
                            <li class="indexfront">
                                <div class="up"><img src="<?php plantilla()?>/images/iconos/button.png"></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php 
				menuabierto();
				echo $cintillo;
				?>
            </nav>
        <?php
	};
};
function cintillo_menu(){
	global $current_user;
	$identificador = "verano";
	$cupon = new Cupon( $identificador );
	
	if( ( is_user_logged_in() && $cupon->check_limite_por_usuario( $current_user->ID ) ) || !is_user_logged_in() ){
		return '<div class="cintillo_menu small azul2"><strong>¡Verano en ruedas!</strong> Con el código <span>'.$identificador.'</span><br/> te regalamos $'.$cupon->get_descuento().' pesos.</div>';
	}else{
		return '<div class="cintillo_menu small azul2">Por cada 5 amigos que invites y usen tu código te regalamos una clase: <span class="color_negro">'.get_codigo( $current_user->ID ).'</span></div>';
	};
}
if( !function_exists('logo_web') ){
	function logo_web(){
		global $post,$logos_web;
		$link = '/eliminar/logos/logo_home.png';
		
		if( is_page() && isset( $logos_web[$post->ID] ) ){
			/*PÁGINAS*/
			$link = '/eliminar/logos/'.$logos_web[$post->ID];
		}elseif( is_archive() ){
			if( is_post_type_archive( 'instructor' ) ){
				$link = '/eliminar/logos/'.$logos_web['instructor'];
			}elseif( is_post_type_archive( 'ubicacion' ) ){
				$link = '/eliminar/logos/'.$logos_web['ubicacion'];
			};
		}elseif( is_single() && isset( $logos_web[get_post_type( $post->ID )] ) ){
			$link = '/eliminar/logos/'.$logos_web[get_post_type( $post->ID )];
		};
		
		echo '<img id="logo" src="'.plantilla( false ).$link.'" width="120" height="43" data-link="'.get_home_url().'"/>';
	};
};
if( !function_exists('compartir_web') ){
	function compartir_web(){
		$opciones = get_redes();
		foreach( $opciones as $k => $o ){
			echo $o === '' ? '<a style="display:none;"></a>' : '<div class="cont_red"><a href="'.$o.'" class="redes_menu red_'.$k.'" target="_blank"></a></div>';
		};
	};
};
function redes_menu_abierto(){
		$opciones = get_redes();
		foreach( $opciones as $k => $o ){
			echo $o === '' ? '' : '<a href="'.$o.'" class="redes_menu red_'.$k.'" target="_blank"></a>';
		};
};
if( !function_exists('get_redes') ){
	function get_redes(){
		$opciones = get_option('redes_sociales');
		
		if( !$opciones ){
			$opciones = array();
		};
		return $opciones;
	};
};
if( !function_exists('menu_usuario') ){
	function menu_usuario(){
		global $current_user;
		$tag		= is_page( CUENTA_USUARIO ) && is_user_logged_in() ? 'div' : 'a';
		$c			= numero_clases_user();
		$text_user	= is_user_logged_in() ? 'HOLA! '.$current_user->display_name	: 'Login / Registrar';
		
		echo 
		'<li class="indexfront">'.
			'<div class="row icons2">'.
				'<div class="col-xs-4" data-hoverinfo="Nuestro video">'.
					'<a id="ver_video" href><img src="'.plantilla(false).'/images/iconos/cam.png" ></a>'.
				'</div>'.
				'<div class="col-xs-4 hover_cuenta_ajax" data-hoverinfo="'.$text_user.'">'.
					'<'.$tag.' id="menu_user" class="boton_menu" href="'.get_permalink( CUENTA_USUARIO ).'"><img src="'.plantilla(false).'/images/iconos/peop.png"></'.$tag.'>'.
				'</div>'.
				'<div class="col-xs-4" data-hoverinfo="Tus clases disponibles">'.
					'<span class="clases_actuales large">'.$c.'</span>'.
				'</div>'.
			'</div>'.
		'</li>';
	};
};

if( !function_exists('menu_lateral') ){
	function menu_lateral(){
		
		return;
		?><nav id="menu_lateral" class="oyendo_menu"><?php
			echo '<img id="toogle_menu" class="toogle_menu" src="'.plantilla( false ).'/images/menu/menu.png" width="34" height="24"/>';
			logo_web();
			echo '<div class="cont_links_menu">';
				$links = array(
					'Comprar clases'=> get_permalink( CHECKOUT ),
					'Estudios'		=> get_post_type_archive_link( 'ubicacion' ),
					'Instructores'	=> get_post_type_archive_link( 'instructor' ),
					//'Tienda'		=> '',
					//'Blog'		=> '',
					'FAQS'			=> get_permalink( FAQS ),
					'Gift Card'		=> get_permalink( CHECKOUT ).'?gift=1',
					'Invita'		=> get_permalink( INVITA ),
				);
				foreach( $links as $l => $v ){
					echo '<a href="'.$v.'">'.$l.'</a>';
				};
			echo '</div>';
			echo '<div class="footer_menu">';
				$links = array(
					'Prensa'					=> '',
					'términos & condiciones'	=> get_permalink( TERMINOS ),
					'políticas de privacidad'	=> get_permalink( POLITICAS ),
				);
				foreach( $links as $l => $v ){
					echo '<a href="'.$v.'">'.$l.'</a>';
				};
			echo '</div>';
		?></nav><?php
	};
};
/*
**Como 3er parámetro se envía el usuario que compra
**es especial para back y es el que descubre si hay usuario comprador para el paquete de regalo
*/
if( !function_exists('imprimir_paquetes') ){
	function imprimir_paquetes( $checkout = false, $gift_card = false, $user_ID = false ){
		$info_paquetes = get_posts(array(
			'post_type'			=> 'paquete',
			'posts_per_page'	=> -1,
		));
		
		if( !$info_paquetes ){ return; };
		
		$return = array();
		
		foreach( $info_paquetes as $k => $paquete ){
			if( $k>4 ){ continue; }elseif( $k==0 && !$gift_card ){
				$reg = new Paquete_regalo( 'regalo',false, $user_ID );
				if( $user_ID ){
					/*
					**COMPROBAMOS SI HAY INFO
					**SI NO HAY YA LA USÓ
					*/
					if( $reg->data ){
						$return[] =  $reg;
					};
				}else{
					$reg->imprimir_paquete( $checkout );
				};
			};
			$data = new Paquete( $paquete->ID,false, $user_ID );
			
			if( $user_ID ){
				$return[] =  $data;
			}else{
				$data->imprimir_paquete( $checkout );
			};
		};
		
		return $return;
	};
};
if( !function_exists('get_productos') ){
	function get_productos(){
		$return = array();
		
		$info_paquetes = get_posts(array(
			'post_type'			=> 'producto',
			'posts_per_page'	=> -1,
		));
		
		if( !$info_paquetes ){ return; };
		foreach( $info_paquetes as $k => $paquete ){
			$return[] =  new Producto( $paquete->ID );
		};
		
		return $return;
	};
};
if( !function_exists('formatear') ){
	function formatear( $numero = 0 ){
		$format = number_format($numero,0,'.',',');
		return $format;
	};
};
if( !function_exists('precio') ){
	function precio( $numero = 0 ){
		$format = formatear( $numero );
		
		return '$'.$format.' MN';
	};
};
if( !function_exists('acceso_siclo') ){
	function acceso_siclo( $redirection = '' , $variables = false, $front=false ){
		if( $redirection !== 'AJAX' ){
			$redirection = $redirection !== ''? get_permalink( $redirection ) : get_home_url();
		};
		
		$activacion_cuenta = isset( $_GET['codigo_activacion'] ) ? '<input type="hidden" name="codigo_activacion" value="'.(string)$_GET['codigo_activacion'].'"/>' : '';
		$variables_get = $variables ? '?'.$variables : '';
		if ($front){
			?>
				<div class="registroinfo">
				    <form class="form1 blanco text-center form_siclo form_acceso">
				        <div class="cabecera">
                        	<small class="text-center center-bloc"><a href="#" class="color_azul">Entrar</a> / <span class="color_gris2">Registrar</span></small>
				            <span class="color_negro center-block medium">Bienvenido al <span class="color_azul">Sí</span>clo,</span>
				        </div>                                    
				        <div class="form-group">
				            <input type="email" class="form-control gris3" name="mail_usuario" placeholder="Mail@ejemplo.com" tabindex="1">
				        </div>
				        <div class="form-group">
				            <input type="text" class="form-control gris3 oculto" name="nombre_user" placeholder="Nombre Completo" tabindex="2">
				        </div>
				        <div class="form-group">
				            <input type="password" class="form-control gris3 oculto" name="pass_user" placeholder="Contraseña" tabindex="3">
				        </div>
				        <?php
				       		echo $activacion_cuenta;
							if( $variables_get !== '' ){
								echo '<input type="hidden" name="variables_get" value="'.$variables_get.'"/>';
							};
							echo '<input type="hidden" name="redirection" value="'.$redirection.'" class="oculto"/>';
							echo '<div class="boton btn azul2 bot2" tabindex="4">¡ A Rodar !</div>'; 
				       ?>
				    </form>
				</div>
			<?php
		}else{
			echo '<div class="form_siclo form_acceso">';
				echo '<h1>Entra al Síclo</h1>';
				echo '<input type="email" placeholder="E-Mail" name="mail_usuario" tabindex="1"/>';
				echo '<input type="text" placeholder="Nombre Completo" name="nombre_user" class="oculto"/>';
				echo '<input type="password" placeholder="Contraseña" name="pass_user" class="oculto"/>';
				echo $activacion_cuenta;
				if( $variables_get !== '' ){
					echo '<input type="hidden" name="variables_get" value="'.$variables_get.'"/>';
				};
				echo '<input type="hidden" name="redirection" value="'.$redirection.'"/>';
				echo '<div class="boton a_claro" tabindex="2">¡ A Rodar !</div>';
			echo '</div>';
		}
	};
};
if( !function_exists('check_codigo_activacion') ){
	/*CON EL USER ID SE VA A GUARDAR LA INFO*/
	function check_codigo_activacion( $user_id = 0 ){
		$test = false;
		
		if( !$test ){
			if( !$user_id || !isset( $_POST['codigo_activacion'] ) ){ return; };
			$codigo = urldecode( strip_tags( $_POST['codigo_activacion'] ) );/*BASE 64*/
		}else{
			$codigo = urldecode( strip_tags( 'MV9UX3dpc3F1aW1hc0BnbWFpbC5jb20%3D' ) );/*BASE 64*/
		};
		
		$usuario_padre = get_usuario_invitador( $codigo );
		if( !$usuario_padre ){ return; };
		
		$invitados = get_user_meta( $usuario_padre,'_usuarios_invitados',true );
		
		if( !isset( $invitados[$codigo] ) ){ return; };
		
		if( $invitados[$codigo]['status'] != 0 ){ return; };
		
		$invitados[$codigo]['status'] = 1;
		
		update_user_meta( $usuario_padre,'_usuarios_invitados',$invitados );
		update_user_meta( $user_id, '_cuenta_que_invito', array(
			'id_cuenta'			=> $usuario_padre,
			'codigo_invitado'	=> $codigo,
		));
	};
};
if( !function_exists('get_usuario_invitador') ){
	function get_usuario_invitador( $codigo = false ){
		if( !$codigo ){ return; };
		
		$decodificado = base64_decode( $codigo );/*SOLO PARA SABER EL USUARIO PADRE*/
		$data = explode('_T_',$decodificado);
		if( !$data || !isset( $data[0] ) ){ return; };
		
		return $data[0];
	};
};

if( !function_exists('print_inputs') ){
	function print_inputs( $inputs_user = array() , $print = true ){
		if( !count( (array)$inputs_user ) ){ return; };
		$html = '';
		foreach( $inputs_user as $id => $data ){
			
			$largo		= isset( $data['largo'] )		? 'size="'.$data['largo'].'"' : '';
			$maxlength	= isset( $data['maxlength'] )	? 'maxlength="'.$data['maxlength'].'"' : '';
			$class		= isset( $data['class'] )		? 'class="'.$data['class'].'"' : '';
			$name		= isset( $data['name'] )		? 'name="'.$data['name'].'"' : '';
			$tag		= isset( $data['tag'] )			? $data['tag'] : 'input';
			$type		= isset( $data['type'] )		? $data['type'] : 'text';
			$conekta	= isset( $data['conekta'] )		? $data['conekta'] : '';
			
			if( $tag === 'input' ){
				$html .= '<input '.$class.' '.$name.' '.$conekta.' type="'.$type.'" value="'.$data['value'].'" '.$largo.' '.$maxlength.' placeholder="'.$data['placeholder'].'" id="'.$id.'"/>';
			}elseif( $tag === 'textarea' ){
				$html .= '<textarea '.$class.' '.$name.' type="'.$type.'" '.$largo.' '.$maxlength.' placeholder="'.$data['placeholder'].'" id="'.$id.'">'.$data['value'].'</textarea>';
			};
		};
		if( $print ){
			echo $html;
		}else{
			return $html;
		};
	};
};

if( !function_exists('interior_cuenta') ){
	function interior_cuenta(){
		echo '<div class="columna_general">';
		?>
		<div class="cuenta">
		<?php
			global $current_user;
			$nombre=$current_user->display_name;
			$c  =  numero_clases_user();
			?>
			<div class="row">
				<div class="col-md-4">
					<div class="d1 p2">
                    	<big class="color_negro bienvenido_cuenta titulo_row_cuenta">Bienvenido <span class="color_azul"><?php echo $nombre; ?></span></big>
                        <div class="sub_titulo_cuenta">Mi cuenta / <a href="<?php echo wp_logout_url( get_home_url() );?>">Logout</a></div>
                    	<?php datos_user_cuenta();?>
                        <div class="cantidad_clases_cuenta">
                            <div class="sub_titulo_cuenta">Mis Clases</div>
                            <div id="clases" class="blanco text-center">
                                <div class="cabecera">
                                    <h3><?php echo $c; ?></h3>
                                    <span class="large color_gris1">Clases</span><br/>
                                    <small class="color_gris2">* Clases disponibles en tu cuenta</small>
                                </div>
                                <?php expiracion_clases();?>
                                <a href="<?= get_home_url().'/?go_to=compra_class';?>" class="btn azul2 btn bot2 text-center center-block">COMPRAR CLASES</a>
                            </div>
						</div><?php /*
						<div class="gris4 share">
							<span class="large color_negro text-center center-block">¡Invita, comparte y GANA!</span>
							<div class="down">
								<small class="color_gris1 text-justify">Comparte tu codigo personalizado por mail o en Facebook y twitter y obten lo siguiente:</small>
								<br>
								<br>
								<span><span class="large color_gris1">1.</span><small>Por cada amigo que reserve una clase obtendras el 20% de descuento en tu proxima clase.</small></span>
								<br>
								<span><span class="large color_gris1">2.</span><small>Por cada 10 nuevos usuarios que reserven una clase, la que sigue es completamente GRATIS.</small></span>
							</div>	
							<div class="down">
								<span class="medium"><?php echo $nombre ?>, tu <span class="color_azul">código</span> es:</span>
								<div class="codigo medium">67T978GJG67</div>
								<hr>
							</div>
						</div> */?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="d1 p2">
                    	<div class="large color_gris1 text-center titulo_row_cuenta">Formas de pago</div>
                        <div class="sub_titulo_cuenta">Mis tarjetas</div>
						<?php tarjetas_usuario_cuenta(); ?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="p2 center-block historialcuenta">
						<div class="large color_gris1 text-center titulo_row_cuenta">Historial de compra</div>
						<div class="down">
							<?php historial_cuenta(); ?>
						</div>
					</div>
				</div>
                <hr/>
			</div>
            <hr/>
			<?php print_codigo_descuento();?>
		</div>
			<?php
			//datos_user_cuenta();
	};
};
if( !function_exists('tarjetas_usuario_cuenta') ){
	function tarjetas_usuario_cuenta( $checkout = false ){
		global $current_user;
		if( !is_user_logged_in() ){ return; };
		
		$tarjetas = get_tarjetas( $current_user->ID );
		
		echo '<div class="tarjetas_user radio_list">';
			if( count( $tarjetas ) ){?>
			    <small class="center-block text-center color_gris2">Tus tarjetas registradas</small>
			    <br>
			<?php };
			echo '<div class="cont_tarjetas_info">';
				html_tarjetas( $tarjetas, true, $checkout );
			echo '</div>';
			if( !$checkout ){ html_annadir_tarjeta(); };
		echo '</div>';
		return $tarjetas;
	};
};
if( !function_exists('html_tarjetas') ){
	function html_tarjetas( $tarjetas = false, $print = true, $checkout = false ){
		$html = '';
		if( count( $tarjetas ) ){
			foreach( $tarjetas as $tarjeta ){
				$html .= print_single_tarjeta( $tarjeta, $checkout );
			};
		};
		if( $print ){
			echo $html;
		}else{
			return $html;
		};
	};
};
if( !function_exists('html_annadir_tarjeta') ){
	function html_annadir_tarjeta(){
		$conekta = new Pago_Conekta();
		
		$conekta->html_annadir_tarjeta( true, true );
	};
};
if( !function_exists('print_single_tarjeta') ){
	function print_single_tarjeta( $tarjeta = false, $checkout = false ){
		if( !$tarjeta ){ return; };
		$html = '<article class="single_tarjeta" data-token="'.$tarjeta['token'].'">';
			if( $checkout ){
				$html .= '<span class="checkbox radio"></span>';
			};
			$html .= '<img src="'.plantilla(false).'/images/tarjetas/'.$tarjeta['brand'].'.png" class="b_tarjeta"/>';
			$html .= '<span class="n_tarjeta">'.$tarjeta['nombre'].'</span>';
			$html .= '<span class="d_tarjeta"><span>************</span>'.$tarjeta['digitos'].'</span><span><img src="'.plantilla(false).'/images/iconos/form2.png" class="imground"></span>';
			$html .= '<span class="eliminar_tarjeta">x</span>';
		$html .= '</article>';
		return $html;
	};
};

if( !function_exists('historial_cuenta') ){
	function historial_cuenta(){
		global $current_user;
		if( !is_user_logged_in() ){ return; };
		$reserva = get_posts(array(
			'posts_per_page'	=> -1,
			'post_type'			=> array( 'reserva','pedido' ),
			'author'			=> $current_user->ID,
			//'fields'			=> 'ids',
			'post_status'		=> array('future', 'publish'),
		));
		if( !$reserva ){ return; };
		echo '<div class="columna_general">';
			echo '<div class="historial">';
				foreach( $reserva as $clase ){
					if( $clase->post_type === 'reserva' ){
						$c = new Reserva( $clase->ID );
						if( $clase->post_status == 'future' ){
							$c->print_historial( true );
						}else{
							$c->print_historial( false );
						};
					}else{
						$c = new Pedido( $clase->ID );
						$c->print_historial();
					};
				};
			echo '</div>';
		echo '</div>';
	};
};
if( !function_exists('datos_user_cuenta') ){
	function datos_user_cuenta(){
		global $current_user;
		if( !is_user_logged_in() ){ return; };
		echo '<h1 class="color_gris img_con_logo"><img src="'.plantilla(false).'/eliminar/cuenta/hola_cuenta.png" width="58" height="22" alt="Hola"/> '.$current_user->display_name.'</h1>';
		echo '<div class="toggleDatosUsuario">+ Datos del usuario</div>';
		
		$inputs_user = array(
			'user_email'	=> array(
				'type'			=> 'email',
				'value'			=> $current_user->user_email,
				'placeholder'	=> 'Email',
				'class'			=> 'form-control gris3',
			),
			'display_name'	=> array(
				'type'			=> 'text',
				'value'			=> $current_user->display_name,
				'placeholder'	=> 'Tu nombre',
				'class'			=> 'form-control gris3',
			),
			'user_nacimiento'	=> array(
				'type'			=> 'date',
				'value'			=> get_user_meta( $current_user->ID, 'user_nacimiento',true ),
				'placeholder'	=> 'Fecha de nacimiento',
				'class'			=> 'form-control gris3',
			),
		);
		echo '<div class="userInfoCont">';
			print_inputs( $inputs_user );
		/*SALVAR*/
			echo '<div id="salvar_cuenta" class="boton a_oscuro btn bot2 btn-cuenta azul2">Salvar datos</div>';
		echo  '</div>';
		/*CAMBIAR PASSWORD*/
		cambiar_contrasenna();
	};
};
if( !function_exists('cambiar_contrasenna') ){
	function cambiar_contrasenna(){
		$inputs_user = array(
			'user_password'	=> array(
				'type'			=> 'password',
				'value'			=> '',
				'placeholder'	=> 'Constraseña',
				'class'			=> 'form-control gris3',
			),
			'user_password2'	=> array(
				'type'			=> 'password',
				'value'			=> '',
				'placeholder'	=> 'Repetir contraseña',
				'class'			=> 'form-control gris3',
			),
		);
		echo '<div class="toggleChangePassword">+ Cambiar contraseña</div>';
		echo '<div class="cambio_contrasenna">';
			print_inputs( $inputs_user );
			echo '<div id="cambiar_contrasenna" class="color_gris btn bot2 azul2 btn-cuenta">Cambiar contraseña</div>';
		echo '</div>';
	};
};
if( !function_exists('cantidad_clases_cuenta') ){
	function cantidad_clases_cuenta(){
		global $current_user;
		$cantidad_clases = numero_clases_user();
		
		echo '<div id="clases_disponibles_cuenta">';
			//echo '<img src="'.plantilla(false).'/eliminar/cuenta/circulo_cuenta.png" width="277" height="277" alt=""/>';
			echo '<div>';
				echo '<h1>Clases disponibles</h1>';
				echo '<div class="clases_usuario">'.$cantidad_clases.'</div>';
				echo '<hr/>';
				echo '<a href="'.get_permalink( CHECKOUT ).'" class="boton a_oscuro">Comprar clases</a>';
			echo '</div>';
			echo '<span style="clear:both;display:block;"></span>';
		echo '</div>';
	};
};


if( !function_exists('imprimir_lists_invitados') ){
	function imprimir_lists_invitados( $user_id = 0 ){
		$user = get_user_by( 'id',(int)$user_id );
		if( !$user_id ){ return; };
		
		$usuario_invitados = get_user_meta($user_id,'_usuarios_invitados',true);
		if( !isset( $usuario_invitados['invitados'] ) ){ return; };
		
		
	};
};
if( !function_exists('check_invitacion') ){
	/*vamos a comprobar si alguien lo invitó y si es procesable*/
	function check_invitacion( $user_id = 0 ){
		$user = get_user_by( 'id',(int)$user_id );
		if( !$user_id ){ return; };
		/*
			//-----TEST----
			update_user_meta( $user_id, '_cuenta_que_invito', array(
				'id_cuenta'			=> 1,
				'codigo_invitado'	=> base64_encode( '1_T_wisquimas@gmail2.com' ),
			));
		*/
		
		$invitador = get_user_meta( $user_id, '_cuenta_que_invito', true );
		if( !isset( $invitador['id_cuenta'] ) || !isset( $invitador['codigo_invitado'] ) ){ return; };
		
		
		/*RECOGEMOS LA INFO DEL INVITADOR :)*/
		$usuario_invitados = get_user_meta($invitador['id_cuenta'],'_usuarios_invitados',true);
		if( !isset( $usuario_invitados[$invitador['codigo_invitado']] ) ){ return; };
		
		if( $usuario_invitados[$invitador['codigo_invitado']]['procesado'] != 0 || $usuario_invitados[$invitador['codigo_invitado']]['status'] == 0 ){
			/*USUARIO YA PROCESADO*/
			update_user_meta( $user_id, '_cuenta_que_invito', null );
			return;
		};
		/*CAMBIAMOS PROCESANDO EN STATUS 1: USUARIO YA COMPRÓ*/
		$usuario_invitados[$invitador['codigo_invitado']]['procesado'] = 1;
		
		update_user_meta( $user_id, '_cuenta_que_invito', null );
		update_user_meta( $invitador['id_cuenta'], '_usuarios_invitados', $usuario_invitados );
		
		comprobar_regalos( $invitador['id_cuenta'] , $usuario_invitados );
	};
};
if( !function_exists('comprobar_regalos') ){
	function comprobar_regalos( $user_id = 0, $usuario_invitados = false, $callback = false ){
		if( !$user_id ){ return; };
		
		if( !$usuario_invitados ){
			$usuario_invitados = get_user_meta($user_id,'_usuarios_invitados',true);
		};
		if( !$usuario_invitados ){ return; };
		
		$up	= 0;/*USUARIOS PROCESADOS*/
		
		foreach( $usuario_invitados as $k => $invitado ){
			if( $invitado['procesado'] == 1 ){
				if( $up == 2 ){
					continue;
				}else{
					$usuario_invitados[$k]['procesado'] = 2;
					$up++;
				};
			};
		};
		if( $up == 2 ){
			sumar_clases( $user_id, 1 );
		};
		update_user_meta( $user_id, '_usuarios_invitados', $usuario_invitados );
	};
};
function check_codigo_activacion( $user_id = 0 ){
	$user = get_user_by( 'id',(int)$user_id );
	if( !$user_id ){ return; };
	
	$codigo_aplicado = get_user_meta( $user_id ,'codigo_aplicado', true );
	if( !$codigo_aplicado ){ return; };
	
	/*LIMPIAMOS EL CÓDIGO*/
	update_user_meta( $user_id ,'codigo_aplicado', null );
	$user = reset(get_users(
		array(
			'meta_key'		=> 'codigo_descuento',
			'meta_value'	=> $codigo_aplicado,
			'number'		=> 1,
			'count_total'	=> false
		)
	));
	if( !$user ){ return; };
	/*YA TENIENDO QUIÉN INVITÓ VAMOS A VER LOS INVITADOS QUE TIENE*/
	$total_invitados = (int)get_user_meta( $user->ID ,'total_invitados', true );
	$total_invitados++;
	
	if( $total_invitados >= 5 ){
		$total_invitados = 0;
		sumar_clases( $user->ID, 1 );
	};
	update_user_meta( $user->ID ,'total_invitados', $total_invitados );
};
function expiracion_clases( $user_id = false, $back = false ){
	global $current_user;
	if( !is_user_logged_in() ){ return; };
	
	if( !$user_id && !$back ){
		$user_id = $current_user->ID;
	};
	$html = '';
	
	$clases = $user_id !== false && $user_id !== 'false' ? numero_clases_user( $user_id, true ) : array();
	if( count( $clases ) ){
		
		unificar_clases_por_expiracion( $clases );
		if( count( $clases ) ){
			foreach( $clases as $fecha => $cantidad ){
				if( $back ){
					$html.= print_inputs(array(
						'cantidad_clases'.$fecha	=> array(
							'type'			=> 'number',
							'value'			=> $cantidad,
							'placeholder'	=> 'Cantidad de clases',
							'class'			=> 'half_input',
							'name'			=> 'cantidad_clases[numero]',
						),
						'fecha_clases'.$fecha	=> array(
							'type'			=> 'date',
							'value'			=> $fecha ? $fecha : expiracion_primer_paquete( true ),
							'placeholder'	=> 'Fecha expiracion',
							'class'			=> 'half_input',
							'name'			=> 'cantidad_clases[fecha]',
						),
					),false);
				}else{
					$html.=
					'<div class="bloque_expiracion">'.
						'<h2>'.$cantidad.' clases</h2>'.
						'<p>Fecha de caducidad: '.date_i18n('d / m / Y',strtotime( $fecha )).'</p>'.
					'</div>';
				};
			};
		};
	};
	
	if( $back ){
		$html.= '</br>';
		$html.= print_inputs(array(
			'cantidad_clases_nueva'	=> array(
				'type'			=> 'number',
				'value'			=> '',
				'placeholder'	=> 'Cantidad de clases',
				'class'			=> 'half_input',
				'name'			=> 'cantidad_clases[numero]',
			),
			'fecha_clases_nueva'	=> array(
				'type'			=> 'date',
				'value'			=> '',
				'placeholder'	=> 'Fecha de expiracion',
				'class'			=> 'half_input',
				'name'			=> 'cantidad_clases[fecha]',
			),
		),false);
		return $html;
	}else{
		echo $html;
	};
};
function unificar_clases_por_expiracion( &$clases = false ){
	if( !$clases ){ return array(); };
	$formated = array();
	
	foreach( $clases as $fecha ){
		if( !isset( $formated[$fecha] ) ){
			$formated[$fecha] = 1;
		}else{
			$formated[$fecha]++;
		};
	};
	$clases = $formated;
};
if( !function_exists('numero_clases_user') ){
	function numero_clases_user( $user = false, $array = false ){
		if( !$user ){
			global $current_user;
			$user = $current_user;
			/*SI EL USUARIO NO ESTÁ LOGUEADO DEVOLVEMOS CERO*/
			if( !is_user_logged_in() ){ return 0; };
		}else{
			$user = get_user_by('id',$user);
		};
		$n_clases = (array)get_user_meta( $user->ID,'cantidad_clases',true );
		
		return $array ? $n_clases : count( $n_clases );
	};
};

if( !function_exists('sumar_clases') ){
	function sumar_clases( $user_id = 0, $numero_clases = 0, $expiracion = false ){
		if( !$user_id || !$numero_clases ){ return; };
		
		if( $expiracion === false ){
			$expiracion = expiracion_primer_paquete( true );
		};
		$clases = numero_clases_user( $user_id, true );
		for( $i = 1; $i <= (int)$numero_clases; $i++ ){
			$clases[] = $expiracion;
		};
		$clases = array_filter( $clases );
		update_user_meta( $user_id,'cantidad_clases',$clases );
	};
};
if( !function_exists('restar_clases') ){
	function restar_clases( $user_id = 0, $numero_clases = 0 ){
		if( !$user_id || !$numero_clases ){ return; };
		
		$clases = numero_clases_user( $user_id, true );
		
		asort( $clases );
		for( $i = 1; $i <= (int)$numero_clases; $i++ ){
			$restada = array_shift( $clases );
		};
		update_user_meta( $user_id,'cantidad_clases',$clases );
		return $restada;
	};
};
if( !function_exists('expiracion_primer_paquete') ){
	function expiracion_primer_paquete( $fecha = false ){
		$paquete = new Paquete( PRIMER_PAQUETE );
		return !$fecha ? $paquete->data['expiracion'] : $paquete->fecha_expiracion( $paquete->data['expiracion'], false );
	};
};

if( !function_exists('annadir_invitados') ){
	function annadir_invitados( $user_id = 0, $data = array() ){
		if( !$user_id || !count( $data ) ){ return false; };
		$ok				= true;
		$mensaje		= '';
		$devolver_data	= array();
		/*
			EN CASO DE ERROR DEBEMOS RETORNAR ESTE FORMATO
			$mensajes->add_error( $ok['mensaje'] );
			$mensajes->add_data( $ok['data'], true );
		*/
		$invitados = get_user_meta( $user_id,'_usuarios_invitados',true );
		
		if( $invitados === '' ){
			$invitados = array();
		};
		
		foreach( $data as $i => $mail ){
			$codificado = base64_encode( $user_id.'_T_'.$mail );
			if( isset( $invitados[$codificado] ) ){
				//USUARIO YA INVITADO
				$mensaje			.= 'Ya has invitado anteriormente al mail :"'.$mail.'"<br/>';
				$devolver_data[]	= 'invitado_'.( $i+1 );
				continue;
			};
			
			enviar_mail_a_invitado( $mail , $user_id, $codificado );
			$invitados[$codificado] = array(
				'mail'		=> $mail,
				'status'	=> 0,
				'procesado'	=> 0,
			);
		};
		if( $mensaje !== '' ){
			/*DEVOLVEMOS EL ERROR*/
			return array(
				'mensaje'	=> $mensaje,
				'data'		=> $devolver_data,
			);
		}else{
			update_user_meta( $user_id,'_usuarios_invitados',$invitados );
		};
		
		return $ok;
	};
};
if( !function_exists('enviar_mail_a_invitado') ){
	function enviar_mail_a_invitado( $mail = '' , $user_id = '', $codificado = '' ){
		if( !$mail || !$user_id || !$codificado ){ return; };
		
		$link = get_permalink( CUENTA_USUARIO ).'?codigo_activacion='.urlencode( $codificado );
		
		mail( $mail, 'Mail de invitado', $link );
	};
};
/*SALVAR USUARIO*/
if( !function_exists('guardar_facturacion') ){
	function guardar_facturacion( $data = false, $id_user = false, $ya_format = false ){
		if( !$data || !$id_user ){ return; };
		
		$data_format = array();
		
		if( !$ya_format ){
			if( count( $data ) ){
				foreach( $data as $info ){
					$data_format[$info[0]] = $info[1];
				};
			};
		}else{
			$data_format = $data;
		};
		
		update_user_meta( $id_user,'_facturacion', $data_format );
		
	};
};
if( !function_exists('salvar_cuenta') ){
	function salvar_cuenta( $id_user, $data, $print = true ){
		$mail_usuario	= isset( $data['user_email'] ) ? strip_tags( $data['user_email'] ) : false;
		$nombre_user	= isset( $data['display_name'] ) ? strip_tags( $data['display_name'] ) : false;
		$user_nacimiento= isset( $data['user_nacimiento'] ) ? strip_tags( $data['user_nacimiento'] ) : false;
		$pass_user		= isset( $data['pass_user'] ) ? strip_tags( $data['pass_user'] ) : false;
		
		if( !$mail_usuario || !$nombre_user ){
			die( json_encode(array(
				'ok'		=> false,
				'mensaje'	=> 'ERROR: 6969',
			) ) );
		};
		
		$mensajes	= new Mensajes( false );/*NO VAMOS A IMPRIMIR LOS MENSAJES*/
		$user_id	= $id_user;
		
		/*CHECAMOS PRIMERO EL MAIL---------------------------------------------------------------------------*/
		if( $user = email_exists( $mail_usuario ) ){
			if( $user == $user_id ){
				/*EXISTE EL USUARIO Y ES EL MISMO AL ACTUAL*/
				wp_update_user( array( 'ID' => $user_id, 'user_email' => $mail_usuario, 'user_login' => $mail_usuario ) );
				
			}else{
				/*NO EDITAMOS*/
				$mensajes->add_error('El correo electrónico que deseas utilizar ya existe en el sistema');
			};
		}else{
			/*GUARDAMOS LA INFO SIN PROBLEMAS DE REPETICION DE MAIL*/
			if( is_email( $mail_usuario ) ){
				wp_update_user( array( 'ID' => $user_id, 'user_email' => $mail_usuario, 'user_login' => $mail_usuario ) );
			}else{
				$mensajes->add_error('No has escrito un correo electrónico válido');
			};
		};
		
		if( $pass_user && $pass_user != '' ){
			/*CAMBIAMOS LA CONTRASEÑA---------------------------------------------------------------------*/
			wp_update_user( array( 'ID' => $user_id, 'user_pass' => $pass_user ) );
		};
		
		/*EDITAMOS EL NOMBRE DEL USUARIO---------------------------------------------------------------------*/
		wp_update_user( array( 'ID' => $user_id, 'display_name' => $nombre_user ) );
		
		/*GUARDAMOS FECHA DE NACIMIENTO---------------------------------------------------------------------*/
		update_user_meta( $user_id, 'user_nacimiento',$user_nacimiento );
		
		
		/*-----------------------------------------------------*/
		if( $print ){
			die( json_encode(array(
				'ok'		=> true,
				'mensaje'	=> $mensajes->imprimir(),
			) ) );
		}else{
			return $mensajes->imprimir();
		};
		/*-----------------------------------------------------*/
		
	};
};
function thankyou_page( $data = false ){
	/*global $current_user;
	$c  =  numero_clases_user();
	info_pedido( $data );*/
	$variables_get = '?gracias=1';
	if( isset( $data['inforeserva'] ) ){
		$variables_get.= '&reserva_data='.$data['inforeserva'];
	};
	?>
	<script type="text/javascript">document.location.href="<?php echo get_home_url().$variables_get;?>";</script>
<?php
};
if( !function_exists('info_pedido') ){
	function info_pedido( $data = false ){
		echo 
		'<div class="thankyou_fancy">'.
			'<h2 class="color_azul">Confirmado</h2>'.
			'<h3>¡Listo! Ahora ponte a <span class="color_azul">Rodar</span>.</h3>'.
			'<hr/>'.
			'<div class="links_thankyou">'.
				'<a href="'.get_permalink( CUENTA_USUARIO ).'">Mi cuenta</a>'.
				'<span class="separador_th">/</span>'.
				'<a class="cerrar_fancy" href="">Seguir rodando</a>'.
			'</div>';
			if( $data ){
				$reserva	= new Reserva( $data );
				$clase		= new Clase( $reserva->clase );
				
				echo '<a href="https://www.facebook.com/sharer/sharer.php?u='.urlencode( $clase->permalink ).'" class="link_social" target="_blank"><img src="'.plantilla(false).'/images/botonfb.png"/></a>';
				$twitter_text = "Acabo de reservar con ".get_the_title( $clase->instructor )." en Síclo. ¡A mi nadie me pedalea la bici!";
				
				echo '<a href="https://twitter.com/home?status='.urlencode( $twitter_text ).'" class="link_social" target="_blank"><img src="'.plantilla(false).'/images/botontw.png"/></a>';
			};
		echo
		'</div>';
	};
};
if( !function_exists('menu_ubicacion_ind') ){
	function menu_ubicacion_ind( $default = false ){
		/*DEPRECATED---------*/
		$ubicaciones = get_posts( array(
			'posts_per_page'=> -1,
			'post_type'		=> 'ubicacion',
			'fields'		=> 'ids',
		) );
		if( !$ubicaciones ){ return; };
		
		$string		= '';
		$cantidad	= count( $ubicaciones );
		
		foreach( $ubicaciones as $u ){
			$u = new Ubicacion( $u );
			$data_menu = $u->ub_en_menu( $default );
			if( $data_menu['actual'] ){
				$string = $data_menu['texto'].$string;
			}else{
				$string.=$data_menu['texto'];
			};
		};
		$flechas = '';
		if( $cantidad > 1 ){
			$flechas= '<div class="flecha antes">&lt;</div><div class="flecha despues">&gt;</div>';
		};
		echo '<div class="menu_ubicacion"><div class="mov_m_ubi">'.$string.'</div>'.$flechas.'</div>';
	};
};
if( !function_exists('resto_ubicaciones') ){
	function resto_ubicaciones( $actual = false ){
		$ubicaciones = get_posts( array(
			'posts_per_page'=> -1,
			'post_type'		=> 'ubicacion',
			'fields'		=> 'ids',
			'post__not_in'	=> array( $actual ),
		) );
		if( !$ubicaciones ){ return; };
		
		foreach( $ubicaciones as $u ){
			$u = new Ubicacion( $u );
			$u->imprimir_single( false, false );
		};
	};
};
if( !function_exists('dias') ){
	function dias( $dias = 0 ){
		return ($dias * 24 * 60 * 60);
	};
};
if( !function_exists('formateo_fecha') ){
	function formateo_fecha( $fecha = 0 ){
		if( !$fecha ){ return; };
		return array(
			'year'  => date('Y',$fecha),
			'month' => date('m',$fecha),
			'day'   => date('d',$fecha),
		);
	};
};
if( !function_exists('show_future_posts') ){
	function show_future_posts($posts){
		global $wp_query, $wpdb;
		if(is_single() && $wp_query->post_count == 0){
			$posts = $wpdb->get_results($wp_query->request);
		};
		return $posts;
	};
};
add_filter('the_posts', 'show_future_posts');


if( !function_exists('estilos_web_admin') ){
	function estilos_web_admin(){
        require_once('css_admin/style.php');
        require_once('css_admin/responsive.php');
	};
};
if( !function_exists('estilos_web') ){
	function estilos_web(){
        require_once('css/style.php');
        require_once('css/responsive.php');
	};
};
if( !function_exists('scripts_web') ){
	function scripts_web(){
        require_once('js/js.php');
		require_once('js/js_rogelio.php');
	};
};
if( !function_exists('admin') ){
	function admin( $print = true ){
		$data = plantilla(false).'/administrador';
		if( $print ){
			echo $data;
		}else{
			return $data;
		};
	};
};
function compatible( $string = '' ){
	$c = array(
		'',
		'-moz-',
		'-ms-',
		'-o-',
		'-webkit-',
	);
	foreach( $c as $x ){
		echo $x.$string;
	};
};
if( !function_exists('crear') ){
	function crear( $post_type = false, $usuario = false, $fecha = false ){
		if( !$post_type || !is_user_logged_in() ){ return; };
		if( !$usuario ){
			global $current_user;
			$usuario = $current_user->ID;
		};
		$post_nuevo = array(
			'post_title'	=> '',
			'post_status'	=> 'publish',
			'post_author'	=> $usuario,
			'post_type'		=> $post_type,
		);
		if( $fecha ){
			$post_nuevo['post_date'] = $fecha;
		};
		
		return  wp_insert_post( $post_nuevo );
	};
};
if( !function_exists('actualizar_nombre') ){
	function actualizar_nombre( $id_post = false, $nombre = false ){
		if( !$id_post || !$nombre ){ return; };
		return  wp_update_post(array(
			'post_title'	=> $nombre,
			'ID'			=> $id_post,
		));
	};
};
if( !function_exists('actualizar_status') ){
	function actualizar_status( $id_post = false, $post_status = false ){
		if( !$id_post || !$post_status ){ return; };
		return  wp_update_post(array(
			'post_status'	=> $post_status,
			'ID'			=> $id_post,
		));
	};
};
if( !function_exists('actualizar_fecha') ){
	function actualizar_fecha( $id_post = false, $fecha = false ){
		if( !$id_post || !$fecha ){ return; };
		return  wp_update_post(array(
			'post_date'		=> $fecha,
			'ID'			=> $id_post,
		));
	};
};
if( !function_exists('actualizar_contenido') ){
	function actualizar_contenido( $id_post = false, $txt = false ){
		if( !$id_post || !$txt ){ return; };
		return  wp_update_post(array(
			'post_content'		=> $txt,
			'ID'			=> $id_post,
		));
	};
};
if( !function_exists('eliminar') ){
	function eliminar( $id_post = false ){
		if( !$id_post ){ return; };
		return  wp_delete_post( $id_post, true );
	};
};
if( !function_exists('formateo_clases_cal') ){
	function formateo_clases_cal( $clases = false, $analitica = false ){
		if( !$clases ){ return; };
		
		$string_fecha = $analitica ? 'd m Y' : 'G_d';
		
		$clases_format = array();
		/*FORMATEAMOS LAS CLASES*/
		foreach( $clases as $clase ){
			$f_indice = date($string_fecha,strtotime( $clase->post_date ) );
			
			if( !isset( $clases_format[$f_indice] ) ){
				$clases_format[$f_indice] = array();
			};
			$clases_format[$f_indice][] = $clase;
		};
		return $clases_format;
	};
};
if( !function_exists('get_preguntas') ){
	function get_preguntas(){
		return get_posts(array(
			'post_type'			=> 'pregunta',
			'posts_per_page'	=> -1,
			'fields'			=> 'ids',
		));
	};
};
function print_calendar( $contenedor = true ){
	if( $contenedor ){
		echo '<div id="cont_calendario">';
	};
		// Get current year, month and day
		list($iNowYear, $iNowMonth, $iNowDay) = explode('-', date('Y-m-d'));
		
		// Get current year and month depending on possible GET parameters
		if (isset($_GET['month'])) {
			list($iMonth, $iYear) = explode('-', $_GET['month']);
			$iMonth = (int)$iMonth;
			$iYear = (int)$iYear;
		} else {
			list($iMonth, $iYear) = explode('-', date('n-Y'));
		}
		
		// Get name and number of days of specified month
		$iTimestamp = mktime(0, 0, 0, $iMonth, $iNowDay, $iYear);
		list($sMonthName, $iDaysInMonth) = explode('-', date_i18n('F-t', $iTimestamp));
		
		// Get previous year and month
		$iPrevYear = $iYear;
		$iPrevMonth = $iMonth - 1;
		if ($iPrevMonth <= 0) {
			$iPrevYear--;
			$iPrevMonth = 12; // set to December
		}
		
		// Get next year and month
		$iNextYear = $iYear;
		$iNextMonth = $iMonth + 1;
		if ($iNextMonth > 12) {
			$iNextYear++;
			$iNextMonth = 1;
		}
		
		// Get number of days of previous month
		$iPrevDaysInMonth = (int)date('t', mktime(0, 0, 0, $iPrevMonth, $iNowDay, $iPrevYear));
		
		// Get numeric representation of the day of the week of the first day of specified (current) month
		$iFirstDayDow = (int)date('w', mktime(0, 0, 0, $iMonth, 1, $iYear));
		
		// On what day the previous month begins
		$iPrevShowFrom = $iPrevDaysInMonth - $iFirstDayDow + 1;
		
		// If previous month
		$bPreviousMonth = ($iFirstDayDow > 0);
		
		// Initial day
		$iCurrentDay = ($bPreviousMonth) ? $iPrevShowFrom : 1;
		
		
		$bNextMonth = false;
		$sCalTblRows = '';
		
		// Generate rows for the calendar
		for ($i = 0; $i < 6; $i++) { // 6-weeks range
			$sCalTblRows .= '<tr>';
			for ($j = 0; $j < 7; $j++) { // 7 days a week
		
				$sClass = '';
				if ($iNowYear == $iYear && $iNowMonth == $iMonth && $iNowDay == $iCurrentDay && !$bPreviousMonth && !$bNextMonth) {
					$sClass = 'today current';
				} elseif (!$bPreviousMonth && !$bNextMonth) {
					$sClass = 'current';
				}
				$string_dia = (string)$iCurrentDay;
				if( strlen( $string_dia ) < 2 ){ $string_dia = '0'.$string_dia; };
				
				$sCalTblRows .= '<td class="'.$sClass.'" data-dia="'.$iYear.'-'.date_i18n('m', $iTimestamp).'-'.$string_dia.'"><a href="javascript: void(0)">'.$iCurrentDay.'</a></td>';
		
				// Next day
				$iCurrentDay++;
				if ($bPreviousMonth && $iCurrentDay > $iPrevDaysInMonth) {
					$bPreviousMonth = false;
					$iCurrentDay = 1;
				}
				if (!$bPreviousMonth && !$bNextMonth && $iCurrentDay > $iDaysInMonth) {
					$bNextMonth = true;
					$iCurrentDay = 1;
				}
			}
			$sCalTblRows .= '</tr>';
		}
		
		// Prepare replacement keys and generate the calendar
		$aKeys = array(
			'__prev_month__' => "{$iPrevMonth}-{$iPrevYear}",
			'__next_month__' => "{$iNextMonth}-{$iNextYear}",
			'__cal_caption__' => $sMonthName . ', ' . $iYear,
			'__cal_rows__' => $sCalTblRows,
			'__plantilla__'=> plantilla(false),
			'__gris__' => GRIS,
			'__gris_c__' => GRIS_C,
			'__azul__' => 'rgba(0,0,0,0.6)',
			'__naranja__' => R_OSCURO,
		);
		$sCalendarItself = strtr(file_get_contents(plantilla(false).'/calendario.php'), $aKeys);
		
		// AJAX requests - return the calendar
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' && isset($_GET['month'])) {
			header('Content-Type: text/html; charset=utf-8');
			echo $sCalendarItself;
			exit;
		}
		
		echo $sCalendarItself;
	if( $contenedor ){
		echo '</div>';
	};
};
/*GIFT CARD------------------------------------------------------------------------------*/
if( !function_exists('procesar_invitado') ){
	function procesar_invitado( $data = false, $paquete = false, $id_comprador = false ){
		global $current_user;
		if( !$data || !$paquete ){ return; };
		if( !$id_comprador ){
			$id_comprador = $current_user->ID;
		};
		$new_cron = crear( 'cron_gift_card', $id_comprador, $data['fecha'] );
		
		if( $new_cron ){
			update_post_meta( $new_cron, '_data', $data['data'] );
			update_post_meta( $new_cron, '_paquete', $paquete );
		};
	};
};
if( !function_exists('cron_gift_card') ){
	/*ESTA FUNCION RECOGE LOS REGALOS QUE DEBEN ENVIARSE*/
	function cron_gift_card(){
		$gifts = get_posts( array(
			'post_type'			=> 'cron_gift_card',
			'posts_per_page'	=> -1,
			'post_status'		=> 'publish',
		) );
		
		if( !$gifts ){ return; };
		
		foreach( $gifts as $gif ){
			$id_post = $gif->ID;
			$meta = get_post_meta( $id_post );
			
			if( !isset($meta['_paquete']) || !isset($meta['_data']) ){ return; };
			
			$paquete	= unserialize( reset( $meta['_paquete'] ) );
			$invitado	= unserialize( reset( $meta['_data'] ) );
			$invitador	= $gif->post_author;
			
			enviar_info_gift_card( $id_post, $invitado, $paquete, $invitador );
			actualizar_status( $id_post, 'pending' );
		};
	};
};
if( !function_exists('enviar_info_gift_card') ){
	/*
		ESTA FUNCION ENVÍA LOS MAILS
	*/
	function enviar_info_gift_card( $id_post, $invitado = false, $paquete = false, $invitador = false ){
		if( !$id_post || !$invitado || !$paquete || !$invitador ){ return; };
		
		$link		= get_permalink( $id_post );
		$mail_to	= $invitado['correo'];
		
		$invitador = get_user_by('id', $invitador);
		$noClases = $paquete->data['cantidad'];
		
		$html = '
			<div style="width: 950px; background-color:  #21d848; margin: auto; box-sizing: border-box; padding: 28px 0;">
			<img src="http://siclo.com/wp-content/themes/siclo/images/mailings/2.0/logo.png" style="width: 128px; margin: 0 auto 20px; display: block;"/>
			<div style="width: 640px; background-color: #fff; padding: 30px 0; margin: auto; position: relative;">
				<h2 style="text-align: center; font-size: 30px; font-family: Helvetica; font-weight: 400; padding: 0 0 30px; border-bottom: 1px solid #dedede; color: #414040; margin: 0;">En sus marcas, listos... ¡Rueda!</h2>
				<p style="text-transform: uppercase; color: #dedede; text-align: center; font-family: Helvetica; font-size: 13px; margin-bottom: 50px;">recibiste un regalo</p>
				<img src="http://siclo.com/wp-content/themes/siclo/images/mailings/2.0/gift.png" style="display: block; width: 95px; margin: 0 auto 35px;" />
				<p style="font-size: 15px; text-align: center; font-weight: 300; font-family: Helvetica; width: 490px; margin: auto; color: #dedede; line-height: 20px; text-transform: uppercase;">tu destino es rodar...</p>
				<p style="font-size: 15px; text-align: center; font-weight: 300; font-family: Helvetica; width: 490px; margin: 0 auto 35px; color: #dedede; line-height: 20px;">Tu amigo <span style="color: #000;">'. $invitador->display_name .'</span> te hizo un regalo.</p>
				<p style="font-size: 42px; text-align: center; font-weight: 300; font-family: Helvetica; border-bottom: 1px solid #dedede; padding-bottom: 45px; width: 490px; margin: auto; color: #535151; line-height: 50px;">'. $noClases .' clases en Síclo.</p>
				<p style="font-size: 24px; line-height: 30px; font-family: Helvetica; font-weight: 300; text-align: center; color: #a1a1a1; width: 490px; margin: 30px auto; border-bottom: 1px solid #dedede; padding-bottom: 45px;">'. $invitado['mensaje'] .'</p>
				<p style="font-size: 24px; line-height: 30px; font-family: Helvetica; font-weight: 300; text-align: center; color: #a1a1a1; width: 490px; margin: 70px auto;">Esperamos verte pronto. Sugerimos lleves agua y si tienes zapatos de ciclismo (con cleats) también tráelos. Si no tienes no te preocupes,nosotros te los prestamos.<br/></p>
				<p style="font-size: 33px; font-family: Helvetica; font-weight: 300; color: #414040; text-align: center; width: 490px; margin: 0 auto 125px;">Ruedo, luego existo.</p>
				<div style="border-top: 1px solid #dedede; position: absolute; bottom: 0; left: 0; right: 0; padding: 15px 0;">
					<div style="width: 49%; display: inline-block; vertical-align: top; border-right: 1px solid #a1a1a1;">
						<img src="http://siclo.com/wp-content/themes/siclo/images/mailings/2.0/present.png" style="display: inline-block; vertical-align: middle; margin-left: 40px;" />
						<div style="display: inline-block; vertical-align: top; width: 200px; margin-left: 17px;">
							<img src="http://siclo.com/wp-content/themes/siclo/images/mailings/2.0/regala_siclo.png" />
							<p style="color: #9b9a9a; font-family: Helvetica; font-size: 8px;">Envíala a tus amigos, regala y pónganse a rodar.</p>
						</div>
					</div>
					<div style="width: 49%; display: inline-block; vertical-align: top;">
						<img src="http://siclo.com/wp-content/themes/siclo/images/mailings/2.0/telefono.png" style="display: inline-block; vertical-align: middle; margin-left: 27px;" />
						<div style="display: inline-block; vertical-align: middle; margin-left: 20px;">
							<p style="font-family: Helvetica; color: #767474; font-size: 11px; margin: 0 0 5px;"><span style="font-family: Helvetica; font-size: 11px; font-weight: 800; text-transform: uppercase; color: #000;">Teléfono: </span><a href="tel:67-67-65-67" style="color: inherit;">67 67 65 67</a></p>
							<p style="font-family: Helvetica; color: #767474; font-size: 11px; margin: 0;"><span style="font-family: Helvetica; font-size: 11px; font-weight: 800; text-transform: uppercase; color: #000;">Correo: </span><a href="mailto:hola@siclo.com" style="color: inherit;">hola@siclo.com</a></p>
						</div>
					</div>
				</div>
			</div>
			<a style="background-color: #000; color: #fff; text-align: center; font-size: 10px; font-family: Helvetica; height: 30px; width: 210px; margin: 30px auto 0; text-transform: uppercase; line-height: 30px; border-radius: 5px; display: block;" href="'. $link .'">agregar clases</a>
		</div>		
		';
		
		$headers = array('Content-Type: text/html; charset=UTF-8');
		
		wp_mail($mail_to, 'Te han regalado clases en Siclo.com', $html, $headers);
	};
};
if( !function_exists('aceptar_gift_card') ){
	
	function aceptar_gift_card( $id_post = false ){
		global $current_user;
		
		$gif = get_post( $id_post );
		$meta = get_post_meta( $id_post );
		
		if( !isset($meta['_paquete']) || !isset($meta['_data']) ){
			echo '<h2>La gift card ha caducado</h2>';
			return;
		};
		$invitador	= $gif->post_author;
		$invitador = get_user_by('id', $invitador);
		
		$paquete	= unserialize( reset( $meta['_paquete'] ) );
		$invitado	= unserialize( reset( $meta['_data'] ) );
		
		sumar_clases( $current_user->ID, (int)$paquete->data['cantidad'] );
		
		echo 
		'<div class="pfr">'.
			'<div class="page_cron_gift">'.
				'<img src="'.plantilla(false).'/images/regalo.png"/>'.
				'<h2 class="color_gris2">Tu amigo <strong class="color_negro">'.$invitador->display_name.'</strong> te hizo un regalo</h2>'.
				'<h1 class="color_negro">'.$paquete->data['cantidad'].' clases en <span class="color_azul">Sí</span>clo</h1>'.
				'<hr/>'.
				'<p class="mensaje_invitador"><cite>'.$invitado['mensaje'].'</cite></p>'.
				'<a href="'.get_home_url().'?go_to=reserva" class="azul">Reservar ahora</a>'.
			'</div>'.
		'</div>';
		eliminar( $id_post );
	};
};
add_action('publish_cron_gift_card','cron_gift_card');

/*TARJETAS---------------------*/
if( !function_exists('metas_pedido') ){
	function guardar_tarjeta_en_user( $tarjeta = array(), $id_User = false ){
		if( !count( $tarjeta ) || !$id_User ){ return; };
		
		$tarjetas = get_tarjetas( $id_User );
		
		if( isset( $tarjetas[$tarjeta['token']] ) ){ return; };
		
		$tarjetas[$tarjeta['token']] = $tarjeta;
		update_user_meta( $id_User, '_tarjetas' , $tarjetas );
	};
};
if( !function_exists('metas_pedido') ){
	function eliminar_tarjeta_en_user( $tarjeta = false, $id_User = false ){
		if( !$tarjeta || !$id_User ){ return; };
		
		$tarjetas = get_tarjetas( $id_User );
		
		if( isset( $tarjetas[$tarjeta] ) ){
			unset( $tarjetas[$tarjeta] );
		};
		update_user_meta( $id_User, '_tarjetas' , $tarjetas );
	};
};

if( !function_exists('get_tarjetas') ){
	function get_tarjetas( $id_User = false ){
		if( !$id_User ){ return array(); };
		
		$t = get_user_meta($id_User, '_tarjetas', true);
		
		return $t ? $t : array();
	};
};
if( !function_exists('ajax_registro') ){
	function ajax_registro( $ajax = false, $user = false, $clase = false ){
		global $current_user;
		if( $ajax !== 'AJAX' ){
			echo '<!--DATA_AJAX-->';
			echo '<!--DATA_AJAXEND-->';
			return;
		};
		
		echo '<!--DATA_AJAX--><div id="data_en_asd">';
		
		$c  =  numero_clases_user( $user->ID );
		
		echo '<div id="en_calendario_ajax">';
			if(	$c===0	){
				tarjeta( $user );
				echo 
				'<script type="text/javascript">'.
					"$('.reservacion .primer_paso_check').removeClass('oculto');".
				'</script>';
			}else{
				if( $clase ){
					$clase = new Clase( $clase );
				};
				usuarioinfo( false, $user,true, $clase );
			}
		echo '</div>';
		echo '<div id="en_paquetes_ajax">';
			$checkout = new Checkout();
			$checkout->imprimir_paquetes_home( $user );
			if( get_user_meta($user->ID, 'ya_compro', true) ){
				echo 
				'<div id="remove_regalo"></div>';
			};
		echo '</div>';
		echo '<div id="gift_en_ajax">';
			$checkout = new Checkout( false, true );
			$checkout->imprimir_gift_home();
		echo '</div>';
		echo '<div id="textito_hover">';
			echo is_user_logged_in() ? 'HOLA! '.$current_user->display_name	: 'Login / Registrar';;
		echo '</div>';
		echo '<div id="nuevo_menu">';
			menu_web();
		echo '</div>';
		echo '</div><!--DATA_AJAXEND-->';
	};
};


/*METABOXES TEMPORALES*/
if( !function_exists('metas_pedido') ){
	function metas_pedido(){
		add_meta_box('data_pedidos','Info transaccion','data_pedidos','pedido');
	};
};

if( !function_exists('data_pedidos') ){
	function data_pedidos( $post ){
		require_once('functions/classes/conekta/Conekta.php');
		
		$idPedido = $post->ID;
		
		$transaccion	= get_post_meta($idPedido, 'transaccion', true);
		$respuesta		= unserialize( get_post_meta($idPedido, 'respuesta_transaccion', true) );
	};
};
add_action( 'add_meta_boxes_pedido', 'metas_pedido' );

/*QUITAR ELEMENTO DEL MENÚ INTERNO DE WP-ADMIN*/
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_node( 'new-content' );
	$wp_admin_bar->remove_node( 'comments' );
}

/*ADMINISTRADOR--------------------------------------------------------------------------------------------------------------------*/
add_filter( 'template_include', function( $template ) {
    if ( is_page( ADMINISTRADOR ) )
        require_once( "administrador/functions_admin.php" );
    return $template;
});
if( isset( $_POST['ajax_gafa'] ) ){
	require_once( "administrador/functions_admin.php" );
};


/*ROGELIO--------------------------------------------------------------------------------------------------------------------*/
require_once( "functions_rogelio.php" );

/*PRENSA-----------*/
function logos_de_prensa(){
	$logos = get_posts(array(
		'posts_per_page'	=> -1,
		'post_type'			=> 'logo_prensa',
		'fields'			=> 'ids',
	));
	if( !$logos ){ return; };
	echo '<div class="cont_logos_prensa">';
		foreach( $logos as $id ){
			$l = new Logo_prensa( $id );
			$l->imprimir_loop();
		};
	echo '</div>';
};
function print_prensa_loop(){
	$prensa = get_posts(array(
		'posts_per_page'	=> -1,
		'post_type'			=> 'post',
		'fields'			=> 'ids',
	));
	if( !$prensa ){ return; };
	foreach( $prensa as $id ){
		$l = new Entrada( $id );
		$l->imprimir_loop();
	};
};
/*------------------------------------Rafael*/
function cabecera( $clase = false ){
	$salon		= $clase ? new Salon( $clase->salon ) : false;
	$instructor	= $clase ? new Instructor( $clase->instructor ) : false;
	$ubicacion	= $clase ? new Ubicacion( $salon->ubicacion ) : false;
	$fecha		= isset( $clase->fecha ) ? date_i18n( 'l d \d\e F / h:i a', $clase->fecha ) : 'Sin especificar';
	?>
	<div class="biciblanco">
		<div class="row vertical-align">
	        <div class="paqinline1 text-left">
	            <small class="color_gris2 center-block">UBICACIÓN</small>
	        </div>    
	        <div class="paqinline2">
	            <hr>
	        </div>
	    </div>
	    <div class="row vertical-align">
	        <div class="col-xs-4">
	            <small class="color_negro datos nombre_ub_c"><strong><?= $ubicacion ? $ubicacion->nombre : '';?></strong></small>
	        </div>
	        <div class="col-xs-4 invisible">
	            <div class="row">
	                <div class="col-xs-4">
	                    <a href class="gris3 icon2"><img src="<?php plantilla()?>/images/iconos/mark.png"></a>
	                </div>
	                <div class="col-xs-4">
	                    <a href class="gris3 icon2"><img src="<?php plantilla()?>/images/iconos/mail.png"></a>
	                </div>
	                <div class="col-xs-4">
	                    <a href class="gris3 icon2"><img src="<?php plantilla()?>/images/iconos/phon.png"></a>
	                </div>
	            </div>
	        </div>
	        <div class="col-xs-4 invisible">
	            <a href class="text-center center-block btn boton2">MÁS INFO</a>
	        </div>
	    </div>
	    <div class="vertical-align">
	        <div class="paqinline1 text-left">
	            <small class="color_gris2">FECHA & HORA</small>
	        </div>    
	        <div class="paqinline2">
	            <hr>
	        </div>   
	    </div>
	    <div class="datos">
	        <small class="color_negro"><strong><?= $fecha;?></strong></small>
	    </div>
	    <div class="confirmacion">
	        <div class="item">
	            <div class="vertical-align">
	                <div class="paqinline3 text-left">
	                    <small class="color_gris2">INSTRUCTOR</small>
	                </div>    
	                <div class="paqinline4">
	                    <hr>
	                </div>   
	            </div>
	            <div class="datos d1">
	                <small class="color_negro"><strong><?= $instructor ? $instructor->nombre : '';?></strong></small>
	            </div>
	        </div> 
	        <div class="item">
	            <div class="vertical-align">
	                <div class="paqinline3 text-left">
	                    <small class="color_azul">NO. DE BICI</small>
	                </div>    
	                <div class="paqinline4">
	                    <hr>
	                </div>   
	            </div>
	            <div class="datos">
	                <small class="color_negro"><strong id="colocar_id_bici">--</strong></small>
	            </div>
	        </div>   
	    </div>
    </div>
	<?php
}
function registroinfo( $clase = false ){
	cabecera( $clase );
	acceso_siclo("AJAX", false, true);
}
function usuarioinfo( $x = false, $user = false, $boton = true, $clase = false ){
	global $current_user;
	if( $user ){
		$current_user = $user;
	};
	$c  =  numero_clases_user( $current_user->ID );
	$nombre=$current_user->display_name;
	$rest = substr($nombre, 0,3);
	$rest2 = substr($nombre,3);
	if(!$x==true){
		cabecera( $clase );
	}
	?>
        <div class="blanco text-center clases_nueva">
            <div class="cabecera">
                <span class="imp_nom">Bienvenido <span class="color_azul"><?php echo $rest; ?></span><?php echo $rest2; ?></span>  
                <br> 
                <small class="color_gris2"><span class="color_azul">Mi </span>cuenta</small>
            </div>
            <h5 class="clases_actuales"><?php echo $c; ?></h5>
            <span class="large">Clases</span>
            <div class="block_paquetes_ee"></div>
            <?php echo $boton ? '<a href type="submit" class="comprar_bici btn azul btn bot2 text-center center-block">CONFIRMAR AHORA</a>' : '';?>
        </div>
	<?php
}
function tarjeta( $user = false ){
	global $current_user;
	if( $user ){
		$current_user = $user;
	};
	$nombre=$current_user->display_name;
	?>
    <div class="tarjeta">
        <span class="center-block text-center color_gris1">Bienvenido <?php echo $nombre;?></span>
        <span class="center-block text-center color_gris2">Aprovecha nuestros paquetes y ponte a <span class="color_azul">rodar</span></span>
        <?php
			$checkout = new Checkout();
			$checkout->imprimir( $current_user );
        ?>
    </div>
	<?php
}
function menuabierto(){
	global $current_user;
	?>
		<div class="menuabierto azul2 text-center center-block">
			<div class="contmenu ">
				<span class="redes_en_abierto">
					<div class="itemmenu">
						<div class="medium color_blanco"><span class="spot"></span><?php redes_menu_abierto();?></div>
						<small class="color_gris1">Nuestras redes</small>
						<hr class="hrmenu center-block">
					</div>
				</span>
				<a href="<?php echo get_permalink( QUIENES_SOMOS );?>">
					<div class="itemmenu">
						<div class="medium color_blanco">¿Quiénes Somos?</div>
						<small class="color_gris1">Lo que somos</small>
						<hr class="hrmenu center-block">
					</div>
				</a>
				<a href="<?php echo get_home_url();?>/?go_to=reserva" data-go="reserva">
					<div class="itemmenu">
						<div class="medium color_blanco">Reservar</div>
						<small class="color_gris1">Reserva tu clase y ponte a rodar</small>
						<hr class="hrmenu center-block">
					</div>
				</a>
				<a href="<?php echo get_home_url();?>/?go_to=compra_class" data-go="compra_class">
					<div class="itemmenu">
						<div class="medium color_blanco">Comprar clases</div>
						<small class="color_gris1">Aprovecha nuestros paquetes y ponte a rodar.</small>
						<hr class="hrmenu center-block">
					</div>
				</a>
				<a href="<?php echo get_permalink( CHECKOUT );?>">
					<div class="itemmenu">
						<div class="medium color_blanco">Tarjeta de regalo</div>
						<small class="color_gris1">Regala Siclo.</small>
						<hr class="hrmenu center-block">
					</div>
				</a>
				<a href="<?php echo get_permalink( 38 );?>">
					<div class="itemmenu">
						<div class="medium color_blanco">Ubicación</div>
						<small class="color_gris1">Park Plaza</small>
						<hr class="hrmenu center-block">
					</div>
				</a>
				<a href="<?= get_post_type_archive_link('instructor');?>" data-go="equipo_canvas" data-another="<?php echo get_home_url();?>/?go_to=equipo_canvas">
					<div class="itemmenu">
						<div class="medium color_blanco">Instructores</div>
						<small class="color_gris1">Nuestro equipo de trabajo.</small>
						<hr class="hrmenu center-block">
					</div>
				</a>
				<a href="<?php echo get_permalink( TERMINOS );?>">
					<div class="itemmenu">
						<div class="medium color_blanco">Legales</div>
						<small class="color_gris1">Lo que debes saber</small>
						<hr class="hrmenu center-block">
					</div>
				</a>
				<a href="tel:5510784458">
					<div class="itemmenu">
						<div class="medium color_blanco">Contacto</div>
						<small class="color_gris1">(55)10 78 44 58</small>
						<hr class="hrmenu center-block">
					</div>
				</a>
				<?php
				$comprobar_login	= is_user_logged_in() ? 'Logout'	: 'Login';
				$href= is_user_logged_in()? wp_logout_url(get_home_url()): get_permalink(CUENTA_USUARIO);
				?>
				<a href="<?php echo $href; ?>">
					<div class="itemmenu">
						<div class="medium color_blanco"><?php echo $comprobar_login; ?></div>
						<small class="color_gris1"><br></small>
						<hr class="hrmenu center-block">
					</div>
				</a>
			</div>
		</div>
	<?php
}
function page_faqs(){
	$actual = 'tab3';
	if( is_page( TERMINOS ) ){
		$actual = 'tab1';
	}elseif( is_page( POLITICAS ) ){
		$actual = 'tab2';
	};
	?>
		<hr class="hrdown">
		<div class="col-md-2">
			<ul id="tabs">
			    <li><a id="tab1" class="<?php echo $actual === 'tab1' ? '' : 'inactive';?>">Términos & condiciones</a></li>
			    <hr>
			    <li><a id="tab2" class="<?php echo $actual === 'tab2' ? '' : 'inactive';?>">Políticas de privacidad</a></li>
			    <hr>
			    <li><a id="tab3" class="<?php echo $actual === 'tab3' ? '' : 'inactive';?>">Preguntas frecuentes</a></li>
			    <hr>
			</ul>
		</div>
		<div class="col-md-10">
			<div id="tab1c" class="content <?php echo $actual === 'tab1' ? '' : 'escondido';?>">
				<div class="medium"><?php
					$terminos = get_post( TERMINOS );
                	echo apply_filters('the_content',$terminos->post_content)
				?></div>
			</div>
			<div id="tab2c" class="content <?php echo $actual === 'tab2' ? '' : 'escondido';?>"><?php
					$politicas = get_post( POLITICAS );
                	echo apply_filters('the_content',$politicas->post_content)
				?></div>
			<div id="tab3c" class="content <?php echo $actual === 'tab3' ? '' : 'escondido';?>">
            	<?php
					$faqs = get_posts(array(
						'post_type'			=> 'faq',
						'posts_per_page'	=> -1,
						'order'				=> 'ASC',
					));
					if( $faqs ){
						foreach( $faqs as $k =>$faq ){
							echo 
							'<div class="faqitem">'.
								'<span class="large">'.($k+1).'. '.get_the_title( $faq->ID ).'</span>'.
								'<br>'.
								'<span class="medium color_gris1">'.apply_filters('the_content',$faq->post_content).'</span>'.
								'<img src="'.plantilla(false).'/images/barra.jpg" class="center-block img-responsive">'.
							'</div>';
						};
					};
				?>
			</div>
		</div>
    <?php
};
function get_video(){
	?>
		<section class="video">
			<video class="text-center center-block" poster="<?php plantilla()?>/images/video.jpg" controls>
			   <source src="movie.mp4" type="video/mp4">
			   <source src="movie.ogg" type="video/ogg">
			   Your browser does not support the video tag.
			</video>
		</section>
	<?php
}
function get_equipo(){
	$instructores = get_posts(array(
		'posts_per_page'	=> -1,
		'post_type'			=> 'instructor',
		'fields'			=> 'ids',
	));
	if( empty($instructores) ){ return; };
	?>
		<section class="equipo text-center">
			<big>Nuestro equipo</big>
			<!--div class="large" style="font-family:'gotham2';">La base <span class="color_azul">Si</span>clo es el equipo de instructores que nos enseñan a rodar.</div-->
			<div id="cont_cont_canvas">
				<img src="<?php plantilla()?>/images/equipo/flecha_i.png" width="80" height="87" class="canvas_e_i"/>
				<img src="<?php plantilla()?>/images/equipo/flecha_d.png" width="70" height="87" class="canvas_e_d"/>
				<div id="cont_canvas">
					<div id="equipo_canvas">
						<?php
						foreach( $instructores as $instructor ){
							$instructor = new Instructor( $instructor );
							$instructor->imprimir_en_canvas();
						};?>
					</div>
				</div>
			</div>
		</section>
	<?php
}
function compartir_codigo(){
	?>
		<div class="compartir">
			<span class="botleft"><a href="#"><img src="<?php plantilla()?>/images/botonfb.png"></a></span>
			<span class="botleft"><a href="#"><img src="<?php plantilla()?>/images/botontw.png"></a></span>
		</div>	
	<?php
}
function get_regale(){
	global $current_user;
	$nombre=$current_user->display_name;
	?>
    <sectiom id="section_gift_card"><?php 
        $checkout = new Checkout( false, true );
        $checkout->imprimir_gift_home();
    ?></section><?php
}
function generar_imagen_codigo( $codigo = false ){
	if( !$codigo ){ return; };
	
	$file_name	= urlencode( $codigo ).'.png';
	$ruta		= ABSPATH.'codigos_img/'.$file_name ;
	$url_ruta	= get_home_url().'/codigos_img/'.$file_name ;
	
	if( !file_exists( $ruta ) ){
		/*CREAMOS LA IMAGEN*/
		$imagen	= DESARROLLO ? str_replace('functions.php','\images\share\base_share_codigo.png',__FILE__) : str_replace('functions.php','images/share/base_share_codigo.png',__FILE__);
		$font	= DESARROLLO ? str_replace('functions.php','\fonts\GothamRnd-Medium.otf',__FILE__) : str_replace('functions.php','fonts/GothamRnd-Medium.otf',__FILE__);
		
		$im = imagecreatefrompng( $imagen );
		
		$ct		= imagecolorallocate($im, 255, 255, 255);
		imagettftext ($im, 35, 0, 610, 458, $ct, $font,$codigo);/*crear texto*/
		imagepng($im,$ruta,9);/*crear imagen*/
		
		imagedestroy($im);/*liberamos memoria*/
	};
	return $url_ruta;
};
function get_codigo( $user_id = false ){
	if( !$user_id ){ return; };
	
	$codigo = get_user_meta($user_id,'codigo_descuento',true);
	
	if( !$codigo ){
		$codigo = hash ( 'crc32b', $user_id );
		update_user_meta($user_id,'codigo_descuento',$codigo);
	};
	
	return $codigo;
};
function print_codigo_descuento(){
	global $current_user;
	if( !is_user_logged_in() ){ return; };
	$codigo = get_codigo( $current_user->ID );
	?>
    <section id="codigo_promocional">
    	<h1 class="large center-block aprovecha_h2">¡Comparte y rueda con tus amigos!</h1>
        <p class="center-block aprovecha_h3"><strong>Nuevo usuario:</strong> Recibe un descuento de $50 pesos en tu primera clase utilizando el código de un amigo.</p>
        <p class="center-block aprovecha_h3"><strong>Usuarío registrado:</strong> Por cada 5 nuevos usuarios que reserven su primera clase utilizando tu código nosotros te regalamos la siguiente.</p>
        <div class="gris cuadro_codigo">
        	<?= $current_user->display_name.', tu <span class="color_azul">código</span> es: <span class="cuadrito">'.$codigo.'</span>'.
			'<img src="'.plantilla(false).'/images/redes/separador_codigo.png" class="separador_codigo"/>'.
            '<a href="https://www.facebook.com/sharer/sharer.php?u='.urlencode( get_author_posts_url( $current_user->ID ) ).'" class="compartir_codig" target="_blank"><img src="'.plantilla(false).'/images/botonfb.png"></a>'.
            '<a href="https://twitter.com/home?status='.urlencode( 'Unete a Síclo conmigo.
Usa este código '.$codigo.' y te regalamos $50 extras en tu primera clase. '.get_home_url() ).'." class="compartir_codig" target="_blank"><img src="'.plantilla(false).'/images/botontw.png"></a>';?>
        </div>
    </section>
    <hr>
    <?php
};
/*SISTEMA DE CONTRASEÑA*/
function cambio_contrasenna_proceso( $pass_1 = false, $pass_2 = false ){
	global $current_user;
	
	if( !is_user_logged_in() || !$pass_1 || !$pass_2 ){
		die( json_encode(array(
			'ok'		=> false,
			'mensaje'	=> 'ERROR: 6969',
		) ) );
	};
	if( $pass_1 !== $pass_2 ){
		die( json_encode(array(
			'ok'		=> false,
			'mensaje'	=> 'Las contraseñas no coinciden',
		) ) );
	};
	$pass_user	= strip_tags( $pass_1 );
	
	if( $pass_user && $pass_user != '' ){
		/*CAMBIAMOS LA CONTRASEÑA---------------------------------------------------------------------*/
		wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => $pass_user ) );
		mail_password_reset($current_user, $pass_user);
	}else{
		die( json_encode(array(
			'ok'		=> false,
			'mensaje'	=> 'La contraseña no puede ser un valor vacío',
		) ) );
	};
	
	die( json_encode(array(
		'ok'		=> true,
		'mensaje'	=> 'Tu contraseña ha sido cambiada correctamente',
	) ) );
};
function ordernar_reservas_por_bici($c1, $c2){
	$una = new Reserva( $c1->ID );
	$dos = new Reserva( $c2->ID );
	
	$a = (int)$una->get_id_bici_front();
	$b = (int)$dos->get_id_bici_front();
	
	if ($a == $b) {
		return 0;
	};
	return ($a < $b) ? -1 : 1;
};
/*CRON EXPIRACION*/
add_action( 'init', 'get_clases_no_expiradas' );
function get_clases_no_expiradas(){
	$fecha_cron_expiracion = get_option('fecha_cron_expiracion');
	
    /*COMPROBAMOS si CRON ya se corrió*/
	$now  = current_time('Y-m-d');
	if( $now >= $fecha_cron_expiracion ){ return; };
	
    $users  = get_users();
    foreach  ($users as $user) {
			$validClassesPerUser = array();
            $clases = numero_clases_user( $user->ID, true );

            foreach ($clases as $clase)
            {
                $claseDateTime = $clase;
                $isExpired = $now > $claseDateTime;
				
                //echo ($isExpired ? " CADUCADA " : " SIRVE ");
                if(!$isExpired)
                {
                    $validClassesPerUser[] = $clase;
                }
            }
			update_user_meta( $user->ID,'cantidad_clases',$validClassesPerUser );
     }
	 update_option('fecha_cron_expiracion',$now);
}
