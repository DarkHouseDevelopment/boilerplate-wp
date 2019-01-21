/************************************************************************/
/* SCRIPTS
/************************************************************************/

jQuery(document).ready(function($) {
	
	mobileNavSlideIn();
	gridInit();
	mobileGridToggle();
	backToGridHash();

	window.onscroll = function(){ slideInFixedHeader() };
	
});
