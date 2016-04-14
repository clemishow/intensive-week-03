<?php 

	// Suppression des variables de session et de la session
	$_SESSION = array();
	session_destroy();
	header('location:' . URL . 'account');
?>