<?php
	session_start();

	if (isset($_SESSION['Pass']) && !empty($_SESSION['Pass']) && $_SESSION['Pass'] == 1812) {

?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			require('storeHeader.php');
		?>
		<section id="headSectionStore">
			<div id="headSectionContentSwipe">
				<div id="headSectionContent">
					<span>
						<img width="260px" src="assetsShop/img/FalaBranding.png">
					</span>
					<br>
					<h2>
						LOOKBOOK<br><br>
						CAPSULE SS21
					</h2>
					
				</div>
					<a href="#newsSectionStore">
						<div class="swipeContent">
							<div>DOWN</div>
							<div class="lineSwipe"></div>
						</div>
					</a>
				
			</div>
		</section>
		<section id="newsSectionStore">
			<div id="contentNewsLeft">
				<div id="newsLeftContentText">
					<h2 style="width: 300px; min-width: 150px;">CAPSULE SS21</h2>
				</div>
				<img id="newsLeftPicture" src="assetsShop/img/lookBook/test/2.png">

			</div>
			<div id="contentNewsRight">
				<div>
					<img id="contentNewsRightPicture" src="assetsShop/img/lookBook/test/3.png">
				</div>
				<div id="newsRightButtonsContener">
					<span id="newsRightTwoButton">
						<a href="items.php">
							<button class="buttonLittleBlack" id="buttonLargeLookB">ACHETER</button>
						</a>
					</span>
				</div>
			</div>
		</section>
		<section id="SectionLookBook2">
				<img id="SectionLookBook2LeftPicture" src="assetsShop/img/lookBook/test/2.png">
				<img id="SectionLookBook2WidePicture" src="assetsShop/img/lookBook/test/3.png">
		</section>
		<section id="SectionLookBook3">
			<div id="LineLB3Content">
				<img id="SectionLookBook3OnePicture" class="LineLB3" src="assetsShop/img/lookBook/test/3.png">
				<img id="SectionLookBook3TwoWidePicture"class="LineLB3"  src="assetsShop/img/lookBook/test/2.png">
				</div>
				<img id="SectionLookBook3TreePicture"class="LineLB3"  src="assetsShop/img/lookBook/test/3.png">
			</div>

		</section>
		<div id="contentLastLBPic">
			<img id="SectionLookBook3FourPicture"class="LineLB3"  src="assetsShop/img/lookBook/test/3.png">
		</div>
		<?php
			require('storeFooter.php');
		?>
	</body>
</html> 

<?php
	}else{
		header('location:storePass.php');
	}
