<?php
ini_set('display_errors', 'On');
// 	Program: 	mo_about_rules.php
//	Description: 	Rules of the salle d'armes, created April 23, 2016
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
$current_pgm = "mo_about_rules.php";
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
$config_about = $path_members."config/content_mo_about_rules_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main_content -->
	<div id="main_content_mo">
		<h2><?=$title[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;margin-right:15px;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
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
at:right;"><?=$rules_p1[$lang_num]?><br />&nbsp;</div>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
