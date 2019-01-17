<?php
/**
 * The template for displaying the Meet Us page.
 *
 * Template Name: Meet
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'meetus meet' ) );
} );

/**
 * Meet Us page functions
 */
function da_meet() {

	echo '<div class="inner-wrap">';

	echo '<div class="sub-navigation">';
		wp_nav_menu( array(
			'menu' => 'meet-sub',
			'container' => '',
		) );
	echo '</div>';

	echo 'Meet Us';

	the_content();

	echo '</div>';

}
add_action( 'tha_entry_content_before', 'da_meet' );



// Build the page.
get_template_part( 'index' );
