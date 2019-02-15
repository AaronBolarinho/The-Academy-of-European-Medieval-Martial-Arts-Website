<?php
// 	Program: 	archive_research_associate.php
//	Description: 	Archive of the AEMMA research associate listing, created July 9, 2016
//	Author:		David M. Cvet
//
//	2019 ------------------
//	jan 25:	standardized path names
//
$lang = "en";
$lang_num = 0;
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories
$current_pgm = "archive_research_associate.php";
$menu_selected = "admin";

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $path_members."config/config.php"; include "$config";
$config_about = $path_members."config/content_archive_research_associate_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><img src="<?=$path_members?>images/icons/archive.png" alt="" style="vertical-align:middle;width:40px;" /> <img src="<?=$path_members?>images/icons/microscope.png" alt="" style="vertical-align:middle;width:40px;" />&nbsp;<?=$title[$lang_num]?></h2>
		<p><?=$gb_p1[$lang_num]?></p>
		<div>
<?php
include "misc/research_associate.htm";
?>

		</div>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
