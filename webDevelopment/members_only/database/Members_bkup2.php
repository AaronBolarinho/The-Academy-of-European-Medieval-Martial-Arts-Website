<?php
// Program: Members.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description:
//
//---------------------------
// Updates:
//	2012 ----------
//	feb 24: dropped the columns Rank, RankDate, RankLoc from table People, to incorporate Members_Rank table thus allowing
//		for multiple rank records to be archived per record 
//

include 'ss_path.stuff';
//session_start();
//include_once 'IDValid.php';
$status_people = 0;
$status_chapter = 0;

Function MemberCreate($LinkID, $Rec_ID, $School, $FName, $MName, $LName, $Salutation, $Protocol, $Addy1, $Addy2, $Addy3, $City, $ProvState, $PCZip, $Country,
			$NumHome, $NumOffice, $NumFax, $NumCell, $EMail, $Portrait, $Shield, $EmergName, $EmergPhone, $Job, $Gender, $TransMode, $PreviousMartial, $Spouse, $BirthDate, $Deceased,
			$DeceasedDate, $Interests, $Arms, $Source, $Blazon, $PN, $OPN, $Degree, $Institution, $HeardFrom, $FirstAid, $Injury, $InjuryReport, $EnrolledElist, $Joined, $freeMonth, $FeesGoodTillDate,
			$Medical, $ArmouredHarness, $ArmouredHarnessDesc, $UnarmouredHarnessDesc, $Rank, $RankDate, $RankCurrent, $RankLoc, $RankNotes, $TrainingComments, $Comments, $PeriodGarments, $ArcheryDesc, $TTAC3Desc, $MemStatus, $MemType, $PayMethod, $PayDate,
			$scholar_comm, $scholar_gd_comm, $scholar_sb_comm, $scholar_ls_comm, $scholar_pw_comm, $scholar_ac_comm,
			$armazare, $daga, $spada, $spadalonga, $swordbuckler, $pollaxe, $spear, $armouredcombat, $quarterstaff, $archery, $langesschwert, $mountedcombat, $ttac3, $rapier, $Chapter) {

// We create a blank record then pass through to the MemberUpdate to complete the process.

	$SQL    = 'INSERT INTO People VALUES ()';
	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) {
		$Rec_ID = mysql_insert_id($LinkID);
		$status_people = 1;
		MemberUpdate($LinkID, $Rec_ID, $School, $FName, $MName, $LName, $Salutation, $Protocol, $Addy1, $Addy2, $Addy3, $City, $ProvState, $PCZip, $Country,
			$NumHome, $NumOffice, $NumFax, $NumCell, $EMail, $Portrait, $Shield, $EmergName, $EmergPhone, $Job, $Gender, $TransMode, $PreviousMartial, $Spouse, $BirthDate, $Deceased,
			$DeceasedDate, $Interests, $Arms, $Source, $Blazon, $PN, $OPN, $Degree, $Institution, $HeardFrom, $FirstAid, $Injury, $InjuryReport, $EnrolledElist, $Joined, $freeMonth, $FeesGoodTillDate,
			$Medical, $ArmouredHarness, $ArmouredHarnessDesc, $UnarmouredHarnessDesc, $TrainingComments, $Comments, $PeriodGarments, $ArcheryDesc, $TTAC3Desc, $MemStatus, $MemType, $PayMethod, $PayDate,
			$scholar_comm, $scholar_gd_comm, $scholar_sb_comm, $scholar_ls_comm, $scholar_pw_comm, $scholar_ac_comm);
	} else {
		echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Create Membership Record Status (Table : People)<br />new member record ID# "'.$Rec_ID.'" could <b>NOT</b> be inserted.<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
	}

	$SQL    = 'INSERT INTO Members_Chapter VALUES ('.$Rec_ID.','.$Chapter.')';
	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0 && $status_people) {
		$status_chapter = 1;
		ChapterUpdate($LinkID, $Rec_ID, $Chapter);
	} else {
		echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Create Membership Chapter Record Status (Table : Members_Chapter)<br />new member chapter record ID# "'.$Rec_ID.'" could <b>NOT</b> be inserted.<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
	}

	$SQL    = 'INSERT INTO Members_Rank VALUES ('.$Rec_ID.','.$Rank.',"'.$RankDate.'",1,"'.$RankLoc.'","")';
	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0 && $status_people && $status_chapter) {
		$members_rank = 1;
		RankUpdate($LinkID, $Rec_ID, $Rank, $RankDate,$RankCurrent,$RankLoc,$RankNotes);
	} else {
		echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Create Membership Rank Record Status (Table : Members_Rank)<br />new member rank record ID# "'.$Rec_ID.'" could <b>NOT</b> be inserted.<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
	}

	$init_armazare = 0;
	$init_daga = 0;
	$init_spada = 0;
	$init_spadalonga = 0;
	$init_swordbuckler = 0;
	$init_pollaxe = 0;
	$init_spear = 0;
	$init_armouredcombat = 0;
	$init_quarterstaff = 0;
	$init_archery = 0;
	$init_langesschwert = 0;
	$init_mountedcombat = 0;
	$init_ttac3 = 0;
	$init_rapier = 0;

	$SQL    = 'INSERT INTO Members_Martial VALUES ('.$Rec_ID.','.$init_armazare.','.$init_daga.','.$init_spada.','.$init_spadalonga.','.$init_swordbuckler.','.$init_pollaxe.','.$init_spear.','.$init_armouredcombat.','.$init_quarterstaff.','.$init_archery.','.$init_langesschwert.','.$init_mountedcombat.','.$init_ttac3.','.$init_rapier.' )';
	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0 && $status_chapter && $status_people && $members_rank) {
		MartialUpdate($LinkID, $Rec_ID, $armazare, $daga, $spada, $spadalonga, $swordbuckler, $pollaxe, $spear, $armouredcombat, $quarterstaff, $archery, $langesschwert, $mountedcombat, $ttac3, $rapier);
	} else {
		echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Create Membership Martial Arts Record Status (Table : Members_Martial)<br />new member record ID# "'.$Rec_ID.'" could <b>NOT</b> be inserted.<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
	}


} // End Function MemberCreate

