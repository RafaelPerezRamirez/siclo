<?php global $admin;?>
<div id="instructores_menu" class="panel panel_normal panel_doble">
	<header>
    	<div class="buscador_usuarios">Lista de todos los instructores</div>
        <?php if( $admin->permisos('Administrador') ){?>
            <div data-accion='<?php echo json_encode(array(
                'funcion'	=> 'ver_datos_instructor',
                'attr'		=> false,
            ));?>' data-recipiente='panel_final' class="esconder_hijos buscador_usuarios">Agregar nuevo instructor +</div>
		<?php };?>
    </header>
    <?php sistema_filtros( array( 'lista_instructores' ) );?>
</div>
