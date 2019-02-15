<?php
ini_set('display_errors','On');
//
// Program: Members_show.php
// Author: David M. Cvet
// Created: Nov 04, 2016
// Description:
//	Generates a detailed record presentation of a member based on the member number retrieved from the report/listing of membership records.
//	This PHP is also core for handling the updates and creations of records.
//---------------------------
// Updates:
//	2016 ----------
//	sep 12:	inserted tabs using CSS, HTML and javascript - sourced from http://www.w3schools.com/howto/howto_js_tabs.asp
//	2019 ------------------
//	jan 25:	standardized path names
//

// temporary state variable and value
//$state = "Update";
//
$aims = 1;				// flag to indicate that we are now in the AIMS database system, so the menu bar needs to be expanded by the AIMS menu item
$admin = 0;				// flag to indicate that we are NOT in the admin section of administering the roll of arms for members
$lang = "en";
$lang_num = 0;
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories calling script
$menu_selected = "AIMS";
$PHP_string = "";
$php_string_set = 0;
if (isset($_GET['MID']))  { $member_ID = $_GET['MID']; $PHP_string = "?MID=".$member_ID; $php_string_set++; } else {$member_ID = ""; }
if (isset($_GET['STATE']))  { $state = $_GET['STATE']; if ($php_string_set) { $PHP_string .= "&STATE=".$state;} else {$PHP_string = "?STATE=".$state; $php_string_set++;} } else { $state = "Update"; }
if (isset($_GET['SECL']))  { $seclvl = $_GET['SECL']; if ($php_string_set) { $PHP_string .= "&SECL=".$seclvl;} else {$seclvl = 6; $PHP_string = "?SECL=".$seclvl; $php_string_set++;} } else { $seclvl = 6; }
if (isset($_GET['MOD']))  { $modal = $_GET['MOD']; if ($php_string_set) { $PHP_string .= "&MOD=".$modal; }} else { $modal = 0; } //determine if a modal popup is to appear upon invokation of this script
if (isset($_GET['IMSG']))  { $injuries_report_message = $_GET['IMSG']; } else {$injuries_report_message = ""; }

// setup the call to this script between language selections so that the right records and variables are initialized and reused
$current_pgm = "Members_show.php".$PHP_string;

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
// test to determine if the initial database login session remains intact or the session has timed out before attempting to connect with the database
$session_expiration = $path_members."php-bin/sub_check_session_expiration.php"; include "$session_expiration";

//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

include "config/config.php";
$config = $path_members."config/config.php"; include "$config";
include "config/AIMS_members_show_$lang.php";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
//$full_date= date("F j, Y");
// end setup database and members only library paths

// define the default or selected default tab based on which tab the update has occured in
$tab0_active = $tab1_active = $tab2_active = $tab3_active = $tab4_active = $tab5_active = $tab6_active = $tab7_active = $tab8_active = "";
$tab0_display = $tab1_display = $tab2_display = $tab3_display = $tab4_display = $tab5_display = $tab6_display = $tab7_display = $tab8_display = "";
if (isset($_GET['TAB']))  
	{
	if ($_GET['TAB'] == 0)
		{ $tab0_active = "active"; $tab0_display = "style='display:block;'";}
	elseif ($_GET['TAB'] == 1)
		{ $tab1_active = "active"; $tab1_display = "style='display:block;'"; }
	elseif ($_GET['TAB'] == 2)
		{ $tab2_active = "active"; $tab2_display = "style='display:block;'"; }
	elseif ($_GET['TAB'] == 3)
		{ $tab3_active = "active"; $tab3_display = "style='display:block;'"; }
	elseif ($_GET['TAB'] == 4)
		{ $tab4_active = "active"; $tab4_display = "style='display:block;'"; }
	elseif ($_GET['TAB'] == 5)
		{ $tab5_active = "active"; $tab5_display = "style='display:block;'"; }
	elseif ($_GET['TAB'] == 6)
		{ $tab6_active = "active"; $tab6_display = "style='display:block;'"; }
	elseif ($_GET['TAB'] == 7)
		{ $tab7_active = "active"; $tab7_display = "style='display:block;'"; }
	else
		{ $tab8_active = "active"; $tab8_display = "style='display:block;'"; }
	}
else
	{
	// the default tab to display upon opening the window
	$tab0_active = "active";
	$tab0_display = "style='display:block;'";
	}
// end default tab selection

