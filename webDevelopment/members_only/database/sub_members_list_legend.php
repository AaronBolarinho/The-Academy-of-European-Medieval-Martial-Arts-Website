<?php
// Program: sub_members_list_legend.php
// Author: David M. Cvet
// Created: Nov 07, 2016
// Description: This is attached to each report at the bottom which provides the reader with a legend on the colour
//		codes or any other symbols which may appear in the reports.
//---------------------------
// Updates:
//	2016 ----------
//
echo ('
<!-- Legend table -->
<table align="center" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td>&nbsp;</td>
	<td><b>Legend:</b><p>Records are highlighted with the following colour codes: 
');
echo ('<ol>');
echo ('<li><b>Status = "new"</b> : <font color="'.$colour_NW.'">records in '.$colour_NW.'</font>, are records of members who are recent additions to the Academy.</li> ');
echo ('<li><b>Status = "active"</b> : <font color="'.$colour_AC.'">records in '.$colour_AC.'</font> are members who are currently active and their dues are current.</li>');
echo ('<li><b>Status = "deceased"</b> : <font color="'.$colour_DE.'">records in '.$colour_DE.'</font> are individuals are deceased and whose records are also highlighted with a "&dagger;".</li>');
echo ('<li><b>Status = "expelled"</b> : <font color="'.$colour_SP.'">records in '.$colour_SP.'</font> are individuals who have been suspended from the Academy.</li>');
echo ('<li><b>Status = "inactive"</b> : <font color="'.$colour_IN.'">records in '.$colour_IN.'</font> are individuals whose membership dues have lapsed, and have had no further communication with AEMMA.</li>');
echo ('<li><b>Status = "resigned"</b> : <font color="'.$colour_RE.'">records in '.$colour_RE.'</font> are individuals who have explicitly resigned from AEMMA.</li>');
echo ('<li><b>Status = "unable to trace/lost"</b> : <font color="'.$colour_UT.'">records in '.$colour_UT.'</font> are individuals who we have lost a connection/contact with. No new forwarding address, email nor telephone were provided by these individuals.</li>');
echo ('<li><b>Status = "unknown"</b> : <font color="'.$colour_UN.'">records in '.$colour_UN.'</font> are individuals whose status is not known or not been assigned.</li>');
echo ('</ol></p>');
echo ('
	</td>
	<td>&nbsp;</td>
</tr>
</table>
<!--<br /><div align="center"><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></div>-->');
?>
