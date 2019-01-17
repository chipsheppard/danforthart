<?php
/**
 * The template for displaying the Join + Support page.
 *
 * Template Name: Join+Support
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'joinsupport join' ) );
} );

/**
 * Learn Create page functions
 */
function da_join() {

	echo '<div class="inner-wrap">';

	echo '<div class="sub-navigation">';
		wp_nav_menu( array(
			'menu' => 'join-sub',
			'container' => '',
		) );
	echo '</div>';

	echo 'Join + Support';

	the_content();

	echo '</div>';

}
add_action( 'tha_entry_content_before', 'da_join' );



// Build the page.
get_template_part( 'index' );
