<?php
	session_start();
	require_once("functions.php");

	if (count($_POST)==2
		&& !empty($_POST["email"])
		&& !empty($_POST["password"])) {
		
		$_POST["email"] = trim(strtolower($_POST["email"]));

		$connect = connectFalaDB();

			$queryPrepared = $connect->prepare("SELECT password, id_users, prenom, pseudo, photo, rang FROM users WHERE email = :email");

			$queryPrepared->execute(["email"=>$_POST["email"]]);

			$result = $queryPrepared->fetch();

			$pwdHashed = $result["password"];

		if (password_verify($_POST["password"], $pwdHashed)){
			
			$_SESSION["token"] = createToken($_POST["email"], $result["id_users"]);
			$_SESSION["email"] = $_POST["email"];
			$_SESSION["rang"] = $result["rang"];
			$_SESSION["id"] = $result["id_users"];
			$_SESSION["userPic"] = $result["photo"];
			$_SESSION["prenom"] = $result["prenom"];
			$_SESSION["userName"] = $result["pseudo"];
			header("location:../../index.php");
		}else{
			echo "L'adresse email ou le mot de passe renseigné n'est pas correct";
		}

	}else{
		echo "Veuilliez remplir les deux champs.";
	}
	


	