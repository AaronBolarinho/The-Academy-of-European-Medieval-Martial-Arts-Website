<?php
// update log:
//	2016 -------------------
// setup main div object for presenting accoutrements details record
include "config/AIMS_sub_show_accoutrements_profile_$lang.php";
if ($state == "Update")
	{
	$oninput = "oninput=\"enable_accoutrements_button()\"";
	$onclick = "onclick=\"enable_accoutrements_button()\"";
	$note = "";
	}
else
	{
	$oninput = "";
	$onclick = "";
	$note = "&nbsp;<img src=\"images/icons/note.gif\" style=\"vertical-align:middle;width:20px;margin-left:3px;cursor:help;\" alt=\"\" title=\"Unable to add new accoutrements profile until the new member personal profile record has been created and saved to AIMS.\" />";
	}
// setup main div object for presenting equipment details record
echo ('<div class="accoutrements_profile_main box"><!-- begin equipment_profile_main -->');
echo ("\n".'<form name="Accoutrements_Profile_Form" method="post" action="">');
// setup the member's accoutrements profile header (the green title bar)
if ($state == "Create")
	{ $remaining_title = "Member Number# (<i>not yet assigned</i>)</b>"; }
else
	{ $remaining_title = "Member Number# ".$Line_Members->Member_Number."</b>"; }
echo ("\n\t".'<div style="float:left;width:100%;height:24px;text-align:center;margin:auto;padding-top:3px;" class="bggreen"><img src="../../members_only/images/icons/accoutrements.png" alt="" style="margin-right:5px;vertical-align:middle;height:20px;" />&nbsp;<b>'.$name_in_title_bar.' Accoutrements Profile&nbsp;&mdash;&nbsp;'.$remaining_title.'</div>');
// generate invoices rows div
//	echo ('<div style="float:left;width:100%;">');
echo ('<img src="'.$members_only_path.'images/1090x4_transparent.png" width="100%" alt="" />');
echo ('add stuff here .......<br /><br />Accoutrements Under Construction.');

// end modal popups code
echo ("\n".'<table width="100%" style="background-color:orange;">'."\n");
?>
<tr>
	<td align="center"><input type="submit" class="button" value="Save accoutrements profile update(s)" name="submit_accoutrements_button" id="submit_accoutrements_button" disabled="true" /> <input type="reset" class="button"  value="Clear Recent Updates" /><?=$note?></td>
</tr>
<?php
echo ('</table></form><!-- end Accoutrements_Profile_Form -->');
//echo ('</div>');	// end generate invoices rows
echo ("\n".'</div><!-- end accoutrements_profile_main -->');	// end accoutrements profile
?>
