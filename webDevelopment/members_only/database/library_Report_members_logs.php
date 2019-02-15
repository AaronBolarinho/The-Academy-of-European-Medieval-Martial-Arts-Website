<?php
 session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp");
	session_start();
	include_once 'library_IDValid.php';
	include_once 'library_DB.php';

	$order = '';
	if (isset($_GET['Order']))	{ $order = $_GET['Order']; }
	if (isset($_POST['Order']))	{ $order = $_POST['Order']; }

?>

<html>
<head>
	<link rel="stylesheet" href="css/default.css" type="text/css">
	<script type="text/javascript" src="library_main.js"></script>
</head>

<body bgcolor="white">
<center><table cellpadding="0" cellspacing="0" width="720" bgcolor="white">
<?php
		$full_date= date("d-m-Y");	

		if ($order == "userID")
			{ echo ('<caption>Members Only Access log records - ordered by userID ('.$full_date.')<br />(options to order by accessed date or resource at the bottom)</caption>'); }
		elseif ($order == "recent")
			{ echo ('<caption>Members Only Access log records - ordered by accessed date ('.$full_date.')<br />(options to order by userID or resource at the bottom)</caption>'); }
		else
			{ echo ('<caption>Members Only Access log records - ordered by resource accessed ('.$full_date.')<br />(options to order by userID or accessed date at the bottom)</caption>'); }
?>
		<tr><th>UserID</th><th>IP addy</th><th>Resource Accessed</th><th>Access Date&nbsp;</th></tr>
	<?php
		$prev_userID = "NA";
		$which = 1;
		$prev_resource = "11093";
		$i = 0;

		$LinkID=dbConnect($DB);
		$SQL = 'SELECT userID, IP, resourceAccessed, access_date';
		$SQL .= ' FROM members_accessLog';
	
		if ($order == "userID")
			{ $SQL .= ' ORDER BY userID, access_date DESC'; }
		elseif ($order == "recent")
			{ $SQL .= ' ORDER BY access_date desc'; }
		else
			{ $SQL .= ' ORDER BY resourceAccessed, userID'; }

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {

			$userID = $Line->userID;
			$resource = $Line->resourceAccessed;
			$accesses = $Line->accesses;

			if (($prev_userID <> $userID) and ($order == "userID" or $order == "recent"))
				{ 
				$prev_userID = $userID;
				if ($which)
					{ $which = 0; }
				else
					{ $which = 1; }
				}
			elseif ($order == "resource")
				{ 
				if ($prev_resource <> $resource)
					{ 
					$prev_resource = $resource;
					if ($which)
						{ $which = 0; }
					else
						{ $which = 1; }
					}
				}

			if ($which == 0)
				{ 
				echo ('<td><div id="Data" align="left">' . $Line->userID . '</div></td>');
				echo ('<td><div id="Data" align="left">' . $Line->IP . '</div></td>');
				echo ('<td><div id="Data" align="left">&nbsp;&nbsp;' . $Line->resourceAccessed . '</div></td>');
				echo ('<td><div id="Data" align="left" width="100">' . $Line->access_date . '</div></td>');
				}
			else
				{ 
				echo ('<td bgcolor="#FFFFCC"><div id="Data" align="left">' . $Line->userID . '</div></td>');
				echo ('<td><div id="Data" align="left">' . $Line->IP . '</div></td>');
				echo ('<td bgcolor="#FFFFCC">&nbsp;&nbsp;<div id="Data" align="left">' . $Line->resourceAccessed . '</div></td>');
				echo ('<td bgcolor="#FFFFCC"><div id="Data" align="left" width="100">' . $Line->access_date . '</div></td>');
				}
			echo ('</tr>');
		}

		$SQL = 'SELECT count(*) Count';
		$SQL .= ' FROM members_accessLog';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan="4"><font face="arial,helvetica,sans-serif" size="-2" color="white">&nbsp;<b>Total number of <b>log</b> records: </b>'.$Line->Count.'&nbsp;&nbsp;</td></tr>');
		}

		echo ('</ul></div>');

		mysql_free_result($Result);
		dbClose($LinkID);
	?>
	<tr>
		<td colspan="4">&nbsp;<br /></td>
	</tr>
	<tr>
		<td colspan="4"><font face="arial,helvetica,sans-serif" size="-1"><b>Note: </b>The ordering of the log records can be changed by selecting one of the following:<ul><li>order the listing by userID and date of access by clicking <a href="library_Report_members_logs.php?Order=userID"><b>here</b></a>;</li><li>order the listing by accessed date by clicking <a href="library_Report_members_logs.php?Order=recent"><b>here</b></a>;</li><li>order the listing by clumping resources accessed by clicking <a href="library_Report_members_logs.php?Order=resource"><b>here</b></a>.</li></ul></td>
	</tr>

	</table></center>
<br /><p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center>
</body>
</html>
