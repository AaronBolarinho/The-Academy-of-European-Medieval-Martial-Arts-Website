<?php
ini_set('display_errors','On');

// Function: sub_update_postit.php
// Author: David M. Cvet
// Created: Nov 20, 2016
// Description:
//---------------------------
// Updates:
//	2016 ----------
// initialize variable(s) used to compare existing values with updated values
$pp_fields_changed_flag		= 0;
$pp_fields_changed_comma	= ", ";
$modal_title			= "<font color='black'><b>Dbase Enable/Disable Post-it:</b></font></br>";
$modal_colour_green		= "#5cb85c";	// green
$modal_colour_orange		= "orange";	// orange
$modal_colour_red		= "#c90a13";	// red
$modal_colour_flag		= 0;		// setting this flag to "1" indicates that a previous process has assign its prescribed colour, so, if it was green, and an error occurred in the following process, set the colour to orange, if not, set to red
$modal_operation 		= "";
$modal_msg_footer 		= "";
$modal_header_bgcolor 		= $modal_colour_green;	// default header colour assigned
$modal_footer_bgcolor 		= $modal_colour_green;	// default footer colour to be assigned
// tally up any changes made to tbl_Login table only!!
// initialize change flags and counters
$pp_fields_changed		= "Table updated: Post_it, Field(s) updated: ";
$ENBL_changed 			= 0;
$AEN_changed 			= 0; 
$CEN_changed 			= 0; 
$AFR_changed 			= 0; 
$CFR_changed 			= 0;
$DT_changed 			= 0;
$postit_check 			= 0;

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

// Retrieve current Post-it record data from GIMS
//
$SQL  = 'SELECT Index_ID, Enabled, Announcement_en, Click_Statement_en, Announcement_fr, Click_Statement_fr, Date ';
$SQL .= 'FROM Post_it ';
$Result = mysqli_query($LinkID, $SQL);
$Line_Postit = mysqli_fetch_object($Result);

// compare before and after values, and if there's a change, then create a change list which will be used to echo the changes to the browser
// and record the changes in the change log table, along with the username and date
//

//echo ('debug:sub_update_postit:51:$_POST["PostitCheck"]="'.$_POST["PostitCheck"].'"');

if (isset($_POST["PostitCheck"]))
	{
	if ($_POST["PostitCheck"] <> $Line_Postit->Enabled) { $postit_check = 1; $ENBL_changed = 1; $pp_fields_changed_flag++; }
	}
else
	{
	if ($Line_Postit->Enabled == 1)  { $postit_check = 0; $ENBL_changed = 1; $pp_fields_changed_flag++; }
	}
if ($Line_Postit->Announcement_en <> $_POST["AnnounceEN"]) 
	{
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; }
	$pp_fields_changed .= "annoucement (English)"; $pp_fields_changed_flag ++; 
	$AEN_changed = 1; 
	}
if ($Line_Postit->Click_Statement_en <> $_POST["ClickEN"]) 
	{
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } 
	$pp_fields_changed .= "click text (English)"; $pp_fields_changed_flag ++; 
	$CEN_changed = 1; 
	}
if ($Line_Postit->Announcement_fr <> $_POST["AnnounceFR"]) 
	{
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; }
	$pp_fields_changed .= "annoucement (French)"; $pp_fields_changed_flag ++; 
	$AFR_changed = 1; 
	}
if ($Line_Postit->Click_Statement_fr <> $_POST["ClickFR"]) 
	{
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } 
	$pp_fields_changed .= "click text (French)"; $pp_fields_changed_flag ++; 
	$CFR_changed = 1; 
	}
if ($Line_Postit->Date <> $_POST["PostitDate"]) 
	{
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } 
	$pp_fields_changed .= "date change"; $pp_fields_changed_flag ++; 
	$DT_changed = 1; 
	}

// check if the fields changed flag has been incremented indicating at least one change has happened
// changed should there be only the one change (($pp_fields_changed_flag = 1)
if ($pp_fields_changed_flag)
	{
	// Save Post_it information
	$SQL  = 'UPDATE Post_it SET ';
	if ($ENBL_changed)
		{ $SQL .= 'Enabled		=  '.$postit_check.', '; }
	if ($AEN_changed)
		{ $SQL .= 'Announcement_en	= "'.$_POST["AnnounceEN"].'", '; }
	if ($CEN_changed)
		{ $SQL .= 'Click_Statement_en	= "'.$_POST["ClickEN"].'", '; }
	if ($AFR_changed)
		{ $SQL .= 'Announcement_fr	= "'.$_POST["AnnounceFR"].'", '; }
	if ($CFR_changed)
		{ $SQL .= 'Click_Statement_fr	= "'.$_POST["ClickFR"].'", '; }
	if ($DT_changed)
		{ $SQL .= 'Date			= "'.$_POST["PostitDate"].'", '; }
	$SQL .= 'Index_ID 			=  '.$Line_Postit->Index_ID.' ';
	$SQL .= 'WHERE Index_ID			=  '.$Line_Postit->Index_ID.' ';
	$Result = mysqli_query($LinkID, $SQL);
	if (mysqli_errno($LinkID) == 0) 
		{
		// the update(s) were successful with respect to the Post-it
		if ($postit_check)
			{ $modal_operation .= "<font color='green'> The update(s) to table <b>Post_it</b> were successfully updated for the Post-it and is <b>==> activated <==</b>."; }
		else
			{ $modal_operation .= "<font color='green'> The update(s) to table <b>Post_it</b> were successfully updated for the Post-it and is <b>==> de-activated <==</b>."; }

		$modal_operation .= " in <b>sub_update_postit.php:101s</b> operating under userID: <b>".$_SESSION['UserID']."; </b></font>";
		$modal_msg_footer .= $pp_fields_changed_comma."Operation 101s was successful!";
		$modal_header_bgcolor = $modal_colour_green;
		$modal_footer_bgcolor = $modal_colour_green;

		// We create a blank record in tbl_Admin_log in order to generate the next index_num, then pass through to update that new record with admin log details.
		include "php-bin/sub_create_admin_log_record.php";
		}
	else
		{
		// the update failed with respect to the existing Post-it record in Post_it
		$modal_operation .= "<font color='red'> The update to table <b>Post_it</b> FAILED to update the Post-it";
		$modal_operation .= " in <b>sub_update_postit.php:101f</b> operating under userID: <b>".$_SESSION['UserID']."</b> The SQL where the failure occurred: </font>".$SQL."; ";
		$modal_msg_footer .= $pp_fields_changed_comma."Operation 101f FAILED!";
		$modal_header_bgcolor = $modal_colour_red;
		$modal_footer_bgcolor = $modal_colour_red;
		}
	} // end of $pp_fields_changed_flag

else
	{
	// none of the fields have changed, do nothing and inform the browser of this fact
	$modal_operation .= " <font color='red'>No updates/changes were made to the Post-it record in <b>Post_it</b> for recent operation on a Post-it record";
	$modal_operation .= " in <b>sub_update_postit.php:133f</b> operating under userID: <b>".$_SESSION['UserID'].".</b>.</font> Please try again and update one or more fields.";
	$modal_msg_footer .= $pp_fields_changed_comma." Operation 133f NOT applied!";
	$modal_footer_bgcolor = $modal_colour_orange;
	$modal_footer_bgcolor = $modal_colour_orange;
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
echo ('parent.location.href="dbase_functions_postit.php?MOD=1"');
echo ('</script>');
?>
