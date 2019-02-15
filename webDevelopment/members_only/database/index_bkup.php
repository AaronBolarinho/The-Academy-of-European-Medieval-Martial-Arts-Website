<?php
// Program: index.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description:
//	This PHP is invoked directly by the URL http://www.aemma.org/database to initiate the AEMMA Database Management System (ADMS)
//	which presents the navigation frame (NavBar.html) for the ADMS on the left and login form on the right (Begin.php) along
//	with a frame along the top depicting the various shields "stolen" from the RHSC DBMS
//
//	The program flow: index.php ==> (NavBar.html) + Body.php ==> Begin.php ==> Login.php ==> Main.php
//---------------------------
// Updates:
//	2012 ----------
//	
include 'ss_path.stuff';
session_start(); 
$school = "AEMMA";
?>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="author" content="D.M.Cvet" />
   <link rel="Shortcut Icon" href="../images/coatofarms/tinyShield.gif" />
   <meta name="KeyWords" content="heraldry, heraldic, Heraldry, Arms, Coat of Arms, Canadian Heraldic Authority, blazon, blason, Armorial, crests" />
   <title><?=$school?> Database Management Administration</title>
</head>
<frameset cols="180,*" frameborder="0" border="0" framespacing="0">
	<frame src="NavBar.html" name="menu" noresize scrolling="auto">
	<frame src="Body.php?SCH=<?=$school?>" name="body" noresize scrolling="auto">
</frameset>
<noframes>
Your browser does not support frames. Either<br>activate frames support (if your browser supports<br>this feature) or use an alternate browser that<br>support frames (Netscape, Mozilla, Microsoft IE).<br>
</noframes>
</html>
