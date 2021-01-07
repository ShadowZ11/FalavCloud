<?php
	require("assets/functions/functions.php");
	$connect = connectFalaDB();
	if (isset($_GET['key'],$_GET['email']) AND !empty($_GET['key']) AND !empty($_GET['email'])) {
		$requser = $connect->prepare("SELECT * FROM USERS WHERE email = :email");
			
			$email = htmlspecialchars(urldecode($_GET['email']));
			$key = htmlspecialchars($_GET['key']);
			$array = [
						"email"=>$email
					];
		$requser->execute($array);
		$userexist = $requser->rowCount();

		if ($userexist == 1) {
			$user = $requser->fetch();
			if ($user['confirmint'] == 0) {
				$updateuser = $connect->prepare("UPDATE USERS SET confirmint = 1 WHERE USERS . EMAIL = :email AND USERS . confirmkey = :key");
				$arrayconfirm = [
						"email"=>$email,
						"key"=>$key 
					];
				$updateuser->execute($arrayconfirm);
				echo "Votre compte est bel et bien vérifié";
			}else{
				echo "Votre compte à déjà été vérifié, c'est pas utile de faire autant de vérification hein ;)";
			}
		}else{
			echo "Oula on a un petit problème avec votre compte veuillez réessayer";
		}
	}else{
		header("index.php");
	}