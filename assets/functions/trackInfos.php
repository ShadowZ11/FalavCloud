<?php
	require_once("functions.php");

	if (!empty($_GET["ID_MUSIQUE"])) {
			
		$connect = connectFalaDB();

		$sqlInfoTrack = $connect->query("SELECT TITRE, LYRIC, DATE_SORTIE, NOMBRE_ECOUTE, STORY, EXPLICIT,NTRACK_NUMB, LIEN_CLIP, LIEN_SPOTIFY, PHOTO_MUSIQUE, PROD, RECORD_BY, RECORD_IN, MIX_IN, MIX_BY, REALI_CLIP, FEAT, PRODUIT_PAR FROM MUSIQUE WHERE ID_MUSIQUE ='".$_GET["ID_MUSIQUE"]."'");

		$infoTrack = $sqlInfoTrack->fetch();

		$sqlAlbumTrack = $connect->query("SELECT ID_ALBUM FROM APPARTIENT WHERE ID_MUSIQUE ='".$_GET["ID_MUSIQUE"]."'");

		$albumTrack = $sqlAlbumTrack->fetch();

		$sqlArtisteTrack = $connect->query("SELECT ID_USERS FROM CREATION_MUSIQUE WHERE ID_MUSIQUE ='".$_GET["ID_MUSIQUE"]."'");

		$artisteTrack = $sqlArtisteTrack->fetch();

		$sqlPseudoArtisteTrack = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS ='".$artisteTrack["ID_USERS"]."'");

		$pseudoArtisteTrack = $sqlPseudoArtisteTrack->fetch();

		$sqlInfoAlbumTrack = $connect->query("SELECT TITRE FROM ALBUM WHERE ID_ALBUM ='".$albumTrack["ID_ALBUM"]."'");

		$infoAlbumTrack = $sqlInfoAlbumTrack->fetch();

		$views = $infoTrack['NOMBRE_ECOUTE'];
		$views++;

		$queryPrepared = $connect->prepare( "UPDATE MUSIQUE SET NOMBRE_ECOUTE = '".$views."' WHERE ID_MUSIQUE =".$_GET["ID_MUSIQUE"]."");


		$nextTrackNumb = ++$infoTrack['NTRACK_NUMB'];

		$prevTrackNumb = --$infoTrack['NTRACK_NUMB'];

		$sqlNextTrack = $connect->query("SELECT ID_MUSIQUE FROM MUSIQUE WHERE NTRACK_NUMB ='".$nextTrackNumb."'");

		$nextTrack = $sqlNextTrack->fetch();

		$sqlPrevTrack = $connect->query("SELECT ID_MUSIQUE FROM MUSIQUE WHERE NTRACK_NUMB ='".$prevTrackNumb."'");

		$prevTrack = $sqlPrevTrack->fetch();

		$queryPrepared->execute();
						
	}else{
		header("location:../../unknownTrack.php");
	}
	
		