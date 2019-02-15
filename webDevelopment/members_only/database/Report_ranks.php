<?php
// Program: Report_ranks.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description: This PHP will list all active records in the database for the particular rank selected. It will group
//		records based on association of Chapter of records whose status are various levels of "active"
//		including "new" and "suspended" (suspended means the individual is still an active member, but for a period
//		of time, is unable to train).
//
//---------------------------
// Updates:
//	2012 ----------
//
include 'ss_path.stuff';
include_once 'IDValid.php';

if (isset($_GET['RNK']))	{ $rank_ID = $_GET['RNK']; }

$LinkID=dbConnect($DB);
// obtain the English description of rank
$SQL = 'SELECT ID, Description';
$SQL .= ' FROM Rank';
$SQL .= ' WHERE ID = '.$rank_ID ;
$Result = mysql_query($SQL, $LinkID);
while ($Line = mysql_fetch_object($Result)) {
	$rank_desc = $Line->Description;
	}
//
// build an array containing Chapters full names for those Chapters which are currently active
//
$SQL  = 'SELECT C.ID, C.Description';
$SQL .= ' FROM Chapter C WHERE C.ChapterState_ID IN (1,2,3)'; // only get chapters which are active, new or planned
$SQL .= ' ORDER BY C.ID';
$i = 1; // start the array count at "1" as "0" is a NA record in the chapters table
$Result = mysql_query($SQL, $LinkID);
$SQL_IN = "(";
while ($Line = mysql_fetch_object($Result)) {
	$array_chapter[$i] = $Line->Description;
	$array_chapter_ID[$i] = $Line->ID;
	$SQL_IN .= $array_chapter_ID[$i].',';
	$i++;
	}
$SQL_IN = substr($SQL_IN,0,-1).')';
dbClose($LinkID);
$array_chapter_size = count($array_chapter);
$chapter = 1;
$header_title = "Records of rank: $rank_desc";
include 'sub_header.php';
?>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$full_date= date("d-m-Y");
	$count = 0;	
	echo ('<caption>Active Members Listing of Rank: <b>'.$rank_desc.'</b> ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status&nbsp;</th><th>Photo&nbsp;</th></tr>
<?php
		echo ('<tr><td id="Label" colspan="7" bgcolor="#FDD017" ><div align="center"><b>* * * '.$array_chapter[$chapter].' * * *</b></div></td></tr>');

		$LinkID=dbConnect($DB);

		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.FeesGoodTillDate, P.MemberType_ID, P.MemberStatus_ID, P.portrait_URL, MC.Chapter_ID ';
		$SQL .= ' FROM People P ';
		$SQL .= ' INNER JOIN (Members_Chapter MC ';
		$SQL .= ' INNER JOIN Members_Rank MR ON MC.People_ID = MR.People_ID) ';
		$SQL .= ' ON P.Rec_ID = MC.People_ID ';
		$SQL .= ' WHERE MR.Rank_ID = '.$rank_ID.' AND MR.Current = 1 AND P.MemberStatus_ID IN (1,2,6) AND MC.Chapter_ID IN '.$SQL_IN; 
		if ($rank_ID <=3) { $SQL .= ' AND MC.Assoc = 1 ';}
		$SQL .= ' ORDER BY MC.Chapter_ID, P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$chapter_ID = $Line->Chapter_ID;
			$feesGoodTillDate = $Line->FeesGoodTillDate;
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;
			if ( $feesGoodTillDate >= $var_feesGoodTillDate or $memberType >= 5 )
				{ $feesState = "P"; }
			else
				{ $feesState = "L"; }

			include 'sub_report_statuses.php';
			$status = "";

			if ($chapter_ID == $array_chapter_ID[$chapter])
				{ 
				include 'sub_select_reports.php'; 
				$count++;
				}
			else
				{
				echo ('<tr bgcolor="gray"><td colspan="7"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total: </b>'.$count.'</td></tr><tr><td colspan="7">&nbsp;</td></tr>');
				$count = 0;
				$chapter++;
				echo ('<tr><td id="Label" colspan="7" bgcolor="#FDD017" ><div align="center"><b>* * * '.$array_chapter[$chapter].' * * *</b></div></td></tr>');
				include 'sub_select_reports.php'; $count++;
				}
			}
		// enter last row after the last row of the while line was processed above
		echo ('<tr bgcolor="gray"><td colspan="7"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total: </b>'.$count.'</td></tr><tr><td colspan="7">&nbsp;</td></tr>');
		mysql_free_result($Result);
		dbClose($LinkID);
echo ('</table>');
include 'sub_report_legend.php';
?>
