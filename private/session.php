<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];

   $ses_sql = $bdd->query("SELECT username FROM members WHERE username = '".$user_check."'");
   $eCount = $ses_sql->rowCount();

   //echo "Count = ".$eCount;

   $row = $ses_sql->fetchAll(PDO::FETCH_ASSOC);
   $login_session = $row[0]['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>