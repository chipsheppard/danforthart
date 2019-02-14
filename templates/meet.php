<?php
/**
 * The template for displaying the Meet Us page.
 *
 * Template Name: Meet
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'meet meetus' ) );
} );

/**
 * Meet Us page functions
 */
function da_meet() {
?>
<div class="inner-wrap">
	<div class="sub-navigation">
		<?php
		wp_nav_menu( array(
			'menu' => 'meet-sub',
			'container' => '',
		) );
		?>
	</div>
</div>

<div class="inner-wrap">
	<h1 class="page-title">
		<?php the_field( 'page_title' ); ?>
	</h1>
</div>

<div class="content-wrap">
	<div class="inner-wrap">
		<div class="mid-block">
			<div class="col-1-2 nm mid-left">
				<div class="imageblock">
					<div class="card-title"><?php the_field( 'l_image_tab_text' ); ?></div>
					<?php
					$image = get_field( 'l_image' );
					if ( ! empty( $image ) ) :
						$alt = $image['alt'];
						$size = 'medium_large';
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];
						$url = $image['sizes'][ $size ];
						?>
						<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
					<?php endif; ?>
				</div>
				<div class="textblock">
					<div class="l-text"><?php the_field( 'l_text' ); ?></div>
					<div class="l-content"><?php the_field( 'l_content' ); ?></div>
				</div>
			</div>
			<div class="col-1-2 nm mid-right">
				<div class="textblock">
					<div class="message"><?php the_field( 'r_text' ); ?></div>
				</div>
				<div class="imageblock">
					<?php
					$image = get_field( 'r_image' );
					if ( ! empty( $image ) ) :
						$alt = $image['alt'];
						$size = 'medium_large';
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];
						$url = $image['sizes'][ $size ];
						?>
						<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
					<?php endif; ?>
					<div class="card-title"><?php the_field( 'r_image_tab_text' ); ?></div>
				</div>
			</div>
			<div class="cf"></div>
		</div><!-- /mid-block -->
	</div><!-- /inner-wrap -->


	<div class="inner-wrap">

		<?php get_template_part( 'template-parts/fullwidth-quote' ); ?>
		<?php get_template_part( 'template-parts/v-images' ); ?>
		<?php get_template_part( 'template-parts/accordion-block' ); ?>
		<?php get_template_part( 'template-parts/call-to-action' ); ?>

	</div><!-- /inner-wrap -->

<?php
}
add_action( 'tha_entry_content_before', 'da_meet' );



// Build the page.
get_template_part( 'index' );
