<?php
 session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp");
	session_start();
	include_once 'library_IDValid.php';
	include_once 'library_DB.php';

	$List_ID = "";
       	if (isset($_GET['List']))		{ $List_ID = $_GET['List']; }
?>

<html>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css">
		<link rel="stylesheet" href="css/default.css" type="text/css">
		<script type="text/javascript" src="library_main.js"></script>
	</head>

	<body align="center" valign="top" bgcolor="white">
		<table summary="Registration listing for the online library" align="center" cellpadding="0" cellspacing="0">
		<?php
		if ($List_ID == 1)
			{ echo ('<caption>REGISTRATION ADMINISTRATION - ordered by <b>surname</b></caption>'); }
		else
			{ echo ('<caption>REGISTRATION ADMINISTRATION - ordered by <b>userID</b></caption>'); }
		?>
		<tr><th>userID</th><th>Name</th><th>Country</th><th>Email&nbsp;</th></tr>

	<?php

		$Search = "NULL";
		$Tabs = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		if (isset($_GET['Search']))	{ $Search = $_GET['Search']; }
		if (isset($_POST['Search']))	{ $Search = $_POST['Search']; }
        	if (isset($_GET['List']))	{ $List_ID = $_GET['List']; }
        	if (isset($_POST['List']))	{ $List_ID = $_POST['List']; }
		$Search = strpos($Tabs, $Search);

		echo ('<tr><td colspan="4" id="Data" align="center"><ul id="Tabs">');
		for ($index = 0; $index <= 25; $index++) {
			echo ('<li><a href="?List=' . $List_ID . '&Search='. $Tabs[$index] . '">');
			echo ('<span class="left">&nbsp;</span><span class="right">' . $Tabs[$index] . '</span></a></li>');
		}
		echo ('</ul></td></tr>');
		echo ('<tr><td colspan="4"><font face="arial,helvetica" size="1">&nbsp;</font></td></tr>');

		$Toggle=0;
		$LinkID=dbConnect($DB);
		$SQL = 'SELECT ID, userID, first_name, middle_initial, surname, country, email FROM registeredUsers';

		if ($List_ID == 1)
			{ switch ($Search) {
				case -1:
					break;
				case 0:
					$SQL .= " WHERE surname < '" . $Tabs[$Search + 1] . "'";
					break;
				case 25: 
					$SQL .= " WHERE surname >= '" . $Tabs[$Search] . "'";
					break;
				default:
					$SQL .= " WHERE surname >= '" . $Tabs[$Search] . "'";
					$SQL .= " AND surname <= '" . $Tabs[$Search + 1] . "'";
					break;
				}
			$SQL .= ' ORDER BY surname';
			}
		else
			{ switch ($Search) {
				case -1:
					break;
				case 0:
					$SQL .= " WHERE userID < '" . $Tabs[$Search + 1] . "'";
					break;
				case 25: 
					$SQL .= " WHERE userID >= '" . $Tabs[$Search] . "'";
					break;
				default:
					$SQL .= " WHERE userID >= '" . $Tabs[$Search] . "'";
					$SQL .= " AND userID <= '" . $Tabs[$Search + 1] . "'";
					break;
				}
			$SQL .= ' ORDER BY userID';
			}

		$SQL = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($SQL)) {
			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');
			echo ('<td><div id="Data">' . $Line->userID . '</td>');
			echo ('<td><div id="Data">' . $Line->surname . ', ' . $Line->first_name .' ' . $Line->middle_initial . '</td>');
			echo ('<td><div id="Data">' . $Line->country . '</td>');
			echo ('<td><div id="Data" align="left">' . $Line->email . '</td>');
			echo ('</tr>');
			$Toggle=1-$Toggle;
		}
		echo ('</ul></div>');
		dbClose($LinkID);
	?>

		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
	<?php
		if ($List_ID == 1)
			{ echo ('<td colspan="4"><font face="verdana,tahoma,sans-serif" size="-1"><b>Note: </b>To view all the registration records ordered by <b>userID</b>, click <a href="library_MemberList.php?List=2"><b>here</b></a>.</font></td>'); }
		else
			{ echo ('<td colspan="4"><font face="verdana,tahoma,sans-serif" size="-1"><b>Note: </b>To view all the registration records ordered by <b>surname</b>, click <a href="library_MemberList.php?List=1"><b>here</b></a>.</font></td>'); }
	?>

		</tr>
		</table>
</body>
</html>
