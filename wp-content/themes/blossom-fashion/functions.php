<?php

/**
 * Blossom Fashion functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blossom_Fashion
 */

use function Clue\StreamFilter\fun;

//define theme version
$blossom_fashion_theme_data = wp_get_theme();
if (!defined('BLOSSOM_FASHION_THEME_VERSION')) define('BLOSSOM_FASHION_THEME_VERSION', $blossom_fashion_theme_data->get('Version'));
if (!defined('BLOSSOM_FASHION_THEME_NAME')) define('BLOSSOM_FASHION_THEME_NAME', $blossom_fashion_theme_data->get('Name'));
if (!defined('BLOSSOM_FASHION_THEME_TEXTDOMAIN')) define('BLOSSOM_FASHION_THEME_TEXTDOMAIN', $blossom_fashion_theme_data->get('TextDomain'));
function wp_include_css()
{
    $theme_version = wp_get_theme()->get('Version');
    wp_enqueue_style('hagiang-reset', get_template_directory_uri() . '/css/site/site/reset.css', array(), $theme_version, 'all');
    wp_enqueue_style('hagiang-font_v5', get_template_directory_uri() . '/css/site/font-awesome-v5/css/fontawesome.pro.min.css', array(), $theme_version, 'all');
    wp_enqueue_style('hagiang-slick', get_template_directory_uri() . '/css/site/slick.css', array(), $theme_version, 'all');
    wp_enqueue_style('hagiang-slick-theme', get_template_directory_uri() . '/css/site/slick-theme.css', array(), $theme_version, 'all');
    wp_enqueue_style('hagiang-carousel', get_template_directory_uri() . '/css/site/owl.carousel.min.css', array(), $theme_version, 'all');
    wp_enqueue_style('hagiang-animate', get_template_directory_uri() . '/css/animate.min.css', array(), $theme_version, 'all');
    wp_enqueue_style('hagiang-aos', get_template_directory_uri() . '/css/site/aos.css', array(), $theme_version, 'all');
    wp_enqueue_style('hagiang-font', get_template_directory_uri() . '/css/site/site/font.css', array(), $theme_version, 'all');
    wp_enqueue_style('hagiang-styles', get_template_directory_uri() . '/css/site/site/styles.css', array(), $theme_version, 'all');
    wp_enqueue_style('hagiang-main', get_template_directory_uri() . '/css/site/site/main.css', array(), $theme_version, 'all');
    wp_enqueue_style('hagiang-list', get_template_directory_uri() . '/css/site/site/gen/list.css', array(), $theme_version, 'all');
    wp_enqueue_style('hagiang-datlich', get_template_directory_uri() . '/css/site/site/gen/datlich.css', array(), $theme_version, 'all');
    wp_enqueue_style('hagiang-chitietks', get_template_directory_uri() . '/css/site/site/gen/chitiet_ks.css', array(), $theme_version, 'all');
    wp_enqueue_style('hagiang-chitietamthuc', get_template_directory_uri() . '/css/site/site/gen/chitiet_amthuc.css', array(), $theme_version, 'all');
    wp_enqueue_style('hagiang-fancybox', get_template_directory_uri() . '/js/site/fancybox/jquery.fancybox.css', array(), $theme_version, 'all');

    wp_enqueue_style('hagiang-fix', get_template_directory_uri() . '/css/site/site/fix.css', array(), $theme_version, 'all');
//    js
//    wp_enqueue_script('jquery');
    wp_enqueue_script('vietnam-jquery-3.6.0', get_stylesheet_directory_uri() . '/js/site/jquery-3.6.0.min.js', null, $theme_version, false);
    wp_enqueue_script('vietnam-slick', get_stylesheet_directory_uri() . '/js/site/slick.js', null, $theme_version, false);
    wp_enqueue_script('vietnam-wow', get_stylesheet_directory_uri() . '/js/site/wow.min.js', null, $theme_version, false);
    wp_enqueue_script('vietnam-fancybox', get_stylesheet_directory_uri() . '/js/site/fancybox/jquery.fancybox.js', null, $theme_version, false);
    wp_enqueue_script('vietnam-aosjs', get_stylesheet_directory_uri() . '/js/site/aos.js', null, $theme_version, false);
    wp_enqueue_script('vietnam-chitiet_ks', get_stylesheet_directory_uri() . '/js/site/site/gen/chitiet_ks.js', null, $theme_version, false);
    wp_enqueue_script('vietnam-chitiet_amthuc', get_stylesheet_directory_uri() . '/js/site/site/gen/chitiet_amthuc.js', null, $theme_version, false);
//    wp_enqueue_script('vietnam-carousel', get_stylesheet_directory_uri() . '/js/site/owl.carousel.min.js', null, $theme_version, false);
}

add_action('wp_enqueue_scripts', 'wp_include_css');
/**
 * Custom Functions
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Standalone Functions
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Template Functions
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom functions for selective refresh.
 */
require get_template_directory() . '/inc/partials.php';

/**
 * Fontawesome
 */
require get_template_directory() . '/inc/fontawesome.php';

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Typography Functions
 */
require get_template_directory() . '/inc/typography.php';

/**
 * Dynamic Styles
 */
require get_template_directory() . '/css/style.php';

/**
 * Plugin Recommendation
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Add theme compatibility function for woocommerce if active
 */
if (blossom_fashion_is_woocommerce_activated()) {
    require get_template_directory() . '/inc/woocommerce-functions.php';
}

/**
 * Toolkit Filters
 */
if (blossom_fashion_is_bttk_activated())
    require get_template_directory() . '/inc/toolkit-functions.php';

/**
 * Getting Started
 */
require get_template_directory() . '/inc/getting-started/getting-started.php';

add_filter('xmlrpc_enabled', '__return_false');

/**
 * Disable the emoji's
 */
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

    // Remove from TinyMCE
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

add_action('init', 'disable_emojis');

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}


function register_list_widget($widgets_manager)
{

    require_once(__DIR__ . '/widgets/introduce-widget.php');
    require_once(__DIR__ . '/widgets/introduce-siler-widget.php');
    require_once(__DIR__ . '/widgets/introduce-utilities-widget.php');
    require_once(__DIR__ . '/widgets/introduce-room-widget.php');
    require_once(__DIR__ . '/widgets/introduce-contact-widget.php');

    $widgets_manager->register(new \Elementor_Introduce_Widget());
    $widgets_manager->register(new \Elementor_slides_Widget());
    $widgets_manager->register(new \Elementor_utilities_Widget());
    $widgets_manager->register(new \Elementor_room_Widget());
    $widgets_manager->register(new \Elementor_contact_Widget());
}

add_action('elementor/widgets/register', 'register_list_widget');


