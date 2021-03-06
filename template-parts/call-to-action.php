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
<div class="inner-wrap mnp">
	<?php
	if ( have_rows( 'cta_block', 'option' ) ) :
		while ( have_rows( 'cta_block', 'option' ) ) :
			the_row();

			if ( get_row_layout() === 'event' ) :

				$cta_link = get_sub_field( 'link', 'option' );
				if ( $cta_link ) :
					$cta_link_url   = $cta_link['url'];
					$cta_link_title = $cta_link['title'];
					?>
					<div class="col-1-2 ctablock cta-event">
						<a href="<?php echo esc_html( $cta_link_url ); ?>">
						<div class="cta-wrap">
							<div class="card-title"><?php the_sub_field( 'e_tab_text', 'option' ); ?></div>
							<div class="card-info">
								<div class="card-text"><?php the_sub_field( 'text', 'option' ); ?></div>
								<span class="card-date"><?php the_sub_field( 'date', 'option' ); ?></span>
								&mdash;
								<span class="card-link"><?php echo esc_html( $cta_link_title ); ?></span>
							</div>
						</div>
						</a>
					</div>
					<?php
				endif;

			elseif ( get_row_layout() === 'learn' ) :

				$cta_link = get_sub_field( 'link', 'option' );
				if ( $cta_link ) :
					$cta_link_url    = $cta_link['url'];
					$cta_link_title  = $cta_link['title'];
					$cta_link_target = $cta_link['target'] ? $cta_link['target'] : '_self';
					?>
					<div class="col-1-2 ctablock cta-learn">
						<a href="<?php echo esc_url( $cta_link_url ); ?>">
						<div class="cta-wrap">
							<div class="card-title"><?php the_sub_field( 'l_tab_text', 'option' ); ?></div>
							<div class="card-info">
								<div class="card-text"><?php the_sub_field( 'text', 'option' ); ?></div>
								<span class="card-link"><?php echo esc_html( $cta_link_title ); ?></span>
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
					$post_object = get_sub_field( 'exhibition', 'option' );
					if ( $post_object ) :
						$cta_post = $post_object;
						setup_postdata( $cta_post );
						?>
						<a href="<?php the_permalink(); ?>">
							<div class="img-wrap"><?php the_post_thumbnail( 'large' ); ?></div>
							<div class="cta-wrap">
								<div class="card-title"><?php the_sub_field( 'e_tab_text', 'option' ); ?></div>
								<div class="card-info">
									<div class="sub-head"><?php the_sub_field( 'sub_header', 'option' ); ?></div>
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

			elseif ( get_row_layout() === 'join' ) :

				$join_link = get_sub_field( 'link', 'option' );
				if ( $join_link ) :
					$join_link_url    = $join_link['url'];
					$join_link_title  = $join_link['title'];
					$join_link_target = $join_link['target'] ? $join_link['target'] : '_self';
					?>
					<div class="col-1-2 ctablock cta-join">
						<a href="<?php echo esc_url( $join_link_url ); ?>">
						<div class="cta-wrap">
							<div class="card-title"><?php the_sub_field( 'j_tab_text', 'option' ); ?></div>
							<div class="card-info">
								<div class="card-text"><?php the_sub_field( 'text', 'option' ); ?></div>
								<span class="card-link"><?php echo esc_html( $join_link_title ); ?></span>
							</div>
						</div>
						</a>
					</div>
					<?php
				endif;

			endif;
		endwhile;
	endif;
	?>

	<div class="cf"></div>
</div>
</div>
