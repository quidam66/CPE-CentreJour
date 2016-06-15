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
	console.log("contenu du iframe = " + $(".index_ifrm").contents().outerHeight());
	console.log("la page = " + document.body.offsetHeight);
	$(".index_ifrm").css("height", 0);
	
	if($(".index_ifrm").contents().outerHeight() < document.body.offsetHeight)
	{
		$(".index_ifrm").css("height", document.body.offsetHeight*.7 + "px");
	}
	else
	{
		$(".index_ifrm").css("height", $(".index_ifrm").contents().outerHeight() + 75 + "px");
	}
		
};

function resizePrivatePage()
{
	
}

function goBack()
{
	window.history.back();
};

function returnTo()
{
	$("head").append("<meta http-equiv='refresh' content='0;URL=../private/welcome.php'>");
}

function backHome()
{
	document.location.href='../index.html';
}

function backToWelcome()
{
	document.location.href='../private/welcome.php';
}

function logout()
{
	document.location.href='../private/logout.php';
}

$(document).ready(function()
{
	if($("#login-form-container").height() != null)
	{
		console.log($("#login-form-container").height());
		$(".private-site-footer").css({"position":"absolute"});
		$(".private-site-footer").css({"top":($("#login-form-container").height() + 90)+"px"}); 		
	}

	if($("#employe-form-container").height() != null)
	{
		console.log($("#employe-form-container").height());
		$(".private-site-footer").css({"position":"absolute"});
		$(".private-site-footer").css({"top":($("#employe-form-container").height() + 100)+"px"}); 		
	}

	if($("#welcome-form-container").height() != null)
	{
		console.log($("#welcome-form-container").height());
		$(".private-site-footer").css({"position":"absolute"});
		$(".private-site-footer").css({"top":($("#welcome-form-container").height() + 250)+"px"}); 		
	}

	if($("#urgence-form-container").height() != null)
	{
		console.log($("#urgence-form-container").height());
		$(".private-site-footer").css({"position":"absolute"});
		$(".private-site-footer").css({"top":($("#urgence-form-container").height() + 50)+"px"}); 		
	}

	if($("#modif-form-container").height() != null)
	{
		console.log($("#modif-form-container").height());
		$(".private-site-footer").css({"position":"absolute"});
		$(".private-site-footer").css({"top":($("#modif-form-container").height() + 150)+"px"}); 		
	}

	if($("#code-form-container").height() != null)
	{
		console.log($("#code-form-container").height());
		$(".private-site-footer").css({"position":"absolute"});
		$(".private-site-footer").css({"top":($("#code-form-container").height() + 280)+"px"}); 		
	}
});

/*$("#css1").click(function() { $("link[rel=stylesheet]").attr({href : "css/style.css"}); }); 
$("#css2").click(function() { $("link[rel=stylesheet]").attr({href : "css/couleursChaudes.css"}); });*/


//maframe.onLoad = resizeIframe();
window.onresize = resizeIframe; 

