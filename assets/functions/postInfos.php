<?php
	require_once("functions.php");

	$connect = connectFalaDB();

	if ( !empty($_GET["id_users"])) {
			
		$sqlInfoPost = $connect->query("SELECT id_post, contenue_post FROM post WHERE id_users ='".$_GET["id_users"]."' ORDER BY date_creation_post DESC");

		$infoPost = $sqlInfoPost->fetchAll();

	}
							