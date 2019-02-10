<?php
/**
 * The template part for displaying the actual Accordion.
 *
 * @package    danforthart
 * @subpackage ddanforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

if ( have_rows( 'ab_accordion' ) ) :
	while ( have_rows( 'ab_accordion' ) ) :
		the_row();
		?>
		<div class="accordion">
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
