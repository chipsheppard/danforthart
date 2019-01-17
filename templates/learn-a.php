<?php
/**
 * The template for displaying the Adult Art Classes page.
 *
 * Template Name: Art Classes - Adult
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'learncreate learn-a' ) );
} );

/**
 * Learn Create page functions
 */
function da_learn_a() {

	echo '<div class="inner-wrap">';

	echo '<div class="sub-navigation">';
		wp_nav_menu( array(
			'menu' => 'learn-sub',
			'container' => '',
		) );
	echo '</div>';

	echo 'Adult Art Classes';

	the_content();

	echo '</div>';

}
add_action( 'tha_entry_content_before', 'da_learn_a' );



// Build the page.
get_template_part( 'index' );
