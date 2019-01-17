<?php
/**
 * The template for displaying Single Events.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'single-event' ) );
} );

/**
 * Home Function
 */
function da_event() {

	echo 'Single Event';

	the_content();

}
add_action( 'tha_entry_content_before', 'da_event' );


// Build the page.
get_template_part( 'index' );
