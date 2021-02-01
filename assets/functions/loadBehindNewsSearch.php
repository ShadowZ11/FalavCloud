<?php
			
	require_once("functions.php");		
	$_POST["version"]++;
	$_POST["version"]++;
	$_POST["version"]++;

	$connect = connectFalaDB();
	$sqlSearchNews = $connect->query("SELECT id_news, id_users FROM news ORDER BY date_news DESC");
	$searchNews = $sqlSearchNews->fetchAll();
?>
	
<div class="listOfNews">
<?php
	for ($i=0; isset($searchNews[$i]['id_news']) && 3 >= $i ; $i++) { 
		$sqlInfoNewsResult = $connect->query("SELECT titre, photo_preview, date_news, id_users FROM news WHERE id_news ='".$searchNews[$i]['id_news']."'");
		$infoNewsResult = $sqlInfoNewsResult->fetch();
		$sqlAutNewsResult = $connect->query("SELECT prenom, nom FROM users WHERE id_users ='".$searchNews[$i]['id_users']."'");
		$autNewsResult = $sqlAutNewsResult->fetch();
								?>
									<a href="News.php?ID_NEWS=<?php echo $searchNews[$i]['ID_NEWS']; ?>">
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
								if (isset($searchNews[$i]['id_news']) && !empty($searchNews[$i]['id_news'])) {
							?>	
								<button id="newsBehindButton" class="buttonLargeBl1" value="<?php echo $_POST["version"];?>" onclick="showMoreNewsSearch()">MORE NEWS</button>
							<?php
								}
							?>