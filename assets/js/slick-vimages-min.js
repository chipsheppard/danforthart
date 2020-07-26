/**
 * JS for the variable images slider
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
jQuery((function(i){var l=i(".v1"),e=i(".v2");i(window).on("resize",(function(){i(window).width()<769?(l.not(".slick-initialized").slick({slide:".variable-image"}),e.not(".slick-initialized").slick({slide:".variable-image"})):(l.filter(".slick-initialized").slick("unslick"),e.filter(".slick-initialized").slick("unslick"))})).resize()}));