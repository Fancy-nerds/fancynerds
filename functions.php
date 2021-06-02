<?php

/**
 * fancynerds functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fancynerds
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

require_once 'helpers/M4Funcs.php';
require_once 'helpers/M4Hooks.php';
require_once 'helpers/M4Helpers.php';
require_once 'helpers/M4Shortcodes.php';
require_once 'helpers/M4Blocks.php';
require_once 'helpers/M4Ajax.php';


if (!function_exists('fancynerds_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fancynerds_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fancynerds, use a find and replace
		 * to change 'fancynerds' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('fancynerds', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'fancynerds'),
				'menu-footer-1' => esc_html__('Footer menu 1', 'fancynerds'),
				'menu-footer-2' => esc_html__('Footer menu 2', 'fancynerds'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'fancynerds_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		if( function_exists('acf_add_options_page') ) {
			acf_add_options_page(array(
				'page_title' 	=> 'API Keys',
				'menu_title'	=> 'API Keys',
				'menu_slug'	=> 'api-keys-settings',
			));
		}
	}
endif;
add_action('after_setup_theme', 'fancynerds_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fancynerds_content_width()
{
	$GLOBALS['content_width'] = apply_filters('fancynerds_content_width', 640);
}
add_action('after_setup_theme', 'fancynerds_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fancynerds_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'fancynerds'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'fancynerds'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'fancynerds_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function fancynerds_scripts()
{


	# Vendor
	wp_register_script('fancynerds-vendor-swiper-js', get_template_directory_uri() . '/vendor/swiper/swiper.min.js', array(), null, true);
	wp_register_script('iodine-js', get_template_directory_uri() . '/vendor/iodine.js', array(), null, true);
	wp_register_script('intl-tel-input-js', get_template_directory_uri() . '/vendor/intl-tel-input/intl-tel-input.js', array(), null, true);
	wp_register_style('fancynerds-vendor-swiper-css', get_template_directory_uri() . '/vendor/swiper/swiper.min.css', array(), null, 'all');
	wp_register_style('intl-tel-input-css', get_template_directory_uri() . '/vendor/intl-tel-input/intl-tel-input.css', array(), null, 'all');

	wp_enqueue_style('intl-tel-input-css');
	wp_enqueue_script('intl-tel-input-js');
	wp_enqueue_script('iodine-js');

	wp_enqueue_style('fancynerds-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('fancynerds-style', 'rtl', 'replace');

	# Common styles that appears on all pages
	wp_enqueue_style('fancynerds-common-css', get_template_directory_uri() . '/assets/styles/common.css', array(), rand(1, 999999));

	# Common scripts that appears on all pages
	wp_register_script('fancynerds-common-js', get_template_directory_uri() . '/assets/scripts/common.js', array(), rand(1, 999999), true);
	wp_localize_script('fancynerds-common-js', 'k8All', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
	));
	wp_enqueue_script('fancynerds-common-js');

	#Template Parts
	wp_register_style('fancynerds-part-jumbo-css', get_template_directory_uri() . '/components/blocks/jumbotron__inner/jumbotron__inner.css', [], rand(1, 999999), 'all');

	#Templates
	#Team
	wp_register_style('fancynerds-tpl-team-css', get_template_directory_uri() . '/assets/styles/pages/team.css', [], rand(1, 999999), 'all');
	if (is_page_template('tpl-team.php')) {
		wp_enqueue_style('fancynerds-tpl-team-css');
	}

	wp_register_style('fancynerds-tpl-about-css', get_template_directory_uri() . '/assets/styles/pages/about.css', [], rand(1, 999999), 'all');
	if (is_page_template('tpl-about.php')) {
		wp_enqueue_style('fancynerds-tpl-about-css');
	}

	wp_register_style('fancynerds-tpl-service-css', get_template_directory_uri() . '/assets/styles/pages/service.css', [], rand(1, 999999), 'all');
	if (is_page_template('tpl-service.php')) {
		wp_enqueue_style('fancynerds-tpl-service-css');
	}

	#END Templates

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'fancynerds_scripts');



#styles used in admin panel so block components look the same
add_action('admin_enqueue_scripts', 'fancynerds_admin_styles');
function fancynerds_admin_styles()
{
	$current_page = get_current_screen()->base;
	if ($current_page == 'post' || $current_page == 'page') {
		wp_enqueue_style('fancynerds-common', get_template_directory_uri() . '/assets/styles/common.css', array(), rand(1, 999999));
		wp_enqueue_style('fancynerds-admin', get_template_directory_uri() . '/assets/styles/admin.css', array(), rand(1, 999999));
	}
}


#Remove not used scripts
function fancynerds_deregister_scripts()
{
	wp_dequeue_script('wp-embed');
}
add_action('wp_footer', 'fancynerds_deregister_scripts');


#Custom image sizes
add_action('after_setup_theme', 'fancynerds_theme_setup');
function fancynerds_theme_setup()
{
	// add_image_size( 'category-thumb', 300 ); // 300 pixels wide (and unlimited height)
	add_image_size('team', 370, 370, true); // (cropped)
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Gutenberg custom stylesheet
add_theme_support('editor-styles');
add_editor_style('editor-style.css'); // make sure path reflects where the file is located


//deregister jquery from frontend
function remove_jquery()
{
	if (!is_admin() && !is_admin_bar_showing() && !is_singular('jobs')) {
		wp_dequeue_script('jquery');
		wp_deregister_script('jquery');

		// Removing WP core jQuery
		wp_dequeue_script('jquery-core');
		wp_deregister_script('jquery-core');
	}
}
add_action('wp_enqueue_scripts', 'remove_jquery');


//restrict palette
function fancy_setup_theme_supported_features()
{
	add_theme_support('editor-color-palette', array(
		array(
			'name' => esc_attr__('black', 'fancynerds'),
			'slug' => 'black',
			'color' => '#1a1b1e',
		),
		array(
			'name' => esc_attr__('white', 'fancynerds'),
			'slug' => 'white',
			'color' => '#ffffff',
		),
		array(
			'name' => esc_attr__('light blue', 'fancynerds'),
			'slug' => 'light-blue',
			'color' => '#f0f6ff',
		),
		array(
			'name' => esc_attr__('blue', 'fancynerds'),
			'slug' => 'blue',
			'color' => '#00c3ff',
		),
		array(
			'name' => esc_attr__('orange', 'fancynerds'),
			'slug' => 'orange',
			'color' => '#fe4c1c',
		),

		array(
			'name' => esc_attr__('transparent', 'fancynerds'),
			'slug' => 'transparent',
			'color' => '#ffffff00',
		),
	));

	add_theme_support('editor-gradient-presets', array(
        array(
			'name' => esc_attr__('dark blue to blue gradient', 'fancynerds'),
			'slug' => 'dark-blue-to-blue',
			'gradient' => 'linear-gradient(to left, #04b6f1 0%, #002cae 62%, #002cae 100%)',
		),
    ));
}

add_action('after_setup_theme', 'fancy_setup_theme_supported_features');



#Add 
function atg_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'menu-footer-1') {
    $classes[] = 'footer__item';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);