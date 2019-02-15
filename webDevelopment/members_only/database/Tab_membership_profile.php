<?php
// update log:
//	2016 -------------------
include "config/AIMS_sub_show_membership_profile_$lang.php";
if ($state == "Update")
	{
	$oninput = "oninput=\"enable_submit_membership_button()\"";
	$onclick = "onclick=\"enable_submit_membership_button()\"";
	$note = "";
	}
else
	{
	$oninput = "";
	$onclick = "";
	$note = "&nbsp;<img src=\"images/icons/note.gif\" style=\"vertical-align:middle;width:20px;margin-left:3px;cursor:help;\" alt=\"\" title=\"Unable to add new membership profile until the new member personal profile record has been created and saved to AIMS.\" />";
	}
// setup main div object for presenting membership details record
echo ('<div class="membership_profile_main box"><!-- begin membership_profile_main -->');
echo ("\n".'<form name="Membership_Profile_Form" method="post" action="sub_update_membership_profile.php">');

// setup the member's membership profile header (the green title bar)
//if ($state == "Create")
//	{ $remaining_title = "Member Number# (<i>not yet assigned</i>)"; }
//else
//	{ $remaining_title = "Member Number# ".$Line_tbl_Members->Member_Number."</b>"; }
echo ("\n".'<div style="float:left;width:100%;height:24px;text-align:center;margin:auto;padding-top:3px;" class="bggreen"><img src="../images/shield.ico" alt="" style="margin-right:5px;vertical-align:middle;height:20px;" />&nbsp;<b>'.$name_in_title_bar.' Membership Profile&nbsp;&mdash;&nbsp;'.$remaining_title.'</div>');
echo ("\n".'<div style="float:left;width:100%;"><!-- begin top portion of window -->');
// left record column div
echo ("\n\t".'<div class="memshp_profile_col1"><!-- begin left record column -->');
echo ("\n\t".'<table border="0" align="center" style="width:100%;" cellpadding="0" cellspacing="2">');
echo ("\n\t".'<tr>
		<td style="width:30%;" class="Label">Chapter:</td>
		<td style="width:70%;"><select name="ChapterID" '.$onclick.' >');
		if ($state == "Update")
			{
			for ($i=0;$i<$num_array_chapters;$i++) 
				{
				echo ('		<option ' . ($members_chapter_ID == $array_chapterID[$i] ? 'SELECTED' : '') . ' value="' .$array_chapterID[$i] . '">' . $array_chapter_name[$i] .'</option>'."\n");
				}
			}
		elseif ($state == "Create")
			{
			for ($i=0;$i<$num_array_chapters;$i++) 
				{
				echo ('		<option value="' .$array_chapterID[$i] . '">' . $array_chapter_name[$i] .'</option>'."\n");
				}
			}

echo ('		</select></td>');
echo ("\n\t".'</tr>');
echo ('	<tr>
		<td style="width:30%;" class="Label">School:</td>
		<td style="width:70%;"><input type="text" name="School" maxlength="6" size="2" value="'.$school.'" tabindex="40" '.$oninput.' />
		 <img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-left:3px;cursor:help;" alt="" title="'.$title_school[$lang_num].'" /></td>
	</tr>');
echo ('<tr>
		<td style="width:30%;" class="Label">Member Number:</td>
		<td style="width:70%;"><input type="text" name="MemNumber" maxlength="6" size="3" value="'.$member_number.'" tabindex="2" '.$oninput.' />');
		echo (' <img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-left:3px;cursor:help;" alt="" title="'.$title_member_number[$lang_num].'" /></td>');
echo ('	</tr><tr>');
echo ('		<td style="width:30%;" class="Label">Membership Date:</td>');
if ($date_joined == "0000-00-00") { $date_joined = ""; }
echo ('		<td style="width:70%;"><input type="text" name="MemDate_Form" id="MemDate_Form" data-zdp_first_day_of_week="0" maxlength="10" size="4" placeholder="yyyy-mm-dd" value="'.$date_joined.'" tabindex="2" '.$onclick.' /> <i>yyyy-mm-dd</i>
			<script type="text/javascript">$(\'#MemDate_Form\').Zebra_DatePicker();</script></td>
	</tr></table>');
echo ("\n\t".'</div><!-- end left record column -->');
	// 2nd column div
echo ("\n\t".'<div class="memshp_profile_col2"><!-- begin 2nd column -->');
echo ("\n\t".'<table border="0" align="left" width="80%" cellpadding="0" cellspacing="2">');
echo ("\n\t".'<tr>
		<td style="width:30%;" class="Label">Honourary:</td>');
if ($honourary_date == "0000-00-00") { $honourary_date = ""; }
echo ('		<td style="width:70%;"><input type="checkbox" name="HonouraryCheck" value="1" '.($honourary_check == 1 ? 'CHECKED' : '').' style="vertical-align:middle" onclick="enable_HonDate()" />
			<input type="text" name="HonDate_Form" id="HonDate_Form" data-zdp_first_day_of_week="0" maxlength="10" size="4" placeholder="yyyy-mm-dd" value="'.$honourary_date.'" tabindex="2" '.$onclick.' disabled="true" />
			<script type="text/javascript">$(\'#HonDate_Form\').Zebra_DatePicker();</script></td>');
echo ("\n\t".'</tr><tr>');
echo ('		<td style="width:30%;" class="Label">Grant of Arms:</td>');
echo ('		<td style="width:70%;"><input type="checkbox" name="ArmigerousCheck" value="1" '.($armigerous == 1 ? 'CHECKED' : '').' style="vertical-align:middle" disabled="true" />
			<input type="text" name="ArmigerousDate" maxlength="10" size="4" placeholder="yyyy-mm-dd" value="'.$armigerous_grant_date.'" disabled="true" /></td>');
echo ("\n\t".'</tr><tr>');
echo ('		<td style="width:30%;" class="Label">Membership Category:</td>');
echo ('		<td style="width:70%;"><select name="CategoryID" '.$onclick.'>');
for ($i=0;$i<$num_array_category;$i++) 
	{
	echo ('<option ' . ($membership_category == $category_id[$i] ? 'SELECTED' : '') . ' value="' .$category_id[$i]. '">' . $category_desc[$i] .'</option>');
	}
echo ("\n\t".'</select></td></tr></table>');
echo ("\n\t".'</div><!-- end 2nd column -->');


	// 3rd column div
echo ("\n\t".'<div class="memshp_profile_col3"><!-- begin 3rd column -->');
echo ("\n\t\t".'<table class="table_status box" cellpadding="3" cellspacing="2">');
echo ("\n\t\t".'<tr style="background-color:#ffffcc;"><td><b>&nbsp;Status</b></td><td><b>&nbsp;Date</b></td></tr>');
// add a blank row in the event a new status is to be entered, the old status and date remains archived in the database
echo ("\n\t\t".'<tr>
		<td style="width:50%;"><select name="Status_New" class="input_bgcolor" onclick="enable_new_status_date()">');
		$Result = mysqli_query($LinkID, 'SELECT Status_ID, Status_Desc FROM Status ORDER BY Status_ID');
		while ($obj2 = mysqli_fetch_object($Result)) {
		echo ('<option value="' .$obj2->Status_ID . '">' . $obj2->Status_Desc .'</option>');
		}
			echo ('</select></td>
		<td style="width:50%;"><input type="text" name="StatusDate_New" id="StatusDate_New" class="input_bgcolor" maxlength="6" data-zdp_first_day_of_week="0" size="4" value="" tabindex="2" placeholder="yyyy-mm-dd" '.$onclick.' disabled="true" />
			<script type="text/javascript">$(\'#StatusDate_New\').Zebra_DatePicker();</script></td>');
echo ("\n\t\t".'</tr>');
for ($i=0;$i<$num_array_status;$i++) 
	{
	echo ("\n\t\t".'<tr>
		<td style="width:50%;"><select name="Status'.$i.'"  disabled="true">');
			$Result = mysqli_query($LinkID, 'SELECT Status_ID, Status_Desc FROM Status ORDER BY Status_ID');
			while ($obj2 = mysqli_fetch_object($Result)) {
			echo ('<option ' . ($obj2->Status_ID == $array_status_ID[$i] ? 'SELECTED' : '') . ' value="' .$obj2->Status_ID . '">' . $obj2->Status_Desc .'</option>');
			}
			echo ('</select></td>
			<td style="width:50%;"><input type="text" name="StatusDate_'.$i.'" id="StatusDate_'.$i.'" maxlength="6" size="4" value="'.$array_status_date[$i].'" disabled="true" /></td>');
	echo ("\n\t\t".'</tr>');
	}
echo ("\n\t\t".'</table>');
echo ("\n\t".'</div><!-- end 3rd column -->');



echo ("\n\t".'</div><!-- end top portion of window -->');

//	echo ('<div style="float:left;text-align:center;white-space:nowrap;overflow:hidden;width:100%;background-color:orange;">');
echo ("\n\t".'<div style="float:left;width:100%;margin-top:15px;margin-bottom:15px;"><!-- begin bottom portion of window -->');
//echo ("\n\t\t".'<div class="status_ranks_panel">');
//	echo ('		<table style="border-collapse:collapse;border:1px solid black;width:40%;" align="left" cellpadding="3" cellspacing="2">');
//	echo ('		<table style="border-collapse:collapse;border:1px solid black;width:50%;" align="right" cellpadding="3" cellspacing="2">');
echo ("\n\t\t".'<table class="table_rank box" cellpadding="3" cellspacing="2">');
echo ("\n\t\t".'<tr style="background-color:#ffffcc;"><td><b>&nbsp;Ranks</b></td><td><b>&nbsp;Date</b></td><td><b>&nbsp;Location</b></td></tr>');
// add a blank row in the event a new rank is to be entered, the old rank and date remains archived in the database
echo ("\n\t\t".'<tr>
			<td style="width:33%;"><select name="Rank_New" class="input_bgcolor" style="width:100%;" onclick="enable_new_rank_date()">');
			$Result = mysqli_query($LinkID, 'SELECT Rank_ID, Rank_Desc FROM Ranks ORDER BY Rank_ID');
			while ($obj2 = mysqli_fetch_object($Result)) {
			echo ('<option value="' .$obj2->Rank_ID . '">' . $obj2->Rank_Desc .'</option>');
			}
			echo ('</select></td>
			<td style="width:22%;"><input type="text" name="RankDate_New" id="RankDate_New" data-zdp_first_day_of_week="0" maxlength="6" class="input_bgcolor" size="4" value="" tabindex="2" placeholder="yyyy-mm-dd" '.$onclick.' disabled="true" />
				<script type="text/javascript">$(\'#RankDate_New\').Zebra_DatePicker();</script></td>
			<td style="width:44%;"><input type="text" name="RankLocation_New" id="RankLocation_New" maxlength="64" class="input_bgcolor" style="width:90%;" value="" tabindex="3" '.$onclick.' disabled="true" /></td>');

echo ("\n\t\t".'</tr>');
for ($i=0;$i<$num_array_rank;$i++) 
	{
	echo ("\n\t\t".'<tr>
		<td style="width:33%;"><select name="Rank_'.$i.'" style="width:100%;"  disabled="true">');
			$Result = mysqli_query($LinkID, 'SELECT Rank_ID, Rank_Desc FROM Ranks ORDER BY Rank_ID');
			while ($obj2 = mysqli_fetch_object($Result)) {
			if ($state == "Update")
				{echo ('<option ' . ($obj2->Rank_ID == $array_rank_ID[$i] ? 'SELECTED' : '') . ' value="' .$obj2->Rank_ID . '">' . $obj2->Rank_Desc .'</option>'); }
			else
				{echo ('<option value="' .$obj2->Rank_ID . '">' . $obj2->Rank_Desc .'</option>'); $array_rank_date_single_element = "";}
			}
			echo ('</select></td>
			<td style="width:22%;"><input type="text" name="RankDate_'.$i.'" id="RankDate_'.$i.'" data-zdp_first_day_of_week="0" maxlength="6" size="4" value="'.$array_rank_date[$i].'" disabled="true" /></td>
			<td style="width:44%;"><input type="text" name="RankLocation_'.$i.'\'" id="RankLocation" maxlength="64" style="width:90%;" value="'.$array_rank_location[$i].'" disabled="true" /></td>');
	echo ("\n\t\t".'</tr>');
	}
echo ("\n\t\t".'</table>');
echo ("\n\t\t".'<table class="table_position box" cellpadding="3" cellspacing="2">');
echo ("\n\t\t".'<tr style="background-color:#ffffcc;"><td><b>&nbsp;Positions</b></td><td><b>&nbsp;Date</b></td></tr>');
// add a blank row in the event a new position is to be entered, the old position and date remains archived in the database
echo ("\n\t\t".'<tr>
			<td width="60%"><select name="Position_New" class="input_bgcolor" style="width:100%;" onclick="enable_new_position_date()">');
			$Result = mysqli_query($LinkID, 'SELECT Position_ID, Position_Desc FROM tbl_Positions ORDER BY Position_ID');
			while ($obj2 = mysqli_fetch_object($Result)) {
			echo ('<option value="' .$obj2->Position_ID . '">' . $obj2->Position_Desc .'</option>');
			}
			echo ('</select></td>
			<td width="40%"><input type="text" name="PositionDate_New" id="PositionDate_New" data-zdp_first_day_of_week="0" class="input_bgcolor" maxlength="6" size="4" value="" tabindex="2" placeholder="yyyy-mm-dd" '.$onclick.' disabled="true" />
				<script type="text/javascript">$(\'#PositionDate_New\').Zebra_DatePicker();</script></td>');
echo ("\n\t\t".'</tr>');
for ($i=0;$i<$num_array_position_mem;$i++) 
	{
	echo ("\n\t\t".'<tr>
			<td width="60%"><select name="Position_'.$i.'" style="width:100%;"  disabled="true">');
			$Result = mysqli_query($LinkID, 'SELECT Position_ID, Position_Desc FROM tbl_Positions ORDER BY Position_ID');
			while ($obj2 = mysqli_fetch_object($Result)) {
			if ($state == "Update")
				{echo ('<option ' . ($obj2->Position_ID == $position_mem_id[$i] ? 'SELECTED' : '') . ' value="' .$obj2->Position_ID . '">' . $obj2->Position_Desc .'</option>'); }
			else
				{echo ('<option value="' .$obj2->Position_ID . '">' . $obj2->Position_Desc .'</option>'); $array_position_date_single_element = "";}
			}
			echo ('</select></td>
			<td width="40%"><input type="text" name="PositionDate_'.$i.'" id="PositionDate_'.$i.'" data-zdp_first_day_of_week="0" maxlength="6" size="4" value="'.$position_mem_startdate[$i].'" disabled="true" /></td>');
	echo ("\n\t\t".'	</tr>');
	}
echo ("\n\t\t".'</table><input type="hidden" name="MemID" value="'.$member_ID.'" /><input type="hidden" name="PortraitFile" value="'.$portrait_file.'" />');
//echo ("\n\t\t".'</div><!-- end awards_positions_panel -->');
echo ("\n\t".'</div><!-- end bottom portion of window -->');
echo ("\n".'<table width="100%" style="background-color:orange;">'."\n");
echo ("\n".'<tr>');
echo ("\n\t".'<td align="center"><input type="submit" class="button" value="Enter to save membership profile update(s)" name="submit_membership_button" id="submit_membership_button" disabled="true" /> <input type="reset" class="button"  value="Clear Recent Updates" />'.$note.'</td>');
echo ("\n".'</tr>');
echo ('</table></form><!-- end Membership_Profile_Form -->');
echo ("\n".'</div><!-- end membership_profile_main -->');
?>

