<script type="text/javascript">
//"use strict";

var ajax_admin,
_custom_media,
_orig_send_attachment,testing,do_proceso;

var admin_href = '<?php admin();?>';

/*IMAGENES*/
jQuery(document).ready(function($){
	_custom_media = true,
	_orig_send_attachment = wp.media.editor.send.attachment;
	$('#panel_final').on('click','.b_d-attach',function(e) {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id');
		_custom_media = true;

		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media ) {
				button.attr('data-value',attachment.url).css('background-image','url('+attachment.url+')');
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			};
		}

		wp.media.editor.open(id);
		return false;
	});

	$('body').on('click','.add_media', function(){
		_custom_media = false;
	});
});



$(document).ready(function(){
	/*COMPRA BACK*/
	$('body').on('click','.paquete_compra.paquete',function(){
		$('.seleccionado').removeClass('seleccionado');
		$(this).addClass('seleccionado');
		/*MOSTRAMOS BLOQUE TARJETAS*/
		mostramos_bloque_compra();
	});
	$('body').on('keyup','.producto_cantidad',function(){
		var valor = parseInt( $(this).val() );
		$(this).val( valor );
		
		mostramos_bloque_compra();
	});
	/*
	**Esta función va a probar si está o no el último paso de compra
	*/
	function mostramos_bloque_compra(){
		var paquete_seleccionado	= $('.paquete_compra.paquete.seleccionado').length ? true : false;
		var productos_comprados		= get_productos_comprados();
		
		if( paquete_seleccionado || productos_comprados.length > 0 ){
			configurar_precio_final( paquete_seleccionado, productos_comprados );
			$('.bloque_para_finalizar').show(0);
		}else{
			$('.bloque_para_finalizar').hide(0);
		};
	}
	/*
	**Esta función nos muestra un subtotal de la compra
	*/
	function configurar_precio_final( paquete_seleccionado, productos_comprados ){
		var contenedor	= $('#resumen_compra');
		var maqueta		= 
		'<div class="resumen_producto">'+
			'<span class="titulo_pp"></span>'+
			'<span><span class="foto_pp"></span></span>'+
			'<span class="precio_unitario_pp"></span>'+
			'<span class="cantidad_pp"></span>'+
			'<span class="precio_pp"></span>'+
		'</div>';
		var subtotal = 0;
		/*
		**RESETEOS
		*/
		contenedor.html('');
		
		/*
		**INTEGRAMOS PAQUETES
		*/
		if( paquete_seleccionado ){
			var paquete		= $('.paquete_compra.paquete.seleccionado');
			var new_paquete	= $( maqueta );/*INSTANCIAMOS*/
			
			
			new_paquete.find('.titulo_pp').text( 'Paquete de '+paquete.find('.p_c_cantidad').text()+' clases' );
			new_paquete.find('.precio_pp').text( paquete.find('.p_c_precio').text() );
			
			contenedor.append( new_paquete );
			subtotal+= parseInt( paquete.data('precio') );
		};
		/*
		**INTEGRAMOS PRODUCTOS
		*/
		if( productos_comprados.length ){
			$(productos_comprados).each(function(i,e){
				var este 			= $(e);
				var new_producto	= $( maqueta );/*INSTANCIAMOS*/
				
				new_producto.find('.foto_pp').html( este.find('img').clone() );
				new_producto.find('.titulo_pp').text( este.find('.p_p_titulo').text() );
				
				/*
				**SETEAMOS CANTIDAD
				*/
				var valor 		= parseInt( este.data('precio') );
				var cantidad	= parseInt( este.find('input').val() );
				var total		= valor*cantidad;
				 
				new_producto.find('.cantidad_pp').text( 'x '+cantidad );
				new_producto.find('.precio_unitario_pp').text( precio( valor ) );
				
				new_producto.find('.precio_pp').text( precio( total ) );
				
				contenedor.append( new_producto );
				subtotal+= parseInt( total );
			});
		};
		
		$('.subtotal_compra .precio').text( precio( subtotal ) );
	}
	function precio( numero ){
		return '$ '+formato_numero(numero, 2, ',', '.')+' MN';
	};
	function formato_numero(numero, decimales, separador_decimal, separador_miles){ // v2007-08-06
		numero=parseFloat(numero);
		if(isNaN(numero)){
			return "";
		}
	
		if(decimales!==undefined){
			// Redondeamos
			numero=numero.toFixed(decimales);
		}
	
		// Convertimos el punto en separador_decimal
		numero=numero.toString().replace(".", separador_decimal!==undefined ? separador_decimal : ",");
	
		if(separador_miles){
			// Añadimos los separadores de miles
			var miles=new RegExp("(-?[0-9]+)([0-9]{3})");
			while(miles.test(numero)) {
				numero=numero.replace(miles, "$1" + separador_miles + "$2");
			}
		}
		return numero;
	};
	/*ACCION PRINCIPAL*/
	$('body').on('click',funciones_click_body);
	function funciones_click_body(e){
		if( $('.dropdown.drop_viendo').length ){
			var drop = $('.dropdown.drop_viendo');
			var cont = drop.closest('.selector_editor');
			if( !$(e.target).is(drop) && !cont.has(e.target).length ){
				drop.removeClass('drop_viendo');
			};
		};

		if( $('.cambios_nombre').length ){
			$('.cambios_nombre').each(function(i, e) {
				$(e).trigger('guardar_nombre');
            });
		};
	};
	$('body').on('click','#descargar_db',function(){
		do_proceso(
			{
				'funcion'	: 'descargar_db_ajax',
				'attr'		: '',
			},
			'#contenedor_descarga_db'
		);
	});

	$('body').on('keyup','.cambios_nombre',function(e){
		if( e.keyCode == 13 ){
			$(this).trigger('guardar_nombre');
		}else if( e.keyCode == 8 && $(this).val() == '' ){
			crear_pregunta( '¿Estás seguro de querer eliminar este salón?', $(this).parent().data('id'), eliminar_salon );
		};
	});
	function eliminar_salon( id ){
		if( !id ){ return; };

		var ubicacion = $('#lista_ubicaciones .usando');

		save_data(
			{
				'funcion'	: 'eliminar_post',
				'attr'		: id,
			},
			[
				ubicacion.data('accion'),
				'#'+ubicacion.data('recipiente'),
			]
		);
	};
	$('body').on('guardar_nombre','.cambios_nombre',function(e){
		var este	= $(this);
		var valor	= este.val();
		var c		= este.parent();

		c.html( c.data('memoria') );
		c.find( '.viendo,.usando' ).removeClass('viendo').removeClass('usando');

		var ubicacion = $('#lista_ubicaciones .usando');

		save_data(
			{
				'funcion'	: 'actualizar_nombre_ajax',
				'attr'		: [ c.data('id'), valor ],
			},
			[
				ubicacion.data('accion'),
				'#'+ubicacion.data('recipiente'),
			]
		);
	});
	/*EVENTOS*/
	$('body').on('click','#descargar_usuarios',function(){
		window.open('<?php echo get_home_url();?>/mail_masivo/usuarios.php');
	});

	$('body').on('click','[data-accion]',do_action);

	iniciar_admin();

	function iniciar_admin(){
		//$('[data-id="estudios"]').trigger('click');
	};
	function do_action( e ){
		if( $(this).is('.viendo') || $(this).is('.usando') || $(this).has('.cambios_nombre').length ){ return; };

		if( $(e.target).is('.editar_elemento') ){ e.stopPropagation(); };

		if( ajax_admin ){
			ajax_admin.abort();
		};
		if( $(this).is('.esconder_hijos') ){ esconder_hijos( $(this) ); };

		if( $(this).closest('#editor_reservaciones').length ){
			secuencia_reservacion( $(this) );
		};

		var data		= $(this).data();

		/*RESETEO DEL MENU*/
		$('.viendo').removeClass('viendo');

		$(this).closest('.panel, #submenu_ad').find('.usando').removeClass('usando');
		$(this).addClass('viendo').addClass('usando');

		if( es_funcion_js( data ) ){ return; };


		do_proceso( data.accion, '#'+data.recipiente );
	};
	do_proceso = function do_proceso( data, recipiente, callback, atributos ){
		if( !data ){ alert( 'Error al enviar info' );return; };
		cargando();
		var recipiente	= $(recipiente);
		/*SET AJAX: SINO NO FUNCIONAN LAS DEL ADMIN*/
		data.ajax_gafa = true;
		ajax_admin = $.post('<?php admin()?>/procesos/do_action.php',data).done(function(d){
			var info = JSON.parse( d );
			if( !info || !info.ok ){
				alert( info.mensaje );
				return;
			};
			recipiente.html( info.data );

			if( callback ){
				callback( atributos );
			}else{
				abrir_panel( recipiente );
			};
		}).always(function(){
			borrarCargando();
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
		var referencia = '';
		if(typeof data.accion.referencia != 'undefined'  ){
			referencia = ', "'+data.accion.referencia+'" , "'+data.recipiente+'"';
		};
		eval( data.accion.funcion+'('+data.accion.attr+referencia+')' );
		esconder_panel_final();
	};
	function abrir_panel( recipiente ){
		/*FUNCION PARA OCULTAR Y ABRIR PANELES*/
		if( recipiente.is('#panel_final') || $('#panel_final').has(recipiente).length ){
			abrir_panel_final();
			return;
		}else{
			esconder_panel_final();
		};
		if( recipiente.closest('.contenedor_altura').length ){
			configurar_altura( recipiente.closest('.cont_scroll'), recipiente.closest('.contenedor_altura') );
		};
		$('.panel').removeClass('panel_abierto');
		recipiente.parents('.panel').addClass('panel_abierto');
		recipiente.parents('.panel').find('.usando').removeClass('usando');
	};
	function configurar_altura( este, padre ){
		var altura = padre.height();
		if( padre.find('.restar_altura').length ){
			altura-= padre.find('.restar_altura').outerHeight();
		};
		este.css('height',altura);
	};
	function abrir_panel_from_id( id ){
		$(id).addClass('panel_abierto');
	};
	function abrir_panel_final(){
		var final		= $('#panel_final');
		var ultimo_panel= $('.panel_abierto').last();

		var i = ultimo_panel.length ? ultimo_panel.offset().left+ultimo_panel.outerWidth() : 0;
		var w = $window.width() - i;
		final.css({
			left : i,
			width: w,
		});
	};
	function esconder_panel_final(){
		var final		= $('#panel_final');
		final.removeAttr('style');
	};
	function esconder_hijos( este ){
		este.closest('.panel').find('.panel').removeClass('panel_abierto');
	};
	/*OPCIONES UBICACIONES----------------------------------------------------------------------*/
	function ver_mapa_del_salon( vacio, id_salon, recipiente ){
		if( !id_salon || !recipiente ){ return; };
		var accion = {
			funcion	: 'configuracion_mapa_salon',
			attr	: $(id_salon).data('id'),
		};
		do_proceso( accion, '#'+recipiente );
	};
	function ver_calendario_salon( vacio, id_salon, recipiente ){
		if( !id_salon || !recipiente ){ return; };

		var accion = {
			funcion	: 'configuracion_calendario_salon',
			attr	: $(id_salon).data('id'),
		};
		if( $('.botones_cab_cal .semana_activa').length ){
			accion.semana = $('.semana_activa').data('calendario');
		};
		do_proceso( accion, '#'+recipiente );
	};
	function ver_reservaciones_salon( vacio, id_salon, recipiente ){
		if( !id_salon || !recipiente ){ return; };
		var accion = {
			funcion	: 'configuracion_reservaciones_salon',
			attr	: $(id_salon).data('id'),
		};
		do_proceso( accion, '#'+recipiente );
	};
	$('body').on('click','.eliminar_ubicacion',function(){
			crear_pregunta( '¿Estás seguro de querer eliminar esta ubicación?', $(this).data('id_post'), eliminar_ubicacion );
	});
	function eliminar_ubicacion( id_post ){
		if( !id_post ){
			esconder_panel_final();
			$('.usando').removeClass('viendo').removeClass('usando');
			return;
		};
		save_data(
			{
				'funcion'	: 'eliminar_post',
				'attr'		: id_post,
			},
			[
				{
					'funcion'	: 'menu_ubicaciones',
					'attr'		: false,
				},
				'#lista_ubicaciones',
			]
		);
	}
	$('body').on('click','.eliminar_reserva',function(){
			crear_pregunta( '¿Estás seguro de querer cancelar esta reserva?', $(this).data('id_post'), eliminar_reserva );
	});
	function eliminar_reserva( id_post ){
		if( !id_post ){
			esconder_panel_final();
			$('.usando').removeClass('viendo').removeClass('usando');
			return;
		};
		save_data(
			{
				'funcion'	: 'eliminar_post',
				'attr'		: id_post,
			},
			null,
			eliminar_js_reserva,
			id_post
		);
	}
	function eliminar_js_reserva( id_post ){
		if( $('.eliminar_reserva_interna').length ){
			mostrar_calendario( $('#opciones_del_salon>.usando').first() );
			return;
		};
		var reserva = $('.eliminar_reserva[data-id_post="'+id_post+'"]').closest('.bookings_bottom_single');

		var clase		= reserva.closest('.bookings_bottom').prev('.bookings_top_single');
		var d_disponible= clase.find('.bookings_available');
		var d_tomada	= clase.find('.bookings_taken');

		var disponibles	= parseInt( d_disponible.text() );
		var reservadas	= parseInt( d_tomada.text() );

		d_disponible.text( disponibles+1 );
		d_tomada.text( reservadas-1 );

		reserva.remove();
	};
	$('body').on('click','#guardar_ubicacion',guardar_ubicacion);
	function guardar_ubicacion(){
		var inputs = $('#panel_final').find('[data-name],[name]');
		var datos = formatear_datos( inputs );

		if( !datos ){ return; };

		datos.push( ['ID', $('.editor[data-id_post]').data('id_post') ] );

		save_data(
			{
				'funcion'	: 'guardar_ubicacion',
				'attr'		: datos,
			},
			[
				{
					'funcion'	: 'menu_ubicaciones',
					'attr'		: false,
				},
				'#lista_ubicaciones',
			]
		);
	};
	$('body').on('click','#guardar_clase',function(){
		if( $('#nombre_instructores_r').val() == "" ){
			alert('Debes seleccionar un instructor para asignar a la clase');
			return;
		};

		var inputs = $('#panel_final').find('[data-name],[name]');
		var datos = formatear_datos( inputs, 'clase' );

		datos.push( ['ID', $('.editor[data-id_clase]').data('id_clase') ] );
		datos.push( ['instructor', $('#nombre_instructores_r').val() ] );
		datos.push( ['salon', $('#lista_salones_ubi>.usando').data('id') ] );

		console.log( datos );

		var accion = {
			funcion	: 'crear_clase',
			attr	: datos,
		};
		save_data(
			accion,
			false,
			mostrar_calendario,
			$('#opciones_del_salon>.usando').first()
		);
	});
	function save_data( data, proceso, callback, callback_attr ){
		cargando();
		/*SET AJAX: SINO NO FUNCIONAN LAS DEL ADMIN*/
		data.ajax_gafa = true;
		ajax_admin = $.post( '<?php admin()?>/procesos/do_action.php', data ).done(function(d){
			var info = JSON.parse( d );
			if( !info || !info.ok ){
				alert( info.mensaje );
				return;
			}else{
				if( info.data ){
					$('body').append( info.data );
				};
				if( proceso ){
					do_proceso( proceso[0], proceso[1] );
				}else if( callback ){
					callback( callback_attr );
				};
			};
		}).always(function(){
			borrarCargando();
		});
	};
	function formatear_datos( inputs, backend ){
		var format		= [];

		var colores		= {
			'fondo'			: '',
			'boton'			: '',
			'fondo_boton'	: '',
		};
		var galeria		= [];
		var facturacion	= {};
		var wp_user		= {};
		var preguntas	= [];
		var clases		= [];

		inputs.each(function(i,e){
			var name = $(e).attr('name') ?  $(e).attr('name') : $(e).data('name');
			var value= $(e).attr('data-value') ? $(e).attr('data-value') : $(e).val();

			if( name.indexOf('[') != -1 ){
				/*VALORES TIPO ARRAY*/
				var separacion = name.split('[');
				var indice		= separacion[0];

				if( indice == 'colores' ){
					var contenido	= separacion[1].split(']')[0];
					eval( 'colores.'+contenido+'= value' );
				}else if( indice == 'galeria' ){
					galeria.push( value );
				}else if( indice == 'facturacion' ){
					var contenido	= separacion[1].split(']')[0];
					eval( 'facturacion.'+contenido+'= value' );
				}else if( indice == 'wp_user' ){
					var contenido	= separacion[1].split(']')[0];
					eval( 'wp_user.'+contenido+'= value' );
				}else if( indice == 'preguntas' ){
					var contenido	= separacion[1].split(']')[0];
					preguntas.push( [ contenido, value ] );
				}else if( indice == 'cantidad_clases' ){
					var contenido	= separacion[1].split(']')[0];
					clases.push( [ contenido, value ] );
				};
			}else{
				format.push( [name,value] );
			};
		});
		if( !backend ){
			format.push( [ 'colores', colores ] );
			format.push( [ 'galeria', galeria ] );
		}else{
			if( backend != 'instructor' ){
				if( backend != 'clase' ){
					format.push( [ 'facturacion'	, facturacion] );
					format.push( [ 'wp_user'		, wp_user] );
					format.push( [ 'clases_user'	, clases] );
				};
			}else{
				format.push( [ 'wp_user' , wp_user] );
				format.push( [ 'preguntas' , preguntas] );
			};
		};

		return format;
	};
	$('body').on('click','#guardar_usuario',guardar_usuario);
	function guardar_usuario(){
		var inputs = $('#panel_final').find('[data-name],[name]');
		var datos = formatear_datos( inputs, true );

		if( !datos ){ return; };

		var id_usuario = $('.editor[data-id_usuario]').data('id_usuario');

		datos.push( ['ID', id_usuario ] );

		if( !check_password( id_usuario ) ){ return; };

		save_data(
			{
				'funcion'	: 'guardar_usuario_back',
				'attr'		: datos,
			},
			false,
			recargar_usuarios,
			false
		);
	};
	function recargar_usuarios( x ){
		var e = $('[data-id="usuarios"]').first();
		e.removeClass('usando').removeClass('viendo');
		e.trigger('click');
		alert('Proceso realizado correctamente','mensaje');
	};
	$('body').on('click','#guardar_instructor',guardar_instructor);
	function guardar_instructor(){
		var inputs = $('#panel_final').find('[data-name],[name]');
		var datos = formatear_datos( inputs, 'instructor' );

		if( !datos ){ return; };

		var id_instructor = $('.editor[data-id_instructor]').data('id_instructor');

		datos.push( ['ID', id_instructor ] );

		save_data(
			{
				'funcion'	: 'guardar_instructor_back',
				'attr'		: datos,
			}
		);
	};
	function check_password( usuario ){
		var ok = true;

		var contra1 = $('#user_data_pass');
		var contra2 = $('#user_data_confirm_pass');

		if( usuario ){
			if( contra1.val() == '' && contra2.val() == '' ){
			}else{
				if( contra1.val() != contra2.val() ){
					contra1.css('border-color','red');
					contra2.css('border-color','red');
					alert('Las dos contraseñas deben coincidir');
					return false;
				};
			};
			contra1.removeAttr('style');
			contra2.removeAttr('style');
			return ok;
		};
		/*NUEVO USUARIO*/
		if( contra1.val() == '' || contra2.val() == '' ){
			contra1.css('border-color','red');
			contra2.css('border-color','red');
			ok = false;
		}else{
			contra1.removeAttr('style');
			contra2.removeAttr('style');
		}
		if( !ok ){ alert('El campo de contraseña es obligatorio');return ok; };
		/*IGUALDAD DE CONTRASELAS*/
		if( contra1.val() != contra2.val() ){
			contra1.css('border-color','red');
			contra2.css('border-color','red');
			ok = false;
		}else{
			contra1.removeAttr('style');
			contra2.removeAttr('style');
		}
		if( !ok ){ alert('Las dos contraseñas deben coincidir'); };

		return ok;
	};
	/*SELECTORES*/
	$('#panel_final').on('click','.selector_editor',abrir_selector);
	$('#panel_final').on('click','[data-opcion]',select_selector);
	function abrir_selector(){
		var este		= $(this);
		este.find('.dropdown').addClass('drop_viendo');
	};
	function select_selector(){
		var este	= $(this);
		var opcion	= este.data('opcion');

		var muestra = este.closest('.selector_editor').find('.caja_muestra');

		muestra.attr('data-value',opcion);
		if( este.attr('class') !== 'cont_circ' ){
			/*meter color*/
			muestra.attr('class',este.attr('class')+' caja_muestra');
		}else{
			/*incluir imagen*/
			muestra.html( este.html() );
		};
	};
	/*EDITOR*/
	$('body').on('click','.negrita',function(){
		$('.bold').trigger('click');
	});
	$('body').on('click','.subrayar',function(){
		$('.underline').trigger('click');
	});
	$('body').on('click','.tachar',function(){
		$('.strikeThrough').trigger('click');
	});
	/*SALONES*/
	function editar_nombre_salon(){
		var boton= $('#lista_salones_ubi .viendo').first();
		var este = boton.parent();
		este.data('memoria',este.html());

		/*RECOGEMOS TEXTO*/
		var clon = este.clone();
		clon.find('*').remove();
		var text = clon.text();
		/*CREAMOS INPUT INTERNO*/
		var input = $('<input type="text" value="" placeholder="Nombre del salón" class="cambios_nombre"/>');
		este.html( input );
		input.focus();
		input.val( text );
	};
	function crear_salon( vacio, id_ubi, recipiente ){
		if( !id_ubi || !recipiente ){ return; };
		var accion = {
			funcion	: 'crear_salon',
			attr	: $(id_ubi).data('id'),
		};
		do_proceso( accion, '#'+recipiente, click_en_editor );
	};
	function click_en_editor(){
		$('#lista_salones_ubi>div').first().find('.editar_elemento').trigger('click');
	};
	/*AÑADIR CLASE*/
	$('body').on('click','.calendario_back_end .hora',function(){
		if( $(this).has('.clase_calendario').length || $(this).closest('#calendario_reservacion').length ){ return; };
		annadir_clase( $(this) );
	});
	$('body').on('click','.calendario_back_end .clase_calendario',function(){
		if( $(this).closest('#calendario_reservacion').length ){ return; };

		var accion = {
			funcion	: 'editar_crear_clase_panel',//'traer_profes_selector',
			attr	: $(this).data('clase_calendario'),
		};
		do_proceso( accion, '#panel_final' );
	});
	function annadir_clase( este ){

		var accion = {
			funcion	: 'editar_crear_clase_panel',//'traer_profes_selector',
			attr	: [este.data('dia')],
		};
		do_proceso( accion, '#panel_final' );
	};
	$('body').on('click','.decidir_profe .instructor',function(){

		$('.decidir_profe .instructor').removeClass('selected');
		$(this).addClass('selected');
	});
	function mostrar_calendario( este ){
		este.removeClass('viendo').removeClass('usando');
		este.trigger('click');
	};
	$('#panel_final').on('click','.boton_calendario,.week_button',function(){
		var este  = $(this);
		var cal = $('#'+este.data('calendario'));

		$('.semana_activa').removeClass('semana_activa');
		este.addClass('semana_activa');
		/*CALENDARIO*/
		$('.calendario_back_end').hide(0);
		cal.show(0);

		var fechas	= $('.bookings_top_single');
		fechas.removeClass('escondido');
		$('.instructor_incoming_days [data-fecha]').removeClass('dia_activo');
	});
	/*FORMA DEL SALON*/
	$('#panel_final').on('click','.edicion_de_forma .bicicleta',function(){
		var este = $(this);

		if( !este.is('.forma_1') && !este.is('.forma_0') ){ return; };

		este.toggleClass('forma_1').toggleClass('forma_0');

		if( este.is('.forma_1') ){
			este.data('celda',1);
		}else{
			este.data('celda',0);
		};
		$('#guardar_forma_salon').removeClass('disabled');
	});
	$('#panel_final').on('click','#guardar_forma_salon',function(){
		var este = $(this);
		if( este.is('.disabled') ){ return; };

		var bicicletas = $('.edicion_de_forma>.bicicleta');
		var format_bicis = [];

		bicicletas.each(function(i, e) {
            var x = $(e).data('x');
            var y = $(e).data('y');

			if( typeof format_bicis[y] == 'undefined' ){
				format_bicis[y] = [];
			};

			format_bicis[y][x] = parseInt( $(e).data('celda') );
        });
		var attr = {
			'ID'	: $('#lista_salones_ubi>.usando').data('id'),
			'forma'	: format_bicis,
		};
		var accion = {
			funcion	: 'actualizar_forma_salon',
			attr	: attr,
		};
		save_data( accion );
	});
	/*FILTRO*/
	$('body').on('click','.filtro_letras>div',function(){
		if( $(this).is('.deshabilitado') ){ return; };
		var este = $(this);

		var letra	= este.data('letra');

		var cont	= $('.cont_scroll:visible');
		var pos		= cont.find('.division_letras[data-letra="'+letra+'"]').position().top;

		cont.stop().animate({scrollTop : pos},500);
	});
	$('body').on('keyup','.buscador_filtro',function(){
		var este		= $(this);
		var buscar		= este.val().toLowerCase();

		var sistema		= este.closest('.sistema_filtros');

		var elementos	= sistema.find('.resultado_busqueda .bookings_bottom_single');
		var resultado	= sistema.find('.resultado_busqueda .bookings_bottom_single[data-id*="'+buscar+'"]');

		var activos		= sistema.find('.filtro_letras>div:not(".deshabilitado")');

		/*FORMATEAMOS EL SELECTOR DE FECHAS*/
		if( buscar === '' ){
			/*RESET*/
			elementos.removeClass('escondido');
			sistema.find('.resultado_busqueda .division_letras').removeClass('escondido');
			habilitar_letras( este.data('letras'), true )
			return;
		};
		elementos.addClass('escondido');
		sistema.find('.resultado_busqueda .division_letras').addClass('escondido');

		resultado.removeClass('escondido');
		/*OCULTAMOS O MOSTRAMOS PADRES*/
		resultado.each(function(i,e){
			$(e).closest('.division_letras').removeClass('escondido');
		});

		activos.addClass('deshabilitado');
	});
	/*ARREGLO PARA MULTI CLICK*/
	$('body').on('click','.bookings_bottom_single',function(e){
		var este	= $(this);
		var interno	= este.find('[data-accion]');
		testing = este;
		if( interno.length && !$(e.target).is('[data-accion]') && !$(e.target).closest('[data-accion]').length ){
			interno.trigger('click');
		};
	});
	/*USUARIOS*/
	$('body').on('click','.rol_options [data-value]',function(){
		var este = $(this);
		var selector = este.closest('.rolSelect');

		selector.attr('data-value', este.attr('data-value'));
		selector.find('.rol_text').text( este.text() );
	});
	/*INSTRUCTORES*/
	$('body').on('click','.eliminar_instructor',function(){
			crear_pregunta( '¿Estás seguro de querer eliminar este instructor?', $(this).data('id_post'), eliminar_instructor );
	});
	function eliminar_instructor( id_post ){
		if( !id_post ){
			esconder_panel_final();
			$('.usando').removeClass('viendo').removeClass('usando');
			return;
		};

		alert('El instructor no se ha borrado, falta definir funcionalidad','mensaje');

		return;
		save_data(
			{
				'funcion'	: 'eliminar_post',
				'attr'		: id_post,
			},
			[
				{
					'funcion'	: 'menu_ubicaciones',
					'attr'		: false,
				},
				'#lista_ubicaciones',
			]
		);
	};
	/*CLASE*/
	$('body').on('click','.eliminar_clase',function(){
			crear_pregunta( '¿Estás seguro de querer eliminar esta clase?', $(this).data('id_post'), eliminar_clase,'* Se eliminarán todos las reservaciones asignadas a la clase' );
	});
	function eliminar_clase( id_post ){
		$('#opciones_del_salon .usando').removeClass('viendo').removeClass('usando').trigger('click');
		if( !id_post ){
			return;
		};
		save_data(
			{
				'funcion'	: 'eliminar_post',
				'attr'		: id_post,
			},
			false,
			mostrar_calendario,
			$('#opciones_del_salon>.usando').first()
		);
	};
	/*RESERVACIONES*/
	$('body').on('click','.filtro_busqueda',function(){
		if( $(this).is('.deshabilitado') ){ return; };
		var activo	= $(this).is('.filtro_activo') ? true : false;
		var buscar	= $(this).data('buscar');

		$('.filtro_busqueda').removeClass('filtro_activo');
		$('.buscador_filtro').val('');

		/*RECOGIDA DE INFORMACION*/
		var sistema = $(this).closest('.panel').find('.sistema_filtros');
		var elementos	= sistema.find('.resultado_busqueda .bookings_bottom_single');
		var resultado	= sistema.find('.resultado_busqueda .bookings_bottom_single.'+buscar);
		var activos		= sistema.find('.filtro_letras>div:not(".deshabilitado")');

		/*FORMATEAMOS EL SELECTOR DE FECHAS*/
		if( activo ){
			/*RESET*/
			elementos.removeClass('filtrado');
			sistema.find('.resultado_busqueda .division_letras').removeClass('filtrado');
			habilitar_letras( sistema.find('.buscador_filtro').data('letras'), true );
			$('.cont_scroll').trigger('scroll');
			return;
		}else{
			$(this).addClass('filtro_activo');
		};
		/*FILTRADO*/
		elementos.addClass('filtrado');
		sistema.find('.resultado_busqueda .division_letras').addClass('filtrado');

		resultado.removeClass('filtrado');

		/*OCULTAMOS O MOSTRAMOS PADRES*/
		var letras_habilitadas = {};
		resultado.each(function(i,e){
			var cont_letra = $(e).closest('.division_letras');
			cont_letra.removeClass('filtrado');
			cont_letra.data('letra');
			letras_habilitadas[cont_letra.data('letra')] = true;
		});

		habilitar_letras( letras_habilitadas, true );

		$('.cont_scroll').trigger('scroll');
	});
	$('body').on('click','.instructor_incoming_days [data-fecha]',function(){
		var este	= $(this);
		var fecha	= este.data('fecha');

		var elegida	= este.is('.dia_activo') ? true : false;

		var fechas	= $('.bookings_top_single');
		if( elegida ){
			este.removeClass('dia_activo')
			fechas.removeClass('escondido');
			return;
		};

		var elegidas= $('.bookings_top_single[data-dia="'+fecha+'"]');

		fechas.addClass('escondido');
		elegidas.removeClass('escondido');

		$('.instructor_incoming_days [data-fecha]').removeClass('dia_activo');
		este.addClass('dia_activo');
	});
	$('body').on('click','.volver_atras',function(){
		var e = $('#opciones_del_salon .usando');/*UBICACIONES*/
		if( !e.length ){
			e = $('.panel_abierto .cont_scroll .usando');
		};
		e.removeClass('usando').removeClass('viendo').trigger('click');
	});
	/*EDITAR-CREAR RESERVACION*/
	$('body').on('click','#calendario_reservacion .clase_calendario',function(){
		/*CLICK EN CLASE*/
		var este = $(this);
		secuencia_reservacion( este );
		do_proceso(
			{
				'funcion'	: 'imprimir_forma',
				'attr'		: este.data('clase_calendario'),
			},
			'#mapa_reservacion',
			preparar_panel_bici,
			false
		);
	});
	function secuencia_reservacion( este ){
		var padre = este.closest('.secuencia_reserva');
		if( !padre.length ){ return; };

		var ub_reserva = $('#ubicaciones_reservacion');
		var sa_reserva = $('#salones_reservacion');
		var ca_reserva = $('#calendario_reservacion');
		var ma_reserva = $('#mapa_reservacion');

		if( padre.is('#ubicaciones_reservacion') ){
			sa_reserva.html('');
			ca_reserva.html('');
			ma_reserva.html('');
		}else if( padre.is('#salones_reservacion') ){
			ca_reserva.html('');
			ma_reserva.html('');
		}else if( padre.is('#calendario_reservacion') ){
			ma_reserva.html('');
		};

		padre.find('.reserva_usando').removeClass('reserva_usando');
		este.addClass('reserva_usando');
	};
	function preparar_panel_bici( nada ){
		/*CON ESTA FUNCION VAMOS A SABER SI DEBEMOS DE MARCAR LA BICI EN EL MAPA :)*/
		var mapa	= $('#mapa_reservacion');
		var bici	= mapa.data('bici');
		var clase	= mapa.data('clase');

		var mapa_actual = $('.clase_salon').data('id_mapa');

		if( mapa_actual != clase ){ return; };

		/*<div class="bicicleta forma_2" data-x="5" data-y="2">28</div>*/
		var a_editar = $('.bicicleta[data-x="'+bici[0]+'"][data-y="'+bici[1]+'"]');

		if( !a_editar.length ){ return; };

		a_editar.removeClass('forma_2').addClass('reserva_usando').addClass('forma_1');
	};
	$('body').on('click','#mapa_reservacion .bicicleta',function(){
		var este = $(this);
		if( !este.is('.forma_1') ){ return; };

		$('#mapa_reservacion .reserva_usando').removeClass('reserva_usando');
		este.addClass('reserva_usando');
	});
	$('body').on('click','#guardar_reserva',function(){
		var data	= check_guardar_reserva();
		if( !data ){ return; };
		/*
			public $ID;
			public $clase;
			public $bici;
		*/
		save_data(
			{
				'funcion'	: 'guardar_reserva',
				'attr'		: data,
			}
		);
	});
	function check_guardar_reserva(){
		var ok		= true;
		var data	= {
			'ID'		: $('#editor_reservaciones').data('id_reserva'),
			'clase'		: '',
			'bici'		: '',
		};
		var mensaje	= '';
		/*CLASE*/
		var clase = $('.clase_calendario.reserva_usando');
		if( !clase.length ){
			ok =false;
			mensaje+= 'Debes seleccionar una clase para poder finalizar la edición';
		}else{
			data.clase = clase.data('clase_calendario');
		};
		/*BICICLETA*/
		var bici = $('.bicicleta.reserva_usando');
		if( !bici.length ){
			ok =false;
			mensaje+= '<br/>Debes seleccionar una bicicleta en el mapa para finalizar la edición';
		}else{
			data.bici = [ bici.data('x'), bici.data('y') ];
		};
		if( $('#crear_reserva_agarrar_user').length ){
			/*CHECAMOS SI ESTAMOS CREANDO UNA NUEVA RESERVA*/
			data.comprador = $('#lista_nueva_reservacion .usando').closest('[data-info]').data('info');
		};

		if( ok ){
			return data;
		}else{
			alert( mensaje );
			return false;
		};
	};
	/*OPCIONES GENERALES*/
	$('body').on('click','#guardar_redes',function(){

		var inputs = $('#panel_final').find('[data-name],[name]');
		var datos = formatear_datos( inputs, 'clase' );


		var accion = {
			funcion	: 'guardar_redes',
			attr	: datos,
		};
		save_data(
			accion,
			false
		);
	});
	$('body').on('click','#guardar_pagina',function(){

		var txt = $('textarea[name="informacion_pagina"]');

		var data = {
			'id'	: txt.data('id'),
			'value'	: txt.val(),
		};

		var accion = {
			funcion	: 'guardar_pagina',
			attr	: data,
		};
		save_data(
			accion,
			false
		);
	});
	$('body').on('click','.pregunta_back input',function(){
		$('.pregunta_back textarea').slideUp(20);
		$(this).closest('.pregunta_back').find('textarea').slideDown(20);
	});
	$('body').on('click','#guardar_faqs',function(){
		var faqs = $('#panel_final .pregunta_back');

		if( !faqs.length ){ return; };

		var data = [];

		faqs.each(function(i, e) {

			if( $(e).find('input').val() == '' || $(e).find('textarea').val() == '' ){ return; };

            data.push({
				'id'		: $(e).data('id_post'),
				'titulo'	: $(e).find('input').val(),
				'texto'		: $(e).find('textarea').val(),
			});
        });

		var accion = {
			funcion	: 'actualizar_faqs',
			attr	: data,
		};
		save_data(
			accion,
			false,
			mostrar_faqs,
			$('#lista_configuraciones>.usando').first()
		);
	});
	$('body').on('click','#guardar_paquetes',function(){
		var paquetes = $('#panel_final .paquetes_en_back');

		if( !paquetes.length ){ return; };

		var data = [];

		paquetes.each(function(i, e) {
			if( $(e).find('[name="paquete[cantidad]"]').val() == '' || $(e).find('[name="paquete[precio]"]').val() == '' ){ return; };
            data.push({
				'id'			: $(e).data('id_post'),
				'cantidad'		: $(e).find('[name="paquete[cantidad]"]').val(),
				'precio'		: $(e).find('[name="paquete[precio]"]').val(),
				'expiracion'	: $(e).find('[name="paquete[expiracion]"]').val(),
			});
        });

		var accion = {
			funcion	: 'actualizar_paquetes',
			attr	: data,
		};
		save_data(
			accion,
			false
		);
	});

	$('body').on('click','.eliminar_faq',function(){
		crear_pregunta( '¿Estás seguro de querer eliminar esta faq?',$(this).data('id_post'), eliminar_faq );
	});
	function eliminar_faq( id ){
		if( !id ){ return; };

		var accion = {
			funcion	: 'eliminar_post',
			attr	: id,
		};
		save_data(
			accion,
			false,
			mostrar_faqs,
			$('#lista_configuraciones>.usando').first()
		);
	};
	function mostrar_faqs( ele ){
		ele.removeClass('viendo').removeClass('usando');
		ele.trigger('click');
	};
	/*REPETIR DIA DE LA SEMANA ANTERIOR*/
	$('body').on('click','.repetir_semana',function(){

		var accion = {
			funcion	: 'repetir_semana_anterior',
			attr	: $(this).data('dia_repetir'),
		};
		save_data(
			accion,
			false,
			mostrar_faqs,
			$('#opciones_del_salon>.usando').first()
		);
	});
});
function mario( data ){ console.log( data ); };
function habilitar_letras( data, repetible ){
	var letras = $('.filtro_letras>div');
	letras.addClass('deshabilitado');


	for( var letra in data ){
		$('.filtro_letras>div[data-letra="'+letra+'"]').removeClass('deshabilitado');
	};
	$('.buscador_filtro').val('')/*RESET DE BUSCADORES*/;
	if( !repetible ){
		/*PRIMER ALMACENAMIENTO*/
		$('.buscador_filtro').data( 'letras', data );
	};


	$('.cont_scroll').on('scroll',function(){
		/*CALCULAREMOS EN QUÉ LETRA ESTAMOS*/

		var contenedor	= $(this).closest('.sistema_filtros');

		var letras		= contenedor.find('.division_letras');
		var dif			= -999999999999999999;
		var pos_cont	= contenedor.find('.cont_scroll').offset().top;

		var actual	= false;

		letras.each(function(i, e) {
			var pos	= $(e).offset().top - pos_cont;

            if( pos <= 0 && pos > dif ){
				dif		= pos;
				actual	= $(e);
			};
        });
		if( !actual ){ return; };

		letra = actual.data('letra');

		contenedor.find('.filtro_letras>div').removeClass('viendo_letra');
		contenedor.find('.filtro_letras>div[data-letra="'+letra+'"]').addClass('viendo_letra');
	}).trigger('scroll');
	
};
function habilitar_filtros(){
	$('.filtro_activo').removeClass('filtro_activo');
};
/*NUEVA COMPRA*/
function nueva_compra(){
	do_proceso( {
		funcion	: 'panel_compra_back',//PANEL DE COMPRA
		attr	: $('#lista_nueva_compra').find('.viendo').closest('div').data('info'),
	}, '#panel_final' );
}

</script>
<?php include 'js_rog.php'; ?>
