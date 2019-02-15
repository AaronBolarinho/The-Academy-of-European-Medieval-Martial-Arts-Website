<?php
// update log:
//	2016 -------------------
$training_notes = "";
// setup main div object for presenting financial details record
include "config/AIMS_sub_show_username_profile_$lang.php";
if ($state == "Update")
	{
	$oninput = "oninput=\"enable_training_button()\"";
	$onclick = "onclick=\"enable_training_button()\"";
	$note = "";
	}
else
	{
	$oninput = "";
	$onclick = "";
	$note = "&nbsp;<img src=\"images/icons/note.gif\" style=\"vertical-align:middle;width:20px;margin-left:3px;cursor:help;\" alt=\"\" title=\"Unable to add new training profile until the new member personal profile record has been created and saved to AIMS.\" />";
	}
// setup main div object for presenting membership details record
echo ('<div class="training_profile_main box"><!-- begin training_profile_main -->');
echo ("\n".'<form name="Training_Profile_Form" method="post" action="sub_update_training_profile.php">');
// setup the member's financial profile header (the green title bar)
if ($state == "Create")
	{ $remaining_title = "Member Number# (<i>not yet assigned</i>)</b>"; }
else
	{ 
	$remaining_title = "Member Number# ".$Line_Members->Member_Number."</b>";
	echo ('<input type="hidden" name="MemID" value="'.$Line_Members->Member_ID.'" />');
	}
echo ("\n\t".'<div style="float:left;width:100%;height:24px;text-align:center;margin:auto;padding-top:3px;" class="bggreen"><img src="../images/icons/swordShield2.gif" alt="" style="margin-right:5px;vertical-align:middle;height:20px;" />&nbsp;<b>'.$name_in_title_bar.' Training Profile&nbsp;&mdash;&nbsp;'.$remaining_title.'</div>');
echo ('<img src="'.$members_only_path.'images/1090x4_transparent.png" width="100%" alt="" />');
echo ('
<div style="float:left;margin-left:2%;width:96%;"><b>Martial Styles Trained:</b></div>
<div style="float:left;width:30%;margin-left:15px;margin-top:5px;border-style:solid;border-width:1px;border-color:gray;border-radius:5px;padding:3px;background-color:#ffffcc;" class="box">
<input type="checkbox" name="Abrazare" value="1" '.($abrazare_check == 1 ? 'CHECKED' : '').' style="vertical-align:middle" '.$onclick.' /><i>abrazare</i> (grappling)<br />
<input type="checkbox" name="Daga" value="1" '.($daga_check == 1 ? 'CHECKED' : '').' style="vertical-align:middle" '.$onclick.' /><i>daga</i> (dagger)<br />
<input type="checkbox" name="Spada" value="1" '.($spada_check == 1 ? 'CHECKED' : '').' style="vertical-align:middle" '.$onclick.' /><i>spada</i> (arming sword)<br />
<input type="checkbox" name="Spadalonga" value="1" '.($spada_longa_check == 1 ? 'CHECKED' : '').' style="vertical-align:middle" '.$onclick.' /><i>spada longa</i> (longsword)<br />
</div>
<div style="float:left;width:30%;margin-left:15px;margin-top:5px;border-style:solid;border-width:1px;border-color:gray;border-radius:5px;padding:3px;background-color:#ffffcc;" class="box">
<input type="checkbox" name="SwordBuckler" value="1" '.($sword_buckler_check == 1 ? 'CHECKED' : '').' style="vertical-align:middle" '.$onclick.' />sword & buckler<br />
<input type="checkbox" name="Azza" value="1" '.($azza_check == 1 ? 'CHECKED' : '').' style="vertical-align:middle" '.$onclick.' /><i>azza</i> (poleaxe)<br />
<input type="checkbox" name="Lanze" value="1" '.($lanze_check == 1 ? 'CHECKED' : '').' style="vertical-align:middle" '.$onclick.' /><i>lanze</i> (spear)<br />
<input type="checkbox" name="Armoured" value="1" '.($armoured_check == 1 ? 'CHECKED' : '').' style="vertical-align:middle" '.$onclick.' />armoured combat<br />
</div>
<div style="float:left;width:30%;margin-left:15px;margin-top:5px;border-style:solid;border-width:1px;border-color:gray;border-radius:5px;padding:3px;background-color:#ffffcc;" class="box">
<input type="checkbox" name="Archery" value="1" '.($archery_check == 1 ? 'CHECKED' : '').' style="vertical-align:middle" '.$onclick.' />traditional archery<br />
<input type="checkbox" name="Mounted" value="1" '.($mounted_check == 1 ? 'CHECKED' : '').' style="vertical-align:middle" '.$onclick.' />mounted combat<br />
<input type="checkbox" name="Irapier" value="1" '.($irapier_check == 1 ? 'CHECKED' : '').' style="vertical-align:middle" '.$onclick.' />Italian rapier<br />
<input type="checkbox" name="Quarterstaff" value="1" '.($quarterstaff_check == 1 ? 'CHECKED' : '').' style="vertical-align:middle" '.$onclick.' />quarterstaff<br />
</div>');

echo('
<div style="float:left;margin-left:2%;margin-top:15px;width:96%;">
<hr />
<input type="text" name="TrainingNotes_Date" id="TrainingNotes_Date" data-zdp_first_day_of_week="0" maxlength="10" size="4" placeholder="yyyy-mm-dd" value="'.$today.'" tabindex="2" '.$onclick.' /> <script type="text/javascript">$(\'#TrainingNotes_Date\').Zebra_DatePicker();</script><img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-left:3px;cursor:help;" alt="" title="'.$title_default_date[$lang_num].'" />&nbsp;<b>Enter training notes below:</b>
<textarea name="TrainingNotes" rows="4" style="width:100%;" wrap="virtual" tabindex="13" class="box" '.$oninput.' placeholder="Type in notes here...."></textarea>
</div>');

// print past notes and dates
echo('
<div style="float:left;margin-left:2%;margin-top:15px;width:96%;"><b>Archived Notes <i>(from the most recent to the oldest entries)</i>:</b><br />');

for ($i=0; $i<$num_array_member_notes; $i++)
	{
	echo ($member_notes_date[$i].'--------------------<br />');
	echo ($member_notes[$i].'<br /><br />');
	}
echo ('</div>');
echo ("\n".'<table width="100%" style="background-color:orange;">'."\n");
?>
<tr>
	<td align="center"><input type="submit" class="button" value="Save training profile update(s)" name="submit_training_button" id="submit_training_button" disabled="true" /> <input type="reset" class="button"  value="Clear Recent Updates" /><?=$note?></td>
</tr>
<?php
echo ('</table></form><!-- end Training_Profile_Form -->');
//echo ('</div>');	// end generate invoices rows
echo ("\n".'</div><!-- end training_profile_main -->');	// end fin profile
?>
