<?php
	session_start();
	require("assets/functions/newsInfos.php");
	require("assets/functions/commentsInfos.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $infoNews['TITRE'];?></title>
		<link rel="stylesheet" href="assets/styles/index.css">
		<link href="assets/fonts/Storybook.ttf" rel="stylesheet" as="font" type="font/Storybook">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="shortcut icon" href="assets/icons/smallLogo.PNG">
	</head>
	<body>

		<?php
			require("header.php"); 
		?>
		
		<div id="titleBigNewsPage"><?php echo $infoNews['TITRE'];?></div>	
		<div class="authorDateNewsPage">
			<div >Par <?php echo $authNews['PRENOM'].'&nbsp;'.$authNews['NOM'];?></div>&nbsp;<div class="DateNews">| <?php echo $infoNews['DATE_NEWS'];?></div>
		</div>
		<div class="imgBarNewsPage">
			<div class="barNews"></div>
			<img class="imgNewsPage" src="<?php echo $infoNews['PHOTO_PREVIEW'];?>">
			<div class="barNews"></div>
		</div>

		<div class="contentNewsPage">
            <div id="realContentNews">
                <p>
                    <?php echo $infoNews['PREVIEW'];?>
                </p>
                <p>
                    <?php echo $infoNews['CONTENU'];?>
                </p>
            </div>
			<div class="comment">
				<div class="inputProfilComment">
					<?php
						if (isset($_SESSION["token"]) && !empty($_SESSION["id"])) {
							?>
						<img class="userPic" src="<?php echo $_SESSION["userPic"]; ?>" width="45px" height="45px" >
						<div id="commentForm" class="searchInputButton">
							<form id="commentForm" method="POST" action="assets/functions/comments.php?ID_NEWS=<?php echo $_GET["ID_NEWS"];?>">
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
            <div id="creativeCommonsContent">
                <img width="200" src="assets/icons/logo-creative-commons.png">
                <div id="textCreativeCommons">
                    Car nous croyons à la force du partage, reprennez gratuitement cet article en utilisant notre licence Creative Commons
                </div>
                <button onclick="creativeCommons()" class="buttonLargeBl">Reprendre cette article</button>
            </div>
            <div id="contenterExportCreativeCommons">
            </div>
            <script>
                function creativeCommons() {
                    const contenterExportCreativeCommons = document.getElementById("contenterExportCreativeCommons");
                    const realContentNews = document.getElementById("realContentNews");

                    contenterExportCreativeCommons.innerHTML = "<div id='contenterExportCreativeCommonsOn'>\n" +
                        "                    <div class='contentExportCreativeCommons'>\n" +
                        "                        <div class='headExportCreativeCommons'>\n" +
                        "                            <div class='titreExportCreativeCommons'>Reprenez de manier intégrale et fidèle notre article</div>\n" +
                        "                            <img class='logocreativecommons' width='200' src='assets/icons/logo-creative-commons.png'>\n" +
                        "                        </div>\n" +
                        "                        Car nous croyons à la force du partage, reprennez gratuitement cet article en utilisant notre licence Creative Commons\n" +
                        "                        <div class='textareaCreativeCommons'>\n" +
                        "                            <textarea class='inputLong' rows='6'>\n" +realContentNews.innerHTML+
                        "                                </p>\n" +
                        "                            </textarea>\n" +
                        "                        </div>\n" +
                        "                        <button onclick='hideCreativeCommons()' class='buttonLargeBl'>RETOUR</button>\n" +
                        "                    </div>\n" +
                        "                </div>";
                }

                function hideCreativeCommons() {
                    const contenterExportCreativeCommons = document.getElementById("contenterExportCreativeCommons");

                    contenterExportCreativeCommons.innerHTML = "";
                }
            </script>
		</div>
					

		<?php
			require("footer.php"); 
		?>

	</body>
</html>