<?php
// Program: Report_chapter_summary.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description:
//
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
   <link rel="stylesheet" href="main.css" type="text/css" />
   <link rel="stylesheet" href="../misc/css/default_page.css" type="text/css" />
   <link rel="shortcut icon" href="../images/coatofarms/tinyShield.gif" />
   <script type="text/javascript" src="main.js"></script>
</head>
<body>
<!-- begin page header -->
<table align="center" width="100%" cellpadding="3" cellspacing="0" border="0">
<tr class="purplebar">
	<td class="purplebar">&nbsp;AEMMA Membership Database Chapters Summary</td>
</tr></table><br />
<!-- end page header -->

<table align="center" cellpadding="0" cellspacing="0">
<tr>
	<td align="center"><font face="arial,helvetica" size="2"><b>Chapter Membership Summary as of <font color="red"><?php
	$full_date= date("d-m-Y");
	echo $full_date;
	?></font></b><br />&nbsp;</font></td>
</tr>
</table>
<table border="1" align="center">
<tr bgcolor="#461B7E">
	<td width="320" align="center"><font color="white"><b>Chapter</b></font></td>
	<td width="150" align="center"><font color="white"><B>Active Records</b></font></td>
</tr>
	<?php
	$LinkID=dbConnect($DB);
	$SQL  = 'SELECT C.ID, C.Description, count(*) Count FROM Members_Chapter MC, Chapter C, People P';
	$SQL .= ' WHERE P.School = "AEMMA" AND MC.Chapter_ID = C.ID AND C.ChapterState_ID IN (1,2,3) AND (MC.People_ID = P.Rec_ID AND (P.MemberStatus_ID = 1 OR P.MemberStatus_ID = 2))';
	$SQL .= '   GROUP BY C.ID';
	$SQL = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($SQL)) {
		echo ('<tr><td align="left">' . $Line->Description . '</td><td align="center"><b>' . $Line->Count . '</b></td></tr>');
	}
	mysql_free_result($SQL);
	dbClose($LinkID);
	?>
</tr>	
</table>
<blockquote>
<b>Note: </b> Be mindful that a number of members have membership in more than one location and this is not highlighted in this summary presentation.<br />
<b>Active Records: </b> are those records in which the status is either "new" or "active".
</blockquote>

<br /><div align="center"><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></div>
</body>
</html>
