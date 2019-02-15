<?php

 session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp");
	session_start();

	include_once 'library_DB.php';

	unset($_SESSION['UserID']);
//	unset($_SESSION['PeopleID']);
	unset($_SESSION['RoleID']);

	session_destroy();
	header('Location: library_Begin.php');

?>
