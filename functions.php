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
define( 'DANFORTHART_VERSION', '1.0.0' );
define( 'DANFORTHART_THEME_NAME', 'Danforth Art' );
define( 'DANFORTHART_AUTHOR_NAME', 'Moth Design' );
define( 'DANFORTHART_AUTHOR_LINK', 'https://sheppco.com' );

/**
 * Load the extra stuff.
 */
require get_template_directory() . '/inc/tha-theme-hooks.php';
require get_template_directory() . '/inc/wordpress-cleanup.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/entry-meta.php';
require get_template_directory() . '/inc/theme-functions.php';
require get_template_directory() . '/inc/loop.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/class-bgcolor-metabox.php';
require get_template_directory() . '/inc/class-danforthart-css.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/css-output.php';

/**
 * Enqueue scripts and styles.
 */
function danforthart_scripts() {
	wp_enqueue_style( 'danforthart-style', get_stylesheet_uri(), array(), DANFORTHART_VERSION );
	wp_enqueue_style( 'danforthart-fonts', danforthart_theme_fonts_url() );
	wp_enqueue_script( 'danforthart-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), DANFORTHART_VERSION, true );
	wp_enqueue_script( 'danforthart-globaljs', get_template_directory_uri() . '/assets/js/global-min.js', array( 'jquery' ), DANFORTHART_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_front_page() ) {
		wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), DANFORTHART_VERSION, true );
		wp_enqueue_script( 'slick-functions', get_template_directory_uri() . '/assets/js/slick-functions.js', array( 'jquery' ), DANFORTHART_VERSION, true );
	}
}
add_action( 'wp_enqueue_scripts', 'danforthart_scripts' );

/**
 * Theme Fonts URL
 */
function danforthart_theme_fonts_url() {
	$gfonts = 'Poppins:300,300i,600,600i,700,700i';
	$font_families = apply_filters( 'danforthart_theme_fonts', array( $gfonts ) );
	$query_args = array(
		'family' => implode( '|', $font_families ),
		'subset' => 'latin,latin-ext',
	);
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	return $fonts_url;
}

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
			'height'      => 40,
			'width'       => 200,
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
 * Make the TEXT editor the default.
 */
 add_filter( 'wp_default_editor', create_function( '', 'return "html";' ) );


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
