/************************************************************************/
/* JAVASCRIPT FUNCTIONS
/************************************************************************/

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
	       $("header[role='banner']").removeClass("open");
	   } else {
	       $("header[role='banner']").addClass("open");
	   }
	   lastScrollTop = st;
	});
}

function hoverSubnav(){
	$("#main_menu").find(".menu-item-has-children").hover(function(){
		$(this).find('.sub-menu').stop().slideDown();
	}, function(){
		$(this).find('.sub-menu').stop().slideUp('fast');
	})
}

function modernizrChecks(){
	if(!Modernizr.input.placeholder){

		$('[placeholder]').focus(function() {
			var input = $(this);
			if (input.val() === input.attr('placeholder')) {
				input.val('');
				input.removeClass('placeholder');
			}
		}).blur(function() {
			var input = $(this);
			if (input.val() === '' || input.val() === input.attr('placeholder')) {
				input.addClass('placeholder');
				input.val(input.attr('placeholder'));
			}
		}).blur();
		$('[placeholder]').parents('form').submit(function() {
			$(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() === input.attr('placeholder')) {
					input.val('');
				}
			});
		});
	}
}

function equalHeight(group,breakpoint) {
	if($(window).width() >= breakpoint){
		$(group).css('min-height', 0);
		var tallest = 0;
		$(group).each(function() {
			var thisHeight = $(this).outerHeight();
			if(thisHeight > tallest) {
				tallest = thisHeight;
			}
		});
		$(group).css('min-height', tallest);
	}else{
		$(group).css('min-height', 0);
	}
}

function allEqualHeights() {
	// Grid block textarea height found in gridBlocks()
	equalHeight('.equal-gallery-block',680);
	equalHeight('.equal-gallery-block h3',300);
	equalHeight('#video_gallery .gallery_launch',680);
	equalHeight('.equal-lookbook-block',680);
	equalHeight('.equal-lookbook-block h3',300);
	equalHeight('.event_block',504);
	equalHeight('.upcoming_events .equal_date',665);
	equalHeight('.upcoming_events .equal_title',665);
	equalHeight('.upcoming_events .equal_location',665);
	equalHeight('.post .post_eq',504);
	equalHeight('.news_articles .article',680);
}

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


function slidersInit(){
	
	$('.slider.large').slick({
		adaptiveHeight: true,
		infinite: true,
		speed: 300,
		mobileFirst: true,
		prevArrow: "<a href='javascript:void(0);' class='slick-prev'><i class='fa fa-angle-left'></i></a>",
		nextArrow: "<a href='javascript:void(0);' class='slick-next'><i class='fa fa-angle-right'></i></a>",
		slidesToShow: 1,
		modileFirst: true,
		responsive: [
			{
				breakpoint: 900,
				settings: {
					centerMode: true,
					variableWidth: true
				}	
			}
		]
	});
	$('.default-content .slider.small').each(function(){
		var slideWidth = $(this).find('div').first().find('img').width();
		$(this).width(slideWidth);
	});
	$('.slider.small').slick({
		adaptiveHeight: true,
		//variableWidth: true,
		infinite: true,
		speed: 300,
		prevArrow: "<a href='javascript:void(0);' class='slick-prev'><i class='fa fa-angle-left'></i></a>",
		nextArrow: "<a href='javascript:void(0);' class='slick-next'><i class='fa fa-angle-right'></i></a>",
		slidesToShow: 1
	});
	
	$('.news_slider').slick({
		adaptiveHeight: false,
		autoplay: true,
		autoplaySpeed: 5000,
		fade: true,
		infinite: true,
		speed: 1000,
		pauseOnHover: true,
		arrows: false,
		slidesToShow: 1,
		mobileFirst: true
	});

	$('.slider .play_video').click(function(){
		//jQuery(this).hide();
		//jQuery('.video_placeholder').hide();
	});
}

function getHashFilter() {
	var hash = location.hash;
	// get filter=filterName
	var matches = location.hash.match( /filter=([^&]+)/i );
	var hashFilter = matches && matches[1];
	return hashFilter && decodeURIComponent( hashFilter );
}

