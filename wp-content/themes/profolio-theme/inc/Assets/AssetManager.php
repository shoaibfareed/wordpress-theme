<?php

namespace Profolio\Assets;

class AssetManager {

    public function register() {

        add_action('wp_enqueue_scripts', [$this, 'enqueue'], 10);
    }

    public function enqueue() {

        $this->enqueueStyle('profolio-main', '/assets/css/main.css');
        $this->enqueueScript('profolio-main', '/assets/js/main.js');
    }

    private function enqueueStyle($handle, $path) {

        $file = get_template_directory() . $path;

        wp_enqueue_style(
            $handle,
            get_template_directory_uri() . $path,
            [],
            file_exists($file) ? filemtime($file) : null
        );
    }

    private function enqueueScript($handle, $path) {

        $file = get_template_directory() . $path;

        wp_enqueue_script(
            $handle,
            get_template_directory_uri() . $path,
            [],
            file_exists($file) ? filemtime($file) : null,
            true
        );
    }
}