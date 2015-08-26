<?php 
header('Content-type: text/plain');
require_once('../wp-load.php');
header("Content-Disposition: attachment; filename=usuarios_siclo".date_i18n('Y-m-d').".txt");
foreach( get_users() as $user ){
	echo $user->display_name.'	'.$user->user_email.'
';
};
?>