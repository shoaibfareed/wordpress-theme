<?php

function profolio_theme_setup() {

    load_theme_textdomain('profolio', get_template_directory() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'gallery',
        'caption'
    ]);

    register_nav_menus([
        'primary_menu' => __('Primary Menu', 'profolio'),
    ]);
}
add_action('after_setup_theme', 'profolio_theme_setup');


function profolio_assets() {

    wp_enqueue_style(
        'profolio-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        filemtime(get_template_directory() . '/assets/css/main.css')
    );

    wp_enqueue_script(
        'profolio-main',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        filemtime(get_template_directory() . '/assets/js/main.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'profolio_assets');