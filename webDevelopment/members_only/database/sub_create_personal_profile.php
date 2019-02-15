<?php
ini_set('display_errors','On');
// Function: sub_create_personal_profile.php
// Author: David M. Cvet
// Created: Oct 12, 2016
// Description: creates a new student record in the database from a pesonal profile perspective only.
//---------------------------
// Updates:
//	2018 ----------
//	apr 25:	adjusted the table Members to automatically increment the Index_ID which is queued on when updating the new record with the values
//			retrieved from the personal profile tab and by default, the Index_ID is assigned to the Member_ID, table Members adjusted so that
//			the default value for Member_ID ==> "0" so that the INSERT will work error free

// begin set database and members only library paths
$members_only_path = "../members_only/";	// the location of the members only scripts and files with respect to this calling script
$dbase_path = "";				// the location of the database scripts and files with respect to this calling script
//$common_p1 = $members_only_path."php-bin/members_only_common_part1.php"; include "$common_p1";	// contains the first half of the header links, IDValid, retrieve cookies common to all members only scripts
$backslash_path	= $dbase_path."php-bin/function_string_backslash.php"; include "$backslash_path";
$ss_path 	= $dbase_path."ss_path.stuff"; include "$ss_path";
$db_path 	= $dbase_path."DB.php"; include "$db_path";
$LinkID		= dbConnect($DB);
session_start();
// end setup database and members only library paths

// initialize modal variables
$member_ID 				= 0;	// default value assigned until Index_ID is generated 
$pgm					= "sub_create_personal_profile.php";
$modal_title			= "<font color='black'><b>Dbase Create New Personal Profile Membership Record:</b></font></br />";
$modal_operation 		= "";
$modal_msg_footer 		= "";
$modal_colour_green		= "#5cb85c";	// green
$modal_colour_orange	= "orange";		// orange
$modal_colour_red		= "#c90a13";	// red
$modal_colour_flag		= 0;			// setting this flag to "1" indicates that a previous process has assign its prescribed colour, so, if it was green, and an error occurred in the following process, set the colour to orange, if not, set to red
$modal_header_bgcolor 	= $modal_colour_green;	// default header colour assigned
$modal_footer_bgcolor 	= $modal_colour_green;	// default footer colour to be assigned

