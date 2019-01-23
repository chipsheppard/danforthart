<?php
/**
 * The template for displaying Single Exhibitions.
 *
 * @package    danforthart
 * @subpackage danforthart
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'single-exhibition seeart' ) );
} );

/**
 * Home Function
 */
function da_exhibition() {
?>
	<div class="inner-wrap">

		<div class="sub-navigation">
			<?php
			wp_nav_menu( array(
				'menu' => 'see-art-sub',
			) );
			?>
		</div>

		<div class="return">
			<a href="/see-art/"><span class="cssicon-arrow-l"></span> View All Current</a>
		</div>

		<div class="cf"></div>

		<div class="exhibition-featured-img">
			<?php
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'full' );
			endif;
			?>
		</div>

		<div class="exhibition-featured-date">
			<?php the_field( 'date' ); ?>
		</div>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="col-1-2 first ex-intro">
			<?php the_field( 'intro' ); ?>
		</div>
		<div class="col-1-2 ex-content">
			<?php the_content(); ?>
		</div>
		<div class="cf"></div>
	</div>

	<hr />

	<div class="inner-wrap">

		<div class="col-1-2 first ex-info">
			<div class="ex-gallery"><span>Gallery:</span> <?php the_field( 'gallery' ); ?></div>
			<div class="ex-date"><span>Dates:</span> <?php the_field( 'date' ); ?></div>
			<div class="ex-artists"><span>Participating artists:</span> <?php the_field( 'artist_listing' ); ?></div>
		</div>
		<div class="col-1-2 ex-social">
			<div class="social-link"><a href="#0"><span class="iconwrap"><span class="cssicon-facebook"></span></span> <span class="link">Share It</span></a></div>
			<div class="social-link"><a href="#0"><span class="iconwrap c"><span class="cssicon-twitter"></span></span> <span class="link">Tweet It</span></a></div>
		</div>
		<div class="cf"></div>
	</div>


	<div class="content-wrap">
		<div class="inner-wrap">
			<?php
			$posts = get_field( 'artworks' );
			if ( $posts ) :
				$c = 0;
				?>
				<div class="artworks">
				<?php
				global $post;
				foreach ( $posts as $post ) :
					setup_postdata( $post );
					$c++;
					?>
					<div class="artwork">
						<?php
						if ( has_post_thumbnail() ) :
							if ( get_field( 'highlight_color' ) ) :
								$color = ' ' . get_field( 'highlight_color' );
							else :
								$color = '';
							endif;
							echo '<div class="artwork-img"><a href="#' . esc_html( $c ) . '" class="modal-link" data-index="' . esc_html( $c ) . '"><span class="progbar' . esc_html( $color ) . '"></span>';
							the_post_thumbnail( 'medium', [
								'class' => 'artwork-image',
							] );
							echo '</a></div>';
						endif;
						?>
						<div class="artwork-info">
							<?php
							echo '<strong>';
							the_title();
							echo '</strong>, ';
							the_field( 'date' );
							echo ', ';
							the_field( 'medium' );
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

			<div class="quote">
				<blockquote>
					<?php the_field( 'quote' ); ?>
					<cite><?php the_field( 'quote_citation' ); ?></cite>
				</blockquote>
			</div>

		</div>

		<hr />

		<div class="inner-wrap">
			<div class="col-1-2 first more-left">
				<?php the_field( 'more_content_left' ); ?>
			</div>
			<div class="col-1-2 more-right">
				<?php the_field( 'more_content_right' ); ?>
			</div>
			<div class="cf"></div>
		</div>

		<?php get_template_part( 'template-parts/call-to-action' ); ?>

	</div>

	<?php
	get_template_part( 'template-parts/exhibit-modal' );

}
add_action( 'tha_entry_content_before', 'da_exhibition' );


// Build the page.
get_template_part( 'index' );
