<?php
	session_start();
	include_once 'IDValid.php';
	include_once 'DB.php';
?>

<?php
        $Branch_ID = '';
        if (isset($_GET['Branch']))	{ $Branch_ID = $_GET['Branch']; }
        if (isset($_POST['Branch']))	{ $Branch_ID = $_POST['Branch']; }

	$LinkID=dbConnect('heraldry_ca_-_membership');

	$SQL  = 'SELECT B.ID, B.Description FROM Branch B WHERE B.ID = '.$Branch_ID;
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		$Branch_Name = $Line->Description;
	}
	mysql_free_result($Result);
?>

<html>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css">
		<script type="text/javascript" src="main.js"></script>
	</head>

	<body align="center" valign="top">
		<table summary="Branch specific membership listing for the R.H.S.C." align="center" cellpadding="0" cellspacing="0" width="500">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>Membership Listing: '.$Branch_Name.' Branch  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>City</th><th>Province</th><th>Country</th></tr>
	<?php
		$LinkID=dbConnect('heraldry_ca_-_membership');
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.ProvState, P.Country';
		$SQL .= ' FROM People P, Members_Branch M';
		$SQL .= ' WHERE P.ID = M.People_ID and M.Branch_ID = ' . $Branch_ID .' and (P.Deceased = 0 and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2))';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');
			echo ('<td><div id="Data">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>');
			echo ('<td><div id="Data">' . $Line->City . '</td>');
			echo ('<td><div id="Data" align="center">' . $Line->ProvState . '</td>');
			echo ('<td><div id="Data" align="left">' . $Line->Country . '</td>');
			echo ('</tr>');
		}

		$SQL = 'SELECT count(*) Count';
		$SQL .= ' FROM People P, Members_Branch M';
		$SQL .= ' WHERE P.ID = M.People_ID and M.Branch_ID = ' . $Branch_ID .' and (P.Deceased = 0 and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2))';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="grey"><td colspan=4><font face="arial,helvetica" size=2 color="white"><b>Total: </b>'.$Line->Count.'</td></tr><tr><td colspan="4">&nbsp;</td></tr>');
		}

		echo ('</ul></div>');
		mysql_free_result($Result);

		dbClose($LinkID);
	?>
	<tr>
		<td colspan="4"><font face="arial,helvetica" size=2><b>Note: </b> This listing includes members whose: a) membership status is "active" or "new" and b) members of the branch selected.</font></td>
	</tr>

		</table>
<p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center>
	</body>
</html>
