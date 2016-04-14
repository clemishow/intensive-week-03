<?php 
	// URL
	define('URL','http://localhost/intensive-week-03/');

	// SALT
	define('SALT', '69z2EiQ0yglzQ');

	// DB CONNEXION
	define('DB_HOST','localhost');
	define('DB_NAME','intensive-week');
	define('DB_USER','root');
	define('DB_PASS','root'); 

	try
	{
	    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
	    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	}
	catch (Exception $e)
	{
	    die('Cound not connect');
	}