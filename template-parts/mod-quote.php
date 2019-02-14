<?php
/**
 * The Quote block for the Modular template.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

?>
<div class="col-4-5 silo quote-block">
	<blockquote>
		<?php the_sub_field( 'quote_text' ); ?>
		<cite>
<?php
the_sub_field( 'quote_citation' );
$link = get_sub_field( 'citation_link' );
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
