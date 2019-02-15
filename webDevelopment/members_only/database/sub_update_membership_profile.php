<?php
ini_set('display_errors','On');
// Function: sub_update_membership_profile.php
// Author: David M. Cvet
// Created: Nov 10, 2016
// Description:
//---------------------------
// Updates:
//	2016 ----------
// initialize variable(s) used to compare existing values with updated values
//	2018 ----------
//	apr 25:	adjusted the table Members_Rank, Members_Category, tbl_Admin_log by resetting Index_ID to be an auto-increment field and therefore, eliminating the bug 
//			"The SQL error reported was Field 'Index_ID' doesn't have a default value and the SQL causing the failure: INSERT INTO Members_Rank VALUES ()."
//	2019 ----------
//	jan 21:	added additional SQL line to include update to Chapter_ID in table Members (to reduce complexity of large SQL statements)

$pp_fields_changed_flag		= 0;
$pp_fields_changed 			= "Table updated: Members, Field(s) updated: ";
$pp_fields_changed_comma	= ", ";
$deceased_changed			= 0;		// a flag to identify that something has changed with deceased or deceased date
$proceed_to_Members 		= 0;		// this flag will cause the processing of changed fields as it will do so even if commandery has NOT been updated and $pp_fields_changed_flag > 0
$modal_colour_green			= "#5cb85c";	// green
$modal_colour_orange		= "orange";	// orange
$modal_colour_red			= "#c90a13";	// red
$modal_colour_flag			= 0;		// setting this flag to "1" indicates that a previous process has assign its prescribed colour, so, if it was green, and an error occurred in the following process, set the colour to orange, if not, set to red
$member_ID 					= $_POST['MemID'];
$old_portrait_file			= $_POST['PortraitFile'];
$comma						= ", ";
$today 						= date("Y-m-d");

// tally up any changes made to tbl_Members table only!!
// initialize change flags and counters
$pp_fields_changed_Members	= 0;	// a counter to identify changes to the Members table only
$membership_date_changed 	= 0;
$honourary_check_changed 	= 0; 
$honourary_date_changed 	= 0;
$honourary_location_changed	= 0;
$honourary_location			= "";
$chapter_changed			= 0;
$membership_category_changed = 0;
$membership_category_exits	= 0;

// initialize variables for status, rank, award and position data
$status_new_changed 		= 0;
$status_date_new_changed 	= 0;
$rank_new_changed			= 0;
$rank_date_new_changed		= 0;
$new_rank_date 				= "";
//$award_new_changed		= 0;
//$award_date_new_changed	= 0;
$position_new_changed		= 0;
$position_date_new_changed	= 0;

// at this point, it is not clear if only Commandery changed or if some other variable related to tbl_Members 
// initialize variables
$pgm 					= "sub_update_membership_profile.php";
$modal_title			= "<font color='black'><b>Dbase Update Membership Profile:</b></font></br />";
$modal_operation 		= "";
$modal_msg_footer 		= "";
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

// Retrieve "Member's Membership Profile" data from AIMS
$SQL  = 'SELECT Member_Number, Date_Joined ';
$SQL .= ' FROM Members';
$SQL .= ' WHERE Member_ID = ' .  $member_ID;
$Result = mysqli_query($LinkID, $SQL);
$Line_Members = mysqli_fetch_object($Result);

// Retrieve "Member's curent rank data from AIMS
$SQL  = 'SELECT Rank_ID, Current_Status ';
$SQL .= ' FROM Members_Rank';
$SQL .= ' WHERE Member_ID = ' .$member_ID.' AND Current_Status = 1';
$Result = mysqli_query($LinkID, $SQL);
$Line_Rank = mysqli_fetch_object($Result);

// Retrieve "Member's Chapter Membership Profile" data from AIMS
$SQL_C  = 'SELECT Chapter_ID';
$SQL_C .= ' FROM Members_Chapter';
$SQL_C .= ' WHERE Member_ID = ' .  $member_ID.' AND Current_Status = 1';
$Result_C = mysqli_query($LinkID, $SQL_C);

//echo ('debug:sub_update_membership_profile:88:SQL_C="'.$SQL_C.'"<br />');
if (mysqli_num_rows($Result_C) > 0) 
	{
	$obj = mysqli_fetch_object($Result_C);
	$current_chapterID = $obj->Chapter_ID;
	}
else	{ $current_chapterID = 0; }

//echo ('debug:sub_update_membership_profile:94:$current_chapterID="'.$current_chapterID.'"<br />');

// Retrieve "Member's Membership Category" data from AIMS
$SQL_CG  = 'SELECT Category_ID, Current_Status';
$SQL_CG .= ' FROM Members_Category';
$SQL_CG .= ' WHERE Member_ID = ' .  $member_ID.' AND Current_Status = 1';
$Result_CG = mysqli_query($LinkID, $SQL_CG);
if (mysqli_num_rows($Result_CG) > 0) 
	{
	$obj = mysqli_fetch_object($Result_CG);
	$current_category_ID = $obj->Category_ID;
	$membership_category_exits = 1;
	}
else	{ $current_category_ID = 0; }

// compare before and after values, and if there's a change, then create a change list which will be used to echo the changes to the browser
// and record the changes in the change log table, along with the username and date
//
// the commandery is checked first for change, so, if it has changed, the $pp_fields_changed_flag is incremented to "1", should no other fields change
// on this window, then $pp_fields_changed_flag will remain at "1" and no further processing is required with respect to tbl_Members table

