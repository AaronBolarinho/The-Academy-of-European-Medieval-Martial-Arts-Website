<?php
ini_set('display_errors','On');
//
// Program: Members_search.php
// Author: David M. Cvet
// Created: Oct 17, 2016
// Description:
//	This script will search through all membership records based on any combination of search criteria selected and entered
//---------------------------
// Updates:
//	2017 ----------
//	jan 26:	added member ID and member number as searchable parameters
//	2018 ----------
//	feb 25:	added logic to limit the search to those records belonging to the Commander's Commandery as this has a role ID of "2"
//	2019 ------------------
//	jan 25:	standardized path names
//
// begin set database and members only library paths
$aims = 1;			// flag to indicate that we are now in the AIMS database system, so the menu bar needs to be expanded by the AIMS menu item
$lang = "en";
$lang_num = 0;
$modal = 0;			// disable the modal code in members_only_header2.php as no modals needed for this script
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories calling script
$PHP_string = "";
$php_string_set = 0;
$search  		= 0;
$seclvl			= 0;
$state			= "Update";

// setup the call to this script between language selections so that the right records and variables are initialized and reused
$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();

if (isset($_GET['SRCH']))  { $search = $_GET['SRCH']; $PHP_string = "?SRCH=".$search; $php_string_set++; } 
if (isset($_GET['SECL']))  { $seclvl = $_GET['SECL']; if ($php_string_set) { $PHP_string .= "&SECL=".$seclvl;} else {$PHP_string = "?SECL=".$seclvl; $php_string_set++;}}
$full_date		= date("F j, Y");
$current_pgm 	= "Members_search.php".$PHP_string;
$menu_selected 	= "GIMS";
$seclvl			= $_SESSION['RoleID'];
$record_count	= 0;

// test to determine if the initial database login session remains intact or the session has timed out before attempting to connect with the database
$session_expiration = $path_members."php-bin/sub_check_session_expiration.php"; include "$session_expiration";

//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

include "config/config.php";
$config = $path_members."config/config.php"; include "$config";
$login_AIMS = $path_dbase."config/AIMS_members_list_$lang.php"; include "$login_AIMS";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
echo ('<script type="text/javascript" src="../../js-bin/beep.js"></script>');
?>
<script type="text/javascript">
function enable_submit_search_button() {
    document.Search_Form.submit_search_button.disabled=false;
  }
</script>
<script type="text/javascript" src="js-bin/ResponsiveSlides.min.js"></script>
<script type="text/javascript" src="js-bin/main.js"></script>
<!--<link rel="stylesheet" href="css/main.css" type="text/css" />-->
<link rel="stylesheet" href="<?=$path_members?>css/thumbnail.css" type="text/css" />
<?php
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
$LinkID=dbConnect($DB);
?>
	<!-- begin main content -->
	<div id="main_content_AIMS">
	<img src="../images/1090x4_transparent.png" width="100%" alt="" />
