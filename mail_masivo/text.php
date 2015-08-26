<?php require_once('../wp-load.php');
global $admin;

class Admin{
	function permisos(){
		return true;
	}
};
$admin  = new Admin;


$clases = get_posts(array(
	'post_type'			=> 'clase',
	'posts_per_page'	=> -1,
	'fields'			=> 'ids',
	'meta_query'		=> array(
		array(
			'key'		=> 'instructor',
			'value'		=> 504,
			'compare'	=> '=',
		),
	),
));
$html = '';
if( $clases ){
	foreach( $clases as $id ){
		$clase = new Clase( $id );
		$html.=$clase->imprimir_reservaciones();
	};
};
function imagenes(){
	return '';
};

?>
<html>
<head>
<title>Hola</title>
<style type="text/css">
.bookings_bottom {
	display: none;
}
img{
	display:none;
}
.bookings_top_single{
    border-bottom: 1px solid;
}
.bookings_top_single>* {
    display: inline-block;
    margin: 10px;
    text-align: center;
    font-family: "Arial";
    color: gray;
}
</style>
</head>
<body><?= $html;?></body>
</html>