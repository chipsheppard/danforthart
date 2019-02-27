<?php
/**
 * The template for displaying the Events Calendar page.
 *
 * Template Name: Events Calendar
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'vis calendar' ) );
} );

/**
 * Learn Create page functions
 */
function da_calendar() {
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

<div class="hero-wrap">
	<div class="inner-wrap np">
		<div class="heroimage">
			<?php
			$post_object = get_field( 'featured_event' );
			if ( $post_object ) :
				// override $post.
				$post = $post_object;
				setup_postdata( $post );

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
					echo get_the_post_thumbnail( $post_object->ID, 'full', [
						'class' => 'featured-image',
						'title' => 'Feature image',
					] );
				endif;
			endif;
			wp_reset_postdata();
			?>
		</div>
		<div class="hero-callout">
			<div class="link">
				<a href="<?php echo esc_url( get_permalink( $post_object->ID ) ); ?>"><span><?php the_field( 'fe_link_text' ); ?></span></a>
			</div>
			<div class="date"><?php the_field( 'e_date', $post_object->ID ); ?></div>
			<div class="text"><?php echo get_the_title( $post_object->ID ); ?></div>
		</div>
	</div>
</div><!-- /hero-wrap -->

<div class="inner-wrap">
	<h1 class="page-title">
		<?php the_field( 'page_title' ); ?>
	</h1>
</div>

<div class="content-wrap">
	<div class="inner-wrap mnp">

		<?php
		// EVENTS - - - - - - - - - - - - - - - - - - - -.
		if ( have_rows( 'events' ) ) :
		?>

		<div class="events">
		<?php
		while ( have_rows( 'events' ) ) :
			the_row();
			$e_post_object = get_sub_field( 'event' );
			if ( $e_post_object ) :
				// override $post.
				$post = $e_post_object;
				setup_postdata( $post );
				?>
				<div class="event">
					<a href="<?php echo esc_url( get_permalink( $e_post_object->ID ) ); ?>">
						<div class="e-upper">
							<div class="col-1-4 e-image">
								<?php
								$e_image = get_sub_field( 'e_image' );
								if ( ! empty( $e_image ) ) :
									$alt = $e_image['alt'];
									$size = 'medium';
									$width = $e_image['sizes'][ $size . '-width' ];
									$height = $e_image['sizes'][ $size . '-height' ];
									$url = $e_image['sizes'][ $size ];
									?>
									<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
								<?php
								else :
									echo get_the_post_thumbnail( $e_post_object->ID, 'medium', [
										'class' => 'featured-image',
										'title' => 'Feature image',
									] );
								endif;
								?>
							</div>
							<div class="col-5-12 e-heading">
								<div class="vc-wrap">
									<h3><?php echo get_the_title( $e_post_object->ID ); ?></h3>
								</div>
							</div>
							<div class="col-1-6 e-date"><?php the_field( 'e_date', $e_post_object->ID ); ?></div>
							<div class="col-1-6 e-button">
								<span class="cssicon-arrow-r"></span>
							</div>
						</div>
					</a>
				</div><!-- /event -->
				<?php
			endif;
			wp_reset_postdata();
		endwhile;
		endif;
		?>
		</div><!-- /events -->

		<?php
		// EXTENDED EVENTS - - - - - - - - - - - - - - - - - - - -.
		if ( have_rows( 'x_events' ) ) :
		?>

		<div class="x-events">
		<?php
		while ( have_rows( 'x_events' ) ) :
			the_row();
			$x_post_object = get_sub_field( 'x_event' );
			if ( $x_post_object ) :
				// override $post.
				$post = $x_post_object;
				setup_postdata( $post );
				?>
				<div class="event">
					<div class="e-upper">
						<div class="col-1-4 e-image">
							<?php
							$xe_image = get_sub_field( 'xe_image' );
							if ( ! empty( $xe_image ) ) :
								$alt = $xe_image['alt'];
								$size = 'medium';
								$width = $xe_mage['sizes'][ $size . '-width' ];
								$height = $xe_image['sizes'][ $size . '-height' ];
								$url = $xe_image['sizes'][ $size ];
								?>
								<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
							<?php
							else :
								echo get_the_post_thumbnail( $x_post_object->ID, 'medium', [
									'class' => 'featured-image',
									'title' => 'Feature image',
								] );
							endif;
							?>
						</div>
						<div class="col-5-12 e-heading">
							<div class="vc-wrap">
								<h3><?php echo get_the_title( $x_post_object->ID ); ?></h3>
							</div>
						</div>
						<div class="col-1-6 e-date"><?php the_field( 'e_date', $x_post_object->ID ); ?></div>
						<div class="col-1-6 e-button">
							<a href="<?php echo esc_url( get_permalink( $x_post_object->ID ) ); ?>"><span class="cssicon-arrow-r"></span></a>
						</div>
					</div>
				</div><!-- /event -->
				<?php
			endif;
			wp_reset_postdata();
		endwhile;
		endif;
		?>
		</div><!-- /x-events -->
	</div><!-- /inner-wrap -->

	<div class="inner-wrap">
		<div class="viewmore-events">
			<div class="viewmore">View more events <span class="cssicon-plusminus small plus"></span></div>
		</div>

		<?php get_template_part( 'template-parts/quote' ); ?>
		<?php get_template_part( 'template-parts/signup' ); ?>

	</div><!-- /inner-wrap -->
</div><!-- /content-wrap -->

<?php
}
add_action( 'tha_entry_content_before', 'da_calendar' );


// Build the page.
get_template_part( 'index' );
