<?php
// Program: sub_select_reports.php
// Author: David M. Cvet
// Created: February 23, 2012
// Description: Consolidate the numerous repitions of table row generation for different types of groups of records
//
//---------------------------
// Updates:
//	2012 ----------
//	feb 25:	defined a php variable to contain all of the necessary variables and values to be passed to the javascript function
//
$php_variables = "?PGM=Members\&SCH=$school\&RID=$uRec_ID\&LGID=$login_ID\&SECL=$seclvl";

echo ('<tr OnMouseOver="navBar(this,1,1);"');
echo (' OnMouseOut="navBar(this,2,1);"');
echo (' OnClick="navBarClick(this,1,' . $Line->Rec_ID . ',\'' . $php_variables .'\')">');

echo ('<td><div id="Data">&nbsp;'.$cross.'<font color="'.$colour.'">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>'); 
echo ('<td><div id="Data"><font color="'.$colour.'">' . $Line->City . '</td>');
echo ('<td><div id="Data" align="left"><font color="'.$colour.'">' . $Line->EMail . '</td>');
echo ('<td><div id="Data" align="left"><font color="'.$colour.'">' . $Line->NumHome . '</td>');
echo ('<td><div id="Data" align="center"><font color="'.$colour.'"><b>'.$status.'</b></td>');

echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="' . $Line->portrait_URL . '" height="15" border="0" /><span><img src="' . $Line->portrait_URL . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial .'</span></a></td>');
echo ('</tr>');

?>
