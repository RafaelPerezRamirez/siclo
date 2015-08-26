<?php get_header();
if( is_user_logged_in() && !isset( $_GET['codigo_activacion'] ) ){
	interior_cuenta();
	
}else{
	acceso_siclo("", false, true);
};
get_footer();?>