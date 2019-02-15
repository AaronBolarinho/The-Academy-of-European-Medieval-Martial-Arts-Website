<?php
ini_set('display_errors', 'On');
// 	Program: 	about_location.php
//	Description: 	About the Academy, created Jan 04, 2017
//	Author:		David M. Cvet
//
//	2016 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
include "../config/content_about_location_$lang.php";
$current_pgm = "about_location.php";
$path = "../";
$menu_selected = "AEMMA";
include "../php-bin/header.php";
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<div class="about_image_arms" style="float:right;margin-left:15px;">
			<div style="float:left;margin-bottom:10px;"><img src="../images/coatofarms/armorialBearings_CHA_230.jpg" alt="" width="100%"  /></div>
		</div>
		<p><?=$location_p1[$lang_num]?></p>
		<h4><?=$title_p1[$lang_num]?></h4>
		<ul>
		<?=$location_1_l1[$lang_num]?>
		<?=$location_1_l2[$lang_num]?>
		<div class="ttcmap">
			<div style="float:left;margin-bottom:10px;"><a href="../images/facilities/<?=$ttcguide[$lang_num]?>" target="_blank"><img src="../images/facilities/<?=$ttcmap[$lang_num]?>" alt="" title="<?=$ttcmap_caption[$lang_num]?>" width="100%" class="box fade"  /></a></div>
			<div style="float:left;" class="caption"><?=$ttcmap_caption[$lang_num]?></div>
		</div>
		<?=$location_1_l3[$lang_num]?>
		<?=$location_1_l4[$lang_num]?>
		<?=$location_1_l5[$lang_num]?>
		</ul>

		<h4><?=$title_p2[$lang_num]?></h4>
		<ul>
		<?=$location_2_l1[$lang_num]?>
		<?=$location_2_l2[$lang_num]?>
		<?=$location_2_l3[$lang_num]?>
		<?=$location_2_l4[$lang_num]?>
		<?=$location_2_l5[$lang_num]?>
		<?=$location_2_l6[$lang_num]?>
		</ul>
		<div style="float:left;width:80%;margin-left:10%;margin-right:10%;">
			<div style="margin-bottom:25px;"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2426.7879191380475!2d-79.4317772947796!3d43.66993772942109!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b34639c563297%3A0x72223dde5e1ba4b8!2s927+Dupont+St%2C+Toronto%2C+ON+M6H+1Z1!5e0!3m2!1sen!2sca!4v1483531608004" width="100%" height="450" frameborder="0" style="border:0" class="box" allowfullscreen></iframe></div>
		</div>
		<h4><?=$title_p3[$lang_num]?></h4>
		<ul>
		<?=$location_3_l1[$lang_num]?>
		<?=$location_3_l2[$lang_num]?>
		<?=$location_3_l3[$lang_num]?>
		</ul>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
