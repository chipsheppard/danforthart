(function( $ ) {
	// init Isotope
	var $grid = $('.course-rows-wrap').isotope({
	  // options
	  itemSelector: '.course-row',
	  layoutMode: 'vertical',
  	});
	$('.tb2').hide().css('visibility','visible');
	// filter items on button click
	$('.filter-buttons').on( 'click', 'button', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({
		hiddenStyle: {
		  opacity: 0
		},
		visibleStyle: {
		  opacity: 1
	    },
		filter: filterValue
	  });
	});
} )( jQuery );
