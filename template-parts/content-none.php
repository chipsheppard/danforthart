<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @package  danforthart
 * @subpackage danforthart/template-parts
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

?>
<section class="no-results not-found">

	<header class="page-header">
		<div class="inner-wrap title-wrap">
			<?php echo '<h1 class="page-title">' . esc_html__( 'Nothing Found', 'danforthart' ) . '</h1>'; ?>
		</div>
	</header>

	<div class="inner-wrap">
	<?php
	if ( is_home() && current_user_can( 'publish_posts' ) ) :
		echo '<p>' . esc_html__( 'No posts to display.', 'danforthart' ) . '</p>';
	elseif ( is_search() ) :
		echo '<p>' . esc_html__( 'Nothing matched your search terms. Please try again with some different keywords.', 'danforthart' ) . '</p>';
		get_search_form();
	else :
		echo '<p>' . esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'danforthart' ) . '</p>';
		get_search_form();
	endif;
	?>
	</div>

</section>