Function MemberUpdate($LinkID, $Rec_ID, $School, $FName, $MName, $LName, $Salutation, $Protocol, $Addy1, $Addy2, $Addy3, $City, $ProvState, $PCZip, $Country,
			$NumHome, $NumOffice, $NumFax, $NumCell, $EMail, $Portrait, $Shield, $EmergName, $EmergPhone, $Job, $Gender, $TransMode, $PreviousMartial, $Spouse, $BirthDate, $Deceased,
			$DeceasedDate, $Interests, $Arms, $Source, $Blazon, $PN, $OPN, $Degree, $Institution, $HeardFrom, $FirstAid, $Injury, $InjuryReport, $EnrolledElist, $Joined, $freeMonth, $FeesGoodTillDate,
			$Medical, $ArmouredHarness, $ArmouredHarnessDesc, $UnarmouredHarnessDesc, $TrainingComments, $Comments, $PeriodGarments, $ArcheryDesc, $TTAC3Desc, $MemStatus, $MemType, $PayMethod, $PayDate,
			$scholar_comm, $scholar_gd_comm, $scholar_sb_comm, $scholar_ls_comm, $scholar_pw_comm, $scholar_ac_comm ) {

//	Se set default values.  Parameters passed with GET and POST are left blank if defaulted,
//	so we have to explicitly choose the default values - just to be safe. Set blank fields to Null.

//	$UserName = strtolower(substr($FName, 0, 1) . $LName);
	if ($FName == '')			{ $FName = 'Null'; }				else { $FName = "'" . addslashes($FName) . "'"; }
	if ($MName == '')			{ $MName = 'Null'; }				else { $MName = "'" . addslashes($MName) . "'"; }
	if ($LName == '')			{ $LName = 'Null'; }				else { $LName = "'" . addslashes($LName) . "'"; }
	if ($Salutation == '')			{ $Salutation = 'Null'; }			else { $Salutation = "'" . addslashes($Salutation) . "'"; }
	if ($Protocol == '')			{ $Protocol = 'Null'; }				else { $Protocol = "'" . addslashes($Protocol) . "'"; }
	if ($Addy1 == '')			{ $Addy1 = 'Null'; }				else { $Addy1 = "'" . addslashes($Addy1) . "'"; }
	if ($Addy2 == '')			{ $Addy2 = 'Null'; }				else { $Addy2 = "'" . addslashes($Addy2) . "'"; }
	if ($Addy3 == '')			{ $Addy3 = 'Null'; }				else { $Addy3 = "'" . addslashes($Addy3) . "'"; }
	if ($City == '')			{ $City = 'Null'; }				else { $City = "'" . addslashes($City) . "'"; }
	if ($ProvState == '')			{ $ProvState = 'Null'; }			else { $ProvState = "'" . addslashes($ProvState) . "'"; }
	if ($PCZip == '')			{ $PCZip = 'Null'; }				else { $PCZip = "'" . addslashes($PCZip) . "'"; }
	if ($Country == '')			{ $Country = 'Null'; }				else { $Country = "'" . addslashes($Country) . "'"; }
	if ($School == '')			{ $School = 'AEMMA'; }
	if ($NumHome == '')			{ $NumHome = 'Null'; }				else { $NumHome = "'" . addslashes($NumHome) . "'"; }
	if ($NumOffice == '')			{ $NumOffice = 'Null'; }			else { $NumOffice = "'" . addslashes($NumOffice) . "'"; }
	if ($NumFax == '')			{ $NumFax = 'Null'; }				else { $NumFax = "'" . addslashes($NumFax) . "'"; }
	if ($NumCell == '')			{ $NumCell = 'Null'; }				else { $NumCell = "'" . addslashes($NumCell) . "'"; }
	if ($EMail == '')			{ $EMail = 'Null'; }				else { $EMail = "'" . addslashes($EMail) . "'"; }
//	if ($Portrait == '')			{ $Portrait = 'Null'; }	 			else { $Portrait = "'" . addslashes($Portrait) . "'"; }
//	if ($Shield == '')			{ $Shield = 'Null'; }				else { $Shield = "'" . addslashes($Shield) . "'"; }
	if ($Portrait == '')			{ $Portrait = "http://www.aemma.org/images/bio_photos/bio_noPhotoDbase.jpg"; }
	if ($Shield == '')			{ $Shield = "http://www.aemma.org/arms/a/aemma_80.jpg"; }
	if ($EmergName == '')			{ $EmergName = 'Null'; }			else { $EmergName = "'" . addslashes($EmergName) . "'"; }
	if ($EmergPhone == '')			{ $EmergPhone = 'Null'; }			else { $EmergPhone = "'" . addslashes($EmergPhone) . "'"; }
	if ($Job == '')				{ $Job = 'Null'; }				else { $Job = "'" . addslashes($Job) . "'"; }
	if ($Gender == '')			{ $Gender = 'Null'; }				else { $Gender = "'" . addslashes($Gender) . "'"; }
	if ($TransMode == '')			{ $TransMode = '0'; }
	if ($PreviousMartial == '')		{ $PreviousMartial = '0'; }
	if ($Spouse == '')			{ $Spouse = 'Null'; }				else { $Spouse = "'" . addslashes($Spouse) . "'"; }
	if ($BirthDate == '')			{ $BirthDate = 'Null'; }			else { $BirthDate = "'" . addslashes($BirthDate) . "'"; }
	if ($Deceased == '')			{ $Deceased = '0'; }
	if ($DeceasedDate == '')		{ $DeceasedDate = 'Null'; }			else { $DeceasedDate = "'" . addslashes($DeceasedDate) . "'"; }
	if ($Interests == '')			{ $Interests = 'Null'; }			else { $Interests = "'" . addslashes($Interests) . "'"; }
	if ($Arms == '')			{ $Arms = '0'; }
	if ($Source == '')			{ $Source = 'Null'; }				else { $Source = "'" . addslashes($Source) . "'"; }
	if ($Blazon == '')			{ $Blazon = 'Null'; }				else { $Blazon = "'" . addslashes($Blazon) . "'"; }
	if ($PN == '')				{ $PN = 'Null'; }				else { $PN = "'" . addslashes($PN) . "'"; }
	if ($OPN == '')				{ $OPN = 'Null'; }				else { $OPN = "'" . addslashes($OPN) . "'"; }
	if ($Degree == '')			{ $Degree = 'Null'; }				else { $Degree = "'" . addslashes($Degree) . "'"; }
	if ($Institution == '')			{ $Institution = 'Null'; }			else { $Institution = "'" . addslashes($Institution) . "'"; }
	if ($FirstAid == '')			{ $FirstAid = '0'; }
	if ($Injury == '')			{ $Injury = '0'; }
	if ($InjuryReport == '')		{ $InjuryReport = 'Null'; }			else { $InjuryReport = "'" . addslashes($InjuryReport) . "'"; }
	if ($EnrolledElist == '')		{ $EnrolledElist = '0'; }
	if ($Joined == '')			{ $Joined = 'Null'; }				else { $Joined = "'" . addslashes($Joined) . "'"; }
	if ($freeMonth == '')			{ $freeMonth = '0'; }
	if ($HeardFrom == '')			{ $HeardFrom = 'Null'; }			else { $HeardFrom = "'" . addslashes($HeardFrom) . "'"; }
	if ($FeesGoodTillDate == '')		{ $FeesGoodTillDate = 'Null'; }			else { $FeesGoodTillDate = "'" . addslashes($FeesGoodTillDate) . "'"; }
	if ($Medical == '')			{ $Medical = 'Null'; }				else { $Medical = "'" . addslashes($Medical) . "'"; }
	if ($ArmouredHarness == '')		{ $ArmouredHarness = '0'; }
	if ($ArmouredHarnessDesc == '')		{ $ArmouredHarnessDesc = 'Null'; }		else { $ArmouredHarnessDesc = "'" . addslashes($ArmouredHarnessDesc) . "'"; }
	if ($UnarmouredHarnessDesc == '')	{ $UnarmouredHarnessDesc = 'Null'; }		else { $UnarmouredHarnessDesc = "'" . addslashes($UnarmouredHarnessDesc) . "'"; }

	if ($TrainingComments == '')		{ $TrainingComments = 'Null'; }			else { $TrainingComments = "'" . addslashes($TrainingComments) . "'"; }
	if ($Comments == '')			{ $Comments = 'Null'; }				else { $Comments = "'" . addslashes($Comments) . "'"; }

	if ($scholar_comm == '')		{ $scholar_comm = 'Null'; }			else { $scholar_comm = "'" . $scholar_comm . "'"; }
	if ($scholar_gd_comm == '')		{ $scholar_gd_comm = 'Null'; }			else { $scholar_gd_comm = "'" . $scholar_gd_comm . "'"; }
	if ($scholar_sb_comm == '')		{ $scholar_sb_comm = 'Null'; }			else { $scholar_sb_comm = "'" . $scholar_sb_comm . "'"; }
	if ($scholar_ls_comm == '')		{ $scholar_ls_comm = 'Null'; }			else { $scholar_ls_comm = "'" . $scholar_ls_comm . "'"; }
	if ($scholar_pw_comm == '')		{ $scholar_pw_comm = 'Null'; }			else { $scholar_pw_comm = "'" . $scholar_pw_comm . "'"; }
	if ($scholar_ac_comm == '')		{ $scholar_ac_comm = 'Null'; }			else { $scholar_ac_comm = "'" . $scholar_ac_comm . "'"; }

	if ($PeriodGarments == '')		{ $PeriodGarments = 'Null'; }			else { $PeriodGarments = "'" . addslashes($PeriodGarments) . "'"; }
	if ($ArcheryDesc == '')			{ $ArcheryDesc = 'Null'; }			else { $ArcheryDesc = "'" . addslashes($ArcheryDesc) . "'"; }
	if ($TTAC3Desc == '')			{ $TTAC3Desc = 'Null'; }			else { $TTAC3Desc = "'" . addslashes($TTAC3Desc) . "'"; }
	if ($MemStatus == '')			{ $MemStatus = '0'; }
	if ($MemType == '')			{ $MemType = '0'; }
	if ($PayMethod == '')			{ $PayMethod = '0'; }
	if ($PayDate == '')			{ $PayDate = 'Null'; }				else { $PayDate = "'" . addslashes($PayDate) . "'"; }

// Now save People information

	$SQL  = 'UPDATE People SET ';
	$SQL .= 'MemberStatus_ID 		= ' . $MemStatus . ', ';
	$SQL .= 'MemberType_ID	 		= ' . $MemType . ', ';
	$SQL .= 'PayMethod_ID	 		= ' . $PayMethod . ', ';
	$SQL .= 'School		 		= "' . $School . '", ';
	$SQL .= 'FirstName	 		= ' . $FName . ', ';
	$SQL .= 'MiddleInitial			= ' . $MName . ', ';
	$SQL .= 'LastName	 		= ' . $LName . ', ';
	$SQL .= 'Salutation	 		= ' . $Salutation . ', ';
	$SQL .= 'AddressProtocol  		= ' . $Protocol . ', ';
	$SQL .= 'Address1	 		= ' . $Addy1 . ', ';
	$SQL .= 'Address2	 		= ' . $Addy2 . ', ';
	$SQL .= 'Address3	 		= ' . $Addy3 . ', ';
	$SQL .= 'City		 		= ' . $City . ', ';
	$SQL .= 'ProvState	 		= ' . $ProvState . ', ';
	$SQL .= 'PCZip				= ' . $PCZip . ', ';
	$SQL .= 'Country	 		= ' . $Country . ', ';
	$SQL .= 'NumHome	 		= ' . $NumHome . ', ';
	$SQL .= 'NumOffice	 		= ' . $NumOffice . ', ';
	$SQL .= 'NumFax				= ' . $NumFax . ', ';
	$SQL .= 'NumMobile	 		= ' . $NumCell . ', ';
	$SQL .= 'EMail		 		= ' . $EMail . ', ';
	$SQL .= 'portrait_URL 			= "' . $Portrait . '", ';
	$SQL .= 'arms_URL 			= "' . $Shield . '", ';
	$SQL .= 'EmergContactName		= ' . $EmergName . ', ';
	$SQL .= 'EmergContactPhone		= ' . $EmergPhone . ', ';
	$SQL .= 'Occupation	 		= ' . $Job . ', ';
	$SQL .= 'Gender				= ' . $Gender . ', ';
	$SQL .= 'TransportationMode		= ' . $TransMode . ', ';
	$SQL .= 'PreviousMartial		= ' . $PreviousMartial . ', ';
	$SQL .= 'Spouse				= ' . $Spouse . ', ';
	$SQL .= 'BirthDate			= ' . $BirthDate . ', ';
	$SQL .= 'Deceased	 		= ' . $Deceased . ', ';
	$SQL .= 'DeceasedDate			= ' . $DeceasedDate . ', ';
	$SQL .= 'Interests	 		= ' . $Interests . ', ';
	$SQL .= 'Armigerous	 		= ' . $Arms . ', ';
	$SQL .= 'ArmsSource  			= ' . $Source . ', ';
	$SQL .= 'Blazon  			= ' . $Blazon . ', ';
	$SQL .= 'PostNominals			= ' . $PN . ', ';
	$SQL .= 'OtherPNs	 		= ' . $OPN . ', ';
	$SQL .= 'AcademicDegree 		= ' . $Degree . ', ';
	$SQL .= 'AcademicInstitution		= ' . $Institution . ', ';
	$SQL .= 'FirstAidTraining	 	= ' . $FirstAid . ', ';
	$SQL .= 'Injury			 	= ' . $Injury . ', ';
	$SQL .= 'InjuryReport			= ' . $InjuryReport . ', ';
	$SQL .= 'EnrolledElist			= ' . $EnrolledElist . ', ';
	$SQL .= 'DateJoined	 		= ' . $Joined . ', ';
	$SQL .= 'free_month	 		= ' . $freeMonth . ', ';
	$SQL .= 'HeardFrom	 		= ' . $HeardFrom . ', ';
	$SQL .= 'FeesGoodTillDate	 	= ' . $FeesGoodTillDate . ', ';
	$SQL .= 'PaymentReceived 		= ' . $PayDate . ', ';
	$SQL .= 'Medical		 	= ' . $Medical . ', ';
	$SQL .= 'ArmouredHarness		= ' . $ArmouredHarness . ', ';
	$SQL .= 'ArmouredHarnessDescription 	= ' . $ArmouredHarnessDesc . ', ';
	$SQL .= 'UnarmouredHarnessDescription 	= ' . $UnarmouredHarnessDesc . ', ';
	$SQL .= 'PeriodGarments 		= ' . $PeriodGarments . ', ';
	$SQL .= 'ArcheryDescription		= ' . $ArcheryDesc . ', ';
	$SQL .= 'TTAC3Description		= ' . $TTAC3Desc . ', ';
	$SQL .= 'TrainingComments		= ' . $TrainingComments . ', ';
	$SQL .= 'scholar_comments		= ' . $scholar_comm . ', ';
	$SQL .= 'scholar_grap_dag_comments	= ' . $scholar_gd_comm . ', ';
	$SQL .= 'scholar_sword_buck_comments	= ' . $scholar_sb_comm . ', ';
	$SQL .= 'scholar_longsword_comments	= ' . $scholar_ls_comm . ', ';
	$SQL .= 'scholar_poleweapons_comments	= ' . $scholar_pw_comm . ', ';
	$SQL .= 'scholar_armoured_comments	= ' . $scholar_ac_comm . ', ';
	$SQL .= 'Comments	 		= ' . $Comments . ' ';
	$SQL .= 'WHERE Rec_ID = ' . $Rec_ID;

//echo ('debug: SQL for update: '.$SQL);

	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) {
		echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Membership Record Status (Table : People)<br />member record ID# "'.$Rec_ID.'" successfully saved.<br />');
		echo ('SQL Statement generated:&nbsp;"'.$SQL.'"<br /><br /></div>');
	} else {
		echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Membership Record Status (Table : People)<br />updated member record ID# "'.$Rec_ID.'" could <b>NOT</b> be saved.<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
	}

} // End Function MemberUpdate

