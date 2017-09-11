/************************************************************************/
/* JAVASCRIPT PLUGINS
/************************************************************************/
// place any jQuery/helper plugins in here, instead of separate, slower script files.

/*! vimeo-jquery-api 2016-04-09 */
!function(a,b){var c={catchMethods:{methodreturn:[],count:0},init:function(b){var c,d,e;b.originalEvent.origin.match(/vimeo/g)&&"data"in b.originalEvent&&(e="string"===a.type(b.originalEvent.data)?a.parseJSON(b.originalEvent.data):b.originalEvent.data,e&&(c=this.setPlayerID(e),c.length&&(d=this.setVimeoAPIurl(c),e.hasOwnProperty("event")&&this.handleEvent(e,c,d),e.hasOwnProperty("method")&&this.handleMethod(e,c,d))))},setPlayerID:function(b){return a("iframe[src*="+b.player_id+"]")},setVimeoAPIurl:function(a){return"http"!==a.attr("src").substr(0,4)?"https:"+a.attr("src").split("?")[0]:a.attr("src").split("?")[0]},handleMethod:function(a){this.catchMethods.methodreturn.push(a.value)},handleEvent:function(b,c,d){switch(b.event.toLowerCase()){case"ready":for(var e in a._data(c[0],"events"))e.match(/loadProgress|playProgress|play|pause|finish|seek|cuechange/)&&c[0].contentWindow.postMessage(JSON.stringify({method:"addEventListener",value:e}),d);if(c.data("vimeoAPICall")){for(var f=c.data("vimeoAPICall"),g=0;g<f.length;g++)c[0].contentWindow.postMessage(JSON.stringify(f[g].message),f[g].api);c.removeData("vimeoAPICall")}c.data("vimeoReady",!0),c.triggerHandler("ready");break;case"seek":c.triggerHandler("seek",[b.data]);break;case"loadprogress":c.triggerHandler("loadProgress",[b.data]);break;case"playprogress":c.triggerHandler("playProgress",[b.data]);break;case"pause":c.triggerHandler("pause");break;case"finish":c.triggerHandler("finish");break;case"play":c.triggerHandler("play");break;case"cuechange":c.triggerHandler("cuechange")}}},d=a.fn.vimeoLoad=function(){var b=a(this).attr("src");if(null===b.match(/player_id/g)){var c=-1===b.indexOf("?")?"?":"&",d=a.param({api:1,player_id:"vvvvimeoVideo-"+Math.floor(1e7*Math.random()+1).toString()});a(this).attr("src",b+c+d)}return this};jQuery(document).ready(function(){a("iframe[src*='vimeo.com']").each(function(){d.call(this)})}),a(b).on("message",function(a){c.init(a)}),a.vimeo=function(a,d,e){var f={},g=c.catchMethods.methodreturn.length;if("string"==typeof d&&(f.method=d),void 0!==typeof e&&"function"!=typeof e&&(f.value=e),"iframe"===a.prop("tagName").toLowerCase()&&f.hasOwnProperty("method"))if(a.data("vimeoReady"))a[0].contentWindow.postMessage(JSON.stringify(f),c.setVimeoAPIurl(a));else{var h=a.data("vimeoAPICall")?a.data("vimeoAPICall"):[];h.push({message:f,api:c.setVimeoAPIurl(a)}),a.data("vimeoAPICall",h)}return"get"!==d.toString().substr(0,3)&&"paused"!==d.toString()||"function"!=typeof e||(!function(a,d,e){var f=b.setInterval(function(){c.catchMethods.methodreturn.length!=a&&(b.clearInterval(f),d(c.catchMethods.methodreturn[e]))},10)}(g,e,c.catchMethods.count),c.catchMethods.count++),a},a.fn.vimeo=function(b,c){return a.vimeo(this,b,c)}}(jQuery,window);
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
//# sourceMappingURL=maps/scripts.js.map
