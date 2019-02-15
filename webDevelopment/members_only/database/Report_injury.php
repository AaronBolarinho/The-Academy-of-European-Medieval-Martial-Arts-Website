<?php
// Program: Report_injury.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description: This report will list all injuries records recorded.
//
//---------------------------
// Updates:
//	2012 ----------
//	mar 25:	added RID to the parameter string (forgot to do this before)
//
include 'ss_path.stuff';
include_once 'IDValid.php';
$header_title = "Injuries Records";
include 'sub_header.php';
?>
<!-- begin page header -->
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$full_date= date("d-m-Y");	
	$count = 0;
	echo ('<caption>Membership Listing: Injuries Report  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>Injury Description</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect($DB);
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.InjuryReport, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P';
		$SQL .= ' WHERE P.School = "'.$school.'" AND (P.Injury = 1 OR P.InjuryReport <> "") ';
		$SQL .= ' ORDER BY P.LastName';

		$php_variables = "?PGM=Members\&SCH=$school\&RID=$uRec_ID\&LGID=$login_ID\&SECL=$seclvl";

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';

			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->Rec_ID . ',\'' . $php_variables .'\')">');
			echo ('<td width="110" valign="top"><div id="Data">&nbsp;<font color="'.$colour.'">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</font></td>');
			echo ('<td><div id="Data"><font color="'.$colour.'">' . $Line->InjuryReport . '</font><br>&nbsp;</td>');
			echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="' . $Line->portrait_URL . '" height=35 border=0><span><img src="' . $Line->portrait_URL . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial .'</span></a></td>');
			echo ('</tr>');
			$count++;
			}
		echo ('<tr bgcolor="gray"><td colspan="3"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total (injuries) Count: </b>'.$count.'</td></tr><tr><td colspan="7">&nbsp;</td></tr>');
		dbClose($LinkID);
echo ('</table>');
include 'sub_report_legend.php';
?>