function gridInit(){
		
	var $grid = $('.grid-results');
	
	// bind filter button click
	var $filters = $('.grid-filters').on('click', '.grid-filter', function(){
		var filterAttr = $(this).data('filter');
		// set filter in the hash
		location.hash = 'filter=' + encodeURIComponent( filterAttr );
	})
	
	var isIsotopeInit = false;
	
	function onHashChange() {
		// Check to ensure isotope exists on the current page
		if ( $.isFunction($.fn.isotope) ) {
			var hashFilter = getHashFilter();
			var sessionHash = localStorage['sessionHash'];
			if( !hashFilter && isIsotopeInit ){
				Cookies.set('sessionHash', '*');
				return;
			}
			isIsotopeInit = true;
			Cookies.set('sessionHash', hashFilter);
			//console.log(Cookies.get('sessionHash'));
		
			// filter isotope
			$grid.isotope({
				itemSelector: '.grid-block',
				filter: hashFilter,
				percentPosition: true,
				masonry: {
					columnWidth: '.grid-block',
					gutter: 12
				}
			});
			
			// set active class on filter
			if ( hashFilter ){
				$filters.find('.active').removeClass('active');
				$filters.find('[data-filter="' + hashFilter + '"]').addClass('active');
				$('.grid-filter-toggle').find('span').text($filters.find('[data-filter="' + hashFilter + '"]').text());
			}
		};
	}
	
	$(window).on( 'hashchange', onHashChange );
	$(window).on( 'load', onHashChange );
	// trigger event handler to init Isotope
	onHashChange();
	
	
}
function mobileGridToggle(){
	// mobile grid filter toggle
	$('.grid-filter-toggle').on('click', function(){
		$('.grid-filters').stop().slideToggle().toggleClass('open');
		$(this).find('.fa').toggleClass('fa-angle-down fa-angle-up');
	});
	
	$('.grid').on('click', '.grid-filters.open .grid-filter', function(){
		if($('.grid-filter-toggle').is(':visible')){
			$('.grid-filters').stop().slideToggle('fast').toggleClass('open');
			$('.grid-filter-toggle').find('.fa').toggleClass('fa-angle-down fa-angle-up');
		}
	})	
}
function backToGridHash(){	
	// add hash to back to grid button
	if($('nav#back_nav.grid').length){
		var backLink = $('nav#back_nav a').attr('href');
		var backHash = encodeURIComponent( Cookies.get('sessionHash') );
				
		$('nav#back_nav a').attr('href', backLink + "#filter=" + backHash);
	}
}

function iCheckInit(){
	$('input').not($('.gform_wrapper input')).iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass: 'iradio_flat-green'
	});
}

