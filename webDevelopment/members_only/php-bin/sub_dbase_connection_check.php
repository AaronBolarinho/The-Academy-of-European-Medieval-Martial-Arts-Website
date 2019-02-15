<?php
// Program: sub_dbase_connection_check.php
// Author: David M. Cvet
// Created: Oct 07, 2013
// Description:
//	This will test the continuance of a PHP connection to the databasea server called by index.php every iteration.
//	This will also trigger a change to the network status icon situated on the menu strip on the right side.
//	Note: to test the impact of the internet being up or down, remove the "!" which will emulate internet down - don't forget to return the "!" after testing!!!!
//---------------------------
// Updates:
//	2014 ----------
//	feb 10:	included checking if the session has established a userID, if not, then the browser has NOT logged in, or the internet connection is down
//	2016 -----------
//	nov 03:	added a new session variable $_SESSION['DBLogin'] which keeps track of whether or not the database connection remains intact throughout the session
//
if (isset($_SESSION['LinkID']))
	{
	if (mysqli_connect_errno($_SESSION['LinkID']) || (empty($_SESSION["UserID"])))
		{
		$dbase_connection = 0;		// a return code of something other than "0" indicates a problem with the connection
		$_SESSION['DBLogin'] = 0;	// indicates that the user has lost his/her connection with the database
		}
	else
		{
		$dbase_connection = 1;		// a return code of something other than "0" indicates a problem with the connection
		$_SESSION['DBLogin'] = 1;	// indicates that the user has a viable his/her connection with the database
		}
	}
else
	{
	$dbase_connection = 1;			// a return code of "0" indicates no errors with respect to the connection
	$_SESSION['DBLogin'] = 1;		// indicates that the user has a viable his/her connection with the database
	}
?>

