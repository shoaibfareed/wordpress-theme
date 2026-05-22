<?php
/*
Template Name: Blog Page
*/
get_header();
?>

<main class="blog-page">
    <h1>Latest Blog Posts</h1>

    <?php
    $query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 5
    ]);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
    ?>

            <article>
                <h2><a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a></h2>

                <p><?php the_excerpt(); ?></p>
            </article>

    <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo "<p>No posts found.</p>";
    endif;
    ?>

</main>

<?php get_footer(); ?>