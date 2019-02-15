<?php
ini_set('display_errors', 'On');
// 	Program: 	about_rules.php
//	Description: 	Rules of the salle d'armes, created April 23, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
$lang = "en";
$modal = 0;					// no need for modal popups as there are no database operations in this script
$lang_num = 0;
$members_only_path = "../";			// the location of the members only scripts and files with respect to this calling script
$dbase_path = $path = "../database/";		// the location of the database scripts and files with respect to this calling script
$current_pgm = "about_rules.php";
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
$config_about = $members_only_path."config/content_about_rules_$lang.php"; include "$config_about";
$header = $members_only_path."php-bin/members_only_header.php"; include "$header";
$header2 = $members_only_path."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
		</div>
		<p><?=$rules_intro[$lang_num]?></p>
		<ul style="list-style-type:upper-roman;line-height:1.4;">
			<li style="margin-bottom: 10px;"><?=$rules_l1[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l2[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l3[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l4[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l5[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l6[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l7[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l8[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l9[$lang_num]?></li>
		</ul>
		<div style="float:right;"><?=$rules_p1[$lang_num]?><br />&nbsp;</div>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
