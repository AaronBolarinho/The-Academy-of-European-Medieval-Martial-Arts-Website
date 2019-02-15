<?php
ini_set('display_errors','On');

// Function: sub_update_armigerous_profile.php
// Author: David M. Cvet
// Created: Oct 30, 2016
// Description:
//---------------------------
// Updates:
//	2017 ----------
//	jul 25:	added function to test for apostrophies or quotes in strings entered into armigerous profile

include 'php-bin/function_string_backslash.php';

// initialize variable(s) used to compare existing values with updated values
$pgm_name		= "sub_update_armigerous_profile.php";
$member_ID 		= $_POST['MemID'];
$pp_fields_changed_flag	 = 0;
$pp_fields_changed 	 = "PGM:sub_update_armigerous_profile.php; Table updated: Members_Armigerous, Field(s) updated (for member ID: $member_ID): ";
$pp_fields_changed_comma = ", ";
$deceased_changed	 = 0;	// a flag to identify that something has changed with deceased or deceased date
$modal_colour_green	 = "#5cb85c";	// green
$modal_colour_orange	 = "orange";	// orange
$modal_colour_red	 = "#c90a13";	// red
$modal_colour_flag	 = 0;		// setting this flag to "1" indicates that a previous process has assign its prescribed colour, so, if it was green, and an error occurred in the following process, set the colour to orange, if not, set to red
$modal_title		= "<font color='black'><b>Dbase Update Armigerous Profile:</b></font></br />";
$modal_operation 	= "";
$modal_msg_footer 	= "";
$modal_header_bgcolor 	= $modal_colour_green;	// default header colour assigned
$modal_footer_bgcolor 	= $modal_colour_green;	// default footer colour to be assigned
$armigerous_member_symbols_update = 0;

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

// Retrieve "Member's Armigerous Profile" data from AIMS
//
$SQL  = 'SELECT Member_ID, Armoury_Name, Arms_URL, Arms_file_100, Caption, Arms_file_350, Arms_file_large, Badge_file, Flag_file, Standard_file, on_the_roll, Armoury_letter, Source, Armigerous_Grant_Date, ';
$SQL .= 'CHA_chk, COA_chk, LYON_chk, NAT_chk, INST_chk, ASS_chk, Auth_link, Blazon_arms, Blazon_crest, Blazon_motto, Blazon_supporters, Blazon_badge, Blazon_badge, Blazon_flag, Blazon_standard, Symbolism_file, Blazon_cadet, ';
$SQL .= 'Cadet_file, Bio_file, Artist, Calligrapher, Symbolism, Painted_arms_file, Painted_arms_small_file, Painted_by, Painted_date ';
$SQL .= 'FROM Members_Armigerous ';
$SQL .= 'WHERE Member_ID = ' .  $member_ID;
//echo ('debug:sub_update_personal_profile:36:SQL="'.$SQL.'"');exit;
$Result = mysqli_query($LinkID, $SQL);
$Line_Members_Armigerous = mysqli_fetch_object($Result);

