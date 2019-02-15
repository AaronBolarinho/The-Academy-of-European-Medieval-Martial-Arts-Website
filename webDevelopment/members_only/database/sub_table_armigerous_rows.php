<?php
// Program: sub_table_armigerous_rows.php
// Author: David M. Cvet
// Created: Oct 15, 2016
// Description:
//	Generates a listing of records containing name and arms for all armigerous members regardless of their status
//---------------------------
// Updates:
//	2016 ---

echo ('<tr style="cursor:pointer;" OnMouseOver="navBar(this,1,1);" title="'.$record_status.'"');
echo (' OnMouseOut="navBar(this,2,1);"');
echo (' OnClick="armBarClick(this,1,' . $member_ID . ',' . $tab . ',\'' . $state . '\')">');

// these are the report lines displayed when the report is a summary (not including arms and portraits)
echo ('<td><span style="color:'.$colour.';"><div id="Data" align="left">&nbsp;' . $member_number . '&nbsp;</div></span></td>');
echo ('<td><span style="color:'.$colour.';"><div id="Data" align="left">&nbsp;' . $Line_A->Armoury_name .$cross.'&nbsp;</div></span></td>');
echo ('<td><div id="Data" align="center"><img src="'.$members_only_path . $Line_A->Arms_URL.$Line_A->Armoury_letter.'/'.$Line_A->Arms_file_100 . '" height="50" /></a></div></td>'); 
echo ('</tr>');


?>