echo ('<script type="text/javascript" src="js-bin/jquery.min_v3.1.1.js"></script>');
echo ('<script type="text/javascript" src="js-bin/beep.js"></script>'."\n");
// begin javascript function openTab is integral building the tabs allowing presentation of more content on different tabs on the same page
?>
  <script type="text/javascript">
  function openTab(evt, tabName) {
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  </script>
<?php
// end javascript function openTab is integral building the tabs allowing presentation of more content on different tabs on the same page
?>
  <script type="text/javascript">
  // enable the date accepting field for deceased date if and only if, the checkbox for deceased flag has been clicked
  function enable_deceased_date() {
	if (document.Personal_Profile_Form.DeceasedDateForm.disabled==true)
		{document.Personal_Profile_Form.DeceasedDateForm.disabled=false;}
	else
		{document.Personal_Profile_Form.DeceasedDateForm.disabled=true;}
  document.Personal_Profile_Form.submit_personal_button.disabled=false;
  }
  function enable_submit_personal_button() {
    document.Personal_Profile_Form.submit_personal_button.disabled=false;
  }

  // begin functions pertaining to the membership profile tab/panel
  function enable_submit_membership_button() {
    document.Membership_Profile_Form.submit_membership_button.disabled=false;
  }
  function enable_HonDate() {
    document.Membership_Profile_Form.HonDate_Form.disabled=false;
  }
  function enable_new_status_date() {
    document.Membership_Profile_Form.StatusDate_New.disabled=false;
  }
  function enable_new_rank_date() {
    document.Membership_Profile_Form.RankDate_New.disabled=false;
    document.Membership_Profile_Form.RankLocation_New.disabled=false;
  }
  function enable_new_position_date() {
    document.Membership_Profile_Form.PositionDate_New.disabled=false;
  }
  // end functions pertaining to the membership profile tab/panel

 // begin functions pertaining to the training profile tab/panel
  function enable_training_button() {
    document.Training_Profile_Form.submit_training_button.disabled=false;
  }
 // end functions pertaining to the training profile tab/panel

 // begin functions pertaining to the equipment profile tab/panel
  function enable_equipment_button() {
    document.Equipment_Profile_Form.submit_equipment_button.disabled=false;
  }
 // end functions pertaining to the equipment profile tab/panel

 // begin functions pertaining to the injuries report tab/panel
  function enable_injury_button() {
    document.Injury_Report_Form.submit_injury_button.disabled=false;
  }
 // end functions pertaining to the injuries report tab/panel

 // begin functions pertaining to the armigerous profile tab/panel
  function enable_submit_armigerous_button() {
    document.Armigerous_Profile_Form.submit_armigerous_button.disabled=false;
  }
//* end functions pertaining to the armigerous profile tab/panel

 // begin functions pertaining to the access profile tab/panel
  function enable_submit_access_button() {
    document.Username_Profile_Form.submit_access_button.disabled=false;
  }
  function delete_access_record(MemID) {
    alert("Are you sure that you want to delete members access for member ID: "+MemID+"?");
    location.href="sub_delete_username_profile.php?MID="+MemID;
    alert("Just after the location.href call");
  }

// end functions pertaining to the access profile tab/panel
 
  </script>
<!--  <script src="js-bin/jquery.min_v1.9.1.js"></script>-->
  <script type="text/javascript" src="js-bin/ResponsiveSlides.min.js"></script>
  <script type="text/javascript" src="js-bin/main.js"></script>
  <link rel="stylesheet" href="<?=$path_dbase?>css/modal_popups.css" type="text/css" media="all" title="modal" />
<?php
if ($modal)
	{
?>
	<link rel="stylesheet" href="<?=$path_dbase?>css/modal.css" type="text/css" media="all" title="modal" />
<?php
	}
?>
<!-- begin jQuery Datepicker (source:http://keith-wood.name/datepick.html) -->
<!--<link href="css/datepicker/smoothness.datepick.css" rel="stylesheet">
<script src="js-bin/datepicker/jquery.plugin.js"></script>
<script src="js-bin/datepicker/jquery.datepick.js"></script>
<script type="text/javascript">
$(function() {
	$('#SusDatepicker').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#PosDatepicker').datepick({dateFormat: 'yyyy-mm-dd'});
});
</script>-->
<!-- end jQuery Datepicker (source:http://keith-wood.name/datepick.html) -->

<!-- begin Zebra Datepicker (source:http://stefangabos.ro/jquery/zebra-datepicker/) -->
<script type="text/javascript" src="zebra_datepicker/js-bin/zebra_datepicker.js"></script>
<link rel="stylesheet" href="zebra_datepicker/css/metallic.css" type="text/css" />

<!-- end Zebra Datepicker (source:http://stefangabos.ro/jquery/zebra-datepicker/) -->

<!-- begin JSCal2 Datepicker (source:http://www.dynarch.com/jscal/selection.html) -->
<!--  <link rel="stylesheet" href="JSCal2/css/jscal2.css" type="text/css" media="all" title="calendar" />
  <link rel="stylesheet" href="JSCal2/css/border-radius.css" type="text/css" media="all" />
  <link rel="stylesheet" href="JSCal2/css/gold/gold.css" type="text/css" media="all" />
  <script type="text/javascript" src="JSCal2/js-bin/jscal2.js"></script>
  <script type="text/javascript" src="JSCal2/js-bin/lang/en.js"></script>-->
<!-- end JSCal2 Datepicker -->
<!-- begin invoice/payment modal code -->
<!--    <link rel="stylesheet" href="modal_add_invoice/css/bootstrap.min.css" />-->
<!--    <link rel="stylesheet" href="modal_add_invoice/css/rmodal-no-bootstrap.css" />
    <link rel="stylesheet" href="modal_add_invoice/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="modal_add_invoice/css/rmodal.css" type="text/css" />
    <script type="text/javascript" src="modal_add_invoice/js-bin/rmodal.js"></script>
-->

<!--  <link rel="stylesheet" href="<?=$path_dbase?>css/calendar.css" type="text/css" media="all" title="calendar" />
  <script type="text/javascript" src="js-bin/calendar.js"></script>
  <script type="text/javascript" src="js-bin/calendar-en.js"></script>
  <script type="text/javascript" src="js-bin/calendar-setup.js"></script>-->
  <script type="text/javascript">
	$(function () {
	// Slideshow
	$(".rslides1").responsiveSlides({
		// ** notes: default settings in ResponsiveSlides.min.js **
		//"auto": true, 		// Boolean: Animate automatically, true or false
		//"speed": 500, 		// Integer: Speed of the transition, in milliseconds
		//"timeout": 4000, 		// Integer: Time between slide transitions, in milliseconds
		//"pager": false, 		// Boolean: Show pager, true or false
		//"nav": false, 		// Boolean: Show navigation, true or false
		//"random": false, 		// Boolean: Randomize the order of the slides, true or false
		//"pause": false, 		// Boolean: Pause on hover, true or false
		//"pauseControls": true,	// Boolean: Pause when hovering controls, true or false
		//"prevText": "Previous", 	// String: Text for the "previous" button
		//"nextText": "Next", 		// String: Text for the "next" button
		//"maxwidth": "", 		// Integer: Max-width of the slideshow, in pixels
		//"navContainer": "", 		// Selector: Where auto generated controls should be appended to, default is after the <ul>
		//"manualControls": "", 	// Selector: Declare custom pager navigation
		//"namespace": "rslides", 	// String: change the default namespace used
		//"before": $.noop, 		// Function: Before callback
		//"after": $.noop 		// Function: After callback

		// ** revised settings
		speed: 2000,
		timeout: 7500,
		maxwidth: 550,
		random: true
		});
	});
  </script>
<?php
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
//$full_date= date("d-m-Y");
$today = date("Y-m-d");
$status_passed = 0;
$table_width = "90%";
$table_align = "center";
$LinkID=dbConnect($DB);
?>
	<!-- begin main content -->
	<div id="main_content_AIMS">
		<img src="images/1090x4_transparent.png" width="100%" alt="" />
<?php
		//
		// pull chapter IDs and name data regardless of state, as you need this data to build the chapter drop-down box
		//
		$SQL_C  = 'SELECT Chapter_ID, Chapter_Name';
		$SQL_C .= ' FROM Chapters';
		$SQL_C .= ' WHERE ChapterState_ID IN (1,2,3)';
		$SQL_C .= ' ORDER BY Chapter_Name';
		$Result_C = mysqli_query($LinkID, $SQL_C);
		$i = 0;
		while ($Line_C = mysqli_fetch_object($Result_C))
			{
			$array_chapterID[$i] = $Line_C->Chapter_ID;
			$array_chapter_name[$i] = $Line_C->Chapter_Name;
			$i++;
			}
		$num_array_chapters = sizeof($array_chapterID);

		// retrieve the positions ID and descriptions
		$SQL_P  = 'SELECT Position_ID, Position_Desc FROM tbl_Positions';
		$SQL_P .= ' ORDER BY Position_ID';
		$Result_P = mysqli_query($LinkID, $SQL_P);
		$i = 0;
		while ($Line_P = mysqli_fetch_object($Result_P)) {
			$position_id[$i] 	= $Line_P->Position_ID;
			$position_desc[$i]	= $Line_P->Position_Desc;
			$i++;
			}
		$num_array_positions = sizeof($position_id);

		// retrieve the membership categories
		$SQL_c  = 'SELECT Category_ID, Category_Name FROM Membership_Categories';
		$SQL_c .= ' ORDER BY Category_Name';
		$Result_c = mysqli_query($LinkID, $SQL_c);
		$i = 0;
		while ($Line_c = mysqli_fetch_object($Result_c)) {
			$category_id[$i] 	= $Line_c->Category_ID;
			$category_desc[$i]	= $Line_c->Category_Name;
			$i++;
			}
		$num_array_category = sizeof($category_id);

		// retrieve the roles ID and descriptions
		$SQL_R  = 'SELECT Roles_ID, Roles_Description, Roles_Long_Description FROM Roles';
		$SQL_R .= ' ORDER BY Roles_ID';
		$Result_R = mysqli_query($LinkID, $SQL_R);
		$i = 0;
		while ($Line_R = mysqli_fetch_object($Result_R)) {
			$role_id[$i]	 	= $Line_R->Roles_ID;
			$role_desc[$i]		= $Line_R->Roles_Description;
			$role_long[$i]		= $Line_R->Roles_Long_Description;
			$i++;
			}
		$num_array_role = sizeof($role_id);

		// retrieve the various transportation modes (most relevant in population centres)
		$SQL_T  = 'SELECT Transport_ID, Transport_Desc';
		$SQL_T .= ' FROM Transportation_Mode';
		$SQL_T .= ' ORDER BY Transport_Desc';
		$Result_T = mysqli_query($LinkID, $SQL_T);
		$i = 0;
		while ($Line_T = mysqli_fetch_object($Result_T)) {
			$transport_ID[$i] = $Line_T->Transport_ID;
			$transport_desc[$i] = $Line_T->Transport_Desc;
			$i++;
			}
		$num_array_transport = sizeof($transport_ID);

		$SQL_A  = 'SELECT Award_ID, HTML_Symbol, Award_Description';
		$SQL_A .= ' FROM tbl_Awards';
		$SQL_A .= ' ORDER BY Index_ID';
		$Result_A = mysqli_query($LinkID, $SQL_A);
		if (mysqli_num_rows($Result_A) > 0) 
			{
			$i = 0;
			while ($Line_A = mysqli_fetch_object($Result_A))
				{
				$array_award_ID[$i] = $Line_A->Award_ID;
				$array_award_HTML[$i] = $Line_A->HTML_Symbol;
				$array_award_desc[$i] = $Line_A->Award_Description;
				$i++;
				}
			$num_array_awards = sizeof($array_award_ID);
			}
		else
			{ $num_array_awards = 0; }

		$full_mailing_name 	= "";
		$honourary_date		= "";
		$honourary_check	= 0;
		$num_array_position_mem = 0;
		$placeholder_name 	= "";
		$placeholder_caption 	= "";
		$possible_armoury_name 	= "";
		$possible_armoury_caption = "";

		if ($state == "Create")
			{
			$member_ID		= "";	
			$num_array_status	= 0;
			$num_array_rank		= 0;
			$num_array_positions	= 0;
			$num_array_invoices	= 0;
			$num_array_payments	= 0;
			$num_array_member_notes = 0;
			$num_array_injury_reports = 0;

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

			// initialize members award array
			$array_awards_mem_ID[0] = "";
			$array_awards_mem_year[0] = 0;
			$num_array_awards_mem = 0;

			// initialize the form's variables with default blank or relevant values (tbl:Members)
			$member_number		= "";
			$school			= "AEMMA";
			$salutation		= "";
			$first_name		= "";
			$middle_name		= "";
			$last_name		= "";
			$pref_name		= "";
			$postnominals		= "";
			$gender			= "";
			$birth_date		= "";
			$spouse			= "";
			$occupation		= "";
			$address		= "";
			$city			= "";
			$prov_state		= "";
			$pcZip			= "";
			$country		= "Canada";
			$num_home		= "";
			$num_work		= "";
			$num_work_ext		= "";
			$num_fax		= "";
			$num_mobile		= "";
			$email			= "";
			$email_alt		= "";
			$portrait_url		= "images/portraits";
			$portrait_file		= "portrait_placeholder_100.jpg";
			$date_joined		= "";
			$comments		= "";
			$deceased		= 0;
			$deceased_date		= "";
			$interests		= "";
			$heard_from		= "";
			$transport_mode		= 0;
			$medical		= "";
			$emerg_contact		= "";
			$emerg_contact_phone	= "";
			$armigerous		= 0;
			$armigerous_date  	= "";
			$acad_degree		= "";
			$acad_institution	= "";
			$biography		= "";
			$first_aid_training_check = 0;
			$previous_martial_check	  = 0;
			$admin_notes		= "";
			$admin_ID		= $_SESSION['UserID'];
			$record_creation_date	= date("Y-m-d H:i:s");
			$membership_category	= 0;

			// initialize the armigerous data elements for a create status
			$arms_URL = "armoury/";
			$armoury_name = "";
			$arms_caption = "";
			$arms_file_100 = "";
			$arms_file_350 = "aemma_350h.jpg";
			$arms_file_large = "";
			$badge_file = "";
			$flag_file = "";
			$standard_file = "";
			$on_the_roll = "";
			$armoury_letter = "a";
			$arms_source = "";
			$armigerous_grant_date = "";
			$CHA_chk = 0;
			$COA_chk = 0;
			$LYON_chk = 0;
			$NAT_chk = 0;
			$INST_chk = 0;
			$ASS_chk = 0;
			$auth_link = "";
			$blazon_arms = $non_armigerous_text[$lang_num];
			$blazon_crest = "";
			$blazon_motto = "";
			$blazon_supporters = "";
			$blazon_badge = "";
			$blazon_flag = "";
			$blazon_standard = "";
			$symbolism_file = "";
			$symbolism = "";
			$blazon_cadet = "";
			$cadet_file = "";
			$bio_file = "";
			$artist = "";
			$calligrapher = "";
			$painted_arms_file = "";
			$painted_arms__small_file = "";
			$painted_by = "";
			$painted_date = "";

			// initialize login data elements
			$login_non_disclosure 	= 0;
			$login_username 	= "";
			$login_password 	= "";
			$login_roles_ID 	= 0;
			$login_creation_date	= "";
			}
		else
			{
			//
			// Retrieve "Member's Personal Profile" data from AIMS for status = UPDATE
			//
			$SQL  = 'SELECT P.Member_ID, P.Member_Number, P.School, P.Salutation, P.FirstName, P.MiddleName, P.LastName, P.PreferredName, P.Postnominals, P.Gender, ';
			$SQL .= '	P.Birth_Date, P.Spouse, P.Occupation, P.Address, P.City, P.ProvState, P.PCZip, P.Country, P.NumHome, P.NumWork, P.NumWorkExt, P.Interests, ';
			$SQL .= '	P.NumFax, P.NumMobile, P.Email, P.Email_Alternate, P.Portrait_URL, P.Portrait_File, P.Date_Joined, P.Comments, P.Deceased, P.Deceased_Date, ';
			$SQL .= '	P.Medical, P.EmergContactName, P.EmergContactPhone, P.Armigerous, P.Armigerous_Date, P.AcademicDegree, P.AcademicInstitution, P.Biography, P.Admin_Notes, P.Admin_ID, P.RecordCreation_Date, ';
			$SQL .= '	P.TransportationMode, P.HeardFrom, P.FirstAidTraining, P.PreviousMartial ';
			$SQL .= ' FROM Members P';
			$SQL .= ' WHERE P.Member_ID = ' .  $member_ID;
			$Result = mysqli_query($LinkID, $SQL);
			$Line_Members = mysqli_fetch_object($Result);
			// build a complete mailing name with salutation, full name and postnominals
			if ($Line_Members->Salutation) {$full_mailing_name .= $Line_Members->Salutation;}
			$full_mailing_name .= " ".$Line_Members->FirstName;
			if ($Line_Members->MiddleName) {$full_mailing_name .= " ".$Line_Members->MiddleName;}
			$full_mailing_name .= " ".$Line_Members->LastName;
			$full_mailing_name .= " ".$Line_Members->Postnominals;

			// assign the form's variables with their respect database values
			$member_number		= $Line_Members->Member_Number;
			$school			= $Line_Members->School;
			$salutation		= $Line_Members->Salutation;
			$first_name		= $Line_Members->FirstName;
			$middle_name		= $Line_Members->MiddleName;
			$last_name		= $Line_Members->LastName;
			$pref_name		= $Line_Members->PreferredName;
			$postnominals		= $Line_Members->Postnominals;
			$gender			= $Line_Members->Gender;
			$birth_date		= $Line_Members->Birth_Date;
			$spouse			= $Line_Members->Spouse;
			$occupation		= $Line_Members->Occupation;
			$address		= $Line_Members->Address;
			$city			= $Line_Members->City;
			$prov_state		= $Line_Members->ProvState;
			$pcZip			= $Line_Members->PCZip;
			$country		= $Line_Members->Country;
			$num_home		= $Line_Members->NumHome;
			$num_work		= $Line_Members->NumWork;
			$num_work_ext		= $Line_Members->NumWorkExt;
			$num_fax		= $Line_Members->NumFax;
			$num_mobile		= $Line_Members->NumMobile;
			$email			= $Line_Members->Email;
			$email_alt		= $Line_Members->Email_Alternate;
			$portrait_url		= $Line_Members->Portrait_URL;
			$portrait_file		= $Line_Members->Portrait_File;
			$date_joined		= $Line_Members->Date_Joined;
			$comments		= $Line_Members->Comments;
			$interests		= $Line_Members->Interests;
			$transport_mode		= $Line_Members->TransportationMode;
			$medical		= $Line_Members->Medical;
			$emerg_contact		= $Line_Members->EmergContactName;
			$emerg_contact_phone	= $Line_Members->EmergContactPhone;
			$heard_from		= $Line_Members->HeardFrom;
			$deceased		= $Line_Members->Deceased;
			$deceased_date		= $Line_Members->Deceased_Date;
			$armigerous		= $Line_Members->Armigerous;
			$armigerous_date	= $Line_Members->Armigerous_Date;
			$acad_degree		= $Line_Members->AcademicDegree;
			$acad_institution	= $Line_Members->AcademicInstitution;
			$biography		= $Line_Members->Biography;
			$first_aid_training_check	= $Line_Members->FirstAidTraining;
			$previous_martial_check		= $Line_Members->PreviousMartial;
			$admin_notes		= $Line_Members->Admin_Notes;
			$admin_ID		= $Line_Members->Admin_ID;
			$record_creation_date	= $Line_Members->RecordCreation_Date;

			// Retrieve "Member's Membership Profile" data from AIMS
			// If the member record is staff, then this individual doesn't belong to a specific commandery
			// pull commandery data regardless of state, as you need this data to build the commandery drop-down box
			//
			$SQL_CM  = 'SELECT Member_ID, Chapter_ID';
			$SQL_CM .= ' FROM Members_Chapter';
			$SQL_CM .= ' WHERE Member_ID = ' .  $member_ID.' AND Current_Status = 1';	
			$Result_CM = mysqli_query($LinkID, $SQL_CM);
			if (mysqli_num_rows($Result_CM) > 0) 
				{
				$Line_CM = mysqli_fetch_object($Result_CM);
				$members_chapter_ID = $Line_CM->Chapter_ID;
				}
			elseif ($school <> "AEMMA") { $members_chapter_ID = 1; } // defaults to Toronto
				
			// retrieve the positions ID and descriptions
			$SQL_PM  = 'SELECT PM.Position_ID, PM.Position_Start_Date, P.Position_Desc FROM tbl_Positions_Members PM, tbl_Positions P ';
			$SQL_PM .= 'WHERE PM.Member_ID = ' .  $member_ID.' ';
			$SQL_PM .= 'AND PM.Position_ID = P.Position_ID ';
			$SQL_PM .= 'ORDER BY Position_Start_Date DESC';
			$Result_PM = mysqli_query($LinkID, $SQL_PM);
			$i = 0;
			$num_array_position_mem = 0;
			if (mysqli_num_rows($Result_PM) > 0) 
				{
				while ($Line_PM = mysqli_fetch_object($Result_PM)) {
					$position_mem_id[$i]		= $Line_PM->Position_ID;
					$position_mem_desc[$i]		= $Line_PM->Position_Desc;
					$position_mem_startdate[$i]	= $Line_PM->Position_Start_Date;
					$i++;
					}
				$num_array_position_mem = sizeof($position_mem_id);
				}
			else
				{
				$position_mem_id[$i]		= NULL;
				$position_mem_desc[$i]		= "";
				$position_mem_startdate[$i]	= "";
				}

			// retrieve the user's membership category value
			$SQL_CAT = 'SELECT Member_ID, Category_ID, Current_Status FROM Members_Category';
			$SQL_CAT .= ' WHERE Member_ID = ' .  $member_ID.' AND Current_Status = 1';
			$Result_CAT = mysqli_query($LinkID, $SQL_CAT);
			if (mysqli_num_rows($Result_CAT) > 0) 
				{
				$Line_CAT = mysqli_fetch_object($Result_CAT);
				$membership_category 	= $Line_CAT->Category_ID; 
				}
			else
				{ $membership_category 	= 0; }

			// retrieve the user's access details and non-disclosure value
			$SQL_ND = 'SELECT Username, Roles_ID, UserPassword, Creation_date, Non_disclosure FROM Login';
			$SQL_ND .= ' WHERE Member_ID = ' .  $member_ID;
			$Result_ND = mysqli_query($LinkID, $SQL_ND);
			if (mysqli_num_rows($Result_ND) > 0) 
				{
				while ($Line_ND = mysqli_fetch_object($Result_ND)) {
					$login_non_disclosure 	= $Line_ND->Non_disclosure;
					$login_username 	= $Line_ND->Username;
					$login_password 	= $Line_ND->UserPassword;
					$login_roles_ID 	= $Line_ND->Roles_ID;
					$login_creation_date	= $Line_ND->Creation_date;
					}
				}
			else
				{
				// this member has NO access record - probably because this member was expelled, deceased, or similar
				$login_non_disclosure 	= 0;
				$login_username 	= "";
				$login_password 	= "";
				$login_roles_ID 	= 0;
				$login_creation_date	= "";
				}

			// retrieve the user's training notes
			$SQL_NT = 'SELECT Member_ID, Member_Notes_Date, Member_Notes, Username FROM Members_Training_Notes ';
			$SQL_NT .= 'WHERE Member_ID = '. $member_ID.' ';
			$SQL_NT .= 'ORDER BY Member_Notes_Date DESC';
			$Result_NT = mysqli_query($LinkID, $SQL_NT);
			if (mysqli_num_rows($Result_NT) > 0) 
				{
				$i = 0;
				while ($Line_NT = mysqli_fetch_object($Result_NT)) {
					$member_notes_date[$i] 	= $Line_NT->Member_Notes_Date;
					$member_notes[$i]  	= $Line_NT->Member_Notes;
					$member_username[$i]  	= $Line_NT->Username;
					$i++;
					}
				$num_array_member_notes = sizeof($member_notes_date);
				}
			else
				{ $num_array_member_notes = 0;}

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

			// retrieve relevant injuries reports
			$SQL_i  = 'SELECT Member_ID, Injury_Date, Injury_Location, Injury_Description FROM Members_Injuries ';
			$SQL_i .= 'WHERE Member_ID = ' .  $member_ID.' ';
			$SQL_i .= 'ORDER BY Injury_Date DESC';
			$Result_i = mysqli_query($LinkID, $SQL_i);
			$i = 0;
			if (mysqli_num_rows($Result_i) > 0) 
				{
				while ($Line_i = mysqli_fetch_object($Result_i)) {
					$injury_report_date[$i]		= $Line_i->Injury_Date;
					$injury_report_location[$i]	= $Line_i->Injury_Location;
					$injury_report[$i]		= $Line_i->Injury_Description;
					$i++;
					}
				$num_array_injury_reports = sizeof($injury_report_date);
				}
			else
				{
				$num_array_injury_reports	= 0;
				$injury_report_date[$i]		= "";
				$injury_report_location[$i]	= "";
				$injury_report[$i]		= "";
				}

			// retrieve both armoured and unarmoured kit data
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
					if (!$armour_date) { $armour_date = $today; }
					$armour_URL		= $Line_kit->Armour_URL;
					$armour_file		= $Line_kit->Armour_File;
					if (!$armour_file) { $armour_file = "armour_placeholder.jpg"; }
					$unarmoured_description	= $Line_kit->Unarmoured_Description;
					$unarmoured_status	= $Line_kit->Unarmoured_Status;
					$unarmoured_date	= $Line_kit->Unarmoured_Date;
					if (!$unarmoured_date) { $unarmoured_date = $today; }
					$unarmoured_URL		= $Line_kit->Unarmoured_URL;
					$unarmoured_file	= $Line_kit->Unarmoured_File;
					if (!$unarmoured_file) { $unarmoured_file = "unarmoured_placeholder.jpg"; }
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

			$SQL_S  = 'SELECT Status_ID, Status_Date, Current_Status';
			$SQL_S .= ' FROM Members_Status';
			$SQL_S .= ' WHERE Member_ID = ' .  $member_ID;
			$SQL_S .= ' ORDER BY Status_Date DESC, Current_Status DESC';
			$Result_S = mysqli_query($LinkID, $SQL_S);
			if (mysqli_num_rows($Result_S) > 0) 
				{
				$i = 0;
				while ($Line_S = mysqli_fetch_object($Result_S))
					{
					$array_status_ID[$i] = $Line_S->Status_ID;
					$array_status_date[$i] = $Line_S->Status_Date;
					$array_status_current[$i] = $Line_S->Current_Status;
					$i++;
					}
				$num_array_status = sizeof($array_status_ID);
				}
			else
				{ $num_array_status = 0; }

			$SQL_R  = 'SELECT Rank_ID, Rank_Date, Location, Current_Status';
			$SQL_R .= ' FROM Members_Rank';
			$SQL_R .= ' WHERE Member_ID = ' .  $member_ID;
			$SQL_R .= ' ORDER BY Rank_Date DESC';
			$Result_R = mysqli_query($LinkID, $SQL_R);
			if (mysqli_num_rows($Result_R) > 0) 
				{
				$i = 0;
				while ($Line_R = mysqli_fetch_object($Result_R))
					{
					$array_rank_ID[$i] = $Line_R->Rank_ID;
					$array_rank_date[$i] = $Line_R->Rank_Date;
					$array_rank_current[$i] = $Line_R->Current_Status;
					$array_rank_location[$i] = $Line_R->Location;
					if ($Line_R->Current_Status) { $current_rank = $Line_R->Rank_ID; }
					if ($array_rank_ID[$i] == 77) { $honourary_date = $array_rank_date[$i]; $honourary_check = 1; } // honourary member
					$i++;
					}
				$num_array_rank = sizeof($array_rank_ID);
				}
			else
				{ $num_array_rank = 0; }

			// pull up armigerous record of member of interest
			$armigerous_found = 0;
			$SQL_A  = 'SELECT Armoury_name, Caption, Arms_URL, Arms_file_100, Arms_file_350, Arms_file_large, Badge_file, Flag_file, Standard_file, on_the_roll, Bio_file, Artist, Calligrapher, ';
			$SQL_A .= 'Armoury_letter, Source, Armigerous_Grant_Date, CHA_chk, Auth_link, Blazon_arms, Blazon_crest, Blazon_motto, Blazon_supporters, Blazon_badge, Blazon_flag, Blazon_standard, ';
			$SQL_A .= 'COA_chk, LYON_chk, NAT_chk, INST_chk, ASS_chk, Symbolism_file, Symbolism, Blazon_cadet, Cadet_file, Painted_arms_file, Painted_arms_small_file, Painted_by, Painted_date ';
			$SQL_A .= 'FROM Members_Armigerous ';
			$SQL_A .= 'WHERE Member_ID = ' .  $member_ID;
			$Result_A = mysqli_query($LinkID, $SQL_A);
			while ($Line_A = mysqli_fetch_object($Result_A))
				{
				$armigerous_found = 1;
				$armoury_name = $Line_A->Armoury_name;
				$arms_caption = $Line_A->Caption;
				$arms_URL = $Line_A->Arms_URL;
				$arms_file_100 = $Line_A->Arms_file_100;
				$arms_file_350 = $Line_A->Arms_file_350;
				$arms_file_large = $Line_A->Arms_file_large;
				$badge_file = $Line_A->Badge_file;
				$flag_file = $Line_A->Flag_file;
				$standard_file = $Line_A->Standard_file;
				$on_the_roll = $Line_A->on_the_roll;
				$armoury_letter = $Line_A->Armoury_letter;
				$arms_source = $Line_A->Source;
				$armigerous_grant_date = $Line_A->Armigerous_Grant_Date;
				$CHA_chk = $Line_A->CHA_chk;
				$auth_link = $Line_A->Auth_link;
				$COA_chk = $Line_A->COA_chk;
				$LYON_chk = $Line_A->LYON_chk;
				$NAT_chk = $Line_A->NAT_chk;
				$INST_chk = $Line_A->INST_chk;
				$ASS_chk = $Line_A->ASS_chk;
				$blazon_arms = $Line_A->Blazon_arms;
				$blazon_crest = $Line_A->Blazon_crest;
				$blazon_motto = $Line_A->Blazon_motto;
				$blazon_supporters = $Line_A->Blazon_supporters;
				$blazon_badge = $Line_A->Blazon_badge;
				$blazon_flag = $Line_A->Blazon_flag;
				$blazon_standard = $Line_A->Blazon_standard;
				$symbolism_file = $Line_A->Symbolism_file;
				$symbolism = $Line_A->Symbolism;
				$armigerous_grant_date = $Line_A->Armigerous_Grant_Date;
				$blazon_cadet = $Line_A->Blazon_cadet;
				$cadet_file = $Line_A->Cadet_file;
				$bio_file = $Line_A->Bio_file;
				$artist = $Line_A->Artist;
				$calligrapher = $Line_A->Calligrapher;
				$painted_arms_file = $Line_A->Painted_arms_file;
				$painted_arms_small_file = $Line_A->Painted_arms_small_file;
				$painted_by = $Line_A->Painted_by;
				$painted_date = $Line_A->Painted_date;
				}
			if ($armigerous_found == 0)
				{ 
				$arms_URL = "armoury/";
				$armoury_name = "";
				$arms_caption = "";
				$arms_file_100 = "";
				$arms_file_350 = "aemma_350h.jpg";
				$arms_file_large = "";
				$badge_file = "";
				$flag_file = "";
				$standard_file = "";
				$on_the_roll = "";
				$armoury_letter = "a";
				$arms_source = "";
				$armigerous_grant_date = "";
				$CHA_chk = 0;
				$COA_chk = 0;
				$LYON_chk = 0;
				$NAT_chk = 0;
				$INST_chk = 0;
				$ASS_chk = 0;
				$auth_link = "";
				$blazon_arms = $non_armigerous_text[$lang_num];
				$blazon_crest = "";
				$blazon_motto = "";
				$blazon_supporters = "";
				$blazon_badge = "";
				$blazon_flag = "";
				$blazon_standard = "";
				$symbolism_file = "";
				$symbolism = "";
				$blazon_cadet = "";
				$cadet_file = "";
				$armigerous_grant_date = "";
				$bio_file = "";
				$artist = "";
				$calligrapher = "";
				$painted_arms_file = "";
				$painted_arms_small_file = "";
				$painted_by = "";
				$painted_date = "";
					}		

			$SQL_A  = 'SELECT Award_ID, Award_Year';
			$SQL_A .= ' FROM Members_Awards';
			$SQL_A .= ' WHERE Member_ID = ' .  $member_ID;
			$SQL_A .= ' ORDER BY Award_Year DESC';
			$Result_A = mysqli_query($LinkID, $SQL_A);
			if (mysqli_num_rows($Result_A) > 0) 
				{
				$i = 0;
				while ($Line_A = mysqli_fetch_object($Result_A))
					{
					$array_awards_mem_ID[$i] = $Line_A->Award_ID;
					$array_awards_mem_year[$i] = $Line_A->Award_Year;

					$i++;
					}
				$num_array_awards_mem = sizeof($array_awards_mem_ID);
				}
			else
				{ $num_array_awards_mem = 0; }




			} // end if ($state == "Create") else ....

		// setup the new data input form displayed on the screen, each section being loaded up below.
		//
?>
		<div class="member_admin box"><?=$header_bar[$lang_num]?>&nbsp;<img src="images/icons/hand_right_pointing.gif" alt="" style="vertical-align:middle;" />&nbsp;<?=strtoupper($header_state[$lang_num]);?></div>
<!--		<div class="member_admin box">OSLJ MEMBER ADMINISTRATION ==> <?=strtoupper($state);?></div>-->
<!--
		<table border="0" align="<?=$table_align?>" width="<?=$table_width?>" cellpadding="0" cellspacing="2" bgcolor="lightgrey" bordercolor="#000000">
		<tr>
			<td colspan="6" align="center" valign="center"><table border="1" width="100%"><tr><th align="center" class="bggray">OSLJ MEMBER ADMINISTRATION ==> <?=strtoupper($state);?></th></tr></table></td>
		</tr>
		</table>

-->
<ul class="tab">
  <li><a href="#" class="tablinks <?=$tab0_active?>" onclick="openTab(event, 'personal')"><?=$tab0[$lang_num]?></a></li>
  <li><a href="#" class="tablinks <?=$tab1_active?>" onclick="openTab(event, 'membership')"><?=$tab1[$lang_num]?></a></li>
  <li><a href="#" class="tablinks <?=$tab2_active?>" onclick="openTab(event, 'training')"><?=$tab2[$lang_num]?></a></li>
  <li><a href="#" class="tablinks <?=$tab3_active?>" onclick="openTab(event, 'financial')"><?=$tab3[$lang_num]?></a></li>
  <li><a href="#" class="tablinks <?=$tab4_active?>" onclick="openTab(event, 'equipment')"><?=$tab4[$lang_num]?></a></li>
  <li><a href="#" class="tablinks <?=$tab5_active?>" onclick="openTab(event, 'accoutrements')"><?=$tab5[$lang_num]?></a></li>
  <li><a href="#" class="tablinks <?=$tab6_active?>" onclick="openTab(event, 'injuries')"><?=$tab6[$lang_num]?></a></li>
  <li><a href="#" class="tablinks <?=$tab7_active?>" onclick="openTab(event, 'armigerous')"><?=$tab7[$lang_num]?></a></li>
  <li><a href="#" class="tablinks <?=$tab8_active?>" onclick="openTab(event, 'username')"><?=$tab8[$lang_num]?></a></li>

</ul>

<div id="personal" class="tabcontent" <?=$tab0_display?>><!-- begin personal info tab section -->
<?php
		//<!-- begin member's personal profile -->
		include "Tab_personal_profile.php";
		//<!-- end member's personal profile -->
?>
</div><!-- end personal info tab section -->

<div id="membership" class="tabcontent" <?=$tab1_display?>><!-- begin membership tab section -->
<?php
		//<!-- begin member's membership profile -->
		include "Tab_membership_profile.php";
		//<!-- end member's membership profile -->
?>
</div><!-- end membership tab section -->

<div id="training" class="tabcontent" <?=$tab2_display?>><!-- begin training tab section -->
<?php
		//<!-- begin member's financial profile -->
		include "Tab_training_profile.php";
		//<!-- end member's financial profile -->
?>
</div><!-- end training tab section -->

<div id="financial" class="tabcontent" <?=$tab3_display?>><!-- begin financial tab section -->
<?php
		//<!-- begin member's financial profile -->
		include "Tab_financial_profile.php";
		//<!-- end member's financial profile -->
?>
</div><!-- end financial tab section -->

<div id="equipment" class="tabcontent" <?=$tab4_display?>><!-- begin equipment tab section -->
<?php
		//<!-- begin member's equipment profile -->
		include "Tab_equipment_profile.php";
		//<!-- end member's equipment profile -->
?>
</div><!-- end equipment tab section -->

<div id="accoutrements" class="tabcontent" <?=$tab5_display?>><!-- begin accoutrements tab section -->
<?php
		//<!-- begin member's accoutrements profile -->
		include "Tab_accoutrements_profile.php";
		//<!-- end member's accoutrements profile -->
?>
</div><!-- end accoutrements tab section -->

<div id="injuries" class="tabcontent" <?=$tab6_display?>><!-- begin injuries tab section -->
<?php
		//<!-- begin member's injuries profile -->
		include "Tab_injuries_profile.php";
		//<!-- end member's injuries profile -->
?>
</div><!-- end injuries tab section -->

<div id="armigerous" class="tabcontent" <?=$tab7_display?>><!-- begin armigerous tab section -->
<?php
		//<!-- begin member's armigerous profile -->
		include "Tab_armigerous_profile.php";
		//<!-- end member's armigerous profile -->
?>
</div><!-- end armigerous tab section -->

<div id="username" class="tabcontent" <?=$tab8_display?>><!-- begin username/password tab section -->
<?php
		//<!-- begin member's username/password profile -->
		include "Tab_username_profile.php";
		//<!-- end member's username/password profile -->
?>
</div><!-- end username/password tab section -->


<?php
	echo ("\n".'</div><!-- end main_content -->'."\n");
//	echo ("\n".'</form></div>'."\n");
//	<!-- being footer -->
	include "../php-bin/footer.php";
//	<!-- end footer
?>
</div><!-- container -->
</body></html>
- end armigerous tab section -->

<div id="username" class="tabcontent" <?=$tab8_display?>><!-- begin username/password tab section -->
<?php
		//<!-- begin member's username/password profile -->
		include "Tab_username_profile.php";
		//<!-- end member's username/password profile -->
?>
</div><!-- end username/password tab section -->


<?php
	echo ("\n".'</div><!-- end main_content -->'."\n");
//	echo ("\n".'</form></div>'."\n");
//	<!-- being footer -->
	include "../php-bin/footer.php";
//	<!-- end footer
?>
</div><!-- container -->
</body></html>
