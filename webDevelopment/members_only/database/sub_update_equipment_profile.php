<?php
ini_set('display_errors','On');

// Function: sub_update_equipment_profile.php
// Author: David M. Cvet
// Created: Nov 13, 2016
// Description:
//---------------------------
// Updates:
//	2016 ----------
// initialize variable(s) used to compare existing values with updated values
$pp_fields_changed_flag		= 0;
$pp_fields_changed 		= "Table updated: Members_Equipment, Field(s) updated: ";
$pp_fields_changed_comma	= ", ";
$modal_colour_green		= "#5cb85c";	// green
$modal_colour_orange		= "orange";	// orange
$modal_colour_red		= "#c90a13";	// red
$modal_colour_flag		= 0;		// setting this flag to "1" indicates that a previous process has assign its prescribed colour, so, if it was green, and an error occurred in the following process, set the colour to orange, if not, set to red
$member_ID 			= $_POST['MemID'];
$comma				= " ";
$today 				= date("Y-m-d");
$admin_log_record		= 0;		// this is set to "1" or more should the operations to the relevant tables succeed, then ../php-bin/sub_create_admin_log_record.php is invoked

// initialize change flags for Members_Martial_Styles
$armour_desc_changed 		= 0;
$armour_status_changed 		= 0;
$armour_date_changed 		= 0;
$armour_file_changed 		= 0;
$unarmoured_desc_changed 	= 0;
$unarmoured_status_changed 	= 0;
$unarmoured_date_changed 	= 0;
$unarmoured_file_changed 	= 0;

// at this point, it is not clear if only Commandery changed or if some other variable related to tbl_Members 
// initialize variables
$modal_title			= "<font color='black'><b>Dbase Update Equipment Profile:</b></font></br />";
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

// retrieve the user's current equipment profile
$SQL_kit  = 'SELECT Member_ID, Armour_Description, Armour_Status, Armour_Date, Armour_URL, Armour_File, Unarmoured_Description, Unarmoured_Status, Unarmoured_Date, Unarmoured_URL, Unarmoured_File ';
$SQL_kit .= 'FROM Members_Equipment ';
$SQL_kit .= 'WHERE Member_ID = '.$member_ID;
$Result_kit = mysqli_query($LinkID, $SQL_kit);
if (mysqli_num_rows($Result_kit) > 0) 
	{
	while ($Line_kit = mysqli_fetch_object($Result_kit)) {
		$armour_description	= $Line_kit->Armour_Description;
		$armour_status		= $Line_kit->Armour_Status;
		$armour_date		= $Line_kit->Armour_Date;
		$armour_file		= $Line_kit->Armour_File;
		$unarmoured_description	= $Line_kit->Unarmoured_Description;
		$unarmoured_status	= $Line_kit->Unarmoured_Status;
		$unarmoured_date	= $Line_kit->Unarmoured_Date;
		$unarmoured_file	= $Line_kit->Unarmoured_File;
		$equipment_record_exists = 1;
		}
	}
else
	{
	$armour_description	= "";
	$armour_status		= "";
	$armour_date		= $today;
	$armour_URL		= "images/kits_armoured";
	$armour_file		= "armour_placeholder.jpg";
	$unarmoured_description	= "";
	$unarmoured_status	= "";
	$unarmoured_date	= $today;
	$unarmoured_URL		= "images/kits_unarmoured";
	$unarmoured_file	= "unarmoured_placeholder.jpg";
	$equipment_record_exists = 0;
	}

// compare before and after values, and if there's a change, then create a change list which will be used to echo the changes to the browser
// and record the changes in the change log table, along with the username and date
//
// equipment values comparisons with current data in database with data retrieved from equipment profile form
if ($_POST['ArmourStatus'] <> $armour_status) 
	{
	$armour_status_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "armour status"; $pp_fields_changed_flag ++; 
	}
if ($_POST['ArmourDate'] <> $armour_date) 
	{
	$armour_date_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "armour date"; $pp_fields_changed_flag ++; 
	}
if ($_POST['ArmourFile'] <> $armour_file) 
	{
	$armour_file_changed = 1; 
	$armour_file = $_POST['ArmourFile'];
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "armour file"; $pp_fields_changed_flag ++; 
	}
if ($_POST['ArmourDesc'] <> $armour_description) 
	{
	$armour_desc_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "armour description"; $pp_fields_changed_flag ++; 
	}
if ($_POST['UnarmouredStatus'] <> $unarmoured_status) 
	{
	$unarmoured_status_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "unarmoured status"; $pp_fields_changed_flag ++; 
	}
if ($_POST['UnarmouredDate'] <> $unarmoured_date) 
	{
	$unarmoured_date_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "unarmoured date"; $pp_fields_changed_flag ++; 
	}
if ($_POST['UnarmouredFile'] <> $unarmoured_file) 
	{
	$unarmoured_file_changed = 1; 
	$unarmoured_file = $_POST['UnarmouredFile'];
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "unarmoured file"; $pp_fields_changed_flag ++; 
	}
