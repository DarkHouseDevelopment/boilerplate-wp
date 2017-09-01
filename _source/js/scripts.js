/************************************************************************/
/* SCRIPTS
/************************************************************************/

$(document).ready(function() {
	
	mobileNavSlideIn();
	mobileHeaderSlideUp();
	mobileHomeSearch();
	mobileGridToggle();
	hoverSubnav();
	slidersInit();
	galleryOverlayInit();
	gridInit();
	backToGridHash();
	floatingLabels();
	minMaxPrice();
	browse_builders();
	iCheckInit();
	floorplans();
	sendInfoForm();
	formSubmits();
	lpFormValidation();
	newsMonthlyArchiveNav();
	
});

$(window).load(function(){ 
	gridInit();
});