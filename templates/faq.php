<?php
/**
 * The template for displaying the FAQs page.
 *
 * Template Name: FAQs
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'vis faq' ) );
} );

/**
 * Learn Create page functions
 */
function da_faq() {
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
	<div class="info-block">
		<div class="info-row">
			<div class="col-1-2 first info-l">
				<?php the_field( 'info_left', 'option' ); ?>
				<?php get_template_part( 'template-parts/openhours' ); ?>
			</div>
			<div class="col-1-2 info-r">
				<?php the_field( 'info_right', 'option' ); ?>
			</div>
			<div class="cf"></div>
		</div>
	</div>
</div>

<div class="content-wrap">

	<?php if ( have_rows( 'accordion_blocks' ) ) : ?>
	<div class="opm">
		<div class="inner-wrap">
			<div class="onpage-menu">
				<div class="opm-text">Viewing our collection:</div>

				<div class="opm-section-menu">
					<div class="opm-sections">
						<?php
						$c = 0;
						while ( have_rows( 'accordion_blocks' ) ) :
							the_row();
							$c++;
							?>
							<div class="permcat tp<?php echo esc_html( $c ); ?>"><?php the_sub_field( 'ab_title' ); ?></div>
						<?php endwhile; ?>
					</div>
					<div class="opm-menu">
						<?php
						$c = 0;
						while ( have_rows( 'accordion_blocks' ) ) :
							the_row();
							$c++;
							?>
							<a class="opm-link" href="#p<?php echo esc_html( $c ); ?>"><span><?php the_sub_field( 'ab_title' ); ?></span></a><br />
						<?php endwhile; ?>
					</div>
				</div>

				<div class="opm-arrow"><span class="cssicon-updown down"></span></div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div class="inner-wrap">

		<div class="accordion-block">
		<?php
		if ( have_rows( 'accordion_blocks' ) ) :
			$c = 0;
			while ( have_rows( 'accordion_blocks' ) ) :
				the_row();
				$c++;
				?>
				<div id="p<?php echo esc_html( $c ); ?>" class="acc-blk opm-target">
					<div class="col-1-3 first ab-left">
						<div class="ab-title">
							<h3><?php the_sub_field( 'ab_title' ); ?></h3>
						</div>
					</div>
					<div class="col-2-3 ab-right">
						<?php get_template_part( 'template-parts/accordion' ); ?>
					</div>
					<div class="cf"></div>
					<?php get_template_part( 'template-parts/v-images' ); ?>
				</div>
			<?php
			endwhile;
		endif;
		?>
		</div><!-- /accordion-block -->

		<?php get_template_part( 'template-parts/call-to-action' ); ?>

	</div><!-- /inner-wrap -->
</div><!-- /content-wrap -->


<?php
}
add_action( 'tha_entry_content_before', 'da_faq' );


// Build the page.
get_template_part( 'index' );
