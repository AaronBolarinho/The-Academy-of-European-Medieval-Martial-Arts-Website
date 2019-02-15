<?php
ini_set('display_errors','On');

// Function: sub_update_personal_profile.php
// Author: David M. Cvet
// Created: Nov 07, 2016
// Description:
//---------------------------
// Updates:
//	2016 ----------
//	nov 17: adjusted the handling of check boxes, radio buttons and drop down, so that if nothing is changed, DO NOT UPDATE the table columns - this prevents an 
//			error to be thrown
//	2018 ----------
//	apr 25:	adjusted the table Members to automatically increment the Index_ID which is queued on when updating the new record with the values
//			retrieved from the personal profile tab and by default, the Index_ID is assigned to the Member_ID, table Members adjusted so that
//			the default value for Member_ID ==> "0" so that the INSERT will work error free, fixed bug related to tbl_Admin_log

// initialize variable(s) used to compare existing values with updated values
$pgm					= "sub_update_personal_profile.php";
$pp_fields_changed_flag	= 0;
$pp_fields_changed 	 	= "Table updated: Members, Field(s) updated: ";
$pp_fields_changed_comma = ", ";
$deceased_changed	 	= 0;	// a flag to identify that something has changed with deceased or deceased date
$modal_colour_green	 	= "#5cb85c";	// green
$modal_colour_orange	= "orange";	// orange
$modal_colour_red	 	= "#c90a13";	// red
$modal_colour_flag	 	= 0;		// setting this flag to "1" indicates that a previous process has assign its prescribed colour, so, if it was green, and an error occurred in the following process, set the colour to orange, if not, set to red
$modal_title			= "<font color='black'><b>Dbase Update Membership Profile:</b></font></br />";
$modal_operation 		= "";
$modal_msg_footer 		= "";
$modal_header_bgcolor 	= $modal_colour_green;	// default header colour assigned
$modal_footer_bgcolor 	= $modal_colour_green;	// default footer colour to be assigned

$member_ID = $_POST['MemID'];

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
$backslash_path	= $dbase_path."php-bin/function_string_backslash.php"; include "$backslash_path";

// Retrieve "Member's Personal Profile" data from AIMS
//
$SQL  = 'SELECT P.Member_ID, P.Member_Number, P.School, P.Salutation, P.FirstName, P.MiddleName, P.LastName, P.PreferredName, P.Postnominals, P.AddressProtocol, ';
$SQL .= '	P.Birth_Date, P.Spouse, P.Occupation, P.Address, P.City, P.ProvState, P.PCZip, P.Country, P.NumHome, P.NumWork, P.NumWorkExt, P.Gender, ';
$SQL .= '	P.NumFax, P.NumMobile, P.Email, P.Email_Alternate, P.Portrait_URL, P.Portrait_File, P.Date_Joined, P.Comments, P.Deceased, P.Deceased_Date, ';
$SQL .= '	P.Interests, P.AcademicDegree, P.AcademicInstitution, P.FirstAidTraining, P.HeardFrom, P.Medical, P.PreviousMartial, P.TransportationMode, ';
$SQL .= '	P.EmergContactName, P.EmergContactPhone, P.Biography, P.Admin_Notes, P.Admin_ID, P.RecordCreation_Date ';
$SQL .= ' FROM Members P';
$SQL .= ' WHERE P.Member_ID = ' .  $member_ID;
//echo ('debug:sub_update_personal_profile:36:SQL="'.$SQL.'"');exit;
$Result = mysqli_query($LinkID, $SQL);
$Line_Members = mysqli_fetch_object($Result);

//echo ('debug:sub_update_personal_profile:14:member_ID="'.$member_ID.'"');//exit;

//echo ('debug:".$pgm.":15:inside sub_update_personal_profile.php'); // exit;

