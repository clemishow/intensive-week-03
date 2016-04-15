<?php


// if(isset($_COOKIE['counter_id']) && isset($_COOKIE['id_movie_tab'])){
//     //$counter_id = $_COOKIE['counter_id'];
//     //$lenght_id_tab = $_COOKIE['lenght_id_tab'];
//     //$id_movie_tab = $_COOKIE['id_movie_tab'+$lenght_id_tab];
// }
// elseif(!isset($id_movie_tab) && !isset($counter_id)){
//     $id_movie_tab = $_GET['id'];
//     $counter_id = 0;
//     $lenght_id_tab = 0;
//     setcookie('id_movie_tab'+$counter_id, $id_movie_tab, time() + 24 * 3600, '/');
//     setcookie('counter_id', $counter_id, time() + 24 * 3600, '/');
//     setcookie('lenght_id_tab', $lenght_id_tab, time() + 24 * 3600, '/');
// }

//if(isset($_COOKIE['counter_id']) && isset($_COOKIE['id_movie_tab'])){
//    $counter_id = $_COOKIE['counter_id'];
//    $lenght_id_tab = $_COOKIE['lenght_id_tab'];
//    $id_movie_tab = $_COOKIE['id_movie_tab'+$lenght_id_tab];
//}
//elseif(!isset($id_movie_tab) && !isset($counter_id)){
//    $id_movie_tab = $_GET['id'];
//    $counter_id = 0;
//    $lenght_id_tab = 0;
//    setcookie('id_movie_tab'+$counter_id, $id_movie_tab, time() + 24 * 3600, '/');
//    setcookie('counter_id', $counter_id, time() + 24 * 3600, '/');
//    setcookie('lenght_id_tab', $lenght_id_tab, time() + 24 * 3600, '/');
//}



/*
*** PREVIOUS ID MOVIE
**/


//function pre_id_movie($counter_id, $id_movie_tab, $lenght_id_tab){
//
//
//    if($counter_id > 1){
//        $movie_id = $_COOKIE['id_movie_tab' + $counter_id - 2];
//        $counter_id--;
//
//        return $movie_id;
//    }
//    else{
//        $movie_id = $_GET['id'];
//        return $movie_id;
//    }
//
//}


/*
*** RANDOM ID MOVIE
**/

function random_id_movie($pdo/*, $counter_id, $id_movie_tab, $lenght_id_tab*/) {


    if(empty($_GET['id'])){

        do{

            $movie_id   = mt_rand ( 0 , 380000 );
            $query      = $pdo->query("SELECT * FROM videos WHERE movie_id = '$movie_id'");
            $video      = $query->fetch();

        }while(empty($video->url));

    }
    else{
        do{

            $movie_id   = mt_rand ( 0 , 380000 );
            $query      = $pdo->query("SELECT * FROM videos WHERE movie_id = '$movie_id'");
            $video      = $query->fetch();

        }while(empty($video->url) && $movie_id != $_GET['id']);

    }

//    $id_movie_tab = $movie_id;
//    $lenght_id_tab++;
//    $counter_id++;


    return $movie_id;
}


/*
*** NEXT ID MOVIE
**/

//function next_id_movie($pdo, $counter_id, $id_movie_tab, $lenght_id_tab){
//
//
//    if($counter_id == $lenght_id_tab){
//        $movie_id = random_id_movie($pdo, $counter_id, $id_movie_tab, $lenght_id_tab);
//    }
//
//    else{
//        $movie_id = $_COOKIE['id_movie_tab' + $counter_id];
//        $counter_id++;
//    }
//
//    return $movie_id;
//
//}

/*
*** ADD A SONG
**/

$errors = [];
$success = [];
$url = '';
$song = '';
$artist = '';

if(!empty($_POST['submitUrl'])) {

    $url 	= strip_tags(trim($_POST['url']));
    $url    = get_youtube_id_from_url($url);
    $song   = strip_tags(trim($_POST['song']));
    $artist = strip_tags(trim($_POST['artist']));
    $id_movie = $_GET['id'];

    if(empty($url)) {
        $errors[] = 'Veuillez remplir une URL';
    }

    if(empty($song)) {
        $errors[] = 'Veuillez remplir le titre de la musique';
    }

    if(empty($artist)) {
        $errors[] = 'Veuillez remplir l\'artiste de la musique';
    }

    if(empty($errors)) {
        $prepare = $pdo->prepare('INSERT INTO videos (url,song,artist,movie_id) VALUES (:url,:song,:artist,:movie_id)');
        $prepare->bindValue('url',$url);
        $prepare->bindValue('song',$song);
        $prepare->bindValue('artist',$artist);
        $prepare->bindvalue('movie_id',$id_movie);
        $execute = $prepare->execute();

        if(!$execute) {
            $errors[] = 'Une erreur s\'est produite';
        }

        else {
            $success[] = 'Votre demande a bien été enregistrée';
            $url   = '';
            $song 	= '';
            $artist = '';
        }
    }

}

