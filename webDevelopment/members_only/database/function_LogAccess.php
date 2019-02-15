<?php
// Program: function_LogAccess.php
// Author: David M. Cvet
// Created: February 29, 2012
// Description:
//	This procedure, invoked by Login.php will insert a log record into table Login_log, recording userID, access date and
//	resource accessed (e.g. the database, etc.).
//---------------------------
// Updates:
//	2016 ----------

//
function LogAccess($LinkID, $Member_ID, $UserName, $Roles_ID, $Resource, $IPaddress) 
{
	// initialize variables
	date_default_timezone_set('America/Halifax');
	$access_date_time = date("Y-m-d H:i:s");  
	$php = "function_LogAccess.php:12"; $function = "LogAccess"; $table = "Login_log";  $who = "AEMMA";

	$SQL_login = 'INSERT INTO Login_log (`Member_ID`, `UserName`, `Roles_ID`, `Access_date`, `Resource`, `IP_addy`)  VALUES ('.$Member_ID.', "'.$UserName.'", '.$Roles_ID.', "'.$access_date_time.'", "'.$Resource.'", "'.$IPaddress.'")';
	$Result = mysqli_query($LinkID, $SQL_login);
	if (mysqli_errno($LinkID) == 0) 
		{
		echo ('<span style="font-size:14px; color:#9CB071;family-name:Arial,Helvetica,sans-serif;"><i>(PHP: '.$php.'; PHP function: '.$function.')</i><br />System logger (Table : <i>'.$table.'</i>) entry created: <i>"'.$Resource.'"</i>.<br /><br /></span>');
		}
	else
		{
		echo ('<font color="#666362">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: function_LogAccess.php) '.$who.' Create Access Log Record (Table : '.$table.') for member ID "'.$Member_ID.'" and could <b>NOT</b> be inserted.<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL_login.'<br /><br /><div align="center">');
		echo ('<br />IP address: '.$IPaddress.'<br />');
		echo ('Please try again or select menu option to continue or copy this error message and email to the '.$who.' database administrator.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysqli_errno($LinkID) . '] : ' . mysqli_error($LinkID) . '</div></font>');
//		dbClose($LinkID);
		exit;
		}
} // end function: LogAccess
?>
