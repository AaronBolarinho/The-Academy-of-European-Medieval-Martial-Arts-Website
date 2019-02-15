<?php
// Program: class_attendance.php
// Author: David M. Cvet
// Created: March 25, 2012
// Description: This PHP will list all active records in the database relevant to the chapter location, and type of class
//		being held. It will offer the viewer the selection of type of class being held, e.g. abrazare, daga, spada, etc.
//		and the complete list of students who may be taking the class.
//
//---------------------------
// Updates:
//	2012 ----------
//
include 'ss_path.stuff';
include_once 'IDValid.php';

$LinkID=dbConnect($DB);
// obtain the description of chapter
$SQL = 'SELECT ID, Description';
$SQL .= ' FROM Chapter';
$SQL .= ' WHERE ID = '.$chapter_ID ;
$Result = mysql_query($SQL, $LinkID);
while ($Line = mysql_fetch_object($Result)) {
	$chapter_desc = $Line->Description;
	}
//dbClose($LinkID);
$header_title = "Attendance Tracker";
include 'sub_header.php';
?>
<table align="center" cellpadding="0" cellspacing="0" width="530">
<?php
	$full_date= date("d-m-Y");
	$count = 0;	
	echo ('<caption>Attendance Tracker for <b>'.$chapter_desc.'</b> ('.$full_date.')</caption>');
