<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>FALA - Conctact Us</title>
		<link rel="stylesheet" href="assets/styles/index.css">
		<link href="assets/fonts/Storybook.ttf" rel="stylesheet" as="font" type="font/Storybook">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="shortcut icon" href="assets/icons/smallLogo.PNG">
	</head>
	<body>

		<?php
			require("header.php");
		?>
		<div id="devContent">
			<div class="content">
				<div id="titleBigStorybook">Information, collaboration...</div>
			</div>
		</div>
		<div id="validationCompte" class="content">
			<div id="headBigNews">
				<p>
					Contactez-nous par email.
				</p>
				<p>
					<b>	
						Fala.behindmusic@gmail.com
					</b>
				</p>
			</div>
		</div>
		<?php
			require("footer.php"); 
		?>
	</body>
</html>