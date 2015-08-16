<?php

//session_start();


$string = '';

/*
Random code to generate the captcha
*/
for ($i = 0; $i < 5; $i++) {
	$string .= chr(rand(97, 122));
}

// Create session to save the code generated
$_SESSION['rand_code'] = $string;

$dirCaptcha = '../assets/fonts/';

$image = imagecreatetruecolor(170, 60);
$black = imagecolorallocate($image, 0, 0, 0);
$color = imagecolorallocate($image, 200, 100, 90); 
$white = imagecolorallocate($image, 255, 255, 255);

imagefilledrectangle($image,0,0,399,99,$white);
imagettftext ($image, 30, 0, 10, 40, $color, $dirCaptcha."arial.ttf", $_SESSION['rand_code']);

header("Content-type: image/png");

imagepng($image);

?>