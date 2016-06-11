<?php
	/**
	 * Voici les détails de connexion à la base de données
	 */
	//LOCAL VALUES
	/*define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'super_user');
	define('DB_PASSWORD', 'a9pq96UBY46Vae5a');
	define('DB_DATABASE', 'cpecentrejour');*/

	//PROD VALUES
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=cpecentrejour;charset=utf8', 'root', '');

		//http://www.cpecentrejour.com/gdddbmgr/
		//$bdd = new PDO('mysql:host=http://www.cpecentrejour.com/gdddbmgr/;port=3306;dbname=DAVOS_CPECentreJour;charset=utf8', 'Davos_CPECentreJ', 'U7UHsbKPfuUyteH6');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

	/*define('DB_SERVER', 'http://www.cpecentrejour.com/gdddbmgr/');
	define('DB_USERNAME', 'Davos_CPECentreJ');
	define('DB_PASSWORD', 'U7UHsbKPfuUyteH6');
	define('DB_DATABASE', 'DAVOS_CPECentreJour');*/
	//$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>