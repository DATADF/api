<?php

function api_services_post($request) {

    $response = $request['slug'];

    return rest_ensure_response($response);
}

function register_api_service_post(){
    register_rest_route('api/v2', '/services', array(
        array(
            'methods' => 'GET',
            'callback' => 'api_services_post',
        ),
    ));
}

add_action('rest_api_init', 'register_api_service_post');

?>