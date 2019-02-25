/**
 * JS for On-Page Menus
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

// On-Page menus ---------------------------------------
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
	titles = $('.opm-sections'),
	nav = $('.opm-menu'),
		nav_height = nav.outerHeight();
	titles.find('.tp1').addClass('active');

		$(window).on('scroll', function () {
			var cur_pos = $(this).scrollTop();

			sections.each(function() {
				var top = $(this).offset().top - nav_height,
				    bottom = top + $(this).outerHeight();

				if (cur_pos >= top && cur_pos <= bottom) {
					nav.find('a').removeClass('active');
				titles.find('div').removeClass('active'),
					sections.removeClass('active');

					$(this).addClass('active');
				nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
				titles.find('.t'+$(this).attr('id')).addClass('active');
				}
		 	});
		});

		nav.find('a').on('click', function () {
			var $el = $(this),
			id = $el.attr('href');

		if ($(id).length ) {
 			$('html, body').animate({
 				scrollTop: $(id).offset().top
 			}, 500);
		}

			return false;
		});

	} else {
		return;
	}
} )( jQuery );


// On Page Menu show/hide --------------------------
jQuery(function( $ ){
	$('.cssicon-updown, .permcat').click(function() {
		if ( $('.cssicon-updown').hasClass( 'down' ) ) {
			$('.cssicon-updown').removeClass( 'down' );
			$('.cssicon-updown').addClass( 'up' );
			$('.opm-sections').addClass( 'open' );
			$('.opm-menu').slideDown(100);
		} else {
			$('.cssicon-updown').removeClass( 'up' );
			$('.cssicon-updown').addClass( 'down' );
			$('.opm-sections').removeClass( 'open' );
			$('.opm-menu').slideUp(100);
		}
	} );
} );
