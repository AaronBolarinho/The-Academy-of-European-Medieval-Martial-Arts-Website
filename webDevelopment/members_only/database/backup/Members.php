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
//	mar 21:	adjusted the log record creation by including surname of new record created as the new rec_ID hasn't been created as yet
//	apr 02:	inserted tab order to ease data entry on new record
//

include 'ss_path.stuff';
//session_start();
//include_once 'IDValid.php';
$status_people = 0;
$status_chapter = 0;
Function MemberCreate($LinkID, $Rec_ID, $School, $FName, $MName, $LName, $Salutation, $Protocol, $Addy1, $Addy2, $Addy3, $City, $ProvState, $PCZip, $Country,
			$NumHome, $NumOffice, $NumFax, $NumCell, $EMail, $Portrait, $Shield, $EmergName, $EmergPhone, $Job, $Gender, $TransMode, $PreviousMartial, $Spouse, $BirthDate, $Deceased,
			$DeceasedDate, $Interests, $Arms, $Source, $Blazon, $PN, $OPN, $Degree, $Institution, $HeardFrom, $FirstAid, $Injury, $InjuryReport, $EnrolledElist, $Joined, $freeMonth, $FeesGoodTillDate,
			$Medical, $ArmouredHarness, $ArmouredHarnessDesc, $UnarmouredHarnessDesc, $Rank, $RankDate, $RankCurrent, $RankLoc, $RankNotes, $TrainingComments, $Comments, $PeriodGarments, $ArcheryDesc, $MemStatus, $MemType, $PayMethod, $PayDate,
			$scholar_comm, $scholar_gd_comm, $scholar_sb_comm, $scholar_ls_comm, $scholar_pw_comm, $scholar_ac_comm,
			$armazare, $daga, $spada, $spadalonga, $swordbuckler, $pollaxe, $spear, $armouredcombat, $quarterstaff, $archery, $langesschwert, $mountedcombat, $rapier, $Chapter) 
{
	// We create a blank record then pass through to the MemberUpdate to complete the process.
	$SQL    = 'INSERT INTO People VALUES ()';
	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) {
		$Rec_ID = mysql_insert_id($LinkID);
		$status_people = 1;
		MemberUpdate($LinkID, $Rec_ID, $School, $FName, $MName, $LName, $Salutation, $Protocol, $Addy1, $Addy2, $Addy3, $City, $ProvState, $PCZip, $Country,
			$NumHome, $NumOffice, $NumFax, $NumCell, $EMail, $Portrait, $Shield, $EmergName, $EmergPhone, $Job, $Gender, $TransMode, $PreviousMartial, $Spouse, $BirthDate, $Deceased,
			$DeceasedDate, $Interests, $Arms, $Source, $Blazon, $PN, $OPN, $Degree, $Institution, $HeardFrom, $FirstAid, $Injury, $InjuryReport, $EnrolledElist, $Joined, $freeMonth, $FeesGoodTillDate,
			$Medical, $ArmouredHarness, $ArmouredHarnessDesc, $UnarmouredHarnessDesc, $TrainingComments, $Comments, $PeriodGarments, $ArcheryDesc, $MemStatus, $MemType, $PayMethod, $PayDate,
			$scholar_comm, $scholar_gd_comm, $scholar_sb_comm, $scholar_ls_comm, $scholar_pw_comm, $scholar_ac_comm);
	} else {
		echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Create Membership Record Status (Table : People)<br />new member record ID# "'.$Rec_ID.'" could <b>NOT</b> be inserted.<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
	}

	$SQL    = 'INSERT INTO Members_Chapter VALUES ('.$Rec_ID.','.$Chapter.',1)';
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
		$RankCurrent = 1;
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
	$init_rapier = 0;

	$SQL    = 'INSERT INTO Members_Martial VALUES ('.$Rec_ID.','.$init_armazare.','.$init_daga.','.$init_spada.','.$init_spadalonga.','.$init_swordbuckler.','.$init_pollaxe.','.$init_spear.','.$init_armouredcombat.','.$init_quarterstaff.','.$init_archery.','.$init_langesschwert.','.$init_mountedcombat.','.$init_rapier.' )';
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
			$Medical, $ArmouredHarness, $ArmouredHarnessDesc, $UnarmouredHarnessDesc, $TrainingComments, $Comments, $PeriodGarments, $ArcheryDesc, $MemStatus, $MemType, $PayMethod, $PayDate,
			$scholar_comm, $scholar_gd_comm, $scholar_sb_comm, $scholar_ls_comm, $scholar_pw_comm, $scholar_ac_comm ) 
{
//	Se set default values.  Parameters passed with GET and POST are left blank if defaulted,
//	so we have to explicitly choose the default values - just to be safe. Set blank fields to Null.
	if ($FName == '')			{ $FName = "'".Null."'"; }			else { $FName = "'" . addslashes($FName) . "'"; }
	if ($MName == '')			{ $MName = "'".Null."'"; }			else { $MName = "'" . addslashes($MName) . "'"; }
	if ($LName == '')			{ $LName = "'".Null."'"; }			else { $LName = "'" . addslashes($LName) . "'"; }
	if ($Salutation == '')			{ $Salutation = "'".Null."'"; }			else { $Salutation = "'" . addslashes($Salutation) . "'"; }
	if ($Protocol == '')			{ $Protocol = "'".Null."'"; }			else { $Protocol = "'" . addslashes($Protocol) . "'"; }
	if ($Addy1 == '')			{ $Addy1 = "'".Null."'"; }			else { $Addy1 = "'" . addslashes($Addy1) . "'"; }
	if ($Addy2 == '')			{ $Addy2 = "'".Null."'"; }			else { $Addy2 = "'" . addslashes($Addy2) . "'"; }
	if ($Addy3 == '')			{ $Addy3 = "'".Null."'"; }			else { $Addy3 = "'" . addslashes($Addy3) . "'"; }
	if ($City == '')			{ $City = "'".Null."'"; }			else { $City = "'" . addslashes($City) . "'"; }
	if ($ProvState == '')			{ $ProvState = "'".Null."'"; }			else { $ProvState = "'" . addslashes($ProvState) . "'"; }
	if ($PCZip == '')			{ $PCZip = "'".Null."'"; }			else { $PCZip = "'" . addslashes($PCZip) . "'"; }
	if ($Country == '')			{ $Country = "'".Null."'"; }			else { $Country = "'" . addslashes($Country) . "'"; }
	if ($School == '')			{ $School = 'AEMMA'; }
	if ($NumHome == '')			{ $NumHome = "'".Null."'"; }			else { $NumHome = "'" . addslashes($NumHome) . "'"; }
	if ($NumOffice == '')			{ $NumOffice = "'".Null."'"; }			else { $NumOffice = "'" . addslashes($NumOffice) . "'"; }
	if ($NumFax == '')			{ $NumFax = "'".Null."'"; }			else { $NumFax = "'" . addslashes($NumFax) . "'"; }
	if ($NumCell == '')			{ $NumCell = "'".Null."'"; }			else { $NumCell = "'" . addslashes($NumCell) . "'"; }
	if ($EMail == '')			{ $EMail = "'".Null."'"; }			else { $EMail = "'" . addslashes($EMail) . "'"; }
//	if ($Portrait == '')			{ $Portrait = "'".Null."'"; }	 		else { $Portrait = "'" . addslashes($Portrait) . "'"; }
//	if ($Shield == '')			{ $Shield = "'".Null."'"; }			else { $Shield = "'" . addslashes($Shield) . "'"; }
	if ($Portrait == '')			{ $Portrait = 'http://www.aemma.org/images/bio_photos/bio_noPhotoDbase.jpg'; }
	if ($Shield == '')			{ $Shield = 'http://www.aemma.org/arms/a/aemma_80.jpg'; }
	if ($EmergName == '')			{ $EmergName = "'".Null."'"; }			else { $EmergName = "'" . addslashes($EmergName) . "'"; }
	if ($EmergPhone == '')			{ $EmergPhone = "'".Null."'"; }			else { $EmergPhone = "'" . addslashes($EmergPhone) . "'"; }
	if ($Job == '')				{ $Job = "'".Null."'"; }			else { $Job = "'" . addslashes($Job) . "'"; }
	if ($Gender == '')			{ $Gender = "'".Null."'"; }			else { $Gender = "'" . addslashes($Gender) . "'"; }
	if ($TransMode == '')			{ $TransMode = 0; }
	if ($PreviousMartial == '')		{ $PreviousMartial = 0; }
	if ($Spouse == '')			{ $Spouse = "'".Null."'"; }			else { $Spouse = "'" . addslashes($Spouse) . "'"; }
	if ($BirthDate == '')			{ $BirthDate = "'".Null."'"; }			else { $BirthDate = "'" . addslashes($BirthDate) . "'"; }
	if ($Deceased == '')			{ $Deceased = 0; }
	if ($DeceasedDate == '')		{ $DeceasedDate = "'".Null."'"; }		else { $DeceasedDate = "'" . addslashes($DeceasedDate) . "'"; }
	if ($Interests == '')			{ $Interests = "'".Null."'"; }			else { $Interests = "'" . addslashes($Interests) . "'"; }
	if ($Arms == '')			{ $Arms = 0; }
	if ($Source == '')			{ $Source = "'".Null."'"; }			else { $Source = "'" . addslashes($Source) . "'"; }
	if ($Blazon == '')			{ $Blazon = "'".Null."'"; }			else { $Blazon = "'" . addslashes($Blazon) . "'"; }
	if ($PN == '')				{ $PN = "'".Null."'"; }				else { $PN = "'" . addslashes($PN) . "'"; }
	if ($OPN == '')				{ $OPN = "'".Null."'"; }			else { $OPN = "'" . addslashes($OPN) . "'"; }
	if ($Degree == '')			{ $Degree = "'".Null."'"; }			else { $Degree = "'" . addslashes($Degree) . "'"; }
	if ($Institution == '')			{ $Institution = "'".Null."'"; }		else { $Institution = "'" . addslashes($Institution) . "'"; }
	if ($FirstAid == '')			{ $FirstAid = 0; }
	if ($Injury == '')			{ $Injury = 0; }
	if ($InjuryReport == '')		{ $InjuryReport = "'".Null."'"; }		else { $InjuryReport = "'" . addslashes($InjuryReport) . "'"; }
	if ($EnrolledElist == '')		{ $EnrolledElist = 0; }
	if ($Joined == '')			{ $Joined = "'".Null."'"; }			else { $Joined = "'" . addslashes($Joined) . "'"; }
	if ($freeMonth == '')			{ $freeMonth = 0; }
	if ($HeardFrom == '')			{ $HeardFrom = "'".Null."'"; }			else { $HeardFrom = "'" . addslashes($HeardFrom) . "'"; }
	if ($FeesGoodTillDate == '')		{ $FeesGoodTillDate = "'".Null."'"; }		else { $FeesGoodTillDate = "'" . addslashes($FeesGoodTillDate) . "'"; }
	if ($Medical == '')			{ $Medical = "'".Null."'"; }			else { $Medical = "'" . addslashes($Medical) . "'"; }
	if ($ArmouredHarness == '')		{ $ArmouredHarness = 0; }
	if ($ArmouredHarnessDesc == '')		{ $ArmouredHarnessDesc = "'".Null."'"; }	else { $ArmouredHarnessDesc = "'" . addslashes($ArmouredHarnessDesc) . "'"; }
	if ($UnarmouredHarnessDesc == '')	{ $UnarmouredHarnessDesc = "'".Null."'"; }	else { $UnarmouredHarnessDesc = "'" . addslashes($UnarmouredHarnessDesc) . "'"; }
	if ($TrainingComments == '')		{ $TrainingComments = "'".Null."'"; }		else { $TrainingComments = "'" . addslashes($TrainingComments) . "'"; }
	if ($Comments == '')			{ $Comments = "'".Null."'"; }			else { $Comments = "'" . addslashes($Comments) . "'"; }
	if ($scholar_comm == '')		{ $scholar_comm = "'".Null."'"; }		else { $scholar_comm = "'" . $scholar_comm . "'"; }
	if ($scholar_gd_comm == '')		{ $scholar_gd_comm = "'".Null."'"; }		else { $scholar_gd_comm = "'" . $scholar_gd_comm . "'"; }
	if ($scholar_sb_comm == '')		{ $scholar_sb_comm = "'".Null."'"; }		else { $scholar_sb_comm = "'" . $scholar_sb_comm . "'"; }
	if ($scholar_ls_comm == '')		{ $scholar_ls_comm = "'".Null."'"; }		else { $scholar_ls_comm = "'" . $scholar_ls_comm . "'"; }
	if ($scholar_pw_comm == '')		{ $scholar_pw_comm = "'".Null."'"; }		else { $scholar_pw_comm = "'" . $scholar_pw_comm . "'"; }
	if ($scholar_ac_comm == '')		{ $scholar_ac_comm = "'".Null."'"; }		else { $scholar_ac_comm = "'" . $scholar_ac_comm . "'"; }
	if ($PeriodGarments == '')		{ $PeriodGarments = "'".Null."'"; }		else { $PeriodGarments = "'" . addslashes($PeriodGarments) . "'"; }
	if ($ArcheryDesc == '')			{ $ArcheryDesc = "'".Null."'"; }		else { $ArcheryDesc = "'" . addslashes($ArcheryDesc) . "'"; }
	if ($MemStatus == '')			{ $MemStatus = 0; }
	if ($MemType == '')			{ $MemType = 0; }
	if ($PayMethod == '')			{ $PayMethod = 0; }
	if ($PayDate == '')			{ $PayDate = "'".Null."'"; }			else { $PayDate = "'" . addslashes($PayDate) . "'"; }

	// build arrays of columns names and values passed in order to determine if anything changed in the record selected
	// if a change has been made, then update the record, if no change, don't upate

	$SQL_CHK = 'SELECT MemberStatus_ID,MemberType_ID,PayMethod_ID,School,FirstName,MiddleInitial,LastName,Salutation,AddressProtocol,
	Address1,Address2,Address3,City,ProvState,PCZip,Country,NumHome,NumOffice,NumFax,NumMobile,EMail,portrait_URL,
	arms_URL,EmergContactName,EmergContactPhone,Occupation,Gender,TransportationMode,PreviousMartial,Spouse,BirthDate,Deceased,
	DeceasedDate,Interests,Armigerous,ArmsSource,Blazon,PostNominals,OtherPNs,AcademicDegree,AcademicInstitution,FirstAidTraining,
	Injury,InjuryReport,EnrolledElist,DateJoined,free_month,HeardFrom,FeesGoodTillDate,PaymentReceived,Medical,ArmouredHarness,
	ArmouredHarnessDescription,UnarmouredHarnessDescription,PeriodGarments,ArcheryDescription,TrainingComments,scholar_comments,scholar_grap_dag_comments,
	scholar_sword_buck_comments,scholar_longsword_comments,scholar_poleweapons_comments,scholar_armoured_comments,Comments ';
	$SQL_CHK .= ' FROM People';
	$SQL_CHK .= '  WHERE Rec_ID = '.$Rec_ID;
	$Result_CHK = mysql_query($SQL_CHK, $LinkID);
	$row = mysql_fetch_object($Result_CHK);

	// assign SELECT column values to php variable in order to build an array
	$rw_MemberStatus_ID = $row->MemberStatus_ID; $rw_MemberType_ID = $row->MemberType_ID; $rw_PayMethod_ID = $row->PayMethod_ID;
	$rw_School = $row->School; $rw_FirstName = $row->FirstName; $rw_MiddleInitial = $row->MiddleInitial; $rw_LastName = $row->LastName;
	$rw_Salutation = $row->Salutation; $rw_AddressProtocol = $row->AddressProtocol; $rw_Address1 = $row->Address1; $rw_Address2 = $row->Address2;
	$rw_Address3 = $row->Address3; $rw_City = $row->City; $rw_ProvState = $row->ProvState; $rw_PCZip = $row->PCZip; $rw_Country = $row->Country;
	$rw_NumHome = $row->NumHome; $rw_NumOffice = $row->NumOffice; $rw_NumFax = $row->NumFax; $rw_NumMobile = $row->NumMobile; $rw_EMail = $row->EMail;
	$rw_portrait_URL = $row->portrait_URL; $rw_arms_URL = $row->arms_URL; $rw_EmergContactName = $row->EmergContactName; $rw_EmergContactPhone = $row->EmergContactPhone;
	$rw_Occupation = $row->Occupation; $rw_Gender = $row->Gender; $rw_TransportationMode = $row->TransportationMode; $rw_PreviousMartial = $row->PreviousMartial;
	$rw_Spouse = $row->Spouse; $rw_BirthDate = $row->BirthDate; $rw_Deceased = $row->Deceased; $rw_DeceasedDate = $row->DeceasedDate; $rw_Interests = $row->Interests;
	$rw_Armigerous = $row->Armigerous; $rw_ArmsSource = $row->ArmsSource; $rw_Blazon = $row->Blazon; $rw_PostNominals = $row->PostNominals;
	$rw_OtherPNs = $row->OtherPNs; $rw_AcademicDegree = $row->AcademicDegree; $rw_AcademicInstitution = $row->AcademicInstitution; $rw_FirstAidTraining = $row->FirstAidTraining;
	$rw_Injury = $row->Injury; $rw_InjuryReport = $row->InjuryReport; $rw_EnrolledElist = $row->EnrolledElist; $rw_DateJoined = $row->DateJoined;
	$rw_free_month = $row->free_month; $rw_HeardFrom = $row->HeardFrom; $rw_FeesGoodTillDate = $row->FeesGoodTillDate; $rw_PaymentReceived = $row->PaymentReceived;
	$rw_Medical = $row->Medical; $rw_ArmouredHarness = $row->ArmouredHarness; $rw_ArmouredHarnessDescription = $row->ArmouredHarnessDescription;
	$rw_PeriodGarments = $row->PeriodGarments; $rw_ArcheryDescription = $row->ArcheryDescription; $rw_TrainingComments = $row->TrainingComments;
	$rw_scholar_comments = $row->scholar_comments; $rw_scholar_grap_dag_comments = $row->scholar_grap_dag_comments;
	$rw_scholar_sword_buck_comments = $row->scholar_sword_buck_comments; $rw_scholar_longsword_comments = $row->scholar_longsword_comments;
	$rw_scholar_poleweapons_comments = $row->scholar_poleweapons_comments; $rw_scholar_armoured_comments = $row->scholar_armoured_comments;
	$rw_Comments = $row->Comments; $rw_UnarmouredHarnessDescription = $row->UnarmouredHarnessDescription;

	// build People table columns array containing the values read from the database
	$array_People_values = array($rw_MemberStatus_ID, $rw_MemberType_ID, $rw_PayMethod_ID,"$rw_School","'".$rw_FirstName."'","'".$rw_MiddleInitial."'","'".$rw_LastName."'","'".$rw_Salutation."'","'".$rw_AddressProtocol."'",
	"'".$rw_Address1."'","'".$rw_Address2."'","'".$rw_Address3."'","'".$rw_City."'","'".$rw_ProvState."'","'".$rw_PCZip."'","'".$rw_Country."'","'".$rw_NumHome."'","'".$rw_NumOffice."'","'".$rw_NumFax."'","'".$rw_NumMobile."'","'".$rw_EMail."'",$rw_portrait_URL,
	$rw_arms_URL,"'".$rw_EmergContactName."'","'".$rw_EmergContactPhone."'","'".$rw_Occupation."'","'".$rw_Gender."'",$rw_TransportationMode,$rw_PreviousMartial,"'".$rw_Spouse."'","'".$rw_BirthDate."'",$rw_Deceased,
	"'".$rw_DeceasedDate."'","'".$rw_Interests."'",$rw_Armigerous,"'".$rw_ArmsSource."'","'".$rw_Blazon."'","'".$rw_PostNominals."'","'".$rw_OtherPNs."'","'".$rw_AcademicDegree."'","'".$rw_AcademicInstitution."'",$rw_FirstAidTraining,
	$rw_Injury,"'".$rw_InjuryReport."'",$rw_EnrolledElist,"'".$rw_DateJoined."'",$rw_free_month,"'".$rw_HeardFrom."'","'".$rw_FeesGoodTillDate."'","'".$rw_PaymentReceived."'","'".$rw_Medical."'",$rw_ArmouredHarness,
	"'".$rw_ArmouredHarnessDescription."'","'".$rw_UnarmouredHarnessDescription."'","'".$rw_PeriodGarments."'","'".$rw_ArcheryDescription."'","'".$rw_TrainingComments."'","'".$rw_scholar_comments."'","'".$rw_scholar_grap_dag_comments."'",
	"'".$rw_scholar_sword_buck_comments."'","'".$rw_scholar_longsword_comments."'","'".$rw_scholar_poleweapons_comments."'","'".$rw_scholar_armoured_comments."'","'".$rw_Comments."'");

	// build arrange of MemberUpdate parameters collected from the Members record form
	$array_MemberUpdate = array($MemStatus,$MemType,$PayMethod,"$School","$FName","$MName","$LName","$Salutation","$Protocol",
	"$Addy1","$Addy2","$Addy3","$City","$ProvState","$PCZip","$Country","$NumHome","$NumOffice","$NumFax","$NumCell","$EMail","$Portrait",
	"$Shield","$EmergName","$EmergPhone","$Job","$Gender",$TransMode,$PreviousMartial,"$Spouse","$BirthDate",$Deceased,
	"$DeceasedDate","$Interests",$Arms,"$Source","$Blazon","$PN","$OPN","$Degree","$Institution",$FirstAid,
	$Injury,"$InjuryReport",$EnrolledElist,"$Joined",$freeMonth,"$HeardFrom","$FeesGoodTillDate","$PayDate",$Medical,$ArmouredHarness,
	"$ArmouredHarnessDes","$UnarmouredHarnessDesc","$PeriodGarments","$ArcheryDesc","$TrainingComments","$scholar_comm","$scholar_gd_comm",
	"$scholar_sb_comm","$scholar_ls_comm","$scholar_pw_comm","$scholar_ac_comm","$Comments");

	// build People table array of column names to be used in confirmation of column(s) updated
	$array_People_colnames = array("MemberStatus_ID","MemberType_ID","PayMethod_ID","School","FirstName","MiddleInitial","LastName","Salutation","AddressProtocol",
	"Address1","Address2","Address3","City","ProvState","PCZip","Country","NumHome","NumOffice","NumFax","NumMobile","EMail","portrait_URL",
	"arms_URL","EmergContactName","EmergContactPhone","Occupation","Gender","TransportationMode","PreviousMartial","Spouse","BirthDate","Deceased",
	"DeceasedDate","Interests","Armigerous","ArmsSource","Blazon","PostNominals","OtherPNs","AcademicDegree","AcademicInstitution","FirstAidTraining",
	"Injury","InjuryReport","EnrolledElist","DateJoined","free_month","HeardFrom","FeesGoodTillDate","PaymentReceived","Medical","ArmouredHarness",
	"ArmouredHarnessDescription","UnarmouredHarnessDescription","PeriodGarments","ArcheryDescription","TrainingComments","scholar_comments","scholar_grap_dag_comments",
	"scholar_sword_buck_comments","scholar_longsword_comments","scholar_poleweapons_comments","scholar_armoured_comments","Comments");

	$array_length = count($array_People_colnames);
	$columns_updated_msg = "Columns changed in record ID# $Rec_ID : ";
	$updated = 0;
	for ($i=0; $i<$array_length; $i++)
		{
		// test the condition of '' against Null because there is an annoying situation whereby Null in SQL is NOT the same as Null in PHP!!
		//
		if ($array_People_values[$i] <> $array_MemberUpdate[$i] && ($array_People_values[$i] <> '' && $array_MemberUpdate[$i] <> Null))
			{
			$columns_updated_msg .= $array_People_colnames[$i] . ", ";
			$updated = 1;
			}
		}
	if ($updated)
		{
		// certain columns in record in People have been changed, therefore, update the record
		// if no changes detected, do not update record
		//
		$columns_updated_msg = substr($columns_updated_msg,0,-2);

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
		$SQL .= 'TrainingComments		= ' . $TrainingComments . ', ';
		$SQL .= 'scholar_comments		= ' . $scholar_comm . ', ';
		$SQL .= 'scholar_grap_dag_comments	= ' . $scholar_gd_comm . ', ';
		$SQL .= 'scholar_sword_buck_comments	= ' . $scholar_sb_comm . ', ';
		$SQL .= 'scholar_longsword_comments	= ' . $scholar_ls_comm . ', ';
		$SQL .= 'scholar_poleweapons_comments	= ' . $scholar_pw_comm . ', ';
		$SQL .= 'scholar_armoured_comments	= ' . $scholar_ac_comm . ', ';
		$SQL .= 'Comments	 		= ' . $Comments . ' ';
		$SQL .= 'WHERE Rec_ID = ' . $Rec_ID;

		$Result = mysql_query($SQL, $LinkID);
		if (mysql_errno($LinkID) == 0) 
			{
			echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Membership Record Status (Table : People)<br />member record ID# "'.$Rec_ID.'" successfully updated.<br />'.$columns_updated_msg.'<br />');
			echo ('SQL Statement generated:&nbsp;"'.$SQL.'"<br /><br /></div>');
			}
		else	{
			echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Membership Record Status (Table : People)<br />updated member record ID# "'.$Rec_ID.'" could <b>NOT</b> be saved.<br />');
			echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
			echo ('Please try again or select menu option to continue.<br /><br />');
			echo ('If this problem persists, please call your local system administrator.<p><br />');
			echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
			}
		}
} // End Function MemberUpdate


