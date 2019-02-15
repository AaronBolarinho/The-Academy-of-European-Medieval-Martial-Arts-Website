<?php
// Program: Report_inactive.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description: This report will list all inactive members/records
//
//---------------------------
// Updates:
//	2012 ----------
//
include 'ss_path.stuff';
include_once 'IDValid.php';
$header_title = "Inactive Records";
include 'sub_header.php';
?>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>Inactive Membership Listing: Toronto ('.$full_date.')</caption>');
?>
		<tr><th>&nbsp;Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status&nbsp;</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect($DB);
		$count = 0;
		$SQL = 'SELECT P.Rec_ID, P.MemberStatus_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID AND MC.Chapter_ID = 1) AND P.MemberStatus_ID IN (3,4,5) AND P.MemberType_ID < 8';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_reports.php'; 
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total: </b>'.$count.'</td></tr><tr><td colspan="6">&nbsp;</td></tr>');
	?>
</table>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	echo ('<caption>Inactive Membership Listing: Guelph ('.$full_date.')</caption>');
	?>
		<tr><th>&nbsp;Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status&nbsp;</th><th>Photo&nbsp;</th></tr>
	<?php
		$count = 0;
		$SQL = 'SELECT P.Rec_ID, P.MemberStatus_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID AND MC.Chapter_ID = 2) AND P.MemberStatus_ID IN (3,4,5)';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_reports.php'; 
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total: </b>'.$count.'</td></tr><tr><td colspan="6">&nbsp;</td></tr>');
		mysql_free_result($Result);
	?>
</table>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	echo ('<caption>Inactive Membership Listing: Nova Scotia ('.$full_date.')</caption>');
	?>
		<tr><th>&nbsp;Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status&nbsp;</th><th>Photo&nbsp;</th></tr>
	<?php
		$count = 0;
		$SQL = 'SELECT P.Rec_ID, P.MemberStatus_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID AND MC.Chapter_ID = 3) AND P.MemberStatus_ID IN (3,4,5)';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_reports.php'; 
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total: </b>'.$count.'</td></tr><tr><td colspan="6">&nbsp;</td></tr>');
		mysql_free_result($Result);
	?>
</table>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	echo ('<caption>Inactive Membership Listing: Stratford ('.$full_date.')</caption>');
	?>
		<tr><th>&nbsp;Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status&nbsp;</th><th>Photo&nbsp;</th></tr>
	<?php
		$count = 0;
		$SQL = 'SELECT P.Rec_ID, P.MemberStatus_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID AND MC.Chapter_ID = 5) AND P.MemberStatus_ID IN (3,4,5)';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_reports.php'; 
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total: </b>'.$count.'</td></tr><tr><td colspan="6">&nbsp;</td></tr>');
		mysql_free_result($Result);
		dbClose($LinkID);
echo ('</table>');
include 'sub_report_legend.php';
?>
