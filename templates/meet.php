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
			<div class="col-7-12 nm mid-left">
<?php
$l_link = get_field( 'l_link' );
if ( $l_link ) :
	$l_url = $l_link['url'];
	$l_title = $l_link['title'];
?>
<a class="progbar-trigger" href="<?php echo esc_url( $l_url ); ?>">
<?php endif; ?>
				<div class="imageblock">
					<?php if ( $l_link ) : ?>
					<div class="card-title"><?php echo esc_html( $l_title ); ?></div>
					<?php endif; ?>
					<span class="progbar big<?php if ( get_field( 'l_highlight_color' ) ) : ?>
<?php
echo ' ';
the_field( 'l_highlight_color' );
endif;
?>
"></span>
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
<?php if ( $l_link ) : ?>
</a>
<?php endif; ?>
				<div class="textblock">
					<div class="l-text"><?php the_field( 'l_text' ); ?></div>
					<div class="l-content"><?php the_field( 'l_content' ); ?></div>
				</div>
			</div>

			<div class="col-5-12 nm mid-right">
				<div class="textblock">
					<div class="message"><?php the_field( 'r_text' ); ?></div>
				</div>

<?php
$r_link = get_field( 'r_link' );
if ( $r_link ) :
	$r_url = $r_link['url'];
	$r_title = $r_link['title'];
?>
<a class="progbar-trigger" href="<?php echo esc_url( $r_url ); ?>">
<?php endif; ?>
					<div class="imageblock">
						<span class="progbar big<?php if ( get_field( 'r_highlight_color' ) ) : ?>
<?php
echo ' ';
the_field( 'r_highlight_color' );
endif;
?>
"></span>
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
						<?php if ( $r_link ) : ?>
						<div class="card-title"><?php echo esc_html( $r_title ); ?>
						<?php endif; ?>
						</div>
					</div><!-- /imgblk -->
<?php if ( $r_link ) : ?>
</a>
<?php endif; ?>
			</div>
			<div class="cf"></div>
		</div><!-- /mid-block -->
	</div><!-- /inner-wrap -->


	<div class="inner-wrap mnp">

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
