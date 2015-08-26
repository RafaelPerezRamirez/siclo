<?php 
require_once('../../../../wp-load.php');
$id = $_POST['id'];
echo apply_filters('the_content', get_post_field('post_content',$id));
?>