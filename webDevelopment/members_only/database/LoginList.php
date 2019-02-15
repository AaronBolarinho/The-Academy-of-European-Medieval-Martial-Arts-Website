<?php
 session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp");
	session_start();
	include_once 'IDValid.php';
	include_once 'DB.php';
?>

<html>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css">
		<script type="text/javascript" src="main.js"></script>
	</head>

	<body align="center" valign="top">
		<table summary="Systemwide Login listings for the R.H.S.C." align="center" cellpadding="0" cellspacing="0">
		<caption>LOGIN LISTING</caption>
		<tr><th>Name</th><th>City</th><th>Province</th><th>Country</th></tr>

	<?php

		$Tabs = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		if (isset($_GET['Search']))  { $Search = $_GET['Search']; }
		if (isset($_POST['Search'])) { $Search = $_POST['Search']; }
		if ($Search == '') { $Search = "A"; }
		$Search = strpos($Tabs, $Search);

		echo ('<tr><td colspan=4 id="Data" align="center"><ul id="Tabs">');
		for ($index = 0; $index <= 25; $index++) {
			echo ('<li><a href="?Search='. $Tabs[$index] . '"><span class="left">&nbsp;</span><span class="right">' . $Tabs[$index] . '</span></a></li>');
		}
		echo ('</ul></td></tr>');

		$Toggle=0;
		$LinkID=dbConnect('heraldry_ca_-_membership');
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.ProvState, P.Country FROM People P';

		switch ($Search) {
			case -1:
				break;
			case 0:
				$SQL .= " WHERE P.LastName < '" . $Tabs[$Search + 1] . "'";
				break;
			case 25: 
				$SQL .= " WHERE P.LastName >= '" . $Tabs[$Search] . "'";
				break;
			default:
				$SQL .= " WHERE P.LastName >= '" . $Tabs[$Search] . "'";
				$SQL .= " AND P.LastName <= '" . $Tabs[$Search + 1] . "'";
				break;
		}

		$SQL .= ' ORDER BY P.LastName';
		$SQL = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($SQL)) {
			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');
			echo ('<td><div id="Data">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>');
			echo ('<td><div id="Data">' . $Line->City . '</td>');
			echo ('<td><div id="Data" align="center">' . $Line->ProvState . '</td>');
			echo ('<td><div id="Data" align="left">' . $Line->Country . '</td>');
			echo ('</tr>');
			$Toggle=1-$Toggle;
		}
		echo ('</ul></div>');
		mysql_free_result($SQL);
		dbClose($LinkID);
	?>

		</table>
	</body>
</html>
