<script>
	$(function(){
		$('body').on('click', '.bookings_edit', function(){
			var este = $(this);
			var bookingsTopSingle = este.closest('.bookings_top_single');
			var bookingsBottom = bookingsTopSingle.next('.bookings_bottom');
			
			var abierto = bookingsBottom.is('.bookings_bottom_activo') ? true : false;
			
			
			$('.bookings_bottom').removeClass('bookings_bottom_activo');
			
			if (!abierto){
				bookingsBottom.addClass('bookings_bottom_activo');
			}
								
		});
		
		$('body').on('click', 'div[data-header]', function(){
			
			var este = $(this);
			var opcionesMenu = $('div[data-header]');
			var dataMostrar = este.data('header');
			var mostrar = $('div[data-user_content='+ dataMostrar +']');
			var cont = $('div[data-user_content]'); 
			
			opcionesMenu.removeClass('isSelected');
			este.addClass('isSelected');
			cont.addClass('hideContent');
			mostrar.removeClass('hideContent');
		});
		
		$('body').on('click', 'div[data-instructor]', function(){
			
			var este = $(this);
			var opcionesMenu = $('div[data-instructor]');
			var dataMostrar = este.data('instructor');
			var mostrar = $('div[data-user_content='+ dataMostrar +']');
			var cont = $('div[data-user_content]'); 
			
			opcionesMenu.removeClass('instructor_cabecera_current');
			este.addClass('instructor_cabecera_current');
			cont.addClass('hideContent');
			mostrar.removeClass('hideContent');
		});
		
		$('body').on('mouseenter', '.rolSelect', function(){
			
			$('.rol_options').stop().slideToggle();
			
		}).on('mouseleave', '.rolSelect', function(){
			
			$('.rol_options').stop().slideToggle();
			
		});
		
		$('body').on('click', '.instructor_single_edit', function(){
			
			var este = $(this);
			var esteRespuesta = este.parent().next('.instructor_single_answer');
			var cerrado = esteRespuesta.is('.instructor_single_answer_hide') ? true : false;
			
			$('.instructor_single_answer').addClass('instructor_single_answer_hide');
			
			if(cerrado){
				esteRespuesta.removeClass('instructor_single_answer_hide');
			}
			
			var scroll = esteRespuesta.offset().top;
				
			$('#panel_final').scrollTop(scroll);
		});
	});
</script>