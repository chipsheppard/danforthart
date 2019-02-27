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
	the_post_thumbnail( 'thumbnail', [
		'class' => 'featured-image',
		'title' => 'Feature image',
	] );
	echo '</a>';

elseif ( is_search() && has_post_thumbnail() ) :

	echo '<a href="' . esc_url( get_permalink() ) . '" class="fi-link">';
	the_post_thumbnail( 'thumbnail', [
		'class' => 'featured-image',
		'title' => 'Feature image',
	] );
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

if ( is_singular() ) : // single posts, attachments, pages NOT using content-acf.
	// THE MODULES.
	if ( get_field( 'sub_menu' ) ) :
		$m = get_field( 'sub_menu' );
	?>
	<div class="inner-wrap">
		<div class="sub-navigation">
			<?php
			wp_nav_menu( array(
				'menu' => $m,
				'container' => '',
			) );
			?>
		</div>
	</div>
	<?php endif; ?>

	<div class="inner-wrap">
		<h1 class="page-title"><?php the_content(); ?></h1>
		<?php get_template_part( 'template-parts/v-images' ); ?>
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

else : // archives & search.

	the_excerpt();

endif;

tha_entry_content_after();

echo '</div>';

tha_entry_bottom();

?>
</article>
