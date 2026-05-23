<?php

namespace Profolio\Meta;

class ProjectMeta
{
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'addMetaBox']);
        add_action('save_post_project', [$this, 'saveMeta']);
    }

    public function addMetaBox(): void
    {
        add_meta_box(
            'project_details',
            'Project Details',
            [$this, 'render'],
            'project'
        );
    }

    public function render($post): void
    {
        wp_nonce_field('profolio_save_project', 'profolio_nonce');

        $start = get_post_meta($post->ID, '_start_date', true);
        $end   = get_post_meta($post->ID, '_end_date', true);
        $url   = get_post_meta($post->ID, '_project_url', true);
        $description = get_post_meta($post->ID, '_project_description', true);
        ?>

        <p>
            <label>Start Date</label>
            <input type="date" name="start_date" value="<?php echo esc_attr($start); ?>">
        </p>

        <p>
            <label>End Date</label>
            <input type="date" name="end_date" value="<?php echo esc_attr($end); ?>">
        </p>

        <p>
            <label>Project URL</label>
            <input type="url" name="project_url" value="<?php echo esc_url($url); ?>">
        </p>

        <p>
            <label>Short Description</label>
            <textarea name="project_description"><?php echo esc_textarea($description); ?></textarea>
        </p>

        <?php
    }

    public function saveMeta($post_id): void
    {
        // nonce check
        if (
            !isset($_POST['profolio_nonce']) ||
            !wp_verify_nonce($_POST['profolio_nonce'], 'profolio_save_project')
        ) {
            return;
        }

        // autosave check
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        // permission check
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        $start = isset($_POST['start_date'])
            ? sanitize_text_field($_POST['start_date'])
            : '';

        $end = isset($_POST['end_date'])
            ? sanitize_text_field($_POST['end_date'])
            : '';

        $url = isset($_POST['project_url'])
            ? esc_url_raw($_POST['project_url'])
            : '';

        $description = isset($_POST['project_description'])
            ? sanitize_textarea_field($_POST['project_description'])
            : '';

        update_post_meta($post_id, '_start_date', $start);
        update_post_meta($post_id, '_end_date', $end);
        update_post_meta($post_id, '_project_url', $url);
        update_post_meta($post_id, '_project_description', $description);
    }
}