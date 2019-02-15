<?php
ini_set('display_errors','On');
//
// Program: rep_armigerous_members.php
// Author: David M. Cvet
// Created: November 10, 2016
// Description:
//	Generates an SQL statement for extracting all members who are armigerous
//	and uses an external subroutine to generate online report record lines (sub_table_armigerous_rows.php).
//---------------------------
// Updates:
//	2016 ----------
//
$aims = 1;			// flag to indicate that we are now in the AIMS database system, so the menu bar needs to be expanded by the AIMS menu item
$lang = "en";
$lang_num = 0;
$modal = 0;			// disable the modal code in members_only_header2.php as no modals needed for this script
$members_only_path = "../";	// the location of the members only scripts and files with respect to this calling script
$dbase_path = "";				// the location of the database scripts and files with respect to this calling script
$current_pgm = "rep_armigerous_members.php";
$menu_selected = "AIMS";
$full_date= date("F j, Y");
$state = "";

$ss_path = $dbase_path."ss_path.stuff"; include "$ss_path";
$db_path = $dbase_path."DB.php"; include "$db_path";
session_start();
// test to determine if the initial database login session remains intact or the session has timed out before attempting to connect with the database
$session_expiration = $members_only_path."php-bin/sub_check_session_expiration.php"; include "$session_expiration";

//$idvalid = $dbase_path."IDValid.php"; include_once "$idvalid";
$retrieve = $members_only_path."php-bin/retrieve_cookies.php"; include "$retrieve";
include "config/config.php";
$config = $members_only_path."config/config.php"; include "$config";
$login_AIMS = $dbase_path."config/AIMS_rep_armigerous_members_$lang.php"; include "$login_AIMS";
$header = $members_only_path."php-bin/members_only_header.php"; include "$header";
echo ('<script type="text/javascript" src="../../js-bin/beep.js"></script>');
?>
  <script type="text/javascript" src="js-bin/jquery.min_v1.9.1.js"></script>
  <script type="text/javascript" src="js-bin/ResponsiveSlides.min.js"></script>
  <script type="text/javascript" src="js-bin/main.js"></script>
  <script>
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
$header2 = $members_only_path."php-bin/members_only_header2.php"; include "$header2";
$status_passed = 0;
$table_width = "80%";
?>
	<!-- begin main content -->
	<div id="main_content">
		<img src="images/1240x4_transparent.png" width="100%" alt="" />
		<div class="database_image">
			<div style="float:left;width:100%;">			
				<ul class="rslides rslides1">
      				<li><img src="images/icons/database_opened_1.png" alt="" /></li>
      				<li><img src="images/icons/database_opened_2.png" alt="" /></li>
     				<li><img src="images/icons/database_opened_3.png" alt="" /></li>
     				</ul>
			</div>
			<div style="float:left;width:100%;margin-top:8px;text-align:center;"><span class="caption"><b>GIMS (<span style="color:green;">connected</span>)</b></span></div>
		</div>
		<h3><?=$title[$lang_num]?></h3>
		<p><?=$p1[$lang_num]?></p>
		<div align="center"><table style="width:70%;background-color:purple;border-radius:10px;" class="box">
		<tr>
			<td><table cellpadding="3" style="width:100%;background-color:white;border-radius:10px;">
			<tr>
<?php
echo ('				<td colspan="3" style="background-color:#b1b1b1;border-top-left-radius:10px;border-top-right-radius:10px;" align="center"><b>Report: All records of armigerous members regardless of status as of: '.$full_date.'</b></td>');
?>	
			</tr>
			<tr>
				<td style="background-color:purple;"><font color="white"><b>&nbsp;Mem.Num.</b></font></td>
				<td style="background-color:purple;"><font color="white"><b>&nbsp;Name ( as recorded in the Armoury )</b></font></td>
				<td style="background-color:purple;"><font color="white"><b>&nbsp;Arms</b></font></td>
			</tr>
<?php
	// select the records from the database which satisfy the rank requested, and that have a status of active/sustaining/honorary
	$LinkID=dbConnect($DB);
	$record_count = 0;
	$tab = 7;		// ensures that the armigerous tab is displayed as the default
	$SQL  = 'SELECT M.Member_Number, M.Member_ID, A.Member_ID, A.Armoury_name, A.Arms_URL, A.Arms_file_100, A.Arms_file_350, A.Armoury_letter, S.Status_ID, S.Member_ID ';
	$SQL .= 'FROM Members_Armigerous A, Members M, Members_Status S';
	$SQL .= ' WHERE M.Member_ID = A.Member_ID AND A.Member_ID = S.Member_ID';
	$SQL .= ' ORDER BY Armoury_name ';
//echo ('debug:rep_active_members.php:102:SQL="'.$SQL.'"');exit;
	$Result = mysqli_query($LinkID, $SQL);
	while ($Line_A = mysqli_fetch_object($Result)) {
		$member_ID	= $Line_A->Member_ID;
		$member_number	= $Line_A->Member_Number;
		$status_ID	= $Line_A->Status_ID;
		// determine the colour of the row dependent upon status
		include 'sub_members_list_statuses.php';
		include "sub_table_armigerous_rows.php";
		$record_count++;
		}
	dbClose($LinkID);
echo ('<tr><td colspan="3" style="background-color:purple;color:white;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">&nbsp;<b>Total number of records retrieved: '.$record_count.'</b>&nbsp;</td></tr>');
echo ('</table></td></tr></table></div><br /></div>');

//	<!-- being footer -->
	include "../php-bin/footer.php";
//	<!-- end footer
?>
</div><!-- container -->
</body></html>
