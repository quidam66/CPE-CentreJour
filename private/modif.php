<html>
<head>

<style type="text/css">
<!--
.Style4 {font-size: 12px}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="code.php">
  <table width="420" border="0">
    <tr>
      <td width="169" bgcolor="#CCFF00"><label>
        <input name="rechercher" type="submit" id="rechercher" value="Rechercher" />
      </label></td>
      <td width="369" bgcolor="#CCFF00"><label>
        <input name="t_rechercher" type="text" id="t_rechercher" />
        <span class="Style4">Recherche par nom</span> </label></td>
    </tr>
    <tr>
      <td>Nom</td>
      <td><label>
        <input name="t_nom" type="text" id="t_nom" />
      </label></td>
    </tr>
    <tr>
      <td>Prénom</td>
      <td><label>
        <input name="t_prenom" type="text" id="t_prenom" />
      </label></td>
    </tr>
    <tr>
      <td>Poste</td>
      <td><label>
        <input name="t_tel" type="text" id="t_poste" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <input name="nouveau" type="reset" id="nouveau" value="Nouveau" />
        <input name="ajouter" type="submit" id="ajouter" value="Ajouter" />
        <input name="modidier" type="submit" id="modidier" value="Modifier" />
        <input name="supprimer" type="submit" id="supprimer" value="Supprimer" />
      </label></td>
    </tr>
  </table>
  <p> </p>
</form>
<?php

$bdd = new PDO('mysql:host=localhost;dbname=cpecentrejour;charset=utf8', 'root', '');

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
//while($row=mysql_fetch_array($res))
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
</tr><undefined></undefined>
<?php
$var=0; 
 }
 }
?>
</table>
</body>
</html>