/**
 * Global JS file
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
function printDiv(s){var e=document.getElementById(s).innerHTML,i=document.body.innerHTML;document.body.innerHTML=e,window.print(),document.body.innerHTML=i}!function(s){var e,i,n,o;e=s("#masthead"),i=e.find(".responsive-menu-icon"),n=e.find(".site-navigation"),o=e.find(".site-navigation > div > ul"),i.length&&(i.attr("aria-expanded","false"),i.on("click",function(){n.toggleClass("toggled-on"),s(this).attr("aria-expanded",n.hasClass("toggled-on"))})),function(){function e(){"none"===s(".responsive-menu-icon").css("display")?(s(document.body).on("touchstart",function(e){s(e.target).closest(".site-navigation li").length||s(".site-navigation li").removeClass("focus")}),o.find(".menu-item-has-children > a, .page_item_has_children > a").on("touchstart",function(e){var i=s(this).parent("li");i.hasClass("focus")||(e.preventDefault(),i.toggleClass("focus"),i.siblings(".focus").removeClass("focus"))})):o.find(".menu-item-has-children > a, .page_item_has_children > a").unbind("touchstart")}o.length&&o.children().length&&("ontouchstart"in window&&(s(window).on("resize",e),e()),o.find("a").on("focus blur",function(){s(this).parents(".menu-item, .page_item").toggleClass("focus")}))}()}(jQuery),jQuery(function(s){s(".u-exhibit").find(".ue-upper").click(function(){s(this).find(".cssicon-plusminus").hasClass("plus")?(s(this).closest(".u-exhibit").addClass("active"),s(this).find(".cssicon-plusminus").removeClass("plus"),s(this).find(".cssicon-plusminus").addClass("minus"),s(this).parents().children(".extended").slideDown(200)):(s(this).closest(".u-exhibit").removeClass("active"),s(this).find(".cssicon-plusminus").removeClass("minus"),s(this).find(".cssicon-plusminus").addClass("plus"),s(this).parents().children(".extended").slideUp(200))})}),jQuery(function(s){s(".viewmore").click(function(){s(".cssicon-plusminus").hasClass("plus")?(s(".cssicon-plusminus").removeClass("plus"),s(".cssicon-plusminus").addClass("minus"),s(".x-past-exhibits, .row-bottom, .x-events").slideDown(200)):(s(".cssicon-plusminus").removeClass("minus"),s(".cssicon-plusminus").addClass("plus"),s(".x-past-exhibits, .row-bottom, .x-events").slideUp(200))})}),jQuery(function(s){s(".course-overview-box").find(".c-title").click(function(){s(this).find(".cssicon-plusminus").hasClass("plus")?(s(this).find(".cssicon-plusminus").removeClass("plus"),s(this).find(".cssicon-plusminus").addClass("minus"),s(this).closest(".course-overview-box").addClass("active"),s(this).parents().children(".box-bottom").slideDown(200)):(s(this).find(".cssicon-plusminus").removeClass("minus"),s(this).find(".cssicon-plusminus").addClass("plus"),s(this).closest(".course-overview-box").removeClass("active"),s(this).parents().children(".box-bottom").slideUp(200))}),s(".course-overview-box").find(".box-close").click(function(){s(this).closest(".course-overview-box").removeClass("active"),s(".box-top .cssicon-plusminus").removeClass("minus"),s(".box-top .cssicon-plusminus").addClass("plus"),s(this).parents().children(".box-bottom").slideUp(200)})}),jQuery(function(s){s(".course-row").find(".opener").click(function(){s(".row-bottom").hide(),s(".course-row").removeClass("active"),s(this).hasClass("plus")?(s(".opener").removeClass("minus"),s(".opener").addClass("plus"),s(this).removeClass("plus"),s(this).addClass("minus"),s(this).closest(".course-row").addClass("active"),s(this).parents().children(".row-bottom").slideDown(200)):(s(this).removeClass("minus"),s(this).addClass("plus"),s(this).parents().children(".row-bottom").slideUp(200))})}),jQuery(function(s){s(".course-row").find(".opener2").click(function(){s(".row-bottom").hide(),s(".course-row").removeClass("active"),s(this).closest(".course-row").find(".opener").hasClass("plus")?(s(".opener").removeClass("minus"),s(".opener").addClass("plus"),s(this).closest(".course-row").find(".opener").removeClass("plus"),s(this).closest(".course-row").find(".opener").addClass("minus"),s(this).closest(".course-row").addClass("active"),s(this).parents().children(".row-bottom").slideDown(200)):(s(this).closest(".course-row").find(".opener").removeClass("minus"),s(this).closest(".course-row").find(".opener").addClass("plus"),s(this).parents().children(".row-bottom").slideUp(200))})}),jQuery(function(s){s(".accordion").find(".actop").click(function(){s(this).find(".cssicon-plusminus").hasClass("plus")?(s(this).find(".cssicon-plusminus").removeClass("plus"),s(this).find(".cssicon-plusminus").addClass("minus"),s(this).closest(".accordion").addClass("active"),s(this).parents().children(".acbot").slideDown(200)):(s(this).find(".cssicon-plusminus").removeClass("minus"),s(this).find(".cssicon-plusminus").addClass("plus"),s(this).closest(".accordion").removeClass("active"),s(this).parents().children(".acbot").slideUp(200))})}),jQuery(function(s){s(".mem-row").find(".member").click(function(){var e;e=s(this).data("team"),s(this).hasClass("active")?(s(this).removeClass("active"),window.innerWidth>768&&s(".mem-content-desk").slideUp(200),window.innerWidth<769&&s(".mem-content-mobile").slideUp(200)):(s(".member").removeClass("active"),s(this).addClass("active"),window.innerWidth>768&&(s(".mem-content-desk").slideUp(200),s(this).parent().children("."+e).slideDown(200)),window.innerWidth<769&&(s(".mem-content-mobile").slideUp(200),s(this).children(".mem-content-mobile").slideDown(200)))}),s(window).resize(function(){s(".mem-content-mobile").hide(),s(".member").removeClass("active"),s(".mem-content-desk").hide()})}),jQuery(function(s){var e;"true"!==sessionStorage.getItem("clicked")&&(s(".header-widget-wrap").show(),s(".header-widget-wrap").find(".close").click(function(){s(".header-widget-wrap").slideUp(200),sessionStorage.setItem("clicked",!0)}))}),jQuery(function(s){s("input.search-field").attr("placeholder","What're you looking for?")});