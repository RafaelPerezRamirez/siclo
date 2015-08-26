<script type="text/javascript">// <![CDATA[
var $,$window,ajax_GF,test;
var iniciada = false;

$window = jQuery(window);
/*MODERNIZAR---------------------------------------------------------*/
/* Modernizr 2.8.3 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-fontface-backgroundsize-borderradius-boxshadow-multiplebgs-opacity-rgba-textshadow-csscolumns-generatedcontent-cssgradients-csstransforms-csstransitions-video-input-inputtypes-shiv-cssclasses-teststyles-testprop-testallprops-prefixes-domprefixes-load
 */
;window.Modernizr=function(a,b,c){function A(a){j.cssText=a}function B(a,b){return A(n.join(a+";")+(b||""))}function C(a,b){return typeof a===b}function D(a,b){return!!~(""+a).indexOf(b)}function E(a,b){for(var d in a){var e=a[d];if(!D(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function F(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:C(f,"function")?f.bind(d||b):f}return!1}function G(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+p.join(d+" ")+d).split(" ");return C(b,"string")||C(b,"undefined")?E(e,b):(e=(a+" "+q.join(d+" ")+d).split(" "),F(e,b,c))}function H(){e.input=function(c){for(var d=0,e=c.length;d<e;d++)t[c[d]]=c[d]in k;return t.list&&(t.list=!!b.createElement("datalist")&&!!a.HTMLDataListElement),t}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")),e.inputtypes=function(a){for(var d=0,e,f,h,i=a.length;d<i;d++)k.setAttribute("type",f=a[d]),e=k.type!=="text",e&&(k.value=l,k.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(f)&&k.style.WebkitAppearance!==c?(g.appendChild(k),h=b.defaultView,e=h.getComputedStyle&&h.getComputedStyle(k,null).WebkitAppearance!=="textfield"&&k.offsetHeight!==0,g.removeChild(k)):/^(search|tel)$/.test(f)||(/^(url|email)$/.test(f)?e=k.checkValidity&&k.checkValidity()===!1:e=k.value!=l)),s[a[d]]=!!e;return s}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var d="2.8.3",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k=b.createElement("input"),l=":)",m={}.toString,n=" -webkit- -moz- -o- -ms- ".split(" "),o="Webkit Moz O ms",p=o.split(" "),q=o.toLowerCase().split(" "),r={},s={},t={},u=[],v=u.slice,w,x=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},y={}.hasOwnProperty,z;!C(y,"undefined")&&!C(y.call,"undefined")?z=function(a,b){return y.call(a,b)}:z=function(a,b){return b in a&&C(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=v.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(v.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(v.call(arguments)))};return e}),r.rgba=function(){return A("background-color:rgba(150,255,150,.5)"),D(j.backgroundColor,"rgba")},r.multiplebgs=function(){return A("background:url(https://),url(https://),red url(https://)"),/(url\s*\(.*?){3}/.test(j.background)},r.backgroundsize=function(){return G("backgroundSize")},r.borderradius=function(){return G("borderRadius")},r.boxshadow=function(){return G("boxShadow")},r.textshadow=function(){return b.createElement("div").style.textShadow===""},r.opacity=function(){return B("opacity:.55"),/^0.55$/.test(j.opacity)},r.csscolumns=function(){return G("columnCount")},r.cssgradients=function(){var a="background-image:",b="gradient(linear,left top,right bottom,from(#9f9),to(white));",c="linear-gradient(left top,#9f9, white);";return A((a+"-webkit- ".split(" ").join(b+a)+n.join(c+a)).slice(0,-a.length)),D(j.backgroundImage,"gradient")},r.csstransforms=function(){return!!G("transform")},r.csstransitions=function(){return G("transition")},r.fontface=function(){var a;return x('@font-face {font-family:"font";src:url("https://")}',function(c,d){var e=b.getElementById("smodernizr"),f=e.sheet||e.styleSheet,g=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"";a=/src/i.test(g)&&g.indexOf(d.split(" ")[0])===0}),a},r.generatedcontent=function(){var a;return x(["#",h,"{font:0/0 a}#",h,':after{content:"',l,'";visibility:hidden;font:3px/1 a}'].join(""),function(b){a=b.offsetHeight>=3}),a},r.video=function(){var a=b.createElement("video"),c=!1;try{if(c=!!a.canPlayType)c=new Boolean(c),c.ogg=a.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),c.h264=a.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),c.webm=a.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,"")}catch(d){}return c};for(var I in r)z(r,I)&&(w=I.toLowerCase(),e[w]=r[I](),u.push((e[w]?"":"no-")+w));return e.input||H(),e.addTest=function(a,b){if(typeof a=="object")for(var d in a)z(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},A(""),i=k=null,function(a,b){function l(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function m(){var a=s.elements;return typeof a=="string"?a.split(" "):a}function n(a){var b=j[a[h]];return b||(b={},i++,a[h]=i,j[i]=b),b}function o(a,c,d){c||(c=b);if(k)return c.createElement(a);d||(d=n(c));var g;return d.cache[a]?g=d.cache[a].cloneNode():f.test(a)?g=(d.cache[a]=d.createElem(a)).cloneNode():g=d.createElem(a),g.canHaveChildren&&!e.test(a)&&!g.tagUrn?d.frag.appendChild(g):g}function p(a,c){a||(a=b);if(k)return a.createDocumentFragment();c=c||n(a);var d=c.frag.cloneNode(),e=0,f=m(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function q(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return s.shivMethods?o(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+m().join().replace(/[\w\-]+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(s,b.frag)}function r(a){a||(a=b);var c=n(a);return s.shivCSS&&!g&&!c.hasCSS&&(c.hasCSS=!!l(a,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),k||q(a,c),a}var c="3.7.0",d=a.html5||{},e=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,f=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,g,h="_html5shiv",i=0,j={},k;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",g="hidden"in a,k=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){g=!0,k=!0}})();var s={elements:d.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:c,shivCSS:d.shivCSS!==!1,supportsUnknownElements:k,shivMethods:d.shivMethods!==!1,type:"default",shivDocument:r,createElement:o,createDocumentFragment:p};a.html5=s,r(b)}(this,b),e._version=d,e._prefixes=n,e._domPrefixes=q,e._cssomPrefixes=p,e.testProp=function(a){return E([a])},e.testAllProps=G,e.testStyles=x,g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+u.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};
/*MODERNIZAR FIN---------------------------------------------------------*/
/*ERRROR GAFA--------------------------------------------------------------------*/
var elementoErrorGF = '.gafa-mensaje,.gafa-error';
var errorGafa=function(texto, clase){ clearTimeout(timer); jQuery(elementoErrorGF).remove(); 
	switch(clase){
		case 'inicio': if(jQuery(elementoErrorGF).length==0){ jQuery('body').prepend('<div class="gafa-mensaje" style="transform: translateY(0px);"><h1>Procesando...</h1></div>'); }; break;
		case 'fijo': if(jQuery(elementoErrorGF).length==0){ jQuery('body').prepend('<div class="gafa-mensaje" style="transform: translateY(0px);"><h1>Notificación</h1>'+texto+'</div>'); }; break;
		default:
			var classe=clase; if(clase==undefined||clase==''){ classe='error'; }; if( classe=='error' ){ texto= '<h1>¡Alerta!</h1>'+texto; }else{ texto= '<h1>Notificación</h1>'+texto; };
			jQuery('body').prepend('<div class="gafa-'+classe+'">'+texto+'</div>');
			funcionElementoError(); break;
	};
};
alert=errorGafa;
var timer;
var funcionElementoError= function(){
	if (jQuery(elementoErrorGF).length!=0){
		var este = jQuery(elementoErrorGF);
		var alto = este.outerHeight();
		
		$('.container-fluid,.navbar').css({
			'transform'	: 'translateY( '+alto+'px )'
		});
		
		jQuery(elementoErrorGF).css({
			'transform'	: 'translateY( 0px )'
		});
		jQuery(elementoErrorGF).attr('title','Elimina este mensaje');
		timer= setTimeout(function(){
			if(jQuery(elementoErrorGF).length!=0){
				jQuery(elementoErrorGF).trigger('click');
			};
		},8000);
	};
};
jQuery(document).ready(function(){ jQuery('body').on('click',elementoErrorGF,function(){ 
	$('.container-fluid,.navbar').css({
		'transform'	: 'translateY( 0px )'
	});
	jQuery(elementoErrorGF).fadeOut('slow',function(){ jQuery(elementoErrorGF).remove(); clearTimeout(timer); }); });});
/*ERRROR GAFA FIN--------------------------------------------------------------------*/
/*PREGUNTA GAFA--------------------------------------------------------------------*/
function crear_pregunta( texto,info,callback,legal, false_function, data_false ){ cargando('cargando_pregunta'); if( !legal ){ legal = ''; }; if( $('#pregunta_gafa').length ){ $('#pregunta_gafa').remove(); }; $('body').append('<div id="pregunta_gafa">'+texto+'<br/><div id="aceptar_pregunta_gafa" class="boton">Aceptar</div><div id="cancelar_pregunta_gafa" class="boton">Cancelar</div><br/><small>'+legal+'</small></div>'); /*ACEPTAR*/ $('#aceptar_pregunta_gafa').one('click',function(){ $('#pregunta_gafa').remove(); borrarCargando('cargando_pregunta'); callback( info ); }); /*CANCELAR*/ $('#cancelar_pregunta_gafa').one('click',function(){ $('#pregunta_gafa').remove(); if( false_function ){ false_function( data_false ); }; borrarCargando('cargando_pregunta'); }); };
/*PREGUNTA GAFA FIN--------------------------------------------------------------------*/
/*CARGANDO GAFA--------------------------------------------------------------------*/
function cargando(id){ if(id){ if($('#'+id).length<1){ $('body').append('<div id="'+id+'" class="cover" style="display:none;"></div>'); $('#'+id).fadeIn(); }; }else{ if($('#cargando').length<1){ $('body').append('<div id="cargando" class="cover" style="display:none;"></div>'); $('#cargando').fadeIn(); }; }; }; function borrarCargando(id){ if(id){ if($('#'+id).length>=0){ $('#'+id).fadeOut('fast',function(){ $('#'+id).remove(); }); }; }else{ if($('#cargando').length>=0){ $('#cargando').fadeOut('fast',function(){ $('#cargando').remove(); }); }; }; };
/*CARGANDO GAFA FIN--------------------------------------------------------------------*/

jQuery(document).ready(function(){
	$ = jQuery;
	
	
	$('.toogle_menu').on('click',function(){
		$('body').toggleClass('menu_abierto');
	});
	$('body').on('click',function( e ){
		var target	= e.target;
		var menu	= $('#menu_lateral');
		var boton	= $('#toogle_menu');
		
		if( menu.is( target ) || menu.has( target ).length || boton.is( target ) || !$('.menu_abierto').length ){ return; };
		
		$('#toogle_menu').trigger('click');
	});
	$('[data-link]').on('click',function(){
		document.location.href = $(this).data('link');
	});
	/*CREAR_FANCYS------*/
	$('body').on('click','[data-id_fancy]',fancy_by_id);
	/*ROLL OVER MENU-----*/
	$('body').on('click','.indexfront .col-xs-4',function(e){
		var este = $(this);
		test= [este,e.target];
		if( este.find('a').length && !este.find('a').is( e.target ) ){
			este.find('a').trigger('click');
		};
	});
	$('body').on('mouseenter','div.ccv',function(){
		var este = $(this);
		if( este.find('.data_ccv').length ){ return; };
		este.append('<div class="data_ccv"><img src="<?php plantilla();?>/images/tarjetas/cvv.png"/></div>');
	});
	$('body').on('mouseenter','[data-hoverinfo]',function(){
		var este = $(this);
		if( este.find('.data_hover').length ){ return; };
		este.append('<div class="data_hover"><div class="int_data_hover">'+este.data('hoverinfo')+'</div></div>');
	});
	$('.infoi .clase_calendario').on('click',function(){
		document.location.href="<?php echo get_home_url();?>?select_paquete="+$(this).data('clase_calendario');
	});
	/*OPACITY EN TARJETAS*/
	$('body').on('keyup','[data-conekta="card[number]"]',function(){
		config_tarjetas( $(this) );
	});
	
	/*SPOTIFY-----*/
	$('.spot').on('click',function(){
		window.open( '<?php 
		echo get_permalink( 916 );?>' , 'Playlist del mes', 'right=20,top=20,width=320,height=320,toolbar=0,resizable=0');
	});
	/*VIDEO*/
	$('body').on('click','#ver_video',function(e){
		e.preventDefault();
		crear_fancy('<iframe src="https://player.vimeo.com/video/130134754?color=ffffff&title=0&byline=0&portrait=0&autoplay=1" width="600" height="338" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen id="iframe_vimeo"></iframe>', 'fancy_siclo');
	});
	/*EQUIPO*/
	iniciar_todo_el_canvas();
	$('.rate').on('click','.ratings_stars',function(){
		cargando();
		var data = {
			'id'	: $(this).closest('.rate').data('instructor'),
			'valor'	: $(this).data('valor'),
		};
		$.post('<?php plantilla();?>/procesos/ubicacion/votar_instructor.php',data).always(function(){
			borrarCargando();
		}).done(function(e){
			$('.rate').html( e );
		});
	});
	$('.canvas_e_i, .canvas_e_d').on('click',function(){
		var este	= $(this);
		var canvas	= $('#cont_canvas');
		
		var posicion= este.is('.canvas_e_i') ? canvas.scrollLeft()-100 : canvas.scrollLeft()+100;
		
		if( posicion < 0 ){
			posicion = 0;
		};
		canvas.stop().animate({
			'scrollLeft'	: posicion
		},200);
	});
	/*INSTRUCTOR PREGUNTAS*/
	$('.pregunta_instructor').on('click',abrir_preguntas_instructor);
	
	/*ACCESO A CICLO*/
	$('body').on('keyup','.form_acceso [name="mail_usuario"]',comprobar_cuenta);
	$('body').on('keyup','.form_acceso [name="pass_user"]',function( e ){
		if( e.keyCode != 13 ){ return; };
		$(this).closest('.form_acceso').find('.boton').trigger('click');
	});
	$('body').on('click','.form_acceso .boton',acceder);
	$('body').on('keyup','.boton',function(e){
		if( e.keyCode != 13 && e.keyCode != 32 ){ return; };
		$(this).trigger('click');
	});
	
	/*SALVAR CUENTA*/
	$('#salvar_cuenta').on('click',salvar_cuenta);
	$('#cambiar_contrasenna').on('click',cambiar_contrasenna);
	$('.guardar_datos_facturacion').on('click',salvar_facturacion);
	/*INVITAR AMIGO*/
	$('#invitar_amigos').on('click',invitar_amigo);
	/*CHECKOUT*/
	$('body').on('click','.paquete_checkout',select_paquete);
	$('body').on('click','.finalizar_compra_ya',finalizar_compra);
	$('body').on('click','.regala_ahora',regala_ahora);
	$('body').on('click','.aplicar_descuento',aplicar_descuento);
	
	$('body').on('click','#finalizar_compra_back',finalizar_compra_back);
	/*INPUTS CHECK*/
	$('body').on('keyup','[maxlength]',function(){
		if( $(this).val().length > $(this).attr('maxlength') ){
			$(this).val( $(this).val().substring(0, $(this).attr('maxlength') ) );
		};
	});
	$('body').on('keyup','[size]',function(){
		if( $(this).val().length > $(this).attr('size') ){
			$(this).val( $(this).val().substring(0, $(this).attr('size') ) );
		};
	});
	/*CHECKBOX*/
	$('body').on('click','.single_tarjeta .checkbox',function(){
		var p = $(this).closest('.ch-pay');
		if( p.find('.data_tarjeta:visible').length ){
			p.find('.annadir_tarjeta ').trigger('click');
		};
	});
	
	$('body').on('click','.checkbox',function(){
		var este = $(this);
		if( !este.is('.radio') ){
			este.toggleClass('checked');
			return;
		};
		/*RADIOS*/
		var checked = este.is('.checked') ? true : false;
		este.closest('.radio_list').find('.radio').removeClass('checked');
		
		if( !checked ){
			este.addClass('checked');
		};
	});
	/*UBICACION*/
	$('.botones_ub_ind .circulo.more_info').on('click',cambiar_ubi_single);
	$('.selector_change_instructor').on('change',filtrar_instructor);
	/*CLASES*/
	$('body').on('click','.bicicleta.forma_1',select_bici);
	$('body').on('click','.comprar_bici',comprar_bici);
	/*HOVER MAS INFO*/
	/*CANCELAR RESERVACION*/
	$('body').on('click','[data-reserva_cuenta] .cancel',function(){
		var confirmar = confirm("¿Estás seguro que deseas cancelar esta reserva?");
		if( !confirmar ){ return; };
		
		cargando();
		var este= $(this).closest('[data-reserva_cuenta]');
		var data = {
			'reserva_id': este.data('reserva_cuenta'),
			'security'	: true,
		};
		$.post('<?php plantilla();?>/procesos/cuenta/cancelar_reserva.php', data).always(function(){
			borrarCargando();
		}).done(function(d){
			var data = JSON.parse( d );
			if( !data.ok ){
				alert( data.mensaje );
				borrarCargando();
				return;
			};
			alert(data.mensaje,'mensaje');
			este.slideUp(500);
			$('.clases_actuales').html( data.clases );
		});
	});
	$('body').on('click','#cont_calendario table td',function(){
		var este = $(this);
		if( este.is('.today') ){ return; };
		
		$('.today').removeClass('today');
		este.addClass('today');
	});
	
	$('body').on('click','.volver_a_paquetes',function(){
		var este= $(this);
		var p	= este.closest('.checkout');
		
		p.find('.primer_paso_check').addClass('oculto');
		p.find('.paquetes_check').removeClass('oculto');
		p.find('.paquete').removeClass('seleccionado');
	});
	
	$('#close_home').on('click', deshabilitar_video_dos);
	$('body').on('click','.annadir_tarjeta',function(){
		var este = $(this);
		var c = este.closest('.columna_general');
		var tarjets = c.find('.data_tarjeta');
		var mostrado= tarjets.is(':visible');
		
		tarjets.stop().slideToggle(500,function(){
			tarjets.toggleClass('escondido');
			if( !mostrado ){
				este.html( '- CERRAR NUEVA TARJETA' );
			}else{
				este.html( '+ AÑADIR NUEVA TARJETA' );
			};
		});
	});
	/*FANCY*/
	$('body').on('click','.cerrar_fancy',cerrar_fancy);
	$('body').on('click','#fancy:not(.fancy_siclo)',function(e){
		if( $('#cont_text_fancy').is( e.target ) || $('#cont_text_fancy').has( e.target ).length ){ return; };
		cerrar_fancy();
	});
	$('body').on('click','#fancy.fancy_siclo',function(e){
		if( $('#iframe_vimeo').is( e.target ) || $('#iframe_vimeo').has( e.target ).length ){ return; };
		cerrar_fancy();
	});
	/*TARJETAS*/
	$('body').on('click','.crear_tarjeta',creando_tarjeta_cuenta);
	$('body').on('click','.eliminar_tarjeta',eliminar_tarjeta_cuenta);
	/*NUEVO JS ------------------------------------------------------------------------------*/
	$(".text .boton").on('click',function() {
   		$(".reservacion").show();
   		$(".calendario").hide();
	});
	$('.toggleDatosUsuario').click(function(){
		
		$('.userInfoCont').stop().slideToggle();
		
	});
	$('.toggleChangePassword').click(function(){
		
		$('.cambio_contrasenna').stop().slideToggle();
		
	});
	/*INICIO*/
	$window.resize(configurar_Web);
	$window.scroll(scrollWeb);
	iniciar_Web();
});
function config_tarjetas( este ){
	/*TEXTO DE TARJETAS EN CARRO----------------------------*/
	var text	= este.val();
	var largo	= text.length;
	var padre	= este.closest('.data_tarjeta');
	
	if( largo ){
		var tarjetas = ['','visa','master','amex'];
		var tarjeta = 0;
		if( text.charAt(0) == 4 ){
			tarjeta = 1;
		}else if( text.charAt(0) == 5 ){
			tarjeta = 2;
		}else if( text.charAt(0) == 3 && text.charAt(1) == 7 ){
			tarjeta = 3;
		};
		if( padre.find('[data-tarjeta_img="'+tarjetas[tarjeta]+'"]').length ){
			padre.find('[data-tarjeta_img]').addClass('no_tarjeta');
			padre.find('[data-tarjeta_img="'+tarjetas[tarjeta]+'"]').removeClass('no_tarjeta');
		}else{
			padre.find('[data-tarjeta_img]').addClass('no_tarjeta');
		};
	}else{
		padre.find('[data-tarjeta_img]').addClass('no_tarjeta');
	};
};
function cerrar_fancy(e){
	if( e ){ e.preventDefault(); };
	$('#fancy').remove();
	borrarCargando();
};
function comprar_bici(e){
	e.preventDefault();
	if( $('.bicicleta.bici_select').length != 1 ){
		alert('Por favor, seleccione una bicicleta para continuar');
		return;
	};
	var este = $(this);
	var bicicleta = $('.bicicleta.bici_select').first();
	var data = {
		'security'	: true,
		'clase'		: $('.clase_salon [data-id_mapa]').data('id_mapa'),
		'bici'		: [ bicicleta.data('x'), bicicleta.data('y') ],
	};
	cargando();
	$.post('<?php plantilla();?>/procesos/checkout/comprar_bici.php',data).done(function(d){
		var todo_data = code = d;
		var html	= todo_data.split("<!--DATA_AJAXEND-->")[1];
		
		if ( code.indexOf("<!--DATA_AJAX-->") >= 0 ){
			code = code.split("<!--DATA_AJAX-->")[1];
		}
		if ( code.indexOf("<!--DATA_AJAXEND-->") >= 0 ){
			code = code.split("<!--DATA_AJAXEND-->")[0];
		};
		var data = JSON.parse( html );
		if( !data.ok ){
			alert( data.mensaje );
			borrarCargando();
			return;
		};
		if( $('#ajax_reservacion .back').length ){
			$('#ajax_reservacion .back').trigger('click');
		};
		$('body').append( code );
		//crear_fancy( code );
	}).always(function(){
		borrarCargando();
	});
};
function fancy_by_id(){
	var este	= $(this);
	var data	= {
		'security'	: true,
		'id'		: este.data('id_fancy'),
	};
	cargando();
	$.post('<?php plantilla();?>/procesos/traer_pagina.php',data).done(function(d){
		crear_fancy(d,'fancy_pagina');
	}).always(function(){
		borrarCargando();
	});
};
function crear_fancy( html, clase ){
	if( !clase ){
		clase = '';
	};
	if( !$('#fancy').length ){
		$('body').append('<div id="fancy" class="'+clase+'"><div id="cont_text_fancy"></div></div>');
	};
	var fancy = $('#cont_text_fancy');
	fancy.html( html+'<div class="cerrar_fancy"><img src="<?php plantilla();?>/images/cerrar_fancy.png"></div>' );
	if( clase === '' ){
		$('#cont_text_fancy .thankyou_fancy').append( $('#cont_text_fancy>.cerrar_fancy') );
	};
};
function select_bici(){
	var seleccionada= $(this).is('.bici_select');
	var id_bici		= $(this).text();
	
	$('.bicicleta').removeClass('bici_select');
	$('#colocar_id_bici').text('--');
	if( !seleccionada ){
		$(this).addClass('bici_select');
		$('#colocar_id_bici').text( id_bici );
	};
	if( $window.width() <= 1024 ){
		$("body,html").stop().animate({
			scrollTop : $('#info').first().offset().top-$('.navbar').first().outerHeight()
		},500)	
	};
};
function cabecera_calendario_fija(){
	$('.dia>h2, .contenedor_dia>h2').css('top',$window.scrollTop() );
};
function filtrar_instructor(){
	var este	= $(this);
	var valor	= este.val();
	
	if( valor == '' ){ $('.clase_calendario').removeClass('oculto');return; };
	$('.clase_calendario').addClass('oculto');
	$('.clase_calendario[data-instructor="'+valor+'"]').removeClass('oculto');
};
function cambiar_ubi_single( e ){
	e.preventDefault();
	var este = $(this);
	
	var ub		= este.closest('.ubicacion_individual');
	var titulo	= ub.find('.ubicacion');
	
	
	/*CAMBIAR TITULOS*/
	$('.ubicacion').removeClass('como_titulo');
	titulo.addClass('como_titulo');
	
	/*OCULTAR CONTENIDO*/
	$('.inner_ubi').slideUp(800);
	ub.find('.inner_ubi').slideDown(800);
	
	setTimeout(function(){
		$('body,html').stop().animate({
			scrollTop : ub.offset().top-$('#menu_sup').outerHeight()-10,
		},200);
	},810);
};
function abrir_preguntas_instructor(){
	var este = $(this);
	var abierto = este.is('.pregunta_abierta');
	
	$('.pregunta_instructor .respuesta').stop().slideUp();
	este.find('.respuesta').stop().slideToggle();
	
	$('.pregunta_instructor').removeClass('pregunta_abierta');
	if( abierto ){
		este.removeClass('pregunta_abierta');
	}else{
		este.addClass('pregunta_abierta');
	};
	
};
function salvar_facturacion(){
	if( !check_formularios( $('.datos_usuario_facturacion') ) ){ return; };
	
	var data = {
		security	: true,
		data		: [],
	};
	$('.datos_usuario_facturacion input').each(function(i, e) {
        data.data.push( [ $(e).attr('id') , $(e).val() ] );
    });
	$.post('<?php plantilla();?>/procesos/cuenta/guardar_facturacion.php',data).done(function(d){
		var data = JSON.parse( d );
		if( !data.ok ){
			alert( data.mensaje );
			return;
		};
		alert( data.mensaje,'mensaje' );
	});
};
function regala_ahora(){
	var este	= $(this);
	var checkout= este.closest('.checkout');
	
	if( !checkout.find('.paquete_checkout.seleccionado').length ){
		alert('Por favor, selecciona un paquete para continuar');
		return;
	};
	/*FECHA GIFT---------------------------*/
	if( checkout.find('#cont_calendario').length && !checkout.find('#cont_calendario table td.current.today').length ){
		alert('Te rogamos, selecciones una fecha del calendario para que le llegue ese mismo día el regalo a tu compañero');
		return;
		
	};
	if( !check_formularios( checkout.find('.data_friend') ) ){ return; };
	checkout.find('.primer_paso_check').removeClass('oculto');
	este.closest('.checkout_solo_clases').find('.paquetes_check').addClass('oculto');
	poner_paquete_seleccionado();
};
function aplicar_descuento(){
	var este	= $(this);
	var formu	= este.closest('.bloque_descuento_check');
	if( !check_formularios( formu ) ){ return; };
	
	var data = {
		'security'	: 'true',
		'codigo'	: formu.find('input').val(),
		
	};
	
	cargando();
	$.post('<?php plantilla();?>/procesos/checkout/codigo_descuento.php', data).always(function(){
		borrarCargando();
	}).done(function(d){
		var todo_data = code = d;
		if( todo_data.indexOf('<!--DATA_AJAXEND-->') != -1 ){
			var html	= todo_data.split("<!--DATA_AJAXEND-->")[1];
			
			if ( code.indexOf("<!--DATA_AJAX-->") >= 0 ){
				code = code.split("<!--DATA_AJAX-->")[1];
			}
			if ( code.indexOf("<!--DATA_AJAXEND-->") >= 0 ){
				code = code.split("<!--DATA_AJAXEND-->")[0];
			};
		}else{
			var html = todo_data;
		};
		
		var data = JSON.parse( html );
		if( !data.ok ){
			alert( data.mensaje );
			borrarCargando();
			return;
		};
		alert(data.mensaje,'mensaje');
		$('[name="codigo_descuento"]').val('');
		
		/*RECARGAMOS POR AJAX*/
		acciones_post_ajax( code, true );
	});
};
function acciones_post_ajax( code, descuento ){
	code = $(code);
	$('#info').html( code.find('#en_calendario_ajax').html() );
	$('.compra_clases .primer_paso_check').html( code.find('#en_paquetes_ajax .primer_paso_check').html() );
	$('#section_gift_card .primer_paso_check').html( code.find('#gift_en_ajax .primer_paso_check').html() );
	
	if( $('.bicicleta.bici_select').length ){
		var b = $('.bicicleta.bici_select');
		b.removeClass('bici_select').trigger('click');
	};
	if( code.find('#remove_regalo').length ){
		$('[data-idpaquete="regalo"],#remove_regalo').remove();
	};
	if( $('.hover_cuenta_ajax .data_hover').length ){
		$('.hover_cuenta_ajax .data_hover').remove();
	};
	$('.hover_cuenta_ajax').data('hoverinfo', code.find('#textito_hover').html() );
	
	$('.navbar').html( code.find('#nuevo_menu .navbar').html() );
	/*PONER PAQUETE SELECCIONADO*/
	poner_paquete_seleccionado( code );
};
function finalizar_compra(){
	var este	= $(this);
	var checkout= este.closest('.checkout');
	
	if( !checkout.find('.paquete_checkout.seleccionado').length ){
		alert('Por favor, selecciona un paquete para continuar');
		return;
	};
	if( checkout.find('.bloque_descuento_check').length ){
		if( checkout.find('.bloque_descuento_check input').val() != '' ){
			var confirmar_descuento = confirm("¿Estás seguro que deseas continuar? Has rellenado el campo de código de descuento pero no lo has aplicado. Para aplicarlo correctamente cancela este mensaje y haz click en el botón 'Aplicar código'");
			if( !confirmar_descuento ){ return; };
			checkout.find('[name="codigo_descuento"]').val('');
		};
	};
	/*FECHA GIFT---------------------------*/
	if( checkout.find('#cont_calendario').length && !checkout.find('#cont_calendario table td.today').length ){
		alert('Te rogamos, selecciones una fecha del calendario para que le llegue ese mismo día el regalo a tu compañero');
		return;
	};
	var invitado = false;
	if( checkout.find('.data_friend').length ){
		if( !check_formularios( checkout.find('.data_friend') ) ){ return; };
		invitado = {
			fecha	: checkout.find('#cont_calendario table td.today').data('dia'),
			data	: {
				nombre	: $('#name_invitado').val(),
				correo	: $('#mail_invitado').val(),
				mensaje	: $('#mensaje_invitado').val(),
			}
		};
	};
	/*END FECHA GIFT---------------------------*/
	if( !checkout.find('.terminos_condiciones .checked').length ){
		checkout.find('.terminos_condiciones').css('border-color','red');
		alert('Debes aceptar los términos y condiciones para poder continuar');
		return;
	}else{
		checkout.find('.terminos_condiciones').removeAttr('style');
	};
	/*EL ULTIMO PASO ES CONTROLAR CORRECTAMENTE LOS DATOS DEL USUARIO*/
	get_token( invitado, checkout );
};
function finalizar_compra_back(){
	get_token( false, $('#finalizar_compra_checkout'), $('#editor_compras').data('cliente') );
}
function get_token( invitado, checkout, cliente ){
	Conekta.setPublishableKey('<?php 
		$pago = new Pago_Conekta();
		echo $pago->publickey;
	?>');
	var token = false;
	/*ACÁ METEMOS LA CREACIÓN DEL TOKEN DE CONEKTA*/
	
	if( checkout.find('.tarjetas_user .checked').length ){
		/*EN ESTOS CASOS ES PORQUE EL USUARIO ELIGIÓ UNA TARJETA*/
		cargando();
		token = checkout.find('.tarjetas_user .checked').closest('[data-token]').data('token');
		procesar_compra_ya( token, invitado, checkout, cliente );
		return;
	}else{
		/*USUARIO NO ELIGIÓ TARJETA*/
		if( checkout.find('.data_tarjeta').is('.escondido') ){
			/*DATOS DE LA TARJETA ESCONDIDOS*/
			alert('Puedes crear una nueva tarjeta en tu cuenta si lo deseas','mensaje');
			checkout.find('.annadir_tarjeta').trigger('click');
			borrarCargando();
			return;
		};
		if( !check_formularios( checkout.find('.data_tarjeta') ) ){
			
			return;
		};
	};
	
	cargando();
	Conekta.token.create( checkout.find('.data_tarjeta') , function(d){
		/*OK*/
		token = d.id;
		procesar_compra_ya( token, invitado, checkout, cliente );
	}, function(d){
		/*FALSE*/
		alert( d.message_to_purchaser );
		borrarCargando();
	});
};
function eliminar_tarjeta_cuenta(){
	var este	= $(this);
	var token	= $(this).closest('[data-token]').data('token');
	var data	= {
		token	: token,
		security: true,
	};
	$.post('<?php plantilla();?>/procesos/checkout/eliminar_tarjeta.php',data).done(function(d){
		var data = JSON.parse( d );
		if( !data.ok ){
			alert( data.mensaje );
			return;
		};
		alert( data.mensaje, 'mensaje' );
		$('[data-token="'+token+'"]').remove();
	}).always(function(){
		borrarCargando();
	});
};
function creando_tarjeta_cuenta(){
	var este	= $(this);
	var c		= este.closest('.data_tarjeta');
	var padre	= este.closest('.tarjetas_user');
	
	if( !check_formularios( c ) ){ return; };
	Conekta.setPublishableKey('<?php 
		$pago = new Pago_Conekta();
		echo $pago->publickey;
	?>');
	cargando();
	Conekta.token.create( c , function(d){
		/*OK*/
		token = d.id;
		annadir_tarjeta_ya( token, false, padre );
	}, function(d){
		/*FALSE*/
		alert( d.message_to_purchaser );
		borrarCargando();
	});
	
};
function annadir_tarjeta_ya( token, invitado, padre ){
	var data = {
		security			: true,
		token		: token
	};
	/*GUARDAMOS INFO DE FACTURACION*/
	$.post('<?php plantilla();?>/procesos/checkout/crear_tarjeta.php',data).done(function(d){
		var data = JSON.parse( d );
		if( !data.ok ){
			alert( data.mensaje );
			return;
		};
		$('.cont_tarjetas_info').html( data.data.shift() );
		alert( data.mensaje, 'mensaje' );
	}).always(function(){
		borrarCargando();
	});
}

function procesar_compra_ya( token, invitado, checkout, cliente ){
	var data = {
		security			: true,
		data_facturacion	: [],
		paquete		: checkout.find('.paquete.seleccionado').data('idpaquete'),
		token		: token,
		cliente		: cliente
	};
	if( invitado ){
		data.invitado = invitado;
	};
	if( checkout.find('.guardar_pregunta_tarj .checkbox.checked').length ){
		data.guardar_tarjeta = 1;
	};
	if( checkout.closest('#ajax_reservacion').length ){
		var mapa		= checkout.closest('#ajax_reservacion').find('.clase_salon[data-id_mapa]');
		var bicicleta	= mapa.find('.bicicleta.bici_select').first();
		if( !bicicleta.length ){
			alert('Selecciona una bicicleta para poder realizar la reservación');
			borrarCargando();
			return;
		};
		data.reserva	= {
			clase	: mapa.data('id_mapa'),
			bici	: [ bicicleta.data('x'), bicicleta.data('y') ],
		};
	};
	/*GUARDAMOS INFO DE FACTURACION*/
	checkout.find('.datos_usuario_facturacion input').each(function(i, e) {
		data.data_facturacion.push( [ $(e).attr('id') , $(e).val() ] );
	});
	/*
	**Compatibilidad para comprar producos en back
	**sin necesidad de comprar paquetes ;)
	*/
	if( cliente ){
		/*sabemos que estamos en back con esta variable*/
		data.productos = get_productos_comprados( true );
	};
	$.post('<?php plantilla();?>/procesos/checkout/finalizar_compra.php',data).done(function(d){
		var todo_data = code = d;
		var html	= todo_data.split("<!--DATA_AJAXEND-->")[1];
		
		if ( code.indexOf("<!--DATA_AJAX-->") >= 0 ){
			code = code.split("<!--DATA_AJAX-->")[1];
		}
		if ( code.indexOf("<!--DATA_AJAXEND-->") >= 0 ){
			code = code.split("<!--DATA_AJAXEND-->")[0];
		};
		var data = JSON.parse( html );
		if( !data.ok ){
			alert( data.mensaje );
			borrarCargando();
			return;
		};
		
		/*
		**ACÁ ACABA EL FLUJO DEL BACK
		*/
		if( cliente ){
			alert('La compra se ha realizado correctamente.');
			$('[data-id="estudios"]').trigger('click');
			return;
		};
		
		$('.volver_a_paquetes').trigger('click');
		if( $('#ajax_reservacion .back').length ){
			$('#ajax_reservacion .back').trigger('click');
		};
		$('[data-idpaquete="regalo"]').remove();
		crear_fancy( code );
	});
}
function check_formularios( formulario ){
	var ok = true;
	var inputs = formulario.find('input,select,textarea');
	
	inputs.each(function(i, e) {
        if( $(e).val() == '' ){
			$(e).css('border-color','red');
			ok =false;
		}else{
			$(e).removeAttr('style');
		};
    });
	if( !ok ){
		alert('Completa todos los campos del formulario marcados en rojo');
		return ok;
	};
	var numeros = formulario.find('[type="number"]');
	if( numeros.length ){
		/*SON NUMEROS?*/
		numeros.each(function(i,e){
			if( isNaN( $(e).val() ) ){
				$(e).css('border-color','red');
				ok =false;
			}else{
				$(e).removeAttr('style');
			};
		});
		if( !ok ){
			alert('Los campos marcados en rojo deben de ser numéricos');
			return ok;
		};
	};
	/*MAILS------------------------------------*/
	var mails = formulario.find('[type="email"]');
	mails.each(function(i,e){
		if( $(e).val().indexOf('.') == -1 || $(e).val().indexOf('@') == -1 ){
			$(e).css('border-color','red');
			ok =false;
		}else{
			$(e).removeAttr('style');
		};
	});
	if( !ok ){
		alert('Escribe un correo electrónico válido');
		return ok;
	};
	/*SIZE----------------------------*/
	var size = formulario.find('[size]');
	size.each(function(i,e){
		if( $(e).val().length != $(e).attr('size') ){
			$(e).css('border-color','red');
			ok =false;
		}else{
			$(e).removeAttr('style');
		};
	});
	if( !ok ){
		alert('Los campos requeridos no tienen el tamaño necesario para continuar');
		return ok;
	};
	
	return ok;
};
function select_paquete(ev, simulado){
	var este= $(this);
	var c	= este.closest('.checkout');

	c.find('.paquete_checkout').removeClass('seleccionado');
	c.find('.sin_seleccionar').removeClass('sin_seleccionar');
	este.addClass('seleccionado');
	
	if( c.is('.check_gift') ){ return; };
	
	c.find('.primer_paso_check').removeClass('oculto');
	
	if( este.closest('.checkout_solo_clases').length ){
		este.closest('.checkout_solo_clases').find('.paquetes_check').addClass('oculto');
		poner_paquete_seleccionado(  );
	};
	if( !simulado && este.closest('#info').length && $window.width() <= 1024 ){
		$("body,html").stop().animate({
			scrollTop : este.closest('#info').find('.ch-pay').first().offset().top-$('.navbar').first().outerHeight()
		},500)	
	};
	
	return;
	
	var scroll_to = $('#cont_calendario').length ? $('.calendario_gift_card>h2').first() : $('.primer_paso_check');
	$('body,html').animate({scrollTop: scroll_to.offset().top-$('#menu_sup').outerHeight() }, 500);
};
function invitar_amigo(){
	if( !check_form_invita() ){ return; };
	var data = {
		security : true,
		invitado1: $('#invitado_1').val(),
		invitado2: $('#invitado_2').val(),
	};
	$.post('<?php plantilla();?>/procesos/cuenta/invitar_amigo.php',data).done(function(d){
		var data = JSON.parse( d );
		$('#invitado_1,#invitado_2').removeAttr('style');/*RESET*/
		if( !data.ok ){
			alert( data.mensaje );
			if( data.data ){
				$(data.data).each(function(i, e) {
                    $('#'+e).css('border-color','red');
                });
			};
			return;
		};
		alert( data.mensaje,'mensaje' );
	});
};

function check_form_invita(){
	var ok			= true;
	var invitado1	= $('#invitado_1');
	var invitado2	= $('#invitado_2');
	
	if( invitado1.val() == invitado2.val() ){
		ok = false;
		invitado1.css('border-color','red');
		invitado2.css('border-color','red');
	}else{
		invitado1.removeAttr('style');
		invitado2.removeAttr('style');
	};
	if( !ok ){
		alert('Los invitados no pueden tener el mismo correo electrónico');
		return ok;
	};
	if( !checar_mail( invitado1 ) || !checar_mail( invitado2 ) ){
		ok = false;
	};
	if( !ok ){
		alert('Por favor, escribe una dirección de correo válida');
		return ok;
	};
	return ok;
};
function checar_mail( val ){
	if( !val ){ return false; };
	var ok = true;
	
	if( val.val().indexOf('.') == -1 || val.val().indexOf('@') == -1 ){
		ok = false;
		val.css('border-color','red');
	}else{
		val.removeAttr('style');
	};
	
	return ok;
};
function cambiar_contrasenna(){
	var form = $('.cambio_contrasenna').first()
	if( !check_cambio_contra(form) ){ return; };
	var data = {
		'security'		: true,
		'user_password'	: form.find('#user_password').val(),
		'user_password2': form.find('#user_password2').val(),
	};
	cargando();
	$.post('<?php plantilla();?>/procesos/cuenta/cambio_contrasenna.php',data).always(function(){
		borrarCargando();
	}).done(function(d){
		var data = JSON.parse( d );
		
		if( !data.ok ){
			alert( data.mensaje );
			return;
		};
		
		alert( data.mensaje,'mensaje' );
	});
};
function check_cambio_contra(form){
	var ok	= true;
	var inputs = form.find('input');
	inputs.each(function(i,e){
		if( $(e).val() == '' ){
			ok = false;
			$(e).css('border-color','red');
		}else{
			$(e).removeAttr('style');
		};
	});
	if( !ok ){
		alert('Completa los dos campos de contraseña para realizar el cambio de la misma');
		return ok;
	};
	if( form.find('#user_password2').val() !== form.find('#user_password').val() ){
		ok = false;
		alert('Los dos campos debem de contener la misma contraseña');
		return ok;
	};
	return ok;
};
function salvar_cuenta(){
	if( !check_salvar_cuenta() ){ return; };
	
	var data = {
		'security'			: '',
		'user_email'		: $('#user_email').val(),
		'display_name'		: $('#display_name').val(),
		'user_nacimiento'	: $('#user_nacimiento').val(),
	};
	cargando();
	$.post('<?php plantilla();?>/procesos/cuenta/salvar_cuenta.php',data).always(function(){
		borrarCargando();
	}).done(function(d){
		var data = JSON.parse( d );
		
		if( !data.ok ){
			alert( data.mensaje );
			return;
		};
		
		$('body').append( data.mensaje );
	});
};
function check_salvar_cuenta(  ){
	var ok =true;
	var user_email	= $('#user_email');
	var valor_mail	= user_email.val();
	
	var display_name= $('#display_name');
	
	if( valor_mail.indexOf('.') == -1 || valor_mail.indexOf('@') == -1 ){
		ok = false;
		user_email.css('border-color','red');
	}else{
		user_email.removeAttr('style');
	};
	if( !ok ){
		alert('Completa el campo de mail con una dirección de correo electrónico válida');
		return ok;
	};
	
	if( display_name.val() == '' ){
		display_name.css('border-color','red');
		ok = false;
		alert('Por favor, escribe tu nombre en el campo marcado con rojo');
		return ok;
	}else{
		display_name.removeAttr('style');
	};
	
	return ok;
}
function comprobar_cuenta( e, este ){
	if( !este ){
		este = $(e.target);
	};
	
	var formu = este.closest('.form_acceso');
	formu.removeClass('form_seteado');
	
	
	var nombre		= formu.find('[name="nombre_user"]');
	var contrasenna	= formu.find('[name="pass_user"]');
	
	nombre.addClass('oculto').val('');
	contrasenna.addClass('oculto').val('');
	
	if( e !== true && e.keyCode && e.keyCode != 13 ){ return; };
	
	var este = formu.find('[name="mail_usuario"]');
	
	if( este.val() == '' || este.val().indexOf('.') == -1 || este.val().indexOf('@') == -1 ){
		este.css('border-color','red');
		alert('Escribe un campo válido para tu correo electrónico');
		return;
	}else{
		este.removeAttr('style');
	};
	
	comprobar_reg_o_access( formu );
};
function acceder(){
	var este = $(this);
	var c	 = este.closest('.form_acceso');
	
	if( !c.is('.form_seteado') ){
		comprobar_cuenta( true, este );
		return;
	};
	
	if( !check_final_access( c ) ){ return; };
	
	var data = {
		'security'		: true,
		'mail_usuario'	: c.find('[name="mail_usuario"]').val(),
		'nombre_user'	: c.find('[name="nombre_user"]').val(),
		'pass_user'		: c.find('[name="pass_user"]').val(),
		'redireccion'	: c.find('[name="redirection"]').val(),
	};
	if( c.find('[name="codigo_activacion"]').length ){
		data.codigo_activacion = c.find('[name="codigo_activacion"]').val();
	};
	if( $('.clase_salon[data-id_mapa]').length ){
		data.clase_mostrada = $('.clase_salon[data-id_mapa]').data('id_mapa');
	};
	cargando();
	$.post('<?php plantilla();?>/procesos/cuenta/acceso.php',data).always(function(){
		borrarCargando();
	}).done(function(d){
		var todo_data = code = d;
		if( todo_data.indexOf('<!--DATA_AJAXEND-->') != -1 ){
			var html	= todo_data.split("<!--DATA_AJAXEND-->")[1];
			
			if ( code.indexOf("<!--DATA_AJAX-->") >= 0 ){
				code = code.split("<!--DATA_AJAX-->")[1];
			}
			if ( code.indexOf("<!--DATA_AJAXEND-->") >= 0 ){
				code = code.split("<!--DATA_AJAXEND-->")[0];
			};
		}else{
			var html = todo_data;
		};
		
		var acceso = JSON.parse( html );
		if( !acceso.ok ){
			alert( acceso.mensaje );
			return;
		};
		var redirection = c.find('[name="redirection"]').val();
		if( redirection === 'AJAX' ){
			acciones_post_ajax( code );
		}else{
			if( c.find('[name="variables_get"]').length ){
				redirection += c.find('[name="variables_get"]').val();
			};
			document.location.href = redirection;
		};
	});
};
function poner_paquete_seleccionado( code ){
	/*SISTEMA DE COMPRA DE CLASES*/
	var h = $('.compra_clases .paquete.seleccionado');
	if( h.length ){
		$('.compra_clases .clases_nueva').find('>h5, >span, .circulo,.precios,.titclase').remove();
		$('.compra_clases .clases_nueva .block_paquetes_ee').html( h.html() );
	};
	if( code ){
		var seleccionado = $('.compra_clases .paquete.seleccionado').data('idpaquete');
		$('.compra_clases .paquetes_check').html( code.find('#en_paquetes_ajax .paquetes_check').html() );
		$('.compra_clases .paquete[data-idpaquete="'+seleccionado+'"]').addClass('seleccionado');
	};
	/*SISTEMA GIFT CARD*/
	var h = $('.check_gift .paquete.seleccionado');
	if( h.length ){
		$('.check_gift .clases_nueva').find('>h5, >span, .circulo,.precios,.titclase').remove();
		$('.check_gift .clases_nueva .block_paquetes_ee').html( h.html() );
	};
};
function check_final_access( formu ){
	var inputs = formu.find('input:not(".oculto")');
	var ok = true;
	inputs.each(function(i, e) {
        if( $(e).val() == '' ){
			$(e).css('border-color','red');
			ok = false;
		}else{
			$(e).removeAttr('style');
		};
    });
	if( !ok ){
		alert('Completa todos los campos del formulario marcados en rojo');
	};
	return ok;
};
function comprobar_reg_o_access( formu ){
	cargando();
	var data = {
		security	: true,
		mail		: formu.find('[name="mail_usuario"]').val(),
	};
	$.post('<?php plantilla();?>/procesos/cuenta/comprobar_reg_access.php',data).always(function(){
		borrarCargando();
	}).done(function(d){
		var acceso = JSON.parse( d );
		if( !acceso ){
			/*REGISTRO*/
			formu.find('[name="nombre_user"]').removeClass('oculto');
			formu.find('[name="nombre_user"]').focus();
		}else{
			formu.find('[name="pass_user"]').focus();
		};
		formu.find('[name="pass_user"]').removeClass('oculto').focus();
		formu.addClass('form_seteado');
	});
};
function iniciar_Web(){
	check_variables_get();
	configurar_Web();
	link_activo();
	<?php if( is_home() && isset( $_GET['select_paquete'] ) ){?>
		ir_a( 'reserva' );
		setTimeout(function(){
			$('[data-clase_calendario="<?php echo  $_GET['select_paquete'];?>"]').trigger('click');
		},1000);
	<?php };?>
	$(window).trigger('scroll');
	iniciada = true;
};
function ir_a( go_to ){
	var e = $( '#'+go_to );
	if( !e.length ){ return; };
	
	$('.menuabierto').hide();
	$('.abrio_menu').removeClass('abrio_menu');
	var menu	= $('.navbar');
	var alto_m	= menu.is('.menu_pequenna') ? $('.navbar').outerHeight() : $('.navbar').outerHeight()-20;
	
	var arriba = e.offset().top - alto_m;
	
	$('body,html').stop().animate({
		scrollTop : arriba
	},500);
};
function check_variables_get(){
	var go_to = getUrlParameter('go_to');
	if( go_to ){
		ir_a( go_to );
	};
	var paquete_compra = getUrlParameter('paquete_compra');
	if( paquete_compra ){
		$('.checkout_solo_clases .paquete.seleccionado').trigger('click');
	};
	<?php if( isset( $_GET['gracias'] ) ){
		$data_get = isset( $_GET['reserva_data'] ) ? (int)$_GET['reserva_data'] : false;
		?>
		crear_fancy('<?php info_pedido( $data_get );?>');
		<?php
	};?>
}
function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}
function habilitar_video_dos(){
	$('#cont_video,#texto_home,#play_home').addClass('video_en_groso');
	$('#close_home,#video_dos').show(0);
	var video = document.getElementById('video_home');
	video.pause();
};
function deshabilitar_video_dos(){
	$('#cont_video,#texto_home,#play_home').removeClass('video_en_groso');
	$('#close_home,#video_dos').hide(0);
	var video = document.getElementById('video_dos');
	video.pause();
	reproducir_video('video_home');
};
function configurar_Web(){
	if( $window.width() > 600 ){
		config_contenido( $('.contenido') );
	};
	$('.top').height( $window.height() );
	$('.info_en_c').remove();
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
	if( !iniciada ){
		$('body>.contenido').stop().animate({'opacity':1},200);
	}else{
		$('body>.contenido').css({'opacity':1});
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
function scrollWeb(){
	if( $('.calendario').length ){
		//cabecera_calendario_fija();
	};
	<?php if( is_home() ){?>
	var startchange = $('.navbar');
	if( startchange.length ){
		$(document).scroll(function() { 
			if( $window.scrollTop() > 50 ) {
				$('.navbar').addClass('menu_pequenna');
			} else {
				$('.navbar').removeClass('menu_pequenna');
			}
		});
	};
	<?php };?>
	//parallax_circulos();
};
function parallax_circulos(){
	parallax_W( $('#parallax1'), '30%', 0.2, $('body'),'top' );
	parallax_W( $('#parallax2'), '30%', 0.7, $('body') );
	parallax_W( $('#parallax3'), '40%', 0.7, $('body') );
	parallax_W( $('#parallax4'), '50%', 0.8, $('body') );
	parallax_W( $('#parallax5'), '40%', 0.3, $('body') );
};
/*PARALLAX OFFSET*/
function parallax_W(elemento,altura,velocidad,padre,direccion,solo_valor){
	if(!elemento){	alert('No has seleccionado ningun elemento para test_Offset');};
	if(!altura){	altura	= 0; };
	if(!velocidad){	velocidad	= 1; };
	if(!padre){		padre	= elemento.parent(); };
	if(!direccion){	direccion	= 'top'; };
	
	var topPadre	= padre.offset().top-jQuery(window).scrollTop();
	
	if(isNaN(altura)){
		switch(direccion){
			case 'left':
				var posNino	= padre.outerWidth()*(parseInt(altura)/100);
			break;
			default:
				var posNino	= padre.outerHeight()*(parseInt(altura)/100);
			break;
		};
	}else{
		var posNino	= altura;
	};
	var topEle	= (topPadre*velocidad)+posNino;
	
	if(solo_valor){ return parseInt(topEle); };
	$(elemento).css(direccion,topEle);
};
function link_activo(){
	var l = document.location.href;
	$('[href="'+l+'"]').addClass('link_actual');
};
function iniciar_todo_el_canvas(){
	var canvas			= $('#equipo_canvas');
	if( !canvas.length ){ return; };
	
	var instructores	= canvas.find('.i_en_c');
	if( !instructores.length ){ return; };
	
	var margen_ins	= 55;
	var zindex		= 10;
	instructores.each(function(i,e){
		if( i !== 0 ){ 
			var cartel = $('.info_i_c[data-instructor="'+$(e).data('instructor')+'"]')
			
			
			if( i%2=== 0 ){
				$(e).css({
					'right'	: (margen_ins)+'%',
				});
				margen_ins+=15;
			}else{
				$(e).css({
					'left'	: (margen_ins)+'%',
				});
			};
		};
		$(e).css({
			'z-index'	: zindex,
		});
		zindex--;
	});
	instructores.on('mouseenter',function(){
		$('.info_en_c').remove();
		var data	= $(this).data('general');
		var e		=
		$('<div class="info_en_c" data-instructor="'+$(this).data('instructor')+'">'+
			'<span class="i_name">'+data[0]+'</span>'+
/*
			'<div class="mas_info_prof">'+
				data[2]+
				'<a class="ir_mas_i_i" href="'+data[1]+'">Info</a>'+
			'</div>'+
*/
		'</div>');
		canvas.append(e);
		
		e.css({
			'bottom'	: $(this).outerHeight()-80,
			'right'	: ( $window.outerWidth()-($(this).position().left) ) - ( $(this).outerWidth() / ( 1.5 ) ),
		});
		e.on('mouseenter',function(){
			instructores.removeClass('instruc_no_hover');
			canvas.find('.i_en_c[data-instructor="'+e.data('instructor')+'"]').addClass('instruc_no_hover');
		}).on('mouseleave',function(){
			instructores.removeClass('instruc_no_hover');
		});
	})
	canvas.on('mouseleave',function(e){
		$('.info_en_c').remove();
	});
}
jQuery(document).ready(function(){
	$(".clase_calendario").click(function(){
		cargando();
		var data = {
			"id_calendario":$(this).closest(".clase_calendario").data("clase_calendario")
		};
		$.post('<?php plantilla();?>/procesos/setcalendar.php',data,function(d){
			$('#ajax_reservacion').html(d);
			$(".reservacion").show();
			$(".calendario").hide();
			$('.reservacion .paquete').first().trigger('click', true);
			borrarCargando();
		});

	});

	$("#ajax_reservacion").on("click",".back",function(){
		cargando();
		setTimeout(function(){
			$(".reservacion").hide();
			$(".calendario").show();
			if( !$('#fancy').length ){
				borrarCargando();
			};
		},700);
	});
	$("body").on("click",'[data-go]',function(e){
		e.preventDefault();
		var este = $(this);
		var data	= este.data("go");
		var el	= $('#'+data+':visible');
		
		if( el.length ){
			ir_a( data );
		}else{
			var href = este.data("another") && $window.outerWidth() > 800 ? este.data('another') : este.attr('href');
			document.location.href = href;
		}
		return;
	});
});
function get_productos_comprados( checkout ){
	var productos	= $('.producto_compra');
	var retorno		= [];
	
	if( productos.length ){
		productos.each(function(i, e) {
			var cantidad = $(e).find('.producto_cantidad').val()
			
			if( cantidad && cantidad != 0 ){
				/*
				**ESTE HACK ES PARA DEVOLVER EL VALOR FORMATEADO
				**EN EL MOMENTO DE LA COMPRA
				**SI NO ES CHECKOUT DEVOLVEMOS EL JQUERY SINO
				**DEVOLVEMOS UN OBJETO CON INFO PARA PROCESAR EN AJAX
				*/
				if( checkout ){
					
					retorno.push( {
						'ID_producto'	: $(e).data('idproducto'),
						'cantidad'		: $(e).find('input').val(),
					} );
				}else{
					retorno.push( $(e) );
				};
			};
		});
	};
	
	return retorno;
}

// ]]></script>