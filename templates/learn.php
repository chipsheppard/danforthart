<?php
/**
 * The template for displaying the Learn Create page.
 *
 * Template Name: Learn Create
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'learncreate learn' ) );
} );

/**
 * Learn Create page functions
 */
function da_learn() {

	echo '<div class="inner-wrap">';

	echo '<div class="sub-navigation">';
		wp_nav_menu( array(
			'menu' => 'learn-sub',
			'container' => '',
		) );
	echo '</div>';

	echo 'LEARN CREATE';

	the_content();

	echo '</div>';

}
add_action( 'tha_entry_content_before', 'da_learn' );



// Build the page.
get_template_part( 'index' );
