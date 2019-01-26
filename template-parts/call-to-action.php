<?php
/**
 * The template for displaying the Call To Action block.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

?>

<div class="calltoaction">
<div class="inner-wrap">
	<?php
	if ( have_rows( 'cta_block', 'option' ) ) :
		while ( have_rows( 'cta_block', 'option' ) ) :
			the_row();

			if ( get_row_layout() === 'event' ) :

				$link = get_sub_field( 'link', 'option' );
				if ( $link ) :
					$link_url = $link['url'];
					$link_title = $link['title'];
					?>
					<div class="col-1-2 ctablock cta-event">
						<a href="<?php echo esc_html( $link_url ); ?>">
						<div class="cta-wrap">
							<div class="card-title">Event</div>
							<div class="card-info">
								<div class="card-text"><?php the_sub_field( 'text', 'option' ); ?></div>
								<span class="card-date"><?php the_sub_field( 'date', 'option' ); ?></span>
								&mdash;
								<span class="card-link"><?php echo esc_html( $link_title ); ?></span>
							</div>
						</div>
						</a>
					</div>
					<?php
				endif;

			elseif ( get_row_layout() === 'learn' ) :

				$link = get_sub_field( 'link', 'option' );
				if ( $link ) :
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<div class="col-1-2 ctablock cta-learn">
						<a href="<?php echo esc_url( $link_url ); ?>">
						<div class="cta-wrap">
							<div class="card-title">Learn + Create</div>
							<div class="card-info">
								<div class="card-text"><?php the_sub_field( 'text', 'option' ); ?></div>
								<span class="card-link"><?php echo esc_html( $link_title ); ?></span>
							</div>
						</div>
						</a>
					</div>
					<?php
				endif;

			elseif ( get_row_layout() === 'exhibit' ) :

				if ( get_sub_field( 'color' ) ) :
					$color = ' ' . get_sub_field( 'color' );
				else :
					$color = '';
				endif;
				?>
				<div class="col-1-2 ctablock cta-exhibit<?php echo esc_html( $color ); ?>">
					<?php
					$post_object = get_sub_field( 'exhibition' );
					if ( $post_object ) :
						// override $post.
						$post = $post_object;
						setup_postdata( $post );
						?>
						<a href="<?php the_permalink(); ?>">
						<div class="img-bg" style="background-image:url('<?php the_post_thumbnail_url( 'large' ); ?>')">
							<div class="card-title">Exhibit</div>
							<div class="card-info">
									<div class="sub-head"><?php the_sub_field( 'sub_head' ); ?></div>
									<div class="card-text"><?php the_title(); ?></div>
									<span class="card-link">See What's On View</span>
							</div>
						</div>
						</a>
						<?php
						wp_reset_postdata();
					endif;
					?>
				</div>
				<?php
			endif;
		endwhile;
	endif;
	?>

	<div class="cf"></div>
</div>
</div>
