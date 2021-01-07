<?php
	require_once("functions.php");
	session_start();

	if (isset($_SESSION["rang"]) && $_SESSION["rang"] = 3) {
		if ( isset($_GET["ID_NEWS"]) && !empty($_GET["ID_NEWS"])) {
			$connect = connectFalaDB();

			$deleteNews = $connect->prepare("DELETE FROM NEWS WHERE ID_NEWS = :idNews ");
			$arrayIdNews = [ 
								"idNews"=>$_GET["ID_NEWS"]
								];
			$deleteNews->execute($arrayIdNews) or die(print_r($deleteNews->errorInfo(), TRUE));
			echo "yess";
		}else{
			header("location:../../index.php");
		}

		if ( isset($_GET["ID_ALBUM"]) && !empty($_GET["ID_ALBUM"])) {
			$connect = connectFalaDB();

			$deleteAlbumAppartient = $connect->prepare("DELETE FROM APPARTIENT WHERE ID_ALBUM =:idAlbum ");

			$deleteCreationAlbum = $connect->prepare("DELETE FROM CREATION_ALBUM WHERE ID_ALBUM =:idAlbum ");

			$deleteAlbum = $connect->prepare("DELETE FROM ALBUM WHERE ID_ALBUM = :idAlbum ");

			$arrayIdAlbum = [ 
								"idAlbum"=>$_GET["ID_ALBUM"]
								];
			$deleteAlbumAppartient->execute($arrayIdAlbum) or die(print_r($deleteAlbumAppartient->errorInfo(), TRUE));

			$deleteCreationAlbum->execute($arrayIdAlbum) or die(print_r($deleteCreationAlbum->errorInfo(), TRUE));

			$deleteAlbum->execute($arrayIdAlbum) or die(print_r($deleteAlbum->errorInfo(), TRUE));
			echo "yess";
		}else{
			header("location:../../index.php");
		}

		if ( isset($_GET["ID_MUSIQUE"]) && !empty($_GET["ID_MUSIQUE"])) {
			$connect = connectFalaDB();

			$deleteMusiqueAppartient = $connect->prepare("DELETE FROM APPARTIENT WHERE ID_MUSIQUE = :idMusique ");

			$deleteCreationMusique = $connect->prepare("DELETE FROM CREATION_MUSIQUE WHERE ID_MUSIQUE = :idMusique ");

			$deleteMusique = $connect->prepare("DELETE FROM MUSIQUE WHERE ID_MUSIQUE = :idMusique ");
			
			$arrayIdMusique = [ 
								"idMusique"=>$_GET["ID_MUSIQUE"]
								];
			$deleteMusiqueAppartient->execute($arrayIdMusique) or die(print_r($deleteMusiqueAppartient->errorInfo(), TRUE));

			$deleteCreationMusique->execute($arrayIdMusique) or die(print_r($deleteCreationMusique->errorInfo(), TRUE));

			$deleteMusique->execute($arrayIdMusique) or die(print_r($deleteMusique->errorInfo(), TRUE));
			echo "yess";
		}else{
			header("location:../../index.php");
		}
	}
		