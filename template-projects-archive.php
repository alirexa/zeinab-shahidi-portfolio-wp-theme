<?php
/*
Template Name: Projects Archive
*/
get_header();
?>
<div class="main-content">
    <main id="primary" class="site-main projects-archive">
        <h1 class="screen-reader-text"><?php the_title(); ?></h1>
        <?php
        $pageCategory = get_field('project_category');
        // print_r($pageCategory);
        $category_slug = $pageCategory[0]->slug;
        echo $category_slug;
        $args = array(
            'post_type' => 'project',
            'tax_query' => array(
                array(
                    'taxonomy' => 'project-category',
                    'field'    => 'slug',
                    'terms'    => "space-based-time-based",
                ),
            ),
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                // Display the post content or title here
                echo '<h2>' . get_the_title() . '</h2>';
                the_content();
            }
            wp_reset_postdata();
        } else {
            echo '<p>No projects found.</p>';
        }
        ?>
        <div class="filters">
            <button data-filter="*" class="is-checked">All</button>
            <?php
            $terms = get_terms(array(
                'taxonomy' => "medium",
                'hide_empty' => false,
            ));

            if (!empty($terms)) {
                foreach ($terms as $term) {
            ?>
                    <button data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></button>
            <?php
                }
            }
            ?>
        </div>
    </main>

    <?php
    get_footer();
