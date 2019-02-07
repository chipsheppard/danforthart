<?php
/**
 * The template for displaying the Teens Art Classes page.
 *
 * Template Name: Art Classes - Teens
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'lc learn-t' ) );
} );

/**
 * Learn Create page functions
 */
function da_learn_h() {
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

	<div class="inner-wrap">

		Highschool Art Classes
		<?php the_content(); ?>
		<?php get_template_part( 'template-parts/courses' ); ?>

	</div>

<?php
}
add_action( 'tha_entry_content_before', 'da_learn_h' );



// Build the page.
get_template_part( 'index' );
