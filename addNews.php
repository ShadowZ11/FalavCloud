<?php
	session_start();
	if ($_SESSION["rang"] == 3) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Add News</title>
		<link rel="stylesheet" href="assets/styles/index.css">	
		<link href="assets/fonts/Storybook.ttf" rel="stylesheet" as="font" type="font/Storybook">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="shortcut icon" href="assets/icons/smallLogo.PNG">
	</head>
	<body>

		<?php
			require("header.php");
		?>

		<div id="backOfficeContener" class="content">
			<div id="backOfficeHead">
				<div class="headPersoPageBar2"></div>
				<div class="nextPrevTrack">
					<a href="usersManager.php">
						<img src="assets/icons/prevTrack.png" height="37px">
					</a>
					<div class="actualTrackAblum">
						<div class="actualTrack">AJOUTER UNE NEWS</div>
					</div>
					<a href="addAlbum.php">
						<img src="assets/icons/nextTrack.png" height="37px">
					</a>
				</div>
			</div>
				<form action="assets/functions/returnAddNews.php" method="POST" enctype="multipart/form-data" onsubmit="return checkForms()">
					<div class="backOfficeForm">	
						<span>
							<label for="newsTitle">Titre</label>
							<input class="input" type="text" id="newsTitle" name="newsTitle" placeholder="Titre de la News" required="required">
						</span>
						<span>
							<label for="newsImg">Image</label>
							<input class="input" name="newsImg" type="file" id="newsImg">
						</span>
						<label for="tagNews">Tag</label>
						<select class="input" id="newsTag" name="newsTag" placeholder="Choisir un tag">
							<option value="RAP">RAP</option>
							<option value="RAP FR">RAP FR</option>
							<option value="RAP US">RAP US</option>
							<option value="TRAP">TRAP</option>
							<option value="HOUSE">HOUSE</option>
							<option value="DRUM & BASS">DRUM & BASS</option>
							<option value="ELECTRO">ELECTRO</option>
							<option value="METAL">METAL</option>
							<option value="FUNK">FUNK</option>
							<option value="POP">POP</option>
						</select>
						<span>
							<label for="newsIntro">Introduction</label>
							<textarea class="inputLong" type="text" id="newsIntro" rows="4" name="newsIntro" placeholder="Introduction"></textarea>
						</span>
						<span>
							<label for="newsContent">Contenu</label>
							<textarea class="inputLong" type="text" id="newsContent" rows="40" name="newsContent" placeholder="Article (sans introduction)"></textarea>
						</span>
					</div>
				<input type="submit" value="VALIDER" id="backOfficeValide">
			</form>
			<script src="assets/functions/Javascript/addnews.js" charset="UTF-8"></script>
		</div>
					

		<?php
			require("footer.php"); 
		?>

	</body>
</html>
<?php
	}else{
		header("location:noAutho.php");
	}
?>