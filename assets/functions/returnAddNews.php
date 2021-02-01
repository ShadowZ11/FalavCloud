<?php
	require_once("functions.php");
	session_start();

	if ( !empty($_POST["newsTitle"])
		&& !empty($_POST["newsContent"]) 
		&& !empty($_FILES["newsImg"]["name"])) {
			
			$connect = connectFalaDB();

			$_POST["newsContent"] = nl2br($_POST["newsContent"]);

			$tailleMax = 2097152;
			$authExt = array('jpg','jpeg','png');

			if(strlen($_POST["newsTitle"])<2 || strlen($_POST["newsTitle"])>60){
				echo "le titre n'est pas valide";
			}

			if(strlen($_POST["newsIntro"])<10 || strlen($_POST["newsIntro"])>220){
				echo "l'introduction n'est pas valide";
			}

			if(strlen($_POST["newsContent"])<180 || strlen($_POST["newsContent"])>10000){
				echo "l'article n'est pas valide";
			}

			if($_FILES["newsImg"]['size'] <= $tailleMax) {
				$extensionUpload = strtolower(substr(strrchr($_FILES["newsImg"]['name'], '.'), 1));
				if(in_array($extensionUpload, $authExt)) {
					$chemin= "../img/news/".$_POST["newsTitle"]."-".$_SESSION["email"].".".$extensionUpload;
					$move = move_uploaded_file($_FILES["newsImg"]["tmp_name"], $chemin);
					if ($move) {



						$prep =  $connect->prepare("INSERT INTO news 
						(date_news, titre, preview, photo_preview, contenu, tag, id_users) 
						VALUES 
						( CURRENT_TIMESTAMP, :titre, :preview, 'assets/img/news/".$_POST["newsTitle"]."-".$_SESSION["email"].".".$extensionUpload."', :contenu, :tag, '".$_SESSION["id"]."');");


						$values = [ 		
											"titre"=>$_POST["newsTitle"], 
											"preview"=>$_POST["newsIntro"],
											"contenu"=>$_POST["newsContent"],
											"tag"=>$_POST["newsTag"]
											];
						$prep->execute($values) or die(print_r($prep->errorInfo(), TRUE));

						header("location:../../index.php");

					}else{
						echo "erreur d'importation de votre photo";
						}
				}else{
					echo "Votre photo de profil n'est pas au bon format";
					}
			}else{
				echo "taille de photo invalide";
			}		
	}else{
		echo "Saisie incorrecte";
	}
	
		