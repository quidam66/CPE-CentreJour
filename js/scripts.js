"use strict";

// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation;

var ph = {

	init: function(){
	
		$(document).ready(function(){
		
			ph.mainSlider.init();
		});
	},
	
	mainSlider: {
	
		init: function(){
		
			var $sliders = $('.main-slider');
			
			$sliders.each(function(){
			
				var $slider = $(this);
				
				$slider.slick({
					dots: false,
					arrows: true,
					infinite: true,
					appendArrows: $slider.parent().find('.main-slider-arrows >  .arrow-holder'),
					prevArrow: '<a href="" class="slick-prev"></a>',
					nextArrow: '<a href="" class="slick-next"></a>',
					speed: 300,
					slidesToShow: 1,
					slidesToScroll: 1
				});
			});
		}
	}
}

ph.init();