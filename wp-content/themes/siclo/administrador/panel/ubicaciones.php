<?php global $admin;?>
<div id="ubicaciones_menu" class="panel panel_normal">
	<header>Selecciona el estudio</header>
    <div id="lista_ubicaciones"></div>
    <?php if( $admin->permisos( 'Gafa' ) ){ ?>
        <footer data-accion='<?php echo json_encode(array(
            'funcion'	=> 'html_configuracion_salon',
            'attr'		=> false,
        ));?>' data-recipiente='panel_final' class="esconder_hijos"><hr class="hrcorto">Agregar nuevo estudio +</footer>
	<?php };?>
    <?php sub_salones();?>
</div><?php

function sub_salones(){
	global $admin;?>
	<div id="ubicaciones_menu_salon" class="panel panel_normal">
        <header>Selecciona el salón</header>
        <div id="lista_salones_ubi"></div>
		<?php if( $admin->permisos( 'Gafa' ) ){ ?>
            <footer data-accion='<?php echo json_encode(array(
                'funcion'	=> 'crear_salon',
                'attr'		=> false,
                'tipo'		=> 'js',
                'referencia'=> '#lista_ubicaciones .usando',
            ));?>' data-recipiente='lista_salones_ubi'><hr class="hrcorto"/>Agregar nuevo salón +</footer>
        <?php };?>
        <div id="opciones_del_salon" class="panel panel_normal">
            <header>INFORMACIÓN DEL SALON</header>
            <?php 
				$opciones = array(
					'mapa_salon'	=> array(
						'titulo'	=> '',
						'cap'		=> 2,
						'accion'	=> array(
							'funcion'	=> 'ver_mapa_del_salon',
							'attr'		=> false,
							'tipo'			=> 'js',
							'referencia'	=> '.salon_lista.usando',
						),
						'recipiente'	=> 'panel_final',
						'class'			=> 'opcion_salon',
					),
					'calendario_salon'	=> array(
						'titulo'	=> '',
						'cap'		=> 3,
						'accion'	=> array(
							'funcion'	=> 'ver_calendario_salon',
							'attr'		=> false,
							'tipo'			=> 'js',
							'referencia'	=> '.salon_lista.usando',
						),
						'recipiente'	=> 'panel_final',
						'class'			=> 'opcion_salon',
					),
					'reservaciones_salon'	=> array(
						'titulo'	=> '',
						'cap'		=> 3,
						'accion'	=> array(
							'funcion'	=> 'ver_reservaciones_salon',
							'attr'		=> false,
							'tipo'			=> 'js',
							'referencia'	=> '.salon_lista.usando',
						),
						'recipiente'	=> 'panel_final',
						'class'			=> 'opcion_salon',
					),
				);
				foreach( $opciones as $id=>$m ){
					if( $m['cap'] < $admin->get_role() || $admin->get_role() == 0 ){
						continue;
					};
					print_single_option( $id, $m );
				};
			?>
        </div>
    </div>
    <?php
};

?>