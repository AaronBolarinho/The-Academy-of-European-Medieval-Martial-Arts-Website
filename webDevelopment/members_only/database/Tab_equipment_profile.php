<?php
// update log:
//	2016 -------------------
// setup main div object for presenting equipment details record
include "config/AIMS_sub_show_equipment_profile_$lang.php";
if ($state == "Update")
	{
	$oninput = "oninput=\"enable_equipment_button()\"";
	$note = "";
	}
else
	{
	$oninput = "";
	$note = "&nbsp;<img src=\"images/icons/note.gif\" style=\"vertical-align:middle;width:20px;margin-left:3px;cursor:help;\" alt=\"\" title=\"Unable to add new equipment profile until the new member personal profile record has been created and saved to AIMS.\" />";
	}

// setup main div object for presenting equipment details record
echo ('<div class="equipment_profile_main box"><!-- begin equipment_profile_main -->');
echo ("\n".'<form name="Equipment_Profile_Form" method="post" action="sub_update_equipment_profile.php">');
// setup the member's financial profile header (the green title bar)
if ($state == "Create")
	{ $remaining_title = "Member Number# (<i>not yet assigned</i>)</b>"; }
else
	{
	$remaining_title = "Member Number# ".$Line_Members->Member_Number."</b>";
	echo ('<input type="hidden" name="MemID" value="'.$Line_Members->Member_ID.'" />');
	}
echo ("\n\t".'<div style="float:left;width:100%;height:24px;text-align:center;margin:auto;padding-top:3px;" class="bggreen"><img src="../../members_only/images/icons/scholler_armour.gif" alt="" style="margin-right:5px;vertical-align:middle;height:20px;" />&nbsp;<b>'.$name_in_title_bar.' Equipment Profile&nbsp;&mdash;&nbsp;'.$remaining_title.'</div>');
echo ('<img src="'.$members_only_path.'images/1090x4_transparent.png" width="100%" alt="" />');
?>
<div style="float:left;width:55%;margin-left:6px;margin-top:6px;margin-bottom:6px;border-style:solid;border-width:1px;border-color:gray;border-radius:5px;">
	<div style="float:left;width:100%;padding-left:6px;margin-bottom:6px;"><b>Armoured Harness Specifications and Description:</b></div>
	<div style="float:right;width:55%;padding-left:6px;padding-bottom:15px;">
		<span class="Label">Kit Status: </span><input type="text" name="ArmourStatus" value="<?=$armour_status?>" maxlength="128" style="width:30%;" tabindex="1" <?=$oninput?> /><br />
		<span class="Label">&nbsp;Kit Date:</span><input type="text" name="ArmourDate" id="ArmourDate" data-zdp_first_day_of_week="0" maxlength="10" size="4" placeholder="yyyy-mm-dd" value="<?=$armour_date?>" tabindex="2" <?=$oninput?> /> <script type="text/javascript">$('#ArmourDate').Zebra_DatePicker();</script><img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-left:3px;cursor:help;" alt="" title="<?=$title_default_date[$lang_num]?>" /></b><br />
		<span class="Label">&nbsp;Kit File: </span><input type="text" name="ArmourFile" value="<?=$armour_file?>" maxlength="128" style="width:50%;" tabindex="3" <?=$oninput?> /><br />
		<span class="Label">Description / Specifications:</span><br /><textarea name="ArmourDesc" rows="18" style="width:98%;margin-top:5px;" wrap="virtual" <?=$oninput?> tabindex="4" placeholder="Type in notes here...."><?=$armour_description?></textarea>
	</div>
	<div style="float:left;width:40%;margin-left:6px;">
		<a href="../<?=$armour_URL?>/<?=$armour_file?>" target="_blank"><img src="../<?=$armour_URL?>/<?=$armour_file?>" width="100%" alt="" class="box fade" title="Click to view larger image of the same" /></a>
	</div>
</div><!-- end left column -->

<div style="float:left;width:40%;margin-left:6px;margin-top:6px;margin-bottom:6px;border-style:solid;border-width:1px;border-color:gray;border-radius:5px;">
	<div style="float:left;width:100%;padding-left:6px;margin-bottom:6px;"><b>Un-armoured Kit Specifications and Description:</b></div>
	<div style="float:right;width:55%;padding-left:6px;padding-bottom:15px;">
		<span class="Label">Kit Status: </span><input type="text" name="UnarmouredStatus" value="<?=$unarmoured_status?>" maxlength="128" style="width:40%;" tabindex="5" <?=$oninput?> /><br />
		<span class="Label">&nbsp;Kit Date:</span><input type="text" name="UnarmouredDate" id="UnarmouredDate" data-zdp_first_day_of_week="0" maxlength="10" size="4" placeholder="yyyy-mm-dd" value="<?=$unarmoured_date?>" tabindex="1" <?=$oninput?> /> <script type="text/javascript">$('#UnarmouredDate').Zebra_DatePicker();</script><img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-left:3px;cursor:help;" alt="" title="<?=$title_default_date[$lang_num]?>" /></b><br />
		<span class="Label">&nbsp;Kit File: </span><input type="text" name="UnarmouredFile" value="<?=$unarmoured_file?>" maxlength="128" style="width:60%;" tabindex="3" <?=$oninput?> /><br />
		<span class="Label">Description / Specifications:</span><br /><textarea name="UnarmouredDesc" rows="18" style="width:98%;margin-top:5px;" wrap="virtual" <?=$oninput?> tabindex="2" placeholder="Type in notes here...."><?=$unarmoured_description?></textarea>
	</div>
	<div style="float:left;width:40%;margin-left:6px;">
		<a href="../<?=$unarmoured_URL?>/<?=$unarmoured_file?>" target="_blank"><img src="../<?=$unarmoured_URL?>/<?=$unarmoured_file?>" width="100%" alt="" class="box fade" title="Click to view larger image of the same" /></a>
	</div>
</div><!-- end right column -->
<?php
echo ("\n".'<table width="100%" style="background-color:orange;">'."\n");
?>
<tr>
	<td align="center"><input type="submit" class="button" value="Save equipment profile update(s)" name="submit_equipment_button" id="submit_equipment_button" disabled="true" /> <input type="reset" class="button"  value="Clear Recent Updates" /><?=$note?></td>
</tr>
<?php
echo ('</table></form><!-- end Equipment_Profile_Form -->');
//echo ('</div>');	// end generate invoices rows
echo ("\n".'</div><!-- end equipment_profile_main -->');	// end equipment profile
?>
