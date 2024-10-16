<?php

namespace  PressWindStarter;

// $styles = wp_get_global_styles();
// var_dump($styles);
// wp_die();

// not defined => development
if (!defined('WP_ENV')) {
    // define('WP_ENV', 'development');
    define('WP_ENV', 'production');
}


// gutenberg setup, change like you want
require_once dirname(__FILE__) . '/inc/gutenberg.php';
// auto loading acf blocks
require_once dirname(__FILE__) . '/inc/acf_blocks.php';
// auto loading login assets
require_once dirname(__FILE__) . '/inc/login_assets.php';


// pwa icons
if (file_exists(dirname(__FILE__) . '/inc/pwa_head.php')) {
    include dirname(__FILE__) . '/inc/pwa_head.php';
}

/**
 * Theme setup.
 */
function setup()

{
    register_nav_menus([
        'primary' => __('Primary Menu', 'zsh-portfolio'),
        // 'about-page' => __('About page Sub-Menu', 'zsh-portfolio'),
        'secondary' => __('Secondary Menu', 'zsh-portfolio'),
        'about-submenu' => __('About page sub-menu', 'zsh-portfolio')
    ]);

    add_theme_support('automatic-feed-links');

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_image_size('project-cover-thumbnail', 450, 300, true);

    // load i18n text
    load_theme_textdomain('press-wind-theme', get_template_directory() . '/languages');
}

add_action('after_setup_theme', __NAMESPACE__ . '\setup');

/**
 * init assets front
 * require presswind plugin to work
 */
if (class_exists('PressWind\PWVite')) {

    \PressWind\PWVite::init(port: 3000, path: '');
    /**
     * init assets admin
     */
    \PressWind\PWVite::init(
        port: 4444,
        path: '/admin',
        position: 'editor',
        is_ts: false
    );
}