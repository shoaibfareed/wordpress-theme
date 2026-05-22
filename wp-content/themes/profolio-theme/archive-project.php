<?php get_header(); ?>

<section class="projects-section">

    <div class="container">

        <div class="projects-header">
            <h1 class="page-title"> <?php echo esc_html__('My Projects', 'profolio-theme'); ?></h1>
            <p class="page-subtitle">A collection of work I’ve built recently.</p>
        </div>

        <!-- FILTERS -->
        <form method="GET" class="project-filter">

            <?php wp_nonce_field('project_filter_action', 'project_filter_nonce'); ?>

            <input type="date" name="start_date"
                value="<?php echo esc_attr($_GET['start_date'] ?? ''); ?>">

            <input type="date" name="end_date"
                value="<?php echo esc_attr($_GET['end_date'] ?? ''); ?>">

            <button>
                <?php echo esc_html__('Filter', 'profolio-theme'); ?>
            </button>

            <a href="<?php echo esc_url(get_post_type_archive_link('project')); ?>">
                <?php echo esc_html__('Reset', 'profolio-theme'); ?> 
            </a>

        </form>

        <?php

        // -----------------------------
        // CUSTOM QUERY (FILTER ENABLED)
        // -----------------------------

        $paged = get_query_var('paged') ? get_query_var('paged') : 1;

        $args = [
            'post_type'      => 'project',
            'post_status'    => 'publish',
            'posts_per_page' => 6,
            'paged'          => $paged,
        ];

        $meta_query = [];

        if (!empty($_GET['start_date']) && !empty($_GET['end_date'])) {

            $meta_query[] = [
                'key'     => '_start_date',
                'value'   => [
                    sanitize_text_field($_GET['start_date']),
                    sanitize_text_field($_GET['end_date'])
                ],
                'compare' => 'BETWEEN',
                'type'    => 'DATE'
            ];
        }

        if (!empty($meta_query)) {
            $args['meta_query'] = $meta_query;
        }

        $query = new WP_Query($args);


        $start_date = '';
        $end_date   = '';

        if (
            isset($_GET['project_filter_nonce']) &&
            wp_verify_nonce($_GET['project_filter_nonce'], 'project_filter_action')
        ) {
            $start_date = sanitize_text_field($_GET['start_date'] ?? '');
            $end_date   = sanitize_text_field($_GET['end_date'] ?? '');
        }

        ?>

        <?php if (have_posts()) : ?>

            <div class="projects-grid">

                <?php while (have_posts()) : the_post();

                    $start = get_post_meta(get_the_ID(), '_start_date', true);
                    $end   = get_post_meta(get_the_ID(), '_end_date', true);
                    $url   = get_post_meta(get_the_ID(), '_project_url', true);
                    $description  = get_post_meta(get_the_ID(), '_project_description', true);
                ?>

                    <article class="project-card">

                        <div class="project-card-inner">

                            <h2 class="project-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <p class="project-excerpt">
                                <?php echo wp_trim_words(get_the_content(), 18); ?>
                            </p>

                            <div class="project-meta">
                                <span>📅 <?php echo esc_html($start); ?> → <?php echo esc_html($end); ?></span>
                            </div>

                            <div class="project-description">
                                <p>
                                    <?php echo esc_html( wp_trim_words($description, 20, '...') ); ?>
                                </p>
                            </div>

                            <div class="project-actions">

                                <a class="btn-outline" href="<?php the_permalink(); ?>">
                                    View Details
                                </a>

                                <?php if ($url) : ?>
                                    <a class="btn-primary" href="<?php echo esc_url($url); ?>" target="_blank">
                                        Live Demo
                                    </a>
                                <?php endif; ?>

                            </div>

                        </div>

                    </article>

                <?php endwhile; ?>

            </div>

        <?php else : ?>

            <p>No projects found.</p>

        <?php endif; ?>

    </div>

</section>

<?php get_footer(); ?>