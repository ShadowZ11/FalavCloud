<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<link rel="stylesheet" href="assets/styles/index.css">
		<link href="assets/fonts/Storybook.ttf" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	</head>
	<body>

		<?php
			require("header.php");
			
		?>


		<div id="validationCompte" class="content">
			<div class="validationCompteTitle">Votre compte a bien été créé</div>

			<div id="headBigNews">
				Votre demande d'adhésion a bien été pris en compte. Un mail de confirmation va vous être envoyé (vérifiez vos spams si vous ne voyez pas le mail). Votre compte a bien été créé.
			</div>
			<br>

			<a href="Login.php">
				<button id="validationCompteButton" class="buttonLittleRose">SE CONNECTER</button>
			</a>
		</div>
					

		<?php
			require("footer.php"); 
		?>

	</body>
</html>