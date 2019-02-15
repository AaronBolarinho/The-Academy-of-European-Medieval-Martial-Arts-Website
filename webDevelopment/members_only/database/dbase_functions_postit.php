<?php
ini_set('display_errors','On');
//
// Program: dbase_functions_postit.php
// Author: David M. Cvet
// Created: Nov 20, 2016
// Description:
//	This script will present the contents of the Post_it table in the database. This will allow the user to modify the post-it note, enable it or disable it
//---------------------------
// Updates:
//	2019 ------------------
//	jan 25:	standardized path names
//
$PHP_string = "";
$php_string_set = 0;
if (isset($_GET['MOD']))  { $modal = $_GET['MOD']; if ($php_string_set) { $PHP_string .= "&MOD=".$modal; }} else { $modal = 0; } //determine if a modal popup is to appear upon invokation of this script

// begin set database and members only library paths
$aims = 1;					// flag to indicate that we are now in the AIMS database system, so the menu bar needs to be expanded by the AIMS menu item
$lang = "en";
$lang_num = 0;
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories calling script
$menu_selected = "AIMS";
$current_pgm = "dbase_functions_postit.php".$PHP_string;
$menu_selected = "AIMS";

// database connection related stuff
$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
// test to determine if the initial database login session remains intact or the session has timed out before attempting to connect with the database
$session_expiration = $path_members."php-bin/sub_check_session_expiration.php"; include "$session_expiration";
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";
// end database related stuff

include "config/config.php";
$config = $path_members."config/config.php"; include "$config";
include "config/AIMS_dbase_functions_postit_$lang.php";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$today= date("Y-m-d");
?>
<script type="text/javascript" src="js-bin/ResponsiveSlides.min.js"></script>
<script type="text/javascript" src="js-bin/main.js"></script>
<link rel="stylesheet" href="<?=$path_dbase?>css/modal_popups.css" type="text/css" media="all" title="modal" />
<?php
if ($modal) { echo ('<link rel="stylesheet" href="'.$path_dbase.'css/modal.css" type="text/css" media="all" title="modal" />'); }
?>
<script type="text/javascript" src="zebra_datepicker/js-bin/zebra_datepicker.js"></script>
<link rel="stylesheet" href="zebra_datepicker/css/metallic.css" type="text/css" />
<script type="text/javascript">
function enable_submit_postit_button() {
	document.Postit_Update_Form.submit_postit_button.disabled=false;
	}
</script>
  <script type="text/javascript">
	$(function () {
	// Slideshow
	$(".rslides1").responsiveSlides({
		// ** notes: default settings in ResponsiveSlides.min.js **
		//"auto": true, 		// Boolean: Animate automatically, true or false
		//"speed": 500, 		// Integer: Speed of the transition, in milliseconds
		//"timeout": 4000, 		// Integer: Time between slide transitions, in milliseconds
		//"pager": false, 		// Boolean: Show pager, true or false
		//"nav": false, 		// Boolean: Show navigation, true or false
		//"random": false, 		// Boolean: Randomize the order of the slides, true or false
		//"pause": false, 		// Boolean: Pause on hover, true or false
		//"pauseControls": true,	// Boolean: Pause when hovering controls, true or false
		//"prevText": "Previous", 	// String: Text for the "previous" button
		//"nextText": "Next", 		// String: Text for the "next" button
		//"maxwidth": "", 		// Integer: Max-width of the slideshow, in pixels
		//"navContainer": "", 		// Selector: Where auto generated controls should be appended to, default is after the <ul>
		//"manualControls": "", 	// Selector: Declare custom pager navigation
		//"namespace": "rslides", 	// String: change the default namespace used
		//"before": $.noop, 		// Function: Before callback
		//"after": $.noop 		// Function: After callback

		// ** revised settings
		speed: 2000,
		timeout: 7500,
		maxwidth: 550,
		random: true
		});
	});
  </script>
<?php
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
$LinkID=dbConnect($DB);

// begin retrieve post-it values
$SQL = 'SELECT Enabled, Announcement_en, Click_Statement_en, Announcement_fr, Click_Statement_fr, Date FROM Post_it';
$Result = mysqli_query($LinkID, $SQL);
if (mysqli_num_rows($Result) > 0) 
	{
	$Line = mysqli_fetch_object($Result);
	$postit_enabled 	= $Line->Enabled; 
	$postit_announcementEN	= $Line->Announcement_en; 
	$postit_clickEN 	= $Line->Click_Statement_en; 
	$postit_announcementFR	= $Line->Announcement_fr; 
	$postit_clickFR 	= $Line->Click_Statement_fr; 
	$postit_date		= $Line->Date; 
	$action			= "sub_update_postit.php";
	$button			= $button_update[$lang_num];
	}
