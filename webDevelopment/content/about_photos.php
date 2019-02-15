<?php
ini_set('display_errors', 'On');
// 	Program: 	about_photos.php
//	Description: 	photos of the Academy, created Jan 04, 2017
//	Author:		David M. Cvet
//
//	2016 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
include "../config/content_about_photos_$lang.php";
$current_pgm = "about_photos.php";
$path = "../";
$menu_selected = "AEMMA";
include "../php-bin/header.php";
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<p><?=$photos_p1[$lang_num]?></p>
		<div class="about_photos">
			<div class="about_photo_images"><img src="../images/facilities/<?=$photos_image1[$lang_num]?>" border="1" class="box" width="100%" alt="" /></div>
			<div class="about_photo_images"><img src="../images/facilities/<?=$photos_image2[$lang_num]?>" border="2" alt="" class="box" width="100%" /></div>
		</div>
		<div class="about_photos2">
			<div class="about_photo_images"><img src="../images/facilities/<?=$photos_image3[$lang_num]?>" border="1" alt="" class="box" width="100%" /></div>
			<div class="about_photo_images"><img src="../images/facilities/<?=$photos_image4[$lang_num]?>" border="2" alt="" class="box" width="100%" /></div>
		</div>
		<p><?=$photos_p2[$lang_num]?></p>

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
