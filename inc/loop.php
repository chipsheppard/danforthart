<?php
/**
 * The Loop
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

/**
 * Default Loop
 */
function danforthart_default_loop() {

	if ( have_posts() ) :

		tha_content_while_before();

		echo '<div class="loop-wrap">';

		while ( have_posts() ) :
			the_post();

			tha_entry_before();

			if ( is_front_page() ) :
				get_template_part( 'template-parts/content', 'home' );
			else :
				get_template_part( 'template-parts/content', get_post_format() );
			endif;
			tha_entry_after();

		endwhile;

		echo '</div>';

		tha_content_while_after();

	else :

		tha_entry_before();
		get_template_part( 'template-parts/content', 'none' );
		tha_entry_after();

	endif;
}
add_action( 'tha_content_loop', 'danforthart_default_loop' );


/**
 * Archive Page Titles
 */
function danforthart_archive_page_titles() {
	if ( is_home() && ! is_front_page() || is_archive() || is_search() ) :
		echo '<header class="page-header">';
		echo '<div class="inner-wrap title-wrap">';

		if ( is_search() ) :
			echo '<h1 class="page-title">';
			/* translators: %$2s: is the search term */
			printf( '<span>' . esc_html__( 'Search Results for:%1$s %2$s', 'danforthart' ), '</span>', get_search_query() );
			echo '</h1>';
		else :
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		endif;

		echo '</div>';
		echo '</header>';
	endif;
}
add_action( 'tha_content_while_before', 'danforthart_archive_page_titles' );


/**
 * Archive Pagination (<< 1 of 10 >>)
 */
function danforthart_postpagination() {

	if ( is_archive() || is_home() ) :
		the_posts_pagination( array(
			'mid_size' => 2,
			'prev_text' => __( '&laquo; Previous', 'danforthart' ),
			'next_text' => __( 'Next &raquo;', 'danforthart' ),
		) );
	endif;

}
add_action( 'tha_content_while_after', 'danforthart_postpagination' );


/**
 * Post Navigation (prev - next)
 */
function danforthart_postnav() {

	if ( is_single() ) :
		the_post_navigation( array(
			'prev_text' => __( '<span>previous</span> %title', 'danforthart' ),
			'next_text' => __( '<span>next</span> %title', 'danforthart' ),
		) );
	endif;

}
add_action( 'tha_entry_after', 'danforthart_postnav' );


/**
 * Post Comments
 */
function danforthart_comments() {

	if ( is_singular() && ( comments_open() || get_comments_number() ) ) {
		comments_template();
	}

}
add_action( 'tha_content_while_after', 'danforthart_comments' );
