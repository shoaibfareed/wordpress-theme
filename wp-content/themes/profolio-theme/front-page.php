<?php get_header(); ?>

<section class="hero">

    <div class="container hero-grid">

        <div class="hero-text">

            <p class="subtitle">Hello, I'm Shoaib Munir</p>

            <h1>
                Creative Developer <br>
                <span>& Designer</span>
            </h1>

            <p>
                I design and build modern, responsive websites with focus on performance and UX.
            </p>

            <div class="hero-buttons">
                <a href="#projects" class="btn-primary">View My Work</a>
                <a href="https://shoaibfareed.github.io/" class="btn-secondary">Download CV</a>
            </div>

        </div>

        <div class="hero-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/profile.png" alt="">
        </div>

    </div>

</section>

<?php get_footer(); ?>