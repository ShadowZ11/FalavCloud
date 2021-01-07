<?php
			
	require_once("functions.php");		
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;

	$connect = connectFalaDB();
	$sqlSearchNews = $connect->query("SELECT ID_NEWS, ID_USERS FROM NEWS ORDER BY DATE_NEWS DESC");
	$searchNews = $sqlSearchNews->fetchAll();
?>
	
<div class="listOfNews">
<?php
	for ($i=0; isset($searchNews[$i]['ID_NEWS']) && 3 >= $i ; $i++) { 
		$sqlInfoNewsResult = $connect->query("SELECT TITRE, PHOTO_PREVIEW, DATE_NEWS, ID_USERS FROM NEWS WHERE ID_NEWS ='".$searchNews[$i]['ID_NEWS']."'");
		$infoNewsResult = $sqlInfoNewsResult->fetch();
		$sqlAutNewsResult = $connect->query("SELECT PRENOM, NOM FROM USERS WHERE ID_USERS ='".$searchNews[$i]['ID_USERS']."'");
		$autNewsResult = $sqlAutNewsResult->fetch();
								?>
									<a href="News.php?ID_NEWS=<?php echo $searchNews[$i]['ID_NEWS']; ?>">
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
								if (isset($searchNews[$i]['ID_NEWS']) && !empty($searchNews[$i]['ID_NEWS'])) {
							?>	
								<button id="newsBehindButton" class="buttonLargeBl1" value="<?php echo $_POST["VERSION"];?>" onclick="showMoreNewsSearch()">MORE NEWS</button>
							<?php
								}
							?>