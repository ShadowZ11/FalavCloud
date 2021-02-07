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

					$queryPrepared = $connect->query("SELECT id_news,id_users  FROM news ORDER BY date_news DESC");
					$resultSearch = $queryPrepared->fetchAll();
					
					for ($i=0; isset($resultSearch[$i]['id_news']) >= 15  ; $i++) { 
						$sqlInfoNewsResult = $connect->query("SELECT titre, photo_preview, date_news, id_users FROM news WHERE id_news ='".$resultSearch[$i]['id_news']."'");
						$infoNewsResult = $sqlInfoNewsResult->fetch();
						$sqlAutNewsResult = $connect->query("SELECT prenom, nom FROM users WHERE id_users ='".$resultSearch[$i]['id_users']."'");
						$autNewsResult = $sqlAutNewsResult->fetch();
				?>
					<a href="News.php?id_news=<?php echo $resultSearch[$i]['id_news']; ?>">
						<div class="searchNewsActu">
							<div>
								<div class="emptyTitre2">+</div>
								<div class="titreNewsApercu"><?php echo $infoNewsResult["titre"]; ?></div>
							</div>
						<div class="authorDateImgNewsApercu">
							<div class="authorDateNewsApercu">
								<div >Par <?php echo $autNewsResult["prenom"]."&nbsp;".$autNewsResult["nom"]; ?></div>&nbsp;<div class="DateNews">| <?php echo $infoNewsResult["date_news"]; ?></div>
								</div>
							
							</div>
						</div>
					</a>
				<?php
					}
				?>
			</div>
			<?php
			if (isset($resultSearch[$i]['id_news']) && !empty($resultSearch[$i]['id_news'])) {
			?>
				<button id="newsSearchButton" class="buttonLargeBl" value="16" onclick="showMoreNews()">MORE news</button>
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