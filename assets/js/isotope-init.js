(function( $ ) {
	// init Isotope
	var $grid = $('.tb1 .course-rows-wrap').isotope({
	  // options
	  itemSelector: '.tb1 .course-row',
	  layoutMode: 'vertical',
  	});
	// filter items on button click
	$('.tb1 .filter-buttons').on( 'click', 'button', function() {
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

	// init Isotope
	var $grid2 = $('.tb2 .course-rows-wrap').isotope({
	  // options
	  itemSelector: '.tb2 .course-row',
	  layoutMode: 'vertical',
  	});
	$('.tb2').hide();
	// filter items on button click
	$('.tb2 .filter-buttons').on( 'click', 'button', function() {
		var filterValue = $(this).attr('data-filter');
		$grid2.isotope({
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
