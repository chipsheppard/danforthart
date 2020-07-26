<?php
/**
 * Entry Footer Meta functions
 *
 * @package  danforthart
 * @subpackage danforthart/inc
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'danforthart_display_entry_footer' ) ) {
	/**
	 * Get the categories and tags.
	 */
	function danforthart_display_entry_footer() {

		if ( is_single() && 'post' === get_post_type() ) :
			echo '<footer class="entry-footer inner-wrap">';

			// Hide this on pages.
			if ( 'post' === get_post_type() ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'danforthart' ) );
				if ( $categories_list ) {
					printf( '<span class="cat-links"><div class="cssicon-folder"></div>%1$s</span>', $categories_list ); // WPCS: XSS OK.
				}

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html__( ', ', 'danforthart' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links"><div class="cssicon-tag"></div>%1$s</span>', $tags_list ); // WPCS: XSS OK.
				}
			}

			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'danforthart' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			echo '</footer>';
		endif;
	}
}
add_action( 'tha_entry_bottom', 'danforthart_display_entry_footer' );