function formSubmits(){
	$('form.stay-connected').submit(function() {
		//alert('form submitted!');
		var errorCount = 0;
		var errorType = '';

		function validateEmail(email) {
		 var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		 return emailReg.test( email );
		}

		$(this).find('input.req').each(function(){
			if($(this).val() === '' || $(this).val() === $(this).attr('placeholder')){
				$(this).addClass('error');
				errorType = 'req';
				errorCount++;
			}
		});
		if($(this).find('input[type="email"]').length > 0) {
			if(errorCount === 0 && !validateEmail($(this).find('input[type="email"]').val())) {
				$(this).find('input[type="email"]').addClass('error');
				errorType = 'email';
				errorCount++;
			}
		}

		if(errorCount > 0){
			if(errorType === 'req'){
				alert('Please complete all required fields.');
			} else if(errorType === 'email'){
				alert('Please enter a valid email address.');
			}

			return false;
		} else {
			return true;
		}
	});
	
	$('form.sendinfoform').submit(function(){
		$(this).find("input[type='submit']").prop( "disabled", true );
		var errorCount = 0;
		var errorType = '';

		function validateEmail(email) {
		 var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		 return emailReg.test( email );
		}

		$(this).find('input.req').each(function(){
			if($(this).val() === '' || $(this).val() === $(this).attr('placeholder')){
				$(this).addClass('error');
				errorType = 'req';
				errorCount++;
			}
		});
		if($(this).find('input[type="email"]').length > 0) {
			if(errorCount === 0 && !validateEmail($(this).find('input[type="email"]').val())) {
				$(this).find('input[type="email"]').addClass('error');
				errorType = 'email';
				errorCount++;
			}
		}

		if(errorCount > 0){
			if(errorType === 'req'){
				alert('Please complete all required fields.');
			} else if(errorType === 'email'){
				alert('Please enter a valid email address.');
			}
			
			$(this).find("input[type='submit']").prop( "disabled", false );
			return false;
		} else {
			// create a new instance of the Mandrill class with your API key
			var m = new mandrill.Mandrill('xIYa6jTupMS79UrBZxRuyw');
			
			// pull in the form POST values
			var modelName = $(this).find("input.model_name").val();
			var firstName = $(this).find("input#sendinfo-fname").val();
			var lastName = $(this).find("input#sendinfo-lname").val();
			var emailAddress = $(this).find("input#sendinfo-email").val();
			var state = $(this).find("input#sendinfo-state").val();
			var phoneNumber = $(this).find("input#sendinfo-phone").val();
			var builderName = $(this).find("input#builder_name").val();
			var modelName = $(this).find("input#model_name").val();
			var builderContacts = $(this).find("input#builder_contacts").val();
					
			var builderContactsArray = $(this).find("input#builder_contacts").val().split(",");
			var builderContacts = [];
			
			function createBuilderContacts(item, index){
				builderContacts.push({ "email":item });
			}
			
			builderContactsArray.forEach(createBuilderContacts);
			
			var htmlMsg = "<table align='center' width='100%' cellspacing='0' cellpadding='0' border='0' style='max-width: 600px; margin-bottom: 20px;'><tr><td style='padding-top: 20px; text-align: center;'><a href='http://verrado.com'><img src='http://verrado.com/wp-content/themes/verrado-2.0/assets/img/logo.png' border='0' /></td></tr><tr><td><h3 style='font-family: Arial, Helvetica, sans-serf; text-align: center; margin-top: 20px;'>New Home Inquiry from Verrado.com</h3><p style='font-family: Arial, Helvetica, sans-serf; font-size: 16px; line-height: 20px; margin-bottom: 20px;'>The following visitor on <a href='http://verrado.com'>Verrado.com</a> has requested information on the following home model.</p></td></tr><tr><td><table width='100%' cellspacing='0' cellpadding='10' border='0' style='max-width: 600px;'><tr><td width='120' style='font-family: Arial, Helvetica, sans-serf; font-size: 16px; line-height: 20px; font-weight: 600; border: 1px solid #75777a; background: #75777a; color: #fff;'>Builder</td><td style='font-family: Arial, Helvetica, sans-serf; font-size: 16px; line-height: 20px; border: 1px solid #75777a; border-bottom: 0;'>"+builderName+"</td></tr><tr><td width='120' style='font-family: Arial, Helvetica, sans-serf; font-size: 16px; line-height: 20px; font-weight: 600; border: 1px solid #75777a; background: #75777a; color: #fff;'>Model Name</td><td style='font-family: Arial, Helvetica, sans-serf; font-size: 16px; line-height: 20px; border: 1px solid #75777a; border-bottom: 0;'>"+modelName+"</td></tr><tr><td width='120' style='font-family: Arial, Helvetica, sans-serf; font-size: 16px; line-height: 20px; font-weight: 600; border: 1px solid #75777a; background: #75777a; color: #fff;'>Name</td><td style='font-family: Arial, Helvetica, sans-serf; font-size: 16px; line-height: 20px; border: 1px solid #75777a; border-bottom: 0;'>"+firstName+" "+lastName+"</td></tr><tr><td width='120' style='font-family: Arial, Helvetica, sans-serf; font-size: 16px; line-height: 20px; font-weight: 600; border: 1px solid #75777a; background: #75777a; color: #fff;'>Email Address</td><td style='font-family: Arial, Helvetica, sans-serf; font-size: 16px; line-height: 20px; border: 1px solid #75777a; border-bottom: 0;'><a href='mailto:"+emailAddress+"'>"+emailAddress+"</a></td></tr><tr><td width='120' style='font-family: Arial, Helvetica, sans-serf; font-size: 16px; line-height: 20px; font-weight: 600; border: 1px solid #75777a; background: #75777a; color: #fff;'>State</td><td style='font-family: Arial, Helvetica, sans-serf; font-size: 16px; line-height: 20px; border: 1px solid #75777a; border-bottom: 0;'>"+state+"</td></tr><tr><td width='120' style='font-family: Arial, Helvetica, sans-serf; font-size: 16px; line-height: 20px; font-weight: 600; border: 1px solid #75777a; background: #75777a; color: #fff;'>Phone Number</td><td style='font-family: Arial, Helvetica, sans-serf; font-size: 16px; line-height: 20px; border: 1px solid #75777a;'>"+phoneNumber+"</td></tr></table></td></tr></table>";
			
			if(builderContacts.length >= 1){
			
				// create a variable for the API call parameters
				var params = {
				    "message": {
				        "from_email":"noreply@verrado.com",
				        "to": builderContacts,
				        "subject": "New Home Inquiry from Verrado.com",
				        "html": htmlMsg,
				        "text": "New Home Inquiry from Verrado.com\n\nThe following visitor on Verrado.com has requested information on the following home model.\n\nBuilder: "+builderName+"\nModel Name: "+modelName+"\nName: "+firstName+" "+lastName+"\nEmail Address: "+emailAddress+"\nState: "+state+"\nPhone Number: "+phoneNumber+"\n",
				        "autotext": true,
				        "track_opens": true,
				        "track_clicks": true
				    }
				};
				
				// Send the email!
				m.messages.send(params, function(result){
					//console.log(JSON.stringify(result, null, 4));
				}, function(e){
					// Mandrill returns the error as an object with name and message keys
					//console.log('A mandrill error occurred: ' + e.name + ' - ' + e.message);
				});
			}
			
			return true;
		}
	});
}