function get_youtube_id_from_url($url) {
   if (stristr($url,'youtu.be/'))
   {preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); return $final_ID[4]; }
   else 
   {@preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $IDD); return $IDD[5]; }
}

/*
*** REPORT SONG
**/

$errors_report = [];
$success_report = [];
$reason = '';

if(!empty($_POST['submitReport'])) {

    $id_movie         = $_GET['id'];
    $reason           = strip_tags(trim($_POST['reason']));
    $user             = $_SESSION['email'];
    $state            = 'NULL';
    

    if(empty($reason)) {
        $errors_report[] = 'Veuillez remplir la raison';
    }

    if(empty($errors_report)) {
        $prepare = $pdo->prepare('INSERT INTO reports (id_movie,reason,user,state) VALUES (:id_movie,:reason,:user,:state)');
        $prepare->bindValue('id_movie',$id_movie);
        $prepare->bindValue('reason',$reason);
        $prepare->bindValue('user',$user);
        $prepare->bindvalue('state',$state);
        $execute = $prepare->execute();

        if(!$execute) {
            $errors_report[] = 'Une erreur s\'est produite';
        }

        else {
            $success_report[] = 'Votre demande a bien été enregistrée';
            $reason = '';
        }
    }

}

/* 
*** LOGIN SCRIPT 
**/

$errors_login = array();
$success_login = array();
$email_signin = '';

// DATA SENT
if(!empty($_POST['submitlogin'])) {

    $email_signin    							  = $_POST['email_signin'];
    $password_signin     						  = strip_tags(trim($_POST['password_signin']));
    if (!empty($password_signin)) $password_signin 	  = hash('sha256', SALT.$password_signin); // Hash
    else $errors_login[] = 'Veuillez remplir le mot de passe';

    // ERRORS

    // ERROR EMAIL

    if(empty($email_signin)) {
        $errors_login[] = 'Veuillez remplir l\'email';
    }


    if(empty($errors_login)) {

        // SQL query
        $prepare = $pdo->prepare('SELECT * FROM users WHERE email_signin = :email_signin LIMIT 1');
        $prepare->bindValue('email_signin',$email_signin);
        $prepare->execute();
        $user = $prepare->fetch();



        // Test password
        if($user->password_signin == $password_signin) {
            $success[] = 'Connexion réussie, bienvenue '. $user->last . ' ' . $user->first;
            $_SESSION['state'] = true;
            $_SESSION['email'] = $email_signin;
            setcookie('first-name', $user->first, time() + 365*24*3600, null, null, false, true);
            setcookie('last-name', $user->last, time() + 365*24*3600, null, null, false, true);
            $email = '';
            header('location:' . URL . 'account');
        }

        else
            $errors_login[] = 'Erreur de connexion';
    }	
}

// DATA NOT SENT
else {

}

/*
*** SIGN IN 
**/

// CONFIGURATION

$last = '';
$first = '';
$email_signin = '';
$errors_signin = array();
$success_signin = array();

// DATA SENT
if(!empty($_POST['submitsignin'])) {

    // SET VARIABLE 
    $last 	 	  						  = strip_tags(trim($_POST['last']));
    $first   	  						  = strip_tags(trim($_POST['first']));
    $email_signin 	 	  				  = strip_tags(trim($_POST['email_signin']));
    $password_signin     				  = strip_tags(trim($_POST['password_signin']));
    if (!empty($password_signin)) {
        if(strlen($password_signin) < 5) $errors_signin[] = 'Mot de passe trop court';
        if(strlen($password_signin) > 15) $errors_signin[] = 'Mot de passe trop long';
        else $password_signin = hash('sha256', SALT.$password_signin); // Hash 
    } 
    else $errors_signin[] = 'Veuillez remplir le mot de passe';

    // ERRORS

    // ERROR LAST NAME

    if(empty($last)) 
        $errors_signin['last'] = "Veuillez remplir le champ Nom";

    else if(strlen($last) < 3) 
        $errors_signin[] = 'Nom trop court';

    // ERROR FIRST NAME 

    if(empty($first))
        $errors_signin['first'] = "Veuillez remplir le champ Prénom";

    else if(strlen($first) < 3) 
        $errors_signin[] = 'Prénom trop court';

    // ERROR EMAIL_signin

    if(empty($email_signin)) {
        $errors_signin['email_signin'] = 'Veuillez remplir le champ Email';
    }

    if(empty($errors_signin)) {    
        $prepare = $pdo->prepare('INSERT INTO users (last,first,email_signin,password_signin) VALUES (:last,:first,:email_signin,:password_signin)');
        $prepare->bindValue('last',$last);
        $prepare->bindValue('first',$first);
        $prepare->bindValue('email_signin',$email_signin);
        $prepare->bindValue('password_signin',$password_signin);
        $execute = $prepare->execute();

        if(!$execute) {
            $errors_signin[] = 'Une erreur s\'est produite';
        }

        else {
            $success_signin[] = 'Votre inscription a bien été validée';
            $last   = '';
            $first 	= '';
            $email_signin = '';
        }
    }

}

// DATA NOT SENT
else {

}




