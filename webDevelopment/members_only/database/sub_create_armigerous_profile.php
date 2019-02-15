<?php
ini_set('display_errors','On');
// Function: sub_create_armigerous_profile.php
// Author: David M. Cvet
// Created: Oct 17, 2016
// Description:
//---------------------------
// Updates:
//	2017 ----------
//	jul 25:	added function to test for apostrophies or quotes in strings entered into armigerous profile
//	sep 18:	added new variable $admin which is set in both Members_show.php ($admin = 0) or Armigers_show.php ($admin = 1)
//	nov 28:	added two new fields, language preferred for the entry in the roll, and Lyon Court
//	dec 03:	if this is to be a new armigerous record, the armoury name and caption have been generated and are inserted as placeholder values,
//		and if this is to be submitted, the placeholder values are to be picked up by the update module by checking their respective hidden values

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

include 'php-bin/function_string_backslash.php';

// initialize modal variables
$pgm_name		= "sub_create_armigerous_profile.php";
$admin			= $_GET['ADM'];		// indicates if this was invoked by AIMS ("0") or the admin function ("1")
$modal_title		= "<font color='black'><b>Dbase Create New Armigerous Profile:</b></font></br />";
$modal_operation 	= "";
$modal_msg_footer 	= "";
$modal_colour_green	= "#5cb85c";		// green
$modal_colour_orange	= "orange";		// orange
$modal_colour_red	= "#c90a13";		// red
$modal_colour_flag	= 0;			// setting this flag to "1" indicates that a previous process has assign its prescribed colour, so, if it was green, and an error occurred in the following process, set the colour to orange, if not, set to red
$modal_header_bgcolor 	= $modal_colour_green;	// default header colour assigned
$modal_footer_bgcolor 	= $modal_colour_green;	// default footer colour to be assigned
$member_ID 		= $_POST['MemID'];
$on_the_roll		= 0;

// begin set database and members only library paths, default PHP variables and their values, and header
$AIMS_common = $path_dbase."php-bin/AIMS_common.php"; include "$AIMS_common";		// contains the config files, IDinvalid, SS path, DB.php, start session, etc. common to 
$header = $path_members."php-bin/members_only_header.php"; include "$header";	// css file, links, etc. common to all members only and AIMS scripts
$LinkID=dbConnect($DB);
// end begin set database and members only library paths, default PHP variables and their values, and header

//$arms_URL = "armoury/members_arms/";
$arms_URL = "armoury/";

//$membership_type = $_POST["MemType"];
//if ($membership_type == 1 || $membership_type == 4 || $membership_type == 5 || $membership_type == 6)
//	{$arms_URL = "armoury/personal_arms/";}
//elseif ($membership_type == 2 || $membership_type == 3)
//	{$arms_URL = "armoury/educational_arms/";}
//elseif ($membership_type == 7)
//	{$arms_URL = "armoury/municipal_arms/";}
//elseif ($membership_type == 8)
//	{$arms_URL = "armoury/naval_arms/";}

