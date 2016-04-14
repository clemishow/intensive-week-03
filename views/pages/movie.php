<?php

$api_key = "c68c6286e0d2e8c23192ea047e8fcbe1";

if(isset($_GET['id'])){
    $index_movie = $_GET['id'];
}


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/movie/$index_movie?api_key=$api_key&language=fr");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Accept: application/json"
));

$response = curl_exec($ch);
curl_close($ch);

// Json decode
$response = json_decode($response);
// 

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/movie/$index_movie/credits?api_key=$api_key");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Accept: application/json"
));

$credits = curl_exec($ch);
curl_close($ch);

// Json decode
$credits = json_decode($credits);
//var_dump($credits);

?>
<div>
    <div class="row">
        <div class="header-movie" style="background:url('http://image.tmdb.org/t/p/w500<?= $response->poster_path ?>'); background-repeat: no-repeat; background-size: cover;">
            <div class="col-md-4 col-xs-2"></div>
                <div class="col-md-3 col-xs-8 text-center-responsive">
                    <div class="container-informations">
                        <div class="container-date-movie">
                            <span>2014</span>
                        </div>
                        <div class="container-title-movie">
                            <h3><?= $response->title ?></h3>
                        </div>
                        <div class="container-genre-movie">
                            <span>
                                <? 
                                $j = 0;
                                     foreach($credits->crew as $crew):

                                     if($credits->crew[$j]->job == 'Director'){
                                         $job = true;
                                         break;
                                     }
                                     $j++;
                                     endforeach;
                                     if(isset($credits->crew[$j]->job) && $credits->crew[$j]->job == 'Director'){
                                         //echo true;
                                         //echo '<pre>';
                                         //print_r($credits->crew);
                                         //echo '</pre>';
                                ?>
                                <span><?= $credits->crew[$j]->name ?></span>
                                <?}?>

                            </span>
                        </div>
                    </div>
                </div>
            <div class="col-md-2 col-xs-2"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1 col-xs-2"></div>
            <div class="col-md-3 col-xs-8">
                <div class="container-poster">
                    <img class="img-responsive" src="http://image.tmdb.org/t/p/w500<?= $response->poster_path ?>" alt="poster-film">
                </div>
                <div class="col-md-12">
                    <div class="casting-informations">
                       <h3>Casting</h3> 
                       <ul>
                           <li>Joseph Cooper</li>
                           <li>Murphy Cooper</li>
                           <li>Amelia Brand</li>
                       </ul>
                    </div>
                </div>
            </div>
        <div class="col-md-8 col-xs-12">
            <div class="row container-description-movie">
                <h3>Synopsis</h3>
                <p><?= $response->overview ?></p>
            </div>
             <div class="row">
                <h3>Bandes sons</h3>
                <div class="playlist">
                    <div class="row">
                        <div class="col-md-1">
                            <a href="javascript:void(0);">
                                <div class="container-icon-play">
                                    <img class="icon-play" src="<? URL ?>src/images/icon-play-black.svg" alt="play">
                                </div>
                            </a>
                        </div>
 
                        <div class="col-md-11 container-informations-music">
                            <div class="title-song">
                                Gone, Gone, Gone
                            </div> 
                            <div class="title-artist">
                                HANS ZIMMER
                            </div> 
                        </div>
                    </div>

                    <div class="row">
                        <span>
                            <a href="javascript:void(0);">
                                <div class="col-md-1">
                                    <div class="container-icon-play">
                                        <img class="icon-play" src="<? URL ?>src/images/icon-play-black.svg" alt="play">
                                    </div>
                                </div>
                            </a>
                        </span>
                        <div class="col-md-11 container-informations-music">
                            <div class="title-song">
                                Gone, Gone, Gone
                            </div> 
                            <div class="title-artist">
                                HANS ZIMMER
                            </div> 
                        </div>
                    </div>

                    <div class="row">
                        <span>
                            <a href="javascript:void(0);">
                                <div class="col-md-1">
                                    <div class="container-icon-play">
                                        <img class="icon-play" src="<? URL ?>src/images/icon-play-black.svg" alt="play">
                                    </div>
                                </div>
                            </a>
                        </span>
                        <div class="col-md-11 container-informations-music">
                            <div class="title-song">
                                Gone, Gone, Gone
                            </div> 
                            <div class="title-artist">
                                HANS ZIMMER
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="<?= URL ?>add-song?id=<?= $index_movie?>" class="add-song">AJOUTER</a>
</div>