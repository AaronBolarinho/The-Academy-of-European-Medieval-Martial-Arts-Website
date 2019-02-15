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
$header_title = "Period Garments";
include 'sub_header.php';
?>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$count = 0;
	$full_date= date("d-m-Y");	
	echo ('<caption>Membership Listing: Period Garments (Toronto)  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>Garments Description</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect($DB);
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.PeriodGarments, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID and MC.Chapter_ID = 1) AND P.PeriodGarments <> "" ';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_period.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="3"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total: </b>'.$count.'</td></tr><tr><td colspan="3">&nbsp;</td></tr>');
	?>
</table>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$count = 0;
	echo ('<caption>Membership Listing: Period Garments (Guelph)  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>Garments Description</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect($DB);
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.PeriodGarments, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID and MC.Chapter_ID = 2) AND P.PeriodGarments <> "" ';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_period.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="3"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total: </b>'.$count.'</td></tr><tr><td colspan="3">&nbsp;</td></tr>');
	?>
</table>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$count = 0;
	echo ('<caption>Membership Listing: Period Garments (Nova Scotia)  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>Garments Description</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect($DB);
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.PeriodGarments, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID and MC.Chapter_ID = 3) AND P.PeriodGarments <> "" ';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_period.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="3"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total: </b>'.$count.'</td></tr><tr><td colspan="3">&nbsp;</td></tr>');
	?>
</table>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$count = 0;
	echo ('<caption>Membership Listing: Period Garments (Stratford)  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>Garments Description</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect($DB);
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.PeriodGarments, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID and MC.Chapter_ID = 5) AND P.PeriodGarments <> "" ';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_period.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="3"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total: </b>'.$count.'</td></tr><tr><td colspan="3">&nbsp;</td></tr>');
		mysql_free_result($Result);
		dbClose($LinkID);
echo ('</table>');
include 'sub_report_legend.php';
?>
