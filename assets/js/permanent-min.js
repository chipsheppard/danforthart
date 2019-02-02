/**
 * JS for the Permanent Collection page template
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
!function(s){if(s(".opm").length){var e=s(".opm"),t=e.offset().top,o=function(){var o=s(window).scrollTop();t<=o?e.addClass("stuck"):e.removeClass("stuck")};s(window).scroll(o),o()}}(jQuery),function(t){if(t(".opm").length){var n=t(".opm-target"),a=t(".opm-sections"),i=t(".opm-menu"),c=i.outerHeight();a.find(".tp1").addClass("active"),t(window).on("scroll",function(){var e=t(this).scrollTop();n.each(function(){var o=t(this).offset().top-c,s=o+t(this).outerHeight();o<=e&&e<=s&&(i.find("a").removeClass("active"),a.find("div").removeClass("active"),n.removeClass("active"),t(this).addClass("active"),i.find('a[href="#'+t(this).attr("id")+'"]').addClass("active"),a.find(".t"+t(this).attr("id")).addClass("active"))})}),i.find("a").on("click",function(){var o,s=t(this).attr("href");return t(s).length&&t("html, body").animate({scrollTop:t(s).offset().top},500),!1})}}(jQuery);var elements=document.getElementsByClassName("artworks"),msnry;imagesLoaded(document.querySelector("body"),function(){for(var o=elements.length,s=0;s<o;s++)msnry=new Masonry(elements[s],{itemSelector:".artwork",columnWidth:".artwork"})}),jQuery(function(o){o(".cssicon-updown").click(function(){o(".cssicon-updown").hasClass("down")?(o(".cssicon-updown").removeClass("down"),o(".cssicon-updown").addClass("up"),o(".opm-menu").slideDown(200)):(o(".cssicon-updown").removeClass("up"),o(".cssicon-updown").addClass("down"),o(".opm-menu").slideUp(200))})});