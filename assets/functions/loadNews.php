<?php
			
	require_once("functions.php");		
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;
?>
<div  id="listOfNews" class="listOfNews">
			<?php
				$connect = connectFalaDB();

				$queryPrepared = $connect->query("SELECT id_news,id_users  FROM news ORDER BY date_news DESC");
				$resultSearch = $queryPrepared->fetchAll();
				
				for ($i=0; isset($resultSearch[$i]['id_news']) >= $i  ; $i++) { 
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
						<img class="imgNewsApercu" width="100%" src="<?php echo $infoNewsResult['photo_preview']; ?>">
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
			<button id="newsSearchButton" class="buttonLargeBl" value="<?php echo $_POST["version"];?>" onclick="showMoreNews()">MORE NEWS</button>
			<?php
		}
		?>