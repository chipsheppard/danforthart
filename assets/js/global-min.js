/**
 * Global JS file
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
!function(i){var n,s,e,t;n=i("#masthead"),s=n.find(".responsive-menu-icon"),e=n.find(".site-navigation"),t=n.find(".site-navigation > div > ul"),s.length&&(s.attr("aria-expanded","false"),s.on("click",function(){e.toggleClass("toggled-on"),i(this).attr("aria-expanded",e.hasClass("toggled-on"))})),function(){function n(){"none"===i(".responsive-menu-icon").css("display")?(i(document.body).on("touchstart",function(n){i(n.target).closest(".site-navigation li").length||i(".site-navigation li").removeClass("focus")}),t.find(".menu-item-has-children > a, .page_item_has_children > a").on("touchstart",function(n){var s=i(this).parent("li");s.hasClass("focus")||(n.preventDefault(),s.toggleClass("focus"),s.siblings(".focus").removeClass("focus"))})):t.find(".menu-item-has-children > a, .page_item_has_children > a").unbind("touchstart")}t.length&&t.children().length&&("ontouchstart"in window&&(i(window).on("resize",n),n()),t.find("a").on("focus blur",function(){i(this).parents(".menu-item, .page_item").toggleClass("focus")}))}()}(jQuery),jQuery(function(n){n(".u-exhibit").find(".cssicon-plusminus").click(function(){n(this).hasClass("plus")?(n(this).removeClass("plus"),n(this).addClass("minus"),n(this).parents().children(".extended").slideDown(200)):(n(this).removeClass("minus"),n(this).addClass("plus"),n(this).parents().children(".extended").slideUp(200))})});