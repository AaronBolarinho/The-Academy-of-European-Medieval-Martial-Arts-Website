<?php
// Program: Export.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description:
//
//---------------------------
// Updates:
//	2012 ----------
//
session_start();
ob_start(); 
include 'ss_path.stuff';
//include_once 'IDValid.php';

Function ExportData($LinkID,$State,$school,$login_ID,$seclvl,$Toronto,$Guelph,$NS,$Stratford,$MemStatus,$MemType,$PayMethod,$PayDate) {
	include "sub_export_SQL.php";

	// execute and process the results into a CSV format using correct header records.
	Header ( 'Content-Type:text/x-comma-separated-values' );
	Header ( 'Content-Disposition: attachment; filename="AEMMA_DB_EXPORT_' . date("Y-m-d") . '.csv"' );

	echo ('Rec_ID, FirstName, MiddleInitial, LastName, Salutation, AddressProtocol, Address1, Address2, Address3, City, ProvState, PCZip, Country, NumHome, NumOffice, NumFax, NumMobile, EMail, EmergContactName, EmergContactPhone, Medical');
	printf("\n");
	mysql_query('set SQL_BIG_SELECTS=1');
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		echo (      $Line->Rec_ID . ',');
		echo ('"' . $Line->FirstName . '",');
		echo ('"' . $Line->MiddleInitial . '",');
		echo ('"' . $Line->LastName . '",');
		echo ('"' . $Line->Salutation . '",');
		echo ('"' . $Line->AddressProtocol . '",');
		echo ('"' . $Line->Address1 . '",');
		echo ('"' . $Line->Address2 . '",');
		echo ('"' . $Line->Address3 . '",');
		echo ('"' . $Line->City . '",');
		echo ('"' . $Line->ProvState . '",');
		echo ('"' . $Line->PCZip . '",');
		echo ('"' . $Line->Country . '",');
		echo ('"' . $Line->NumHome . '",');
		echo ('"' . $Line->NumOffice . '",');
		echo ('"' . $Line->NumFax . '",');
		echo ('"' . $Line->NumMobile . '",');
		echo ('"' . $Line->EMail . '",');
		echo ('"' . $Line->EmergContactName . '",');
		echo ('"' . $Line->EmergContactPhone . '",');
		echo ('"' . $Line->Medical . '"');
		printf("\n");
		}
dbClose($LinkID);
ob_flush(); 
} // end function: ExportData


Function Export($LinkID,$State,$tb_width,$school,$login_ID,$seclvl) {
$header_title = "Export Database";
include 'sub_header.php';
?>
<form name="Export" method="post" action="Export.php?State=Export2CSV&SCH=<?=$school?>&LGID=<?=$login_ID?>&SECL=<?=$seclvl?>">
<table border="0" width="<?=$tb_width?>" cellpadding="0" cellspacing="2" bgcolor="lightgrey" bordercolor="#000000">
<tr>
	<td colspan="2" align="center" valign="center"><table border="1" width="100%"><tr><th align="center">EXPORT <?=$school?> DATABASE - Export Criteria</th></tr></table></td>
</tr>
<tr>
	<td align="center" width="50%"><table border="1" width="100%"><tr><th align="center">Select Chapter(s) to Export</th></tr></table></td>
	<td align="center" width="50%"><table border="1" width="100%"><tr><th align="center">Restrict Export by Financial Data</th></tr></table></td>
</tr>
<tr>
	<td><table border="0">
<?php
	$SQL  = 'SELECT C.ID C_ID, C.Description C_Desc, CS.ID CS_ID, CS.Description CS_Desc';
	$SQL .= ' FROM Chapter C, ChapterState CS WHERE C.ChapterState_ID = CS.ID';
	$Cntr = 0;
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		if ($Cntr%2 == 0) { echo ('<tr>'); }
		echo ('<td valign="center" width="25%" id="Label">');
		if ($Line->CS_Desc != 'New' And $Line->CS_Desc != 'Active') { echo ('<font color="red">'); }
		echo ($Line->C_Desc . ': <input type=checkbox value="' . $Line->C_ID . '" name ="' . str_replace(' ', '', $Line->C_Desc) . '"');
		echo (' style="vertical-align:middle;"><br /><font color="black"></td>');
		if ($Cntr%2 == 1) { echo ('</tr>'); }
		$Cntr++;
		}
