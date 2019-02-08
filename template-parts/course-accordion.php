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
	<div class="ab-title">
		<h2><?php the_field( 'ab_title' ); ?></h2>
	</div>

	<div class="col-1-3 first ab-left">
		<?php
		$image = get_field( 'ab_image' );
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
				<div class="card-title"><?php echo esc_html( $caption ); ?></div>
			<?php
			else :
				echo '&nbsp;';
			endif;
		endif;
		?>
	</div>
	<div class="col-2-3 ab-right">
		<?php
		if ( have_rows( 'ab_accordion' ) ) :
			while ( have_rows( 'ab_accordion' ) ) :
				the_row();
				?>
				<div class="accordion col-2-3 silo">
					<div class="actop">
						<div class="acc-title">
							<?php the_sub_field( 'title' ); ?>
						</div>
						<div class="acc-button">
							<span class="cssicon-plusminus small plus"></span>
						</div>
						<div class="cf"></div>
					</div>
					<div class="acbot">
						<?php the_sub_field( 'text' ); ?>
					</div>
				</div>
				<?php
			endwhile;
		endif;
		?>
	</div>
	<div class="cf"></div>

</div><!-- /lower-block-->
