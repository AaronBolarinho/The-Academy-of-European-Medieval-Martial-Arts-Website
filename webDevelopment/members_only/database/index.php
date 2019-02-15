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
//	mar 26:	added new PHP variable to handle chapter ID
//	
include 'ss_path.stuff';
session_start(); 

// include DB.php for all PHP reports requiring access to the database, as they are "included"
// in index.php and therefore, realize DB.php within their programming by default
include_once 'DB.php';
$table_width = 680;

if (isset($_GET['SCH'])) { $school = $_GET['SCH']; } else { $school = "AEMMA"; }
if (isset($_GET['PGM'])) { $pgm = $_GET['PGM']; } else { $pgm = "Begin"; }
if (isset($_GET['LGID'])) { $login_ID = $_GET['LGID']; }
if (isset($_GET['SECL'])) { $seclvl = $_GET['SECL']; }
if (isset($_GET['RID'])) { $uRec_ID = $_GET['RID']; }
if (isset($_GET['MSG'])) { $message = $_GET['MSG']; }
if (isset($_GET['SQL'])) { $SQL = $_GET['SQL']; }
if (isset($_GET['CHAP'])) { $chapter_ID = $_GET['CHAP']; }
?>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="author" content="D.M.Cvet" />
   <link rel="Shortcut Icon" href="../images/coatofarms/tinyShield.gif" />
   <link rel="stylesheet" href="css/main.css" type="text/css" />
   <link rel="stylesheet" type="text/css" media="all" href="skins/aqua/theme.css" title="Aqua" />
   <meta name="KeyWords" content="heraldry, heraldic, Heraldry, Arms, Coat of Arms, Canadian Heraldic Authority, blazon, blason, Armorial, crests" />
   <script type="text/javascript" src="main.js"></script>
   <script type="text/javascript" src="calendar.js"></script>
   <script type="text/javascript" src="lang/calendar-en.js"></script>
   <script type="text/javascript" src="calendar-setup.js"></script>
   <title><?=$school?> Database Management Administration</title>
</head>
<body>
<table width="100%">
<tr>
	<!-- column #1 - navigation menu -->
	<td width="150" valign="top" bgcolor="#461B7E">
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
