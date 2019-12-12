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
	initCarousels();
	floorplans();
	sendInfoOverlay();
	stayInTouchBuilderEmails(); 
	gridInit();
	backToGridHash();
	mobileGridToggle();
	mobileAmenitiesToggle();
	builderPopupForm();
	faq();
	
});

$(window).load(function(){
	gridInit();
});