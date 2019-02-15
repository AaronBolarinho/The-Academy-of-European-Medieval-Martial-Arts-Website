<?php
// Program: Custom.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description:
//
//---------------------------
// Updates:
//	2012 ----------
//
include 'ss_path.stuff';
//include_once 'IDValid.php';


Function CustomData($LinkID, $State,$rec_ID,$school,$login_ID,$seclvl,$table_width, $FName, $LName, $Spouse, $Toronto, $Guelph, $Stratford, $NS, $MemStatus, $MemType, $FeesGoodTillDate, $PayMethod, $PayDate, $Comments,
		    $Occupation, $PostNominals, $OtherPNs, $elist, $Gender, $Interests, $Arms, $ArmsSource, $Injury, $InjuryReport, $PreviousMartial, $FirstAidTraining, $Deceased, $Rank,
		    $HeardFrom, $ArmouredHarnessDesc, $UnarmouredHarnessDesc, $TrainingComments, $PeriodGarments, $ArcheryDesc,
		    $armazare, $daga, $spada, $spadalonga, $swordbuckler, $pollaxe, $spear, $armouredcombat, $quarterstaff, $archery, $langesschwert, $mountedcombat ) 
{
	// Build the SELECT Statement here.
	$echoString = "";
	$goodTill = 0;

	$SQL  = 'SELECT P.FirstName, P.MiddleInitial, P.LastName, P.Salutation, P.AddressProtocol, P.Address1, P.Address2, P.Address3, P.City, ';
	$SQL .= '       P.ProvState, P.PCZip, P.Country, P.NumHome, P.NumOffice, P.NumFax, P.NumMobile, P.EMail, P.EmergContactName, P.EmergContactPhone, ';
	$SQL .= '       P.Occupation, P.Gender, P.TransportationMode, P.PreviousMartial, P.Spouse, P.BirthDate, P.Deceased, P.DeceasedDate, P.Interests, P.Armigerous, ';
	$SQL .= '       P.ArmsSource, P.PostNominals, P.OtherPNs, P.AcademicDegree, P.AcademicInstitution, P.FirstAidTraining, P.Injury, P.InjuryReport, P.EnrolledElist, P.DateJoined, P.HeardFrom, ';
	$SQL .= '       P.FeesGoodTillDate, P.PaymentReceived, P.Medical, P.ArmouredHarness, P.ArmouredHarnessDescription, P.UnarmouredHarnessDescription, P.portrait_URL, ';
	$SQL .= '       P.TrainingComments, P.Comments, P.PeriodGarments, P.ArcheryDescription, P.Rec_ID, P.MemberStatus_ID, P.MemberType_ID, P.PayMethod_ID ';
	$SQL .= 'FROM   People P ';

	$MartialCnt = $armazare*1 + $daga*1 + $spada*1 + $spadalonga*1 + $swordbuckler*1 + $pollaxe*1 + $spear*1 + $armouredcombat*1 + $quarterstaff*1 + $archery*1 + $langesschwert*1 + $mountedcombat*1;
	if ($MartialCnt > 0 )
		{
		$SQL .= 'INNER JOIN Members_Martial MM ON MM.People_ID = P.Rec_ID ';
		if ($armazare != '')         	{ $SQL .= 'AND armazare = 1 ';  $echoString = $echoString . "armazare=1, "; }
		if ($daga != '')         	{ $SQL .= 'AND daga = 1 ';  $echoString = $echoString . "daga=1, "; }
		if ($spada != '')         	{ $SQL .= 'AND spada = 1 ';  $echoString = $echoString . "spada=1, "; }
		if ($spadalonga != '')         	{ $SQL .= 'AND spadalonga = 1 ';  $echoString = $echoString . "spadalonga=1, "; }
		if ($swordbuckler != '')      	{ $SQL .= 'AND swordbuckler = 1 ';  $echoString = $echoString . "swordbuckler=1, "; }
		if ($pollaxe != '')         	{ $SQL .= 'AND pollaxe = 1 ';  $echoString = $echoString . "pollaxe=1, "; }
		if ($spear != '')         	{ $SQL .= 'AND spear = 1 ';  $echoString = $echoString . "spear=1, "; }
		if ($armouredcombat != '')      { $SQL .= 'AND armouredcombat = 1 ';  $echoString = $echoString . "armouredcombat=1, "; }
		if ($quarterstaff != '')        { $SQL .= 'AND quarterstaff = 1 ';  $echoString = $echoString . "quarterstaff=1, "; }
		if ($archery != '')         	{ $SQL .= 'AND archery = 1 ';  $echoString = $echoString . "archery=1, "; }
		if ($langesschwert != '')       { $SQL .= 'AND langesschwert = 1 ';  $echoString = $echoString . "langesschwert=1, "; }
		if ($mountedcombat != '')    	{ $SQL .= 'AND mountedcombat = 1 ';  $echoString = $echoString . "mountedcombat=1, "; }
		}

	$Cntr  = $Toronto*1 + $Guelph*1 + $Stratford*1 + $NS*1;
	if ($Cntr > 0 ) 
		{
		$Cntr = '';
		$SQL .= 'INNER JOIN Members_Chapter MC ON P.Rec_ID = MC.People_ID AND MC.Chapter_ID IN (';
		if ($Toronto != '')		{ $Cntr .= $Toronto . ', '; $echoString = $echoString . "Toronto=1, ";}
		if ($Guelph != '')      	{ $Cntr .= $Guelph . ', ';  $echoString = $echoString . "Guelph=1, "; }
		if ($Stratford != '')      	{ $Cntr .= $Stratford . ', ';  $echoString = $echoString . "Stratford=1, "; }
		if ($NS != '')      		{ $Cntr .= $NS . ', ';  $echoString = $echoString . "NS=1, "; }
		$SQL .= substr($Cntr, 0, -2) . ') ';
		}

	if ($Rank > 0 ) 
		{
		$SQL .= 'INNER JOIN Members_Rank MR ON P.Rec_ID = MR.People_ID AND Rank_ID = '.$Rank.' AND Current = 1 ';
		$echoString = $echoString . "rank=$Rank, ";
		}

	$Cntr = 'WHERE ';
	if ($MemStatus*1 > 0) 			{ $SQL .= $Cntr . 'MemberStatus_ID = ' . $MemStatus . ' ';  $Cntr = 'AND '; $echoString = $echoString . "member status=$MemStatus, "; }
	if ($MemType*1 > 0)   			{ $SQL .= $Cntr . 'MemberType_ID = ' . $MemType . ' ';      $Cntr = 'AND ';  $echoString = $echoString . "member type=$MemType, "; }
	if ($PayMethod*1 > 0) 			{ $SQL .= $Cntr . 'PayMethod_ID = ' . $PayMethod . ' ';     $Cntr = 'AND ';   $echoString = $echoString . "payment method=$PayMethod, "; }
	if ($PayDate != '')   			{ $SQL .= $Cntr . 'PaymentReceived >= "' . $PayDate . '" '; $Cntr = 'AND ';   $echoString = $echoString . "payment date=$PayDate, "; }
	if ($FeesGoodTillDate != '')		{ $SQL .= $Cntr . 'FeesGoodTillDate >= "' . $FeesGoodTillDate . '" '; $Cntr = 'AND ';   $echoString = $echoString . "fees good till=$FeesGoodTillDate, "; $goodTill = 1; }

	if ($Comments != '')  			{ $SQL .= $Cntr . 'Comments LIKE "%' . $Comments . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "comments=$Comments, "; }
	if ($TrainingComments != '')  		{ $SQL .= $Cntr . 'TrainingComments LIKE "%' . $TrainingComments . '%" ';   $Cntr = 'AND ';   $echoString = $echoString . "training comments=$TrainingComments, "; }
	if ($ArmouredHarnessDesc != '')  	{ $SQL .= $Cntr . 'ArmouredHarnessDescription LIKE "%' . $ArmouredHarnessDesc . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "armoured harness=$ArmouredHarnessDesc, "; }
	if ($UnarmouredHarnessDesc != '') 	{ $SQL .= $Cntr . 'UnarmouredHarnessDescription LIKE "%' . $UnarmouredHarnessDesc . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "unarmoured harness=$UnarmouredHarnessDesc, ";}
	if ($PeriodGarments != '') 		{ $SQL .= $Cntr . 'PeriodGarments LIKE "%' . $PeriodGarments . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "period garments=$PeriodGarments, "; }
	if ($ArcheryDesc != '') 		{ $SQL .= $Cntr . 'ArcheryDescription LIKE "%' . $ArcheryDesc . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "archery description=$ArcheryDesc, "; }

	if ($FName != '')  			{ $SQL .= $Cntr . 'FirstName LIKE "%' . $FName . '%" ';   $Cntr = 'AND ';  $echoString = $echoString . "first name=$FName, "; }
	if ($LName != '')  			{ $SQL .= $Cntr . 'LastName LIKE "%' . $LName . '%" ';   $Cntr = 'AND ';  $echoString = $echoString . "surname=$LName, "; }
	if ($Spouse != '')  			{ $SQL .= $Cntr . 'Spouse LIKE "%' . $Spouse . '%" ';   $Cntr = 'AND ';  $echoString = $echoString . "spouse=$Spouse, "; }

	if ($Occupation != '')  		{ $SQL .= $Cntr . 'Occupation LIKE "%' . $Occupation . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "comments=$Occupation, "; }
	if ($PostNominals != '')  		{ $SQL .= $Cntr . 'PostNominals LIKE "%' . $PostNominals . '%" ';   $Cntr = 'AND ';     $echoString = $echoString . "post nominals=$PostNominals, "; }
	if ($OtherPNs != '')  			{ $SQL .= $Cntr . 'OtherPNs LIKE "%' . $OtherPNs . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "other PNs=$OtherPNs, "; }
	if ($elist == 1)  			{ $SQL .= $Cntr . 'EnrolledElist = 1 ';   $Cntr = 'AND ';    $echoString = $echoString . "enrolled elist=yes, "; }
	if ($elist == 0)  			{ $SQL .= $Cntr . 'EnrolledElist = 0 ';   $Cntr = 'AND ';    $echoString = $echoString . "enrolled elist=no, "; }

	if ($Interests != '')  			{ $SQL .= $Cntr . 'Interests LIKE "%' . $Interests . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "interests=$Interests, "; }
	if ($HeardFrom != '')  			{ $SQL .= $Cntr . 'HeardFrom LIKE "%' . $HeardFrom . '%" ';   $Cntr = 'AND ';     $echoString = $echoString . "heard from=$HeardFrom, "; }
	if ($Gender == "M")  			{ $SQL .= $Cntr . 'Gender = "M" ';   $Cntr = 'AND ';    $echoString = $echoString . "gender=$Gender, "; }
	if ($Gender == "F")  			{ $SQL .= $Cntr . 'Gender = "F" ';   $Cntr = 'AND ';   $echoString = $echoString . "gender=$Gender, "; }

	if ($Injury == 1)  			{ $SQL .= $Cntr . 'Injury = 1 ';   $Cntr = 'AND ';   $echoString = $echoString . "injury=$Injury, "; }
	if ($InjuryReport != '') 		{ $SQL .= $Cntr . 'InjuryReport LIKE "%' . $InjuryReport . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "injury report=$InjuryReport, "; }
	if ($FirstAid == 1)  			{ $SQL .= $Cntr . 'FirstAidTraining = 1 ';   $Cntr = 'AND ';   $echoString = $echoString . "first aid training=$FirstAid, ";  }
	if ($PreviousMartial == 1)  		{ $SQL .= $Cntr . 'PreviousMartial = 1 ';   $Cntr = 'AND ';   $echoString = $echoString . "previous martial arts experience=$PreviousMartial, ";   }
	if ($Deceased == 1)  			{ $SQL .= $Cntr . 'Deceased = 1 ';   $Cntr = 'AND ';    $echoString = $echoString . "deceased=$Deceased, "; }
//	if ($Rank*1 > 0) 			{ $SQL .= $Cntr . 'Rank = ' . $Rank . ' ';     $Cntr = 'AND ';   $echoString = $echoString . "rank=$Rank, "; }

	if ($Arms == 1)  			{ $SQL .= $Cntr . 'Armigerous = 1 ';   $Cntr = 'AND ';    $echoString = $echoString . "armigerous=$Arms, "; }
	if ($ArmsSource != '')  		{ $SQL .= $Cntr . 'ArmsSource LIKE "%' . $ArmsSource . '%" ';    $echoString = $echoString . "source of arms=$ArmsSource, "; }

	$SQL .= 'ORDER BY P.LastName';

//echo ('sql statement = '.$SQL);

	$echoString = substr($echoString, 0, -2);

$header_title = "Custom Online Listings";
include 'sub_header.php';
?>
<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>Membership Custom Online Listing : '.$full_date.'</caption>');
	echo ('<tr><th>Name</th><th>City</th><th>EMail</th><th>Telephone (H)</th><th>Status&nbsp;</th><th>Photo&nbsp;</th></tr>');
	echo ('<tr><td colspan="6" bgcolor="#FDD017" align="left"><font face="arial,helvetica" size="-2"><i>&nbsp;Search criteria : '.$echoString.'</i></font></td></tr>');

	// if fees good till was included in the search criteria, modify the report by grouping the output based on month and then previous month
	if ($goodTill == 1)
		{
		echo ('<tr><td colspan="6" bgcolor="#B5EAAA" align="left"><font face="arial,helvetica" size="-2"><i>&nbsp;Fees paid up till : '.$FeesGoodTillDate.'</i></font></td></tr>');
		}
	$count = 0;
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$memberStatus = $Line->MemberStatus_ID;
		include 'sub_report_statuses.php';
		include 'sub_select_reports.php';
		$count++;
		}
	echo ('<tr bgcolor="grey"><td colspan="6"><font style="font-size:7.5pt;color:white;"><b>&nbsp;Total: </b>'.$count.'</td></tr><tr><td colspan="6">&nbsp;</td></tr>');

	// if fees good till was included in the search criteria, modify the report by grouping the output based on month and then previous month and then second prevoius month
	if ($goodTill == 1)
		{
		$count = 0;
		echo ('<tr><td colspan="6">&nbsp;</td></tr><tr><td colspan="4" bgcolor="#FBBBB9" align="left"><font face="arial,helvetica" size="-2"><i>&nbsp;Lapsed members - previous month paid : '. $prev_good_date . '</i></font></td></tr>');
		$ResultPrevFee = mysql_query($SQLPrevFee, $LinkID);
		while ($Line = mysql_fetch_object($ResultPrevFee)) {
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_reports.php';
			$count++;
			}
		echo ('<tr bgcolor="grey"><td colspan="6"><font style="font-size:7.5pt;color:white;"><b>&nbsp;Total: </b>'.$count.'</td></tr><tr><td colspan="6">&nbsp;</td></tr>');
		mysql_free_result($ResultPrevFee);
		mysql_free_result($ResultPrevFee_cnt);

		$count = 0;
		echo ('<tr><td colspan="6">&nbsp;</td></tr><tr><td colspan="6" bgcolor="#FBBBB9" align="left"><font face="arial,helvetica" size="-2"><i>&nbsp;Lapsed members - 2nd previous month paid : '. $prev2_good_date . '</i></font></td></tr>');
		$ResultPrev2Fee = mysql_query($SQLPrev2Fee, $LinkID);
		while ($Line = mysql_fetch_object($ResultPrev2Fee)) {
			$memberStatus = $Line->MemberStatus_ID;
			include 'sub_report_statuses.php';
			include 'sub_select_reports.php';
			$count++;
			}
		echo ('<tr bgcolor="grey"><td colspan="6"><font style="font-size:7.5pt;color:white;"><b>&nbsp;Total: </b>'.$count.'</td></tr><tr><td colspan="6">&nbsp;</td></tr>');
		mysql_free_result($ResultPrev2Fee);
		mysql_free_result($ResultPrev2Fee_cnt);
		}  // end if good till
	mysql_free_result($Result);
	mysql_free_result($Result2);
