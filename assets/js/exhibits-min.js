/**
 * JS for the Single Exhibit template (current,past,special collection)
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
jQuery(window).load(function(){var e=document.querySelector(".artworks"),o=new Masonry(e,{itemSelector:".artwork",columnWidth:".artwork"})}),jQuery(document).ready(function(o){o(".close-modal").click(function(){o(".exhibit-modal").toggleClass("show")});var n=o(window);function e(){var e;100<n.width()&&o(".modal-link").click(function(e){return e.preventDefault(),o(window).trigger("resize"),o(".exhibit-modal").addClass("show",1e3,"easeOutSine"),o("html, body").animate({scrollTop:0},"slow"),!1})}e(),o(window).resize(e)}),jQuery(document).ready(function(n){var t=n(".pagingInfo"),e=n(".slickeroo");e.on("init reInit afterChange",function(e,o,n){var i=(n||0)+1;t.text(i+"/"+o.slideCount)}),n("a[data-index]").click(function(e){e.preventDefault();var o=n(this).data("index");n(".slickeroo").slick("slickGoTo",o-1)}),e.slick({nextArrow:".next",prevArrow:".prev",infinite:!0,dots:!1,speed:600})});