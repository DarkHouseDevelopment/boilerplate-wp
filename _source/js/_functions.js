/************************************************************************/
/* JAVASCRIPT FUNCTIONS
/************************************************************************/

function homeHeroSlider(){
	$('.hero-gallery').slick({
		autoplay: true,
		autoplaySpeed: 5000,
		arrows: false,
		fade: true,
		pauseOnFocus: false,
		pauseOnHover: false,
		slide: '.slide',
		speed: 2000,
		swipe: false,
		touchMove: false
	});
}