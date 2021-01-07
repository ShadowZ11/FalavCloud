<?php
	session_start();

	if (isset($_SESSION['Pass']) && !empty($_SESSION['Pass']) && $_SESSION['Pass'] == 1812) {

?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="https://kit.fontawesome.com/22f907c278.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php
			require('storeHeader.php');
		?>
		<section class="oneItem">
			<div id="itemLeftContent">
				<div class="headItem">	
					<h2 class="nameItem">T-Shirt LS400 BLANC ROSE SS21</h2>
					<div class="longLink">
						<a href="store.php">BRANDING</a>&nbsp;&nbsp;<img height="14px" src="assetsShop/icons/chevron.png"></i>&nbsp;&nbsp;<a href="allItems.php">CAPSULE SS21</a>&nbsp;&nbsp;<img height="14px" src="assetsShop/icons/chevron.png"></i>&nbsp;&nbsp;<a href="items.php">T-Shirt LS400 BLANC ROSE SS21</a>
					</div>
				</div>
				<div class="infoItem">
					T-Shirt LS400 BLANC ROSE SS21<br>
					Coupe standard<br>
					100% cotton<br>
					Lavage 30°c
				</div>

				<div class="priceItem">35€</div>
				<div class="buttonItemContent">
					<select class="buttonLittleBlack buttonLarge bt-Item bt-Size">
						<option>S</option>
						<option>M</option>
						<option>L</option>
						<option>XL</option>
					</select>
					<button class="buttonLittleBlack buttonLarge bt-Item">AJOUTER AU PANIER</button>
				</div>
			</div>
			<div class="contentImgItem">
				<div class="firtImgItemButton">
					<button class="buttonNextItem">
						<img width="36px" height="41px" src="assetsShop/icons/nextItemL.png">
					</button>
					<img class="imgItem firtImgItem" src="assetsShop/img/lookBook/test/2.png">
					<button class="buttonNextItem">
						<img width="36px" height="41px" src="assetsShop/icons/nextItemL.png">
					</button>
				</div>
				<img class="imgItem" src="assetsShop/img/lookBook/test/3.png">
			</div>
		</section>
		<?php
			require('storeFooter.php');
		?>
	</body>
</html> 

<?php
	}else{
		header('location:storePass.php');
	}