<?php
$echoString 	= "";
$Cntr 		= " AND ";
if ($search)
	{
	// Build the SELECT Statement here.
	$SQL = 'SELECT M.Member_ID, M.Member_Number, M.FirstName, M.MiddleName, M.LastName, M.City, M.Email, M.NumHome, M.NumMobile, M.portrait_URL, M.portrait_File, M.Chapter_ID, S.Status_ID ';
	$from_tables = " FROM Members M, Members_Status S";
	$where = ' WHERE (M.Member_ID = S.Member_ID) ';
//	if (isset($_POST['PositionID']) && $_POST['PositionID'] <> 0)
//		{
//		$SQL .= ', P.Position_ID';
//		$from_tables .= ', tbl_Positions_Members P';
//		$where .= 'AND (M.Member_ID = P.Member_ID AND P.Position_ID = '.$_POST['PositionID'].') ';
//		$echoString .= "position ID=<i>\"".$_POST['PositionID']."\"</i>, ";
//		}
//echo ('debug:members_search:86:$_POST[RankID]="'.$_POST['RankID'].'", $_POST[RankCurrentCheck]="'.$_POST['RankCurrentCheck'].'"');
	if (isset($_POST['RankID']) && $_POST['RankID'] <> "" && $_POST['RankID'] <> 0)
		{
		if (isset($_POST['RankCurrentCheck'])) {$rank_current = " AND R.Current_Status = 1";} else {$rank_current = "";}
		$SQL .= ', R.Rank_ID';
		$from_tables .= ', Members_Rank R';
		$where .= 'AND (M.Member_ID = R.Member_ID AND R.Rank_ID = "'.$_POST['RankID'].'")'.$rank_current.' ';
		$echoString .= "rank ID is currenlty: <i>\"".$_POST['RankID']."\"</i>, ";
		}
//	if (isset($_POST['AwardID']) && $_POST['AwardID'] <> "")
//		{
//		$SQL .= ', A.Award_ID';
//		$from_tables .= ', Members_Awards A';
//		$where .= 'AND (M.Member_ID = A.Member_ID AND A.Award_ID = "'.$_POST['AwardID'].'") ';
//		$echoString .= "award ID=<i>\"".$_POST['AwardID']."\"</i>, ";
//		}
	if (isset($_POST['StatusID']) && $_POST['StatusID'] <> "")
		{
		if (isset($_POST['StatusCurrentCheck'])) {$status_current = " AND S.Current_Status = 1)";} else {$status_current = ")";}
		$where .= 'AND (S.Status_ID = "'.$_POST['StatusID'].'"'.$status_current.' ';
		$echoString .= "status ID=<i>\"".$_POST['StatusID']."\"</i>, ";
		}
	// combine the SQL, from tables and where statements
	$SQL = $SQL.$from_tables.$where;
	if (isset($_POST['MemID']))			{if ($_POST['MemID'] != '')			{ $SQL .= $Cntr . 'M.Member_ID = ' . $_POST['MemID'].' ';					$Cntr = 'AND ';	$echoString .= "member (system) ID=<i>\"".$_POST['MemID']."\"</i>, ";}}
	if (isset($_POST['MemNumber']))		{if ($_POST['MemNumber'] != '')		{ $SQL .= $Cntr . 'Member_Number = ' . $_POST['MemNumber'].' ';				$Cntr = 'AND ';	$echoString .= "member number=<i>\"".$_POST['MemNumber']."\"</i>, ";}}
	if (isset($_POST['Salutation']))	{if ($_POST['Salutation'] != '') 	{ $SQL .= $Cntr . 'Salutation LIKE "%' . $_POST['Salutation'] . '%" ';		$Cntr = 'AND ';	$echoString .= "salutation=<i>\"".$_POST['Salutation']."\"</i>, ";}}
	if (isset($_POST['LName']))			{if ($_POST['LName'] != '')  		{ $SQL .= $Cntr . 'LastName LIKE "%' . $_POST['LName'] . '%" ';				$Cntr = 'AND '; $echoString .= "surname=<i>\"".$_POST['LName']."\"</i>, "; }}
	if (isset($_POST['MName']))			{if ($_POST['MName'] != '')  		{ $SQL .= $Cntr . 'MiddleName LIKE "%' . $_POST['MName'] . '%" ';			$Cntr = 'AND '; $echoString .= "middle name=<i>\"".$_POST['MName']."\"</i>, "; }}
	if (isset($_POST['FName']))			{if ($_POST['FName'] != '')  		{ $SQL .= $Cntr . 'FirstName LIKE "%' . $_POST['FName'] . '%" ';			$Cntr = 'AND '; $echoString .= "first name=<i>\"".$_POST['FName']."\"</i>, "; }}
	if (isset($_POST['PName']))			{if ($_POST['PName'] != '')  		{ $SQL .= $Cntr . 'PreferredName LIKE "%'.$_POST['PName'].'%" ';			$Cntr = 'AND '; $echoString .= "preferred name=<i>\"".$_POST['PName']."\"</i>, "; }}
	if (isset($_POST['Postnominals']))	{if ($_POST['Postnominals'] != '')  { $SQL .= $Cntr . 'Postnominals LIKE "%'.$_POST['Postnominals'].'%" ';		$Cntr = 'AND '; $echoString .= "post nominals=<i>\"".$_POST['Postnominals']."\"</i>, "; }}
	if (isset($_POST['BirthDate']))		{if ($_POST['BirthDate'] != '')   	{ $SQL .= $Cntr . 'Birth_Date LIKE "%'.$_POST['BirthDate'].'%" '; 			$Cntr = 'AND '; $echoString .= "birth date=<i>\"".$_POST['BirthDate']."\"</i>, "; }}
	if (isset($_POST['Year_of_Birth']))	{if ($_POST['Year_of_Birth'] != '') { $SQL .= $Cntr . 'Year_of_Birth LIKE "%'.$_POST['Year_of_Birth'].'%" ';	$Cntr = 'AND '; $echoString .= "year of birth=<i>\"".$_POST['Year_of_Birth']."\"</i>, "; }}
	if (isset($_POST['Sex']))			{if ($_POST['Sex'] != '') 			{ $SQL .= $Cntr . 'Gender = "' . $_POST['Sex'] . '" ';  					$Cntr = 'AND '; $echoString .= "gender=<i>\"".$_POST['Sex']."\"</i>, "; }}
	if (isset($_POST['Language']))											{ $SQL .= $Cntr . 'Language = ' . $_POST['Language'] . ' ';  				$Cntr = 'AND '; $echoString .= "language=<i>\"".$_POST['Language']."</b>, "; }
	if (isset($_POST['Profession']))	{if ($_POST['Profession'] != '')  	{ $SQL .= $Cntr . 'Profession LIKE "%' . $_POST['Profession'] . '%" ';		$Cntr = 'AND '; $echoString .= "profession=<i>\"".$_POST['Profession']."\"</i>, "; }}
	if (isset($_POST['Company']))		{if ($_POST['Company'] != '')  		{ $SQL .= $Cntr . 'Company_Name LIKE "%'.$_POST['Company'].'%" ';   		$Cntr = 'AND '; $echoString .= "company name=<i>\"".$_POST['Company']."\"</i>, "; }}
	if (isset($_POST['Spouse']))		{if ($_POST['Spouse'] != '')  		{ $SQL .= $Cntr . 'Spouse LIKE "%' . $_POST['Spouse'] . '%" ';   			$Cntr = 'AND '; $echoString .= "spouse=<i>\"".$_POST['Spouse']."\"</i>, "; }}
//	if (isset($_POST['JusticeCheck']))										{ $SQL .= $Cntr . 'Justice = ' . $_POST['JusticeCheck'] . ' ';  			$Cntr = 'AND '; $echoString .= "<b>justice</b>, ";  }
	if (isset($_POST['DeceasedCheck']))										{ $SQL .= $Cntr . 'Deceased = ' . $_POST['DeceasedCheck'] . ' ';  			$Cntr = 'AND '; $echoString .= "<b>deceased</b>, ";  }
//	if (isset($_POST['DeceasedDateForm']))	{if ($_POST['DeceasedDateForm'] != '')  { $SQL .= $Cntr . 'Deceased_Date LIKE "%'.$_POST['DeceasedDateForm'].'%" ';	$Cntr = 'AND '; $echoString .= "deceased date=<i>\"".$_POST['DeceasedDateForm']."\"</i>, "; }}
	if (isset($_POST['NumHome']))		{if ($_POST['NumHome'] != '')  		{ $SQL .= $Cntr . 'NumHome LIKE "%' . $_POST['NumHome'] . '%" ';   			$Cntr = 'AND '; $echoString .= "home tel=<i>\"".$_POST['NumHome']."\"</i>, "; }}
	if (isset($_POST['NumWork']))		{if ($_POST['NumWork'] != '')  		{ $SQL .= $Cntr . 'NumWork LIKE "%' . $_POST['NumWork'] . '%" ';   			$Cntr = 'AND '; $echoString .= "bus tel=<i>\"".$_POST['NumWork']."\"</i>, "; }}
	if (isset($_POST['NumMobile']))		{if ($_POST['NumMobile'] != '')  	{ $SQL .= $Cntr . 'NumMobile LIKE "%' . $_POST['NumMobile'] . '%" ';   		$Cntr = 'AND '; $echoString .= "mobile=<i>\"".$_POST['NumMobile']."\"</i>, "; }}
	if (isset($_POST['NumFax']))		{if ($_POST['NumFax'] != '')  		{ $SQL .= $Cntr . 'NumFax LIKE "%' . $_POST['NumFax'] . '%" ';   			$Cntr = 'AND '; $echoString .= "fax=<i>\"".$_POST['NumFax']."\"</i>, "; }}
	if (isset($_POST['NumOther']))		{if ($_POST['NumOther'] != '')  	{ $SQL .= $Cntr . 'NumOther LIKE "%' . $_POST['NumOther'] . '%" ';   		$Cntr = 'AND '; $echoString .= "other=<i>\"".$_POST['NumOther']."\"</i>, "; }}
	if (isset($_POST['Email']))			{if ($_POST['Email'] != '')  		{ $SQL .= $Cntr . 'Email LIKE "%' . $_POST['Email'] . '%" ';   				$Cntr = 'AND '; $echoString .= "email=<i>\"".$_POST['Email']."\"</i>, "; }}
	if (isset($_POST['Email_alt']))		{if ($_POST['Email_alt'] != '')  	{ $SQL .= $Cntr . 'Email_Alternate LIKE "%'.$_POST['Email_alt'].'%" ';		$Cntr = 'AND '; $echoString .= "email alternate=<i>\"".$_POST['Email_alt']."\"</i>, "; }}
	if (isset($_POST['Address']))		{if ($_POST['Address'] != '')  		{ $SQL .= $Cntr . 'Address LIKE "%' . $_POST['Address'] . '%" ';   			$Cntr = 'AND '; $echoString .= "address=<i>\"".$_POST['Address']."\"</i>, "; }}
	if (isset($_POST['City']))			{if ($_POST['City'] != '')  		{ $SQL .= $Cntr . 'City LIKE "%' . $_POST['City'] . '%" ';   				$Cntr = 'AND '; $echoString .= "city=<i>\"".$_POST['City']."\"</i>, "; }}
	if (isset($_POST['Province']))		{if ($_POST['Province'] != '')  	{ $SQL .= $Cntr . 'Province LIKE "%' . $_POST['Province'] . '%" ';   		$Cntr = 'AND '; $echoString .= "province=<i>\"".$_POST['Province']."\"</i>, "; }}
	if (isset($_POST['SecAddress']))	{if ($_POST['SecAddress'] != '')  	{ $SQL .= $Cntr . 'SecAddress LIKE "%' . $_POST['SecAddress'] . '%" ';   	$Cntr = 'AND '; $echoString .= "secondary address=<i>\"".$_POST['SecAddress']."\"</i>, "; }}
	if (isset($_POST['SecCity']))		{if ($_POST['SecCity'] != '')  		{ $SQL .= $Cntr . 'SecondaryCity LIKE "%' . $_POST['SecCity'] . '%" ';		$Cntr = 'AND '; $echoString .= "secondary city=<i>\"".$_POST['SecCity']."\"</i>, "; }}
	if (isset($_POST['Country']))		{if ($_POST['Country'] != '')  		{ $SQL .= $Cntr . 'Country LIKE "%' . $_POST['Country'] . '%" ';   			$Cntr = 'AND '; $echoString .= "country=<i>\"".$_POST['Country']."\"</i>, "; }}
	if (isset($_POST['Comments']))		{if ($_POST['Comments'] != '')  	{ $SQL .= $Cntr . 'Comments LIKE "%' . $_POST['Comments'] . '%" ';   		$Cntr = 'AND '; $echoString .= "comments=<i>\"".$_POST['Comments']."\"</i>, "; }}
	if (isset($_POST['AcadDegree']))	{if ($_POST['AcadDegree'] != '')  	{ $SQL .= $Cntr . 'AcademicDegree LIKE "%'.$_POST['AcadDegree'].'%" ';   	$Cntr = 'AND '; $echoString .= "acad. degree=<i>\"".$_POST['AcadDegree']."\"</i>, "; }}
	if (isset($_POST['AcadInst']))		{if ($_POST['AcadInst'] != '')  	{ $SQL .= $Cntr . 'AcadInstitute LIKE "%' . $_POST['AcadInst'] . '%" '; 	$Cntr = 'AND '; $echoString .= "acad. institute=<i>\"".$_POST['AcadInst']."\"</i>, "; }}
	if (isset($_POST['Skills']))		{if ($_POST['Skills'] != '')  		{ $SQL .= $Cntr . 'Skills LIKE "%' . $_POST['Skills'] . '%" ';   			$Cntr = 'AND '; $echoString .= "skills=<i>\"".$_POST['Skills']."\"</i>, "; }}
	if (isset($_POST['Biography']))		{if ($_POST['Biography'] != '')  	{ $SQL .= $Cntr . 'Biography LIKE "%' . $_POST['Biography'] . '%" ';   		$Cntr = 'AND '; $echoString .= "biography=<i>\"".$_POST['Biography']."\"</i>, "; }}
	if (isset($_POST['ArmigerousCheck']))									{ $SQL .= $Cntr . 'Armigerous = ' . $_POST['ArmigerousCheck'] . ' ';  		$Cntr = 'AND '; $echoString .= "<b>armigerous</b>, ";  }
	if (isset($_POST['Nominated_By']))	{if ($_POST['Nominated_By'] != '')  { $SQL .= $Cntr . 'NominatedBy LIKE "%'. $_POST['Nominated_By'] .'%" ';		$Cntr = 'AND '; $echoString .= "nominated_by=<i>\"".$_POST['Nominated_By']."\"</i>, "; }}
	if (isset($_POST['AdminID']))		{if ($_POST['AdminID'] != '')  		{ $SQL .= $Cntr . 'Admin_ID LIKE "%'. $_POST['AdminID'] .'%" ';				$Cntr = 'AND '; $echoString .= "admin ID=<i>\"".$_POST['AdminID']."\"</i>, "; }}
	if (isset($_POST['AdminDateForm']))	{if ($_POST['AdminDateForm'] != '') { $SQL .= $Cntr . 'RecordCreation_Date LIKE "%'. $_POST['AdminDateForm'] .'%" ';$Cntr = 'AND '; $echoString .= "record creation date=<i>\"".$_POST['AdminDateForm']."\"</i>, "; }}
	if (isset($_POST['AdminNotes']))	{if ($_POST['AdminNotes'] != '')  	{ $SQL .= $Cntr . 'Admin_Notes LIKE "%'. $_POST['AdminNotes'] .'%" ';		$Cntr = 'AND '; $echoString .= "admin notes=<i>\"".$_POST['AdminNotes']."\"</i>, "; }}

	// if the user is a Commander, then limit the search for username records to those belonging to the default Commandery of the Commander currently logged in
	if ($seclvl == 2)
		{
		$echoString .= 'chapter=<i>"'.$_SESSION['ChapterID'].'"</i>, ';
		$SQL .= $Cntr . 'Chapter_ID = "'.$_SESSION['ChapterID'].'" ';
		}
	$SQL .= 'ORDER BY M.LastName';
//echo ('debug:Members_search:133:SQL="'.$SQL.'"');
	$echoString = substr($echoString, 0, -2);
	echo ('<div class="report_banner box" style="text-align:left;">&nbsp;The following search criteria were submitted for this search: '.$echoString.'</div>');
	echo ('<table width="90%" style="border-style:solid;border-width:1px;border-radius:10px;background-color:white;" class="box" align="center" cellpadding="0" cellspacing="0">');
	echo ('<tr class="report_header"><td>&nbsp;Mem. Num</td><td width="25%">Name</td><td>City</td><td>Primary Email</td><td>Telephone (H)</td><td>Mobile (M)</td><td>Photo&nbsp;</td><td>Arms&nbsp;</td></tr>');
	$Result = mysqli_query($LinkID, $SQL);
	if (mysqli_errno($LinkID) == 0) 
		{
		while ($Line = mysqli_fetch_object($Result))
			{
			$found = 1;
			$member_ID = $Line->Member_ID;
			$member_number = $Line->Member_Number;
			$status_ID = $Line->Status_ID;
			$record_count++;
			// determine the colour of the row dependent upon status
			//include 'sub_members_list_statuses.php';
			$colour = "black";
			$record_status = "";
			$cross = "";
			// build the row for the report
//			include "sub_table_rows.php";
			// determine if the individual is armigerous, and if so, pull the arms_URL
//			include "sub_armigerous.php";

			echo ('<tr style="cursor:pointer;" OnMouseOver="navBar(this,1,1);" title="'.$record_status.'"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $member_ID . ',' . $seclvl . ',\'' . $state . '\')">');
			echo ('<td><div id="Data"><font color="'.$colour.'">&nbsp;&nbsp;&nbsp;'.$Line->Member_Number . '</font></div></td>');
			echo ('<td><div id="Data"><font color="'.$colour.'">'.$Line->LastName.$cross.', ' . $Line->FirstName .' ' . $Line->MiddleName . '</font></div></td>');
			echo ('<td><div id="Data"><font color="'.$colour.'">' . $Line->City . '</font></div></td>');
			echo ('<td><div id="Data" align="left"><font color="'.$colour.'">' . $Line->Email . '</font></div></td>');
			echo ('<td><div id="Data" align="center"><font color="'.$colour.'">' . $Line->NumHome . '</font></div></td>');
			echo ('<td><div id="Data" align="center"><font color="'.$colour.'">' . $Line->NumMobile . '</font></div></td>');
			echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="'.$path_members.$Line->portrait_URL.'/'.$Line->portrait_File . '" height="15" border="0"><span><img src="'.$path_members.$Line->portrait_URL.'/'.$Line->portrait_File . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleName .'</span></a></div></td>');
			// determine if the individual is armigerous, and if so, pull the arms_URL
			$found = 0;
			$SQL_A = 'SELECT Arms_URL, Arms_file_100, Armoury_letter';
			$SQL_A .= ' FROM Members_Armigerous';
			$SQL_A .= ' WHERE Member_ID = ' . $member_ID ;
			$Result_A = mysqli_query($LinkID, $SQL_A);
			while ($Line_A = mysqli_fetch_object($Result_A))
				{
				$found = 1;
				echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="'.$path_members.$Line_A->Arms_URL.$Line_A->Armoury_letter.'/'.$Line_A->Arms_file_100 . '" height="15" border="0"><span><img src="'.$path_members.$Line_A->Arms_URL.$Line_A->Armoury_letter.'/'.$Line_A->Arms_file_100 . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleName .'</span></a></div></td>'); 
				}
			if ($found == 0)
				{ echo ('<td><div id="Data" align="center">&nbsp;</div></td>'); }			
			echo ('</tr>');
			}
		}	
	echo ('<tr style="background-color:#256b25;color:white;"><td colspan="8">&nbsp;<b>Total number of records retrieved: '.$record_count.'</b>&nbsp;</td></tr>');
	echo ('</table>');
	echo ('<div class="button_bar box"><form name="Search_Form" method="post" action="Members_search.php"><input type="submit" class="button" value="Click to try another search" name="submit_search_button" id="submit_search_button" /></form></div>');
	echo ('</form><!-- end Personal_Profile_Form -->'."\n");

	} // end search results listing
