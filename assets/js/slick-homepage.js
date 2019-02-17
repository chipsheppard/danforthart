/**
 * JS for the homepage slider
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

jQuery(function( $ ) {
	$('.heroslider').slick({
		arrows: false,
		infinite: true,
		autoplay: true,
		pauseOnHover: false,
 		fade: true,
 		speed: 1000,
		autoplaySpeed: 5000,
	});
});
