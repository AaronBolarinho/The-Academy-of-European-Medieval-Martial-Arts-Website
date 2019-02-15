<?php
	session_start();
	include_once 'IDValid.php';
	include_once 'DB.php';

Function ExportData($LinkID, $State, $Toronto, $Laurentian, $Ottawa, $BritishColumbia, $Prairie, $HongKong,
			 $EffectiveYear, $MemStatus, $MemType, $PayMethod, $PayDate, $Comments) {

// Build the SELECT Statement here.

	$SQL  = 'SELECT P.FirstName, P.MiddleInitial, P.LastName, P.Salutation, P.Address1, P.Address2, P.Address3, P.City, ';
	$SQL .= '       P.ProvState, P.PCZip, P.Country, P.AddressProtocol, P.NumHome, P.NumOffice, P.NumFax, P.NumMobile, ';
	$SQL .= '       P.EMail, P.Occupation, P.Spouse, P.Deceased, P.DeceasedDate, P.Interests, P.Armigerous, P.on_the_roll, ';
	$SQL .= '       P.PostNominals, P.OtherPNs, P.DateJoined, P.HeardFrom, P.Fellow, P.HonoraryFellow, P.FellowYear, ';
	$SQL .= '       P.Licentiate, P.LicentiateYear, P.Effective, P.PaymentReceived, P.ID, P.MemberStatus_ID, P.MemberType_ID, ';
	$SQL .= '       P.PayMethod_ID, P.Comments ';
	$SQL .= 'FROM   People P ';

	$Cntr  = $Toronto*1 + $Laurentian*1 + $Ottawa*1 + $BritishColumbia*1 + $Prairie*1 + $HongKong*1;

	if ($Cntr > 0 ) {
		$Cntr = '';
		$SQL .= 'LEFT JOIN Members_Branch MB ON P.ID = MB.People_ID AND MB.Branch_ID IN (';
		if ($Toronto != '')         $Cntr .= $Toronto . ', ';
		if ($Laurentian != '')      $Cntr .= $Laurentian . ', ';
		if ($Ottawa != '')          $Cntr .= $Ottawa . ', ';
		if ($BritishColumbia != '') $Cntr .= $BritishColumbia . ', ';
		if ($Prairie != '')         $Cntr .= $Prairie . ', ';
		if ($HongKong != '')        $Cntr .= $HongKong . ', ';
		$SQL .= substr($Cntr, 0, -2) . ') ';
	}

	$Cntr = 'WHERE ';
	if ($EffectiveYear != '')   	{ $SQL .= $Cntr . 'Effective = "' . $EffectiveYear . '" ';       $Cntr = 'AND '; }
	if ($MemStatus*1 > 0) 		{ $SQL .= $Cntr . 'MemberStatus_ID = ' . $MemStatus . ' ';  $Cntr = 'AND '; }
	if ($MemType*1 > 0)   		{ $SQL .= $Cntr . 'MemberType_ID = ' . $MemType . ' ';      $Cntr = 'AND '; }
	if ($PayMethod*1 > 0) 		{ $SQL .= $Cntr . 'PayMethod_ID = ' . $PayMethod . ' ';     $Cntr = 'AND '; }
	if ($PayDate != '')   		{ $SQL .= $Cntr . 'PaymentReceived >= "' . $PayDate . '" '; $Cntr = 'AND '; }
	if ($Comments != '')  		{ $SQL .= $Cntr . 'Comments LIKE "%' . $Comments . '%" ';   $Cntr = 'AND '; }
	$SQL .= 'ORDER BY P.LastName';

// OK, we're ready to go.  Execute and process the results in a CSV form using correct header records.

	Header ( 'Content-Type: text/x-comma-separated-values' );
	Header ( 'Content-Disposition: attachment; filename="RHSC_DB_' . date("Y-m-d") . '.csv"' );

	$Cntr = 0;
	echo ('ID, FirstName, MiddleInitial, LastName, Salutation, Address1, Address2, Address3, City, ');
	echo ('ProvState, PCZip, Country, AddressProtocol, NumHome, NumOffice, NumFax, NumMobile, ');
	echo ('EMail, Occupation, Spouse, Deceased, DeceasedDate, Interests, Armigerous, on_the_roll, ');
	echo ('PostNominals, OtherPNs, DateJoined, HeardFrom, Fellow, HonoraryFellow, FellowYear, ');
	echo ('Licentiate, LicentiateYear, Effective, PaymentReceived, MemberStatus_ID, MemberType_ID, ');
	echo ('PayMethod_ID, Comments');
	printf("\n");

	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		echo (      $Line->ID . ',');
		echo ('"' . $Line->FirstName . '",');
		echo ('"' . $Line->MiddleInitial . '",');
		echo ('"' . $Line->LastName . '",');
		echo ('"' . $Line->Salutation . '",');
		echo ('"' . $Line->Address1 . '",');
		echo ('"' . $Line->Address2 . '",');
		echo ('"' . $Line->Address3 . '",');
		echo ('"' . $Line->City . '",');
		echo ('"' . $Line->ProvState . '",');
		echo ('"' . $Line->PCZip . '",');
		echo ('"' . $Line->Country . '",');
		echo ('"' . $Line->AddressProtocol . '",');
		echo ('"' . $Line->NumHome . '",');
		echo ('"' . $Line->NumOffice . '",');
		echo ('"' . $Line->NumFax . '",');
		echo ('"' . $Line->NumMobile . '",');
		echo ('"' . $Line->EMail . '",');
		echo ('"' . $Line->Occupation . '",');
		echo ('"' . $Line->Spouse . '",');
		echo (      $Line->Deceased . ',');
		echo ('"' . $Line->DeceasedDate . '",');
		echo ('"' . $Line->Interests . '",');
		echo (      $Line->Armigerous . ',');
		echo (      $Line->on_the_roll . ',');
		echo ('"' . $Line->PostNominals . '",');
		echo ('"' . $Line->OtherPNs . '",');
		echo ('"' . $Line->DateJoined . '",');
		echo ('"' . $Line->HeardFrom . '",');
		echo (      $Line->Fellow . ',');
		echo (      $Line->HonoraryFellow . ',');
		echo ('"' . $Line->FellowYear . '",');
		echo (      $Line->Licentiate . ',');
		echo ('"' . $Line->LicentiateYear . '",');
		echo ('"' . $Line->Effective . '",');
		echo ('"' . $Line->PaymentReceived . '",');
		echo (      $Line->MemberStatus_ID . ',');
		echo (      $Line->MemberType_ID . ',');
		echo (      $Line->PayMethod_ID . ',');
		echo ('"' . addslashes($Line->Comments) . '"');
		printf("\n");
		$Cntr++;
	}
}

