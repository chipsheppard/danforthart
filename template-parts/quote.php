<?php
/**
 * The template for displaying the QUOTE block.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

if ( get_field( 'quote' ) ) :
	?>
<div class="footer-quote<?php if ( get_field( 'quote_color' ) ) : ?>
	<?php
	echo ' ';
	the_field( 'quote_color' );
	endif;
						?>
	">
<div class="inner-wrap mnp"><div class="flexme">
	<div class="col-1-2 nm imgblk">
		<?php
		// IMAGE.
		$image = get_field( 'quote_image' );
		if ( ! empty( $image ) ) :
			$alt    = $image['alt'];
			$size   = 'medium_large';
			$width  = $image['sizes'][ $size . '-width' ];
			$height = $image['sizes'][ $size . '-height' ];
			$url    = $image['sizes'][ $size ];
			?>
			<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
		<?php endif; ?>
	</div>

	<div class="col-1-2 nm txtblk">
		<blockquote>
			<?php the_field( 'quote' ); ?>
			<cite>
			<?php
			the_field( 'quote_citation' );
			$q_link = get_field( 'citation_link' );
			if ( $q_link ) :
				$q_link_url    = $q_link['url'];
				$q_link_title  = $q_link['title'];
				$q_link_target = $q_link['target'] ? $q_link['target'] : '_self';
				?>
&mdash;<a href="<?php echo esc_url( $q_link_url ); ?>" target="<?php echo esc_attr( $q_link_target ); ?>"><?php echo esc_html( $q_link_title ); ?></a>
<?php endif; ?>
			</cite>
		</blockquote>
	</div>
	<div class="cf"></div>
</div>
</div>
</div>
<?php endif; ?>
