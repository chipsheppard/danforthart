<?php
/**
 * Widgets.
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

/**
 * Register widget areas.
 */
function danforthart_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Top Footer - Logo', 'danforthart' ),
			'id'            => 'footer-t0',
			'description'   => esc_html__( 'Top Logo widget area.', 'danforthart' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Top Footer - Widget 1', 'danforthart' ),
			'id'            => 'footer-t1',
			'description'   => esc_html__( 'Top Left widget area.', 'danforthart' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Top Footer - Widget 2', 'danforthart' ),
			'id'            => 'footer-t2',
			'description'   => esc_html__( 'Top Middle widget area.', 'danforthart' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Top Footer - Widget 3', 'danforthart' ),
			'id'            => 'footer-t3',
			'description'   => esc_html__( 'Top Right widget area.', 'danforthart' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Lower Footer - Widget 1', 'danforthart' ),
			'id'            => 'footer-l1',
			'description'   => esc_html__( 'Lower Left widget area.', 'danforthart' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Lower Footer - Widget 2', 'danforthart' ),
			'id'            => 'footer-l2',
			'description'   => esc_html__( 'Lower Right widget area.', 'danforthart' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Above Header Widget', 'danforthart' ),
			'id'            => 'header',
			'description'   => esc_html__( 'An optional "announcement" widget area. Displays at the very top of your website.', 'danforthart' ),
			'before_widget' => '<div id="%1$s" class="header-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

}

add_action( 'widgets_init', 'danforthart_widgets_init' );
