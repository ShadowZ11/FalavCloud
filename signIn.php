<!DOCTYPE html>
<html>
<head>
	<title>FALA - Sign In</title>
	<link rel="stylesheet" href="assets/styles/SignIn.css">
	<link href="assets/fonts/Storybook.ttf" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link rel="shortcut icon" href="assets/icons/smallLogo.PNG">
</head>
	<body>

		<?php
		if(isset($_COOKIE["dataRegister"])){
			$data = unserialize($_COOKIE["dataRegister"]);
			
		}
	?>
		
		<a href="index.php">
			<div id="logoLoginSignIn">FALA</div>
		</a>
		<form id="SigninContainter" action="assets/functions/addUser.php" method="POST" onsubmit="return checkForm()">
			<p id="titleLoginSignIn">Sign in</p>
			<div id="loginContent">
				<div class="l-input">
					<div class="labelInput-3">
						<label>Prénom</label>
						<input class="input" type="text" required="required" name="prenom" placeholder="&nbsp;Prénom" id="prenom">
						
					</div>
					<div class="labelInput-3">
						<label >Nom</label>
						<input class="input" type="text" required="required" name="nom" placeholder="&nbsp;Nom" id="nom">
					</div>
					<div class="labelInput-3">
						<label>Date de naissance</label>
						<input class="input" type="date" required="required" name="dateDeNaissance">
						<p style="color: red;">
						<?php
						if (isset($_COOKIE["dateDeNaissance"])) {
							echo $_COOKIE["dateDeNaissance"];
							setcookie("dateDeNaissance", false);
						}
						?>
						</p>
					</div>
				</div>
				<div class="l-input">
					<div class="labelInput-2">
						<label>Email</label>
						<input class="input" type="email" required="required" name="email" placeholder="&nbsp;Email@email.com" id="email">
						<p>
							<?php
							if (isset($_COOKIE['email'])) {
								echo $_COOKIE['email'];
								setcookie("email", false);
							}
							?>
						</p>
					</div>
					<div class="labelInput-2">
						<label >Confirmez votre email</label>
						<input class="input" type="email" required="required" name="cEmail" placeholder="&nbsp;Email@email.com" id="cEmail">
					</div>
				</div>
				<div class="l-input">
					<div class="labelInput-2">
						<label>Password</label>
						<input class="input" type="password" required="required" name="pwd" placeholder="&nbsp;Password" id="pwd">
					</div>
					<div class="labelInput-2">
						<label >Confirmez votre password</label>
						<input class="input" type="password" required="required" name="cPwd" placeholder="&nbsp;Password" id="cPwd">
					</div>
				</div>
				<label class="CGU">&nbsp;Validez que vous avez lu et accepter les <a href="cgu.php"><b>CGU</b></a>
	  				<input type="checkbox" required="required" name="cgu">
	  				<span class="checkmark"></span>
				</label>
			</div>
			<div>
				<img id="captcha" src="assets/functions/captcha.php" alt="Image de captcha">
		        <button class="buttonSquare" type="button" value="recharger le captcha" id="reload">
		        	<img width="45" src="assets/icons/refreshIcon.png">
		        </button><br>
		        <input class="inputCaptcha" type="text" required="required" name="captcha" placeholder="Veuillez saisir le captcha" id="Cptcha">
		         <p>
		        	<?php
		        	if (isset($_COOKIE["captcha"])) {
		        		$capt = $_COOKIE["captcha"];
		        			echo $capt;
		        		
		        		setcookie("captcha", false);
		        	}
		        	?>
		        </p>
		    </div>
			<div id="link">Déjà inscrit? <a href="Login.php"><b>Connectez-vous.</b></a></div>
			<input type="submit" value="S'inscrire" class="valideButton">
		</form>
		<script src="assets/functions/Javascript/signIn.js" charset="utf-8"></script>
		<script>
			$(function(){
				$('#reload').click(function(){
					$('#captcha').attr('src', 'assets/functions/captcha.php?' + (new Date).getTime());
				 	});
				});
		</script>
	</body>
	
</html>