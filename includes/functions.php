<?php


/*
*** RANDOM ID MOVIE
**/

function random_id_movie($pdo) {

    do{
        
        $movie_id   = mt_rand ( 0 , 1000000 );
        $query      = $pdo->query("SELECT * FROM videos WHERE movie_id = '$movie_id'");
        $video      = $query->fetch();
        
    }while(empty($video->url));
    
    return $movie_id;
}




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
        $prepare = $pdo->prepare('INSERT INTO videos (url,song,artist) VALUES (:url,:song,:artist)');
        $prepare->bindValue('url',$url);
        $prepare->bindValue('song',$song);
        $prepare->bindValue('artist',$artist);
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




