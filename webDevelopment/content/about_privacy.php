<?php
// 	Program: 	about_privacy.php
//	Description: 	About the Academy, created April 23, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
include "../config/content_about_privacy_$lang.php";
$current_pgm = "about_privacy.php";
$path = "../";
$menu_selected = "AEMMA";
include "../php-bin/header.php";
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
		</div>
		<p><?=$privacy_p1[$lang_num]?></p>
		<p><?=$privacy_p2[$lang_num]?></p>
		<p><?=$privacy_p3[$lang_num]?></p>
		<ul style="list-style-type:square;line-height:1.4;">
			<li style="margin-bottom: 10px;"><?=$privacy_l1[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$privacy_l2[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$privacy_l3[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$privacy_l4[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$privacy_l5[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$privacy_l6[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$privacy_l7[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$privacy_l8[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$privacy_l9[$lang_num]?></li>
			<ol>
				<li><?=$privacy_l10[$lang_num]?></li>
				<li><?=$privacy_l11[$lang_num]?></li>
			</ol>
		</ul>
		<h3><?=$title_p4[$lang_num]?></h3>
		<p><?=$privacy_p4[$lang_num]?></p>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
