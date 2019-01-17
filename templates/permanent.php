<?php
/**
 * The template for displaying the Permanent See Art.
 *
 * Template Name: Permanent
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'seeart permanent' ) );
} );

/**
 * Permanent
 */
function da_permanent() {

	echo '<div class="inner-wrap">';

	echo '<div class="sub-navigation">';
		wp_nav_menu( array(
			'menu' => 'see-art-sub',
		) );
	echo '</div>';

	echo 'Permanent Collection';
	the_content();

	echo '</div>';

}
add_action( 'tha_entry_content_before', 'da_permanent' );


// Build the page.
get_template_part( 'index' );
