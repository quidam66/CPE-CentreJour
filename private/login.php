<?php
   include("config.php");
   session_start();
   
   $error = "";

   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password'];
      if($_POST['username'] == '' || $_POST['password'] == '')
      {
         $error = "Veuillez entrer un nom d'utilisateur ou un mot de passe."; 
      }
      else
      {
         $result = $bdd->query("SELECT * FROM members WHERE username = '".$myusername."' AND password = '".$mypassword."'");
         $count = $result->rowCount();
           
         if($count == 1)
         {
            $_SESSION['login_user'] = $myusername;
            
            header("location: welcome.php");
         }
         else
         {
            $error = "Votre nom d'utilisateur ou votre mot de passe est refusé";
         }         
      }
   }
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
   <script src="../js/scripts.js"></script>
</head>
<body class="private-page">
   <div id="login-form-container">
      <div class="iframe-p-text">
         <div class="iframe-title-bg"><span>Section réservée à l'administration</span></div>
         <div class="texteInfo">
            <div class="box-title">Entrez vos informations</div>
            <div class="box-inner">
               <form class="login-form" id="formulaire" name="formulaire" action="" method="POST">
                  <div class="error-connexion"><p><?php echo $error; ?></p></div>

                  <div class="form-label">Nom d'utilisateur:&nbsp;</div>
                  <div>
                     <input class="form-input" id="username" name="username" maxlength="50" type="text"/>
                  </div>
                  <div class="form-label">Mot de passe:&nbsp;</div>
                  <div>
                     <input class="form-input" id="password" name="password" maxlength="50" type="password"/>
                  </div>
                  <div class="small-height"></div>
                  <div>
                     <button type="button submit" class="btn btn-primary">Connexion</button>
                  </div>
                  <div class="small-height"></div>
               </form>
            </div>
         </div>
   
      </div>
      <div>
         <button class="btn btn-primary" onclick="backHome()">Retour</button>
      </div>
   </div>
   <div class="private-site-footer"></div>
</body>
</html>