// given that this is a "create" form, generate the next index ID by inserting a blank record into Members_Armigerous in order to initialize the new record
$SQL    = 'INSERT INTO Members_Armigerous VALUES ()';
$Result = mysqli_query($LinkID, $SQL);
if (mysqli_errno($LinkID) == 0) 
	{
	$index_ID = mysqli_insert_id($LinkID);
//echo ('debug:sub_create_armigerous_profile:35:index_ID="'.$index_ID.'"');exit;
	// now update the new blank record with the values from the armigerous profile form (POST values)
	$SQL  = 'UPDATE Members_Armigerous SET ';
	$SQL .= 'Arms_URL = "'.$arms_URL.'", '; 
	if ($_POST['PossibleArmouryName'] <> "")
		{ $SQL .= 'Armoury_Name = "'.StringBackSlash($_POST["PossibleArmouryName"]).'", '; }
	elseif ($_POST["ArmouryName"]) 	{ $SQL .= 'Armoury_Name = "'.StringBackSlash($_POST["ArmouryName"]).'", '; }
	if ($_POST['PossibleArmouryCaption'] <> "")
		{ $SQL .= 'Caption = "'.StringBackSlash($_POST["PossibleArmouryCaption"]).'", '; }
	elseif ($_POST["CaptionName"]) 	{ $SQL .= 'Caption = "'.StringBackSlash($_POST["CaptionName"]).'", '; }
	if ($_POST["ArmsFile100"]) 	{ $SQL .= 'Arms_file_100 = "'.$_POST["ArmsFile100"].'", ';}
	if ($_POST["ArmsFile350"]) 	{ $SQL .= 'Arms_file_350 = "'.$_POST["ArmsFile350"].'", ';}
	if ($_POST["ArmsFileLarge"]) 	{ $SQL .= 'Arms_file_large = "'.$_POST["ArmsFileLarge"].'", ';}
	if ($_POST["BadgeFile"]) 	{ $SQL .= 'Badge_file = "'.$_POST["BadgeFile"].'", ';}
	if ($_POST["FlagFile"]) 	{ $SQL .= 'Flag_file = "'.$_POST["FlagFile"].'", ';}
	if ($_POST["PaintedFile"]) 	{ $SQL .= 'Painted_arms_file = "'.$_POST["PaintedFile"].'", ';}
	if ($_POST["PaintedFileSmall"])	{ $SQL .= 'Painted_arms_small_file = "'.$_POST["PaintedFileSmall"].'", ';}
	if ($_POST["PaintedBy"]) 	{ $SQL .= 'Painted_by = "'.$_POST["PaintedBy"].'", ';}
	if ($_POST["PaintedDate"]) 	{ $SQL .= 'Painted_date = "'.$_POST["PaintedDate"].'", ';}
	if (isset($_POST["ArmouryLetter"])) 	{ $SQL .= 'Armoury_letter = "'.$_POST["ArmouryLetter"].'", ';}
	if (isset($_POST["PrefLang"])) 	{ $SQL .= 'Lang_Roll = "'.$_POST["PrefLang"].'", ';}
	if (isset($_POST["ArmsInRoll"])) 	{ $SQL .= 'on_the_roll =  '.$_POST["ArmsInRoll"].' , '; $on_the_roll = $_POST["ArmsInRoll"];}
	if ($_POST["BlazonArms"]) 	{ $SQL .= 'Blazon_arms = "'.StringBackSlash($_POST["BlazonArms"]).'", ';}
	if ($_POST["BlazonCrest"]) 	{ $SQL .= 'Blazon_crest	= "'.StringBackSlash($_POST["BlazonCrest"]).'", ';}
	if ($_POST["BlazonMotto"]) 	{ $SQL .= 'Blazon_motto	= "'.StringBackSlash($_POST["BlazonMotto"]).'", ';}
	if ($_POST["BlazonSupporters"]) { $SQL .= 'Blazon_supporters = "'.StringBackSlash($_POST["BlazonSupporters"]).'", ';}
	if ($_POST["BlazonBadge"]) 	{ $SQL .= 'Blazon_badge	= "'.StringBackSlash($_POST["BlazonBadge"]).'", ';}
	if ($_POST["BlazonFlag"]) 	{ $SQL .= 'Blazon_flag = "'.StringBackSlash($_POST["BlazonFlag"]).'", ';}
	if ($_POST["BlazonStandard"]) 	{ $SQL .= 'Blazon_standard = "'.StringBackSlash($_POST["BlazonStandard"]).'", ';}
	if ($_POST["SymbolismFile"]) 	{ $SQL .= 'Symbolism_file = "'.$_POST["SymbolismFile"].'", ';}
	if ($_POST["Symbolism"]) 	{ $SQL .= 'Symbolism = "'.StringBackSlash($_POST["Symbolism"]).'", ';}
	if ($_POST["BioFile"]) 		{ $SQL .= 'Bio_file = "'.$_POST["BioFile"].'", ';}
	if (isset($_POST["CHAcheckbox"])) 	{ $SQL .= 'CHA_chk = '.$_POST["CHAcheckbox"].', ';}
	if (isset($_POST["COAcheckbox"])) 	{ $SQL .= 'COA_chk = '.$_POST["COAcheckbox"].', ';}
	if (isset($_POST["LYONcheckbox"])) 	{ $SQL .= 'LYON_chk = '.$_POST["LYONcheckbox"].', ';}
	if (isset($_POST["NATcheckbox"])) 	{ $SQL .= 'NAT_chk = '.$_POST["NATcheckbox"].', ';}
	if (isset($_POST["INSTcheckbox"])) 	{ $SQL .= 'INST_chk = '.$_POST["INSTcheckbox"].', ';}
	if (isset($_POST["ASScheckbox"])) 	{ $SQL .= 'ASS_chk = '.$_POST["ASScheckbox"].', ';}
	if ($_POST["AuthLink"]) 		{ $SQL .= 'Auth_link =  "'.$_POST["AuthLink"].'", ';}
	if ($_POST["ArmigerousGrantDate"]) 	{ $SQL .= 'Armigerous_Grant_Date =  "'.$_POST["ArmigerousGrantDate"].'", ';}
	if ($_POST["BlazonCadet"]) 	{ $SQL .= 'Blazon_cadet	= "'.StringBackSlash($_POST["BlazonCadet"]).'", ';}
	if ($_POST["CadetFile"]) 	{ $SQL .= 'Cadet_file = "'.$_POST["CadetFile"].'", ';}
	if ($_POST["ArmigersNotes"]) 	{ $SQL .= 'Armigers_Notes = "'.StringBackSlash($_POST["ArmigersNotes"]).'", ';}
	if ($_POST["ArmsSource"]) 	{ $SQL .= 'Source = "'.$_POST["ArmsSource"].'", ';}
	if ($_POST["Artist"]) 		{ $SQL .= 'Artist = "'.$_POST["Artist"].'", ';}
	if ($_POST["Calligrapher"]) 	{ $SQL .= 'Calligrapher = "'.$_POST["Calligrapher"].'", ';}
	$SQL .= 'Member_ID		= '.$member_ID.' ';
	$SQL .= 'WHERE Index_ID = '.$index_ID;
//echo ('debug:sub_create_armigerous_profile:61:SQL="'.$SQL.'"');exit;
	$Result = mysqli_query($LinkID, $SQL);
	if (mysqli_errno($LinkID) == 0) 
		{
		// now update the armigerous flag in Members record
		$SQL  = 'UPDATE Members SET Armigerous = 1, Armigerous_Date = "'.$_POST["ArmigerousGrantDate"].'", on_the_roll = '.$on_the_roll.' ';
		$SQL .= 'WHERE Member_ID = '.$member_ID;
		$Result = mysqli_query($LinkID, $SQL);
		if (mysqli_errno($LinkID) == 0) 
			{
			// the update (create new record) was successful with respect to the blank record created earlier in Members_Armigerous
			// the update to the Personal profile record was successfull, generate a modal popup indicating the success
			$modal_operation .= "<font color='green'>AIMS has successfully inserted a new armigerous profile record into <b>Members_Armigerous</b> with Member ID: ".$member_ID." ";
			$modal_operation .= "executing function in <b>".$pgm_name.":66s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
			$modal_msg_footer .= "Operation 66s was successful!";
			$modal_header_bgcolor = $modal_colour_green;	// green
			$modal_footer_bgcolor = $modal_colour_green;	// green
			}
		else
			{
			// the update failed with respect to the existing record in Members_Armigerous
			// generate a modal popup indicating the FAILED operation
			$modal_operation .= "<font color='red'>AIMS has succeeded in initializing a blank armigerous record but FAILED to update the new armigerous profile record in <b>Members_Armigerous</b> with Member ID: ".$member_ID." ";
			$modal_operation .= " executing function in <b>".$pgm_name.":66f</b> operating under userID: <b>".$_SESSION['UserID']."</b> <br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL."</i> </font>";
			$modal_msg_footer .= "Operation 66f FAILED!";
			$modal_header_bgcolor = $modal_colour_red;	// red
			$modal_footer_bgcolor = $modal_colour_red;	// red
			}
		}
	else
		{
		// the update failed with respect to the newly initialized record in Members_Armigerous
		// generate a modal popup indicating the FAILED operation
		$modal_operation .= "<font color='red'>AIMS has FAILED to populate the newly initilized armigerous record for the new armigerous profile record in <b>Members_Armigerous</b> with Member ID: ".$member_ID." ";
		$modal_operation .= " executing function in <b>".$pgm_name.":60f</b> operating under userID: <b>".$_SESSION['UserID']."</b> <br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL."</i></font> ";
		$modal_msg_footer .= "Operation 60f FAILED!";
		$modal_header_bgcolor = $modal_colour_red;	// red
		$modal_footer_bgcolor = $modal_colour_red;	// red
		}
	} // end if INSERT INTO Members_Armigerous VALUES
else
	{
	// the insertion failed with respect to initializing a blank record in Members_Armigerous
	// generate a modal popup indicating the FAILED operation
	$modal_operation .= "<font color='red'>AIMS has FAILED to insert a new <b>blank</b> member armigerous profile record into <b>Members_Armigerous</b> with Member ID: ".$member_ID." ";
	$modal_operation .= " executing function in <b>".$pgm_name.":31f</b> operating under userID: <b>".$_SESSION['UserID']."</b> <br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL."</i></font>";
	$modal_msg_footer .= "Operation 31f FAILED!";
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
if ($admin)
	{ echo ('parent.location.href="Armigers_show.php?MID='.$member_ID.'&MOD=1&STATE=Update"');}
else	{ echo ('parent.location.href="Members_show.php?MID='.$member_ID.'&MOD=1&TAB=7&STATE=Update"');}
echo ('</script>');

?>
