/**
 * JS for the Permanent Collection page template
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
!function(s){if(s(".opm").length){var e=s(".opm"),n=e.offset().top,o=function(){var o=s(window).scrollTop();n<=o?e.addClass("stuck"):e.removeClass("stuck")};s(window).scroll(o),o()}}(jQuery),function(n){if(n(".opm").length){var t=n(".opm-target"),a=n(".opm-sections"),i=n(".opm-menu"),c=i.outerHeight();n(window).on("scroll",function(){var e=n(this).scrollTop();t.each(function(){var o=n(this).offset().top-c,s=o+n(this).outerHeight();o<=e&&e<=s&&(i.find("a").removeClass("active"),a.find("div").removeClass("active"),t.removeClass("active"),n(this).addClass("active"),i.find('a[href="#'+n(this).attr("id")+'"]').addClass("active"),a.find(".t"+n(this).attr("id")).addClass("active"))})}),i.find("a").on("click",function(){var o,s=n(this).attr("href");return n(s).length&&n("html, body").animate({scrollTop:n(s).offset().top},500),!1})}}(jQuery);var elements=document.getElementsByClassName("artworks"),msnry;imagesLoaded(document.querySelector("body"),function(){for(var o=elements.length,s=0;s<o;s++)msnry=new Masonry(elements[s],{itemSelector:".artwork",columnWidth:".artwork"})}),jQuery(function(o){o(".cssicon-updown").click(function(){o(".cssicon-updown").hasClass("down")?(o(".cssicon-updown").removeClass("down"),o(".cssicon-updown").addClass("up"),o(".opm-menu").slideDown(200)):(o(".cssicon-updown").removeClass("up"),o(".cssicon-updown").addClass("down"),o(".opm-menu").slideUp(200))})});