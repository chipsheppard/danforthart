<?php
/**
 * The template for displaying Childrens Art Classes page.
 *
 * Template Name: Learn+Create - Courses
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
	$term = get_field( 'c_level' );
	if ( $term ) {
		$classes[] = $term->slug;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

/**
 * Learn+Create course page functions
 */
function da_learn_c() {
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

		<div class="tabs-wrap<?php if ( get_field( 'orientation' ) ) : ?>
<?php
echo ' ';
the_field( 'orientation' );
endif;
?>
">

			<div class="tab-tab tab-left">
				<?php
				$l_link = get_field( 'tab_left_link' );
				if ( $l_link ) :
					$l_link_url = $l_link['url'];
				?>
				<a href="<?php echo esc_url( $l_link_url ); ?>">
				<?php endif; ?>
				<h2><span><?php the_field( 'tab_left_title' ); ?></span></h2>
				<?php the_field( 'tab_left_text' ); ?>
				<?php if ( $l_link ) : ?>
				</a>
				<?php endif; ?>
			</div>
			<div class="tab-tab tab-right">
				<?php
				$r_link = get_field( 'tab_right_link' );
				if ( $r_link ) :
					$r_link_url = $r_link['url'];
				?>
				<a href="<?php echo esc_url( $r_link_url ); ?>">
				<?php endif; ?>
				<h2><span><?php the_field( 'tab_right_title' ); ?></span></h2>
				<?php the_field( 'tab_right_text' ); ?>
				<?php if ( $r_link ) : ?>
				</a>
				<?php endif; ?>
			</div>
			<div class="cf"></div>

			<div class="tab-body">
				<div class="col-1-2 first tab-intro"><?php the_field( 'tab_body_intro' ); ?></div>
				<div class="col-1-2 tab-content"><?php the_field( 'tab_body_text' ); ?></div>
				<div class="cf"></div>

				<?php get_template_part( 'template-parts/v-images' ); ?>

				<div class="tab-courses-intro">
					<?php the_field( 'courses_intro' ); ?>
				</div>

				<div class="col-1-2 first tab-filter">
					<?php
					if ( get_field( 'course_filter' ) ) :
						the_field( 'course_filter' );
					else :
						echo '<span id="fb1"></span>';
					endif;
					?>
				</div>

				<div class="col-1-2 tab-filter-text">
					<?php the_field( 'course_filter_text' ); ?>
				</div>
				<div class="cf"></div>

				<?php get_template_part( 'template-parts/courses' ); ?>

				<div class="cf"></div>

				<?php if ( get_field( 'vw_head' ) ) : ?>
					<a name="vacation-week"></a>
					<div class="vaca-week">
						<div class="vw-header-block">
							<h3 class="vw-head"><?php the_field( 'vw_head' ); ?></h3>
							<div class="col-1-2 first vw-left"><?php the_field( 'vw_left_col' ); ?></div>
							<div class="col-1-2 vw-right"><?php the_field( 'vw_right_col' ); ?></div>
							<div class="cf"></div>
						</div>
						<?php get_template_part( 'template-parts/courses-vaca' ); ?>
					</div>
				<?php endif; ?>

			</div><!-- /tab-body -->
		</div><!-- /tabs-wrap -->

		<?php get_template_part( 'template-parts/accordion-block' ); ?>

	</div><!-- /inner-wrap -->
</div><!-- /content-wrap -->

<?php get_template_part( 'template-parts/quote' ); ?>
<?php get_template_part( 'template-parts/signup' ); ?>


<?php
}
add_action( 'tha_entry_content_before', 'da_learn_c' );

// Build the page.
get_template_part( 'index' );
