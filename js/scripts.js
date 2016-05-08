"use strict";

var _subItemSelected = false;
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

$(".nav a").on("click", function(){
	/*if($(this).parent().hasClass("active"))
	{
		console.log("dans le IF");
		$(this).parent().addClass("active");
		$(".nav").find(".active").removeClass("active");

	}
	else
	{
		console.log("dans le ELSE");
		$(this).parent().addClass("active");		
	}*/
	if($(this).parent().hasClass("dropdown"))
	{
		
		if(!$(this).parent().hasClass("active") && !_subItemSelected)
		{
			console.log("dans le IF du IF");
			$(".nav").find(".active").removeClass("active");
			$(this).parent().addClass("active");
		}
		else if(!$(this).parent().hasClass("active") && _subItemSelected)
		{
			console.log("dans le ELSE IF du IF");
			$(this).parent().removeClass("active");
			
		}
		else
		{
			console.log("dans le ELSE du IF");
			//$(this).parent().addClass("active");
		}
		
		//$(this).parent().addClass("selected");
		
	}
	else
	{
		if($(this).parent().parent().hasClass("subitem"))
		{
			console.log("dans le SUBITEM");
			if(_subItemSelected)
			{
				console.log("dans le IF du IF du ELSE");
				$(".nav").find(".active").removeClass("active");
				$(".nav").find(".selected").removeClass("selected");
				$(this).parent().parent().parent().addClass("active");
				
			}
			$(this).parent().addClass("active");
			$(this).parent().parent().parent().addClass("selected");
			_subItemSelected = true;
		}
		else
		{
			console.log("dans le ELSE du ELSE");
			$(".nav").find(".active").removeClass("active");
			$(this).parent().addClass("active");
			_subItemSelected = false;
		}

		
	}
});