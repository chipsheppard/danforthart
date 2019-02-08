<?php
/**
 * The template for displaying Childrens Art Classes page.
 *
 * Template Name: Learn+Create - Course Page
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

/**
 * Get the body class from the custom field
 *
 * @param ARRAY $classes the bosy classes.
 */
function add_slug_body_class( $classes ) {
	$classes[] = 'learn-c';
	$term = get_field( 'course_group' );
	if ( $term ) {
		$classes[] = $term->slug;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

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
	<h1 class="page-title"><?php the_field( 'page_title' ); ?></h1>
</div>

<div class="content-wrap">
	<div class="inner-wrap">

		<div class="tabs-wrap">
		<?php
		if ( have_rows( 'course_tabs' ) ) :
			$t = 0;
			while ( have_rows( 'course_tabs' ) ) :
				the_row();
				$t++;
				if ( 1 === $t ) :
					$tab = ' active';
				else :
					$tab = null;
				endif;
			?>
			<div class="col-1-2 nm tab-tab tt<?php echo esc_html( $t ); ?><?php echo esc_html( $tab ); ?>">
				<h2><span><?php the_sub_field( 'tab_title' ); ?></span></h2>
				<?php the_sub_field( 'tab_text' ); ?>
			</div>
			<?php
			endwhile;
		endif;
		?>
		<div class="cf"></div>
		<?php
		if ( have_rows( 'course_tabs' ) ) :
			$b = 0;
			while ( have_rows( 'course_tabs' ) ) :
				the_row();
				$b++;
				if ( 1 === $b ) :
					$bdy = ' active';
				else :
					$bdy = null;
				endif;
			?>
			<div class="tab-body tb<?php echo esc_html( $b ); ?><?php echo esc_html( $bdy ); ?>">
				<div class="col-1-2 first tab-intro"><?php the_sub_field( 'tab_body_intro' ); ?></div>
				<div class="col-1-2 tab-content"><?php the_sub_field( 'tab_body_text' ); ?></div>
				<div class="cf"></div>
				<?php if ( have_rows( 'tab_images' ) ) : ?>
				<div class="tab-images">
					<?php
					// Get a total so we can style the images.
					$rc = 0;
					while ( have_rows( 'tab_images' ) ) :
						$rc++;
						the_row();
					endwhile;

					// tagging each image with the total.
					while ( have_rows( 'tab_images' ) ) :
						the_row();
						?>
						<div class="tab-image img-<?php echo esc_html( $rc ); ?>">
							<?php
							$image = get_sub_field( 'tab_image' );
							if ( ! empty( $image ) ) :
								$url = $image['url'];
								$alt = $image['alt'];
								$caption = $image['caption'];
								$size = 'medium';
								$width = $image['sizes'][ $size . '-width' ];
								$height = $image['sizes'][ $size . '-height' ];
								?>
								<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
							<?php endif; ?>
						</div><!-- /tab-image -->
					<?php endwhile; ?>
				<br clear="all">
				</div><!-- /tab-images -->
				<?php endif; ?>


				<div class="tab-courses-intro">
					<?php the_sub_field( 'courses_intro' ); ?>
				</div>

				<div class="col-1-2 first tab-filter">
					<?php the_sub_field( 'course_filter' ); ?>
				</div>

				<div class="col-1-2 tab-filter-text">
					<?php the_sub_field( 'course_filter_text' ); ?>
				</div>
				<div class="cf"></div>

				<?php get_template_part( 'template-parts/courses' ); ?>

			</div><!-- /tab-body -->

			<?php endwhile; ?>
		<?php endif; ?>
		</div><!-- /tabs-wrap -->

		<?php get_template_part( 'template-parts/course-accordion' ); ?>
		<?php get_template_part( 'template-parts/quote' ); ?>
		<?php get_template_part( 'template-parts/signup' ); ?>

	</div><!-- /inner-wrap -->
</div><!-- /content-wrap -->

<?php
}
add_action( 'tha_entry_content_before', 'da_learn_k' );



// Build the page.
get_template_part( 'index' );
