/**
 * JS for the Single Exhibit template (current,past,special collection)
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
jQuery(window).load((function(){var e=document.querySelector(".artworks"),i=new Masonry(e,{itemSelector:".artwork",columnWidth:".artwork"})})),jQuery(document).ready((function(e){e(".close-modal").click((function(){e(".exhibit-modal").toggleClass("show")}));var i=e(window);function n(){var n;i.width()>100&&e(".modal-link").click((function(i){return i.preventDefault(),e(window).trigger("resize"),e(".exhibit-modal").addClass("show",1e3,"easeOutSine"),!1}))}n(),e(window).resize(n)})),jQuery(document).ready((function(e){var i=e(".pagingInfo"),n=e(".slickeroo");n.on("init reInit afterChange",(function(e,n,o){var t=(o||0)+1;i.text(t+"/"+n.slideCount)})),e("a[data-index]").click((function(i){i.preventDefault();var n=e(this).data("index");e(".slickeroo").slick("slickGoTo",n-1,!0)})),n.slick({nextArrow:".slick-next",prevArrow:".slick-prev",infinite:!0,dots:!1,speed:600})}));