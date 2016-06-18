<?php
	include('session.php');

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

	if (isset($_POST['envoyer']))
	{
		if($_POST['afficher'] == 1)
		{
			if($_POST['texte'] == '')
			{
				$error = "Veuillez entrer un message.";
			}
			else if($_POST['date'] == '')
			{
				$error = "Veuillez entrer la date du jour.";
			}
			else
			{
				$bdd->exec("UPDATE message SET afficher='".$_POST['afficher']."',texte='".htmlentities ($_POST['texte'], ENT_QUOTES)."',date='".$_POST['date']."' where id='1'");
				$error = "Le message a été enregistré et sera afficher sur la page d'accueil.";
			}
		}
		else
		{
			$bdd->exec("UPDATE message SET afficher='".$_POST['afficher']."' where id='1'");
			$error = "Il n'y aura plus de message affiché sur la page d'accueil.";
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
</head>
<body class="private-page">
   <div id="urgence-form-container">
      <div class="iframe-p-text">
         <div class="iframe-title-bg"><span>Gestion des messages importants</span></div>
         	<div class="texteInfo">
            	<div class="box-title">Entrez le message</div>
	            <div class="box-inner">
	            	<form class="message-form" id="formulaire" name="formulaire" action="" method="POST">
	            		<div class="warning-text"><p><?php echo $error; ?></p></div>
			         	<div>
							<div class="form-label label-message">Afficher le message</div>
							<label>
								<select name="afficher" type="text" id="aficher">
								<?php
								if($result[0]['afficher'] == 1)
		                        {
		                            echo "<option selected value='1'>Oui</option>
		                                  <option value='0'>Non</option>";
		                        }
		                        else
		                        {
		                            echo "<option value='1'>Oui</option>
		                        <option selected value='0'>Non</option>";
		                        } 
		                        ?>
		                        </select>
							</label>
						</div>
						<div class="small-height"></div>
						<div>
							<div class="form-label label-message">Dernier message enregistré:&nbsp;</div>
							<div id="json-texte"><?php echo "<p class='messageInDB'>".$result[0]['date']." : ".$result[0]['texte']."</p>" ?></div>
						</div>
						<div>
							<div class="form-label">Votre message:&nbsp;</div>
							<div>
								<textarea class="texte message-text-message" id="texte" name="texte"></textarea>
							</div>
						</div>
						<div>
							<div class="form-label">Date du jour:&nbsp;</div>
							<div>
								<input class="search-form" id="date" name="date" placeholder="jj-mm-aaaa"></input>
							</div>
						</div>
						<div class="small-height"></div>
						<div>
							<input class='btn btn-primary' name='envoyer' type='submit' id='envoyer' value='Envoyer' />
						  	<!-- <button type="button submit" class="btn btn-primary">Envoyer</button> -->
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