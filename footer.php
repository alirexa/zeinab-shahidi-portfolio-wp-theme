<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>

<footer id="colophon" class="site-footer">
    <nav class="secondary-navigation">
        <?php
        wp_nav_menu(
            [
                'theme_location' => 'secondary',
                'container_id' => 'secondary-menu',
            ]
        );
        ?>
    </nav>
    <div class="cr">
        <span>Zeinab Shahidi Marnani</span> © <?php echo date('Y'); ?> <br> <span>All rights reserved</span>
        <p class="dev-signature">Website by <a href="https://algorstudio.com">ALGOR Studio</a></a>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>