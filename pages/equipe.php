<?php
	try
	{
		//$bdd = new PDO('mysql:host=localhost;dbname=cpecentrejour;charset=utf8', 'root', '');
		$bdd = new PDO('mysql:host=http://www.cpecentrejour.com/gdddbmgr/;port=3306;dbname=DAVOS_CPECentreJour;charset=utf8', 'Davos_CPECentreJ', 'U7UHsbKPfuUyteH6');
		
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

	$employes = $bdd->query('SELECT * FROM employes WHERE groupe=\'Employés\' ORDER BY nom');
	$eCount = $employes->rowCount();
	if(($eCount % 2) ==0)
	{
		$employe1 = $eCount/2;
		$employe2 = $eCount/2;
	}
	else
	{
		$employe1 = ($eCount/2)+0.5;
		$employe2 = ($eCount/2)-0.5;
	}

	$admin = $bdd->query('SELECT * FROM employes WHERE groupe=\'Administration\' ORDER BY nom');
	$aCount = $admin->rowCount();
	if(($aCount % 2) ==0)
	{
		$admin1 = $aCount/2;
		$admin2 = $aCount/2;
	}
	else
	{
		$admin1 = ($aCount/2)+0.5;
		$admin2 = ($aCount/2)-0.5;
	}

	$result = $employes->fetchAll(PDO::FETCH_ASSOC);
	$resultAdmin = $admin->fetchAll(PDO::FETCH_ASSOC);
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
<body class="iframeBody background-equipe">
	<div class="container">
		<div class="iframe-p-text">
		<div class="iframe-title-bg"><span>L'équipe</span></div>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<?php
					for ($i = 0; $i <= $employe1-1; $i++)
    				{
						echo "
						<div class='team-member'>
							<div><span class='iframe-div-title'>".$result[$i]['prenom']."&nbsp;</span>
							<span class='iframe-div-title'>".$result[$i]['nom']."</span></div>
							<div class='iframe-div-subtitle'>".$result[$i]['titre']."</div>
						</div>";
					}
				?>
			</div>
			<div class="col-xs-12 col-sm-6">
				<?php
					for ($i = $employe1; $i <= ($employe1+$employe2)-1; $i++)
    				{
						echo "
						<div class='team-member'>
							<div><span class='iframe-div-title'>".$result[$i]['prenom']."&nbsp;</span>
							<span class='iframe-div-title'>".$result[$i]['nom']."</span></div>
							<div class='iframe-div-subtitle'>".$result[$i]['titre']."</div>
						</div>";
					}
				?>
			</div>
		</div>

		<div class="iframe-title-bg"><span>L'administration</span></div>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<?php
					for ($i = 0; $i <= $admin1-1; $i++)
    				{
						echo "
						<div class='team-member'>
							<div><span class='iframe-div-title'>".$resultAdmin[$i]['prenom']."&nbsp;</span>
							<span class='iframe-div-title'>".$resultAdmin[$i]['nom']."</span></div>
							<div class='iframe-div-subtitle'>".$resultAdmin[$i]['titre']."</div>
						</div>";
					}
				?>
			</div>
			<div class="col-xs-12 col-sm-6">
				<?php
					for ($i = $admin1; $i <= ($admin1+$admin2)-1; $i++)
    				{
						echo "
						<div class='team-member'>
							<div><span class='iframe-div-title'>".$resultAdmin[$i]['prenom']."&nbsp;</span>
							<span class='iframe-div-title'>".$resultAdmin[$i]['nom']."</span></div>
							<div class='iframe-div-subtitle'>".$resultAdmin[$i]['titre']."</div>
						</div>";
					}
				?>
			</div>
		</div>
	</div>
	<?php
		/*$result->closeCursor();
		$resultAdmin->closeCursor();*/
	?>
	</div>
</body>
</html>