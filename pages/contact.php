<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Playhouse</title>
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../css/couleursChaudes.css">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery-2.1.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body id="iframeBody">
	<div class="container">
		<div class="iframe-title-bg samll-height"><span>Nous joindre</span></div>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2732.4248319301705!2d-71.2773441976227!3d46.7762325970135!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cb896c8c6d7e171%3A0xd317276e2e7b619!2sCentre+de+la+petite+enfance+Centre+Jour!5e0!3m2!1sfr!2sca!4v1464471530429" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></div>
				<div class="small-height"></div>
				<div class="texteInfo">
					<div class="box-title">Infos</div>
					<div class="box-inner">
						<div class="glyphicon glyphicon-earphone"><span>Téléphone:</span></div>
						<p> (418) 656-2131 poste: 5430</p>
						<div class="small-height"></div>
						<p>Horaire</p>
						<p>Lundi au vendredi</p>
						<p>7h00 - 18h00</p>
					</div> 
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<form id="formulaire" name="formulaire" action="" method="POST">
					<div class="form-label">Votre nom:&nbsp;</div>
					<div>
						<input class="input form-input" id="nom" name="nom" size="42" maxlength="50" type="text">
					</div>
					<div class="form-label">Votre courriel:&nbsp;</div>
					<div>
						<input class="input form-input" id="courriel" name="courriel" size="42" maxlength="50" type="text">
					</div>
					<div class="form-label">Sujet:&nbsp;</div>
					<div>
						<input class="input form-input" id="sujet" name="sujet" size="42" maxlength="50" type="text">
					</div>
					<div class="form-label">Votre message:&nbsp;</div>
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
		    		if(isset($_POST) &&  !empty($_POST['nom']) && !empty($_POST['sujet']) && !empty($_POST['message']))
		    		{
		    			extract($_POST);
		    			$destinataire = 'quidam66@gmail.com';
		    			$expediteur = $nom.'<' .$courriel.'>';
		    			$mail = mail($destinataire, $sujet, $message, $header);
		    			//$mail = mail('archiedenis@hotmail.com', '$sujet', '$message', 'hotmail.com');

		    			if($mail)echo'Courriel envoye avec succes';else echo'Echec envoi courriel';
		    		}
		    		else
		    		{
		    			if(empty($_POST['nom']))
		    			{
		    				echo 'Entrez votre nom s\'il vous plaît';
		    			}
		    			else if (empty($_POST['sujet']))
		    			{
		    				echo 'Entrez votre le sujet de votre courriel s\'il vous plaît';
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
</body>
</html>