<?php
// Function: sub_create_postit.php
// Author: David M. Cvet
// Created: Nov 17, 2016
// Description: Should this be a new system, the Post_it table may be empty
//---------------------------
// Updates:
//	2016 ----------

// initialize modal variables
$modal_title		= "<font color='black'><b>Dbase Create New Post-it:</b></font></br />";
$modal_operation 	= "";
$modal_msg_footer 	= "";
$modal_colour_green	= "#5cb85c";		// green
$modal_colour_orange	= "orange";		// orange
$modal_colour_red	= "#c90a13";		// red
$modal_colour_flag	= 0;			// setting this flag to "1" indicates that a previous process has assign its prescribed colour, so, if it was green, and an error occurred in the following process, set the colour to orange, if not, set to red
$modal_header_bgcolor 	= $modal_colour_green;	// default header colour assigned
$modal_footer_bgcolor 	= $modal_colour_green;	// default footer colour to be assigned

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

if (isset($_POST["PostitCheck"])) { $postit_check = 1;} else { $postit_check = 0;}

// given that this is a "create" form, insert record into Post_it
$SQL  = 'INSERT INTO Post_it (Enabled, Announcement_en, Click_Statement_en, Announcement_fr, Click_Statement_fr, Date) ';
$SQL .= 'VALUES ('.$postit_check.', "'.$_POST['AnnounceEN'].'","'.$_POST['ClickEN'].'","'.$_POST['AnnounceFR'].'","'.$_POST['ClickFR'].'","'.$_POST['PostitDate'].'")';
$Result = mysqli_query($LinkID, $SQL);
if (mysqli_errno($LinkID) == 0) 
	{
	// the insertion operation to Post_it was successful 
		if ($postit_check)
			{ $modal_operation .= "<font color='green'>GIMS has successfully inserted a new Post-it into <b>Post_it</b> for the Post-it and is <b>==> activated <==</b>."; }
		else
			{ $modal_operation .= "<font color='green'>GIMS has successfully inserted a new Post-it into <b>Post_it</b> for the Post-it and is <b>==> de-activated <==</b>."; }
	$modal_operation .= "executing function in <b>sub_create_postit.php:33s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
	$modal_msg_footer .= "Operation 33s was successful!";
	$modal_header_bgcolor = $modal_colour_green;	// green
	$modal_footer_bgcolor = $modal_colour_green;	// green

	// We create a blank record in tbl_Admin_log in order to generate the next index_num, then pass through to update that new record with admin log details.
	$pp_fields_changed = "Table insertion: Post_it: insert Post-it";
	include "php-bin/sub_create_admin_log_record.php";
	}
else
	{
	// the update failed with respect to the existing record in Post_it
	// generate a modal popup indicating the FAILED operation
	$modal_operation .= "<font color='red'>GIMS has FAILED inserting a new Post-it record in <b>Post_it</b> ";
	$modal_operation .= " executing function in <b>sub_create_postit.php:33f</b> operating under userID: <b>".$_SESSION['UserID']."</b>.<br />The SQL where the failure occurred: </font>".$SQL."; ";
	$modal_msg_footer .= "Insertion operation FAILED!";
	$modal_header_bgcolor = $modal_colour_red;	// red
	$modal_footer_bgcolor = $modal_colour_red;	// red
	}

// apply all of the text variables to the SESSION variables, these would've been consolidated at each
// step of the processing and therefore, the modal window may have a long message displayed
$_SESSION['modal_title'] = $modal_title;
$_SESSION['modal_operation'] = $modal_operation;
$_SESSION['modal_msg_footer'] = $modal_msg_footer;
$_SESSION['modal_header_bgcolor'] = $modal_header_bgcolor;	// colour assigned
$_SESSION['modal_footer_bgcolor'] = $modal_footer_bgcolor;	// colour assigned

echo ('<script type="text/JavaScript">');
// tab=0 for personal profile panel on return to main window
echo ('parent.location.href="dbase_functions_postit.php?MOD=1"');
echo ('</script>');

?>
