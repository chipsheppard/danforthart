<?php
/**
 * The template for displaying the homepage.
 *
 * Template Name: Homepage
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'homepage' ) );
} );

/**
 * Home Function
 */
function da_home() {
?>
	<div class="hero-wrap">
		<div class="heroslider">
			<div class="sl"><span class="progbar"></span><img src="/wp-content/uploads/2018/12/slide1.jpg" alt=""></div>
			<div class="sl"><span class="progbar"></span><img src="/wp-content/uploads/2018/12/slide2.jpg" alt=""></div>
			<div class="sl"><span class="progbar"></span><img src="/wp-content/uploads/2018/12/slide3.jpg" alt=""></div>
		</div>

		<div class="hero-callout">
			<div class="link"><a href="#">See Art</a></div>
			<div class="date">Till Mar. 17</div>
			<div class="text">Featured exhibition here lorem ipsum dolor sit amet consector.</div>
		</div>
	</div>

	<?php
	echo '<div class="inner-wrap">';

		the_content();

	echo '</div>';

}
add_action( 'tha_entry_content_before', 'da_home' );


// Build the page.
get_template_part( 'index' );
