<?php
// Program: tab_armigerous_profile.php
// Author: David M. Cvet
// Created: May 24, 2017
// Description:
//	This sub script will display the detailed armorial bearings related fields from the membership record on an online form.
//	This sub script is included in Members_show.php
//---------------------------
// update log:
//	2017 -------------------
//	aug 02:	added armiger's notes field to table tbl_Armigerous_Members
//	nov 27:	added onclick function to on the roll input variable, changed the language presentation of the armigerous tab to the preferred
//		language of the member - this will show French labels in the tab regardless of language selected, and will cause the labels
//		displayed in the roll in the language preferred
//	dec 03:	if this is to be a new armigerous record, the armoury name and caption have been generated and are inserted as placeholder values,
//		and if this is to be submitted, the placeholder values are to be picked up by the update module by checking their respective hidden values
//
$button_label = "Click to save new armigerous record";
if ($state == "Update")
	{
	$oninput = "oninput=\"enable_submit_armigerous_button()\"";
	$onclick = "onclick=\"enable_submit_armigerous_button()\"";
	$note = "";
	}
else
	{
	$oninput = "";
	$onclick = "";
	$note = "&nbsp;<img src=\"images/icons/note.gif\" style=\"vertical-align:middle;width:20px;margin-left:3px;cursor:help;\" alt=\"\" title=\"Unable to add new armigerous profile until the new member personal profile record has been created and saved to AIMS.\" />";
	}
include "config/AIMS_sub_show_armigerous_profile_$lang.php";
	// some processing of the armoury name, should the member be deceased, perform string manipulation and add a dagger adjacent to the surname
	// this processing should happen when in the personal profile, the deceased date and/or checkbox are enabled as the member had become deceased
	// which means that this checking within the armigerous module will not be necessary!!!!
	if ($deceased) 
		{
		$comma = ",";
		$pos = strpos($armoury_name, $comma);
		$new_armoury_name = substr($armoury_name,0,$pos)."<sup>&dagger;</sup>".substr($armoury_name,$pos+1);
		$armoury_name = $new_armoury_name;
		} 
	else	{ $deceased_checked = ""; }
	// string processing of deceased member

	// setup main div object for presenting membership details record
	echo ('<div class="armigerous_profile_main box"><!-- begin armigerous_profile_main -->');
