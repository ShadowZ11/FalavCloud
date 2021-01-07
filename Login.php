<?php
	session_start();
	require_once("assets/functions/functions.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>FALA - Login</title>
		<link rel="stylesheet" href="assets/styles/login.css">
		<link href="assets/fonts/Storybook.TTF" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="shortcut icon" href="assets/icons/smallLogo.PNG">
	</head>
	<body>
		
	<?php
	if (Connect()) {

		?>
		<h2 style="color: red;"><center>Vous êtes déjà connecté</center></h2>
		<div>
			<p style="color: red;"><a href="index.php" style="color: white;">Cliquez ici</a> pour revenir à la page d'accueil.</p>
		</div>
		
	<?php
	}else{
	?>
		<a href="index.php">
			<div id="logoLoginSignIn">FALA</div>
		</a>
		<div id="content">
			<div id="sloganLogin">
				<div id="slogan">
					<span id="sloganFala">FALA</span> a way to learn more about the<br><span id="sloganBehind">BEHIND</span> of the creation
				</div>
				<div id="loginContainter">
					<p id="titleLoginSignIn">Login</p>
					<form method="POST" action="assets/functions/Register.php" onsubmit="return checkForm()">
						<div id="loginContent">
							<span>
								<label>Identifiant</label>
								<input id="login" class="input" type="email" name="email" placeholder="&nbsp;Email@email.com">
							</span>
							<span>
								<label >Password</label>
								<input id="pwd" class="input" type="password" name="password" placeholder="&nbsp;Password">
							</span>
							<?php
									if (isset($_COOKIE["errorLogin"])) {
								?>
									<p style="color: rgb(210, 69, 52); font-size: 13px; margin-bottom: 32px; margin-top: -28px;">
									<img src="assets/icons/errorForm.png">
									L'adresse email, le mot de passe ou le compte ne sont pas valides
									</p>

								<?php
								setcookie("errorLogin", false);
								}
								?>
						</div>
						<div id="link">Nouveau? <a href="signIn.php"><b>Créer votre compte.</b></a></div>
						<input type="submit" value="Se connecter" class="valideButton">
					</form>
					<script src="assets/functions/Javascript/Login.js"></script>
				</div>
			</div>
		</div>	
	<?php	
	}
	?>
	</body>
</html>