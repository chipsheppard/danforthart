<?php
/**
 * The template for displaying Single Events.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'vis single-event' ) );
} );

/**
 * Home Function
 */
function da_event() {
?>
<div class="inner-wrap">
	<div class="sub-navigation">
		<?php
		wp_nav_menu( array(
			'menu' => 'visit-sub',
			'container' => '',
		) );
		?>
	</div>

	<div class="return">
		<a href="<?php echo esc_url( site_url() ); ?>/visit/event-calendar/"><span class="cssicon-arrow-l"></span> View Full Calendar</a>
	</div>
	<div class="cf"></div>

</div>

<div class="hero-wrap">
	<div class="inner-wrap np">
		<div class="heroimage">
		<?php
			the_post_thumbnail( 'full', [
				'class' => 'featured-image',
				'title' => 'Feature image',
			] );
		?>
		</div>
		<div class="hero-callout">
			<div class="date"><?php the_field( 'e_date' ); ?></div>
		</div>
	</div>
</div><!-- /hero-wrap -->

<div class="inner-wrap">
	<h1 class="page-title">
		<?php the_title(); ?>
	</h1>

	<div class="col-1-2 first e-intro">
		<?php the_field( 'e_intro' ); ?>
	</div>
	<div class="col-1-2 e-content">
		<?php
		the_content();
		$link = get_field( 'e_link' );
		if ( $link ) :
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
		<?php endif; ?>
	</div>
	<div class="cf"></div>
</div>

<hr />
<div class="inner-wrap">
	<div class="col-1-2 first e-info">
		<?php the_field( 'more_left' ); ?>
	</div>
	<div class="col-1-2 e-social">
		<div class="ss-wrap">
			<?php the_field( 'share_blocks', 'option' ); ?>
		</div>
	</div>
	<div class="cf"></div>
</div>

<?php
}
add_action( 'tha_entry_content_before', 'da_event' );


// Build the page.
get_template_part( 'index' );
