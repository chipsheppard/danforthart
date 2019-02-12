<?php
/**
 * The template part for displaying the Variable images block.
 *
 * @package    danforthart
 * @subpackage ddanforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

if ( have_rows( 'v_images' ) ) :
	// $count = count( (array) get_field( 'v_images' ) ); // Not working with PHP 7.2.
?>
<div class="variable-images">
	<?php
	// Get a total so we can style the images.
	$rc = 0;
	while ( have_rows( 'v_images' ) ) :
		$rc++;
		the_row();
	endwhile;

	// tagging each image with the total.
	while ( have_rows( 'v_images' ) ) :
		the_row();
		?>
		<div class="variable-image img-<?php echo esc_html( $rc ); ?>">
			<?php
			$image = get_sub_field( 'v_image' );
			if ( ! empty( $image ) ) :
				$url = $image['url'];
				$alt = $image['alt'];
				$caption = $image['caption'];
				$size = 'medium';
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
				?>
				<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
				<?php if ( $caption ) : ?>
					<div class="caption"><?php echo esc_html( $caption ); ?></div>
				<?php
				else :
					echo '&nbsp;';
				endif;
			endif;
			?>
		</div><!-- /variable-image -->
	<?php endwhile; ?>
<br clear="all">
</div><!-- /variable-images -->
<?php endif; ?>
