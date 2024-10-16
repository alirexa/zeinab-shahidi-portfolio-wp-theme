<?php
get_header();
?>
<div class="main-content">
    <main id="primary" class="projects-archive">
        <h1 class="screen-reader-text"><?php single_term_title(); ?></h1>
        <div class="filters">
            <button data-filter="*" class="is-checked">All</button>
            <?php
            $term = get_queried_object();
            $args = array(
                'post_type' => 'project',
                'tax_query' => array(
                    array(
                        'taxonomy' => $term->taxonomy,
                        'field'    => 'slug',
                        'terms'    => $term->slug,
                    ),
                ),
            );

            $query = new WP_Query($args);
            $available_terms = array();

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_terms = wp_get_post_terms(get_the_ID(), 'medium');
                    foreach ($post_terms as $post_term) {
                        $available_terms[$post_term->slug] = $post_term->name;
                    }
                }
                wp_reset_postdata();
            }

            if (!empty($available_terms)) {
                foreach ($available_terms as $slug => $name) {
            ?>
            <button data-filter=".<?php echo $slug; ?>"><?php echo $name; ?></button>
            <?php
                }
            }
            ?>
        </div>
        <div class="projects-grid">
            <div class="item-sizer"></div>
            <div class="gutter-sizer"></div>
            <?php
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    // Display the post content or title here

                    $year = get_post_meta(get_the_ID(), 'year', true);
                    $medium_terms = wp_get_post_terms(get_the_ID(), 'medium');
                    $medium_classes = array();
                    foreach ($medium_terms as $medium_term) {
                        $medium_classes[] = $medium_term->slug;
                    }
                    $medium_class_list = implode(' ', $medium_classes);
                    $medium_name_list = implode(', ', wp_list_pluck($medium_terms, 'name'));
                    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');

            ?>
            <div class="grid-item <?php echo esc_attr($medium_class_list); ?>">
                <div class="project-header">
                    <span class="project-year"><?php echo esc_html($year); ?></span>
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="project-title"><?php echo esc_html(get_the_title()); ?></h2>
                    </a>
                </div>
                <div class="project-image">
                    <a href="<?php the_permalink(); ?>">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php
                                        for ($i = 1; $i <= 3; $i++) {
                                            $image = get_field('cover_image_' . $i); // Assuming ACF fields are named 'cover_image_1', 'cover_image_2', 'cover_image_3'
                                            if ($image) {
                                                echo '<div class="swiper-slide"><img src="' . esc_url($image['sizes']['project-cover-thumbnail']) . '" alt="' . esc_attr($image['alt']) . '" loading="lazy"></div>';
                                            }
                                        }
                                        ?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="project-medium"><?php echo esc_html($medium_name_list); ?></div>
            </div>
            <?php
                }
                wp_reset_postdata();
            } else {
                ?>
            <div class="margin-element">
                <?php
                    echo '<h2>No projects found!</h2>';
                    ?>
            </div>
            <?php
            }
            ?>
        </div>
    </main><!-- #main -->
</div><!-- .main-content -->

<?php
get_footer();
?>