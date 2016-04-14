<?php 
session_start();
include 'config/config.php';	
include 'includes/functions.php';

$q = empty($_GET['q']) ? '' : $_GET['q'];

if ($q == '') 
	$page = 'home';

else if ($q == 'player') 
	$page = 'player';

else if ($q == 'search') 
	$page = 'search';

else if ($q == 'movie') 
	$page = 'movie';

else if ($q == 'movie-player') 
	$page = 'movie-player';

else if ($q == 'account') 
	$page = 'account';

else if ($q == 'logout') 
	$page = 'logout';

else if ($q == 'add-song') 
	$page = 'add-song';

else 
	$page = '404';

if($q == 'search' || $q == 'player' || $q == 'account' || $q == 'add-song' ){
include 'controllers/'.$page.'.php';
include 'views/partials/header.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';
}

else if ($q == '' || $q == 'logout' || $q == 'movie' || $q == 'movie-player') {
    include 'views/pages/'.$page.'.php';
}

else {
    include 'controllers/'.$page.'.php';
    include 'views/pages/'.$page.'.php';
    include 'views/partials/footer.php';
}