Function Export($LinkID, $State) {

?>

<html>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css">
		<link rel="stylesheet" type="text/css" media="all" href="skins/aqua/theme.css" title="Aqua" />
		<script type="text/javascript" src="calendar.js"></script>
		<script type="text/javascript" src="lang/calendar-en.js"></script>
		<script type="text/javascript" src="calendar-setup.js"></script>

	</head>

	<body align="center" valign="top">

		<form name="Export" method="post" action="Export.php">

		<table border="0" align="center" width=600 cellpadding="0" cellspacing="2" bgcolor="lightgrey" bordercolor="#000000">
		<tr><td colspan="2" align="center" valign="center">
		<table border="1" width="100%"><tr><th align="center">EXPORT DATABASE - Export Criteria</th></tr></table></td></tr>
		<tr><td align="center" width="50%">
		<table border="1" width="100%"><tr><th align="center">Select Branch(s) to Export</th></tr></table></td>
		<td align="center" width="50%">
		<table border="1" width="100%"><tr><th align="center">Restrict Export by Financial Data</th></tr></table></td>
		</tr>
		<tr>
		<td>
		<table border="0">
<?php
			$SQL  = 'SELECT B.ID B_ID, B.Description B_Desc, BS.ID BS_ID, BS.Description BS_Desc';
			$SQL .= ' FROM Branch B, BranchState BS WHERE B.BranchState_ID = BS.ID';

			$Cntr = 0;
			$Result = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($Result)) {
				if ($Cntr%2 == 0) { echo ('<tr>'); }
				echo ('<td valign="center" width="25%" id="Label">');
				if ($Line->BS_Desc != 'New' And $Line->BS_Desc != 'Active') { echo ('<font color="red">'); }
				echo ($Line->B_Desc . ': <input type=checkbox value="' . $Line->B_ID . '" name ="' . str_replace(' ', '', $Line->B_Desc) . '"');
				echo ('><br><font color="black"></td>');
				if ($Cntr%2 == 1) { echo ('</tr>'); }
				$Cntr++;
			}
