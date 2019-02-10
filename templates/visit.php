<?php
/**
 * The template for displaying the Visit page.
 *
 * Template Name: Visit
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'vis visit' ) );
} );

/**
 * Visit page functions
 */
function da_visit() {
?>
<div class="inner-wrap">
	<div class="sub-navigation">
		<?php
		wp_nav_menu( array(
			'menu' => 'visit-sub',
			'container' => '',
		) );
		?>
	</div>
</div>

<div class="inner-wrap">
	<h1 class="page-title">
		<?php the_field( 'page_title' ); ?>
	</h1>
	<?php get_template_part( 'template-parts/info-block' ); ?>
</div>


<div class="content-wrap yellow">
	<div class="inner-wrap">
		<div class="detail-block">
			<div class="col-1-2 first detail-tl">
				<h3><?php the_field( 'detail_tl_head' ); ?></h3>
				<?php the_field( 'detail_tl_text' ); ?>

				<div class="accordion-wrap">
					<?php get_template_part( 'template-parts/accordion' ); ?>
				</div>

			</div>
			<div class="col-1-2 detail-tr">
				<h3><?php the_field( 'detail_tr_head' ); ?></h3>
				<?php the_field( 'detail_tr_text' ); ?>
			</div>

			<div class="col-1-2 first detail-bl">
				<h3><?php the_field( 'detail_bl_head' ); ?></h3>
				<?php the_field( 'detail_bl_text' ); ?>
			</div>
			<div class="col-1-2 detail-br">
				<h3><?php the_field( 'detail_br_head' ); ?></h3>
				<?php the_field( 'detail_br_text' ); ?>
			</div>
			<div class="cf"></div>

		</div><!-- /detail-block -->
	</div><!-- /inner-wrap -->
</div><!-- /content-wrap -->


<div class="content-wrap">
	<div class="inner-wrap">

		<div class="questions"><?php the_field( 'questions' ); ?></div>

		<div class="contact-info">
			<h3 class="ci-head"><?php the_field( 'contact_head' ); ?></h3>
			<?php
			if ( have_rows( 'contact_info' ) ) :
				while ( have_rows( 'contact_info' ) ) :
					the_row();
					?>
					<div class="col-1-3 nm ci-col">
						<h6><?php the_sub_field( 'col_head' ); ?></h6>
						<?php the_sub_field( 'col_text' ); ?>
					</div>
					<?php
				endwhile;
			endif;
			?>
			<div class="cf"></div>
		</div><!-- /contact-info -->

		<?php get_template_part( 'template-parts/quote' ); ?>
		<?php get_template_part( 'template-parts/signup' ); ?>

	</div><!-- /inner-wrap -->
</div><!-- /content-wrap -->

<?php
}
add_action( 'tha_entry_content_before', 'da_visit' );


// Build the page.
get_template_part( 'index' );
