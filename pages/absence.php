<?php
	require_once "Mail.php";

	if(isset($_POST['envoyer']))
	{
		if(!empty($_POST['nom']) && !empty($_POST['courriel']) && !empty($_POST['enfant']) && !empty($_POST['message']))
		{
			$nom = $_POST['nom'];
			$courriel = $_POST['courriel'];


			$from = $nom.'<'.$courriel.'>';
			$to = 'direction@cpecentrejour.com';
			$cc = 'reception@cpecentrejour.com';
			$recipients = $to. ','. $cc;
			$subject = 'Enfant absent: '. $_POST['enfant'];
			$body = $_POST['enfant']. ' sera absent(e): '."\r\n";
			$body .= $_POST['message'];
			
			//$body = $_POST['message'];
			$host = "pop.logicielsdavos.com";

			$username = "cpecentrejour@logicielsdavos.com";
			$password = "22X6503U";
			$headers = array ('From' => $from,
			                  'To' => $to,
			                  'Cc' => $cc,
			                  'Subject' => $subject);
			$smtp = Mail::factory('smtp',
			                      array ('host' => $host,
			                             'auth' => true,
			                             'username' => $username,
			                             'password' => $password));

			                             
			$mail = $smtp->send($recipients, $headers, $body);

			if (PEAR::isError($mail))
			{
			    $error = $mail->getMessage();
			} 
			else 
			{
			   $error = "Votre courriel a été envoyé au CPE Centre Jour";
			}
		}
		else
		{
			if(empty($_POST['nom']))
			{
				$error = "Entrez votre nom s'il vous plaît";
			}
			else if (empty($_POST['enfant']))
			{
				 $error = "Entrez votre le nom de votre/vos enfant(s) s'il vous plaît";
			}
			else if (empty($_POST['courriel']))
			{
				$error = "Entrez votre courriel s'il vous plaît";
			}
			else if(empty($_POST['message']))
			{
				$error = "Entrez un message s'il vous plaît";
			}
		}
	}
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
	<script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body id="iframeBody">
	<div class="container">
		<div class="iframe-p-text">
			<div class="iframe-title-bg samll-height"><span>Votre enfant sera absent</span></div>
			<form id="formulaire" name="formulaire" action="" method="POST">
				<div class="error-connexion"><p><?php echo $error; ?></p></div>

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
					<textarea class="message-text" id="message" name="message" value="" rows="10" cols="66"></textarea>
				</div>
				<div class="small-height"></div>
				<div>
				  	<button type="button submit" name="envoyer" id="envoyer"class="btn btn-primary">Envoyer</button>
				</div>						
	    	</form>
		</div>
	</div>
</body>
</html>