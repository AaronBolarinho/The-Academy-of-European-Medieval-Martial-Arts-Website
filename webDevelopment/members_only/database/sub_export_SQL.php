<?php
	// Build the SELECT Statement here.
	$SQL  = 'SELECT P.School, P.FirstName, P.MiddleInitial, P.LastName, P.Salutation, P.AddressProtocol, P.Address1, P.Address2, P.Address3, P.City, ';
	$SQL .= '       P.ProvState, P.PCZip, P.Country, P.NumHome, P.NumOffice, P.NumFax, P.NumMobile, P.EMail, P.EmergContactName, P.EmergContactPhone, ';
	$SQL .= '       P.Occupation, P.Gender, P.TransportationMode, P.PreviousMartial, P.Spouse, P.BirthDate, P.Deceased, P.DeceasedDate, P.Interests, P.Armigerous, ';
	$SQL .= '       P.ArmsSource, P.PostNominals, P.OtherPNs, P.AcademicDegree, P.AcademicInstitution, P.FirstAidTraining, P.Injury, P.EnrolledElist, P.DateJoined, P.HeardFrom, ';
	$SQL .= '       P.FeesGoodTillDate, P.PaymentReceived, P.Medical, P.ArmouredHarness, P.ArmouredHarnessDescription, P.UnarmouredHarnessDescription, ';
	$SQL .= '       P.TrainingComments, P.Comments, P.PeriodGarments, P.Rec_ID, P.MemberStatus_ID, P.MemberType_ID, P.PayMethod_ID ';
	$SQL .= 'FROM   People P ';

	$Cntr  = $Toronto*1 + $Guelph*1 + $NS*1 + $Stratford*1;
	if ($Cntr > 0 ) {
		$Cntr = '';
		$SQL .= 'INNER JOIN Members_Chapter MC ON P.Rec_ID = MC.People_ID AND MC.Chapter_ID IN (';
		if ($Toronto != '')	{ $Cntr .= $Toronto . ', '; $echoString = $echoString . "Toronto=1, ";}
		if ($Guelph != '')      { $Cntr .= $Guelph . ', ';  $echoString = $echoString . "Guelph=1, "; }
		if ($NS != '')      	{ $Cntr .= $NS . ', ';  $echoString = $echoString . "NS=1, "; }
		if ($Stratford != '')  	{ $Cntr .= $Stratford . ', ';  $echoString = $echoString . "Stratford=1, "; }
		$SQL .= substr($Cntr, 0, -2) . ') ';
	}
	$Cntr = ' WHERE P.School = "'.$school.'" ';
	$SQL .= $Cntr;
	$Cntr = '';
	if ($MemStatus*1 > 0) 		{ $SQL .= $Cntr . 'AND MemberStatus_ID = ' . $MemStatus . ' '; $Cntr = ''; }
	if ($MemType*1 > 0)   		{ $SQL .= $Cntr . 'AND MemberType_ID = ' . $MemType . ' '; $Cntr = '';  }
	if ($PayMethod*1 > 0) 		{ $SQL .= $Cntr . 'AND PayMethod_ID = ' . $PayMethod . ' '; $Cntr = '';  }
	if ($PayDate != '')   		{ $SQL .= $Cntr . 'AND PaymentReceived >= "' . $PayDate . '" '; $Cntr = '';  }

	$SQL .= 'ORDER BY P.LastName';
?>