// compare before and after values, and if there's a change, then create a change list which will be used to echo the changes to the browser
// and record the changes in the change log table, along with the username and date
//
// need to check if the form has passed over the value of checkbox - if checkbox was NOT checked, then the variable doesn't exist on transmission from form to PHP
if ($Line_Members->Member_Number <> $_POST["MemNumber"]) { $pp_fields_changed .= "member number"; $pp_fields_changed_flag ++; }
if ($Line_Members->Salutation <> $_POST["Salutation"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "salutation"; $pp_fields_changed_flag ++; }
if ($Line_Members->FirstName <> $_POST["FName"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "first name"; $pp_fields_changed_flag ++; }
if ($Line_Members->PreferredName <> $_POST["PName"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "preferred name"; $pp_fields_changed_flag ++; }
if ($Line_Members->MiddleName <> $_POST["MName"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "middle name"; $pp_fields_changed_flag ++; }
if (StringBackSlash($Line_Members->LastName) <> StringBackSlash($_POST["LName"])) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "surname"; $pp_fields_changed_flag ++; }
if ($Line_Members->Postnominals <> $_POST["Postnominals"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "postnominals"; $pp_fields_changed_flag ++; }
if ($Line_Members->Gender <> $_POST["Sex"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "gender"; $pp_fields_changed_flag ++; }
if ($Line_Members->Birth_Date <> $_POST["BirthDate"])
	{
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; }
	$pp_fields_changed .= "birth date"; $pp_fields_changed_flag ++; 
	$birth_date_changed = 1;
	}
else	
	{
	$birth_date_changed = 0;
	}
if ($Line_Members->Spouse <> $_POST["Spouse"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "spouse"; $pp_fields_changed_flag ++; }
if (isset($_POST['DeceasedDateForm']))
	{	
	if ($_POST['DeceasedDateForm'])
		{
		if ($Line_Members->Deceased_Date <> $_POST['DeceasedDateForm']) { $deceased_date_changed = $deceased_checked = 1; $deceased_date = $_POST['DeceasedDateForm']; }
		else { $deceased_date_changed = 0; $deceased_checked = 1; $deceased_date = $Line_Members->Deceased_Date; }
		}
	else  { $deceased_date_changed = 0; $deceased_date = NULL;}
	}
elseif ($Line_Members->Deceased_Date) { $deceased_checked = 1; $deceased_date = $Line_Members->Deceased_Date; }
else	{ $deceased_date_changed = 0; $deceased_date = $Line_Members->Deceased_Date;}

if ($Line_Members->Occupation <> $_POST["Occupation"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "profession"; $pp_fields_changed_flag ++; }
if ($Line_Members->Address <> $_POST["Address"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "address"; $pp_fields_changed_flag ++; }
if ($Line_Members->City <> $_POST["City"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "city"; $pp_fields_changed_flag ++; }
if ($Line_Members->ProvState <> $_POST["ProvState"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "province"; $pp_fields_changed_flag ++; }
if ($Line_Members->PCZip <> $_POST["PCZip"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "postal code"; $pp_fields_changed_flag ++; }
if ($Line_Members->Country <> $_POST["Country"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "country"; $pp_fields_changed_flag ++; }
if ($Line_Members->NumHome <> $_POST["NumHome"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "home telephone"; $pp_fields_changed_flag ++; }
if ($Line_Members->NumWork <> $_POST["NumWork"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "bus. telephone"; $pp_fields_changed_flag ++; }
if (isset($_POST['NumWorkExt'])) { if ($Line_Members->NumWorkExt <> $_POST["NumWorkExt"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "bus. extension"; $pp_fields_changed_flag ++; }}
if ($Line_Members->NumFax <> $_POST["NumFax"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "fax"; $pp_fields_changed_flag ++; }
if ($Line_Members->Email <> $_POST["Email"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "email"; $pp_fields_changed_flag ++; }
if ($Line_Members->Email_Alternate <> $_POST["EmailAlt"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "alternate email"; $pp_fields_changed_flag ++; }
if ($Line_Members->Portrait_URL <> $_POST["Portrait_URL"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "portrait URL"; $pp_fields_changed_flag ++; }
if ($Line_Members->Portrait_File <> $_POST["Portrait_File"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "portrait file"; $pp_fields_changed_flag ++; }
//	{if ($Line_Members->Deceased <> $deceased_check) { $deceased_changed = 1; if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "deceased checkbox"; $pp_fields_changed_flag ++; }}
if ($deceased_date_changed)
	{ if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "deceased date"; $pp_fields_changed_flag ++; }
//	{ if ($Line_Members->Deceased_Date <> $_POST["DeceasedDateForm"]) { $deceased_changed = 1; if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "deceased date"; $pp_fields_changed_flag ++; }}
//if ($Line_Members->School <> $_POST["School"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "school"; $pp_fields_changed_flag ++; }
if (StringBackSlash($Line_Members->Medical) <> StringBackSlash($_POST["Medical"])) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "medical"; $pp_fields_changed_flag ++; }
if ($Line_Members->Interests <> $_POST["Interests"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "interests"; $pp_fields_changed_flag ++; }
if ($Line_Members->EmergContactName <> $_POST["EmergContactName"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "emerg contact name"; $pp_fields_changed_flag ++; }
if ($Line_Members->EmergContactPhone <> $_POST["EmergContactPhone"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "emerg contact phone"; $pp_fields_changed_flag ++; }
if (StringBackSlash($Line_Members->Comments) <> StringBackSlash($_POST["Comments"])) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "comments"; $pp_fields_changed_flag ++; }
if ($Line_Members->HeardFrom <> $_POST["HeardFrom"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "heard from"; $pp_fields_changed_flag ++; }
if ($Line_Members->AcademicDegree <> $_POST["AcadDegree"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "academic degree"; $pp_fields_changed_flag ++; }
if ($Line_Members->AcademicInstitution <> $_POST["AcadInstitute"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "academic institution"; $pp_fields_changed_flag ++; }
if (StringBackSlash($Line_Members->Biography) <> StringBackSlash($_POST["Biography"])) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "biography"; $pp_fields_changed_flag ++; }
if (StringBackSlash($Line_Members->Admin_Notes) <> StringBackSlash($_POST["AdminNotes"])) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "admin notes"; $pp_fields_changed_flag ++; }

// handle the check boxes, radio boxes and drop-down elements separately
if (isset($_POST['DeceasedCheck'])) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $deceased_checked = 1; $pp_fields_changed .= "deceased checkbox"; $pp_fields_changed_flag ++; } else { $deceased_checked = 0; }
if (isset($_POST['TransportationMode'])) { if ($Line_Members->TransportationMode <> $_POST["TransportationMode"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $transportation_drop_down = 1; $pp_fields_changed .= "transportation mode"; $pp_fields_changed_flag ++; } else {$transportation_drop_down = 0;}} else {$transportation_drop_down = 0;}
if (isset($_POST['FirstAidTraining_Check'])) { if ($Line_Members->FirstAidTraining <> $_POST["FirstAidTraining_Check"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $first_aid_checked = 1; $pp_fields_changed .= "first aid training"; $pp_fields_changed_flag ++; } else {$first_aid_checked = 0;}} else {$first_aid_checked = 0;}
if (isset($_POST['PreviousMartial_Check'])) { if ($Line_Members->PreviousMartial <> $_POST["PreviousMartial_Check"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $previous_martial_checked = 1; $pp_fields_changed .= "previous martial"; $pp_fields_changed_flag ++; } else {$previous_martial_checked = 0;}} else {$previous_martial_checked = 0;}

if ($pp_fields_changed_flag)
	{
	// Save Personal Profile information
	$SQL  = 'UPDATE Members SET ';
	$SQL .= 'Member_Number		= "'.$_POST["MemNumber"].'", ';
//	$SQL .= 'School		 		= "'.$_POST["School"].'", ';
	$SQL .= 'Salutation	 		= "'.$_POST["Salutation"].'", ';
	$SQL .= 'FirstName	 		= "'.$_POST["FName"].'", ';
	$SQL .= 'PreferredName	 	= "'.$_POST["PName"].'", ';
	$SQL .= 'MiddleName			= "'.$_POST["MName"].'", ';
	$SQL .= 'LastName	 		= "'.StringBackSlash($_POST["LName"]).'", ';
	$SQL .= 'Postnominals	 	= "'.$_POST["Postnominals"].'", ';
	$SQL .= 'Gender	 			= "'.$_POST["Sex"].'", ';
	if ($birth_date_changed )	{ $SQL .= 'Birth_Date	 = "'.$_POST["BirthDate"].'", '; }
	$SQL .= 'Spouse	 			= "'.$_POST["Spouse"].'", ';
	$SQL .= 'Occupation	 		= "'.$_POST["Occupation"].'", ';
	$SQL .= 'Address	 		= "'.$_POST["Address"].'", ';
	$SQL .= 'City		 		= "'.$_POST["City"].'", ';
	$SQL .= 'ProvState		 	= "'.$_POST["ProvState"].'", ';
	$SQL .= 'PCZip			 	= "'.$_POST["PCZip"].'", ';
	$SQL .= 'Country	 		= "'.$_POST["Country"].'", ';
	$SQL .= 'NumHome	 		= "'.$_POST["NumHome"].'", ';
	$SQL .= 'NumWork	 		= "'.$_POST["NumWork"].'", ';
	if (isset($_POST['NumWorkExt']) && $_POST['NumWorkExt'] <>"") { $SQL .= 'NumWorkExt	 =  '.$_POST["NumWorkExt"].', ';}
	$SQL .= 'NumFax	 			= "'.$_POST["NumFax"]. '", ';
	$SQL .= 'NumMobile	 		= "'.$_POST["NumMobile"]. '", ';
	$SQL .= 'Email		 		= "'.$_POST["Email"].'", ';
	$SQL .= 'Email_Alternate	= "'.$_POST["EmailAlt"].'", ';
	$SQL .= 'Portrait_URL		= "'.$_POST["Portrait_URL"].'", ';
	$SQL .= 'Portrait_File		= "'.$_POST["Portrait_File"].'", ';
	if ($deceased_checked)		{$SQL .= 'Deceased =  '.$deceased_checked.', '; }
	if (isset($_POST['DeceasedDateForm']))  { $SQL .= 'Deceased_Date = "'.$_POST['DeceasedDateForm'].'", '; }
	$SQL .= 'Comments			= "'.StringBackSlash($_POST["Comments"]).'", ';
	$SQL .= 'Interests			= "'.$_POST["Interests"].'", ';
	$SQL .= 'Medical			= "'.StringBackSlash($_POST["Medical"]).'", ';
	$SQL .= 'EmergContactName	= "'.$_POST["EmergContactName"].'", ';
	$SQL .= 'EmergContactPhone	= "'.$_POST["EmergContactPhone"].'", ';
	if ($first_aid_checked)  		{ $SQL .= 'FirstAidTraining =  '.$_POST["FirstAidTraining_Check"].', ';}
	if ($previous_martial_checked)	{ $SQL .= 'PreviousMartial =  '.$_POST["PreviousMartial_Check"].', ';}
	if ($transportation_drop_down)	{ $SQL .= 'TransportationMode	=  '.$_POST["TransportationMode"].', ';}
	$SQL .= 'HeardFrom			= "'.$_POST["HeardFrom"].'", ';
	$SQL .= 'AcademicDegree		= "'.$_POST["AcadDegree"].'", ';
	$SQL .= 'AcademicInstitution = "'.$_POST["AcadInstitute"].'", ';
	$SQL .= 'Biography			= "'.StringBackSlash($_POST["Biography"]).'", ';
	$SQL .= 'Admin_Notes		= "'.StringBackSlash($_POST["AdminNotes"]).'" ';
	$SQL .= 'WHERE Member_ID 	= ' . $member_ID;
	$Result = mysqli_query($LinkID, $SQL);
	if (mysqli_errno($LinkID) == 0) 
		{
		if ($deceased_checked)
			{
			// update the Members_Status table should there be a change in the status with respect to the member becoming deceased
			// first check if there is already a record in the table for deceased, but there's no date
			$SQL_s  = 'SELECT Status_ID, Status_Date, Current_Status FROM Members_Status ';
			$SQL_s .= 'WHERE Member_ID = '.$member_ID.' AND Status_ID = "DE"';
			$Result_s = mysqli_query($LinkID, $SQL_s);
			if (mysqli_num_rows($Result_s))
				{
				// change any current_status that is "1" to "0" before updating the existing "DE" record entry
				$SQL_s  = 'UPDATE Members_Status SET Current_Status = 0 WHERE Current_Status = 1 AND Member_ID = '.$member_ID;
				$Result_s = mysqli_query($LinkID, $SQL_s);

				// there exists a record, but may be incomplete with respect to date and therefore update that existing row
				$SQL_s  = 'UPDATE Members_Status SET Status_ID = "DE", Status_Date = "'.$deceased_date.'", Current_Status = 1 ';
				$SQL_s .= 'WHERE Status_ID = "DE" AND Member_ID = '.$member_ID;
				$Result_s = mysqli_query($LinkID, $SQL_s);
				if (mysqli_errno($LinkID) == 0) 
					{
					// the update was successful with respect to the existing record in Members_Status
					// the update to the Personal profile record was successfull, generate a modal popup indicating the success
					$modal_operation .= "<font color='green'>The update to table <b>Members</b> and table <b>Members_Status</b> (now deceased) was successfully applied for member's record for member ID: ".$member_ID."; ";
					$modal_operation .= "in <b>".$pgm.":223s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
					$modal_msg_footer .= "Operation 223s was successful!";
					$modal_header_bgcolor = $modal_colour_green;	// green
					$modal_footer_bgcolor = $modal_colour_green;	// green
					$modal_colour_flag = 1;
					$pp_fields_changed .= ", updated existing deceased record in Members_Status";
					}
				else
					{
					// the update failed with respect to the existing record in Members_Status
					// however, the update to the Personal profile record was successfull, generate a modal popup indicating the success
					$modal_operation .= "<font color='gray'>The update to table <b>Members</b> was successfully applied, however, applying the change in status to table <b>Members_Status</b> FAILED for member's record for member ID: ".$member_ID."; ";
					$modal_operation .= "in <b>".$pgm.":223f</b> operating under userID: <b>".$_SESSION['UserID']."</b>. Please copy this message and email to webmaster.</font>";
					$modal_operation .= "<br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_s."</i>. <b>Please copy this message and email to the AIMS administrator";
					$modal_msg_footer .= "Operation 223f was NOT entirely successful!";
					$modal_header_bgcolor = $modal_colour_orange;	// green
					$modal_footer_bgcolor = $modal_colour_orange;	// green
					$modal_colour_flag = 1;
					}
				}
			else
				{
				// there is no deceased record in Members_Status, this now becomes a new record entry in that table and current_status for any other record must be set to "0"
				$SQL_s  = 'UPDATE Members_Status SET Current_Status = 0 WHERE Current_Status = 1 AND Member_ID = '.$member_ID;
				$Result_s = mysqli_query($LinkID, $SQL_s);

				// insert a blank record into Members_Status in order to generate the next number in Index_ID
				$SQL_s  = 'INSERT INTO Members_Status VALUES ()';
				$Result_s = mysqli_query($LinkID, $SQL_s);
				$index_ID = mysqli_insert_id($LinkID);

				// with the newly inserted blank record (assuming it went OK!!!!), update this blank record
				$SQL_s  = 'UPDATE Members_Status SET Member_ID = '.$member_ID.', Status_ID = "DE", Status_Date = "'.$deceased_date.'", Current_Status = 1 ';
				$SQL_s .= 'WHERE Index_ID = '.$index_ID;
				$Result_s = mysqli_query($LinkID, $SQL_s);
				if (mysqli_errno($LinkID) == 0) 
					{
					// the update was successful with respect to the existing record in Members_Status
					// the update to the Personal profile record was successfull, generate a modal popup indicating the success
					$modal_operation .= "<font color='green'>The update to table <b>Members</b> and table <b>Members_Status</b> (now deceased) was successfully applied for member's record for member ID: ".$member_ID."; ";
					$modal_operation .= "in <b>".$pgm.":260s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
					$modal_msg_footer .= "Operation 260s was successful!";
					$modal_header_bgcolor = $modal_colour_green;	// green
					$modal_footer_bgcolor = $modal_colour_green;	// green
					$modal_colour_flag = 1;
					}
				else
					{
					// the update failed with respect to the existing record in Members_Status
					// however, the update to the Personal profile record was successfull, generate a modal popup indicating the success
					$modal_operation .= "<font color='gray'>The update to table <b>Members</b> was successfully applied, however, applying the change in status to table <b>Members_Status</b> FAILED for member's record for member ID: ".$member_ID."; ";
					$modal_operation .= "in <b>".$pgm.":260f</b> operating under userID: <b>".$_SESSION['UserID']."</b>. Please copy this message and email to webmaster.</font>";
					$modal_operation .= "<br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_s."</i>. <b>Please copy this message and email to the AIMS administrator";
					$modal_msg_footer .= "Operation 260f was NOT entirely successful!";
					$modal_header_bgcolor = $modal_colour_orange;	// green
					$modal_footer_bgcolor = $modal_colour_orange;	// green
					$modal_colour_flag = 1;
					}
				}
			} // end if $deceased_checked
		else
			{
			// the update to the Personal profile record was successfull, generate a modal popup indicating the success
			$modal_operation .= "<font color='green'>The update to table <b>Members</b> was successfully applied for member's record for member ID: ".$member_ID."; ";
			$modal_operation .= "in <b>".$pgm.":208s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
			$modal_msg_footer .= "Operation 208s was successful!";
			$modal_header_bgcolor = $modal_colour_green;	// green
			$modal_footer_bgcolor = $modal_colour_green;	// green
			$modal_colour_flag = 1;
			}

		// We create a blank record in tbl_Admin_log in order to generate the next index_num, then pass through to update that new record with admin log details.
		$SQL_log    = 'INSERT INTO tbl_Admin_log VALUES ()';
		$Result_log = mysqli_query($LinkID, $SQL_log);
		if (mysqli_errno($LinkID) == 0) 
			{
			$index_num = mysqli_insert_id($LinkID);
			$SQL_log  = 'UPDATE tbl_Admin_log SET ';
			$SQL_log .= 'Username	= "'.$_SESSION['UserID'].'", ';
			$SQL_log .= 'Roles_ID	=  '.$_SESSION['RoleID'].', ';
			$SQL_log .= 'IPaddyUser	= "'.$_SESSION['IPaddress'].'", ';
			$SQL_log .= 'Member_ID	=  '.$_SESSION['MemberID'].', ';
			$SQL_log .= 'Action	=  "'.$pp_fields_changed.'" ';
			$SQL_log .= 'WHERE Index_ID = '.$index_num;
			$Result_log = mysqli_query($LinkID, $SQL_log);
			if (mysqli_errno($LinkID) == 0) 
				{
				// don't need to do anything, the admin log record was successfully entered
				}
			else
				{
				$modal_operation .= " <font color='red'>There was a problem to update the log record for the latest database operation for member's record for member ID: ".$member_ID."; ";
				$modal_operation .= "in <b>".$pgm.":310f</b> operating under userID: <b>".$_SESSION['UserID']."</b>";
				$modal_operation .= "<br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_log."</i>. <b>Please copy this message and email to the AIMS administrator";
				$modal_msg_footer .= "Operation 310f FAILED!";
				$modal_header_bgcolor = $modal_colour_orange;
				$modal_footer_bgcolor = $modal_colour_orange;
				}
			}
		else
			{
			// the insertion of a blank admin log record failed - most likely because there is a problem with the insertion SQL or the table tbl_Admin_log
			$modal_operation .= " <font color='red'>There was a problem to create a blank log record for the latest database operation for member's record for member ID: ".$member_ID."; ";
			$modal_operation .= "in <b>".$pgm.":310f</b> operating under userID: <b>".$_SESSION['UserID']."</b>";
			$modal_operation .= "<br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_log."</i>. <b>Please copy this message and email to the AIMS administrator";
			$modal_msg_footer .= "Operation 310f FAILED!";
			$modal_header_bgcolor = $modal_colour_orange;
			$modal_footer_bgcolor = $modal_colour_orange;
			}
		}
	else
		{
		// the update to the Personal profile record failed, generate a modal popup indicating the failure
		$modal_operation .= " <font color='red'>Unable to update the member record for the latest database operation for member's record member ID: ".$member_ID."; ";
		$modal_operation .= "in <b>".$pgm.":208f</b> operating under userID: <b>".$_SESSION['UserID']."</b>";
		$modal_operation .= "<br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL."</i>. <b>Please copy this message and email to the AIMS administrator";
		$modal_msg_footer .= "Operation 208f FAILED!";
		$modal_header_bgcolor = $modal_colour_red;
		$modal_footer_bgcolor = $modal_colour_red;
		}
	}
else
	{
	// none of the fields have changed, do nothing and inform the browser of this fact
	$modal_operation .= " <font color='gray'>No updates nor changes were applied to the member record for the latest database operation for member's record member ID: ".$member_ID."; ";
	$modal_operation .= "in <b>".$pgm.":208f</b> operating under userID: <b>".$_SESSION['UserID']."</b>. Please try again and update one or more fields.";
	$modal_operation .= "<br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL."</i>. <b>Please copy this message and email to the AIMS administrator";
	$modal_msg_footer .= "Operation 208f FAILED!";
	$modal_header_bgcolor = $modal_colour_orange;
	$modal_footer_bgcolor = $modal_colour_orange;
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
echo ('parent.location.href="Members_show.php?MID='.$member_ID.'&MOD=1&TAB=0&STATE=Update"');
echo ('</script>');
?>
