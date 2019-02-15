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

$LinkID=dbConnect($DB);
$SQL  = 'SELECT C.ID, C.Description FROM Chapter C WHERE C.ID = '.$Chapter_ID;
$Result = mysql_query($SQL, $LinkID);
while ($Line = mysql_fetch_object($Result)) {
	$Chapter_Name = $Line->Description;
	}
mysql_free_result($Result);
$header_title = "$Chapter_Name Membership Records";
include 'sub_header.php';
?>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$full_date= date("d-m-Y");	
	$year = substr($full_date, 6, 4); 
	$month = substr($full_date, 3, 2); 
	$day = substr($full_date, 0, 2); 
	$feesGoodTillDate = "";
	$var_feesGoodTillDate = $year ."-". $month ."-". $day;

	echo ('<caption>Active/New/Suspended Members Listing: '.$Chapter_Name.' ('.$full_date.')</caption>');
?>
	<tr><th>Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status&nbsp;</th><th>Photo&nbsp;</th></tr>

<?php
	$LinkID=dbConnect($DB);

	// determine if there is a count for executive or instructor, and if so, include in the report
	// if not, do not include this section in the report
	$SQL = 'SELECT count(*) Count';
	$SQL .= ' FROM People P, Members_Chapter MC';
	$SQL .= ' WHERE P.School = "'.$school.'" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID IN (5,7)';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$record_count = $Line->Count; }
	$count = 0;
	$total_count = 0;
	if ($record_count > 0 )
		{
		// retrieve records which are associated with the chapter of interest and are of type "executive" or "instructor" (5,7)
		// and have a status of "new" (1), "active" (2) or "suspended" (6)
		echo ('<tr><td id="Label" colspan="6" bgcolor="#FDD017"><div align="center"><b>* * * Instructors and/or Executives * * *</b></div></td></tr>');
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.FeesGoodTillDate, P.MemberType_ID, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID IN (5,7)';
		$SQL .= ' ORDER BY P.LastName';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			//$status = "";
			include 'sub_select_reports.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total number of <b>Instructors and/or Executives</b>: </b>'.$count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		$total_count = $total_count + $count;
		}

	// determine if there is a count for committed members, and if so, include in the report
	// if not, do not include this section in the report
	$SQL = 'SELECT count(*) Count';
	$SQL .= ' FROM People P, Members_Chapter MC';
	$SQL .= ' WHERE P.School = "'.$school.'" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID = 1';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$record_count = $Line->Count; }
	$count = 0;
	if ($record_count > 0 )
		{
		// retrieve records which are associated with the chapter of interest and are of type "committed" (1)
		// and have a status of "new" (1), "active" (2) or "suspended" (6)
		echo ('<tr><td id="Label" colspan="6" bgcolor="#FDD017" ><div align="center"><b>* * * Committed * * *</b></div></td></tr>');
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.FeesGoodTillDate, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID = 1';
		$SQL .= ' ORDER BY P.LastName';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			//$status = "";
			include 'sub_select_reports.php';
			$count++;
			}
		include 'sub_report_statuses.php';
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total number of active <b>committed</b> members: </b>'.$count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		$total_count = $total_count + $count;
		}

	// determine if there is a count for casual members, and if so, include in the report
	// if not, do not include this section in the report
	$SQL = 'SELECT count(*) Count';
	$SQL .= ' FROM People P, Members_Chapter MC';
	$SQL .= ' WHERE P.School = "'.$school.'" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID = 2';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$record_count = $Line->Count; }
	$count = 0;
	if ($record_count > 0 )
		{
		// retrieve records which are associated with the chapter of interest and are of type "casual" (2)
		// and have a status of "new" (1), "active" (2) or "suspended" (6)
		echo ('<tr><td id="Label" colspan="6" bgcolor="#FDD017" ><div align="center"><b>* * * Casual * * *</b></div></td></tr>');
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.FeesGoodTillDate, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID = 2';
		$SQL .= ' ORDER BY P.LastName';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			//$status = "";
			include 'sub_select_reports.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total number of active <b>casual</b> members: </b>'.$count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		$total_count = $total_count + $count;
		}

	// determine if there is a count for occassional members, and if so, include in the report
	// if not, do not include this section in the report
	$SQL = 'SELECT count(*) Count';
	$SQL .= ' FROM People P, Members_Chapter MC';
	$SQL .= ' WHERE P.School = "'.$school.'" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' and P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID = 3';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$record_count = $Line->Count; }
	$count = 0;
	if ($record_count > 0 )
		{
		// retrieve records where the records are associated with the chapter of interest and are of type "occassional" (3)
		// and have a status of "new" (1), "active" (2) or "suspended" (6)
		echo ('<tr><td id="Label" colspan="6" bgcolor="#FDD017" ><div align="center"><b>* * * Occassional * * *</b></div></td></tr>');
		$SQL = 'SELECT P.Rec_ID, P.MemberType_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' and P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID = 3';
		$SQL .= ' ORDER BY P.LastName';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			//$status = "";
			include 'sub_select_reports.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total number of active <b>casual</b> members: </b>'.$count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		$total_count = $total_count + $count;
		}

	// determine if there is a count for records type of "archery only", and if so, include in the report
	// if not, do not include this section in the report
	$SQL = 'SELECT count(*) Count';
	$SQL .= ' FROM People P, Members_Chapter MC, Members_Martial MM ';
	$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MM.People_ID AND MM.archery = 1) AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID IN (4,10)';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$record_count = $Line->Count; }
	$count = 0;
	if ($record_count > 0 )
		{
		// retrieve records where the records are associated with the chapter of interest and are records type of "archery only" (4)
		// and have a status of "new" (1), "active" (2) or "suspended" (6)
		echo ('<tr><td id="Label" colspan="6" bgcolor="#FDD017" ><div align="center"><b>* * * Archers Only * * *</b></div></td></tr>');
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.FeesGoodTillDate, P.MemberType_ID, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC, Members_Martial MM ';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MM.People_ID AND MM.archery = 1) AND P.Rec_ID = MC.People_ID AND MC.Chapter_ID = '.$Chapter_ID.' AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID IN (4,10)';
		$SQL .= ' ORDER BY P.LastName';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			//$status = "";
			// if the member type is "archery only" (4) or "archery occassional" (10) then mark the record in orange and highlight the status to "AO" meaning "archery only"
			if ($memberType == 4 || $memberType == 10) 
				{
				$status = "AO";
				if ($colour == "black") {$colour = "orange"; } 
				}
			include 'sub_select_reports.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total number of <b>archers</b>: </b>'.$count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		echo ('<tr><td colspan="6"><b>Archers Only note: </b> Records in this portion reflect only those individuals who are active ("new", "active", "suspended") and who only practice archery. In other words, they are not AEMMA combatants, although some AEMMA combatants also practice archery, but are not included in this list.<br />&nbsp;</td></tr>');
		$total_count = $total_count + $count;
		}

// 		Display the grand total of active members for this chapter
//
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total active members ('.$Chapter_Name.'): '.$total_count.'</b></td></tr><tr><td colspan="6">&nbsp;</td></tr>');
		mysql_free_result($Result);
		dbClose($LinkID);
echo ('</table>');
include 'sub_report_legend.php';
?>
