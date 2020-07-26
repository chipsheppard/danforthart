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
<div class="quote-block<?php if ( get_sub_field( 'quote_background' ) ) : ?>
<?php echo ' '; ?>
<?php the_sub_field( 'quote_background' ); ?>
<?php endif; ?>">
	<div class="col-4-5 silo">
		<blockquote>
			<?php the_sub_field( 'quote_text' ); ?>
			<cite>
			<?php
			the_sub_field( 'quote_citation' );
			$q_link = get_sub_field( 'citation_link' );
			if ( $q_link ) :
				$q_link_url    = $q_link['url'];
				$q_link_title  = $q_link['title'];
				$q_link_target = $q_link['target'] ? $q_link['target'] : '_self';
				?>
			&mdash;<a href="<?php echo esc_url( $q_link_url ); ?>" target="<?php echo esc_attr( $q_link_target ); ?>"><?php echo esc_html( $q_link_title ); ?></a>
			<?php endif; ?>
			</cite>
		</blockquote>
	</div>
</div>
