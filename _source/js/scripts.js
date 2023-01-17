/************************************************************************/
/* SCRIPTS
/************************************************************************/
//@codekit-prepend "_plugins.js", "_functions.js";

$(document).ready(function() {
	
	mobileNavSlideIn();
	homeHeroSlider();
	heroAnimation();
	formToggle();
	floatingLabels();
	searchTypeToggle();
	initCarousels();
	floorplans();
	sendInfoOverlay();
	stayInTouchBuilderEmails(); 
	gridInit();
	backToGridHash();
	mobileGridToggle();
	mobileAmenitiesToggle();
	builderFloorplanFilter();
	builderPopupForm();
	faq();
	
});

$(window).load(function(){
	gridInit();
});