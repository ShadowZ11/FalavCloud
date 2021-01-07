<?php
	session_start();
	require_once("functions.php");

	if (count($_POST)==2
		&& !empty($_POST["email"])
		&& !empty($_POST["password"])) {
		
		$_POST["email"] = trim(strtolower($_POST["email"]));

		$connect = connectFalaDB();

			$queryPrepared = $connect->prepare("SELECT PASSWORD, ID_USERS, PRENOM, PSEUDO, PHOTO, RANG FROM USERS WHERE EMAIL = :email");

			$queryPrepared->execute(["email"=>$_POST["email"]]);

			$result = $queryPrepared->fetch();

			$pwdHashed = $result["PASSWORD"];

		if (password_verify($_POST["password"], $pwdHashed)){
			
			$_SESSION["token"] = createToken($_POST["email"], $result["ID_USERS"]);
			$_SESSION["email"] = $_POST["email"];
			$_SESSION["rang"] = $result["RANG"];
			$_SESSION["id"] = $result["ID_USERS"];
			$_SESSION["userPic"] = $result["PHOTO"];
			$_SESSION["prenom"] = $result["PRENOM"];
			$_SESSION["userName"] = $result["PSEUDO"];
			header("location:../../index.php");
		}else{
			echo "L'adresse email ou le mot de passe renseigné n'est pas correct";
		}

	}else{
		echo "Veuilliez remplir les deux champs.";
	}
	


	