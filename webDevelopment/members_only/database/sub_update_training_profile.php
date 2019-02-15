<?php
ini_set('display_errors','On');

// Function: sub_update_training_profile.php
// Author: David M. Cvet
// Created: Nov 12, 2016
// Description:
//---------------------------
// Updates:
//	2016 ----------
// initialize variable(s) used to compare existing values with updated values
$pp_fields_changed_flag		= 0;
$pp_fields_changed 		= "Table updated: Members_Martial_Styles, Field(s) updated: ";
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
$abrazare_check_changed 	= 0;
$daga_check_changed 		= 0;
$spada_check_changed 		= 0;
$spada_longa_check_changed 	= 0;
$sword_buckler_check_changed 	= 0;
$azza_check_changed 		= 0;
$lanze_check_changed 		= 0;
$armoured_check_changed 	= 0;
$archery_check_changed 		= 0;
$mounted_check_changed 		= 0;
$irapier_check_changed 		= 0;
$quarterstaff_check_changed 	= 0;
$langesscwert_check_changed	= 0;
// initialize change flags for Members_Training_Notes
$training_notes_date_changed	= 0;
$training_notes_changed		= 0;
$training_notes_total		= 0;	// this flag will be set to "1" if both training notes date and training notes have content, otherwise, don't do any updates
$martial_styles_total		= 0;	// this flag will be set to "1" if one or more martial styles checkboxes were checked, otherwise, don't do any updates


// at this point, it is not clear if only Commandery changed or if some other variable related to tbl_Members 
// initialize variables
$modal_title			= "<font color='black'><b>Dbase Update Training Profile:</b></font></br />";
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

// retrieve the user's martial styles studied and trained
$SQL_MS  = 'SELECT Member_ID, abrazare, daga, spada, spadalonga, swordbuckler, azza, lanze, armouredcombat, quarterstaff, archery, langesschwert, mountedcombat, irapier FROM Members_Martial_Styles ';
$SQL_MS .= 'WHERE Member_ID = '. $member_ID.' ';
$Result_MS = mysqli_query($LinkID, $SQL_MS);
if (mysqli_num_rows($Result_MS) > 0) 
	{
	while ($Line_MS = mysqli_fetch_object($Result_MS)) {
		$abrazare_check 	= $Line_MS->abrazare;
		$daga_check  		= $Line_MS->daga;
		$spada_check  		= $Line_MS->spada;
		$spada_longa_check  	= $Line_MS->spadalonga;
		$sword_buckler_check  	= $Line_MS->swordbuckler;
		$azza_check  		= $Line_MS->azza;
		$lanze_check  		= $Line_MS->lanze;
		$armoured_check  	= $Line_MS->armouredcombat;
		$archery_check  	= $Line_MS->archery;
		$irapier_check  	= $Line_MS->irapier;
		$mounted_check  	= $Line_MS->mountedcombat;
		$quarterstaff_check  	= $Line_MS->quarterstaff;
		$langesschwert_check  	= $Line_MS->langesschwert;
		$martial_styles_record_exists = 1;  // this will determine whether or not to insert a new record (if one doesn't exist) or update an existing record
		}
	}
else
	{
	$abrazare_check 	= 0;
	$daga_check  		= 0;
	$spada_check  		= 0;
	$spada_longa_check  	= 0;
	$sword_buckler_check  	= 0;
	$azza_check  		= 0;
	$lanze_check  		= 0;
	$armoured_check  	= 0;
	$archery_check  	= 0;
	$irapier_check  	= 0;
	$mounted_check  	= 0;
	$quarterstaff_check  	= 0;
	$langesschwert_check  	= 0;
	$martial_styles_record_exists = 0;
	}

// compare before and after values, and if there's a change, then create a change list which will be used to echo the changes to the browser
// and record the changes in the change log table, along with the username and date
//
// martial styles checkboxes values comparisons
if (isset($_POST['Abrazare'])) 
	{
	// the checkbox was checked and has been assigned "1", as this is the only time the POST variable is passed to this function
	$abrazare_check_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "abrazare checkbox"; $pp_fields_changed_flag ++; 
	}