Function ChapterUpdate($LinkID, $Rec_ID, $Chapter) {

//	Set default values.  Parameters passed with GET and POST are left blank if defaulted,
//	so we have to explicitly choose the default values - just to be safe. Set blank fields to Null.

// setup Chapter membership

if ($Chapter == '') { $Chapter = '1'; }

$SQL_CHK = 'SELECT Chapter_ID, Assoc FROM Members_Chapter';
$SQL_CHK .= 'WHERE People_ID = '.$Rec_ID;
$Result_CHK = mysql_query($SQL_CHK, $LinkID);
$row = mysql_fetch_object($Result_CHK);

echo ('debug:members.php:285:$row chapter_ID="'.$row->Chapter_ID.'"');
if ($row)
	{ 
	// check if there's any changes to the data in the Members_Rank row, if not, exit, if so, update
	if ($row->Chapter_ID <> $Chapter)
		{
		// Update Chapter information. 
	
		$SQL  = 'UPDATE Members_Chapter SET ';
		$SQL .=  'Chapter_ID		= ' . $Chapter . ' ';
		$SQL .= 'WHERE People_ID 	= ' . $Rec_ID;
		$Result = mysql_query($SQL, $LinkID);
		if (mysql_errno($LinkID) == 0) 
			{
			echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Member Chapter Record Status (Table : Members_Chapter)<br />member chapter record ID# "'.$Rec_ID.'" successfully saved.<br /></font>');
			echo ('SQL Statement generated:&nbsp;"'.$SQL.'"<br /><br /></div>');
			}
		else 	{
			echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Member Chapter Record Status (Table : Members_Chapter)<br />member chapter record ID# "'.$Rec_ID.'" could <b>NOT</b> be saved.<br />');
			echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
			echo ('Please try again or select menu option to continue.<br /><br />');
			echo ('If this problem persists, please call your local system administrator.<p><br />');
			echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
			}
		}
	}
else
	{
	// the row doesn't exist, therefore, it must be an insertion of a new record
	$SQL    = 'INSERT INTO Members_Chapter VALUES ('.$Rec_ID.','.$Chapter.',1)';
	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) 
		{
		echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Create Membership Chapter Record Status (Table : Members_Chapter)<br />new member Chapter record ID# "'.$Rec_ID.'" successfully inserted.<br />');
		echo ('SQL Statement generated:&nbsp;"'.$SQL.'"<br /><br /></div>');
		}
	else 	{
		echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Create Membership Chapter Record Status (Table : Members_Chapter)<br />new member Chapter record ID# "'.$Rec_ID.'" could <b>NOT</b> be inserted.<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
		}
	}

} // End Function ChapterUpdate

Function RankUpdate($LinkID, $Rec_ID, $Rank, $RankDate,$RankCurrent,$RankLoc,$RankNotes) {

if ($Rank == '')			{ $Rank = '1'; }
if ($RankDate == '')			{ $RankDate = 'Null'; }	
if ($RankLoc == '')			{ $RankLoc = 'Null'; }				else { $RankLoc = addslashes($RankLoc); }
if ($RankNotes == '')			{ $RankNotes = 'Null'; }			else { $RankNotes = addslashes($RankNotes); }
if ($RankCurrent == '')			{ $RankCurrent = '0'; }

// determine if there's any changes to the columns, if so, update the table, if not, skip it or if it doesn't exist, then insert it
$SQL_CHK = 'SELECT Rank_ID, Date, Current, Location, Notes FROM Members_Rank';
$SQL_CHK .= 'WHERE People_ID = '.$Rec_ID.' AND Rank_ID = '.$Rank.' AND Current = '.$RankCurrent;
$Result_CHK = mysql_query($SQL_CHK, $LinkID);
$row = mysql_fetch_object($Result_CHK);
if (!$row)
	{ 
	// the row doesn't exist, therefore, it must be an insertion of a new record
	$SQL    = 'INSERT INTO Members_Rank VALUES ('.$Rec_ID.','.$Rank.',"'.$RankDate.'",1,"'.$RankLoc.'","'.$RankNotes.'")';
	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) 
		{
		echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Create Membership Rank Record Status (Table : Members_Rank)<br />new member rank record ID# "'.$Rec_ID.'" successfully inserted.<br />');
		echo ('SQL Statement generated:&nbsp;"'.$SQL.'"<br /><br /></div>');
		}
	else 	{
		echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Create Membership Rank Record Status (Table : Members_Rank)<br />new member rank record ID# "'.$Rec_ID.'" could <b>NOT</b> be inserted.<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
		}
	}
