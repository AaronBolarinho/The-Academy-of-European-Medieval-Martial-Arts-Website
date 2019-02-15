<?php
	session_start();
	include_once 'IDValid.php';
	include_once 'DB.php';

Function MemberCreate($ID, $FName, $MName, $LName, $Salutation, $AddressProtocol, $Addy1, $Addy2, $Addy3, $City, $ProvState,
			$PCZip, $Country, $NumHome, $NumOffice, $NumFax, $NumCell, $EMail, $Job, $Spouse,
			$Deceased, $DeceasedDate, $Interests, $Arm, $Roll, $PN, $OPN, $Fellow, $HFellow, $FellowYear, $Licentiate, $LicentiateYear, $Comments,
			$Joined, $Refer, $MemYear, $MemStatus, $MemType, $PayMethod, $PayDate,
			$Toronto, $Laurentian, $Ottawa, $BC, $Prairie, $HK) {

// We simply create a blank record then pass through to the MemberUpdate to complete the process.

	$LinkID=dbConnect('heraldry_ca_-_membership');

	$SQL = 'INSERT INTO People VALUES ()';
	$SQL = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) {
		$ID = mysql_insert_id($LinkID);
		mysql_free_result($SQL);
		dbClose($LinkID);
		MemberUpdate($ID, $FName, $MName, $LName, $Salutation, $AddressProtocol, $Addy1, $Addy2, $Addy3, $City, $ProvState,
				$PCZip, $Country, $NumHome, $NumOffice, $NumFax, $NumCell, $EMail, $Job, $Spouse,
				$Deceased, $DeceasedDate, $Interests, $Arm, $Roll, $PN, $OPN, $Fellow, $HFellow, $FellowYear, $Licentiate, $LicentiateYear, $Comments,
				$Joined, $Refer, $MemYear, $MemStatus, $MemType, $PayMethod, $PayDate,
				$Toronto, $Laurentian, $Ottawa, $BC, $Prairie, $HK);
	} else {
		mysql_free_result($SQL);
		dbClose($LinkID);
		echo ('&nbsp;<p>&nbsp;<p>&nbsp;<center>Member(People) information could <B>NOT</B> be saved.<br>');
		echo ('Please try again or select menu option to continue.<br><br>');
		echo ('If this problem persists, please call your local system administrator.<p><br>');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</center>');
	}

} // End Function MemberCreate

