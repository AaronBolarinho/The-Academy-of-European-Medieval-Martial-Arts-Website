<?php
function getRandomWord($len = 5) {
    $word = array_merge(range('0', '9'), range('A', 'Z'), range('a', 'z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}

$ranStr = getRandomWord();

// set cookies for this session
$cookie_ranStr = $ranStr;
setcookie("cookie_ranStr", "$cookie_ranStr", time() + (300), "/"); // 86400 = 1 day
// end cookies for this session


$height = 37; //CAPTCHA image height
$width = 125; //CAPTCHA image width
$font_size = 24; 

$image_p = imagecreate($width, $height);
$graybg = imagecolorallocate($image_p, 229, 228, 226);	// background colour for captcha image generated box (RGB)
$textcolor = imagecolorallocate($image_p, 34, 34, 34);

imagefttext($image_p, $font_size, -2, 15, 26, $textcolor, 'fonts/mono.ttf', $ranStr);
//imagestring($image_p, $font_size, 5, 3, $ranStr, $white);
imagepng($image_p);

	
?>