function stayInformedBannedZips(){
	var bannedZips = [];
	var CTZips = ["060","061","062","063","064","065","066","067","068","069"];
	var NJZips = ["070","071","072","073","074","075","076","077","078","079","080","081","082","083","084","085","086","087","088","089"];
	var NYZips = ["100","101","102","103","104","105","106","107","108","109","110","111","112","113","114","115","116","117","118","119","120","121","122","123","124","125","126","127","128","129","130","131","132","133","134","135","136","137","138","139","140","141","142","143","144","145","146","147","148","149"];
	var KSZips = ["660","661","662","663","664","665","666","667","668","669","670","671","672","673","674","675","676","677","678","679"];
	bannedZips = jQuery.merge([],CTZips);
	bannedZips = jQuery.merge(bannedZips,NJZips);
	bannedZips = jQuery.merge(bannedZips,NYZips);
	bannedZips = jQuery.merge(bannedZips,KSZips);

	//console.log(bannedZips);

	$('form#update-form #si-zip').change(function(){
		//console.log($(this).val());

		if (jQuery.inArray($(this).val().substring(0, 3), bannedZips) !== -1){
			$('form#update-form').parent().append("<h4>We apologize, but due to laws and regulations in your state we are not allowed to send you direct sales materials or market to you directly.</h4>");
			$('form#update-form').hide();
		}
	});
}

