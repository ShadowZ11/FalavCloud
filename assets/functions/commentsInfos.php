<?php
	require_once("functions.php");

	$connect = connectFalaDB();



	if ( !empty($_GET["id_news"])) {
			
		$sqlInfoComment = $connect->query("SELECT id FROM commente_news WHERE id_news ='".$_GET["id_news"]."'");

		$infoComment = $sqlInfoComment->fetchAll();

	}

			