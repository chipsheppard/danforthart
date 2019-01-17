<?php
/**
 * Output all of our dynamic CSS.
 *
 * @package  danforthart
 * @subpackage danforthart/inc
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'danforthart_base_css' ) ) {
	/**
	 * Generate the CSS in the <head> section using the Theme Customizer.
	 *
	 * @since 0.1
	 */
	function danforthart_base_css() {
		// Get our settings.
		$danforthart_settings = wp_parse_args(
			get_option( 'danforthart_settings', array() ),
			danforthart_get_defaults()
		);
		$defaults = danforthart_get_defaults();

		$color_1 = $danforthart_settings['color_1'];
		$color_2 = $danforthart_settings['color_2'];
		$color_3 = $danforthart_settings['color_3'];
		$color_4 = $danforthart_settings['color_4'];
		$color_5 = $danforthart_settings['color_5'];

		$default_color_1 = $defaults['color_1'];
		$default_color_2 = $defaults['color_2'];
		$default_color_3 = $defaults['color_3'];
		$default_color_4 = $defaults['color_4'];
		$default_color_5 = $defaults['color_5'];

		// Initiate our class.
		$css = new Danforthart_CSS();

		/*
		 * COLORS -----------------------------
		 */
		if ( $default_color_1 !== $color_1 ) :
			// Backgrounds.
			$css->set_selector(
				'body.color1, .site-navigation .color1 a:hover'
			);
			$css->add_property( 'background-color', esc_attr( $danforthart_settings['color_1'] ) );
			// Borders.
			$css->set_selector(
				'.site-navigation .color1 a, .site-navigation .color1.current-menu-item > a:hover'
			);
			$css->add_property( 'border-color', esc_attr( $danforthart_settings['color_1'] ) );
		endif;
		if ( $default_color_2 !== $color_2 ) :
			// Backgrounds.
			$css->set_selector(
				'body.color2, .site-navigation .color2 a:hover'
			);
			$css->add_property( 'background-color', esc_attr( $danforthart_settings['color_2'] ) );
			// Borders.
			$css->set_selector(
				'.site-navigation .color2 a, .site-navigation .color2.current-menu-item > a:hover'
			);
			$css->add_property( 'border-color', esc_attr( $danforthart_settings['color_2'] ) );
		endif;
		if ( $default_color_3 !== $color_3 ) :
			// Backgrounds.
			$css->set_selector(
				'body.color3, .site-navigation .color3 a:hover'
			);
			$css->add_property( 'background-color', esc_attr( $danforthart_settings['color_3'] ) );
			// Borders.
			$css->set_selector(
				'.site-navigation .color3 a, .site-navigation .color3.current-menu-item > a:hover'
			);
			$css->add_property( 'border-color', esc_attr( $danforthart_settings['color_3'] ) );
		endif;
		if ( $default_color_4 !== $color_4 ) :
			// Backgrounds.
			$css->set_selector(
				'body.color4, .site-navigation .color4 a:hover'
			);
			$css->add_property( 'background-color', esc_attr( $danforthart_settings['color_4'] ) );
			// Borders.
			$css->set_selector(
				'.site-navigation .color4 a, .site-navigation .color4.current-menu-item > a:hover'
			);
			$css->add_property( 'border-color', esc_attr( $danforthart_settings['color_4'] ) );
		endif;
		if ( $default_color_5 !== $color_5 ) :
			// Backgrounds.
			$css->set_selector(
				'body.color5, .site-navigation .color5 a:hover'
			);
			$css->add_property( 'background-color', esc_attr( $danforthart_settings['color_5'] ) );
			// Borders.
			$css->set_selector(
				'.site-navigation .color5 a, .site-navigation .color5.current-menu-item > a:hover'
			);
			$css->add_property( 'border-color', esc_attr( $danforthart_settings['color_5'] ) );
		endif;

		// MEDIA QUERIES --------------------------------.
		$css->start_media_query( 'all and (max-width: 768px)' );
		if ( $default_color_1 !== $color_1 ) :
			$css->set_selector(
				'.seeart .site-navigation .color1 a'
			);
			$css->add_property( 'background-color', esc_attr( $danforthart_settings['color_1'] ) );
		endif;
		if ( $default_color_2 !== $color_2 ) :
			$css->set_selector(
				'.learncreate .site-navigation .color2 a'
			);
			$css->add_property( 'background-color', esc_attr( $danforthart_settings['color_2'] ) );
		endif;
		if ( $default_color_3 !== $color_3 ) :
			$css->set_selector(
				'.vis .site-navigation .color3 a'
			);
			$css->add_property( 'background-color', esc_attr( $danforthart_settings['color_3'] ) );
		endif;
		if ( $default_color_4 !== $color_4 ) :
			$css->set_selector(
				'.joinsupport .site-navigation .color4 a'
			);
			$css->add_property( 'background-color', esc_attr( $danforthart_settings['color_4'] ) );
		endif;
		if ( $default_color_5 !== $color_5 ) :
			$css->set_selector(
				'.meetus .site-navigation .color5 a'
			);
			$css->add_property( 'background-color', esc_attr( $danforthart_settings['color_5'] ) );
		endif;
		$css->stop_media_query();

		// Allow us to hook CSS into our output - where we would hook our "Pro" features?
		do_action( 'danforthart_base_css', $css );

		return apply_filters( 'danforthart_base_css_output', $css->css_output() );
	}
} // End if().
/* end danforthart_base_css() */


/**
 * Enqueue our customizer CSS.
 *
 * @since 1.0.0
 */
function danforthart_enqueue_customizer_css() {
	$handle = 'danforthart-style';
	// If there are no settings set Or if we're in the customizer.
	if ( ! get_option( 'danforthart_customizer_css_output', true ) || is_customize_preview() ) {
		$css = danforthart_base_css();
	} else {
		$css = get_option( 'danforthart_customizer_css_output' ) . '/* Customizer CSS */';
	}
	wp_add_inline_style( $handle, $css );
}
add_action( 'wp_enqueue_scripts', 'danforthart_enqueue_customizer_css', 50 );

/**
 * Save our generated CSS as a WP Option which gets cached.
 *
 * @since 1.0.0
 */
function danforthart_update_customizer_css_cache() {
	$css = danforthart_base_css();
	update_option( 'danforthart_customizer_css_output', $css );
}
add_action( 'customize_save_after', 'danforthart_update_customizer_css_cache' );
