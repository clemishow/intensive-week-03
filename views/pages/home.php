<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mooving - Commencer l'expérience</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= URL?>src/css/fonts.css">
	<link rel="stylesheet" href="<?= URL?>src/css/style.css">
</head>
<body>
	<div class="row">
		<div class="col-md-2"></div>
			<div class="text-center col-md-8">
				<img class="logo-landing" src="<? URL ?>src/images/logo-mooving-white.svg" alt="logo">
			</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
			<div class="text-center col-md-8">
				<div class="container-strat-exp">
				<? $movie_id = random_id_movie(); ?>
					<a class="start-exp text-uppercase" href="<?= URL ?>player?id=<?= $movie_id?>" title="start">Démarrer l'expérience</a>
				</div>
			</div>
		<div class="col-md-2"></div>
	</div>
