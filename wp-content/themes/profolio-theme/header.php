<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">

    <div class="container header-wrapper">

        <!-- LOGO -->
        <div class="logo">
            <a href="<?php echo home_url(); ?>">
                Portfolio<span>.</span>
            </a>
        </div>

        <!-- MOBILE TOGGLE BUTTON -->
        <button class="menu-toggle" id="menuToggle">
            ☰
        </button>

        <!-- NAVIGATION -->
        <nav class="main-nav" id="mainNav">

           <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'nav-list',
                    'depth'          => 3,
                ]);
            ?>
        </nav>

        <!-- CTA BUTTON -->
        <div class="header-cta">
            <a href="https://shoaibfareed.github.io/" class="btn-primary">
                Let’s Talk
            </a>
        </div>

    </div>

</header>