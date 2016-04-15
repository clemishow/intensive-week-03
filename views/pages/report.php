<?php 
	if (isset($_SESSION['state']))
		include 'report-page.php';

	else 
		include 'views/pages/login.php';