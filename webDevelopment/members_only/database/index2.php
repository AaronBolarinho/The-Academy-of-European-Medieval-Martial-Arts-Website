<?php
// Program: index.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description:
//	This PHP is invoked directly by the URL http://www.aemma.org/database to initiate the AEMMA Database Management System (ADMS)
//	which presents the navigation frame (NavBar.html) for the ADMS on the left and login form on the right (Begin.php) along
//	with a frame along the top depicting the various shields "stolen" from the RHSC DBMS
//
//	The program flow: index.php ==> navTree_databasae.php + Begin.php ==> Login.php ==> Main.php
//---------------------------
// Updates:
//	2012 ----------
//	
include 'ss_path.stuff';
session_start(); 
include_once 'IDValid.php';
include_once 'DB.php';

if (isset($_GET['SCH'])) { $school = $_GET['SCH']; } else { $school = "AEMMA"; }
if (isset($_GET['PGM'])) { $pgm = $_GET['PGM']; } else { $pgm = "Begin"; }
if (isset($_GET['LGID'])) { $login_ID = $_GET['LGID']; }
if (isset($_GET['SECL'])) { $seclvl = $_GET['SECL']; }
?>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="author" content="D.M.Cvet" />
   <link rel="Shortcut Icon" href="../images/coatofarms/tinyShield.gif" />
   <link rel="stylesheet" href="../misc/css/default_page.css" type="text/css" />
   <link rel="stylesheet" href="../misc/css/admin.css" type="text/css" />
<!--   <link rel="stylesheet" href="main.css" type="text/css">-->
   <meta name="KeyWords" content="heraldry, heraldic, Heraldry, Arms, Coat of Arms, Canadian Heraldic Authority, blazon, blason, Armorial, crests" />
   <title><?=$school?> Database Management Administration</title>
</head>
<body>
<table width="100%">
<tr>
	<!-- column #1 - navigation menu -->
	<td width="160" valign="top" bgcolor="#461B7E">
	<?php
	include "navTree_database.php";
	?>
	</td>
	<!-- end column #1 - navigation menu -->
	<td style="vertical-align:top"><table>
		<!-- column #2 - top banner -->
		<tr>
			<td height="46"  background="images/HeraldryStrip.jpg">&nbsp;</td>
		<tr>
		<!-- column #2 - end top banner -->
		<!-- column #2 - mainframe -->
		<tr>
			<td bgcolor="white">
			<?php
			include "$pgm.php";
			?>
			</td>
		<tr>
		<!-- column #2 - end mainframe -->
		<!-- column #2 - trailer -->
		<tr>
			<td bgcolor="white">
			<?php
			include "Bottom.html";
			?>
			</td>
		<tr>
		<!-- column #2 - end trailer -->
		</table></td>
</tr>
</table>
</body>
</html>
