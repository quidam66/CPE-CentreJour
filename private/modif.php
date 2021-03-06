<?php
    include('session.php');
?>
<!doctype html>
<html class="no-js" lang="fr-CA">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>CPE Centre Jour</title>
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Clicker+Script' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../css/styles.css" >
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery-2.1.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<script src="../js/scripts.js"></script>
</head>
<body class="private-page">
	<div class="iframe-title-bg"><span>Manipulation de la liste d'employés(ées)</span></div>
	<div id="modif-form-container">
		<form id="form1" name="form1" method="post" action="code.php">
			<div class="couleur-fond-td">
				<label>
					<input class='btn btn-success' name="rechercher" type="submit" id="rechercher" value="Rechercher" />
					<input class="search-form" name="t_rechercher" type="text" id="t_rechercher" />
					<span>Recherchez par numéro</span>
				</label>
			</div>
			<div class="small-height"></div>
			<div>Numéro</div>
			<div>
				<label>
					<input class="search-form" name="t_cpe_id" type="text" id="t_cpe_id" />
				</label>
			</div>
			<div>Nom</div>
			<div>
				<label>
					<input class="search-form" name="t_nom" type="text" id="t_nom" />
				</label>
			</div>
				</tr>
				<tr>
			<div>Prénom</div>
			<div>
				<label>
					<input class="search-form" name="t_prenom" type="text" id="t_prenom" />
				</label>
			</div>
			<div>Poste</div>
			<div>
				<label>
					<input class="search-form" name="t_poste" type="text" id="t_poste" />
				</label>
			</div>
			<div>Groupe</div>
			<div>
				<label>
					<select name="t_groupe" type="text" id="t_groupe" />
						<option>Employés</option>
						<option>Administration</option>
					<select>
				</label>
			</div>
			 <div class='small-height'></div>
			<div>
				<label>
					<input class='btn btn-success' name="ajouter" type="submit" id="ajouter" value="Ajouter" />
				</label>
			</div>
		</form>
<?php
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

	$reponse = $bdd->query('SELECT * FROM employes ORDER BY nom');  
?>
		<div class="small-height"></div>
		<div class="form-label">Liste des employés(ées)</div>
		<table class="tableEmploye">
			<thead>
				<tr>
					<th>Numéro</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Poste</th>
					<th>Groupe</th>
				</tr>
			</thead>
			<body>
<?php
$var=0;
while ($donnees = $reponse->fetch())
{
 
if ($var==0)
{
?>
			<tr class="color-row-zero">
				<td><?php echo $donnees['cpe_id']; ?></td>
				<td><?php echo $donnees['nom']; ?></td>
				<td><?php echo $donnees['prenom']; ?></td>
				<td><?php echo $donnees['titre']; ?></td>
				<td><?php echo $donnees['groupe']; ?></td>
			</tr>
<?php
$var=1; 
 }
else
{
?>
			<tr class="color-row-one">
				<td><?php echo $donnees['cpe_id']; ?></td>
				<td><?php echo $donnees['nom']; ?></td>
				<td><?php echo $donnees['prenom']; ?></td>
				<td><?php echo $donnees['titre']; ?></td>
				<td><?php echo $donnees['groupe']; ?></td>
			</tr>
<?php
$var=0; 
 }
 }
$reponse->closeCursor();
?>
		</body>
		</table>
	</div>
	<div id='btn-back'>
		<button class="btn btn-primary" onClick="backToWelcome()">Retour</button>
	</div>
	<div class="private-site-footer"></div> 
</body>
</html>