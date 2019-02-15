<?php
ini_set('display_errors','On');
//
// Program: rep_by_status.php
// Author: David M. Cvet
// Created: Nov 03, 2016
// Description:
//	Generates an SQL statement based on the selection criteria passed from the online reports listing
//	and uses an external subroutine to generate online report record lines (sub_table_rows.php).
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
$current_pgm = "AIMS_home_page.php";
$menu_selected = "AIMS";
$full_date= date("F j, Y");

$ss_path = $dbase_path."ss_path.stuff"; include "$ss_path";
$db_path = $dbase_path."DB.php"; include "$db_path";
session_start();
// test to determine if the initial database login session remains intact or the session has timed out before attempting to connect with the database
$session_expiration = $members_only_path."php-bin/sub_check_session_expiration.php"; include "$session_expiration";

//$idvalid = $dbase_path."IDValid.php"; include_once "$idvalid";
$retrieve = $members_only_path."php-bin/retrieve_cookies.php"; include "$retrieve";

if (isset($_GET['RNKID']))  { $rank_ID = $_GET['RNKID']; $current_pgm = "rep_active_members.php?RNKID=".$rank_ID;}
// begin: determine the security level (role ID) to determine what access privilege the user has on the databaser
$seclvl = $_SESSION['RoleID'];
if ($seclvl > 4)
	{$state = "Update";}
else	{$state = "Show"; }
// end: determine the security level (role ID) to determine what access privilege the user has on the databaser

include "config/config.php";
$config = $members_only_path."config/config.php"; include "$config";
$login_AIMS = $dbase_path."config/AIMS_rep_active_members_$lang.php"; include "$login_AIMS";
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
	<div id="main_content_AIMS">
		<img src="<?=$members_only_path?>images/1090x4_transparent.png" width="100%" alt="" />
		<div class="database_image">
			<div style="float:left;width:100%;">			
				<ul class="rslides rslides1">
      				<li><img src="images/icons/database_opened_1.png" alt="" /></li>
      				<li><img src="images/icons/database_opened_2.png" alt="" /></li>
     				<li><img src="images/icons/database_opened_3.png" alt="" /></li>
     				</ul>
			</div>
			<div style="float:left;width:100%;margin-top:8px;text-align:center;"><span class="caption"><b>AIMS (<span style="color:green;">connected</span>)</b></span></div>
		</div>
		<h3><?=$title[$lang_num]?></h3>
		<p><?=$p1[$lang_num]?></p>
		<div align="center"><table style="width:<?=$table_width?>;background-color:purple;border-style:solid;border-width:1px;border-color:gray;border-radius:15px;" class="box">
		<tr>
			<td><table width="100%" cellpadding="3" style="background-color:white;border-style:solid;border-width:1px;border-color:gray;border-radius:15px;">
			<tr>
<?php
echo ('				<td colspan="7" style="background-color:#b1b1b1;border-top-right-radius:15px;border-top-left-radius:15px;" align="center">'.$report_title[$lang_num].'</td>');
?>	
			</tr>
			<tr>
				<td style="background-color:purple;"><font color="white"><b>&nbsp;Mem.No.</b></font></td>
				<td style="background-color:purple;"><font color="white"><b>&nbsp;Full Name</b></font></td>
				<td style="background-color:purple;"><font color="white"><b>&nbsp;City/Town</b></font></td>
				<td style="background-color:purple;"><font color="white"><b>Prov</b></font></td>
				<td style="background-color:purple;"><font color="white"><b>&nbsp;Tel&nbsp;(H)&nbsp;&nbsp;&nbsp;</b></font></td>
				<td style="background-color:purple;"><font color="white"><b>&nbsp;Tel&nbsp;(M)&nbsp;&nbsp;&nbsp;</b></font></td>
				<td style="background-color:purple;"><font color="white"><b>&nbsp;Email</b></font></td>
			</tr>
<?php
	// select the records from the database which satisfy the rank requested, and that have a status of active/sustaining/honorary
	$LinkID=dbConnect($DB);
	$record_count = 0;
	$SQL = 'SELECT M.Member_ID, M.Salutation, M.FirstName, M.LastName, M.Postnominals, M.City, M.ProvState, M.NumHome, M.NumMobile, M.Email, R.Rank_ID, S.Status_ID FROM Members M, Members_Status S, Members_Rank R';
//	$SQL .= ' WHERE ( M.Member_ID = S.Member_ID AND (S.Status_ID = "AC" OR S.Status_ID = "SU" OR S.Status_ID = "HO") AND S.Current_Status = 1) AND (M.Member_ID = R.Member_ID AND R.Rank_ID = "'.$rank_ID.'") ';
	$SQL .= ' WHERE M.Member_ID = S.Member_ID AND (S.Status_ID = 1 OR S.Status_ID = 2) AND (M.Member_ID = R.Member_ID AND R.Rank_ID = '.$rank_ID.' AND R.Current_Status = 1) ';
	$SQL .= ' ORDER BY M.LastName ';
//echo ('debug:rep_active_members.php:102:SQL="'.$SQL.'"');exit;
	$Result = mysqli_query($LinkID, $SQL);
	while ($Line = mysqli_fetch_object($Result)) {
		$member_ID 	= $Line->Member_ID;
		$salutation	= $Line->Salutation;
		$firstName	= $Line->FirstName;
		$lastName	= $Line->LastName;
		$postnominals	= $Line->Postnominals;
		$city		= $Line->City;
		$prov		= $Line->ProvState;
		$numHome	= $Line->NumHome;
		$numMobile	= $Line->NumMobile;
		$email		= $Line->Email;
		$status_ID	= $Line->Status_ID;

		$full_name = $salutation."&nbsp;".$firstName."&nbsp;".$lastName;
		$record_count++;
		// since the status is an active status for this report, set the variables of sub_members_list_statuses.php to blank or defaults of the font to black for all active listings
		$cross = "";
		$record_status = "status = active";
		$colour = "black";
//		include 'sub_members_list_statuses.php';
		include "sub_table_rows.php";
		}
	dbClose($LinkID);
echo ('<tr><td colspan="7" style="background-color:purple;color:white;border-bottom-right-radius:15px;border-bottom-left-radius:15px;">&nbsp;<b>Total number of records retrieved: '.$record_count.'</b>&nbsp;</td></tr>');
echo ('</table></td></tr></table></div><br /></div>');

//	<!-- being footer -->
	include "../php-bin/footer.php";
//	<!-- end footer
?>
</div><!-- container -->
</body></html>
