<?php
 session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp");
	session_start();
	include_once 'library_IDValid.php';
	include_once 'library_DB.php';
?>
<html>
<head>
	<link rel="stylesheet" href="main.css" type="text/css">
	<link rel="stylesheet" href="css/default.css" type="text/css">
	<script type="text/javascript" src="library_main.js"></script>
</head>
<body bgcolor="white">
<center><table cellpadding="0" cellspacing="0" width="700" bgcolor="white">
<?php
	$full_date = date("d-m-Y");
//	$full_date = date("Y-m-d");	

	echo ('<caption>Online Library Registrations of AEMMA Students/Members ('.$full_date.')</caption>');
	echo ('<tr><th>UserID</th><th>Name</th><th>Country</th><th>Email</th><th>Privileged</th><th>Access Status</th><th>Renewal Status</th><th>Access Count&nbsp;</th></tr>');

	$LinkID=dbConnect($DB);
	$SQL = 'SELECT R.ID, R.userID, R.first_name, R.middle_initial, R.surname, R.country, R.organization, R.email, R.privileged, R.access_status, R.renewal_status, R.access_counter';
	$SQL .= ' FROM registeredUsers R';
	$SQL .= ' WHERE R.organization = "AEMMA"';
	$SQL .= ' ORDER BY R.surname';

	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {

		$status = $Line->access_status;

		echo ('<tr OnMouseOver="navBar(this,1,1);"');
		echo (' OnMouseOut="navBar(this,2,1);"');
		echo (' OnClick="navBarClick(this,1,\'' . $Line->ID . '\')">');

		if ($status == 0)
			{ 
			echo ('<td><div id="Data" align="left"><font color="red">' . $Line->userID . '</font></div></td>');
			echo ('<td><div id="Data"><font color="red">' . $Line->surname . ', ' . $Line->first_name .' ' . $Line->middle_initial . '</font></div></td>');
			echo ('<td><div id="Data"><font color="red">' . $Line->country . '</font></div></td>');
			echo ('<td><div id="Data" align="left"><font color="red">' . $Line->email . '</font></div></td>');
			echo ('<td><div id="Data" align="center"><font color="red">' . $Line->privileged . '</font></div></td>');
			echo ('<td><div id="Data" align="center"><font color="red">' . $Line->access_status . '</font></div></td>');
			echo ('<td><div id="Data" align="center"><font color="red">' . $Line->renewal_status . '</font></div></td>');
			echo ('<td><div id="Data" align="center"><font color="red">' . $Line->access_counter . '</font></div></td>');
			}
		else
			{ 
			echo ('<td><div id="Data" align="left">' . $Line->userID . '</div></td>');
			echo ('<td><div id="Data">' . $Line->surname . ', ' . $Line->first_name .' ' . $Line->middle_initial . '</div></td>');
			echo ('<td><div id="Data">' . $Line->country . '</div></td>');
			echo ('<td><div id="Data" align="left">' . $Line->email . '</div></td>');
			echo ('<td><div id="Data" align="center">' . $Line->privileged . '</div></td>');
			echo ('<td><div id="Data" align="center">' . $Line->access_status . '</div></td>');
			echo ('<td><div id="Data" align="center">' . $Line->renewal_status . '</div></td>');
			echo ('<td><div id="Data" align="center">' . $Line->access_counter . '</div></td>');
			}
		echo ('</tr>');
	}

	$SQL = 'SELECT count(*) Count';
	$SQL .= ' FROM registeredUsers';
	$SQL .= ' WHERE organization = "AEMMA"';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<tr bgcolor="gray"><td colspan="8"><font face="arial,helvetica,sans-serif" size="-2" color="white">&nbsp;<b>Total number of registrations from <b>AEMMA</b>: </b>'.$Line->Count.'&nbsp;&nbsp;</td></tr>');
	}

	echo ('</ul></div>');
	mysql_free_result($Result);
	dbClose($LinkID);
?>

<tr>
	<td colspan="8">&nbsp;<br /></td>
</tr>
<tr>
	<td colspan="8"><font face="arial,helvetica,sans-serif" size="-1"><b>Note: </b>The individuals who are members/students (schollers and above) have available to them, on request, "privileged" access status to the online library.  This permits the AEMMA individual access to all library treatises online, as well as those secured treatises "behind the shield".</td>
</tr>
</table>
</center><br />
<p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center></p>
</body>
</html>
