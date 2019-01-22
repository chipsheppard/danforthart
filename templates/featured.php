<?php
/**
 * The template for displaying the Special See Art.
 *
 * Template Name: Featured Exhibit
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'seeart featured' ) );
} );

/**
 * Special
 */
function da_featured() {

	echo '<div class="inner-wrap">';

		echo '<div class="sub-navigation">';
			wp_nav_menu( array(
				'menu' => 'see-art-sub',
				'container' => '',
			) );
		echo '</div>';

		echo 'Featured Collection';
		the_content();

	echo '</div>';

}
add_action( 'tha_entry_content_before', 'da_featured' );


// Build the page.
get_template_part( 'index' );
