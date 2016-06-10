<?php
include('session.php');

//$bdd = new PDO('mysql:host=localhost;dbname=cpecentrejour;charset=utf8', 'root', '');

$rech=$_POST['t_rechercher'];
$nom=$_POST['t_nom'];
$prenom=$_POST['t_prenom'];
$poste=$_POST['t_poste'];

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
  $reponse = $bdd->query("SELECT * FROM employes WHERE nom='".$rech."'");


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
      if ($donnees['nom'] == $rech)
      {
        echo "<form id='form1' name='form1' method='post' action='code.php'>
        <table width='420' border='0'>
        <tr>
         <td width='169' bgcolor='#CCFF00'><label>
        <input name='rechercher' type='submit' id='rechercher' value='Rechercher' />
         </label></td>
         <td width='369' bgcolor='#CCFF00'><label>
        <input name='t_rechercher' type='text' id='t_rechercher' value='$donnees[nom]' />
         </label>Recherche par nom</td>
       </tr>
       <tr>
         <td>Nom</td>
         <td><label>
        <input name='t_nom' type='text' id='t_nom'  value='$donnees[nom]'/>
         </label></td>
       </tr>
       <tr>
         <td>Prénom</td>
         <td><label>
        <input name='t_prenom' type='text' id='t_prenom' value='$donnees[prenom]' />
         </label></td>
       </tr>
       <tr>
         <td>Poste</td>
         <td><label>
        <input name='t_poste' type='text' id='t_poste' value='$donnees[titre]' />
         </label></td>
       </tr>
       <tr>
         <td colspan='2'><label>
        <input name='nouveau' type='reset' id='nouveau' value='Nouveau' />
        <input name='ajouter' type='submit' id='ajouter' value='Ajouter' />
        <input name='modifier' type='submit' id='modifier' value='Modifier' />
        <input name='supprimer' type='submit' id='supprimer' value='Supprimer' />
         </label></td>
        </tr>
        </table>
        <p> </p>
        </form>";
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
      echo '<body onLoad="alert(\'Le nom obligatoire\')">';
      echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
    }
    elseif ($prenom=='')
    {
      echo '<body onLoad="alert(\'Le prénom obligatoire...\')">';
      echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
    }
    elseif($poste=='')
    {
      echo '<body onLoad="alert(\'Le poste obligatoire...\')">';
      echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
    }
    else
    {
      //$bdd->exec("UPDATE employes SET nom='".$nom."',prenom='".$prenom."',titre='".$poste."' where nom='".$rech."'");
      $bdd->exec("INSERT INTO employes(nom, prenom, titre) VALUES('".$nom."', '".$prenom."', '".$poste."')");
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
      $bdd->exec("UPDATE employes SET nom='".$nom."',prenom='".$prenom."',titre='".$poste."' where nom='".$rech."'");
      echo '<body onLoad="alert(\'Modification effectuée...\')">';
      echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
      //mysql_close();
    }
  }
  else if(isset($_POST['supprimer']))       
  {
/*    $rqt="delete  FROM employes  where nom ='$rech'";
    DELETE FROM jeux_video WHERE nom='Battlefield 1942'
*/    $bdd->exec("DELETE FROM employes where nom='".$rech."'");
    //mysql_query($rqt);
    echo '<body onLoad="alert(\'Suppression effectuée...\')">';
    echo '<meta http-equiv="refresh" content="0;URL=modif.php">';
    //mysql_close();
  }
}

//$bdd = new PDO('mysql:host=localhost;dbname=cpecentrejour;charset=utf8', 'root', '');

$reponse = $bdd->query('SELECT * FROM employes'); 
//$req="select * from employes";
/*mysql_query($req);
$res=mysql_query($req,$cn);*/  
?>
  <table width="630" align="left" bgcolor="#CCCCCC">
    <tr >
      <td width="152">Nom</td>
      <td width="66">Prénom</td>
      <td width="248">Poste</td>
    </tr>
<?php
  $var=0;
  while ($donnees = $reponse->fetch())
  {
    if ($var==0)
    {
?>
      <tr bgcolor="#EEEEEE">
        <td><?php echo $donnees['nom']; ?></td>
        <td><?php echo $donnees['prenom']; ?></td>
        <td><?php echo $donnees['titre']; ?></td>
      </tr>
<?php
    $var=1; 
    }
    else
    {
?>
      <tr bgcolor="#FFCCCC">
        <td><?php echo $donnees['nom']; ?></td>
        <td><?php echo $donnees['prenom']; ?></td>
        <td><?php echo $donnees['titre']; ?></td>
      </tr>
<?php
    $var=0; 
    }
  }
  $reponse->closeCursor();
?>
</table>