			<td valign="center" width=13% id="Label">Other PN's:&nbsp;</td>
			<td width="37%"><input type="text" name="OPN"   maxlength="64" size="22" value="<?=$Line1->OtherPNs?>"></td>

			<td valign="center" width=13% id="Label">Interests:&nbsp;</td>
			<td width="37%"><input type="text" name="Interests"  maxlength="64" size="22" value="<?=$Line1->Interests?>"></td>

			<td valign="center" width=13% id="Label">Heard From:&nbsp;</td>
			<td width="37%"><input type="text" name="HeardFrom"  maxlength="32" size="22" value="<?=$Line1->HeardFrom?>"></td>

			<td valign="center" id="Label" colspan=2>First Aid Training?&nbsp;&nbsp;<input type="checkbox" name="FirstAid" value="1"  <?=$Line1->FirstAidTraining == "1" ? "CHECKED" : ""?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

			<td valign="center" width=13% id="Label">Armigerous:&nbsp;</td>
			<td><table border="0" align="left" width=100% cellpadding="0" cellspacing="0" bgcolor="lightgrey" bordercolor="#000000">
				<tr>
					<td width="15%"><input type="checkbox" name="Arms" value="1"  <?=$Line1->Armigerous == "1" ? "CHECKED" : ""?>></td>
					<td valign="center" align="right" id="Label">Source:&nbsp;
					<input type="text"     name="Source" maxlength="64" size="16" value="<?=$Line1->ArmsSource?>" id="Source">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr></table></td>

			<td width="13%" id="Label">Deceased:&nbsp;</td>
			<td><table border="0" align="left" width=100% cellpadding="0" cellspacing="0" bgcolor="lightgrey" bordercolor="#000000">
				<tr>
					<td width="15%"><input type="checkbox" name="Deceased" value="1"  <?=$Line1->Deceased == "1" ? "CHECKED" : ""?>></td>
					<td valign="center" align="right" id="Label">Deceased Date:&nbsp;
					<input type="text"  name="DeceasedDate" maxlength="10" size="10" value="<?=$Line1->DeceasedDate?>" id="DeceasedDate">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<script type="text/javascript">
						Calendar.setup( {
							inputField : "DeceasedDate",
							ifFormat   : "%Y-%m-%d"
						});
					</script>
				</tr></table></td>

			<td valign="center" width=13% id="Label">Gender:&nbsp;</td>
<?php
	if ($State == "Create")
		{
		echo ('<td width="37%" id="Label">male:&nbsp;<input type="radio" name="Gender" value="M"  "CHECKED" >&nbsp;&nbsp;&nbsp;female:&nbsp;<input type="radio" name="Gender" value="F">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>');
		}
	else
		{
		echo ('<td width="37%" id="Label">male:&nbsp;<input type="radio" name="Gender" value="M" '. ($Line1->Gender == 'M' ? 'CHECKED' : '') .' >&nbsp;&nbsp;&nbsp;female:&nbsp;<input type="radio" name="Gender" value="F" '. ($Line1->Gender == 'F' ? 'CHECKED' : '') .'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>');
		}
?>		

			<td valign="center" colspan=2 rowspan=4><table border="1" width="100%">
				<tr><td bgcolor="lightgrey" id="Label"><center>Medical Details</center></td></tr>
				<tr><td><textarea name="Medical" rows=3 cols=36 wrap="virtual" maxlength="10"><?=$Line1->Medical?></textarea></td></tr></table></td>


			<td valign="center" width=13% id="Label">Occupation:&nbsp;</td>
			<td width="37%"><input type="text" name="Job"  maxlength="32" size="22" value="<?=$Line1->Occupation?>"></td>
