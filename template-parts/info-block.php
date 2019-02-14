<?php
/**
 * The template for displaying INFO block.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

?>
<div class="info-block">
	<?php
	if ( have_rows( 'info_blocks' ) ) :
		$c = 0;
		while ( have_rows( 'info_blocks' ) ) :
			the_row();
			$c++;
			?>
			<div class="info-row<?php echo esc_html( $c ); ?>">
				<div class="col-1-2 first info-l">
					<h3><?php the_sub_field( 'info_l_head' ); ?></h3>
					<?php the_sub_field( 'info_l_text' ); ?>
				</div>
				<div class="col-1-2 info-r">
					<h3><?php the_sub_field( 'info_r_head' ); ?></h3>
					<?php the_sub_field( 'info_r_text' ); ?>
				</div>
				<div class="cf"></div>
			</div>
			<?php
		endwhile;
	endif;
	?>
</div><!-- /info-block -->
