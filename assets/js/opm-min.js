/**
 * JS for On-Page Menus
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
!function(o){if(o(".opm").length){var n=o(".opm"),t=n.offset().top,s=function(){var s=o(window).scrollTop();t<=s?n.addClass("stuck"):n.removeClass("stuck")};o(window).scroll(s),s()}}(jQuery),function(t){if(t(".opm").length){var i=t(".opm-target"),e=t(".opm-sections"),a=t(".opm-menu"),c=a.outerHeight();e.find(".tp1").addClass("active"),t(window).on("scroll",function(){var n=t(this).scrollTop();i.each(function(){var s=t(this).offset().top-c,o=s+t(this).outerHeight();s<=n&&n<=o&&(a.find("a").removeClass("active"),e.find("div").removeClass("active"),i.removeClass("active"),t(this).addClass("active"),a.find('a[href="#'+t(this).attr("id")+'"]').addClass("active"),e.find(".t"+t(this).attr("id")).addClass("active"))})}),a.find("a").on("click",function(){var s,o=t(this).attr("href");return t(o).length&&t("html, body").animate({scrollTop:t(o).offset().top},500),!1})}}(jQuery),jQuery(function(s){s(".cssicon-updown, .permcat").click(function(){s(".cssicon-updown").hasClass("down")?(s(".cssicon-updown").removeClass("down"),s(".cssicon-updown").addClass("up"),s(".opm-sections").addClass("open"),s(".opm-menu").slideDown(100)):(s(".cssicon-updown").removeClass("up"),s(".cssicon-updown").addClass("down"),s(".opm-sections").removeClass("open"),s(".opm-menu").slideUp(100))})});