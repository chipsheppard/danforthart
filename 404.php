<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package  danforthart
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

do_action( 'danforthart_init' );

get_header();

tha_content_before();
echo '<div id="primary" class="content-area">';
tha_content_wrap_before();
echo '<div class="inner-wrap">';
echo '<main id="main" class="site-main" role="main">';
tha_content_top();
echo '<section class="error-404 not-found">';

	echo '<header class="page-header">';
		echo '<div class="title-wrap">';
		echo '<h1 class="page-title">' . esc_html__( '404', 'danforthart' ) . '</h1>';
		echo '</div>';
	echo '</header>';

	echo '<div class="page-content">';
		echo '<div class="error-message">' . esc_html__( 'ERROR - ERROR - ERROR', 'danforthart' ) . '</div>';
		echo '<p class="error-text">' . esc_html__( 'Page not found.', 'danforthart' ) . '</p>';
		get_search_form();
	echo '</div>';

echo '</section>';
tha_content_bottom();
echo '</main>';
echo '</div>';
tha_content_wrap_after();
echo '</div>';
tha_content_after();

get_footer();
