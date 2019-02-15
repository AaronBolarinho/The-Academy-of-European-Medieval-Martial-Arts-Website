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
		<form name="Members" method="post" action="index.php?PGM=attendance_process&SCH=<?=$school?>&LGID=<?=$login_ID?>&SECL=<?=$seclvl?>">
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
		echo ('<tr><td id="Label" colspan="5" bgcolor="#FDD017" ><div align="center"><b>* * * Committed * * *</b></div></td></tr>');
		$LinkID=dbConnect($DB);
		$membertype_ID = 1;
		include 'sub_attendance_class.php';
		$SQL_1 = $SQL;
		echo ('<tr><td id="Label" colspan="5" bgcolor="#FDD017" ><div align="center"><b>* * * Casual * * *</b></div></td></tr>');
		$membertype_ID = 2;
		include 'sub_attendance_class.php';
		$SQL_2 = $SQL;

		echo ('<tr><td id="Label" colspan="5" bgcolor="#FDD017" ><div align="center"><b>* * * Occassional * * *</b></div></td></tr>');
		$membertype_ID = 3;
		include 'sub_attendance_class.php';
		$SQL_3 = $SQL;

		echo ('<tr><td id="Label" colspan="5" bgcolor="#FDD017" ><div align="center"><b>* * * Exec / Instructor * * *</b></div></td></tr>');
		$membertype_ID = 57;
		include 'sub_attendance_class.php';
		$SQL_57 = $SQL;
		echo ('<input type="hidden" name="SQL1" value="'.$SQL_1.'"><input type="hidden" name="SQL2" value="'.$SQL_2.'"><input type="hidden" name="SQL3" value="'.$SQL_3.'"><input type="hidden" name="SQL57" value="'.$SQL_57.'">');
		dbClose($LinkID);
echo ('<tr><td align="center"  colspan="5"><input type="submit" value="Submit" name="button"><br />&nbsp;</td></tr></table></form>');
//include 'sub_report_legend.php';
?>
