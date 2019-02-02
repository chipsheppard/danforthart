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

	Adult Art Classes

	<?php the_content(); ?>

<?php
}
add_action( 'tha_entry_content_before', 'da_learn_a' );



// Build the page.
get_template_part( 'index' );
