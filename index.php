<?php 

include 'config/config.php';	
include 'includes/functions.php';

$q = empty($_GET['q']) ? '' : $_GET['q'];

if ($q == '') 
	$page = 'home';

else if ($q == 'search') 
	$page = 'search';

else if ($q == 'movie') 
	$page = 'movie';

else 
	$page = '404';


if($q == '' || $q == 'search' || $q == 'movie'){
include 'controllers/'.$page.'.php';
include 'views/partials/header.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';
}

else{
    include 'controllers/'.$page.'.php';
    include 'views/pages/'.$page.'.php';
    include 'views/partials/footer.php';
}
