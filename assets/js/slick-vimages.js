/**
 * JS for the variable images slider
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

jQuery(function( $ ) {

    var $c1 = $('.v1');
    var $c2 = $('.v2');

    $(window).on("resize",function() {  
        if($(window).width()<769){
            $c1.not('.slick-initialized').slick( {
                slide: '.variable-image',
            });
            $c2.not('.slick-initialized').slick( {
                slide: '.variable-image',
            });
        } else {
            $c1.filter('.slick-initialized').slick('unslick');
            $c2.filter('.slick-initialized').slick('unslick');
        }
    }).resize();
});
