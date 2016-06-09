"use strict";

var _subItemSelected = false;

$(".nav a").on("click", function(){

	if($(this).parent().hasClass("dropdown"))
	{
		if(!$(this).parent().hasClass("active") && !_subItemSelected)
		{
			console.log("dans le IF du IF");
			$(".nav").find(".active").addClass("inactive");
			$(".nav").find(".active").removeClass("active");

			$(this).parent().removeClass("inactive");
			$(this).parent().addClass("active");
		}
		else if(!$(this).parent().hasClass("active") && _subItemSelected)
		{
			console.log("dans le ELSE IF du IF");
			$(this).parent().removeClass("active");
			$(this).parent().removeClass("selected");
			
		}
		else
		{
			console.log("dans le ELSE du IF");
		}
	}
	else
	{
		if($(this).parent().parent().hasClass("subitem"))
		{
			console.log("dans le SUBITEM");
			if(_subItemSelected)
			{
				console.log("dans le IF du IF du ELSE");
				$(".nav").find(".active").addClass("inactive");
				$(".nav").find(".active").removeClass("active");
				$(".nav").find(".selected").removeClass("selected");

				$(this).parent().parent().parent().addClass("active");
				
			}
			$(this).parent().addClass("active");
			//$(this).parent().parent().parent().removeClass("selected");
			$(".dropdown").addClass("selected");
			_subItemSelected = true;
		}
		else
		{
			console.log("dans le ELSE du ELSE");
			$(".nav").find(".active").addClass("inactive");
			$(".nav").find(".active").removeClass("active");
			$(".nav").find(".selected").removeClass("selected");
			
			$(this).parent().removeClass("inactive");
			$(this).parent().addClass("active");
			_subItemSelected = false;
		}
	}
});


function resizeIframe()
{
	/*var infoH = $(".information").css("height");
	infoH = infoH.substring(0, infoH.indexOf("px"));

	var headH = $(".site-header").css("height");
	headH = headH.substring(0, headH.indexOf("px"));

	var footH = $(".site-footer").css("height");
	footH = footH.substring(0, footH.indexOf("px"));

	console.log("height du page moins document WIDTH = " + document.body.clientWidth);

	if(infoH > document.body.clientHeight)
	{
		$(".index_ifrm").css("height", infoH);
	}
	else
	{
		$(".index_ifrm").css("height", (document.body.clientHeight - footH - 5));		
	}*/

	//$(".index_ifrm").css("height", infoH);
	//$(".site-footer").css("bottom", 10);

	console.log($(".index_ifrm").contents().outerHeight());
	$(".index_ifrm").css("height", 0);
	$(".index_ifrm").css("height", $(".index_ifrm").contents().outerHeight() + 75);		

};

function goBack()
{
	window.history.back();
};

/*$("#css1").click(function() { $("link[rel=stylesheet]").attr({href : "css/style.css"}); }); 
$("#css2").click(function() { $("link[rel=stylesheet]").attr({href : "css/couleursChaudes.css"}); });*/

//$(".index_ifrm").onLoad = resizeIframe;
//maframe.onLoad = resizeIframe();
window.onresize = resizeIframe; 

