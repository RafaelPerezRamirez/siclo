<?php header('application/javascript');?>
<?php if( 2===5 ){?>
<script type="text/javascript">
<?php };?>
// JavaScript Document
(function(){
	/*FUNCIONES A CORRER*/
	cargar_css();
	
	
	/*FUNCIONES*/
	function cargar_css(){
		var cssId = 'css-analitica';  // you could encode the css path itself to generate id..
		if (!document.getElementById(cssId)){
			var head  = document.getElementsByTagName('head')[0];
			var link  = document.createElement('link');
			link.id   = cssId;
			link.rel  = 'stylesheet';
			link.type = 'text/css';
			link.href = admin_href+'/classes/analiticas/css/css-analitica.php';
			link.media = 'all';
			head.appendChild(link);
		}
	};
	
})($);


<?php if( 2===5 ){?>
</script>
<?php };?>