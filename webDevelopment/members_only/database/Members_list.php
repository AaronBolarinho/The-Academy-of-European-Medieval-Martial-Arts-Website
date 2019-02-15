<?php
ini_set('display_errors','On');
//
// Program: Members_list.php
// Author: David M. Cvet
// Created: Oct 13, 2016
// Description:
//	This script will list database records distributed across alphabet column headings. To view those
//	records whose surname begin with the letter "C", click on the "C" column to list those records.
//	The status of the records may be either "active/in-progress" or "any".
//---------------------------
// Updates:
//	2018 ----------
//	dec 06:	adjusted the selected letter on the alphabet strip to be larger, and with a black border highlighting the letter selected
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
$current_pgm = "Members_list.php".$PHP_string;
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
$login_AIMS = $path_dbase."config/AIMS_members_list_$lang.php"; include "$login_AIMS";
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
	{ echo ('<div class="report_banner box">'.$header_title_p1[$lang_num].'&nbsp;&nbsp;<img src="images/icons/hand_right_pointing.gif" alt="" style="vertical-align:middle;" />&nbsp;&nbsp;<?=strtoupper($state);?></div>'); }
else
	{ echo ('<div class="report_banner box"> '.$header_title_p1[$lang_num].'&nbsp;&nbsp;<img src="images/icons/hand_right_pointing.gif" alt="" style="vertical-align:middle;" />&nbsp;&nbsp;'.$header_title_p2[$lang_num].'</div>'); $legend = 1; }
?>
		<img src="../images/1090x4_transparent.png" width="100%" alt="" />

		<table width="90%" style="border-style:solid;border-width:1px;border-radius:10px;background-color:white;" class="box" align="center" cellpadding="0" cellspacing="0">
<?php

		$Search = "NULL";
		$Tabs = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$selected_style = " style='font-size:1.3em;color:blue;font-weight:bold;border-style:solid;border-color:black;' ";
		if (isset($_GET['Search']))	{ $Search = $_GET['Search']; }
		if (isset($_POST['Search']))	{ $Search = $_POST['Search']; }
        	if (isset($_GET['List']))	{ $List_ID = $_GET['List']; }
        	if (isset($_POST['List']))	{ $List_ID = $_POST['List']; }
		$Search = strpos($Tabs, $Search);

		echo ('<tr><td colspan="8" id="Data" align="center"><ul id="Tabs">');
		for ($index = 0; $index <= 25; $index++) {
			if ($index == $Search)	{ $style = $selected_style; } else { $style = ""; }
			echo ('<li><a href="Members_list.php?List=' . $List_ID . '&Search='. $Tabs[$index] . '&SECL='. $seclvl.'">');
			echo ('<span class="right"'.$style.'>&nbsp;' . $Tabs[$index] . '</span></a></li>');
		}
		echo ('</ul></td></tr>');
		echo ('<tr class="report_header"><td>&nbsp;Mem. Num</td><td width="25%">Name</td><td>City</td><td>Primary Email</td><td>Telephone (H)</td><td>Mobile (M)</td><td>Photo&nbsp;</td><td>Arms&nbsp;</td></tr>');

		$Toggle=0;
		$SQL = 'SELECT M.Member_ID, M.Member_Number, M.FirstName, M.MiddleName, M.LastName, M.City, M.Email, M.NumHome, M.NumMobile, M.Portrait_URL, M.Portrait_File, S.Status_ID ';
		$SQL .= ' FROM Members M, Members_Status S ';
