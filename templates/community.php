<?php
/**
 * The template for displaying the Community page.
 *
 * Template Name: Community
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'meetus community' ) );
} );

/**
 * Community page functions
 */
function da_community() {

	echo '<div class="inner-wrap">';

	echo '<div class="sub-navigation">';
		wp_nav_menu( array(
			'menu' => 'meet-sub',
			'container' => '',
		) );
	echo '</div>';

	echo 'FSU Community';

	the_content();

	echo '</div>';

}
add_action( 'tha_entry_content_before', 'da_community' );



// Build the page.
get_template_part( 'index' );