echo ('</table>');
include 'sub_report_legend.php';
} // end function : CustomData

Function Custom($LinkID,$State,$table_width,$rec_ID,$school,$login_ID,$seclvl) 
{
?>
<!-- begin page header -->
<table align="center" width="100%" cellpadding="3" cellspacing="0" border="0">
<tr class="purple_grad">
	<td class="purple_grad">&nbsp;<?=$school?> Membership Database: Custom Online Listings<span style="float:right"><i>Logged in as: <?=$login_ID?>&nbsp;</i></span></td>
</tr></table
<!-- end page header -->
<!--<form name="Custom" method="post" action="Custom.php">-->
<form name="Custom" method="post" action="index.php?PGM=Custom&State=CustomData&SCH=<?=$school?>&LGID=<?=$login_ID?>&RID=<?=$rec_ID?>&SECL=<?=$seclvl?>">
<table border="0" width="<?=$table_width?>" cellpadding="0" cellspacing="2" bgcolor="lightgrey" bordercolor="#000000">
<tr>
	<td colspan="2" align="center" valign="center"><table border="1" width="100%"><tr><th align="center">CUSTOM ONLINE LISTINGS - Search Criteria</th></tr></table></td>
</tr>
<tr>
	<td colspan="2"><div class="NavText"><table border="1" width="100%"><tr><th align="center">Martial Styles Searchable Fields</td></tr></table></td>
</tr>
<tr>
	<td colspan="2"><table width=100% border="0">
		<tr>
		<td  valign="center" id="Label">Armazare:&nbsp;<input type="checkbox" name="armazare" value="1"  <?=$Line3->armazare == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
		Daga:&nbsp;<input type="checkbox" name="daga" value="1"  <?=$Line3->daga == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
		Spada:&nbsp;<input type="checkbox" name="spada" value="1"  <?=$Line3->spada == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
		Spada longa:&nbsp;<input type="checkbox" name="spadalonga" value="1"  <?=$Line3->spadalonga == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
		&nbsp;</td>
		<td  valign="center" id="Label">Sword & buckler:&nbsp;<input type="checkbox" name="swordbuckler" value="1"  <?=$Line3->swordbuckler == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
		Langes Schwert:&nbsp;<input type="checkbox" name="langesschwert" value="1"  <?=$Line3->langesschwert == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
		Pollaxe:&nbsp;<input type="checkbox" name="pollaxe" value="1"  <?=$Line3->pollaxe == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
		Spear:&nbsp;<input type="checkbox" name="spear" value="1"  <?=$Line3->spear == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
		&nbsp;</td>
		<td  valign="center" id="Label">Armoured combat:&nbsp;<input type="checkbox" name="armouredcombat" value="1"  <?=$Line3->armouredcombat == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
		Quarter-staff:&nbsp;<input type="checkbox" name="quarterstaff" value="1"  <?=$Line3->quarterstaff == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
		Archery:&nbsp;<input type="checkbox" name="archery" value="1"  <?=$Line3->archery == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
		Mounted Combat:&nbsp;<input type="checkbox" name="mountedcombat" value="1"  <?=$Line3->mountedcombat == "1" ? "CHECKED" : ""?> style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;<br />
		&nbsp;</td>
		</tr></table></td>
</tr>
<tr>
	<td colspan="2"><div class="NavText"><table border="1" width="100%"><tr><th align="center">Other Searchable Fields</td></tr></table></td>
</tr>
<tr>
	<td width="50%" id="Label">First Name: <input type="text" maxlength="25" size="20" name="FName" id="FName"></td>
	<td width="50%" id="Label">Surname: <input type="text" maxlength="45" size="20" name="LName" id="LName">&nbsp;&nbsp;</td>
</tr>
<tr>
	<td width="50%" id="Label">Spouse: <input type="text" maxlength="20" size="20" name="Spouse" id="Spouse"></td>
	<td width="50%" id="Label">&nbsp;&nbsp;</td>
</tr>
<tr>
	<td colspan="2" id="Label"><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;enrolled in the AEMMA elist?&nbsp;&nbsp;yes:&nbsp;&nbsp;<input type="checkbox" name="elist" value="1" style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;no:&nbsp;&nbsp;<input type="checkbox" name="elist" value="0" style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;do not include in search:&nbsp;&nbsp;<input type="checkbox" name="elist" value="2" style="vertical-align:middle;" checked></div></td>
<tr>
	<td colspan="2" id="Label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Armigerous: <input type="checkbox" name="Arms" value="1" style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Source of Arms: <input type="text" maxlength="64" size="40" name="ArmsSource" id="ArmsSource">&nbsp;&nbsp;</td>
</tr>
<tr>
	<td width="50%" id="Label">Injury: <input type="checkbox" name="Injury" value="1" style="vertical-align:middle;"></td>
	<td width="50%" id="Label">Post-Nominals: <input type="text" maxlength="64" size="16" name="PostNominals" id="PostNominals">&nbsp;&nbsp;</td>
</tr>
<tr>
	<td width="50%" id="Label">First Aid Training: <input type="checkbox" name="FirstAid" value="1" style="vertical-align:middle;"></td>
	<td width="50%" id="Label" align="right">Other PN's: <input type="text" maxlength="64" size="16" name="OtherPNs" id="OtherPNs">&nbsp;&nbsp;</td>
</tr>
<tr>
	<td width="50%" id="Label">Previous Martial Arts Experience: <input type="checkbox" name="PreviousMartial" value="1" style="vertical-align:middle;"></td>
	<td width="50%" id="Label" align="right">Interests: <input type="text" maxlength="64" size="20" name="Interests" id="Interests">&nbsp;&nbsp;</td>
</tr>
<tr>
	<td width="50%" id="Label">Deceased: <input type="checkbox" name="Deceased" value="1" style="vertical-align:middle;"></td>
	<td width="50%" id="Label">Occupation: <input type="text" maxlength="32" size="20" name="Occupation" id="Occupation">&nbsp;&nbsp;</td>
</tr>
<tr>
	<td width="50%" id="Label">Rank: <select name="Rank">
<?php
	$Result = mysql_query('SELECT ID, Description FROM Rank ORDER BY ID', $LinkID);
	echo ('<option value = "0">-');
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<option value = "' . $Line->ID . '">' . $Line->Description);
		}
