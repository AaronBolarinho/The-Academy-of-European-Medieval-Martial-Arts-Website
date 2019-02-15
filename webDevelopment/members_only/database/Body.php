<?php
//
// Program: Body.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description:
//	This PHP will create three frames in the main body of the ADMS comprised of a banner strip from the RHSC site,
//	the main body of the ADMS (Begin.php) requesting the user login, followed by the trailer frame
//	
//	The program flow: index.php ==> (NavBar.html) + Body.php ==> Begin.php ==> Login.php ==> Main.php
//---------------------------
// Updates:
//	2012 ----------
//
include 'ss_path.stuff';
session_start(); 
$school = '';
if (isset($_GET['SCH'])) { $school = $_GET['SCH']; }
?>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="author" content="D.M.Cvet" />
   <link rel="Shortcut Icon" href="../images/coatofarms/tinyShield.gif" />
   <meta name="KeyWords" content="heraldry, heraldic, Heraldry, Arms, Coat of Arms, Canadian Heraldic Authority, blazon, blason, Armorial, crests" />
   <title><?=$school?> Database Management Administration</title>
</head>
<frameset rows="50,*,50" frameborder="0" border="0" framespacing="0" />
	<frame src="Top.html" name="top" noresize scrolling="no" />
	<frame src="Begin.php?SCH=<?=$school?>" name="main" noresize scrolling="auto" />
	<frame src="Bottom.html" name="bottom" noresize scrolling="no" />
</frameset>
<noframes>
Your browser does not support frames. Either<br>activate frames support (if your browser supports<br>this feature) or use an alternate browser that<br>support frames (Netscape, Mozilla, Microsoft IE).<br>
</noframes>
</html>
