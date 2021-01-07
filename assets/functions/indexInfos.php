<?php
	require_once("functions.php");

	
			
	$connect = connectFalaDB();

	
	$sqlNews = $connect->query("SELECT ID_NEWS, DATE_NEWS, TITRE, PREVIEW, PHOTO_PREVIEW, ID_USERS FROM NEWS ORDER BY DATE_NEWS DESC");
	$news = $sqlNews->fetchAll();


	$sqlNewAlbums = $connect->query("SELECT ID_ALBUM, TITRE, PHOTO_ALBUM, FEAT FROM ALBUM ORDER BY DATE_SORTIE DESC");
	$newAlbums = $sqlNewAlbums->fetchAll();


	$sqlNewClip = $connect->query("SELECT LIEN_CLIP FROM MUSIQUE ORDER BY DATE_SORTIE DESC");
	$newClip = $sqlNewClip->fetchAll();


	$sqlRanking = $connect->query("SELECT ID_MUSIQUE, TITRE, NOMBRE_ECOUTE, PHOTO_MUSIQUE, FEAT FROM MUSIQUE ORDER BY NOMBRE_ECOUTE DESC");
	$ranking = $sqlRanking->fetchAll();


		
			
	
		