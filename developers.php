<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Developers</title>
		<link rel="stylesheet" href="assets/styles/index.css">
		<link href="assets/fonts/Storybook.ttf" rel="stylesheet" as="font" type="font/Storybook">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="shortcut icon" href="assets/icons/smallLogo.PNG">
	</head>
	<body>

		<?php
			require("header.php");
			require("assets/functions/functions.php");

			$connect = connectFalaDB();

			$sqlDev1 = $connect->query("SELECT PRENOM, PHOTO, BIO, ID_USERS FROM USERS WHERE EMAIL ='ruisoares282@gmail.com'");
			$dev1 = $sqlDev1->fetch();

			$sqlDev2 = $connect->query("SELECT PRENOM, PHOTO, BIO, ID_USERS FROM USERS WHERE EMAIL ='manuboisset@gmail.com'");
			$dev2 = $sqlDev2->fetch();
		?>
		<div id="devContent">
			<div class="content">
				<div id="titleBigStorybook">Developers</div>
			</div>
		</div>
		<div id="devMargin" class="content">
			<div id="teamContent">
				<div class="oneDevContent">
					<a href="account1.php?ID_USERS=<?php echo $dev1['ID_USERS']; ?>">
						<img class="imageDev" src="
							<?php
								if (isset($dev1['PHOTO'])) {
									echo $dev1['PHOTO'];
								}
							?>	
						"><br>
					</a>
					<div>
						<div id="nameDev">
							<?php
								if (isset($dev1['PRENOM'])) {
									echo $dev1['PRENOM'];
								}
							?>	
						</div>
						<p>
							<b>Fondateur</b><br>
							<?php
								if (isset($dev1['BIO'])) {
									echo $dev1['BIO'];
								}
							?>	
						</p>
					</div>
				</div>
				<div class="oneDevContent">
					<a href="account1.php?ID_USERS=<?php echo $dev2['ID_USERS']; ?>">
						<img class="imageDev" src="
							<?php
								if (isset($dev2['PHOTO'])) {
									echo $dev2['PHOTO'];
								}
							?>	
						"><br>
					</a>
					<div>
						<div id="nameDev">
							<?php
								if (isset($dev2['PRENOM'])) {
									echo $dev2['PRENOM'];
								}
							?>	
						</div>
						<p>
							<b>Fondateur</b><br>
							<?php
								if (isset($dev2['BIO'])) {
									echo $dev2['BIO'];
								}
							?>	
						</p>
					</div>
				</div>
			</div>
		</div>
		<?php
			require("footer.php"); 
		?>
	</body>
</html>