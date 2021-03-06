<?
$active = 'active';
?>   

<div id="search">
    <form method="GET" action="#">
        <input class="search-bar" type="search" name="keywords" placeholder="Recherche">
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
$index_row = $i; //INDEX D'INCREMENTATION DE ROW

if(!empty($search)){ //SI L'UTILISATEUR A FAIT UNE RECHERCHE
    // Show result
    
    //echo '<pre>';
    //print_r($response);
    //echo '</pre>';

    if($response->total_results == 0){
?>
        <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 class="text-center">Aucun résultat pour <?= $search ?></h3>
            </div>
        <div class="col-md-3"></div>
<?
    }

    foreach($response->results as $results): //ON PARCOUR CHAQUE FILM
        if($response->results[$i]->poster_path){ //SI L'AFFICHE EXISTE
?>

<?
// CRÉATION HTML D'UNE DIV POUR CHAQUE FILM RESULTANT DE LA RECHERCHE
?>  

<?
if($index_row%4==0){
?>
<div class="row row-results">
<?
}
?>

    <div class="col-md-3 result-search">
        <? $index_movie = $response->results[$i]->id //SAUVEGARDE L'ID DU FILM ?>
        <div>
            <a href="<?= URL ?>movie&id=<?=$index_movie?>">
                <img class="img-responsive" src="http://image.tmdb.org/t/p/w500<?= $response->results[$i]->poster_path ?>" alt="img-film">
            </a>
        </div>
        <h3 class="title-movie"><?= $response->results[$i]->title //DISPLAY TITLE MOVIE?></h3>
    </div>

<?
if($index_row%4==3){
?>
</div>
<?
}
$index_row++;
?>



<? } ?>

<?php 
    $i++;
    endforeach; 

    //CRÉATION DE LA NAV BARRE DE PAGINATION
    
    if($response->total_pages > 1){   
?>

<div class="row">
    <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
                <?
                    for($i = 1; $i <= $response->total_pages; $i++){
            
                        echo "<a href=\"search?keywords=$search&p=$i\">-  $i  </a>";
            
                    }    ?>
        </div>
    <div class="col-md-4"></div>
</div>

<?
    }
?>

<?}