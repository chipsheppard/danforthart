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
	$cta_link = get_sub_field( 'cta_link' );
	if ( $cta_link ) :
		$cta_link_url    = $cta_link['url'];
		$cta_link_title  = $cta_link['title'];
		$cta_link_target = $cta_link['target'] ? $cta_link['target'] : '_self';
		?>
	<a href="<?php echo esc_url( $cta_link_url ); ?>" target="<?php echo esc_attr( $cta_link_target ); ?>" class="btn"><?php echo esc_html( $cta_link_title ); ?></a>
	<?php endif; ?>
</div>
