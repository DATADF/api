<?php


function api_get_service($request){

    $slug = sanitize_text_field($request->get_param('slug'));

    $page_object = get_page_by_path($slug, OBJECT, 'services');

    $id = $page_object->ID;
    $title = $page_object->post_title;
    $acf = get_fields($id);

    $service = array(
        'slug' => $slug,
        'id' => $id,
        'title' => $title,
        'acf' => $acf,
    );

    return rest_ensure_response($service);

}

function api_register_service_routes(){
    register_rest_route('kolitech/v1', '/service/(?P<slug>[-\w]+)', array(
        'methods' => 'GET',
        'callback' => 'api_get_service'
    ));
}

add_action('rest_api_init', 'api_register_service_routes');

?> 