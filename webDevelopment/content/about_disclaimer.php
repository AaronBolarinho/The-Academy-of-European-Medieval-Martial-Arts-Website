<?php
// 	Program: 	about_disclaimer.php
//	Description: 	About the Academy, created April 23, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
include "../config/content_about_disclaimer_$lang.php";
$current_pgm = "about_disclaimer.php";
$path = "../";
$menu_selected = "AEMMA";
include "../php-bin/header.php";
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;margin-bottom:10px;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
		</div>
		<h3><?=$disclaimer_title_p1[$lang_num]?></h3>
		<ul style="list-style-type: circle;"><?=$disclaimer_p1_1[$lang_num]?></ul>
		<h3><?=$disclaimer_title_p2[$lang_num]?></h3>
		<ul style="list-style-type: circle;"><?=$disclaimer_p2_1[$lang_num]?></ul>
		<h3><?=$disclaimer_title_p3[$lang_num]?></h3>
		<ul style="list-style-type: circle;"><?=$disclaimer_p3_1[$lang_num]?></ul>
		<h3><?=$disclaimer_title_p4[$lang_num]?></h3>
		<ul style="list-style-type: circle;"><?=$disclaimer_p4_1[$lang_num]?></ul>

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