if (isset($_POST['Daga'])) 
	{
	// the checkbox was checked and has been assigned "1", as this is the only time the POST variable is passed to this function
	$daga_check_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "daga checkbox"; $pp_fields_changed_flag ++; 
	}
if (isset($_POST['Spada'])) 
	{
	// the checkbox was checked and has been assigned "1", as this is the only time the POST variable is passed to this function
	$spada_check_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "spada checkbox"; $pp_fields_changed_flag ++; 
	}
if (isset($_POST['Spadalonga'])) 
	{
	// the checkbox was checked and has been assigned "1", as this is the only time the POST variable is passed to this function
	$spada_longa_check_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "spada longa checkbox"; $pp_fields_changed_flag ++; 
	}
if (isset($_POST['SwordBuckler'])) 
	{
	// the checkbox was checked and has been assigned "1", as this is the only time the POST variable is passed to this function
	$sword_buckler_check_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "sword and buckler checkbox"; $pp_fields_changed_flag ++; 
	}
if (isset($_POST['Azza'])) 
	{
	// the checkbox was checked and has been assigned "1", as this is the only time the POST variable is passed to this function
	$azza_check_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "azza checkbox"; $pp_fields_changed_flag ++; 
	}
if (isset($_POST['Lanze'])) 
	{
	// the checkbox was checked and has been assigned "1", as this is the only time the POST variable is passed to this function
	$lanze_check_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "lanze checkbox"; $pp_fields_changed_flag ++; 
	}
if (isset($_POST['Armoured'])) 
	{
	// the checkbox was checked and has been assigned "1", as this is the only time the POST variable is passed to this function
	$armoured_check_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "armoured checkbox"; $pp_fields_changed_flag ++; 
	}
if (isset($_POST['Archery'])) 
	{
	// the checkbox was checked and has been assigned "1", as this is the only time the POST variable is passed to this function
	$archery_check_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "archery checkbox"; $pp_fields_changed_flag ++; 
	}
if (isset($_POST['Mounted'])) 
	{
	// the checkbox was checked and has been assigned "1", as this is the only time the POST variable is passed to this function
	$mounted_check_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "mounted combat checkbox"; $pp_fields_changed_flag ++; 
	}
if (isset($_POST['Irapier'])) 
	{
	// the checkbox was checked and has been assigned "1", as this is the only time the POST variable is passed to this function
	$irapier_check_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "italian rapier checkbox"; $pp_fields_changed_flag ++; 
	}
if (isset($_POST['Quarterstaff'])) 
	{
	// the checkbox was checked and has been assigned "1", as this is the only time the POST variable is passed to this function
	$quarterstaff_check_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "quarterstaff checkbox"; $pp_fields_changed_flag ++; 
	}
$martial_styles_total = $abrazare_check_changed + $daga_check_changed + $spada_check_changed + $spada_longa_check_changed + $sword_buckler_check_changed + $azza_check_changed + $lanze_check_changed + $armoured_check_changed + $archery_check_changed + $mounted_check_changed + $irapier_check_changed + $quarterstaff_check_changed;

// check if training notes and date entered
if (isset($_POST['TrainingNotes'])) 
	{
	if ($_POST['TrainingNotes'] <> "")
		{ $training_notes_changed = 1; }
	}
if (isset($_POST['TrainingNotes_Date'])) 
	{
	if ($_POST['TrainingNotes_Date'] == "")
		{
		if ($training_notes_changed)
			{ 
			$training_notes_date_changed = 1;
			$training_notes_date = $today;
			}
		else
			{$training_notes_date_changed = 0;}
		}
	else
		{
		if ($training_notes_changed)
			{ 
			$training_notes_date_changed = 1;
			$training_notes_date = $_POST['TrainingNotes_Date'];
			}
		else
			{$training_notes_date_changed = 0;}
		}
	}
$training_notes_total = $training_notes_changed + $training_notes_date_changed;

