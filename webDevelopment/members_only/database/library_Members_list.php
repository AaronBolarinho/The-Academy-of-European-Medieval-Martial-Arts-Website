<?php
ini_set('display_errors','On');
//
// Program: library_Members_list.php
// Author: David M. Cvet
// Created: Apr 08, 2018
// Description:
// This script will list database records of all individuals who have been registered to access the online library, both active and inactive
//---------------------------
// Updates:
//	2019 ------------------
//	jan 25:	standardized path names
//
$aims = 1;			// flag to indicate that we are now in the AIMS database system, so the menu bar needs to be expanded by the AIMS menu item
$lang = "en";
$lang_num = 0;
$modal = 0;			// disable the modal code in members_only_header2.php as no modals needed for this script
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories calling script
$PHP_string = "";
$php_string_set = 0;
if (isset($_GET['List'])) { $List_ID = $_GET['List']; $PHP_string = "?List=".$List_ID; $php_string_set++; }
if (isset($_GET['SECL']))  { $seclvl = $_GET['SECL']; if ($php_string_set) { $PHP_string .= "&SECL=".$seclvl;} else {$PHP_string = "?SECL=".$seclvl; $php_string_set++;}}
if (isset($_GET['Search']))  { $search_letter = $_GET['Search']; if ($php_string_set) { $PHP_string .= "&Search=".$search_letter;} else {$PHP_string = "?Search=".$search_letter; $php_string_set++;}}
// setup the call to this script between language selections so that the right records and variables are initialized and reused
$current_pgm = "library_Members_list.php".$PHP_string;
$menu_selected = "AIMS";

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
// test to determine if the initial database login session remains intact or the session has timed out before attempting to connect with the database
$session_expiration = $path_members."php-bin/sub_check_session_expiration.php"; include "$session_expiration";

//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

include "config/config.php";
$config = $path_members."config/config.php"; include "$config";
$login_AIMS = $path_dbase."config/AIMS_library_list_$lang.php"; include "$login_AIMS";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
echo ('<script type="text/javascript" src="../../js-bin/beep.js"></script>');
$full_date= date("F j, Y");
//echo ('debug:AIMS_home_page.php"29:gims="'.$aims.'"');	
?>
<script type="text/javascript" src="js-bin/ResponsiveSlides.min.js"></script>
<script type="text/javascript" src="js-bin/Members_list.js"></script>
<link rel="stylesheet" href="css/alphabet_strip.css" type="text/css" />
<link rel="stylesheet" href="<?=$path_members?>css/thumbnail.css" type="text/css" />
<?php
$legend = 0;
$List_ID = "";
$seclvl = 0;
$status_passed = 0;
$table_width = "90%";
$table_align = "center";
$LinkID=dbConnect($DB);
$state = "Update";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main content -->
	<div id="main_content_AIMS">
<?php
if ($List_ID == 1)
	{ echo ('<div class="report_banner box">'.$header_title_p1[$lang_num].'&nbsp;&nbsp;<img src="../images/icons/books4.png" alt="" style="vertical-align:middle;width:35px;" />&nbsp;<img src="../images/icons/users.png" alt="" style="vertical-align:middle;width:35px;" />&nbsp;<?=strtoupper($state);?></div>'); }
else
	{ echo ('<div class="report_banner box"> '.$header_title_p1[$lang_num].'&nbsp;&nbsp;<img src="../images/icons/books4.png" alt="" style="vertical-align:middle;width:35px;" />&nbsp;<img src="../images/icons/users.png" alt="" style="vertical-align:middle;width:35px;" />&nbsp;'.$header_title_p2[$lang_num].'</div>'); $legend = 1; }
?>
		<img src="../images/1090x4_transparent.png" width="100%" alt="" />

		<table width="90%" style="border-style:solid;border-width:1px;border-radius:10px;background-color:white;" class="box" align="center" cellpadding="0" cellspacing="0">
<?php
		echo ('<tr class="report_header"><td>&nbsp;UserID</td><td style="width:15%;">Name</td><td style="width:100px;">Reg. Date&nbsp;</td><td style="width:140px;">Last Access&nbsp;</td><td>Resource</td><td>Country</td><td>email</td></tr>');

		$Toggle=0;
		$state = "Update";
		$seclvl = $_SESSION['RoleID'];
		$colour = "blue";
		$SQL = 'SELECT userID, first_name, surname, registration_date, last_access_date, resource, country, email, access_status ';
		$SQL .= 'FROM Online_library_registeredUsers ';
		$SQL .= 'ORDER BY country ASC, surname';

//echo ('debug: SQL = '.$SQL);
		$Result = mysqli_query($LinkID, $SQL);
		if (mysqli_num_rows($Result))
			{
			while ($Line = mysqli_fetch_object($Result))
				{
				if ($Line->access_status)
					{$colour = "blue";}
				else
					{$colour = "red";}
				// the javascript function attached to each row is found under js-bin/Members_list.js
				echo ('<tr style="cursor:pointer;" OnMouseOver="navBar(this,1,1);" ');
				echo (' OnMouseOut="navBar(this,2,1);"');
				echo (' OnClick="navBarClick(this,1,' . $Line->userID . ',' . $seclvl . ',\'' . $state . '\')">');
				echo ('<td><div id="Data"><font color="'.$colour.'">&nbsp;'.$Line->userID . '</font></div></td>');
				echo ('<td><div id="Data"><font color="'.$colour.'">'.$Line->surname.', '.$Line->first_name.'</font></div></td>');
				echo ('<td><div id="Data"><font color="'.$colour.'">' . $Line->registration_date . '</font></div></td>');
				echo ('<td><div id="Data" align="left"><font color="'.$colour.'">' . $Line->last_access_date . '</font></div></td>');
				echo ('<td><div id="Data" align="left"><font color="'.$colour.'">' . $Line->resource . '</font></div></td>');
				echo ('<td><div id="Data" align="left"><font color="'.$colour.'">' . $Line->country . '</font></div></td>');
				echo ('<td><div id="Data" align="left"><font color="'.$colour.'">' . $Line->email . '</font></div></td>');
				echo ('</tr>');
				}
			}
		else
			{
			echo ('<tr><td colspan="7" style="color:red;text-align:center;font-weight:bold;"><i>*** No records found ***</i></td></tr>');
			}
		echo ('</table>');
		echo ('<div class="button_bar box"><button class="button" name="print_button" id="print_button" onclick="print_status_report(\'all\')">Print this list</button></div>');
		echo ('<br />&nbsp;<hr />');
		include 'sub_members_list_legend.php';
	echo ("\n".'</div><!-- end main_content -->'."\n");
//	echo ("\n".'</form></div>'."\n");
//	<!-- being footer -->
	include "../php-bin/footer.php";
//	<!-- end footer
?>
</div><!-- container -->
</body></html>
