<?php
   include('session.php');
?>
<html class="no-js" lang="fr-CA">
<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>CPE Centre-Jour</title>
   <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>

   <link rel="stylesheet" href="../css/couleursChaudes.css">
   <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
   <script src="../bootstrap/js/jquery-2.1.3.min.js"></script>
   <script src="../bootstrap/js/bootstrap.js"></script>
   <script src="../js/scripts.js"></script>
</head>
<body class="private-page">
	<div id="welcome-form-container" class="container">
		<div class="iframe-p-text">
			<div class="iframe-title-bg"><span>Bienvenue <?php echo $login_session; ?></span></div>
			
			<div class="iframe-div-title small-height"><span><a href="modif.php">Modifier la liste des employés (ées)</a></span></div>
			<div class="iframe-div-title small-height"><span><a href="urgence.php">Ajouer un message sur la page d'accueil</a></span></div>
			<button class="txt-logout btn btn-primary" onClick="logout()">Déconnexion</button>
		</div>

	</div>
	<div class="private-site-footer"></div>
</body>
   
</html>