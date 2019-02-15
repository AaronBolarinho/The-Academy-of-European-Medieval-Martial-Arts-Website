<?php
// Program: Report_archery.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description: This report will list all archery participants records or only those records in which the member
//		only practices archery and does not engage in any other training at AEMMA.
//
//---------------------------
// Updates:
//	2012 ----------
//
include 'ss_path.stuff';
include_once 'IDValid.php';
$header_title = "Archers Records";
include 'sub_header.php';
?>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$full_date= date("d-m-Y");	
	$count = 0;
	echo ('<caption>Active Membership Listing: Archers  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status&nbsp;</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect($DB);
		echo ('<tr><td id="Label" colspan="6" bgcolor="#FDD017"><div align="center"><b>* * * Archers and Combatants * * *</b></div></td></tr>');

		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.MemberStatus_ID, P.MemberType_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Martial MM';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MM.People_ID AND MM.archery = 1) AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID IN (1,2,3,5,7,20)';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;
			$feesGoodTillDate = $Line->FeesGoodTillDate;

			if ( $feesGoodTillDate >= $var_feesGoodTillDate or $memberType >= 5 )
				{ $feesState = "P"; }
			else
				{ $feesState = "L"; }

			include 'sub_report_statuses.php';
			include 'sub_select_reports.php'; 
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total (archers and combatants): </b>'.$count.'</td></tr><tr><td colspan="6">&nbsp;</td></tr>');
		//
		// select those records in which the individual ONLY practices archery
		//
		echo ('<tr><td id="Label" colspan="6" bgcolor="#FDD017"><div align="center"><b>* * * Archers only * * *</b></div></td></tr>');

		$total_count = $count;
		$count = 0;

		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.MemberStatus_ID, P.MemberType_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Martial MM';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Rec_ID = MM.People_ID AND MM.archery = 1) AND P.MemberStatus_ID IN (1,2,6) AND P.MemberType_ID IN (4,9,10)';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;
			$feesGoodTillDate = $Line->FeesGoodTillDate;

			if ( $feesGoodTillDate >= $var_feesGoodTillDate or $memberType >= 5 )
				{ $feesState = "P"; }
			else
				{ $feesState = "L"; }

			include 'sub_report_statuses.php';
			include 'sub_select_reports.php'; 
			$count++;
			}
		mysql_free_result($Result);
		dbClose($LinkID);
		$total_count = $total_count + $count;
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total (archers only): </b>'.$count.'</td></tr><tr><td colspan="6">&nbsp;</td></tr>');
		echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total Record Count (all archers): </b>'.$total_count.'</td></tr><tr><td colspan="6">&nbsp;</td></tr>');
echo ('</table>');
include 'sub_report_legend.php';
?>
