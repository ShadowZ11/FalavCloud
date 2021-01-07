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
		<section id="listOfItems">
			<a href="items.php">
				<div class="oneItemOnList">
					<div class="contentItem">
						<img class="imgItemOnList" src="assetsShop/img/lookBook/test/3.png">
						<div class="infoItemOnList">
							T-Shirt LS400 BLANC ROSE<br>
							Edition limiter à 20 tirage
						</div>
						<div class="priceItemOnList">35€</div>
					</div>
				</div>
			</a>
			<a href="items.php">
				<div class="oneItemOnList">
					<div class="contentItem">
						<img class="imgItemOnList" src="assetsShop/img/lookBook/test/3.png">
						<div class="infoItemOnList">
							T-Shirt LS400 BLANC ROSE<br>
							Edition limiter à 20 tirage
						</div>
						<div class="priceItemOnList">35€</div>
					</div>
				</div>
			</a>
			<a href="items.php">
				<div class="oneItemOnList">
					<div class="contentItem">
						<img class="imgItemOnList" src="assetsShop/img/lookBook/test/3.png">
						<div class="infoItemOnList">
							T-Shirt LS400 BLANC ROSE<br>
							Edition limiter à 20 tirage
						</div>
						<div class="priceItemOnList">35€</div>
					</div>
				</div>
			</a>
			<a href="items.php">
				<div class="oneItemOnList">
					<div class="contentItem">
						<img class="imgItemOnList" src="assetsShop/img/lookBook/test/3.png">
						<div class="infoItemOnList">
							T-Shirt LS400 BLANC ROSE<br>
							Edition limiter à 20 tirage
						</div>
						<div class="priceItemOnList">35€</div>
					</div>
				</div>
			</a>
			<a href="items.php">
				<div class="oneItemOnList">
					<div class="contentItem">
						<img class="imgItemOnList" src="assetsShop/img/lookBook/test/3.png">
						<div class="infoItemOnList">
							T-Shirt LS400 BLANC ROSE<br>
							Edition limiter à 20 tirage
						</div>
						<div class="priceItemOnList">35€</div>
					</div>
				</div>
			</a>
			<a href="items.php">
				<div class="oneItemOnList">
					<div class="contentItem">
						<img class="imgItemOnList" src="assetsShop/img/lookBook/test/3.png">
						<div class="infoItemOnList">
							T-Shirt LS400 BLANC ROSE<br>
							Edition limiter à 20 tirage
						</div>
						<div class="priceItemOnList">35€</div>
					</div>
				</div>
			</a>
			<a href="items.php">
				<div class="oneItemOnList">
					<div class="contentItem">
						<img class="imgItemOnList" src="assetsShop/img/lookBook/test/3.png">
						<div class="infoItemOnList">
							T-Shirt LS400 BLANC ROSE<br>
							Edition limiter à 20 tirage
						</div>
						<div class="priceItemOnList">35€</div>
					</div>
				</div>
			</a>
			<a href="items.php">
				<div class="oneItemOnList">
					<div class="contentItem">
						<img class="imgItemOnList" src="assetsShop/img/lookBook/test/3.png">
						<div class="infoItemOnList">
							T-Shirt LS400 BLANC ROSE<br>
							Edition limiter à 20 tirage
						</div>
						<div class="priceItemOnList">35€</div>
					</div>
				</div>
			</a>
			<a href="items.php">
				<div class="oneItemOnList">
					<div class="contentItem">
						<img class="imgItemOnList" src="assetsShop/img/lookBook/test/3.png">
						<div class="infoItemOnList">
							T-Shirt LS400 BLANC ROSE<br>
							Edition limiter à 20 tirage
						</div>
						<div class="priceItemOnList">35€</div>
					</div>
				</div>
			</a>
			<a href="items.php">
				<div class="oneItemOnList">
					<div class="contentItem">
						<img class="imgItemOnList" src="assetsShop/img/lookBook/test/3.png">
						<div class="infoItemOnList">
							T-Shirt LS400 BLANC ROSE<br>
							Edition limiter à 20 tirage
						</div>
						<div class="priceItemOnList">35€</div>
					</div>
				</div>
			</a>
			<a href="items.php">
				<div class="oneItemOnList">
					<div class="contentItem">
						<img class="imgItemOnList" src="assetsShop/img/lookBook/test/3.png">
						<div class="infoItemOnList">
							T-Shirt LS400 BLANC ROSE<br>
							Edition limiter à 20 tirage
						</div>
						<div class="priceItemOnList">35€</div>
					</div>
				</div>
			</a>
			<a href="items.php">
				<div class="oneItemOnList">
					<div class="contentItem">
						<img class="imgItemOnList" src="assetsShop/img/lookBook/test/3.png">
						<div class="infoItemOnList">
							T-Shirt LS400 BLANC ROSE<br>
							Edition limiter à 20 tirage
						</div>
						<div class="priceItemOnList">35€</div>
					</div>
				</div>
			</a>
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