Function ChapterUpdate($LinkID, $Rec_ID, $Chapter) 
{
// Set default values.  Parameters passed with GET and POST are left blank if defaulted,
// so we have to explicitly choose the default values - just to be safe. Set blank fields to Null.
if (!$Chapter) { $Chapter = 1; }

// check if chapter record exists for this record, and if not, then insert
// if it does exist, check if the chapterID has changed and if so, update
//
$SQL_CHK = 'SELECT People_ID, Chapter_ID, Assoc FROM Members_Chapter';
$SQL_CHK .= '  WHERE People_ID = '.$Rec_ID;
$Result_CHK = mysql_query($SQL_CHK, $LinkID);
$row = mysql_fetch_object($Result_CHK);

if (!$row)
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
else
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
			echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Member Chapter Record Status (Table : Members_Chapter)<br />member chapter record ID# "'.$Rec_ID.'" successfully saved.</font><br />');
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

} // End Function ChapterUpdate


Function RankUpdate($LinkID,$Rec_ID,$Rank,$RankDate,$RankCurrent,$RankLoc,$RankNotes) 
{
if ($Rank == '')			{ $Rank = 1; }
if ($RankDate == '')			{ $RankDate = "Null"; }	
if ($RankLoc == '')			{ $RankLoc = "Null"; }		else { $RankLoc = addslashes($RankLoc); }
if ($RankNotes == '')			{ $RankNotes = "Null"; }	else { $RankNotes = addslashes($RankNotes); }
if ($RankCurrent == '')			{ $RankCurrent = 0; }

//echo ('debug:members:413:passed parameters: $Rank="'.$Rank.'", $RankDate="'.$RankDate.'", $RankCurrent="'.$RankCurrent.'", $RankLoc="'.$RankLoc.'", $RankNotes="'.$RankNotes.'"  *****   ');
// determine if there's any changes to the columns, if so, update the table, if not, skip it or if it doesn't exist, then insert it
$SQL_CHK = 'SELECT Rank_ID, Date, Current, Location, Notes FROM Members_Rank';
$SQL_CHK .= '  WHERE People_ID = '.$Rec_ID.' AND Rank_ID = '.$Rank.' AND Current = '.$RankCurrent;
$Result_CHK = mysql_query($SQL_CHK, $LinkID);
$row = mysql_fetch_object($Result_CHK);
//echo ('debug:members:419:selected column values: Rank_ID="'.$row->Rank_ID.'", Date="'.$row->Date.'", Current="'.$row->Current.'", Location="'.$row->Location.'", $Notes="'.$row->Notes.'"');
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

	// Update previous rank information if rank > 1
	if ($Rank > 1)
		{
		$rank_prev = $Rank - 1;
		$SQL  = 'UPDATE Members_Rank SET ';
		$SQL .= 'Current = 0 ';
		$SQL .= 'WHERE People_ID = ' . $Rec_ID . ' AND RANK_ID = '. $rank_prev;
		$Result = mysql_query($SQL, $LinkID);
		if (mysql_errno($LinkID) == 0) 
			{
			echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Member Rank Record Status (Table : Members_Rank)<br />member Rank record ID# "'.$Rec_ID.'" for previous rank has been successfully saved.<br /></font>'); 
			echo ('SQL Statement generated:&nbsp;"'.$SQL.'"<br /><br /></div>');
			}
		else 	{
			echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Member Rank Record Status (Table : Members_Rank)<br />member Rank record ID# "'.$Rec_ID.'" for previous rank could <b>NOT</b> be saved.<br />');
			echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
			echo ('Please try again or select menu option to continue.<br /><br />');
			echo ('If this problem persists, please call your local system administrator.<p><br />');
			echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
			}
		}
	}
