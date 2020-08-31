<?php

namespace App;

function nalta_supports () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');

    add_image_size('card-header', 350, 215, true);
//    add_image_size('post-thumbnail', 350, 215, true);
}

function nalta_register_assets () {
    wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css');
    wp_register_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', [], false, true);
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', [], false, true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

function nalta_title_separator ($title) {
    return '|';
}

function nalta_menu_class(array $classes): array {
    $classes[] = 'nav-item';
    return $classes;
}

function nalta_menu_link_class(array $attrs): array {
    $attrs['class'] = 'nav-link';
    return $attrs;
}

function nalta_pagination () {
    $pages = paginate_links(['type' => 'array']);
    if ($pages === null) {
        return;
    }
    echo '<nav aria-label="Pagination" class="my-4">';
    echo '<ul class="pagination">';
    foreach ($pages as $page) {
        $active = strpos($page, 'current') !== false;
        $class = 'page-item';
        if ($active) {
            $class .= ' active';
        }
        echo '<li class="' . $class . '">';
        echo str_replace('page-numbers', 'page-link', $page);
        echo '</li>';
    }
    echo '</ul>';
    echo '</nav>';
}

function nalta_init() {
    register_taxonomy('sport', 'post', [
        'labels' => [
            'name' => 'Sport',
            'Singular_name' => 'Sport',
            'plural_name' => 'Sports',
            'search_items' => 'Rechercher des sports',
            'all_items' => 'Tout les sports',
            'add_new_item' => 'Ajouter un nouveau sport',
            'new_item_name' => 'Ajouter un nouveau sport',
            'menu_name' => 'Sport',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
    ]);
    register_post_type('bien', [
        'label' => 'Bien',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-building',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'has_archive' => true,



    ]);
}

add_action('init', 'App\nalta_init');
add_action('after_setup_theme', 'App\nalta_supports');
add_action('wp_enqueue_scripts', 'App\nalta_register_assets');
add_filter('document_title_separator', 'App\nalta_title_separator');
add_filter('nav_menu_css_class', 'App\nalta_menu_class');
add_filter('nav_menu_link_attributes', 'App\nalta_menu_link_class');

require_once('metaboxes/sponso.php');
require_once('options/agence.php');

\SponsoMetaBox::register();
\AgenceMenuPage::register();
