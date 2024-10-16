<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-barba="wrapper">
    <?php wp_body_open(); ?>
    <!-- <span class="loading-screen">
        <div class="shapes">
            <p>loading</p>
        </div>
        <span class="loading-bar">
            <span class="loaded-bar"></span>
        </span>
    </span> -->
    <div id="page" class="site" data-barba="container" data-barba-namespace="home">

        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'blank'); ?></a>

        <header id="masthead" class="site-header">
            <div class="site-branding">
                <a href="<?php echo get_home_url() ?>">
                    Zeinab<br>
                    Shahidi Marnani
                </a>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <button class="mobile-nav-toggle">
                    --
                </button>
                <?php
                wp_nav_menu(
                    [
                        'theme_location' => 'primary',
                        'container_id' => 'primary-menu',
                    ]
                );
                ?>
            </nav><!-- #site-navigation -->

        </header><!-- #masthead -->