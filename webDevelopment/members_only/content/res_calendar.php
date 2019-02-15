<?php
// 	Program: 	res_calendar.php
//	Description: 	AEMMA's calendar
//	Author:		David M. Cvet
//	Date:		Nov 07, 2016
//
//	2019 ------------------
//	jan 25:	standardized path names
//
$lang = "en";
$lang_num = 0;
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories
if (isset($_GET['MNU'])) { $menu_selected = "resources"; $current_pgm = "res_calendar.php?MNU=R";} else { $menu_selected = "AEMMA"; $current_pgm = "res_calendar.php";}

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $path_members."config/config.php"; include "$config";
$config_about = $path_members."config/content_res_calendar_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
echo ('<script type="text/javascript" src="../js-bin/bio_Popup.js"></script>');
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin page content -->
	<div id="main_content" style="background-color:#F5F5DC;padding-left:2%;">
		<h2><?=$title[$lang_num]?></h2>
		<p><?=$cal_p1[$lang_num]?></p>
		<div class="calendar box">
		<iframe src="http://www.google.com/calendar/embed?mode=WEEK&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=aemma.admin%40gmail.com&amp;color=%237A367A&amp;src=im9psvf1fvkbk8aq77n5t062b0%40group.calendar.google.com&amp;color=%23A32929&amp;src=qohn40e6e7tifetf8p9rc5nl3g%40group.calendar.google.com&amp;color=%235229A3&amp;src=kqkkla4opvhomd124o305477as%40group.calendar.google.com&amp;color=%23AB8B00&amp;src=easulg1smdgm7psv1ekfdubfl4%40group.calendar.google.com&amp;color=%230D7813&amp;src=9gqa6489vi6nkpkq4eju7kndj4%40group.calendar.google.com&amp;color=%232952A3&amp;src=en.canadian%23holiday%40group.v.calendar.google.com&amp;color=%232952A3&amp;ctz=America%2FToronto" style=" border-width:0 " width="800" height="600" frameborder="0" scrolling="no"></iframe>
		</div>
	</div>
	<!-- end page content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
oter -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
