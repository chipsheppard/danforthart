/**
 * JS for the Single Exhibit template (current,past,special collection)
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

// Initialize Masonry
jQuery( window ).load( function() {
	var container = document.querySelector( '.artworks' );
	var msnry = new Masonry( container, {
		itemSelector: '.artwork',
		columnWidth: '.artwork',
	});
});


jQuery(document).ready(function($) {
	// Close modal
	$('.close-modal').click(function() {
		$('.exhibit-modal').toggleClass('show');
	});

	// Detect windows width function
	var $window = $(window);

	function checkWidth() {
		var windowsize = $window.width();
		if (windowsize > 100) {
			// set to 767px if you don't want the modal to show on mobile devices.

			$(".modal-link").click(function(e) {
				e.preventDefault(); // prevent link from being followed
				$(window).trigger('resize'); // prevents first-screen-fuckup - https://github.com/kenwheeler/slick/issues/235
				$('.exhibit-modal').addClass('show', 1000, "easeOutSine"); // show class to display the previously hidden modal
				$("html, body").animate({ // if you're below the fold this will animate and scroll to the modal
				scrollTop: 0
				}, "slow");
				return false;
			});
		}
	}

  checkWidth(); // excute function to check width on load
  $(window).resize(checkWidth); // execute function to check width on resize
});


// SLICK IN A MODAL
jQuery(document).ready(function($) {
	var $status = $('.pagingInfo');
	var $slickElement = $('.slickeroo');

	// Write CurrentSlide / TotalSlides
	$slickElement.on('init reInit afterChange', function (event, slick, currentSlide) {
		//currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
		var i = (currentSlide ? currentSlide : 0) + 1;
		$status.text(i + '/' + slick.slideCount);
	});

	// Launch slide matching the data attribute on the image - https://codepen.io/vilcu/pen/ZQwdGQ
	$('a[data-index]').click(function(e) {
      e.preventDefault();
      var slideno = $(this).data('index');
      $('.slickeroo').slick('slickGoTo', slideno - 1);
    });

	$slickElement.slick({
		nextArrow: '.next',
		prevArrow: '.prev',
		infinite: true,
		dots: false,
		speed: 600,
	});
});
