<div id="reservaciones_menu" class="panel panel_normal panel_doble">
	<header>
    	<div class="filtro_busqueda buscador_usuarios" data-buscar="filtrado_ubicacion">Ubicación</div>
    	<div class="filtro_busqueda buscador_usuarios" data-buscar="filtrado_instructor">Instructor</div>
    	<div class="filtro_busqueda buscador_usuarios" data-buscar="filtrado_usuario">Usuario</div>
    </header>
    <?php sistema_filtros( array( 'lista_reservaciones' ) );?>
    <div class="panel panel_normal"><header>Selecciona el salón</header><div id="cont_reservacion_ubi"></div></div>
</div>