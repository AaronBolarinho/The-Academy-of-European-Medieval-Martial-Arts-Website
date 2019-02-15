<?php
ini_set('display_errors', 'On');
// 	Program: 		SQL_fix_assign_chapterID_to_table_Members.php
//	Description: 	This script will build an array containing the member IDs and current Chapter membership and then apply that current Chapter membership
//					to all corresponding Members records in order to reduce the size and complexity of the SQL for retrieving student records under Resources
//	Author:			David M. Cvet
//
//	2019 ------------------
//
// begin set database and members only library paths
$members_only_path = "../../";	// the location of the members only scripts and files with respect to this calling script
$dbase_path = "../";				// the location of the database scripts and files with respect to this calling script
$ss_path = $dbase_path."ss_path.stuff"; include "$ss_path";
$db_path = $dbase_path."DB.php"; include "$db_path";
session_start();
$LinkID=dbConnect($DB);
// end setup database and members only library paths

$time = date('H:m:s');
echo ('<b>PGM: SQL_fix_assign_chapterID_to_table_Members</b> submitted: '.$time.'...<br /><br />');

// Retrieve "Member's current Chapter membership
$SQL  = 'SELECT Member_ID, Chapter_ID ';
$SQL .= 'FROM Members_Chapter ';
$SQL .= 'WHERE Current_Status = 1';
$Result = mysqli_query($LinkID, $SQL);
$Line = mysqli_fetch_object($Result);
$i = 0;
while ($Line = mysqli_fetch_object($Result))
	{
	$array_member_ID[$i]	 	= $Line->Member_ID;
	$array_chapter_ID[$i]		= $Line->Chapter_ID;
	$i++;
	}
$num_array_chapters = sizeof($array_member_ID);
echo ('1. Created an array of member ID and chapter IDs of <b>'.$num_array_chapters.'</b> elements.<br />');

// update the table Members with the Chapter IDs with their respective member record
for ($i=0;$i<$num_array_chapters;$i++)
	{
	$SQL = 'UPDATE Members SET Chapter_ID = "'.$array_chapter_ID[$i].'" WHERE Member_ID = '.$array_member_ID[$i];
	$Result = mysqli_query($LinkID, $SQL);
	}

echo ('2. Updated table: <b>Members</b> with Chapter IDs.<br />end program .....');


