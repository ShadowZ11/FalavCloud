<?php
	require_once("functions.php");
			
	$connect = connectFalaDB();

	$queryPrepared = $connect->query("SELECT ID_NEWS,ID_USERS  FROM NEWS WHERE CONTENU OR TITRE LIKE '%".$_POST['keyWord']."%'");
	$resultSearch = $queryPrepared->fetchAll();
?>
<div  id="listOfNews" class="listOfNews">
	<?php
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
		<button id="newsSearchButton" class="buttonLargeBl" value="16" onclick="showMoreNewsSearch()">MORE NEWS</button>
	<?php
	}
?>
							

	
		