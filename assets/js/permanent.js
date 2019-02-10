/**
 * JS for the Permanent Collection page template
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

// Initialize Masonry
var elements = document.getElementsByClassName('artworks');
var msnry;

imagesLoaded( document.querySelector('body'), function() {
  // init Isotope after all images have loaded
  var n = elements.length;
  for(var i = 0; i < n; i++){
    msnry = new Masonry( elements[i], {
      itemSelector: '.artwork',
      columnWidth: '.artwork',
    });
  }
});