else
	{
	echo ('<div class="personal_profile_main box">');
	echo ("\n\t".'<form name="Search_Form" method="post" action="Members_search.php?SRCH=1">');
	
	// setup the search utility header (the green title bar)
	echo ("\n\t".'<div style="float:left;width:100%;height:24px;text-align:center;margin:auto;padding-top:3px;" class="bggreen"><img src="images/icons/query.png" alt="" style="margin-right:5px;vertical-align:middle;height:22px;" />&nbsp;<b>AIMS Search Utility&nbsp;&mdash;&nbsp;'.$full_date.'</b></div>'."\n");

	// left record column div
	echo ('<div class="pers_profile_col1"><!-- begin left record column -->');
	echo ("\n\t".'<br /><table border="0" align="center" width="100%" cellpadding="0" cellspacing="2">');
	echo ('	<tr>	
			<td width="30%" class="Label">Member ID <br />(sys generated):</td>
			<td width="70%"><input type="text" name="MemID" maxlength="8" size="2" value="" tabindex="1" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>	
			<td width="30%" class="Label">Member Num#</td>
			<td width="70%"><input type="text" name="MemNumber" maxlength="8" size="2" value="" tabindex="1" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>	
			<td width="30%" class="Label">Salutation:</td>
			<td width="70%"><input type="text" name="Salutation" maxlength="32" size="6" value="" tabindex="2" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Surname:</td>
			<td width="70%"><input type="text" name="LName" maxlength="48" size="14" value="" tabindex="3" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">First Name:</td>
			<td width="70%"><input type="text" name="FName" maxlength="48" size="14" value="" tabindex="4" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Middle Name:</td>
			<td width="70%"><input type="text" name="MName"  maxlength="48" size="14" value="" tabindex="5" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('<tr>
			<td width="30%" class="Label">Preferred Name:</td>
			<td width="70%"><input type="text" name="PName"  maxlength="48" size="14" value="" tabindex="6" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Post Nominal(s):</td>
			<td width="70%"><input type="text" name="Postnominals"  maxlength="36" size="14" value="" tabindex="7" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Birth Date:</td>
			<td width="70%"><input type="text" name="BirthDate" data-zdp_first_day_of_week="0"  maxlength="10" size="6" placeholder="yyyy-mm-dd" value="" tabindex="8" id="BirthDate" onclick="enable_submit_search_button()" /> <img src="../images/icons/event_icon.gif" alt="" style="vertical-align:middle" />
				<script type="text/javascript">$(\'#BirthDate\').Zebra_DatePicker();</script> yyyy-mm-dd</td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Year of Birth:</td>
			<td width="70%"><input type="text" name="YearOfBirth" maxlength="4" size="1" value="" tabindex="9" oninput="enable_submit_search_button()" style="cursor:pointer;" title="The year is automatically calculated should the birth date been entered and has been saved to the system" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Gender:</td>
			<td width="70%" class="Label">male: <input type="radio" name="Sex" value="M" style="vertical-align:middle" tabindex="10" onclick="enable_submit_search_button()" />&nbsp;&nbsp;&nbsp;female: <input type="radio" name="Sex" value="F" style="vertical-align:middle" tabindex="11" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Language:</td>
			<td width="70%" class="Label">English: <input type="radio" name="Language" value="0" style="vertical-align:middle" tabindex="12" onclick="enable_submit_search_button()" />&nbsp;&nbsp;&nbsp;French: <input type="radio" name="Language" value="1" style="vertical-align:middle" tabindex="13" onclick="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Profession:</td>
			<td width="70%"><input type="text" name="Profession"  maxlength="48" size="14" value="" tabindex="14" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Company:</td>
			<td width="70%"><input type="text" name="Company"  maxlength="48" size="14" value="" tabindex="15" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Spouse:</td>
			<td width="70%"><input type="text" name="Spouse"  maxlength="128" size="14" value="" tabindex="16" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Deceased:</td>
			<td width="70%"><input type="checkbox" name="DeceasedCheck" value="1" style="vertical-align:middle" onclick="enable_submit_search_button()"></td>
		</tr>');
//	echo ('	<tr>
//			<td width="30%" class="Label">Justice:</td>
//			<td width="70%"><input type="checkbox" name="JusticeCheck" value="1" style="vertical-align:middle" onclick="enable_submit_search_button()"></td>
//		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Position:</td>
			<td width="70%"><select name="PositionID" style="width:80%;" oninput="enable_submit_search_button()">');
			$Result = mysqli_query($LinkID, 'SELECT Position_ID, Description_en FROM tbl_Positions ORDER BY Position_ID');
			while ($obj2 = mysqli_fetch_object($Result)) {
			echo ('<option value="' .$obj2->Position_ID . '">' . $obj2->Description_en .'</option>');
			}
			echo ('</select></td>
		</tr>');
	echo ('	</table>');
	echo ("\n".'</div><!-- end left record column "pers_profile_col1" -->');
	
		// middle record column div
	echo ("\n".'<div class="pers_profile_col2"><!-- begin middle record column -->');
	echo ("\n\t".'<br /><table border="0" align="center" width="100%" cellpadding="0" cellspacing="2">');
	echo ('	<tr>
			<td width="30%" class="Label">Home:</td>
			<td width="70%"><input type="text" name="NumHome" maxlength="14" size="6" value="" tabindex="18" placeholder="(123) 456-7890" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Business:</td>
			<td width="70%"><input type="text" name="NumWork" maxlength="14" size="6" value="" tabindex="19" placeholder="(123) 456-7890" oninput="enable_submit_search_button()" /> <span class="Label">Ext# <input type="text" name="NumWorkExt" maxlength="4" size="1" value="" tabindex="20" /></span></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Fax:</td>
			<td width="70%"><input type="text" name="NumFax" maxlength="14" size="6" value="" tabindex="21" placeholder="(123) 456-7890" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Mobile:</td>
			<td width="70%"><input type="text" name="NumMobile" maxlength="14" size="6" value="" tabindex="22" placeholder="(123) 456-7890" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Other:</td>
			<td width="70%"><input type="text" name="NumOther" maxlength="14" size="6" value="" tabindex="23" placeholder="(123) 456-7890" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Email:</td>
			<td width="70%"><input type="text" name="Email" maxlength="96" size="16" value="" tabindex="24" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Email (alt):</td>
			<td width="70%"><input type="text" name="EmailAlt" maxlength="96" size="16" value="" tabindex="25" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('</table>');
	echo ("\n\t".'<table align="center" width="100%" cellpadding="0" cellspacing="2" style="border:2px solid green;border-radius:5px;">');
	echo ("\n\t".'<tr>
			<td width="30%" class="Label">Address:</td>
			<td width="70%"><textarea name="Address" rows="3" cols="26" wrap="virtual" tabindex="28" oninput="enable_submit_search_button()"></textarea></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">City:</td>
			<td width="70%"><input type="text" name="City" maxlength="32" size="16" value="" tabindex="29" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td colspan="2"><span class="Label">Province:</span> <select name="Province" tabindex="30" style="cursor:pointer" oninput="enable_submit_search_button()">
					<option value="">&nbsp;</option>
					<option value="AB" title="Alberta">AB&nbsp;</option>
					<option value="BC" title="British Columbia">BC&nbsp;</option>
					<option value="MB" title="Manitoba">MB&nbsp;</option>
					<option value="NB" title="New Brunswick">NB&nbsp;</option>
					<option value="NL" title="Newfoundland and Labrador">NL&nbsp;</option>
					<option value="NT" title="Northwest Territory">NT&nbsp;</option>
					<option value="NS" title="Nova Scotia">NS&nbsp;</option>
					<option value="NU" title="Nunavut">NU&nbsp;</option>
					<option value="ON" title="Ontario">ON&nbsp;</option>
					<option value="PE" title="Prince Edward Island">PE&nbsp;</option>
					<option value="QC" title="Quebec">QC&nbsp;</option>
					<option value="SK" title="Saskatchewan">SK&nbsp;</option>
					<option value="YT" title="Yukon Territory">YT&nbsp;</option></select>
			&nbsp;<span class="Label">Postal Code:</span> <input type="text" name="PostalCode" maxlength="7" size="2" value="" tabindex="31" /></td>
		</tr></table>');
	echo ("\n\t".'<table align="center" width="100%" cellpadding="0" cellspacing="2" style="border:2px solid red;border-radius:5px;">');
	echo ('	<tr>
			<td width="30%" class="Label">Address (Alt):</td>
			<td width="70%"><textarea name="SecAddress" rows="3" cols="26" wrap="virtual" tabindex="32" oninput="enable_submit_search_button()"></textarea></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">City:</td>
			<td width="70%"><input type="text" name="SecondaryCity" maxlength="32" size="16" value="" tabindex="33" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td colspan="2"><span class="Label">Prov/State:</span> <select name="ProvState" tabindex="34" style="cursor:pointer" oninput="enable_submit_search_button()">
					<option value="">&nbsp;</option>
					<option value="AB" title="Alberta">AB&nbsp;</option>
					<option value="BC" title="British Columbia">BC&nbsp;</option>
					<option value="MB" title="Manitoba">MB&nbsp;</option>
					<option value="NB" title="New Brunswick">NB&nbsp;</option>
					<option value="NL" title="Newfoundland and Labrador">NL&nbsp;</option>
					<option value="NT" title="Northwest Territory">NT&nbsp;</option>
					<option value="NS" title="Nova Scotia">NS&nbsp;</option>
					<option value="NU" title="Nunavut">NU&nbsp;</option>
					<option value="ON" title="Ontario">ON&nbsp;</option>
					<option value="PE" title="Prince Edward Island">PE&nbsp;</option>
					<option value="QC" title="Quebec">QC&nbsp;</option>
					<option value="SK" title="Saskatchewan">SK&nbsp;</option>
					<option value="YT" title="Yukon Territory">YT&nbsp;</option>
					<option value="" >--</option>
					<option value="AL" title="Alabama">AL&nbsp;&nbsp;</option>
					<option value="AK" title="Alaska">AK&nbsp;&nbsp;</option>
					<option value="AZ" title="Arizona">AZ&nbsp;&nbsp;</option>
					<option value="AR" title="Arkansas">AR&nbsp;&nbsp;</option>
					<option value="CA" title="Califorina">CA&nbsp;&nbsp;</option>
					<option value="CO" title="Colorado">CO&nbsp;&nbsp;</option>
					<option value="CT" title="Connecticut">CT&nbsp;&nbsp;</option>
					<option value="DE" title="Delaware">DE&nbsp;&nbsp;</option>
					<option value="FL" title="Florida">FL&nbsp;&nbsp;</option>
					<option value="GA" title="Georgia">GA&nbsp;&nbsp;</option>
					<option value="HI" title="Hawaii">HI&nbsp;&nbsp;</option>
					<option value="ID" title="Idaho">ID&nbsp;&nbsp;</option>
					<option value="IL" title="Illinois">IL&nbsp;&nbsp;</option>
					<option value="IN" title="Iindiana">IN&nbsp;&nbsp;</option>
					<option value="IA" title="Iowa">IA&nbsp;&nbsp;</option>
					<option value="KS" title="Kansas">KS&nbsp;&nbsp;</option>
					<option value="KY" title="Kentucky">KY&nbsp;&nbsp;</option>
					<option value="LA" title="Louisiana">LA&nbsp;&nbsp;</option>
					<option value="ME" title="Maine">ME&nbsp;&nbsp;</option>
					<option value="MD" title="Maryland">MD&nbsp;&nbsp;</option>
					<option value="MA" title="Massachusetts">MA&nbsp;&nbsp;</option>
					<option value="MI" title="Michigan">MI&nbsp;&nbsp;</option>
					<option value="MN" title="Minnesota">MN&nbsp;&nbsp;</option>
					<option value="MS" title="Mississippi">MS&nbsp;&nbsp;</option>
					<option value="MO" title="Missouri">MO&nbsp;&nbsp;</option>
					<option value="MT" title="Montana">MT&nbsp;&nbsp;</option>
					<option value="NE" title="Nebraska">NE&nbsp;&nbsp;</option>
					<option value="NV" title="Nevada">NV&nbsp;&nbsp;</option>
					<option value="NH" title="New Hampshire">NH&nbsp;&nbsp;</option>
					<option value="NJ" title="New Jersey">NJ&nbsp;&nbsp;</option>
					<option value="NM" title="New Mexico">NM&nbsp;&nbsp;</option>
					<option value="NY" title="New York">NY&nbsp;&nbsp;</option>
					<option value="NC" title="North Carolina">NC&nbsp;&nbsp;</option>
					<option value="ND" title="North Dakota">ND&nbsp;&nbsp;</option>
					<option value="OH" title="Ohio">OH&nbsp;&nbsp;</option>
					<option value="OK" title="Oklahoma">OK&nbsp;&nbsp;</option>
					<option value="OR" title="Oregon">OR&nbsp;&nbsp;</option>
					<option value="PA" title="Pennsylvania">PA&nbsp;&nbsp;</option>
					<option value="RI" title="Rhode Island">RI&nbsp;&nbsp;</option>
					<option value="SC" title="South Carolina">SC&nbsp;&nbsp;</option>
					<option value="SD" title="South Dakota">SD&nbsp;&nbsp;</option>
					<option value="TN" title="Tennessee">TN&nbsp;&nbsp;</option>
					<option value="TX" title="Texas">TX&nbsp;&nbsp;</option>
					<option value="UT" title="Utah">UT&nbsp;&nbsp;</option>
					<option value="VT" title="Vermont">VT&nbsp;&nbsp;</option>
					<option value="VA" title="Virginia">VA&nbsp;&nbsp;</option>
					<option value="WA" title="Washington">WA&nbsp;&nbsp;</option>
					<option value="WV" title="West Virginia">WV&nbsp;&nbsp;</option>
					<option value="WI" title="Wisconsin">WI&nbsp;&nbsp;</option>
					<option value="WY" title="Wyoming">WY&nbsp;&nbsp;</option></select>
				&nbsp;<span class="Label">PC/ZIP:</span> <input type="text" name="PCZip" maxlength="16" size="2" value="" tabindex="35" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Country:</td>
			<td width="70%"><input type="text" name="Country" maxlength="32" size="16" value="" tabindex="36" oninput="enable_submit_search_button()" /></td>
		</tr></table>');
	echo ("\n".'</div><!-- end middle record column "pers_profile_col2" -->');
	
	// right record column div
	echo ("\n".'<div class="pers_profile_col3"><!-- begin right record column -->');
	echo ("\n\t".'<br /><table border="0" align="center" width="100%" cellpadding="0" cellspacing="2">');
	echo ('	<tr>
			<td width="30%" class="Label">Comments:</td>
			<td width="70%"><textarea name="Comments" rows="5" cols="28" wrap="virtual" tabindex="37" oninput="enable_submit_search_button()"></textarea></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Acad. Degree:</td>
			<td width="70%"><input type="text" name="AcadDegree" maxlength="256" size="8" value="" tabindex="38" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Acad. Institution:</td>
			<td width="7270%"><input type="text" name="AcadInstitute" maxlength="256" size="16" value="" tabindex="39" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
		<td width="30%" class="Label">Skills:</td>
		<td width="70%"><textarea name="Skills" rows="1" cols="28" wrap="virtual" tabindex="40" oninput="enable_submit_search_button()"></textarea></td>
	</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Biography:</td>
			<td width="70%"><textarea name="Biography" rows="5" cols="28" wrap="virtual" tabindex="41" oninput="enable_submit_search_button()"></textarea></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Armigerous:</td>
			<td width="70%"><input type="checkbox" name="ArmigerousCheck" value="1" tabindex="42" style="vertical-align:middle" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Nominated by:</td>
			<td width="70%"><input type="text" name="NominatedBy" maxlength="512" size="18" value="" tabindex="43" oninput="enable_submit_search_button()" /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Admin:</td>
			<td width="70%"><input type="text" name="Admin" maxlength="32" size="4" value="" tabindex="44" oninput="enable_submit_search_button()"> <img src="images/icons/note.gif" alt="" style="vertical-align:middle;cursor:pointer;width:20px;" title="This is the ID of the individual/administrator who created the initial record entered into GIMS." /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Admin Date:</td>
			<td width="70%"><input type="text" name="AdminDateForm" data-zdp_first_day_of_week="0"  maxlength="10" size="6" tabindex="45" placeholder="yyyy-mm-dd" value="" id="AdminDateForm" disabled="true" onclick="enable_submit_search_button()" /> <img src="images/icons/note.gif" alt="" style="vertical-align:middle;cursor:pointer;width:20px;" title="This field is the date time stamp of when this record was entered into GIMS." />
				<script type="text/javascript">$(\'#AdminDateForm\').Zebra_DatePicker();</script> yyyy-mm-dd</td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Admin Notes:</td>
			<td width="70%"><textarea name="AdminNotes" rows="2" cols="24" wrap="virtual" tabindex="46" oninput="enable_submit_search_button()"></textarea> <img src="images/icons/note.gif" alt="" style="vertical-align:middle;cursor:pointer;width:20px;" title="This field contains system/GIMS oriented notes. These are generally not public, and are relevant only to the administration of GIMS." /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Status:</td>
			<td width="70%"><select name="StatusID" oninput="enable_submit_search_button()">');
			$Result = mysqli_query($LinkID, 'SELECT Status_ID, Status_Desc FROM Status ORDER BY Status_ID');
			while ($obj2 = mysqli_fetch_object($Result)) {
			echo ('<option value="' .$obj2->Status_ID . '" title="'.$obj2->Status_Desc.'">' . $obj2->Status_Desc .'</option>');
			}
			echo ('</select>&nbsp;<span class="Label">Current: <input type="checkbox" name="StatusCurrentCheck" value="1" tabindex="42" style="vertical-align:middle" onclick="enable_submit_search_button()" /> <img src="images/icons/note.gif" alt="" style="vertical-align:middle;cursor:pointer;width:20px;" title="Clicking this will return only those records whose status is currently the status selected, otherwise, the search will return ALL records having possessed the status selected at some point in their \'career\' with the OSLJ." /></td>
		</tr>');
	echo ('	<tr>
			<td width="30%" class="Label">Rank:</td>
			<td width="70%"><select name="RankID" oninput="enable_submit_search_button()">');
			$Result = mysqli_query($LinkID, 'SELECT Rank_ID, Rank_Desc FROM Ranks ORDER BY Rank_ID');
			while ($obj2 = mysqli_fetch_object($Result)) {
			echo ('<option value="' .$obj2->Rank_ID . '" title="'.$obj2->Rank_Desc.'">' . $obj2->Rank_Desc .'</option>');
			}
			echo ('</select>&nbsp;<span class="Label">Current: <input type="checkbox" name="RankCurrentCheck" value="1" tabindex="42" style="vertical-align:middle" onclick="enable_submit_search_button()" /> <img src="images/icons/note.gif" alt="" style="vertical-align:middle;cursor:pointer;width:20px;" title="Clicking this will return only those records whose rank is currently the rank selected, otherwise, the search will return ALL records having possessed the rank selected at some point in their \'career\' with the OSLJ." /></td>
		</tr>');
//	echo ('	<tr>
//			<td width="30%" class="Label">Award:</td>
//			<td style="width:50%;"><select name="AwardID" oninput="enable_submit_search_button()">');
//			$Result = mysqli_query($LinkID, 'SELECT Award_ID, Description_en FROM tbl_Awards ORDER BY Award_ID');
//			while ($obj2 = mysqli_fetch_object($Result)) {
//			echo ('<option value="' .$obj2->Award_ID . '" title="'.$obj2->Description_en.'">' . $obj2->Award_ID .'</option>');
//			}
//			echo ('</select></td>
//		</tr>');
	echo ('</table>');
	echo ("\n".'</div><!-- end right record column "pers_profile_col3" -->');
	echo ("\n".'<table width="100%" bgcolor="orange">'."\n");
?>
		<tr>
			<td align="center"><input type="submit" class="button" value="Click to submit your search criteria" name="submit_search_button" id="submit_search_button" disabled="true"> <input type="reset" class="button"  value="Clear entries from search form"></td>
		</tr>
<?php
	echo ('	</table></form><!-- end Personal_Profile_Form -->'."\n");
	echo ("\n".'</div><!-- end personal_profile_main box -->'."\n");
	} // end big else

echo ("\n".'</div><!-- main content -->'."\n");
//	<!-- being footer -->
	include "../php-bin/footer.php";
//	<!-- end footer
echo ('</div><!-- container --></body></html>');
?>

