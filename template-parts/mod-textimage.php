<?php
/**
 * The template for displaying the TEXT IMAGE block.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

?>
<div class="mod-textimage">
<div class="inner-wrap<?php if ( get_sub_field( 'textimage_align' ) ) : ?>
<?php echo ' '; ?>
<?php the_sub_field( 'textimage_align' ); ?>
<?php endif; ?>">

<div class="imgblk">
	<?php
	$textimage_image = get_sub_field( 'textimage_image' );
	if ( ! empty( $textimage_image ) ) :
		$textimage_alt    = $textimage_image['alt'];
		$textimage_size   = 'medium_large';
		$textimage_width  = $textimage_image['sizes'][ $textimage_size . '-width' ];
		$textimage_height = $textimage_image['sizes'][ $textimage_size . '-height' ];
		$textimage_url    = $textimage_image['sizes'][ $textimage_size ];
		?>
		<img src="<?php echo esc_url( $textimage_url ); ?>" alt="<?php echo esc_attr( $textimage_alt ); ?>" width="<?php echo esc_attr( $textimage_width ); ?>" height="<?php echo esc_attr( $textimage_height ); ?>" />
	<?php endif; ?>
</div>

<div class="txtblk<?php if ( get_sub_field( 'textimage_color' ) ) : ?>
<?php echo ' '; ?>
<?php the_sub_field( 'textimage_color' ); ?>
<?php endif; ?>">
<?php the_sub_field( 'textimage_text' ); ?>
</div>

</div>
</div>
