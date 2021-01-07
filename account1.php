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
						if (isset($infoUSER["PSEUDO"])) {
							echo ucfirst($infoUSER["PSEUDO"]);
						}else{
							echo ucfirst($infoUSER["PRENOM"])." ".ucfirst($infoUSER["NOM"]);
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

		<div id="headPersoPageBackGround" style="background:linear-gradient(0deg, rgba(0,0,0,0.7), rgba(0, 0, 0, 0.7)),url('<?php echo $infoUSER["PHOTO"]?>');background-size: cover;background-attachment: fixed;">
			<div class="headAccountPage">
				
				<div class="menuheadPersoPage1">
					<div class="photoUserNameVerifySettings">
						<div class="photoUserNameVerify">
							<img class="userPic" src="<?php echo $infoUSER["PHOTO"]?>" width="250px" height="250px">
							<div class="actualArtist">
								<?php
									if (!empty($infoUSER["PSEUDO"])) {
									 	echo ucfirst($infoUSER["PSEUDO"]);
									 }else{
									 	echo ucfirst($infoUSER["PRENOM"])." ".ucfirst($infoUSER["NOM"]);
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
							if ($_GET['ID_USERS'] == $_SESSION['id']) {
							?>
								<a id="accountSettings" href="setProfil.php?ID_USERS=<?php echo $_SESSION['id']; ?>">
									<img src="assets/icons/settings.png" width="60px" height="60px">
								</a>
							<?php
							}

							if (isset($infoUSER["RANG"]) && $infoUSER["RANG"] == 2 && $_GET['ID_USERS'] !== $_SESSION['id'] && isset($_SESSION['id'])) {
								$idFollow = $_GET['ID_USERS'];
								if(isset($likeUser['ID_USERS_SUIVRE'])){
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
						if (isset($infoUSER["RANG"]) && $infoUSER["RANG"] == 1 || $infoUSER["RANG"] == 3) {
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
								if (isset($infoUSERCollection[0]['VERSION']) && isset($infoUSERCollection[0]['ID_ALBUM'])) {
							?>
								<div class="headBloc">
									<div class="nameBloc">COLLECTION</div>
									<div class="barBloc1"></div>
								</div>
								<div id="albumAcountContentCollection">
									<?php	
										for ($i = 0; isset($infoUSERCollection[$i]['VERSION']) && !empty($infoUSERCollection[$i]['VERSION']) && isset($infoUSERCollection[$i]['ID_ALBUM']) && !empty($infoUSERCollection[$i]['ID_ALBUM']) && 3 >= $i; $i++) {
											$sqlInfoAlbumCollection = $connect->query("SELECT TITRE, PHOTO_ALBUM FROM ALBUM WHERE ID_ALBUM ='".$infoUSERCollection[$i]['ID_ALBUM']."'");
											$infoAlbumCollection = $sqlInfoAlbumCollection->fetch();
											$sqlIdAutAlbumCollection = $connect->query("SELECT ID_USERS FROM CREATION_ALBUM WHERE ID_ALBUM ='".$infoUSERCollection[$i]['ID_ALBUM']."'");
											$idAutAlbumCollection = $sqlIdAutAlbumCollection->fetch();
											$sqlPseudoAutAlbumCollection = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS ='".$idAutAlbumCollection['ID_USERS']."'");
											$pseudoAutAlbumCollection = $sqlPseudoAutAlbumCollection->fetch();
											if ($infoUSERCollection[$i]['VERSION'] == 1){
												$version = "digitalW.png";
											}elseif ($infoUSERCollection[$i]['VERSION'] == 2){
												$version = "cdW.png";
											}elseif ($infoUSERCollection[$i]['VERSION'] == 3){
												$version = "vinylW.png";
											}elseif ($infoUSERCollection[$i]['VERSION'] == 4){
												$version = "cassetteW.png";
											}
									?>
										<div class="listAlbumAccount">
											<a href="Album.php?ID_ALBUM=<?php echo $infoUSERCollection[$i]['ID_ALBUM']; ?>">
												<div class="albumCoverAccountContent" style="background:linear-gradient(0deg, rgba(0,0,0,0.2), rgba(0, 0, 0, 0.2)),url('<?php echo $infoAlbumCollection['PHOTO_ALBUM'];?>'); background-size: cover;">
													<img class="listAlbumCoverAccount" src="assets/icons/<?php echo $version;?>" width="80px" height="80px">
												</div>
												<div class="listAlbumTitle"><?php echo ucfirst($infoAlbumCollection['TITRE']);?></div>
											</a>
											<a href="account1.php?ID_USERS=<?php echo $idAutAlbumCollection['ID_USERS']; ?>">
												<div class="listAlbumArtist">by <?php echo ucfirst($pseudoAutAlbumCollection['PSEUDO']);?></div>
											</a>
										</div>
									<?php
										}
									?>
								</div>
								<?php
									if (isset($infoUSERCollection[4]['ID_ALBUM']) && !empty($infoUSERCollection[4]['ID_ALBUM'])) {
									?>
									<button id="albumAccountButtonCollection" class="accountButtonLargeBl" value="4" onclick="showMoreAlbumsCollection()">SHOW MORE</button>
									<?php
									}	
								}
							?>

							<?php 
								if (isset($infoUSERWantlist[0]['VERSION']) && isset($infoUSERWantlist[0]['ID_ALBUM'])) {
							?>
								<div class="headBloc">
									<div class="nameBloc">WANTLIST</div>
									<div class="barBloc1"></div>
								</div>

								<div id="albumAcountContentWantList">
									<?php	
										for ($i = 0; isset($infoUSERWantlist[$i]['VERSION']) && !empty($infoUSERWantlist[$i]['VERSION']) && isset($infoUSERWantlist[$i]['ID_ALBUM']) && !empty($infoUSERWantlist[$i]['ID_ALBUM']) && 3 >= $i; $i++) {
											$sqlInfoAlbumWantlist = $connect->query("SELECT TITRE, PHOTO_ALBUM FROM ALBUM WHERE ID_ALBUM ='".$infoUSERWantlist[$i]['ID_ALBUM']."'");
											$infoAlbumWantlist = $sqlInfoAlbumWantlist->fetch();
											$sqlIdAutAlbumWantlist = $connect->query("SELECT ID_USERS FROM CREATION_ALBUM WHERE ID_ALBUM ='".$infoUSERWantlist[$i]['ID_ALBUM']."'");
											$idAutAlbumWantlist = $sqlIdAutAlbumWantlist->fetch();
											$sqlPseudoAutAlbumWantlist = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS ='".$idAutAlbumWantlist['ID_USERS']."'");
											$pseudoAutAlbumWantlist = $sqlPseudoAutAlbumWantlist->fetch();
											if ($infoUSERWantlist[$i]['VERSION'] == 1){
												$version = "digitalW.png";
											}elseif ($infoUSERWantlist[$i]['VERSION'] == 2){
												$version = "cdW.png";
											}elseif ($infoUSERWantlist[$i]['VERSION'] == 3){
												$version = "vinylW.png";
											}elseif ($infoUSERWantlist[$i]['VERSION'] == 4){
												$version = "cassetteW.png";
											}
									?>
										<div class="listAlbumAccount">
											<a href="Album.php?ID_ALBUM=<?php echo $infoUSERWantlist[$i]['ID_ALBUM']; ?>">
												<div class="albumCoverAccountContent" style="background:linear-gradient(0deg, rgba(0,0,0,0.2), rgba(0, 0, 0, 0.2)),url('<?php echo $infoAlbumWantlist['PHOTO_ALBUM'];?>'); background-size: cover;">
													<img class="listAlbumCoverAccount" src="assets/icons/<?php echo $version;?>" width="80px" height="80px">
												</div>
												<div class="listAlbumTitle"><?php echo ucfirst($infoAlbumWantlist['TITRE']);?></div>
											</a>
											<a href="account1.php?ID_USERS=<?php echo $idAutAlbumWantlist['ID_USERS']; ?>">
												<div class="listAlbumArtist">by <?php echo ucfirst($pseudoAutAlbumWantlist['PSEUDO']);?></div>
											</a>
										</div>	
									<?php
										}
									?>
								</div>
								<?php
								if (isset($infoUSERWantlist[4]['ID_ALBUM']) && !empty($infoUSERWantlist[4]['ID_ALBUM'])) {
								?>
									<button id="albumAccountButtonWantlist" class="accountButtonLargeBl" value="4" onclick="showMoreAlbumsWantlist()">SHOW MORE</button>
							<?php
								}	
							}

						}
					?>
					<?php
						if (isset($infoUSER["RANG"]) && $infoUSER["RANG"] == 2) {
						?>
							<div>
								<div class="headBloc">
									<div class="nameBloc">BIBLIOGRAPHIE</div>
									<div class="barBloc1"></div>
								</div>
								<div class="barBloc2"></div>
							</div>
							<br>
							<br>
							<?php
								if (isset($tracksUser[0]['ID_MUSIQUE']) && !empty($tracksUser[0]['ID_MUSIQUE'])) {
							?>
								<div class="headBloc">
									<div class="nameBloc">SON</div>
									<div class="barBloc1"></div>
								</div>
								<div class="bibliographieContent">
									<?php

										for ($i=0; isset($tracksUser[$i]['ID_MUSIQUE']) && !empty($tracksUser[$i]['ID_MUSIQUE']) && 5 >= $i; $i++) {
											$sqlInfosTracksUser = $connect->query("SELECT TITRE, ID_MUSIQUE, PHOTO_MUSIQUE FROM MUSIQUE WHERE ID_MUSIQUE ='".$tracksUser[$i]["ID_MUSIQUE"]."' ORDER BY DATE_SORTIE DESC");
											$infosTracksUser = $sqlInfosTracksUser->fetch();
									?>
										<div class="rankList">
											<a href="Track.php?ID_MUSIQUE=<?php echo $infosTracksUser['ID_MUSIQUE']; ?>">
												<div class="rankCoverArtistTrack">	
													<img class="rankCover" src="<?php echo $infosTracksUser["PHOTO_MUSIQUE"];?>" width="65">
													<div class="rankArtistTrack">
														<div class="rankArtist"><?php echo ucfirst($infoUSER['PSEUDO']);?></div>
														<div class="rankTrack"><?php echo $infosTracksUser["TITRE"];?></div>
													</div>
												</div>
											</a>
										</div>
										<hr>
									<?php
										}
									if (isset($tracksUser[6]['ID_ALBUM']) && !empty($tracksUser[6]['ID_MUSIQUE'])) {
								?>						
									<button class="accountButtonLargeBl" value="6" onclick="showMoreTracks()" id="trackAccountButton" >SHOW MORE</button>
								</div>
								<?php
									}	
								}
							?>

							<?php
								if (isset($infosAlbumsUser[0]['ID_ALBUM']) && !empty($infosAlbumsUser[0]['ID_ALBUM'])) {
							?>
								<div class="headBloc">
									<div class="nameBloc">ALBUM</div>
									<div class="barBloc1"></div>
								</div>

								<div id="albumAcountContent">
									<?php
										for ($i = 0; isset($infosAlbumsUser[$i]['ID_ALBUM']) && !empty($infosAlbumsUser[$i]['ID_ALBUM']) && 3 >= $i; $i++) {
									?>
										<div class="listAlbumAccount">
											<a href="Album.php?ID_ALBUM=<?php echo $infosAlbumsUser[$i]['ID_ALBUM']; ?>">
												<img class="listAlbumCover" src="<?php echo $infosAlbumsUser[$i]["PHOTO_ALBUM"];?>" width="185px" height="185px">
												<div class="listAlbumTitle"><?php echo $infosAlbumsUser[$i]["TITRE"];?></div>
											</a>
											<div class="listAlbumArtist">by <?php echo ucfirst($infoUSER['PSEUDO']);?></div>
										</div>
									<?php
										}
									?>
								</div>
								<?php
									if (isset($infosAlbumsUser[4]['ID_ALBUM']) && !empty($infosAlbumsUser[4]['ID_ALBUM'])) {
								?>
									<button id="albumAccountButton" class="accountButtonLargeBl" value="4" onclick="showMoreAlbums()">SHOW MORE</button>
							<?php
								}
							}
						}
					?>
				</div>
				<?php
					if (isset($infoUSER["RANG"]) && $infoUSER["RANG"] == 1 || $infoUSER["RANG"] == 3) {
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
								if ($_GET['ID_USERS'] == $_SESSION['id']) {
									?>
									<div class="searchInputButton">
										<form id="postForm" method="POST" action="assets/functions/post.php?ID_USERS=<?php echo $_GET["ID_USERS"];?>">
											<input id="postInput" type="text" name="post" placeholder=" comment">
											<input id="submitPost" type="submit" class="searchSubmite" value="SHARE">
										</form>
									</div>
									<?php
								}
								?>
								<div class="commentContent">
									<?php	
										for ($i = 0; isset($infoPost[$i]['CONTENUE_POST']) && !empty($infoPost[$i]['CONTENUE_POST']); $i++) {
										?>
											<hr>
											<div class="oneComment">
												<div class="ProfilComment">
													<img class="userPic" src="<?php echo $infoUSER["PHOTO"];?>" width="35px" height="35px">
													<div class="userInComment">
														<?php
															if (isset($infoUSER["PSEUDO"])) {
																echo $infoUSER["PSEUDO"];
															}else{
																echo $infoUSER["PRENOM"]." ".$infoUSER["NOM"];
															}
														?>
													</div>	
												</div>
												<div class="commentValue">
													<?php echo $infoPost[$i]["CONTENUE_POST"];?>
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