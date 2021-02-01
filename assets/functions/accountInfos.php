<?php
	require_once("functions.php");

	if (!empty($_GET["id_users"])) {
			
		$connect = connectFalaDB();

		$sqlInfoUSER = $connect->query("SELECT pseudo, date_naissance, date_insciption, nom, prenom, email, rang, photo, bio, vf, id_users FROM users WHERE id_users ='".$_GET["id_users"]."'");
		$infoUSER = $sqlInfoUSER->fetch();


		if (isset($infoUSER["rang"]) && $infoUSER["rang"] == 1 || $infoUSER["rang"] == 3 && isset($_SESSION['id'])) {
			$sqlLikeUser = $connect->query("SELECT id_users_suivre FROM suivre WHERE id_users ='".$_SESSION["id"]."' AND id_users_suivre ='".$_GET["id_users"]."'");
			$likeUser = $sqlLikeUser->fetchAll();
		}
							
	}else{
		header("location:../../unknownAlbum.php");
	}

	
		