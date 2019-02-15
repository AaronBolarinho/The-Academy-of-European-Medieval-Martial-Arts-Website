<?php
// Program: Report_chapter.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description: This PHP will list all active records in the database for the particular Chapter selected. It will group
//		records based on membership type (committed, instructors, etc.) and which have various levels of "active"
//		including "new" and "suspended" (suspended means the individual is still an active member, but for a period
//		of time, is unable to train).
//
//---------------------------
// Updates:
//	2012 ----------
//
include 'ss_path.stuff';
//session_start();
include_once 'IDValid.php';
//include_once 'DB.php';

if (isset($_GET['Chapter'])) { $Chapter_ID = $_GET['Chapter']; }
//if (isset($_GET['SCH'])) { $school = $_GET['SCH']; }
//if (isset($_GET['SCH'])) { $school = $_GET['SCH']; }
//if (isset($_GET['LGID'])) { $login_ID = $_GET['LGID']; }
//if (isset($_GET['SECL'])) { $seclvl = $_GET['SECL']; }


$LinkID=dbConnect($DB);
$SQL  = 'SELECT C.ID, C.Description FROM Chapter C WHERE C.ID = '.$Chapter_ID;
$Result = mysql_query($SQL, $LinkID);
while ($Line = mysql_fetch_object($Result)) {
	$Chapter_Name = $Line->Description;
	}
mysql_free_result($Result);
?>
<!-- begin page header -->
<table align="center" width="100%" cellpadding="3" cellspacing="0" border="0">
<tr class="purple_grad">
	<td class="purple_grad">&nbsp;<?=$school?> Membership Database: <?=$Chapter_Name?> Membership Records<span style="float:right"><i>Logged in as: <?=$login_ID?>&nbsp;</i></span></td>
