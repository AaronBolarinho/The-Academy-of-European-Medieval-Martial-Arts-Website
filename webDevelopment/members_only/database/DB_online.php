<?php

$DB      = "d60476654";
$DB_HOST = "mysqlhost";
$DB_USER = "u70529148";
$DB_PASS = "aemma98";

function dbConnect($DB="") {

	Global $DB_HOST;
	Global $DB_USER;
	Global $DB_PASS;

	if (!$LinkID = mysql_connect($DB_HOST, $DB_USER, $DB_PASS)) {
		die("ERROR: Unable to Connect to Server <" . $DB_HOST . ">");
	}
	if ($DB != "" AND !mysql_select_db($DB, $LinkID)) {
		die("ERROR: Unable to Connect to DB <" . $DB . ">");
	}
	return $LinkID;
}

function dbLogin($LinkID, $UserID, $UserPW) {

	$Valid = False;

	$SQL = "Select P.ID, L.People_ID, L.Roles_ID, R.Description From Login L, People P, Roles R";
	$SQL = $SQL . " Where L.People_ID = P.ID";
	$SQL = $SQL . " And L.Roles_ID = R.ID";
	$SQL = $SQL . " And L.UserName = \"" . $UserID . "\"";
	$SQL = $SQL . " And L.UserPassword = \"" . crypt($UserPW, "4c") ."\"";

	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$Valid = True;
		$_SESSION["UserID"]   = $UserID;
		$_SESSION["PeopleID"] = $Line->ID;
		$_SESSION["RoleID"]   = $Line->Roles_ID;
		$_SESSION["RoleDesc"] = $Line->Description;
	}
	return $Valid;
}

function ChangePW($LinkID, $PW_Old, $PW_New) {

	$SQL  = "UPDATE Login SET UserPassword = '" . crypt($PW_New, "4c") . "'  ";
	$SQL .= "WHERE People_ID    = " . $_SESSION["PeopleID"];
	$SQL .= " AND  UserName     = '" . $_SESSION["UserID"] . "'";
	$SQL .= " AND  UserPassword = '" . crypt($PW_Old, "4c") . "'";

	$SQL = mysql_query($SQL, $LinkID);
	if (mysql_affected_rows() > 0) {
		echo ("&nbsp;<p>&nbsp;<p>&nbsp;<center>Password successfully changed.<br>Please select menu option to continue.</center>");
	} else {
		echo ("&nbsp;<p>&nbsp;<p>&nbsp;<center>Password <B>NOT</B> changed.<br>Please try again or select menu option to continue.</center>");
	}
}

function dbClose($LinkID="") {

	mysql_close($LinkID);

}
