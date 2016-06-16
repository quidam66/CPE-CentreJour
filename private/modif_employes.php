<?php
   include('session.php');


	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=cpecentrejour;charset=utf8', 'root', '');


	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}

	$reponse = $bdd->query('SELECT * FROM employes');

	/*while ($donnees = $reponse->fetch())
	{
	?>
	    <p>
	    <strong>Penom</strong> : <?php echo $donnees['prenom']; ?><br />
	    <strong>Nom</strong> : <?php echo $donnees['nom']; ?><br />
	    <strong>Poste</strong> : <?php echo $donnees['titre']; ?><br /><br /><br /><br />
	   </p>
	<?php
	}

	$reponse->closeCursor(); */
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CPE Centre Jour</title>
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../css/styles.css">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery-2.1.3.min.js"></script>
	<script src="../js/scripts.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body class="private-page">
	<div class="container">
		<div class="iframe-p-text">
			<div class="iframe-title-bg samll-height"><span>Liste des employés(ées)</span></div>

			<form id="formulaire" name="formulaire" action="" method="POST">
				<?php
					while ($donnees = $reponse->fetch())
					{
					?>
						<div>
							<span class="form-label"><?php echo $donnees['id']; ?></span>
							<span class="form-label">Prénom:&nbsp;</span>
							<span><input class="input form-input" id="nom" name="prenom" size="25" maxlength="50" type="text" value="<?php echo $donnees['prenom']; ?>"></span>
							<span class="form-label">Nom:&nbsp;</span>
							<span><input class="input form-input" id="nom" name="nom" size="25" maxlength="50" type="text" value="<?php echo $donnees['nom']; ?>"></span>
							<span class="form-label">Poste:&nbsp;</span>
							<span><input class="input form-input" id="nom" name="titre" size="25" maxlength="50" type="text" value="<?php echo $donnees['titre']; ?>"></span>
							<span>
						  	<button type="button submit" class="btn btn-success">Modifier</button>
							</span>
							<span>
						  	<button type="button submit" class="btn btn-warning">Effacer</button>
							</span>
					    </div>
	
					    <!-- <p>
					    <strong>Penom</strong> : <br />
					    <strong>Nom</strong> : <?php echo $donnees['nom']; ?><br />
					    <strong>Poste</strong> : <?php echo $donnees['titre']; ?><br /><br /><br /><br />
					   </p> -->
					<?php
					}

					$reponse->closeCursor(); 
				?>

			</fomr>

			<div>
				<button class="btn btn-primary" onclick="goBack()">Retour</button>
			</div>
		</div>
	</div>
</body>
</html>