?>
	</select></td>
	<td width="50%" id="Label">Heard From: <input type="text" maxlength="32" size="20" name="HeardFrom" id="HeardFrom">&nbsp;&nbsp;</td>
</tr>
<tr>
	<td align="center" width="50%"><table border="1" width="100%"><tr><th align="center">Select Chapter(s) to List</th></tr></table></td>
	<td align="center" width="50%"><table border="1" width="100%"><tr><th align="center">Restrict Listing by Financial Data</th></tr></table></td>
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
			echo ('<td valign="top" width="25%" id="Label">');
			if ($Line->CS_Desc != 'New' And $Line->CS_Desc != 'Active') { echo ('<font color="red">'); }
			echo ($Line->C_Desc . ': <input type=checkbox value="' . $Line->C_ID . '" name ="' . str_replace(' ', '', $Line->C_Desc) . '"');
			echo (' style="vertical-align:middle;"><br /><font color="black"></td>');
			if ($Cntr%2 == 1) { echo ('</tr>'); }
			$Cntr++;
			}
?>
		</table></td>
	<td valign="top" id="Label" rowspan="3">
	Status: <select name="MemStatus">
<?php
	$Result = mysql_query('SELECT ID, Description FROM MemberStatus ORDER BY ID', $LinkID);
	echo ('<option value = "0">-');
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<option value = "' . $Line->ID . '">' . $Line->Description);
		}