if ($_POST['UnarmouredDesc'] <> $unarmoured_description) 
	{
	$unarmoured_desc_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "unarmoured description"; $pp_fields_changed_flag ++; 
	}

// check if the fields changed flag has been incremented indicating at least one change has happened
// changed should there be only the one change (($pp_fields_changed_flag = 1)
if ($pp_fields_changed_flag)
	{
	if ($equipment_record_exists)
		{
		// an equipment record exists for this individual
		$SQL_kit = 'UPDATE Members_Equipment SET ';
		if ($armour_status_changed) 	{$SQL_kit .= 'Armour_Status = "'.$_POST['ArmourStatus'].'", ';}
		if ($armour_date_changed) 	{$SQL_kit .= 'Armour_Date = "'.$_POST['ArmourDate'].'", ';}
		if ($armour_file_changed) 	{$SQL_kit .= 'Armour_File = "'.$_POST['ArmourFile'].'", ';}
		if ($armour_desc_changed) 	{$SQL_kit .= 'Armour_Description = "'.$_POST['ArmourDesc'].'", ';}
		if ($unarmoured_status_changed) {$SQL_kit .= 'Unarmoured_Status = "'.$_POST['UnarmouredStatus'].'", ';}
		if ($unarmoured_date_changed) 	{$SQL_kit .= 'Unarmoured_Date = "'.$_POST['UnarmouredDate'].'", ';}
		if ($unarmoured_file_changed) 	{$SQL_kit .= 'Unarmoured_File = "'.$_POST['UnarmouredFile'].'", ';}
		if ($unarmoured_desc_changed) 	{$SQL_kit .= 'Unarmoured_Description = "'.$_POST['UnarmouredDesc'].'", ';}
		$SQL_kit .= 'Member_ID = '.$member_ID.' ';
		$SQL_kit .= 'WHERE Member_ID = '.$member_ID;
		}
	else
		{
		// even though this individual exists in the database, there was probably no equipment record associated with this individual and therefore,
		// this becomes an insertion operation
		$SQL_kit  = 'INSERT INTO Members_Equipment (Member_ID, Armour_Description, Armour_Status, Armour_Date, Armour_URL, Armour_File, Unarmoured_Description, Unarmoured_Status, Unarmoured_Date, Unarmoured_URL, Unarmoured_File) ';
		$SQL_kit .= 'VALUES ('.$member_ID.',"'.$_POST['ArmourDesc'].'","'.$_POST['ArmourStatus'].'","'.$_POST['ArmourDate'].'","'.$armour_URL.'","'.$armour_file.'", "';
		$SQL_kit .= $_POST['UnarmouredDesc'].'","'.$_POST['UnarmouredStatus'].'","'.$_POST['UnarmouredDate'].'","'.$unarmoured_URL.'","'.$unarmoured_file.'")';
		}
	$Result_kit = mysqli_query($LinkID, $SQL_kit);
	if (mysqli_errno($LinkID) == 0) 
		{
		// update to Members_Matial_Styles was successful
		$modal_operation .= "<font color='green'>The update(s) of the member's equipment record to table <b>Members_Equipment</b> was successfull for member ID: ".$member_ID."; ";
		$modal_operation .= "in <b>sub_update_equipment_profile.php:132s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
		$modal_msg_footer .= "Operation 132s was successful!";
		$modal_header_bgcolor = $modal_colour_green;	// green
		$modal_footer_bgcolor = $modal_colour_green;	// green
		$pp_fields_changed .= ", updated equipment record in Members_Equipment";
		$modal_colour_flag = 1;
		$admin_log_record++;
		}
	else
		{
		$modal_operation .= "<font color='red'>The update(s) of the member's equipment record to table <b>Members_Equipment</b> FAILED for member ID: ".$member_ID." ";
		$modal_operation .= "in <b>sub_update_equipment_profile.php:132f</b> operating under userID: <b>".$_SESSION['UserID']."</b><br />The SQL where the failure occurred: </font>".$SQL_kit."; ";
		$modal_msg_footer .= "Operation 132f FAILED!";
		$modal_header_bgcolor = $modal_colour_red;	// red
		$modal_footer_bgcolor = $modal_colour_red;	// red
		}
	if ($admin_log_record) { include "php-bin/sub_create_admin_log_record.php"; }  // record a log record of the operations applied
	} // end of $pp_fields_changed_flag
else
	{
	// none of the fields have changed, do nothing and inform the browser of this fact
	$modal_operation .= " <font color='red'>No updates/changes were made to member's record in <b>Members_Martial_Styles</b> or <b>Members_Training_Notes</b> for recent operation on member ID: ".$member_ID;
	$modal_operation .= " in <b>sub_update_equipment_profile.php:119f</b> operating under userID: <b>".$_SESSION['UserID'].".</b>. Please try again and update one or more fields.";
	$modal_msg_footer .= $comma." Operation 119f NOT applied!";
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
echo ('parent.location.href="Members_show.php?MID='.$member_ID.'&MOD=1&TAB=4&STATE=Update"');
echo ('</script>');
?>
