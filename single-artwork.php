<?php
/**
 * The template for displaying Single Artworks.
 *
 * @package    danforthart
 * @subpackage danforthart
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'single-artwork seeart' ) );
} );

/**
 * Home Function
 */
function da_artwork() {
?>
	<div class="inner-wrap">

		<div class="sub-navigation">
			<?php
			wp_nav_menu( array(
				'menu' => 'see-art-sub',
			) );
			?>
		</div>

		<div class="return">
			<a href="/danforth/see-art/permanent-collection/"><span class="cssicon-arrow-l"></span> View Our Collection</a>
		</div>
		<div class="cf"></div>

		<div class="print-info"><a href="#">Print information <span class="cssicon-file green"></span></a></div>

		<?php
		$terms = get_the_terms( $post->ID, 'collection_type' );
		if ( ! empty( $terms ) ) :
			$arttypes = array();
			foreach ( $terms as $term ) {
				$arttypes[] = $term->name;
			}
			$arttype_list = join( ', ', $arttypes );
			?>
			<h3 class="catname">
				<?php printf( '%s', esc_html( $arttype_list ) ); ?>
			</h3>
		<?php endif; ?>

		<div class="artwork-img">
			<?php
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'large', [
					'class' => 'artwork-image aligncenter',
				] );
			endif;
			?>
		</div>
	</div>

	<div class="content-wrap">
		<div class="inner-wrap">
		<div class="col-3-4 silo">

			<div class="col-1-2 first art-left">
				<h2 class="artist-name"><?php the_field( 'artist_name' ); ?></h2>
				<div class="artist-info"><?php the_field( 'artist_info' ); ?></div>
				<h1 class="artwork-title"><?php the_title(); ?></h1>
				<div class="artwork-info">
					<span class="artwork-date"><?php the_field( 'date' ); ?></span>
<?php if ( the_field( 'medium' ) ) : ?>
&mdash;<span class="artwork-medium"><?php the_field( 'medium' ); ?></span>
<?php endif; ?>
				</div>
			</div>

			<div class="col-1-2 art-right">
				<?php the_content(); ?>
			</div>
			<div class="cf"></div>

		</div></div>
		<hr />
		<div class="inner-wrap">
		<div class="col-3-4 silo">

			<div class="col-1-2 first more-left">
				<?php the_field( 'more_left' ); ?>
			</div>
			<div class="col-1-2 more-right">
				<?php the_field( 'more_right' ); ?>
			</div>
			<div class="cf"></div>
		</div></div>
	</div>

<?php
}
add_action( 'tha_entry_content_before', 'da_artwork' );


// Build the page.
get_template_part( 'index' );