?>
		<form name="Members" method="post" action="index.php?PGM=process_attendance&State=<?=$State?>&SCH=<?=$school?>&RID=<?=$uRec_ID?>&LGID=<?=$login_ID?>&SECL=<?=$seclvl?>">

		<tr><td valign="top" colspan="5" id="Label"><div align="left">&nbsp;Class Type:&nbsp;<select name="ClassType">
			<?php
			$SQL = 'SELECT ID, Description FROM Classes ORDER BY ID';
			$Result = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($Result)) {
				echo ('<option value="' .$Line->ID .'">' . $Line->Description.'</option>');
			}
			?>
	 		</select>&nbsp;&nbsp;
			Martial Style:&nbsp;<select name="MartialStyle">
			<?php
			$SQL = 'SELECT ID, Description FROM Martial_Styles ORDER BY ID';
			$Result = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($Result)) {
				echo ('<option value="' .$Line->ID .'">' . $Line->Description.'</option>');
			}
			?>
	 		</select>&nbsp;&nbsp;
		</div></td></tr>
		<tr><td valign="top" colspan="5" id="Label"><div align="left">&nbsp;Instructor:&nbsp;<select name="FirstInstructor">
			<?php
			$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, MR.Rank_ID ';
			$SQL .= ' FROM People P ';
			$SQL .= ' INNER JOIN (Members_Chapter MC ';
			$SQL .= ' INNER JOIN Members_Rank MR ON MC.People_ID = MR.People_ID) ';
			$SQL .= ' ON P.Rec_ID = MC.People_ID ';
			$SQL .= ' WHERE MR.People_ID = P.Rec_ID AND MR.Current = 1 AND MR.Rank_ID IN (3,4) AND MC.Chapter_ID = '.$chapter_ID; 
			$SQL .= ' ORDER BY P.LastName';

			$Result = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($Result)) {
				echo ('<option value="' .$Line->Rec_ID .'">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial.'</option>');
			}
			?>
	 		</select>&nbsp;&nbsp;
			Instructor's Assistant (1):&nbsp;<select name="AssistInstructor_1">
			<?php
			$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, MR.Rank_ID ';
			$SQL .= ' FROM People P ';
			$SQL .= ' INNER JOIN (Members_Chapter MC ';
			$SQL .= ' INNER JOIN Members_Rank MR ON MC.People_ID = MR.People_ID) ';
			$SQL .= ' ON P.Rec_ID = MC.People_ID ';
			$SQL .= ' WHERE MR.People_ID = P.Rec_ID AND MR.Current = 1 AND MR.Rank_ID IN (2,3,4) AND P.MemberStatus_ID = 2 AND MC.Chapter_ID = '.$chapter_ID; 
			$SQL .= ' ORDER BY P.LastName';

			$Result = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($Result)) {
				echo ('<option value="' .$Line->Rec_ID .'">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial.'</option>');
			}
			?>
	 		</select>&nbsp;&nbsp;
		</div></td></tr>
		<tr><td valign="top" colspan="5" id="Label"><div align="left">&nbsp;IA (2):&nbsp;<select name="AssistInstructor_2">
			<?php
			$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, MR.Rank_ID ';
			$SQL .= ' FROM People P ';
			$SQL .= ' INNER JOIN (Members_Chapter MC ';
			$SQL .= ' INNER JOIN Members_Rank MR ON MC.People_ID = MR.People_ID) ';
			$SQL .= ' ON P.Rec_ID = MC.People_ID ';
			$SQL .= ' WHERE MR.People_ID = P.Rec_ID AND MR.Current = 1 AND MR.Rank_ID IN (2,3,4) AND P.MemberStatus_ID = 2 AND MC.Chapter_ID = '.$chapter_ID; 
			$SQL .= ' ORDER BY P.LastName';

			$Result = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($Result)) {
				echo ('<option value="' .$Line->Rec_ID .'">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial.'</option>');
			}
			?>
	 		</select>&nbsp;&nbsp;
			IA (3):&nbsp;<select name="AssistInstructor_3">
			<?php
			$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, MR.Rank_ID ';
			$SQL .= ' FROM People P ';
			$SQL .= ' INNER JOIN (Members_Chapter MC ';
			$SQL .= ' INNER JOIN Members_Rank MR ON MC.People_ID = MR.People_ID) ';
			$SQL .= ' ON P.Rec_ID = MC.People_ID ';
			$SQL .= ' WHERE MR.People_ID = P.Rec_ID AND MR.Current = 1 AND MR.Rank_ID IN (2,3,4) AND P.MemberStatus_ID = 2 AND MC.Chapter_ID = '.$chapter_ID; 
			$SQL .= ' ORDER BY P.LastName';

			$Result = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($Result)) {
				echo ('<option value="' .$Line->Rec_ID .'">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial.'</option>');
			}
			?>
	 		</select>&nbsp;&nbsp;
		</div></td></tr>
		<tr><th>&nbsp;&nbsp;Name</th><th>Rank</th><th>Start Date</th><th>&nbsp;Photo&nbsp;</th><th>Attendance&nbsp;</th></tr>
<?php
		$LinkID=dbConnect($DB);

		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.MemberStatus_ID, P.DateJoined, P.portrait_URL, MR.Rank_ID ';
		$SQL .= ' FROM People P ';
		$SQL .= ' INNER JOIN (Members_Chapter MC ';
		$SQL .= ' INNER JOIN Members_Rank MR ON MC.People_ID = MR.People_ID) ';
		$SQL .= ' ON P.Rec_ID = MC.People_ID ';
		$SQL .= ' WHERE MR.People_ID = P.Rec_ID AND MR.Current = 1 AND P.MemberStatus_ID IN (1,2) AND MC.Chapter_ID = '.$chapter_ID; 
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		$php_variables = "?PGM=Members\&SCH=$school\&RID=$uRec_ID\&LGID=$login_ID\&SECL=$seclvl";
		$count = 0;
		while ($Line = mysql_fetch_object($Result)) 
			{
			$status = $Line->MemberStatus_ID;
			$rank_ID = $Line->Rank_ID;
			include 'sub_report_statuses.php';

			if ($rank_ID == 1) {$rank_desc = "Recruit";}
			elseif ($rank_ID == 2) {$rank_desc = "Scholler";}
			elseif ($rank_ID == 3) {$rank_desc = "Free Scholler"; $colour = "green";}
			else {$rank_desc = "Provost"; $colour = "brown";}

			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);">');

			echo ('<td OnClick="navBarClick(this,1,' . $Line->Rec_ID . ',\'' . $php_variables .'\')" style="vertical-align:middle"><div id="Data">&nbsp;&nbsp;'.$cross.'<font color="'.$colour.'">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>'); 
			echo ('<td OnClick="navBarClick(this,1,' . $Line->Rec_ID . ',\'' . $php_variables .'\')" style="vertical-align:middle"><div id="Data"><font color="'.$colour.'">' . $rank_desc . '</td>');
			echo ('<td OnClick="navBarClick(this,1,' . $Line->Rec_ID . ',\'' . $php_variables .'\')" style="vertical-align:middle" align="center"><div id="Data" align="left"><font color="'.$colour.'">' . $Line->DateJoined . '</td>');
	
			echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="' . $Line->portrait_URL . '" height="40" width="25" border="0" /><span><img src="' . $Line->portrait_URL . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial .'</span></a></td>');
			echo ('<td style="vertical-align:middle" align="center"><input type="checkbox" name ="recID_' . str_replace(' ', '', $Line->Rec_ID) . '" value="1"></td>');
			echo ('</tr>');
			$count++;
			}
		// enter last row after the last row of the while line was processed above
		echo ('<tr bgcolor="gray"><td colspan="5"><input type="hidden" name="SQL" value="'.$SQL.'"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total: </b>'.$count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		mysql_free_result($Result);
		dbClose($LinkID);
echo ('</table></form>');
include 'sub_report_legend.php';
?>
