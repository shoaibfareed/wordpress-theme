<?php

if (!defined('ABSPATH')) exit;

/**
 * Register Projects CPT
 */
function profolio_register_projects_cpt() {

    register_post_type('project', [
        'label'        => 'Projects',
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'projects'],
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-portfolio',
        'supports'     => ['title', 'editor', 'thumbnail'],
    ]);
}

add_action('init', 'profolio_register_projects_cpt');


/**
 * Enable menu support (optional but safe)
 */
function profolio_projects_menu_support() {
    add_post_type_support('project', 'page-attributes');
}

add_action('init', 'profolio_projects_menu_support');


// /**
//  * Add Projects archive to menu automatically
//  */
// function profolio_add_projects_archive_to_menu() {

//     add_filter('wp_get_nav_menu_items', function ($items, $menu, $args) {

//         $archive_url = get_post_type_archive_link('project');

//         if ($archive_url) {

//             $items[] = (object) [
//                 'ID'               => 999999,
//                 'title'            => 'Projects',
//                 'url'              => $archive_url,
//                 'menu_item_parent' => 0,
//                 'type'             => 'custom',
//                 'object'           => 'custom',
//                 'classes'          => ['menu-item', 'menu-item-projects']
//             ];
//         }

//         return $items;

//     }, 10, 3);
// }

// add_action('init', 'profolio_add_projects_archive_to_menu');