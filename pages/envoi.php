<?php 

require_once "Mail.php";


$nom = "CPE Centre Jour";
$courriel = "reception@cpecentrejour.com";


$from = "$nom  <$courriel>";
$to = "Nom du destinataire <destinataire@domaine.com>";
$subject = "Sujet du message";
$body = "Voici le contenu du message, texte ou HTML.";


$username = "reception@cpecentrejour.com";
$password = "22X6503U";
$headers = array ('From' => $from,
                  'To' => $to,
                  'Subject' => $subject);
$smtp = Mail::factory('smtp',
                      array ('host' => $host,
                             'auth' => true,
                             'username' => $username,
                             'password' => $password));

                             
$mail = $smtp->send($to, $headers, $body);
 
if (PEAR::isError($mail))
{
    die("Erreur");
} 
else 
{
    die("Succès");
}

?>