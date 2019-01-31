/**
 * Global JS file
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

// Navigation -------------------------------------------
(function( $ ) {
	var masthead, menuToggle, siteNavContain, siteNavigation;

	masthead       = $( '#masthead' );
	menuToggle     = masthead.find( '.responsive-menu-icon' );
	siteNavContain = masthead.find( '.site-navigation' );
	siteNavigation = masthead.find( '.site-navigation > div > ul' );

	(function() {

		if ( ! menuToggle.length ) {
			return;
		}

		menuToggle.attr( 'aria-expanded', 'false' );

		menuToggle.on( 'click', function() {
			siteNavContain.toggleClass( 'toggled-on' );

			$( this ).attr( 'aria-expanded', siteNavContain.hasClass( 'toggled-on' ) );
		});
	})();

	(function() {
		if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
			return;
		}

		function toggleFocusClassTouchScreen() {
			if ( 'none' === $( '.responsive-menu-icon' ).css( 'display' ) ) {

				$( document.body ).on( 'touchstart', function( e ) {
					if ( ! $( e.target ).closest( '.site-navigation li' ).length ) {
						$( '.site-navigation li' ).removeClass( 'focus' );
					}
				} );

				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' )
					.on( 'touchstart', function( e ) {
						var el = $( this ).parent( 'li' );

						if ( ! el.hasClass( 'focus' ) ) {
							e.preventDefault();
							el.toggleClass( 'focus' );
							el.siblings( '.focus' ).removeClass( 'focus' );
						}
					} );

			} else {
				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).unbind( 'touchstart' );
			}
		}

		if ( 'ontouchstart' in window ) {
			$( window ).on( 'resize', toggleFocusClassTouchScreen );
			toggleFocusClassTouchScreen();
		}

		siteNavigation.find( 'a' ).on( 'focus blur', function() {
			$( this ).parents( '.menu-item, .page_item' ).toggleClass( 'focus' );
		} );
	} )();
} )( jQuery );



// Project List show/hide -------------------------------
jQuery(function( $ ){
	$('.u-exhibit').find('.cssicon-plusminus').click(function() {
		if ( $(this).hasClass( 'plus' ) ) {
			$(this).removeClass( 'plus' );
			$(this).addClass( 'minus' );
			$(this).parents().children('.extended').slideDown(200);
		} else {
			$(this).removeClass( 'minus' );
			$(this).addClass( 'plus' );
			$(this).parents().children('.extended').slideUp(200);
		}
	} );
} );


// Extended Exhibits show/hide --------------------------
jQuery(function( $ ){
	$('.viewmore').click(function() {
		if ( $('.cssicon-plusminus').hasClass( 'plus' ) ) {
			$('.cssicon-plusminus').removeClass( 'plus' );
			$('.cssicon-plusminus').addClass( 'minus' );
			$('.x-past-exhibits').slideDown(200);
		} else {
			$('.cssicon-plusminus').removeClass( 'minus' );
			$('.cssicon-plusminus').addClass( 'plus' );
			$('.x-past-exhibits').slideUp(200);
		}
	} );
} );
