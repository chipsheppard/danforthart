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
	if ( has_term( 'special-collection' ,'exhibition_type' ) ) {
		$classes[] = 'special-collection';
	}
	$classes[] = 'seeart';
	return $classes;
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
		<?php
		$body_classes = get_body_class();
		if ( in_array( 'special-collection', $body_classes, true ) ) :
			$url = site_url( '/secrets/' );
		?>
			<a href="<?php echo esc_url( site_url() ); ?>/permanent-collection/"><span class="cssicon-arrow-l"></span> View Our Collection</a>
		<?php else : ?>
			<a href="<?php echo esc_url( site_url() ); ?>/see-art/"><span class="cssicon-arrow-l"></span> View All Current</a>
		<?php endif; ?>

		</div>

		<div class="cf"></div>

		<div class="exhibition-featured-img">
			<?php
			if ( get_field( 'highlight_color' ) ) :
				$color = ' ' . get_field( 'highlight_color' );
			else :
				$color = '';
			endif;

			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'full' );
			endif;
			?>
		</div>

		<div class="exhibition-featured-date">
			<?php the_field( 'date' ); ?>
		</div>

		<h1 class="ex-page-title"><?php the_title(); ?></h1>

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
			<div class="ss-wrap">
				<?php the_field( 'share_blocks', 'option' ); ?>
			</div>
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
							echo '<div class="artwork-img progbar-trigger"><a href="#' . esc_html( $c ) . '" class="modal-link" data-index="' . esc_html( $c ) . '"><span class="progbar' . esc_html( $color ) . '"></span>';
							the_post_thumbnail( 'medium', [
								'class' => 'artwork-image',
							] );
							echo '</a></div>';
						endif;
						?>
						<div class="artwork-info">
							<?php
							echo '<a href="#' . esc_html( $c ) . '" class="modal-link" data-index="' . esc_html( $c ) . '"><strong>';
							the_title();
							echo '</strong></a>';
							if ( get_field( 'date' ) ) :
								echo ', ';
								the_field( 'date' );
							endif;
							if ( get_field( 'medium' ) ) :
								echo ', ';
								the_field( 'medium' );
							endif;
							?>
						</div>
					</div>
				<?php endforeach; ?>
				<div class="cf"></div>
				</div>
				<?php
				wp_reset_postdata();
			endif;
			get_template_part( 'template-parts/exhibit-modal' );
			?>

			<div class="quote">
				<blockquote>
					<?php the_field( 'quote' ); ?>
					<cite>
<?php
the_field( 'quote_citation' );
$link = get_field( 'citation_link' );
if ( $link ) :
	$link_url = $link['url'];
	$link_title = $link['title'];
	$link_target = $link['target'] ? $link['target'] : '_self';
?>
&mdash;<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>
					</cite>
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

			<?php get_template_part( 'template-parts/call-to-action' ); ?>
		</div>
	</div>
<?php
}
add_action( 'tha_entry_content_before', 'da_exhibition' );


// Build the page.
get_template_part( 'index' );
