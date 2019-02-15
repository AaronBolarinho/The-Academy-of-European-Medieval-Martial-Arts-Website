<?php
include 'DB.stuff';
//
// Program: DB.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description:
//	Sets up the parameters for database connection.
//	It is included by all procs.
//---------------------------
// Updates:
//	2011 ----------
//	dec 06:	included new parameter which indicates that the user is a logged in member
//	dec 16:	added code to determine whether the username is incorrect or password is incorrect in function dbLogin
//	2012 ----------
//	feb 06:	modified the messages with font size and colour for successfully changing password and failure
//	mar 01:	adjusted the error conditions, whereby rather than posting an error message to the screen, it calls index.php with
//		the appropriate parameters including a new message variable
//	2016 -----------
//	nov 03:	added a new session variable $_SESSION['DBLogin'] which keeps track of whether or not the database connection remains intact throughout the session
//

function dbConnect($DB="") {
	Global $DB_HOST;
	Global $DB_USER;
	Global $DB_PASS;
	if (!$LinkID = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB)) 
		{ die("ERROR:DB.php:28: Unable to Connect to Server ==> <font color='green'><b>\"$DB_HOST\"</b></font> for the following reason:<br /><font color='red'><b>" .mysqli_connect_error()."</b></font>"); }
	return $LinkID;
	}

function dbLogin($LinkID, $UserID, $UserPW) {
	$Valid = 0;
	$db_userName = 0;
	$db_password = 0;

	// if the login is to GIMS or the members only, determine if the password entered is still "password". If so, then request that the user go back to members only and change their password
	$passwd = strtolower($UserPW);
	if ($passwd == "password")
		{
		// send the user to the members only change password page with appropriate message
		$Valid = 4;		// "4" indicates that the user is continuing to use "password" as a login for either the GIMS or members only login
		}

	// first qualify the UserID exists in the login table
	$SQL = "SELECT M.Member_ID, M.FirstName, L.Roles_ID, R.Roles_Description From Login L, Members M, Roles R";
	$SQL = $SQL . " WHERE L.Member_ID = M.Member_ID";
	$SQL = $SQL . " AND L.Roles_ID = R.Roles_ID";
	$SQL = $SQL . " AND L.UserName = \"" . $UserID . "\"";
//	echo ('debug:DB.php:52:SQL="'.$SQL.'";  ');exit;  // SQL statement is correct and functional at this point)
	$Result = mysqli_query($LinkID, $SQL);
	while ($Line = mysqli_fetch_object($Result)) 
		{
		// if UserID exists in the login table, set $db_userName to "1" indicating its found in the database
		$db_userName = 1;
		}

	if ($db_userName)
		{
		// given the UserID exists, now confirm the password entered matches the record in the login table
		$SQL = $SQL . " AND L.UserPassword = \"" . crypt($UserPW, "4c") ."\"";
//echo ('debug:DB.php:63:SQL="'.$SQL.'"');exit; // (SQL is correct and functional at this point)
		$Result = mysqli_query($LinkID, $SQL);
		while ($obj = mysqli_fetch_object($Result)) 
			{
			// the password matches the record in the login table
			$db_password = 1;
			$_SESSION['UserID']   		= $UserID;
			$_SESSION['MemberID'] 		= $obj->Member_ID;
			$_SESSION['FName']    		= $obj->FirstName;
			$_SESSION['RoleID']   		= $obj->Roles_ID;
			$_SESSION['RoleDescription']	= $obj->Roles_Description;
			$_SESSION['Login']    		= 1;
			$_SESSION['DBlogin'] 		= 1;	 // this is a session variable which determines whether or not the username is logged into the AIMS database
//echo ('debug:DB.php:72:$obj->Roles_ID="'.$obj->Roles_ID.'", $_SESSION[RoleID]="'.$_SESSION['RoleID'].'"');exit;
			}
		if ($db_password)
			{
			if ($Valid == 4)  { return $Valid; }	// a value of "4" indicates that the password on file is "password", this is to test for AIMS or members only login in the Login.php
			else { $Valid = 3;  return $Valid; } 	// a value of "3" indicates that the password and username is correct 
			}
		else
			{
			$Valid = 2; // a value of "2" indicates that the password is incorrect, username is OK
			//echo ('debug:DB.php:88:$Valid="'.$Valid.'", indicates password is incorrect, return value now');exit; (code is functional and correct to this point)
			return $Valid;
			} 		
		}
	else
		{
		$Valid = 1; return $Valid; 
		} // a value of "1" indicates incorrect or invalid Username 
}

function ChangePW($LinkID, $PW_Old, $PW_New) {
	// first check to determine if the old password entered on the change password form actually is the correct password
	// NOTE: $rValue also set in dbLogin subroutine!!!!!!!!!
	$SQL  = "SELECT Member_ID, UserPassword From Login ";
	$SQL .= " WHERE Member_ID = " . $_SESSION['MemberID'];
	$SQL .= " AND UserPassword = \"" . crypt($PW_Old, "4c") ."\"";
	$Result = mysqli_query($LinkID, $SQL);
	$row_cnt = mysqli_num_rows($Result);
	if ($row_cnt == 0) 
		{ $rValue = 2; return $rValue; } // the old password entered is NOT the same as the password in the system

	// since the old password is OK, perform the update with the new password entered
	$SQL  = "UPDATE Login SET UserPassword = '" . crypt($PW_New, "4c") . "'  ";
	$SQL .= "WHERE Member_ID    = " . $_SESSION["MemberID"];
	$SQL .= " AND  UserName     = '" . $_SESSION["UserID"] . "'";
	$SQL .= " AND  UserPassword = '" . crypt($PW_Old, "4c") . "'";
	$Result = mysqli_query($LinkID, $SQL);

	if (mysqli_affected_rows($LinkID) > 0) {
		$rValue = 1; return $rValue;
	} else {
		$rValue = 0; return $rValue;
	}
}

function dbClose($LinkID="") {
	mysqli_close($LinkID);
}
