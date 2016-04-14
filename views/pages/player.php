<?php
	$movie     = $_GET['id'];
	$query     = $pdo->query("SELECT * FROM videos WHERE movie_id = '$movie'");
	$video     = $query->fetch();

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
									<h3 class="song"><?= $video->song ?></h3>
									<h5 class="artist"><?= $video->artist ?></h5>
								</div>
							</div>
						<div class="col-md-3"></div>
					</div>
					<div class="row">
						<div class="text-center">
							<div class="icons-container">
								<a href="javascript:void(0);">
									<img class="icon-player" src="<? URL ?>src/images/icon-share.svg" alt="share">
								</a>
								<a href="javascript:void(0);" onclick="previous();">
									<img class="icon-player" src="<? URL ?>src/images/icon-previous.svg" alt="previous">
								</a>
								<a href="javascript:void(0);" onclick="playPause();">
									<img class="icon-player icon-play" src="<? URL ?>src/images/icon-pause.svg" alt="pause">
								</a>
								<? $movie_id = random_id_movie($pdo) ?>
								<a href="<?= URL ?>player?id=<?= $movie_id?>" onclick="next();">
									<img class="icon-player" src="<? URL ?>src/images/icon-next.svg" alt="next">
								</a>
								<a href="<?= URL ?>movie?id=<?= $movie?>;">
									<img class="icon-player" src="<? URL ?>src/images/icon-report.svg" alt="share">
								</a>
							</div>
							<div class="container-duration-current-video">
								<span class="currentTimeVideo"></span> / <span class="durationVideo"></span> 
							</div>
						</div>
					</div>
					<div class="row">
						<div  class="seek-bar-video">
							<div class="progress-bar-video"></div>
							<div class="cursor-bar-video"></div>
						</div>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-md-6">
						<div class="button-player-left">
                            <a href="<?= URL ?>movie?id=<?= $movie?>"><button>VOIR</button></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="button-player-right">
							<button>PARTAGER</button>
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