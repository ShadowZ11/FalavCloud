<?php
	session_start();
	require("assets/functions/accountInfos.php");
	if ($_GET['ID_USERS'] == $_SESSION['id']) {
?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<title>FALA - <?php
						if (isset($infoUSER["PSEUDO"])) {
							echo $infoUSER["PSEUDO"];
						}else{
							echo $infoUSER["PRENOM"]." ".$infoUSER["NOM"];
						}
						?>
		</title>
		<link rel="stylesheet" href="assets/styles/index.css">
		<link href="assets/fonts/Storybook.ttf" rel="stylesheet" as="font" type="font/Storybook">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="shortcut icon" href="assets/icons/smallLogo.PNG">
	</head>
	<body>

		<?php
			require("header.php"); 
		?>

		<div id="headPersoPageBackGround" style="background:linear-gradient(0deg, rgba(0,0,0,0.7), rgba(0, 0, 0, 0.7)),url('<?php echo $infoUSER["PHOTO"]?>');background-size: cover;">
			<div class="headAccountPage">
				
				<div class="menuheadPersoPage1">
					<div class="photoUserNameVerifySettings">
						<div class="photoUserNameVerify">
							<img class="userPic" src="<?php echo $infoUSER["PHOTO"]?>" width="250px" height="250px">
							<div class="actualArtist">
								<?php
									if (!empty($infoUSER["PSEUDO"])) {
									 	echo $infoUSER["PSEUDO"];
									 }else{
									 	echo $infoUSER["PRENOM"]." ".$infoUSER["NOM"];
									 }
									if ($infoUSER["VF"] == 1) {
										?>
										<img src="assets/icons/verify.png" width="20px" height="20px">
										<?php
									}
								?>
							</div>
						</div>
					</div>
					<div class="headAccount">
						<div id="userHeader2">
							<div class="headPersoPageBar2"></div>
							<div class="nextPrevTrack">
								<img src="assets/icons/prevTrack.png" height="37px">
								<div class="actualTrackAblum">
									<div class="actualTrack">PARAMETRES</div>
								</div>
								<img src="assets/icons/nextTrack.png" height="37px">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="accountSetContent">
			<div id="backOfficeContener" class="content">
				<form action="assets/functions/returnSetProfil.php" method="POST" enctype="multipart/form-data">
					<div class="backOfficeForm">
						<br>
						<br>
						<br>
						<p class="emptyTitre1">
							<b>
								MON COMPTE
							</b>
						</p>
						<p>
							<div class="l-input">
								<span class="input-2">
									<label >Email</label>
									<p>
										<b>
											<?php
												echo $infoUSER["EMAIL"]
											?>
										</b>
									</p>
								</span>
								<span class="input-2">
									<label >Date d'inscription</label>
									<p>
										<b>
											<?php
												echo $infoUSER["DATE_INSCRIPTION"]
											?>
										</b>
									</p>
								</span>
							</div>	
						</p>
						<p class="emptyTitre1">
							<b>
								MON PROFIL
							</b>
						</p>
						<p>
							<div class="l-input">
								<span class="input-3">
									<label for="albumRecordBy">Prénom</label>
									<p>
										<b>
											<?php
												echo $infoUSER["PRENOM"]
											?>
										</b>
									</p>
								</span>	
								<span class="input-3">
									<label >Nom</label>
									<p>
										<b>
											<?php
												echo $infoUSER["NOM"]
											?>
										</b>
									</p>
								</span>	
								<span class="input-3">
									<label >Date de naissance</label>
									<p>
										<b>
											<?php
												echo $infoUSER["DATE_NAISSANCE"]
											?>
										</b>
									</p>
								</span>
							</div>
						</p>
						<div class="l-input">
							<span class="input-2">
								<label for="userName">Nom d'utilisateur</label>
								<input class="input" type="text" id="userName" name="userName"<?php if (!empty($infoUSER["PSEUDO"])) {echo "value='".$infoUSER["PSEUDO"]."'";}else{echo "placeholder='Pseudo'";
							}
							?>>
							<?php
									if (isset($_COOKIE["name"])) {
								?>
									<p style="color: rgb(210, 69, 52); font-size: 13px; margin-bottom: 32px; margin-top: -28px;">
									<img src="assets/icons/errorForm.png">
									Nom d'utilisateur incorrect
									</p>

								<?php
								setcookie("name", false);
								}
								?>
								<?php
									if (isset($_COOKIE["pseudo"])) {
								?>
									<p style="color: rgb(210, 69, 52); font-size: 13px; margin-bottom: 32px; margin-top: -28px;">
									<img src="assets/icons/errorForm.png">
									Le pseudo est déjà utilisé
									</p>

								<?php
								setcookie("pseudo", false);
								}
								?>
							</span>
							<span class="input-2">
								<label for="userPic">Photo de profil</label>
								<input class="input" type="file" id="userPic" name="userPic" placeholder="Auteur de l'album" >
								<?php
									if (isset($_COOKIE["error"])) {
								?>
									<p style="color: rgb(210, 69, 52); font-size: 13px; margin-bottom: 32px; margin-top: -28px;">
										<img src="assets/icons/errorForm.png">
										Photo de profil pas au bon format
									</p>

								<?php
									setcookie("error", false);
								}
								?>
								<?php
									if (isset($_COOKIE["taille"])) {
								?>
									<p style="color: rgb(210, 69, 52); font-size: 13px; margin-bottom: 32px; margin-top: -28px;">
									<img src="assets/icons/errorForm.png">
									Photo de profil pas au bon format
									</p>

								<?php
								setcookie("taille", false);
								}
								?>
							</span>
						</div>
						<label class="check">&nbsp;Adresse Email public
			  				<input type="checkbox" name="publicEmail">
			  				<span class="checkmark"></span>
			  			</label>
						<label for="userBio">Bio</label>
						<textarea class="inputLong" type="text" id="userBio" rows="4" name="userBio"><?php 
						if (!empty($infoUSER["BIO"])) {
							echo $infoUSER["BIO"];
						}
						?></textarea>
						<?php
								if (isset($_COOKIE["biographie"])) {
						?>
								<p style="color: rgb(210, 69, 52); font-size: 13px; margin-bottom: 32px; margin-top: -28px;">
								<img src="assets/icons/errorForm.png">
								Biographie invalide elle doit être comprise entre 1 (ouais on est sympas) et 250 caractères
								</p>

						<?php
							setcookie("biographie", false);
							}
						?>						
					</div>
					<input type="submit" value="VALIDER" id="backOfficeValide">
				</form>
			</div>
		</div>



		<?php
			require("footer.php"); 
		?>

	</body>
	</html>
	<?php
	}else{
		header("location:account1.php?ID_USERS=".$_GET['ID_USERS']);
	}