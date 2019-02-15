<?php
ini_set('display_errors','On');
//
// Program: rep_other_members.php
// Author: David M. Cvet
// Created: Oct 02, 2016
// Description:
//	Generates an SQL statement based on the selection criteria passed from the online reports listing
//	and uses an external subroutine to generate online report record lines (sub_table_rows.php).
//---------------------------
// Updates:
//	2016 ----------
//
$aims = 1;				// flag to indicate that we are now in the AIMS database system, so the menu bar needs to be expanded by the AIMS menu item
$lang = "en";
$lang_num = 0;
$modal = 0;				// disable the modal code in members_only_header2.php as no modals needed for this script
$members_only_path = "../";		// the location of the members only scripts and files with respect to this calling script
$dbase_path = "";			// the location of the database scripts and files with respect to this calling script
$menu_selected = "AIMS";
$full_date= date("F j, Y");
$state = "";

// begin set database and members only library paths
$ss_path = $dbase_path."ss_path.stuff"; include "$ss_path";
$db_path = $dbase_path."DB.php"; include "$db_path";
session_start();
// test to determine if the initial database login session remains intact or the session has timed out before attempting to connect with the database
$session_expiration = $members_only_path."php-bin/sub_check_session_expiration.php"; include "$session_expiration";
$retrieve = $members_only_path."php-bin/retrieve_cookies.php"; include "$retrieve";
// end setup database and members only library paths

// retrieve the PHP variables passed and initilize others in this script
if (isset($_GET['RNKID']))  { $rank_ID = $_GET['RNKID']; $current_pgm = "rep_other_members.php?RNKID=".$rank_ID;} else { $rank_ID = ""; }
if (isset($_GET['MEMSTAT']))  { $status_ID = $_GET['MEMSTAT']; $current_pgm = "rep_other_members.php?MEMSTAT=".$status_ID; } else { $status_ID = ""; }
if (isset($_GET['SX'])) { $gender = $_GET['SX']; $current_pgm = "rep_other_members.php?SX=".$gender; } else { $gender = ""; }
$status_description = "";
$table_width = "95%";
$cross = "";
$colour = "black";
$record_status = "";
// retrieve the full description of the status submitted
$LinkID=dbConnect($DB);
if ($status_ID)
	{
	$SQL_s = 'SELECT Status_Desc FROM Status ';
	$SQL_s .= ' WHERE Status_ID = "'.$status_ID.'"';
	$Result_s = mysqli_query($LinkID, $SQL_s);
	$Line_s = mysqli_fetch_object($Result_s);
	$status_description = $Line_s->Status_Desc;
	}
// initialize the ROM graduates converted to AEMMA students flag, and AEMMA intro students to AEMMA students
$ROM_AEMMA = 0;
$AEMMA_AEMMA = 0;
$p1_addition = "";
if ($rank_ID)
	{
	if ($rank_ID == 211)
		{ 
		// search for records of those individuals who had taken the ROM program and are now students of the Academy
		$rank_ID = 21;
		// do something with the 211 rank passed
		$ROM_AEMMA = 1;
		$p1_addition = "This report displays those members records who had graduated from the ROM Swordsmanship Program and who <b>became students at AEMMA</b>.";
		}
	elseif ($rank_ID == 221)
		{ 
		// search for records of those individuals who had taken the AEMMA intro program and are now students of the Academy
		$rank_ID = 22;
		// do something with the 221 rank passed
		$AEMMA_AEMMA = 1;
		$p1_addition = "This report displays those members records who had graduated from the AEMMA Armizare Introduction Program and <b>became students at AEMMA</b>.";
		}
	$SQL_r = 'SELECT Rank_Desc FROM Ranks ';
	$SQL_r .= ' WHERE Rank_ID = "'.$rank_ID.'"';
	$Result_r = mysqli_query($LinkID, $SQL_r);
	$Line_r = mysqli_fetch_object($Result_r);
	$rank_description = $Line_r->Rank_Desc;
	}

// begin: determine the security level (role ID) to determine what access privilege the user has on the databaser
$seclvl = $_SESSION['RoleID'];
if ($seclvl > 4)
	{$state = "Update";}
