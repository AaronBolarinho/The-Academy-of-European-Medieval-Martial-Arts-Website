<?php
	session_start();
	include_once 'IDValid.php';
	include_once 'DB.php';

	$List_ID = "";
       	if (isset($_GET['List']))		{ $List_ID = $_GET['List']; }
?>

<html>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css">
		<script type="text/javascript" src="main.js"></script>
	</head>

	<body align="center" valign="top" bgcolor="white">
		<table summary="Countrywide membership listing for AEMMA" align="center" cellpadding="0" cellspacing="0">
		<?php
		if ($List_ID == 1)
			{ echo ('<caption>MEMBER ADMINISTRATION - Status = Active/New</caption>'); }
		else
			{ echo ('<caption>MEMBER ADMINISTRATION - Status = Any</caption>'); }
		?>
		<tr><th>Name</th><th>City</th><th>Email</th><th>Telephone (H)</th></tr>

	<?php

		$Search = "NULL";
		$Tabs = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		if (isset($_GET['Search']))	{ $Search = $_GET['Search']; }
		if (isset($_POST['Search']))	{ $Search = $_POST['Search']; }
        	if (isset($_GET['List']))		{ $List_ID = $_GET['List']; }
        	if (isset($_POST['List']))	{ $List_ID = $_POST['List']; }
		$Search = strpos($Tabs, $Search);

		echo ('<tr><td colspan=4 id="Data" align="center"><ul id="Tabs">');
		for ($index = 0; $index <= 25; $index++) {
			echo ('<li><a href="?List=' . $List_ID . '&Search='. $Tabs[$index] . '">');
			echo ('<span class="left">&nbsp;</span><span class="right">' . $Tabs[$index] . '</span></a></li>');
		}
		echo ('</ul></td></tr>');
		echo ('<tr><td colspan=4><font face="arial,helvetica" size=1>&nbsp;</font></td></tr>');

		$Toggle=0;
		$LinkID=dbConnect('aemma_org_-_members');
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome FROM People P';

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

		if ($List_ID == 1) {
			$SQL .= ' AND (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2)'; 
		}

		$SQL .= ' ORDER BY P.LastName';
		$SQL = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($SQL)) {
			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');
			echo ('<td><div id="Data">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>');
			echo ('<td><div id="Data">' . $Line->City . '</td>');
			echo ('<td><div id="Data" align="left">' . $Line->EMail . '</td>');
			echo ('<td><div id="Data" align="left">' . $Line->NumHome . '</td>');
			echo ('</tr>');
			$Toggle=1-$Toggle;
		}
		echo ('</ul></div>');
		dbClose($LinkID);
	?>

		</table>
	</body>
</html>