Function MemberUpdate($ID, $FName, $MName, $LName, $Salutation, $AddressProtocol, $Addy1, $Addy2, $Addy3, $City, $ProvState,
			$PCZip, $Country, $NumHome, $NumOffice, $NumFax, $NumCell, $EMail, $Job, $Spouse,
			$Deceased, $DeceasedDate, $Interests, $Arm, $Roll, $PN, $OPN, $Fellow, $HFellow, $FellowYear, $Licentiate, $LicentiateYear, $Comments,
			$Joined, $Refer, $MemYear, $MemStatus, $MemType, $PayMethod, $PayDate,
			$Toronto, $Laurentian, $Ottawa, $BC, $Prairie, $HK) {

//	Frist, we set default values.  Parameters passed with GET and POST are left blank if defaulted,
//	so we have to explicitly choose the default values - just to be safe. Set blank fields to Null.

	if ($FName == '')	{ $FName = 'Null'; }		else { $FName = "'" . addslashes($FName) . "'"; }
	if ($MName == '')	{ $MName = 'Null'; }		else { $MName = "'" . addslashes($MName) . "'";  }
	if ($LName == '')	{ $LName = 'Null'; }		else { $LName = "'" . addslashes($LName) . "'";  }
	if ($Salutation == '')	{ $Salutation = 'Null'; }	else { $Salutation = "'" . addslashes($Salutation) . "'";  }
	if ($AddressProtocol == '')	{ $AddressProtocol = 'Null'; }	else { $AddressProtocol = "'" . addslashes($AddressProtocol) . "'";  }
	if ($Addy1 == '')	{ $Addy1 = 'Null'; }		else { $Addy1 = "'" . addslashes($Addy1) . "'";  }
	if ($Addy2 == '')	{ $Addy2 = 'Null'; }		else { $Addy2 = "'" . addslashes($Addy2) . "'";  }
	if ($Addy3 == '')	{ $Addy3 = 'Null'; }		else { $Addy3 = "'" . addslashes($Addy3) . "'";  }
	if ($City == '')	{ $City = 'Null'; }		else { $City = "'" . addslashes($City) . "'";  }
	if ($ProvState == '')	{ $ProvState = 'Null'; }	else { $ProvState = "'" . addslashes($ProvState) . "'";  }
	if ($PCZip == '')	{ $PCZip = 'Null'; }		else { $PCZip = "'" . addslashes($PCZip) . "'";  }
	if ($Country == '')	{ $Country = 'Null'; }		else { $Country = "'" . addslashes($Country) . "'";  }
	if ($NumHome == '')	{ $NumHome = 'Null'; }		else { $NumHome = "'" . addslashes($NumHome) . "'";  }
	if ($NumOffice == '')	{ $NumOffice = 'Null'; }	else { $NumOffice = "'" . addslashes($NumOffice) . "'";  }
	if ($NumFax == '')	{ $NumFax = 'Null'; }		else { $NumFax = "'" . addslashes($NumFax) . "'";  }
	if ($NumCell == '')	{ $NumCell = 'Null'; }		else { $NumCell = "'" . addslashes($NumCell) . "'";  }
	if ($EMail == '')	{ $EMail = 'Null'; }		else { $EMail = "'" . addslashes($EMail) . "'";  }
	if ($Job == '')		{ $Job = 'Null'; }		else { $Job = "'" . addslashes($Job) . "'";  }
	if ($Spouse == '')	{ $Spouse = 'Null'; }		else { $Spouse = "'" . addslashes($Spouse) . "'";  }
	if ($Deceased == '')	{ $Deceased = '0'; }
	if ($DeceasedDate == '')	{ $DeceasedDate = 'Null'; }	  else { $DeceasedDate = "'" . addslashes($DeceasedDate) . "'"; }
	if ($Interests == '')	{ $Interests = 'Null'; }	else { $Interests = "'" . addslashes($Interests) . "'";  }
	if ($Arm == '')		{ $Arm = '0'; }
	if ($Roll == '')		{ $Roll = '0'; }
	if ($PN == '')		{ $PN = 'Null'; }		else { $PN = "'" . addslashes($PN) . "'";  }
	if ($OPN == '')		{ $OPN = 'Null'; }		else { $OPN = "'" . addslashes($OPN) . "'";  }
	if ($Joined == '')	{ $Joined = 'Null'; }		else { $Joined = "'" . addslashes($Joined) . "'";  }
	if ($Refer == '')	{ $Refer = 'Null'; }		else { $Refer = "'" . addslashes($Refer) . "'";  }
	if ($MemYear == '')	{ $MemYear = 'Null'; }		else { $MemYear = "'" . addslashes($MemYear) . "'";  }
	if ($MemStatus == '')	{ $MemStatus = '0'; }
	if ($MemType == '')	{ $MemType = '0'; }
	if ($PayMethod == '')	{ $PayMethod = '0'; }
	if ($PayDate == '')	{ $PayDate = 'Null'; }		else { $PayDate = "'" . addslashes($PayDate) . "'"; }
	if ($Fellow == '')	{ $Fellow = '0'; }
	if ($HFellow == '')	{ $HFellow = '0'; }
	if ($FellowYear == '')	{ $FellowYear = 'Null'; }	else { $FellowYear = "'" . addslashes($FellowYear) . "'"; }
	if ($Licentiate == '')	{ $Licentiate = '0'; }
	if ($LicentiateYear == '')	{ $LicentiateYear = 'Null'; }	  else { $LicentiateYear = "'" . addslashes($LicentiateYear) . "'"; }
	if ($Comments == '')	{ $Comments = 'Null'; }		else { $Comments = "'" . addslashes($Comments) . "'";  }

	if ($Toronto == '')	{ $Toronto = '0'; }
	if ($Laurentian == '')	{ $Laurentian = '0'; }
	if ($Ottawa == '')	{ $Ottawa = '0'; }
	if ($BC == '')		{ $BC = '0'; }
	if ($Prairie == '')	{ $Prairie = '0'; }
	if ($HK == '')	        { $HK = '0'; }

	$LinkID=dbConnect('heraldry_ca_-_membership');

// Now save People information

	$SQL  = 'UPDATE People SET ';
	$SQL .= 'FirstName       = ' . $FName . ', ';
	$SQL .= 'MiddleInitial   = ' . $MName . ', ';
	$SQL .= 'LastName        = ' . $LName . ', ';
	$SQL .= 'Salutation      = ' . $Salutation . ', ';
	$SQL .= 'AddressProtocol      = ' . $AddressProtocol . ', ';
	$SQL .= 'Address1        = ' . $Addy1 . ', ';
	$SQL .= 'Address2        = ' . $Addy2 . ', ';
	$SQL .= 'Address3        = ' . $Addy3 . ', ';
	$SQL .= 'City            = ' . $City . ', ';
	$SQL .= 'ProvState       = ' . $ProvState . ', ';
	$SQL .= 'PCZip           = ' . $PCZip . ', ';
	$SQL .= 'Country         = ' . $Country . ', ';
	$SQL .= 'NumHome         = ' . $NumHome . ', ';
	$SQL .= 'NumOffice       = ' . $NumOffice . ', ';
	$SQL .= 'NumFax          = ' . $NumFax . ', ';
	$SQL .= 'NumMobile       = ' . $NumCell . ', ';
	$SQL .= 'EMail           = ' . $EMail . ', ';
	$SQL .= 'Occupation      = ' . $Job . ', ';
	$SQL .= 'Spouse          = ' . $Spouse . ', ';
	$SQL .= 'Deceased        = ' . $Deceased . ', ';
	$SQL .= 'DeceasedDate        = ' . $DeceasedDate . ', ';
	$SQL .= 'Interests       = ' . $Interests . ', ';
	$SQL .= 'Armigerous      = ' . $Arm . ', ';
	$SQL .= 'on_the_roll      = ' . $Roll . ', ';
	$SQL .= 'PostNominals    = ' . $PN . ', ';
	$SQL .= 'OtherPNs        = ' . $OPN . ', ';
	$SQL .= 'DateJoined      = ' . $Joined . ', ';
	$SQL .= 'HeardFrom       = ' . $Refer . ', ';
	$SQL .= 'Effective       = ' . $MemYear . ', ';
	$SQL .= 'MemberStatus_ID = ' . $MemStatus . ', ';
	$SQL .= 'MemberType_ID   = ' . $MemType . ', ';
	$SQL .= 'PayMethod_ID    = ' . $PayMethod . ', ';
	$SQL .= 'PaymentReceived = ' . $PayDate . ', ';
	$SQL .= 'Fellow          = ' . $Fellow . ', ';
	$SQL .= 'HonoraryFellow  = ' . $HFellow . ', ';
	$SQL .= 'FellowYear      = ' . $FellowYear . ', ';
	$SQL .= 'Licentiate      = ' . $Licentiate . ', ';
	$SQL .= 'LicentiateYear      = ' . $LicentiateYear . ', ';
	$SQL .= 'Comments        = ' . $Comments . ' ';
	$SQL .= 'WHERE ID = ' . $ID;

	$SQL = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) {
		echo ('&nbsp;<p>&nbsp;<p>&nbsp;<center>Member(People) information successfully saved.<br>');
	} else {
		echo ('&nbsp;<p>&nbsp;<p>&nbsp;<center>Member(People) information could <B>NOT</B> be saved.<br>');
		echo ('Please try again or select menu option to continue.<br><br>');
		echo ('If this problem persists, please call your local system administrator.<p><br>');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</center>');
	}
	mysql_free_result($SQL);

