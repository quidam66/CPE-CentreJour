<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CPE Centre Jour</title>
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../css/couleursChaudes.css">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery-2.1.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body id="iframeBody">
	<div class="container">
		<div class="iframe-p-text">
			<div class="iframe-title-bg samll-height"><span>Votre enfant sera absent</span></div>
				<p>
					<img class="align-right" src="../images/enfants.png" style="width: 450px; height:400px"></img>
				</p>
					<form id="formulaire" name="formulaire" action="" method="POST">
						<div class="form-label">Votre nom:&nbsp;</div>
						<div>
							<input class="input form-input" id="nom" name="nom" size="42" maxlength="50" type="text">
						</div>
						<div class="form-label">Le nom de votre/vos enfant(s):&nbsp;</div>
						<div>
							<input class="input form-input" id="enfant" name="enfant" size="42" maxlength="100" type="text">
						</div>
						<div class="form-label">Votre courriel:&nbsp;</div>
						<div>
							<input class="input form-input" id="courriel" name="courriel" size="42" maxlength="50" type="text">
						</div>
						<div class="form-label">Raison(s) de l'absence:&nbsp;</div>
						<div>
							<textarea id="message form-input" name="message" value="" rows="10" cols="66"></textarea>
						</div>
						<div>
						  	<button type="button submit" class="btn btn-primary">Envoyer</button>
						</div>
			    	</form>

			    	<?php
					//=====Création du header de l'e-mail
					$header = "MIME-Version: 1.0\r\n";
					$header .= 'From: "CPE-CentreJour"<receprtion@cpecentrejour.com>'."\n";
					$header .= 'Content-Type: text/html; charset="utf-8"'."\n";
					$header .= 'Content-Transfert-Encoding: 8bit';
					
					
					//=========
			    		if(isset($_POST) &&  !empty($_POST['nom']) && !empty($_POST['enfant']) && !empty($_POST['message']))
			    		{
			    			extract($_POST);
			    			$destinataire = 'quidam66@gmail.com';
			    			$expediteur = $nom.'<' .$courriel.'>';
			    			$sujet = 'Enfant absent: '.$enfant;
			    			$message = $enfant. ' sera absent(e): '."\r\n";
			    			$message .= $_POST['message'];
			    			$mail = mail($destinataire, $sujet, $message, $header);

			    			if($mail)echo'Courriel envoye avec succes';else echo'Echec envoi courriel';
			    		}
			    		else
			    		{
			    			if(empty($_POST['nom']))
			    			{
			    				echo 'Entrez votre nom s\'il vous plaît';
			    			}
			    			else if (empty($_POST['enfant']))
			    			{
			    				echo 'Entrez le nom de votre/vos enfant(s) s\'il vous plaît';
			    			}
			    			else if(empty($_POST['message']))
			    			{
			    				echo 'Entrez un message s\'il vous plaît';
			    			}
			    		}
			    	?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>