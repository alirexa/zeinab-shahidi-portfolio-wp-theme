<?php
if (is_user_logged_in() && current_user_can('administrator')) {
    // Show content for admin users
    // $styles = wp_get_global_styles();
    // echo '<pre>';
    // var_dump($styles);
    // echo '</pre>';

    $settings = wp_get_global_settings();
    echo '<pre>';
    var_dump($settings);
    echo '</pre>';

    wp_die();
} else {
    // Redirect non-admin users to the homepage
    wp_redirect(home_url());
    exit;
}