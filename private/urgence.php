<?php
   include('session.php');

	$json = file_get_contents("message.json");

	//$parsed_json = json_decode($json);

	$data = json_decode($json, true);
	//$message = $parsed_json->{'message'}->{'texte'};
	$message = $data['message']['texte'];

	$error = "";

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
      	if((($_POST['texte'] != '') && isset($_POST['affiche'])) ||
      	  (($_POST['texte'] != '') && !isset($_POST['affiche'])) ||
      	  (($_POST['texte'] == '') && !isset($_POST['affiche'])))
      	{
	      	if(isset($_POST['affiche']))
	      	{
	      		$data['message']['active'] = true;
	      	}
	      	else
	      	{
	      		$data['message']['active'] = false;
	      	}

      		$data['message']['texte'] = $_POST['texte'];
			$date = date('d-m-Y');
			$data['message']['date'] = $date;
			$newJsonString = json_encode($data);
			file_put_contents('message.json', $newJsonString); 
      	}
      	else if (($_POST['texte'] == '') && isset($_POST['affiche']))
      	{
      		$error = "Veuillez entrer un message.";
      	}
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

	<link rel="stylesheet" href="../css/styles.css">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery-2.1.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<script src="../js/scripts.js"></script>
	<script type = "text/javascript" language = "javascript">
		$(document).ready(function() {
           $.getJSON('message.json', function(jd) {
           		console.log(jd.message.active);
           		console.log(jd.message.texte);
           		console.log(jd.message.date);
           		$('#affiche').prop("checked", jd.message.active);

           		if(jd.message.texte == "")
           		{
           			$('#json-texte').append('<p>Aucun message à afficher</p>');
           		}
           		else
           		{
           			$('#json-texte').append('<p>' + jd.message.date+ ' : ' + jd.message.texte + '</p>');
           			$('.texte').val(jd.message.texte);
           		}
           });
		});	
	</script>
</head>
<body class="private-page">
   <div id="urgence-form-container">
      <div class="iframe-p-text">
         <div class="iframe-title-bg"><span>Section réservée à l'administration</span></div>
         	<div class="texteInfo">
            	<div class="box-title">Entrez le message</div>
	            <div class="box-inner">
	            	<form class="message-form" id="formulaire" name="formulaire" action="" method="POST">
	            		<div class="warning-text"><p><?php echo $error; ?></p></div>
			         	<div>
							<input class="form-ckb" type="checkbox" id="affiche" name="affiche[]" value="message"/>
							<label class="form-label label-message">Afficher le message</label>
						</div>
						<div class="small-height"></div>
						<div>
							<div class="form-label label-message">Dernier message enregistré:&nbsp;</div>
							<div id="json-texte"></div>
						</div>
						<div>
							<div class="form-label">Votre message:&nbsp;</div>
							<div>
								<textarea class="texte message-text-message" id="texte" name="texte"></textarea>
							</div>
						</div>
						<div class="small-height"></div>
						<div>
						  	<button type="button submit" class="btn btn-primary">Envoyer</button>
						</div>
		                <div class="small-height"></div>
					</form>
				</div>
			</div>
		</div>
		<div>
			<button class="btn btn-primary" onclick="backToWelcome()">Retour</button>
		</div>
	</div>
	<div class="private-site-footer"></div> 
</body>
	
</html>