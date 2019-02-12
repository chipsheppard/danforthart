/**
 * Global JS file
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
!function(e){var s,i,t,n;s=e("#masthead"),i=s.find(".responsive-menu-icon"),t=s.find(".site-navigation"),n=s.find(".site-navigation > div > ul"),i.length&&(i.attr("aria-expanded","false"),i.on("click",function(){t.toggleClass("toggled-on"),e(this).attr("aria-expanded",t.hasClass("toggled-on"))})),function(){function s(){"none"===e(".responsive-menu-icon").css("display")?(e(document.body).on("touchstart",function(s){e(s.target).closest(".site-navigation li").length||e(".site-navigation li").removeClass("focus")}),n.find(".menu-item-has-children > a, .page_item_has_children > a").on("touchstart",function(s){var i=e(this).parent("li");i.hasClass("focus")||(s.preventDefault(),i.toggleClass("focus"),i.siblings(".focus").removeClass("focus"))})):n.find(".menu-item-has-children > a, .page_item_has_children > a").unbind("touchstart")}n.length&&n.children().length&&("ontouchstart"in window&&(e(window).on("resize",s),s()),n.find("a").on("focus blur",function(){e(this).parents(".menu-item, .page_item").toggleClass("focus")}))}()}(jQuery),jQuery(function(s){s(".u-exhibit").find(".cssicon-plusminus").click(function(){s(this).hasClass("plus")?(s(this).removeClass("plus"),s(this).addClass("minus"),s(this).parents().children(".extended").slideDown(200)):(s(this).removeClass("minus"),s(this).addClass("plus"),s(this).parents().children(".extended").slideUp(200))})}),jQuery(function(s){s(".viewmore").click(function(){s(".cssicon-plusminus").hasClass("plus")?(s(".cssicon-plusminus").removeClass("plus"),s(".cssicon-plusminus").addClass("minus"),s(".x-past-exhibits, .row-bottom, .x-events").slideDown(200)):(s(".cssicon-plusminus").removeClass("minus"),s(".cssicon-plusminus").addClass("plus"),s(".x-past-exhibits, .row-bottom, .x-events").slideUp(200))})}),jQuery(function(s){s(".course-overview-box").find(".trigger").click(function(){s(this).hasClass("plus")?(s(this).removeClass("plus"),s(this).addClass("minus"),s(this).closest(".course-overview-box").addClass("active"),s(this).parents().children(".box-bottom").slideDown(200)):(s(this).removeClass("minus"),s(this).addClass("plus"),s(this).closest(".course-overview-box").removeClass("active"),s(this).parents().children(".box-bottom").slideUp(200))}),s(".course-overview-box").find(".box-close").click(function(){s(this).closest(".course-overview-box").removeClass("active"),s(this).parents().children(".box-bottom").slideUp(200)})}),jQuery(function(s){s(".course-row").find(".opener").click(function(){s(this).hasClass("plus")?(s(this).removeClass("plus"),s(this).addClass("minus"),s(this).closest(".course-row").addClass("active"),s(this).parents().children(".row-bottom").slideDown(200)):(s(this).removeClass("minus"),s(this).addClass("plus"),s(this).closest(".course-row").removeClass("active"),s(this).parents().children(".row-bottom").slideUp(200))})}),jQuery(function(s){s(".tt1").click(function(){s(this).hasClass("active")||(s(this).addClass("active"),s(".tb1").addClass("active"),s(".tt2").removeClass("active"),s(".tb2").removeClass("active"))}),s(".tt2").click(function(){s(this).hasClass("active")||(s(this).addClass("active"),s(".tb2").addClass("active"),s(".tt1").removeClass("active"),s(".tb1").removeClass("active"))})}),jQuery(function(s){s(".accordion").find(".cssicon-plusminus").click(function(){s(this).hasClass("plus")?(s(this).removeClass("plus"),s(this).addClass("minus"),s(this).closest(".accordion").addClass("active"),s(this).parents().children(".acbot").slideDown(200)):(s(this).removeClass("minus"),s(this).addClass("plus"),s(this).closest(".accordion").removeClass("active"),s(this).parents().children(".acbot").slideUp(200))})});