<?php

	if ( $_SESSION["UserID"]   == "" ||
//		 $_SESSION["PeopleID"] == "" ||
		 $_SESSION["RoleID"]  == "") {
		header("Location: library_Begin.php");
		$_SESSION['StartMsg'] = 'You Must First Login Before Performing any Operations!';
		exit;
	}
?>
