jQuery(function( $ ) {
	$('.heroslider').slick({
		arrows: false,
		infinite: true,
		autoplay: true,
		slidesToShow: 1,
		speed: 600,
		autoplaySpeed: 6000,
	});
});

jQuery(function( $ ) {
	var $status = $('.pagingInfo');
	var $slickElement = $('.slickeroo');

	$slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
		//currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
		var i = (currentSlide ? currentSlide : 0) + 1;
		$status.text(i + '/' + slick.slideCount);
	});
	$slickElement.slick({
		nextArrow: '.next',
		prevArrow: '.prev',
		dots: false,
		speed: 600,
		initialSlide: 7,
	});
});

	//var testurl = "?slick=2";
	//var search = window.location.search || testurl;
    //var $slider = $(".slickeroo");
    //var checkQuery, initialSlide = 0;

    //initialSlide = search.split("=");

    //$slider.slick({
    //    initialSlide: initialSlide
    //});
