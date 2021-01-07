<?php
			
	require_once("functions.php");		
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
	$_POST["VERSION"]++;
?>
<div  id="listOfNews" class="listOfNews">
			<?php
				$connect = connectFalaDB();

				$queryPrepared = $connect->query("SELECT ID_NEWS,ID_USERS  FROM NEWS ORDER BY DATE_NEWS DESC");
				$resultSearch = $queryPrepared->fetchAll();
				
				for ($i=0; isset($resultSearch[$i]['ID_NEWS']) >= $i  ; $i++) { 
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
			<button id="newsSearchButton" class="buttonLargeBl" value="<?php echo $_POST["VERSION"];?>" onclick="showMoreNews()">MORE NEWS</button>
			<?php
		}
		?>