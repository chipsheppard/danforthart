<?php
/**
 * The template for displaying the Events Calendar page.
 *
 * Template Name: Events Calendar
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'vis calendar' ) );
} );

/**
 * Learn Create page functions
 */
function da_calendar() {

	echo '<div class="inner-wrap">';

	echo '<div class="sub-navigation">';
		wp_nav_menu( array(
			'menu' => 'visit-sub',
			'container' => '',
		) );
	echo '</div>';

	echo 'Events Calendar';

	the_content();

	echo '</div>';

}
add_action( 'tha_entry_content_before', 'da_calendar' );



// Build the page.
get_template_part( 'index' );
