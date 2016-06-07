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

	<link rel="stylesheet" href="../css/couleursChaudes.css">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery-2.1.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body id="iframeBody">
	<div class="container">
		<div class="iframe-p-text">
			<div class="iframe-title-bg samll-height"><span>Liste des employés(ées)</span></div>

			<form id="formulaire" name="formulaire" action="" method="POST">
				<?php
					while ($donnees = $reponse->fetch())
					{
					?>
						<div>
							<span class="form-label">ID:&nbsp;</span>
							<span><?php echo $donnees['id']; ?></span>
							<span class="form-label">Prénom:&nbsp;</span>
							<span><input class="input form-input" id="nom" name="nom" size="25" maxlength="50" type="text" value="<?php echo $donnees['prenom']; ?>"></span>
							<span class="form-label">Nom:&nbsp;</span>
							<span><input class="input form-input" id="nom" name="nom" size="25" maxlength="50" type="text" value="<?php echo $donnees['nom']; ?>"></span>
							<span class="form-label">Poste:&nbsp;</span>
							<span><input class="input form-input" id="nom" name="nom" size="25" maxlength="50" type="text" value="<?php echo $donnees['titre']; ?>"></span>
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
		</div>
	</div>
</body>
</html>
