<?php
/**
 * The template part for displaying a second Variable images block.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

if ( have_rows( 'v_images2' ) ) :
	$rc = 0;
	while ( have_rows( 'v_images2' ) ) :
		$rc++;
		the_row();
	endwhile;
	?>
	<div class="variable-images v2 rowof<?php echo esc_html( $rc ); ?>">
	<?php
	while ( have_rows( 'v_images2' ) ) :
		the_row();
		?>
		<div class="variable-image img-<?php echo esc_html( $rc ); ?>">
			<?php
			$image = get_sub_field( 'v_image2' );
			if ( ! empty( $image ) ) :
				$alt = $image['alt'];
				$caption = $image['caption'];
				$size = 'medium_large';
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
				$url = $image['sizes'][ $size ];
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
		</div>
	<?php endwhile; ?>
<br clear="all">
</div>
<?php endif; ?>
