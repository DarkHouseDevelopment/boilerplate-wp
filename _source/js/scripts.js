/************************************************************************/
/* SCRIPTS
/************************************************************************/

jQuery(document).ready(function($) {
	
	mobileNavSlideIn();


	
	/************************************************************************/
	/* JAVASCRIPT FUNCTIONS
	/************************************************************************/
			
	function mobileNavSlideIn(){
		$(".menu-toggle").on("click", function(){
			$(this).toggleClass('active');
			$(".main-menu-mobile").toggleClass("open");
		});
		
		// Show sub-menu on mobile by triggering on click
		$('.menu-item-has-children > a').bind('touchstart', function(e){
			e.preventDefault();
			$(this).parents('.menu-item-has-children').toggleClass('open');
		});
	}
	
});
