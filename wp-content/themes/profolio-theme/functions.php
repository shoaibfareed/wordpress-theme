<?php

if (!defined('ABSPATH')) exit;

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style', get_stylesheet_uri());
});

$inc = get_template_directory() . '/inc/';

if (file_exists($inc . 'setup.php')) {
    require $inc . 'setup.php';
}

if (file_exists($inc . 'cpt-projects.php')) {
    require $inc . 'cpt-projects.php';
}

if (file_exists($inc . 'meta-projects.php')) {
    require $inc . 'meta-projects.php';
}

if (file_exists($inc . 'rest-projects.php')) {
    require $inc . 'rest-projects.php';
}

function portfolio_theme_setup() {
    register_nav_menus([
        'primary' => __('Primary Menu', 'portfolio'),
    ]);
}
add_action('after_setup_theme', 'portfolio_theme_setup');