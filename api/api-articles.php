<?php


function api_get_articles(){

    $posts = array();

    $args = array('post_type' => 'articles', 'post_per_page' => -1);

    $loop = new WP_Query($args);

    while($loop->have_posts()) : $loop->the_post();

        $id         = get_the_ID();
        $slug       = get_post_field('post_name', $id);
        $title      = get_the_title($id);


        $post = array(
            'id'        => $id,
            'slug'      => $slug,
            'title'     => $title,

        );

        $posts[$slug] = $post;

    endwhile;


    return rest_ensure_response($posts);

}

function api_register_articles_routes(){
    register_rest_route('kolitech/v1', '/articles', array(
        'methods' => 'GET',
        'callback' => 'api_get_articles'
    ));
}

add_action('rest_api_init', 'api_register_articles_routes');

?> 