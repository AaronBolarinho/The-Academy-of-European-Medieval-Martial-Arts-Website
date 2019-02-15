<?php

//     The default access level for new Login ID's is "2", which
//       means they can see the summary stats on the main menu and
//       change their own password - that's it.
//
//       Level 2 and up allows them to run the reports.
//
//       Level 3 and up allows them to list / view contact
//       details for each member and export data (as of July 10, 2006).
//
//       Level 4 allows the user to edit contact details for each member.
//
//       Level 5 and up allows them to create more Login IDs.
//
//       Level 6 allows them to backup the entire database (soon)
//       and export data.

	session_start();

	include_once 'DB.php';

	$_SESSION['UserID']   = '';
	$_SESSION['PeopleID'] = '';
	$_SESSION['RoleID']   = '';
	$_SESSION['RoleDesc'] = '';

	$_SESSION['StartMsg'] = '&nbsp;';

	$LinkID=dbConnect('d60476654');
	if (!dbLogin($LinkID, $_POST['ID'], $_POST['PW'])) {
		dbClose($LinkID);
		$_SESSION['StartMsg'] = 'ID and/or Password Incorrect<br>Please Try Again!';
		header('Location: Begin.php');
		exit();
	}
	dbClose($LinkID);
	header('Location: Main.php');

?>
