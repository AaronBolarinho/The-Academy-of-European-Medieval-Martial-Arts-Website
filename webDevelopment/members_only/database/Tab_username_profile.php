<?php
// update log:
//	2016 -------------------

// setup main div object for presenting financial details record
include "config/AIMS_sub_show_username_profile_$lang.php";
// setup main div object for presenting membership details record
echo ('<div class="username_profile_main box"><!-- begin username_profile_main -->');
echo ("\n".'<form name="Username_Profile_Form" method="post" action="sub_update_username_profile.php">');
// setup the member's financial profile header (the green title bar)
if ($state == "Create")
	{ $remaining_title = "Member Number# (<i>not yet assigned</i>)</b>"; }
else
	{ 
	$remaining_title = "Member Number# ".$member_ID."</b>";
	}
echo ("\n\t".'<div style="float:left;width:100%;height:24px;text-align:center;margin:auto;padding-top:3px;" class="bggreen"><img src="../../members_only/images/icons/security.png" alt="" style="margin-right:5px;vertical-align:middle;height:20px;" />&nbsp;<b>'.$name_in_title_bar.' Access Profile&nbsp;&mdash;&nbsp;'.$remaining_title.'</div>');
echo ('<input type="hidden" name="MemID" value="'.$member_ID.'" />');
//echo ('<div style="float:left;position:absolute;top:24px;display:none;"><img src="'.$members_only_path.'images/1090x4_transparent.png" width="100%" alt="" /></div>');
echo ('<img src="'.$members_only_path.'images/1090x4_transparent.png" width="100%" alt="" />');

echo ("\n\t".'<table style="border-collapse:collapse;" align="center" width="90%" cellpadding="3" cellspacing="2">');
?>
	<tr>
		<td align="right"  style="vertical-align:middle" class="Label">Username:</td>
		<td><input type="text" name="UName" id="UName" maxlength="16" style="width:17%;" value="<?=$login_username?>" tabindex="1" oninput="enable_submit_access_button()" /></td>
		<td rowspan="5" valign="top"><img src="images/icons/database_access.jpg" width="60%" alt="" /></td>
	</tr>
	<tr>
		<td align="right"  style="vertical-align:middle" class="Label">Password:</td>
		<td><input type="text" name="Pword" id="Pword" maxlength="16" style="width:28%;" value="<?=$login_password?>" tabindex="2" oninput="enable_submit_access_button()" /> <img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-left:3px;cursor:help;" alt="" title="<?=$title_password[$lang_num]?>" /></td>
	</tr>
	<tr>
		<td align="right"  style="vertical-align:middle" class="Label">Creation Date:</td>
		<td><input type="text" name="Cdate" id="Cdate" maxlength="10" style="width:18%;" value="<?=$login_creation_date?>" readonly /> <img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-left:3px;cursor:help;" alt="" title="<?=$title_creation_date[$lang_num]?>" /></td>
	</tr>
	<tr>
		<td align="right"  style="vertical-align:middle" class="Label">Non-disclosure Signed:</td>
<?php
echo ('		<td><input type="checkbox" name="NonDisclosure" value="1" '. ($login_non_disclosure == 1 ? 'CHECKED' : '') .'  style="vertical-align:middle"  tabindex="3" oninput="enable_submit_access_button()" /> <img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-left:3px;cursor:help;" alt="" title="'.$title_non_disclosure[$lang_num].'" /> <a href="../members_only/docs/administration/Non-Disclosure_Agreement.pdf" target="_blank"><img src="images/icons/filling_form.png" class="fade" style="vertical-align:middle;width:25px;margin-left:3px;cursor:help;" alt="" title="'.$title_non_disclosure_download[$lang_num].'" /></a></td>');
?>
	</tr>
<?php
echo ('	<tr>
	<td align="right"  style="vertical-align:middle" class="Label">Access Level:</td>
	<td><select name="RoleID" onclick="enable_submit_access_button()">');
	$detailed_description = "";
	for ($i=0;$i<$num_array_role;$i++) 
		{
		echo ('<option ' . ($login_roles_ID == $role_id[$i] ? 'SELECTED' : '') . ' value="' .$role_id[$i] . '">' . $role_desc[$i] .'</option>');
		if ($login_roles_ID == $role_id[$i]) {$detailed_description = "<b>Note: </b>".$role_long[$i]; }
		}
	echo ('</select>&nbsp;'.$detailed_description.'</td>');
echo ('	</tr>');
?>
	</table>
<?php
echo ("\n".'<table width="100%" style="background-color:orange;">'."\n");
if ($state == "Update")
	{
?>
<tr>
	<td align="center"><input type="submit" class="button" value="Save access profile update(s)" name="submit_access_button" id="submit_access_button" disabled="true" /> <button class="button" name="delete_access_button" id="delete_access_button" onclick="delete_access_record(<?=$Line_Members->Member_ID?>)"><font color="red">Delete this member's access</font></button> <input type="reset" class="button"  value="Clear Recent Updates" /></td>
</tr>
<?php
	}
elseif ($state == "Create")
	{
?>
<tr>
	<td align="center"><a class="button" href="#" style="color:white;">Save new access profile</a> <input type="reset" class="button" value="Clear Recent Entries" />&nbsp;<img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-left:3px;cursor:help;" alt="" title="Unable to add new access profile until the new member personal profile record has been created and saved to GIMS." /></td>
</tr>
<?php
	}
echo ('</table></form><!-- end Username_Profile_Form -->');
//echo ('</div>');	// end generate invoices rows
echo ("\n".'</div><!-- end username_profile_main -->');	// end fin profile
?>