// begin: proposed armoury name section
// this code segment will determine the possible armoury name and caption name for a new armigerous entry
// for an existing member - the proposed names are ghosted and if nothing's done to them, these will be filed
if ($state == "Update")
	{
	if ($armigerous) // flag sourced from Members
		{
		if ($armigerous_found) // flag assigned if record exists in tbl_Armigerous_Members
			{ echo ("\n\t".'<form name="Armigerous_Profile_Form" method="post" action="sub_update_armigerous_profile.php?ADM='.$admin.'">'); $button_label = "Click to save updated armigerous record"; }
		else
			{
			echo ("\n\t".'<form name="Armigerous_Profile_Form" method="post" action="sub_create_armigerous_profile.php?ADM='.$admin.'">'); 
			// setup the full name with postnominals as it would appear in the roll of arms
			$placeholder_name = strtoupper($last_name);
			if ($deceased) {$placeholder_name .= "<sup>&dagger;</sup>";}
			$placeholder_name .= ", ".$first_name." ".$middle_name;
			if ($postnominals) {$placeholder_name .= ", ".$postnominals;}
			$possible_armoury_name = $placeholder_name;
			$placeholder_name = "placeholder=\"".$placeholder_name."\"";

			// setup the caption under the arms on the roll of arms index page
			$placeholder_caption = $last_name;
			if ($deceased) {$placeholder_caption .= "<sup>&dagger;</sup>";}
			$placeholder_caption .= ", ".substr($first_name,0,1).".";
			if ($middle_name) {$placeholder_caption .= substr($middle_name,0,1).".";}
			$possible_armoury_caption = $placeholder_caption;
			$placeholder_caption = "placeholder=\"".$placeholder_caption."\"";

			// determine the HTML symbols following the caption name for the roll of arms index page
			if ($num_array_awards_mem)
				{
				for ($i=0;$i<$num_array_awards_mem;$i++)
					{
					for ($j=0;$j<$num_array_awards;$j++)
						{
						if ($array_awards_mem_ID[$i] == $array_award_ID[$j])
							{ $placeholder_caption .= $array_award_HTML[$j]; }
						}
					}
				}
			}
		}
	else	
		{
		echo ("\n\t".'<form name="Armigerous_Profile_Form" method="post" action="sub_create_armigerous_profile.php?ADM='.$admin.'">'); 
		// setup the full name with postnominals as it would appear in the roll of arms
		$placeholder_name = strtoupper($last_name);
		if ($deceased) {$placeholder_name .= "<sup>&dagger;</sup>";}
		$placeholder_name .= ", ".$first_name." ".$middle_name;
		if ($postnominals) {$placeholder_name .= ", ".$postnominals;}
		$possible_armoury_name = $placeholder_name;
		$placeholder_name = "placeholder=\"".$placeholder_name."\"";

		// setup the caption under the arms on the roll of arms index page
		$placeholder_caption = $last_name;
		if ($deceased) {$placeholder_caption .= "<sup>&dagger;</sup>";}
		$placeholder_caption .= ", ".substr($first_name,0,1).".";
		if ($middle_name) {$placeholder_caption .= substr($middle_name,0,1).".";}
		$possible_armoury_caption = $placeholder_caption;
		$placeholder_caption = "placeholder=\"".$placeholder_caption."\"";

		// determine the HTML symbols following the caption name for the roll of arms index page
		if ($num_array_awards_mem)
			{
			for ($i=0;$i<$num_array_awards_mem;$i++)
				{
				for ($j=0;$j<$num_array_awards;$j++)
					{
					if ($array_awards_mem_ID[$i] == $array_award_ID[$j])
						{ $placeholder_caption .= $array_award_HTML[$j]; }
					}
				}
			}
		}
	}
else	{
	echo ("\n\t".'<form name="Armigerous_Profile_Form" method="post" action="sub_create_armigerous_profile.php?ADM='.$admin.'">'); 
	// setup the full name with postnominals as it would appear in the roll of arms
	$placeholder_name = strtoupper($last_name);
	if ($deceased) {$placeholder_name .= "<sup>&dagger;</sup>";}
	$placeholder_name .= ", ".$first_name." ".$middle_name;
	if ($postnominals) {$placeholder_name .= ", ".$postnominals;}
	$possible_armoury_name = $placeholder_name;
	$placeholder_name = "placeholder=\"".$placeholder_name."\"";

	// setup the caption under the arms on the roll of arms index page
	$placeholder_caption = $last_name;
	if ($deceased) {$placeholder_caption .= "<sup>&dagger;</sup>";}
	$placeholder_caption .= ", ".substr($first_name,0,1).".";
	if ($middle_name) {$placeholder_caption .= substr($middle_name,0,1).".";}
	$possible_armoury_caption = $placeholder_caption;
	$placeholder_caption = "placeholder=\"".$placeholder_caption."\"";

	// determine the HTML symbols following the caption name for the roll of arms index page
	if ($num_array_awards_mem)
		{
		for ($i=0;$i<$num_array_awards_mem;$i++)
			{
			for ($j=0;$j<$num_array_awards;$j++)
				{
				if ($array_awards_mem_ID[$i] == $array_award_ID[$j])
					{ $placeholder_caption .= $array_award_HTML[$j]; }
				}
			}
		}
	}
// end: proposed armoury name section

