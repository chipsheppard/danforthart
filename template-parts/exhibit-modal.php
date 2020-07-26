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

	<div class="close-modal"><span class="cssicon-x"></span></div>

	<div class="slickeroo">
	<?php
	$mposts = get_field( 'artworks' );
	if ( $mposts ) :
		/**
		 * Z global $post;
		*/
		foreach ( $mposts as $mpost ) :
			setup_postdata( $mpost );
			?>
			<div class="modal-art">
				<div class="modal-img">
					<?php
					if ( has_post_thumbnail() ) :
						the_post_thumbnail(
							'large',
							[ 'class' => 'modal-image' ]
						);
					endif;
					?>
				</div>
				<div class="artwork-info">
					<strong><?php the_field( 'artist_name' ); ?></strong>
					<br />
					<strong><?php the_title(); ?></strong>
					<?php
					if ( get_field( 'date' ) ) :
						echo ', ';
						the_field( 'date' );
					endif;
					if ( get_field( 'medium' ) ) :
						echo ', ';
						the_field( 'medium' );
					endif;
					echo '<br />';
					the_field( 'more_left' );
					?>
				</div>
			</div>
			<?php
		endforeach;
		wp_reset_postdata();
	endif;
	?>
	</div>

	<div class="modal-nav">
		<button type="button" class="slick-prev">Previous</button>
		<span class="pagingInfo"></span>
		<button type="button" class="slick-next">Next</button>
	</div>

</div>
