<?php
// updated: Nov 30, 2015
// author: David M. Cvet
//
// program: IDValid.php
// description: this script will check for a valid userID, MemberID and role data, if not (meaning, no login), then the user is
//		taken to the database login window. The login is checked in Main.php, members_only_common_part1.php.
//
//session_start();
//echo ('debug:IDValid:10:$_SESSION["UserID"]="'.$_SESSION["UserID"].'", $_SESSION["MemberID"]="'.$_SESSION["MemberID"].'", $_SESSION["RoleID"]="'.$_SESSION["RoleID"].'"'); exit; 
	if ( $_SESSION["UserID"] == "" && $_SESSION["MemberID"] == "" && $_SESSION["RoleID"]  == "" ) 
		{
		header("Location: ".$members_only_path."../content/members_only_login.php?MSG=<b>You Must First Login Before Performing any Operations!</b>");
		exit;
		}
?>
