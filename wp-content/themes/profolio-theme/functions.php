<?php

if (!defined('ABSPATH')) exit;

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style', get_stylesheet_uri());
});


$inc = get_template_directory() . '/inc/';

foreach ([
    'setup.php',
    'cpt-projects.php',
    'meta-projects.php',
    'rest-projects.php',
] as $file) {
    $path = $inc . $file;
    if (file_exists($path)) {
        require_once $path;
    }
}

add_action('pre_get_posts', function ($query) {

    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if (!is_post_type_archive('project')) {
        return;
    }

    $query->set('posts_per_page', 6);

    $meta_query = [];

    $start = isset($_GET['start_date']) ? sanitize_text_field($_GET['start_date']) : '';
    $end   = isset($_GET['end_date']) ? sanitize_text_field($_GET['end_date']) : '';

    if ($start && $end) {

        $meta_query[] = [
            'key'     => '_start_date',
            'value'   => [$start, $end],
            'compare' => 'BETWEEN',
            'type'    => 'DATE'
        ];
    }

    if (!empty($meta_query)) {
        $query->set('meta_query', $meta_query);
    }
});


add_filter('request', function ($vars) {

    if (isset($_GET['start_date'])) {
        $vars['start_date'] = sanitize_text_field($_GET['start_date']);
    }

    if (isset($_GET['end_date'])) {
        $vars['end_date'] = sanitize_text_field($_GET['end_date']);
    }

    return $vars;
});