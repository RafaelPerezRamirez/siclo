<script type="text/javascript">
"use strict";

var ajax_admin;
$(document).ready(function(){
	/*ACCION PRINCIPAL*/
	$('body').on('click','[data-accion]',do_action);
	
	iniciar_admin();
	
	function iniciar_admin(){
		$('[data-id="estudios"]').trigger('click');
	};
	function do_action(){
		if( $(this).is('.viendo') || $(this).is('.actualmente') ){ return; };
		
		if( ajax_admin ){
			ajax_admin.abort();
		};
		var data		= $(this).data();
		
		if( es_funcion_js( data ) ){ return; };
		
		var recipiente	= $('#'+data.recipiente);
		
		/*RESETEO DEL MENU*/
		$('.viendo').removeClass('viendo');
		
		$(this).closest('.panel, #submenu_ad').find('.usando').removeClass('usando');
		$(this).addClass('viendo').addClass('usando');
		
		
		/*SET AJAX: SINO NO FUNCIONAN LAS DEL ADMIN*/
		data.accion.ajax_gafa = true;
		ajax_admin = $.post('<?php admin()?>/procesos/do_action.php',data.accion).done(function(d){
			var info = JSON.parse( d );
			if( !info || !info.ok ){
				alert( info.mensaje );
				return;
			};
			recipiente.html( info.data );
			
			abrir_panel( recipiente );
		});
	};
	function es_funcion_js( data ){
		if( !data ){ return true; };
		var ok = false;
		
		if( typeof data.accion.tipo != 'undefined' ){
			hacer_js( data );
			ok =true;
		};
		return ok;
	};
	function hacer_js( data ){
		console.log( data.accion.funcion );
		eval( data.accion.funcion+'('+data.accion.attr+')' );
	};
	function abrir_panel( recipiente ){
		/*FUNCION PARA OCULTAR Y ABRIR PANELES*/
		$('.panel').removeClass('panel_abierto');
		recipiente.parents('.panel').addClass('panel_abierto');
	};
	function abrir_panel_from_id( id ){
		console.log('haciendo js');
		console.log( id );
		return;
		$('#'+id).addClass('panel_abierto');
	}
});

</script>