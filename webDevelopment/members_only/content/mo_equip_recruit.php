<?php
//  Program:  mo_equip_recruit.php
//  Description:  A presentation of the required and standard equipment for the rank of recruit, created July 12, 2017
//  Author:   David M. Cvet
//
//  2019 ------------------
//  jan 25: standardized path names
//
$lang = "en";
$modal = 0;         // no need for modal popups as there are no database operations in this script
$lang_num = 0;
$path_members   = "../";            // the location of the members only scripts and files with respect to this calling script
$path_dbase   = $path_members."database/";  // the location of the database scripts and files with respect to this calling script
$path_root    = "../../";           // the root location of the directories
$current_pgm = "mo_equip_recruit.php";
$menu_selected = "training";
$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";

session_start();
// begin check if the browser is still in session with DBLogin
$check_session = $path_members."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $path_members."config/config.php"; include "$config";
$config_about = $path_members."config/content_mo_equip_recruit_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
$num = rand(1,3);
?>

<?php
 //include CSS Style Sheet
 echo "<link rel='stylesheet' type='text/css' href='../css/RecruitEquipment.css' />";
?>

	<!-- begin main_content -->
	<iframe src="http://localhost:3000/RecruitEquipment" width="100%" height="2000px" class="frameSize" scrolling="no" style="overflow:hidden;"/>

	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
