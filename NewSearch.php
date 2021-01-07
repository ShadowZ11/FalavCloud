<?php
	session_start();
	require("assets/functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>FALA - Actualité</title>
	<link rel="stylesheet" href="assets/styles/index.css">
	<link href="assets/fonts/Storybook.TTF" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="assets/icons/smallLogo.PNG">
	<script src="assets/functions/Javascript/loadNews.js" charset="utf-8"></script>
</head>
<body>

	<?php
		require("header.php"); 
	?>

	<div class="searchZone">
		<label class="labelInput" for="searchInput">Actualité, découverte...</label>
		<div class="searchInputButton">
			<input id="searchInput" type="search" name="searchBehind" placeholder=" track, album, artist">
			<button class="searchSubmite" onclick="displayNews()">SEARCH</button>
			<script src="assets/functions/Javascript/searchNews.js" charset="utf-8"></script>
		</div>
	</div>
	<div class="content">
		<div class="bigBloc">
			<div class="headBloc">
				<div class="nameBloc">NEWS</div>
				<div class="barBloc1"></div>
			</div>
			<div class="barBlocSearch2">
				<div id="keyWordSearch" class="keyWordSearch">Actualité</div>
			</div>
		</div>
		<div id="realContentNews">
			<div  id="listOfNews" class="listOfNews">
				<?php
					$connect = connectFalaDB();

					$queryPrepared = $connect->query("SELECT ID_NEWS,ID_USERS  FROM NEWS ORDER BY DATE_NEWS DESC");
					$resultSearch = $queryPrepared->fetchAll();
					
					for ($i=0; isset($resultSearch[$i]['ID_NEWS']) >= 15  ; $i++) { 
						$sqlInfoNewsResult = $connect->query("SELECT TITRE, PHOTO_PREVIEW, DATE_NEWS, ID_USERS FROM NEWS WHERE ID_NEWS ='".$resultSearch[$i]['ID_NEWS']."'");
						$infoNewsResult = $sqlInfoNewsResult->fetch();
						$sqlAutNewsResult = $connect->query("SELECT PRENOM, NOM FROM USERS WHERE ID_USERS ='".$resultSearch[$i]['ID_USERS']."'");
						$autNewsResult = $sqlAutNewsResult->fetch();
				?>
					<a href="News.php?ID_NEWS=<?php echo $resultSearch[$i]['ID_NEWS']; ?>">
						<div class="searchNewsActu">
							<div>
								<div class="emptyTitre2">+</div>
								<div class="titreNewsApercu"><?php echo $infoNewsResult["TITRE"]; ?></div>
							</div>
						<div class="authorDateImgNewsApercu">
							<div class="authorDateNewsApercu">
								<div >Par <?php echo $autNewsResult["PRENOM"]."&nbsp;".$autNewsResult["NOM"]; ?></div>&nbsp;<div class="DateNews">| <?php echo $infoNewsResult["DATE_NEWS"]; ?></div>
								</div>
							<img class="imgNewsApercu" width="100%" src="<?php echo $infoNewsResult['PHOTO_PREVIEW']; ?>">
							</div>
						</div>
					</a>
				<?php
					}
				?>
			</div>
			<?php
			if (isset($resultSearch[$i]['ID_NEWS']) && !empty($resultSearch[$i]['ID_NEWS'])) {
			?>
				<button id="newsSearchButton" class="buttonLargeBl" value="16" onclick="showMoreNews()">MORE NEWS</button>
				<?php
			}
			?>
		</div>
	</div>			

	<?php
		require("footer.php"); 
	?>

</body>
</html>