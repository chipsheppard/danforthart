<?php
/**
 * Theme Customizer.
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

add_action( 'customize_register', 'danforthart_set_customizer_helpers', 1 );
/**
 * Set up helpers early so they're always available.
 * Other modules might need access to them at some point.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function danforthart_set_customizer_helpers( $wp_customize ) {
	// Load helpers.
	require_once trailingslashit( get_template_directory() ) . 'inc/customizer-helpers.php';
}

// DEFAULTS.
if ( ! function_exists( 'danforthart_get_defaults' ) ) {
	/**
	 * Set default options
	 */
	function danforthart_get_defaults() {
		$danforthart_defaults = array(
			'color_1' => '#f1a676',
			'color_2' => '#93ddce',
			'color_3' => '#f6d06d',
			'color_4' => '#edd6b9',
			'color_5' => '#afc2e3',
		);
		return $danforthart_defaults;
	}
}


add_action( 'customize_register', 'danforthart_customize_register' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function danforthart_customize_register( $wp_customize ) {

	$defaults = danforthart_get_defaults();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'danforthart_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'danforthart_customize_partial_blogdescription',
		) );
	}

	/**
	 * Render the site title for the selective refresh partial.
	 */
	function danforthart_customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 */
	function danforthart_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

	/* COLORS --------------------------- */

	// Color 1.
	$wp_customize->add_setting(
		'danforthart_settings[color_1]', array(
			'default' => $defaults['color_1'],
			'type' => 'option',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'danforthart_settings[color_1]',
			array(
				'label' => __( 'Color 1', 'danforthart' ),
				'section' => 'colors',
				'settings' => 'danforthart_settings[color_1]',
				'priority' => 10,
			)
		)
	);

	// Color 2.
	$wp_customize->add_setting(
		'danforthart_settings[color_2]', array(
			'default' => $defaults['color_2'],
			'type' => 'option',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'danforthart_settings[color_2]',
			array(
				'label' => __( 'Color 2', 'danforthart' ),
				'section' => 'colors',
				'settings' => 'danforthart_settings[color_2]',
				'priority' => 20,
			)
		)
	);

	// Color 3.
	$wp_customize->add_setting(
		'danforthart_settings[color_3]', array(
			'default' => $defaults['color_3'],
			'type' => 'option',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'danforthart_settings[color_3]',
			array(
				'label' => __( 'Color 3', 'danforthart' ),
				'section' => 'colors',
				'settings' => 'danforthart_settings[color_3]',
				'priority' => 30,
			)
		)
	);

	// Color 4.
	$wp_customize->add_setting(
		'danforthart_settings[color_4]', array(
			'default' => $defaults['color_4'],
			'type' => 'option',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'danforthart_settings[color_4]',
			array(
				'label' => __( 'Color 4', 'danforthart' ),
				'section' => 'colors',
				'settings' => 'danforthart_settings[color_4]',
				'priority' => 40,
			)
		)
	);

	// Color 5.
	$wp_customize->add_setting(
		'danforthart_settings[color_5]', array(
			'default' => $defaults['color_5'],
			'type' => 'option',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'danforthart_settings[color_5]',
			array(
				'label' => __( 'Color 5', 'danforthart' ),
				'section' => 'colors',
				'settings' => 'danforthart_settings[color_5]',
				'priority' => 50,
			)
		)
	);
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 0.1
 */
function danforthart_customizer_live_preview() {
	wp_enqueue_script( 'danforthart-themecustomizer', trailingslashit( get_template_directory_uri() ) . 'assets/js/customizer-min.js', array( 'customize-preview' ), DANFORTHART_VERSION, true );
}
add_action( 'customize_preview_init', 'danforthart_customizer_live_preview' );
