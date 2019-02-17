<?php
/**
 * The template for displaying the Past See Art.
 *
 * Template Name: Past
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'seeart past' ) );
} );

/**
 * Past
 */
function da_past() {
?>
	<div class="inner-wrap">
		<div class="sub-navigation">
			<?php
			wp_nav_menu( array(
				'menu' => 'see-art-sub',
				'container' => '',
			) );
			?>
		</div>

		<div class="intro">
			<?php the_content(); ?>
		</div>
	</div><!-- /inner-wrap -->


	<div class="content-wrap">
		<div class="inner-wrap">

			<div class="col-1-2 nm">
				<?php
				// POST OBJECT.
				$el_post_object = get_field( 'pel_object' );
				if ( $el_post_object ) :
				?>
				<div class="exhibit-left">
					<div class="el-date"><?php the_field( 'date', $el_post_object->ID ); ?></div>
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
						$el_image = get_field( 'pel_image' );
						if ( ! empty( $el_image ) ) :
							$el_alt = $el_image['alt'];
							$el_size = 'medium_large';
							$el_width = $el_image['sizes'][ $el_size . '-width' ];
							$el_height = $el_image['sizes'][ $el_size . '-height' ];
							$el_url = $el_image['sizes'][ $el_size ];
							?>
							<img src="<?php echo esc_url( $el_url ); ?>" alt="<?php echo esc_attr( $el_alt ); ?>" width="<?php echo esc_attr( $el_width ); ?>" height="<?php echo esc_attr( $el_height ); ?>" />
						<?php
						else :
							echo get_the_post_thumbnail( $el_post_object->ID, 'medium_large', [
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
				$ert_post_object = get_field( 'pert_object' );
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
						$ert_image = get_field( 'pert_image' );
						if ( ! empty( $ert_image ) ) :
							$elrtalt = $ert_image['alt'];
							$ert_size = 'medium_large';
							$ert_width = $ert_image['sizes'][ $ert_size . '-width' ];
							$ert_height = $ert_image['sizes'][ $ert_size . '-height' ];
							$ert_url = $ert_image['sizes'][ $ert_size ];
							?>
							<img src="<?php echo esc_url( $ert_url ); ?>" alt="<?php echo esc_attr( $ert_alt ); ?>" width="<?php echo esc_attr( $ert_width ); ?>" height="<?php echo esc_attr( $ert_height ); ?>" />
							<?php
						else :
							echo get_the_post_thumbnail( $ert_post_object->ID, 'medium_large', [
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
				$erb_post_object = get_field( 'perb_object' );
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
						$erb_image = get_field( 'perb_image' );
						if ( ! empty( $erb_image ) ) :
							$erb_alt = $erb_image['alt'];
							$erb_width = $erb_image['width'];
							$erb_height = $erb_image['height'];
							$erb_size = 'medium_large';
							$erb_width = $erb_image['sizes'][ $erb_size . '-width' ];
							$erb_height = $erb_image['sizes'][ $erb_size . '-height' ];
							$erb_url = $erb_image['sizes'][ $erb_size ];
							?>
							<img src="<?php echo esc_url( $erb_url ); ?>" alt="<?php echo esc_attr( $erb_alt ); ?>" width="<?php echo esc_attr( $erb_width ); ?>" height="<?php echo esc_attr( $erb_height ); ?>" />
						<?php
						else :
							echo get_the_post_thumbnail( $erb_post_object->ID, 'medium_large', [
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


			<div class="past-top">
				<div class="col-1-2 first alt-font">
					<h3><?php the_field( 'section_title' ); ?></h3>
				</div>
				<div class="col-1-2 view-past">
					<a href="/see-art/" class="btn">View Current</a>
				</div>
				<div class="cf"></div>
			</div>


			<div class="past-exhibits">
			<?php
			if ( have_rows( 'past_exhibitions' ) ) :
				while ( have_rows( 'past_exhibitions' ) ) :
					the_row();
					// POST OBJECT.
					$post_object = get_sub_field( 'pe_object' );
					if ( $post_object ) :
					?>
					<div class="p-exhibit<?php if ( get_field( 'highlight_color', $post_object->ID ) ) : ?>
<?php
echo ' ';
the_field( 'highlight_color', $post_object->ID );
endif;
?>
">
						<div class="pe-upper">
							<div class="col-1-4 pe-image">
							<a href="<?php echo esc_url( get_permalink( $post_object->ID ) ); ?>">
								<?php
								$p_image = get_sub_field( 'pe_image' );
								if ( ! empty( $p_image ) ) :
									$alt = $p_image['alt'];
									$size = 'medium';
									$width = $p_mage['sizes'][ $size . '-width' ];
									$height = $p_image['sizes'][ $size . '-height' ];
									$url = $p_image['sizes'][ $size ];
									?>
									<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
								<?php
								else :
									echo get_the_post_thumbnail( $post_object->ID, 'medium', [
										'class' => 'featured-image',
										'title' => 'Feature image',
									] );
								endif;
								?>
							</a>
							</div>
							<div class="col-1-2 pe-heading">
								<div class="vc-wrap">
									<?php if ( get_field( 'sub_heading', $post_object->ID ) ) : ?>
									<h4><?php the_field( 'sub_heading', $post_object->ID ); ?></h4>
									<?php endif; ?>
									<h3><?php echo get_the_title( $post_object->ID ); ?></h3>
								</div>
							</div>
							<div class="col-1-8 pe-date"><?php the_field( 'date', $post_object->ID ); ?></div>
							<div class="col-1-8 pe-button">
								<a href="<?php echo esc_url( get_permalink( $post_object->ID ) ); ?>"><span class="cssicon-arrow-r"></span></a>
							</div>
						</div>
					</div><!-- /p-exhibit -->
					<?php
					endif;
				endwhile;
			endif;
			?>
			</div><!-- /past-exhibits -->





			<?php
			// EXTENDED EXHIBITIONS - - - - - - - - - - - - - - - - - - - -.
			if ( have_rows( 'x_past_exhibitions' ) ) :
			?>

			<div class="viewmore-past">
				<div class="viewmore">View more past exhibits <span class="cssicon-plusminus small plus"></span></div>
			</div>

			<div class="x-past-exhibits">
				<?php
				while ( have_rows( 'x_past_exhibitions' ) ) :
					the_row();
					// POST OBJECT.
					$post_object = get_sub_field( 'xpe_object' );
					if ( $post_object ) :
					?>
					<div class="p-exhibit<?php if ( get_field( 'highlight_color', $post_object->ID ) ) : ?>
<?php
echo ' ';
the_field( 'highlight_color', $post_object->ID );
endif;
?>
">
						<div class="pe-upper">
							<div class="col-1-4 pe-image">
							<a href="<?php echo esc_url( get_permalink( $post_object->ID ) ); ?>">
								<?php
								$xp_image = get_sub_field( 'xpe_image' );
								if ( ! empty( $xp_image ) ) :
									$alt = $xp_image['alt'];
									$size = 'medium';
									$width = $xp_mage['sizes'][ $size . '-width' ];
									$height = $xp_image['sizes'][ $size . '-height' ];
									$url = $xp_image['sizes'][ $size ];
									?>
									<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
								<?php
								else :
									echo get_the_post_thumbnail( $post_object->ID, 'medium', [
										'class' => 'featured-image',
										'title' => 'Feature image',
									] );
								endif;
								?>
							</a>
							</div>
							<div class="col-1-2 pe-heading">
								<div class="vc-wrap">
									<?php if ( get_field( 'sub_heading', $post_object->ID ) ) : ?>
									<h4><?php the_field( 'sub_heading', $post_object->ID ); ?></h4>
									<?php endif; ?>
									<h3><?php echo get_the_title( $post_object->ID ); ?></h3>
								</div>
							</div>
							<div class="col-1-8 pe-date"><?php the_field( 'date', $post_object->ID ); ?></div>
							<div class="col-1-8 pe-button">
								<a href="<?php echo esc_url( get_permalink( $post_object->ID ) ); ?>"><span class="cssicon-arrow-r"></span></a>
							</div>
						</div>
					</div><!-- /p-exhibit -->
					<?php
					endif;
				endwhile;
			endif;
			?>
			</div><!-- /past-exhibits -->

			<?php get_template_part( 'template-parts/call-to-action' ); ?>

		</div><!-- /inner-wrap -->
	</div><!-- /content-wrap -->

<?php
}
add_action( 'tha_entry_content_before', 'da_past' );


// Build the page.
get_template_part( 'index' );
