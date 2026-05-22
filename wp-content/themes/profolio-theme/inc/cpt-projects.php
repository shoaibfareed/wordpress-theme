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
 * Enable menu support
 */
function profolio_projects_menu_support() {
    add_post_type_support('project', 'page-attributes');
}

add_action('init', 'profolio_projects_menu_support');
