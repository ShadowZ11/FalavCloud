<?php
	session_start();
	require_once("functions.php");

	if (!empty($_POST["post"]) && !empty($_SESSION["id"])) {
			
		$connect = connectFalaDB();

		$sqlPost = $connect->prepare("INSERT INTO post(contenue_post, date_creation_post, id_users ) VALUES (:post ,CURRENT_TIMESTAMP , '".$_SESSION["id"]."')");

		$arrayWithValues = [ 
						"post"=>$_POST["post"]
						];
		$sqlPost->execute($arrayWithValues) or die(print_r($sqlPost->errorInfo(), TRUE));

		header("location:../../account1.php?id_users=".$_SESSION['id']);
	}else{
		header("location:../../account1.php?id_users=".$_SESSION['id']);
	}
	
		