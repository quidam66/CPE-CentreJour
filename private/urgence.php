<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
	<body>
URGENCE
		<h2 style="background-color:red">
		Background-color set by using red
		</h2>

		<h2 style="background-color:orange">
		Background-color set by using orange
		</h2>

		<h2 style="background-color:yellow">
		Background-color set by using yellow
		</h2>

		<h2 style="background-color:blue;color:white">
		Background-color set by using blue
		</h2>

		<h2 style="background-color:cyan">
		Background-color set by using cyan
		</h2>

	</body>
</html>




<!doctype html>
<html class="no-js" lang="fr-CA">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CPE Centre-Jour</title>
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../css/couleursChaudes.css">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery-2.1.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<script type = "text/javascript" language = "javascript">
		$(document).ready(function() {

				
               $.getJSON('message.json', function(jd) {
               		console.log(jd.message.active)
               		if(jd.message.active == "0")
               		{
               			$('#affiche').prop("checked", false);
               		}
               		else
               		{
               			$('#affiche').prop("checked", true);
               		}


                 /* $('#stage').html('<p> Name: ' + jd.name + '</p>');
                  $('#stage').append('<p>Age : ' + jd.age+ '</p>');
                  $('#stage').append('<p> Sex: ' + jd.sex+ '</p>');*/
               });









			$("#driver").click(function(event){
				var texte = $("#texte").val();
				$("#stage").load('/result.php', {"texte":texte} );
			});
		});	
	</script>
</head>
<body class="login-page">
   <div class="container">
      <div class="iframe-p-text">
         <div class="iframe-title-bg"><span>Section réservée à l'administration</span></div>
         <div class="texteInfo">
				<p>Enter your name and click on the button:</p>
				<input type="checkbox" id="affiche" name="affiche" value=""/>Afficher le message<br>
				<input type="input" id="texte" size="40" /><br />

				<div id = "stage" style = "background-color:cc0;">
				 STAGE
				</div>

				<input type = "button" id = "driver" value = "Show Result" />
			</div>
		</div>
	</div>
</body>
	
</html>