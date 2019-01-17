<?php
/**
 * The template for displaying the Donations page.
 *
 * Template Name: Donations
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'joinsupport donations' ) );
} );

/**
 * Learn Create page functions
 */
function da_donations() {

	echo '<div class="inner-wrap">';

	echo '<div class="sub-navigation">';
		wp_nav_menu( array(
			'menu' => 'join-sub',
			'container' => '',
		) );
	echo '</div>';

	echo 'Donations';

	the_content();

	echo '</div>';

}
add_action( 'tha_entry_content_before', 'da_donations' );



// Build the page.
get_template_part( 'index' );
