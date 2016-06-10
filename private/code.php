<?php
    include('session.php');

//$bdd = new PDO('mysql:host=localhost;dbname=cpecentrejour;charset=utf8', 'root', '');

$rech=$_POST['t_rechercher'];
$nom=$_POST['t_nom'];
$prenom=$_POST['t_prenom'];
$poste=$_POST['t_poste'];
$groupe=$_POST['t_groupe'];

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=cpecentrejour;charset=utf8', 'root', '');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}


/*$cn=mysql_connect("localhost","root");
mysql_select_db("cpecentrejour",$cn);
*/
if (isset($_POST['rechercher']))
{
  $reponse = $bdd->query("SELECT * FROM employes WHERE id='".$rech."'");


  $result = $reponse->fetchAll(PDO::FETCH_ASSOC);
  if(empty($result))
  {
    echo '<body onLoad="alert(\'Employé introuvable...\')">';
    echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
  }
  else
  {
    foreach ($result as $donnees)
    {
      if ($donnees['id'] == $rech)
      {
        echo "
<html class='no-js' lang='fr-CA'>
<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>CPE Centre Jour</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Clicker+Script' rel='stylesheet' type='text/css'>

    <link rel='stylesheet' href='../css/couleursChaudes.css' >
    <link href='../bootstrap/css/bootstrap.css' rel='stylesheet'>
    <script src='../bootstrap/js/jquery-2.1.3.min.js'></script>
    <script src='../bootstrap/js/bootstrap.js'></script>
    <script src='../js/scripts.js'></script>
</head>
<body class='private-page'>
    <div class='iframe-title-bg'><span>Manipulation de la liste d'employés(ées)</span></div>
    <div id='employe_form_container'>
        <form id='form1' name='form1' method='post' action='code.php'>
            <table>
                <tr>
                    <td>ID</td>
                    <td>
                        <label>
                            <input name='t_nom' type='text' id='t_nom'  value='$donnees[id]'/>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td>
                        <label>
                            <input name='t_nom' type='text' id='t_nom'  value='$donnees[nom]'/>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Prénom</td>
                    <td>
                        <label>
                            <input name='t_prenom' type='text' id='t_prenom' value='$donnees[prenom]' />
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Poste</td>
                    <td>
                        <label>
                            <input name='t_poste' type='text' id='t_poste' value='$donnees[titre]' />
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Groupe</td>
                    <td>
                        <label>
                            <select name='t_groupe' id='t_groupe' value='$donnees[groupe]' />
                                <option>Employés</option>
                                <option>Administration</option>
                            <select>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <label>
                            <input class='btn btn-warning' name='modifier' type='submit' id='modifier' value='Modifier' />
                            <input class='btn btn-danger' name='supprimer' type='submit' id='supprimer' value='Supprimer' />
                        </label>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id='btn-back'>
        <button class='btn btn-primary' onclick='goBack()'>Retour</button>
    </div>
    <script>
        $(document).ready(function()
        {
            $('.private-site-footer').css({'position':'absolute'}, {'bottom':'0px'});
        });
    </script>
    <div class='private-site-footer'></div> 
</body>
</html>";
}

}
$reponse->closeCursor();
}
}
else
{
if (isset($_POST['ajouter']))
{
if($nom=='')
{
echo '<body onLoad="alert(\'Le nom est obligatoire\')">';
echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
}
elseif ($prenom=='')
{
echo '<body onLoad="alert(\'Le prénom est obligatoire...\')">';
echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
}
elseif($poste=='')
{
echo '<body onLoad="alert(\'Le poste est obligatoire...\')">';
echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
}
elseif($groupe=='')
{
echo '<body onLoad="alert(\'Le groupe est obligatoire...\')">';
echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
}
else
{
//$bdd->exec("UPDATE employes SET nom='".$nom."',prenom='".$prenom."',titre='".$poste."' where nom='".$rech."'");
$bdd->exec("INSERT INTO employes(nom, prenom, titre, groupe) VALUES('".$nom."', '".$prenom."', '".$poste."', '".$groupe."')");
//$rqt="insert employes values('$nom','$prenom','$poste')";

//mysql_query($rqt);

echo '<body onLoad="alert(\'Ajout effectuée...\')">';
echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
//mysql_close();
}
}
else if (isset($_POST['modifier']))
{
echo "dans le modifier";
if($nom=='' || $prenom=='' || $poste=='')
{
echo '<body onLoad="alert(\'faire une recherche avant la modification ou verifiez les champs\')">';
echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
}
else
{
$bdd->exec("UPDATE employes SET nom='".$nom."',prenom='".$prenom."',titre='".$poste."',groupe='".$groupe."' where id='".$rech."'");
echo '<body onLoad="alert(\'Modification effectuée...\')">';
echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
//mysql_close();
}
}
else if(isset($_POST['supprimer']))       
{
/*    $rqt="delete  FROM employes  where nom ='$rech'";
DELETE FROM jeux_video WHERE nom='Battlefield 1942'
*/    $bdd->exec("DELETE FROM employes where id='".$rech."'");
//mysql_query($rqt);
echo '<body onLoad="alert(\'Suppression effectuée...\')">';
echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
//mysql_close();
}
}
?>