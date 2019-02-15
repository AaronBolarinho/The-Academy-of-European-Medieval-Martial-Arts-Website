<?php
// Program: function_LogAccess.php
// Author: David M. Cvet
// Created: February 29, 2012
// Description:
//	This procedure, invoked by Login.php will insert a log record into table Login_log, recording userID, access date and
//	resource accessed (e.g. the database, etc.).
//---------------------------
// Updates:
//	2012 ----------
//	

function LogAccess($LinkID, $People_ID, $UserName, $Roles_ID, $Resource) 
{
	$access_date_time = date("Y-m-d H:i:s");  
	$SQL_login = 'INSERT INTO Login_log VALUES ('.$People_ID.', "'.$UserName.'", '.$Roles_ID.', "'.$access_date_time.'", "'.$Resource.'")';
	$Result = mysql_query($SQL_login, $LinkID);
	if (mysql_errno($LinkID) == 0) {
		//echo ('<font color="#666362">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: function_LogAccess.php) AEMMA Create Login Record (Table : Login) new record ID "'.$recid[$i].'" successfully inserted and saved.<br /></div>');
		} else {
		echo ('<font color="#666362">&nbsp;<p>&nbsp;<p>&nbsp;<div align="center">(php: function_LogAccess.php) AEMMA Create Access Log Record (Table : Login_log) new record ID "'.$Rec_ID.'" could <b>NOT</b> be inserted.<br />');
		echo ('</div>SQL Statement in error:<br />'.$SQL_login.'<br /><br /><div align="center">');
		echo ('Please try again or select menu option to continue or copy this error message and email to the AEMMA\'s administrator.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</div></font>');
		dbClose($LinkID);
		exit;
		}
	dbClose($LinkID);
} // end function: LogAccess
?>
