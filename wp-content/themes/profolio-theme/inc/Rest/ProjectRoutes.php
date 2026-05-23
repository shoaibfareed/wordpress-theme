<?php

namespace Profolio\Rest;

use WP_REST_Request;
use WP_REST_Server;
use WP_REST_Response;
use WP_Query;

class ProjectRoutes
{
    public function __construct()
    {
        add_action('rest_api_init', [$this, 'registerRoutes']);
    }

    public function registerRoutes(): void
    {
        register_rest_route('profolio/v1', '/projects', [
            'methods'             => WP_REST_Server::READABLE,
            'callback'            => [$this, 'getProjects'],
            'permission_callback' => '__return_true',
        ]);
    }

    public function getProjects(WP_REST_Request $request): WP_REST_Response
    {
        $start = $request->get_param('start_date');
        $end   = $request->get_param('end_date');

        $args = [
            'post_type'      => 'project',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'no_found_rows'  => true,
            'fields'         => 'ids',
        ];

        $meta_query = [];

        if ($start && $end) {
            $meta_query[] = [
                'key'     => '_start_date',
                'value'   => [
                    sanitize_text_field($start),
                    sanitize_text_field($end)
                ],
                'compare' => 'BETWEEN',
                'type'    => 'DATE'
            ];
        }

        if (!empty($meta_query)) {
            $args['meta_query'] = $meta_query;
        }

        $query = new WP_Query($args);

        $data = array_map(function ($id) {
            return [
                'id'         => $id,
                'title'      => esc_html(get_the_title($id)),
                'url'        => esc_url(get_permalink($id)),
                'start_date' => esc_html(get_post_meta($id, '_start_date', true)),
                'end_date'   => esc_html(get_post_meta($id, '_end_date', true)),
            ];
        }, $query->posts);

        return new WP_REST_Response([
            'success' => true,
            'count'   => count($data),
            'data'    => $data,
        ], 200);
    }
}