</tr></table
<!-- end page header -->
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$full_date= date("d-m-Y");	

	$year = substr($full_date, 6, 4); 
	$month = substr($full_date, 3, 2); 
	$day = substr($full_date, 0, 2); 
	$feesGoodTillDate = "";
	$var_feesGoodTillDate = $year ."-". $month ."-". $day;

	echo ('<caption>Active Members Listing: '.$Chapter_Name.' ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status&nbsp;</th><th>Photo&nbsp;</th></tr>

<?php
	// count all records where the records are associated with the chapter of interest and are either instructor (5) or AEMMA Exec & instructor (7)
	// and have a status of "new" (1), "active" (2) or "suspended" (6)
	$LinkID=dbConnect($DB);
	$SQL = 'SELECT count(*) Count';
	$SQL .= ' FROM People P,  Members_Chapter MC';
	$SQL .= ' WHERE P.School = "'.$school.'" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID IN (5,7)';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$record_count = $Line->Count;
		}
	if ($record_count > 0 )
		{
		echo ('<tr><td id="Label" colspan="6" bgcolor="#FDD017"><div align="center"><b>* * * Instructors and/or Executives * * *</b></div></td></tr>');

		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.FeesGoodTillDate, P.MemberType_ID, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID IN (5,7)';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;

			include 'sub_report_statuses.php';
			$status = "";

			include 'sub_select_reports.php';
			}
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total number of <b>Instructors and/or Executives</b>: </b>'.$record_count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		}		


	// count all records where the records are associated with the chapter of interest and are of type "committed" (1)
	// and have a status of "new" (1), "active" (2) or "suspended" (6)
	$SQL = 'SELECT count(*) Count';
	$SQL .= ' FROM People P,  Members_Chapter MC';
	$SQL .= ' WHERE P.School = "AEMMA" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID = 1';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$record_count = $Line->Count;
		}

	if ($record_count > 0 )
		{
		echo ('<tr><td id="Label" colspan="6" bgcolor="#FDD017" ><div align="center"><b>* * * Committed * * *</b></div></td></tr>');

		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.FeesGoodTillDate, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID = 1';
		$SQL .= ' ORDER BY P.LastName';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;

			if ($memberStatus == 6) { $colour = "blue"; }
			elseif ($memberStatus == 1) { $colour = "green"; }
			else { $colour = "black"; }
			$status = "";

			include 'sub_select_reports.php';
			}
				include 'sub_report_statuses.php';
	echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total number of active <b>committed</b> members: </b>'.$record_count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		}

	// count all records where the records are associated with the chapter of interest and are of type "casual" (2)
	// and have a status of "new" (1), "active" (2) or "suspended" (6)
	$SQL = 'SELECT count(*) Count';
	$SQL .= ' FROM People P,  Members_Chapter MC';
	$SQL .= ' WHERE P.School = "AEMMA" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID = 2';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$record_count = $Line->Count;
		}

	if ($record_count > 0 )
		{
		echo ('<tr><td id="Label" colspan="6" bgcolor="#FDD017" ><div align="center"><b>* * * Casual * * *</b></div></td></tr>');

		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.FeesGoodTillDate, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID = 2';
		$SQL .= ' ORDER BY P.LastName';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;

			if ($memberStatus == 6) { $colour = "blue"; }
			elseif ($memberStatus == 1) { $colour = "green"; }
			else { $colour = "black"; }
			$status = "";

			include 'sub_select_reports.php';
			}
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total number of active <b>casual</b> members: </b>'.$record_count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		}

	// count all records where the records are associated with the chapter of interest and are of type "occassional" (3)
	// and have a status of "new" (1), "active" (2) or "suspended" (6)
	$SQL = 'SELECT count(*) Count';
	$SQL .= ' FROM People P,  Members_Chapter MC';
	$SQL .= ' WHERE P.School = "AEMMA" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID = 3';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$record_count = $Line->Count;
		}

	if ($record_count > 0 )
		{
		echo ('<tr><td id="Label" colspan="6" bgcolor="#FDD017" ><div align="center"><b>* * * Occassional * * *</b></div></td></tr>');

		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' and P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID = 3';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;

			if ($memberStatus == 6) { $colour = "blue"; }
			elseif ($memberStatus == 1) { $colour = "green"; }
			else { $colour = "black"; }
			$status = "";

			include 'sub_select_reports.php';
			}
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total number of <b>occassional</b> members: </b>'.$record_count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		}

	// count all records where the records are associated with the chapter of interest and are involved in archery including records type of "archery only" (4)
	// and have a status of "new" (1), "active" (2) or "suspended" (6)
	$SQL = 'SELECT count(*) Count';
	$SQL .= ' FROM People P,  Members_Chapter MC, Members_Martial MM ';
	$SQL .= ' WHERE P.School = "AEMMA" AND (P.Rec_ID = MM.People_ID AND MM.archery = 1) AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID IN (1,2,3,4,5,7)';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$record_count = $Line->Count;
		}

	if ($record_count > 0 )
		{
		echo ('<tr><td id="Label" colspan="6" bgcolor="#FDD017" ><div align="center"><b>* * * Archers * * *</b></div></td></tr>');

		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.FeesGoodTillDate, P.MemberType_ID, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC, Members_Martial MM ';
		$SQL .= ' WHERE P.School = "AEMMA" AND (P.Rec_ID = MM.People_ID AND MM.archery = 1) AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID IN (1,2,3,4,5,7)';
		$SQL .= ' ORDER BY P.LastName';
		
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;

			if ($memberStatus == 6) { $colour = "blue"; }
			elseif ($memberStatus == 1) { $colour = "green"; }
			else { $colour = "black"; }
			$status = "";

			// if the member type is "archery only" (4) then mark the record in orange and highlight the status to "AO" meaning "archery only"
			if ($memberType == 4) 
				{
				$status = "AO";
				if ($colour == "black") {$colour = "orange"; } 
				}

			include 'sub_select_reports.php';
			}
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total number of <b>archers</b>: </b>'.$record_count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		echo ('<tr><td colspan="6"><b>Archers note: </b> Records which appear in <font color="blue"><b>blue</b></font> indicate those who are suspended for a time being. Records appearing in <font color="orange"><b>orange</b></font> indicate those individuals who ONLY practice archery. Under the status column, the letters "<b>AO</b>" indicate those records who are archers only.<br />&nbsp;</td></tr>');
		}

// 		Count the grand total of active members for the chapter
//
		$SQL = 'SELECT count(*) Count';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.Rec_ID = MC.People_ID and MC.Chapter_ID = '.$Chapter_ID.') and P.MemberStatus_ID IN (1,2,6) and P.MemberType_ID IN (1,2,3,4,5,7)';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total active members ('.$Chapter_Name.'): '.$Line->Count.'</b></td></tr><tr><td colspan="6">&nbsp;</td></tr>');
		}
		mysql_free_result($Result);
		dbClose($LinkID);
echo ('</table>');
include 'sub_report_legend.php';
?>