else
	{
	// check if there's any changes to the data in the Members_Rank row, if not, exit, if so, update
	if ($row->Rank <> $Rank || $row->Date <> $Date ||$row->Location <> $RankLoc || $row->Notes <> $RankNotes ||$row->Current <> $RankCurrent)
		{
		// Update Rank information. 

		$SQL  = 'UPDATE Members_Rank SET ';
		$SQL .= 'Rank_ID = '.$Rank. ', ';
		$SQL .= 'Date = "'.$RankDate.'", ';
		$SQL .= 'Current = '.$RankCurrent.', ';
		$SQL .= 'Location = "'.$RankLoc.'", ';
		$SQL .= 'Notes = "'.$RankNotes.'" ';
		$SQL .= 'WHERE People_ID = ' . $Rec_ID;
		$Result = mysql_query($SQL, $LinkID);
		if (mysql_errno($LinkID) == 0) 
			{
			echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Member Rank Record Status (Table : Members_Rank)<br />member Rank record ID# "'.$Rec_ID.'" successfully saved.<br /></font>'); 
			echo ('SQL Statement generated:&nbsp;"'.$SQL.'"<br /><br /></div>');
			}
		else 	{
			echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Member Rank Record Status (Table : Members_Rank)<br />member Rank record ID# "'.$Rec_ID.'" could <b>NOT</b> be saved.<br />');
			echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
			echo ('Please try again or select menu option to continue.<br /><br />');
			echo ('If this problem persists, please call your local system administrator.<p><br />');
			echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
			}
		}
	}

} // End Function RankUpdate


Function MartialUpdate($LinkID, $Rec_ID, $armazare, $daga, $spada, $spadalonga, $swordbuckler, $pollaxe, $spear, $armouredcombat, $quarterstaff, $archery, $langesschwert, $mountedcombat, $ttac3, $rapier ) {

//	set default values.  Parameters passed with GET and POST are left blank if defaulted,
//	so we have to explicitly choose the default values - just to be safe. Set blank fields to Null.


// setup the martial defaults

	if ($armazare == '')		{ $armazare = '0'; }
	if ($daga == '')		{ $daga = '0'; }
	if ($spada == '')		{ $spada = '0'; }
	if ($spadalonga == '')		{ $spadalonga = '0';}
	if ($swordbuckler == '')	{ $swordbuckler = '0'; }
	if ($pollaxe == '')		{ $pollaxe = '0'; }
	if ($spear == '')		{ $spear = '0'; }
	if ($armouredcombat == '')	{ $armouredcombat = '0'; }
	if ($quarterstaff == '')	{ $quarterstaff = '0'; }
	if ($archery == '')		{ $archery = '0'; }
	if ($langesschwert == '')	{ $langesschwert = '0'; }
	if ($mountedcombat == '')	{ $mountedcombat = '0'; }
	if ($ttac3 == '')		{ $ttac3 = '0'; }
	if ($rapier == '')		{ $rapier = '0'; }

// Update Martial_Members information

	$SQL  = 'UPDATE Members_Martial SET ';
	$SQL .= 'armazare	 	= ' . $armazare . ', ';
	$SQL .= 'daga			= ' . $daga . ', ';
	$SQL .= 'spada			= ' . $spada . ', ';
	$SQL .= 'spadalonga		= ' . $spadalonga . ', ';
	$SQL .= 'swordbuckler		= ' . $swordbuckler . ', ';
	$SQL .= 'pollaxe		= ' . $pollaxe . ', ';
	$SQL .= 'spear			= ' . $spear . ', ';
	$SQL .= 'armouredcombat		= ' . $armouredcombat . ', ';
	$SQL .= 'quarterstaff		= ' . $quarterstaff . ', ';
	$SQL .= 'archery		= ' . $archery . ', ';
	$SQL .= 'langesschwert		= ' . $langesschwert . ', ';
	$SQL .= 'mountedcombat		= ' . $mountedcombat . ', ';
	$SQL .= 'ttac3			= ' . $ttac3 . ', ';
	$SQL .= 'rapier			= ' . $rapier . ' ';
	$SQL .= 'WHERE People_ID 	= ' . $Rec_ID;

	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) {
		echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Member Martial Arts Record Status (Table : Members_Martial)<br />member martial arts record ID# "'.$Rec_ID.'" successfully saved.<br /></font>');
		echo ('SQL Statement generated:&nbsp;"'.$SQL.'"<br /><br /></div>');
		}
	else	{
		echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Member Martial Arts Record Status (Table : Members_Martial)<br />updated member martial arts record ID# "'.$Rec_ID.'"   could <b>NOT</b> be saved.<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
		}

// Saved Membership Information.

	echo ('Please select menu option to continue.</div>');

} // End Function MartialUpdate



Function MemberDelete($LinkID, $Rec_ID) {

	echo ('MemberDelete routine reserved for future use.<br />');

} // End Function MemberDelete

