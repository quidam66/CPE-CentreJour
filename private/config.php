<?php
	/**
	 * Voici les détails de connexion à la base de données
	 */  
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'super_user');
	define('DB_PASSWORD', 'a9pq96UBY46Vae5a');
	define('DB_DATABASE', 'cpecentrejour');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>