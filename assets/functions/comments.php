<?php
	session_start();
	require_once("functions.php");

	if (!empty($_POST["comment"]) && !empty($_SESSION["id"])) {
			
		$connect = connectFalaDB();

		$sqlComment = $connect->prepare("INSERT INTO commentaires(commentaire, DATE_COMMENTAIRE, id_users ) VALUES (:comment ,CURRENT_TIMESTAMP , '".$_SESSION["id"]."')");

		$arrayWithValues = [ 
						"comment"=>$_POST["comment"]
						];

		$sqlComment->execute($arrayWithValues) or die(print_r($sqlComment->errorInfo(), TRUE));

		$sqlCommentId = $connect->query("SELECT id FROM commentaires WHERE commentaire = '".$_POST["comment"]."' AND id_users =".$_SESSION["id"]."");
		$commentId = $sqlCommentId->fetch();

		if (!empty($_GET["id_news"])) {
			$sqlCommentNews = $connect->prepare("INSERT INTO COMMENTE_NEWS (id, id_news) VALUES ('".$commentId["id"]."' , ".$_GET["id_news"].")");
			echo $commentId["id"];

			$sqlCommentNews->execute();

			header("location:../../News.php?id_news=".$_GET["id_news"]);
		}
	
	}
	
		