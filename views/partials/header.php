<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= URL?>src/css/fonts.css">
	<link rel="stylesheet" href="<?= URL?>src/css/style.css">
</head>
<body class="page-<?= $class ?>">
        <header>
            <div class="col-md-2">
            	<a href="<?= URL ?>">
            		<img class="logo-site" src="<? URL ?>src/images/logo-mooving-white.svg" alt="logo">
            	</a>
            </div>
            <div class="col-md-10">
            	<div class="col-md-10"></div>
	        	<div class="col-md-2">
	        		<div id="right-col">
				    	<form method="GET" action="<?= URL ?>search">
				    		<a href="#">
				    			<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				    		</a>
				        		<input class="search-bar hidden-search-bar" type="search" name="keywords">
				        	<input type="submit" class="hide">
				    	</form>
				    	<div class="account"></div>
					</div>
	        	</div>
            </div>
        </header>