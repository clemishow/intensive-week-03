<?php
	$movie     = $_GET['id'];
	$query     = $pdo->query("SELECT * FROM videos WHERE movie_id = '$movie'");
    $song      = $pdo->query("SELECT song FROM videos WHERE movie_id = '$movie'");
    $artist    = $pdo->query("SELECT artist FROM videos WHERE movie_id = '$movie'");
	$video     = $query->fetch();
	$song     = $song->fetch();
	$artist     = $artist->fetch();

//echo '<pre>';
//print_r($song);
//echo '</pre>';

?>
<section>
	<div class="row">
			<div class="col-md-12">
				<div class="player-controls">
					<div class="row">
						<div class="col-md-3"></div>
							<div class="col-md-6 text-center">
								<div class="container-informations-music">
									<h3 class="song"><?= $song->song ?></h3>
									<h5 class="artist"><?= $artist->artist ?></h5>
								</div>
							</div>
						<div class="col-md-3"></div>
					</div>
					<div class="row">
						<div class="text-center">
							<div class="icons-container">
								<a href="javascript:void(0);" onclick="previous();">
									<img class="icon-player" src="<? URL ?>src/images/icon-previous.svg" alt="previous">
								</a>
								<a href="javascript:void(0);" onclick="playPause();">
									<img class="icon-player icon-play" src="<? URL ?>src/images/icon-pause.svg" alt="pause">
								</a>
								<a href="javascript:void(0);" onclick="next();">
									<img class="icon-player" src="<? URL ?>src/images/icon-next.svg" alt="next">
								</a>
							</div>
							<div class="container-duration-current-video">
								<span class="currentTimeVideo"></span> / <span class="durationVideo"></span> 
							</div>
						</div>
					</div>
					<div class="ro">
						<div  class="seek-bar-video">
							<div class="progress-bar-video"></div>
							<div class="cursor-bar-video"></div>
						</div>
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