/**
 * JS for the Permanent Collection page template
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
var elements=document.getElementsByClassName("artworks"),msnry;imagesLoaded(document.querySelector("body"),function(){for(var e=elements.length,t=0;t<e;t++)msnry=new Masonry(elements[t],{itemSelector:".artwork",columnWidth:".artwork"})});