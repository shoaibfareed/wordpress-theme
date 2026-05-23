<?php

namespace Profolio\PostTypes;

class ProjectCPT
{
    public function register(): void
    {
        add_action('init', [$this, 'create'], 10);

    }

    public function create(): void
    {
       
        register_post_type('project', [
            'label'        => 'Projects',
            'public'       => true,
            'has_archive'  => true,
            'rewrite'      => ['slug' => 'projects'],
            'show_in_rest' => true,
            'menu_icon'    => 'dashicons-portfolio',
            'supports'     => ['title', 'editor', 'thumbnail'],
            'show_in_menu' => true,
            'show_ui'      => true,
        ]);
    }
}