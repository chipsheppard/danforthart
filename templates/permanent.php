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

	// Child page menu.
	echo '<div class="sub-navigation">';
	wp_nav_menu( array(
		'menu' => 'see-art-sub',
	) );
	echo '</div>';
	?>

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
		<h1 class="page-title"><?php the_field( 'page_title' ); ?></h1>

		<div class="col-1-2 first ex-intro">
			<?php the_field( 'intro' ); ?>
		</div>
		<div class="col-1-2 ex-content">
			<?php the_content(); ?>
		</div>
		<div class="cf"></div>
	</div>


	<div class="content-wrap">
		<div class="inner-wrap">

			<?php
			if ( have_rows( 'collection_blocks' ) ) :
				$c = 0;
				?>
				<div class="opm">
					<div class="onpage-menu">
					<?php
					while ( have_rows( 'collection_blocks' ) ) :
						the_row();
						$c++;
						?>
						<a class="opm-link" href="#p<?php echo esc_html( $c ); ?>"><?php the_sub_field( 'block_title' ); ?></a><br />
					<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>



			<div class="perma-wrap">


				<?php
				$posts = get_field( 'artworks' );
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
								echo '<div class="artwork-img progbar-trigger"><a href="#' . the_permalink() . '"><span class="progbar' . esc_html( $color ) . '"></span>';
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
					</div>
					<?php
					wp_reset_postdata();
				endif;
				?>
			</div><!-- /perma-wrap -->




			<div id="p1" class="opm-target perm-cat">
				<p style="padding:200px 0;"></p>
				[query - Figuration in American Art ]
			</div>

			<hr />
			<div id="p2" class="opm-target perm-cat">
				<p style="padding:200px 0;"></p>
				[query - New England Academic Traditions]
			</div>

			<hr />
			<div id="p3" class="opm-target perm-cat">
				<p style="padding:200px 0;"></p>
				[query - Painting in Boston]
			</div>

			<hr />
			<div id="p4" class="opm-target perm-cat">
				<p style="padding:200px 0;"></p>
				[query - Contemporary, Regional Art]
			</div>

			<hr />


[Quote Block]
[SignUp Block]

		</div>
	</div>

<?php
}
add_action( 'tha_entry_content_before', 'da_permanent' );


// Build the page.
get_template_part( 'index' );
