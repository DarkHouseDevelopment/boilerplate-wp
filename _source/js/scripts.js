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