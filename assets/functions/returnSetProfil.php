<?php
	require_once("functions.php");
	session_start();
			
			$connect = connectFalaDB();

			if (isset($_POST["userName"])) {
				$_POST["userName"] = trim($_POST["userName"]);
				if(strlen($_POST["userName"])<2 || strlen($_POST["userName"])>50){
					echo "Nom d'utilisateur incorrecte";
					setcookie("name", "Nom d'utilistateur", time()+60, "/");
					header("Location:../../setProfil.php?ID_USERS=".$_SESSION["id"]);
				}else if(  pseudoExist($connect, $_POST["userName"]) ){
					echo "Nom d'utilisateur déja pris";
					setcookie("pseudo", "Pseudo déjà pris", time()+60, "/");
					header("Location:../../setProfil.php?ID_USERS=".$_SESSION["id"]);
				}else{
					$prepPseudo =  $connect->prepare("UPDATE USERS SET PSEUDO = :pseudo WHERE USERS . ID_USERS = '".$_SESSION["id"]."';");
					$valuesPseudo = [ 		
								"pseudo"=>$_POST["userName"]
								];
					$prepPseudo->execute($valuesPseudo) or die(print_r($prepPseudo->errorInfo(), TRUE));
					header("location:../../account1.php?ID_USERS=".$_SESSION["id"]);
				}
			}

			if (isset($_POST["userBio"])) {
				$_POST["userBio"] = trim(nl2br($_POST["userBio"]));
				if(strlen($_POST["userBio"])<1 || strlen($_POST["userBio"])>250){
					echo "Biographie incorrecte";
					setcookie("biographie", "Biographie incorrect", time()+60, "/");
					header("Location:../../setProfil.php?ID_USERS=".$_SESSION["id"]);
				}else{
					$prepBio =  $connect->prepare("UPDATE USERS SET BIO = :bio WHERE USERS . ID_USERS = '".$_SESSION["id"]."';");
					$valuesBio = [ 		
								"bio"=>$_POST["userBio"]
								];
					$prepBio->execute($valuesBio) or die(print_r($prepBio->errorInfo(), TRUE));
					header("location:../../account1.php?ID_USERS=".$_SESSION["id"]);
				}
			}
				

			if (isset($_FILES["userPic"]['name'])) {
				$tailleMax = 2097152;
				$authExt = array('jpg','jpeg','png');
				if($_FILES["userPic"]['size'] <= $tailleMax) {
					$extensionUpload = strtolower(substr(strrchr($_FILES["userPic"]['name'], '.'), 1));
					if(in_array($extensionUpload, $authExt)) {
						$chemin= "../img/accounts/picAcount/".$_POST["userName"]."-".$_SESSION["email"].".".$extensionUpload;
						$move = move_uploaded_file($_FILES["userPic"]["tmp_name"], $chemin);
						if ($move) {
							$prepPic =  $connect->prepare("UPDATE USERS SET PHOTO = 'assets/img/accounts/picAcount/".$_POST["userName"]."-".$_SESSION["email"].".".$extensionUpload."' WHERE USERS.ID_USERS = '".$_SESSION["id"]."';");

							$prepPic->execute() or die(print_r($prepPic->errorInfo(), TRUE));
							header("location:../../account1.php?ID_USERS=".$_SESSION["id"]);

						}else{
							echo "erreur d'importation de votre photo";
							}
					}else{
						echo "Votre photo de profil n'est pas au bon format";
						setcookie("error", "Votre photo de profil n'est pas au bon format", time()+60, "/");
						header("Location:../../setProfil.php?ID_USERS=".$_SESSION["id"]);
						}
				}else{
					echo "taille de photo invalide";
					setcookie("taille", "Taille de photo invalide", time()+60, "/");
					header("Location:../../setProfil.php?ID_USERS=".$_SESSION["id"]);
				}

			}		

		