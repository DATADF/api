<?php

function create_articles_post() {
    $labels = array(
        'name' => __('Articles'),
        'singular_name' => __('Article'),
        'menu_name'           => __('Articles'),
        'parent_item_colon'   => __('Parent Article'),
        'all_items'           => __('All Articles'),
        'view_item'           => __('View Article'),
        'add_new_item'        => __('Add New Article'),
        'add_new'             => __('Add New'),
        'edit_item'           => __('Edit Article'),
        'update_item'         => __('Update Article'),
        'search_items'        => __('Search Article'),
        'not_found'           => __('Not Found'),
        'not_found_in_trash'  => __('Not found in Trash')
    );

    $args = array(
        'label'               => __('articles'),
        'description'         => __('Best Crunchify Articles'),
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
    register_post_type('articles', $args);
}

add_action('init', 'create_articles_post');


// Let us create Taxonomy for Custom Post Type
add_action('init', 'crunchify_create_type_articles_custom_taxonomy', 1);

//create a custom taxonomy name it "type" for your posts
function crunchify_create_type_articles_custom_taxonomy()
{

    $labels = array(
        'name' => _x('Types Articles', 'taxonomy general name'),
        'singular_name' => _x('Type Article', 'taxonomy singular name'),
        'search_items' =>  __('Search Types Articles'),
        'all_items' => __('All Types Articles'),
        'parent_item' => __('Parent Type Article'),
        'parent_item_colon' => __('Parent Type Article:'),
        'edit_item' => __('Edit Type Article'),
        'update_item' => __('Update Type Article'),
        'add_new_item' => __('Add New Type Article'),
        'new_item_name' => __('New Type Article Name'),
        'menu_name' => __('Types Articles'),
    );

    register_taxonomy('type articles', array('articles'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'type'),
    ));
}




