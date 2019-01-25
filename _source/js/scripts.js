/************************************************************************/
/* SCRIPTS
/************************************************************************/

jQuery(document).ready(function($) {
	
	mobileNavSlideIn();
	gridInit();
	mobileGridToggle();
	backToGridHash();
	learnerJourneySlideshowInit();
	benefitsBlocksToggle();

	window.onscroll = function(){ slideInFixedHeader() };
	
});
