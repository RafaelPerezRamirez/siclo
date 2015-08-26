<?php
class Admin{
	protected $role;
	protected $menu;
	
	function __construct(){
		
		$this->role = $this->set_role();
		$this->menu = new Menu( $this->role );
	}
	private function set_role(){
		global $current_user;
		if( !is_user_logged_in() ){ return 0; };
		
		return (int)get_user_meta( $current_user->ID,'rol',true );
	}
	public function get_role(){
		return $this->menu->get_role();
	}
	private function ver_admin(){
		return $this->role > 0 ? true : false;
	}
	public function permisos( $capabilities = 'Cliente' ){
		$key_rol = (int)$this->get_role_key( $capabilities );
		
		if( !$key_rol ){ return false; };
		
		return $key_rol >= $this->role ? true : false;
	}
	private function get_role_key( $value = 'Cliente' ){
		global $roles;
		
		return array_search($value,$roles);
	}
	public function iniciar(){
		
		if( !is_user_logged_in() ){
			/*FORMULARIO DE ACCESO*/
			$this->get_header();
			acceso_siclo( ADMINISTRADOR );
		}elseif( !$this->ver_admin() ){
			/*SI ES UN USUARIO NO ADMINISTRADOR LO MANDAMOS A TOMAR POR C...*/
			header("Location: ".get_home_url());
			die();
		}else{
			$this->get_header();
			$this->imprimir_back();
		};
	}
	public function fin(){
		get_footer();
	}
	private function get_header(){
		require_once("header.php");
	}
	private function imprimir_back(){
		require_once("panel/home.php");
	}
};
?>