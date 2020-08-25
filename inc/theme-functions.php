<?php
/**
 * Theme Functions
 *
 * @package  danforthart
 * @subpackage danforthart/inc
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/*
 * DISPLAY Branding
 * -----------------------------------------------------------------
 */
if ( ! function_exists( 'danforthart_display_branding' ) ) {
	/**
	 * Get the branding markup
	 */
	function danforthart_display_branding() {
		echo '<div class="site-branding">';

		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
		$sitename       = get_bloginfo( 'name', 'display' );
		$logoheight     = absint( $logo[2] );
		$logowidth      = absint( $logo[1] );
		$description    = get_bloginfo( 'description', 'display' );

		if ( has_custom_logo() ) {
			echo '<div class="custom-logo">';
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img src="' . esc_url( $logo[0] ) . '" height="' . esc_html( $logoheight ) . '" width="' . esc_html( $logowidth ) . '" alt="' . esc_html( $sitename ) . '"></a>';
			echo '</div>';
		} else {
			if ( is_front_page() && is_home() ) :
				echo '<h1 class="site-title">' . esc_html( $sitename ) . '</h1>';
			else :
				echo '<div class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( $sitename ) . '</a></div>';
			endif;
		}

		if ( $description || is_customize_preview() ) :
			echo '<div class="site-description">' . esc_html( $description ) . '</div>';
		endif;
		echo '</div>';
	}
}
add_action( 'tha_header_top', 'danforthart_display_branding' );


/*
 * DISPLAY Navigation
 * -----------------------------------------------------------------
 */
if ( ! function_exists( 'danforthart_display_nav' ) ) {
	/**
	 * Get the menu
	 * write the markup if conditions are met.
	 */
	function danforthart_display_nav() {

		if ( ! has_nav_menu( 'primary' ) ) {
			return;
		}

		echo '<nav id="primary-navigation" class="site-navigation" role="navigation">';
			echo '<div class="m-top">';
			display_parent();
			echo '<button class="responsive-menu-icon" aria-controls="mobile-navigation" aria-expanded="false"><div class="menu-icon-wrap"><div class="menu-icon"></div></div></button>';
			echo '</div>';
			echo '<div class="menu-wrap">';

				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => '',
					)
				);

			echo '</div>';
		echo '</nav>';
	}
}
add_action( 'tha_header_top', 'danforthart_display_nav' );


/**
 * DISPLAY the parent page name ( in header )  ???????????????
 * added esc_html() 06/19/2020
 */
function display_parent() {
	global $post;

	if ( is_singular( 'artwork' ) ) :
		printf( '<span class="section-title">%s</span>', 'SEE ART' );
	elseif ( is_singular( 'exhibition' ) ) :
		printf( '<span class="section-title">%s</span>', 'SEE ART' );
	elseif ( is_singular( 'event' ) ) :
		printf( '<span class="section-title">%s</span>', 'VISIT' );
	elseif ( is_404() ) :
		printf( '<span class="section-title">%s</span>', 'NOT FOUND' );
	elseif ( is_home() ) :
		printf( '<span class="section-title">%s</span>', 'Posts' );
	else :
		$parent = $post->post_parent;
		if ( $parent ) :
			printf( '<span class="section-title">%s</span>', esc_html( get_the_title( $parent ) ) );
		else :
			printf( '<span class="section-title">%s</span>', esc_html( get_the_title() ) );
		endif;
	endif;
}

/*
 * DISPLAY Read More link
-----------------------------------------------------------------
*/
if ( ! function_exists( 'danforthart_display_read_more' ) ) {
	/**
	 * The Read More link markup
	 */
	function danforthart_display_read_more() {
		if ( is_archive() || is_home() || is_search() ) :
			$link = sprintf(
				'<footer class="link-more"><a href="%1$s" class="more-link arrow">%2$s</a></footer>',
				get_permalink( get_the_ID() ),
				/* translators: %s: Name of current post */
				sprintf( __( 'Read more<span class="screen-reader-text"> "%s"</span>', 'danforthart' ), get_the_title( get_the_ID() ) )
			);
			echo wp_kses_post( $link );
			echo '<div class="cf"></div>';
		endif;
	}
}
add_action( 'tha_entry_bottom', 'danforthart_display_read_more' );


/*
 * TOP FOOTER
 * -----------------------------------------------------------------
 */
if ( ! function_exists( 'danforthart_display_top_footer' ) ) {
	/**
	 * The Site Footer MArkup
	 */
	function danforthart_display_top_footer() {

		if ( is_active_sidebar( 'footer-t1' ) || is_active_sidebar( 'footer-t2' ) || is_active_sidebar( 'footer-t3' ) ) {
			echo '<div class="footer-widgets">';
			echo '<div class="inner-wrap">';
			echo '<div class="footer-top">';
			if ( is_active_sidebar( 'footer-t0' ) ) {
				dynamic_sidebar( 'footer-t0' );
			}
			echo '</div>';
			echo '<div class="widget-row">';
			echo '<div class="widget-row-widget">';
			if ( is_active_sidebar( 'footer-t1' ) ) {
				dynamic_sidebar( 'footer-t1' );
			}
			echo '</div>';
			echo '<div class="widget-row-widget">';
			if ( is_active_sidebar( 'footer-t2' ) ) {
				dynamic_sidebar( 'footer-t2' );
			}
			echo '</div>';
			echo '<div class="widget-row-widget">';
			if ( is_active_sidebar( 'footer-t3' ) ) {
				dynamic_sidebar( 'footer-t3' );
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	}
}
add_action( 'tha_footer_top', 'danforthart_display_top_footer' );

/*
 * LOWER FOOTER
 * -----------------------------------------------------------------
 */
if ( ! function_exists( 'danforthart_display_lower_footer' ) ) {
	/**
	 * The Site Footer MArkup
	 */
	function danforthart_display_lower_footer() {
		if ( is_active_sidebar( 'footer-l1' ) || is_active_sidebar( 'footer-l3' ) ) {
			echo '<div class="site-info">';
			echo '<div class="inner-wrap">';
			echo '<div class="col-1-3 first">';
			if ( is_active_sidebar( 'footer-l1' ) ) {
				dynamic_sidebar( 'footer-l1' );
			}
			echo '</div>';
			echo '<div class="col-2-3">';
			if ( is_active_sidebar( 'footer-l2' ) ) {
				dynamic_sidebar( 'footer-l2' );
			}
			echo '</div>';
			echo '<div class="cf"></div>';
			echo '</div>';
		} else {
			echo '<div class="site-info">';
			echo '<p>"' . esc_html( DANFORTHART_THEME_NAME ) . '" by <a href="' . esc_html( DANFORTHART_AUTHOR_LINK ) . '">' . esc_html( DANFORTHART_AUTHOR_NAME ) . '</a></p>';
			echo '<div class="cf"></div>';
			echo '</div>';
			echo '</div>';
		}
	}
}
add_action( 'tha_footer_bottom', 'danforthart_display_lower_footer' );


/*
 * DISPLAY Header Widget
 * -----------------------------------------------------------------
 */
if ( ! function_exists( 'danforthart_display_header_widget' ) ) {
	/**
	 * The Header Widget.
	 */
	function danforthart_display_header_widget() {
		if ( ! is_front_page() ) :
			return;
		elseif ( is_active_sidebar( 'header' ) ) :
			echo '<div class="header-widget-wrap">';
				dynamic_sidebar( 'header' );
			echo '</div>';
		endif;
	}
}
add_action( 'tha_header_before', 'danforthart_display_header_widget' );
