<?php
ini_set('display_errors','On');
//
// Program: SQL_fixes_training_notes.php
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

// retrieve the relevant records of interest
$SQL  = 'SELECT Member_ID, Date_Joined, PaymentReceived, TrainingComments FROM Members ';
$SQL .= 'WHERE TrainingComments <> ""';
//echo ('debug:SQL_fixes.php:30:$SQL="'.$SQL.'"'); exit;
$i=0;
$Result = mysqli_query($LinkID, $SQL);
while ($Line = mysqli_fetch_object($Result))
	{
	$member_ID[$i] = $Line->Member_ID;
	$date_joined[$i] = $Line->Date_Joined;
	$payment_received[$i] = $Line->PaymentReceived;
	$training_comments[$i] = $Line->TrainingComments;
	$i++;
	}
$num_array = sizeof($date_joined);
echo ('Have retrieved '.$num_array.' records from Members');

// now insert the training notes
$i=0;
for ($i=0; $i<$num_array; $i++)
	{
	$SQL  = 'INSERT INTO Members_Training_Notes (Member_ID, Member_Notes_Date, Member_Notes) ';
	if ($payment_received[$i] == "") { $note_date = $date_joined[$i]; } else { $note_date = $payment_received[$i]; }
	$SQL .= 'VALUES ('.$member_ID[$i].', "'.$note_date.'", "'.$training_comments[$i].'")';
	$Result = mysqli_query($LinkID, $SQL);
	}
echo ('processed '.$i.' records in Members. End Program...again');
exit;
		
?>

