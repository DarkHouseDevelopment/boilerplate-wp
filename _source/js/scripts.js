/************************************************************************/
/* SCRIPTS
/************************************************************************/


$(document).ready(function() {
	
	initMobileNav();
	mobileNavSlideIn();
	mobileHeaderSlideUp();
	
	
    // initial setup
    // - audio muted/unmuted 
    var isAuidoMuted = true;

    if ( isAuidoMuted === true ){
      $('#home_video .video-container').attr('data-audio-volume', 0);
      $("#home_video iframe").vimeo("setVolume", 0);
      //$(".audio-control.js-audio-control").removeClass('unmuted').addClass('muted');
    }
    else{
      $('#home_video .video-container').attr('data-audio-volume', 1);
      $("#home_video iframe").vimeo("setVolume", 1);
    }
});


$(document).on('click', '#watch-video', function(e) {
	muteAudio($(this));
	e.preventDefault();
});