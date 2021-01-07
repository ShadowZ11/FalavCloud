<?php
	require_once("functions.php");

	if ( !empty($_GET["ID_NEWS"])) {
			
		$connect = connectFalaDB();

		$sqlInfoNews = $connect->query("SELECT DATE_NEWS, TITRE, PREVIEW, PHOTO_PREVIEW, CONTENU, ID_USERS FROM NEWS WHERE ID_NEWS ='".$_GET["ID_NEWS"]."'");
		$infoNews = $sqlInfoNews->fetch();

		$sqlAuthNews = $connect->query("SELECT NOM, PRENOM FROM USERS WHERE ID_USERS ='".$infoNews["ID_USERS"]."'");
		$authNews = $sqlAuthNews->fetch();
							
	}else{
		header("location:../../unknownAlbum.php");
	}

	
		