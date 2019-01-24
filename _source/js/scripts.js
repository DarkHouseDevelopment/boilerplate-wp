/************************************************************************/
/* SCRIPTS
/************************************************************************/

jQuery(document).ready(function($) {
	
	mobileNavSlideIn();
	gridInit();
	mobileGridToggle();
	backToGridHash();
	learnerJourneySlideshowInit();

	window.onscroll = function(){ slideInFixedHeader() };
	
});
