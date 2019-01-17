<?php
/**
 * The template for displaying the Team page.
 *
 * Template Name: Team
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'meetus team' ) );
} );

/**
 * Team page functions
 */
function da_team() {

	echo '<div class="inner-wrap">';

	echo '<div class="sub-navigation">';
		wp_nav_menu( array(
			'menu' => 'meet-sub',
			'container' => '',
		) );
	echo '</div>';

	echo 'Our Team';

	the_content();

	echo '</div>';

}
add_action( 'tha_entry_content_before', 'da_team' );



// Build the page.
get_template_part( 'index' );
