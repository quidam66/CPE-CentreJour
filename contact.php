<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Playhouse</title>
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/couleursChaudes.css" />
	<!--<link rel="stylesheet" href="css/style.css" />-->

	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="bootstrap/js/jquery-2.1.3.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
</head>
<body id="iframeBody">
	<div class="container">
		<div class="iframe-title-bg samll-height"><span>Nous joindre</span></div>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="texteInfo">
					<div class="box-title">CPE Centre Jour</div>
					<div class="box-inner">
						<p>1100 Avenue de la Médecine</p>
						<p>Pavillon Agathe-Lacerte</p>
						<p>Bureau 1106</p>
						<p>Ville de Québec, QC</p>
						<p>G1V 0A6</p>
						<div class="glyphicon glyphicon-earphone"></div>
						<p> (418) 656-2131 poste: 5430</p>
					</div>
				</div>
				<div class="texteInfo">
					<div class="box-title">Horaire</div>
					<div class="box-inner">
						<p>Lundi au vendredi</p>
						<p>7h00 - 18h00</p>
					</div> 
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<form id="formulaire" name="formulaire" action="" method="POST">
					<div>Votre nom:&nbsp;</div>
					<div>
						<input class="input" id="nom" name="nom" size="42" maxlength="50" type="text">
					</div>
					<div>Votre courriel:&nbsp;</div>
					<div>
						<input class="input" id="courriel" name="courriel" size="42" maxlength="50" type="text">
					</div>
					<div>Sujet:&nbsp;</div>
					<div>
						<input class="input" id="sujet" name="sujet" size="42" maxlength="50" type="text">
					</div>
					<div>Votre message:&nbsp;</div>
					<div>
						<textarea id="message" name="message" value="" rows="18" cols="40"></textarea>
					</div>
					<div>
					  	<input value="Envoyer" type="submit">
					</div>
		    	</form>

		    	<?php
		    		if(isset($_POST) &&  !empty($_POST['nom']) && !empty($_POST['sujet']) && !empty($_POST['message']))
		    		{
		    			extract($_POST);
		    			$destinataire = 'archiedenis@hotmail.com';
		    			$expediteur = $nom.'<' .$courriel.'>';
		    			$mail = mail($destinataire, $sujet, $message, $expediteur);
		    			//$mail = mail('archiedenis@hotmail.com', '$sujet', '$message', 'hotmail.com');

		    			if($mail)echo'Courriel envoye avec succes';else echo'Echec envoi courriel';
		    		}
		    		else echo 'Formulaire non soumis ou certains champs sont vides';
		    	?>
			</div>
		</div>
	</div>
</body>
</html>