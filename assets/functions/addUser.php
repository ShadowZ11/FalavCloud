<?php
	session_start();

	require("conf.inc.php");
	require("functions.php");

if( count($_POST) == 8 
	&& !empty($_POST["nom"])
	&& !empty($_POST["prenom"]) 
	&& !empty($_POST["dateDeNaissance"]) 
	&& !empty($_POST["email"]) 
	&& !empty($_POST["cEmail"]) 
	&& !empty($_POST["pwd"]) 
	&& !empty($_POST["cPwd"]) 
	&& !empty($_POST["cgu"])){

	$connect = connectFalaDB();

	$_POST["nom"] = strtoupper(trim($_POST["nom"]));
	$_POST["prenom"] = ucwords(strtolower(trim($_POST["prenom"])));
	$_POST["email"] = strtolower(trim($_POST["email"]));
	$_POST["dateDeNaissance"] = trim($_POST["dateDeNaissance"]);

	$error = false;
	$listOfErrors = [];

	if(strlen($_POST["nom"])<2 || strlen($_POST["nom"])>100){
		$error = true;
		$listOfErrors[] = "Nom incorrecte";
	}
	if( strlen($_POST["prenom"])<2 || strlen($_POST["prenom"])>50){
		$error = true;
		$listOfErrors[] = "Prénom incorrecte";
	}
	
	if( !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ){
		$error = true;
		$listOfErrors[] = "Error Email";
	}else if(  emailExist($connect, $_POST["email"]) ){
		$error = true;
	}

	if( $_POST["cEmail"] != $_POST["email"] ){
		$error = true;
		$listOfErrors[] = "Votre email doit être identique";
	}

	if( strlen($_POST["pwd"])<6 
		|| !preg_match("#[A-Z]#", $_POST["pwd"])
		|| !preg_match("#[a-z]#", $_POST["pwd"])
		|| !preg_match("#[0-9]#", $_POST["pwd"])){
		$error = true;
		$listOfErrors[] = "Mot de passe invalide";
	}

	if( $_POST["cPwd"] != $_POST["pwd"] ){
		$error = true;
		$listOfErrors[] = "Votre mot de passe doit être identique";
	}

	$birthdayExploded = explode("/", $_POST["dateDeNaissance"]);
	if( count($birthdayExploded) == 3 ){
		$_POST["dateDeNaissance"] = $birthdayExploded[2]."-".$birthdayExploded[1]."-".$birthdayExploded[0];
	}

	$birthdayExploded = explode("-", $_POST["dateDeNaissance"]);

	if( !checkdate($birthdayExploded[1], $birthdayExploded[2], $birthdayExploded[0]) ){
		$error = true;
		$listOfErrors[] = "Date invalide";
	}

	$ageEnSeconde = time() - strtotime($_POST["dateDeNaissance"]);
	$seconde13 = 13 * 365.25 * 24 * 3600;
	$seconde100 = 100 * 365.25 * 24 * 3600;

	if( $ageEnSeconde < $seconde13 || $ageEnSeconde > $seconde100){
		$error = true;
		$listOfErrors[] = "Vous devez avoir au moins 13 ans";
	}


	
	if($error == true){
		setcookie("errorsRegister", serialize($listOfErrors)); 

		unset($_POST["pwd"]);
		unset($_POST["Cpwd"]);

		setcookie("dataRegister", serialize($_POST)); 

		header("Location: ../../signIn.php");

	}else{

		$queryPrepared =  $connect->prepare( "INSERT INTO users 
		(nom) 
		VALUES 
		( :nom);" );


		$pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

		$arrayWithValues = [ 
						"nom"=>$_POST["nom"]
						];


		$queryPrepared->execute($arrayWithValues);
		header("Location:../../validation.php");
	}


}else{

	die("Il n'est pas possible de s'inscrire de cette façon, dommage ;)");

}



