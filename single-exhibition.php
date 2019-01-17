<?php
/**
 * The template for displaying Single Exhibitions.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'single-exhibition' ) );
} );

/**
 * Home Function
 */
function da_exhibition() {

	echo 'Single Exhibition';

	the_content();

}
add_action( 'tha_entry_content_before', 'da_exhibition' );


// Build the page.
get_template_part( 'index' );
