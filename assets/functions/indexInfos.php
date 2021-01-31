<?php
	require_once("functions.php");



	$connect = connectFalaDB();


	$sqlNews = $connect->query("SELECT id_news, date_news, titre, preview, photo_preview, id_users FROM news ORDER BY date_news DESC");
	$news = $sqlNews->fetchAll();
