<?php
session_start();
if ($_SESSION["rang"] == 3) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Add News</title>
		<link rel="stylesheet" href="assets/styles/index.css">	
		<link href="assets/fonts/Storybook.ttf" rel="stylesheet" as="font" type="font/Storybook">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="shortcut icon" href="assets/icons/smallLogo.PNG">
	</head>
	<body>

		<?php
			require("header.php");
		?>
		<div id="backOfficeContener" class="content">
			<div id="backOfficeHead">
				<div class="headPersoPageBar2"></div>
				<div class="nextPrevTrack">
					<a href="addTrack.php">
						<img src="assets/icons/prevTrack.png" height="37px">
					</a>
					<div class="actualTrackAblum">
						<div class="actualTrack">LISTE DES UTILISATEURS - XML</div>
					</div>
					<a href="usersManager.php">
						<img src="assets/icons/nextTrack.png" height="37px">
					</a>
				</div>
			</div>
			<form action="assets/functions/Xml.php" method="POST" enctype="multipart/form-data">
				<div class="backOfficeForm">
					<label for="sendXML">Adresse mail du destinataire</label>	
					<input type="email" name="sendXML" id="sendXML" required="required" class="input" placeholder="Adresse mail">
				</div>
				<div class="backOfficeForm">
					<label for="CsendXML">Confirmation de l'adresse mail</label>
					<input type="email" id="CsendXML" required="required" class="input" placeholder="confirmer l'adresse mail" name="CsendXML">
				</div>
				<input type="submit" value="VALIDER" id="backOfficeValide">
			</form>
			<a href="assets/functions/XML/sendusers.php" download="Users">
				<button id="backOfficeValide">TELECHARGER</button>
			</a>
		</div>

			
					

		<?php
			require("footer.php"); 
		?>

	</body>
</html>
<?php
	}else{
	header("location:noAutho.php");
}
?>
	