?>
	</select>&nbsp;&nbsp;<br />
	Fees Good Till Date: <input type="text" maxlength="10" size="10" name="FeesGoodTillDate" id="FeesGoodTillDate">&nbsp;&nbsp;
	<script type="text/javascript">
		Calendar.setup( {
			inputField : "FeesGoodTillDate",
			ifFormat   : "%Y-%m-%d"
		});
	</script><br />
	Mem. Type: <select name="MemType">
<?php
	$Result = mysql_query('SELECT ID, Description FROM MemberType ORDER BY ID', $LinkID);
	echo ('<option value = "0">-');
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<option value="' .$Line->ID . '">' . $Line->Description);
		}
?>	
	</select>&nbsp;&nbsp;<br />
	Payment Method: <select name="PayMethod">
<?php
	$Result = mysql_query('SELECT ID, Description FROM PayMethod ORDER BY ID', $LinkID);
	echo ('<option value = "0">-');
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<option value="' . $Line->ID . '">' . $Line->Description);
		}
?>
	</select>&nbsp;&nbsp;<br />
	Payment Date: <input type="text" maxlength="10" size="10" name="PayDate" id="PayDate">&nbsp;&nbsp;
	<script type="text/javascript">
		Calendar.setup( {
			inputField : "PayDate",
			ifFormat   : "%Y-%m-%d"
		});
	</script></td>
