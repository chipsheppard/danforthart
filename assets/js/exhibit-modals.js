/**
 * JS for Exhibit and Current modal displays
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

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
				$('.exhibit-modal').addClass('show', 1000, "easeOutSine"); // show class to display the previously hidden modal
				$("html, body").animate({ // if you're below the fold this will animate and scroll to the modal
				scrollTop: 0
				}, "slow");
				return false;
			});
		}
	};

  checkWidth(); // excute function to check width on load
  $(window).resize(checkWidth); // execute function to check width on resize
});
