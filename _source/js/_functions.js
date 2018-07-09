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

function formToggle(){
	$('.form-toggle').click(function(){
		$('.homepage-get-connected-form').slideToggle();
	});
}

function floatingLabels(){
	$('.styled-select').each(function(){
		if($(this).find(':selected').val() !== "" && $(this).find(':selected').is(':enabled')){
			$(this).addClass('active');
		}
	});
	
	$('.styled-select').find('select').change(function(){
		//console.log('select has been changed');
		$(this).parents('.styled-select').addClass('active');
	});
	
	$('p.input').find('input').bind('input', function(){
		if($(this).val() !== ''){
			$(this).parents('p.input').addClass('active');
		} else {
			$(this).parents('p.input').removeClass('active');
		}
	});
}