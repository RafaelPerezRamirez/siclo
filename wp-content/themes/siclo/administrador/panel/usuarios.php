<div id="usuarios_menu" class="panel panel_normal panel_doble">
	<header>
    	<div class="buscador_usuarios">USUARIOS REGISTRADOS</div>
    	<div data-accion='<?php echo json_encode(array(
			'funcion'	=> 'ver_opciones_usuario',
			'attr'		=> false,
		));?>' data-recipiente='panel_final' class="esconder_hijos buscador_usuarios b_u2">Agregar nuevo usuario +</div>
    </header>
    <?php sistema_filtros( array( 'lista_usuarios' ) );?>
</div>