else
	{
	// check if there's any changes to the data in the Members_Rank row, if not, exit, if so, update
	if ($row->Rank_ID <> $Rank || $row->Date <> $Date ||$row->Location <> $RankLoc || $row->Notes <> $RankNotes ||$row->Current <> $RankCurrent)
		{
		// build Members_Rank table columns array containing the values read from the database
		$rw_Rank = $row->Rank_ID; $rw_Date = $row->Date; $rw_Location = $row->Location; $rw_Notes = $row->Notes; $rw_Current = $row->Current;
		$array_Members_Rank_values = array($rw_Rank,"$rw_Date",$rw_Current,"$rw_Location","$rw_Notes");

		// build RankUpdate array of values of the parameters passed to the subroutine "RankUpdate"
		$array_RankUpdate_values = array($Rank,"$RankDate",$RankCurrent,"$RankLoc","$RankNotes");

		// build Members_Rank table array of column names to be used in confirmation of column(s) updated
		$array_Rank_colnames = array("Rank_ID","Date","Current","Location","Notes");

		$array_length = count($array_Rank_colnames);
		$columns_updated_msg = "Columns changed in record ID# $Rec_ID : ";
		$updated = 0;
		for ($i=0; $i<$array_length; $i++)
			{
			// test the condition of '' against Null because there is an annoying situation whereby Null in SQL is NOT the same as Null in PHP!!
			//
			if ($array_Members_Rank_values[$i] <> $array_RankUpdate_values[$i])
				{
				$columns_updated_msg .= $array_Rank_colnames[$i] . ", ";
				$updated = 1;
				}
			}
		if ($updated)
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
				echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Member Rank Record Status (Table : Members_Rank)<br />member Rank record ID# "'.$Rec_ID.'" successfully saved.<br />'.$columns_updated_msg.'<br /></font>'); 
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
	}
} // End Function RankUpdate

