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
        <div class="header-movie" style="background:url('http://image.tmdb.org/t/p/w500<?= $response->poster_path ?>')">
            <div class="col-md-4 col-xs-1"></div>
                <div class="col-md-6 col-xs-10">
                    <div class="container-title-movie">
                        <h3><?= $response->title ?></h3>
                    </div>
                </div>
            <div class="col-md-2 col-xs-1"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1 col-xs-3"></div>
            <div class="col-md-3 col-xs-6">
                <div class="container-poster">
                    <img class="img-responsive" src="http://image.tmdb.org/t/p/w500<?= $response->poster_path ?>" alt="poster-film">
                </div>
                <div class="col-md-4"></div>
                    <div class="col-md-4">
                        
                    </div>
                <div class="col-md-4"></div>
            </div>
        <div class="col-md-8 col-xs-12">
            <div class="container-description-movie">
                <h4>SYNOPSIS</h4>
                <p><?= $response->overview ?></p>
            </div>
        </div>
    </div>
    <section class="container-informations-movie">
    
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
    <h4><?= $credits->crew[$j]->name ?></h4>
    <?}?>
    <a href="<?= URL ?>add-song?id=<?= $index_movie?>" class="add-song btn btn-default">AJOUTER</a>
    </section>
    
</div>