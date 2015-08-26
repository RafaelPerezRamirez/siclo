<?php get_header();
global $post;
$html = apply_filters('the_content',$post->post_content);
?>
<div class="pfr page-quienes-somos"><div class="cont_somos"><?= $html;?></div></div>
<?php get_footer();?>