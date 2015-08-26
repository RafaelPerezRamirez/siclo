<?php
/*Plugin Name: Funciones de arranque GAFA v1.2*/
global $movil;

/*ARRANQUE DE FUNCIONES*/
require_once(dirname( __FILE__ ) ."/functions/inicio.php");

/*FUNCIONES LOGIN*/
if( !function_exists('nuevo_logo') ){
	function nuevo_logo() { ?>
		<style type="text/css">
			body.login div#login h1 a {
				background-image: url("<?php plantilla();?>/images/header/logo.png");
				padding-bottom: 30px;
				background-position: center;
				width: 100%;
				background-size: 50%;
			}
			#nav {
				display: none;
			}
			body{
				background-color: #FFC900;
			}
		</style>
	<?php }
};
add_action( 'login_enqueue_scripts', 'nuevo_logo' );
if( !function_exists('M_my_login_logo_url') ){
	function M_my_login_logo_url() {
		return home_url();
	};
};
add_filter( 'login_headerurl', 'M_my_login_logo_url' );
if( !function_exists('M_my_login_logo_url_title') ){
	function M_my_login_logo_url_title() {
		return 'Retornar al home';
	};
};
add_filter( 'login_headertitle', 'M_my_login_logo_url_title' );

/*CAMBIAR MAILS*/

add_filter( 'wp_mail_from', 'fb_mail_from' );
add_filter( 'wp_mail_from_name', 'fb_mail_from_name' );

// new name
if( !function_exists('fb_mail_from_name') ){
	function fb_mail_from_name() {
		$name = 'Becara México';
		// alternative the name of the blog
		// $name = get_option('blogname');
		$name = esc_attr($name);
		return $name;
	}
};
if( !function_exists('fb_mail_from') ){
	// new email-adress
	function fb_mail_from() {
		$email = 'info@becara.mx';
		$email = is_email($email);
		return $email;
	}
};
/*QUITAR CSS DEL HEADER*/
add_action('get_header', 'quitar_margin');
if( !function_exists('quitar_margin') ){
	function quitar_margin() {
		remove_action('wp_head', '_admin_bar_bump_cb');
	};
};
/*FUNCIONES GAFA*/
if( !function_exists('mario') ){
	function mario($texto = '' , $print = true){
		global $current_user;
		if( is_user_logged_in() && 'administrator' == $current_user->roles[0] ){
			$text = '';

			$text .= '<pre class="mario_dev">';
			$text .=print_r($texto, true);
			$text .='</pre>';
			if( $print ){
				echo $text;
			}else{
				return $text;
			};
		};
	};
};
if( !function_exists('plantilla') ){
	function plantilla($echo=true){
		if( $echo ){
			echo get_template_directory_uri();
		}else{
			return get_template_directory_uri();
		};
	};
};
if( !function_exists('get_is_mobile') ){
	function get_is_mobile(){
		global $movil;
		//mobile browsers
		$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
		$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
		$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
		$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
		$iemobile = ( strpos($_SERVER['HTTP_USER_AGENT'],"iemobile") || strpos($_SERVER['HTTP_USER_AGENT'],"IEMobile") );

		if ( (($iphone || $android || $palmpre || $ipod || $berry !== FALSE || $iemobile) === true) )  {
			$movil = true;
		}else{
			$movil = false;
		};
	};
};
get_is_mobile();


function quitar_barra_administracion(){
    return false;
}
add_filter( 'show_admin_bar' , 'quitar_barra_administracion');

/* Revisar Admin */
function sera_admin(){
	if( is_admin() && isset( $current_user->data->ID ) ){
		global $current_user;
		$role = $current_user->roles;
		if( isset( $role[0] ) && $role[0] != 'administrator'){
			wp_redirect(get_home_url());
			exit;
		};
	};
};
add_action('admin_init','sera_admin');

class Mensajes{
	public $ok;
	public $mensajes;
	public $escribir;
	private $data;

	function __construct( $print = true ){
		$this->ok		= true;
		$this->mensajes	= array();
		$this->data		= array();
		$this->escribir	= $print;
	}
	public function add_mensaje( $mensaje = false ){
		if( !$mensaje ){ return; };

		$this->mensajes[] = $mensaje;
	}
	public function add_error( $mensaje = false ){
		if( !$mensaje ){ return; };

		$this->ok = false;
		$this->mensajes[] = $mensaje;

	}
	public function get_lista_mensajes(){
		$texto = '';

		foreach( $this->mensajes as $m ){
			$texto .= '<p>'.$m.'</p>';
		};
		return $texto;
	}
	public function imprimir( $JSON = false, $force = false ){
		if( !count( $this->mensajes ) && $force === false ){ return; };
		$texto	= $this->get_lista_mensajes();
		$tipo	= $this->ok ? 'mensaje' : 'error';

		$a_devolver = '<script type="text/javascript">alert("'.$texto.'","'.$tipo.'");</script>';

		if( $JSON !== false ){
			echo json_encode(array(
				'ok'		=> $this->ok,
				'mensaje'	=> $texto,
				'data'		=> $this->data,
			));
		}else{
			if( $this->escribir ){
				echo $a_devolver;
			}else{
				return $a_devolver;
			};
		};
	}
	public function add_data( $data = false, $force = false ){
		if( !$data ){ return; };
		if( $force ){/*SOBREESCRIBE LA INFO*/
			$this->data		= $data;
		}else{
			$this->data[]	= $data;
		};
	}
}
