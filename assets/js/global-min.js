/**
 * Global JS file
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
!function(i){var s,n,e,t;s=i("#masthead"),n=s.find(".responsive-menu-icon"),e=s.find(".site-navigation"),t=s.find(".site-navigation > div > ul"),n.length&&(n.attr("aria-expanded","false"),n.on("click",function(){e.toggleClass("toggled-on"),i(this).attr("aria-expanded",e.hasClass("toggled-on"))})),function(){function s(){"none"===i(".responsive-menu-icon").css("display")?(i(document.body).on("touchstart",function(s){i(s.target).closest(".site-navigation li").length||i(".site-navigation li").removeClass("focus")}),t.find(".menu-item-has-children > a, .page_item_has_children > a").on("touchstart",function(s){var n=i(this).parent("li");n.hasClass("focus")||(s.preventDefault(),n.toggleClass("focus"),n.siblings(".focus").removeClass("focus"))})):t.find(".menu-item-has-children > a, .page_item_has_children > a").unbind("touchstart")}t.length&&t.children().length&&("ontouchstart"in window&&(i(window).on("resize",s),s()),t.find("a").on("focus blur",function(){i(this).parents(".menu-item, .page_item").toggleClass("focus")}))}()}(jQuery),jQuery(function(s){s(".l").hide(),s(".cssicon-plusminus").click(function(){s(this).hasClass("plus")?(s(this).removeClass("plus"),s(this).addClass("minus"),s(".extended").slideDown(200)):(s(this).removeClass("minus"),s(this).addClass("plus"),s(".extended").slideUp(200))})});