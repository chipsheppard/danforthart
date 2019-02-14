<?php
/**
 * CallToAction for the Modular template.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

?>
<div class="col-3-4 silo mod-cta">
	<div class="cta-text"><?php the_sub_field( 'mod_cta_text' ); ?></div>
	<?php
	$link = get_sub_field( 'cta_link' );
	if ( $link ) :
		$link_url = $link['url'];
		$link_title = $link['title'];
		$link_target = $link['target'] ? $link['target'] : '_self';
	?>
	<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn"><?php echo esc_html( $link_title ); ?></a>
	<?php endif; ?>
</div>
