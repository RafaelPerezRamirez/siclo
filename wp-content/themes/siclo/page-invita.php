<?php get_header();
global $current_user;
if( is_user_logged_in() ){
	echo 'Invita a DOS de tus amigos y <strong class="color_n_claro">TE REGALAMOS</strong> una clase en el momento en el que ellos paguen la primera.<br/>Queremos que TODOS rodemos juntos, empecemos a invitar.';
		echo '<div class="form_invita form_siclo">';
			$inputs = array(
				'invitado_1'	=> array(
					'type'			=> 'email',
					'value'			=> '',
					'placeholder'	=> 'Mail de un amigo'
				),
				'invitado_2'	=> array(
					'type'			=> 'email',
					'value'			=> '',
					'placeholder'	=> 'Mail de un amigo'
				),
			);
			print_inputs( $inputs );
			
			/*SALVAR*/
			echo '<div id="invitar_amigos" class="boton n_claro">¡Todos a rodar!</div>';
		echo '</div>';
		
		imprimir_lists_invitados( $current_user->ID );
}else{
	acceso_siclo( INVITA );
};
get_footer();?>