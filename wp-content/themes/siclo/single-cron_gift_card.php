<?php get_header();
global $post;
$id_post = $post->ID;

if( is_user_logged_in() ){
	aceptar_gift_card( $id_post );
}else{
	acceso_siclo( $id_post, false, true );
};
get_footer();?>