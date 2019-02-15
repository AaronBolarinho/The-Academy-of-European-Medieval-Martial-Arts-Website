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
		<table align="center" cellpadding="0" cellspacing="0" width="500">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>ROM Swordsmanship Listing: Toronto ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>City</th><th>Email</th><th>Telephone (H)</th></tr>
	<?php
		$LinkID=dbConnect('d60476654');
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.ID = MC.People_ID and MC.Chapter_ID = 1) and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2 or P.MemberStatus_ID = 3 or P.MemberStatus_ID = 4 or P.MemberStatus_ID = 5) and P.MemberType_ID = 8';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');
			echo ('<td><div id="Data">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>');
			echo ('<td><div id="Data">' . $Line->City . '</td>');
			echo ('<td><div id="Data" align="left">' . $Line->EMail . '</td>');
			echo ('<td><div id="Data" align="left">' . $Line->NumHome . '</td>');
			echo ('</tr>');
		}
		$SQL = 'SELECT count(*) Count';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.ID = MC.People_ID and MC.Chapter_ID = 1) and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2 or P.MemberStatus_ID = 3 or P.MemberStatus_ID = 4 or P.MemberStatus_ID = 5) and P.MemberType_ID = 8';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan=4><font face="arial,helvetica" size=2 color="white">&nbsp;<b>Total: </b>'.$Line->Count.'</td></tr><tr><td colspan="4">&nbsp;</td></tr>');
		}
		dbClose($LinkID);
	?>
	<tr>
		<td colspan="4"><font face="arial,helvetica" size=2><b>Note: </b>ROM swordsmanship lists individuals whose a) membership category is identified as "ROM swordsmanship"; and b) membership status is "new / inactive / resigned / lost".</font></td>
	</tr>

		</table>

<br><p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center>

	</body>
</html>
