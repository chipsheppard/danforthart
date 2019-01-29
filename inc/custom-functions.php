<?php
/**
 * Custom functions.
 *
 * @package  danforthart
 * @subpackage danforthart/inc
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 *
 * @link https://www.pmg.com/blog/wordpress-how-to-adding-a-custom-checkbox-to-the-post-publish-box/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * A wrapper function to get our settings.
 *
 * @since 1.0.0
 *
 * @param string $setting The option name to look up.
 * @return string The option value.
 */
function danforthart_get_setting( $setting ) {
	$danforthart_settings = wp_parse_args(
		get_option( 'danforthart_settings', array() ),
		danforthart_get_defaults()
	);
	return $danforthart_settings[ $setting ];
}

/**
 * Adds custom body class to particular pages.
 */
function danforthart_body_color_class() {

	if ( is_page( 'see-art' ) ) {
		add_filter( 'body_class', function( $classes ) {
			return array_merge( $classes, array( 'color1' ) );
		} );
	} elseif ( is_page( 'learn-create' ) ) {
		add_filter( 'body_class', function( $classes ) {
			return array_merge( $classes, array( 'color2' ) );
		} );
	} elseif ( is_page( 'visit' ) ) {
		add_filter( 'body_class', function( $classes ) {
			return array_merge( $classes, array( 'color3' ) );
		} );
	} elseif ( is_page( 'join-support' ) ) {
		add_filter( 'body_class', function( $classes ) {
			return array_merge( $classes, array( 'color4' ) );
		} );
	} elseif ( is_page( 'meet-us' ) ) {
		add_filter( 'body_class', function( $classes ) {
			return array_merge( $classes, array( 'color5' ) );
		} );
	} else {
		return;
	}
}
add_action( 'danforthart_init', 'danforthart_body_color_class' );


/**
 * META BOX FUNCTIONS Write styles for the custom background color from tBGcolor Meta Box.
 */
function write_bgcolor() {

	// include file with color sanitization functions.
	if ( ! function_exists( 'sanitize_hex_color' ) ) {
		include_once ABSPATH . 'wp-includes/class-wp-customize-manager.php';
	}

	$blog_id = get_option( 'page_for_posts' );
	$color = sanitize_hex_color( get_post_meta( get_the_ID(), 'bgcolor_color', true ) );
	$blog_color = sanitize_hex_color( get_post_meta( $blog_id, 'bgcolor_color', true ) );
	$default = '#ffffff';

	// For blog page.
	if ( is_home() && ! is_front_page() && $blog_color !== $default ) :
		?>
<style type="text/javascript">body {background-color:<?php echo esc_html( $blog_color ); ?>;}</style>
		<?php
	elseif ( is_singular() && $color !== $default ) :
		?>
<style type="text/css">body,.exhibition-featured-date,.hero-callout {background-color:<?php echo esc_html( $color ); ?> !important;}</style>
		<?php
	endif;

}
add_action( 'wp_head', 'write_bgcolor' );
