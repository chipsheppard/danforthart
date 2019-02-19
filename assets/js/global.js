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
			$('.x-past-exhibits, .row-bottom, .x-events').slideDown(200);
		} else {
			$('.cssicon-plusminus').removeClass( 'minus' );
			$('.cssicon-plusminus').addClass( 'plus' );
			$('.x-past-exhibits, .row-bottom, .x-events').slideUp(200);
		}
	} );
} );


// Course Overview List (learn+create) -------------------------------
jQuery(function( $ ){
	$('.course-overview-box').find('.trigger').click(function() {
		if ( $(this).hasClass( 'plus' ) ) {
			$(this).removeClass( 'plus' );
			$(this).addClass( 'minus' );
			$(this).closest('.course-overview-box').addClass('active');
			$(this).parents().children('.box-bottom').slideDown(200);
		} else {
			$(this).removeClass( 'minus' );
			$(this).addClass( 'plus' );
			$(this).closest('.course-overview-box').removeClass('active');
			$(this).parents().children('.box-bottom').slideUp(200);
		}
	} );
	$('.course-overview-box').find('.box-close').click(function() {
		$(this).closest('.course-overview-box').removeClass('active');
		$(this).parents().children('.box-bottom').slideUp(200);
	} );
} );

// Course List show/hide -------------------------------
jQuery(function( $ ){
	$('.course-row').find('.opener').click(function() {
		$('.row-bottom').hide();
		$('.course-row').removeClass('active');
		if ( $(this).hasClass( 'plus' ) ) {
			$('.opener').removeClass( 'minus' );
			$('.opener').addClass( 'plus' );
			$(this).removeClass( 'plus' );
			$(this).addClass( 'minus' );
			$(this).closest('.course-row').addClass('active');
			$(this).parents().children('.row-bottom').slideDown(200);
		} else {
			$(this).removeClass( 'minus' );
			$(this).addClass( 'plus' );
			//$(this).closest('.course-row').removeClass('active');
			$(this).parents().children('.row-bottom').slideUp(200);
		}
	} );
} );

// TABs -------------------------------
jQuery(function( $ ){
	$('.tt1').click(function() {
		if ( $(this).hasClass( 'active' ) ) {
			return;
		} else {
			$(this).addClass( 'active' );
			$('.tt2').removeClass( 'active' );
			$('.tb1').show();
			$('.tb2').hide();
		}
	} );
	$('.tt2').click(function() {
		//$('.tb2').removeAttr( 'style' );
		if ( $(this).hasClass( 'active' ) ) {
			return;
		} else {
			$(this).addClass( 'active' );
			$('.tt1').removeClass( 'active' );
			$('.tb2').show();
			$('.tb1').hide();
		}
	} );
} );

// ACCORDIONs -------------------------------
jQuery(function( $ ){
	$('.accordion').find('.cssicon-plusminus').click(function() {
		if ( $(this).hasClass( 'plus' ) ) {
			$(this).removeClass( 'plus' );
			$(this).addClass( 'minus' );
			$(this).closest('.accordion').addClass('active');
			$(this).parents().children('.acbot').slideDown(200);
		} else {
			$(this).removeClass( 'minus' );
			$(this).addClass( 'plus' );
			$(this).closest('.accordion').removeClass('active');
			$(this).parents().children('.acbot').slideUp(200);
		}
	} );
} );

// Team Member List show/hide -------------------------------
jQuery(function( $ ) {
	$('.mem-row').find('.member').click(function() {

		member = $(this).data('team');

		if ( $(this).hasClass( 'active' ) ) {
			$(this).removeClass( 'active' );
			if(window.innerWidth > 768) {
				$('.mem-content-desk').slideUp(200);
			}
			if(window.innerWidth < 769) {
		        $('.mem-content-mobile').slideUp(200);
			}
		} else {
			$('.member').removeClass( 'active' ); // close all.
			$(this).addClass( 'active' ); // activate this one.
			if(window.innerWidth > 768) {
				$('.mem-content-desk').slideUp(200);
				$(this).parent().children('.' + member).slideDown(200);
			}
			if(window.innerWidth < 769) {
		        $('.mem-content-mobile').slideUp(200);
				$(this).children('.mem-content-mobile').slideDown(200);
			}
		}
	});

	$(window).resize(function(){
		//if(window.innerWidth < 769) {
			$('.mem-content-mobile').hide();
			$('.member').removeClass( 'active' );
			$('.mem-content-desk').hide();
		//}
	});
});

// Header Widget -------------------------------
// FIRST display:none the header.
// It will only be there if the widget area is used.
// https://www.w3schools.com/html/html5_webstorage.asp
jQuery(function( $ ) {
	// then setup the session var.
	var data = sessionStorage.getItem('clicked');
	// if session var is not set show the header.
	if (data != 'true') {
		$('.header-widget-wrap').show();
		$('.header-widget-wrap').find('.close').click(function() {
			$('.header-widget-wrap').slideUp(200);
			sessionStorage.setItem('clicked', true);
		});
	}
});



// PRINT PAGE functions -------------------------------
function printDiv(divName) {
	var printContents = document.getElementById(divName).innerHTML;
	var originalContents = document.body.innerHTML;
	document.body.innerHTML = printContents;
	window.print();
	document.body.innerHTML = originalContents;
}
