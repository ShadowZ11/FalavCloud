<?php
	session_start();
	require("functions.php");
	

if (count($_POST) == 2
	&& !empty($_POST["sendXML"])
	&& !empty($_POST["CsendXML"])){

	$connect = connectFalaDB();
	
	$error = false;
	$listOfErrors = [];
	
	if( !filter_var($_POST["sendXML"], FILTER_VALIDATE_EMAIL) ){
		$error = true;
		$listOfErrors[] = "Erreur dans l'Email que vous avez entrer";
	}
	if( $_POST["CsendXML"] != $_POST["sendXML"] ){
		$error = true;
		$listOfErrors[] = "Votre email doit être identique";
	}


	if ($error == true) {
		setcookie("errorsRegister", serialize($listOfErrors)); 

		setcookie("dataRegister", serialize($_POST)); 

		header("Location: ../../Sendxml.php");
	}else{
		
		$header="MIME-Version: 1.0\r\n";
		$header.='From:"Fala Support"<support@falamusic.fr>'."\n";
		$header .= 'Content-Type: text/html;'."\r\n";
		$header.='Content-Transfer-Encoding: 8bit';

		$message='<html>
		<head></head>
		<body>
		<div>
<p>
Bonjour, voici votre export des utilisateurs en xml.<a href="https://www.falamusic.fr/assets/functions/XML/sendusers.php" download="Users">Cliquez ici</a> pour avoir le fichier.</p> 
<p>
Bonne journée à vous.
</p>
<p>
Emmanuel du support de falamusic.
</p>
</div>
	<footer>			
Attention ceci est un mail automatique veuillez ne pas répondre.
</footer>
</body>
</html>
				';


		mail($_POST['sendXML'], "Export des utilisateurs en XML", $message, $header);
		}

}else{
	die ("Juste pour envoyer un fichier il y a une tentative de faille XSS c'est pas sympa ça :(");
}