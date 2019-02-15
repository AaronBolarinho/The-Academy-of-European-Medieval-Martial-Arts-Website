<?php
// Program: sub_table_rows.php
// Author: David M. Cvet
// Created: Nov 03, 2016
// Description:
//	Generates a listing of records containing Mem_ID, full name, city, email, tel, status, photo and arms for the various canned reports
//	It is "include" in the PHP: rep_active_members.php
//---------------------------
// Updates:
//	2016 ---
//	oct 16:	colour is now defined in the script "sub_members_list_statuses.php - thereby, centralizing the colour codes for each status

echo ('<tr style="cursor:pointer;" OnMouseOver="navBar(this,1,1);" title="'.$record_status.'"');
echo (' OnMouseOut="navBar(this,2,1);"');
echo (' OnClick="navBarClick(this,1,' . $member_ID . ',' . $seclvl . ',\'' . $state . '\')">');

// these are the report lines displayed when the report is a summary (not including arms and portraits)
echo ('<td><span style="color:'.$colour.';"><div id="Data" align="left">&nbsp;&nbsp;' . $member_ID . '&nbsp;</div></span></td>');
echo ('<td><span style="color:'.$colour.';"><div id="Data" align="left">&nbsp;' . $full_name .$cross. '&nbsp;</div></span></td>');
echo ('<td><span style="color:'.$colour.';"><div id="Data" align="left">&nbsp;' . $city . '&nbsp;</div></span></td>');
echo ('<td><span style="color:'.$colour.';"><div id="Data" align="left">&nbsp;' . $prov . '&nbsp;</div></span></td>');
echo ('<td><span style="color:'.$colour.';"><div id="Data" align="left">&nbsp;' . $numHome . '&nbsp;</div></span></td>');
echo ('<td><span style="color:'.$colour.';"><div id="Data" align="left">&nbsp;' . $numMobile . '&nbsp;</div></span></td>');
if ($status_ID == "DE")
	{echo ('<td><span style="color:'.$colour.';"><div id="Data" align="left">&nbsp;' . $deceased_date . '&nbsp;</div></span></td>');}
else
	{echo ('<td><span style="color:'.$colour.';"><div id="Data" align="left">&nbsp;' . $email . '&nbsp;</div></span></td>'); }
echo ('</tr>');


?>