//if ($state == "Update")
//	{
//	if ($armigerous) // flag sourced from tbl_Members
//		{
//		if ($armigerous_found) // flag assigned if record exists in tbl_Armigerous_Members
//			{ echo ("\n\t".'<form name="Armigerous_Profile_Form" method="post" action="sub_update_armigerous_profile.php">'); $button_label = "Click to save updated armigerous record"; }
//		else
//			{ echo ("\n\t".'<form name="Armigerous_Profile_Form" method="post" action="sub_create_armigerous_profile.php">'); }
//		}
//	else	{ echo ("\n\t".'<form name="Armigerous_Profile_Form" method="post" action="sub_create_armigerous_profile.php">'); }
//	}
//else	{ echo ("\n\t".'<form name="Armigerous_Profile_Form" method="post" action="sub_create_armigerous_profile.php">'); }

echo ("\n".'<div style="float:left;width:100%;height:24px;text-align:center;margin:auto;padding-top:3px;" class="bggreen"><img src="images/rhsc.ico" alt="" style="margin-right:5px;vertical-align:middle;height:20px;" />&nbsp;<b>'.$name_in_title_bar.' Armigerous Profile&nbsp;&mdash;&nbsp;'.$remaining_title.'</div>');
	// setup table for arms presentation
?>
	<div style="float:left;margin-left:2%;width:95%;"><br /><img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-right:4px;cursor:help;" alt="" title="<?=$armouryname_title[$lang_num]?>" /><span class="Label"><?=$armouryname_label[$lang_num]?>:&nbsp;</span><input type="text" name="ArmouryName" id="ArmouryName" maxlength="128" style="width:45%;" <?=$placeholder_name?> value="<?=$armoury_name?>" autofocus tabindex="1" oninput="enable_submit_armigerous_button()" />&nbsp;<img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-right:4px;cursor:help;" alt="" title="<?=$caption_title[$lang_num]?>" /><span  class="Label">Caption: </span><input type="text" name="CaptionName" id="CaptionName" maxlength="64" style="width:24%;" <?=$placeholder_caption?> value="<?=$arms_caption?>" tabindex="2" oninput="enable_submit_armigerous_button()" /><br /><br /></div>