else	{$state = "Show"; }
// end: determine the security level (role ID) to determine what access privilege the user has on the databaser
//include_once 'IDValid.php';
$menu_selected = "AIMS";
$config = $members_only_path."config/config.php"; include "$config";	// leverage variables already assigned found in the members only config
include "config/config.php";
include "config/AIMS_rep_other_members_$lang.php";
$header = $members_only_path."php-bin/members_only_header.php"; include "$header";
?>
  <script type="text/javascript" src="js-bin/jquery.min_v1.9.1.js"></script>
  <script type="text/javascript" src="js-bin/ResponsiveSlides.min.js"></script>
  <script type="text/javascript" src="js-bin/main.js"></script>
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
$header2 = $members_only_path."php-bin/members_only_header2.php"; include "$header2";
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
		<p><?=$p1[$lang_num]?><?=$p1_addition?></p>
		<div align="right"><table style="width:<?=$table_width?>;background-color:purple;border-style:solid;border-width:1px;border-color:gray;border-radius:15px;" class="box">
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
<?php
if ($status_ID == "DE")
	{ echo ('			<td style="background-color:purple;"><font color="white"><b>&nbsp;Deceased Date</b><br />&nbsp;(yyyy-mm-dd)</font></td>'); }
else
	{ echo ('			<td style="background-color:purple;"><font color="white"><b>&nbsp;Email</b></font></td>'); }
?>

			</tr>
<?php
// select the records from the database which satisfy the status requested
$record_count = 0;
if ($status_ID)
	{ 
	$SQL = 'SELECT M.Member_ID, M.Member_Number, M.Salutation, M.FirstName, M.LastName, M.Postnominals, M.City, M.ProvState, M.NumHome, M.NumMobile, M.Email, M.Deceased_Date, S.Status_ID, S.Status_Date, S.Current_Status FROM Members M, Members_Status S'; 
	$SQL .= ' WHERE M.Member_ID = S.Member_ID AND S.Status_ID = "'.$status_ID.'"  ';
	}
elseif ($gender)
	{
	$SQL = 'SELECT M.Member_ID, M.Member_Number, M.Salutation, M.FirstName, M.LastName, M.Postnominals, M.City, M.ProvState, M.NumHome, M.NumMobile, M.Email, M.Deceased_Date, S.Status_ID FROM Members M, Members_Status S';
	$SQL .= ' WHERE M.Member_ID = S.Member_ID AND M.Gender = "'.$gender.'"  ';
	}
else
	{
	$SQL = 'SELECT M.Member_ID, M.Member_Number, M.Salutation, M.FirstName, M.LastName, M.Postnominals, M.City, M.ProvState, M.NumHome, M.NumMobile, M.Email, M.Deceased_Date, S.Status_ID, S.Status_Date, R.Rank_ID FROM Members M, Members_Status S, Members_Rank R'; 
	$SQL .= ' WHERE M.Member_ID = S.Member_ID AND (M.Member_ID = R.Member_ID AND R.Rank_ID = '.$rank_ID.') ';
	if ($ROM_AEMMA || $AEMMA_AEMMA) { $SQL .= 'AND R.Current_Status = 0'; }
	}
	$SQL .= ' ORDER BY M.LastName ';
//echo ('debug:rep_other_members.php:160:SQL="'.$SQL.'"');exit;
	$Result = mysqli_query($LinkID, $SQL);
	while ($Line = mysqli_fetch_object($Result)) {
		$member_ID 	= $Line->Member_ID;
		$member_number	= $Line->Member_Number;
		$salutation	= $Line->Salutation;
		$firstName	= $Line->FirstName;
		$lastName	= $Line->LastName;
		$postnominals	= $Line->Postnominals;
		$city		= $Line->City;
		$prov		= $Line->ProvState;
		$numHome	= $Line->NumHome;
		$numMobile	= $Line->NumMobile;
if ($rank_ID)	{$rank_ID	= $Line->Rank_ID;}
if ($status_ID == "DE") { $deceased_date = $Line->Deceased_Date; } else {$deceased_date = ""; }
	 	$email		= $Line->Email;
		$status_ID	= $Line->Status_ID;
//		$current	= $Line->Current_Status;

		$full_name = $salutation." ".$firstName." ".$lastName;
		$record_count++;
		include 'sub_members_list_statuses.php';
		include "sub_table_rows.php";
		}
	dbClose($LinkID);
	if (!$record_count) { echo ('<tr><td colspan="7">&nbsp;No records found ...</td></tr>'); }
echo ('<tr><td colspan="7" style="background-color:purple;color:white;border-bottom-right-radius:15px;border-bottom-left-radius:15px;">&nbsp;<b>Total number of records retrieved: '.$record_count.'</b>&nbsp;</td></tr>');
echo ('</table></td></tr></table></div><br /></div>');

//	<!-- being footer -->
	include "../php-bin/footer.php";
//	<!-- end footer
?>
</div><!-- container -->
</body></html>
