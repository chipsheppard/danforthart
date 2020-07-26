<?php
/**
 * Template part for the content area
 *
 * @package  danforthart
 * @subpackage danforthart/template-parts
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php
// FEATURED IMAGE (archives) then (search). WHY TWO????
if ( ! is_singular() && ! is_search() && ! has_post_format( 'aside' ) && ! has_post_format( 'status' ) && has_post_thumbnail() ) :

	echo '<a href="' . esc_url( get_permalink() ) . '" class="fi-link">';
	the_post_thumbnail(
		'thumbnail',
		[
			'class' => 'featured-image',
			'title' => 'Feature image',
		]
	);
	echo '</a>';

elseif ( is_search() && has_post_thumbnail() ) :

	echo '<a href="' . esc_url( get_permalink() ) . '" class="fi-link">';
	the_post_thumbnail(
		'thumbnail',
		[
			'class' => 'featured-image',
			'title' => 'Feature image',
		]
	);
	echo '</a>';

endif;


// Title for archives & search. No title for Posts/Pages.
if ( ! is_singular() ) :
	echo '<header class="entry-header">';
	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	echo '</header>';
endif;

tha_entry_top();

echo '<div class="entry-content">';

tha_entry_content_before();

if ( is_singular() ) :
	if ( get_field( 'sub_menu' ) ) :
		$mod = get_field( 'sub_menu' );
		?>
	<div class="inner-wrap">
		<div class="sub-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => $mod,
					'menu_id'        => $mod . '-menu',
					'container'      => '',
				)
			);
			?>
		</div>
	</div>
	<?php endif; ?>

	<div class="heading-wrap">
		<div class="inner-wrap">
			<?php
			if ( get_field( 'page_title' ) ) :
				?>
			<h1 class="page-title"><?php the_field( 'page_title' ); ?></h1>
				<?php
			endif;

			$thecontent = get_the_content();
			if ( ! empty( $thecontent ) ) :
				?>
				<div class="page-content"><?php the_content(); ?></div>
			<?php endif; ?>
			<?php get_template_part( 'template-parts/v-images' ); ?>
			<div class="cf"></div>

			<?php if ( get_field( 'secondary_content' ) ) : ?>
				<div class="secondary-content">
				<?php the_field( 'secondary_content' ); ?>
				</div>
			<?php endif; ?>

		</div>
	</div>

	<div class="content-wrap">
		<div class="inner-wrap">
			<div class="modules">
				<?php get_template_part( 'template-parts/content', 'modules' ); ?>
			</div>

		</div><!-- /inner-wrap -->
	</div><!-- /content-wrap -->

	<?php get_template_part( 'template-parts/quote' ); ?>
	<?php get_template_part( 'template-parts/signup' ); ?>
	<?php
	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'danforthart' ),
			'after'  => '</div>',
		)
	);


else : // archives & search.

	the_excerpt();

endif;

tha_entry_content_after();

echo '</div>';

tha_entry_bottom();

?>
</article>
