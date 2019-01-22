/**
 * JS for Exhibit and Current modal displays
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
jQuery(document).ready(function(e){e(".close-modal").click(function(){e(".exhibit-modal").toggleClass("show")});var i=e(window);function o(){var o;100<i.width()&&e(".modal-link").click(function(o){return o.preventDefault(),e(".exhibit-modal").addClass("show",1e3,"easeOutSine"),e("html, body").animate({scrollTop:0},"slow"),!1})}o(),e(window).resize(o)});