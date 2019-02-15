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
		<table summary="Countrywide membership listing for the R.H.S.C." align="center" cellpadding="0" cellspacing="0">
		<caption>MEMBERSHIP LISTING</caption>
		<tr><th>Name</th><th>City</th><th>Province</th><th>Country</th></tr>
	<?php
		$Toggle=0;
		$LinkID=dbConnect('heraldry_ca_-_membership');
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.ProvState, P.Country';
		$SQL .= ' FROM People P ORDER BY P.LastName';
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
