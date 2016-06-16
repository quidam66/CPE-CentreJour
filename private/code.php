<?php
include('session.php');

$rech=$_POST['t_rechercher'];
$id=$_POST['t_cpe_id'];
$nom=$_POST['t_nom'];
$prenom=$_POST['t_prenom'];
$poste=$_POST['t_poste'];
$groupe=$_POST['t_groupe'];

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=cpecentrejour;charset=utf8', 'root', '');
  //$bdd = new PDO('mysql:host=http://www.cpecentrejour.com/gdddbmgr/;port=3306;dbname=DAVOS_CPECentreJour;charset=utf8', 'Davos_CPECentreJ', 'U7UHsbKPfuUyteH6');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}


if (isset($_POST['rechercher']))
{
  $reponse = $bdd->query("SELECT * FROM employes WHERE cpe_id='".$rech."'");


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
        if ($donnees['cpe_id'] == $rech)
        {
            echo "<!doctype html>
<html class='no-js' lang='fr-CA'>
<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>CPE Centre Jour</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Clicker+Script' rel='stylesheet' type='text/css'>

    <link rel='stylesheet' href='../css/styles.css' >
    <link href='../bootstrap/css/bootstrap.css' rel='stylesheet'>
    <script src='../bootstrap/js/jquery-2.1.3.min.js'></script>
    <script src='../bootstrap/js/bootstrap.js'></script>
    <script src='../js/scripts.js'></script>
</head>
<body class='private-page'>
    <div class='iframe-title-bg'><span>Manipulation de la liste d'employés(ées)</span></div>
    <div id='code-form-container'>
        <form id='form1' name='form1' method='post' action='code.php'>
            <input name='t_rechercher' type='hidden' id='t_rechercher' value='$rech'/>
            <div>Identifiant</div>
            <div>
                <label>
                    <input class='search-form' name='t_cpe_id' type='text' id='t_cpe_id' value='$donnees[cpe_id]'/>
                </label>
            </div>
            <div>Nom</div>
            <div>
                <label>
                    <input class='search-form' name='t_nom' type='text' id='t_nom'  value='$donnees[nom]'/>
                </label>
            </div>
            <div>Prénom</div>
            <div>
                <label>
                    <input class='search-form' name='t_prenom' type='text' id='t_prenom' value='$donnees[prenom]' />
                </label>
            </div>
            <div>Poste</div>
            <div>
                <label>
                    <input class='search-form' name='t_poste' type='text' id='t_poste' value='$donnees[titre]' />
                </label>
            </div>
            <div>Groupe</div>
            <div>
                <label>
                    <select name='t_groupe' id='t_groupe' value='$donnees[groupe]' >";
                        
                        if($donnees['groupe'] == 'Employés')
                        {
                            echo "<option selected>Employés</option>
                                    <option>Administration</option>";
                        }
                        else
                        {
                            echo "<option>Employés</option>
                        <option selected>Administration</option>";
                        }      
                    echo "
                    </select>
                </label>
            </div>
            <div class='small-height'></div>
            <div>
                <label>
                    <input class='btn btn-warning' name='modifier' type='submit' id='modifier' value='Modifier' />
                    <input class='btn btn-danger' name='supprimer' type='submit' id='supprimer' value='Supprimer' />
                </label>
            </div>
        </form>
    </div>
    <div class='small-height'></div>
    <div id='btn-back'>
        <button class='btn btn-primary' onclick='goBack()'>Retour</button>
    </div>
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
        else if ($prenom=='')
        {
            echo '<body onLoad="alert(\'Le prénom est obligatoire...\')">';
            echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
        }
        else if($poste=='')
        {
            echo '<body onLoad="alert(\'Le poste est obligatoire...\')">';
            echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
        }
        else if($groupe=='')
        {
            echo '<body onLoad="alert(\'Le groupe est obligatoire...\')">';
            echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
        }
        else
        {
            $bdd->exec("INSERT INTO employes(nom, prenom, titre, groupe) VALUES('".$nom."', '".$prenom."', '".$poste."', '".$groupe."')");

            echo '<body onLoad="alert(\'Ajout effectuée...\')">';
            echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
        }
    }
    else if (isset($_POST['modifier']))
    {
        if($nom=='' || $prenom=='' || $poste==''  || $groupe=='')
        {
            echo '<body onLoad="alert(\'faire une recherche avant la modification ou verifiez les champs\')">';
            echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
        }
        else
        {
            $bdd->exec("UPDATE employes SET nom='".$nom."',prenom='".$prenom."',titre='".$poste."',groupe='".$groupe."' where cpe_id='".$rech."'");
            echo '<body onLoad="alert(\'Modification effectuée...\')">';
            echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
        }
    }
    else if(isset($_POST['supprimer']))       
    {
        $bdd->exec("DELETE FROM employes where cpe_id='".$rech."'");
        echo '<body onLoad="alert(\'Suppression effectuée...\')">';
        echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
    }
}
?>