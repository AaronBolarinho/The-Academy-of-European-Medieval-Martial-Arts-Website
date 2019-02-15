<?php
ini_set('display_errors', 'On');
//
// Program: Logout.php
// Author: David M. Cvet
// Created: Jan 07, 2016
// Description:
//	As its name implies, logs the user out of the database. He/she would have to login
//	again in order to conduct any further work.
//---------------------------
// Updates:
//	2016 ----------
//	apr 5:	introduced the AIMS variable, whereby, if the user is within the AIMS system, then logout of AIMS only, and return to the home page of the members' only area
//

if (isset($_GET['AIMS'])) { $aims = $_GET['AIMS']; }
else
	{
	$aims = 0; // set the flag to "0" should the cookie not be set (user didn't log into AIMS), to ensure the regular logout code is executed
	}

if ($aims == 1)
	{
	// return the user to the members only home page, and not necessarily log out of AIMS
	// because the user accessed AIMS from the members only menu
	$aims = 0;
	setcookie("AIMS", "$aims", time() + (86400 * 3), "/"); // 86400 = 1 day
	header('Location: ../index.php'); 
	exit;
	}
elseif ($aims == 2)
	{
	// return the user to a members only login screen, as the user accessed AIMS via the URL /database
	// as there is no indication that the user is interested in remaining in the members only area (an administrator type)
	$aims = 0;
	setcookie("AIMS", "$aims", time() + (86400 * 3), "/"); // 86400 = 1 day
	header('Location: ../../content/members_only_login.php'); 
	exit;
	}
else
	{ header('Location: ../../content/members_only_login.php'); exit; }

// clear out session variables
session_unset();
session_destroy();
$_SESSION = Array();

// reset htaccess cookie to "0"
$OK = 0;
setcookie("OSLJ_Cookie", "$OK", time() + (86400 * 3), "/"); // 86400 = 1 day

?>
