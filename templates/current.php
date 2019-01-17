<?php
/**
 * The template for displaying the Current See Art.
 *
 * Template Name: Current
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'seeart current' ) );
} );

/**
 * Current
 */
function da_current() {

	echo '<div class="inner-wrap">';

		// Child page menu.
		echo '<div class="sub-navigation">';
			wp_nav_menu( array(
				'menu' => 'see-art-sub',
				'container' => '',
			) );
		echo '</div>';

	echo 'CURRENT';
	the_content();

	echo '</div>';

}
add_action( 'tha_entry_content_before', 'da_current' );


// Build the page.
get_template_part( 'index' );
