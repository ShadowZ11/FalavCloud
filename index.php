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
									$sqlAuthNews = $connect->query("SELECT nom, prenom FROM users WHERE id_user = '".$news[0]['id_users']."'");
									$authNews = $sqlAuthNews->fetch();
								?>
								<div >Par <?php echo $authNews['PRENOM'].'&nbsp;'. $authNews['NOM'];?></div>&nbsp;<div class="DateNews">| <?php echo $news[0]["DATE_NEWS"];?></div>
							</div>
							<div id="headBigNews">
							</div>
						</div>
					</div>
				</a>
			</div>
				</div>
					</div>


	<?php
		require("footer.php");
	?>

</body>
</html>
