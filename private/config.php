<?php
	/**
	 * Voici les détails de connexion à la base de données
	 */

	try
	{
		//LOCAL VALUES
		//$bdd = new PDO('mysql:host=localhost;dbname=cpecentrejour;charset=utf8', 'root', '');

		//PROD VALUES
		$bdd = new PDO("mysql:host=localhost;dbname=Davos_CPECentreJour;charset=utf8", "Davos_CPECentreJ", "U7UHsbKPfuUyteH6");
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
?>