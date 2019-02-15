<?php
	session_start();
	include_once 'IDValid.php';
	include_once 'DB.php';
?>

<html>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css">
		<script type="text/javascript" src="main.js"></script>
	</head>

	<body align="center" valign="top" bgcolor="white">
		<table align="center" cellpadding="0" cellspacing="0">

		<tr>
			<?php
			$full_date= date("d-m-Y");	
			$year = substr($full_date, 6, 4); 
			echo ('<td><font face="arial,helvetica" size=2><b>The Royal Heraldry Society of Canada<br>Database Statistics Analysis as of  <font color="red">'.$full_date.'</font></b><br>&nbsp;</td>');
			?>
		</tr>
		</table>

		<table align="center" cellpadding="2" cellspacing="0" border=1 width=90%>
		<tr bgcolor="#003366">
			<td colspan=9><font face="arial,helvetica" size=-2 color="white"><b>HISTORICAL MEMBERSHIP ACTIVITY DISTRIBUTION</b></td>

		</tr>
		<tr>
			<td align="center" width="11%" valign="top"><font face="arial,helvetica" size=-2><b>1<br>Year End</b></font></td>
			<td align="center" width="11%" valign="top"><font face="arial,helvetica" size=-2><b>2<br>Regular</b></font></td>
			<td align="center" width="11%" valign="top"><font face="arial,helvetica" size=-2><b>3<br>Students</b></font></td>
			<td align="center" width="11%" valign="top"><font face="arial,helvetica" size=-2><b>4<br>Life / Hon</b></font></td>

			<td align="center" width="11%" valign="top"><font face="arial,helvetica" size=-2><b>5<br>Institutional</b></font></td>	
			<td align="center" width="11%" valign="top"><font face="arial,helvetica" size=-2><b>6<br>Inst-Ex</b></font></td>	
			<td align="center" width="11%" valign="top"><font face="arial,helvetica" size=-2><b>7<br>New</b></font></td>
			<td align="center" width="11%" valign="top"><font face="arial,helvetica" size=-2><b>8<br>Not Renewed</b></font></td>
			<td align="center" width="11%" valign="top"><font face="arial,helvetica" size=-2><b>9<br>Base</b></font></td>	
		</tr>

			<?php
			$LinkID=dbConnect('heraldry_ca_-_membership');
			$SQL  = 'SELECT * from History';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<tr><td align="center"><font face="arial,helvetica" size=-2><b>'.$Line->Year.'</b></font></td><td align="center"><font face="arial,helvetica" size=-2>'.$Line->Regular.'</font></td><td align="center"><font face="arial,helvetica" size=-2>'.$Line->Student.'</font></td><td align="center"><font face="arial,helvetica" size=-2>'.$Line->LifeHon.'</font></td><td align="center"><font face="arial,helvetica" size=-2>'.$Line->Institute.'</font></td><td align="center"><font face="arial,helvetica" size=-2>'.$Line->Institute_Ex.'</font></td><td align="center"><font face="arial,helvetica" size=-2>'.$Line->NewMembers.'</font></td><td align="center"><font face="arial,helvetica" size=-2>'.$Line->NonRenewals.'</font></td><td align="center"><font face="arial,helvetica" size=-2><b>'.$Line->Total.'</b></font></td></tr>');
				}
			dbClose($LinkID);
			?>
		</table>
<br>&nbsp;

		<table align="center" cellpadding="2" cellspacing="0" border=1 width=80%>
		<tr bgcolor="#003366">

			<?php
			echo ('<td colspan=2><font face="arial,helvetica" size=-2 color="white"><b>GENERAL STATS</b></td>');
			?>
		</tr>
			<?php
			$LinkID=dbConnect('heraldry_ca_-_membership');
			$SQL  = 'SELECT count(*) Count from People';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<tr bgcolor="#FFFFCC"><td><font face="arial,helvetica" size=-2><b>Total Number of Membership Records</b></font></td><td align="center" width=100><font face="arial,helvetica" size=-2><b>'.$Line->Count.'</b></font></td></tr>');
				$running_total = $Line->Count;
				}
			$SQL  = 'SELECT count(*) Count from People';
			$SQL .= ' WHERE MemberStatus_ID = 3 and MemberType_ID = 1 and Deceased = 0';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<tr><td><a href="Report_regular_inact.php" class="linksred"><font face="arial,helvetica" size=-2>Total Inactive Membership Records - Regular (not deceased)</font></a></td><td align="center" width=100><font face="arial,helvetica" size=-2>'.$Line->Count.'</font></td></tr>');
				$running_total = $Line->Count;
				}
			$SQL  = 'SELECT count(*) Count from People';
			$SQL .= ' WHERE MemberStatus_ID = 3 and MemberType_ID = 6 and Deceased = 0';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<tr><td><a href="Report_students_inact.php" class="linksred"><font face="arial,helvetica" size=-2>Total Inactive Membership Records - Student (not deceased)</font></a></td><td align="center"><font face="arial,helvetica" size=-2>'.$Line->Count.'</font></td></tr>');
				$running_total = $running_total + $Line->Count;
				}
			$SQL  = 'SELECT count(*) Count from People';
			$SQL .= ' WHERE MemberStatus_ID = 2 and MemberType_ID = 6';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<tr><td><a href="Report_inst_inact.php" class="linksred"><font face="arial,helvetica" size=-2>Total Inactive Membership Records - Institutional</font></a></td><td align="center"><font face="arial,helvetica" size=-2>'.$Line->Count.'</font></td></tr>');
				$running_total = $running_total + $Line->Count;
				}

			echo ('<tr bgcolor="#FFFFCC"><td><font face="arial,helvetica" size=-2><b>Total Number of Inactive Membership Records</b></font></td><td align="center"><font face="arial,helvetica" size=-2><b>'.$running_total.'</b></font></td></tr>');

			$SQL  = 'SELECT count(*) Count from People';
			$SQL .= ' WHERE Deceased = 1';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<tr><td><a href="Report_deceased.php" class="linksred"><font face="arial,helvetica" size=-2>Total Deceased Membership Records</font></a></td><td align="center"><font face="arial,helvetica" size=-2>'.$Line->Count.'</font></td></tr>');
				$running_total = $running_total + $Line->Count;
				}

			dbClose($LinkID);
			?>
		</table>


<p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center>
	</body>
</html>
