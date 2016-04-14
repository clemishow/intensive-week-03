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
	            <? 
                    if(!empty($_GET['id'])){
                        $movie = $_GET['id'];
                        ?>
                        <a href="<?= URL ?>player?id=<?= $movie?>">
                        <?
                    } 
                    else{
                        ?>
                        <a href="<?= URL ?>">
                        <?
                    }
                ?>
	            	<img class="logo-site" src="<? URL ?>src/images/logo-mooving-white.svg" alt="logo"></a>
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
				    				<?php if(isset($_SESSION['state'])){ echo '<div class="container-nav"><ul>'; } ?>
				    						<?php if(isset($_SESSION['state'])){ echo '<li><span><img class="icon" src="' . URL .'src/images/icon-account-black.svg" alt="logo account"></span><a href="' . URL .'account">Mon compte</a></li>';} ?>
				    						<?php if(isset($_SESSION['state'])){ echo '<li><span><img class="icon" src="' . URL .'src/images/icon-hearth.svg" alt="logo hearth"></span><a href="' . URL .'wishlist">Wishlist</a></li>';} ?>
				    						<?php if(isset($_SESSION['state'])){ echo '<li><span><img class="icon" src="' . URL .'src/images/icon-logout.svg" alt="logo logout"></span><a href="' . URL .'logout">Déconnexion</a></li>';} ?>
				    				<?php if(isset($_SESSION['state'])){ echo '</div></ul>'; } ?>
				    				<a class="account-nav" href="<?php if(!isset($_SESSION['state'])) { echo'account'; } else echo '#';?>">
				    					<img class="icon-account" src="<? URL ?>src/images/icon-account-white.svg" alt="logo account">
				    				</a>
				    			</div>
				    		</div>
						</div>
		        	</div>
	            </div>
	        </header>