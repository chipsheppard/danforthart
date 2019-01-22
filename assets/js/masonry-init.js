jQuery( window ).load( function() {
	var container = document.querySelector( '.artworks' );
	var msnry = new Masonry( container, {
		itemSelector: '.artwork',
		columnWidth: '.artwork',
	});
});
