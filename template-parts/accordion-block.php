<?php
/**
 * The template part for displaying the Accordion block.
 *
 * @package    danforthart
 * @subpackage ddanforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

?>

<div class="accordion-block">
	<?php if ( get_field( 'ab_title' ) ) : ?>
	<div class="ab-title">
		<h3><?php the_field( 'ab_title' ); ?></h3>
	</div>
	<?php endif; ?>

	<div class="col-1-3 first ab-left">
		<?php if ( get_field( 'ab_left_title' ) ) : ?>
		<div class="ab-title">
			<h3><?php the_field( 'ab_left_title' ); ?></h3>
		</div>
		<?php endif; ?>
		<?php
		$image = get_field( 'ab_image' );
		if ( ! empty( $image ) ) :
			$alt     = $image['alt'];
			$caption = $image['caption'];
			$size    = 'medium';
			$width   = $image['sizes'][ $size . '-width' ];
			$height  = $image['sizes'][ $size . '-height' ];
			$url     = $image['sizes'][ $size ];
			?>
			<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
			<?php if ( $caption ) : ?>
				<div class="card-title"><?php echo esc_html( $caption ); ?></div>
				<?php
			else :
				echo '&nbsp;';
			endif;
		endif;
		?>
	</div>
	<div class="col-2-3 ab-right">
		<?php get_template_part( 'template-parts/accordion' ); ?>
	</div>
	<div class="cf"></div>

</div><!-- /lower-block-->
