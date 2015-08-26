<?php require_once('../../../../../wp-load.php');
global $current_user;

$mensajes = new Mensajes();

if( !isset( $_POST['security'] ) || !isset( $_POST['codigo'] ) || !is_user_logged_in() ){
	$mensajes->add_error('6969');
	die( $mensajes->imprimir('JSON') );
};

$codigo			= $_POST['codigo'];
/*
**COMPROBAMOS QUE EL CÓDIGO SEA DE CUPÓN - En caso de no serlo comprobaremos que sea de usuario
*/
$cupon				= new Cupon($codigo);
$datos_class_cupon	= $cupon->get_mensajes();
if( $datos_class_cupon->ok ){
	/*ES UN CUPÓN*/
	
	$cupon->aplicar_cupon();
	$datos_class_cupon	= $cupon->get_mensajes();
	
	if( !$datos_class_cupon->ok ){
		$mensajes->add_error( $datos_class_cupon->get_lista_mensajes() );
	}else{
		$mensajes->add_mensaje( $datos_class_cupon->get_lista_mensajes() );
		/*AHORA VAMOS A RECARGAR LOS PAQUETES*/
		ajax_registro('AJAX',$current_user);
	};
}else{
	/*NO ES CUPÓN, COMPROBAMOS USUARIOS*/
	/*
	**PRIMERO COMPROBAREMOS QUE EL USUARIO SEA APTO
	*/
	if( !get_user_meta( $current_user->ID, 'ya_compro', true) ){
		/*CHECK USUARIO*/
		$user = reset(get_users(
			array(
				'meta_key'		=> 'codigo_descuento',
				'meta_value'	=> $codigo,
				'number'		=> 1,
				'count_total'	=> false
			)
		));
		if( $user ){
			/*
			**VAMOS A COMPROBAR 
			**QUE EL USUARIO NO SEA SI MISMO
			*/
			if( $user->ID == $current_user->ID ){
				$mensajes->add_error( 'No puedes aplicarte descuentos a tí mismo' );
			}else{
				/*
				**VAMOS A APLICAR EL DESCUENTO AL USUARIO
				**QUE ESTÁ COMPRANDO
				*/
				update_user_meta($current_user->ID,'codigo_aplicado',$codigo);
				$mensajes->add_mensaje( 'Se te ha aplicado correctamente el descuento' );
			};
		}else{
			/*NO HAY USUARIOS CON ESE CÓDIGO*/
			$mensajes->add_error('Ese Código no existe');
		};
	}else{
		$mensajes->add_error('Este código no se aplica a tí ya que has realizado una compra previa');
	};
};

die( $mensajes->imprimir('JSON') );
?>