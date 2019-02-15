<?php
// 	Program: 	res_gallery.php
//	Description: 	members' gallery divided into years.
//			Gallery based on code from TinyWebGallery 2.4
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
$current_pgm = "res_gallery.php";
$menu_selected = "resources";

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $path_members."config/config.php"; include "$config";
$config_about = $path_members."config/content_res_gallery_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
echo ('<script type="text/javascript" src="../js-bin/bio_Popup.js"></script>');
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin page content -->
	<div id="main_content" style="background-color:#f3f3f3;padding-left:0%;">
		<!-- begin iframe code for the gallery only -->
<!--		<iframe id="mainframe" name="mainframe" width="100%" scrolling="yes" frameborder="0" src="../twg23/index.php" ></iframe>-->
		<iframe id="mainframe" name="mainframe" class="iframe_stuff" scrolling="yes" frameborder="0" src="../twg/index.php" ></iframe>
<!--		<iframe id="mainframe" name="mainframe" class="iframe_stuff" scrolling="yes" frameborder="0" src="test_media.php" ></iframe>-->
<!--		<iframe id="mainframe" name="mainframe" style="background: #FFFFFF;" scrolling="yes" width="1180" height="600" frameborder="0" src="../twg23/index.php" ></iframe>-->
		<!-- end iframe code for the gallery only -->
	</div>
	<!-- end page content -->
	<!-- begin footer -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
