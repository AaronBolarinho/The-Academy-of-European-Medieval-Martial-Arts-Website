<?php
ini_set('display_errors', 'On');
// 	Program: 	ChangePW.php
//	Description: 	This script calls the script function_members_ChangePW.php. This addresses the issues of a non-operational javascript call 
//			in Login.php on Windows platforms.
//	Author:		David M. Cvet
//
//	2019 ------------------
//	jan 25:	standardized path names
//

$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories

$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";
$config_pwd = $path_members."config/content_members_changePW_$lang.php"; include "$config_pwd";
$pw_p1[0]	= "<font color='green'>The system will encrypt your password before saving it.</font>";	
$pw_p1[1]	= "le système va crypter votre mot de passe avant de l'enregistrer.";

if (isset($_GET['MSG'])) {$msg = $_GET['MSG'];} else {$msg = $pw_p1[$lang_num];}
if (isset($_GET['AIMS'])) {$aims = $_GET['AIMS'];} else {$aims = 0;}

include "function_members_ChangePW.php";
members_ChangePW($msg, $aims);
?>
