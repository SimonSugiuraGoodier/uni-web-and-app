<?php
session_start();
// slightly modified form the php lecture 3 slides 

# read background image
$image = imagecreatefrompng("/home/sg4562y/public_html/captcha_background.png"); //http://www.wymdonline.org/gallery/zp-core/images/


# randomise colour for text
$red = rand(80,130);
$green = rand(80,130);
$blue = 320 - $red - $green;
$textColour = ImageColorAllocate($image, $red, $green, $blue);

# randomly select character array
$characters = array('a','b','c','d','e','f','g','h','j','k','m','n','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','T','U','V','W','X','Y','Z','2','3','4','6','7','8','9');
shuffle($characters);
$captchaCode = $characters[0];
for ($i=1; $i<5; $i++) $captchaCode .= ' ' . $characters[$i];
//https:stackoverflow.com/questions/2109325/how-to-strip-all-spaces-out-of-a-string-in-php  changed varibles to fit
$captcha = str_replace(' ', '', $captchaCode); 
$_SESSION["captcha"]=$captcha; 
# Edit and output the image
$x = rand(3,18);
$y = rand(3,18);
ImageString($image, 5, $x, $y, $captchaCode, $textColour);
$zoomedImage = imagecreatetruecolor(200, 80);
imagecopyresized ($zoomedImage, $image, 0, 0, 0, 0, 200, 80, 100, 40);
// get hte image 
header("Content-Type: image/jpeg");
Imagejpeg($zoomedImage, NULL, 8);
ImageDestroy($image);
ImageDestroy($zoomedImage);
?>