Function MemberShow($LinkID, $State, $Rec_ID) {
?>
<html>
<head>
   <link rel="stylesheet" href="main.css" type="text/css" />
   <link rel="stylesheet" type="text/css" media="all" href="skins/aqua/theme.css" title="Aqua" />
   <script type="text/javascript" src="calendar.js"></script>
   <script type="text/javascript" src="lang/calendar-en.js"></script>
   <script type="text/javascript" src="calendar-setup.js"></script>
</head>
<body align="center" valign="top" bgcolor="white">

	<form name="Members" method="post" action="Members.php">
	<?php
	$SQL  = 'SELECT P.School, P.FirstName, P.MiddleInitial, P.LastName, P.Salutation,P.AddressProtocol, P.Address1, P.Address2, P.Address3, ';
	$SQL .= '	P.City, P.ProvState, P.PCZip, P.Country, P.NumHome, P.NumOffice, P.NumFax, P.NumMobile, P.EMail, P.portrait_URL, P.arms_URL, ';
	$SQL .= '	P.EmergContactName, P.EmergContactPhone, P.Occupation, P.Gender, P.TransportationMode, P.PreviousMartial, P.Spouse, P.BirthDate, P.Deceased, P.DeceasedDate, ';
	$SQL .= '	P.Interests, P.Armigerous, P.ArmsSource, P.Blazon, P.PostNominals, P.OtherPNs, P.AcademicDegree, P.AcademicInstitution, P.FirstAidTraining, P.Injury, P.InjuryReport, P.EnrolledElist, ';
	$SQL .= '	P.DateJoined, P.free_month, P.HeardFrom, P.FeesGoodTillDate, P.Medical, P.ArmouredHarness, P.ArmouredHarnessDescription, P.UnarmouredHarnessDescription, P.TrainingComments, P.Comments, ';
	$SQL .= '	P.PeriodGarments, P.ArcheryDescription, P.TTAC3Description, P.PaymentReceived, P.MemberStatus_ID, P.MemberType_ID, P.PayMethod_ID, L.UserName L_Name, L.People_ID L_ID, ';
	$SQL .= '  P.scholar_comments, P.scholar_grap_dag_comments, P.scholar_sword_buck_comments, P.scholar_longsword_comments, P.scholar_poleweapons_comments, P.scholar_armoured_comments ';
	$SQL .= ' FROM People P LEFT JOIN Login L ON P.Rec_ID = L.ID';
	$SQL .= ' WHERE P.Rec_ID = ' . $Rec_ID*1;
	$Result = mysql_query($SQL, $LinkID);
	$Line1 = mysql_fetch_object($Result);

	$SQL3 = 'SELECT M.armazare, M.daga, M.spada, M.spadalonga, M.swordbuckler, M.pollaxe, M.spear, M.quarterstaff, M.armouredcombat, M.archery, M.langesschwert, M.mountedcombat, M.ttac3, M.rapier';
	$SQL3 .= ' FROM Members_Martial M';
	$SQL3 .= ' WHERE M.People_ID = ' . $Rec_ID*1;
	$Result3 = mysql_query($SQL3, $LinkID);
	$Line3 = mysql_fetch_object($Result3);

	$SQL4 = 'SELECT MR.Rank_ID, MR.Date, MR.Current, MR.Location, MR.Notes';
	$SQL4 .= ' FROM Members_Rank MR';
	$SQL4 .= ' WHERE MR.People_ID = ' .$Rec_ID. ' AND MR.Current = 1';
	$Result4 = mysql_query($SQL4, $LinkID);
	$Line4 = mysql_fetch_object($Result4);
	?>
	<table border="0" align="center" width="500" cellpadding="0" cellspacing="2" bgcolor="lightgrey" bordercolor="#000000">
	<tr>
		<td colspan="4" align="center" valign="center"><table border="1" width="100%"><tr><th align="center"><?=$school?> MEMBER ADMINISTRATION - <?=strtoupper($State);?> : Membership ID# <?=$Rec_ID?></th></tr></table></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Surname:&nbsp;</td>
		<td width="37%"><input type="text" name="LName" maxlength="45" size="22" value="<?=$Line1->LastName?>"></td>
		<td colspan="2" rowspan=9><div align="center"><img src="<?=$Line1->portrait_URL?>" border=1></div><br /><input type="text" name="Portrait" maxlength="128" size="30" value="<?=$Line1->portrait_URL?>"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">First Name:&nbsp;</td>
		<td width="37%"><input type="text" name="FName" maxlength="25" size="22" value="<?=$Line1->FirstName?>"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Middle Name:&nbsp;</td>
		<td width="37%"><input type="text" name="MName"  maxlength="20" size="22" value="<?=$Line1->MiddleInitial?>"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Salutation/Title:&nbsp;</td>
	<?php
	if ($State == "Create")
		{
		echo ('<td width="37%"><input type="text" name="Salutation" maxlength="12" size="22" value="Mr."></td>');
		}
	else
		{
		echo ('<td width="37%"><input type="text" name="Salutation" maxlength="12" size="22" value="'.$Line1->Salutation.'"></td>');
		}
	?>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Address 1:&nbsp;</td>
		<td width="37%"><input type="text" name="Addy1" maxlength="64" size="22" value="<?=$Line1->Address1?>"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Address 2:&nbsp;</td>
		<td width="37%"><input type="text" name="Addy2"  maxlength="64" size="22" value="<?=$Line1->Address2?>"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Address 3:&nbsp;</td>
		<td width="37%"><input type="text" name="Addy3" maxlength="64" size="22" value="<?=$Line1->Address3?>"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">City:&nbsp;</td>
		<td width="37%"><input type="text" name="City" maxlength="32" size="22" value="<?=$Line1->City?>"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Prov/State:&nbsp;</td>
		<td width="37%"><table border="0" align="left" width=90% cellpadding="0" cellspacing="0" bgcolor="lightgrey" bordercolor="#000000">
		<tr>
		<?php
			if ($State == "Create")
				{
				echo ('<td><input type="text" name="ProvState" maxlength="2" size="2" value="ON"></td>');
				}
			else
				{
			echo ('<td><input type="text" name="ProvState"  maxlength="2" size="2" value="'.$Line1->ProvState.'"></td>');
				}
		?>
			<td valign="center" id="Label">PC/Zip:&nbsp;</td>
			<td align="left"><input type="text" name="PCZip"  maxlength="12" size="10"  value="<?=$Line1->PCZip?>"></td>
		</tr></table></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Country:&nbsp;</td>
	<?php
	if ($State == "Create")
		{
		echo ('<td width="37%"><input type="text" name="Country" maxlength="32" size="22" value="Canada"></td>');
		}
	else
		{
		echo ('<td width="37%"><input type="text" name="Country"    maxlength="32" size="22"  value="'.$Line1->Country.'"></td>');
		}
	?>
		<td valign="center" width="13%" id="Label">Occupation:&nbsp;</td>
		<td width="37%"><input type="text" name="Job"  maxlength="32" size="22" value="<?=$Line1->Occupation?>"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Address label:&nbsp;</td>
		<td width="37%"><input type="text" name="Protocol"   maxlength="64" size="22" value="<?=$Line1->AddressProtocol?>"></td>
		<td valign="center" id="Label" colspan="2" align="left">Birth Date (yyyy-mm-dd):&nbsp;<input type="text" name="BirthDate"     maxlength="10" size="10" value="<?=$Line1->BirthDate?>" id="BirthDate">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Home #:&nbsp;</td>
		<td width="37%"><input type="text" name="NumHome"    maxlength="20" size="22" value="<?=$Line1->NumHome?>"></td>
		<td valign="center" width="13%" id="Label">Emerg Contact:&nbsp;</td>
		<td width="37%"><input type="text" name="EmergName"  maxlength="64" size="22" value="<?=$Line1->EmergContactName?>"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Office #:&nbsp;</td>
		<td width="37%"><input type="text" name="NumOffice"  maxlength="20" size="22" value="<?=$Line1->NumOffice?>"></td>
		<td valign="center" width="13%" id="Label">Emerg Phone:&nbsp;</td>
		<td width="37%"><input type="text" name="EmergPhone"  maxlength="20" size="22" value="<?=$Line1->EmergContactPhone?>"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Fax #:&nbsp;</td>
		<td width="37%"><input type="text" name="NumFax"     maxlength="20" size="22" value="<?=$Line1->NumFax?>"></td>
		<td valign="center" width="13%" id="Label">Spouse:&nbsp;</td>
		<td width="37%"><input type="text" name="Spouse"  maxlength="32" size="22" value="<?=$Line1->Spouse?>"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Mobile #:&nbsp;</td>
		<td width="37%"><input type="text" name="NumCell"    maxlength="20" size="22" value="<?=$Line1->NumMobile?>"></td>
		<td valign="center" id="Label" colspan="2">Acad. Degree:&nbsp;<input type="text" name="Degree"  maxlength="64" size="20" value="<?=$Line1->AcademicDegree?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td width="13%" id="Label" valign="top">E-Mail:&nbsp;</td>
		<td width="37%" valign="top"><input type="text" name="EMail"      maxlength="50" size="22" value="<?=$Line1->EMail?>"></td>
		<td valign="center" id="Label" colspan="2">Acad. Institution:&nbsp;<input type="text" name="Institution"  maxlength="64" size="20" value="<?=$Line1->AcademicInstitution?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Other PN's:&nbsp;</td>
		<td width="37%"><input type="text" name="OPN"   maxlength="64" size="22" value="<?=$Line1->OtherPNs?>"></td>
		<td valign="center" width="13%" id="Label">Post-Nominals:&nbsp;</td>
		<td width="37%"><input type="text" name="PN"         maxlength="64" size="22" value="<?=$Line1->PostNominals?>"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Heard From:&nbsp;</td>
		<td width="37%"><input type="text" name="HeardFrom"  maxlength="32" size="22" value="<?=$Line1->HeardFrom?>"></td>
		<td valign="center" width="13%" id="Label">Interests:&nbsp;</td>
		<td width="37%"><input type="text" name="Interests"  maxlength="64" size="22" value="<?=$Line1->Interests?>"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Armigerous:&nbsp;</td>
		<td valign="center" colspan=3><table border="0" align="left" width=400 cellpadding="0" cellspacing="0" bgcolor="lightgrey" bordercolor="#000000">
			<tr>
				<td><input type="checkbox" name="Arms" value="1"  <?=$Line1->Armigerous == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;</td>
				<td valign="center" id="Label" align="left">Source:&nbsp;<input type="text"  name="Source" maxlength="64" size="36" value="<?=$Line1->ArmsSource?>" id="Source">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr></table></td>
	</tr>
	<tr>
		<td colspan="2"><div align="center"><img src="<?=$Line1->arms_URL?>" border=1></div><br /><input type="text" name="Shield" maxlength="128" size="30" value="<?=$Line1->arms_URL?>"></td>
		<td valign="center" colspan="2"><table border="1" width="100%">
		<tr><td bgcolor="lightgrey" id="Label"><div align="center">Medical Details</div></td></tr>
		<tr><td><textarea name="Medical" rows="6" cols="36" wrap="virtual" maxlength="512"><?=$Line1->Medical?></textarea></td></tr></table></td>
	</tr>
	<tr>
		<td valign="top" colspan="2" id="Label">Transportation Mode:&nbsp;<select name="TransMode">
			<?php
			$SQL7 = 'SELECT ID, Description FROM Transportation_Mode ORDER BY ID';
			$Result7 = mysql_query($SQL7, $LinkID);
			while ($Line7 = mysql_fetch_object($Result7)) {
				echo ('<option ' . ($Line7->ID == $Line1->TransportationMode ? 'SELECTED' : '') . ' value="' .$Line7->ID .'">' . $Line7->Description);
			}
			?>
	 		</select>&nbsp;&nbsp;</td>
			<td valign="center" colspan="2" id="Label" align="left">Gender:&nbsp;&nbsp;
			<?php
			if ($State == "Create")
				{
				echo ('male:&nbsp;<input type="radio" name="Gender" value="M"  "CHECKED" >&nbsp;&nbsp;&nbsp;female:&nbsp;<input type="radio" name="Gender" value="F">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>');
				}
			else
				{
				echo ('male:&nbsp;<input type="radio" name="Gender" value="M" '. ($Line1->Gender == 'M' ? 'CHECKED' : '') .' >&nbsp;&nbsp;&nbsp;female:&nbsp;<input type="radio" name="Gender" value="F" '. ($Line1->Gender == 'F' ? 'CHECKED' : '') .'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>');
				}
			?>		
	</tr>
	<tr>
		<td valign="center" id="Label" colspan="2">First Aid Training?&nbsp;&nbsp;<input type="checkbox" name="FirstAid" value="1"  <?=$Line1->FirstAidTraining == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;</td>
		<td id="Label" colspan="2">Deceased:&nbsp;&nbsp;<input type="checkbox" name="Deceased" value="1"  <?=$Line1->Deceased == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;&nbsp;Deceased Date:&nbsp;<input type="text"  name="DeceasedDate" maxlength="10" size="10" value="<?=$Line1->DeceasedDate?>" id="DeceasedDate">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<script type="text/javascript">
				Calendar.setup( {
					inputField : "DeceasedDate",
					ifFormat   : "%Y-%m-%d"
				});
			</script>
	</tr>
	<tr>
		<td valign="top"  colspan="2" id="Label">Previous Martial Arts Experience?&nbsp;&nbsp;<input type="checkbox" name="PreviousMartial" value="1"  <?=$Line1->PreviousMartial == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td valign="top"  colspan="2" id="Label">Injured While Training @ AEMMA?&nbsp;&nbsp;<input type="checkbox" name="Injury" value="1"  <?=$Line1->Injury == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;</td>
	</tr>
<!-- the submit button occurs twice on this page, therefore, update one, must update the other -->
	<tr>
		<td colspan="4" align="center"><input type="hidden" name="School" value="AEMMA"><input type="hidden" name="ID" value="<?=$Rec_ID?>"><input type="hidden" name="State" value="Member<?=$State?>"><input type="Submit" value="Save Membership Information"><br /></td>
	</tr>
<!-- the submit button occurs twice on this page, therefore, update one, must update the other -->
	<tr>
		<td colspan="4" align="center" valign="center"><table border="1" width="100%"><tr><th align="center">MEMBERSHIP & TRAINING PROFILE : Membership ID# <?=$Rec_ID?></td></tr></table></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><table border="1" width="100%"><tr><td bgcolor="#FDD017" id="Label"><div align="center">MEMBERSHIP DETAILS</div></td></tr></table></td>
		<td colspan="2" align="center"><table border="1" width="100%"><tr><td bgcolor="#FDD017" id="Label"><div align="center">TRAINING DETAILS</div></td></tr></table></td>
	</tr>
	<tr>
		<td id="Label" colspan="2" valign="top"><p align="left"><b>
<?php
			echo ('Membership ID# '.$Rec_ID);
?>
			</b></p>Date Joined (yyyy-mm-dd):&nbsp;<input type="text" name="Joined"     maxlength="10" size="10" value="<?=$Line1->DateJoined?>" id="Joined">&nbsp;&nbsp;&nbsp;<br />
			<script type="text/javascript">
				Calendar.setup( {
					inputField : "Joined",
					ifFormat   : "%Y-%m-%d"
				});
			</script>

			Chapter: <select name="Chapter">
<?php
			$SQL5 = 'SELECT Chapter_ID FROM Members_Chapter WHERE People_ID = ' . $Rec_ID;
			$Result5 = mysql_query($SQL5, $LinkID);
			$Line5 = mysql_fetch_object($Result5);

			$SQL6 = 'SELECT ID, Description FROM Chapter ORDER BY ID';
			$Result6 = mysql_query($SQL6, $LinkID);
			while ($Line6 = mysql_fetch_object($Result6)) {
				echo ('<option ' . ($Line6->ID == $Line5->Chapter_ID ? 'SELECTED' : '') . ' value="' .$Line6->ID . '">' . $Line6->Description);
			}
?>
	 		</select>&nbsp;&nbsp;&nbsp;<br />

			Free Month?&nbsp;&nbsp;<input type="checkbox" name="freeMonth" value="1"  <?=$Line1->free_month == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;&nbsp;			
			Enrolled in egroup?&nbsp;&nbsp;<input type="checkbox" name="EnrolledElist" value="1"  <?=$Line1->EnrolledElist == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br />

			Membership Status: <select name="MemStatus">
<?php
			$Result = mysql_query('SELECT ID, Description FROM MemberStatus ORDER BY ID', $LinkID);
			while ($Line2 = mysql_fetch_object($Result)) {
				echo ('<option ' . ($Line2->ID == $Line1->MemberStatus_ID ? 'SELECTED' : '') . ' value = "' . $Line2->ID . '">' . $Line2->Description);
			}
?>
			</select>&nbsp;&nbsp;&nbsp;<br />

			Membership Category: <select name="MemType">
<?php
			$Result = mysql_query('SELECT ID, Description FROM MemberType ORDER BY ID', $LinkID);
			while ($Line2 = mysql_fetch_object($Result)) {
				echo ('<option ' . ($Line2->ID == $Line1->MemberType_ID ? 'SELECTED' : '') . ' value="' .$Line2->ID . '">' . $Line2->Description);
			}
?>
	 		</select>&nbsp;&nbsp;&nbsp;<br />

			Fees Good Till Date:  <input type="text" maxlength="10" size="10" value="<?=$Line1->FeesGoodTillDate?>" name="FeesGoodTillDate" id="FeesGoodTillDate">&nbsp;&nbsp;&nbsp;<br />
			<script type="text/javascript">
				Calendar.setup( {
					inputField : "FeesGoodTillDate",
					ifFormat   : "%Y-%m-%d"
				});
			</script>

			Payment Date: <input type="text" maxlength="10" size="10" value="<?=$Line1->PaymentReceived?>" name="PayDate" id="PayDate">&nbsp;&nbsp;&nbsp;<br />
			<script type="text/javascript">
				Calendar.setup( {
					inputField : "PayDate",
					ifFormat   : "%Y-%m-%d"
				});
			</script>

			Payment Method: <select name="PayMethod">
<?php
			$Result = mysql_query('SELECT ID, Description FROM PayMethod ORDER BY ID', $LinkID);
				while ($Line2 = mysql_fetch_object($Result)) {
			echo ('<option ' . ($Line2->ID == $Line1->PayMethod_ID ? 'SELECTED' : '') . ' value="' . $Line2->ID . '">' . $Line2->Description);
			}
?>
			</select>&nbsp;&nbsp;&nbsp;<br />
			</td>
			<td colspan="2"  valign="top" id="Label"><table border="0" align="left" width=100% cellpadding="0" cellspacing="0" bgcolor="lightgrey" bordercolor="#000000">
				<tr>
					<td  valign="center" id="Label">Armazare:&nbsp;<input type="checkbox" name="armazare" value="1"  <?=$Line3->armazare == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br />
					Daga:&nbsp;<input type="checkbox" name="daga" value="1"  <?=$Line3->daga == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br />
					Spada:&nbsp;<input type="checkbox" name="spada" value="1"  <?=$Line3->spada == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br />
					Spada longa:&nbsp;<input type="checkbox" name="spadalonga" value="1"  <?=$Line3->spadalonga == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br />
					Sword & buckler:&nbsp;<input type="checkbox" name="swordbuckler" value="1"  <?=$Line3->swordbuckler == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br />
					Langes Schwert:&nbsp;<input type="checkbox" name="langesschwert" value="1"  <?=$Line3->langesschwert == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br />
					TTAC3:&nbsp;<input type="checkbox" name="ttac3" value="1"  <?=$Line3->ttac3 == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;</td>

					<td  valign="center" id="Label">Pollaxe:&nbsp;<input type="checkbox" name="pollaxe" value="1"  <?=$Line3->pollaxe == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br />
					Spear:&nbsp;<input type="checkbox" name="spear" value="1"  <?=$Line3->spear == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br />
					Armoured combat:&nbsp;<input type="checkbox" name="armouredcombat" value="1"  <?=$Line3->armouredcombat == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br />
					Quarter-staff:&nbsp;<input type="checkbox" name="quarterstaff" value="1"  <?=$Line3->quarterstaff == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br />
					Archery:&nbsp;<input type="checkbox" name="archery" value="1"  <?=$Line3->archery == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br />
					Mounted Combat:&nbsp;<input type="checkbox" name="mountedcombat" value="1"  <?=$Line3->mountedcombat == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br />
					Italian rapier:&nbsp;<input type="checkbox" name="rapier" value="1"  <?=$Line3->rapier == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2"><hr /></td>
				</tr>
				<tr>
					<td id="Label" colspan="2" valign="middle"><div align="center">Armoured Harness (complete):&nbsp;<input type="checkbox" name="ArmouredHarness" value="1"  <?=$Line1->ArmouredHarness == "1" ? "CHECKED" : ""?>></div></td>
				</tr>
				<tr>
					<td colspan="2"><hr /></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				</table></td>
		<tr>
			<td colspan="4"><hr /></td>
		</tr>
		<tr>
			<td id="Label" colspan="2">Rank: <select name="Rank">
<?php
			$Result = mysql_query('SELECT ID, Description FROM Rank ORDER BY ID', $LinkID);
			while ($Line2 = mysql_fetch_object($Result)) {
				echo ('<option ' . ($Line2->ID == $Line4->Rank_ID ? 'SELECTED' : '') . ' value="' .$Line2->ID . '">' . $Line2->Description);
			}
?>			</select></td>
			<td id="Label" colspan="2"><div align="left">&nbsp;&nbsp;&nbsp;Date Achieved: <input type="text" maxlength="10" size="10" value="<?=$Line4->Date?>" name="RankDate" id="RankDate">&nbsp;&nbsp;&nbsp;<br />
			<script type="text/javascript">
				Calendar.setup( {
					inputField : "RankDate",
					ifFormat   : "%Y-%m-%d"
				});
			</script></div></td>
		</tr>
		<tr>
			<td id="Label" colspan="2">Location of Rank Test:&nbsp;<input type="text"  name="RankLoc" maxlength="32" size="16" value="<?=$Line4->Location?>" id="RankLoc"></td>
			<td id="Label" colspan="2" style="vertical-align:middle"><div align="left">&nbsp;&nbsp;&nbsp;Notes on Rank:&nbsp;<textarea name="RankNotes" rows="1" cols="28" wrap="virtual"><?=$Line4->Notes?></textarea>&nbsp;&nbsp;&nbsp;</div></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="lightgrey" id="Label"><div align="center">General non-Training Comments</div></td></tr></table><textarea name="Comments" rows=4 cols=78 wrap="virtual"><?=$Line1->Comments?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="lightgrey" id="Label"><div align="center">General Training Comments</div></td></tr></table><textarea name="TrainingComments" rows=5 cols=78 wrap="virtual"><?=$Line1->TrainingComments?></textarea><br /></td>
		</tr>


		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#A0C544" id="Label"><div align="center">Scholar Training Comments</div></td></tr></table><textarea name="scholar_comm" rows=5 cols=78 wrap="virtual"><?=$Line1->scholar_comments?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#FFF380" id="Label"><div align="center">Scholar (<i>grappling & dagger</i>) Training Comments</div></td></tr></table><textarea name="scholar_gd_comm" rows=5 cols=78 wrap="virtual"><?=$Line1->scholar_grap_dag_comments?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="	#EDE275" id="Label"><div align="center">Scholar (<i>sword & buckler</i>) Training Comments</div></td></tr></table><textarea name="scholar_sb_comm" rows=5 cols=78 wrap="virtual"><?=$Line1->scholar_sword_buck_comments?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#EDDA74" id="Label"><div align="center">Scholar (<i>longsword</i>) Training Comments</div></td></tr></table><textarea name="scholar_ls_comm" rows=5 cols=78 wrap="virtual"><?=$Line1->scholar_longsword_comments?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#FDD017" id="Label"><div align="center">Scholar (<i>pole-weapons</i>) Training Comments</div></td></tr></table><textarea name="scholar_pw_comm" rows=5 cols=78 wrap="virtual"><?=$Line1->scholar_poleweapons_comments?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#EAC117" id="Label"><div align="center">Scholar (<i>armoured combat</i>) Training Comments</div></td></tr></table><textarea name="scholar_ac_comm" rows=5 cols=78 wrap="virtual"><?=$Line1->scholar_armoured_comments?></textarea><br /></td>
		</tr>

		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#AFC7C7" id="Label"><div align="center">Armoured Harness Description</div></td></tr></table><textarea name="ArmouredHarnessDesc" rows=3 cols=78 wrap="virtual"><?=$Line1->ArmouredHarnessDescription?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#C48189" id="Label"><div align="center">Unarmoured Harness Description</div></td></tr></table><textarea name="UnarmouredHarnessDesc" rows=2 cols=78 wrap="virtual"><?=$Line1->UnarmouredHarnessDescription?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="2"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="lightgrey" id="Label"><div align="center">Archery Equipment Description</div></td></tr></table><textarea name="ArcheryDesc" rows=2 cols=37 wrap="virtual"><?=$Line1->ArcheryDescription?></textarea><br /></td>
			<td colspan="2"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="lightgrey" id="Label"><div align="center">TTAC3 Equipment Description</div></td></tr></table><textarea name="TTAC3Desc" rows=2 cols=37 wrap="virtual"><?=$Line1->TTAC3Description?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="2"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="lightgrey" id="Label"><div align="center">Period Garments</div></td></tr></table><textarea name="PeriodGarments" rows=2 cols=37 wrap="virtual"><?=$Line1->PeriodGarments?></textarea><br /></td>
			<td colspan="2"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#C11B17" id="Label"><div align="center"><font color="white">Injury Report</font></div></td></tr></table><textarea name="InjuryReport" rows=2 cols=37 wrap="virtual"><?=$Line1->InjuryReport?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#C48189" id="Label"><div align="center">Blazon</div></td></tr></table><textarea name="Blazon" rows="6" cols=78 wrap="virtual"><?=$Line1->Blazon?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><input type="hidden" name="School" value="AEMMA"><input type="hidden" name="ID" value="<?=$Rec_ID?>"><input type="hidden" name="State" value="Member<?=$State?>"><input type="Submit" value="Save Membership Information"><br />&nbsp;</td>
		</tr>
		</table>
	</form>
</body>
</html>

<?php

} //End Function MemberShow

