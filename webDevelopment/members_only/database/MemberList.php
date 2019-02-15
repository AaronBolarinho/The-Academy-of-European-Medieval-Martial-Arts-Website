<?php
// Program: MemberList.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description: This report will list all records, either active or any status distributed across an alphabetic navigation strip.
//
//---------------------------
// Updates:
//	2012 ----------
//
include 'ss_path.stuff';
if (isset($_GET['SCH'])) { $school = $_GET['SCH']; }
if (isset($_GET['PGM'])) { $pgm = $_GET['PGM']; }
if (isset($_GET['LGID'])) { $login_ID = $_GET['LGID']; }
if (isset($_GET['SECL'])) { $seclvl = $_GET['SECL']; }
if (isset($_GET['RID'])) { $rec_ID = $_GET['RID']; }
if (isset($_GET['List'])) { $List_ID = $_GET['List']; }

include_once 'IDValid.php';
$header_title = "List Records Alphabetically";
include 'sub_header.php';
?>
	<table summary="Countrywide membership listing for AEMMA" align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	if ($List_ID == 1) { echo ('<caption>MEMBER ADMINISTRATION - Status = Active/New/Suspended</caption>'); }
	else { echo ('<caption>MEMBER ADMINISTRATION - Status = Any</caption>'); }

	$Search = "NULL";
	$Tabs = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	if (isset($_GET['Search']))	{ $Search = $_GET['Search']; }
	if (isset($_POST['Search']))	{ $Search = $_POST['Search']; }
       	if (isset($_GET['List']))	{ $List_ID = $_GET['List']; }
       	if (isset($_POST['List']))	{ $List_ID = $_POST['List']; }
	$Search = strpos($Tabs, $Search);

	echo ('<tr><td colspan="6" height="16" id="Data" align="center"><ul id="Tabs">');
	for ($index = 0; $index <= 25; $index++) 
		{
		echo ('<li><a href="index.php?PGM=MemberList&List=' . $List_ID . '&Search='. $Tabs[$index] . '&SCH='.$school.'&RID='.$rec_ID.'&LGID='.$login_ID.'&SECL='.$seclvl.'">');
		echo ('<span class="left">&nbsp;</span><span class="right">' . $Tabs[$index] . '</span></a></li>');
		}
	echo ('</ul></td></tr>');
	echo ('<tr><th>&nbsp;Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status&nbsp;</th><th>Photo&nbsp;</th></tr>');

	$Toggle=0;
	$count = 0;
	$LinkID=dbConnect($DB);
	$SQL = 'SELECT P.Rec_ID, P.MemberType_ID, P.MemberStatus_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.School, P.portrait_URL FROM People P';

	switch ($Search) 
		{
		case -1:
			break;
		case 0:
			$SQL .= " WHERE P.LastName < '" . $Tabs[$Search + 1] . "'";
			break;
		case 25: 
			$SQL .= " WHERE P.LastName >= '" . $Tabs[$Search] . "'";
			break;
		default:
			$SQL .= " WHERE P.LastName >= '" . $Tabs[$Search] . "'";
			$SQL .= " AND P.LastName <= '" . $Tabs[$Search + 1] . "'";
			break;
		}

	if ($List_ID == 1) { $SQL .= ' AND P.MemberStatus_ID IN (1,2,6)';  }  // select active/new records only when List == 1
	$SQL .= ' AND P.School = "'.$school.'" '; 
	$SQL .= ' ORDER BY P.LastName';
	$SQL = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($SQL)) {
		$memberType = $Line->MemberType_ID;
		if ($memberType == 4 || $memberType == 10) { $status = "AO"; }
		elseif ($memberType == 8) { $status = "RSW"; }
		elseif ($memberType == 9) { $status = "RARC"; }

		$memberStatus = $Line->MemberStatus_ID;
		include 'sub_report_statuses.php';

		include 'sub_select_reports.php';
		$Toggle=1-$Toggle;
		$status = "";
		$count++;
		}
	echo ('</ul></div>');
	echo ('<tr bgcolor="gray"><td colspan="6"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Records Count: </b>'.$count.'</td></tr><tr><td colspan="6">&nbsp;</td></tr>');
	echo ('<tr><td colspan="6"><blockquote><b>Note:</b><br />"AO" = archery only; "RSW" = ROM swordsmanship classes only; "RARC" = "ROM archery classes only</blockquote></td></tr>');
	dbClose($LinkID);
echo ('</table>');
include 'sub_report_legend.php';
?>
