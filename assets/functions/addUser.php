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
		(nom, prenom, email, password, date_inscription, date_naissance, photo, rang) 
		VALUES 
		( :nom, :prenom, :email , :pwd, CURRENT_TIMESTAMP, :dateDeNaissance, 'assets/img/accounts/picAcount/defaultUser.png', 1);" );


		$pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

		$arrayWithValues = [ 
						"nom"=>$_POST["nom"], 
						"prenom"=>$_POST["prenom"],
						"email"=>$_POST["email"],
						"pwd"=>$_POST["pwd"],
						"pwd"=>$pwd,
						"dateDeNaissance"=>$_POST["dateDeNaissance"]
						];


		$queryPrepared->execute($arrayWithValues);

		$mail = curl_init($_ENV['TRUSTIFI_URL'].'/api/i/v1/email');
        curl_setopt_array($mail, array(CURLOPT_CUSTOMREQUEST => "POST",CURLOPT_POSTFIELDS =>"{\n  \"template\": {\n  \t\"name\": \"Mail_de_bienvenue\",\n  \t\"fields\": {\n  \t\t\"first_field\": \"Subject\",\n  \t\t\"second_field\": \"Message\"\n  \t}\n  },\n  \"recipients\": [{\"email\": ".$_POST["email"].", \"name\": ".$_POST["nom"]."}],\n \"methods\": {\"secureSend\": true}", CURLOPT_HTTPHEADER => array(

        	"x-trustifi-key: ".$_ENV['TRUSTIFI_KEY'],
        	"x-trustifi-secret:".$_ENV['TRUSTIFI_SECRET'],
        	"Content-Type: application/json"
	        ),
	    ));
	        
	    $response = curl_exec($mail);
	    $error = curl_error($mail);
	    if ($error) {
	        echo "une erreur s'est produite lors de l'envoi de votre mail de bienvenue: ".$error;
	    }else{

			header("Location:../../validation.php");
		}

		curl_close($mail);
		
	}


}else{

	die("Il n'est pas possible de s'inscrire de cette façon, dommage ;)");

}