else
	{
	$postit_enabled 	= 0;
	$postit_announcementEN	= ""; 
	$postit_clickEN 	= ""; 
	$postit_announcementFR	= ""; 
	$postit_clickFR 	= ""; 
	$postit_date		= $today; 
	$action			= "sub_create_postit.php";
	$button			= $button_create[$lang_num];
	}
// end retrieve post-it values


?>
	<!-- begin main content -->
	<div id="main_content_AIMS">
		<img src="images/1240x4_transparent.png" width="100%" alt="" />
<?php
echo ('<div class="report_banner box">'.$header_title_p1[$lang_num].'&nbsp;&nbsp;<img src="images/icons/hand_right_pointing.gif" alt="" style="vertical-align:middle;" />&nbsp;&nbsp;'.$header_title_p2[$lang_num].'</div>'); 
echo ("\n".'<form name="Postit_Update_Form" method="post" action="'.$action.'">');
echo ("\n\t".'<div class="postit_panel">');
echo ("\n\t\t".'<div class="postit_col1"><!-- begin left Post-it inputs column -->');
	echo ("\n\t\t\t".'<table border="0" align="center" style="width:100%;" cellpadding="0" cellspacing="2">');
	echo ("\n\t\t\t".'<tr>
				<td style="width:30%;" class="Label">Activate Post-it?</td>
				<td style="width:70%;"><input type="checkbox" name="PostitCheck" value="1" '. ($postit_enabled == 1 ? 'CHECKED' : '') .'  style="vertical-align:middle" onclick="enable_submit_postit_button()" /></td>');
	echo ("\n\t\t\t".'</tr><tr>
				<td style="width:30%;" class="Label">Announcement (EN):</td>
				<td style="width:70%;"><textarea name="AnnounceEN" rows="5" style="width:95%;" wrap="virtual" tabindex="2" oninput="enable_submit_postit_button()">'.$postit_announcementEN.'</textarea></td>');
	echo ("\n\t\t\t".'</tr><tr>
				<td style="width:30%;" class="Label">Link Statement (EN):</td>
				<td style="width:70%;"><textarea name="ClickEN" rows="5" style="width:95%;" wrap="virtual" tabindex="2" oninput="enable_submit_postit_button()">'.$postit_clickEN.'</textarea></td>');
	echo ("\n\t\t\t".'</tr></table>');
	echo ("\n\t\t".'</div>');
	
	echo ("\n\t\t".'<div class="postit_col2"><!-- begin right Post-it inputs column -->');
	echo ("\n\t\t\t".'<table border="0" align="center" style="width:100%;" cellpadding="0" cellspacing="2">');
	echo ("\n\t\t\t".'<tr>
				<td style="width:30%;" class="Label">Date:</td>
				<td style="width:70%;"><input type="text" name="PostitDate" data-zdp_first_day_of_week="0"  maxlength="10" size="6" placeholder="yyyy-mm-dd" value="'.$postit_date.'" id="PostitDate" onclick="enable_submit_postit_button()" /> <img src="../images/icons/event_icon.gif" alt="" style="vertical-align:middle" />
				<script type="text/javascript">$(\'#PostitDate\').Zebra_DatePicker();</script> yyyy-mm-dd</td>');
	echo ("\n\t\t\t".'</tr><tr>
				<td style="width:30%;" class="Label">Announcement (FR):</td>
				<td style="width:70%;"><textarea name="AnnounceFR" rows="5" style="width:95%;" wrap="virtual" tabindex="2" oninput="enable_submit_postit_button()">'.$postit_announcementFR.'</textarea></td>');
	echo ("\n\t\t\t".'</tr><tr>
				<td style="width:30%;" class="Label">Link Statement (FR):</td>
				<td style="width:70%;"><textarea name="ClickFR" rows="5" style="width:95%;" wrap="virtual" tabindex="2" oninput="enable_submit_postit_button()">'.$postit_clickFR.'</textarea></td>');
	echo ("\n\t\t\t".'</tr></table>');
	echo ("\n\t\t".'</div>');
	echo ("\n\t".'</div>');
	echo ("\n\t".'<div class="button_bar box" style="float:left;margin-left:5%;margin-bottom:15px;margin-top:3px;width:89%;"><input type="submit" class="button" value="'.$button.'" name="submit_postit_button" id="submit_postit_button" disabled="true" /> <input type="reset" class="button"  value="'.$button_clear[$lang_num].'" /></div>');
	echo ("\n".'</form>');
	echo ("\n\t".'</div><!-- end main_content -->'."\n");
//	<!-- being footer -->
	include "../php-bin/footer.php";
//	<!-- end footer
?>
</div><!-- container -->
</body></html>
