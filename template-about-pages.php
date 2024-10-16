<?php

/**
 * Template Name: About Pages Template
 *
 * This template can be used for pages.
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

get_header(); ?>

<main id="primary" class="site-main about-section">
    <div class="main-content boxed-container">
        <header class="about-sub-nav">
            <nav>
                <?php
                wp_nav_menu(
                    [
                        'theme_location' => 'about-submenu',
                        'container_id' => 'primary-menu',
                    ]
                );
                ?>
            </nav>
        </header>
        <?php
        if (have_posts()) {
            /* Start the Loop */
            while (have_posts()) {
                the_post();
                if (!is_home() && !is_front_page()) {
        ?>
                    <h1><?php the_title(); ?></h1>
            <?php
                }
                the_content();
            }
        } else {
            ?>

            <p>No posts found. :(</p>

        <?php

        }
        ?>
    </div>

</main><!-- #main -->

<?php
get_footer();
?>