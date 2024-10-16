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

// Function to retrieve artwork data
function get_artwork_data($field_name)
{
    $artwork_object = get_field($field_name);
    $artwork_image = wp_get_attachment_image_src($artwork_object['id'], 'full');

    return [
        'title' => get_field('artwork_title'),
        'year' => get_field('artwork_year'),
        'category' => get_field('artwork_category'),
        'description' => get_field('artwork_desc'),
        'cover_artwork_desktop' => $artwork_object,
        'image_url' => $artwork_image ? $artwork_image[0] : '',
        'image_alt' => get_post_meta($artwork_object['id'], '_wp_attachment_image_alt', true),
        'image_width' => $artwork_image ? $artwork_image[1] : '',
        'image_height' => $artwork_image ? $artwork_image[2] : '',
        'top' => $artwork_object['top'],
        'left' => $artwork_object['left'],
    ];
}

?>
<div class="main-content">
    <main id="primary" class="site-main front-page">
        <h1 class="screen-reader-text"><?php _e("Homepage", "zsh-portfolio") ?></h1>
        <section class="selected-artwork desktop">
            <div class="dark-layer"></div>
            <?php
            // Usage of the function
            $desktop_artwork = get_artwork_data('cover_artwork_desktop');
            ?>
            <span class="marker-dot-outside"> </span>
            <div class="text-details" data-top="<?php echo $desktop_artwork['top'] ?>"
                data-left="<?php echo $desktop_artwork['left'] ?>">
                <span class="marker-dot-inside"></span>
                <div class="info">
                    <h2><?php echo $desktop_artwork['title'] ?></h2>
                    <span class="year"><?php echo $desktop_artwork['year'] ? $desktop_artwork['year'] : "" ?></span>
                    <span
                        class="cat"><?php echo $desktop_artwork['category'] ? $desktop_artwork['category'] : "" ?></span>
                </div>
                <span
                    class="desc"><?php echo $desktop_artwork['description'] ? $desktop_artwork['description'] : "" ?></span>
            </div>
            <img src="<?php echo $desktop_artwork['image_url'] ?>" alt="<?php echo $desktop_artwork['image_alt'] ?>">
        </section>
        <section class="selected-artwork mobile">
            <div class="dark-layer"></div>
            <?php
            // Usage of the function
            $mobile_artwork = get_artwork_data('cover_artwork_mobile');
            ?>
            <span class="marker-dot-outside"> </span>
            <div class="text-details mobile" data-top="<?php echo $mobile_artwork['top'] ?>"
                data-left="<?php echo $mobile_artwork['left'] ?>">
                <span class="marker-dot-inside"></span>
                <div class="info">
                    <h2><?php echo $mobile_artwork['title'] ?></h2>
                    <span class="year"><?php echo $mobile_artwork['year'] ? $mobile_artwork['year'] : "" ?></span>
                    <span
                        class="cat"><?php echo $mobile_artwork['category'] ? $mobile_artwork['category'] : "" ?></span>
                </div>
                <span
                    class="desc"><?php echo $mobile_artwork['description'] ? $mobile_artwork['description'] : "" ?></span>
            </div>
            <img src="<?php echo $mobile_artwork['image_url'] ?>" alt="<?php echo $mobile_artwork['image_alt'] ?>">
        </section>
    </main><!-- #main -->

    <?php
    get_footer();