?>
	</table></td>
	<td valign="top" id="Label">Status: <select name="MemStatus">
<?php
	$Result = mysql_query('SELECT ID, Description FROM MemberStatus ORDER BY ID', $LinkID);
	echo ('<option value = "0">-');
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<option value = "' . $Line->ID . '">' . $Line->Description);
		}
?>
	</select><br />
	Membership Type: <select name="MemType">
<?php
	$Result = mysql_query('SELECT ID, Description FROM MemberType ORDER BY ID', $LinkID);
	echo ('<option value = "0">-');
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<option value="' .$Line->ID . '">' . $Line->Description);
		}
?>
	</select><br />
	Payment Method: <select name="PayMethod">
<?php
	$Result = mysql_query('SELECT ID, Description FROM PayMethod ORDER BY ID', $LinkID);
	echo ('<option value = "0">-');
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<option value="' . $Line->ID . '">' . $Line->Description);
		}
?>
	</select><br />
	Payment Date: <input type="text" maxlength="10" size="10" name="PayDate" id="PayDate">
	<script type="text/javascript">
		Calendar.setup( {
			inputField : "PayDate",
			ifFormat   : "%Y-%m-%d"
		});
	</script></td>
</tr>
<tr>
	<td colspan="2" align="center">
	<input type="Submit" value="Export Membership Information"><br />&nbsp;</td>
</tr>
<tr>
	<td colspan="2"><b>Note: </b>This utility will create an export file, in the format "CSV" or "comma-separated values".  This file is an ASCII file, and can be imported into your favourite PC database application such as Microsoft Acces, or other SQL-based relational database.  You will be prompted as to where to store the extract file.</td>
</tr>
</table>
</form>
<?php
dbClose($LinkID);
ob_flush(); 
} //End Function: Export

// Main Loop
// The main loop.  Call functions based on the value of $_POST["state"], which gets set
// via a hidden INPUT TYPE, or through URL parameters called by NavBar Click event.
if (isset($_POST['seclvl']))	{ $seclvl 	= $_POST['seclvl']; }
if (isset($_GET['SECL']))	{ $seclvl 	= $_GET['SECL']; }

if (isset($_POST['school']))	{ $school 	= $_POST['school']; }
if (isset($_GET['SCH']))	{ $school 	= $_GET['SCH']; }

if (isset($_POST['login_ID']))	{ $login_ID 	= $_POST['login_ID']; }
if (isset($_GET['LGID']))	{ $login_ID 	= $_GET['LGID']; }

if (isset($_POST['State']))	{ $State 	= $_POST['State']; }
if (isset($_GET['State']))	{ $State 	= $_GET['State']; }

if ($seclvl < 4) 
	{
	echo ('<script type="text/JavaScript">');
	echo ('parent.location.href="index.php?PGM=Begin&MSG=ERROR: You do not have the necessary permissions to export membership data!"');
	echo ('</script>');
	break;
        }
else
	{
	switch($State) {
		case 'Status':
			phpinfo();
			break;

		case 'Export':
			$LinkID=dbConnect($DB);
			Export($LinkID,$State,$table_width,$school,$login_ID,$seclvl);
			break;

		case 'Export2CSV':
			include_once "DB.php";
			$LinkID=dbConnect($DB);
			$Toronto	= isset($_POST['Toronto'])	?  $_POST['Toronto'] : "";
			$Guelph 	= isset($_POST['Guelph'])      	?  $_POST['Guelph'] : "";
			$NS	 	= isset($_POST['NovaScotia'])   ?  $_POST['NovaScotia'] : "";
			$Stratford 	= isset($_POST['Stratford'])    ?  $_POST['Stratford'] : "";
			ExportData($LinkID,$State,$school,$login_ID,$seclvl,$Toronto,$Guelph,$NS,$Stratford, 
				   $_POST['MemStatus'],$_POST['MemType'],$_POST['PayMethod'],$_POST['PayDate'] );
			break;
		}
	}
?>
