<?php
/**
 * The template for displaying the Current See Art.
 *
 * Template Name: SeeArt
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'seeart current' ) );
} );

/**
 * Current
 */
function da_current() {

	// Child page menu.
	echo '<div class="sub-navigation">';
		wp_nav_menu( array(
			'menu' => 'see-art-sub',
			'container' => '',
		) );
	echo '</div>';
	?>

	<div class="inner-wrap">

		<div class="hero-wrap">
			<div class="heroimage">
				[featured image]
			</div>

			<div class="hero-callout">
				<div class="link">[po link]</div>
				<div class="date">[po date]</div>
				<div class="title">[po title]</div>
			</div>
		</div>

		<div class="intro">
			<h2><?php the_field( 'intro' ); ?></h2>
		</div>

		<div class="exhibit-left">
			<?php the_field( 'exhibit_left_text' ); ?>
			[post object]
		</div>

		<div class="exhibit-right-top">
			[post object]
		</div>

		<div class="exhibit-right-bottom">
			[post object]
		</div>


		<div class="quote-block">
			<div class="col-1-3 first">
				[big link]
			</div>
			<div class="col-2-3">
				<blockquote>
					<?php the_field( 'quote' ); ?>
					<cite><?php the_field( 'quote_citation' ); ?></cite>
				</blockquote>
			</div>
		</div>


		<div class="upcoming-top">
			<div class="col-1-2 first">
				<?php the_field( 'upcoming_section_title' ); ?>
			</div>
			<div class="col-1-2">[view past exhibits]</div>
		</div>


		<div class="upcoming-exhibits">
			[repeater (even-odd - left-right)]
			<div class="u-exhibit">
				<div class="u-image">
					[image]
					<div class="ui-info">
						<?php the_sub_field( 'image_caption' ); ?>
					</div>
				</div>
				<div class="u-content-upper">
					<div class="ucu-heading"><?php the_sub_field( 'sub_heading' ); ?></div>
					<div class="ucu-title"><?php the_sub_field( 'title' ); ?></div>
					<div class="ucu-date"><?php the_sub_field( 'date' ); ?></div>
					<div class="ucu-button">
						<span class="cssicon-plusminus plus"></span>
					</div>
				</div>
				<br><br>
				<div class="u-content-lower extended">
					<?php the_sub_field( 'text' ); ?>
					<div class="ucl-social">
						<div class="social-link"><a href="#0"><span class="iconwrap"><span class="cssicon-facebook"></span></span> <span class="link">Share It</span></a></div>
						<div class="social-link"><a href="#0"><span class="iconwrap c"><span class="cssicon-twitter"></span></span> <span class="link">Tweet It</span></a></div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<?php
	get_template_part( 'template-parts/exhibit-modal' );

}
add_action( 'tha_entry_content_before', 'da_current' );


// Build the page.
get_template_part( 'index' );
