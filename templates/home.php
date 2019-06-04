<?php
/**
 * The template for displaying the homepage.
 *
 * Template Name: Homepage
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'homepage' ) );
} );

/**
 * Home Function
 */
function da_home() {
?>
	<div class="hero-wrap">
		<?php
		if ( have_rows( 'home_slider' ) ) :
			?>
			<div class="heroslider">
			<?php
			while ( have_rows( 'home_slider' ) ) :
				the_row();
				if ( get_sub_field( 'highlight_color' ) ) :
					$color = ' ' . get_sub_field( 'highlight_color' );
				else :
					$color = '';
				endif;

				$h_image = get_sub_field( 'h_image' );
				if ( ! empty( $h_image ) ) :
					$h_url = $h_image['url'];
					$h_alt = $h_image['alt'];
					$h_width = $h_image['width'];
					$h_height = $h_image['height'];
					?>
					<div class="sl">
						<span class="progbar homeslide<?php echo esc_html( $color ); ?>"></span>
						<img src="<?php echo esc_url( $h_url ); ?>" alt="<?php echo esc_attr( $h_alt ); ?>" width="<?php echo esc_attr( $h_width ); ?>" height="<?php echo esc_attr( $h_height ); ?>" />
					</div>
				<?php
				endif;
			endwhile;
			?>
			</div>
			<div class="hero-callout">
				<div class="link">
					<?php
					$link = get_field( 'tab_link' );
					if ( $link ) :
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
				</div>
				<div class="date"><?php the_field( 'tab_info' ); ?></div>
				<div class="text"><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php the_field( 'tab_title' ); ?></a></div>
			</div>
		<?php
		else :
			echo '<div class="inner-wrap no-hero"><br><br><h1>No Images Loaded</h1></div>';
		endif;
		?>
	</div><!-- /hero-wrap -->

	<div class="inner-wrap">
		<h1 class="page-title">
			<?php the_field( 'page_title' ); ?>
		</h1>
	</div>

	<div class="mid-block">
		<div class="inner-wrap">




<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
			<div class="col-1-2 nm top mid-left">
<?php
$q_link = get_field( 'q_link' );
if ( $q_link ) :
	$q_link_url = $q_link['url'];
	$q_link_title = $q_link['title'];
	?>
<a class="progbar-trigger" href="<?php echo esc_url( $q_link_url ); ?>">
<?php endif; ?>
				<div class="imageblock">
					<?php if ( $q_link ) : ?>
					<div class="card-title"><?php echo esc_html( $q_link_title ); ?></div>
					<?php endif; ?>
					<span class="progbar big<?php if ( get_field( 'q_highlight_color' ) ) : ?>
<?php
echo ' ';
the_field( 'q_highlight_color' );
endif;
?>
"></span>
					<?php
					$image = get_field( 'quote_image' );
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
<?php if ( $link ) : ?>
</a>
<?php endif; ?>
			</div>

			<div class="col-1-2 nm top mid-right">
				<div class="textblock">
					<?php if ( get_field( 'quote' ) ) : ?>
					<blockquote>
						<?php the_field( 'quote' ); ?>
						<cite>
<?php
the_field( 'quote_citation' );
$qc_link = get_field( 'citation_link' );
if ( $qc_link ) :
	$qc_url = $qc_link['url'];
	$qc_title = $qc_link['title'];
	$qc_target = $qc_link['target'] ? $qc_link['target'] : '_self';
	?>
	&mdash;<a href="<?php echo esc_url( $qc_url ); ?>" target="<?php echo esc_attr( $qc_target ); ?>"><?php echo esc_html( $qc_title ); ?></a>
<?php endif; ?>
						</cite>
					</blockquote>
				<?php endif; ?>
				</div>
			</div>

<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

			<div class="col-1-2 nm pullright bot mid-left">
<?php
$l_link = get_field( 'l_link' );
if ( $l_link ) :
	$l_url = $l_link['url'];
	$l_title = $l_link['title'];
?>
<a class="progbar-trigger" href="<?php echo esc_url( $l_url ); ?>">
<?php endif; ?>
				<div class="imageblock">
					<span class="progbar big<?php if ( get_field( 'l_highlight_color' ) ) : ?>
<?php
echo ' ';
the_field( 'l_highlight_color' );
endif;
?>
"></span>
					<?php
					$image = get_field( 'learn_image' );
					if ( ! empty( $image ) ) :
						$alt = $image['alt'];
						$size = 'medium_large';
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];
						$url = $image['sizes'][ $size ];
						?>
						<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
					<?php endif; ?>
					<?php if ( $l_link ) : ?>
					<div class="card-title"><?php echo esc_html( $l_title ); ?>
					<?php endif; ?>
					</div>
				</div>
<?php if ( $l_link ) : ?>
</a>
<?php endif; ?>
			</div>

			<div class="col-1-2 nm bot mid-right">
				<div class="textblock">
					<div class="message"><?php the_field( 'learn_text' ); ?></div>
				</div>
			</div>
			<div class="cf"></div>

		</div>
	</div>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - -->


	<div class="visit-block">
		<div class="inner-wrap">
			<div class="home-info">
				<h2 class="section-title">
					<?php the_field( 'section_title' ); ?>
				</h2>

				<div class="col-1-3 first">
					<?php get_template_part( 'template-parts/openhours' ); ?>
				</div>

				<div class="col-1-3">
					<?php if ( get_field( 'col2_title' ) ) : ?>
					<h5><span><?php the_field( 'col2_title' ); ?></span></h5>
					<?php endif; ?>
					<div class="ib-txt"><?php the_field( 'col2_text' ); ?></div>
				</div>
				<div class="col-1-3">
					<?php if ( get_field( 'col3_title' ) ) : ?>
					<h5><span><?php the_field( 'col3_title' ); ?></span></h5>
					<?php endif; ?>
					<div class="ib-txt"><?php the_field( 'col3_text' ); ?></div>
				</div>
				<div class="cf"></div>
			</div><!-- /home-info -->
		</div>
	</div>


	<div class="inner-wrap">
		<div class="social-block">
			<?php if ( have_rows( 'image_link' ) ) : ?>
				<div class="image-blocks">
					<?php
					while ( have_rows( 'image_link' ) ) :
						the_row();
						?>
						<div class="col-1-3 nm">
							<div class="s-image">
								<?php
								$s_image = get_sub_field( 's_image' );
								if ( ! empty( $s_image ) ) :
									$alt = $s_image['alt'];
									$size = 'medium';
									$width = $s_image['sizes'][ $size . '-width' ];
									$height = $s_image['sizes'][ $size . '-height' ];
									$url = $s_image['sizes'][ $size ];
									?>
									<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
								<?php endif; ?>
								<div class="overlay-text">
									<a href="<?php the_sub_field( 'o_url' ); ?>">
										<div class="txt">
											<?php the_sub_field( 'o_text' ); ?>
										</div>
									</a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<div class="cf"></div>
			<div class="text-links">
				<?php the_field( 's_text' ); ?>
			</div>
		</div><!-- /social-block -->

	</div><!-- /inner-wrap -->

<?php
}
add_action( 'tha_entry_content_before', 'da_home' );


// Build the page.
get_template_part( 'index' );
