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
				    					<img class="icon-search" src="<? URL ?>src/images/icon-search.svg" alt="logo search">
				    				</a>
				    			</div>
				    		</div>
				    		<div class="col-md-6">
				    			<div class="container-account">
				    				<div class="container-nav">
				    					<ul>
				    						<li>
				    							<span><img class="icon" src="<? URL ?>src/images/icon-account-black.svg" alt="logo account"></span>
				    							<a href="<? URL ?>account">Mon compte</a>
				    						</li>
				    						<li>
				    							<span><img class="icon" src="<? URL ?>src/images/icon-hearth.svg" alt="logo hearth"></span>
				    							<a href="<? URL ?>logout">Wishlist</a>
				    						</li>
				    						<li>
				    							<span><img class="icon" src="<? URL ?>src/images/icon-logout.svg" alt="logo logout"></span>
				    							<a href="<? URL ?>logout">Déconnexion</a>
				    						</li>
				    					</ul>
				    				</div>
				    				<a class="account-nav" href="#">
				    					<img class="icon-account" src="<? URL ?>src/images/icon-account-white.svg" alt="logo account">
				    				</a>
				    			</div>
				    		</div>
						</div>
		        	</div>
	            </div>
	        </header>