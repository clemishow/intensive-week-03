<?php
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
	
	/* LOGIN SCRIPT */

	$errors_login = array();
	$success_login = array();
	$email = '';

	// DATA SENT
	if(!empty($_POST['submitlogin'])) {

			$email    							  = $_POST['email'];
			$password     						  = strip_tags(trim($_POST['password']));
			if (!empty($password)) $password 	  = hash('sha256', SALT.$password); // Hash
			else $errors_login[] = 'Veuillez remplir le mot de passe';

			// ERRORS

			// ERROR EMAIL

			if(empty($email)) {
				$errors_login['email'] = 'Veuillez remplir l\'email';
			}


			if(empty($errors_login)) {

				// SQL query
				$prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
				$prepare->bindValue('email',$email);
				$prepare->execute();
				$user = $prepare->fetch();



				// Test password
				if($user->password == $password) {
				    $success[] = 'Connexion réussie, bienvenue '. $user->last . ' ' . $user->first;
				    $_SESSION['state'] = true;
				    setcookie('pseudo', $user->last, time() + 365*24*3600, null, null, false, true);
				     $email = '';
				    header('location:' . URL);
				}

				else
					$errors_login[] = 'Erreur de connexion';
			}	
	}

	// DATA NOT SENT
	else {
		
	}

