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

<main id="primary" class="site-main press-archive">
    <div class="main-content boxed-container">




        <h1 class="screen-reader-text">Press</h1>

        <?php
        if (have_posts()) {
            /* Start the Loop */
        ?>

        <?php
            while (have_posts()) {
                the_post();
                $source_title = get_field('source_title');
                $source_url = get_field('source_url');
                $excerpt = get_field('excerpt');
            ?>
        <div class="grid-item">
            <a href="<?php echo $source_url ?>" target="_blank">
                <h2><span class="source_title"><?php echo $source_title; ?>: </span><?php the_title(); ?></h2>
            </a>
            <p class="excerpt">
                <?php
                        echo $excerpt;
                        ?>
            </p>
        </div>
        <?php

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
get_sidebar();
get_footer();