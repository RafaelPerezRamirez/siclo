<?php
class Menu{
	private $role;
	private $menus;
	
	function __construct( $role = 0 ){
		
		$this->role = $role;
		$this->menus= $this->get_menus();
	}
	public function get_role(){
		return $this->role;
	}
	public function print_menu(){
		echo '<div id="menu_sup">';
			echo '<div class="menu_d">';
			$this->menu_user();
			echo '</div>';
			logo_web();
		echo '</div>';
		$this->print_second_menu();
		$this->print_recipientes();
	}
	private function menu_user(){
		if( !is_user_logged_in() ){ return; };
		
		global $current_user;
		$name_rol = get_role_name( $this->role );
		echo $name_rol ? '<div class="role">'.$name_rol[0].'</div>' : '';
		echo '<div class="menu_u_ad">';
			echo '<strong>'.$current_user->display_name.'</strong>';
			echo $current_user->user_email;
		echo '</div>';
		echo '<a href="'.wp_logout_url( get_home_url() ).'">Logout</a>';
	}
	private function get_menus(){
		$menus = array(
			'estudios'	=> array(
				'titulo'	=> '<img src="'.imagenes(false).'/icon1.png" class="imx"> <span>Estudios</span>',
				'cap'		=> 3,
				'accion'	=> array(
					'funcion'	=> 'menu_ubicaciones',
					'attr'		=> false,
				),
				'recipiente'	=> 'lista_ubicaciones',
			),
			'usuarios'	=> array(
				'titulo'	=> '<img src="'.imagenes(false).'/icon2.png" class="imx"> <span>Usuarios</span>',
				'cap'		=> 3,
				'accion'	=> array(
					'funcion'	=> 'menu_usuarios',
					'attr'		=> 'ver_opciones_usuario',
				),
				'recipiente'	=> 'lista_usuarios',
			),
			'instructores'	=> array(
					'titulo'	=> '<img src="'.imagenes(false).'/icon3.png" class="imx"> <span>Instructores</span>',
					'cap'		=> 4,
					'accion'	=> array(
						'funcion'	=> 'menu_instructores',
						'attr'		=> false,
					),
					'recipiente'	=> 'lista_instructores',
			),
			'reservaciones'	=> array(
					'titulo'	=> '<img src="'.imagenes(false).'/icon4.png" class="imx"> <span>Reservaciones</span>',
					'cap'		=> 3,
					'accion'	=> array(
						'funcion'	=> 'panel_reservaciones',
						'attr'		=> false,
					),
					'recipiente'	=> 'lista_reservaciones',
			),
			'menu_lista_nueva_reservacion'	=> array(
					'titulo'	=> '<img src="'.imagenes(false).'/icon5.png" class="imx"> <span>Nueva reservacion</span>',
					'cap'		=> 3,
					'accion'	=> array(
						'funcion'	=> 'menu_usuarios',
						'attr'		=> 'editar_reserva',
					),
					'recipiente'	=> 'lista_nueva_reservacion',
			),
			'menu_nueva_compra'	=> array(
				'titulo'	=> '<img src="'.imagenes(false).'/icontienda.png" class="imx"> <span>Tienda</span>',
				'cap'		=> 3,
				'accion'	=> array(
					'funcion'	=> 'menu_usuarios',
					'attr'		=> 'nueva_compra',
				),
				'recipiente'	=> 'lista_nueva_compra',
			),
			'menu_iframe'	=> array(
				'titulo'	=> '<img src="'.imagenes(false).'/iconpro.png" class="imx"> <span>Productos</span>',
				'cap'		=> 2,
				'accion'	=> array(
					'funcion'	=> 'menu_iframe',
					'attr'		=> false,
				),
				'recipiente'	=> 'panel_final',
			),
			'menu_metricas'	=> array(
					'titulo'	=> '<img src="'.imagenes(false).'/metricas.png" class="imx"> <span>Métricas</span>',
					'cap'		=> 1,
					'accion'	=> array(
						'funcion'	=> 'metricas_web',
						'attr'		=> false,
					),
					'recipiente'	=> 'lista_metricas',
			),
			'menu_configura'	=> array(
					'titulo'	=> '<img src="'.imagenes(false).'/icon10.png" class="imx"> <span>Configuraciones</span>',
					'cap'		=> 1,
					'accion'	=> array(
						'funcion'	=> 'configuraciones_web',
						'attr'		=> false,
					),
					'recipiente'	=> 'lista_configuraciones',
			),
		);
		
		foreach( $menus as $k=>$m ){
			if( $m['cap'] < $this->role || $this->role == 0 ){
				unset( $menus[$k] );
			};
		};
		return $menus;
	}
	private function print_second_menu(){
		$menus = $this->menus;
		if( !$menus ){ return; };
		echo '<div id="submenu_ad">';
			foreach( $menus as $id=>$m ){
				print_single_option( $id, $m );
			};
		echo '</div>';
	}
	private function print_recipientes(){
		echo '<div id="recipientes">';
			iniciar_recipientes();
		echo '</div>';
	}
}
?>