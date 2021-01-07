<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Erreur pas inacessible</title>
		<link rel="stylesheet" href="assets/styles/index.css">
		<link href="assets/fonts/Storybook.ttf" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	</head>
	<body>

		<?php
			require("header.php");
		?>
		<div id="validationCompte" class="content">
			<div class="validationCompteTitle">Erreur pas inacessible</div>

			<div id="headBigNews">
				Cette page est uniquement acessible par un administrateur.
			</div>
			<br>

			<a href="Login.php">
				<button id="index.php" class="buttonLittleRose">ACCUEIL</button>
			</a>
		</div>
		<?php
			require("footer.php"); 
		?>
	</body>
</html>