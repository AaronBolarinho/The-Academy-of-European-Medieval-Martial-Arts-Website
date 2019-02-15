<?php
// Program: Tab_inuries_profile.php
// Author: David M. Cvet
// Created: Nov 04, 2016
// Description:
//	This will display the detailed student's record with respect to his/her injuries log, invoked by Members_show.php
//---------------------------
// Updates:
//	2018 ----------
//	apr 26:	modified table Members_Injuries by making the Index_ID column auto-increment

// setup main div object for presenting injuries details record
include "config/AIMS_sub_show_injuries_profile_$lang.php";
if ($state == "Update")
	{
	$oninput = "oninput=\"enable_injury_button()\"";
	$note = "";
	}
else
	{
	$oninput = "";
	$note = "&nbsp;<img src=\"images/icons/note.gif\" style=\"vertical-align:middle;width:20px;margin-left:3px;cursor:help;\" alt=\"\" title=\"Unable to add new injury report until the new member personal profile record has been created and saved to AIMS.\" />";
	}
// setup main div object for presenting injuries details record
echo ('<div class="injuries_report_main box"><!-- begin injuries_report_main -->');
echo ("\n".'<form name="Injury_Report_Form" method="post" action="sub_create_injuries_report.php">');
// setup the member's injuries reports header (the green title bar)
if ($state == "Create")
	{ $remaining_title = "Member Number# ( <i>not yet assigned</i> )</b>"; }
else
	{ $remaining_title = "Member Number# ".$Line_Members->Member_Number."</b>"; }
echo ("\n\t".'<div style="float:left;width:100%;height:24px;text-align:center;margin:auto;padding-top:3px;" class="bggreen"><img src="../../members_only/images/icons/medical.png" alt="" style="margin-right:5px;vertical-align:middle;height:20px;" />&nbsp;<b>'.$name_in_title_bar.' Injuries Report&nbsp;&mdash;&nbsp;'.$remaining_title.'</div>');
echo ('<img src="'.$members_only_path.'images/1090x4_transparent.png" width="100%" alt="" />');
echo('<div style="float:left;margin-left:2%;margin-top:15px;width:96%;">');

if ($injuries_report_message)
	{
	// this indicates that something went wrong with the injury report submission as detected wtihin sub_create_injuries_report.php, such as a blank injury note
	// or blank location.  This line will only appear if one of the required elements is empty (passed to Members_show.php as IMSG
	echo ('<p style="color:red;text-align:center;"><b>Warning!</b> '.$injuries_report_message.'</p>');
	}

echo ('
&nbsp;<b>Enter injury report below:<br /><br />
<span class="Label">Injury Date:</span><input type="text" name="InjuryDate" id="InjuryDate" data-zdp_first_day_of_week="0" maxlength="10" size="4" placeholder="yyyy-mm-dd" value="'.$today.'" tabindex="1" '.$oninput.' /> <script type="text/javascript">$(\'#InjuryDate\').Zebra_DatePicker();</script><img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-left:3px;cursor:help;" alt="" title="'.$title_default_date[$lang_num].'" /></b>
&nbsp;&nbsp;<span class="Label">Location of Injury:</span><input type="text" name="InjuryLocation" id="InjuryLocation" maxlength="128" size="14" value="" tabindex="2" '.$oninput.' /><span class="Label"> (location is REQUIRED!)</span>
<textarea name="InjuryNotes" rows="4" style="width:100%;margin-top:10px;" wrap="virtual" class="box" '.$oninput.' tabindex="3" placeholder="Type in notes here...."></textarea>
</div>');

// print past injury reports and dates
echo('
<div style="float:left;margin-left:2%;margin-top:15px;width:96%;"><b>Archived Injury Report(s) <i>(from the most recent to the oldest entries)</i>:</b><br />');
if (!$num_array_injury_reports) { echo ('No injury reports entered'); }
for ($i=0; $i<$num_array_injury_reports; $i++)
	{
	echo ('<b>'.$injury_report_date[$i].'</b>&nbsp;('.$injury_report_location[$i].') --------------------<br />');
	echo ($injury_report[$i].'<br /><br />');
	}
echo ('</div>');
// end modal popups code
echo ("\n".'<table width="100%" style="background-color:orange;">'."\n");
?>
<tr>
	<td align="center"><input type="submit" class="button" value="Save new injury report" name="submit_injury_button" id="submit_injury_button" disabled="true" /> <input type="reset" class="button"  value="Clear Recent Updates" /><?=$note?></td>
</tr>
<?php
echo ('</table><input type="hidden" name="MemID" value="'.$member_ID.'" /></form><!-- end Injuries_Report_Form -->');
echo ("\n".'</div><!-- end injuries_report_main -->');	// end injuries reports
?>
