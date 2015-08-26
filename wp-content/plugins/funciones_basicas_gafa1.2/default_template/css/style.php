<style type="text/css">
	*{
		margin:0px;
		padding:0px;
	}
	body,html{
		display:block;
		min-height:100%;
	}
	ol,ul {
		list-style-position: inside;
	}
	img{
		max-width:100%;
		height:auto;
		border: 0px solid;
	}
	a{
		color:inherit;
		text-decoration:none;
		transition:1s opacity ease;
		-moz-transition:1s opacity ease;
		-ms-transition:1s opacity ease;
		-o-transition:1s opacity ease;
		-webkit-transition:1s opacity ease;
	}
	a:hover{
		opacity:0.6;
	}
	.oculto{
		display:none !important;
	}
	/*ERROR GAFA*/
	.gafa-mensaje,.gafa-error{
		position: fixed;
		top: -61px;
		width: 88%;
		background: url("<?php plantilla(); ?>/images/X2.png") no-repeat 2% 52% rgba(32,32,32,.9);
		min-height: 61px;
		z-index: 2147483647;
		line-height: 19px;
		font-size: 10px;
		cursor: pointer;
		font-family: proxima-nova;
		color: white;
		font-weight: 100;
		padding: 0 6%;
		left: 0px;
		text-align: left;
		letter-spacing: 1px;
	}
	.gafa-error {
		background-color: rgba(202,25,25,.9);
	}
	.gafa-error h1,.gafa-mensaje h1 {
		font-size: 21px;
		font-weight: 100;
		margin-top: 16px;
	}
	/*PREGUNTAS GAFA*/
	div#pregunta_gafa {
		position: fixed;
		z-index: 999;
		background: #FFF;
		padding: 80px;
		top: 30%;
		right: 0px;
		left: 50%;
		width: 360px;
		margin-left: -275px;
		text-align: center;
		border: 1px solid #808080;
	}
	
	div#pregunta_gafa .boton {
		margin: 3px 5px;
	}
	
	div#aceptar_pregunta_gafa {
		margin-top: 13px !important;
	}
	/*CARGANDO*/
	#cargando {
		background-color: rgba(255,255,255,0.8);
		background-image: url('<?php plantilla(); ?>/images/Easybet.gif');
	}
	.cover{
		position: fixed;
		-webkit-transform: translateZ(0);
		top: 0px;
		left: 0px;
		bottom: 0px;
		right: 0px;
		z-index:999;
		background-position: center center;
		background-repeat: no-repeat;
	}

</style>