</tr>
<tr>
	<td align="center" width="50%"><table border="1" width="100%"><tr><th align="center">Gender to List</th></tr></table></td>
</tr>
<tr>
	<td width="50%" id="Label"><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;male:&nbsp;&nbsp;<input type="checkbox" name="Gender" value="M" style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;female:&nbsp;&nbsp;<input type="checkbox" name="Gender" value="F" style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center></td>
</tr>
<tr>
	<td><div class="NavText"><table border="1" width="100%"><tr><th align="center">Armoured Harness Search</td></tr></table></td>
	<td><div class="NavText"><table border="1" width="100%"><tr><th align="center">Unarmoured Harness Search</td></tr></table></td>
</tr>
<tr>
	<td><textarea name="ArmouredHarnessDesc" rows="2" cols="37" wrap="virtual" maxlength="10"></textarea><br /></td>
	<td><textarea name="UnarmouredHarnessDesc" rows="2" cols="37" wrap="virtual" maxlength="10"></textarea><br /></td>
</tr>
<tr>
	<td><div class="NavText"><table border="1" width="100%"><tr><th align="center">Training Comments Search</td></tr></table></td>
	<td><div class="NavText"><table border="1" width="100%"><tr><th align="center">Comments Search</td></tr></table></td>
</tr>
<tr>
	<td><textarea name="TrainingComments" rows="2" cols="37" wrap="virtual" maxlength="10"></textarea><br /></td>
	<td><textarea name="Comments" rows="2" cols="37" wrap="virtual" maxlength="10"></textarea><br /></td>
