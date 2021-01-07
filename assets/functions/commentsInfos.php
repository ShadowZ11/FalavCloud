<?php
	require_once("functions.php");

	$connect = connectFalaDB();

	if ( !empty($_GET["ID_ALBUM"])) {
			
		$sqlInfoComment = $connect->query("SELECT ID FROM COMMENTE_ALBUM WHERE ID_ALBUM ='".$_GET["ID_ALBUM"]."'");

		$infoComment = $sqlInfoComment->fetchAll();

	}


	if ( !empty($_GET["ID_NEWS"])) {
			
		$sqlInfoComment = $connect->query("SELECT ID FROM COMMENTE_NEWS WHERE ID_NEWS ='".$_GET["ID_NEWS"]."'");

		$infoComment = $sqlInfoComment->fetchAll();

	}


	if ( !empty($_GET["ID_MUSIQUE"])) {
			
		$sqlInfoComment = $connect->query("SELECT ID FROM COMMENTE_MUSIQUE WHERE ID_MUSIQUE ='".$_GET["ID_MUSIQUE"]."'");

		$infoComment = $sqlInfoComment->fetchAll();

	}
							