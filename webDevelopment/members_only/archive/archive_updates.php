<?php
// 	Program: 	about_about.php
//	Description: 	Archive of the AEMMA website updates over the years from its beginning till 2013, created April 20, 2016
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
$current_pgm = "archive_updates.php";
$menu_selected = "admin";

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $path_members."config/config.php"; include "$config";
$config_about = $path_members."config/content_archive_updates_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
?>
<link rel="stylesheet" type="text/css" href="css/default_page.css" />
<script type="text/Javascript">
var picture_mediaBig
function beachball()
{
if (!picture_mediaBig || picture_mediaBig.closed)
	{
	// media window has not been opened - first invokation
	picture_mediaBig = window.open("video/webmercial.htm","mediaBig","toolbar=no,menubar=no,scrollbars=yes,height=460,width=440")
	}
else
	{
	// media window is opened somewhere, bring it into focus
	picture_mediaBig.focus()
	picture_mediaBig = window.open("video/webmercial.htm","mediaBig","toolbar=no,menubar=no,scrollbars=yes,height=460,width=440")
	}
} // end function beachball
</script>
<?php
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><img src="<?=$path_members?>images/icons/archive.png" alt="" style="vertical-align:middle;width:40px;" /> <img src="<?=$path_members?>images/icons/logs.png" alt="" style="vertical-align:middle;width:40px;" />&nbsp;<?=$title[$lang_num]?></h2>
		<p><?=$gb_p1[$lang_num]?></p>
		<div>
<?php
include "misc/updates.htm";
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
