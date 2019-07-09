<?php


function api_get_article($request){

    $slug = sanitize_text_field($request->get_param('slug'));

    $page_object = get_page_by_path($slug, OBJECT, 'articles');

    $id = $page_object->ID;
    $title = $page_object->post_title;
    $acf = get_fields($id);

    $article = array(
        'slug' => $slug,
        'id' => $id,
        'title' => $title,
        'acf' => $acf,
    );

    return rest_ensure_response($article);

}

function api_register_article_routes(){
    register_rest_route('kolitech/v1', '/article/(?P<slug>[-\w]+)', array(
        'methods' => 'GET',
        'callback' => 'api_get_article'
    ));
}

add_action('rest_api_init', 'api_register_article_routes');

?> 