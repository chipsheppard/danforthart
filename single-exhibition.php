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

add_filter(
	'body_class',
	function( $classes ) {
		if ( has_term( 'special-collection', 'exhibition_type' ) ) {
			$classes[] = 'special-collection';
		}
		if ( has_term( 'past-exhibition', 'exhibition_type' ) ) {
			$classes[] = 'past-exhibition';
		}
		$classes[] = 'seeart';
		return $classes;
	}
);

/**
 * Home Function
 */
function da_exhibition() {
	?>
	<div class="inner-wrap">

		<div class="sub-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'seeart',
					'menu_id'        => 'seeart-menu',
					'container'      => '',
				)
			);
			?>
		</div>

		<div class="return">
		<?php
		$body_classes = get_body_class();
		if ( in_array( 'special-collection', $body_classes, true ) ) :
			?>
			<a href="<?php echo esc_url( home_url() ); ?>/seeart/permanent-collection/"><span class="cssicon-arrow-l"></span> View Our Collection</a>
		<?php elseif ( in_array( 'past-exhibition', $body_classes, true ) ) : ?>
			<a href="<?php echo esc_url( home_url() ); ?>/see-art/past-exhibitions/"><span class="cssicon-arrow-l"></span> View All Past</a>
		<?php else : ?>
			<a href="<?php echo esc_url( home_url() ); ?>/see-art/"><span class="cssicon-arrow-l"></span> View All Current</a>
		<?php endif; ?>
		</div>

		<div class="cf"></div>

		<div class="heroimage">
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

		<h1 class="ex-page-title">
			<?php if ( get_field( 'sub_heading' ) ) : ?>
			<div class="ex-sub-title"><?php the_field( 'sub_heading' ); ?></div>
			<?php endif; ?>
			<?php the_title(); ?>
		</h1>

		<div class="ex-intro-wrap">
			<div class="ex-col ex-intro">
				<?php the_field( 'intro' ); ?>
			</div>
			<div class="ex-col ex-content">
				<?php the_content(); ?>
			</div>
		</div>

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
							the_post_thumbnail(
								'medium',
								array(
									'class' => 'artwork-image',
								)
							);
							echo '</a></div>';
						endif;
						?>
						<div class="artwork-info">
							<strong><?php the_field( 'artist_name' ); ?></strong>,
							<em><?php the_title(); ?></em><?php if ( get_field( 'date' ) ) : ?>
								<?php
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

	<?php if ( get_field( 'quote' ) ) : ?>
			<div class="quote-block">
				<blockquote>
					<?php the_field( 'quote' ); ?>
					<cite>
		<?php
		the_field( 'quote_citation' );
		$link = get_field( 'citation_link' );
		if ( $link ) :
			$link_url    = $link['url'];
			$link_title  = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
&mdash;<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>
					</cite>
				</blockquote>
			</div>
<?php endif; ?>

		</div>

		<?php if ( get_field( 'more_content_left' ) || get_field( 'more_content_right' ) ) : ?>
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
		<?php endif; ?>

		<div class="inner-wrap">
			<?php get_template_part( 'template-parts/call-to-action' ); ?>
		</div>

	</div>
	<?php
}
add_action( 'tha_entry_content_before', 'da_exhibition' );


// Build the page.
get_template_part( 'index' );
