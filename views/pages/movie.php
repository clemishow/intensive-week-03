<?php

$api_key = "c68c6286e0d2e8c23192ea047e8fcbe1";
var_dump($_GET);

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
<div class="array">
    <?
    //echo '<pre>';
    //print_r($response);
    //echo '</pre>';
    ?>
</div>
<div>
    <img src="http://image.tmdb.org/t/p/w500<?= $response->poster_path ?>" alt="">
    <h3><?= $response->title ?></h3>
    <p><?= $response->overview ?></p>
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
    <a href="#" class="add-song btn btn-default">AJOUTER</a>

</div>