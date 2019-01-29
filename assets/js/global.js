/**
 * Global JS file
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

/*
 * Navigation
 */
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



/*
 * Project List show/hide
 */
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

/*
 * Extended Exhibits show/hide
 */
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

/**
 * On-Page menus ---------------------------------------
 *
 */
(function( $ ) {
	/*
	 * Sticky On-Page Menu
	 *
	 * @link https://codepen.io/jovanivezic/pen/ZQNdag
	 */
	if ($('.opm').length ) {

		var $anchor = $('.opm');
		var ot = $anchor.offset().top;
		var move = function() {
			var st = $(window).scrollTop();
			//if(window.innerWidth > 640) {
				if(st >= ot) {
					$anchor.addClass('stuck');
				} else {
					$anchor.removeClass('stuck');
				}
			//}
		};

		$(window).scroll(move);
		move();

	} else {
		return;
	}
} )( jQuery );

(function( $ ) {
	/**
	 * Smooth Scroll for OnPage Menus
	 *
	 * @link http://cssdeck.com/labs/setting-active-states-on-sticky-navigations-while-scrolling
	 * @link https://codepen.io/rishabhp/pen/aNXVbQ
	 */
	if ($('.opm').length ) {
		var sections = $('.opm-target'),
		nav = $('.onpage-menu'),
		nav_height = nav.outerHeight();

		$(window).on('scroll', function () {
			var cur_pos = $(this).scrollTop();

			sections.each(function() {
				var top = $(this).offset().top - nav_height,
				    bottom = top + $(this).outerHeight();

				if (cur_pos >= top && cur_pos <= bottom) {
					nav.find('a').removeClass('active');
					sections.removeClass('active');

					$(this).addClass('active');
					nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
				}
		 	});
		});

		nav.find('a').on('click', function () {
			var $el = $(this),
			id = $el.attr('href');
			//alert(id);
			$('html, body').animate({
				scrollTop: $(id).offset().top
			}, 500);

			return false;
		});

	} else {
		return;
	}
} )( jQuery );
