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


function get_youtube_id_from_url($url)
{
    if (stristr($url,'youtu.be/'))
        {preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); return $final_ID[4]; }
    else 
        {@preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $IDD); return $IDD[5]; }
}