//echo ('debug:sub_update_membership_profile:114:$_POST[ChapterID]="'.$_POST['ChapterID'].'", $current_chapterID = "'.$current_chapterID.'"');
if (isset($_POST['ChapterID']))
	{
	if ($current_chapterID <> $_POST['ChapterID'])
		{
		$pp_fields_changed .= "chapter"; $pp_fields_changed_flag ++;
		$chapter_changed = 1;
		}
	}

if ($Line_Members->Member_Number <> $_POST['MemNumber']) 
	{
	if ($pp_fields_changed_flag) {$pp_fields_changed .= $pp_fields_changed_comma; } 
	$pp_fields_changed .= "member number"; $pp_fields_changed_flag ++; $pp_fields_changed_Members ++; 
	}
if ($Line_Members->Date_Joined <> $_POST["MemDate_Form"])
	{
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; }
	$pp_fields_changed .= "date joined"; $pp_fields_changed_flag ++; $pp_fields_changed_Members ++; 
	$membership_date_changed = 1; 
	}

// Honourary checkbox and date values comparisons
if (isset($_POST['HonouraryCheck'])) 
	{
	// the checkbox was checked and has been assigned "1", as this is the only time the POST variable is passed to this function
	$honourary_check_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "honourary checkbox"; $pp_fields_changed_flag ++; $pp_fields_changed_Members ++; 
	}
if (isset($_POST['HonDate_Form'])) 
	{
	$honourary_date_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "honourary date"; $pp_fields_changed_flag ++; $pp_fields_changed_Members ++; 
	}
if (isset($_POST['RankLocation_New'])) 
	{
	$honourary_location_changed = 1; 
	$honourary_location = $_POST['RankLocation_New'];
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "honourary location"; $pp_fields_changed_flag ++; $pp_fields_changed_Members ++; 
	}

if ( $pp_fields_changed_Members > 0) {$proceed_to_Members = 1;}	// if the number of fields changed is >0, process Members
// end of tbl_Members updates

// check if a new entry for status and date were made
if (isset($_POST['Status_New']))
	{
	if ($_POST['Status_New']) 
		{
		$status_new_changed = 1; 
		if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "status ID"; $pp_fields_changed_flag ++;
		}
	}
if (isset($_POST['StatusDate_New']))
	{
	if ($_POST['StatusDate_New'])
		{
		$status_date_new_changed = 1; 
		if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "status date"; $pp_fields_changed_flag ++;
		}
	}
if (isset($_POST['CategoryID']))
	{
	if ($_POST['CategoryID'] <> $current_category_ID) 
		{
		$membership_category_changed = 1; 
		if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "category ID"; $pp_fields_changed_flag ++;
		}
	}

// check if a new entry for rank and date were made
if ($_POST['Rank_New'])
	{
	$rank_new_changed = 1; 
	if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "rank ID"; $pp_fields_changed_flag ++;

	if ($_POST['Rank_New'] <> 11)
		{		
		// retrieve the ranks ID and descriptions in order to compose a new file name associated with the new rank for Members_Portraits and Members portrait field updates
		$SQL_R  = 'SELECT Rank_ID, Rank_Desc FROM Ranks';
		$SQL_R .= ' ORDER BY Rank_ID';
		$Result_R = mysqli_query($LinkID, $SQL_R);
		$i = 0;
		while ($Line_R = mysqli_fetch_object($Result_R)) {
			$rank_id[$i]	 	= $Line_R->Rank_ID;
			$rank_desc[$i]		= $Line_R->Rank_Desc;
			if ($_POST['Rank_New'] == $rank_id[$i])
				{
				// build a new portrait file name
				$new_portrait_file = str_replace(strtolower($rank_desc[$i-1]),strtolower($rank_desc[$i]),$old_portrait_file);
				}
			$i++;
			}
		}
	else
		{ $new_portrait_file = $old_portrait_file; }
	}

if (isset($_POST['RankDate_New']))
	{
	if ($_POST['RankDate_New'])
		{
		$rank_date_new_changed = 1; 
		if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "rank date"; $pp_fields_changed_flag ++;
		}
	}

// check if a new entry for position and date were made
if (isset($_POST['Position_New']))
	{
	if ($_POST['Position_New']) 
		{
		$position_new_changed = 1; 
		if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "position"; $pp_fields_changed_flag ++;
		}
	}
if (isset($_POST['PositionDate_New']))
	{
	if ($_POST['PositionDate_New']) 
		{
		$position_date_new_changed = 1; 
		if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "position date"; $pp_fields_changed_flag ++;
		}
	}
