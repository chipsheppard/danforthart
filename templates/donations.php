<?php
/**
 * The template for displaying the Donations page.
 *
 * Template Name: Donations
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'joinsupport donations' ) );
} );

/**
 * Learn Create page functions
 */
function da_donations() {
?>
<div class="inner-wrap">
	<div class="sub-navigation">
		<?php
		wp_nav_menu( array(
			'menu' => 'join-sub',
			'container' => '',
		) );
		?>
	</div>
</div>

<div class="inner-wrap">
	<h1 class="page-title">
		<?php the_field( 'page_title' ); ?>
	</h1>
</div>

<div class="content-wrap">
	<div class="inner-wrap">

		<?php the_content(); ?>

		<?php get_template_part( 'template-parts/quote' ); ?>
		<?php get_template_part( 'template-parts/signup' ); ?>

	</div><!-- /inner-wrap -->
</div><!-- /content-wrap -->

<?php
}
add_action( 'tha_entry_content_before', 'da_donations' );



// Build the page.
get_template_part( 'index' );