// LP Signup Form
function lpFormValidation(){
	var bannedZips = [];
	var CTZips = ["060","061","062","063","064","065","066","067","068","069"];
	var NJZips = ["070","071","072","073","074","075","076","077","078","079","080","081","082","083","084","085","086","087","088","089"];
	var NYZips = ["100","101","102","103","104","105","106","107","108","109","110","111","112","113","114","115","116","117","118","119","120","121","122","123","124","125","126","127","128","129","130","131","132","133","134","135","136","137","138","139","140","141","142","143","144","145","146","147","148","149"];
	var KSZips = ["660","661","662","663","664","665","666","667","668","669","670","671","672","673","674","675","676","677","678","679"];
	bannedZips = jQuery.merge([],CTZips);
	bannedZips = jQuery.merge(bannedZips,NJZips);
	bannedZips = jQuery.merge(bannedZips,NYZips);
	bannedZips = jQuery.merge(bannedZips,KSZips);
	
	$('form.lp_form').submit(function() {
		//alert('form submitted!');
		var errorCount = 0;
		var errorType = [];
	
		function validateEmail(email) {
		 var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		 return emailReg.test( email );
		}
		
		var fullname = $('input#fullname').val();
		var firstname = fullname.substr(0,fullname.indexOf(' '));
		var lastname = fullname.substr(fullname.indexOf(' ')+1);
		var zip = $('input#zip').val();
		
		//console.log('fullname = '+fullname);
		//console.log('firstname = '+firstname);
		//console.log('lastname = '+lastname);
		//console.log('zip = "'+zip+'"');
		
		
		if(typeof zip !== undefined && zip !== '' && zip.length === 5){
			//console.log('zip is defined');
			if (jQuery.inArray(zip.substring(0, 3), bannedZips) !== -1){
				errorType.push('zip');
				errorCount++;
			}
		} else {
			//console.log('zip undefined');
			errorType.push('req');
			errorCount++;
		}
		if(firstname !== '' && lastname !== ''){
			$('input#hidden_fname').val(firstname);
			$('input#hidden_lname').val(lastname);
			$('input#fullname').removeClass('error');
			//console.log('first and last name set');
		} else {
			errorType.push('name');
			errorCount++;
			$('input#fullname').addClass('error');
		}
		$(this).find('input.req').each(function(){
			if($(this).val() === '' || $(this).val() === $(this).attr('placeholder')){
				$(this).addClass('error');
				errorType.push('req');
				errorCount++;
			}
		});
		if($(this).find('input[type="email"]').val() === '' || !validateEmail($(this).find('input[type="email"]').val())) {
			$(this).find('input[type="email"]').addClass('error');
			errorType.push('email');
			errorCount++;
		}
		
		jQuery.unique(errorType);
		//console.log(errorType);
	
		if(errorCount > 0){
			var errorText = 'Oops... It looks like you forgot to complete part of the form.\n';
			jQuery.each(errorType,function(index,value){
				if(value === 'zip'){
					$('form.lp_form').find('h1').text('We apologize, but due to laws and regulations in your state we are not allowed to send you direct sales materials or market to you directly.');
					$('form.lp_form').find('.row').hide();
					errorText = '';
					return false;
				} else if(value === 'req'){
					errorText += '\nPlease complete all required fields.';
				} else if(value === 'email'){
					errorText += '\nPlease enter a valid email address.';
				} else if(value === 'name'){
					errorText += '\nPlease enter your first and last name.';
				}
			});
			if(errorText.length >= 1){
				alert(errorText);
			}
	
			return false;
		} else {
			return true;
		}
	});
}

function mobileHomeSearch(){

	$('.mobile-search-toggle .open-search').click(function(){
		$(this).hide();
		$('#header .find-a-home').slideDown();
	});

	$('.find-a-home .close-search').click(function(){
		$(this).hide();
		$('#header .find-a-home').slideUp();
		$('.mobile-search-toggle .open-search').show();
	});
}

function floatingLabels(){
	$('.styled-select').each(function(){
		if($(this).find(':selected').val() !== "" && $(this).find(':selected').is(':enabled')){
			$(this).addClass('active');
		}
	});
	
	$('.styled-select').find('select').change(function(){
		//console.log('select has been changed');
		$(this).parents('.styled-select').addClass('active');
	});
	
	$('p.input').find('input').bind('input', function(){
		if($(this).val() !== ''){
			$(this).parents('p.input').addClass('active');
		} else {
			$(this).parents('p.input').removeClass('active');
		}
	});
}

function minMaxPrice(){
	var minPrice = $('select[name="price-min"]').find(':selected').val();
	$('select[name="price-max"]').find('option').each(function(){
		if($(this).val() <= minPrice){
			$(this).attr('disabled','disabled');
		}
	});
	
	$('select[name="price-min"]').change(function(){	
		var minPrice = $('select[name="price-min"]').find(':selected').val();
		$('select[name="price-max"]').find('option').each(function(){
			if($(this).val() <= minPrice){
				$(this).attr('disabled','disabled');
			}
		});
	});
}

function printQMIDialog(){
	window.print();
}

function floorplans() {
	$('.floorplan').click(function(e) {
		var zoomID = $(this).find('.zoom').attr('id');
		var floorplanNum = zoomID.substr(zoomID.length - 1);
		$('#floorplan_overlay'+floorplanNum).show();
		e.preventDefault();
	});

	$('.floorplans .overlay').click(function(){
		$(this).hide();
	});
	$('.floorplans .close_floorplan').click(function(){
		$('.floorplans .overlay').hide();
	});
}

function browse_builders() {
	$('.toggle-builders').click(function(){
		$('.builder-list').slideToggle();
		$('.toggle-builders').toggleClass('active');
	});
}