// Main Loop

if ($_SESSION["RoleID"] < 3) 
	{
	?>
	<html>
	<head>
	   <link rel="stylesheet" href="main.css" type="text/css">
	</head>
	<body align="center" valign="top" bgcolor="white">
	<p>ERROR: You do not have the necessary permissions to view / edit AEMMA membership data.</p>
	</body>
	</html>
	<?
        }
else
	{

	// The main loop.  Call functions based on the value of $_POST["state"], which gets set
	// via a hidden INPUT TYPE, or through URL parameters called by NavBar Click event.

		$Rec_ID = '';
		if (isset($_GET['ID']))		{ $Rec_ID = $_GET['ID']; }
		if (isset($_POST['ID']))	{ $Rec_ID = $_POST['ID']; }

		$State = '';
		if (isset($_GET['State']))	{ $State = $_GET['State']; }
		if (isset($_POST['State']))	{ $State = $_POST['State']; }

		$school = '';
		if (isset($_GET['SCH']))	{ $school = $_GET['SCH']; }

		$LinkID = dbConnect($DB);

		switch($State) 
			{
			case 'Status':
				phpinfo();
				break;

			case 'Create':
			case 'Update':
				MemberShow($LinkID, $State, $Rec_ID);
				break;

			case 'MemberUpdate':
      			if ($_SESSION["RoleID"] > 3) 
				{
				// Fields for the People Table
				$freeMonth            	= isset($_POST['freeMonth'])           	?  $_POST['freeMonth'] : "";
				$Deceased		= isset($_POST['Deceased'])        	?  $_POST['Deceased'] : "";
				$Arms            	= isset($_POST['Arms'])            	?  $_POST['Arms'] : "";
				$ArmouredHarness	= isset($_POST['ArmouredHarness'])	?  $_POST['ArmouredHarness'] : 0;
				$FirstAid        	= isset($_POST['FirstAid']) 		?  $_POST['FirstAid'] : "";
				$Injury 		= isset($_POST['Injury']) 		?  $_POST['Injury'] : "";
				$PreviousMartial 	= isset($_POST['PreviousMartial']) 	?  $_POST['PreviousMartial'] : "";
				$EnrolledElist 		= isset($_POST['EnrolledElist']) 	?  $_POST['EnrolledElist'] : "";
				$armazare		= isset($_POST['armazare']) 		?  $_POST['armazare'] : "";
				$daga			= isset($_POST['daga']) 		?  $_POST['daga'] : "";
				$spada			= isset($_POST['spada']) 		?  $_POST['spada'] : "";
				$spadalonga		= isset($_POST['spadalonga']) 		?  $_POST['spadalonga'] : "";
				$swordbuckler		= isset($_POST['swordbuckler']) 	?  $_POST['swordbuckler'] : "";
				$pollaxe		= isset($_POST['pollaxe']) 		?  $_POST['pollaxe'] : "";
				$spear			= isset($_POST['spear']) 		?  $_POST['spear'] : "";
				$armouredcombat		= isset($_POST['armouredcombat']) 	?  $_POST['armouredcombat'] : "";
				$quarterstaff		= isset($_POST['quarterstaff']) 	?  $_POST['quarterstaff'] : "";
				$archery		= isset($_POST['archery']) 		?  $_POST['archery'] : "";
				$langesschwert		= isset($_POST['langesschwert']) 	?  $_POST['langesschwert'] : "";
				$mountedcombat		= isset($_POST['mountedcombat']) 	?  $_POST['mountedcombat'] : "";
				$ttac3			= isset($_POST['ttac3']) 		?  $_POST['ttac3'] : "";
				$rapier			= isset($_POST['rapier']) 		?  $_POST['rapier'] : "";
				$Chapter		= isset($_POST['Chapter']) 		?  $_POST['Chapter'] : "";
				$Rank			= isset($_POST['Rank']) 		?  $_POST['Rank'] : "";
				$RankDate		= isset($_POST['RankDate']) 		?  $_POST['RankDate'] : "";
				$RankCurrent		= isset($_POST['RankCurrent']) 		?  $_POST['RankCurrent'] : "";
				$RankLoc		= isset($_POST['RankLoc']) 		?  $_POST['RankLoc'] : "";
				$RankNotes		= isset($_POST['RankNotes']) 		?  $_POST['RankNotes'] : "";

				MemberUpdate($LinkID, $Rec_ID, $_POST['School'], $_POST['FName'], $_POST['MName'], $_POST['LName'], $_POST['Salutation'], $_POST['Protocol'],
					$_POST['Addy1'], $_POST['Addy2'], $_POST['Addy3'], $_POST['City'], $_POST['ProvState'], $_POST['PCZip'], $_POST['Country'],
					$_POST['NumHome'], $_POST['NumOffice'], $_POST['NumFax'], $_POST['NumCell'], $_POST['EMail'], $_POST['Portrait'], $_POST['Shield'], $_POST['EmergName'], $_POST['EmergPhone'],
					$_POST['Job'], $_POST['Gender'], $_POST['TransMode'], $PreviousMartial, $_POST['Spouse'], $_POST['BirthDate'], $Deceased,
					$_POST['DeceasedDate'], $_POST['Interests'], $Arms, $_POST['Source'], $_POST['Blazon'], $_POST['PN'], $_POST['OPN'], $_POST['Degree'], $_POST['Institution'], $_POST['HeardFrom'], $FirstAid, $Injury,
					$_POST['InjuryReport'], $EnrolledElist, $_POST['Joined'], $freeMonth, $_POST['FeesGoodTillDate'],
					$_POST['Medical'], $ArmouredHarness, $_POST['ArmouredHarnessDesc'], $_POST['UnarmouredHarnessDesc'], 
					$_POST['TrainingComments'], $_POST['Comments'], $_POST['PeriodGarments'], $_POST['ArcheryDesc'], $_POST['TTAC3Desc'], $_POST['MemStatus'], $_POST['MemType'], $_POST['PayMethod'], $_POST['PayDate'],
					$_POST['scholar_comm'], $_POST['scholar_gd_comm'], $_POST['scholar_sb_comm'], $_POST['scholar_ls_comm'], $_POST['scholar_pw_comm'], $_POST['scholar_ac_comm']  );

				// Fields for the Martial profile Table
				MartialUpdate($LinkID, $Rec_ID, $armazare, $daga, $spada, $spadalonga, $swordbuckler, $pollaxe, $spear, $armouredcombat, $quarterstaff, $archery, $langesschwert, $mountedcombat, $ttac3, $rapier );

				// Field for the Members Chapter Table
				ChapterUpdate($LinkID, $Rec_ID, $Chapter);

				// Field for the Members Rank Table
				RankUpdate($LinkID, $Rec_ID, $Rank, $RankDate, $RankCurrent, $RankLoc, $RankNotes);
				}
			else
				{
				?>
				<html>
				<head>
				<link rel="stylesheet" href="main.css" type="text/css">
				</head>
				<body align="center" valign="top" bgcolor="white">
                		<p>ERROR: You do not have the necessary permissions to edit AEMMA membership data.</p>
        			</body>
				</html>
				<?
				}
				break;

			case 'MemberCreate':
      			if ($_SESSION["RoleID"] > 3) 
				{
				$freeMonth            	= isset($_POST['freeMonth'])           	?  $_POST['freeMonth'] : "";
				$Deceased		= isset($_POST['Deceased']) 		?  $_POST['Deceased'] : "";
				$Arms            	= isset($_POST['Arms'])            	?  $_POST['Arms'] : "";
				$ArmouredHarness	= isset($_POST['ArmouredHarness'])	?  $_POST['ArmouredHarness'] : 0;
				$FirstAid        	= isset($_POST['FirstAid']) 		?  $_POST['FirstAid'] : "";
				$PreviousMartial 	= isset($_POST['PreviousMartial']) 	?  $_POST['PreviousMartial'] : "";
				$EnrolledElist 		= isset($_POST['EnrolledElist']) 	?  $_POST['EnrolledElist'] : "";
				$armazare		= isset($_POST['armazare']) 		?  $_POST['armazare'] : "";
				$daga			= isset($_POST['daga']) 		?  $_POST['daga'] : "";
				$spada			= isset($_POST['spada']) 		?  $_POST['spada'] : "";
				$spadalonga		= isset($_POST['spadalonga']) 		?  $_POST['spadalonga'] : "";
				$swordbuckler		= isset($_POST['swordbuckler']) 	?  $_POST['swordbuckler'] : "";
				$pollaxe		= isset($_POST['pollaxe']) 		?  $_POST['pollaxe'] : "";
				$spear			= isset($_POST['spear']) 		?  $_POST['spear'] : "";
				$armouredcombat		= isset($_POST['armouredcombat']) 	?  $_POST['armouredcombat'] : "";
				$quarterstaff		= isset($_POST['quarterstaff']) 	?  $_POST['quarterstaff'] : "";
				$archery		= isset($_POST['archery']) 		?  $_POST['archery'] : "";
				$langesschwert		= isset($_POST['langesschwert']) 	?  $_POST['langesschwert'] : "";
				$mountedcombat		= isset($_POST['mountedcombat']) 	?  $_POST['mountedcombat'] : "";
				$ttac3			= isset($_POST['ttac3']) 		?  $_POST['ttac3'] : "";
				$rapier			= isset($_POST['rapier']) 		?  $_POST['rapier'] : "";
				$Chapter		= isset($_POST['Chapter']) 		?  $_POST['Chapter'] : "";
//				$Portrait 		= "http://www.aemma.org/images/bio_nophoto.jpg";
//				$Shield 		= "http://www.aemma.org/images/coatofarms/arms_aemma.jpg";


				MemberCreate($LinkID, $Rec_ID, $_POST['School'], $_POST['FName'], $_POST['MName'], $_POST['LName'], $_POST['Salutation'], $_POST['Protocol'],
					$_POST['Addy1'], $_POST['Addy2'], $_POST['Addy3'], $_POST['City'], $_POST['ProvState'], $_POST['PCZip'], $_POST['Country'],
					$_POST['NumHome'], $_POST['NumOffice'], $_POST['NumFax'], $_POST['NumCell'], $_POST['EMail'], $_POST['Portrait'], $_POST['Shield'], $_POST['EmergName'], $_POST['EmergPhone'],
					$_POST['Job'], $_POST['Gender'], $_POST['TransMode'], $PreviousMartial, $_POST['Spouse'], $_POST['BirthDate'], $Deceased,
					$_POST['DeceasedDate'], $_POST['Interests'], $Arms, $_POST['Source'], $_POST['Blazon'], $_POST['PN'], $_POST['OPN'], $_POST['Degree'], $_POST['Institution'], $_POST['HeardFrom'], $FirstAid, $Injury,
					$_POST['InjuryReport'], $EnrolledElist, $_POST['Joined'], $freeMonth, $_POST['FeesGoodTillDate'],
					$_POST['Medical'], $ArmouredHarness, $_POST['ArmouredHarnessDesc'], $_POST['UnarmouredHarnessDesc'], 
					$_POST['Rank'], $_POST['RankDate'], $_POST['RankCurrent'],$_POST['RankLoc'],$_POST['RankNotes'],
					$_POST['TrainingComments'], $_POST['Comments'], $_POST['PeriodGarments'], $_POST['ArcheryDesc'], $_POST['TTAC3Desc'], $_POST['MemStatus'], $_POST['MemType'], $_POST['PayMethod'], $_POST['PayDate'],
					$_POST['scholar_comm'], $_POST['scholar_gd_comm'], $_POST['scholar_sb_comm'], $_POST['scholar_ls_comm'], $_POST['scholar_pw_comm'], $_POST['scholar_ac_comm'],

					// Fields for the Martial profile Table
				
					$armazare, $daga, $spada, $spadalonga, $swordbuckler, $pollaxe, $spear, $armouredcombat, $quarterstaff, $archery, $langesschwert, $mountedcombat, $ttac3, $rapier, 

					// Field for the Members Chapter Table

					$Chapter);
				}
			else
				{
				?>
				<html>
				<head>
				<link rel="stylesheet" href="main.css" type="text/css">
				</head>
				<body align="center" valign="top" bgcolor="white">
                		<p>ERROR: You do not have the necessary permissions to create AEMMA membership data.</p>
        			</body>
				</html>
				<?
				}
				break;

			case 'MemberDelete':
				MemberDelete($LinkID, $Rec_ID);
				break;
		}
		dbClose($LinkID);
	} // close off else line#771
?>
