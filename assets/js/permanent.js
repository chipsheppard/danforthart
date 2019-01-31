/**
 * JS for the Permanent Collection page template
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


// Initialize Masonry
var elements = document.getElementsByClassName('artworks');
var msnry;

imagesLoaded( document.querySelector('body'), function() {
  // init Isotope after all images have loaded
  var n = elements.length;
  for(var i = 0; i < n; i++){
    msnry = new Masonry( elements[i], {
      itemSelector: '.artwork',
      columnWidth: '.artwork',
    });
  }
});

// On Page Menu show/hide --------------------------
jQuery(function( $ ){
	$('.cssicon-updown').click(function() {
		if ( $('.cssicon-updown').hasClass( 'down' ) ) {
			$('.cssicon-updown').removeClass( 'down' );
			$('.cssicon-updown').addClass( 'up' );
			$('.opm-menu').slideDown(200);
		} else {
			$('.cssicon-updown').removeClass( 'up' );
			$('.cssicon-updown').addClass( 'down' );
			$('.opm-menu').slideUp(200);
		}
	} );
} );