<!--	<div style="float:left;margin-left:5%;width:95%;"><br /><span  style="cursor:help;" title="<?=$armouryname_title[$lang_num]?>"><?=$armouryname_label[$lang_num]?>:&nbsp;</span><input type="text" name="ArmouryName" id="ArmouryName" maxlength="128" style="width:70%;" value="<?=$armoury_name?>" autofocus tabindex="1"><br /><br /></div>-->
	<div class="armig_left_panel">
		<div  style="float:left;width:100%;margin-left:5%;" class="box"><a href="<?=$members_only_path?><?=$arms_URL?><?=$armoury_letter?>/<?=$arms_file_large?>"><img src="<?=$members_only_path?><?=$arms_URL?><?=$armoury_letter?>/<?=$arms_file_350?>" border="0" width="100%" alt="" title="Click arms to view larger image" class="fade" /></a></div>
		<div style="float:left;width:100%;">
			<table align="left" style="width:100%;border-collapse:collapse;" cellpadding="10px">
			<tr>
				<td align="right"  style="vertical-align:middle" class="armoury_entry_titles"><span  style="cursor:help;" title="<?=$arms_file_100_title[$lang_num]?>"><?=$arms_file_100_label[$lang_num]?>:</span></td>
				<td><input type="text" name="ArmsFile100" id="ArmsFile100" maxlength="128" style="width:90%;" value="<?=$arms_file_100?>" tabindex="2" <?=$oninput?> /></td>
			</tr>
			<tr>
				<td align="right"  style="vertical-align:middle" class="armoury_entry_titles"><span  style="cursor:help;" title="<?=$arms_file_350_title[$lang_num]?>"><?=$arms_file_350_label[$lang_num]?>:</span></td>
				<td><input type="text" name="ArmsFile350" id="ArmsFile350" maxlength="128" style="width:90%;" value="<?=$arms_file_350?>" tabindex="3" <?=$oninput?> /></td>
			</tr>
			<tr>
				<td align="right"  style="vertical-align:middle" class="armoury_entry_titles"><span  style="cursor:help;" title="<?=$arms_file_large_title[$lang_num]?>"><?=$arms_file_large_label[$lang_num]?>:</span></td>
				<td><input type="text" name="ArmsFileLarge" id="ArmsFileLarge" maxlength="128" style="width:90%;" value="<?=$arms_file_large?>" tabindex="4" <?=$oninput?> /></td>
			</tr>
			<tr>
				<td align="right"  style="vertical-align:middle" class="armoury_entry_titles"><span  style="cursor:help;" title="<?=$badge_file_title[$lang_num]?>"><?=$badge_file_label[$lang_num]?>:</span></td>
				<td><input type="text" name="BadgeFile" id="BadgeFile" maxlength="128" style="width:90%;" value="<?=$badge_file?>" tabindex="5" <?=$oninput?> /></td>
			</tr>
			<tr>
				<td align="right"  style="vertical-align:middle" class="armoury_entry_titles"><span  style="cursor:help;" title="<?=$flag_file_title[$lang_num]?>"><?=$flag_file_label[$lang_num]?>:</span></td>
				<td><input type="text" name="FlagFile" id="FlagFile" maxlength="128" style="width:90%;" value="<?=$flag_file?>" tabindex="6" <?=$oninput?> /></td>
			</tr>
			<tr>
				<td align="right"  style="vertical-align:middle" class="armoury_entry_titles"><span  style="cursor:help;" title="<?=$standard_file_title[$lang_num]?>"><?=$standard_file_label[$lang_num]?>:</span></td>
				<td><input type="text" name="StandardFile" id="StandardFile" maxlength="128" style="width:90%;" value="<?=$standard_file?>" tabindex="7" <?=$oninput?> /></td>
			</tr>
			<tr>
				<td align="right"  style="vertical-align:middle" class="armoury_entry_titles"><span  style="cursor:help;" title="<?=$cadet_arms_file_label[$lang_num]?>"><?=$cadet_arms_file_label[$lang_num]?>:</span></td>
				<td><input type="text" name="CadetFile" id="CadetFile" maxlength="128" style="width:90%;" value="<?=$cadet_file?>" tabindex="7" <?=$oninput?> /></td>
			</tr>
			<tr>
				<td align="right"  style="vertical-align:middle" class="armoury_entry_titles"><span  style="cursor:help;" title="<?=$painted_arms_file_label[$lang_num]?>"><?=$painted_arms_small_file_label[$lang_num]?>:</span></td>
				<td><input type="text" name="PaintedFileSmall" id="PaintedFileSmall" maxlength="128" style="width:90%;" value="<?=$painted_arms_small_file?>" tabindex="7" <?=$oninput?> /></td>
			</tr>
			<tr>
				<td align="right"  style="vertical-align:middle" class="armoury_entry_titles"><span  style="cursor:help;" title="<?=$painted_arms_file_label[$lang_num]?>"><?=$painted_arms_file_label[$lang_num]?>:</span></td>
				<td><input type="text" name="PaintedFile" id="PaintedFile" maxlength="128" style="width:90%;" value="<?=$painted_arms_file?>" tabindex="7" <?=$oninput?> /></td>
			</tr>
			<tr>
				<td align="right"  style="vertical-align:middle" class="armoury_entry_titles"><span  style="cursor:help;" title="<?=$painted_by_label[$lang_num]?>"><?=$painted_by_label[$lang_num]?>:</span></td>
				<td><input type="text" name="PaintedBy" id="PaintedBy" maxlength="128" style="width:90%;" value="<?=$painted_by?>" tabindex="7" <?=$oninput?> /></td>
			</tr>
			<tr>
				<td align="right"  style="vertical-align:middle" class="armoury_entry_titles"><span  style="cursor:help;" title="<?=$painted_date_label[$lang_num]?>"><?=$painted_date_label[$lang_num]?>:</span></td>
				<td><input type="text" name="PaintedDate" id="PaintedDate" maxlength="128" style="width:90%;" value="<?=$painted_date?>" tabindex="7" <?=$oninput?> /></td>
			</tr>

			<tr>
				<td align="right"  style="vertical-align:middle" class="armoury_entry_titles"><span  style="cursor:help;" title="<?=$standard_file_title[$lang_num]?>">Armoury Letter:</span></td>
				<td><select name="ArmouryLetter" tabindex="8" style="cursor:pointer" <?=$oninput?>>
