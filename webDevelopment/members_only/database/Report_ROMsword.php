<?php
// Program: Report_ROMsword.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description: This report will list all students who have taken the ROM/internal introductory swordsmanship class
//
//---------------------------
// Updates:
//	2012 ----------
//
include 'ss_path.stuff';
include_once 'IDValid.php';
$header_title = "ROM Introductory Swordsmanship";
include 'sub_header.php';
?>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>ROM Swordsmanship Listing : ('.$full_date.')</caption>');
?>
		<tr><th>&nbsp;Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status&nbsp;</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect($DB);
		$SQL = 'SELECT P.Rec_ID, P.MemberType_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.portrait_URL';
		$SQL .= ' FROM People P';
		$SQL .= ' WHERE P.School = "'.$school.'" AND P.MemberType_ID = 8';
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
		dbClose($LinkID);
echo ('</table>');
include 'sub_report_legend.php';
?>