function gridBlocks() {
	$('.grid_blocks .block').each(function(){

		/* How I got this crazy thing to work:
		 * =====================================================================================================
		 * 1. Set all CTA textareas to be equal heights (see allEqualHeights)
		 * 2. Get the the height of the CTA areas (set_height), for large squares this includes the title text
		 * 3. Vertically align CTA area within the grid block
		 * 4. Set height of p text within textarea and vertically align
		 */

		var blockHeight = $(this).find('.valign .set_height').outerHeight();
		var textHeight = $(this).find('.textarea p').outerHeight();

		//equalHeight('.grid_blocks .cta_box .textarea ',680);
		$(this).find('.valign').height(blockHeight);
		$(this).find('.textarea p').height(textHeight);
	});
}

function galleryOverlayInit() {

	// Gallery Lightbox: Gallery Page

	$('a.gallery-block.photo').click(function() {
		var imageArray = $(this).data('gallery');
		$.each(imageArray, function(key,value){
			//console.log(value);
			$('.gallery-slider').slick('slickAdd','<div class="slide-image"><img src="'+value.url+'" width="'+value.width+'" height="'+value.height+'" /></div>');
		});
		
		$('.gallery-slider').find('.slick-track').width('100%').find('.slick-slide').width('100%');
		$('.gallery-slider').slick('slickGoTo', 0);
		$('#gallery, #victory-gallery').find('.overlay').fadeIn().find('.coverup').delay(1000).fadeOut('fast');
	});
	
		
	$('.gallery-slider').slick({
		adaptiveHeight: false,
		infinite: true,
		speed: 300,
		mobileFirst: true,
		prevArrow: "<a href='javascript:void(0);' class='slick-prev'><i class='fa fa-angle-left'></i></a>",
		nextArrow: "<a href='javascript:void(0);' class='slick-next'><i class='fa fa-angle-right'></i></a>",
		slidesToShow: 1
	});
	
	$(document).keypress(function(e) { 
	    if (e.keyCode == 27) { 
			$('.gallery-slider').find('.slick-slide').each(function(){
				$(this).remove();
			})
			$('#gallery, #victory-gallery').find('.overlay').fadeOut('fast', function(){
				$(this).find('.coverup').show();
			})
	    } 
	});
	$('#gallery .overlay, #victory-gallery .overlay').find('.close').click(function(){
		$('.gallery-slider').find('.slick-slide').each(function(){
			$(this).remove();
		})
		$(this).parents('.overlay').fadeOut('fast', function(){
			$(this).find('.coverup').show();
		})
	});
	$('#gallery .overlay, #victory-gallery .overlay').find('.gallery-slider').click(function(e){
		e.stopPropagation();
	});
	
	$('#gallery, #victory-gallery').find('.overlay').fadeOut('fast');
}

function offsetSlider() {
	var windowSize = $(window).width();
	var mobile_landscape = 504;
	var tablet_portrait = 680;
	var tablet_landscape = 856;
	var desktop = 1032;
	
	if (windowSize >= tablet_landscape) {
		var sliderWidth = $('.slider_holder').outerWidth();
		var windowWidth = $(window).width();
		var wrapWidth = $('.slider_holder').parents('.wrap').outerWidth();
		var sliderOffset = ((windowWidth - wrapWidth) / 2) + sliderWidth;

		$('.slider_holder .images').width(sliderOffset);
	} else {
		$('.slider_holder .images').width('100%');
	}
}

function sendInfoForm() {
	$('.btn.sendinfo').click(function(){
		//alert ('clicked');
		$(this).parents('.send-info').siblings('.overlay').show();
		$(this).parents('.send-info').siblings('.contact').show();
		$(this).siblings('.overlay').show();
		$(this).siblings('.contact').show();
	});
	$('.overlay.sendinfo').click(function(){
		$(this).hide();
		$('form.contact').hide();
	});

	$('.close').click(function(){
		$('.overlay.sendinfo').hide();
		$('form.contact').hide();
	});
}

function newsMonthlyArchiveNav(){
	$("#monthly_archive select").change(function() {
		window.location = $(this).find("option:selected").val();
	});
}

function printQMI(action){	
	$('.overlay').hide();
	$('#print_modal').hide();
	
	if(action == 'verrado'){
		$('#victory_banner').hide();
		$('#victory_results').hide();
		$('#victory_footer').hide();
		window.print();
	} else if(action == 'victory'){
		$('#verrado_banner').hide();
		$('#verrado_results').hide();
		$('#verrado_footer').hide();
		window.print();
	} else if(action == 'both'){
		window.print();
	}
}