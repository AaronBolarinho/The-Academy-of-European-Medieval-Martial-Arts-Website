<?php
ini_set('display_errors', 'On');
// 	Program: 	about_disclaimer.php
//	Description: 	About the Academy, created April 23, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
$lang = "en";
$modal = 0;					// no need for modal popups as there are no database operations in this script
$lang_num = 0;
$members_only_path = "../";			// the location of the members only scripts and files with respect to this calling script
$dbase_path = $path = "../database/";		// the location of the database scripts and files with respect to this calling script
$current_pgm = "about_disclaimer.php";
$menu_selected = "AEMMA";

$ss_path = $dbase_path."ss_path.stuff"; include "$ss_path";
$db_path = $dbase_path."DB.php"; include "$db_path";
session_start();
// begin check if the browser is still in session with DBLogin
$check_session = $members_only_path."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session
//$idvalid = $dbase_path."IDValid.php"; include_once "$idvalid";
$retrieve = $members_only_path."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $members_only_path."config/config.php"; include "$config";
$config_about = $members_only_path."config/content_about_disclaimer_$lang.php"; include "$config_about";
$header = $members_only_path."php-bin/members_only_header.php"; include "$header";
$header2 = $members_only_path."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;margin-bottom:10px;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
		</div>
		<p><?=$disclaimer_intro[$lang_num]?></p>
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
