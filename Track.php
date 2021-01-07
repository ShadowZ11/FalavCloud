<?php
	session_start();
	require("assets/functions/trackInfos.php");
	require("assets/functions/commentsInfos.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $infoTrack['TITRE'];?> - <?php echo $pseudoArtisteTrack["PSEUDO"]?></title>
	<link rel="stylesheet" href="assets/styles/index.css">
	<link href="assets/fonts/Storybook.ttf" rel="stylesheet" as="font" type="font/Storybook">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="assets/icons/smallLogo.PNG">
</head>
<body>

	<?php
		require("header.php"); 
	?>
	
	<div id="headPersoPageBackGround" style="background:linear-gradient(0deg, rgba(0,0,0,0.7), rgba(0, 0, 0, 0.7)),url('<?php echo $infoTrack['PHOTO_MUSIQUE'];?>');background-size: cover;">
		<div class="headPersoPage" >
			<div class="headPersoPageBar1"></div>
			<img class="imgCoverBehind" src="<?php echo $infoTrack['PHOTO_MUSIQUE'];?>" width="269px" height="269px">
			<div class="menuheadPersoPage">
				<div class="actualArtist"><?php echo $infoTrack['TITRE'];?>
					<?php 
						if ($infoTrack['EXPLICIT'] == 1) {
							?>
							<img src="assets/icons/explicite.png" width="40px">
							<?php
						}
					?>
					
				</div>
				<div class="headPersoPageRight">
					<div class="releaseStats">
						<?php
							if (!empty($infoTrack['DATE_SORTIE'])) {
								?>
								<div class="releaseDate">Release: <?php echo $infoTrack['DATE_SORTIE'];?></div>
								<?php
							}
						?>
						<div class="rankStats">
							<div class="rankFalaMarkicon">F</div>
							<div class="rankFalaMarkW"><?php echo $infoTrack['NOMBRE_ECOUTE'];?></div>
						</div>
					</div>
					<div class="headPersoPageBar2"></div>
					<div class="nextPrevTrack">
						<a href="Track.php?ID_MUSIQUE=<?php echo $prevTrack['ID_MUSIQUE'];?>">
							<img src="assets/icons/prevTrack.png" height="37px">
						</a>
						<div class="actualTrackAblum">
							<div class="actualTrack"><?php echo $pseudoArtisteTrack["PSEUDO"]?></div>&nbsp;&nbsp;
							<?php
								if (!empty($infoAlbumTrack['TITRE'])) {
									?>
									<a href="Album.php?ID_ALBUM=<?php echo $albumTrack['ID_ALBUM'];?>">
										<div class="actualAlbum"><?php echo $infoAlbumTrack['TITRE'];?></div>
									</a>
									<?php
								}
							?>
						</div>
						<a href="Track.php?ID_MUSIQUE=<?php echo $nextTrack['ID_MUSIQUE'];?>">
							<img src="assets/icons/nextTrack.png" height="37px">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<div class="BehindContent">
		<?php
			if (!empty($infoTrack['STORY'])) {
				?>
				<div class="behindAbout">
					<div class="categorieButton">
						<div class="titleBehindCategorie">ABOUT</div>
					</div>
					<div id="about" class="pagePersonContent">
						<?php echo $infoTrack['STORY'];?>
					</div>
				</div>
				<?php
			}
		?>
		<div class="behindLyricsInformation">
			<div class="behindLycrics">
				<div class="categorieButton">
					<div class="titleBehindCategorie">LYRICS</div>
				</div>
				<div id="lyrics" class="pagePersonContent">
					<?php echo $infoTrack['LYRIC'];?>
				</div>
			</div>
			<div class="behindInformationComment">
				<div class="behindInformation">
					<?php
						if (!empty($infoTrack['LIEN_SPOTIFY'])) {
							?>
							<div class="infomation">
								<div class="titleBehindCategorie">SPOTIFY</div>
								<iframe src="<?php echo $infoTrack['LIEN_SPOTIFY'];?>" width="100%" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
							</div>
							<?php
						}
					?>
					<?php
						if (!empty($infoTrack['LIEN_CLIP'])) {
							?>
							<div class="infomation">
								<div class="categorieButton">
									<div class="titleBehindCategorie">CLIPS</div>
								</div>
								<iframe width="100%" height="220"src="<?php echo $infoTrack['LIEN_CLIP'];?>" frameborder="0" allowfullscreen></iframe>
							</div>
							<?php
						}
					?>
					<div class="infomation">
						<div class="categorieButton">
							<div class="titleBehindCategorie">INFORMATIONS</div>
						</div>
						<?php
							if (!empty($artisteTrack["ID_USERS"])) {
								?>
								<hr>
								<div class="oneInfo">
									<div class="typeInfo">Writer</div>
									<div class="infoContent"><?php echo $pseudoArtisteTrack["PSEUDO"]?></div>	
								</div>
								<?php
							}
						?>
						<?php
							if (!empty($infoTrack['PRODUIT_PAR'])) {
								?>
								<hr>
								<div class="oneInfo">
									<div class="typeInfo">Produit par</div>
									<div class="infoContent"><?php echo $infoTrack['PRODUIT_PAR'];?></div>	
								</div>
								<?php
							}
						?>
						<?php
							if (!empty($infoTrack['PROD'])) {
								?>
								<hr>
								<div class="oneInfo">
									<div class="typeInfo">Producer</div>
									<div class="infoContent"><?php echo $infoTrack['PROD'];?></div>	
								</div>
								<?php
							}
						?>		
						<?php
							if (!empty($infoTrack['RECORD_BY'])) {
								?>
								<hr>
								<div class="oneInfo">
									<div class="typeInfo">Enregistré par</div>
									<div class="infoContent"><?php echo $infoTrack['RECORD_BY'];?></div>	
								</div>
								<?php
							}
						?>
						<?php
							if (!empty($infoTrack['RECORD_IN'])) {
								?>
								<hr>
								<div class="oneInfo">
									<div class="typeInfo">Enregistré au</div>
									<div class="infoContent"><?php echo $infoTrack['RECORD_IN'];?></div>	
								</div>
								<?php
							}
						?>
						<?php
							if (!empty($infoTrack['MIX_BY'])) {
								?>
								<hr>
								<div class="oneInfo">
									<div class="typeInfo">Mixer par</div>
									<div class="infoContent"><?php echo $infoTrack['MIX_BY'];?></div>	
								</div>
								<?php
							}
						?>
						<?php
							if (!empty($infoTrack['MIX_IN'])) {
								?>
								<hr>
								<div class="oneInfo">
									<div class="typeInfo">Mixer au</div>
									<div class="infoContent"><?php echo $infoTrack['MIX_IN'];?></div>	
								</div>
								<?php
							}
						?>
						<?php
							if (!empty($infoTrack['FEAT'])) {
								?>
								<hr>
								<div class="oneInfo">
									<div class="typeInfo">Featuring</div>
									<div class="infoContent"><?php echo $infoTrack['FEAT'];?></div>	
								</div>
								<?php
							}
						?>
						<?php
							if (!empty($infoTrack['REALI_CLIP'])) {
								?>
								<hr>
								<div class="oneInfo">
									<div class="typeInfo">Réalisateur Clip</div>
									<div class="infoContent"><?php echo $infoTrack['REALI_CLIP'];?></div>	
								</div>
								<?php
							}
						?>							
					</div>
				</div>
				<div class="comment">
					<div class="inputProfilComment">
						<?php
							if (isset($_SESSION["token"]) && !empty($_SESSION["id"])) {
								?>
							<img class="userPic" src="<?php echo $_SESSION["userPic"]; ?>" width="45px" height="45px">
							<div id="commentForm" class="searchInputButton">
								<form id="commentForm" method="POST" action="assets/functions/comments.php?ID_MUSIQUE=<?php echo $_GET["ID_MUSIQUE"];?>">
									<input id="commentInput" type="text" name="comment" placeholder=" comment">
									<input id="submitComment" type="submit" class="searchSubmite" value="SHARE">
								</form>
							</div>
								<?php
							}else{
								?>
								<a href="Login.php"><b>Connectez-vous</b></a>&nbsp; pour commenter
								<?php
							}
						?>		
							
					</div>
					<div class="commentContent">
						<?php	
							for ($i = 0; isset($infoComment[$i]['ID']) && !empty($infoComment[$i]['ID']); $i++) {
								$sqlInfoOneComment = $connect->query("SELECT COMMENTAIRE, ID_USERS FROM COMMENTAIRES WHERE ID ='".$infoComment[$i]['ID']."'");
								$infoOneComment = $sqlInfoOneComment->fetch();
								$sqlInfoOneCommentUser = $connect->query("SELECT PSEUDO, NOM, PRENOM, PHOTO FROM USERS WHERE ID_USERS ='".$infoOneComment["ID_USERS"]."'");
								$usersComment = $sqlInfoOneCommentUser->fetch();
							?>
								<hr>
								<div class="oneComment">
									<a href="account1.php?ID_USERS=<?php echo $infoOneComment['ID_USERS'];?>">
										<div class="ProfilComment">
											<img class="userPic" src="<?php echo $usersComment["PHOTO"];?>" width="35px" height="35px">
											<div class="userInComment">
												<?php
													if (!empty($usersComment["PSEUDO"])) {
														echo $usersComment["PSEUDO"];
													}else{
														echo $usersComment["PRENOM"]." ".$usersComment["NOM"];
													}
												?>
											</div>	
										</div>
									</a>
									<div class="commentValue">
										<?php echo $infoOneComment["COMMENTAIRE"];?>
									</div>
								</div>
							<?php						
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
				

	<?php
		require("footer.php"); 
	?>

</body>
</html>