// Save Branch information.  First delete existing information then add new branch information.

	$Status = 0;
	$SQL = 'DELETE From Members_Branch WHERE People_ID = ' . $ID;
	$SQL = mysql_query($SQL, $LinkID);
	mysql_free_result($SQL);

	if ($Toronto) {
		$SQL = 'INSERT Members_Branch (Branch_ID, People_ID) VALUES (' . $Toronto . ', ' . $ID . ')';
		$SQL = mysql_query($SQL, $LinkID);
		$Status += mysql_errno($LinkID);
	}
	mysql_free_result($SQL);

	if ($Laurentian) {
		$SQL = 'INSERT Members_Branch (Branch_ID, People_ID) VALUES (' . $Laurentian . ', ' . $ID . ')';
		$SQL = mysql_query($SQL, $LinkID);
		$Status += mysql_errno($LinkID);
	}
	mysql_free_result($SQL);

	if ($Ottawa) {
		$SQL = 'INSERT Members_Branch (Branch_ID, People_ID) VALUES (' . $Ottawa . ', ' . $ID . ')';
		$SQL = mysql_query($SQL, $LinkID);
		$Status += mysql_errno($LinkID);
	}
	mysql_free_result($SQL);

	if ($BC) {
		$SQL = 'INSERT Members_Branch (Branch_ID, People_ID) VALUES (' . $BC . ', ' . $ID . ')';
		$SQL = mysql_query($SQL, $LinkID);
		$Status += mysql_errno($LinkID);
	}
	mysql_free_result($SQL);

	if ($Prairie) {
		$SQL = 'INSERT Members_Branch (Branch_ID, People_ID) VALUES (' . $Prairie . ', ' . $ID . ')';
		$SQL = mysql_query($SQL, $LinkID);
		$Status += mysql_errno($LinkID);
	}
	mysql_free_result($SQL);

	if ($HK) {
		$SQL = 'INSERT Members_Branch (Branch_ID, People_ID) VALUES (' . $HK . ', ' . $ID . ')';
		$SQL = mysql_query($SQL, $LinkID);
		$Status += mysql_errno($LinkID);
	}
	mysql_free_result($SQL);

	if ($Status == 0) {
		echo ('<center>Member(Branch) information successfully saved.<br>');
	} else {
		echo ('&nbsp;<p>&nbsp;<p>&nbsp;<center>Member(Branch) information could <B>NOT</B> be saved.<br>');
		echo ('Please try again or select menu option to continue.<br><br>');
		echo ('If this problem persists, please call your local system administrator.<p><br>');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</center>');
	}

