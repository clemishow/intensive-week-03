<?php
	if(!isset($_SESSION['state'])) {
		include 'login.php';
	}

	else {
		include 'my-account.php';
	}