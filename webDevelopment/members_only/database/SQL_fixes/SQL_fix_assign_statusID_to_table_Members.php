<?php
ini_set('display_errors', 'On');
// 	Program: 		SQL_fix_assign_statusID_to_table_Members.php
//	Description: 	This script will build an array containing the member IDs and current membership status and then apply that current Chapter membership
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
echo ('<b>PGM: SQL_fix_assign_statusID_to_table_Members.php</b> submitted: '.$time.'...<br /><br />');

// Retrieve "Member's current membership status
$SQL  = 'SELECT Member_ID, Status_ID ';
$SQL .= 'FROM Members_Status ';
$SQL .= 'WHERE Current_Status = 1';
$Result = mysqli_query($LinkID, $SQL);
$Line = mysqli_fetch_object($Result);
$i = 0;
while ($Line = mysqli_fetch_object($Result))
	{
	$array_member_ID[$i]	 	= $Line->Member_ID;
	$array_status_ID[$i]		= $Line->Status_ID;
	$i++;
	}
$num_array_status = sizeof($array_member_ID);
echo ('1. Created an array of member ID and status IDs of <b>'.$num_array_status.'</b> elements.<br />');

// update the table Members with the Status IDs with their respective member record
for ($i=0;$i<$num_array_status;$i++)
	{
	$SQL = 'UPDATE Members SET Status_ID = "'.$array_status_ID[$i].'" WHERE Member_ID = '.$array_member_ID[$i];
	$Result = mysqli_query($LinkID, $SQL);
	}

echo ('2. Updated table: <b>Members</b> with Status IDs.<br />end program .....');


