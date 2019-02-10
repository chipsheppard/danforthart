<?php
/**
 * The template for displaying the Current See Art.
 *
 * Template Name: SeeArt
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'seeart current' ) );
} );

/**
 * Current
 */
function da_current() {
?>
<div class="inner-wrap">
	<div class="sub-navigation">
		<?php
		wp_nav_menu( array(
			'menu' => 'see-art-sub',
		) );
		?>
	</div>
</div>

<div class="hero-wrap">
	<div class="inner-wrap np">
		<div class="heroimage">
			<?php
			// POST OBJECT.
			$fe_post_object = get_field( 'featured_exhibition' );
			// IMAGE.
			$fe_image = get_field( 'fe_image' );
			if ( ! empty( $fe_image ) ) :
				$fe_url = $fe_image['url'];
				$fe_alt = $fe_image['alt'];
				$fe_width = $fe_image['width'];
				$fe_height = $fe_image['height'];
				?>
				<img src="<?php echo esc_url( $fe_url ); ?>" alt="<?php echo esc_attr( $fe_alt ); ?>" width="<?php echo esc_attr( $fe_width ); ?>" height="<?php echo esc_attr( $fe_height ); ?>" />
			<?php
			else :
				echo get_the_post_thumbnail( $fe_post_object->ID, 'full', [
					'class' => 'featured-image',
					'title' => 'Feature image',
				] );
			endif;
			?>
		</div><!-- /hero-image -->
		<div class="hero-callout">
			<div class="link">
				<a href="<?php echo esc_url( get_permalink( $fe_post_object->ID ) ); ?>"><span><?php the_field( 'fe_link_text' ); ?></span></a>
			</div>
			<div class="date"><?php the_field( 'date', $fe_post_object->ID ); ?></div>
			<div class="text"><?php echo get_the_title( $fe_post_object->ID ); ?></div>
		</div>
	</div><!-- /inner-wrap -->
</div><!-- /hero-wrap -->


<div class="inner-wrap">
	<div class="intro">
		<?php the_content(); ?>
	</div>
</div><!-- /inner-wrap -->


<div class="content-wrap">
	<div class="inner-wrap">

		<div class="col-1-2 nm">
			<?php
			// POST OBJECT.
			$el_post_object = get_field( 'exhibit_left' );
			if ( $el_post_object ) :
			?>
			<div class="exhibit-left">
				<div class="el-text">
					<?php the_field( 'exhibit_left_text' ); ?>
				</div>
				<div class="el-image">
					<a class="progbar-trigger" href="<?php echo esc_url( get_permalink( $el_post_object->ID ) ); ?>">
					<span class="progbar big<?php if ( get_field( 'highlight_color', $el_post_object->ID ) ) : ?>
<?php
echo ' ';
the_field( 'highlight_color', $el_post_object->ID );
endif;
?>
"></span>
					<?php
					// IMAGE.
					$el_image = get_field( 'exhibit_left_image' );
					if ( ! empty( $el_image ) ) :
						$el_url = $el_image['url'];
						$el_alt = $el_image['alt'];
						$el_size = 'medium_large';
						$el_width = $el_image['sizes'][ $el_size . '-width' ];
						$el_height = $el_image['sizes'][ $el_size . '-height' ];
						?>
						<img src="<?php echo esc_url( $el_url ); ?>" alt="<?php echo esc_attr( $el_alt ); ?>" width="<?php echo esc_attr( $el_width ); ?>" height="<?php echo esc_attr( $el_height ); ?>" />
					<?php
					else :
						echo get_the_post_thumbnail( $fe_post_object->ID, 'medium_large', [
							'class' => 'featured-image',
							'title' => 'Feature image',
						] );
					endif;
					?>
					</a>
					<div class="el-callout">
						<div class="sub-title"><?php the_field( 'sub_heading', $el_post_object->ID ); ?></div>
						<div class="title"><?php echo get_the_title( $el_post_object->ID ); ?></div>
					</div>
				</div>
			</div><!-- /exhibit-left -->
			<?php endif; ?>
		</div>

		<div class="col-1-2 nm">
			<?php
			// POST OBJECT.
			$ert_post_object = get_field( 'exhibit_right_top' );
			if ( $ert_post_object ) :
			?>
			<div class="exhibit-right-top">
				<div class="ert-date"><?php the_field( 'date', $ert_post_object->ID ); ?></div>
				<div class="ert-image">
					<a class="progbar-trigger" href="<?php echo esc_url( get_permalink( $ert_post_object->ID ) ); ?>">
					<span class="progbar big<?php if ( get_field( 'highlight_color', $el_post_object->ID ) ) : ?>
<?php
echo ' ';
the_field( 'highlight_color', $ert_post_object->ID );
endif;
?>
"></span>
					<?php
					// NATIVE IMAGE.
					$ert_image = get_field( 'exhibit_rt_image' );
					if ( ! empty( $ert_image ) ) :
						$ert_url = $ert_image['url'];
						$elrtalt = $ert_image['alt'];
						$ert_size = 'medium_large';
						$ert_width = $ert_image['sizes'][ $ert_size . '-width' ];
						$ert_height = $ert_image['sizes'][ $ert_size . '-height' ];
						?>
						<img src="<?php echo esc_url( $ert_url ); ?>" alt="<?php echo esc_attr( $ert_alt ); ?>" width="<?php echo esc_attr( $ert_width ); ?>" height="<?php echo esc_attr( $ert_height ); ?>" />
						<?php
					else :
						echo get_the_post_thumbnail( $fe_post_object->ID, 'medium_large', [
							'class' => 'featured-image',
							'title' => 'Feature image',
						] );
					endif;
					?>
					</a>
					<div class="ert-callout">
						<div class="sub-title"><?php the_field( 'sub_heading', $ert_post_object->ID ); ?></div>
						<div class="title"><?php echo get_the_title( $ert_post_object->ID ); ?></div>
					</div>
				</div>
			</div><!-- /exhibit-right-top -->
			<?php endif; ?>

			<?php
			// POST OBJECT.
			$erb_post_object = get_field( 'exhibit_right_bottom' );
			if ( $erb_post_object ) :
			?>
			<div class="exhibit-right-bottom">
				<div class="erb-date"><?php the_field( 'date', $erb_post_object->ID ); ?></div>
				<div class="erb-image">
					<a class="progbar-trigger" href="<?php echo esc_url( get_permalink( $erb_post_object->ID ) ); ?>">
					<span class="progbar big<?php if ( get_field( 'highlight_color', $el_post_object->ID ) ) : ?>
<?php
echo ' ';
the_field( 'highlight_color', $erb_post_object->ID );
endif;
?>
"></span>
					<?php
					// NATIVE IMAGE.
					$erb_image = get_field( 'exhibit_rb_image' );
					if ( ! empty( $erb_image ) ) :
						$erb_url = $erb_image['url'];
						$erb_alt = $erb_image['alt'];
						$erb_size = 'medium_large';
						$erb_width = $erb_image['sizes'][ $erb_size . '-width' ];
						$erb_height = $erb_image['sizes'][ $erb_size . '-height' ];
						?>
						<img src="<?php echo esc_url( $erb_url ); ?>" alt="<?php echo esc_attr( $erb_alt ); ?>" width="<?php echo esc_attr( $erb_width ); ?>" height="<?php echo esc_attr( $erb_height ); ?>" />
					<?php
					else :
						echo get_the_post_thumbnail( $fe_post_object->ID, 'medium_large', [
							'class' => 'featured-image',
							'title' => 'Feature image',
						] );
					endif;
					?>
					</a>
					<div class="erb-callout">
						<div class="sub-title"><?php the_field( 'sub_heading', $erb_post_object->ID ); ?></div>
						<div class="title"><?php echo get_the_title( $erb_post_object->ID ); ?></div>
					</div>
				</div>
			</div><!-- /exhibit-right-bottom -->
			<?php endif; ?>
		</div>
		<div class="cf"></div>

		<?php get_template_part( 'template-parts/fullwidth-quote' ); ?>

		<div class="upcoming-top">
			<div class="col-1-2 first alt-font">
				<h3><?php the_field( 'upcoming_section_title' ); ?></h3>
			</div>
			<div class="col-1-2 view-past">
				<a href="/past/" class="btn">View Past Exhibitions</a>
			</div>
			<div class="cf"></div>
		</div>


		<div class="upcoming-exhibits">
		<?php
		if ( have_rows( 'upcoming_exhibitions' ) ) :
			while ( have_rows( 'upcoming_exhibitions' ) ) :
				the_row();
				?>
				<div class="u-exhibit<?php if ( get_sub_field( 'highlight_color' ) ) : ?>
<?php
echo ' ';
the_sub_field( 'highlight_color' );
endif;
?>
">
					<div class="ue-upper">
						<div class="col-1-4 ue-image">
							<?php
							$u_image = get_sub_field( 'image' );
							if ( ! empty( $u_image ) ) :
								$u_url = $u_image['url'];
								$u_alt = $u_image['alt'];
								$u_size = 'medium';
								$u_width = $u_image['sizes'][ $u_size . '-width' ];
								$u_height = $u_image['sizes'][ $u_size . '-height' ];
								?>
								<img src="<?php echo esc_url( $u_url ); ?>" alt="<?php echo esc_attr( $u_alt ); ?>" width="<?php echo esc_attr( $u_width ); ?>" height="<?php echo esc_attr( $u_height ); ?>" />
							<?php endif; ?>
						</div>
						<div class="col-1-2 ue-heading">
							<div class="vc-wrap">
								<?php if ( get_sub_field( 'sub_heading' ) ) : ?>
								<h4><?php the_sub_field( 'sub_heading' ); ?></h4>
								<?php endif; ?>
								<h3><?php the_sub_field( 'title' ); ?></h3>
							</div>
						</div>
						<div class="col-1-8 ue-date"><?php the_sub_field( 'date' ); ?></div>
						<div class="col-1-8 ue-button">
							<span class="cssicon-plusminus plus"></span>
						</div>
					</div>

					<div class="ue-lower extended">
						<div class="col-1-4 ue-caption">
							<?php the_sub_field( 'image_caption' ); ?>
						</div>
						<div class="col-1-2 ue-content">
							<?php the_sub_field( 'text' ); ?>
							<div class="cf"></div>
							<div class="ue-social">
								<div class="social-link"><a href="#0"><span class="iconwrap"><span class="cssicon-facebook"></span></span> <span class="link">Share It</span></a></div>
								<div class="social-link"><a href="#0"><span class="iconwrap c"><span class="cssicon-twitter"></span></span> <span class="link">Tweet It</span></a></div>
							</div>
						</div>
						<div class="cf"></div>
					</div>

				</div><!-- /u-exhibit -->
			<?php
			endwhile;
		endif;
		?>
		</div><!-- /upcoming-exhibits -->

		<?php get_template_part( 'template-parts/call-to-action' ); ?>

	</div><!-- /inner-wrap -->
</div><!-- /content-wrap -->

<?php
}
add_action( 'tha_entry_content_before', 'da_current' );

// Build the page.
get_template_part( 'index' );
