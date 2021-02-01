<?php
	require_once("functions.php");
	session_start();

	if (isset($_SESSION["rang"]) && $_SESSION["rang"] = 3) {
		if ( isset($_GET["id_news"]) && !empty($_GET["id_news"])) {
			$connect = connectFalaDB();

			$deleteNews = $connect->prepare("DELETE FROM news WHERE id_news = :idNews ");
			$arrayIdNews = [ 
								"idNews"=>$_GET["id_news"]
								];
			$deleteNews->execute($arrayIdNews) or die(print_r($deleteNews->errorInfo(), TRUE));
			echo "yess";
		}else{
			header("location:../../index.php");
		}

		
	}
		