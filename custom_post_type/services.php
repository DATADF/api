<?php

function registrar_cpt_service() {
    register_post_type('services', array(
        'label' => 'Services',
        'description' => 'Service',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'services', 'with_front' => true),
        'query_var' => true,
        'supports' => array('custom-fields', 'author', 'title', 'thumbnail', 'excerpt', 'editor'),
        'publicly_queryable' => true
    ));
}

add_action('init', 'registrar_cpt_service');