<?php
				echo('	<option value="">&nbsp;</option>
					<option value="a" '.($armoury_letter == "a" ? 'SELECTED' : '').' >a</option>
					<option value="b" '.($armoury_letter == "b" ? 'SELECTED' : '').' >b</option>
					<option value="c" '.($armoury_letter == "c" ? 'SELECTED' : '').' >c</option>
					<option value="d" '.($armoury_letter == "d" ? 'SELECTED' : '').' >d</option>
					<option value="e" '.($armoury_letter == "e" ? 'SELECTED' : '').' >e</option>
					<option value="f" '.($armoury_letter == "f" ? 'SELECTED' : '').' >f</option>
					<option value="g" '.($armoury_letter == "g" ? 'SELECTED' : '').' >g</option>
					<option value="h" '.($armoury_letter == "h" ? 'SELECTED' : '').' >h</option>
					<option value="i" '.($armoury_letter == "i" ? 'SELECTED' : '').' >i</option>
					<option value="j" '.($armoury_letter == "j" ? 'SELECTED' : '').' >j</option>
					<option value="k" '.($armoury_letter == "k" ? 'SELECTED' : '').' >k</option>
					<option value="l" '.($armoury_letter == "l" ? 'SELECTED' : '').' >l</option>
					<option value="m" '.($armoury_letter == "m" ? 'SELECTED' : '').' >m</option>
					<option value="n" '.($armoury_letter == "n" ? 'SELECTED' : '').' >n</option>
					<option value="o" '.($armoury_letter == "o" ? 'SELECTED' : '').' >o</option>
					<option value="p" '.($armoury_letter == "p" ? 'SELECTED' : '').' >p</option>
					<option value="q" '.($armoury_letter == "q" ? 'SELECTED' : '').' >q</option>
					<option value="r" '.($armoury_letter == "r" ? 'SELECTED' : '').' >r</option>
					<option value="s" '.($armoury_letter == "s" ? 'SELECTED' : '').' >s</option>
					<option value="t" '.($armoury_letter == "t" ? 'SELECTED' : '').' >t</option>
					<option value="u" '.($armoury_letter == "u" ? 'SELECTED' : '').' >u</option>
					<option value="v" '.($armoury_letter == "v" ? 'SELECTED' : '').' >v</option>
					<option value="w" '.($armoury_letter == "w" ? 'SELECTED' : '').' >w</option>
					<option value="x" '.($armoury_letter == "x" ? 'SELECTED' : '').' >x</option>
					<option value="y" '.($armoury_letter == "y" ? 'SELECTED' : '').' >y</option>
					<option value="z" '.($armoury_letter == "z" ? 'SELECTED' : '').' >z</option>
					</select></td>');
?>
			</tr>
		<tr>
			<td align="right"  style="vertical-align:middle" class="armoury_entry_titles">Arms in Roll:</td>
<?php
			echo ('<td style="width:70%;"><input type="checkbox" name="ArmsInRoll" value="1" '. ($on_the_roll == 1 ? 'CHECKED' : '') .'  style="vertical-align:middle" /> <img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-right:4px;cursor:help;" alt="" title="'.$title_arms_in_roll[$lang_num].'" /></td>');
?>
		</tr>
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles"><?=$symbolism_label[$lang_num]?>:</td>
			<td><textarea name="Symbolism" id="Symbolism" rows="8" style="width:95%;" wrap="virtual" tabindex="16" <?=$oninput?>><?=$symbolism?></textarea></td>
		</tr>

			</table>
		</div>
	</div><!-- end armig_left_panel -->
	<div class="armig_right_panel">
		<table align="center" style="width:100%;border-collapse:collapse;" cellpadding="10px">
		<tr>
			<td align="right"  style="vertical-align:middle" class="armoury_entry_titles"><?=$arms[$lang_num]?>:</td>
			<td><textarea name="BlazonArms" id="BlazonArms" rows="3" style="width:95%;" wrap="virtual" tabindex="8" <?=$oninput?>><?=$blazon_arms?></textarea></td>
		</tr>
		<tr>
			<td align="right" valign="top" class="armoury_entry_titles"><?=$crest[$lang_num]?>:</td>
			<td><textarea name="BlazonCrest" id="BlazonCrest" rows="2" style="width:95%;" wrap="virtual" tabindex="9" <?=$oninput?>><?=$blazon_crest?></textarea></td>
		</tr>
<?php
//	if ($blazon_supporters)
//		{
?>
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles"><?=$supporters[$lang_num]?>:</td>
			<td><textarea name="BlazonSupporters" id="BlazonSupporters" rows="3" style="width:95%;" wrap="virtual" tabindex="10" <?=$oninput?>><?=$blazon_supporters?></textarea></td>
		</tr>
<?php
//		}
?>
<?php
//	if ($blazon_motto)
//		{
?>
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles"><?=$motto[$lang_num]?>:</td>
			<td><textarea name="BlazonMotto" id="BlazonMotto" rows="2" style="width:95%;" wrap="virtual" tabindex="11" <?=$oninput?>><?=$blazon_motto?></textarea></td>
		</tr>
<?php
//		}
?>
<?php
//	if ($blazon_badge)
//		{
?>
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles"><?=$badge[$lang_num]?>:</td>
			<td><table style="width:100%;"><tr><td><img src="<?=$members_only_path?><?=$arms_URL?><?=$armoury_letter?>/<?=$badge_file?>" width="80" alt="" class="box" /></td>
			<td width="95%"><textarea name="BlazonBadge" id="BlazonBadge" rows="4" style="width:95%;" wrap="virtual" tabindex="12" <?=$oninput?>><?=$blazon_badge?></textarea></td></tr></table></td>
<?php
//		}
?>
<?php
//	if ($blazon_flag)
//		{
?>
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles"><?=$flag[$lang_num]?>:</td>
			<td><textarea name="BlazonFlag" id="BlazonFlag" rows="1"  style="width:95%;" wrap="virtual" tabindex="13" <?=$oninput?>><?=$blazon_flag?></textarea></td>
		</tr>
<?php
//		}
?>
<?php
//	if ($blazon_standard)
//		{
?>
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles"><?=$standard[$lang_num]?>:</td>
			<td><textarea name="BlazonStandard" id="BlazonStandard" rows="2" style="width:95%;" wrap="virtual" tabindex="14" <?=$oninput?>><?=$blazon_standard?></textarea></td>
		</tr>
<?php
//		}
?>
<?php
//	if ($blazon_cadet)
//		{
?>
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles"><?=$cadet[$lang_num]?>:</td>
			<td><table style="width:100%;"><tr><td><img src="<?=$members_only_path?><?=$arms_URL?><?=$armoury_letter?>/<?=$cadet_file?>"  alt="" class="box" /></td>
			<td width="95%"><textarea name="BlazonCadet" id="BlazonCadet" rows="4" style="width:95%;" wrap="virtual" tabindex="15" <?=$oninput?>><?=$blazon_cadet?></textarea></td></tr></table></td>
		</tr>
<?php
//		}
?>
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles"><?=$source[$lang_num]?>:</td>
			<td><textarea name="ArmsSource" id="ArmsSource" rows="5" style="width:95%;" wrap="virtual" tabindex="16" <?=$oninput?>><?=$arms_source?></textarea></td>
		</tr>
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles">Date of Grant:</td>
<?php
if ($armigerous_grant_date == "0000-00-00") { $armigerous_grant_date = ""; }
echo ('		<td style="width:70%;"><input type="checkbox" name="ArmigerousCheck" value="1" '.($armigerous == 1 ? 'CHECKED' : '').' style="vertical-align:middle" '.$oninput.' />
			<input type="text" name="ArmigerousGrantDate" data-zdp_first_day_of_week="0"  maxlength="10" size="6" placeholder="yyyy-mm-dd" value="'.$armigerous_grant_date.'" tabindex="8" id="ArmigerousGrantDate" '.$onclick.' /> <img src="../images/icons/event_icon.gif" alt="" style="vertical-align:middle" />
			<script type="text/javascript">$(\'#ArmigerousGrantDate\').Zebra_DatePicker();</script> yyyy-mm-dd</td>');
echo ("\n\t".'</tr>');

//	if ($CHA_chk) { $cha_checked = "CHECKED"; } else { $cha_checked = ""; }
?>
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles Label"><img src="images/icons/note.gif" class="fade" style="vertical-align:middle;width:20px;margin-right:4px;cursor:help;" alt="" title="This is the URL to either the granting authority or to the specific blazon/grant online hosted by that authority." /><?=$arms_link[$lang_num]?>:</td>
			<td><textarea name="AuthLink" id="AuthLink" rows="2" style="width:86%;" wrap="virtual" tabindex="22" oninput="enable_submit_armigerous_button()"><?=$auth_link?></textarea></td>
		</tr>
<?php
		echo ('
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles Label"><img src="images/icons/note.gif" class="fade" style="vertical-align:middle;width:20px;margin-right:4px;cursor:help;" alt="" title="Select the relevant Heraldic Authority for the grant/assumed arms. CHA = Canadian Heraldic Authority,  COA = College of Arms,  NAT = The Chief Herald of Ireland, Bureau of Heraldry South Africa or other recognized national authority,  INST = institutional society members,  ASS = assumed arms by individuals whose country of citizenship does not possess an official heraldic authority." />&nbsp;'.$heraldic_authority[$lang_num].':</td>
			<td class="Label" align="left">CHA:<input type="checkbox" name="CHAcheckbox" id="CHAcheckbox"  value="1" tabindex="21" style="vertical-align:middle;" '. ($CHA_chk == 1 ? 'CHECKED' : '') .'  oninput="enable_submit_armigerous_button()" />&nbsp;&nbsp;&nbsp;COA:<input type="checkbox" name="COAcheckbox" id="COAcheckbox"  value="1" tabindex="21" style="vertical-align:middle;" '. ($COA_chk == 1 ? 'CHECKED' : '') .' oninput="enable_submit_armigerous_button()" />&nbsp;&nbsp;&nbsp;Lyon:<input type="checkbox" name="LYONcheckbox" id="LYONcheckbox"  value="1" tabindex="21" style="vertical-align:middle;" '. ($LYON_chk == 1 ? 'CHECKED' : '') .' oninput="enable_submit_armigerous_button()" />&nbsp;&nbsp;&nbsp;NAT:<input type="checkbox" name="NATcheckbox" id="NATcheckbox"  value="1" tabindex="21" style="vertical-align:middle;" '. ($NAT_chk == 1 ? 'CHECKED' : '') .' oninput="enable_submit_armigerous_button()" />&nbsp;&nbsp;&nbsp;INST:<input type="checkbox" name="INSTcheckbox" id="INSTcheckbox"  value="1" tabindex="21" style="vertical-align:middle;" '. ($INST_chk == 1 ? 'CHECKED' : '') .' oninput="enable_submit_armigerous_button()" />&nbsp;&nbsp;&nbsp;ASS:<input type="checkbox" name="ASScheckbox" id="ASScheckbox"  value="1" tabindex="21" style="vertical-align:middle;" '. ($ASS_chk == 1 ? 'CHECKED' : '') .' oninput="enable_submit_armigerous_button()" /></td>
		</tr>
		');
?>
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles"><?=$sym_label[$lang_num]?>:</td>
			<td style="vertical-align:middle"><a href="javascript:symWin('<?=$members_only_path?><?=$arms_URL?><?=$armoury_letter?>/<?=$symbolism_file?>')"><img src="<?=$members_only_path?><?=$arms_URL?>anim_simple_book.gif" alt="" title="<?=$symbol_clk[$lang_num]?>" border="0" class="fade" /></a>&nbsp;<input type="text" name="SymbolismFile" id="SymbolismFile" maxlength="128"  style="width:40%;" value="<?=$symbolism_file?>" tabindex="19" <?=$oninput?> /></td>
		</tr>
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles Label"><img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-right:4px;cursor:help;" class="fade" alt="" title="This file can be of jpg, png, php, html, htm, ,txt format and will contain the member's biography and portrait if available. The bio files are stored under /content/bios. This will show up on the roll of arms with a note icon." />&nbsp;<?=$bio_label[$lang_num]?>:</td>
			<td style="vertical-align:middle"><input type="text" name="BioFile" id="BioFile" maxlength="128"  style="width:50%;" value="<?=$bio_file?>" tabindex="23" oninput="enable_submit_armigerous_button()" /> <img src="images/icons/test_button.png" style="vertical-align:middle;width:35px;margin-right:4px;cursor:pointer;" class="fade" alt="" title="After you have typed in the name of the symbolism file, click this button to test the link to ensure that the correct and current symbolism file has been attached to this record." /></td>
		</tr>
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles Label"><img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-right:4px;cursor:help;" class="fade" alt="" title="Enter the name or names of the artists involved in the design and/or painting of the arms. This could include the artist assigned from the heraldic authority and can include the armiger him/herself." />&nbsp;<?=$artist_label[$lang_num]?>:</td>
			<td style="vertical-align:middle"><input type="text" name="Artist" id="Artist" maxlength="128"  style="width:50%;" value="<?=$artist?>" tabindex="23" oninput="enable_submit_armigerous_button()" /></td>
		</tr>
		<tr>
			<td align="right" style="vertical-align:middle" class="armoury_entry_titles Label"><img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-right:4px;cursor:help;" class="fade" alt="" title="Enter the name or names of the caligrapher9s) involved in the caligraphy of the arms. This could include the artist assigned from the heraldic authority and can include the armiger him/herself." />&nbsp;<?=$calligrapher_label[$lang_num]?>:</td>
			<td style="vertical-align:middle"><input type="text" name="Calligrapher" id="Calligrapher" maxlength="128"  style="width:50%;" value="<?=$calligrapher?>" tabindex="23" oninput="enable_submit_armigerous_button()" /></td>
		</tr>
		</table>
	</div><!-- end armig_right_panel -->
	<table  style="background-color:orange;width:100%;">
	<tr>
		<td align="center"><input type="submit" class="button" style="color:white;" value="<?=$button_label?>" name="submit_armigerous_button" id="submit_armigerous_button" tabindex="20" disabled="true" /> <input type="reset"  class="button" value="Clear Recent Updates" /><?=$note?></td>
	</tr>
<?php
//echo ('		</table></form>');
echo ("\n\t".'</table><input type="hidden" name="MemID" value="'.$member_ID.'" /><input type="hidden" name="PossibleArmouryName" value="'.$possible_armoury_name.'" /><input type="hidden" name="PossibleArmouryCaption" value="'.$possible_armoury_caption.'" />');
echo ('</form><!-- end Armigerous_Profile_Form -->');
echo ("\n".'</div><!-- end armigerous_profile_main -->');
?>

