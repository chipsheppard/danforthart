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

	<div class="tabs-wrap<?php if ( get_field( 'orientation' ) ) : ?>
<?php
echo ' ';
the_field( 'orientation' );
endif;
?>
">

		<div class="tab-tab tab-left"><div class="tableft-inner">
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
		</div></div>
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
			<div class="inner-wrap">
				<div class="col-1-2 first tab-intro"><?php the_field( 'tab_body_intro' ); ?></div>
				<div class="col-1-2 tab-content"><?php the_field( 'tab_body_text' ); ?></div>
				<div class="cf"></div>

				<?php get_template_part( 'template-parts/v-images' ); ?>
			</div>

	<!-- Above -->
			<div class="inner-wrap">
				<div class="tab-courses-intro">
					<?php the_field( 'above_intro' ); ?>
				</div>
		<!-- Above -->
				<div class="reg-block">
					<div class="col-2-3 first reg-text">
						<?php the_field( 'above_left' ); ?>
						&nbsp;
					</div>
					<div class="col-1-3 reg-button">
						<?php
						the_field( 'above_right' );

						$buttona = get_field( 'above_button' );
						if ( $buttona && in_array( 'disabled', $buttona, true ) ) :
							?>
							<a class="btn disabled" href="#0">Register For Classes</a>
						<?php
						elseif ( $buttona && in_array( 'display', $buttona, true ) ) :
							$link = get_field( 'registration_link', 'option' );
							if ( $link ) :
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php else : ?>
								<a class="btn disabled" href="#0">Register For Classes</a>
							<?php
							endif;
						endif;
						?>
					</div>
					<div class="cf"></div>
				</div>
			</div>

			<?php get_template_part( 'template-parts/courses' ); ?>

	<!-- Registration block -->
			<?php if ( get_field( 'below_left' ) ) : ?>
			<div class="inner-wrap reg-block">
				<div class="col-2-3 first reg-text">
					<?php the_field( 'below_left' ); ?>
				</div>
				<div class="col-1-3 below-button">
					<?php
					$buttonb = get_field( 'below_button' );
					if ( $buttonb && in_array( 'disabled', $buttonb, true ) ) :
						?>
						<a class="btn disabled" href="#0">Register For Classes</a>
					<?php
					elseif ( $buttonb && in_array( 'display', $buttonb, true ) ) :
						$link = get_field( 'registration_link', 'option' );
						if ( $link ) :
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php else : ?>
							<a class="btn disabled" href="#0">Register</a>
						<?php
						endif;
					endif;
					?>
				</div>
				<div class="cf"></div>
			</div>
			<?php endif; ?>

	<!-- Vacation Week -->
			<?php if ( get_field( 'vw_head' ) ) : ?>
			<a name="vacation-week"></a>
			<div class="vaca-week">
				<div class="inner-wrap vw-header-block">
					<h3 class="vw-head"><?php the_field( 'vw_head' ); ?></h3>
					<div class="col-1-2 first vw-left"><?php the_field( 'vw_left_col' ); ?></div>
					<div class="col-1-2 vw-right"><?php the_field( 'vw_right_col' ); ?></div>
					<div class="cf"></div>
				</div>
				<?php get_template_part( 'template-parts/courses-vaca' ); ?>
			</div>

			<div class="inner-wrap reg-block">
				<div class="col-2-3 first reg-text">
					<?php the_field( 'vw_registration_text' ); ?>
				</div>
				<div class="col-1-3 reg-button">
					<?php
					$buttonc = get_field( 'vw_button' );
					if ( $buttonc && in_array( 'disabled', $buttonc, true ) ) :
						?>
						<a class="btn disabled" href="#0">Register For Classes</a>
					<?php
					elseif ( $buttonc && in_array( 'display', $buttonc, true ) ) :
						$vw_link = get_field( 'registration_link', 'option' );
						if ( $vw_link ) :
							$vw_link_url = $vw_link['url'];
							$vw_link_title = $vw_link['title'];
							$vw_link_target = $vw_link['target'] ? $vw_link['target'] : '_self';
							?>
							<a class="btn" href="<?php echo esc_url( $vw_link_url ); ?>" target="<?php echo esc_attr( $vw_link_target ); ?>"><?php echo esc_html( $vw_link_title ); ?></a>
						<?php else : ?>
							<a class="btn disabled" href="#0">Register</a>
						<?php
						endif;
					endif;
					?>
				</div>
				<div class="cf"></div>
			</div>
			<?php endif; ?>

			<div class="inner-wrap">
				<?php get_template_part( 'template-parts/v-images2' ); ?>
			</div>

			<?php if ( get_field( 'ab_title' ) ) : ?>
			<div class="inner-wrap">
				<?php get_template_part( 'template-parts/accordion-block' ); ?>
			</div>
			<?php endif; ?>

		</div>
	</div>

</div>

<?php get_template_part( 'template-parts/quote' ); ?>
<?php get_template_part( 'template-parts/signup' ); ?>


<?php
}
add_action( 'tha_entry_content_before', 'da_learn_c' );

// Build the page.
get_template_part( 'index' );