</tr>
<tr>
	<td><div class="NavText"><table border="1" width="100%"><tr><th align="center">Archery Equipment Search</td></tr></table></td>
	<td><div class="NavText"><table border="1" width="100%"><tr><th align="center">Period Garments Search</td></tr></table></td>
</tr>
<tr>
	<td><textarea name="ArcheryDesc" rows="2" cols="37" wrap="virtual" maxlength="10"></textarea><br /></td>
	<td><textarea name="PeriodGarments" rows="2" cols="37" wrap="virtual" maxlength="10"></textarea><br /></td>
</tr>
<tr>
	<td colspan="2"><div class="NavText"><table border="1" width="100%"><tr><th align="center">Injuries Report</td></tr></table></td>
</tr>
<tr>
	<td colspan="2"><textarea name="InjuryReport" rows="2" cols="75" wrap="virtual" maxlength="10"></textarea><br /></td>
</tr>
<tr>
	<td colspan="2" align="center">
	<input type="hidden" name="seclvl" value="<?=$seclvl?>">
	<input type="hidden" name="rec_ID" value="<?=$rec_ID?>">
	<input type="hidden" name="school" value="<?=$school?>">
	<input type="hidden" name="login_ID" value="<?=$login_ID?>">
	<input type="hidden" name="State" value="CustomData">
	<input type="Submit" value="Generate Online Listing of Membership Records">
	</td><td id="Label"></td>
