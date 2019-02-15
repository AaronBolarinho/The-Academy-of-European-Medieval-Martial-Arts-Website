<?php
//
// Program: rep_misc_accessLogs.php
// Author: David M. Cvet
// Created: March 21, 2012
// Description:
//	This script generates an online listing of all records found in the Login log table. The
//	listing includes internal ID, username, role ID, resource accessed and date of the access
//---------------------------
// Updates:
//	2012 ----------
//

include 'ss_path.stuff';
session_start();
include_once 'IDValid.php';
//include_once 'DB.php';
$full_date= date("d-m-Y");	
if ($seclvl > 4) 
{
// generate the logins listing report
?>
	<table cellpadding="0" cellspacing="0" width="620" align="center">
<?php
	echo ('<caption>Login Records (<span color="white">'.$full_date.'</span>)</caption>');
?>
		<tr><th>ID&nbsp;</th><th>Username</th><th>Role&nbsp;ID</th><th>Access Date</th><th>Resource&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect($DB);
		$SQL = 'SELECT People_ID, UserName, Roles_ID, Access_date, Resource';
		$SQL .= ' FROM Login_log';
		$SQL .= ' ORDER BY UserName, Access_date DESC';
		$count = 0;
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			if ($Line->People_ID) // this is to prevent listing the null row
				{
				echo ('<tr OnMouseOver="navBar(this,1,1);"');
				echo (' OnMouseOut="navBar(this,2,1);"');
				echo (' OnClick="navBarClick(this,1,' . $Line->People_ID . ')">');
				echo ('<td><div id="Data">&nbsp;' . $Line->People_ID . '</div></td>');
				echo ('<td><div id="Data">&nbsp;&nbsp;' . $Line->UserName . '</div></td>');
				echo ('<td><div id="Data">&nbsp;&nbsp;' . $Line->Roles_ID . '&nbsp;</div></td>');
				echo ('<td width="120"><div id="Data">' . $Line->Access_date . '&nbsp;</div></td>');
				echo ('<td><div id="Data" align="left">' . $Line->Resource . '&nbsp;</div></td>');
				echo ('</tr>');
				$count++;
				}
			}
		echo ('<tr><td colspan="5" class="bggray"><span id="Data">&nbsp;Total number of Access Log Records : '.$count.'&nbsp;</span></td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		dbClose($LinkID);
	?>
	<tr>
		<td colspan="5"><b>Notes: </b><ul><li>This report lists records of all individuals who have accessed the AEMMA DBMS or the members only online resources.</li><!--<li>This report will also enable the database administrator to invoke an update screen for the record selected, or delete that record selected.</li><li>In order to create a new login record, click on the relevant button.</li>--></li></ul></td>
	</tr>
	</table>
</body>
</html>
<?php
}
else
{
//	only admin level can access the log access table
	echo ('	<table cellpadding="0" cellspacing="0" width="620" align="center">');
	echo ('<tr><td align="center"><br />&nbsp;<br />&nbsp;<br /><font color="red">* * * You do not have the access privilege to * * *<br />* * * access the Access Logs table in the database * * *</font><br />&nbsp;<br />&nbsp;<br /></td></tr>');
	echo ('</table>');
}
?>

