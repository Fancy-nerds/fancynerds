<?php
/**
 * fancynerds functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fancynerds
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

require_once 'helpers/M4Helpers.php';

if ( ! function_exists( 'fancynerds_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fancynerds_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fancynerds, use a find and replace
		 * to change 'fancynerds' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fancynerds', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'fancynerds' ),
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
		add_theme_support( 'customize-selective-refresh-widgets' );

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
	}
endif;
add_action( 'after_setup_theme', 'fancynerds_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fancynerds_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fancynerds_content_width', 640 );
}
add_action( 'after_setup_theme', 'fancynerds_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fancynerds_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'fancynerds' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fancynerds' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fancynerds_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fancynerds_scripts() {
	wp_enqueue_style( 'fancynerds-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'fancynerds-style', 'rtl', 'replace' );

	// wp_enqueue_style( 'fancynerds-common-css', get_template_directory_uri().'/assets/styles/styles.css', array(), rand( 1, 999999 ) );

	// wp_enqueue_style( $handle, $src = '', $deps = array, $ver = false, $media = 'all' )

	wp_enqueue_script( 'fancynerds-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fancynerds_scripts' );



add_action( 'admin_enqueue_scripts', 'fancynerds_admin_styles' );
function fancynerds_admin_styles() {
	wp_enqueue_style( 'fancynerds-admin-css', get_template_directory_uri() . '/assets/styles/admin.css', array(), rand( 1, 999999 ) );
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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Gutenberg custom stylesheet
add_theme_support('editor-styles');
add_editor_style( 'editor-style.css' ); // make sure path reflects where the file is located







add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

	// Check function exists.
	if( function_exists('acf_register_block_type') ) {

		// register a testimonial block.
		acf_register_block_type(array(
			'name'              => 'testimonials',
			'title'             => __('Testimonials'),
			'description'       => __('A custom testimonials block.'),
			'render_template'   => 'components/blocks/testimonials/testimonials.php',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array( 'testimonial', 'quote' ),
			'enqueue_assets'	=> function(){
				wp_enqueue_style( 'fancynerds-common-css', get_template_directory_uri().'/assets/styles/styles.css', array(), rand( 1, 999999 ),'all' );
			},
		));

		#Jumbotron
		acf_register_block_type(array(
			'name'              => 'jumbotron',
			'title'             => __('Jumbotron'),
			'description'       => __('A custom jumbotron block.'),
			'render_template'   => 'components/blocks/jumbotron/jumbotron.php',
			'category'          => 'formatting',
			'icon'              => 'welcome-view-site',
			'keywords'          => array( 'jumbotron', 'quote' ),
			'enqueue_assets'	=> function(){
				wp_enqueue_style( 'fancynerds-common-css', get_template_directory_uri().'/assets/styles/styles.css', array(), rand( 1, 999999 ),'all' );
			},
		));

		#Steps
		acf_register_block_type(array(
			'name'              => 'steps',
			'title'             => __('Steps'),
			'description'       => __('A custom steps block.'),
			'render_template'   => 'components/blocks/steps/steps.php',
			'category'          => 'formatting',
			'icon'              => 'money',
			'keywords'          => array( 'steps', 'quote' ),
			'enqueue_assets'	=> function(){
				wp_enqueue_style( 'fancynerds-common-css', get_template_directory_uri().'/assets/styles/styles.css', array(), rand( 1, 999999 ), 'all' );
			},
		));

		#about
		acf_register_block_type(array(
			'name'              => 'about',
			'title'             => __('About'),
			'description'       => __('A custom about block.'),
			'render_template'   => 'components/blocks/about/about.php',
			'category'          => 'formatting',
			'icon'              => 'format-status',
			'keywords'          => array( 'about', 'quote' ),
			'enqueue_assets'	=> function(){
				wp_enqueue_style( 'fancynerds-common-css', get_template_directory_uri().'/assets/styles/styles.css', array(), rand( 1, 999999 ), 'all' );
			},
		));

		#Partners
		acf_register_block_type(array(
			'name'              => 'partners',
			'title'             => __('Partners'),
			'description'       => __('A custom partners block.'),
			'render_template'   => 'components/blocks/partners/partners.php',
			'category'          => 'formatting',
			'icon'              => 'editor-ul',
			'keywords'          => array( 'partners', 'quote' ),
			'enqueue_assets'	=> function(){
				wp_enqueue_style( 'fancynerds-common-css', get_template_directory_uri().'/assets/styles/styles.css', array(), rand( 1, 999999 ), 'all' );
			},
		));

		#Services
		acf_register_block_type(array(
			'name'              => 'services',
			'title'             => __('Services'),
			'description'       => __('A custom services block.'),
			'render_template'   => 'components/blocks/services/services.php',
			'category'          => 'formatting',
			'icon'              => 'admin-site-alt3',
			'keywords'          => array( 'services', 'quote' ),
			'enqueue_assets'	=> function(){
				wp_enqueue_style( 'fancynerds-common-css', get_template_directory_uri().'/assets/styles/styles.css', array(), rand( 1, 999999 ), 'all' );
			},
		));

		#Benefits
		acf_register_block_type(array(
			'name'              => 'benefits',
			'title'             => __('Benefits'),
			'description'       => __('A custom benefits block.'),
			'render_template'   => 'components/blocks/benefits/benefits.php',
			'category'          => 'formatting',
			'icon'              => 'saved',
			'keywords'          => array( 'benefits', 'quote' ), 
			'enqueue_assets'	=> function(){
				wp_enqueue_style( 'fancynerds-common-css', get_template_directory_uri().'/assets/styles/styles.css', array(), rand( 1, 999999 ), 'all' );
			},
		));

		#Plans
		acf_register_block_type(array(
			'name'              => 'plans',
			'title'             => __('Plans'),
			'description'       => __('A custom plans block.'),
			'render_template'   => 'components/blocks/plans/plans.php',
			'category'          => 'formatting',
			'icon'              => 'money-alt',
			'keywords'          => array( 'plans', 'quote' ), 
			'enqueue_assets'	=> function(){
				wp_enqueue_style( 'fancynerds-common-css', get_template_directory_uri().'/assets/styles/styles.css', array(), rand( 1, 999999 ), 'all' );
			},
		));
	}
}