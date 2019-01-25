/************************************************************************/
/* JAVASCRIPT FUNCTIONS
/************************************************************************/

function mobileNavSlideIn(){
	$(".menu-toggle").on("click", function(){
		$(this).toggleClass('active');
		$(".main-menu-mobile").toggleClass("open");
	});
	
	// Show sub-menu on mobile by triggering on click
	$('.menu-item-has-children > a').bind('touchstart', function(e){
		e.preventDefault();
		$(this).parents('.menu-item-has-children').toggleClass('open');
	});
}

function slideInFixedHeader(){
	var header = $("header[role='banner'].fixed");
	var headerHeight = header.outerHeight();
	
	if(window.pageYOffset > headerHeight){
		header.addClass("active");
	} else {
		header.removeClass("active");
	}
}	
	
function getHashFilter() {
	var hash = location.hash;
	// get filter=filterName
	var matches = location.hash.match( /filter=([^&]+)/i );
	var hashFilter = matches && matches[1];
	return hashFilter && decodeURIComponent( hashFilter );
}

function gridInit(){		
	var $grid = $('.resources-grid');
	
	// bind filter button click
	var $filters = $('.iso-nav').on('click', '.iso-filter', function(){
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
				itemSelector: '.resource-result',
				filter: hashFilter,
				percentPosition: true,
				layoutMode: 'fitRows',
				fitRows: {
					gutter: '.resource-gutter'
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
	if($('section.back-link').length){
		var backLink = $('section.back-link a').attr('href');
		var backHash = encodeURIComponent( Cookies.get('sessionHash') );
				
		$('section.back-link a').attr('href', backLink + "#filter=" + backHash);
	}
}

function learnerJourneySlideshowInit() {
	$('.slider-learner-journey').slick();
}

function benefitsBlocksToggle() {
	if( $('.benefits-blocks').length > 0 ) {
		if( $('.blocks').hasClass('expanding') ) {
			$('.blocks').find('.block').each(function(){
				
				$(this).find('.expand').click(function(){
					$(this).hide();
					$(this).parents('.block-content').find('.close').show();
					$(this).parents('.block-content').find('.block-content-wrap').slideDown('slow');
				});
				
				$(this).find('.close').click(function(){
					$(this).hide()
					$(this).parents('.block-content').find('.expand').show();
					$(this).parents('.block-content').find('.block-content-wrap').slideUp('slow');
				});
			});
		}
	}
}