<?php header('Content-Type: text/css');?>
<?php if( 2===5 ){?>
<style>
<?php };?>

/* CSS Document */
canvas#usuarios_por_fechas_canvas {
    background-color: red;
    width: 600px;
    height: 100px;
    margin: 0 auto;
}

.grafica {
    display: block;
    margin: 10px auto;
    width: 80%;
    height: 400px;
    position: relative;
    border: 1px solid #e4e4e4;
    background-color: white;
    overflow: hidden;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
}
.grafica-titulo {
    margin-top: 30px;
    font-size: 17px;
    color: gray;
}
.grafica-cuerpo {
    position: absolute;
    left: 10px;
    right: 10px;
    top: 30px;
    bottom: 60px;
    display: flex;
    font-size: 9px;
    color: gray;
    font-weight: 100 !important;
    align-items: flex-end;
}

.grafica-cuerpo>* {
    flex: 1;
}

.grafica-columna {
    position: relative;
    display: flex;
    height: 212px;
    align-items: flex-end;
    margin: 0px 2px;
    margin-bottom: 40px;
  border-bottom: 1px solid rgb(192, 192, 192);
  box-shadow: 0px 5px 0px -1px rgb(255, 255, 255), 0px 4px rgb(192, 192, 192);
}

.grafica-footer {
  position: absolute;
  bottom: -18px;
  text-align: right;
  right: 50%;
  white-space: nowrap;
  transform: rotate(-45deg);
  transform-origin: right top;
}

.grafica-barra {
    display: inline-block;
    vertical-align: bottom;
    flex: 1;
    margin: 0px 2px;
	position:relative;
	padding-bottom:7px;
}

.leyenda {
    position: absolute;
    bottom: 15px;
    right: 20px;
}
.leyenda {
    font-size: 10px;
}

.leyenda>* {
    display: inline-block;
    vertical-align: middle;
    color: gray;
}

.bloque-leyenda {
    height: 10px;
    width: 30px;
    margin-left: 20px;
}
.grafica-numero-barra {
	background-color: rgb(255, 255, 255);
	position: absolute;
	bottom: 100%;
	left: 0px;
	right: 0px;
}
.grafica-barra-footer {
    position: absolute;
    left: 2px;
    right: 2px;
    background-color: white;
    bottom: 0px;
	font-size: 6px;
}
.grafica_instructores {
    width: 47%;
    display: inline-block;
    margin: 10px 1%;
}
.grafica_instructores {
    width: 47%;
    display: inline-block;
    margin: 10px 1%;
}

.grafica-instructor-foto {
    height: 70px;
    position: absolute;
    top: 10px;
    right: 10px;
}
<?php if( 2===5 ){?>
</style>
<?php };?>