<?php
// Program: Main.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description:
//	This PHP is the ADMS "home" page depicting some summary statistics such as records count per Chapter,
//	total number of records in the database, etc.
//	
//	The program flow: index.php ==> (NavBar.html) + Body.php ==> Begin.php ==> Login.php ==> Main.php
//---------------------------
// Updates:
//	2012 ----------
//
session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp");
session_start();
include_once 'IDValid.php';
include_once 'DB.php';
?>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="stylesheet" href="../misc/css/default_page.css" type="text/css" />
   <link rel="shortcut icon" href="../images/coatofarms/tinyShield.gif" />
</head>
<body>
<!-- begin page header -->
<table align="center" width="100%" cellpadding="3" cellspacing="0" border="0">
<tr class="purplebar">
	<td class="purplebar">&nbsp;AEMMA Membership Database Home Page</td>
</tr></table><br />
<!-- end page header -->

<blockquote>This page displays current statistics sourced from the AEMMA's centralized membership database. The values that you see are dynamically generated whenever this page is loaded to give you a fast summary and statistics of AEMMA.  </blockquote>
<br /><div align="center">
<font face="arial,helvetica" size="3" color="#CC0000"><b>AEMMA Database Quick Stats</b></font><br /><br />
<table><tr><td>
	<table border="1" align="center">
	<tr bgcolor="#461B7E"><td width="220" align="center"><font face="arial,helvetica" size="2" color="white"><b>Chapter</b></font></td><td width="80" align="center"><font face="arial,helvetica" size="2" color="white"><b>Count</b></font></td></tr>

<?php
	$LinkID=dbConnect($DB);
	$SQL  = 'SELECT C.ID, C.Description, count(*) Count FROM Members_Chapter MC, Chapter C, People P';
	$SQL .= ' WHERE MC.Chapter_ID = C.ID ';
	$SQL .= ' AND C.ChapterState_ID IN (1,2,3) ';
	$SQL .= ' AND P.MemberStatus_ID IN (1,2,3) ';
	$SQL .= ' GROUP BY C.ID';
	$SQL = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($SQL)) {
		echo ('<tr><td align="left"><font face="arial,helvetica" size="2">' . $Line->Description . '</font></td><td align="center"><font face="arial,helvetica" size="2">' . $Line->Count . '</font></td></tr>');
	}
	mysql_free_result($SQL);
	dbClose($LinkID);
?>
	</tr>	
	<tr bgcolor="#461B7E"><td width="220" align="center"><font face="arial,helvetica" size="2" color="white"><b>Other Stats</b></font></td><td width="80" align="center"></td></tr>
	<tr>
		<td><font color="#CC0000">Total database record count: </font></td>
		<td align="center"><b>
		<?php
		$LinkID=dbConnect($DB);
		$SQL  = 'SELECT count(*) Count FROM People P ';
		$SQL = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($SQL)) {
			echo ($Line->Count);
		}
		mysql_free_result($SQL);
		dbClose($LinkID);
		?></b></font></td>
	</tr>
	<tr>
		<td><font color="#CC0000">Total active members: </font></td>
		<td align="center"><b> 
		<?php
		$LinkID=dbConnect($DB);
		$SQL  = 'SELECT count(*) Count FROM People P ';
		$SQL .= ' WHERE P.MemberStatus_ID = 2';
		$SQL = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($SQL)) {
			echo ($Line->Count);
		}
		mysql_free_result($SQL);
		dbClose($LinkID);
		?></b></font></td>
	</tr>
	<tr>
		<td><font color="#CC0000">Total ROM swordsmanship records:  </font></td>
		<td align="center"><b>
		<?php
		$LinkID=dbConnect($DB);
		$SQL  = 'SELECT count(*) Count FROM People P ';
		$SQL .= ' WHERE P.MemberType_ID = 8';
		$SQL = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($SQL)) {
			echo ($Line->Count);
		}
		mysql_free_result($SQL);
		dbClose($LinkID);
		?></b></font></td>
	</tr>
	<tr>
		<td><font color="#CC0000">Total ROM archery records:  </font></td>
		<td align="center"><b>
		<?php
		$LinkID=dbConnect($DB);
		$SQL  = 'SELECT count(*) Count FROM People P ';
		$SQL .= ' WHERE P.MemberType_ID = 9';
		$SQL = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($SQL)) {
			echo ($Line->Count);
		}
		mysql_free_result($SQL);
		dbClose($LinkID);
		?></b></font></td>
	</tr>
	</table>
	</td>
	<td><br /><img src="http://www.aemma.org/images/AEMMA_logo_white_200.jpg" alt="" hspace="4" /></td>
</tr></table>
</div>
<blockquote>
<p>A description of the menu items related to the database follow:
<ol>
<li><b>Reports</b>: This feature will generate online listing of members based on the report selected.</li>
<li><b>Admin Functions</b>: This feature will enable the user to update existing membership records in the database, such as postal address, telephone numbers, their status with AEMMA, etc., and will provide the utility to enter new members into the database.</li>
<li><b>Change Password</b>: This will enable the user to change their password. You must ensure that the password is memorable to you, and that it is kept secure.  If you should forget your password, and are unable to access these utilities, you must contact the webmaster.</li>
<li><b>Logout</b>: Click this to exit the database functions.</li>
</ol>
</blockquote>
</body>
</html>
