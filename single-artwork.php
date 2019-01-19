<?php
/**
 * The template for displaying Single Artworks.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
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

	echo '<div class="inner-wrap">';

	// Child page menu.
	echo '<div class="sub-navigation">';
		wp_nav_menu( array(
			'menu' => 'see-art-sub',
		) );
	echo '</div>';

	echo '<div class="return">';
	echo '<a href="/see-art/permanent-collection/"><span class="cssicon-arrow-l"></span> View Our Collection</a>';
	echo '</div>';

	echo '<div class="cf"></div>';

	// Field !!!.
	echo '<div class="print-info"><a href="#">Print information <span class="cssicon-file green"></span></a></div>';
	$categories = get_the_category();
	if ( ! empty( $categories ) ) {
		echo '<h3 class="catname">' . esc_html( $categories[0]->name ) . '</h3>';
	}
	echo '<div class="artwork-img">';
	if ( has_post_thumbnail() ) :
		the_post_thumbnail( 'large', [
			'class' => 'artwork-image aligncenter',
		] );
	endif;
	echo '</div>';
	echo '</div>'; // /inner-wrap.
	?>

	<div class="content-wrap">
		<div class="inner-wrap">
		<div class="col-3-4 silo">

			<div class="col-1-2 first art-left">
				<h2 class="artist-name"><?php the_field( 'artist_name' ); ?></h2>
				<div class="artist-info"><?php the_field( 'artist_info' ); ?></div>
				<h1 class="artwork-title"><?php the_title(); ?></h1>
				<div class="artwork-info"><span class="artwork-date"><?php the_field( 'date' ); ?></span>&mdash;<span class="artwork-medium"><?php the_field( 'medium' ); ?></span></div>
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
