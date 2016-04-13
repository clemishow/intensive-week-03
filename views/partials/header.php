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
		<div class="site-wrapper">       
	        <header>
	            <div class="col-md-2">
	            	<a href="<?= URL ?>player">
	            		<img class="logo-site" src="<? URL ?>src/images/logo-mooving-white.svg" alt="logo">
	            	</a>
	            </div>
	            <div class="col-md-10">
	            	<div class="col-md-10"></div>
		        	<div class="col-md-2">
		        		<div id="right-col">
				    		<div class="col-md-6">
				    			<div class="container-icon-search">
				    				<a href="<?= URL ?>search">
				    					<span class="glyphicon glyphicon-search .active-search" aria-hidden="true"></span>
				    				</a>
				    			</div>
				    		</div>
				    		<div class="col-md-">
				    			<div class="container-account">
				    				<a href="<?= URL ?>account">
				    					<img class="logo-account" src="<? URL ?>src/images/icon-account.svg" alt="logo account">
				    				</a>
				    			</div>
				    		</div>
						</div>
		        	</div>
	            </div>
	        </header>