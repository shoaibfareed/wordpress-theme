<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

<?php
    $start = get_post_meta(get_the_ID(), '_start_date', true);
    $end   = get_post_meta(get_the_ID(), '_end_date', true);
    $url   = get_post_meta(get_the_ID(), '_project_url', true);
?>

<article class="single-project">

    <div class="container">

        <h1><?php echo esc_html(get_the_title()); ?></h1>

        <div class="project-content">
            <?php the_content(); ?>
        </div>

        <div class="project-details">

            <p><strong>Start Date:</strong> <?php echo esc_html($start); ?></p>
            <p><strong>End Date:</strong> <?php echo esc_html($end); ?></p>

            <?php if ($url) : ?>
                <p>
                    <strong>Project URL:</strong>
                    <a href="<?php echo esc_url($url); ?>" target="_blank">
                        <?php echo esc_html($url); ?>
                    </a>
                </p>
            <?php endif; ?>

        </div>

        <a href="<?php echo esc_url(get_post_type_archive_link('project')); ?>">
            ← Back to Projects
        </a>

    </div>

</article>

<?php endwhile; ?>

<?php get_footer(); ?>