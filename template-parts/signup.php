<?php
/**
 * The template for displaying the SIGNUP block.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

?>

<div class="signup-block<?php if ( get_field( 'signup_color', 'option' ) ) : ?>
<?php
echo ' ';
the_field( 'signup_color', 'option' );
endif;
?>
">
	<div class="col-1-2 nm txtblk">
		<div class="signup-form">
			<?php the_field( 'signup_form', 'option' ); ?>
		</div>
	</div>

	<div class="col-1-2 nm imgblk">
		<?php
		// IMAGE.
		$image = get_field( 'image', 'option' );
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
	<div class="cf"></div>
</div>
