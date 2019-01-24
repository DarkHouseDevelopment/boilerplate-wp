jQuery(document).ready(function($) {

	var $window = $(window);
	revealOnScroll();
	$window.on('scroll', revealOnScroll);

	function revealOnScroll() {
		var rings = $('.ring-chart');
		var pies = $('.pie-chart');
		var svgpies = $('.svg-pie-chart');
		var times = $('.time-chart');
		var columns = $('.column-chart');
		var bars = $('.bar-chart');
		var people = $('.people-chart');

		var data = new Array();

		pies.each(function() {
			var chart = $(this);
			var wedges = $(this).find('.wedge');
			var win_height_padded = $window.height() * 1.1;
			var scrolled = $window.scrollTop();
			var offsetTop = chart.parents('.chart-wrap').offset().top;
			var offsetBottom = chart.parents('.chart-wrap').offset().top + parseInt(chart.parents('.chart-wrap').outerHeight());
			/* Clipping */
			var width = chart.width();
			var height = chart.height();
			var clipmask = 'rect(0,' + width + 'px,' + height + 'px,' + width / 2 + 'px)';
			var clipfill = 'rect(0,' + width / 2 + 'px,' + height + 'px,0)';

			if (scrolled + win_height_padded > offsetTop) {
				setTimeout(function() {					
					wedges.each(function(a, b) {
						var wedge = $(this);
						var per = parseInt(wedge.data('progress'));
						var offset = parseInt(wedge.data('offset'));
						var csshalf = {
							'-webkit-transform': 'rotate(' + 180 * per / 100 + 'deg)',
							'transform': 'rotate(' + 180 * per / 100 + 'deg)'
						};
						var cssfull = {
							'-webkit-transform': 'rotate(' + 360 * per / 100 + 'deg)',
							'transform': 'rotate(' + 360 * per / 100 + 'deg)'
						};
						var cssoffset = {
							'-webkit-transform': 'rotate(' + 360 * offset / 100 + 'deg)',
							'transform': 'rotate(' + 360 * offset / 100 + 'deg)'
						}
						wedge.css('opacity', 1);
						wedge.css(cssoffset);
						wedge.find('.mask').css({
							'clip': clipmask
						});
						wedge.find('.mask').find('.fill').css({
							'clip': clipfill
						});
						setTimeout(function() {
							wedge.find('.mask.full').css(csshalf);
							wedge.find('.fill').css(csshalf);
							wedge.find('.fix').css(cssfull);
						}, 500 + (225 * a));
					});
				}, 500);
			} else if (scrolled + win_height_padded < offsetTop) {
				var cssempty = {
					'-webkit-transform': 'rotate(0deg)',
					'transform': 'rotate(0deg)'
				};
				setTimeout(function() {		
					wedges.each(function(a, b) {
						var wedge = $(this);
						wedge.find('.mask.full').css(cssempty);
						wedge.find('.fill').css(cssempty);
						wedge.find('.fix').css(cssempty);
					});
				}, 0);
			}
		});

		columns.each(function() {
			var parts = $(this).find('.column');
			var win_height_padded = $window.height() * 1.1;
			var scrolled = $window.scrollTop();
			var offsetTop = parts.parents('.chart-wrap').offset().top;
			var offsetBottom = parts.parents('.chart-wrap').offset().top + parseInt(parts.parents('.chart-wrap').outerHeight());

			if (scrolled + win_height_padded > offsetTop) {
				parts.each(function(a, b) {
					var column = $(this);
					var cssheight = column.data('progress');
					if(column.is(".dotted")){
						var columndata = column.find('.inner').data('progress');
					} else {
						var columndata = column.data('progress');
					}
					var label = column.data('label');
					setTimeout(function() {
						column.css({
							'height': cssheight + '%'
						});
						setTimeout(function() {
							column.find('.col-data').remove();
							column.find('.col-label').remove();
							column.append('<div class="col-data">' + columndata + '%</div>');
							column.append('<div class="col-label">' + label + '</div>');
						}, 50);
					}, 500 + (125 * a));
				});
			} else if (scrolled + win_height_padded < offsetTop) {
				parts.each(function(a, b) {
					var column = $(this);
					var cssheight = column.attr('data-progress');
					setTimeout(function() {
						//column.css('height', 0);
					}, 0);
				});
			}
		});
	}
});