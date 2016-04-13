<?php
	$movie = $_GET['id'];
	$query = $pdo->query("SELECT * FROM videos WHERE movie_id = '$movie'");
	$video = $query->fetch();
?>
<section>
	<?
	// BARRE DE RECHERCHE
	?>
	<div id="search">
    	<form method="GET" action="<?= URL ?>search">
        	<input type="search" name="keywords" placeholder="">
        	<input type="submit" class="hide">
    	</form>
	</div>
	<?php require 'views/pages/add-song.php'; ?>
	<button class="btn btn-default">Ajout</button>
	<div class="row">
			<div class="col-md-12">
				<div class="player-controls">
					<button href="javascript:void(0);" onclick="pause();" class="btn btn-default">PAUSE</button>
					<button href="javascript:void(0);" onclick="play();" class="btn btn-default">PLAY</button>
					<button href="javascript:void(0);" onclick="mute();" class="btn btn-default">MUTE</button>
					<button href="javascript:void(0);" onclick="max();" class="btn btn-default">MAX</button>
					<a href="<?php  ?>" class="btn btn-default">NEXT</a>
					<div class="container-duration-current-video">
						<span class="currentTimeVideo"></span> / <span class="durationVideo"></span> 
					</div>
					<div  class="seek-bar-video">
						<div class="progress-bar-video"></div>
						<div class="cursor-bar-video"></div>
					</div>
				</div>
			</div>
			<?php require 'includes/player.php'; ?>
	</div>
	<div>
		<!-- <h3><span class="info-song"><?= $video->song ?></span> – <span class="info-song"><?= $video->artist ?></span></h3> -->
	</div>
	<?php 
		echo '<pre>';
		print_r($video);
		echo '</pre>';
	?>
</section>