?>
		</table>
		</td>
		<td valign="top" id="Label">
		Effective Year (YYYY): <input type="text" maxlength="10" size="10" name="MemYear" id="MemYear"> &nbsp;

		<br>Status: <select name="MemStatus">
<?php
		$Result = mysql_query('SELECT ID, Description FROM MemberStatus ORDER BY ID', $LinkID);
		echo ('<option value = "0">-');
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<option value = "' . $Line->ID . '">' . $Line->Description);
		}
?>
		</select><br>

		Membership Type: <select name="MemType">
<?php
		$Result = mysql_query('SELECT ID, Description FROM MemberType ORDER BY ID', $LinkID);
		echo ('<option value = "0">-');
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<option value="' .$Line->ID . '">' . $Line->Description);
		}
?>
	 	</select><br>

		Payment Method: <select name="PayMethod">
<?php
		$Result = mysql_query('SELECT ID, Description FROM PayMethod ORDER BY ID', $LinkID);
		echo ('<option value = "0">-');
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<option value="' . $Line->ID . '">' . $Line->Description);
		}
?>
		</select><br>

		Payment Date: <input type="text" maxlength="10" size="10" name="PayDate" id="PayDate">
		<script type="text/javascript">
			Calendar.setup( {
				inputField : "PayDate",
				ifFormat   : "%Y-%m-%d"
			});
		</script>

		</td>
		</tr>

		<tr><td colspan="2"><div class="NavText">
		<table border="1" width="100%"><tr><th align="center">Identify Search String in Comments</td></tr></table>

		<textarea name="Comments" rows=3 cols=82 wrap="virtual" maxlength="10"></textarea><br>
		</td></tr>

		<tr>


		<td colspan="2" align="center">
		<input type="hidden" name="ID" value="<?=$ID?>">
		<input type="hidden" name="State" value="<?=$State?>Data">
		<input type="Submit" value="Export Membership Information">
		</td><td id="Label">
		</td></tr></table>
	</form>
</body>
</html>

<?php

} //End Function MemberShow

// Main Loop

      if ($_SESSION["RoleID"] < 3) {
?>
<html>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css">
	</head>

	<body align="center" valign="top">
        <body>
                <p>ERROR: You do not have the necessary permissions to export membership data.</p>
        </body>
</html>
<?
        }
        else {

// The main loop.  Call functions based on the value of $_POST["state"], which gets set
// via a hidden INPUT TYPE, or through URL parameters called by NavBar Click event.

		$ID = '';
		if (isset($_GET['ID']))		{ $ID = $_GET['ID']; }
		if (isset($_POST['ID']))	{ $ID = $_POST['ID']; }

		$State = '';
		if (isset($_GET['State']))	{ $State = $_GET['State']; }
		if (isset($_POST['State']))	{ $State = $_POST['State']; }

		$LinkID=dbConnect($DB);

		switch($State) {

			case 'Status':
				phpinfo();
				break;

			case 'Export':
				Export($LinkID, $State);
				break;

			case 'ExportData':
				$Toronto         = isset($_POST['Toronto'])         ?  $_POST['Toronto'] : "";
				$Laurentian      = isset($_POST['Laurentian'])      ?  $_POST['Laurentian'] : "";
				$Ottawa          = isset($_POST['Ottawa'])          ?  $_POST['Ottawa'] : "";
				$BritishColumbia = isset($_POST['BC/Yukon']) 	    ?  $_POST['BC/Yukon'] : "";
				$Prairie         = isset($_POST['Prairie'])         ?  $_POST['Prairie'] : "";
				$HongKong        = isset($_POST['HongKong'])        ?  $_POST['HongKong'] : "";

				ExportData($LinkID, $State, $Toronto, $Laurentian, $Ottawa, $BritishColumbia, $Prairie,
					   $HongKong, $_POST['MemYear'], $_POST['MemStatus'], $_POST['MemType'],
					   $_POST['PayMethod'], $_POST['PayDate'], trim($_POST['Comments']));

				break;
		}
		dbClose($LinkID);
	}
?>