// Save Membership Information.

	echo ('Please select menu option to continue.</center>');
	dbClose($LinkID);

} // End Function MemberUpdate

Function MemberDelete() {
	echo ('Now in MemberDelete routine.<br>');
} // End Function MemberDelete

Function MemberShow($State, $ID) {

?>

<html>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css">
	</head>

	<body align="center" valign="top">

		<form method="post" action="Members.php">

	<?php
		$LinkID1=dbConnect('heraldry_ca_-_membership');
		$LinkID2=dbConnect('heraldry_ca_-_membership');

		$SQL1  = 'SELECT P.FirstName, P.MiddleInitial, P.LastName, P.Salutation,  P.AddressProtocol, P.Address1, P.Address2, P.Address3,';
		$SQL1 .= '       P.City, P.ProvState, P.PCZip, P.Country, P.NumHome, P.NumOffice, P.NumFax, P.NumMobile,';
		$SQL1 .= '       P.EMail, P.Occupation, P.Spouse, P.Deceased, P.DeceasedDate, P.Interests, P.Armigerous, P.on_the_roll, P.PostNominals,';
		$SQL1 .= '	 P.OtherPNs, P.DateJoined, P.HeardFrom, P.Fellow, P.HonoraryFellow, P.FellowYear, P.Effective,';
		$SQL1 .= '	 P.Licentiate, P.LicentiateYear, P.PaymentReceived, P.MemberStatus_ID, P.MemberType_ID, P.PayMethod_ID, P.Comments';
		$SQL1 .= ' FROM People P WHERE P.ID = ' . $ID*1;

		$SQL1 = mysql_query($SQL1, $LinkID1);
		$Line1 = mysql_fetch_object($SQL1);
	?>
		<table border="0" align="center" width=600 cellpadding="0" cellspacing="2" bgcolor="lightgrey" bordercolor="#000000">
		<td colspan="4" align="center" valign="center">
		<table border="1" width="100%"><tr><td align="center"><font face="arial,helvetica" size=2><B><?=$State;?> Member Information</B></td></tr></table></td></tr>
		<tr>
		<td valign="center" width=13%><div id="Label">Surname:&nbsp;</td>
		<td width="37%"><input type="text" name="LName"      maxlength="45" size="28" value="<?=$Line1->LastName?>"></td>
		<td valign="center" width=13%><div id="Label">Home #:&nbsp;</td>
		<td width="37%"><input type="text" name="NumHome"    maxlength="20" size="28" value="<?=$Line1->NumHome?>"></td>
		</tr><tr>
		<td valign="center" width=13%><div id="Label">First Name:&nbsp;</td>
		<td width="37%"><input type="text" name="FName"      maxlength="25" size="28" value="<?=$Line1->FirstName?>"></td>
		<td valign="center" width=13%><div id="Label">Office #:&nbsp;</td>
		<td width="37%"><input type="text" name="NumOffice"  maxlength="20" size="28" value="<?=$Line1->NumOffice?>"></td>
		</tr><tr>
		<td valign="center" width=13%><div id="Label">Middle Name:&nbsp;</td>
		<td width="37%"><input type="text" name="MName"      maxlength="20" size="28" value="<?=$Line1->MiddleInitial?>"></td>
		<td valign="center" width=13%><div id="Label">Fax #:&nbsp;</td>
		<td width="37%"><input type="text" name="NumFax"     maxlength="20" size="28" value="<?=$Line1->NumFax?>"></td>
		</tr><tr>
		<td valign="center" width=13%><div id="Label">Salutation/Title:&nbsp;</td>
		<td width="37%"><input type="text" name="Salutation" maxlength="45" size="28" value="<?=$Line1->Salutation?>"></td>
		<td valign="center" width=13%><div id="Label">Mobile #:&nbsp;</td>
		<td width="37%"><input type="text" name="NumCell"    maxlength="20" size="28" value="<?=$Line1->NumMobile?>"></td>
		</tr><tr>
		<td valign="center" width=13%><div id="Label">Address 1:&nbsp;</td>
		<td width="37%"><input type="text" name="Addy1"      maxlength="64" size="28" value="<?=$Line1->Address1?>"></td>
		<td valign="center" width=13%><div id="Label">E-Mail:&nbsp;</td>
		<td width="37%"><input type="text" name="EMail"      maxlength="50" size="28" value="<?=$Line1->EMail?>"></td>
		</tr><tr>
		<td valign="center" width=13%><div id="Label">Address 2:&nbsp;</td>
		<td width="37%"><input type="text" name="Addy2"      maxlength="64" size="28" value="<?=$Line1->Address2?>"></td>
		<td valign="center" width=13%><div id="Label">Occupation:&nbsp;</td>
		<td width="37%"><input type="text" name="Job"        maxlength="32" size="28" value="<?=$Line1->Occupation?>"></td>
		</tr><tr>
		<td valign="center" width=13%><div id="Label">Address 3:&nbsp;</td>
		<td width="37%"><input type="text" name="Addy3"      maxlength="64" size="28" value="<?=$Line1->Address3?>"></td>
		<td valign="center" width=13%><div id="Label">Spouse:&nbsp;</td>
		<td width="37%"><input type="text" name="Spouse"     maxlength="20" size="28" value="<?=$Line1->Spouse?>"></td>
		</tr><tr>
		<td valign="center" width=13%><div id="Label">City:&nbsp;</td>
		<td width="37%"><input type="text" name="City"       maxlength="32" size="28" value="<?=$Line1->City?>"></td>
		<td valign="center" width=13%><div id="Label">Post-Nominals:&nbsp;</td>
		<td width="37%"><input type="text" name="PN"         maxlength="64" size="28" value="<?=$Line1->PostNominals?>"></td>
		</tr><tr>
		<td valign="center" width=13%><div id="Label">Prov/State:&nbsp;</td>
		<td width="37%"><input type="text" name="ProvState"  maxlength="32" size="28" value="<?=$Line1->ProvState?>"></td>
		<td valign="center" width=13%><div id="Label">Other PN's:&nbsp;</td>
		<td width="37%"><input type="text" name="OPN"        maxlength="64" size="28" value="<?=$Line1->OtherPNs?>"></td>
		</tr><tr>
		<td valign="center" width=13%><div id="Label">PC/Zip:&nbsp;</td>
		<td width="37%"><input type="text" name="PCZip"      maxlength="12" size="28" value="<?=$Line1->PCZip?>"></td>
		<td valign="center" width=13%><div id="Label">Interests:&nbsp;</td>
		<td width="37%"><input type="text" name="Interests"  maxlength="64" size="28" value="<?=$Line1->Interests?>"></td>
		</tr><tr>
		<td valign="center" width=13%><div id="Label">Country:&nbsp;</td>
		<td width="37%"><input type="text" name="Country"    maxlength="32" size="28" value="<?=$Line1->Country?>"></td>
		<td valign="center" width=13%><div id="Label">Date Joined:&nbsp;</td>
		<td width="37%"><input type="text" name="Joined"     maxlength="10" size="28" value="<?=$Line1->DateJoined?>"></td>
		</tr><tr>
		<td valign="center" width=13%><div id="Label">Address Protocol:&nbsp;</td>
		<td width="37%"><input type="text" name="AddressProtocol"    maxlength="32" size="28" value="<?=$Line1->AddressProtocol?>"></td>
		<td valign="center" width=13%><div id="Label">Heard From:&nbsp;</td>
		<td width="37%"><input type="text" name="Refer"      maxlength="32" size="28" value="<?=$Line1->HeardFrom?>"></td>
		</tr><tr>
		<td valign="center" width=13%><div id="Label">Armigerous:&nbsp;</td>
		<td width="37%"><table border="0" align="left" width=100% cellpadding="0" cellspacing="0" bgcolor="lightgrey" bordercolor="#000000">
			<tr>
			<td width=40><input type="checkbox" name="Arm"  value="1"  <?=$Line1->Armigerous == "1" ? "CHECKED" : ""?>></td>
			<td align="left"><div id="Label">Arms in the Roll?:&nbsp;
			<input type="checkbox" name="Roll" value="1"  <?=$Line1->on_the_roll == "1" ? "CHECKED" : ""?>></td>
			</tr>
		</table></td>
		<td valign="center">&nbsp;</td>
		<td width="37%">&nbsp;</td>
		</tr><tr>
		<td valign="center" width=13%><div id="Label">Honorary Fellow:&nbsp;</td>
		<td width="37%"><table border="0" align="left" width=100% cellpadding="0" cellspacing="0" bgcolor="lightgrey" bordercolor="#000000">
			<tr>
			<td><input type="checkbox" name="HFellow" value="1"  <?=$Line1->HonoraryFellow == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;</td>
			<td valign="center"><div id="Label">Fellow:&nbsp;<input type="checkbox" name="Fellow" value="1"  <?=$Line1->Fellow == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;</td>
			<td valign="center"><div id="Label">Year Awarded:&nbsp;<input type="text" maxlength="10" size="10" name="FellowYear" value="<?=$Line1->FellowYear?>"></td>
			</tr>
		</table></td>
		<td valign="center"><div id="Label">Deceased:&nbsp;</td>
		<td width="37%"><table border="0" align="left" width=65% cellpadding="0" cellspacing="0" bgcolor="lightgrey" bordercolor="#000000">
			<tr>
			<td><input type="checkbox" name="Deceased" value="1"  <?=$Line1->Deceased == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;</td>
			<td valign="center"><div id="Label">Date:&nbsp;<input type="text" maxlength="10" size="10" name="DeceasedDate" value="<?=$Line1->DeceasedDate?>"></td>
			</tr>
		</table></td>
		</tr><tr>
		<td valign="center" width=13%><div id="Label">Licentiate:&nbsp;</td>
		<td><table border="0" align="left" width=100% cellpadding="0" cellspacing="0" bgcolor="lightgrey" bordercolor="#000000">
			<tr>
			<td width="37%"><input type="checkbox" name="licentiate" value="1"  <?=$Line1->Licentiate == "1" ? "CHECKED" : ""?>></td>
			<td valign="center" align="left"><div id="Label">Year Awarded:&nbsp;<input type="text" maxlength="10" size="10" name="LicentiateYear" value="<?=$Line1->LicentiateYear?>"></td>
			</tr>
		</table></td>
		</tr>
		</tr><tr>
		<td colspan="2" align="center">
		<table border="1" width="100%"><tr><td align="center"><font face="arial,helvetica" size=2><B>Branch Membership</B></font></td></tr></table></td>
		<td colspan="2" align="center">
		<table border="1" width="100%"><tr><td align="center"><font face="arial,helvetica" size=2><B>Financials</B></font></td></tr></table></td>
		</tr>
		<tr>
		<td colspan="2">
		<table border="0">
<?php
			$SQL2  = 'SELECT B.ID B_ID, B.Description B_Desc, BS.ID BS_ID, BS.Description BS_Desc,';
			$SQL2 .= ' MB.People_ID MB_People_ID FROM Branch B';
			$SQL2 .= ' LEFT JOIN Members_Branch MB ON MB.Branch_ID=B.ID AND MB.People_ID = ' . $ID*1 . ',';
			$SQL2 .= ' BranchState BS WHERE B.BranchState_ID = BS.ID';

			$Cntr = 0;
			$SQL2 = mysql_query($SQL2, $LinkID2);
			while ($Line2 = mysql_fetch_object($SQL2)) {
				if ($Cntr%2 == 0) { echo ('<tr>'); }
				echo ('<td valign="center" width="25%"><div id="Label">');
				if ($Line2->BS_Desc != 'New' And $Line2->BS_Desc != 'Active') { echo ('<font color="red">'); }
				echo ($Line2->B_Desc . ': <input type=checkbox value="' . $Line2->B_ID . '" name ="' . str_replace(' ', '', $Line2->B_Desc) . '"');
				echo ($Line2->MB_People_ID == '' ? '' : 'CHECKED');
				echo ('><br><font color="black"></td>');
				if ($Cntr%2 == 1) { echo ('</tr>'); }
				$Cntr++;
			}
			mysql_free_result($SQL2);
?>

		</table>
		</td>
		<td colspan="2" valign="top"><div id="Label">
		Effective for (YYYY): <input type="text" maxlength="10" size="10" name="MemYear" value="<?=$Line1->Effective?>">&nbsp;

		Satus: <select name="MemStatus">
<?php
		$SQL2 = mysql_query('SELECT ID, Description FROM MemberStatus ORDER BY ID', $LinkID2);
		while ($Line2 = mysql_fetch_object($SQL2)) {
			echo ('<option ' . ($Line2->ID == $Line1->MemberStatus_ID ? 'SELECTED' : '') . ' value = "' . $Line2->ID . '">' . $Line2->Description);
		}
		mysql_free_result($SQL2);
?>
		</select><br>

		Membership Type: <select name="MemType">
<?php
		$SQL2 = mysql_query('SELECT ID, Description FROM MemberType ORDER BY ID', $LinkID2);
		while ($Line2 = mysql_fetch_object($SQL2)) {
			echo ('<option ' . ($Line2->ID == $Line1->MemberType_ID ? 'SELECTED' : '') . ' value="' .$Line2->ID . '">' . $Line2->Description);
		}
		mysql_free_result($SQL2);
?>
	 	</select><br>

		Payment Method: <select name="PayMethod">
<?php
		$SQL2 = mysql_query('SELECT ID, Description FROM PayMethod ORDER BY ID', $LinkID2);
		while ($Line2 = mysql_fetch_object($SQL2)) {
			echo ('<option ' . ($Line2->ID == $Line1->PayMethod_ID ? 'SELECTED' : '') . ' value="' . $Line2->ID . '">' . $Line2->Description);
		}
		mysql_free_result($SQL2);
?>
		</select><br>

		Payment Date (YYYY-MM-DD):	<input type="text" maxlength="10" size="10" value="<?=$Line1->PaymentReceived?>" name="PayDate"><br>

		</td>
		</tr>

		<tr><td colspan="4"><div class="NavText">
		<font face="arial,helvetica" size=2>Your comments:<br>

		<textarea name="Comments" rows=2 cols=80 wrap="virtual" maxlength="10"><?=$Line1->Comments?></textarea><br>
		</td></tr>

		<tr><td colspan="4" width="100%" align="center">
		<input type="hidden" name="ID" value="<?=$ID?>">
		<input type="hidden" name="State" value="Member<?=$State?>">
		<input type="Submit" value="Save Membership Information">
		</td></tr>
	</input>
<?php
	mysql_free_result($SQL1);
?>
		</form>
	</body>
</html>

<?php
	dbClose($LinkID1);
	dbClose($LinkID2);

} //End Function MemberShow

