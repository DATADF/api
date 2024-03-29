<?php


function api_get_services(){

    $posts = array();

    $args = array('post_type' => 'services', 'post_per_page' => -1);

    $loop = new WP_Query($args);

    while($loop->have_posts()) : $loop->the_post();

        $id         = get_the_ID();
        $slug       = get_post_field('post_name', $id);
        $title      = get_the_title($id);
        $resumo     = get_field('resumo', $id);
        $category   = get_terms('category');

        $post = array(
            'id'        => $id,
            'slug'      => $slug,
            'title'     => $title,
            'resumo'    => $resumo,
            'category'  => $category,

        );

        $posts[$slug] = $post;

    endwhile;


    return rest_ensure_response($posts);

}

function api_register_services_routes(){
    register_rest_route('kolitech/v1', '/services', array(
        'methods' => 'GET',
        'callback' => 'api_get_services'
    ));
}

add_action('rest_api_init', 'api_register_services_routes');

?> 