Function MartialUpdate($LinkID, $Rec_ID, $armazare, $daga, $spada, $spadalonga, $swordbuckler, $pollaxe, $spear, $armouredcombat,
		       $quarterstaff, $archery, $langesschwert, $mountedcombat, $rapier ) 
{
// set default values.  Parameters passed with GET and POST are left blank if defaulted,
// so we have to explicitly choose the default values - just to be safe. Set blank fields to Null.
// setup the martial defaults

if ($armazare == '')		{ $armazare = 0; }
if ($daga == '')		{ $daga = 0; }
if ($spada == '')		{ $spada = 0; }
if ($spadalonga == '')		{ $spadalonga = 0;}
if ($swordbuckler == '')	{ $swordbuckler = 0; }
if ($pollaxe == '')		{ $pollaxe = 0; }
if ($spear == '')		{ $spear = 0; }
if ($armouredcombat == '')	{ $armouredcombat = 0; }
if ($quarterstaff == '')	{ $quarterstaff = 0; }
if ($archery == '')		{ $archery = 0; }
if ($langesschwert == '')	{ $langesschwert = 0; }
if ($mountedcombat == '')	{ $mountedcombat = 0; }
if ($rapier == '')		{ $rapier = 0; }

// determine if there's any changes to the columns, if so, update the table, if not, skip it or if it doesn't exist, then insert it
$SQL_CHK = 'SELECT armazare, daga, spada, spadalonga, swordbuckler, pollaxe, spear, armouredcombat, quarterstaff, archery, langesschwert, mountedcombat, rapier ';
$SQL_CHK .= ' FROM Members_Martial';
$SQL_CHK .= '  WHERE People_ID = '.$Rec_ID;
$Result_CHK = mysql_query($SQL_CHK, $LinkID);
$row = mysql_fetch_object($Result_CHK);
if (!$row)
	{ 
	// the row doesn't exist, therefore, it must be an insertion of a new record
	$SQL    = 'INSERT INTO Members_Martial VALUES ('.$Rec_ID.','.$armazare.','.$daga.','.$spada.','.$spadalonga.','.$swordbuckler.','.$pollaxe.','.$spear.','.$armouredcombat.','.$quarterstaff.','.$archery.','.$langesschwert.','.$mountedcombat.','.$rapier.')';
	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) 
		{
		echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Create Membership Martial Styles Record Status (Table : Members_Martial)<br />new member martial styles record ID# "'.$Rec_ID.'" successfully inserted.<br />');
		echo ('SQL Statement generated:&nbsp;"'.$SQL.'"<br /><br /></div>');
		}
	else 	{
		echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Create Membership Martial Styles Record Status (Table : Members_Martial)<br />new member martial styles record ID# "'.$Rec_ID.'" could <b>NOT</b> be inserted.<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
		}
	}
else
	{
	// check if there's any changes to the data in the Members_Martial row, if not, exit, if so, update
	if ($row->armazare <> $armazare || $row->daga <> $daga ||$row->spada <> $spada || $row->spadalonga <> $spadalonga ||$row->swordbuckler <> $swordbuckler ||
	    $row->pollaxe <> $pollaxe || $row->spear <> $spear ||$row->armouredcombat <> $armouredcombat || $row->quarterstaff <> $quarterstaff ||
	    $row->archery <> $archery || $row->langesschwert <> $langesschwert ||$row->mountedcombat <> $mountedcombat || $row->rapier <> $rapier)
		{
		// build Members_Martial table columns array containing the values read from the database
		$rw_armazare = $row->armazare; $rw_daga = $row->daga; $rw_spada = $row->spada; $rw_spadalonga = $row->spadalonga; $rw_swordbuckler = $row->swordbuckler;
		$rw_pollaxe = $row->pollaxe; $rw_spear = $row->spear; $rw_armouredcombat = $row->armouredcombat; $rw_quarterstaff = $row->quarterstaff; 
		$rw_archery = $row->archery; $rw_langesschwert = $row->langesschwert; $rw_mountedcombat = $row->mountedcombat; $rw_rapier = $row->rapier; 

		$array_Members_Martial_values = array($rw_armazare,$rw_daga,$rw_spada,$rw_spadalonga,$rw_swordbuckle,
		$rw_pollaxe,$rw_spear,$rw_armouredcombat,$rw_quarterstaff,$rw_archery,$rw_langesschwert,$rw_mountedcombat,$rw_rapier);

		// build MartialUpdate array of values of the parameters passed to the subroutine "MartialUpdate"
		$array_MartialUpdate_values = array($armazare,$daga,$spada,$spadalonga,$swordbuckler,$pollaxe,$spear,
		$armouredcombat,$quarterstaff,$archery,$langesschwert,$mountedcombat,$rapier );

		// build Members_Rank table array of column names to be used in confirmation of column(s) updated
		$array_Members_Martial_colnames = array("armazare","daga","spada","spadalonga","swordbuckler","pollaxe","spear",
		"armouredcombat","quarterstaff","archery","langesschwert","mountedcombat","rapier");

		$array_length = count($array_Members_Martial_colnames);
		$columns_updated_msg = "Columns changed in record ID# $Rec_ID : ";
		$updated = 0;
		for ($i=0; $i<$array_length; $i++)
			{
			// test the condition of '' against Null because there is an annoying situation whereby Null in SQL is NOT the same as Null in PHP!!
			//
			if ($array_Members_Martial_values[$i] <> $array_MartialUpdate_values[$i])
				{
				$columns_updated_msg .= $array_Members_Martial_colnames[$i] . ", ";
				$updated = 1;
				}
			}
		if ($updated)
			{
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
			$SQL .= 'rapier			= ' . $rapier . ' ';
			$SQL .= 'WHERE People_ID 	= ' . $Rec_ID;
	
			$Result = mysql_query($SQL, $LinkID);
			if (mysql_errno($LinkID) == 0) {
				echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Member Martial Arts Record Status (Table : Members_Martial)<br />member martial arts record ID# "'.$Rec_ID.'" successfully saved.<br />'.$columns_updated_msg.'<br /></font>');
				echo ('SQL Statement generated:&nbsp;"'.$SQL.'"<br /><br /></div>');
				}
			else	{
				echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Update Member Martial Arts Record Status (Table : Members_Martial)<br />updated member martial arts record ID# "'.$Rec_ID.'"   could <b>NOT</b> be saved.<br />');
				echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
				echo ('Please try again or select menu option to continue.<br /><br />');
				echo ('If this problem persists, please call your local system administrator.<p><br />');
				echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
				}
			}
		}
	}
} // End Function MartialUpdate


