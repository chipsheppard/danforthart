<?php
/**
 * The template for displaying the Exhibit modal windows.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 * @link       https://codepen.io/allurewebsolutions/pen/mVyaxZ
 */

?>
<div class="exhibit-modal">

	<div class="close-modal">X</div>

	<div class="slickeroo">
	<?php
	$mposts = get_field( 'artworks' );
	if ( $mposts ) :
		/**
		 * Z global $post;
		*/
		foreach ( $mposts as $post ) :
			setup_postdata( $post );
			?>
			<div class="modal-art">
				<div class="modal-img">
					<?php
					if ( has_post_thumbnail() ) :
						the_post_thumbnail( 'large', [
							'class' => 'modal-image',
						] );
					endif;
					?>
				</div>
				<div class="artwork-info">
					<strong><?php the_title(); ?></strong>,
					<?php the_field( 'date' ); ?>,
					<?php the_field( 'medium' ); ?>	<br />
					<?php the_field( 'more_left' ); ?>
				</div>
			</div>
		<?php
		endforeach;
		wp_reset_postdata();
	endif;
	?>
	</div>

	<div class="modal-nav">
		<button type="button" class="prev">Previous</button>
		<span class="pagingInfo"></span>
		<button type="button" class="next">Next</button>
	</div>

</div>
