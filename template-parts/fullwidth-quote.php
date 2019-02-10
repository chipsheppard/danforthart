<?php
/**
 * The template part for displaying the FullWidth Quote block.
 *
 * @package    danforthart
 * @subpackage ddanforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

?>
<div class="quote-block">
	<div class="col-1-4 first large-link">
		<?php
		$link = get_field( 'large_link' );
		if ( $link ) :
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
		<?php endif; ?>
	</div>
	<div class="col-3-4">
		<blockquote>
			<?php the_field( 'quote_text' ); ?>
			<cite>
<?php
the_field( 'quote_citation' );
$link = get_field( 'citation_link' );
if ( $link ) :
	$link_url = $link['url'];
	$link_title = $link['title'];
	$link_target = $link['target'] ? $link['target'] : '_self';
?>
&mdash;<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>
			</cite>
		</blockquote>
	</div>
	<div class="cf"></div>
</div><!-- /quote-block -->
