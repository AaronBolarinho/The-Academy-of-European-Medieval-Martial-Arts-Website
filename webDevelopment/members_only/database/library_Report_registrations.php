<?php
 session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp");
	session_start();
	include_once 'library_IDValid.php';
	include_once 'library_DB.php';
?>
<html>
<head>
	<link rel="stylesheet" href="css/default.css" type="text/css">
	<script type="text/javascript" src="library_main.js"></script>
</head>
<body bgcolor="white">
<center><table cellpadding="0" cellspacing="0" width="700" bgcolor="white">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>Online Library Registrations Listing ('.$full_date.')</caption>');
	echo ('<tr><th>UserID</th><th>Name</th><th>Country</th><th>Email</th><th>Privileged</th><th>Access Status</th><th>Renewal Status</th><th>Access Count&nbsp;</th></tr>');
	echo ('<tr><td id="Label" colspan="9" bgcolor="#FDD017" ><center>Registrations from Canada</center></td></tr>');

	$total_count = 0;
	$LinkID=dbConnect($DB);
	$SQL = 'SELECT R.ID, R.userID, R.first_name, R.middle_initial, R.surname, R.country, R.email, R.privileged, R.access_status, R.renewal_status, R.access_counter';
	$SQL .= ' FROM registeredUsers R';
	$SQL .= ' WHERE R.country = "Canada"';
	$SQL .= ' ORDER BY R.surname';

	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$status = $Line->access_status;
		$acc_count = $Line->access_counter;
		$userID = $Line->userID;
		if ($userID <> "dcvet")
			{ $total_count = $total_count + $acc_count; }

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
	$SQL .= ' WHERE country = "Canada"';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<tr bgcolor="gray"><td colspan="9"><font face="arial,helvetica,sans-serif" size="-2" color="white">&nbsp;<b>Total number of registrations from <b>Canada</b>: </b>'.$Line->Count.'&nbsp;&nbsp;</td></tr>');
	}
	echo ('<tr><td id="Label" colspan="9" bgcolor="#FDD017" ><center>Registrations from the USA</center></td></tr>');

	$LinkID=dbConnect($DB);
	$SQL = 'SELECT R.ID, R.userID, R.first_name, R.middle_initial, R.surname, R.country, R.email, R.privileged, R.access_status, R.renewal_status, R.access_counter';
	$SQL .= ' FROM registeredUsers R';
	$SQL .= ' WHERE R.country = "USA"';
	$SQL .= ' ORDER BY R.surname';

	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$status = $Line->access_status;
		$acc_count = $Line->access_counter;
		$total_count = $total_count + $acc_count;

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
	$SQL .= ' WHERE country = "USA"';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<tr bgcolor="gray"><td colspan="9"><font face="arial,helvetica,sans-serif" size="-2" color="white">&nbsp;<b>Total number of registrations from <b>USA</b>: </b>'.$Line->Count.'&nbsp;&nbsp;</td></tr>');
	}

	echo ('<tr><td id="Label" colspan="9" bgcolor="#FDD017" ><center>Registrations from Germany</center></td></tr>');

	$LinkID=dbConnect($DB);
	$SQL = 'SELECT R.ID, R.userID, R.first_name, R.middle_initial, R.surname, R.country, R.email, R.privileged, R.access_status, R.renewal_status, R.access_counter';
	$SQL .= ' FROM registeredUsers R';
	$SQL .= ' WHERE R.country = "Germany"';
	$SQL .= ' ORDER BY R.surname';

	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {

		$status = $Line->access_status;
		$acc_count = $Line->access_counter;
		$total_count = $total_count + $acc_count;

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
	$SQL .= ' WHERE country = "Germany"';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<tr bgcolor="gray"><td colspan="9"><font face="arial,helvetica,sans-serif" size="-2" color="white">&nbsp;<b>Total number of registrations from <b>Germany</b>: </b>'.$Line->Count.'&nbsp;&nbsp;</td></tr>');
	}

	echo ('<tr><td id="Label" colspan="9" bgcolor="#FDD017" ><center>Registrations from the UK</center></td></tr>');

	$LinkID=dbConnect($DB);
	$SQL = 'SELECT R.ID, R.userID, R.first_name, R.middle_initial, R.surname, R.country, R.email, R.privileged, R.access_status, R.renewal_status, R.access_counter';
	$SQL .= ' FROM registeredUsers R';
	$SQL .= ' WHERE R.country = "UK"';
	$SQL .= ' ORDER BY R.surname';

	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {

		$status = $Line->access_status;
		$acc_count = $Line->access_counter;
		$total_count = $total_count + $acc_count;

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
	$SQL .= ' WHERE country = "UK"';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<tr bgcolor="gray"><td colspan="9"><font face="arial,helvetica,sans-serif" size="-2" color="white">&nbsp;<b>Total number of registrations from <b>UK</b>: </b>'.$Line->Count.'&nbsp;&nbsp;</td></tr>');
	}

	echo ('<tr><td id="Label" colspan="9" bgcolor="#FDD017" ><center>Registrations from other countries (ordered by country name)</center></td></tr>');

	$LinkID=dbConnect($DB);
	$SQL = 'SELECT R.ID, R.userID, R.first_name, R.middle_initial, R.surname, R.country, R.email, R.privileged, R.access_status, R.renewal_status, R.access_counter';
	$SQL .= ' FROM registeredUsers R';
	$SQL .= ' WHERE R.country <> "Canada" and R.country <> "USA" and R.country <> "Germany" and R.country <> "UK"';
	$SQL .= ' ORDER BY R.country';

	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$status = $Line->access_status;
		$acc_count = $Line->access_counter;
		$total_count = $total_count + $acc_count;

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
	$SQL .= ' WHERE country <> "Canada" and country <> "USA" and country <> "Germany" and country <> "UK"';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<tr bgcolor="gray"><td colspan="9"><font face="arial,helvetica,sans-serif" size="-2" color="white">&nbsp;<b>Total number of registrations from <b>other countries</b>: </b>'.$Line->Count.'&nbsp;&nbsp;</td></tr><tr><td colspan="9">&nbsp;</td></tr>');
	}

	$SQL = 'SELECT count(*) Count';
	$SQL .= ' FROM registeredUsers';
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<tr bgcolor="gray"><td colspan="9"><font face="arial,helvetica,sans-serif" size="-2" color="white">&nbsp;<b>Total number of online library <b>registrations</b>: </b>'.$Line->Count.'<br /><b>Total number of online library accesses</b>: '.$total_count.'</td></tr><tr><td colspan="9">&nbsp;</td></tr>');		
	}

	echo ('</ul></div>');
	mysql_free_result($Result);
	dbClose($LinkID);
?>
<tr>
	<td colspan="9"><font face="arial,helvetica,sans-serif" size="-1"><b>Note: </b>This report, lists initially, the top four country of online library registrations (ordered by surname) followed by the rest of the online library registrations from other countries (ordered by country). The records in which annual renewal payments have lapsed are highlighted in "<font color="red"><b>red</b></font>".
	<p>To add, the total cumulative accesses count does <b>not</b> include accesses by David M. Cvet, as that number is the result of frequent testing of the online library, and therefore, does not reflect a reasonble count expected by users accessing the library.</p></td>
</tr>
</table></center>
<br/><p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center></p>
</body>
</html>
