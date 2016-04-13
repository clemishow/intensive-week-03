<?php
	$movie = $_GET['id'];
	$query = $pdo->query("SELECT * FROM videos WHERE movie_id = '$movie'");
	$video = $query->fetch();
?>
<section>
	<?
	// BARRE DE RECHERCHE
	?>
	<?php // require 'views/pages/add-song.php'; ?>
	<!-- <button class="btn btn-default">EN SAVOIR PLUS</button> -->
	<div class="row">
			<div class="col-md-12">
				<div class="player-controls">
					<div class="text-center">
						<a href="javascript:void(0);" onclick="previous();">
							<img class="icon-player" src="<? URL ?>src/images/icon-previous.svg" alt="previous">
						</a>
						<a href="javascript:void(0);" onclick="pause();">
							<img class="icon-player" src="<? URL ?>src/images/icon-pause.svg" alt="pause">
						</a>
						<a href="javascript:void(0);" onclick="next();">
							<img class="icon-player" src="<? URL ?>src/images/icon-next.svg" alt="next">
						</a>
						<div class="container-duration-current-video">
							<span class="currentTimeVideo"></span> / <span class="durationVideo"></span> 
						</div>
					</div>
					<div  class="seek-bar-video">
						<div class="progress-bar-video"></div>
						<div class="cursor-bar-video"></div>
					</div>
				</div>
			</div>
			<?php require 'includes/player-frame.php'; ?>
	</div>
	<div>
		<!-- <h3><span class="info-song"><?= $video->song ?></span> – <span class="info-song"><?= $video->artist ?></span></h3> -->
	</div>
</section>
<script src="src/js/app/player.js"></script>