/**
 * Global JS file
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
!function(a){var e,n,t,i;function s(e){var n=a("<button />",{class:"dropdown-toggle","aria-expanded":!1}).append(a("<span />",{class:"screen-reader-text",text:"Expand child menu"}));e.find(".dropdown-toggle").click(function(e){var n=a(this),t=n.find(".screen-reader-text");e.preventDefault(),n.toggleClass("toggled-on"),n.next(".sub-menu").toggleClass("toggled-on"),n.attr("aria-expanded","false"===n.attr("aria-expanded")?"true":"false"),t.text("Expand child menu"===t.text()?"Collapse child menu":"Expand child menu")})}s(a(".site-navigation")),e=a("#masthead"),n=e.find(".responsive-menu-icon"),t=e.find(".site-navigation"),i=e.find(".site-navigation > div > ul"),n.length&&(n.attr("aria-expanded","false"),n.on("click",function(){t.toggleClass("toggled-on"),a(this).attr("aria-expanded",t.hasClass("toggled-on"))})),function(){function e(){"none"===a(".responsive-menu-icon").css("display")?(a(document.body).on("touchstart",function(e){a(e.target).closest(".site-navigation li").length||a(".site-navigation li").removeClass("focus")}),i.find(".menu-item-has-children > a, .page_item_has_children > a").on("touchstart",function(e){var n=a(this).parent("li");n.hasClass("focus")||(e.preventDefault(),n.toggleClass("focus"),n.siblings(".focus").removeClass("focus"))})):i.find(".menu-item-has-children > a, .page_item_has_children > a").unbind("touchstart")}i.length&&i.children().length&&("ontouchstart"in window&&(a(window).on("resize",e),e()),i.find("a").on("focus blur",function(){a(this).parents(".menu-item, .page_item").toggleClass("focus")}))}()}(jQuery);