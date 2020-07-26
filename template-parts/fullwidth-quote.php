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
		$fwq_link = get_field( 'large_link' );
		if ( $fwq_link ) :
			$fwq_link_url    = $fwq_link['url'];
			$fwq_link_title  = $fwq_link['title'];
			$fwq_link_target = $fwq_link['target'] ? $fwq_link['target'] : '_self';
			?>
			<a href="<?php echo esc_url( $fwq_link_url ); ?>" target="<?php echo esc_attr( $fwq_link_target ); ?>"><?php echo esc_html( $fwq_link_title ); ?></a>
		<?php endif; ?>
	</div>
	<div class="col-3-4">
		<blockquote>
			<?php the_field( 'quote_text' ); ?>
			<cite>
<?php
the_field( 'quote_citation' );
$fwqc_link = get_field( 'citation_link' );
if ( $fwqc_link ) :
	$fwqc_link_url    = $fwqc_link['url'];
	$fwqc_link_title  = $fwqc_link['title'];
	$fwqc_link_target = $fwqc_link['target'] ? $fwqc_link['target'] : '_self';
	?>
&mdash;<a href="<?php echo esc_url( $fwqc_link_url ); ?>" target="<?php echo esc_attr( $fwqc_link_target ); ?>"><?php echo esc_html( $fwqc_link_title ); ?></a>
<?php endif; ?>
			</cite>
		</blockquote>
	</div>
	<div class="cf"></div>
</div><!-- /quote-block -->
