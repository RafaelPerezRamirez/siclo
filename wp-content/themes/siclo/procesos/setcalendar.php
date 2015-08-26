<?php
require_once('../../../../wp-load.php');
$id_class=isset($_POST['id_calendario']) ?  $_POST['id_calendario'] : false;
?>
<div class="row columna_cabecera">
    <div class="col-xs-5"><small class="rounded azul back">Volver al calendario</small></div>
    <div class="col-xs-7 text-right">
        <span class="color_gris2 medium">Selecciona tu bici y entra en el <span class="color_azul">Si</span>clo.</span>
        <big class="color_negro">¡Ponte a <span class="color_azul">rodar</span>!</big>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-7">
        <div class="clase_salon center-block">
            <?php
				$clase = new Clase($id_class);
				$clase->imprimir_forma();
            ?>
        </div>
    </div>
    <div class="col-md-5 brr">
        <div class="paquetes gris4" id="info">
            <?php
                if ( is_user_logged_in() ) {
                    global $current_user;
                    $c  =  numero_clases_user( $current_user->ID );
                    if($c===0){
                        tarjeta();
                    }else{
                        usuarioinfo( false, false, true, $clase );
                    }
                } else{
                    registroinfo( $clase );
                }
            ?>
        </div>
    </div>
</div>