// given that this is a "create" form, generate the next member ID by inserting a blank record into Members
$SQL    = 'INSERT INTO Members VALUES ()';
$Result = mysqli_query($LinkID, $SQL);
if (mysqli_errno($LinkID) == 0) 
	{
	$index_ID = mysqli_insert_id($LinkID);
	$today = date("Y-m-d");
	$member_ID = $index_ID;
	if (!$_POST['MemNumber']) { $member_number = $member_ID; } // an empty member number field is NOT permitted, assign member ID temporary, make a note in modal
	else {$member_number = $_POST['MemNumber']; }
	if (isset($_POST['DeceasedCheck'])) { $deceased_check = 1; } else { $deceased_check = 0; }
	if (isset($_POST['DeceasedDateForm'])) {if ($_POST['DeceasedDateForm']) { $deceased_date = $_POST['DeceasedDateForm']; }else { $deceased_date = NULL; }	}
	else 	{ $deceased_date = NULL; }
	if ($_POST['BirthDate']) 
		{
		// given that Birth Date was entered, update the value of year of birth
		$birth_date = $_POST['BirthDate'];
		}
	else
		{ $birth_date = NULL; }
	if (isset($_POST['FirstAidTraining_Check'])) { $first_aid_training_check = 1; } else { $first_aid_training_check = 0; }
	if (isset($_POST['PreviousMartial_Check'])) { $previous_martial_check = 1; } else { $previous_martial_check = 0; }

	if ($_POST['Biography']) { $biography = StringBackSlash($_POST['Biography']); }
	else { $biography = ""; }

	if ($_POST['Comments']) { $comments = StringBackSlash($_POST['Comments']); }
	else { $comments = ""; }

	if ($_POST['LName']) { $lname = StringBackSlash($_POST['LName']); }
	else { $lname = ""; }

	if ($_POST['Medical']) { $medical = StringBackSlash($_POST['Medical']); }
	else { $medical = ""; }

	if ($_POST['AdminNotes']) { $admin_notes = StringBackSlash($_POST['AdminNotes']); }
	else { $admin_notes = ""; }

	// now update the blank record with the values from the personal profile form (POST values)
	$SQL  = 'UPDATE Members SET Member_ID = '.$member_ID.', Member_Number = '.$member_number.', Salutation = "'.$_POST['Salutation'].'", FirstName = "'.$_POST['FName'].'", '; 
	$SQL .= 'PreferredName = "'.$_POST['PName'].'", MiddleName = "'.$_POST['MName'].'", LastName = "'.$lname.'", Postnominals = "'.$_POST['Postnominals'].'", ';
	$SQL .= 'Gender = "'.$_POST['Sex'].'", Birth_Date = "'.$birth_date.'", Spouse = "'.$_POST['Spouse'].'", Occupation = "'.$_POST['Occupation'].'", ';
	$SQL .= 'Address = "'.$_POST['Address'].'", City = "'.$_POST['City'].'", ProvState = "'.$_POST['ProvState'].'", PCZip = "'.$_POST['PCZip'].'", ';
	$SQL .= 'ProvState = "'.$_POST['ProvState'].'", PCZip = "'.$_POST['PCZip'].'", Country = "'.$_POST['Country'].'", ';
	$SQL .= 'NumHome = "'.$_POST['NumHome'].'", NumWork = "'.$_POST['NumWork'].'", NumWorkExt = "'.$_POST['NumWorkExt'].'", NumFax = "'.$_POST['NumFax'].'", NumMobile = "'.$_POST['NumMobile'].'", ';
	$SQL .= 'Email = "'.$_POST['Email'].'", Email_Alternate = "'.$_POST['EmailAlt'].'", Portrait_URL = "'.$_POST['Portrait_URL'].'", Portrait_File = "'.$_POST['Portrait_File'].'", Comments = "'.$comments.'", ';
	$SQL .= 'Deceased = '.$deceased_check.', Deceased_Date = "'.$deceased_date.'", Interests = "'.$_POST['Interests'].'", AcademicDegree = "'.$_POST['AcadDegree'].'", AcademicInstitution = "'.$_POST['AcadInstitute'].'", ';
	$SQL .= 'EmergContactName = "'.$_POST['EmergContactName'].'", EmergContactPhone = "'.$_POST['EmailAlt'].'", HeardFrom = "'.$_POST['HeardFrom'].'", Biography = "'.$biography.'", ';
	$SQL .= 'TransportationMode = '.$_POST['TransportationMode'].', FirstAidTraining = '.$first_aid_training_check.', PreviousMartial = '.$previous_martial_check.', Medical = "'.$medical.'", ';
	$SQL .= 'Admin_ID = "'.$_POST['AdminID'].'", Admin_Notes = "'.$admin_notes.'", RecordCreation_Date = "'.$today.'" ';
	$SQL .= 'WHERE Index_ID = '.$index_ID;
	$Result = mysqli_query($LinkID, $SQL);
	if (mysqli_errno($LinkID) == 0) 
		{
		// the update (create new record) was successful with respect to the blank record created earlier in tbl_Status_Members
		// the update to the Personal profile record was successfull, generate a modal popup indicating the success
		$modal_operation .= "<font color='green'>AIMS has successfully inserted new member personal profile record into <b>Members</b> with new Member ID: ".$member_ID." ";
		$modal_operation .= "executing function in <b>".$pgm.":66s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
		$modal_msg_footer .= "Operation 66s was successful!";
		$modal_header_bgcolor = $modal_colour_green;	// green
		$modal_footer_bgcolor = $modal_colour_green;	// green

		// the insertion operation for a new member was successful, so in order to see the new member listed in AIMS, a default status
		// record must be inserted into table: Members_Status of "New" (1) along with today's date (default)
		$today = date("Y-m-d");
		$SQL_status  = 'INSERT INTO Members_Status (`Member_ID`, `Status_ID`, `Status_Date`, `Current_Status`) ';
		$SQL_status .= 'VALUES ('.$member_ID.',1,"'.$today.'", 1)';
		$Result = mysqli_query($LinkID, $SQL_status);
		if (mysqli_errno($LinkID) == 0) 
			{
			// the insertion of a default new members status record was successful
			$modal_operation .= "<br /><font color='green'>AIMS has successfully inserted new member status record into <b>Members_Status</b> with new Member ID: ".$member_ID.", default status of 'New' with today's date ";
			$modal_operation .= "executing function in <b>".$pgm.":83s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
			$modal_msg_footer .= ", Operation 83s was successful!";
			$modal_header_bgcolor = $modal_colour_green;	// green
			$modal_footer_bgcolor = $modal_colour_green;	// green

			// the insertion operation for a new member status was successful, so in order to see the new member listed in AIMS, a default chapter
			// record must be inserted into table: Members_Chapter of "Toronto" (1) along with today's date (default)
			$SQL_chap  = 'INSERT INTO Members_Chapter (`Member_ID`, `Chapter_ID`, `Date_Joined`, `Current_Status`) ';
			$SQL_chap .= 'VALUES ('.$member_ID.',1,"'.$today.'", 1)';
			$Result = mysqli_query($LinkID, $SQL_chap);
			if (mysqli_errno($LinkID) == 0) 
				{
				// the insertion of a default new members chapter record was successful
				$modal_operation .= "<br /><font color='green'>AIMS has successfully inserted new member default chapter record into <b>Members_Chapter</b> with new Member ID: ".$member_ID.", default chapter of 'Toronto' with today's date ";
				$modal_operation .= "executing function in <b>".$pgm.":99s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
				$modal_msg_footer .= ", Operation 83s was successful!";
				$modal_header_bgcolor = $modal_colour_green;	// green
				$modal_footer_bgcolor = $modal_colour_green;	// green
				}
			else
				{
				// the insertion of a default new members chapter record FAILED
				$modal_operation .= "<br /><font color='red'>AIMS has FAILED to insert a new member default chapter record into <b>Members_Chapter</b> with Member ID: ".$member_ID." ";
				$modal_operation .= " executing function in <b>".$pgm.":99f</b> operating under userID: <b>".$_SESSION['UserID']."</b><br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_chap."</i>. <b>Please copy this message and email to the AIMS administrator</b> ";
				$modal_msg_footer .= ", Operation 83f FAILED!";
				$modal_header_bgcolor = $modal_colour_orange;	// orange
				$modal_footer_bgcolor = $modal_colour_orange;	// orange
				}
			}
		else
			{
			// the insertion of a default new members status record FAILED
			$modal_operation .= "<br /><font color='red'>AIMS has FAILED to insert a new member status record into <b>Members_Status</b> with Member ID: ".$member_ID." ";
			$modal_operation .= " executing function in <b>".$pgm.":83f</b> operating under userID: <b>".$_SESSION['UserID']."</b><br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_status."</i>. <b>Please copy this message and email to the AIMS administrator</b> ";
			$modal_msg_footer .= ", Operation 83f FAILED!";
			$modal_header_bgcolor = $modal_colour_orange;	// orange
			$modal_footer_bgcolor = $modal_colour_orange;	// orange
			}
		}
	else
		{
		// the update failed with respect to the existing record in Members
		// generate a modal popup indicating the FAILED operation
		$modal_operation .= "<font color='red'>AIMS has succeeded in initializing a blank record but FAILED to update that new member personal profile record in <b>Members</b> with Member ID: ".$member_ID." ";
		$modal_operation .= " executing function in <b>".$pgm.":66f</b> operating under userID: <b>".$_SESSION['UserID']."</b><br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL."; ";
		$modal_msg_footer .= "Operation 66f FAILED!";
		$modal_header_bgcolor = $modal_colour_orange;	// orange
		$modal_footer_bgcolor = $modal_colour_orange;	// orange
		}
	}
else
	{
	// no new member ID generated from the system
	// the insertion failed with respect to initializing a blank record in Members
	// generate a modal popup indicating the FAILED operation
	$modal_operation .= "<font color='red'>AIMS has FAILED to insert a new <b>blank</b> member personal profile record into <b>Members</b> with Member ID: NOT YET ASSIGNED ";
	$modal_operation .= " executing function in <b>".$pgm.":30f</b> operating under userID: <b>".$_SESSION['UserID']."</b><br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL."</i>. <b>Please copy this message and email to the AIMS administrator</b> ";
	$modal_msg_footer .= "Operation 30f FAILED!";
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
echo ('parent.location.href="Members_show.php?MID='.$member_ID.'&MOD=1&TAB=0&STATE=Update"');
echo ('</script>');

?>
