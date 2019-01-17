<?php
/**
 * The template for displaying the Membership Opps page.
 *
 * Template Name: Membership
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'joinsupport membership' ) );
} );

/**
 * Learn Create page functions
 */
function da_membership() {

	echo '<div class="inner-wrap">';

	echo '<div class="sub-navigation">';
		wp_nav_menu( array(
			'menu' => 'join-sub',
			'container' => '',
		) );
	echo '</div>';

	echo 'Membership Opportunities';

	the_content();

	echo '</div>';

}
add_action( 'tha_entry_content_before', 'da_membership' );



// Build the page.
get_template_part( 'index' );
