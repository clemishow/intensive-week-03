<?php

if(!empty($_GET['id'])){
    $movie = $_GET['id'];
}
else{
    $movie = random_id_movie($pdo/*, $counter_id, $id_movie_tab*/);
}
$query      = $pdo->query("SELECT * FROM videos WHERE movie_id = '$movie'");
$video      = $query->fetchAll();

$id_video = random_id_video_movie($pdo, $movie);

$pre_movie_id  = $movie;
//$next_movie_id = 0;

$movie_id = random_id_movie($pdo);

?>

<section>
    <div class="row">
        <div class="col-md-12">
            <div class="container-animation">
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
            </div>
            <div class="global-player">
                <div class="player-controls">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 text-center">
                            <div class="container-informations-music">
                                <h3 class="song"><?= $video[$id_video]->song ?></h3>
                                <h5 class="artist"><?= $video[$id_video]->artist ?></h5>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="text-center">
                            <div class="icons-container">
                                <a class="container-icon-volume" href="javascript:void(0);" onclick="muteVolume();">
                                    <img class="icon-player icon-volume-mute icon-volume" src="<? URL ?>src/images/icon-volume.svg" alt="volume">
                                </a>
                
                                <a href="" onclick="previous();">
                                    <img class="icon-player" src="<? URL ?>src/images/icon-previous.svg" alt="previous">
                                </a>
                                <a href="javascript:void(0);" onclick="playPause();">
                                    <img class="icon-player icon-play" src="<? URL ?>src/images/icon-pause.svg" alt="pause">
                                </a>
                
                                <? //$next_movie_id = next_id_movie($pdo, $counter_id, $id_movie_tab, $lenght_id_tab); ?>
                                <a href="<?= URL ?>player?id=<?= $movie_id?>" onclick="next();">
                
                                    <img class="icon-player" src="<? URL ?>src/images/icon-next.svg" alt="next">
                                </a>
                                <a href="<?= URL ?>report?id=<?= $movie?>">
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
                <div class="row buttons-player text-center">
                    <div class="col-md-6">
                        <div class="button-player-left">
                
                            <a class="button-see-movie" href="<?= URL ?>movie-player?id=<?= $movie?>">
                                <span><img class="icon-movie" src="<? URL ?>src/images/icon-movie.svg" alt="movie"></span>
                                Découvrir le film
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="button-player-right">
                            <a target="_blank" href="https://twitter.com/intent/tweet?text=Découvre%20cette%20musique%20de%20film%20: <?= URL ?>player?id=<?= $movie_id ?>%20avec%20@themooving" class="twitter-share-button button-share-movie" data-via="Mooving">
                                <span><img class="icon-twitter" src="<? URL ?>src/images/icon-twitter.svg" alt="twitter"></span>
                                Partagez
                            </a>
                            <!--<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'includes/player-frame.php'; ?>
    </div>
    <div>
    </div>
</section>
<script src="src/js/app/player.js"></script>