// check if the fields changed flag has been incremented indicating at least one change has happened
// changed should there be only the one change (($pp_fields_changed_flag = 1)
if ($pp_fields_changed_flag)
	{
	if ($chapter_changed)
		{
		// checked if a member's chapter record actually exists, as sometimes, a new record is entered, but chapter record was not ($chapter_ID was set to NULL)
		if ($current_chapterID == "")
			{
//echo ('debug:246:$current_chapterID="'.$current_chapterID.'"');exit;
			$SQL_c = 'INSERT INTO Members_Chapter (Member_ID, Chapter_ID, Date_Joined, Current_Status) VALUES ('.$member_ID.', "'.$_POST["ChapterID"].'", "'.$today.'",1)';
			$Result = mysqli_query($LinkID, $SQL_c);
			if (mysqli_errno($LinkID) == 0) 
				{
				// insertion to Members_Chapter was successful
				if ($pp_fields_changed_flag == 1)
					{
					// given that only the chapter name changed, don't bother with processing Members updates because there aren't any
					$proceed_to_Members = 0;	// set to "0" in order to prevent the execution of updating Members
					} 
				$modal_operation .= "<font color='green'>The insertion of a new chapter record to table <b>Members_Chapter</b> was successfull wrt chapter name for member's chapter record for member ID: ".$member_ID."; ";
				$modal_operation .= "in <b>".$pgm.":268s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
				$modal_msg_footer .= "Operation 268s was successful!";
				$modal_header_bgcolor = $modal_colour_green;	// green
				$modal_footer_bgcolor = $modal_colour_green;	// green
				$pp_fields_changed .= ", updated chapter record in Members_Chapter";
				$commandery_updated = 1;		// flag to indicate a successful chapter table update
				$modal_colour_flag = 1;
				}
			else
				{
				$modal_operation .= "<font color='red'>The insertion of new chapter record to table <b>Members_Chapter</b> FAILED to change the chapter name for member's chapter record for member ID: ".$member_ID." ";
				$modal_operation .= "in <b>".$pgm.":268f</b> operating under userID: <b>".$_SESSION['UserID']."</b><br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_c."</i>.";
				$modal_msg_footer .= "Operation 268f FAILED!";
				$modal_header_bgcolor = $modal_colour_red;	// red
				$modal_footer_bgcolor = $modal_colour_red;	// red
				$modal_colour_flag = 1;
				}
			}
		else
			{
			// the member's chapter membership has changed, so enter a new chapter record in Members_Chapter with new date joined, along with zeroing out the
			// current chapter record's Current_Status field
			$SQL_CS = 'UPDATE Members_Chapter SET Current_Status = 0 WHERE Member_ID = '.$member_ID.' ';
			$Result_CS = mysqli_query($LinkID, $SQL_CS);
//echo ('debug:281:$SQL_CS="'.$SQL_CS.'"');
			// if the result returns an error or no rows, then the existing record with current status of 1 didn't exist - so, no harm with the error message
			
			// insert a new chapter record
			$SQL_c  = 'INSERT INTO Members_Chapter (Member_ID, Chapter_ID, Date_Joined, Current_Status) VALUES ('.$member_ID.', "'.$_POST["ChapterID"].'", "'.$today.'",1)';
			$Result = mysqli_query($LinkID, $SQL_c);
			if (mysqli_errno($LinkID) == 0) 
				{
				// insertion to the chapter table was successful
				if ($pp_fields_changed_flag == 1)
					{
					// given that only the chapter name changed, don't bother with processing tbl_Members updates because there aren't any
					$proceed_to_Members = 0;	// set to "0" in order to prevent the execution of updating Members
					} 
				$modal_operation .= "<font color='green'>The update to table <b>Members_Chapter</b> was successfully changed wrt revised chapter name for member's chapter record for member ID: ".$member_ID."; ";
				$modal_operation .= "in <b>".$pgm.":227s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
				$modal_msg_footer .= "Operation 227s was successful!";
				$modal_header_bgcolor = $modal_colour_green;	// green
				$modal_footer_bgcolor = $modal_colour_green;	// green
				$pp_fields_changed .= ", inserted new chapter record in Members_Chapter";
				$commandery_updated = 1;		// flag to indicate a successful Members_Chapter table update
				$modal_colour_flag = 1;
				}
			else
				{
				// update to the Members_Chapter name FAILED
				if ($pp_fields_changed_flag == 1)
					{
					// given that only the chapter name was attempted for change, don't bother with processing Members updates because there aren't any
					// and assign the modal window the relevant values for the failure
					$proceed_to_Members = 0;	// set to "0" in order to prevent the execution of updating Members
					} 
				$modal_operation .= "<font color='red'>The update to table <b>Members_Chapter</b> FAILED to change the chapter name for member's chapter record for member ID: ".$member_ID." ";
				$modal_operation .= "in <b>".$pgm.":227f</b> operating under userID: <b>".$_SESSION['UserID']."</b><br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_c."</i>.";
				$modal_msg_footer .= "Operation 227f FAILED!";
				$modal_header_bgcolor = $modal_colour_red;	// red
				$modal_footer_bgcolor = $modal_colour_red;	// red
				$modal_colour_flag = 1;
				}
			}
		} // end $chapter_changed

	if ($honourary_check_changed)
		{
		// zero out the existing rank record in preparation to insert a new honourary rank record
		$SQL  = 'UPDATE Members_Rank SET Current_Status = 0 WHERE Member_ID = '.$member_ID;
		$Result = mysqli_query($LinkID, $SQL);
		$SQL  = 'INSERT INTO Members_Rank (Member_ID, Rank_ID, Rank_Date, Current_Status, Location) ';
		$SQL .= 'VALUES ('.$member_ID.', 77, "'.$today.'", 1, "'.$honourary_location.'")';
		$Result = mysqli_query($LinkID, $SQL);
		if (mysqli_errno($LinkID) == 0) 
			{
			// the insertion of the honourary rank was successfull
			$modal_operation .= "<font color='green'> The addition of honourary rank to table <b>Members_Rank</b> was successful for member's membership record for member ID: ".$member_ID;
			$modal_operation .= " in <b>".$pgm.":269s</b> operating under userID: <b>".$_SESSION['UserID']."; </b></font>";
			$modal_msg_footer .= $comma."Operation 269s was successful!";
			if (!$chapter_changed)
				{
				$modal_header_bgcolor = $modal_colour_green;
				$modal_footer_bgcolor = $modal_colour_green;
				}
			else
				{
				$modal_header_bgcolor = $modal_colour_orange;
				$modal_footer_bgcolor = $modal_colour_orange;
				}
			$pp_fields_changed .= ", insert honourary rank to Members_Rank";
			}
		else
			{
			// the insertion of the honourary rank FAILED
			$modal_operation .= "<font color='red'> The addition of honourary rank to table <b>Members_Rank</b> FAILED for member's membership record for member ID: ".$member_ID;
			$modal_operation .= " in <b>".$pgm.":269f</b> operating under userID: <b>".$_SESSION['UserID']."; </b></font><br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL."</i>.";
			$modal_msg_footer .= $comma."Operation 269f FAILED!";
			if (!$chapter_changed)
				{
				$modal_header_bgcolor = $modal_colour_red;
				$modal_footer_bgcolor = $modal_colour_red;
				}
			else
				{
				$modal_header_bgcolor = $modal_colour_orange;
				$modal_footer_bgcolor = $modal_colour_orange;
				}
			}
		}

	if ($proceed_to_Members)
		{
		// Save Membership Profile information
		$SQL  = 'UPDATE Members SET ';
		if ($membership_date_changed)
			{ $SQL .= 'Date_Joined	= "'.$_POST["MemDate_Form"].'", '; }
		if ($rank_new_changed)
			{ $SQL .= 'Portrait_File = "'.$new_portrait_file.'", '; }
		if ($status_new_changed)
			{ $SQL .= 'Status_ID = '.$_POST['Status_New'].', '; }
		if ($chapter_changed)
			{
			$SQL .= 'Chapter_ID = "'.$_POST['ChapterID'].'", ';
			$comma = ", ";
			}
		$SQL .= 'Member_Number			=  "'.$_POST["MemNumber"].'" ';
		$SQL .= 'WHERE Member_ID = ' . $member_ID;
		$Result = mysqli_query($LinkID, $SQL);
		if (mysqli_errno($LinkID) == 0) 
			{
			// the update was successful with respect to the existing record in Members_Status
			// the update to the Membership profile record was successfull, generate a modal popup indicating the success
			$modal_operation .= "<font color='green'> The update to table <b>Members</b> was successfully updated for member's membership record for member ID: ".$member_ID;
			$modal_operation .= " in <b>".$pgm.":335s</b> operating under userID: <b>".$_SESSION['UserID']."; </b></font>";
			$modal_msg_footer .= $comma."Operation 335s was successful!";
			if ($chapter_changed)
				{
				$modal_header_bgcolor = $modal_colour_green;
				$modal_footer_bgcolor = $modal_colour_green;
				}
			else
				{
				$modal_header_bgcolor = $modal_colour_orange;
				$modal_footer_bgcolor = $modal_colour_orange;
				}
			$pp_fields_changed .= ", updated member number/honourary/date joined record(s) in Members";
			}
		else
			{
			// the update failed with respect to the existing record in Members_Status
			// however, the update to the Membership profile record was successfull, generate a modal popup indicating the success
			$modal_operation .= "<font color='red'> The update to table <b>Members</b> FAILED to update member's record for member ID: ".$member_ID;
			$modal_operation .= " in <b>".$pgm.":335f</b> operating under userID: <b>".$_SESSION['UserID']."</b><br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL."</i>.";
			$modal_msg_footer .= $comma."Operation 335f FAILED!";
			if (!$chapter_changed)
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
		} // end of $proceed_to_tbl_Members

	// process new entries for status
	if ($status_new_changed)
		{
		// ensure that a status had been selected in order to prevent only a date from being entered to the database
		// Save status data
		if ($status_date_new_changed)
			{
			// along with the status ID selection, a status date was also entered
			$SQL_s    = 'INSERT INTO Members_Status VALUES ()';
			$Result_s = mysqli_query($LinkID, $SQL_s);
			if (mysqli_errno($LinkID) == 0) 
				{
				$index_ID = mysqli_insert_id($LinkID);
				// update Members_Status by setting the current status of any existing record of that member to "0"
				// before updating a new record with the new status and date
				$SQL_s  = 'UPDATE Members_Status SET ';
				$SQL_s .= 'Current_Status	=  0 ' ;
				$SQL_s .= 'WHERE Member_ID 	= '.$member_ID;
				$Result_s = mysqli_query($LinkID, $SQL_s);
				
				// now update Members_Status with the new status entered
				$SQL_s  = 'UPDATE Members_Status SET ';
				$SQL_s .= 'Member_ID		=  '.$member_ID.', ';
				$SQL_s .= 'Status_ID		= "'.$_POST['Status_New'].'", ';
				if ($_POST['StatusDate_New']) {	$SQL_s .= 'Status_Date		= "'.$_POST['StatusDate_New'].'", '; }
				else { $SQL_s .= 'Status_Date = "'.$today.'"'; }
				$SQL_s .= 'Current_Status	=  1 ' ;
				$SQL_s .= 'WHERE Index_ID 	= '.$index_ID;
				$Result_s = mysqli_query($LinkID, $SQL_s);
				if (mysqli_errno($LinkID) == 0) 
					{
					$modal_operation .= " <font color='green'>Update to new record in <b>Members_Status</b> was SUCCESSFUL for status record for member ID: ".$member_ID;
					$modal_operation .= " in <b>".$pgm.":405s</b> operating under userID: <b>".$_SESSION['UserID']."; </b></font>";
					$modal_msg_footer .= " Operation 405s was successful!";
					$modal_header_bgcolor = $modal_colour_green;
					$modal_footer_bgcolor = $modal_colour_green;
					}
				else
					{
					// the update to the newly inserted record has FAILED
					$modal_operation .= "<font color='red'> Update to new record in <b>Members_Status</b> FAILED for status record for member ID: ".$member_ID;
					$modal_operation .= " in <b>".$pgm.":405f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
					$modal_operation .= "<br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_s."</i>.";
					$modal_msg_footer .= $comma." Operation 405f FAILED!";
					$modal_header_bgcolor = $modal_colour_orange;
					$modal_footer_bgcolor = $modal_colour_orange;
					}
				}
			else
				{
				// unable to create a new record in Members_Status, and therefore, unable to update the new
				// record with the new status entered
				$modal_operation .= " <font color='red'>Insertion to a blank (initialized) record in <b>Members_Status</b> FAILED for member ID: ".$member_ID;
				$modal_operation .= " in <b>".$pgm.":387f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
				$modal_operation .= " <br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_s."</i>.";
				$modal_msg_footer .= $comma." Operation 387f FAILED!";
				$modal_footer_bgcolor = $modal_colour_orange;
				$modal_footer_bgcolor = $modal_colour_orange;
				}
			}
		else
			{
			// only the status ID was selected, no date accompanies the status ID
			$SQL_s    = 'INSERT INTO Members_Status VALUES ()';
			$Result_s = mysqli_query($LinkID, $SQL_s);
			if (mysqli_errno($LinkID) == 0) 
				{
				$index_ID = mysqli_insert_id($LinkID);
				// update Members_Status by setting the current status of any existing record to "0"
				// before updating a new record with the new status and date
				$SQL_s  = 'UPDATE Members_Status SET ';
				$SQL_s .= 'Current_Status	=  0 ' ;
				$SQL_s .= 'WHERE Member_ID 	= '.$member_ID;
				$Result_s = mysqli_query($LinkID, $SQL_s);
				
				// now update Members_Status with the new status entered but in this case, no date was entered, so use today's date
				$SQL_s  = 'UPDATE Members_Status SET ';
				$SQL_s .= 'Member_ID		=  '.$member_ID.', ';
				$SQL_s .= 'Status_ID		= "'.$_POST['Status_New'].'", ';
				$SQL_s .= 'Status_Date		= "'.$today.'", ';
				$SQL_s .= 'Current_Status	=  1 ' ;
				$SQL_s .= 'WHERE Index_ID 	= '.$index_ID;
				$Result_s = mysqli_query($LinkID, $SQL_s);
				if (mysqli_errno($LinkID) == 0) 
					{
					$modal_operation .= " <font color='green'>Update to new record in <b>Members_Status</b> was SUCCESSFUL for status record for status only, as no date was entered, for member ID: ".$member_ID;
					$modal_operation .= " in <b>".$pgm.":476s</b> operating under userID: <b>".$_SESSION['UserID']."; </b>. </font>";
					$modal_msg_footer .= " Operation 476s was successful!";
					$modal_header_bgcolor = $modal_colour_green;
					$modal_footer_bgcolor = $modal_colour_green;
					}
				else
					{
					// the update to the newly inserted record has FAILED
					$modal_operation .= "<font color='red'> Update to new initalized blank record in <b>Members_Status</b> FAILED for status ID update (no date was entered) status record for member ID: ".$member_ID;
					$modal_operation .= " in <b>".$pgm.":476f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>. Please copy the error message and email to the webmaster.";
					$modal_operation .= " <br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_s."</i>.";
					$modal_msg_footer .= $comma." Operation 476f FAILED!";
					$modal_header_bgcolor = $modal_colour_orange;
					$modal_footer_bgcolor = $modal_colour_orange;
					}
				}
			} // end $status_date_new_changed
		}
	elseif (isset($_POST['StatusDate_New']))
		{
		// if the status new drop box was activated, but no value selected, allowing one to enter a date without a status,
		// then, prevent the date from being entered without a status assigned!!!!!!
		$modal_operation .= " <font color='red'>Insertion to a blank (initialized) record in <b>Members_Status</b> FAILED because status date was NOT accompanied with status for member ID: ".$member_ID;
		$modal_operation .= " in <b>".$pgm.":380f</b> operating under userID: <b>".$_SESSION['UserID']."</b>";
		$modal_operation .= " Entering a status date without including a status ID is NOT permitted.; </font>";
		$modal_msg_footer .= $comma." Operation 380f FAILED!";
		$modal_footer_bgcolor = $modal_colour_orange;
		$modal_footer_bgcolor = $modal_colour_orange;
		} // end $status_new_changed

	// process new entries for rank
	if ($rank_new_changed)
		{
		// ensure that a rank had been selected in order to prevent only a date from being entered to the database
		// Save rank data
		if ($rank_date_new_changed)
			{
			$SQL_r    = 'INSERT INTO Members_Rank VALUES ()';
			$Result_r = mysqli_query($LinkID, $SQL_r);
			if (mysqli_errno($LinkID) == 0) 
				{
				$index_ID = mysqli_insert_id($LinkID);
				// update Members_Rank by setting the current rank of any existing record to "0"
				// before updating a new record with the new rank and date
				$SQL_r  = 'UPDATE Members_Rank SET ';
				$SQL_r .= 'Current_Status	=  0 ' ;
				$SQL_r .= 'WHERE Member_ID 	= '.$member_ID;
				$Result_r = mysqli_query($LinkID, $SQL_r);
				
				// now update Members_Rank with the new rank entered
				$SQL_r  = 'UPDATE Members_Rank SET ';
				$SQL_r .= 'Member_ID		=  '.$member_ID.', ';
				$SQL_r .= 'Rank_ID		=  '.$_POST['Rank_New'].', ';
				$SQL_r .= 'Rank_Date		= "'.$_POST['RankDate_New'].'", ';
				$SQL_r .= 'Location		= "'.$_POST['RankLocation_New'].'", ';
				$SQL_r .= 'Current_Status	=  1 ' ;
				$SQL_r .= 'WHERE Index_ID 	= '.$index_ID;
				$Result_r = mysqli_query($LinkID, $SQL_r);
				$new_rank_date = $_POST['RankDate_New'];			// assign the new rank date to $new_rank_date which will be used to insert new record into Members_Portraits
				if (mysqli_errno($LinkID) == 0) 
					{
					$modal_operation .= " <font color='green'>Update to new record in <b>Members_Rank</b> was SUCCESSFUL for rank record for member ID: ".$member_ID;
					$modal_operation .= " in <b>".$pgm.":475s</b> operating under userID: <b>".$_SESSION['UserID']."; </b></font>";
					$modal_msg_footer .= $comma." Operation 475s was successful!";
					$modal_footer_bgcolor = $modal_colour_green;
					$modal_footer_bgcolor = $modal_colour_green;

					// insert new record into Members_Portraits, updating the student's portrait with the latest one from the challenge/test
					$SQL_p  = 'INSERT INTO Members_Portraits (Member_ID, Date, Portrait_File) ';
					$SQL_p .= 'VALUES ('.$member_ID.',"'.$new_rank_date.'","'.$new_portrait_file.'")';  // $new_portrait_file defined in line 172
					$Result_p = mysqli_query($LinkID, $SQL_p);
					$new_rank_date = $_POST['RankDate_New'];			// assign the new rank date to $new_rank_date which will be used to insert new record into Members_Portraits
					if (!mysqli_errno($LinkID) == 0) 
						{
						// the insertion of a new portrait record has FAILED
						$modal_operation .= "<font color='red'> Insertion of new portrait record for image '".$new_portrait_file."' into <b>Members_Portraits</b> FAILED for member ID: ".$member_ID;
						$modal_operation .= " in <b>".$pgm.":542f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
						$modal_operation .= " <br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_p."</i>.; Please copy this message and email to AEMMA database administrator.";
						$modal_msg_footer .= $comma." Operation 542f FAILED!";
						$modal_footer_bgcolor = $modal_colour_orange;
						$modal_footer_bgcolor = $modal_colour_orange;
						}
					}
				else
					{
					// the update to the newly inserted record has FAILED
					$modal_operation .= "<font color='red'> Update to new record in <b>Members_Rank</b> FAILED for rank record for member ID: ".$member_ID;
					$modal_operation .= " in <b>".$pgm.":475f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
					$modal_operation .= " <br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_r."</i>.";
					$modal_msg_footer .= $comma." Operation 475f FAILED!";
					$modal_footer_bgcolor = $modal_colour_orange;
					$modal_footer_bgcolor = $modal_colour_orange;
					}
				}
			else
				{
				// unable to create a new record in Members_Rank, and therefore, unable to update the new
				// record with the new rank entered
				$modal_operation .= " <font color='red'>Insertion to a blank (initialized) record in <b>Members_Rank</b> FAILED for member ID: ".$member_ID;
				$modal_operation .= " in <b>".$pgm.":450f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
				$modal_operation .= " <br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_r."</i>.";
				$modal_msg_footer .= $comma." Operation 450f FAILED!";
				$modal_footer_bgcolor = $modal_colour_orange;
				$modal_footer_bgcolor = $modal_colour_orange;
				}
			} // end $rank_date_new_changed
		else
			{
			// only the rank ID was selected, no date accompanies the rank ID
			$SQL_r    = 'INSERT INTO Members_Rank VALUES ()';
			$Result_r = mysqli_query($LinkID, $SQL_r);
			if (mysqli_errno($LinkID) == 0) 
				{
				$index_ID = mysqli_insert_id($LinkID);
				// update tbl_Ranks_Members by setting the current status of any existing record belongin to the member ID of interest to "0"
				// before updating a new record with the new rank and date
				$SQL_r  = 'UPDATE Members_Rank SET ';
				$SQL_r .= 'Current_Status	=  0 ' ;
				$SQL_r .= 'WHERE Member_ID 	= '.$member_ID;
				$Result_s = mysqli_query($LinkID, $SQL_r);
				
				// now update Members_Status with the new status entered but in this case, without a date
				$SQL_r  = 'UPDATE Members_Rank SET ';
				$SQL_r .= 'Member_ID		=  '.$member_ID.', ';
				$SQL_r .= 'Rank_ID		= "'.$_POST['Rank_New'].'", ';
				$SQL_r .= 'Rank_Date		= "'.$today.'", ';		// defaults to today's date
				$SQL_r .= 'Current_Status	=  1 ' ;
				$SQL_r .= 'Location		= "'.$_POST['RankLocation_New'].'", ';
				$SQL_r .= 'WHERE Index_ID 	= '.$index_ID;
				$Result_r = mysqli_query($LinkID, $SQL_r);
				$new_rank_date = $today;			// assign the new rank date to $new_rank_date which will be used to insert new record into Members_Portraits
				if (mysqli_errno($LinkID) == 0) 
					{
					$modal_operation .= " <font color='green'>Update to new record in <b>Members_Rank</b> was SUCCESSFUL for rank record for rank only, as no date was entered, for member ID: ".$member_ID;
					$modal_operation .= " in <b>".$pgm.":593s</b> operating under userID: <b>".$_SESSION['UserID']."; </b>. </font>";
					$modal_msg_footer .= " Operation 593s was successful!";
					$modal_header_bgcolor = $modal_colour_green;
					$modal_footer_bgcolor = $modal_colour_green;

					// insert new record into Members_Portraits, updating the student's portrait with the latest one from the challenge/test
					$SQL_p  = 'INSERT INTO Members_Portraits (Member_ID, Date, Portrait_File) ';
					$SQL_p .= 'VALUES ('.$member_ID.',"'.$new_rank_date.'","'.$new_portrait_file.'")';  // $new_portrait_file defined in line 172
					$Result_p = mysqli_query($LinkID, $SQL_p);
					$new_rank_date = $_POST['RankDate_New'];			// assign the new rank date to $new_rank_date which will be used to insert new record into Members_Portraits
					if (!mysqli_errno($LinkID) == 0) 
						{
						// the insertion of a new portrait record has FAILED
						$modal_operation .= "<font color='red'> Insertion of new portrait record for image '".$new_portrait_file."' into <b>Members_Portraits</b> FAILED for member ID: ".$member_ID;
						$modal_operation .= " in <b>".$pgm.":542f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
						$modal_operation .= " <br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_p."</i>.; Please copy this message and email to AEMMA database administrator.";
						$modal_msg_footer .= $comma." Operation 542f FAILED!";
						$modal_footer_bgcolor = $modal_colour_orange;
						$modal_footer_bgcolor = $modal_colour_orange;
						}
					}
				else
					{
					// the update to the newly inserted record has FAILED
					$modal_operation .= "<font color='red'> Update to new initalized blank record in <b>Members_Rank</b> FAILED for rank ID update (no date was entered) status record for member ID: ".$member_ID;
					$modal_operation .= " in <b>".$pgm.":593f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>. Please copy the error message and email to the webmaster.";
					$modal_operation .= " <br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_r."</i>.";
					$modal_msg_footer .= $comma." Operation 593f FAILED!";
					$modal_header_bgcolor = $modal_colour_orange;
					$modal_footer_bgcolor = $modal_colour_orange;
					}
				}
			} // end $rank_date_new_changed
		}
	elseif (isset($_POST['RankDate_New']))
		{
		// if the rank new drop box was activated, but no value selected, allowing one to enter a date without a rank,
		// then, prevent the date from being entered without a rank assigned!!!!!!
		$modal_operation .= " <font color='red'>Insertion to a blank (initialized) record in <b>tbl_Ranks_Members</b> FAILED because rank date of <i><b>".$_POST['RankDate_New']."</b></i> was NOT accompanied with a rank ID for member ID: ".$member_ID;
		$modal_operation .= " in <b>".$pgm.":380f</b> operating under userID: <b>".$_SESSION['UserID'].". </b>";
		$modal_operation .= " Entering a rank date without including a rank ID is NOT permitted.; </font>";
		$modal_msg_footer .= $comma." Operation 380f FAILED!";
		$modal_footer_bgcolor = $modal_colour_orange;
		$modal_footer_bgcolor = $modal_colour_orange;
		} // end $rank_new_changed

	// process new entries for position
	if ($position_new_changed)
		{
		// ensure that a position had been selected in order to prevent only a date from being entered to the database
		// Save position data
		if ($position_date_new_changed)
			{
			$SQL_p    = 'INSERT INTO tbl_Positions_Members VALUES ()';
			$Result_p = mysqli_query($LinkID, $SQL_p);
			if (mysqli_errno($LinkID) == 0) 
				{
				$index_ID = mysqli_insert_id($LinkID);
				// now update tbl_Positions_Members with the new position entered
				$SQL_p  = 'UPDATE tbl_Positions_Members SET ';
				$SQL_p .= 'Member_ID		=  '.$member_ID.', ';
				$SQL_p .= 'Position_ID		= "'.$_POST['Position_New'].'", ';
				$SQL_p .= 'Position_Start_Date	= "'.$_POST['PositionDate_New'].'" ';
				$SQL_p .= 'WHERE Index_ID 	= '.$index_ID;
				$Result_p = mysqli_query($LinkID, $SQL_p);
				if (mysqli_errno($LinkID) == 0) 
					{
					$modal_operation .= " <font color='green'>Update to new record in <b>tbl_Positions_Members</b> was SUCCESSFUL for position record for member ID: ".$member_ID;
					$modal_operation .= " in <b>".$pgm.":599s</b> operating under userID: <b>".$_SESSION['UserID']."; </b></font>";
					$modal_msg_footer .= " Operation 599s was successful!";
					$modal_footer_bgcolor = $modal_colour_green;
					$modal_footer_bgcolor = $modal_colour_green;
					}
				else
					{
					// the update to the newly inserted record has FAILED
					$modal_operation .= "<font color='red'> Update to new record in <b>tbl_Positions_Members</b> FAILED for position record for member ID: ".$member_ID;
					$modal_operation .= " in <b>".$pgm.":599f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
					$modal_operation .= " <br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_p."</i>.";
					$modal_msg_footer .= " Operation 599f FAILED!";
					$modal_footer_bgcolor = $modal_colour_orange;
					$modal_footer_bgcolor = $modal_colour_orange;
					}
				}
			else
				{
				// unable to create a new record in tbl_Positions_Members, and therefore, unable to update the new
				// record with the new position entered
				$modal_operation .= " <font color='red'>Insertion to a blank (initialized) record in <b>tbl_Positions_Members</b> FAILED for member ID: ".$member_ID;
				$modal_operation .= " in <b>".$pgm.":589f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
				$modal_operation .= " <br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_p."</i>.";
				$modal_msg_footer .= $comma." Operation 589f FAILED!";
				$modal_footer_bgcolor = $modal_colour_orange;
				$modal_footer_bgcolor = $modal_colour_orange;
				}
			} // end $position_date_new_changed
		}
	elseif (isset($_POST['PositionDate_New']))
		{
		// if the position new drop box was activated, but no value selected, allowing one to enter a date without a position,
		// then, prevent the date from being entered without a position assigned!!!!!!
		$modal_operation .= " <font color='red'>Insertion to a blank (initialized) <b>tbl_Positions_Members</b> record FAILED because position date of <i><b>".$_POST['PositionDate_New']."</b></i> was NOT accompanied with a position ID for member ID: ".$member_ID;
		$modal_operation .= " in <b>".$pgm.":586f</b> operating under userID: <b>".$_SESSION['UserID'].". </b>";
		$modal_operation .= " Entering an position date without including a position ID is NOT permitted.; </font>";
		$modal_msg_footer .= $comma." Operation 586f FAILED!";
		$modal_footer_bgcolor = $modal_colour_orange;
		$modal_footer_bgcolor = $modal_colour_orange;
		} // end $position_new_changed

	// process membership category
	if ($membership_category_changed)
		{
		if ($membership_category_exits)
			{
			// zero out the existing membership category current_state field in preparation of adding new membership category
			$SQL_CT  = 'UPDATE Members_Category SET Current_Status = 0 WHERE Member_ID = '.$member_ID;
			$Result_CT = mysqli_query($LinkID, $SQL_CT);
			}
		else
			{
			// insert new membership category, while preserving the previous one if exists
			$SQL_CT  = 'INSERT INTO Members_Category (Member_ID, Category_ID, Date, Current_Status) ';
			$SQL_CT .= 'VALUES ('.$member_ID.', '.$_POST['CategoryID'].', "'.$Line_Members->Date_Joined.'",1)';
			$Result_CT = mysqli_query($LinkID, $SQL_CT);
			if (mysqli_errno($LinkID) == 0) 
				{
				$modal_operation .= " <font color='green'>Update with new category record in <b>Members_Category</b> was SUCCESSFUL for record for member ID: ".$member_ID;
				$modal_operation .= " in <b>".$pgm.":759s</b> operating under userID: <b>".$_SESSION['UserID']."; </b></font>";
				$modal_msg_footer .= " Operation 759s was successful!";
				$modal_footer_bgcolor = $modal_colour_green;
				$modal_footer_bgcolor = $modal_colour_green;
				}
			else
				{
				// the update to the newly inserted record has FAILED
				$modal_operation .= "<font color='red'> Update to new category record in <b>Members_Category</b> FAILED for member ID: ".$member_ID;
				$modal_operation .= " in <b>".$pgm.":759f</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
				$modal_operation .= " <br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_CT."</i>.";
				$modal_msg_footer .= " Operation 759f FAILED!";
				$modal_footer_bgcolor = $modal_colour_orange;
				$modal_footer_bgcolor = $modal_colour_orange;
				}
			}
		} // end $membership_category_changed


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
		$SQL_log .= 'Action		=  "'.$pp_fields_changed.'" ';
		$SQL_log .= 'WHERE Index_ID = '.$index_num;
		$Result_log = mysqli_query($LinkID, $SQL_log);
		if (mysqli_errno($LinkID) == 0) 
			{
			// don't need to do anything, the admin log record was successfully entered
			}
		else
			{
			$modal_operation .= " <font color='red'>Failed to update the initialized blank log record in <b>tbl_Admin_log</b> for recent operation on member ID: ".$member_ID;
			$modal_operation .= " in <b>".$pgm.":665f</b> operating under userID: <b>".$_SESSION['UserID'].". </b>. Please copy the entire message and email to the webmaster.";
			$modal_operation .= " <font color='red'>The SQL where the failure occurred: </font>'".$SQL_log."'";
			$modal_msg_footer .= $comma." Operation 665f FAILED!";
			$modal_footer_bgcolor = $modal_colour_orange;
			$modal_footer_bgcolor = $modal_colour_orange;
			}
		}
	else
		{
		// the insertion of a blank admin log record failed - most likely because there is a problem with the insertion SQL or the table tbl_Admin_log
		$modal_operation .= " <font color='red'>Failed to insert a blank log record in <b>tbl_Admin_log</b> for recent operation on member ID: ".$member_ID;
		$modal_operation .= " in <b>".$pgm.":666f</b> operating under userID: <b>".$_SESSION['UserID'].". </b>. Please copy the entire message and email to the webmaster.";
		$modal_operation .= " <br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL_log."</i>.";
		$modal_msg_footer .= $comma." Operation 665f FAILED!";
		$modal_footer_bgcolor = $modal_colour_orange;
		$modal_footer_bgcolor = $modal_colour_orange;
		}
	} // end of if ($pp_fields_changed_flag)
else
	{
	// none of the fields have changed, do nothing and inform the browser of this fact
	$modal_operation .= " <font color='red'>No updates/changes were made to member's record in <b>tbl_Members</b> for recent operation on member ID: ".$member_ID;
	$modal_operation .= " in <b>".$pgm.":666f</b> operating under userID: <b>".$_SESSION['UserID'].".</b>. Please try again and update one or more fields.";
	$modal_msg_footer .= $comma." Operation 666f NOT applied!";
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
echo ('parent.location.href="Members_show.php?MID='.$member_ID.'&MOD=1&TAB=1&STATE=Update"');
echo ('</script>');
?>
