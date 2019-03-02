/**
 * JS for the Single Exhibit template (current,past,special collection)
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
jQuery(window).load(function(){var e=document.querySelector(".artworks"),n=new Masonry(e,{itemSelector:".artwork",columnWidth:".artwork"})}),jQuery(document).ready(function(n){n(".close-modal").click(function(){n(".exhibit-modal").toggleClass("show")});var i=n(window);function e(){var e;100<i.width()&&n(".modal-link").click(function(e){return e.preventDefault(),n(window).trigger("resize"),n(".exhibit-modal").addClass("show",1e3,"easeOutSine"),!1})}e(),n(window).resize(e)}),jQuery(document).ready(function(i){var t=i(".pagingInfo"),e=i(".slickeroo");e.on("init reInit afterChange",function(e,n,i){var o=(i||0)+1;t.text(o+"/"+n.slideCount)}),i("a[data-index]").click(function(e){e.preventDefault();var n=i(this).data("index");i(".slickeroo").slick("slickGoTo",n-1)}),e.slick({nextArrow:".next",prevArrow:".prev",infinite:!0,dots:!1,speed:600})});