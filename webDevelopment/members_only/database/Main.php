<?php
// Program: Main.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description:
//	This PHP is the ADMS "home" page depicting some summary statistics such as records count per Chapter,
//	total number of records in the database, etc.
//	
//	The program flow: index.php ==> navTree_databasae.php + Begin.php ==> Login.php ==> Main.php
//---------------------------
// Updates:
//	2012 ----------
//
include 'IDValid.php';
$header_title = "Home Page";
include 'sub_header.php';
?>
<table width="<?=$table_width?>"><tr><td>This page displays current statistics sourced from the <?=$school?>'s centralized membership database. The values that you see are dynamically generated whenever this page is loaded to give you a fast summary and statistics of AEMMA. 
<br /><div align="center">
<font face="arial,helvetica" size="3" color="#CC0000"><b><?=$school?> Database Quick Stats</b> (<?php
	$full_date= date("d-m-Y");
	echo $full_date;
	?>)</font><br /><br />
<table width="100%"><tr><td>
	<table border="1" align="center">
	<tr bgcolor="#461B7E"><td width="220" align="center"><font face="arial,helvetica" size="2" color="white"><b>Chapter</b></font></td><td width="80" align="center"><font face="arial,helvetica" size="2" color="white"><b>Count*</b></font></td></tr>

<?php
	$LinkID=dbConnect($DB);
	//
	// build an array containing Chapters full names for those Chapters which are currently active
	//
	$SQL  = 'SELECT C.ID, C.Description';
	$SQL .= ' FROM Chapter C WHERE C.ChapterState_ID IN (1,2,3)'; // only get chapters which are active, new or planned
	$SQL .= ' ORDER BY C.ID';
	$i = 1; // start the array count at "1" as "0" is a NA record in the chapters table
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$array_chapter[$i] = $Line->Description;
		$array_chapter_ID[$i] = $Line->ID;
		$i++;
			}
	$array_chapter_size = count($array_chapter);

	for ($i=1; $i<=$array_chapter_size; $i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members_Chapter MC, People P';
		$SQL .= ' WHERE MC.Chapter_ID = '.$array_chapter_ID[$i] ;
		$SQL .= ' AND P.School = "'.$school.'" AND MC.People_ID = P.Rec_ID ';
		$SQL .= ' AND P.MemberType_ID IN (1,2,3,4,5,7) ';
		$SQL .= ' AND P.MemberStatus_ID IN (1,2,6) ';
		$SQL = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($SQL)) {
			echo ('<tr><td align="left"><font face="arial,helvetica" size="2">' . $array_chapter[$i] . '</font></td><td align="center"><font face="arial,helvetica" size="2">' . $Line->Count . '</font></td></tr>');
			}
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
		<td><font color="#CC0000">Total active* members: </font></td>
		<td align="center"><b> 
		<?php
		$LinkID=dbConnect($DB);
		$SQL  = 'SELECT count(*) Count FROM People P ';
		$SQL .= ' WHERE P.MemberStatus_ID IN (1,2,6)';
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
<i><b>*</b> records counted have a status of either "new" or "active" or "suspended"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
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
</td></table>

