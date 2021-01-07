<?php
	session_start();
	require_once("functions.php");

	if (!empty($_POST["comment"]) && !empty($_SESSION["id"])) {
			
		$connect = connectFalaDB();

		$sqlComment = $connect->prepare("INSERT INTO COMMENTAIRES(COMMENTAIRE, DATE_COMMENTAIRE, ID_USERS ) VALUES (:comment ,CURRENT_TIMESTAMP , '".$_SESSION["id"]."')");

		$arrayWithValues = [ 
						"comment"=>$_POST["comment"]
						];

		$sqlComment->execute($arrayWithValues) or die(print_r($sqlComment->errorInfo(), TRUE));

		$sqlCommentId = $connect->query("SELECT ID FROM COMMENTAIRES WHERE COMMENTAIRE = '".$_POST["comment"]."' AND ID_USERS =".$_SESSION["id"]."");
		$commentId = $sqlCommentId->fetch();

		if (!empty($_GET["ID_NEWS"])) {
			$sqlCommentNews = $connect->prepare("INSERT INTO COMMENTE_NEWS (ID, ID_NEWS) VALUES ('".$commentId["ID"]."' , ".$_GET["ID_NEWS"].")");
			echo $commentId["ID"];

			$sqlCommentNews->execute();

			header("location:../../News.php?ID_NEWS=".$_GET["ID_NEWS"]);
		}
	

		if (!empty($_GET["ID_ALBUM"])) {
			$sqlCommentAlbum = $connect->prepare("INSERT INTO COMMENTE_ALBUM (ID, ID_ALBUM) VALUES ('".$commentId["ID"]."' , ".$_GET["ID_ALBUM"].")");

			$sqlCommentAlbum->execute() or die(print_r($sqlCommentAlbum->errorInfo(), TRUE));

			header("location:../../Album.php?ID_ALBUM=".$_GET["ID_ALBUM"]);
		}
	

		if (!empty($_GET["ID_MUSIQUE"])) {
			$sqlCommentTrack = $connect->prepare("INSERT INTO COMMENTE_MUSIQUE (ID, ID_MUSIQUE) VALUES ('".$commentId["ID"]."' , ".$_GET["ID_MUSIQUE"].")");

			$sqlCommentTrack->execute();
			header("location:../../Track.php?ID_MUSIQUE=".$_GET["ID_MUSIQUE"]);
		}
						
	}
	
		