<?php
	session_start();
	include_once 'IDValid.php';
	include_once 'DB.php';

Function CustomData($LinkID, $State, $Toronto, $Guelph, $MemStatus, $MemType, $FeesGoodTillDate, $PayMethod, $PayDate, $Comments,
				$Occupation, $PostNominals, $OtherPNs, $Gender, $Interests, $Arms, $ArmsSource, $Injury, $PreviousMartial, $FirstAidTraining, $Deceased,
				$HeardFrom, $ArmouredHarnessDesc, $UnarmouredHarnessDesc, $TrainingComments, $PeriodGarments, $ArcheryDesc, $TTAC3Desc,
				$armazare, $daga, $spada, $spadalonga, $swordbuckler, $pollaxe, $spear, $armouredcombat, $quarterstaff, $archery, $langesschwert, $mountedcombat, $ttac3 ) {

// Build the SELECT Statement here.

	$echoString = "";
	$goodTill = 0;

	$SQL  = 'SELECT P.FirstName, P.MiddleInitial, P.LastName, P.Salutation, P.AddressProtocol, P.Address1, P.Address2, P.Address3, P.City, ';
	$SQL .= '       P.ProvState, P.PCZip, P.Country, P.NumHome, P.NumOffice, P.NumFax, P.NumMobile, P.EMail, P.EmergContactName, P.EmergContactPhone, ';
	$SQL .= '       P.Occupation, P.Gender, P.TransportationMode, P.PreviousMartial, P.Spouse, P.BirthDate, P.Deceased, P.DeceasedDate, P.Interests, P.Armigerous, ';
	$SQL .= '       P.ArmsSource, P.PostNominals, P.OtherPNs, P.AcademicDegree, P.AcademicInstitution, P.FirstAidTraining, P.Injury, P.EnrolledElist, P.DateJoined, P.HeardFrom, ';
	$SQL .= '       P.FeesGoodTillDate, P.PaymentReceived, P.Medical, P.ArmouredHarness, P.ArmouredHarnessDescription, P.UnarmouredHarnessDescription, P.Rank, P.RankDate, P.RankLoc, ';
	$SQL .= '       P.TrainingComments, P.Comments, P.PeriodGarments, P.ArcheryDescription, P.TTAC3Description, P.ID, P.MemberStatus_ID, P.MemberType_ID, P.PayMethod_ID ';
	$SQL .= 'FROM   People P ';

	$MartialCnt = $armazare*1 + $daga*1 + $spada*1 + $spadalonga*1 + $swordbuckler*1 + $pollaxe*1 + $spear*1 + $armouredcombat*1 + $quarterstaff*1 + $archery*1 + $langesschwert*1 + $mountedcombat*1 + $ttac3*1 ;
	if ($MartialCnt > 0 )
		{
		$SQL .= 'INNER JOIN Members_Martial MM ON MM.People_ID = P.ID ';
		if ($armazare != '')         		{ $SQL .= 'AND armazare = 1 ';  $echoString = $echoString . "armazare=1, "; }
		if ($daga != '')         			{ $SQL .= 'AND daga = 1 ';  $echoString = $echoString . "daga=1, "; }
		if ($spada != '')         		{ $SQL .= 'AND spada = 1 ';  $echoString = $echoString . "spada=1, "; }
		if ($spadalonga != '')         	{ $SQL .= 'AND spadalonga = 1 ';  $echoString = $echoString . "spadalonga=1, "; }
		if ($swordbuckler != '')      	{ $SQL .= 'AND swordbuckler = 1 ';  $echoString = $echoString . "swordbuckler=1, "; }
		if ($pollaxe != '')         		{ $SQL .= 'AND pollaxe = 1 ';  $echoString = $echoString . "pollaxe=1, "; }
		if ($spear != '')         			{ $SQL .= 'AND spear = 1 ';  $echoString = $echoString . "spear=1, "; }
		if ($armouredcombat != '')      	{ $SQL .= 'AND armouredcombat = 1 ';  $echoString = $echoString . "armouredcombat=1, "; }
		if ($quarterstaff != '')         	{ $SQL .= 'AND quarterstaff = 1 ';  $echoString = $echoString . "quarterstaff=1, "; }
		if ($archery != '')         		{ $SQL .= 'AND archery = 1 ';  $echoString = $echoString . "archery=1, "; }
		if ($langesschwert != '')         	{ $SQL .= 'AND langesschwert = 1 ';  $echoString = $echoString . "langesschwert=1, "; }
		if ($mountedcombat != '')    	{ $SQL .= 'AND mountedcombat = 1 ';  $echoString = $echoString . "mountedcombat=1, "; }
		if ($ttac3 != '')    			{ $SQL .= 'AND ttac3 = 1 ';  $echoString = $echoString . "TTAC3=1, "; }
		}

	$Cntr  = $Toronto*1 + $Guelph*1;

	if ($Cntr > 0 ) {
		$Cntr = '';
		$SQL .= 'INNER JOIN Members_Chapter MC ON P.ID = MC.People_ID AND MC.Chapter_ID IN (';
		if ($Toronto != '')	{ $Cntr .= $Toronto . ', '; $echoString = $echoString . "Toronto=1, ";}
		if ($Guelph != '')      	{ $Cntr .= $Guelph . ', ';  $echoString = $echoString . "Guelph=1, "; }
		if ($Toronto != '' and $Guelph != '') { $echoString = $echoString . "Toronto & Guelph=1, ";  }
		$SQL .= substr($Cntr, 0, -2) . ') ';
	}

	$Cntr = 'WHERE ';
	if ($MemStatus*1 > 0) 				{ $SQL .= $Cntr . 'MemberStatus_ID = ' . $MemStatus . ' ';  $Cntr = 'AND '; $echoString = $echoString . "member status=$MemStatus, "; }
	if ($MemType*1 > 0)   				{ $SQL .= $Cntr . 'MemberType_ID = ' . $MemType . ' ';      $Cntr = 'AND ';  $echoString = $echoString . "member type=$MemType, "; }
	if ($PayMethod*1 > 0) 				{ $SQL .= $Cntr . 'PayMethod_ID = ' . $PayMethod . ' ';     $Cntr = 'AND ';   $echoString = $echoString . "payment method=$PayMethod, "; }
	if ($PayDate != '')   					{ $SQL .= $Cntr . 'PaymentReceived >= "' . $PayDate . '" '; $Cntr = 'AND ';   $echoString = $echoString . "payment date=$PayDate, "; }
	if ($FeesGoodTillDate != '')			{ $SQL .= $Cntr . 'FeesGoodTillDate >= "' . $FeesGoodTillDate . '" '; $Cntr = 'AND ';   $echoString = $echoString . "fees good till=$FeesGoodTillDate, "; $goodTill = 1; }

	if ($Comments != '')  				{ $SQL .= $Cntr . 'Comments LIKE "%' . $Comments . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "comments=$Comments, "; }
	if ($TrainingComments != '')  			{ $SQL .= $Cntr . 'TrainingComments LIKE "%' . $TrainingComments . '%" ';   $Cntr = 'AND ';   $echoString = $echoString . "training comments=$TrainingComments, "; }
	if ($ArmouredHarnessDesc != '')  		{ $SQL .= $Cntr . 'ArmouredHarnessDescription LIKE "%' . $ArmouredHarnessDesc . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "armoured harness=$ArmouredHarnessDesc, "; }
	if ($UnarmouredHarnessDesc != '') 		{ $SQL .= $Cntr . 'UnarmouredHarnessDescription LIKE "%' . $UnarmouredHarnessDesc . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "unarmoured harness=$UnarmouredHarnessDesc, ";}
	if ($PeriodGarments != '') 			{ $SQL .= $Cntr . 'PeriodGarments LIKE "%' . $PeriodGarments . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "period garments=$PeriodGarments, "; }
	if ($ArcheryDesc != '') 				{ $SQL .= $Cntr . 'ArcheryDescription LIKE "%' . $ArcheryDesc . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "archery description=$ArcheryDesc, "; }
	if ($TTAC3Desc != '') 				{ $SQL .= $Cntr . 'TTAC3Description LIKE "%' . $TTAC3Desc . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "TTAC3 description=$TTAC3Desc, "; }

	if ($Occupation != '')  				{ $SQL .= $Cntr . 'Occupation LIKE "%' . $Occupation . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "comments=$Occupation, "; }
	if ($PostNominals != '')  				{ $SQL .= $Cntr . 'PostNominals LIKE "%' . $PostNominals . '%" ';   $Cntr = 'AND ';     $echoString = $echoString . "post nominals=$PostNominals, "; }
	if ($OtherPNs != '')  					{ $SQL .= $Cntr . 'OtherPNs LIKE "%' . $OtherPNs . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "other PNs=$OtherPNs, "; }
	if ($Interests != '')  					{ $SQL .= $Cntr . 'Interests LIKE "%' . $Interests . '%" ';   $Cntr = 'AND ';    $echoString = $echoString . "interests=$Interests, "; }
	if ($HeardFrom != '')  				{ $SQL .= $Cntr . 'HeardFrom LIKE "%' . $HeardFrom . '%" ';   $Cntr = 'AND ';     $echoString = $echoString . "heard from=$HeardFrom, "; }
	if ($Gender == "M")  				{ $SQL .= $Cntr . 'Gender = "M" ';   $Cntr = 'AND ';    $echoString = $echoString . "gender=$Gender, "; }
	if ($Gender == "F")  					{ $SQL .= $Cntr . 'Gender = "F" ';   $Cntr = 'AND ';   $echoString = $echoString . "gender=$Gender, "; }

	if ($Injury == 1)  					{ $SQL .= $Cntr . 'Injury = 1 ';   $Cntr = 'AND ';   $echoString = $echoString . "injury=$Injury, "; }
	if ($FirstAid == 1)  					{ $SQL .= $Cntr . 'FirstAidTraining = 1 ';   $Cntr = 'AND ';   $echoString = $echoString . "first aid training=$FirstAid, ";  }
	if ($PreviousMartial == 1)  			{ $SQL .= $Cntr . 'PreviousMartial = 1 ';   $Cntr = 'AND ';   $echoString = $echoString . "previous martial arts experience=$PreviousMartial, ";   }
	if ($Deceased == 1)  				{ $SQL .= $Cntr . 'Deceased = 1 ';   $Cntr = 'AND ';    $echoString = $echoString . "deceased=$Deceased, "; }

	if ($Arms == 1)  					{ $SQL .= $Cntr . 'Armigerous = 1 ';   $Cntr = 'AND ';    $echoString = $echoString . "armigerous=$Arms, "; }
	if ($ArmsSource != '')  				{ $SQL .= $Cntr . 'ArmsSource LIKE "%' . $ArmsSource . '%" ';    $echoString = $echoString . "source of arms=$ArmsSource, "; }

	$SQL .= 'ORDER BY P.LastName';

//echo ('sql statement = '.$SQL);
	$echoString = substr($echoString, 0, -2);

// build a second set of SQL statements that will pull data from the database in the same manner as the original search query, except
// that the list now includes those records that have Fees Good Till for the previous month of the one entered above

	if ($goodTill == 1)
		{
		$good_date 	= $FeesGoodTillDate;	
		$month 		= substr($good_date, 5, 2); 
		$year		= substr($good_date, 0, 4);
		$day		= substr($good_date, 8, 2);
		$prev_month	= $month*1 - 1;
		if ($prev_month == 0) { $prev_month = 12; $year = $year*1 + 1; }
		$prev_good_date = $year ."-". $prev_month ."-". $day;

		$prev2_month	= $prev_month - 1;
		if ($prev2_month == 0) { $prev2_month = 12; $year = $year*1 + 1; }
		$prev2_good_date = $year ."-". $prev2_month ."-". $day;

		$SQLPrevFee  = 'SELECT P.FirstName, P.MiddleInitial, P.LastName, P.Salutation, P.AddressProtocol, P.Address1, P.Address2, P.Address3, P.City, ';
		$SQLPrevFee .= '       P.ProvState, P.PCZip, P.Country, P.NumHome, P.NumOffice, P.NumFax, P.NumMobile, P.EMail, P.EmergContactName, P.EmergContactPhone, ';
		$SQLPrevFee .= '       P.Occupation, P.Gender, P.TransportationMode, P.PreviousMartial, P.Spouse, P.BirthDate, P.Deceased, P.DeceasedDate, P.Interests, P.Armigerous, ';
		$SQLPrevFee .= '       P.ArmsSource, P.PostNominals, P.OtherPNs, P.AcademicDegree, P.AcademicInstitution, P.FirstAidTraining, P.Injury, P.EnrolledElist, P.DateJoined, P.HeardFrom, ';
		$SQLPrevFee .= '       P.FeesGoodTillDate, P.PaymentReceived, P.Medical, P.ArmouredHarness, P.ArmouredHarnessDescription, P.UnarmouredHarnessDescription, P.Rank, P.RankDate, P.RankLoc, ';
		$SQLPrevFee .= '       P.TrainingComments, P.Comments, P.PeriodGarments, P.ArcheryDescription, P.TTAC3Description, P.ID, P.MemberStatus_ID, P.MemberType_ID, P.PayMethod_ID ';
		$SQLPrevFee .= 'FROM   People P ';

		$CntrPrevFee  = $Toronto*1 + $Guelph*1;

		$MartialCnt = $armazare*1 + $daga*1 + $spada*1 + $spadalonga*1 + $swordbuckler*1 + $pollaxe*1 + $spear*1 + $armouredcombat*1 + $quarterstaff*1 + $archery*1 + $langesschwert*1 + $mountedcombat*1 + $ttac3*1;
		if ($MartialCnt > 0 )
			{
			$SQLPrevFee .= 'INNER JOIN Members_Martial MM ON MM.People_ID = P.ID ';
			if ($armazare != '')         		{ $SQLPrevFee .= 'AND armazare = 1 ';  }
			if ($daga != '')         			{ $SQLPrevFee .= 'AND daga = 1 ';   }
			if ($spada != '')         		{ $SQLPrevFee .= 'AND spada = 1 ';   }
			if ($spadalonga != '')         	{ $SQLPrevFee .= 'AND spadalonga = 1 ';   }
			if ($swordbuckler != '')      	{ $SQLPrevFee .= 'AND swordbuckler = 1 ';   }
			if ($pollaxe != '')         		{ $SQLPrevFee .= 'AND pollaxe = 1 ';    }
			if ($spear != '')         			{ $SQLPrevFee .= 'AND spear = 1 ';   }
			if ($armouredcombat != '')      	{ $SQLPrevFee .= 'AND armouredcombat = 1 ';  }
			if ($quarterstaff != '')         	{ $SQLPrevFee .= 'AND quarterstaff = 1 ';  }
			if ($archery != '')         		{ $SQLPrevFee .= 'AND archery = 1 ';  }
			if ($langesschwert != '')         	{ $SQLPrevFee .= 'AND langesschwert = 1 ';  }
			if ($mountedcombat != '')    	{ $SQLPrevFee .= 'AND mountedcombat = 1 ';   }
			if ($ttac3 != '')    			{ $SQLPrevFee .= 'AND ttac3 = 1 ';   }
			}

		if ($CntrPrevFee > 0 ) {
			$CntrPrevFee = '';
			$SQLPrevFee .= 'INNER JOIN Members_Chapter MC ON P.ID = MC.People_ID AND MC.Chapter_ID IN (';
			if ($Toronto != '')	{ $CntrPrevFee .= $Toronto . ', ';}
			if ($Guelph != '')      	{ $CntrPrevFee .= $Guelph . ', ';   }
			$SQLPrevFee .= substr($CntrPrevFee, 0, -2) . ') ';
		}

		$CntrPrevFee = 'WHERE ';
		if ($MemStatus*1 > 0) 				{ $SQLPrevFee .= $CntrPrevFee . 'MemberStatus_ID = ' . $MemStatus . ' ';  $CntrPrevFee = 'AND '; }
		if ($MemType*1 > 0)   				{ $SQLPrevFee .= $CntrPrevFee . 'MemberType_ID = ' . $MemType . ' ';      $CntrPrevFee = 'AND ';  }
		if ($PayMethod*1 > 0) 				{ $SQLPrevFee .= $CntrPrevFee . 'PayMethod_ID = ' . $PayMethod . ' ';     $CntrPrevFee = 'AND ';    }
		if ($PayDate != '')   					{ $SQLPrevFee .= $CntrPrevFee . 'PaymentReceived >= "' . $PayDate . '" '; $CntrPrevFee = 'AND ';    }
		if ($FeesGoodTillDate != '')   			{ $SQLPrevFee .= $CntrPrevFee . 'FeesGoodTillDate = "' . $prev_good_date . '" '; $CntrPrevFee = 'AND ';    }
	
		if ($Comments != '')  				{ $SQLPrevFee .= $CntrPrevFee . 'Comments LIKE "%' . $Comments . '%" ';   $CntrPrevFee = 'AND ';  }
		if ($TrainingComments != '')  			{ $SQLPrevFee .= $CntrPrevFee . 'TrainingComments LIKE "%' . $TrainingComments . '%" ';   $CntrPrevFee = 'AND ';  }
		if ($ArmouredHarnessDesc != '')  		{ $SQLPrevFee .= $CntrPrevFee . 'ArmouredHarnessDescription LIKE "%' . $ArmouredHarnessDesc . '%" ';   $CntrPrevFee = 'AND ';  }
		if ($UnarmouredHarnessDesc != '') 		{ $SQLPrevFee .= $CntrPrevFee . 'UnarmouredHarnessDescription LIKE "%' . $UnarmouredHarnessDesc . '%" ';   $CntrPrevFee = 'AND ';  }
		if ($PeriodGarments != '') 			{ $SQLPrevFee .= $CntrPrevFee . 'PeriodGarments LIKE "%' . $PeriodGarments . '%" ';   $CntrPrevFee = 'AND ';  }
		if ($ArcheryDesc != '') 				{ $SQLPrevFee .= $CntrPrevFee . 'ArcheryDescription LIKE "%' . $ArcheryDesc . '%" ';   $CntrPrevFee = 'AND ';  }
		if ($TTAC3Desc != '') 				{ $SQLPrevFee .= $CntrPrevFee . 'TTAC3Description LIKE "%' . $TTAC3Desc . '%" ';   $CntrPrevFee = 'AND ';  }

		if ($Occupation != '')  				{ $SQLPrevFee .= $CntrPrevFee . 'Occupation LIKE "%' . $Occupation . '%" ';   $CntrPrevFee = 'AND ';   }
		if ($PostNominals != '')  				{ $SQLPrevFee .= $CntrPrevFee . 'PostNominals LIKE "%' . $PostNominals . '%" ';   $CntrPrevFee = 'AND ';   }
		if ($OtherPNs != '')  					{ $SQLPrevFee .= $CntrPrevFee . 'OtherPNs LIKE "%' . $OtherPNs . '%" ';   $CntrPrevFee = 'AND ';  }
		if ($Interests != '')  					{ $SQLPrevFee .= $CntrPrevFee . 'Interests LIKE "%' . $Interests . '%" ';   $CntrPrevFee = 'AND ';    }
		if ($HeardFrom != '')  				{ $SQLPrevFee .= $CntrPrevFee . 'HeardFrom LIKE "%' . $HeardFrom . '%" ';   $CntrPrevFee = 'AND ';  }
		if ($Gender == "M")  				{ $SQLPrevFee .= $CntrPrevFee . 'Gender = "M" ';   $CntrPrevFee = 'AND ';  }
		if ($Gender == "F")  					{ $SQLPrevFee .= $CntrPrevFee . 'Gender = "F" ';   $CntrPrevFee = 'AND '; }

		if ($Injury == 1)  					{ $SQLPrevFee .= $CntrPrevFee . 'Injury = 1 ';   $CntrPrevFee = 'AND ';  }
		if ($FirstAid == 1)  					{ $SQLPrevFee .= $CntrPrevFee . 'FirstAidTraining = 1 ';   $CntrPrevFee = 'AND ';   }
		if ($PreviousMartial == 1)  			{ $SQLPrevFee .= $CntrPrevFee . 'PreviousMartial = 1 ';   $CntrPrevFee = 'AND ';     }
		if ($Deceased == 1)  				{ $SQLPrevFee .= $CntrPrevFee . 'Deceased = 1 ';   $CntrPrevFee = 'AND ';  }

		if ($Arms == 1)  					{ $SQLPrevFee .= $CntrPrevFee . 'Armigerous = 1 ';   $CntrPrevFee = 'AND ';   }
		if ($ArmsSource != '')  				{ $SQLPrevFee .= $CntrPrevFee . 'ArmsSource LIKE "%' . $ArmsSource . '%" ';  }

		$SQLPrevFee .= 'ORDER BY P.LastName';
	

// now, collect the student records that satisfy the second previous month for Fees Good Till
//
		$SQLPrev2Fee  = 'SELECT P.FirstName, P.MiddleInitial, P.LastName, P.Salutation, P.AddressProtocol, P.Address1, P.Address2, P.Address3, P.City, ';
		$SQLPrev2Fee .= '       P.ProvState, P.PCZip, P.Country, P.NumHome, P.NumOffice, P.NumFax, P.NumMobile, P.EMail, P.EmergContactName, P.EmergContactPhone, ';
		$SQLPrev2Fee .= '       P.Occupation, P.Gender, P.TransportationMode, P.PreviousMartial, P.Spouse, P.BirthDate, P.Deceased, P.DeceasedDate, P.Interests, P.Armigerous, ';
		$SQLPrev2Fee .= '       P.ArmsSource, P.PostNominals, P.OtherPNs, P.AcademicDegree, P.AcademicInstitution, P.FirstAidTraining, P.Injury, P.EnrolledElist, P.DateJoined, P.HeardFrom, ';
		$SQLPrev2Fee .= '       P.FeesGoodTillDate, P.PaymentReceived, P.Medical, P.ArmouredHarness, P.ArmouredHarnessDescription, P.UnarmouredHarnessDescription, P.Rank, P.RankDate, P.RankLoc, ';
		$SQLPrev2Fee .= '       P.TrainingComments, P.Comments, P.PeriodGarments, P.ArcheryDescription, P.TTAC3Description, P.ID, P.MemberStatus_ID, P.MemberType_ID, P.PayMethod_ID ';
		$SQLPrev2Fee .= 'FROM   People P ';

		$CntrPrev2Fee  = $Toronto*1 + $Guelph*1;

		$MartialCnt = $armazare*1 + $daga*1 + $spada*1 + $spadalonga*1 + $swordbuckler*1 + $pollaxe*1 + $spear*1 + $armouredcombat*1 + $quarterstaff*1 + $archery*1 + $langesschwert*1 + $mountedcombat*1 + $ttac3*1;
		if ($MartialCnt > 0 )
			{
			$SQLPrev2Fee .= 'INNER JOIN Members_Martial MM ON MM.People_ID = P.ID ';
			if ($armazare != '')         		{ $SQLPrev2Fee .= 'AND armazare = 1 ';  }
			if ($daga != '')         			{ $SQLPrev2Fee .= 'AND daga = 1 ';   }
			if ($spada != '')         		{ $SQLPrev2Fee .= 'AND spada = 1 ';   }
			if ($spadalonga != '')         	{ $SQLPrev2Fee .= 'AND spadalonga = 1 ';   }
			if ($swordbuckler != '')      	{ $SQLPrev2Fee .= 'AND swordbuckler = 1 ';   }
			if ($pollaxe != '')         		{ $SQLPrev2Fee .= 'AND pollaxe = 1 ';    }
			if ($spear != '')         			{ $SQLPrev2Fee .= 'AND spear = 1 ';   }
			if ($armouredcombat != '')      	{ $SQLPrev2Fee .= 'AND armouredcombat = 1 ';  }
			if ($quarterstaff != '')         	{ $SQLPrev2Fee .= 'AND quarterstaff = 1 ';  }
			if ($archery != '')         		{ $SQLPrev2Fee .= 'AND archery = 1 ';  }
			if ($langesschwert != '')         	{ $SQLPrev2Fee .= 'AND langesschwert = 1 ';  }
			if ($mountedcombat != '')    	{ $SQLPrev2Fee .= 'AND mountedcombat = 1 ';   }
			if ($ttac3 != '')    			{ $SQLPrev2Fee .= 'AND ttac3 = 1 ';   }
			}

		if ($CntrPrev2Fee > 0 ) {
			$CntrPrev2Fee = '';
			$SQLPrev2Fee .= 'INNER JOIN Members_Chapter MC ON P.ID = MC.People_ID AND MC.Chapter_ID IN (';
			if ($Toronto != '')	{ $CntrPrev2Fee .= $Toronto . ', ';}
			if ($Guelph != '')      	{ $CntrPrev2Fee .= $Guelph . ', ';   }
			$SQLPrev2Fee .= substr($CntrPrev2Fee, 0, -2) . ') ';
		}

		$CntrPrev2Fee = 'WHERE ';
		if ($MemStatus*1 > 0) 				{ $SQLPrev2Fee .= $CntrPrev2Fee . 'MemberStatus_ID = ' . $MemStatus . ' ';  $CntrPrev2Fee = 'AND '; }
		if ($MemType*1 > 0)   				{ $SQLPrev2Fee .= $CntrPrev2Fee . 'MemberType_ID = ' . $MemType . ' ';      $CntrPrev2Fee = 'AND ';  }
		if ($PayMethod*1 > 0) 				{ $SQLPrev2Fee .= $CntrPrev2Fee . 'PayMethod_ID = ' . $PayMethod . ' ';     $CntrPrev2Fee = 'AND ';    }
		if ($PayDate != '')   					{ $SQLPrev2Fee .= $CntrPrev2Fee . 'PaymentReceived >= "' . $PayDate . '" '; $CntrPrev2Fee = 'AND ';    }
		if ($FeesGoodTillDate != '')   			{ $SQLPrev2Fee .= $CntrPrev2Fee . 'FeesGoodTillDate = "' . $prev2_good_date . '" '; $CntrPrev2Fee = 'AND ';    }
	
		if ($Comments != '')  				{ $SQLPrev2Fee .= $CntrPrev2Fee . 'Comments LIKE "%' . $Comments . '%" ';   $CntrPrev2Fee = 'AND ';  }
		if ($TrainingComments != '')  			{ $SQLPrev2Fee .= $CntrPrev2Fee . 'TrainingComments LIKE "%' . $TrainingComments . '%" ';   $CntrPrev2Fee = 'AND ';  }
		if ($ArmouredHarnessDesc != '')  		{ $SQLPrev2Fee .= $CntrPrev2Fee . 'ArmouredHarnessDescription LIKE "%' . $ArmouredHarnessDesc . '%" ';   $CntrPrev2Fee = 'AND ';  }
		if ($UnarmouredHarnessDesc != '') 		{ $SQLPrev2Fee .= $CntrPrev2Fee . 'UnarmouredHarnessDescription LIKE "%' . $UnarmouredHarnessDesc . '%" ';   $CntrPrev2Fee = 'AND ';  }
		if ($PeriodGarments != '') 			{ $SQLPrev2Fee .= $CntrPrev2Fee . 'PeriodGarments LIKE "%' . $PeriodGarments . '%" ';   $CntrPrev2Fee = 'AND ';  }
		if ($ArcheryDesc != '') 				{ $SQLPrev2Fee .= $CntrPrev2Fee . 'ArcheryDescription LIKE "%' . $ArcheryDesc . '%" ';   $CntrPrev2Fee = 'AND ';  }
		if ($TTAC3Desc != '') 				{ $SQLPrev2Fee .= $CntrPrev2Fee . 'TTAC3Description LIKE "%' . $TTAC3Desc . '%" ';   $CntrPrev2Fee = 'AND ';  }

		if ($Occupation != '')  				{ $SQLPrev2Fee .= $CntrPrev2Fee . 'Occupation LIKE "%' . $Occupation . '%" ';   $CntrPrev2Fee = 'AND ';   }
		if ($PostNominals != '')  				{ $SQLPrev2Fee .= $CntrPrev2Fee . 'PostNominals LIKE "%' . $PostNominals . '%" ';   $CntrPrev2Fee = 'AND ';   }
		if ($OtherPNs != '')  					{ $SQLPrev2Fee .= $CntrPrev2Fee . 'OtherPNs LIKE "%' . $OtherPNs . '%" ';   $CntrPrev2Fee = 'AND ';  }
		if ($Interests != '')  					{ $SQLPrev2Fee .= $CntrPrev2Fee . 'Interests LIKE "%' . $Interests . '%" ';   $CntrPrev2Fee = 'AND ';    }
		if ($HeardFrom != '')  				{ $SQLPrev2Fee .= $CntrPrev2Fee . 'HeardFrom LIKE "%' . $HeardFrom . '%" ';   $CntrPrev2Fee = 'AND ';  }
		if ($Gender == "M")  				{ $SQLPrev2Fee .= $CntrPrev2Fee . 'Gender = "M" ';   $CntrPrev2Fee = 'AND ';  }
		if ($Gender == "F")  					{ $SQLPrev2Fee .= $CntrPrev2Fee . 'Gender = "F" ';   $CntrPrev2Fee = 'AND '; }

		if ($Injury == 1)  					{ $SQLPrev2Fee .= $CntrPrev2Fee . 'Injury = 1 ';   $CntrPrev2Fee = 'AND ';  }
		if ($FirstAid == 1)  					{ $SQLPrev2Fee .= $CntrPrev2Fee . 'FirstAidTraining = 1 ';   $CntrPrev2Fee = 'AND ';   }
		if ($PreviousMartial == 1)  			{ $SQLPrev2Fee .= $CntrPrev2Fee . 'PreviousMartial = 1 ';   $CntrPrev2Fee = 'AND ';     }
		if ($Deceased == 1)  				{ $SQLPrev2Fee .= $CntrPrev2Fee . 'Deceased = 1 ';   $CntrPrev2Fee = 'AND ';  }

		if ($Arms == 1)  					{ $SQLPrev2Fee .= $CntrPrev2Fee . 'Armigerous = 1 ';   $CntrPrev2Fee = 'AND ';   }
		if ($ArmsSource != '')  				{ $SQLPrev2Fee .= $CntrPrev2Fee . 'ArmsSource LIKE "%' . $ArmsSource . '%" ';  }

		$SQLPrev2Fee .= 'ORDER BY P.LastName';

	}  // end if feesgoodtill		


// figure out the number of rows (count) that satisfies the above selection criteria
// this will be included in the online report

	$SQL2  = 'SELECT count(*) Count ';
	$SQL2 .= 'FROM   People P ';

	$MartialCnt = $armazare*1 + $daga*1 + $spada*1 + $spadalonga*1 + $swordbuckler*1 + $pollaxe*1 + $spear*1 + $armouredcombat*1 + $quarterstaff*1 + $archery*1 + $langesschwert*1 + $mountedcombat*1 + $ttac3*1;
	if ($MartialCnt > 0 )
		{
		$SQL2 .= 'INNER JOIN Members_Martial MM ON MM.People_ID = P.ID ';
		if ($armazare != '')         		{ $SQL2 .= 'AND armazare = 1 ';  }
		if ($daga != '')         			{ $SQL2 .= 'AND daga = 1 ';   }
		if ($spada != '')         		{ $SQL2 .= 'AND spada = 1 ';   }
		if ($spadalonga != '')         	{ $SQL2 .= 'AND spadalonga = 1 ';   }
		if ($swordbuckler != '')      	{ $SQL2 .= 'AND swordbuckler = 1 ';   }
		if ($pollaxe != '')         		{ $SQL2 .= 'AND pollaxe = 1 ';    }
		if ($spear != '')         			{ $SQL2 .= 'AND spear = 1 ';   }
		if ($armouredcombat != '')      	{ $SQL2 .= 'AND armouredcombat = 1 ';  }
		if ($quarterstaff != '')         	{ $SQL2 .= 'AND quarterstaff = 1 ';  }
		if ($archery != '')         		{ $SQL2 .= 'AND archery = 1 ';  }
		if ($langesschwert != '')         	{ $SQL2 .= 'AND langesschwert = 1 ';  }
		if ($mountedcombat != '')    	{ $SQL2 .= 'AND mountedcombat = 1 ';   }
		if ($ttac3 != '')    			{ $SQL2 .= 'AND ttac3 = 1 ';   }
		}

	$Cntr2  = $Toronto*1 + $Guelph*1;

	if ($Cntr2 > 0 ) {
		$Cntr2 = '';
		$SQL2 .= 'INNER JOIN Members_Chapter MC ON P.ID = MC.People_ID AND MC.Chapter_ID IN (';
		if ($Toronto != '')	$Cntr2 .= $Toronto . ', ';
		if ($Guelph != '')      	$Cntr2 .= $Guelph . ', ';
		$SQL2 .= substr($Cntr2, 0, -2) . ') ';
	}

	$Cntr2 = 'WHERE ';
	if ($MemStatus*1 > 0) 				{ $SQL2 .= $Cntr2 . 'MemberStatus_ID = ' . $MemStatus . ' ';  $Cntr2 = 'AND '; }
	if ($MemType*1 > 0)   				{ $SQL2 .= $Cntr2 . 'MemberType_ID = ' . $MemType . ' ';      $Cntr2 = 'AND '; }
	if ($PayMethod*1 > 0) 				{ $SQL2 .= $Cntr2 . 'PayMethod_ID = ' . $PayMethod . ' ';     $Cntr2 = 'AND '; }
	if ($PayDate != '')   					{ $SQL2 .= $Cntr2 . 'PaymentReceived >= "' . $PayDate . '" '; $Cntr2 = 'AND '; }
	if ($FeesGoodTillDate != '')   			{ $SQL2 .= $Cntr2 . 'FeesGoodTillDate >= "' . $FeesGoodTillDate . '" '; $Cntr2 = 'AND ';   }


	if ($Comments != '')  				{ $SQL2 .= $Cntr2 . 'Comments LIKE "%' . $Comments . '%" ';   $Cntr2 = 'AND '; }
	if ($TrainingComments != '')  			{ $SQL2 .= $Cntr2 . 'TrainingComments LIKE "%' . $TrainingComments . '%" ';   $Cntr2 = 'AND '; }
	if ($ArmouredHarnessDesc != '')  		{ $SQL2 .= $Cntr2 . 'ArmouredHarnessDescription LIKE "%' . $ArmouredHarnessDesc . '%" ';   $Cntr2 = 'AND '; }
	if ($UnarmouredHarnessDesc != '') 		{ $SQL2 .= $Cntr2 . 'UnarmouredHarnessDescription LIKE "%' . $UnarmouredHarnessDesc . '%" ';   $Cntr2 = 'AND '; }
	if ($PeriodGarments != '') 			{ $SQL2 .= $Cntr2 . 'PeriodGarments LIKE "%' . $PeriodGarments . '%" ';   $Cntr2 = 'AND '; }
	if ($ArcheryDesc != '') 				{ $SQL2 .= $Cntr2 . 'ArcheryDescription LIKE "%' . $ArcheryDesc . '%" ';   $Cntr2 = 'AND ';  }
	if ($TTAC3Desc != '') 				{ $SQL2 .= $Cntr2 . 'TTAC3Description LIKE "%' . $TTAC3Desc . '%" ';   $Cntr2 = 'AND ';  }

	if ($Occupation != '')  				{ $SQL2 .= $Cntr2 . 'Occupation LIKE "%' . $Occupation . '%" ';   $Cntr2 = 'AND '; }
	if ($PostNominals != '')  				{ $SQL2 .= $Cntr2 . 'PostNominals LIKE "%' . $PostNominals . '%" ';   $Cntr2 = 'AND '; }
	if ($OtherPNs != '')  					{ $SQL2 .= $Cntr2 . 'OtherPNs LIKE "%' . $OtherPNs . '%" ';   $Cntr2 = 'AND '; }
	if ($Interests != '')  					{ $SQL2 .= $Cntr2 . 'Interests LIKE "%' . $Interests . '%" ';   $Cntr2 = 'AND '; }
	if ($HeardFrom != '')  				{ $SQL2 .= $Cntr2 . 'HeardFrom LIKE "%' . $HeardFrom . '%" ';   $Cntr2 = 'AND '; }
	if ($Gender == "M")  				{ $SQL2 .= $Cntr2 . 'Gender = "M" ';   $Cntr2 = 'AND '; }
	if ($Gender == "F")  					{ $SQL2 .= $Cntr2 . 'Gender = "F" ';   $Cntr2 = 'AND '; }

	if ($Injury == 1)  					{ $SQL2 .= $Cntr2 . 'Injury = 1 ';   $Cntr2 = 'AND '; }
	if ($FirstAid == 1)  					{ $SQL2 .= $Cntr2 . 'FirstAidTraining = 1 ';   $Cntr2 = 'AND '; }
	if ($PreviousMartial == 1)  			{ $SQL2 .= $Cntr2 . 'PreviousMartial = 1 ';   $Cntr2 = 'AND '; }
	if ($Deceased == 1)  				{ $SQL2 .= $Cntr2 . 'Deceased = 1 ';   $Cntr2 = 'AND '; }

	if ($Arms == 1)  					{ $SQL2 .= $Cntr2 . 'Armigerous = 1 ';   $Cntr2 = 'AND '; }
	if ($ArmsSource != '')  				{ $SQL2 .= $Cntr2 . 'ArmsSource LIKE "%' . $ArmsSource . '%" '; }

	$SQL2 .= 'ORDER BY P.LastName';


// figure out the number of rows (count) that satisfies the above selection criteria for the previous month if "goodtill == 1"
// this will be included in the online report

if ($goodTill == 1)
	{
	$SQLPrevFee_cnt  = 'SELECT count(*) Count ';
	$SQLPrevFee_cnt .= 'FROM   People P ';

	$MartialCnt = $armazare*1 + $daga*1 + $spada*1 + $spadalonga*1 + $swordbuckler*1 + $pollaxe*1 + $spear*1 + $armouredcombat*1 + $quarterstaff*1 + $archery*1 + $langesschwert*1 + $mountedcombat*1 + $ttac3*1;
	if ($MartialCnt > 0 )
		{
		$SQLPrevFee_cnt .= 'INNER JOIN Members_Martial MM ON MM.People_ID = P.ID ';
		if ($armazare != '')         		{ $SQLPrevFee_cnt .= 'AND armazare = 1 ';  }
		if ($daga != '')         			{ $SQLPrevFee_cnt .= 'AND daga = 1 ';   }
		if ($spada != '')         		{ $SQLPrevFee_cnt .= 'AND spada = 1 ';   }
		if ($spadalonga != '')         	{ $SQLPrevFee_cnt .= 'AND spadalonga = 1 ';   }
		if ($swordbuckler != '')      	{ $SQLPrevFee_cnt .= 'AND swordbuckler = 1 ';   }
		if ($pollaxe != '')         		{ $SQLPrevFee_cnt .= 'AND pollaxe = 1 ';    }
		if ($spear != '')         			{ $SQLPrevFee_cnt .= 'AND spear = 1 ';   }
		if ($armouredcombat != '')      	{ $SQLPrevFee_cnt .= 'AND armouredcombat = 1 ';  }
		if ($quarterstaff != '')         	{ $SQLPrevFee_cnt .= 'AND quarterstaff = 1 ';  }
		if ($archery != '')         		{ $SQLPrevFee_cnt .= 'AND archery = 1 ';  }
		if ($langesschwert != '')         	{ $SQLPrevFee_cnt .= 'AND langesschwert = 1 ';  }
		if ($mountedcombat != '')    	{ $SQLPrevFee_cnt .= 'AND mountedcombat = 1 ';   }
		if ($ttac3 != '')    			{ $SQLPrevFee_cnt .= 'AND ttac3 = 1 ';   }
		}

	$CntrPrevFee_cnt  = $Toronto*1 + $Guelph*1;

	if ($CntrPrevFee_cnt > 0 ) {
		$CntrPrevFee_cnt = '';
		$SQLPrevFee_cnt .= 'INNER JOIN Members_Chapter MC ON P.ID = MC.People_ID AND MC.Chapter_ID IN (';
		if ($Toronto != '')	$CntrPrevFee_cnt .= $Toronto . ', ';
		if ($Guelph != '')      	$CntrPrevFee_cnt .= $Guelph . ', ';
		$SQLPrevFee_cnt .= substr($CntrPrevFee_cnt, 0, -2) . ') ';
	}

	$CntrPrevFee_cnt = 'WHERE ';
	if ($MemStatus*1 > 0) 				{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'MemberStatus_ID = ' . $MemStatus . ' ';  $CntrPrevFee_cnt = 'AND '; }
	if ($MemType*1 > 0)   				{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'MemberType_ID = ' . $MemType . ' ';      $CntrPrevFee_cnt = 'AND '; }
	if ($PayMethod*1 > 0) 				{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'PayMethod_ID = ' . $PayMethod . ' ';     $CntrPrevFee_cnt = 'AND '; }
	if ($PayDate != '')   					{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'PaymentReceived >= "' . $PayDate . '" '; $CntrPrevFee_cnt = 'AND '; }
	if ($FeesGoodTillDate != '')   			{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'FeesGoodTillDate = "' . $prev_good_date . '" '; $CntrPrevFee_cnt = 'AND ';   }


	if ($Comments != '')  				{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'Comments LIKE "%' . $Comments . '%" ';   $CntrPrevFee_cnt = 'AND '; }
	if ($TrainingComments != '')  			{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'TrainingComments LIKE "%' . $TrainingComments . '%" ';   $CntrPrevFee_cnt = 'AND '; }
	if ($ArmouredHarnessDesc != '')  		{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'ArmouredHarnessDescription LIKE "%' . $ArmouredHarnessDesc . '%" ';   $CntrPrevFee_cnt = 'AND '; }
	if ($UnarmouredHarnessDesc != '') 		{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'UnarmouredHarnessDescription LIKE "%' . $UnarmouredHarnessDesc . '%" ';   $CntrPrevFee_cnt = 'AND '; }
	if ($PeriodGarments != '') 			{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'PeriodGarments LIKE "%' . $PeriodGarments . '%" ';   $CntrPrevFee_cnt = 'AND '; }
	if ($ArcheryDesc != '') 				{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'ArcheryDescription LIKE "%' . $ArcheryDesc . '%" ';   $CntrPrevFee_cnt = 'AND ';  }
	if ($TTAC3Desc != '') 				{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'TTAC3Description LIKE "%' . $TTAC3Desc . '%" ';   $CntrPrevFee_cnt = 'AND ';  }

	if ($Occupation != '')  				{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'Occupation LIKE "%' . $Occupation . '%" ';   $CntrPrevFee_cnt = 'AND '; }
	if ($PostNominals != '')  				{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'PostNominals LIKE "%' . $PostNominals . '%" ';   $CntrPrevFee_cnt = 'AND '; }
	if ($OtherPNs != '')  					{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'OtherPNs LIKE "%' . $OtherPNs . '%" ';   $CntrPrevFee_cnt = 'AND '; }
	if ($Interests != '')  					{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'Interests LIKE "%' . $Interests . '%" ';   $CntrPrevFee_cnt = 'AND '; }
	if ($HeardFrom != '')  				{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'HeardFrom LIKE "%' . $HeardFrom . '%" ';   $CntrPrevFee_cnt = 'AND '; }
	if ($Gender == "M")  				{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'Gender = "M" ';   $CntrPrevFee_cnt = 'AND '; }
	if ($Gender == "F")  					{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'Gender = "F" ';   $CntrPrevFee_cnt = 'AND '; }

	if ($Injury == 1)  					{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'Injury = 1 ';   $CntrPrevFee_cnt = 'AND '; }
	if ($FirstAid == 1)  					{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'FirstAidTraining = 1 ';   $CntrPrevFee_cnt = 'AND '; }
	if ($PreviousMartial == 1)  			{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'PreviousMartial = 1 ';   $CntrPrevFee_cnt = 'AND '; }
	if ($Deceased == 1)  				{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'Deceased = 1 ';   $CntrPrevFee_cnt = 'AND '; }

	if ($Arms == 1)  					{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'Armigerous = 1 ';   $CntrPrevFee_cnt = 'AND '; }
	if ($ArmsSource != '')  				{ $SQLPrevFee_cnt .= $CntrPrevFee_cnt . 'ArmsSource LIKE "%' . $ArmsSource . '%" '; }

	$SQLPrevFee_cnt .= 'ORDER BY P.LastName';

// figure out the count of records that satisfy the second previous month for Fees Good Till Date

	$SQLPrev2Fee_cnt  = 'SELECT count(*) Count ';
	$SQLPrev2Fee_cnt .= 'FROM   People P ';

	$MartialCnt = $armazare*1 + $daga*1 + $spada*1 + $spadalonga*1 + $swordbuckler*1 + $pollaxe*1 + $spear*1 + $armouredcombat*1 + $quarterstaff*1 + $archery*1 + $langesschwert*1 + $mountedcombat*1 + $ttac3*1;
	if ($MartialCnt > 0 )
		{
		$SQLPrev2Fee_cnt .= 'INNER JOIN Members_Martial MM ON MM.People_ID = P.ID ';
		if ($armazare != '')         		{ $SQLPrev2Fee_cnt .= 'AND armazare = 1 ';  }
		if ($daga != '')         			{ $SQLPrev2Fee_cnt .= 'AND daga = 1 ';   }
		if ($spada != '')         		{ $SQLPrev2Fee_cnt .= 'AND spada = 1 ';   }
		if ($spadalonga != '')         	{ $SQLPrev2Fee_cnt .= 'AND spadalonga = 1 ';   }
		if ($swordbuckler != '')      	{ $SQLPrev2Fee_cnt .= 'AND swordbuckler = 1 ';   }
		if ($pollaxe != '')         		{ $SQLPrev2Fee_cnt .= 'AND pollaxe = 1 ';    }
		if ($spear != '')         			{ $SQLPrev2Fee_cnt .= 'AND spear = 1 ';   }
		if ($armouredcombat != '')      	{ $SQLPrev2Fee_cnt .= 'AND armouredcombat = 1 ';  }
		if ($quarterstaff != '')         	{ $SQLPrev2Fee_cnt .= 'AND quarterstaff = 1 ';  }
		if ($archery != '')         		{ $SQLPrev2Fee_cnt .= 'AND archery = 1 ';  }
		if ($langesschwert != '')         	{ $SQLPrev2Fee_cnt .= 'AND langesschwert = 1 ';  }
		if ($mountedcombat != '')    	{ $SQLPrev2Fee_cnt .= 'AND mountedcombat = 1 ';   }
		if ($ttac3 != '')    			{ $SQLPrev2Fee_cnt .= 'AND ttac3 = 1 ';   }
		}

	$CntrPrev2Fee_cnt  = $Toronto*1 + $Guelph*1;

	if ($CntrPrev2Fee_cnt > 0 ) {
		$CntrPrev2Fee_cnt = '';
		$SQLPrev2Fee_cnt .= 'INNER JOIN Members_Chapter MC ON P.ID = MC.People_ID AND MC.Chapter_ID IN (';
		if ($Toronto != '')	$CntrPrev2Fee_cnt .= $Toronto . ', ';
		if ($Guelph != '')      	$CntrPrev2Fee_cnt .= $Guelph . ', ';
		$SQLPrev2Fee_cnt .= substr($CntrPrev2Fee_cnt, 0, -2) . ') ';
	}

	$CntrPrev2Fee_cnt = 'WHERE ';
	if ($MemStatus*1 > 0) 				{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'MemberStatus_ID = ' . $MemStatus . ' ';  $CntrPrev2Fee_cnt = 'AND '; }
	if ($MemType*1 > 0)   				{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'MemberType_ID = ' . $MemType . ' ';      $CntrPrev2Fee_cnt = 'AND '; }
	if ($PayMethod*1 > 0) 				{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'PayMethod_ID = ' . $PayMethod . ' ';     $CntrPrev2Fee_cnt = 'AND '; }
	if ($PayDate != '')   					{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'PaymentReceived >= "' . $PayDate . '" '; $CntrPrev2Fee_cnt = 'AND '; }
	if ($FeesGoodTillDate != '')   			{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'FeesGoodTillDate = "' . $prev2_good_date . '" '; $CntrPrev2Fee_cnt = 'AND ';   }


	if ($Comments != '')  				{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'Comments LIKE "%' . $Comments . '%" ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($TrainingComments != '')  			{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'TrainingComments LIKE "%' . $TrainingComments . '%" ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($ArmouredHarnessDesc != '')  		{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'ArmouredHarnessDescription LIKE "%' . $ArmouredHarnessDesc . '%" ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($UnarmouredHarnessDesc != '') 		{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'UnarmouredHarnessDescription LIKE "%' . $UnarmouredHarnessDesc . '%" ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($PeriodGarments != '') 			{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'PeriodGarments LIKE "%' . $PeriodGarments . '%" ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($ArcheryDesc != '') 				{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'ArcheryDescription LIKE "%' . $ArcheryDesc . '%" ';   $CntrPrev2Fee_cnt = 'AND ';  }
	if ($TTAC3Desc != '') 				{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'TTAC3Description LIKE "%' . $TTAC3Desc . '%" ';   $CntrPrev2Fee_cnt = 'AND ';  }

	if ($Occupation != '')  				{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'Occupation LIKE "%' . $Occupation . '%" ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($PostNominals != '')  				{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'PostNominals LIKE "%' . $PostNominals . '%" ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($OtherPNs != '')  					{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'OtherPNs LIKE "%' . $OtherPNs . '%" ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($Interests != '')  					{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'Interests LIKE "%' . $Interests . '%" ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($HeardFrom != '')  				{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'HeardFrom LIKE "%' . $HeardFrom . '%" ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($Gender == "M")  				{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'Gender = "M" ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($Gender == "F")  					{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'Gender = "F" ';   $CntrPrev2Fee_cnt = 'AND '; }

	if ($Injury == 1)  					{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'Injury = 1 ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($FirstAid == 1)  					{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'FirstAidTraining = 1 ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($PreviousMartial == 1)  			{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'PreviousMartial = 1 ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($Deceased == 1)  				{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'Deceased = 1 ';   $CntrPrev2Fee_cnt = 'AND '; }

	if ($Arms == 1)  					{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'Armigerous = 1 ';   $CntrPrev2Fee_cnt = 'AND '; }
	if ($ArmsSource != '')  				{ $SQLPrev2Fee_cnt .= $CntrPrev2Fee_cnt . 'ArmsSource LIKE "%' . $ArmsSource . '%" '; }

	$SQLPrev2Fee_cnt .= 'ORDER BY P.LastName';

	}  // end of if good till

?>

<html>
<head>
<link rel="stylesheet" href="main.css" type="text/css">
<script type="text/javascript" src="main.js"></script>
</head>
<body align="center" valign="top">
<table align="center" cellpadding="0" cellspacing="0" width="500">

<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>Membership Custom Online Listing : '.$full_date.'</caption>');

	echo ('<tr><th>Name</th><th>City</th><th>EMail</th><th>Telephone (H)</th></tr>');
	echo ('<tr><td colspan=4 bgcolor="#FDD017" colspan=4 align="left"><font face="arial,helvetica" size=-2><i>&nbsp;Search criteria : '.$echoString.'</i></font></td></tr>');

	// if fees good till was included in the search criteria, modify the report by grouping the output based on month and then previous month
	if ($goodTill == 1)
		{
		echo ('<tr><td colspan=4 bgcolor="#B5EAAA" colspan=4 align="left"><font face="arial,helvetica" size=-2><i>&nbsp;Fees paid up till : '.$FeesGoodTillDate.'</i></font></td></tr>');
		}

?>



<?php
	$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');
			echo ('<td><div id="Data">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>');
			echo ('<td><div id="Data">' . $Line->City . '</td>');
			echo ('<td><div id="Data" align="left">' . $Line->EMail . '</td>');
			echo ('<td><div id="Data" align="left">' . $Line->NumHome . '</td>');
			echo ('</tr>');
		}

	$Result2 = mysql_query($SQL2, $LinkID);
		while ($LineCnt = mysql_fetch_object($Result2)) {
			echo ('<tr bgcolor="grey"><td colspan=4><font face="arial,helvetica" size=2 color="white"><b>&nbsp;Total: </b>'.$LineCnt->Count.'</td></tr><tr><td colspan="4">&nbsp;</td></tr>');
		}

	// if fees good till was included in the search criteria, modify the report by grouping the output based on month and then previous month and then second prevoius month
	if ($goodTill == 1)
		{
		echo ('<tr><td colspan=4>&nbsp;</td></tr><tr><td colspan=4 bgcolor="#FBBBB9" colspan=4 align="left"><font face="arial,helvetica" size=-2><i>&nbsp;Lapsed members - previous month paid : '. $prev_good_date . '</i></font></td></tr>');
		$ResultPrevFee = mysql_query($SQLPrevFee, $LinkID);
			while ($LinePrevFee = mysql_fetch_object($ResultPrevFee)) {
				echo ('<tr OnMouseOver="navBar(this,1,1);"');
				echo (' OnMouseOut="navBar(this,2,1);"');
				echo (' OnClick="navBarClick(this,1,' . $LinePrevFee->ID . ')">');
				echo ('<td><div id="Data">' . $LinePrevFee->LastName . ', ' . $LinePrevFee->FirstName .' ' . $LinePrevFee->MiddleInitial . '</td>');
				echo ('<td><div id="Data">' . $LinePrevFee->City . '</td>');
				echo ('<td><div id="Data" align="left">' . $LinePrevFee->EMail . '</td>');
				echo ('<td><div id="Data" align="left">' . $LinePrevFee->NumHome . '</td>');
				echo ('</tr>');
			}

		$ResultPrevFee_cnt = mysql_query($SQLPrevFee_cnt, $LinkID);
			while ($LineCntFee_cnt = mysql_fetch_object($ResultPrevFee_cnt)) {
				echo ('<tr bgcolor="grey"><td colspan=4><font face="arial,helvetica" size=2 color="white"><b>&nbsp;Total: </b>'.$LineCntFee_cnt->Count.'</td></tr><tr><td colspan="4">&nbsp;</td></tr>');
			}

		mysql_free_result($ResultPrevFee);
		mysql_free_result($ResultPrevFee_cnt);


		echo ('<tr><td colspan=4>&nbsp;</td></tr><tr><td colspan=4 bgcolor="#FBBBB9" colspan=4 align="left"><font face="arial,helvetica" size=-2><i>&nbsp;Lapsed members - 2nd previous month paid : '. $prev2_good_date . '</i></font></td></tr>');
		$ResultPrev2Fee = mysql_query($SQLPrev2Fee, $LinkID);
			while ($LinePrev2Fee = mysql_fetch_object($ResultPrev2Fee)) {
				echo ('<tr OnMouseOver="navBar(this,1,1);"');
				echo (' OnMouseOut="navBar(this,2,1);"');
				echo (' OnClick="navBarClick(this,1,' . $LinePrev2Fee->ID . ')">');
				echo ('<td><div id="Data">' . $LinePrev2Fee->LastName . ', ' . $LinePrev2Fee->FirstName .' ' . $LinePrev2Fee->MiddleInitial . '</td>');
				echo ('<td><div id="Data">' . $LinePrev2Fee->City . '</td>');
				echo ('<td><div id="Data" align="left">' . $LinePrev2Fee->EMail . '</td>');
				echo ('<td><div id="Data" align="left">' . $LinePrev2Fee->NumHome . '</td>');
				echo ('</tr>');
			}

		$ResultPrev2Fee_cnt = mysql_query($SQLPrev2Fee_cnt, $LinkID);
			while ($LineCntFee2_cnt = mysql_fetch_object($ResultPrev2Fee_cnt)) {
				echo ('<tr bgcolor="grey"><td colspan=4><font face="arial,helvetica" size=2 color="white"><b>&nbsp;Total: </b>'.$LineCntFee2_cnt->Count.'</td></tr><tr><td colspan="4">&nbsp;</td></tr>');
			}

		mysql_free_result($ResultPrev2Fee);
		mysql_free_result($ResultPrev2Fee_cnt);

		}  // end if good till


	mysql_free_result($Result);
	mysql_free_result($Result2);
?>

</table>
<br><p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center>
</body>
</html>

<?php
} // end function : CustomData


Function Custom($LinkID, $State) {

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

		<form name="Custom" method="post" action="Custom.php">

		<table border="0" align="center" width=600 cellpadding="0" cellspacing="2" bgcolor="lightgrey" bordercolor="#000000">
		<tr>
			<td colspan="2" align="center" valign="center"><table border="1" width="100%"><tr><th align="center">CUSTOM ONLINE LISTINGS - Search Criteria</th></tr></table></td>
		</tr>
		<tr>
			<td colspan="2"><div class="NavText"><table border="1" width="100%"><tr><th align="center">Martial Styles Searchable Fields</td></tr></table></td>
		</tr>
		<tr>
			<td colspan="2"><table width=100% border=0>
			<tr>
				<td  valign="center" id="Label">Armazare:&nbsp;<input type="checkbox" name="armazare" value="1"  <?=$Line3->armazare == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br>
				Daga:&nbsp;<input type="checkbox" name="daga" value="1"  <?=$Line3->daga == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br>
				Spada:&nbsp;<input type="checkbox" name="spada" value="1"  <?=$Line3->spada == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br>
				Spada longa:&nbsp;<input type="checkbox" name="spadalonga" value="1"  <?=$Line3->spadalonga == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br>
				TTAC3:&nbsp;<input type="checkbox" name="ttac3" value="1"  <?=$Line3->ttac3 == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;</td>

				<td  valign="center" id="Label">Sword & buckler:&nbsp;<input type="checkbox" name="swordbuckler" value="1"  <?=$Line3->swordbuckler == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br>
				Langes Schwert:&nbsp;<input type="checkbox" name="langesschwert" value="1"  <?=$Line3->langesschwert == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br>
				Pollaxe:&nbsp;<input type="checkbox" name="pollaxe" value="1"  <?=$Line3->pollaxe == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br>
				Spear:&nbsp;<input type="checkbox" name="spear" value="1"  <?=$Line3->spear == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br>
				&nbsp;</td>
			
				<td  valign="center" id="Label">Armoured combat:&nbsp;<input type="checkbox" name="armouredcombat" value="1"  <?=$Line3->armouredcombat == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br>
				Quarter-staff:&nbsp;<input type="checkbox" name="quarterstaff" value="1"  <?=$Line3->quarterstaff == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br>
				Archery:&nbsp;<input type="checkbox" name="archery" value="1"  <?=$Line3->archery == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br>
				Mounted Combat:&nbsp;<input type="checkbox" name="mountedcombat" value="1"  <?=$Line3->mountedcombat == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;<br>
				&nbsp;</td>
			</tr></table>
			</td>
		</tr>
		<tr>
			<td colspan="2"><div class="NavText"><table border="1" width="100%"><tr><th align="center">Other Searchable Fields</td></tr></table></td>
		</tr>
		<tr>
			<td width="50%" id="Label">Armigerous: <input type="checkbox" name="Arms" value="1"></td>
			<td width="50%" id="Label">Source of Arms: <input type="text" maxlength="64" size="24" name="ArmsSource" id="ArmsSource">&nbsp;&nbsp;</td>
		</tr>
		<tr>
			<td width="50%" id="Label">Injury: <input type="checkbox" name="Injury" value="1"></td>
			<td width="50%" id="Label">Post-Nominals: <input type="text" maxlength="64" size="24" name="PostNominals" id="PostNominals">&nbsp;&nbsp;</td>
		</tr>
		<tr>
			<td width="50%" id="Label">First Aid Training: <input type="checkbox" name="FirstAid" value="1"></td>
			<td width="50%" id="Label" align="right">Other PN's: <input type="text" maxlength="64" size="24" name="OtherPNs" id="OtherPNs">&nbsp;&nbsp;</td>
		</tr>
		<tr>
			<td width="50%" id="Label">Previous Martial Arts Experience: <input type="checkbox" name="PreviousMartial" value="1"></td>
			<td width="50%" id="Label" align="right">Interests: <input type="text" maxlength="64" size="24" name="Interests" id="Interests">&nbsp;&nbsp;</td>
		</tr>
		<tr>
			<td width="50%" id="Label">Deceased: <input type="checkbox" name="Deceased" value="1"></td>
			<td width="50%" id="Label">Occupation: <input type="text" maxlength="32" size="24" name="Occupation" id="Occupation">&nbsp;&nbsp;</td>
		</tr>
		<tr>
			<td width="50%" id="Label">&nbsp;</td>
			<td width="50%" id="Label">Heard From: <input type="text" maxlength="32" size="24" name="HeardFrom" id="HeardFrom">&nbsp;&nbsp;</td>

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
				echo ('><br><font color="black"></td>');
				if ($Cntr%2 == 1) { echo ('</tr>'); }
				$Cntr++;
			}
?>
		</table>
		</td>
		<td valign="top" id="Label" rowspan="3">
		Status: <select name="MemStatus">
<?php
		$Result = mysql_query('SELECT ID, Description FROM MemberStatus ORDER BY ID', $LinkID);
		echo ('<option value = "0">-');
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<option value = "' . $Line->ID . '">' . $Line->Description);
		}
?>
		</select>&nbsp;&nbsp;<br>

		Fees Good Till Date: <input type="text" maxlength="10" size="10" name="FeesGoodTillDate" id="FeesGoodTillDate">&nbsp;&nbsp;
		<script type="text/javascript">
			Calendar.setup( {
				inputField : "FeesGoodTillDate",
				ifFormat   : "%Y-%m-%d"
			});
		</script><br>


		Membership Type: <select name="MemType">
<?php
		$Result = mysql_query('SELECT ID, Description FROM MemberType ORDER BY ID', $LinkID);
		echo ('<option value = "0">-');
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<option value="' .$Line->ID . '">' . $Line->Description);
		}
?>
	 	</select>&nbsp;&nbsp;<br>

		Payment Method: <select name="PayMethod">
<?php
		$Result = mysql_query('SELECT ID, Description FROM PayMethod ORDER BY ID', $LinkID);
		echo ('<option value = "0">-');
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<option value="' . $Line->ID . '">' . $Line->Description);
		}
?>
		</select>&nbsp;&nbsp;<br>

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
			<td width="50%" id="Label"><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;male:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Gender" value="M">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;female:&nbsp;<input type="checkbox" name="Gender" value="F">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center></td>
		</tr>
		<tr>
			<td><div class="NavText"><table border="1" width="100%"><tr><th align="center">Armoured Harness Search</td></tr></table></td>
			<td><div class="NavText"><table border="1" width="100%"><tr><th align="center">Unarmoured Harness Search</td></tr></table></td>
		</tr>
		<tr>
			<td><textarea name="ArmouredHarnessDesc" rows=2 cols=40 wrap="virtual" maxlength="10"></textarea><br></td>
			<td><textarea name="UnarmouredHarnessDesc" rows=2 cols=40 wrap="virtual" maxlength="10"></textarea><br></td>
		</tr>
		<tr>
			<td><div class="NavText"><table border="1" width="100%"><tr><th align="center">Training Comments Search</td></tr></table></td>
			<td><div class="NavText"><table border="1" width="100%"><tr><th align="center">Comments Search</td></tr></table></td>
		</tr>
		<tr>
			<td><textarea name="TrainingComments" rows=2 cols=40 wrap="virtual" maxlength="10"></textarea><br></td>
			<td><textarea name="Comments" rows=2 cols=40 wrap="virtual" maxlength="10"></textarea><br></td>
		</tr>
		<tr>
			<td><div class="NavText"><table border="1" width="100%"><tr><th align="center">Archery Equipment Search</td></tr></table></td>
			<td><div class="NavText"><table border="1" width="100%"><tr><th align="center">Period Garments Search</td></tr></table></td>
		</tr>
		<tr>
			<td><textarea name="ArcheryDesc" rows=2 cols=40 wrap="virtual" maxlength="10"></textarea><br></td>
			<td><textarea name="PeriodGarments" rows=2 cols=40 wrap="virtual" maxlength="10"></textarea><br></td>
		</tr>
		<tr>
			<td><div class="NavText"><table border="1" width="100%"><tr><th align="center">TTAC3 Equipment Search</td></tr></table></td>
			<td><div class="NavText"><table border="1" width="100%"><tr><th align="center">&nbsp;</td></tr></table></td>
		</tr>
		<tr>
			<td><textarea name="TTAC3Desc" rows=2 cols=40 wrap="virtual" maxlength="10"></textarea><br></td>
			<td>&nbsp;<br></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			<input type="hidden" name="ID" value="<?=$ID?>">
			<input type="hidden" name="State" value="<?=$State?>Data">
			<input type="Submit" value="Generate Online Listing of Membership Information">
			</td><td id="Label"></td>
		</tr>
		</table>
	</form>
</body>
</html>

<?php

} //End Function MemberShow

// Main Loop

      if ($_SESSION["RoleID"] < 4) {
?>

<html>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css">
	</head>

	<body align="center" valign="top">
        <body>
                <p>ERROR: You do not have the necessary permissions to create custom listings of data!</p>
        </body>
</html>

<?php
        }
        else {

// The main loop.  Call functions based on the value of $_POST["state"], which gets set
// via a hidden INPUT TYPE, or through URL parameters called by NavBar Click event.

		$ID = '';
		if (isset($_GET['ID']))		{ $ID = $_GET['ID']; }
		if (isset($_POST['ID']))		{ $ID = $_POST['ID']; }

		$State = '';
		if (isset($_GET['State']))		{ $State = $_GET['State']; }
		if (isset($_POST['State']))		{ $State = $_POST['State']; }

		$LinkID=dbConnect($DB);

		switch($State) {

			case 'Status':
				phpinfo();
				break;

			case 'Custom':
				Custom($LinkID, $State);
				break;

			case 'CustomData':
				$Toronto         		= isset($_POST['Toronto'])			?  $_POST['Toronto'] : "";
				$Guelph     	 	= isset($_POST['Guelph'])			?  $_POST['Guelph'] : "";

				$Arms     		= isset($_POST['Arms'])			?  $_POST['Arms'] : "";
				$Injury     	 	= isset($_POST['Injury'])			?  $_POST['Injury'] : "";
				$PreviousMartial	= isset($_POST['PreviousMartial'])	?  $_POST['PreviousMartial'] : "";
				$FirstAidTraining	= isset($_POST['FirstAidTraining'])	?  $_POST['FirstAidTraining'] : "";
				$Deceased		= isset($_POST['Deceased'])		?  $_POST['Deceased'] : "";

				$armazare		= isset($_POST['armazare']) 		?  $_POST['armazare'] : "";
				$daga			= isset($_POST['daga']) 			?  $_POST['daga'] : "";
				$spada			= isset($_POST['spada']) 			?  $_POST['spada'] : "";
				$spadalonga		= isset($_POST['spadalonga']) 		?  $_POST['spadalonga'] : "";
				$swordbuckler		= isset($_POST['swordbuckler']) 	?  $_POST['swordbuckler'] : "";
				$pollaxe			= isset($_POST['pollaxe']) 		?  $_POST['pollaxe'] : "";
				$spear			= isset($_POST['spear']) 			?  $_POST['spear'] : "";
				$armouredcombat	= isset($_POST['armouredcombat']) 	?  $_POST['armouredcombat'] : "";
				$quarterstaff		= isset($_POST['quarterstaff']) 		?  $_POST['quarterstaff'] : "";
				$archery			= isset($_POST['archery']) 		?  $_POST['archery'] : "";
				$langesschwert	= isset($_POST['langesschwert']) 	?  $_POST['langesschwert'] : "";
				$mountedcombat	= isset($_POST['mountedcombat']) 	?  $_POST['mountedcombat'] : "";
				$ttac3			= isset($_POST['ttac3']) 			?  $_POST['ttac3'] : "";

				CustomData($LinkID, $State, $Toronto, $Guelph, $_POST['MemStatus'], $_POST['MemType'], $_POST['FeesGoodTillDate'],
					$_POST['PayMethod'], $_POST['PayDate'], trim($_POST['Comments']), $_POST['Occupation'], $_POST['PostNominals'], $_POST['OtherPNs'],
					$_POST['Gender'],  $_POST['Interests'], $Arms, $_POST['ArmsSource'], $Injury, $PreviousMartial, $FirstAidTraining, $Deceased,
					$_POST['HeardFrom'],  trim($_POST['ArmouredHarnessDesc']), trim($_POST['UnarmouredHarnessDesc']), trim($_POST['TrainingComments']), trim($_POST['PeriodGarments']),  trim($_POST['ArcheryDesc']), trim($_POST['TTAC3Desc']),
					$armazare, $daga, $spada, $spadalonga, $swordbuckler, $pollaxe, $spear, $armouredcombat, $quarterstaff, $archery, $langesschwert, $mountedcombat, $ttac3 );

				break;
		}
		dbClose($LinkID);
	}
?>