</tr>
</table>
</form>
<?php
} //end function: Custom

// Main Loop
// The main loop.  Call functions based on the value of $_POST["state"], which gets set
// via a hidden INPUT TYPE, or through URL parameters called by NavBar Click event.
if (isset($_POST['seclvl']))	{ $seclvl = $_POST['seclvl']; }
if (isset($_POST['rec_ID']))	{ $rec_ID = $_POST['rec_ID']; }
if (isset($_POST['school']))	{ $school = $_POST['school']; }
if (isset($_POST['login_ID']))	{ $login_ID = $_POST['login_ID']; }
if (isset($_POST['State']))	{ $State = $_POST['State']; }
if (isset($_GET['State']))	{ $State = $_GET['State']; }

if ($seclvl < 4) 
	{
	echo ('<script type="text/JavaScript">');
	echo ('parent.location.href="index.php?PGM=Begin&MSG=ERROR: You do not have the necessary permissions to create custom listings of data!"');
	echo ('</script>');
        }
else 
	{

	$LinkID=dbConnect($DB);
	switch($State) 
		{
		case 'Status':
			phpinfo();
			break;
		case 'Custom':
			Custom($LinkID,$State,$table_width,$rec_ID,$school,$login_ID,$seclvl);
			break;
		case 'CustomData':
			$Toronto         	= isset($_POST['Toronto'])		?  $_POST['Toronto'] : "";
			$Guelph     	 	= isset($_POST['Guelph'])		?  $_POST['Guelph'] : "";
			$Stratford     	 	= isset($_POST['Stratford'])		?  $_POST['Stratford'] : "";
			$NS     	 	= isset($_POST['NovaScotia'])		?  $_POST['NovaScotia'] : "";

			$Arms     		= isset($_POST['Arms'])			?  $_POST['Arms'] : "";
			$Injury     	 	= isset($_POST['Injury'])		?  $_POST['Injury'] : "";
			$PreviousMartial	= isset($_POST['PreviousMartial'])	?  $_POST['PreviousMartial'] : "";
			$FirstAidTraining	= isset($_POST['FirstAidTraining'])	?  $_POST['FirstAidTraining'] : "";
			$Deceased		= isset($_POST['Deceased'])		?  $_POST['Deceased'] : "";
			$elist			= isset($_POST['EnrolledElist'])	?  $_POST['EnrolledElist'] : 2;

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
			CustomData($LinkID, $State,$rec_ID,$school,$login_ID,$seclvl,$table_width,$_POST['FName'], $_POST['LName'], $_POST['Spouse'], $Toronto, $Guelph, $Stratford, $NS, $_POST['MemStatus'], $_POST['MemType'], $_POST['FeesGoodTillDate'],
				$_POST['PayMethod'], $_POST['PayDate'], trim($_POST['Comments']), $_POST['Occupation'], $_POST['PostNominals'], $_POST['OtherPNs'], $elist,
				$_POST['Gender'],  $_POST['Interests'], $Arms, $_POST['ArmsSource'], $Injury, trim($_POST['InjuryReport']), $PreviousMartial, $FirstAidTraining, $Deceased, $_POST['Rank'],
				$_POST['HeardFrom'],  trim($_POST['ArmouredHarnessDesc']), trim($_POST['UnarmouredHarnessDesc']), trim($_POST['TrainingComments']), trim($_POST['PeriodGarments']),  trim($_POST['ArcheryDesc']),
				$armazare, $daga, $spada, $spadalonga, $swordbuckler, $pollaxe, $spear, $armouredcombat, $quarterstaff, $archery, $langesschwert, $mountedcombat );
			break;
		}
	dbClose($LinkID);
	}
?>
