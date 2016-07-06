<?php

	$error = "";

	try
	{
		//$bdd = new PDO('mysql:host=localhost;dbname=cpecentrejour;charset=utf8', 'root', '');
		$bdd = new PDO('mysql:host=localhost;dbname=Davos_CPECentreJour;charset=utf8', 'Davos_CPECentreJ', 'U7UHsbKPfuUyteH6');
		
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

	$message = $bdd->query('SELECT * FROM message');

	$result = $message->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
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
</head>
<body class="iframeBody background-accueil">	
	<div class="container">	
		<div>
			<div class="iframe-p-text">
				<?php
					if($result[0]['afficher'] == 1)
					{
						echo "
							<div id='warning'>
								<div class='iframe-title-bg-warning'><span>Message Important</span></div>
								<p class='warning-text'>".$result[0]['date']. " : " .$result[0]['texte']."</p>
							</div>
						";
					}
				?>

				<div class="iframe-title-bg"><span>À propos de nous</span></div>
				<p>Depuis son ouverture en 1971 sur le campus de l’Université Laval, le CPE Centre Jour a toujours été animé par une même mission :</p>
				<div class="iframe-div-title small-height center-title">* Offrir des services éducatifs de grande qualité aux enfants*</div>
				<div class="small-height"></div>
				<p>CPE Centre Jour accueille 76 enfants à partir de 18 mois et a à son emploi une équipe d’éducatrices compétentes et dévouées, une responsable à l’alimentation, une adjointe à la comptabilité et aux finances et une directrice générale.</p>

				<div class="iframe-title-bg"><span>Liste d’attente</span></div>
				<p> Vous êtes à la recherche d’une place en CPE pour votre enfant? Rendez-vous à : <a href="http://www.Laplace0-5.com" target="_blank">www.Laplace0-5.com</a>. C’est la seule façon d’inscrire votre enfant sur la liste d’attente de notre CPE. Vous pouvez aussi composer le 1 844-270-5055 ou 514-270-5055.</p>
				<div class="small-height"></div>
				<p>Étant un CPE en milieu universitaire, nous privilégions les employés et étudiants de l’Université Laval.</p>
			</div>
		</div>
	</div>
</body>
</html>