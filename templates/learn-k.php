<?php
/**
 * The template for displaying the K-8 Art Classes page.
 *
 * Template Name: Art Classes - K-8
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'learncreate learn-k' ) );
} );

/**
 * Learn Create page functions
 */
function da_learn_k() {
	?>
		<div class="inner-wrap">
			<div class="sub-navigation">
				<?php
				wp_nav_menu( array(
					'menu' => 'learn-sub',
				) );
				?>
			</div>
		</div>

	K-8 Art Classes

	<?php the_content(); ?>

<?php
}
add_action( 'tha_entry_content_before', 'da_learn_k' );



// Build the page.
get_template_part( 'index' );
