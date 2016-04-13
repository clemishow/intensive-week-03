<?
// BARRE DE RECHERCHE
?>   

<div id="search">
    <form method="GET" action="#">
        <input type="search" name="keywords" placeholder="">
        <input type="submit" class="hide">
    </form>
</div>

<?php

$api_key = "c68c6286e0d2e8c23192ea047e8fcbe1";

//RECUPÉRATION DU NUMÉRO DE PAGE

if(isset($_GET['p'])){
    $nb_page = $_GET['p'];
}
else{
    $nb_page = 1;
}

//REQUÊTE DE LA RECHERCHE DE L'UTILISATEUR À L'API

if(!empty($_GET['keywords'])){   
    $search = $_GET['keywords'];
    $search = str_replace(' ','+',$search);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/search/movie?query=$search&api_key=$api_key&page=$nb_page&language=fr");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Accept: application/json"
    ));


    $response = curl_exec($ch);
    curl_close($ch);

    // Json decode
    $response = json_decode($response);
    //var_dump($response);


}



$job = false; //SI LE DIRECTOR EXISTE DANS LES CREDITS
$i = 0; //INDEX DE NAVIGATION DANS LE TABLEAU $response->results

if(!empty($search)){ //SI L'UTILISATEUR A FAIT UNE RECHERCHE
    // Show result
    
    //echo '<pre>';
    //print_r($response);
    //echo '</pre>';

    foreach($response->results as $results): //ON PARCOUR CHAQUE FILM
        if($response->results[$i]->poster_path){ //SI L'AFFICHE EXISTE
?>

<?
// CRÉATION HTML D'UNE DIV POUR CHAQUE FILM RESULTANT DE LA RECHERCHE
?>  

<div class="img_search">
    <? $index_movie = $response->results[$i]->id //SAUVEGARDE L'ID DU FILM ?>
    <a href="<?= URL ?>movie&id=<?=$index_movie?>"><img src="http://image.tmdb.org/t/p/w500<?= $response->results[$i]->poster_path ?>" alt=""></a>  
    
    <h3><?= $response->results[$i]->title //AFFICHE LE TITRE DU FILM ?></h3> 
 
</div>
<? } ?>

<?php 
    $i++;
    endforeach; 

    //CRÉATION DE LA NAV BARRE DE PAGINATION
    
    if($response->total_pages > 1){   
?>

<div class="nav_pages">

    <?
        for($i = 1; $i <= $response->total_pages; $i++){

            echo "<a href=\"search?keywords=$search&p=$i\">-  $i  </a>";

        }    ?>

</div>

<?
    }
?>

<?}