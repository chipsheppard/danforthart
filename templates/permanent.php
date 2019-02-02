<?php
/**
 * The template for displaying the Permanent See Art.
 *
 * Template Name: Permanent
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'seeart permanent' ) );
} );

/**
 * Permanent
 */
function da_permanent() {
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
					<a href="<?php echo esc_url( get_permalink( $fe_post_object->ID ) ); ?>"><span><?php the_field( 'link_text' ); ?></span></a>
				</div>
				<div class="date"><?php the_field( 'date', $fe_post_object->ID ); ?></div>
				<div class="text"><?php echo get_the_title( $fe_post_object->ID ); ?></div>
			</div>
		</div><!-- /inner-wrap -->
	</div><!-- /hero-wrap -->


	<div class="inner-wrap">
		<h1 class="ex-page-title">
			<?php the_field( 'page_title' ); ?>
		</h1>

		<div class="col-1-2 first ex-intro">
			<?php the_field( 'intro' ); ?>
		</div>
		<div class="col-1-2 ex-content">
			<?php the_content(); ?>
		</div>
		<div class="cf"></div>
	</div>


	<div class="content-wrap">

	<?php
	if ( have_rows( 'collection_blocks' ) ) :
		?>
		<div class="opm">
			<div class="inner-wrap">
				<div class="onpage-menu">
					<div class="opm-text">Viewing our collection:</div>

					<div class="opm-section-menu">
						<div class="opm-sections">
							<?php
							$c = 0;
							while ( have_rows( 'collection_blocks' ) ) :
								the_row();
								$c++;
								?>
								<div class="current tp<?php echo esc_html( $c ); ?>"><?php the_sub_field( 'block_title' ); ?></div>
							<?php endwhile; ?>
						</div>
						<div class="opm-menu">
							<?php
							$c = 0;
							while ( have_rows( 'collection_blocks' ) ) :
								the_row();
								$c++;
								?>
								<a class="opm-link" href="#p<?php echo esc_html( $c ); ?>"><span><?php the_sub_field( 'block_title' ); ?></span></a><br />
							<?php endwhile; ?>
						</div>
					</div>

					<div class="opm-arrow"><span class="cssicon-updown down"></span></div>
				</div>
			</div>
		</div>

	<?php endif; ?>

		<div class="inner-wrap">
			<div class="perma-wrap">
			<?php
			if ( have_rows( 'collection_blocks' ) ) :
				$c = 0;
				while ( have_rows( 'collection_blocks' ) ) :
					the_row();
					$c++;
					?>
					<div id="p<?php echo esc_html( $c ); ?>" class="perma-cat opm-target">

						<div class="col-1-2 perma-cat-title">
							<h2><?php the_sub_field( 'block_title' ); ?></h2>
						</div>

						<?php
						// ACF Relationship fields.
						$posts = get_sub_field( 'featured_artwork' );
						if ( $posts ) :
							?>
							<div class="featured-artwork">
								<?php
								global $post;
								foreach ( $posts as $post ) :
									setup_postdata( $post );
									?>
									<div class="artwork">
										<div class="col-1-2 first fa-left">
											<?php
											if ( has_post_thumbnail() ) :
												if ( get_field( 'highlight_color' ) ) :
													$color = ' ' . get_field( 'highlight_color' );
												else :
													$color = '';
												endif;
												echo '<div class="artwork-img progbar-trigger"><a href="' . esc_url( get_the_permalink() ) . '"><span class="progbar' . esc_html( $color ) . '"></span>';
												the_post_thumbnail( 'medium_large', [
													'class' => 'artwork-image',
												] );
												echo '</a></div>';
											endif;
											?>
											<div class="artwork-info">
												<?php
												echo '<strong>';
												the_field( 'artist_name' );
												echo '</strong>, ';
												the_title();
												?>
											</div>
										</div>
										<div class="col-1-2 fa-right">
											<?php the_content(); ?>
											<hr />
											<?php the_field( 'more_left' ); ?>
										</div>
									</div>
								<?php endforeach; ?>
								<div class="cf"></div>
							</div><!-- /featured-artwork -->
							<div class="cf"></div>
							<?php
							wp_reset_postdata();
						endif;
						?>


						<?php
						// ACF Relationship fields.
						$posts = get_sub_field( 'artworks' );
						if ( $posts ) :
							?>
							<div class="artworks">
								<?php
								global $post;
								foreach ( $posts as $post ) :
									setup_postdata( $post );
									?>
									<div class="artwork">
										<?php
										if ( has_post_thumbnail() ) :
											if ( get_field( 'highlight_color' ) ) :
												$color = ' ' . get_field( 'highlight_color' );
											else :
												$color = '';
											endif;
											echo '<div class="artwork-img progbar-trigger"><a href="' . esc_url( get_the_permalink() ) . '"><span class="progbar' . esc_html( $color ) . '"></span>';
											the_post_thumbnail( 'medium', [
												'class' => 'artwork-image',
											] );
											echo '</a></div>';
										endif;
										?>
										<div class="artwork-info">
											<?php
											echo '<strong>';
											the_field( 'artist_name' );
											echo '</strong>, ';
											the_title();
											?>
										</div>
									</div>
								<?php endforeach; ?>
								<div class="cf"></div>
							</div><!-- /relationship fields -->
							<?php
							wp_reset_postdata();
						endif;
						?>
					</div><!-- /perma-cat -->

				<?php
				endwhile;
			endif;
			?>
			</div><!-- /perma-wrap -->

			<?php get_template_part( 'template-parts/quote' ); ?>
			<?php get_template_part( 'template-parts/signup' ); ?>

		</div>
	</div>

<?php
}
add_action( 'tha_entry_content_before', 'da_permanent' );


// Build the page.
get_template_part( 'index' );
