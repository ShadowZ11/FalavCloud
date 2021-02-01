<?php
	session_start();
	require("assets/functions/accountInfos.php");
	require("assets/functions/postInfos.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>FALA - <?php
						if (isset($infoUSER["pseudo"])) {
							echo ucfirst($infoUSER["pseudo"]);
						}else{
							echo ucfirst($infoUSER["prenom"])." ".ucfirst($infoUSER["nom"]);
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

		<div id="headPersoPageBackGround" style="background:linear-gradient(0deg, rgba(0,0,0,0.7), rgba(0, 0, 0, 0.7)),url('<?php echo $infoUSER["photo"]?>');background-size: cover;background-attachment: fixed;">
			<div class="headAccountPage">
				
				<div class="menuheadPersoPage1">
					<div class="photoUserNameVerifySettings">
						<div class="photoUserNameVerify">
							<img class="userPic" src="<?php echo $infoUSER["photo"]?>" width="250px" height="250px">
							<div class="actualArtist">
								<?php
									if (!empty($infoUSER["pseudo"])) {
									 	echo ucfirst($infoUSER["pseudo"]);
									 }else{
									 	echo ucfirst($infoUSER["prenom"])." ".ucfirst($infoUSER["nom"]);
									 }
									if ($infoUSER["VF"] == 1) {
										?>
										<img src="assets/icons/verify.png" width="20px" height="20px">
										<?php
									}
								?>
							</div>
						</div>
						<?php
							if ($_GET['id_users'] == $_SESSION['id']) {
							?>
								<a id="accountSettings" href="setProfil.php?id_users=<?php echo $_SESSION['id']; ?>">
									<img src="assets/icons/settings.png" width="60px" height="60px">
								</a>
							<?php
							}

							if (isset($infoUSER["rang"]) && $infoUSER["rang"] == 2 && $_GET['id_users'] !== $_SESSION['id'] && isset($_SESSION['id'])) {
								$idFollow = $_GET['id_users'];
								if(isset($likeUser['id_users_SUIVRE'])){
								?>
									<div id="follow">
										<button id="followUserYes" value="<?php echo $idFollow; ?>" onclick="deleteFollow()"></button>
									</div>
								<?php
								}else{
								?>	
									<div id="follow">
										<button id="followUser" value="<?php echo $idFollow; ?>" onclick="addFollow()"></button>
									</div>
								<?php	
								}
								?>
								<script src="assets/functions/Javascript/follow.js" charset="utf-8"></script>
								<?php
							}
						?>	
					</div>
					<div class="headAccount">
						<div id="userHeader2">
							<div class="headPersoPageBar2"></div>
							<div class="nextPrevTrack">
								<img src="assets/icons/prevTrack.png" height="37px">
								<div class="actualTrackAblum">
									<div class="actualTrack">PROFIL</div>
								</div>
								<img src="assets/icons/nextTrack.png" height="37px">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			if (isset($infoUSER["BIO"])&& !empty($infoUSER["BIO"])) {
				?>
				<div id="accountContent" class="BehindContent">
					<div id="userBioContener" >
						<div class="headBloc">
							<div class="nameBloc">BIO</div>
							<div class="barBloc1"></div>
						</div>
						<p id="userBioContent">
							<?php echo $infoUSER["BIO"]?>
						</p>
					</div>
				</div>
				<?php
			}
		?>

		<div id="accountContentWhitoutAbout" class="BehindContent">
			<div class="behindLyricsInformation">
				<div class="accountMusicSectionsContent">
					<?php
						if (isset($infoUSER["rang"]) && $infoUSER["rang"] == 1 || $infoUSER["rang"] == 3) {
						?>	
							<div>
								<div class="headBloc">
									<div class="nameBloc">BIBLIOTHEQUE</div>
									<div class="barBloc1"></div>
								</div>
								<div class="barBloc2"></div>
							</div>
							<br>
							<br>
					<?php
						}
					?>
				</div>
				<?php
					if (isset($infoUSER["rang"]) && $infoUSER["rang"] == 1 || $infoUSER["rang"] == 3) {
				?>
						<div class="accountPostContent">
							<div>
								<div class="headBloc">
									<div class="nameBloc">PUBLICATION</div>
									<div class="barBloc1"></div>
								</div>
								<div class="barBloc2"></div>
							</div>
							<div class="comment">
								<?php
								if ($_GET['id_users'] == $_SESSION['id']) {
									?>
									<div class="searchInputButton">
										<form id="postForm" method="POST" action="assets/functions/post.php?id_users=<?php echo $_GET["id_users"];?>">
											<input id="postInput" type="text" name="post" placeholder=" comment">
											<input id="submitPost" type="submit" class="searchSubmite" value="SHARE">
										</form>
									</div>
									<?php
								}
								?>
								<div class="commentContent">
									<?php	
										for ($i = 0; isset($infoPost[$i]['contenue_post']) && !empty($infoPost[$i]['contenue_post']); $i++) {
										?>
											<hr>
											<div class="oneComment">
												<div class="ProfilComment">
													<img class="userPic" src="<?php echo $infoUSER["photo"];?>" width="35px" height="35px">
													<div class="userInComment">
														<?php
															if (isset($infoUSER["pseudo"])) {
																echo $infoUSER["pseudo"];
															}else{
																echo $infoUSER["prenom"]." ".$infoUSER["nom"];
															}
														?>
													</div>	
												</div>
												<div class="commentValue">
													<?php echo $infoPost[$i]["contenue_post"];?>
												</div>
											</div>
										<?php						
										}
									?>
								</div>
							</div>
						</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>

		<?php
			require("footer.php"); 
		?>
		<script src="assets/functions/Javascript/loadAccount.js" charset="utf-8"></script>
	</body>
</html>