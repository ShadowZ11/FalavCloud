<?php
	require_once("functions.php");

	if ( !empty($_GET["id_news"])) {
			
		$connect = connectFalaDB();

		$sqlInfoNews = $connect->query("SELECT date_news, titre, preview, photo_preview, contenu, id_users FROM news WHERE id_news ='".$_GET["id_news"]."'");
		$infoNews = $sqlInfoNews->fetch();

		//$sqlAuthNews = $connect->query("SELECT nom, prenom FROM users WHERE id_users ='".$infoNews["id_users"]."'");
		//$authNews = $sqlAuthNews->fetch();
							
	}else{
		header("location:../../unknownAlbum.php");
	}

	
		