// compare before and after values, and if there's a change, then create a change list which will be used to echo the changes to the browser
// and record the changes in the change log table, along with the username and date
//
// need to check if the form has passed over the value of checkbox - if checkbox was NOT checked, then the variable doesn't exist on transmission from form to PHP
if ($Line_Members_Armigerous->Armoury_Name <> $_POST["ArmouryName"]) { $pp_fields_changed .= "armoury name changed from: ".StringBackSlash($Line_Members_Armigerous->Armoury_Name)." to: ".StringBackSlash($_POST["ArmouryName"]); $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Arms_file_100 <> $_POST["ArmsFile100"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "arms file 100 changed from: ".$Line_Members_Armigerous->Arms_file_100." to: ".$_POST["ArmsFile100"]; $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Caption <> $_POST["CaptionName"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "caption changed from: ".StringBackSlash($Line_Members_Armigerous->Caption)." to: ".StringBackSlash($_POST["CaptionName"]); $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Arms_file_350 <> $_POST["ArmsFile350"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "arms file 350 changed from: ".$Line_Members_Armigerous->Arms_file_350." to: ".$_POST["ArmsFile350"]; $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Arms_file_large <> $_POST["ArmsFileLarge"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "arms file large changed from: ".$Line_Members_Armigerous->Arms_file_large." to: ".$_POST["ArmsFileLarge"]; $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Badge_file <> $_POST["BadgeFile"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "badge file changed from: ".$Line_Members_Armigerous->Badge_file." to: ".$_POST["BadgeFile"]; $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Flag_file <> $_POST["FlagFile"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "flag file changed from: ".$Line_Members_Armigerous->Flag_file." to: ".$_POST["FlagFile"]; $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Standard_file <> $_POST["StandardFile"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "standard file changed from: ".$Line_Members_Armigerous->Standard_file." to: ".$_POST["StandardFile"]; $pp_fields_changed_flag ++; }
if (isset($_POST["AmouryLetter"])) { if ($Line_Members_Armigerous->Armoury_letter <> $_POST["AmouryLetter"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "armoury letter changed from: ".$Line_Members_Armigerous->Armoury_letter." to: ".$_POST["AmouryLetter"]; $pp_fields_changed_flag ++; }}
if (isset($_POST["ArmsInRoll"])) { if ($Line_Members_Armigerous->on_the_roll <> $_POST["ArmsInRoll"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "on the roll changed from: ".$Line_Members_Armigerous->on_the_roll." to: ".$_POST["ArmsInRoll"]; $pp_fields_changed_flag ++; }}
if ($Line_Members_Armigerous->Blazon_arms <> $_POST["BlazonArms"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "arms blazon changed from: ".StringBackSlash($Line_Members_Armigerous->Blazon_arms)." to: ".StringBackSlash($_POST["BlazonArms"]); $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Blazon_crest <> $_POST["BlazonCrest"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "crest blazon changed from: ".StringBackSlash($Line_Members_Armigerous->Blazon_crest)." to: ".StringBackSlash($_POST["BlazonCrest"]); $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Blazon_motto <> $_POST["BlazonMotto"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "motto blazon changed from: ".StringBackSlash($Line_Members_Armigerous->Blazon_motto)." to: ".StringBackSlash($_POST["BlazonMotto"]); $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Blazon_supporters <> $_POST["BlazonSupporters"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "supporters blazon changed from: ".StringBackSlash($Line_Members_Armigerous->Blazon_supporters)." to: ".StringBackSlash($_POST["BlazonSupporters"]); $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Blazon_badge <> $_POST["BlazonBadge"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "badge blazon changed from: ".StringBackSlash($Line_Members_Armigerous->Blazon_badge)." to: ".StringBackSlash($_POST["BlazonBadge"]); $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Blazon_flag <> $_POST["BlazonFlag"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "flag blazon changed from: ".StringBackSlash($Line_Members_Armigerous->Blazon_flag)." to: ".StringBackSlash($_POST["BlazonFlag"]); $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Blazon_standard <> $_POST["BlazonStandard"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "standard blazon changed from: ".StringBackSlash($Line_Members_Armigerous->Blazon_standard)." to: ".StringBackSlash($_POST["BlazonStandard"]); $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Symbolism_file <> $_POST["SymbolismFile"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "symbolism file changed from: ".$Line_Members_Armigerous->Symbolism_file." to: ".$_POST["SymbolismFile"]; $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Blazon_cadet <> $_POST["BlazonCadet"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "cadet blazon changed from: ".StringBackSlash($Line_Members_Armigerous->Blazon_cadet)." to: ".StringBackSlash($_POST["BlazonCadet"]); $pp_fields_changed_flag ++; }
if (isset($_POST["CHAcheckbox"])) { if ($Line_Members_Armigerous->CHA_chk <> $_POST["CHAcheckbox"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "CHA check box: ".$Line_Members_Armigerous->CHA_chk." to: ".$_POST["CHAcheckbox"]; $pp_fields_changed_flag ++; }}
if (isset($_POST["COAcheckbox"])) { if ($Line_Members_Armigerous->COA_chk <> $_POST["COAcheckbox"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "COA check box: ".$Line_Members_Armigerous->COA_chk." to: ".$_POST["COAcheckbox"]; $pp_fields_changed_flag ++; }}
if (isset($_POST["LYONcheckbox"])) { if ($Line_Members_Armigerous->LYON_chk <> $_POST["LYONcheckbox"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "Lyon check box: ".$Line_Members_Armigerous->LYON_chk." to: ".$_POST["LYONcheckbox"]; $pp_fields_changed_flag ++; }}
if (isset($_POST["NATcheckbox"])) { if ($Line_Members_Armigerous->NAT_chk <> $_POST["NATcheckbox"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "NAT check box: ".$Line_Members_Armigerous->NAT_chk." to: ".$_POST["NATcheckbox"]; $pp_fields_changed_flag ++; }}
if (isset($_POST["INSTcheckbox"])) { if ($Line_Members_Armigerous->INST_chk <> $_POST["INSTcheckbox"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "INST check box: ".$Line_Members_Armigerous->INST_chk." to: ".$_POST["INSTcheckbox"]; $pp_fields_changed_flag ++; }}
if (isset($_POST["ASScheckbox"])) { if ($Line_Members_Armigerous->ASS_chk <> $_POST["ASScheckbox"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "ASS check box: ".$Line_Members_Armigerous->ASS_chk." to: ".$_POST["ASScheckbox"]; $pp_fields_changed_flag ++; }}
if ($Line_Members_Armigerous->Source <> $_POST["ArmsSource"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "source of grant changed from: ".StringBackSlash($Line_Members_Armigerous->Source)." to: ".StringBackSlash($_POST["ArmsSource"]); $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Armigerous_Grant_Date <> $_POST["ArmigerousGrantDate"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "date of grant changed from: ".$Line_Members_Armigerous->Armigerous_Grant_Date." to: ".$_POST["ArmigerousGrantDate"]; $pp_fields_changed_flag ++; }
if (isset($_POST["AuthLink"])) { if ($Line_Members_Armigerous->Auth_link <> $_POST["AuthLink"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "authority link changed from: ".$Line_Members_Armigerous->Auth_link." to: ".$_POST["AuthLink"]; $pp_fields_changed_flag ++; }}
if ($Line_Members_Armigerous->Bio_file <> $_POST["BioFile"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "bio file changed from: ".$Line_Members_Armigerous->Bio_file." to: ".$_POST["BioFile"]; $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Cadet_file <> $_POST["CadetFile"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "cadet file changed from: ".$Line_Members_Armigerous->Cadet_file." to: ".$_POST["CadetFile"]; $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Artist <> $_POST["Artist"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "artist changed from: ".StringBackSlash($Line_Members_Armigerous->Artist)." to: ".StringBackSlash($_POST["Artist"]); $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Calligrapher <> $_POST["Calligrapher"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "calligrapher changed from: ".StringBackSlash($Line_Members_Armigerous->Calligrapher)." to: ".StringBackSlash($_POST["Calligrapher"]); $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Symbolism <> $_POST["Symbolism"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "symbolism changed from: ".StringBackSlash($Line_Members_Armigerous->Symbolism)." to: ".StringBackSlash($_POST["Symbolism"]); $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Painted_arms_file <> $_POST["PaintedFile"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "painted arms file changed from: ".$Line_Members_Armigerous->Painted_arms_file." to: ".$_POST["PaintedFile"]; $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Painted_arms_small_file <> $_POST["PaintedFileSmall"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "painted arms small file changed from: ".$Line_Members_Armigerous->Painted_arms_small_file." to: ".$_POST["PaintedFileSmall"]; $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Painted_by <> $_POST["PaintedBy"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "painted arms by changed from: ".$Line_Members_Armigerous->Painted_by." to: ".$_POST["PaintedBy"]; $pp_fields_changed_flag ++; }
if ($Line_Members_Armigerous->Painted_date <> $_POST["PaintedDate"]) { if ($pp_fields_changed_flag) { $pp_fields_changed .= $pp_fields_changed_comma; } $pp_fields_changed .= "painted arms date changed from: ".$Line_Members_Armigerous->Painted_date." to: ".$_POST["PaintedDate"]; $pp_fields_changed_flag ++; }

// if any field has changed, then compose an update SQL statement
if ($pp_fields_changed_flag)
	{
	// Save Armigerous Profile information
	$SQL  = 'UPDATE Members_Armigerous SET ';
	$SQL .= 'Armoury_Name			= "'.StringBackSlash($_POST["ArmouryName"]).'", ';
	$SQL .= 'Caption	 		= "'.StringBackSlash($_POST["CaptionName"]).'", ';
	$SQL .= 'Arms_file_100	 		= "'.$_POST["ArmsFile100"].'", ';
	$SQL .= 'Arms_file_350	 		= "'.$_POST["ArmsFile350"].'", ';
	$SQL .= 'Arms_file_large	 	= "'.$_POST["ArmsFileLarge"].'", ';
	$SQL .= 'Badge_file			= "'.$_POST["BadgeFile"].'", ';
	$SQL .= 'Flag_file	 		= "'.$_POST["FlagFile"].'", ';
if (isset($_POST["AmouryLetter"]))
	{ $SQL .= 'Armoury_letter	 	= "'.$_POST["AmouryLetter"].'", ';}
if (isset($_POST["ArmsInRoll"]))
	{ $SQL .= 'on_the_roll	 		=  '.$_POST["ArmsInRoll"].' , ';}

	$SQL .= 'Painted_arms_file		= "'.$_POST["PaintedFile"].'", ';
	$SQL .= 'Painted_arms_small_file	= "'.$_POST["PaintedFileSmall"].'", ';
	$SQL .= 'Painted_by			= "'.$_POST["PaintedBy"].'", ';
	$SQL .= 'Painted_date			= "'.$_POST["PaintedDate"].'", ';

	$SQL .= 'Blazon_arms	 		= "'.StringBackSlash($_POST["BlazonArms"]).'", ';
	$SQL .= 'Blazon_crest	 		= "'.StringBackSlash($_POST["BlazonCrest"]).'", ';
	$SQL .= 'Blazon_motto	 		= "'.StringBackSlash($_POST["BlazonMotto"]).'", ';
	$SQL .= 'Blazon_supporters	 	= "'.StringBackSlash($_POST["BlazonSupporters"]).'", ';
	$SQL .= 'Blazon_badge	 		= "'.StringBackSlash($_POST["BlazonBadge"]).'", ';
	$SQL .= 'Blazon_flag	 		= "'.StringBackSlash($_POST["BlazonFlag"]).'", ';
	$SQL .= 'Blazon_standard		= "'.StringBackSlash($_POST["BlazonStandard"]).'", ';
	$SQL .= 'Symbolism_file		 	= "'.$_POST["SymbolismFile"].'", ';
	$SQL .= 'Symbolism			= "'.StringBackSlash($_POST["Symbolism"]).'", ';
	$SQL .= 'Bio_file		 	= "'.$_POST["BioFile"].'", ';
	$SQL .= 'Auth_link	 		= "'.StringBackSlash($_POST["AuthLink"]).'", ';
if (isset($_POST["CHAcheckbox"]))
	{ $SQL .= 'CHA_chk	 		=  '.$_POST["CHAcheckbox"].', ';}
if (isset($_POST["COAcheckbox"]))
	{ $SQL .= 'COA_chk	 		=  '.$_POST["COAcheckbox"].', ';}
if (isset($_POST["LYONcheckbox"]))
	{ $SQL .= 'LYON_chk	 		=  '.$_POST["LYONcheckbox"].', ';}
if (isset($_POST["NATcheckbox"]))
	{ $SQL .= 'NAT_chk	 		=  '.$_POST["NATcheckbox"].', ';}
if (isset($_POST["INSTcheckbox"]))
	{ $SQL .= 'INST_chk	 		=  '.$_POST["INSTcheckbox"].', ';}
if (isset($_POST["ASScheckbox"]))
	{ $SQL .= 'ASS_chk	 		=  '.$_POST["ASScheckbox"].', ';}
	$SQL .= 'Armigerous_Grant_Date		= "'.$_POST["ArmigerousGrantDate"].'", ';
	$SQL .= 'Blazon_cadet			= "'.StringBackSlash($_POST["BlazonCadet"]).'", ';
	$SQL .= 'Cadet_file		 	= "'.$_POST["CadetFile"].'", ';
	$SQL .= 'Source				= "'.StringBackSlash($_POST["ArmsSource"]).'", ';
	$SQL .= 'Artist				= "'.StringBackSlash($_POST["Artist"]).'", ';
	$SQL .= 'Calligrapher			= "'.StringBackSlash($_POST["Calligrapher"]).'", ';
	$SQL .= 'Member_ID			= '.$member_ID.' ';
	$SQL .= 'WHERE Member_ID = ' . $member_ID;
	$SQL_log = $SQL;
	$Result = mysqli_query($LinkID, $SQL);
	if (mysqli_errno($LinkID) == 0) 
		{
		// update the tbl_Members table should the grant date change in the armigerous profile
		if ($_POST["ArmigerousGrantDate"])
			{
			// now update the armigerous flag in tbl_Members record
			$SQL  = 'UPDATE Members SET Armigerous = 1, Armigerous_Date = "'.$_POST["ArmigerousGrantDate"].'" ';
			$SQL .= 'WHERE Member_ID = '.$member_ID;
			$Result = mysqli_query($LinkID, $SQL);
			if (mysqli_errno($LinkID) == 0) 
				{
				$modal_operation .= "<font color='green'>AIMS has successfully updated membership record into <b>tbl_Members</b> with Member ID: ".$member_ID." ";
				$modal_operation .= "executing function in <b>".$pgm_name.":108s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
				$modal_msg_footer .= "Operation 108s was successful!";
				$modal_header_bgcolor = $modal_colour_green;	// green
				$modal_footer_bgcolor = $modal_colour_green;	// green

				// update the member's armigerous awards by inserting new records as they are checked off on the armigerous form
//				$Result_awards_insert = mysqli_query($LinkID, $SQL_awards_insert);
//				if (mysqli_errno($LinkID) == 0) 
//					{
//					$modal_operation .= "<font color='green'>AIMS has successfully added armigerous award(s) <b>tbl_Armigerous_Members_Awards</b> with Member ID: ".$member_ID." ";
//					$modal_operation .= "executing function in <b>".$pgm_name.":179s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
//					$modal_msg_footer .= "Operation 108s was successful!";
//					$modal_header_bgcolor = $modal_colour_green;	// green
//					$modal_footer_bgcolor = $modal_colour_green;	// green
//					}
//				else
//					{
//					$modal_operation .= "<font color='red'>AIMS has FAILED to insert armigerous award record in <b>tbl_Armigerous_Members_Awards</b> with Member ID: ".$member_ID." ";
//					$modal_operation .= " executing function in <b>".$pgm_name.":179f</b> operating under userID: <b>".$_SESSION['UserID']."</b> The SQL where the failure occurred: </font>".$SQL_awards_insert."; ";
//					$modal_msg_footer .= "Operation FAILED!";
//					$modal_header_bgcolor = $modal_colour_orange;	// orange
//					$modal_footer_bgcolor = $modal_colour_orange;	// orange
//					}
				}
			else
				{
				// the update failed with respect to the existing record in tbl_Armigerous_Members
				// generate a modal popup indicating the FAILED operation
				$modal_operation .= "<font color='red'>AIMS has FAILED to update the grant date in membership record in <b>Members</b> with Member ID: ".$member_ID." ";
				$modal_operation .= " executing function in <b>".$pgm_name.":61f</b> operating under userID: <b>".$_SESSION['UserID']."</b><br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL."</i></font>";
				$modal_msg_footer .= "Operation FAILED!";
				$modal_header_bgcolor = $modal_colour_red;	// red
				$modal_footer_bgcolor = $modal_colour_red;	// red
				}
			}

		// update the tbl_Armigerous_Members table
		// the update was successful with respect to the existing record in tbl_Armigerous_Members
		// the update to the Armigerous profile record was successfull, generate a modal popup indicating the success
		$modal_operation .= "<font color='green'>The update to table <b>Members_Armigerous</b> was successfully applied for member's record for member ID: ".$member_ID."; ";
		$modal_operation .= "in <b>".$pgm_name.":100s</b> operating under userID: <b>".$_SESSION['UserID']."</b></font>";
		$modal_msg_footer .= "Operation 100s was successful!";
		$modal_header_bgcolor = $modal_colour_green;	// green
		$modal_footer_bgcolor = $modal_colour_green;	// green
		$modal_colour_flag = 1;

		// We create and enter an admin log record, detailing the updated fields and recording them in tbl_Admin_log
		include "php-bin/sub_create_admin_log_record.php";
		}
	else
		{
		$modal_operation .= " <font color='red'>There was a problem to update an existing armigerous record in table <b>Members_Armigerous</b> for member's record for member ID: ".$member_ID."; ";
		$modal_operation .= "in <b>".$pgm_name.":100f</b> operating under userID: <b>".$_SESSION['UserID']."</b>";
		$modal_operation .= "<br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL."</i>. Please copy and transmit this entire error message to the webmaster!</font>";
		$modal_msg_footer .= "Operation 100f FAILED!";
		$modal_header_bgcolor = $modal_colour_red;
		$modal_footer_bgcolor = $modal_colour_red;
		} // end if mysqli_errno($LinkID)
	} // end if $pp_fields_changed_flag
else
	{
	// none of the fields have changed, do nothing and inform the browser of this fact
	$modal_operation .= " <font color='gray'>No updates nor changes were applied to the member record for the latest database operation for member's record member ID: ".$member_ID."; ";
	$modal_operation .= "in <b>".$pgm_name.":167f</b> operating under userID: <b>".$_SESSION['UserID']."</b>. Please try again and update one or more fields.";
	$modal_operation .= "<br />The SQL error reported was <font color='red'><b><i>".mysqli_error($LinkID)."</i></b></font> and the SQL causing the failure: <i>".$SQL."</i>. Please copy and transmit this entire error message to the webmaster!</font>";
	$modal_msg_footer .= "Operation 167f FAILED!";
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
echo ('parent.location.href="Members_show.php?MID='.$member_ID.'&MOD=1&TAB=7&STATE=Update"');
echo ('</script>');
?>
