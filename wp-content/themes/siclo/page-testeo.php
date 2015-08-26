<?php

$posts_ = get_posts(array(
    'fields'	    => 'ids',
    'post_type' 	=> 'reserva',
    'posts_per_page'=> 5,
    'post_status'   => 'any',
    'order'         => 'DESC'
));
foreach ($posts_ as $key => $value) {
    $reserva = new Reserva( $value );

    mario( $reserva->get_array_data() );
}
