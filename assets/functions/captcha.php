<?php
session_start();
		header("Content-Type: image/png");

		$charAuthorized = "abcdefghijklmnpqrstuvwxyz0123456789";
		$captcha = str_shuffle($charAuthorized);
		$captcha = substr($captcha, 0, rand(5,7));

		$_SESSION["captcha"] = $captcha;


	$image = imagecreate(228, 58);

	$back = imagecolorallocate($image, rand(150, 250),  rand(150, 250),  rand(150, 250));

	$listOfFonts = glob("../fonts/Roboto-Regular.ttf");


	$x = 20;

	for($i=0; $i < strlen($captcha); $i++){

		$colorFont[] = imagecolorallocate($image, rand(0, 100),  rand(0, 100),  rand(0, 100));

		imagettftext(
						$image, 
						rand(15,30), 
						rand(-40, 40), 
						$x, 
						rand(23, 40), 
						$colorFont[$i], 
						__DIR__."/".$listOfFonts[array_rand($listOfFonts)], 
						$captcha[$i]);


		$x += rand(35, 20);


	}
	$nbForm = rand(6, 8);
	for( $i=0 ; $i<$nbForm ; $i++){
		$form = rand(1, 3);

		switch ($form) {
			case 1:
				imagerectangle($image, rand(0,200), rand(0,100), rand(0,200),  rand(0,100), $colorFont[array_rand($colorFont)]);
				break;
			case 2:
				imageline($image, rand(0,200), rand(0,100), rand(0,100),  rand(0,100), $colorFont[array_rand($colorFont)]);
				break;
			default:
				imageellipse($image, rand(0,200), rand(0,100), rand(0,200),  rand(0,100), $colorFont[array_rand($colorFont)]);
				break;
		}

	}
	imagepng($image);