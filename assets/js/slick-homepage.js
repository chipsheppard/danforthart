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
		slidesToShow: 1,
		speed: 600,
		autoplaySpeed: 6000,
	});
});
