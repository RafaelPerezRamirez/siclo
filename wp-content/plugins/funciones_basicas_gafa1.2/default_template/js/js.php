<script type="text/javascript">// <![CDATA[
var $,$window,ajax_GF;
var iniciada = false;

$window = jQuery(window);
/*ERRROR GAFA--------------------------------------------------------------------*/
var elementoErrorGF = '.gafa-mensaje,.gafa-error';var errorGafa=function(texto, clase){ clearTimeout(timer); jQuery(elementoErrorGF).remove(); switch(clase){ case 'inicio': if(jQuery(elementoErrorGF).length==0){ jQuery('body').append('<div class="gafa-mensaje" style="top:0px"><h1>Procesando...</h1></div>'); }; break; case 'fijo': if(jQuery(elementoErrorGF).length==0){ jQuery('body').append('<div class="gafa-mensaje" style="top:0px"><h1>Notificación</h1>'+texto+'</div>'); }; break; case 'conexion': return; jQuery('body').append('<div class="gafa-error"><h1>Error de conexión</h1>Lo sentimos, algo hicimos mal. Inténtalo en 15 minutos.</div>'); funcionElementoError(); break; default: var classe=clase; if(clase==undefined||clase==''){ classe='error'; }; if( classe=='error' ){ texto= '<h1>¡Alerta!</h1>'+texto; }else{ texto= '<h1>Notificación</h1>'+texto; }; jQuery('body').append('<div class="gafa-'+classe+'">'+texto+'</div>'); funcionElementoError(); break; };};alert=errorGafa;var timer;var funcionElementoError= function(){ if (jQuery(elementoErrorGF).length!=0){ jQuery(elementoErrorGF).animate({top:0},500); jQuery(elementoErrorGF).attr('title','Elimina este mensaje'); timer= setTimeout(function(){ if(jQuery(elementoErrorGF).length!=0){ jQuery(elementoErrorGF).fadeOut('fast',function(){ jQuery(elementoErrorGF).remove(); }); }; },8000); };};jQuery(document).ready(function(){ jQuery('body').on('click',elementoErrorGF,function(){ jQuery(elementoErrorGF).fadeOut('slow',function(){ jQuery(elementoErrorGF).remove(); clearTimeout(timer); }); });});
/*ERRROR GAFA FIN--------------------------------------------------------------------*/
/*PREGUNTA GAFA--------------------------------------------------------------------*/
function crear_pregunta( texto,info,callback,legal, false_function, data_false ){ cargando(); if( !legal ){ legal = ''; }; if( !$('#pregunta_gafa').length ){ $('#pregunta_gafa').remove(); }; $('body').append('<div id="pregunta_gafa">'+texto+'<br/><div id="aceptar_pregunta_gafa" class="boton">Aceptar</div><div id="cancelar_pregunta_gafa" class="boton">Cancelar</div><br/><small>'+legal+'</small></div>'); /*ACEPTAR*/ $('#aceptar_pregunta_gafa').one('click',function(){ $('#pregunta_gafa').remove(); borrar_Cargando(); callback( info ); }); /*CANCELAR*/ $('#cancelar_pregunta_gafa').one('click',function(){ $('#pregunta_gafa').remove(); if( false_function ){ false_function( data_false ); }; borrar_Cargando(); }); };
/*PREGUNTA GAFA FIN--------------------------------------------------------------------*/
/*CARGANDO GAFA--------------------------------------------------------------------*/
function cargando(id){ if(id){ if($('#'+id).length<1){ $('body').append('<div id="'+id+'" class="cover" style="display:none;"></div>'); $('#'+id).fadeIn(); }; }else{ if($('#cargando').length<1){ $('body').append('<div id="cargando" class="cover" style="display:none;"></div>'); $('#cargando').fadeIn(); }; }; }; function borrarCargando(id){ if(id){ if($('#'+id).length>=0){ $('#'+id).fadeOut('fast',function(){ $('#'+id).remove(); }); }; }else{ if($('#cargando').length>=0){ $('#cargando').fadeOut('fast',function(){ $('#cargando').remove(); }); }; }; };
/*CARGANDO GAFA FIN--------------------------------------------------------------------*/

jQuery(document).ready(function(){
	$ = jQuery;
	
	$('[data-link]').on('click',function(){
		document.location.href = $(this).data('link');
	});
	
	/*INICIO*/
	$window.resize(configurar_Web);
	iniciar_Web();
});

function iniciar_Web(){
	configurar_Web();
	
	iniciada = true;
};
function configurar_Web(){
	
};
function config_contenido( element ){
	var alto = $window.height() - $('#menu_sup').outerHeight();
	
	if( element.length == 1 ){
		procesar( element )
	}else{
		$( element ).each(function(i, e) {
            procesar( $(e) );
        });
	};
	function procesar( este ){
		este.removeAttr('style');/*RESET*/
		este.css( 'min-height',alto );
		if( este.height() == alto ){
			este.removeAttr('style');/*RESET*/
			este.outerHeight( alto );
		};
	};
};

// ]]></script>