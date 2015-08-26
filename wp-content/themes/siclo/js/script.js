$( document ).ready(function() {
	"use strict";
	$("body").on('click','.up',function() {
   		$('.menuabierto').toggle();
		$('.navbar').toggleClass('abrio_menu');
	});
	$('#tabs li a').click(function(){
		var t = $(this).attr('id');
		if( $(this).hasClass('inactive') ){
			$('#tabs li a').addClass('inactive');
			$(this).removeClass('inactive');
			
			$('.content').hide();
			$('#'+ t + 'c').fadeIn('slow');
		}
	});
	$('body').on('mouseenter','.ratings_stars',function(){
		$(this).prevAll().andSelf().addClass('ratings_over');
	}).on('mouseleave','.ratings_stars',function(){
		$(this).prevAll().andSelf().removeClass('ratings_over');
	});
	
	
});