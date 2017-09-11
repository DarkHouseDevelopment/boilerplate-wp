/************************************************************************/
/* JAVASCRIPT FUNCTIONS
/************************************************************************/


function initMobileNav(){
	$('body').addClass('js');
		var $menu = $('#menu'),
		$menulink = $('.menu_link');

	$menulink.click(function() {
		$('.menu_link .close').toggleClass('active');
		$('.menu_link .link').toggleClass('in-active');
		$menu.toggleClass('active');
		return false;
	});
}

function mobileNavSlideIn(){
	$(".main-menu-toggle").on("click", function(){
		$("#mobile_main_menu").toggleClass("open");
		//$("#pre_menu").fadeToggle();
		$(this).find(".fa").toggleClass("fa-bars").toggleClass("fa-close");
	});
}

function mobileHeaderSlideUp(){
	var lastScrollTop = 0;
	$(window).scroll(function(e){
	   var st = $(this).scrollTop();
	   if (st > lastScrollTop && st >= 100 && !$("#mobile_main_menu").hasClass("open")){
	       $("header[role='banner']").addClass("scroll");
	   } else {
	       $("header[role='banner']").removeClass("scroll");
	   }
	   lastScrollTop = st;
	});
}



function muteAudio() {
	audioStatus = $("#home_video .video-container").attr('data-audio-volume');
	
	if (audioStatus == 0) {
		// Mute the audio
		$('#home_video .video-container').attr('data-audio-volume', 1);
		$("#home_video iframe").vimeo("setVolume", 1);
		//$(".audio-control.js-audio-control").removeClass('muted').addClass('unmuted');
		$('#home_video .overlay').fadeOut();
	}
	else if (audioStatus == 1){
		// Play the audio
		$('#home_video .video-container').attr('data-audio-volume', 0);
		$("#home_video iframe").vimeo("setVolume", 0);
		//$(".audio-control.js-audio-control").removeClass('unmuted').addClass('muted');
		$('#home_video .overlay').fadeOut();
	}
}
