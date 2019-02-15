<?php
// Program: GIMS_rep_other_members_en.php
//	Description: source for the English textual content on the other records report (rep_other_members.php)
//	2016 ------------------
//
// English content -------------------
$title[0] = "AEMMA Information Management System (AIMS)";
if ($status_ID)
	{
	$p1[0] = "The report displays all records in which the membership status searched for is <b>'".$status_description."'</b> (or status ID of '<b>".$status_ID."'</b>) for all records found in the AIMS database. The records will include those individuals, who may have had the status '<b>".$status_ID."</b>' and their status has somehow changed to another status with the AEMMA, such as, one who had <i>resigned</i> from the AEMMA and later had become <i>deceased</i>, or one who had the status of <i>moved</i> and has informed the AEMMA of their new/current address and has become re-engaged with the AEMMA so their status was changed to <i>active</i>.<br />";
	$report_title[0] = "<b>Report: All records of possessing the membership status of <font color=\"green\">'".$status_description."'</font> (status ID of <font color=\"green\">'".$status_ID."'</font>) as of: ".$full_date."</b>";	
	}
elseif ($gender)
	{
	$p1[0] = "The report displays all records in which the member's gender is '<b>".$gender."</b>' for all records found in the AIMS database regardless of the record's status.<br />";
	$report_title[0] = "<b>Report: All records of members, regardless of status, whose gender is <font color=\"green\">'".$gender."'</font> as of: ".$full_date."</b>";	
	}
else
	{
	// the parameter passed is neither status or gender, most likely rank
	$p1[0] = "The report displays all records in which the member's rank is '<b>".$rank_description."</b>' (or rank ID of '<b>".$rank_ID."'</b>) for all records found in the AIMS database regardless of the record's status.<br />";
	$report_title[0] = "<b>Report: All records of members, regardless of status, whose rank is <font color=\"green\">'".$rank_ID."'</font> as of: ".$full_date."</b>";	
	}	
?>