//		if ($List_ID == 1) { $SQL .= ' FROM People P, Status_Members S '; }
//		else { $SQL .= ' FROM People P '; }

		switch ($Search) {
			case -1:
				break;
			case 0:
				$SQL .= " WHERE M.LastName < '" . $Tabs[$Search + 1] . "'";
				break;
			case 25: 
				$SQL .= " WHERE M.LastName >= '" . $Tabs[$Search] . "'";
				break;
			default:
				$SQL .= " WHERE M.LastName >= '" . $Tabs[$Search] . "'";
				$SQL .= " AND M.LastName <= '" . $Tabs[$Search + 1] . "'";
				break;
		}

		if ($List_ID == 1) { $SQL .= ' AND ((M.Member_ID = S.Member_ID) AND (S.Status_ID = 1 OR S.Status_ID = 2))';  }
		else  { $SQL .= ' AND ((M.Member_ID = S.Member_ID) AND (S.Status_ID IN (SELECT Status_ID FROM Status)) AND Current_Status = 1)';  }


		$SQL .= ' ORDER BY M.LastName, M.FirstName';

//echo ('debug: SQL = '.$SQL);
		$Result = mysqli_query($LinkID, $SQL);
		if (mysqli_num_rows($Result))
			{
			while ($Line = mysqli_fetch_object($Result))
				{
				$member_ID = $Line->Member_ID;
				$member_number = $Line->Member_Number;
				$status_ID = $Line->Status_ID;
//				$colour = "";
//				$cross = ""; 

				// determine the colour of the row dependent upon status
				include 'sub_members_list_statuses.php';
				// build the row for the report
//				include "sub_table_rows.php";
				// determine if the individual is armigerous, and if so, pull the arms_URL
//				include "sub_armigerous.php";

				// the javascript function attached to each row is found under js-bin/Members_list.js
				echo ('<tr style="cursor:pointer;" OnMouseOver="navBar(this,1,1);" title="'.$record_status.'"');
				echo (' OnMouseOut="navBar(this,2,1);"');
				echo (' OnClick="navBarClick(this,1,' . $member_ID . ',' . $seclvl . ',\'' . $state . '\')">');
				echo ('<td><div id="Data"><font color="'.$colour.'">&nbsp;&nbsp;&nbsp;'.$Line->Member_Number . '</font></div></td>');
				echo ('<td><div id="Data"><font color="'.$colour.'">'.$Line->LastName.$cross.', ' . $Line->FirstName .' ' . $Line->MiddleName . '</font></div></td>');
				echo ('<td><div id="Data"><font color="'.$colour.'">' . $Line->City . '</font></div></td>');
				echo ('<td><div id="Data" align="left"><font color="'.$colour.'">' . $Line->Email . '</font></div></td>');
				echo ('<td><div id="Data" align="center"><font color="'.$colour.'">' . $Line->NumHome . '</font></div></td>');
				echo ('<td><div id="Data" align="center"><font color="'.$colour.'">' . $Line->NumMobile . '</font></div></td>');
				$Toggle=1-$Toggle;
				echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="../' . $Line->Portrait_URL.'/'.$Line->Portrait_File . '" height="15" border="0"><span><img src="../' . $Line->Portrait_URL.'/'.$Line->Portrait_File . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleName .'</span></a></div></td>');
				// determine if the individual is armigerous, and if so, pull the arms_URL
				$found = 0;
				$SQL_A = 'SELECT Arms_URL, Arms_file_100, Armoury_letter';
				$SQL_A .= ' FROM Members_Armigerous';
				$SQL_A .= ' WHERE Member_ID = ' . $member_ID ;
				$Result_A = mysqli_query($LinkID, $SQL_A);
				while ($Line_A = mysqli_fetch_object($Result_A))
					{
					$found = 1;
					echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="../' . $Line_A->Arms_URL.'/'.$Line_A->Armoury_letter.'/'.$Line_A->Arms_file_100 . '" height="15" border="0"><span><img src="../' . $Line_A->Arms_URL.$Line_A->Armoury_letter.'/'.$Line_A->Arms_file_100 . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleName .'</span></a></div></td>'); 
					}
				if ($found == 0)
					{ echo ('<td><div id="Data" align="center">&nbsp;</div></td>'); }			
				echo ('</tr>');
				}
			}
		else
			{
			echo ('<tr><td colspan="8" style="color:red;text-align:center;font-weight:bold;"><i>*** No records found ***</i></td></tr>');
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
