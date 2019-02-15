<?php
//
// Program: library_Main.php
// Author: David M. Cvet
// Created: Apr 08, 2018
// Description:
// This script will present statistics of records counts for each category of members
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
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main content -->
	<div id="main_content_AIMS">
	<!-- begin page header -->
	<h3><img src="../images/icons/books4.png" alt="" style="vertical-align:middle;width:40px;" /> <img src="../images/icons/books.png" alt="" style="vertical-align:middle;width:40px;" />&nbsp;Online Library Admin: Library Quick Stats</h3>
<!-- end page header -->

<p>This page displays current statistics sourced from the AEMMA's Online Library database. The values that you see are dynamically generated whenever this page is loaded to give you a fast summary and statistics of AEMMA.</p>
<table border="1" align="center">
<tr class="uoft_blue"><td width="220" align="center" class="uoft_blue">General Stats</td><td width="80" align="center" class="uoft_blue">Records Count</td><td valign="middle" style="background-color:white;" rowspan="12"><img src="../../onlineResources/images/books_shelf.gif" alt=""></td></tr>

<?php
		$LinkID=dbConnect($DB);
		$SQL  = 'SELECT count(*) Count FROM Online_library_registeredUsers ';
		$SQL .= 'WHERE access_status = 1';
		$SQL = mysqli_query($LinkID, $SQL);
		while ($Line = mysqli_fetch_object($SQL)) {
			echo ('<tr style="background-color:white;"><td align="left"> active registered members</td><td align="center">' . $Line->Count . '</td></tr>');
		}

		$SQL  = 'SELECT count(*) Count FROM Online_library_registeredUsers ';
		$SQL .= 'WHERE access_status = 0';
		$SQL = mysqli_query($LinkID, $SQL);
		while ($Line = mysqli_fetch_object($SQL)) {
			echo ('<tr style="background-color:white;"><td align="left"> inactive registered members</td><td align="center">' . $Line->Count . '</td></tr>');
		}

		$SQL  = 'SELECT count(*) Count FROM Online_library_registeredUsers ';
		$SQL .= 'WHERE privileged = 1';
		$SQL = mysqli_query($LinkID, $SQL);
		while ($Line = mysqli_fetch_object($SQL)) {
			echo ('<tr style="background-color:white;"><td align="left"> privileged members*</td><td align="center">' . $Line->Count . '</td></tr>');
		}

		$SQL  = 'SELECT count(*) Count FROM Online_library_registeredUsers ';
		$SQL .= 'WHERE organization = "AEMMA"';
		$SQL = mysqli_query($LinkID, $SQL);
		while ($Line = mysqli_fetch_object($SQL)) {
			echo ('<tr style="background-color:white;"><td align="left"> AEMMA library members**</td><td align="center">' . $Line->Count . '</td></tr>');
		}

		$SQL  = 'SELECT count(*) Count FROM Online_library_registeredUsers ';
		$SQL .= 'WHERE organization = "OMSG"';
		$SQL = mysqli_query($LinkID, $SQL);
		while ($Line = mysqli_fetch_object($SQL)) {
			echo ('<tr style="background-color:white;"><td align="left"> OMSG library members+</td><td align="center">' . $Line->Count . '</td></tr>');
		}

		$SQL  = 'SELECT count(*) Count FROM Online_library_registeredUsers ';
		$SQL .= 'WHERE country = "Canada"';
		$SQL = mysqli_query($LinkID, $SQL);
		while ($Line = mysqli_fetch_object($SQL)) {
			echo ('<tr style="background-color:white;"><td align="left"> library members from Canada</td><td align="center">' . $Line->Count . '</td></tr>');
		}

		$SQL  = 'SELECT count(*) Count FROM Online_library_registeredUsers ';
		$SQL .= 'WHERE country = "USA"';
		$SQL = mysqli_query($LinkID, $SQL);
		while ($Line = mysqli_fetch_object($SQL)) {
			echo ('<tr style="background-color:white;"><td align="left"> library members from USA</td><td align="center">' . $Line->Count . '</td></tr>');
		}

		$SQL  = 'SELECT count(*) Count FROM Online_library_registeredUsers ';
		$SQL .= 'WHERE country = "Germany"';
		$SQL = mysqli_query($LinkID, $SQL);
		while ($Line = mysqli_fetch_object($SQL)) {
			echo ('<tr style="background-color:white;"><td align="left"> library members from Germany</td><td align="center">' . $Line->Count . '</td></tr>');
		}

		$SQL  = 'SELECT count(*) Count FROM Online_library_registeredUsers ';
		$SQL .= 'WHERE country = "UK"';
		$SQL = mysqli_query($LinkID, $SQL);
		while ($Line = mysqli_fetch_object($SQL)) {
			echo ('<tr style="background-color:white;"><td align="left"> library members from UK</td><td align="center">' . $Line->Count . '</td></tr>');
		}

		$SQL  = 'SELECT count(*) Count FROM Online_library_registeredUsers ';
		$SQL .= 'WHERE member_status = 1';
		$SQL = mysqli_query($LinkID, $SQL);
		while ($Line = mysqli_fetch_object($SQL)) {
			echo ('<tr style="background-color:white;"><td align="left"> individuals who have members only resources access</td><td align="center">' . $Line->Count . '</td></tr>');
		}

		$SQL  = 'SELECT count(*) Count FROM Online_library_accessLog ';
		$SQL = mysqli_query($LinkID, $SQL);
		while ($Line = mysqli_fetch_object($SQL)) {
			echo ('<tr style="background-color:white;"><td align="left"> access log records</td><td align="center">' . $Line->Count . '</td></tr>');
		}
		dbClose($LinkID);
?>
</table>
<p><i>* privileged members are those who are either AEMMA students (who do not require online library registration payments) or guests who share a similar privilege.<br />
** AEMMA members are those individuals who have access to the online library and who are AEMMA students/members.<br />
+ OMSG members are those individuals who have access to the online library and who are OMSG students/members.</i></p>
</div>
<?php
//	<!-- being footer -->
	include "../php-bin/footer.php";
//	<!-- end footer
?>
</div><!-- container -->
</body></html>
