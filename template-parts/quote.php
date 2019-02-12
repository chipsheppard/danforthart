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

?>

<div class="footer-quote<?php if ( get_field( 'quote_color' ) ) : ?>
<?php
echo ' ';
the_field( 'quote_color' );
endif;
?>
">
	<div class="col-1-2 nm imgblk">
		<?php
		// IMAGE.
		$image = get_field( 'quote_image' );
		if ( ! empty( $image ) ) :
			$alt = $image['alt'];
			$size = 'medium_large';
			$width = $image['sizes'][ $size . '-width' ];
			$height = $image['sizes'][ $size . '-height' ];
			$url = $image['sizes'][ $size ];
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
	<div class="cf"></div>
</div>
