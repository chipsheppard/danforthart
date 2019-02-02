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

	LEARN CREATE

	<?php the_content(); ?>

<?php
}
add_action( 'tha_entry_content_before', 'da_learn' );



// Build the page.
get_template_part( 'index' );
