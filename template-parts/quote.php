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
			$url = $image['url'];
			$alt = $image['alt'];
			$size = 'medium_large';
			$width = $image['sizes'][ $size . '-width' ];
			$height = $image['sizes'][ $size . '-height' ];
			?>
			<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
		<?php endif; ?>
	</div>

	<div class="col-1-2 nm txtblk">
		<blockquote>
			<?php the_field( 'quote' ); ?>
			<cite><?php the_field( 'quote_citation' ); ?></cite>
		</blockquote>
	</div>
	<div class="cf"></div>
</div>
