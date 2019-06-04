<?php
/**
 * Main Functions File
 *
 * @package  danforthart
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Theme data.
define( 'DANFORTHART_VERSION', '1.5.0' );
define( 'DANFORTHART_THEME_NAME', 'Danforth Art' );
define( 'DANFORTHART_AUTHOR_NAME', 'Moth Design' );
define( 'DANFORTHART_AUTHOR_LINK', 'http://www.mothdesign.net' );

/**
 * Load the extra stuff.
 */
require get_template_directory() . '/inc/tha-theme-hooks.php';
require get_template_directory() . '/inc/wordpress-cleanup.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/entry-meta.php';
// require get_template_directory() . '/inc/entry-footer.php';.
require get_template_directory() . '/inc/theme-functions.php';
require get_template_directory() . '/inc/loop.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/class-bgcolor-metabox.php';
require get_template_directory() . '/inc/class-danforthart-css.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/css-output.php';
// require get_template_directory() . '/inc/remove-menu-items.php';.
require get_template_directory() . '/inc/google-analytics.php';
/**
 * Enqueue scripts and styles.
 */
function danforthart_scripts() {
	wp_enqueue_style( 'danforthart-style', get_stylesheet_uri(), array(), DANFORTHART_VERSION );
	wp_enqueue_script( 'danforthart-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), DANFORTHART_VERSION, true );
	wp_enqueue_script( 'danforthart-globaljs', get_template_directory_uri() . '/assets/js/global-min.js', array( 'jquery' ), DANFORTHART_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_front_page() ) {
		wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), DANFORTHART_VERSION, true );
		wp_enqueue_script( 'slick-homepage', get_template_directory_uri() . '/assets/js/slick-homepage-min.js', array( 'jquery' ), DANFORTHART_VERSION, true );
	}
	if ( is_singular( 'exhibition' ) ) {
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), DANFORTHART_VERSION, true );
		wp_enqueue_script( 'exhibits-js', get_template_directory_uri() . '/assets/js/exhibits-min.js', array( 'jquery' ), DANFORTHART_VERSION, true );
	}
	if ( is_page_template( 'templates/permanent.php' ) ) {
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'permanent-js', get_template_directory_uri() . '/assets/js/permanent-min.js', array( 'jquery' ), DANFORTHART_VERSION, true );
		wp_enqueue_script( 'opm-js', get_template_directory_uri() . '/assets/js/opm-min.js', array( 'jquery' ), DANFORTHART_VERSION, true );
	}
	if ( is_page_template( 'templates/faq.php' ) ) {
		wp_enqueue_script( 'opm-js', get_template_directory_uri() . '/assets/js/opm-min.js', array( 'jquery' ), DANFORTHART_VERSION, true );
	}
}
add_action( 'wp_enqueue_scripts', 'danforthart_scripts' );


/**
 * Enqueue editor styles for Gutenberg
 */
function danforthart_gutenberg_editor_styles() {
	wp_enqueue_style( 'danforthart_gutenberg-editor-style', get_template_directory_uri() . '/assets/css/editor-style.css' );
}
add_action( 'enqueue_block_editor_assets', 'danforthart_gutenberg_editor_styles' );



if ( ! function_exists( 'danforthart_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 0.1
	 */
	function danforthart_setup() {

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'status' ) );
		add_theme_support( 'align-wide' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Set the content width in pixels, based on the theme's design and stylesheet.
		$GLOBALS['content_width'] = apply_filters( 'danforthart_content_width', 1200 );

		// Custom Logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 80,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
		) );

		// wp_nav_menu() in 1 location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'danforthart' ),
		) );

		// Make theme available for translation.
		load_theme_textdomain( 'danforthart', get_template_directory() . '/languages' );

		// Theme styles for the visual editor.
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'danforthart_setup' );


/**
 * Limit the number of post revisions.
 *
 * @param string $num The number of post revisions to keep.
 * @param object $post The post object.
 */
function danforthart_set_revision_max( $num, $post ) {
	$num = 10;
	return $num;
}
add_filter( 'wp_revisions_to_keep', 'danforthart_set_revision_max', 10, 2 );



// ACF Options.
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( 'Theme Options' );
}


/**
 * Show only parent taxonomies by hooking into ACF's taxonomy display.
 *
 * @link https://www.advancedcustomfields.com/resources/acf-fields-taxonomy-query/
 * @param array  $args The number of post revisions to keep.
 * @param string $field The number of post revisions to keep.
 * @param object $post_id The post object.
 */
function dfa_taxonomy_query( $args, $field, $post_id ) {
	// modify args.
	$args['parent'] = 0;
	// return.
	return $args;
}
add_filter( 'acf/fields/taxonomy/query/name=c_level', 'dfa_taxonomy_query', 10, 3 );


/**
 * Add body class to all pages using content modules.
 *
 * @param array $classes The body classes.
 */
function dfa_body_classes( $classes ) {
	if ( is_singular() && ! is_singular( array( 'artwork', 'event', 'exhibition' ) ) && ! is_page_template( array(
		'templates/calendar.php',
		'templates/faq.php',
		'templates/home.php',
		'templates/learn.php',
		'templates/learn-c.php',
		'templates/learn-courses.php',
		'templates/meet.php',
		'templates/past.php',
		'templates/permanent.php',
		'templates/seeart.php',
		'templates/team.php',
		'templates/tours.php',
		'templates/visit.php',
	) ) ) {
		$classes[] = 'modules';
	}

	if ( get_field( 'sub_menu' ) ) {
		$m = get_field( 'sub_menu' );
		$classes[] = $m;
	}
	return $classes;
}
add_action( 'body_class','dfa_body_classes' );


// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*
 * Add Theme support for WooCommerce
 * http://www.wpexplorer.com/woocommerce-compatible-theme/
 */
define( 'WPEX_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );
// Checking if WooCommerce is active.
if ( WPEX_WOOCOMMERCE_ACTIVE ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
