<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
get_header();
?>
<div class="main-content">
    <main id="primary" class="site-main front-page">
        <h1 class="screen-reader-text"><?php _e("Homepage", "zsh-portfolio") ?></h1>
        <section class="selected-artwork">
            <div class="dark-layer"></div>
            <?php
            $artwork_image = get_field('artwork_image');
            $artwork_title = get_field('artwork_title');
            $artwork_year = get_field('artwork_year');
            $artwork_cat = get_field('artwork_category');
            $artwork_desc = get_field('artwork_desc');
            ?>
            <span class="marker-dot-outside"> </span>
            <div class="text-details">
                <span class="marker-dot-inside"></span>
                <div class="info">
                    <h2><?php echo $artwork_title ?></h2>
                    <span class="year"><?php echo $artwork_year ? $artwork_year : "" ?></span>
                    <span class="cat"><?php echo $artwork_cat ? $artwork_cat : "" ?></span>
                </div>
                <span class="desc"><?php echo $artwork_desc ? $artwork_desc : "" ?></span>
            </div>
            <img src="<?php echo $artwork_image ? $artwork_image["url"] : "" ?>"
                alt="<?php echo $artwork_image ? $artwork_image["alt"] : "" ?>">
        </section>
    </main><!-- #main -->

    <?php
    get_footer();
