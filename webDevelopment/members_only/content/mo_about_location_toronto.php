<?php
ini_set('display_errors', 'On');
// 	Program: 	mo_about_location_toronto.php
//	Description: 	About the Academy, created Dec 10, 2017
//	Author:		David M. Cvet
//
//	2019 ------------------
//	jan 25:	standardized path names
//
$lang = "en";
$modal = 0;					// no need for modal popups as there are no database operations in this script
$lang_num = 0;
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories
$current_pgm = "mo_about_location_toronto.php";
$menu_selected = "AEMMA";

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
// begin check if the browser is still in session with DBLogin
$check_session = $path_members."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $path_members."config/config.php"; include "$config";
$config_about = $path_members."config/content_mo_about_location_toronto_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main_content -->
	<div id="main_content_mo">
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
main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
