<?php
ini_set('display_errors','On');

// Function: sub_create_injuries_report.php
// Author: David M. Cvet
// Created: Nov 15, 2016
// Description:
//---------------------------
// Updates:
//	2016 ----------
// initialize variables
$member_ID 			= $_POST['MemID'];
$comma				= ", ";
$today 				= date("Y-m-d");
$injury_report_message		= "";
$injury_report_notes		= "";
$modal_colour_green		= "#5cb85c";	// green
$modal_colour_orange		= "orange";	// orange
$modal_colour_red		= "#c90a13";	// red
$modal_colour_flag		= 0;		// setting this flag to "1" indicates that a previous process has assign its prescribed colour, so, if it was green, and an error occurred in the following process, set the colour to orange, if not, set to red
$modal_title			= "<font color='black'><b>Dbase Injury Report Submission:</b></font></br />";
$modal_operation 		= "";
$modal_msg_footer 		= "";
$modal_header_bgcolor 		= $modal_colour_green;	// default header colour assigned
$modal_footer_bgcolor 		= $modal_colour_green;	// default footer colour to be assigned

// begin set database and members only library paths
$members_only_path = "../";	// the location of the members only scripts and files with respect to this calling script
$dbase_path = "";				// the location of the database scripts and files with respect to this calling script
$ss_path = $dbase_path."ss_path.stuff"; include "$ss_path";
$db_path = $dbase_path."DB.php"; include "$db_path";
session_start();
// test to determine if the initial database login session remains intact or the session has timed out before attempting to connect with the database
$session_expiration = $members_only_path."php-bin/sub_check_session_expiration.php"; include "$session_expiration";
$LinkID=dbConnect($DB);
// end setup database and members only library paths

if ($_POST['InjuryDate'] <> "")  {$injury_date = $_POST['InjuryDate'];} else {$injury_date = $today;}

// check to ensure that each injury report's elements has data in it before initiating the insertion operation
if ($_POST['InjuryDate'] <> "")
	{
	if ($_POST['InjuryLocation'] <> "")
		{
		if ($_POST['InjuryNotes'] <> "")
			{
			$injury_report_notes = $_POST['InjuryNotes'];
			// compose a SQL insert statement with the data provided
			$SQL_IN  = 'INSERT INTO Members_Injuries (Member_ID, Injury_Date, Injury_Location, Injury_Description, Recorded_By) ';
			$SQL_IN .= 'VALUES ('.$member_ID.', "'.$injury_date.'", "'.$_POST['InjuryLocation'].'","'.$_POST['InjuryNotes'].'","'.$_SESSION['UserID'].'")';
			$Result_IN = mysqli_query($LinkID, $SQL_IN);
			if (mysqli_errno($LinkID) == 0) 
				{
				$modal_operation .= " <font color='green'>Insertion of new injury report in <b>Members_Injuries</b> was SUCCESSFUL for record for member ID: ".$member_ID;
				$modal_operation .= " in <b>sub_create_injuries_report.php:84s</b> operating under userID: <b>".$_SESSION['UserID']."; </b></font>";
				$modal_msg_footer .= " Operation 84s was successful!";
				$modal_footer_bgcolor = $modal_colour_green;
				$modal_footer_bgcolor = $modal_colour_green;
				$pp_fields_changed = "new injuries report submitted";
				include "php-bin/sub_create_admin_log_record.php";
				}
			else
				{
				// the update to the newly inserted record has FAILED
				$modal_operation .= "<font color='red'> Insertion of new injury report record in <b>Members_Injuries</b> FAILED for member ID: ".$member_ID;
				$modal_operation .= " in <b>sub_create_injuries_report.php:84f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
				$modal_operation .= " <font color='red'>The SQL where the failure occurred: </font>".$SQL_IN."; ";
				$modal_msg_footer .= " Operation 84f FAILED!";
				$modal_footer_bgcolor = $modal_colour_red;
				$modal_footer_bgcolor = $modal_colour_red;
				}
			}
		else
			{
			$injury_report_message = "The injury report submitted did not contain a valid report description or it was empty. Please try again!";
			// the update to the newly inserted record has FAILED
			$modal_operation .= "<font color='red'> Insertion of new injury report record in <b>Members_Injuries</b> FAILED for member ID: ".$member_ID;
			$modal_operation .= " in <b>sub_create_injuries_report.php:84f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
			$modal_operation .= " <font color='red'><b>, because the injury report submitted had no report description entered!</b></font>";
			$modal_msg_footer .= " Operation 84f FAILED!";
			$modal_footer_bgcolor = $modal_colour_red;
			$modal_footer_bgcolor = $modal_colour_red;
			}
		}
	else
		{
		$injury_report_message = "The injury report submitted did not contain a valid location for the injury incurred or it was empty. Please try again!";
		// the update to the newly inserted record has FAILED
		$modal_operation .= "<font color='red'> Insertion of new injury report record in <b>Members_Injuries</b> FAILED for member ID: ".$member_ID;
		$modal_operation .= " in <b>sub_create_injuries_report.php:84f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
		$modal_operation .= " <font color='red'><b>, because the location field in the injury report submitted had no location!</b></font>";
		$modal_msg_footer .= " Operation 84f FAILED!";
		$modal_footer_bgcolor = $modal_colour_red;
		$modal_footer_bgcolor = $modal_colour_red;
		}
	}
else
	{
	$injury_report_message = "The injury report submitted did not contain a valid date for the injury incurred or it was empty. Please try again!";
	// the update to the newly inserted record has FAILED
	$modal_operation .= "<font color='red'> Insertion of new injury report record in <b>Members_Injuries</b> FAILED for member ID: ".$member_ID;
	$modal_operation .= " in <b>sub_create_injuries_report.php:84f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
	$modal_operation .= " <font color='red'><b>, because the date field in the injury report submitted had no date entered!</b></font>";
	$modal_msg_footer .= " Operation 84f FAILED!";
	$modal_footer_bgcolor = $modal_colour_red;
	$modal_footer_bgcolor = $modal_colour_red;
	}


// apply all of the text variables to the SESSION variables, these would've been consolidated at each
// step of the processing and therefore, the modal window may have a long message displayed
$_SESSION['modal_title'] = $modal_title;
$_SESSION['modal_operation'] = $modal_operation;
$_SESSION['modal_msg_footer'] = $modal_msg_footer;
$_SESSION['modal_header_bgcolor'] = $modal_header_bgcolor;	// colour assigned
$_SESSION['modal_footer_bgcolor'] = $modal_footer_bgcolor;	// colour assigned
//
echo ('<script type="text/JavaScript">');
// tab=1 for membership profile panel on return to main window
echo ('parent.location.href="Members_show.php?MID='.$member_ID.'&MOD=1&TAB=6&STATE=Update&IMSG='.$injury_report_message.'"');
echo ('</script>');
?>