// check if the fields changed flag has been incremented indicating at least one change has happened
// changed should there be only the one change (($pp_fields_changed_flag = 1)
if ($pp_fields_changed_flag)
	{
	if ($martial_styles_total > 0)
		{
		// checked if a member's martial styles record actually exists, as sometimes, a new record is entered, but martial styles record was not created or doesn't exist
		if ($martial_styles_record_exists)
			{
			$SQL_m = 'UPDATE Members_Martial_Styles SET ';
			$SQL_m .= 'abrazare = '.$abrazare_check_changed.' '; $comma = ", ";
			$SQL_m .= $comma.'daga = '.$daga_check_changed.' '; $comma = ", ";
			$SQL_m .= $comma.'spada = '.$spada_check_changed.' '; $comma = ", ";
			$SQL_m .= $comma.'spadalonga = '.$spada_longa_check_changed.' '; $comma = ", ";
			$SQL_m .= $comma.'swordbuckler = '.$sword_buckler_check_changed.' '; $comma = ", ";
			$SQL_m .= $comma.'azza = '.$azza_check_changed.' '; $comma = ", ";
			$SQL_m .= $comma.'lanze = '.$lanze_check_changed.' '; $comma = ", ";
			$SQL_m .= $comma.'armouredcombat = '.$armoured_check_changed.' '; $comma = ", ";
			$SQL_m .= $comma.'Archery = '.$archery_check_changed.' '; $comma = ", ";
			$SQL_m .= $comma.'mountedcombat = '.$mounted_check_changed.' '; $comma = ", ";
			$SQL_m .= $comma.'irapier = '.$irapier_check_changed.' '; $comma = ", ";
			$SQL_m .= $comma.'quarterstaff = '.$quarterstaff_check_changed.' ';
			$SQL_m .= 'WHERE Member_ID = '.$member_ID;
			$Result_m = mysqli_query($LinkID, $SQL_m);
			if (mysqli_errno($LinkID) == 0) 
				{
				// update to Members_Matial_Styles was successful
				$modal_operation .= "<font color='green'>The update(s) of the martial styles record to table <b>Members_Matial_Styles</b> was successfull for member ID: ".$member_ID."; ";
				$modal_operation .= "in <b>sub_update_training_profile.php:272s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
				$modal_msg_footer .= "Operation 272s was successful!";
				$modal_header_bgcolor = $modal_colour_green;	// green
				$modal_footer_bgcolor = $modal_colour_green;	// green
				$pp_fields_changed .= ", updated martial styles record in Members_Martial_Styles";
				$modal_colour_flag = 1;
				$admin_log_record++;
				}
			else
				{
				$modal_operation .= "<font color='red'>The update(s) of martial styles record to table <b>Members_Matial_Styles</b> FAILED for member's martial styles record for member ID: ".$member_ID." ";
				$modal_operation .= "in <b>sub_update_training_profile.php:272f</b> operating under userID: <b>".$_SESSION['UserID']."</b><br />The SQL where the failure occurred: </font>".$SQL_m."; ";
				$modal_msg_footer .= "Operation 272f FAILED!";
				$modal_header_bgcolor = $modal_colour_red;	// red
				$modal_footer_bgcolor = $modal_colour_red;	// red
				$modal_colour_flag = 1;
				}
			}
		else
			{
			// the member's martial styles record doesn't exist and therefore, this is an insertion operation
			$SQL_mi  = 'INSERT INTO Members_Martial_Styles (Member_ID, abrazare, daga, spada, spadalonga, swordbuckler, azza, lanze, armouredcombat, quarterstaff, archery, langesschwert, mountedcombat, irapier) ';
			$SQL_mi .= 'VALUES ('.$member_ID.','.$abrazare_check_changed.','.$daga_check_changed.','.$spada_check_changed.','.$spada_longa_check_changed.','.$sword_buckler_check_changed.','.$azza_check_changed.','.$lanze_check_changed.','.$armoured_check_changed.','.$quarterstaff_check_changed.','.$archery_check_changed.','.$langesscwert_check_changed.','.$mounted_check_changed.','.$irapier_check_changed.')';
			$Result_mi = mysqli_query($LinkID, $SQL_mi);
			if (mysqli_errno($LinkID) == 0) 
				{
				$modal_operation .= "<font color='green'>The insertion to table <b>Members_Martial_Styles</b> was successfull for member's martial styles checked record for member ID: ".$member_ID."; ";
				$modal_operation .= "in <b>sub_update_training_profile.php:263s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
				$modal_msg_footer .= "Operation 263s was successful!";
				$modal_header_bgcolor = $modal_colour_green;	// green
				$modal_footer_bgcolor = $modal_colour_green;	// green
				$pp_fields_changed .= ", inserted new martial styles check boxes record in Members_Martial_Styles";
				$modal_colour_flag = 1;
				$admin_log_record++;
				}
			else
				{
				// the insertion operation to the Members_Martial_Styles FAILED
				$modal_operation .= "<font color='red'>The update to table <b>Members_Martial_Styles</b> FAILED to change the chapter name for member's chapter record for member ID: ".$member_ID." ";
				$modal_operation .= "in <b>sub_update_training_profile.php:263f</b> operating under userID: <b>".$_SESSION['UserID']."</b><br />The SQL where the failure occurred: </font>".$SQL_mi."; ";
				$modal_msg_footer .= "Operation 263f FAILED!";
				$modal_header_bgcolor = $modal_colour_red;	// red
				$modal_footer_bgcolor = $modal_colour_red;	// red
				$modal_colour_flag = 1;
				}
			} // end if martial_styles_record_exists
		} // end if $martial_styles_total
	
	if ($training_notes_total == 2)
		{
		// any training notes entered results in an insertion operation to Members_Training_Notes table
		$SQL_tn  = 'INSERT INTO Members_Training_Notes (Member_ID, Member_Notes_Date, Member_Notes, Username) ';
		$notes_to_insert = $_POST['TrainingNotes']."  (".$_SESSION['UserID'].")";
		$SQL_tn .= 'VALUES ('.$member_ID.', "'.$training_notes_date.'", "'.$notes_to_insert.'","'.$_SESSION['UserID'].'")';
		$Result_tn = mysqli_query($LinkID, $SQL_tn);
		if (mysqli_errno($LinkID) == 0) 
			{
			// the insertion of the new training notes was successfull
			$modal_operation .= "<font color='green'> The insertion of training notes to table <b>Members_Training_Notes</b> was successful for member's membership record for member ID: ".$member_ID;
			$modal_operation .= " in <b>sub_update_training_profile.php:295s</b> operating under userID: <b>".$_SESSION['UserID']."; </b></font>";
			$modal_msg_footer .= $comma."Operation 295s was successful!";
			$modal_header_bgcolor = $modal_colour_green;
			$modal_footer_bgcolor = $modal_colour_green;
			$pp_fields_changed .= ", insertion of training notes to Members_Training_Notes";
			$admin_log_record++;
			}
		else
			{
			// the insertion of training notes FAILED
			$modal_operation .= "<font color='red'> The insertion of training notes to table <b>Members_Training_Notes</b> FAILED for member's membership record for member ID: ".$member_ID;
			$modal_operation .= " in <b>sub_update_training_profile.php:295f</b> operating under userID: <b>".$_SESSION['UserID']."; </b></font><br />The SQL where the failure occurred: </font>".$SQL_tn."; ";
			$modal_msg_footer .= $comma."Operation 295f FAILED!";
			if ($martial_styles_total)
				{
				$modal_header_bgcolor = $modal_colour_orange;
				$modal_footer_bgcolor = $modal_colour_orange;
				}
			else
				{
				$modal_header_bgcolor = $modal_colour_red;
				$modal_footer_bgcolor = $modal_colour_red;
				}
			}
		}
	if ($admin_log_record) { include "php-bin/sub_create_admin_log_record.php"; }  // record a log record of the operations applied
	} // end of $pp_fields_changed_flag
else
	{
	// none of the fields have changed, do nothing and inform the browser of this fact
	$modal_operation .= " <font color='red'>No updates/changes were made to member's record in <b>Members_Martial_Styles</b> or <b>Members_Training_Notes</b> for recent operation on member ID: ".$member_ID;
	$modal_operation .= " in <b>sub_update_membership_profile.php:333f</b> operating under userID: <b>".$_SESSION['UserID'].".</b>. Please try again and update one or more fields.";
	$modal_msg_footer .= $comma." Operation 333f NOT applied!";
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
echo ('parent.location.href="Members_show.php?MID='.$member_ID.'&MOD=1&TAB=2&STATE=Update"');
echo ('</script>');
?>
