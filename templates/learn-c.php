<?php
/**
 * The template for displaying Childrens Art Classes page.
 *
 * Template Name: Art Classes - Children
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'lc learn-c' ) );
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

	<div class="inner-wrap">
		K-8 FArt Classes

		<h1 class="page-title">
			<?php the_field( 'page_title' ); ?>
		</h1>

		<div class="tabs-wrap">
		<?php
		if ( have_rows( 'course_tabs' ) ) :
			while ( have_rows( 'course_tabs' ) ) :
				the_row();
			?>
			<div class="col-1-2 nm tab-tab">
				<h2><?php the_sub_field( 'tab_title' ); ?></h2>
				<?php the_sub_field( 'tab_text' ); ?>
			</div>

			<div class="col-1-2 nm tab-body">
				<div class="tab-intro"><?php the_sub_field( 'tab_intro' ); ?></div>
				<div class="tab-content"><?php the_sub_field( 'tab_content' ); ?></div>
				<?php if ( have_rows( 'tab_images' ) ) : ?>
				<div class="tab-images">
					<?php
					while ( have_rows( 'tab_images' ) ) :
						the_row();
						?>
						<div class="tab-image<?php if ( get_sub_field( 'column_class' ) ) : ?>
<?php
echo ' ';
the_sub_field( 'column_class' );
endif;
?>
">
							<?php
							$image = get_sub_field( 't_image' );
							if ( ! empty( $image ) ) :
								$url = $image['url'];
								$alt = $image['alt'];
								$caption = $image['caption'];
								$size = 'medium';
								$width = $image['sizes'][ $size . '-width' ];
								$height = $image['sizes'][ $size . '-height' ];
								?>
								<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
								?>
							<?php endif; ?>
						</div><!-- /tab-image -->
					<?php endwhile; ?>
				</div><!-- /tab-images -->
				<?php endif; ?>


				<div class="tab-courses-intro">
					<?php the_field( 'tab_courses-intro' ); ?>
				</div>

				<div class="col-1-2 first tab-filter">
					<?php the_field( 'tab_filter' ); ?>
					[tab filter]
				</div>

				<div class="col-1-2 tab-filter-text">
					<?php the_field( 'tab_filter_text' ); ?>
				</div>
				<div class="cf"></div>

				<?php get_template_part( 'template-parts/courses' ); ?>

			</div><!-- /tab-body -->

			<?php endwhile; ?>
		<?php endif; ?>
		</div><!-- /tabs-wrap -->

	</div><!-- /inner-wrap -->

<?php
}
add_action( 'tha_entry_content_before', 'da_learn_k' );



// Build the page.
get_template_part( 'index' );