Function DeleteRecords($LinkID, $Rec_ID, $table_width) {
echo('
	<table border="0" align="center" width="'.$table_width.'" cellpadding="0" cellspacing="2" bgcolor="lightgrey" bordercolor="#000000">
	<tr><td>');

	// delete record from table: People
	$SQL  =	'DELETE FROM People ';
	$SQL .= 'WHERE Rec_ID = "' .$Rec_ID.'"';
	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) {
		echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Delete Member Record (Table : People)<br />member record ID# "'.$Rec_ID.'" successfully deleted.<br /></font>');
	} else {
		echo ('<font color="#666362">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Delete Record (Table : People)<br />member record ID#'.$Rec_ID.') could <b>NOT</b> be deleted!<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
	}

	// delete record from table: Members_Rank
	$SQL  =	'DELETE FROM Members_Rank ';
	$SQL .= 'WHERE People_ID = "' .$Rec_ID.'"';
	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) {
		echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Delete Member Record (Table : Members_Rank)<br />member record ID# "'.$Rec_ID.'" successfully deleted.<br /></font>');
	} else {
		echo ('<font color="#666362">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Delete Record (Table : Members_Rank)<br />member record ID#'.$Rec_ID.') could <b>NOT</b> be deleted!<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
	}

	// delete record from table: Members_Chapter
	$SQL  =	'DELETE FROM Members_Chapter ';
	$SQL .= 'WHERE People_ID = "' .$Rec_ID.'"';
	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) {
		echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Delete Member Record (Table : Members_Chapter)<br />member record ID# "'.$Rec_ID.'" successfully deleted.<br /></font>');
	} else {
		echo ('<font color="#666362">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Delete Record (Table : Members_Chapter)<br />member record ID#'.$Rec_ID.') could <b>NOT</b> be deleted!<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
	}
	
	// delete record from table: Members_Martial
	$SQL  =	'DELETE FROM Members_Martial ';
	$SQL .= 'WHERE People_ID = "' .$Rec_ID.'"';
	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) {
		echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Delete Member Record (Table : Members_Martial)<br />member record ID# "'.$Rec_ID.'" successfully deleted.<br /></font>');
	} else {
		echo ('<font color="#666362">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: Members.php) '.$school.' Delete Record (Table : Members_Martial)<br />member record ID#'.$Rec_ID.') could <b>NOT</b> be deleted!<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
	}
echo ('<br />&nbsp;<br /></td></tr></table>');
} // End Function DeleteRecords

Function MemberShow($LinkID, $State, $Rec_ID, $school, $uRec_ID, $login_ID, $seclvl, $table_width) {
?>
	<form name="Members" method="post" action="index.php?PGM=Members&State=<?=$State?>&SCH=<?=$school?>&RID=<?=$uRec_ID?>&LGID=<?=$login_ID?>&SECL=<?=$seclvl?>">
	<?php
	$SQL  = 'SELECT P.School, P.FirstName, P.MiddleInitial, P.LastName, P.Salutation,P.AddressProtocol, P.Address1, P.Address2, P.Address3, ';
	$SQL .= '	P.City, P.ProvState, P.PCZip, P.Country, P.NumHome, P.NumOffice, P.NumFax, P.NumMobile, P.EMail, P.portrait_URL, P.arms_URL, ';
	$SQL .= '	P.EmergContactName, P.EmergContactPhone, P.Occupation, P.Gender, P.TransportationMode, P.PreviousMartial, P.Spouse, P.BirthDate, P.Deceased, P.DeceasedDate, ';
	$SQL .= '	P.Interests, P.Armigerous, P.ArmsSource, P.Blazon, P.PostNominals, P.OtherPNs, P.AcademicDegree, P.AcademicInstitution, P.FirstAidTraining, P.Injury, P.InjuryReport, P.EnrolledElist, ';
	$SQL .= '	P.DateJoined, P.free_month, P.HeardFrom, P.FeesGoodTillDate, P.Medical, P.ArmouredHarness, P.ArmouredHarnessDescription, P.UnarmouredHarnessDescription, P.TrainingComments, P.Comments, ';
	$SQL .= '	P.PeriodGarments, P.ArcheryDescription, P.PaymentReceived, P.MemberStatus_ID, P.MemberType_ID, P.PayMethod_ID, L.UserName L_Name, L.People_ID L_ID, ';
	$SQL .= '  P.scholar_comments, P.scholar_grap_dag_comments, P.scholar_sword_buck_comments, P.scholar_longsword_comments, P.scholar_poleweapons_comments, P.scholar_armoured_comments ';
	$SQL .= ' FROM People P LEFT JOIN Login L ON P.Rec_ID = L.ID';
	$SQL .= ' WHERE P.Rec_ID = ' . $Rec_ID*1;
	$Result = mysql_query($SQL, $LinkID);
	$Line1 = mysql_fetch_object($Result);

	$SQL3 = 'SELECT M.armazare, M.daga, M.spada, M.spadalonga, M.swordbuckler, M.pollaxe, M.spear, M.quarterstaff, M.armouredcombat, M.archery, M.langesschwert, M.mountedcombat, M.rapier';
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
	<table border="0" align="center" width="<?=$table_width?>" cellpadding="0" cellspacing="2" bgcolor="lightgrey" bordercolor="#000000">
	<tr>
		<td colspan="4" align="center" valign="center"><table border="1" width="100%"><tr><th align="center"><?=$school?> MEMBER ADMINISTRATION - <?=strtoupper($State);?> : Membership ID# <?=$Rec_ID?></th></tr></table></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Surname:&nbsp;</td>
		<td width="37%"><input type="text" name="LName" maxlength="45" size="22" value="<?=$Line1->LastName?>" tabindex="1"></td>
	<?php
	if ($State == "Create")
		{
		echo ('<td colspan="2" rowspan="9"><div align="center"><img src="http://www.aemma.org/images/bio_photos/bio_noPhotoDbase.jpg" border="1" /></div><br /><input type="text" name="Portrait" maxlength="128" size="30" value="http://www.aemma.org/images/bio_photos/bio_noPhotoDbase.jpg"></td>');
		}
	else
		{
		echo ('<td colspan="2" rowspan="9"><div align="center"><img src="'.$Line1->portrait_URL.'" border="1" /></div><br /><input type="text" name="Portrait" maxlength="128" size="30" value="'.$Line1->portrait_URL.'"></td>');
		}
	?>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">First Name:&nbsp;</td>
		<td width="37%"><input type="text" name="FName" maxlength="25" size="22" value="<?=$Line1->FirstName?>" tabindex="2"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Middle Name:&nbsp;</td>
		<td width="37%"><input type="text" name="MName"  maxlength="20" size="22" value="<?=$Line1->MiddleInitial?>" tabindex="3"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Salutation/Title:&nbsp;</td>
	<?php
	if ($State == "Create")
		{
		echo ('<td width="37%"><input type="text" name="Salutation" maxlength="12" size="22" value="Mr." tabindex="4"></td>');
		}
	else
		{
		echo ('<td width="37%"><input type="text" name="Salutation" maxlength="12" size="22" value="'.$Line1->Salutation.'" tabindex="4"></td>');
		}
	?>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Address 1:&nbsp;</td>
		<td width="37%"><input type="text" name="Addy1" maxlength="64" size="22" value="<?=$Line1->Address1?>" tabindex="5"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Address 2:&nbsp;</td>
		<td width="37%"><input type="text" name="Addy2"  maxlength="64" size="22" value="<?=$Line1->Address2?>" tabindex="6"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Address 3:&nbsp;</td>
		<td width="37%"><input type="text" name="Addy3" maxlength="64" size="22" value="<?=$Line1->Address3?>" tabindex="7"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">City:&nbsp;</td>
		<td width="37%"><input type="text" name="City" maxlength="32" size="22" value="<?=$Line1->City?>" tabindex="8"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Prov/State:&nbsp;</td>
		<td width="37%"><table border="0" align="left" width=90% cellpadding="0" cellspacing="0" bgcolor="lightgrey" bordercolor="#000000">
		<tr>
		<?php
			if ($State == "Create")
				{
				echo ('<td><input type="text" name="ProvState" maxlength="2" size="2" value="ON" tabindex="9"></td>');
				}
			else
				{
				echo ('<td><input type="text" name="ProvState"  maxlength="2" size="2" value="'.$Line1->ProvState.'" tabindex="9"></td>');
				}
		?>
			<td valign="center" id="Label" style="vertical-align:middle;">PC/Zip:&nbsp;</td>
			<td align="left"><input type="text" name="PCZip"  maxlength="12" size="10"  value="<?=$Line1->PCZip?>" tabindex="10"></td>
		</tr></table></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Country:&nbsp;</td>
	<?php
	if ($State == "Create")
		{
		echo ('<td width="37%"><input type="text" name="Country" maxlength="32" size="22" value="Canada" tabindex="11"></td>');
		}
	else
		{
		echo ('<td width="37%"><input type="text" name="Country"    maxlength="32" size="22"  value="'.$Line1->Country.'" tabindex="11"></td>');
		}
	?>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Occupation:&nbsp;</td>
		<td width="37%"><input type="text" name="Job"  maxlength="32" size="22" value="<?=$Line1->Occupation?>" tabindex="22"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Address label:&nbsp;</td>
		<td width="37%"><input type="text" name="Protocol"  maxlength="64" size="22" value="<?=$Line1->AddressProtocol?>" tabindex="12"></td>
		<td valign="center" id="Label" colspan="2" align="left">Birth Date (yyyy-mm-dd):&nbsp;<input type="text" name="BirthDate" maxlength="10" size="10" value="<?=$Line1->BirthDate?>" id="BirthDate" tabindex="23">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Home #:&nbsp;</td>
		<td width="37%"><input type="text" name="NumHome"    maxlength="20" size="22" value="<?=$Line1->NumHome?>" tabindex="13"></td>
		<td valign="center" width="13%" id="Label">Emerg&nbsp;&nbsp;<br />Contact:&nbsp;</td>
		<td width="37%"><input type="text" name="EmergName"  maxlength="64" size="22" value="<?=$Line1->EmergContactName?>" tabindex="24"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Office #:&nbsp;</td>
		<td width="37%"><input type="text" name="NumOffice"  maxlength="20" size="22" value="<?=$Line1->NumOffice?>" tabindex="14"></td>
		<td valign="center" width="13%" id="Label">Emerg&nbsp;&nbsp;<br />Phone:&nbsp;</td>
		<td width="37%"><input type="text" name="EmergPhone"  maxlength="20" size="22" value="<?=$Line1->EmergContactPhone?>" tabindex="25"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Fax #:&nbsp;</td>
		<td width="37%"><input type="text" name="NumFax" maxlength="20" size="22" value="<?=$Line1->NumFax?>" tabindex="15"></td>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Spouse:&nbsp;</td>
		<td width="37%"><input type="text" name="Spouse"  maxlength="32" size="22" value="<?=$Line1->Spouse?>" tabindex="26"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Mobile #:&nbsp;</td>
		<td width="37%"><input type="text" name="NumCell" maxlength="20" size="22" value="<?=$Line1->NumMobile?>" tabindex="16"></td>
		<td valign="center" id="Label" colspan="2">Acad. Degree:&nbsp;<input type="text" name="Degree"  maxlength="64" size="20" value="<?=$Line1->AcademicDegree?>" tabindex="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td width="13%" id="Label" valign="center" style="vertical-align:middle;">E-Mail:&nbsp;</td>
		<td width="37%"><input type="text" name="EMail" maxlength="50" size="22" value="<?=$Line1->EMail?>" tabindex="17"></td>
		<td valign="center" id="Label" colspan="2" style="vertical-align:middle;">Acad. Institution:&nbsp;<input type="text" name="Institution"  maxlength="64" size="20" value="<?=$Line1->AcademicInstitution?>" tabindex="28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Other PN's:&nbsp;</td>
		<td width="37%"><input type="text" name="OPN" maxlength="64" size="22" value="<?=$Line1->OtherPNs?>" tabindex="18"></td>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">PNs:&nbsp;</td>
		<td width="37%"><input type="text" name="PN" maxlength="64" size="22" value="<?=$Line1->PostNominals?>" tabindex="29"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Heard From:&nbsp;</td>
		<td width="37%"><input type="text" name="HeardFrom" maxlength="32" size="22" value="<?=$Line1->HeardFrom?>" tabindex="19"></td>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Interests:&nbsp;</td>
		<td width="37%"><input type="text" name="Interests" maxlength="64" size="22" value="<?=$Line1->Interests?>" tabindex="30"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label" style="vertical-align:middle;">Armigerous:&nbsp;</td>
		<td valign="center" colspan="3"><table border="0" align="left" width="100%" cellpadding="0" cellspacing="0" bgcolor="lightgrey" bordercolor="#000000">
			<tr>
				<td><input type="checkbox" name="Arms" value="1"  <?=$Line1->Armigerous == "1" ? "CHECKED" : ""?> tabindex="20">&nbsp;&nbsp;&nbsp;</td>
				<td valign="center" id="Label" align="left">Source:&nbsp;<input type="text"  name="Source" maxlength="64" size="40" value="<?=$Line1->ArmsSource?>" id="Source" tabindex="21">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr></table></td>
	</tr>
	<tr>
	<?php
	if ($State == "Create")
		{
		echo ('<td colspan="2"><div align="center"><img src="http://www.aemma.org/arms/a/aemma_80.jpg" border="1" /></div><br /><input type="text" name="Shield" maxlength="128" size="30" value="http://www.aemma.org/arms/a/aemma_80.jpg"></td>');
		}
	else
		{
		echo ('<td colspan="2"><div align="center"><img src="'.$Line1->arms_URL.'" border="1" /></div><br /><input type="text" name="Shield" maxlength="128" size="30" value="'.$Line1->arms_URL.'"></td>');
		}
	?>
		<td valign="center" colspan="2"><table border="1" width="100%">
		<tr><td bgcolor="lightgrey" id="Label"><div align="center">Medical Details</div></td></tr>
		<tr><td><textarea name="Medical" rows="6" cols="36" wrap="virtual" maxlength="512" tabindex="31"><?=$Line1->Medical?></textarea></td></tr></table></td>
	</tr>
	<tr>
		<td valign="top" colspan="2" id="Label">Transportation Mode:&nbsp;<select name="TransMode" tabindex="32">
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
				echo ('male:&nbsp;<input type="radio" name="Gender" value="M"  "CHECKED" style="vertical-align:middle;" tabindex="33" >&nbsp;&nbsp;&nbsp;female:&nbsp;<input type="radio" name="Gender" value="F" style="vertical-align:middle;" tabindex="34">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>');
				}
			else
				{
				echo ('male:&nbsp;<input type="radio" name="Gender" value="M" '. ($Line1->Gender == 'M' ? 'CHECKED' : '') .' style="vertical-align:middle;" tabindex="33">&nbsp;&nbsp;&nbsp;female:&nbsp;<input type="radio" name="Gender" value="F" '. ($Line1->Gender == 'F' ? 'CHECKED' : '') .' style="vertical-align:middle;" tabindex="34">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>');
				}
			?>		
	</tr>
	<tr>
		<td valign="center" id="Label" colspan="2">First Aid Training?&nbsp;&nbsp;<input type="checkbox" name="FirstAid" value="1" style="vertical-align:middle;"  <?=$Line1->FirstAidTraining == "1" ? "CHECKED" : ""?> tabindex="35">&nbsp;&nbsp;</td>
		<td id="Label" colspan="2">Deceased:&nbsp;&nbsp;<input type="checkbox" name="Deceased" value="1" style="vertical-align:middle;"  <?=$Line1->Deceased == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;&nbsp;Deceased Date:&nbsp;<input type="text"  name="DeceasedDate" maxlength="10" size="10" value="<?=$Line1->DeceasedDate?>" id="DeceasedDate">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<script type="text/javascript">
				Calendar.setup( {
					inputField : "DeceasedDate",
					ifFormat   : "%Y-%m-%d"
				});
			</script>
	</tr>
	<tr>
		<td valign="top"  colspan="2" id="Label">Previous Martial Arts Experience?&nbsp;&nbsp;<input type="checkbox" name="PreviousMartial" value="1" style="vertical-align:middle;"  <?=$Line1->PreviousMartial == "1" ? "CHECKED" : ""?> tabindex="36">&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td valign="top"  colspan="2" id="Label">Injured While Training @ AEMMA?&nbsp;&nbsp;<input type="checkbox" name="Injury" value="1" style="vertical-align:middle;"  <?=$Line1->Injury == "1" ? "CHECKED" : ""?> tabindex="37">&nbsp;&nbsp;</td>
	</tr>
<!-- the submit button occurs twice on this page, therefore, update one, must update the other -->
	<tr>
<?php
			echo ('<td colspan="4" align="center"><input type="hidden" name="School" value="'.$school.'"><input type="hidden" name="ID" value="'.$Rec_ID.'"><!--<input type="hidden" name="State" value="Member'.$State.'">--><input type="Submit" name="State" value="'.$State.' Membership Record">');
			if ($_SESSION["RoleID"] > 5) 
				{ echo ('<input type="Submit" value="Delete" name="State" style="background:#F778A1">'); }
?>
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
			</b></p>Date Joined (yyyy-mm-dd):&nbsp;<input type="text" name="Joined" maxlength="10" size="10" value="<?=$Line1->DateJoined?>" id="Joined" tabindex="38">&nbsp;&nbsp;&nbsp;<br />
			<script type="text/javascript">
				Calendar.setup( {
					inputField : "Joined",
					ifFormat   : "%Y-%m-%d"
				});
			</script>

			Chapter: <select name="Chapter" tabindex="39">
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

			Free Month?&nbsp;&nbsp;<input type="checkbox" name="freeMonth" value="1" style="vertical-align:middle;"  <?=$Line1->free_month == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;&nbsp;			
			Enrolled in egroup?&nbsp;&nbsp;<input type="checkbox" name="EnrolledElist" value="1" style="vertical-align:middle;"  <?=$Line1->EnrolledElist == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br />

			Membership Status: <select name="MemStatus" tabindex="40">
<?php
			$Result = mysql_query('SELECT ID, Description FROM MemberStatus ORDER BY ID', $LinkID);
			while ($Line2 = mysql_fetch_object($Result)) {
				echo ('<option ' . ($Line2->ID == $Line1->MemberStatus_ID ? 'SELECTED' : '') . ' value = "' . $Line2->ID . '">' . $Line2->Description);
			}
?>
			</select>&nbsp;&nbsp;&nbsp;<br />

			Mem. Category: <select name="MemType" tabindex="41">
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

			Payment Method: <select name="PayMethod" tabindex="42">
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
					<td  valign="center" id="Label">Armazare:&nbsp;<input type="checkbox" name="armazare" value="1"  <?=$Line3->armazare == "1" ? "CHECKED" : ""?> style="vertical-align:middle;" tabindex="43">&nbsp;&nbsp;&nbsp;<br />
					Daga:&nbsp;<input type="checkbox" name="daga" value="1"  <?=$Line3->daga == "1" ? "CHECKED" : ""?> style="vertical-align:middle;" tabindex="44">&nbsp;&nbsp;&nbsp;<br />
					Spada:&nbsp;<input type="checkbox" name="spada" value="1"  <?=$Line3->spada == "1" ? "CHECKED" : ""?> style="vertical-align:middle;" tabindex="45">&nbsp;&nbsp;&nbsp;<br />
					Spada longa:&nbsp;<input type="checkbox" name="spadalonga" value="1"  <?=$Line3->spadalonga == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
					Sword & buckler:&nbsp;<input type="checkbox" name="swordbuckler" value="1"  <?=$Line3->swordbuckler == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
					Langes Schwert:&nbsp;<input type="checkbox" name="langesschwert" value="1"  <?=$Line3->langesschwert == "1" ? "CHECKED" : ""?> style="vertical-align:middle;"><!--&nbsp;&nbsp;&nbsp;<br />
					TTAC3:&nbsp;<input type="checkbox" name="ttac3" value="1"  <?=$Line3->ttac3 == "1" ? "CHECKED" : ""?>>-->&nbsp;&nbsp;&nbsp;</td>

					<td  valign="center" id="Label">Pollaxe:&nbsp;<input type="checkbox" name="pollaxe" value="1"  <?=$Line3->pollaxe == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
					Spear:&nbsp;<input type="checkbox" name="spear" value="1"  <?=$Line3->spear == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
					Armoured combat:&nbsp;<input type="checkbox" name="armouredcombat" value="1"  <?=$Line3->armouredcombat == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
					Quarter-staff:&nbsp;<input type="checkbox" name="quarterstaff" value="1"  <?=$Line3->quarterstaff == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
					Archery:&nbsp;<input type="checkbox" name="archery" value="1"  <?=$Line3->archery == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
					Mounted Combat:&nbsp;<input type="checkbox" name="mountedcombat" value="1"  <?=$Line3->mountedcombat == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
					Italian rapier:&nbsp;<input type="checkbox" name="rapier" value="1"  <?=$Line3->rapier == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2"><hr /></td>
				</tr>
				<tr>
					<td id="Label" colspan="2" valign="middle"><div align="center">Armoured Harness (complete):&nbsp;<input type="checkbox" name="ArmouredHarness" value="1" style="vertical-align:middle;"  <?=$Line1->ArmouredHarness == "1" ? "CHECKED" : ""?>></div></td>
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
			<td id="Label" colspan="2">Rank: <select name="Rank" tabindex="46">
<?php
			$Result = mysql_query('SELECT ID, Description FROM Rank ORDER BY ID', $LinkID);
			while ($Line2 = mysql_fetch_object($Result)) {
				echo ('<option ' . ($Line2->ID == $Line4->Rank_ID ? 'SELECTED' : '') . ' value="' .$Line2->ID . '">' . $Line2->Description);
			}
?>			</select></td>
			<td id="Label" colspan="2"><div align="left">&nbsp;&nbsp;&nbsp;Date Achieved: <input type="text" maxlength="10" size="10" value="<?=$Line4->Date?>" name="RankDate" id="RankDate" tabindex="48"><input type="hidden" name="RankCurrent" value="<?=$Line4->Current?>">&nbsp;&nbsp;&nbsp;<br />
			<script type="text/javascript">
				Calendar.setup( {
					inputField : "RankDate",
					ifFormat   : "%Y-%m-%d"
				});
			</script></div></td>
		</tr>
		<tr>
			<td id="Label" colspan="2">Location of Rank Test:&nbsp;<input type="text"  name="RankLoc" maxlength="32" size="16" value="<?=$Line4->Location?>" id="RankLoc" tabindex="47"></td>
			<td id="Label" colspan="2"><div align="left">&nbsp;&nbsp;&nbsp;Notes on Rank:&nbsp;<textarea name="RankNotes" rows="1" cols="28" wrap="virtual" style="vertical-align:middle"><?=$Line4->Notes?></textarea>&nbsp;&nbsp;&nbsp;</div></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="lightgrey" id="Label"><div align="center">General non-Training Comments</div></td></tr></table><textarea name="Comments" rows="4" cols="78" wrap="virtual"><?=$Line1->Comments?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="lightgrey" id="Label"><div align="center">General Training Comments</div></td></tr></table><textarea name="TrainingComments" rows="5" cols="78" wrap="virtual"><?=$Line1->TrainingComments?></textarea><br /></td>
		</tr>


		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#A0C544" id="Label"><div align="center">Scholar Training Comments</div></td></tr></table><textarea name="scholar_comm" rows="5" cols="78" wrap="virtual"><?=$Line1->scholar_comments?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#FFF380" id="Label"><div align="center">Scholar (<i>grappling & dagger</i>) Training Comments</div></td></tr></table><textarea name="scholar_gd_comm" rows="5" cols="78" wrap="virtual"><?=$Line1->scholar_grap_dag_comments?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="	#EDE275" id="Label"><div align="center">Scholar (<i>sword & buckler</i>) Training Comments</div></td></tr></table><textarea name="scholar_sb_comm" rows="5" cols="78" wrap="virtual"><?=$Line1->scholar_sword_buck_comments?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#EDDA74" id="Label"><div align="center">Scholar (<i>longsword</i>) Training Comments</div></td></tr></table><textarea name="scholar_ls_comm" rows="5" cols="78" wrap="virtual"><?=$Line1->scholar_longsword_comments?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#FDD017" id="Label"><div align="center">Scholar (<i>pole-weapons</i>) Training Comments</div></td></tr></table><textarea name="scholar_pw_comm" rows="5" cols="78" wrap="virtual"><?=$Line1->scholar_poleweapons_comments?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#EAC117" id="Label"><div align="center">Scholar (<i>armoured combat</i>) Training Comments</div></td></tr></table><textarea name="scholar_ac_comm" rows="5" cols="78" wrap="virtual"><?=$Line1->scholar_armoured_comments?></textarea><br /></td>
		</tr>

		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#AFC7C7" id="Label"><div align="center">Armoured Harness Description</div></td></tr></table><textarea name="ArmouredHarnessDesc" rows="3" cols="78" wrap="virtual"><?=$Line1->ArmouredHarnessDescription?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#C48189" id="Label"><div align="center">Unarmoured Harness Description</div></td></tr></table><textarea name="UnarmouredHarnessDesc" rows="2" cols="78" wrap="virtual"><?=$Line1->UnarmouredHarnessDescription?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="2"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="lightgrey" id="Label"><div align="center">Archery Equipment Description</div></td></tr></table><textarea name="ArcheryDesc" rows="2" cols="37" wrap="virtual"><?=$Line1->ArcheryDescription?></textarea><br /></td>
			<td colspan="2"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="lightgrey" id="Label"><div align="center">Period Garments</div></td></tr></table><textarea name="PeriodGarments" rows="2" cols="37" wrap="virtual"><?=$Line1->PeriodGarments?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#C11B17" id="Label"><div align="center"><font color="white">Injury Report</font></div></td></tr></table><textarea name="InjuryReport" rows="2" cols="78" wrap="virtual"><?=$Line1->InjuryReport?></textarea><br /></td>
		</tr>
		<tr>
			<td colspan="4"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#C48189" id="Label"><div align="center">Blazon</div></td></tr></table><textarea name="Blazon" rows="6" cols="78" wrap="virtual"><?=$Line1->Blazon?></textarea><br /></td>
		</tr>
		<tr>
<?php
			echo ('<td colspan="4" align="center"><input type="hidden" name="School" value="'.$school.'"><input type="hidden" name="ID" value="'.$Rec_ID.'"><!--<input type="hidden" name="State" value="Member'.$State.'">--><input type="Submit" name="State" value="'.$State.' Membership Record">');
			if ($_SESSION["RoleID"] > 5) 
				{ echo ('<input type="Submit" value="Delete" name="State" style="background:#F778A1">'); }
?>
			<br />&nbsp;</td>
		</tr>
		</table>
	</form>

<?php

} //End Function MemberShow


