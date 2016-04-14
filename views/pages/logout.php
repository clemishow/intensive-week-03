<?php 
	// DESTROY SESSION
	$_SESSION = array();
	session_destroy();
	// COOKIE RESET
	setcookie('first-name', '', time() + 365*24*3600, null, null, false, true);
    setcookie('last-name', '', time() + 365*24*3600, null, null, false, true);
    //REDIRECTION
	header('location:' . URL . 'account');
?>