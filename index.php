<?php
	session_start();
	require("assets/functions/indexInfos.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="assets/styles/index.css">
	<link href="assets/fonts/Storybook.ttf" rel="stylesheet" as="font" type="font/Storybook">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="assets/icons/smallLogo.PNG">
</head>
<body>

	<?php
		require("header.php");
	?>


	<div class="content">
		<div id="bigNewsImg">
			<div id="bigNewsContent">
				<div class="headBloc">
					<div class="nameBloc" >A LA UNE</div>
					<div class="barBloc1" id="nameBlocALaUne"></div>
				</div>
				<a href="News.php?ID_NEWS=<?php echo $news[0]["ID_NEWS"];?>">
					<div class="titleBigauthorDateNews">
						<div>	
							<div id="titleBigNews"><?php echo $news[0]["TITRE"];?></div>
							<div class="authorDateNews">
								<?php
									$sqlAuthNews = $connect->query("SELECT NOM, PRENOM FROM USERS WHERE ID_USERS = '".$news[0]['ID_USERS']."'");
									$authNews = $sqlAuthNews->fetch();
								?>
								<div >Par <?php echo $authNews['PRENOM'].'&nbsp;'. $authNews['NOM'];?></div>&nbsp;<div class="DateNews">| <?php echo $news[0]["DATE_NEWS"];?></div>
							</div>
							<div id="headBigNews">
								<?php echo $news[0]["PREVIEW"];?>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div width="50%">
				<div id="lastClip">
					<img id="clippp" width="100%" height="100%" src="<?php echo $news[0]["PHOTO_PREVIEW"];?>" >
				</div>	
			</div>
		</div>

		<div class="bigBloc">
			<div class="headBloc">
				<div class="nameBloc">DERNIERES&nbsp;SORTIES</div>
				<div class="barBloc1"></div>
			</div>
			<div class="barBloc2"></div>
		</div>
		<div id="newAlbumCoverInfo">
			<div class="twoNewsAlbum">
				<div class="newAlbum">
					<?php
						$sqlIdAuthNewAlbums = $connect->query("SELECT ID_USERS FROM CREATION_ALBUM WHERE ID_ALBUM = '".$newAlbums[0]["ID_ALBUM"]."'");
						$idAuthNewAlbums = $sqlIdAuthNewAlbums->fetch();
						$sqlAuthNewAlbums = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS = '".$idAuthNewAlbums['ID_USERS']."'");
						$authNewAlbums = $sqlAuthNewAlbums->fetch();
						$sqlIdTrackNewAlbums = $connect->query("SELECT ID_MUSIQUE FROM APPARTIENT WHERE ID_ALBUM = '".$newAlbums[0]["ID_ALBUM"]."'");
						$idTrackNewAlbums = $sqlIdTrackNewAlbums->fetchAll();

						$track = 0;
						$total = 0;
						while (isset($idTrackNewAlbums[$track]["ID_MUSIQUE"])) {
							$sqlTotalTrackNewAlbums = $connect->query("SELECT NTRACK_NUMB FROM MUSIQUE WHERE ID_MUSIQUE = '".$idTrackNewAlbums[$track]["ID_MUSIQUE"]."'");
							$totalTrackNewAlbums = $sqlTotalTrackNewAlbums->fetch();
							if ($totalTrackNewAlbums['NTRACK_NUMB'] > $total) {
								$total = $totalTrackNewAlbums['NTRACK_NUMB'];
							}
							$track++;
						}
					?>
					<a href="Album.php?ID_ALBUM=<?php echo $newAlbums[0]["ID_ALBUM"];?>">
						<img class="newAlbumCover" src="<?php echo $newAlbums[0]["PHOTO_ALBUM"];?>" width="233">
					</a>
					<div class="newAlbumInfo">
						<div class="newAlbumTitle"><?php echo $newAlbums[0]["TITRE"];?></div>
						<div class="newAlbumArtiste">by <?php echo $authNewAlbums['PSEUDO'];?></div>
						<?php
							if (!empty($newAlbums[0]["FEAT"])) {
								?>
								<div class="newAlbumFeat">feat. <?php echo $newAlbums[0]["FEAT"];?></div>
								<?php
							}
						?>
						<div class="newAlbumTracks"><?php echo $total;?> tracks</div>
					</div>
					<hr class="newAlbumHr">
				</div>
				<div class="newAlbum">
					<?php
						$sqlIdAuthNewAlbums = $connect->query("SELECT ID_USERS FROM CREATION_ALBUM WHERE ID_ALBUM = '".$newAlbums[1]["ID_ALBUM"]."'");
						$idAuthNewAlbums = $sqlIdAuthNewAlbums->fetch();
						$sqlAuthNewAlbums = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS = '".$idAuthNewAlbums['ID_USERS']."'");
						$authNewAlbums = $sqlAuthNewAlbums->fetch();
						$sqlIdTrackNewAlbums = $connect->query("SELECT ID_MUSIQUE FROM APPARTIENT WHERE ID_ALBUM = '".$newAlbums[1]["ID_ALBUM"]."'");
						$idTrackNewAlbums = $sqlIdTrackNewAlbums->fetchAll();

						$track = 0;
						$total = 0;
						while (isset($idTrackNewAlbums[$track]["ID_MUSIQUE"])) {
							$sqlTotalTrackNewAlbums = $connect->query("SELECT NTRACK_NUMB FROM MUSIQUE WHERE ID_MUSIQUE = '".$idTrackNewAlbums[$track]["ID_MUSIQUE"]."'");
							$totalTrackNewAlbums = $sqlTotalTrackNewAlbums->fetch();
							if ($totalTrackNewAlbums['NTRACK_NUMB'] > $total) {
								$total = $totalTrackNewAlbums['NTRACK_NUMB'];
							}
							$track++;
						}
					?>
					<hr class="newAlbumHr">
					<div class="newAlbumInfoTop">
						<div class="newAlbumTitle"><?php echo $newAlbums[1]["TITRE"];?></div>
						<div class="newAlbumArtiste">by <?php echo $authNewAlbums['PSEUDO'];?></div>
						<?php
							if (!empty($newAlbums[1]["FEAT"])) {
								?>
								<div class="newAlbumFeat">feat. <?php echo $newAlbums[1]["FEAT"];?></div>
								<?php
							}
						?>
						<div class="newAlbumTracks"><?php echo $total;?> tracks</div>
					</div>
					<a href="Album.php?ID_ALBUM=<?php echo $newAlbums[1]["ID_ALBUM"];?>">
						<img class="newAlbumCover" src="<?php echo $newAlbums[1]["PHOTO_ALBUM"];?>"  width="233">
					</a>
				</div>
			</div>
			<div class="twoNewsAlbum">
				<div class="newAlbum">
					<?php
						$sqlIdAuthNewAlbums = $connect->query("SELECT ID_USERS FROM CREATION_ALBUM WHERE ID_ALBUM = '".$newAlbums[2]["ID_ALBUM"]."'");
						$idAuthNewAlbums = $sqlIdAuthNewAlbums->fetch();
						$sqlAuthNewAlbums = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS = '".$idAuthNewAlbums['ID_USERS']."'");
						$authNewAlbums = $sqlAuthNewAlbums->fetch();
						$sqlIdTrackNewAlbums = $connect->query("SELECT ID_MUSIQUE FROM APPARTIENT WHERE ID_ALBUM = '".$newAlbums[2]["ID_ALBUM"]."'");
						$idTrackNewAlbums = $sqlIdTrackNewAlbums->fetchAll();

						$track = 0;
						$total = 0;
						while (isset($idTrackNewAlbums[$track]["ID_MUSIQUE"])) {
							$sqlTotalTrackNewAlbums = $connect->query("SELECT NTRACK_NUMB FROM MUSIQUE WHERE ID_MUSIQUE = '".$idTrackNewAlbums[$track]["ID_MUSIQUE"]."'");
							$totalTrackNewAlbums = $sqlTotalTrackNewAlbums->fetch();
							if ($totalTrackNewAlbums['NTRACK_NUMB'] > $total) {
								$total = $totalTrackNewAlbums['NTRACK_NUMB'];
							}
							$track++;
						}
					?>
					<a href="Album.php?ID_ALBUM=<?php echo $newAlbums[2]["ID_ALBUM"];?>">
						<img class="newAlbumCover" src="<?php echo $newAlbums[2]["PHOTO_ALBUM"];?>"  width="233">
					</a>
					<div class="newAlbumInfo">
						<div class="newAlbumTitle"><?php echo $newAlbums[2]["TITRE"];?></div>
						<div class="newAlbumArtiste">by <?php echo $authNewAlbums['PSEUDO'];?></div>
						<?php
							if (!empty($newAlbums[2]["FEAT"])) {
								?>
								<div class="newAlbumFeat">feat. <?php echo $newAlbums[2]["FEAT"];?></div>
								<?php
							}
						?>
						<div class="newAlbumTracks"><?php echo $total;?> tracks</div>
					</div>
					<hr class="newAlbumHr">
				</div>
				<div class="newAlbum">
					<?php
						$sqlIdAuthNewAlbums = $connect->query("SELECT ID_USERS FROM CREATION_ALBUM WHERE ID_ALBUM = '".$newAlbums[3]["ID_ALBUM"]."'");
						$idAuthNewAlbums = $sqlIdAuthNewAlbums->fetch();
						$sqlAuthNewAlbums = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS = '".$idAuthNewAlbums['ID_USERS']."'");
						$authNewAlbums = $sqlAuthNewAlbums->fetch();
						$sqlIdTrackNewAlbums = $connect->query("SELECT ID_MUSIQUE FROM APPARTIENT WHERE ID_ALBUM = '".$newAlbums[3]["ID_ALBUM"]."'");
						$idTrackNewAlbums = $sqlIdTrackNewAlbums->fetchAll();

						$track = 0;
						$total = 0;
						while (isset($idTrackNewAlbums[$track]["ID_MUSIQUE"])) {
							$sqlTotalTrackNewAlbums = $connect->query("SELECT NTRACK_NUMB FROM MUSIQUE WHERE ID_MUSIQUE = '".$idTrackNewAlbums[$track]["ID_MUSIQUE"]."'");
							$totalTrackNewAlbums = $sqlTotalTrackNewAlbums->fetch();
							if ($totalTrackNewAlbums['NTRACK_NUMB'] > $total) {
								$total = $totalTrackNewAlbums['NTRACK_NUMB'];
							}
							$track++;
						}
					?>
					<hr class="newAlbumHr">
					<div class="newAlbumInfoTop">
						<div class="newAlbumTitle"><?php echo $newAlbums[3]["TITRE"];?></div>
						<div class="newAlbumArtiste">by <?php echo $authNewAlbums['PSEUDO'];?></div>
						<?php
							if (!empty($newAlbums[3]["FEAT"])) {
								?>
								<div class="newAlbumFeat">feat. <?php echo $newAlbums[3]["FEAT"];?></div>
								<?php
							}
						?>
						<div class="newAlbumTracks"><?php echo $total;?> tracks</div>
					</div>
					<a href="Album.php?ID_ALBUM=<?php echo $newAlbums[3]["ID_ALBUM"];?>">
						<img class="newAlbumCover" src="<?php echo $newAlbums[3]["PHOTO_ALBUM"];?>"  width="233">
					</a>
				</div>
			</div>
		</div>
		<div class="bigBloc">
			<div class="headBloc">
				<div class="nameBloc">+&nbsp;DE&nbsp;NEWS</div>
				<div class="barBloc1"></div>
			</div>
			<div class="barBloc2"></div>
		</div>
		<?php
			for($i=0;isset($newClip[$i]["LIEN_CLIP"]) && empty($newClip[$i]["LIEN_CLIP"]); $i++){
				$newClip[$i]["LIEN_CLIP"];
			}
		?>
		<div id="moreNewsContent">
			<div class="demi">
				<div class="moreNewsVideo">
					<div class="emptyTitre1">CLIP</div>
					<div id="lastClip">
						<iframe id="clippp" width="100%"src="https://www.youtube.com/embed/fLF0wawuIbo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<div class="titreNewsVideo"></div>
				</div>
			</div>
			<div id="moreNewsApercu" class="demi">
				<div class="moreNewsActu">
					<div class="emptyTitre2titreNewsApercu">	
						<div class="emptyTitre2">+</div>
						<div class="titreNewsApercu"><?php echo $news[1]["TITRE"];?></div>
					</div>
					<div class="authorDateImgNewsApercu">	
						<div class="authorDateNewsApercu">
							<?php
								$sqlAuthNews = $connect->query("SELECT NOM, PRENOM FROM USERS WHERE ID_USERS = '".$news[1]['ID_USERS']."'");
								$authNews = $sqlAuthNews->fetch();
							?>
							<div >Par <?php echo $authNews['PRENOM'].'&nbsp;'. $authNews['NOM'];?></div>&nbsp;<div class="DateNews">| <?php echo $news[1]["DATE_NEWS"];?></div>
						</div>
						<a href="News.php?ID_NEWS=<?php echo $news[1]["ID_NEWS"];?>">
							<img class="imgNewsApercu" width="100%" src="<?php echo $news[1]["PHOTO_PREVIEW"];?>">
						</a>
					</div>
				</div>
				<div class="moreNewsActu">
					<div>
						<div class="emptyTitre2">+</div>
						<div class="titreNewsApercu"><?php echo $news[2]["TITRE"];?></div>
					</div>
					<div class="authorDateImgNewsApercu">
						<div class="authorDateNewsApercu">
							<?php
								$sqlAuthNews = $connect->query("SELECT NOM, PRENOM FROM USERS WHERE ID_USERS = '".$news[2]['ID_USERS']."'");
								$authNews = $sqlAuthNews->fetch();
							?>
							<div >Par <?php echo $authNews['PRENOM'].'&nbsp;'. $authNews['NOM'];?></div>&nbsp;<div class="DateNews">| <?php echo $news[2]["DATE_NEWS"];?></div>
						</div>
						<a href="News.php?ID_NEWS=<?php echo $news[2]["ID_NEWS"];?>">
							<img class="imgNewsApercu" width="100%" src="<?php echo $news[2]["PHOTO_PREVIEW"];?>">
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="rankingTitle">
			RANKING
		</div>
		<div class="rankingByFala">
			<div class="rankingBy">by</div>&nbsp;&nbsp;
			<div class="rankingFalaLogo">FALA</div>
		</div>
		<div class="rankList">
			<?php
				$sqlIdAuthRanking = $connect->query("SELECT ID_USERS FROM CREATION_MUSIQUE WHERE ID_MUSIQUE = '".$ranking[0]["ID_MUSIQUE"]."'");
				$idAuthRanking = $sqlIdAuthRanking->fetch();
				$sqlAuthRanking = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS = '".$idAuthRanking["ID_USERS"]."'");
				$authRanking = $sqlAuthRanking->fetch();
				$sqlIdAlbumRanking = $connect->query("SELECT ID_ALBUM FROM APPARTIENT WHERE ID_MUSIQUE = '".$ranking[0]["ID_MUSIQUE"]."'");
				$idAlbumRanking = $sqlIdAlbumRanking->fetch();
				$sqlAlbumRanking = $connect->query("SELECT TITRE FROM ALBUM WHERE ID_ALBUM = '".$idAlbumRanking["ID_ALBUM"]."'");
				$albumRanking = $sqlAlbumRanking->fetch();
			?>
			<a href="Track.php?ID_MUSIQUE=<?php echo $ranking[0]["ID_MUSIQUE"];?>">
				<div class="rankCoverArtistTrack">	
					<div class="rank">1</div>
					<img class="rankCover" src="<?php echo $ranking[0]["PHOTO_MUSIQUE"];?>" width="65">
					<div class="rankArtistTrack">
						<div class="rankArtist"><?php echo $authRanking["PSEUDO"];?></div>
						<div class="rankTrack"><?php echo $ranking[0]["TITRE"];?></div>
					</div>
				</div>
			</a>
			
			<div class="rankAblum">
				<a href="Album.php?ID_ALBUM=<?php echo $idAlbumRanking["ID_ALBUM"];?>">		<?php echo $albumRanking["TITRE"];?>
				</a>
			</div>
			
			<div class="rankStats">
				<div class="rankFalaMarkicon">F</div>
				<div class="rankFalaMark"><?php echo $ranking[0]["NOMBRE_ECOUTE"];?></div>
			</div>
		</div>
		<hr>
		<div class="rankList">
			<?php
				$sqlIdAuthRanking = $connect->query("SELECT ID_USERS FROM CREATION_MUSIQUE WHERE ID_MUSIQUE = '".$ranking[1]["ID_MUSIQUE"]."'");
				$idAuthRanking = $sqlIdAuthRanking->fetch();
				$sqlAuthRanking = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS = '".$idAuthRanking["ID_USERS"]."'");
				$authRanking = $sqlAuthRanking->fetch();
				$sqlIdAlbumRanking = $connect->query("SELECT ID_ALBUM FROM APPARTIENT WHERE ID_MUSIQUE = '".$ranking[1]["ID_MUSIQUE"]."'");
				$idAlbumRanking = $sqlIdAlbumRanking->fetch();
				$sqlAlbumRanking = $connect->query("SELECT TITRE FROM ALBUM WHERE ID_ALBUM = '".$idAlbumRanking["ID_ALBUM"]."'");
				$albumRanking = $sqlAlbumRanking->fetch();
			?>
			<a href="Track.php?ID_MUSIQUE=<?php echo $ranking[1]["ID_MUSIQUE"];?>">
				<div class="rankCoverArtistTrack">	
					<div class="rank">2</div>
					<img class="rankCover" src="<?php echo $ranking[1]["PHOTO_MUSIQUE"];?>" width="65">
					<div class="rankArtistTrack">
						<div class="rankArtist"><?php echo $authRanking["PSEUDO"];?></div>
						<div class="rankTrack"><?php echo $ranking[1]["TITRE"];?></div>
					</div>
				</div>
			</a>
			
			<div class="rankAblum">
				<a href="Album.php?ID_ALBUM=<?php echo $idAlbumRanking["ID_ALBUM"];?>">		
					<?php echo $albumRanking["TITRE"];?>
				</a>
			</div>
			
			<div class="rankStats">
				<div class="rankFalaMarkicon">F</div>
				<div class="rankFalaMark"><?php echo $ranking[1]["NOMBRE_ECOUTE"];?></div>
			</div>
		</div>
		<hr>
		<div class="rankList">
			<?php
				$sqlIdAuthRanking = $connect->query("SELECT ID_USERS FROM CREATION_MUSIQUE WHERE ID_MUSIQUE = '".$ranking[2]["ID_MUSIQUE"]."'");
				$idAuthRanking = $sqlIdAuthRanking->fetch();
				$sqlAuthRanking = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS = '".$idAuthRanking["ID_USERS"]."'");
				$authRanking = $sqlAuthRanking->fetch();
				$sqlIdAlbumRanking = $connect->query("SELECT ID_ALBUM FROM APPARTIENT WHERE ID_MUSIQUE = '".$ranking[2]["ID_MUSIQUE"]."'");
				$idAlbumRanking = $sqlIdAlbumRanking->fetch();
				$sqlAlbumRanking = $connect->query("SELECT TITRE FROM ALBUM WHERE ID_ALBUM = '".$idAlbumRanking["ID_ALBUM"]."'");
				$albumRanking = $sqlAlbumRanking->fetch();
			?>
			<a href="Track.php?ID_MUSIQUE=<?php echo $ranking[2]["ID_MUSIQUE"];?>">
				<div class="rankCoverArtistTrack">	
					<div class="rank">3</div>
					<img class="rankCover" src="<?php echo $ranking[2]["PHOTO_MUSIQUE"];?>" width="65">
					<div class="rankArtistTrack">
						<div class="rankArtist"><?php echo $authRanking["PSEUDO"];?></div>
						<div class="rankTrack"><?php echo $ranking[2]["TITRE"];?></div>
					</div>
				</div>
			</a>
			
			<div class="rankAblum">
				<a href="Album.php?ID_ALBUM=<?php echo $idAlbumRanking["ID_ALBUM"];?>">		
					<?php echo $albumRanking["TITRE"];?>
				</a>
			</div>
			
			<div class="rankStats">
				<div class="rankFalaMarkicon">F</div>
				<div class="rankFalaMark"><?php echo $ranking[2]["NOMBRE_ECOUTE"];?></div>
			</div>
		</div>
		<hr>
		<div class="rankList">
			<?php
				$sqlIdAuthRanking = $connect->query("SELECT ID_USERS FROM CREATION_MUSIQUE WHERE ID_MUSIQUE = '".$ranking[3]["ID_MUSIQUE"]."'");
				$idAuthRanking = $sqlIdAuthRanking->fetch();
				$sqlAuthRanking = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS = '".$idAuthRanking["ID_USERS"]."'");
				$authRanking = $sqlAuthRanking->fetch();
				$sqlIdAlbumRanking = $connect->query("SELECT ID_ALBUM FROM APPARTIENT WHERE ID_MUSIQUE = '".$ranking[3]["ID_MUSIQUE"]."'");
				$idAlbumRanking = $sqlIdAlbumRanking->fetch();
				$sqlAlbumRanking = $connect->query("SELECT TITRE FROM ALBUM WHERE ID_ALBUM = '".$idAlbumRanking["ID_ALBUM"]."'");
				$albumRanking = $sqlAlbumRanking->fetch();
			?>
			<a href="Track.php?ID_MUSIQUE=<?php echo $ranking[3]["ID_MUSIQUE"];?>">
				<div class="rankCoverArtistTrack">	
					<div class="rank">4</div>
					<img class="rankCover" src="<?php echo $ranking[3]["PHOTO_MUSIQUE"];?>" width="65">
					<div class="rankArtistTrack">
						<div class="rankArtist"><?php echo $authRanking["PSEUDO"];?></div>
						<div class="rankTrack"><?php echo $ranking[3]["TITRE"];?></div>
					</div>
				</div>
			</a>
			
			<div class="rankAblum">
				<a href="Album.php?ID_ALBUM=<?php echo $idAlbumRanking["ID_ALBUM"];?>">		
					<?php echo $albumRanking["TITRE"];?>
				</a>
			</div>
			
			<div class="rankStats">
				<div class="rankFalaMarkicon">F</div>
				<div class="rankFalaMark"><?php echo $ranking[3]["NOMBRE_ECOUTE"];?></div>
			</div>
		</div>
		<hr>
		<div class="rankList">
			<?php
				$sqlIdAuthRanking = $connect->query("SELECT ID_USERS FROM CREATION_MUSIQUE WHERE ID_MUSIQUE = '".$ranking[4]["ID_MUSIQUE"]."'");
				$idAuthRanking = $sqlIdAuthRanking->fetch();
				$sqlAuthRanking = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS = '".$idAuthRanking["ID_USERS"]."'");
				$authRanking = $sqlAuthRanking->fetch();
				$sqlIdAlbumRanking = $connect->query("SELECT ID_ALBUM FROM APPARTIENT WHERE ID_MUSIQUE = '".$ranking[4]["ID_MUSIQUE"]."'");
				$idAlbumRanking = $sqlIdAlbumRanking->fetch();
				$sqlAlbumRanking = $connect->query("SELECT TITRE FROM ALBUM WHERE ID_ALBUM = '".$idAlbumRanking["ID_ALBUM"]."'");
				$albumRanking = $sqlAlbumRanking->fetch();
			?>
			<a href="Track.php?ID_MUSIQUE=<?php echo $ranking[4]["ID_MUSIQUE"];?>">
				<div class="rankCoverArtistTrack">	
					<div class="rank">5</div>
					<img class="rankCover" src="<?php echo $ranking[4]["PHOTO_MUSIQUE"];?>" width="65">
					<div class="rankArtistTrack">
						<div class="rankArtist"><?php echo $authRanking["PSEUDO"];?></div>
						<div class="rankTrack"><?php echo $ranking[4]["TITRE"];?></div>
					</div>
				</div>
			</a>
			
			<div class="rankAblum">
				<a href="Album.php?ID_ALBUM=<?php echo $idAlbumRanking["ID_ALBUM"];?>">		
					<?php echo $albumRanking["TITRE"];?>
				</a>
			</div>
			
			<div class="rankStats">
				<div class="rankFalaMarkicon">F</div>
				<div class="rankFalaMark"><?php echo $ranking[4]["NOMBRE_ECOUTE"];?></div>
			</div>
		</div>
		<hr>
		<div class="rankList">
			<?php
				$sqlIdAuthRanking = $connect->query("SELECT ID_USERS FROM CREATION_MUSIQUE WHERE ID_MUSIQUE = '".$ranking[5]["ID_MUSIQUE"]."'");
				$idAuthRanking = $sqlIdAuthRanking->fetch();
				$sqlAuthRanking = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS = '".$idAuthRanking["ID_USERS"]."'");
				$authRanking = $sqlAuthRanking->fetch();
				$sqlIdAlbumRanking = $connect->query("SELECT ID_ALBUM FROM APPARTIENT WHERE ID_MUSIQUE = '".$ranking[5]["ID_MUSIQUE"]."'");
				$idAlbumRanking = $sqlIdAlbumRanking->fetch();
				$sqlAlbumRanking = $connect->query("SELECT TITRE FROM ALBUM WHERE ID_ALBUM = '".$idAlbumRanking["ID_ALBUM"]."'");
				$albumRanking = $sqlAlbumRanking->fetch();
			?>
			<a href="Track.php?ID_MUSIQUE=<?php echo $ranking[5]["ID_MUSIQUE"];?>">
				<div class="rankCoverArtistTrack">	
					<div class="rank">6</div>
					<img class="rankCover" src="<?php echo $ranking[5]["PHOTO_MUSIQUE"];?>" width="65">
					<div class="rankArtistTrack">
						<div class="rankArtist"><?php echo $authRanking["PSEUDO"];?></div>
						<div class="rankTrack"><?php echo $ranking[5]["TITRE"];?></div>
					</div>
				</div>
			</a>
			
			<div class="rankAblum">
				<a href="Album.php?ID_ALBUM=<?php echo $idAlbumRanking["ID_ALBUM"];?>">		
					<?php echo $albumRanking["TITRE"];?>
				</a>
			</div>
			
			<div class="rankStats">
				<div class="rankFalaMarkicon">F</div>
				<div class="rankFalaMark"><?php echo $ranking[5]["NOMBRE_ECOUTE"];?></div>
			</div>
		</div>
		<hr>
		<div class="rankList">
			<?php
				$sqlIdAuthRanking = $connect->query("SELECT ID_USERS FROM CREATION_MUSIQUE WHERE ID_MUSIQUE = '".$ranking[6]["ID_MUSIQUE"]."'");
				$idAuthRanking = $sqlIdAuthRanking->fetch();
				$sqlAuthRanking = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS = '".$idAuthRanking["ID_USERS"]."'");
				$authRanking = $sqlAuthRanking->fetch();
				$sqlIdAlbumRanking = $connect->query("SELECT ID_ALBUM FROM APPARTIENT WHERE ID_MUSIQUE = '".$ranking[6]["ID_MUSIQUE"]."'");
				$idAlbumRanking = $sqlIdAlbumRanking->fetch();
				$sqlAlbumRanking = $connect->query("SELECT TITRE FROM ALBUM WHERE ID_ALBUM = '".$idAlbumRanking["ID_ALBUM"]."'");
				$albumRanking = $sqlAlbumRanking->fetch();
			?>
			<a href="Track.php?ID_MUSIQUE=<?php echo $ranking[6]["ID_MUSIQUE"];?>">
				<div class="rankCoverArtistTrack">	
					<div class="rank">7</div>
					<img class="rankCover" src="<?php echo $ranking[6]["PHOTO_MUSIQUE"];?>" width="65">
					<div class="rankArtistTrack">
						<div class="rankArtist"><?php echo $authRanking["PSEUDO"];?></div>
						<div class="rankTrack"><?php echo $ranking[6]["TITRE"];?></div>
					</div>
				</div>
			</a>
			
			<div class="rankAblum">
				<a href="Album.php?ID_ALBUM=<?php echo $idAlbumRanking["ID_ALBUM"];?>">		
					<?php echo $albumRanking["TITRE"];?>
				</a>
			</div>
			
			<div class="rankStats">
				<div class="rankFalaMarkicon">F</div>
				<div class="rankFalaMark"><?php echo $ranking[6]["NOMBRE_ECOUTE"];?></div>
			</div>
		</div>
		<hr>
		<div class="rankList">
			<?php
				$sqlIdAuthRanking = $connect->query("SELECT ID_USERS FROM CREATION_MUSIQUE WHERE ID_MUSIQUE = '".$ranking[7]["ID_MUSIQUE"]."'");
				$idAuthRanking = $sqlIdAuthRanking->fetch();
				$sqlAuthRanking = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS = '".$idAuthRanking["ID_USERS"]."'");
				$authRanking = $sqlAuthRanking->fetch();
				$sqlIdAlbumRanking = $connect->query("SELECT ID_ALBUM FROM APPARTIENT WHERE ID_MUSIQUE = '".$ranking[7]["ID_MUSIQUE"]."'");
				$idAlbumRanking = $sqlIdAlbumRanking->fetch();
				$sqlAlbumRanking = $connect->query("SELECT TITRE FROM ALBUM WHERE ID_ALBUM = '".$idAlbumRanking["ID_ALBUM"]."'");
				$albumRanking = $sqlAlbumRanking->fetch();
			?>
			<a href="Track.php?ID_MUSIQUE=<?php echo $ranking[7]["ID_MUSIQUE"];?>">
				<div class="rankCoverArtistTrack">	
					<div class="rank">8</div>
					<img class="rankCover" src="<?php echo $ranking[7]["PHOTO_MUSIQUE"];?>" width="65">
					<div class="rankArtistTrack">
						<div class="rankArtist"><?php echo $authRanking["PSEUDO"];?></div>
						<div class="rankTrack"><?php echo $ranking[7]["TITRE"];?></div>
					</div>
				</div>
			</a>
			
			<div class="rankAblum">
				<a href="Album.php?ID_ALBUM=<?php echo $idAlbumRanking["ID_ALBUM"];?>">		<?php echo $albumRanking["TITRE"];?>
				</a>
			</div>
			
			<div class="rankStats">
				<div class="rankFalaMarkicon">F</div>
				<div class="rankFalaMark"><?php echo $ranking[7]["NOMBRE_ECOUTE"];?></div>
			</div>
		</div>
		<hr>
		<div class="rankList">
			<?php
				$sqlIdAuthRanking = $connect->query("SELECT ID_USERS FROM CREATION_MUSIQUE WHERE ID_MUSIQUE = '".$ranking[8]["ID_MUSIQUE"]."'");
				$idAuthRanking = $sqlIdAuthRanking->fetch();
				$sqlAuthRanking = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS = '".$idAuthRanking["ID_USERS"]."'");
				$authRanking = $sqlAuthRanking->fetch();
				$sqlIdAlbumRanking = $connect->query("SELECT ID_ALBUM FROM APPARTIENT WHERE ID_MUSIQUE = '".$ranking[8]["ID_MUSIQUE"]."'");
				$idAlbumRanking = $sqlIdAlbumRanking->fetch();
				$sqlAlbumRanking = $connect->query("SELECT TITRE FROM ALBUM WHERE ID_ALBUM = '".$idAlbumRanking["ID_ALBUM"]."'");
				$albumRanking = $sqlAlbumRanking->fetch();
			?>
			<a href="Track.php?ID_MUSIQUE=<?php echo $ranking[8]["ID_MUSIQUE"];?>">
				<div class="rankCoverArtistTrack">	
					<div class="rank">9</div>
					<img class="rankCover" src="<?php echo $ranking[8]["PHOTO_MUSIQUE"];?>" width="65">
					<div class="rankArtistTrack">
						<div class="rankArtist"><?php echo $authRanking["PSEUDO"];?></div>
						<div class="rankTrack"><?php echo $ranking[8]["TITRE"];?></div>
					</div>
				</div>
			</a>
			
			<div class="rankAblum">
				<a href="Album.php?ID_ALBUM=<?php echo $idAlbumRanking["ID_ALBUM"];?>">		
					<?php echo $albumRanking["TITRE"];?>
				</a>
			</div>
			
			<div class="rankStats">
				<div class="rankFalaMarkicon">F</div>
				<div class="rankFalaMark"><?php echo $ranking[8]["NOMBRE_ECOUTE"];?></div>
			</div>
		</div>
		<hr>
		<div class="rankList">
			<?php
				$sqlIdAuthRanking = $connect->query("SELECT ID_USERS FROM CREATION_MUSIQUE WHERE ID_MUSIQUE = '".$ranking[9]["ID_MUSIQUE"]."'");
				$idAuthRanking = $sqlIdAuthRanking->fetch();
				$sqlAuthRanking = $connect->query("SELECT PSEUDO FROM USERS WHERE ID_USERS = '".$idAuthRanking["ID_USERS"]."'");
				$authRanking = $sqlAuthRanking->fetch();
				$sqlIdAlbumRanking = $connect->query("SELECT ID_ALBUM FROM APPARTIENT WHERE ID_MUSIQUE = '".$ranking[9]["ID_MUSIQUE"]."'");
				$idAlbumRanking = $sqlIdAlbumRanking->fetch();
				$sqlAlbumRanking = $connect->query("SELECT TITRE FROM ALBUM WHERE ID_ALBUM = '".$idAlbumRanking["ID_ALBUM"]."'");
				$albumRanking = $sqlAlbumRanking->fetch();
			?>
			<a href="Track.php?ID_MUSIQUE=<?php echo $ranking[9]["ID_MUSIQUE"];?>">
				<div class="rankCoverArtistTrack">	
					<div class="rank">10</div>
					<img class="rankCover" src="<?php echo $ranking[9]["PHOTO_MUSIQUE"];?>" width="65">
					<div class="rankArtistTrack">
						<div class="rankArtist"><?php echo $authRanking["PSEUDO"];?></div>
						<div class="rankTrack"><?php echo $ranking[9]["TITRE"];?></div>
					</div>
				</div>
			</a>
			
			<div class="rankAblum">
				<a href="Album.php?ID_ALBUM=<?php echo $idAlbumRanking["ID_ALBUM"];?>">		
					<?php echo $albumRanking["TITRE"];?>
				</a>
			</div>
			
			<div class="rankStats">
				<div class="rankFalaMarkicon">F</div>
				<div class="rankFalaMark"><?php echo $ranking[9]["NOMBRE_ECOUTE"];?></div>
			</div>
		</div>
		<a href="RANKING.php">
			<button class="buttonLargeBl">SHOW MORE</button>
		</a>		
	</div>
				

	<?php
		require("footer.php"); 
	?>

</body>
</html>