// Main Loop
if ($seclvl < 3) 
	{
	echo ('<script type="text/JavaScript">');
	echo ('parent.location.href="index.php?PGM=Begin&MSG=ERROR: You do not have the necessary permissions to view / edit AEMMA membership data!"');
	echo ('</script>');
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

	$LinkID = dbConnect($DB);
	switch($State) 
		{
		case 'Status':
			phpinfo();
			break;
		case 'Create':
		case 'Update':
			MemberShow($LinkID, $State, $Rec_ID, $school, $uRec_ID, $login_ID, $seclvl, $table_width);
			break;
		case 'Update Membership Record':
 			if ($_SESSION["RoleID"] > 3) 
				{
				// Fields for the People Table
				$freeMonth            	= isset($_POST['freeMonth'])           	?  $_POST['freeMonth'] : 0;
				$Deceased		= isset($_POST['Deceased'])        	?  $_POST['Deceased'] : 0;
				$Arms            	= isset($_POST['Arms'])            	?  $_POST['Arms'] : 0;
				$ArmouredHarness	= isset($_POST['ArmouredHarness'])	?  $_POST['ArmouredHarness'] : 0;
				$FirstAid        	= isset($_POST['FirstAid']) 		?  $_POST['FirstAid'] : 0;
				$Injury 		= isset($_POST['Injury']) 		?  $_POST['Injury'] : "";
				$PreviousMartial 	= isset($_POST['PreviousMartial']) 	?  $_POST['PreviousMartial'] : 0;
				$EnrolledElist 		= isset($_POST['EnrolledElist']) 	?  $_POST['EnrolledElist'] : 0;
				$armazare		= isset($_POST['armazare']) 		?  $_POST['armazare'] : 0;
				$daga			= isset($_POST['daga']) 		?  $_POST['daga'] : 0;
				$spada			= isset($_POST['spada']) 		?  $_POST['spada'] : 0;
				$spadalonga		= isset($_POST['spadalonga']) 		?  $_POST['spadalonga'] : 0;
				$swordbuckler		= isset($_POST['swordbuckler']) 	?  $_POST['swordbuckler'] : 0;
				$pollaxe		= isset($_POST['pollaxe']) 		?  $_POST['pollaxe'] : 0;
				$spear			= isset($_POST['spear']) 		?  $_POST['spear'] : 0;
				$armouredcombat		= isset($_POST['armouredcombat']) 	?  $_POST['armouredcombat'] : 0;
				$quarterstaff		= isset($_POST['quarterstaff']) 	?  $_POST['quarterstaff'] : 0;
				$archery		= isset($_POST['archery']) 		?  $_POST['archery'] : 0;
				$langesschwert		= isset($_POST['langesschwert']) 	?  $_POST['langesschwert'] : 0;
				$mountedcombat		= isset($_POST['mountedcombat']) 	?  $_POST['mountedcombat'] : 0;
				$rapier			= isset($_POST['rapier']) 		?  $_POST['rapier'] : 0;
				$Chapter		= isset($_POST['Chapter']) 		?  $_POST['Chapter'] : 1;
				$Rank			= isset($_POST['Rank']) 		?  $_POST['Rank'] : 1;
				$RankDate		= isset($_POST['RankDate']) 		?  $_POST['RankDate'] : "";
				$RankCurrent		= isset($_POST['RankCurrent']) 		?  $_POST['RankCurrent'] : 1;
				$RankLoc		= isset($_POST['RankLoc']) 		?  $_POST['RankLoc'] : "";
				$RankNotes		= isset($_POST['RankNotes']) 		?  $_POST['RankNotes'] : "";

				MemberUpdate($LinkID, $Rec_ID, $_POST['School'], $_POST['FName'], $_POST['MName'], $_POST['LName'], $_POST['Salutation'], $_POST['Protocol'],
					$_POST['Addy1'], $_POST['Addy2'], $_POST['Addy3'], $_POST['City'], $_POST['ProvState'], $_POST['PCZip'], $_POST['Country'],
					$_POST['NumHome'], $_POST['NumOffice'], $_POST['NumFax'], $_POST['NumCell'], $_POST['EMail'], $_POST['Portrait'], $_POST['Shield'], $_POST['EmergName'], $_POST['EmergPhone'],
					$_POST['Job'], $_POST['Gender'], $_POST['TransMode'], $PreviousMartial, $_POST['Spouse'], $_POST['BirthDate'], $Deceased,
					$_POST['DeceasedDate'], $_POST['Interests'], $Arms, $_POST['Source'], $_POST['Blazon'], $_POST['PN'], $_POST['OPN'], $_POST['Degree'], $_POST['Institution'], $_POST['HeardFrom'], $FirstAid, $Injury,
					$_POST['InjuryReport'], $EnrolledElist, $_POST['Joined'], $freeMonth, $_POST['FeesGoodTillDate'],
					$_POST['Medical'], $ArmouredHarness, $_POST['ArmouredHarnessDesc'], $_POST['UnarmouredHarnessDesc'], 
					$_POST['TrainingComments'], $_POST['Comments'], $_POST['PeriodGarments'], $_POST['ArcheryDesc'], $_POST['MemStatus'], $_POST['MemType'], $_POST['PayMethod'], $_POST['PayDate'],
					$_POST['scholar_comm'], $_POST['scholar_gd_comm'], $_POST['scholar_sb_comm'], $_POST['scholar_ls_comm'], $_POST['scholar_pw_comm'], $_POST['scholar_ac_comm']  );

				// Fields for the Martial profile Table
				MartialUpdate($LinkID, $Rec_ID, $armazare, $daga, $spada, $spadalonga, $swordbuckler, $pollaxe, $spear, $armouredcombat,
					      $quarterstaff, $archery, $langesschwert, $mountedcombat, $rapier );

				// Field for the Members Chapter Table
				ChapterUpdate($LinkID, $Rec_ID, $Chapter);

				// Field for the Members Rank Table
				RankUpdate($LinkID, $Rec_ID, $Rank, $RankDate, $RankCurrent, $RankLoc, $RankNotes);

				// record update to the record in the login log table
				include 'function_LogAccess.php';
				$resource = "updated record ID: $Rec_ID";
				LogAccess($LinkID, $uRec_ID, $login_ID, $seclvl, $resource); 

				}
			else
				{
				echo ('<script type="text/JavaScript">');
				echo ('parent.location.href="index.php?PGM=Begin&MSG=ERROR: You do not have the necessary permissions to edit AEMMA membership data!"');
				echo ('</script>');
				}
				break;

			case 'Create Membership Record':
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
					$_POST['TrainingComments'], $_POST['Comments'], $_POST['PeriodGarments'], $_POST['ArcheryDesc'], $_POST['MemStatus'], $_POST['MemType'], $_POST['PayMethod'], $_POST['PayDate'],
					$_POST['scholar_comm'], $_POST['scholar_gd_comm'], $_POST['scholar_sb_comm'], $_POST['scholar_ls_comm'], $_POST['scholar_pw_comm'], $_POST['scholar_ac_comm'],

					// Fields for the Martial profile Table
				
					$armazare, $daga, $spada, $spadalonga, $swordbuckler, $pollaxe, $spear, $armouredcombat, $quarterstaff, $archery, $langesschwert, $mountedcombat, $rapier, 

					// Field for the Members Chapter Table

					$Chapter);
				include 'function_LogAccess.php';
				$resource = "created new record: ".$_POST['LName'];
				LogAccess($LinkID, $uRec_ID, $login_ID, $seclvl, $resource); 
				}
			else
				{
				echo ('<script type="text/JavaScript">');
				echo ('parent.location.href="index.php?PGM=Begin&MSG=ERROR: You do not have the necessary permissions to create AEMMA membership data!"');
				echo ('</script>');
 				}
				break;

			case 'Delete':
	      			if ($_SESSION["RoleID"] == 6) // level 6 == database administrator
					{
					include 'function_LogAccess.php';
					$resource = "deleted record: $Rec_ID";
					LogAccess($LinkID, $uRec_ID, $login_ID, $seclvl, $resource); 
					DeleteRecords($LinkID, $Rec_ID,$table_width);
					}
				else
					{
					echo ('<script type="text/JavaScript">');
					echo ('parent.location.href="index.php?PGM=Begin&MSG=ERROR: You do not have the necessary permissions to <b>delete</b> AEMMA membership data!"');
					echo ('</script>');
 					}
				break;
		}
		dbClose($LinkID);
	} // close off else line#771
?>
