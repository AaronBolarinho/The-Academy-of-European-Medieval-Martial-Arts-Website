<?php
// Program: Report_rapier.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description: This report will list all students who are taking rapier training.
//
//---------------------------
// Updates:
//	2012 ----------
//
include 'ss_path.stuff';
include_once 'IDValid.php';
$header_title = "Rapier Students";
include 'sub_header.php';
?>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$count = 0;
	$full_date= date("d-m-Y");	
	echo ('<caption>Active Membership Listing: Rapier Students  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status&nbsp;</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect($DB);
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Martial MM';
		$SQL .= ' WHERE P.School = "'.$school.'" and (P.Rec_ID = MM.People_ID and MM.rapier = 1) and (P.MemberStatus_ID = 2 or P.MemberStatus_ID = 1 or P.MemberStatus_ID = 6)';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_reports.php'; 
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="7"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total (rapier students): </b>'.$count.'</td></tr><tr><td colspan="7">&nbsp;</td></tr>');
		mysql_free_result($Result);
		dbClose($LinkID);
echo ('</table>');
include 'sub_report_legend.php';
?>
