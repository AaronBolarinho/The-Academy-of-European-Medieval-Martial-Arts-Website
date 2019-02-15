<?php
// Program: sub_report_legend.php
// Author: David M. Cvet
// Created: February 25, 2012
// Description: This is attached to each report at the bottom which provides the reader with a legend on the colour
//		codes or any other symbols which may appear in the reports.
//
//---------------------------
// Updates:
//	2012 ----------
//
echo ('
<!-- Legend table -->
<table align="center" cellpadding="0" cellspacing="0" width="'.$table_width.'">
<tr>
	<td>&nbsp;</td>
	<td><b>Legend:</b><p>Records are highlighted with the following colour codes: 
');
echo ('<ol>');
if ($s1) { echo ('<li id="Data"><b>Status = "New"</b> : <font color="green">records in green</font>, are students who have recently joined and are on their first cycle of dues payment.</li> '); }
if ($s2) { echo ('<li id="Data"><b>Status = "Active"</b> : <font color="#333333">records in black</font> are returning students and whose training dues are current.</li>');}
if ($s3) { echo ('<li id="Data"><b>Status = "Inactive"</b> : <font color="gray">records in gray</font> are individuals who no longer train at AEMMA.</li>'); }
if ($s4) { echo ('<li id="Data"><b>Status = "Resigned"</b> : <font color="orange">records in orange</font> are individuals who were members, but explicitly resigned from membership.</li>'); }
if ($s5) { echo ('<li id="Data"><b>Status = "Lost"</b> : <font color="brown">records in brown</font> are individuals who were members, but their contact info is no longer current, and therefore, unable to contact them.</li>'); }
if ($s6) { echo ('<li id="Data"><b>Status = "Suspended"</b> : <font color="blue">records in blue</font> are individuals remain attached to AEMMA, but who are unable to physically train for a period of time due to personal/professional reasons.</li>'); }
echo ('</ol></p>');
echo ('
	</td>
	<td>&nbsp;</td>
</tr>
</table>
<br /><div align="center"><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></div>');
?>
