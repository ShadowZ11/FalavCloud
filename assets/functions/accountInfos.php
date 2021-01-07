<?php
	require_once("functions.php");

	if (!empty($_GET["ID_USERS"])) {
			
		$connect = connectFalaDB();

		$sqlInfoUSER = $connect->query("SELECT PSEUDO, DATE_NAISSANCE, DATE_INSCRIPTION, NOM, PRENOM, EMAIL, RANG, PHOTO, BIO, VF, ID_USERS FROM USERS WHERE ID_USERS ='".$_GET["ID_USERS"]."'");
		$infoUSER = $sqlInfoUSER->fetch();

		$sqlInfoUSERCollection = $connect->query("SELECT ID_ALBUM, VERSION FROM COLLECTION WHERE ID_USERS ='".$_GET["ID_USERS"]."'");
		$infoUSERCollection = $sqlInfoUSERCollection->fetchAll();

		$sqlInfoUSERWantlist = $connect->query("SELECT ID_ALBUM, VERSION FROM WANTLIST WHERE ID_USERS ='".$_GET["ID_USERS"]."'");
		$infoUSERWantlist = $sqlInfoUSERWantlist->fetchAll();

		if (isset($infoUSER["RANG"]) && $infoUSER["RANG"] == 2) {
			$sqlAlbumsUser = $connect->query("SELECT ID_ALBUM FROM CREATION_ALBUM WHERE ID_USERS ='".$_GET["ID_USERS"]."'");
			$albumsUser = $sqlAlbumsUser->fetchAll();

			for ($i = 0; isset($albumsUser[$i]['ID_ALBUM']) && !empty($albumsUser[$i]['ID_ALBUM']); $i++) {
				$sqlInfosAlbumsUser = $connect->query("SELECT TITRE, ID_ALBUM, PHOTO_ALBUM FROM ALBUM WHERE ID_ALBUM ='".$albumsUser[$i]["ID_ALBUM"]."' ORDER BY DATE_SORTIE DESC");
				$infosAlbumsUser = $sqlInfosAlbumsUser->fetchAll();
			}

			$sqlTracksUser = $connect->query("SELECT ID_MUSIQUE FROM CREATION_MUSIQUE WHERE ID_USERS ='".$_GET["ID_USERS"]."'");
			$tracksUser = $sqlTracksUser->fetchAll();

			
		}

		if (isset($infoUSER["RANG"]) && $infoUSER["RANG"] == 1 || $infoUSER["RANG"] == 3 && isset($_SESSION['id'])) {
			$sqlLikeUser = $connect->query("SELECT ID_USERS_SUIVRE FROM SUIVRE WHERE ID_USERS ='".$_SESSION["id"]."' AND ID_USERS_SUIVRE ='".$_GET["ID_USERS"]."'");
			$likeUser = $sqlLikeUser->fetchAll();
		}
							
	}else{
		header("location:../../unknownAlbum.php");
	}

	
		