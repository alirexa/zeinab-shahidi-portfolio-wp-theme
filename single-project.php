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
<main id="primary" class="site-main single-project">
    <div class="main-content">
        <?php
        $year = get_field('year');
        $medium_classes = array();
        $medium_terms = wp_get_post_terms(get_the_ID(), 'medium');
        foreach ($medium_terms as $medium_term) {
            $medium_classes[] = $medium_term->slug;
        }
        $medium_name_list = implode(', ', wp_list_pluck($medium_terms, 'name'));
        $categories = get_the_terms(get_the_ID(), 'project-category');
        if ($categories && !is_wp_error($categories)) {
            // $category_name = $categories[0]['name'];
            $category_name = $categories[0]->name;
            $category_slug = $categories[0]->slug;
            $category_link = get_term_link($category_slug, 'project-category');
            // $category_names = wp_list_pluck($categories, 'name');
            // $category_list = implode(', ', $category_names);
        } else {
            $category_name = '';
        }
        ?>
        <a href="<?php echo $category_link ?>" class="back-to-category">
            <span class="arrow">
                < </span> Back</a>

        <header class="sub-header">

            <h1><?php the_title(); ?></h1>
            <div class="project-details">
                <span class="mediums"><?php echo $medium_name_list ?></span>
                <span class="year"><?php echo $year ?></span>

            </div>
        </header>
        <section class="content">
            <?php the_content(); ?>
        </section>

    </div>

</main><!-- #main -->

<?php
get_footer();
?>