// Main Loop
// The main loop.  Call functions based on the value of $_POST["state"], which gets set
// via a hidden INPUT TYPE, or through URL parameters called by NavBar Click event.

	$ID = '';
	if (isset($_GET['ID']))     { $ID = $_GET['ID']; }
	if (isset($_POST['ID']))    { $ID = $_POST['ID']; }

	$State = '';
	if (isset($_GET['State']))  { $State = $_GET['State']; }
	if (isset($_POST['State'])) { $State = $_POST['State']; }

	switch($State) {

		case 'New':
		case 'Update':
			MemberShow($State, $_GET['ID']);
			break;

		case 'MemberUpdate':

// Fields for the People Table

			MemberUpdate($ID, $_POST['FName'], $_POST['MName'], $_POST['LName'], $_POST['Salutation'],$_POST['AddressProtocol'],
				$_POST['Addy1'], $_POST['Addy2'], $_POST['Addy3'], $_POST['City'], $_POST['ProvState'],
				$_POST['PCZip'], $_POST['Country'], $_POST['NumHome'], $_POST['NumOffice'], $_POST['NumFax'],
				$_POST['NumCell'], $_POST['EMail'], $_POST['Job'], $_POST['Spouse'], $_POST['Deceased'],$_POST['DeceasedDate'],
				$_POST['Interests'], $_POST['Arm'], $_POST['Roll'], $_POST['PN'], $_POST['OPN'], $_POST['Fellow'],
				$_POST['HFellow'], $_POST['FellowYear'], $_POST['Licentiate'], $_POST['LicentiateYear'], $_POST['Comments'],

// Fields for the Members Table

				$_POST['Joined'], $_POST['Refer'], $_POST['MemYear'], $_POST['MemStatus'],
				$_POST['MemType'], $_POST['PayMethod'], $_POST['PayDate'],

// Fields for the Members_Branch Table

				$_POST['Toronto'], $_POST['Laurentian'], $_POST['Ottawa'],
				$_POST['BritishColumbia'], $_POST['Prairie'], $_POST['HongKong']);
			break;

		case 'MemberCreate':

			MemberCreate($ID, $_POST['FName'], $_POST['MName'], $_POST['LName'], $_POST['Salutation'],$_POST['AddressProtocol'],
				$_POST['Addy1'], $_POST['Addy2'], $_POST['Addy3'], $_POST['City'], $_POST['ProvState'],
				$_POST['PCZip'], $_POST['Country'], $_POST['NumHome'], $_POST['NumOffice'], $_POST['NumFax'],
				$_POST['NumCell'], $_POST['EMail'], $_POST['Job'], $_POST['Spouse'], $_POST['Deceased'],$_POST['DeceasedDate'],
				$_POST['Interests'], $_POST['Arm'], $_POST['Roll'], $_POST['PN'], $_POST['OPN'], $_POST['Fellow'],
				$_POST['HFellow'], $_POST['FellowYear'], $_POST['Licentiate'], $_POST['LicentiateYear'], $_POST['Comments'],

// Fields for the Members Table

				$_POST['Joined'], $_POST['Refer'], $_POST['MemYear'], $_POST['MemStatus'],
				$_POST['MemType'], $_POST['PayMethod'], $_POST['PayDate'],

// Fields for the Members_Branch Table

				$_POST['Toronto'], $_POST['Laurentian'], $_POST['Ottawa'],
				$_POST['BritishColumbia'], $_POST['Prairie'], $_POST['HongKong']);
			break;

		case 'MemberDelete':
			MemberDelete($ID);
			break;
	}
?>
