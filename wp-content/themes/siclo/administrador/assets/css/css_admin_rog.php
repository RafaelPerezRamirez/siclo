<style>
	.inlineB {
		display: inline-block;
		vertical-align: top;
	}
	.inlineB.escondido {
		display: none;
	}
	.bookings_top_single {
		<?php compatible('box-shadow: 7px 0px 9px -9px rgba(84,84,84,1)!important;'); ?>
		height: 50px;
		overflow: hidden;
		border: 1px solid <?php echo GRIS_C?>;
		padding: 5px 0;
	}
	.bookings_top_single div, .bookings_bottom_single div {
		display: inline-block;
		vertical-align: top;
	}
	.basic_bookings {
		font-size: 13px;
		color: #595858;
		line-height: 56px;
		text-align: center;
		font-weight: 800;
		padding: 0 20px;
		border-right: 1px solid <?php echo GRIS_C?>;
	}
	.bookings_bottom_single .basic_bookings{
		padding-right: 4px;
  		padding-left: 4px;
	}
	span.basic_bookings.symbols.viendo.usando{
		border-radius: 45px;
	}
	.basic_bookings.bookings_time.single_booking_name {
	    margin-left: 10px;
	}
	.calendario_back_end .basic_bookings.bookings_time, 
	.calendario_back_end .basic_bookings.bookings_instructor,
	.calendario_back_end .basic_bookings.bookings_available {
	  width: 73px;
	}
	.bookings_available, .bookings_taken{
		line-height: 45px!important;
	}
	.bookings_top_single .bookings_date, .bookings_top_single .bookings_instructor {
		font-size: 14px;
		font-weight: 400;	}
	.bookings_top_single .bookings_instructor {
		background: transparent;
	}
	.bookings_top_single .bookings_available, .bookings_top_single .bookings_taken {
		font-size: 30px;
		color: #23cffd;
		font-weight: 400;
	}
	.bookings_top_single .bookings_taken {
		color: #ced4d6;
	}
	.bookings_edit, .bookings_print {
		background-image: url('<?php imagenes();?>/edit_bookings.png');
		height: 50px;
		background-position: center;
		background-repeat: no-repeat;
		width: 80px;
		float: right;
		cursor: pointer;
	}
	.bookings_edit:hover {
		background-image: url('<?php imagenes();?>/edit_bookings_hover2.png');
		background-position: center;
		background-repeat: no-repeat;
		background-color: #23cefc;
	}
	.bookings_print {
		background-image: url('<?php imagenes();?>/print.png');
	}
	.bookings_print:hover {
		background-image: url('<?php imagenes();?>/print2.png');
		background-position: center;
		background-repeat: no-repeat;
		background-color: #23cefc;
	}
	.cabecera_edit_user div {
		margin-left: 11px;
		font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif!important;
		line-height: 33px;
		letter-spacing: 2px;
		text-transform: uppercase;
	    width: 31%;
	    border-radius: 3px;
	    text-align: center;
	    padding: 0;
	    box-sizing: border-box;
	    color: <?php echo GRIS?>;
	    font-weight: 800;
	    cursor: pointer;
	    font-size: 9px;
	}
	.cab_salon{
		line-height: 33px;
		letter-spacing: 2px;
		text-transform: uppercase;
	    width: 20%;
	    border-radius: 3px;
	    text-align: center;
	    padding: 0;
	    box-sizing: border-box;
	    cursor: pointer;
	    font-size: 8px;
	}
	.upcoming_reservations {
		margin-left: 20px;
		background: <?php echo GRIS_C?>;
	}
	.upcoming_reservations h2 {
		font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif!important;
		text-indent: 10px;
		background: white!important;
		letter-spacing: 1px;
		text-align: left;
		font-size: 10px;
	    font-weight: 800;
	    line-height: 50px;
	    color: #c2c1c1;
	    text-transform: uppercase;
	    letter-spacing: 2px;

	}
	/*HACER MEGE CON LA INSTRUCCION DEL CSS MASTER*/
	.panel_doble>header >* {
		width: 50%;
	}
	.panel_doble>header >:last-child {
		background: white;
		cursor: pointer;
	}
	/*FIN DEL MERGE*/
	.user_edit_create .bookings_bottom_single {
		border-bottom: none;	
		margin: 0 25px;
		padding: 5px 0 !important;
	}
	.user_edit_create .bookings_bottom_single span  {
		font-size: 13px !important;
		font-weight: 400 !important;
		display: inline-block;
		vertical-align: top;
		line-height: 50px;
	}
	.user_edit_create .bookings_bottom_single .upcoming_reservations_date {
		color: #000;
		font-size: 14px !important;
		font-weight: 800 !important;
		margin-right: 40px;
	}
	.upcoming_reservation_address, .upcoming_reservation_user, .upcoming_reservation_time, .upcoming_reservation_separator {
		padding: 0 15px;
	}
	.past_reservations {
		margin: 20px 0;
	}
	.user_edit_create .bookings_bottom_single.bookings_bottom_single_pastReservations {
		
	}
	.user_edit_create div[data-user_content] > input, .user_edit_create .rolSelect, .instructor_editor input {
	    background: transparent;
	    font-weight: 400;
	    text-indent: 25px;
	    text-align: left;
	    margin-bottom: 0;
	}
	.half_input {
		width: 20.2%;
	}
	.third_input {
		width: 31%;
	}
	.hideContent {
		display: none;
	}
	.isSelected {
		background: #a7a7a7;
		color: white!important;
	}
	.rolSelect {
		padding: 13px;
		box-sizing: border-box;
		font-size: 14px;
		border: 1px solid #f0f0f0;
		color: #898989;
		display: inline-block;
		vertical-align: top;
		cursor: pointer;
		position: relative;
		width:96%;
		margin-left: 10px;
	}
	input[type=date] {
		border: solid 1px #C5C5C5;
		display: inline-block;
		vertical-align: top;
		height: 36px;
	}
	.rol_options {
		position: absolute;
		bottom: 100%;
		left: 0;
		right: 0;
		text-align: center;
		background: #fff;
		display: none;
	}
	.rol_options p {
		padding: 5px 0;
	}
	.rol_options p:hover {
		background: <?php echo GRIS_C?>;
	}
	.instructor_editor .eliminar_instructor {
		width: 5%;
		margin-top: 11px;
	}
	.eliminar_instructor{
		background: transparent;
	}
	.instructor_editor .titulo_cabecera {
		width: 27.7%;
	}
	.editor.instructor_editor input {
	    background: transparent;
	    margin: 0;
	}
	.panel_doble>header >.filtro_busqueda {
	   width: 33%;
	}
	.b_d .b_d-attach, .instructor_data_upload ,.b_d-attach,.calendario_back_end .hora:last-child {
		font-size: 12px;
		border: 2px dashed <?php echo GRIS_C?>;
		padding: 10px;
		margin-left: 15px;
		color: <?php echo GRIS?>;
		margin-bottom: 5px;
		position: relative;
		text-align: center;
		width: 50px;
		height: 50px;
		background: url("<?php imagenes();?>/plus.png") no-repeat;
		background-position: center;
		display: inline-block;
		cursor: pointer;
	}
	.instructor_data_upload .b_d-attach{
		margin-top: -13px;
		border: none!important;
		padding: 0px;
		margin-left: 0px;
		background-color: white!important;
		margin-bottom: 0px!important;
		width: 100px;
		height: 50px;
		background: url("<?php imagenes();?>/plus2.png") no-repeat;
		background-position: center;
		display: inline-block;
		cursor: pointer;
	}
	.instructor_data_upload{
		border: none!important;
		height: 30px!important;
	}
	.instructor_data_upload:hover{
		border: none!important;
	}
	.instructor_data_upload .b_d-attach:hover{
		border: none;
	}
	.b_d .b_d-attach:hover .b_d-attach:hover,.calendario_back_end .hora:last-child:hover {
		border: 2px dashed #fff!important;	
	}
	#reservaciones_menu > header >:last-child {
		background: inherit;
	}
	.instructor_data_upload, .instructor_circle_choose {
		border: 1px solid <?php echo GRIS_C?>;
		box-sizing: border-box;
		padding: 5px 0;
		height: 91px;
	} 
	.instructor_circle_choose {
		padding: 35px 0;
	}
	.instructor_data_upload > p {
		font-size: 13px;
		color: <?php echo GRIS?>;
		padding: 0 25px;
		position: relative;
		top: 20px;
	}
	.instructor_data_upload > p span {
		font-weight: 800;
		font-size: 16px;
		color: #000;
		text-transform: uppercase;
	}
	.instructor_circle_choose p {
		font-size: 12px;
		color: <?php echo GRIS?>;
		margin-left: 40px;
	}
	.instructor_single_question {
		font-size: 13px;
		border-bottom: 2px dotted #000;
	}
	.instructor_single_goright {
		float: right;
	}
	.instructor_single_question img {
		padding: 5px 15px;
		border-left: 1px solid #f0f0f0;
	}
	.instructor_single_answer_hide {
		display: none;
	}
	textarea.instructor_single_answer {
		height: 150px;
	}
	.instructor_cabecera_current {
		background: #a7a7a7;
		color: white!important;
	}
	.incoming_current_week {
		font-size: 13px;
		margin: 0 5px 0 20px;
		position: relative;
	}
	.horizontal_incoming {
		height: 2px;
		background: #000;
		width: 200px;
		position: relative;
		top: 10px;
		margin: 0 5px;
	}
	.week_button {
		font-size: 13px;
		color: #999b9b;
		background: #f0f0f0;
		padding: 0 25px;
		height: 40px;
		line-height: 40px;
		margin: 0 5px;
		cursor: pointer;
	}
	.instructor_incoming_days {
		text-align: center;
		margin-top: 10px;
	}
	.instructor_incoming_days span {
		text-transform: uppercase;
		width: 13%;
		box-sizing: border-box;
		background: #f0f0f0;
		color: #999b9b;
		margin: 0 2.5px;
		text-align: center;
		line-height: 38px;
		cursor: pointer;
		font-size: 10px;
		margin-bottom: 15px;
	}
	.instructor_incoming_days .dia_activo,.instructor_incoming_calendar .semana_activa,.titulos_cab_cal .semana_activa {
		background: #23cffd;
		color: white;
	}
	.instructor_incoming_classes {
	    padding: 10px 0;
	} 
	.bookings_bottom_single{
		background-color: #f9f9f9;
	}
	.basic_bookings.single_booking_name{
		color: #878686!important;
	}
	.basic_bookings.bookings_time.single_booking_name {
    	width: 272px;
	}
	.basic_bookings.bookings_time.bokings_bike{
		width: 120px;
	}
	.basic_bookings.bookings_time.single_booking_name{
		text-align: left!important;
	}
	.no_color{
		background-color: transparent!important;
	}
	.img_eliminar_salon{
		padding-top: 20px;
	}
	input#fecha_clases_nueva {
  		width: 355px;
	}
	span.upcoming_reservations_date {
  		width: 125px;
	}
	span.upcoming_reservation_user {
		width: 200px;
	}
	span.upcoming_reservation_separator {
	  color: white;
	  border-right: solid 1px #efefef;
	}
</style>