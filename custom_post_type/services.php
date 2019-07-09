<?php

function create_services_post()
{
    $labels = array(
        'name' => __('Services'),
        'singular_name' => __('Article'),
        'menu_name'           => __('Services'),
        'parent_item_colon'   => __('Parent Service'),
        'all_items'           => __('All Services'),
        'view_item'           => __('View Service'),
        'add_new_item'        => __('Add New Service'),
        'add_new'             => __('Add New'),
        'edit_item'           => __('Edit Service'),
        'update_item'         => __('Update Service'),
        'search_items'        => __('Search Service'),
        'not_found'           => __('Not Found'),
        'not_found_in_trash'  => __('Not found in Trash')
    );

    $args = array(
        'label'               => __('services'),
        'description'         => __('Best Crunchify Services'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'excerpt'),
        'public'              => true,
        'hierarchical'        => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'has_archive'         => true,
        'can_export'          => true,
        'exclude_from_search' => false,
        'yarpp_support'       => true,
        'taxonomies'           => array('post_tag'),
        'publicly_queryable'  => true,
        'menu_position' => 5,
        'capability_type'     => 'post'
    );
    register_post_type('services', $args);
}

add_action('init', 'create_services_post');



// Let us create Taxonomy for Custom Post Type
add_action('init', 'crunchify_create_type_services_custom_taxonomy', 0);

//create a custom taxonomy name it "type" for your posts
function crunchify_create_type_services_custom_taxonomy()
{

    $labels = array(
        'name' => _x('Types Services', 'taxonomy general name'),
        'singular_name' => _x('Type Service', 'taxonomy singular name'),
        'search_items' =>  __('Search Types Services'),
        'all_items' => __('All Types Services'),
        'parent_item' => __('Parent Type Service'),
        'parent_item_colon' => __('Parent Type Service:'),
        'edit_item' => __('Edit Type Service'),
        'update_item' => __('Update Type Service'),
        'add_new_item' => __('Add New Type Service'),
        'new_item_name' => __('New Type Service Name'),
        'menu_name' => __('Types Services'),
    );

    register_taxonomy('type services', array('services'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'type'),
    ));
}