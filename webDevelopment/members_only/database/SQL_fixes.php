<?php
ini_set('display_errors','On');
//
// Program: SQL_fixes.php
// Author: David M. Cvet
// Created: Nov 07, 2016
// Description:
//	Use this to apply general fixes to the data within the database, such as creating data elements from other elements, etc.
//---------------------------
// Updates:
//	2016 ----------
//

// temporary state variable and value
//$state = "Update";
//
$aims = 1;					// flag to indicate that we are now in the AIMS database system, so the menu bar needs to be expanded by the AIMS menu item
$lang = "en";
$lang_num = 0;
$members_only_path = "../";			// the location of the members only scripts and files with respect to this calling script
$dbase_path = "";				// the location of the database scripts and files with respect to this calling script
$ss_path = $dbase_path."ss_path.stuff"; include "$ss_path";
$db_path = $dbase_path."DB.php"; include "$db_path";
session_start();
$LinkID=dbConnect($DB);

$SQL  = 'SELECT M.Member_ID, M.FirstName, M.LastName, MR.Current_Status FROM Members M, Members_Rank MR ';
$SQL .= 'WHERE M.Member_ID = MR.Member_ID AND MR.Rank_ID = 2 AND MR.Current_Status = 1 ';
$SQL .= 'ORDER BY LastName';
//echo ('debug:SQL_fixes.php:30:$SQL="'.$SQL.'"'); exit;
$i=0;
$Result = mysqli_query($LinkID, $SQL);
while ($Line = mysqli_fetch_object($Result))
	{
	$member_ID[$i] = $Line->Member_ID;
	$first_name[$i] = $Line->FirstName;
	$last_name[$i] = $Line->LastName;
	$file_name[$i] = "scholar".substr($first_name[$i],0,1).$last_name[$i].".jpg";
	$file_name[$i] = strtolower($file_name[$i]);
	$i++;
	}
$num_array = sizeof($member_ID);
echo ('Have retrieved '.$num_array.' records from Members');

// now update the records with the file name
$j=0;
for ($i=0; $i<=$num_array; $i++)
	{
	$SQL  = 'UPDATE Members SET Portrait_File = "'.$file_name[$i].'" ';
	$SQL .= 'WHERE Member_ID = '.$member_ID[$i];
	$Result = mysqli_query($LinkID, $SQL);
	$j++;
	}
echo ('processed '.$j.' records in Members. End Program.');
exit;
		
?>

