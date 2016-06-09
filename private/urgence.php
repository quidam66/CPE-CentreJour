<?php
   include('session.php');

	$json = file_get_contents("message.json");

	//$parsed_json = json_decode($json);

	$data = json_decode($json, true);
	//$message = $parsed_json->{'message'}->{'texte'};
	$message = $data['message']['texte'];
	echo "Message: $message";

	$error = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from form 
      	$data['message']['texte'] = $_POST['texte'];
      	if(isset($_POST['affiche']))
      	{
      		$data['message']['active'] = true;
      	}
      	else
      	{
      		$data['message']['active'] = false;
      	}
		
		$newJsonString = json_encode($data);
		file_put_contents('message.json', $newJsonString);      
   }
?>

<!DOCTYPE html>

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
	<script src="../js/scripts.js"></script>
	<script type = "text/javascript" language = "javascript">
		$(document).ready(function() {
           $.getJSON('message.json', function(jd) {
           		console.log(jd.message.active)
           		$('#affiche').prop("checked", jd.message.active);

           		if(jd.message.texte == "")
           		{
           			$('#json-texte').append('<p class="form-input">Aucun message à afficher</p>');
           		}
           		else
           		{
           			$('#json-texte').append('<p class="form-input">' + jd.message.texte + '</p>');
           			$('.text').val(jd.message.texte);
           		}
           });
		});	
	</script>
</head>
<body class="private-page">
   <div class="container">
      <div class="iframe-p-text">
         <div class="iframe-title-bg"><span>Section réservée à l'administration</span></div>
         	<div class="texteInfo">
            	<div class="box-title">Entrez le message</div>
	            <div class="box-inner">
	            	<form class="message-form" id="formulaire" name="formulaire" action="" method="POST">
			         	<div>
							<span class="form-label">Afficher le message:</span>
							<input type="checkbox" id="affiche" name="affiche[]" value="message">
						</div>

						<div class="form-label">Dernier message enregistré:&nbsp;</div>
						<div id="json-texte"></div>

						<div class="form-label">Votre message:&nbsp;</div>
						<div>
							<textarea id="texte form-input" class="text" name="texte" value="" rows="3" cols="120"></textarea>
						</div>
						<div class="small-height"></div>
						<div>
						  	<button type="button submit" class="btn btn-primary">Envoyer</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div>
		<button class="btn btn-primary" onclick="goBack()">Retour</button>
	</div>
	<div class="private-site-footer"></div> 
</body>
	
</html>