<?php
// Program: Report_armour.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description: This report will list AND detail all individuals who are in harness, OR working towards their harness.
//
//---------------------------
// Updates:
//	2012 ----------
//
include 'ss_path.stuff';
include_once 'IDValid.php';
$header_title = "Armoured Combatants";
include 'sub_header.php';
?>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>Membership Listing: Toronto Armoured Combatants  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>Harness Description</th><th>&nbsp;</th><th>Photo&nbsp;</th><th>&nbsp;</th></tr>
		<tr><td id="Label" colspan="5" bgcolor="#FDD017" ><div align="center"><b>* * * Complete Armoured Harnesses * * *</b></div></td></tr>
	<?php
		$count = 0;
		$LinkID=dbConnect($DB);
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.ArmouredHarnessDescription, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID AND MC.Chapter_ID = 1) AND P.MemberStatus_ID IN (1,2,3,6) AND P.ArmouredHarness = 1';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_armour.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="5"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total (Complete Harnesses): </b>'.$count.'</td></tr><tr><td colspan="2">&nbsp;</td></tr>');
	?>
		<tr><td id="Label" colspan="5" bgcolor="#FDD017" ><div align="center"><b>* * * Incomplete Armoured Harnesses * * *</b></div></td></tr>
	<?php
		$count = 0;
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.ArmouredHarnessDescription, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID AND MC.Chapter_ID = 1) AND P.MemberStatus_ID IN (1,2,3,6) AND P.ArmouredHarnessDescription <> "" AND P.ArmouredHarness = 0';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_armour.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="5"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total (Incomplete Harnesses): </b>'.$count.'</td></tr><tr><td colspan="4">&nbsp;</td></tr>');
	?>
</table>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>Membership Listing: Guelph Armoured Combatants  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>Harness Description</th><th>&nbsp;</th><th>Photo&nbsp;</th><th>&nbsp;</th></tr>
		<tr><td id="Label" colspan="5" bgcolor="#FDD017" ><div align="center"><b>* * * Complete Armoured Harnesses * * *</b></div></td></tr>
	<?php
		$count = 0;
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.ArmouredHarness, P.ArmouredHarnessDescription, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID AND MC.Chapter_ID = 2) AND P.MemberStatus_ID IN (1,2,3,6) AND P.ArmouredHarness = 1';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_armour.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="5"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total (Complete Armoured Harnesses): </b>'.$count.'</td></tr><tr><td colspan="2">&nbsp;</td></tr>');
	?>
		<tr><td id="Label" colspan="5" bgcolor="#FDD017" ><div align="center"><b>* * * Incomplete Armoured Harnesses * * *</b></div></td></tr>
	<?php
		$count = 0;
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.ArmouredHarnessDescription, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID AND MC.Chapter_ID = 2) AND P.MemberStatus_ID IN (1,2,3,6) AND P.ArmouredHarnessDescription <> "" AND P.ArmouredHarness = 0';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_armour.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="5"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total (Incomplete Harnesses): </b>'.$count.'</td></tr><tr><td colspan="2">&nbsp;</td></tr>');
	?>
</table>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>Membership Listing: Nova Scotia Armoured Combatants  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>Harness Description</th><th>&nbsp;</th><th>Photo&nbsp;</th><th>&nbsp;</th></tr>
		<tr><td id="Label" colspan="5" bgcolor="#FDD017" ><div align="center"><b>* * * Complete Armoured Harnesses * * *</b></div></td></tr>
	<?php
		$count = 0;
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.ArmouredHarness, P.ArmouredHarnessDescription, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID AND MC.Chapter_ID = 3) AND P.MemberStatus_ID IN (1,2,3,6) AND P.ArmouredHarness = 1';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_armour.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="5"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total (Complete Armoured Harnesses): </b>'.$count.'</td></tr><tr><td colspan="2">&nbsp;</td></tr>');
	?>
		<tr><td id="Label" colspan="5" bgcolor="#FDD017" ><div align="center"><b>* * * Incomplete Armoured Harnesses * * *</b></div></td></tr>
	<?php
		$count = 0;
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.ArmouredHarnessDescription, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID AND MC.Chapter_ID = 3) AND P.MemberStatus_ID IN (1,2,3,6) AND P.ArmouredHarnessDescription <> "" AND P.ArmouredHarness = 0';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_armour.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="5"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total (Incomplete Harnesses): </b>'.$count.'</td></tr><tr><td colspan="2">&nbsp;</td></tr>');
	?>
</table>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>Membership Listing: Stratford Armoured Combatants  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>Harness Description</th><th>&nbsp;</th><th>Photo&nbsp;</th><th>&nbsp;</th></tr>
		<tr><td id="Label" colspan="5" bgcolor="#FDD017" ><div align="center"><b>* * * Complete Armoured Harnesses * * *</b></div></td></tr>
	<?php
		$count = 0;
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.ArmouredHarness, P.ArmouredHarnessDescription, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID AND MC.Chapter_ID = 5) AND P.MemberStatus_ID IN (1,2,3,6) AND P.ArmouredHarness = 1';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_armour.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="5"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total (Complete Armoured Harnesses): </b>'.$count.'</td></tr><tr><td colspan="2">&nbsp;</td></tr>');
	?>
		<tr><td id="Label" colspan="5" bgcolor="#FDD017" ><div align="center"><b>* * * Incomplete Armoured Harnesses * * *</b></div></td></tr>
	<?php
		$count = 0;
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.ArmouredHarnessDescription, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MC.People_ID AND MC.Chapter_ID = 5) AND P.MemberStatus_ID IN (1,2,3,6) AND P.ArmouredHarnessDescription <> "" AND P.ArmouredHarness = 0';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_armour.php';
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="5"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total (Incomplete Harnesses): </b>'.$count.'</td></tr><tr><td colspan="2">&nbsp;</td></tr>');
		dbClose($LinkID);
echo ('</table>');
include 'sub_report_legend.php';
?>
