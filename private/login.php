<?php
   include("config.php");
   session_start();
   
   $error = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM members WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {
         //session_register("myusername");
         //$_SESSION['name'] = $name;
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Votre nom d'utilisateur ou votre mot de passe est refusé";
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

   <link rel="stylesheet" href="../css/couleursChaudes.css">
   <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
   <script src="../bootstrap/js/jquery-2.1.3.min.js"></script>
   <script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body class="login-page">
   <div class="container">
      <div class="iframe-p-text">
         <div class="iframe-title-bg"><span>Section réservée à l'administration</span></div>
         <div class="texteInfo">
            <div class="box-title">Entrez vos informations</div>
            <div class="box-inner">
               <form class="login-form" id="formulaire" name="formulaire" action="" method="POST">
                  <div class="form-label">Nom d'utilisateur:&nbsp;</div>
                  <div>
                     <input class="input form-input" id="username" name="username" size="42" maxlength="50" type="text">
                  </div>
                  <div class="form-label">Mot de passe:&nbsp;</div>
                  <div>
                     <input class="input form-input" id="password" name="password" size="42" maxlength="50" type="password">
                  </div>
                  <div class="small-height"></div>
                  <div>
                     <button type="button submit" class="btn btn-primary">Connexion</button>
                  </div>
                  <div class="small-height"></div>
                  <div class="error-connexion"><p><?php echo $error; ?></p></div>
               </form>
            </div>
         </div>
         <div class="private-site-footer">
         </div>   
      </div>
   </div>
</body>
</html>