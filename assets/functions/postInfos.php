<?php
	require_once("functions.php");

	$connect = connectFalaDB();

	if ( !empty($_GET["ID_USERS"])) {
			
		$sqlInfoPost = $connect->query("SELECT ID_POST, CONTENUE_POST FROM POST WHERE ID_USERS ='".$_GET["ID_USERS"]."' ORDER BY DATE_CREATION_POST DESC");

		$infoPost = $sqlInfoPost->fetchAll();

	}
							