<?php

////////////////////////////////////////////////////////////
//Carrega os custon posts
$template_diretorio = get_template_directory();

require_once($template_diretorio . '/custom_post_type/services.php');

require_once($template_diretorio . '/custom_post_type/articles.php');

require_once($template_diretorio . '/api/api-services.php');




////////////////////////////////////////////////////////////
// Desabilitar barra admin top
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar()
{
    show_admin_bar(false);
}

////////////////////////////////////////////////////////////
// Add menu in painel
add_theme_support('menus');
// Add destac images in posts
add_theme_support('post-thumbnails');

////////////////////////////////////////////////////////////
// Add class active no menu de navegação principal
add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}

////////////////////////////////////////////////////////////
// SVG
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');