/**
 * JS for the Single Exhibit template (current,past,special collection)
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
jQuery(window).load(function(){var e=document.querySelector(".artworks"),n=new Masonry(e,{itemSelector:".artwork",columnWidth:".artwork"})}),jQuery(document).ready(function(e){e(".close-modal").click(function(){e(".exhibit-modal").toggleClass("show")});var n=e(window);function i(){var i;n.width()>100&&e(".modal-link").click(function(n){return n.preventDefault(),e(window).trigger("resize"),e(".exhibit-modal").addClass("show",1e3,"easeOutSine"),!1})}i(),e(window).resize(i)}),jQuery(document).ready(function(e){var n=e(".pagingInfo"),i=e(".slickeroo");i.on("init reInit afterChange",function(e,i,o){var t=(o||0)+1;n.text(t+"/"+i.slideCount)}),e("a[data-index]").click(function(n){n.preventDefault();var i=e(this).data("index");e(".slickeroo").slick("slickGoTo",i-1,!0)}),i.slick({nextArrow:".next",prevArrow:".prev",infinite:!0,dots:!1,speed:600})});