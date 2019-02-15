<?php
// Program: index.php
// Author: David M. Cvet
// Created: Jul 3, 2009
// Description:
//	This PHP is invoked directly by the URL http://www.aemma.org/database to initiate the AEMMA Database Management System (ADMS)
//	which presents the navigation frame (NavBar.html) for the ADMS on the left and login form on the right (Begin.php) along
//	with a frame along the top depicting the various shields "stolen" from the RHSC DBMS
//
//	The program flow: index.php ==> Begin.php ==> Login.php ==> Home.php
//---------------------------
// Updates:
//	2012 ----------
//	
session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp");
session_start(); 
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<meta name="author" content="D.M.Cvet">
	<link rel="Shortcut Icon" href="images/shield_tiny.gif">
	<meta name="KeyWords" content="heraldry, heraldic, Heraldry, Arms, Coat of Arms, Canadian Heraldic Authority, blazon, blason, Armorial, crests">
	<title>AEMMA Database Management Administration</title>
</head>
<frameset cols="180,*" frameborder="0" border="0" framespacing="0">
	<frame src="NavBar.html" name="menu" noresize scrolling="auto">
	<frame src="Body.php"   name="body" noresize scrolling="auto">
</frameset>
<noframes>
Your browser does not support frames. Either<br>activate frames support (if your browser supports<br>this feature) or use an alternate browser that<br>support frames (Netscape, Mozilla, Microsoft IE).<br>
</noframes>
</html>
