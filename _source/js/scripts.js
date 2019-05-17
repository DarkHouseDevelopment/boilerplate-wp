/************************************************************************/
/* SCRIPTS
/************************************************************************/
//@codekit-prepend "_plugins.js", "_functions.js";

$(document).ready(function() {
	
	mobileNavSlideIn();
	homeHeroSlider();
	formToggle();
	floatingLabels();
	initCarousels();
	floorplans();
	sendInfoOverlay();
	gridInit();
	backToGridHash();
	mobileGridToggle();
	
});

$(window).load(function(){
	gridInit();
});