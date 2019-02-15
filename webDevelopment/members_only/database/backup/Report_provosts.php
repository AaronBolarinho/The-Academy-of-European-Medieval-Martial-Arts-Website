<?php
	session_start();
	include_once 'IDValid.php';
	include_once 'DB.php';
?>

<html>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css">
		<link rel="stylesheet" href="css/default.css" type="text/css">
		<script type="text/javascript" src="main.js"></script>
	</head>

	<body align="center" valign="top" bgcolor="white">
		<table align="center" cellpadding="0" cellspacing="0" width="500">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>Membership Listing: Toronto Provosts  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect('d60476654');
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.ID = MC.People_ID and MC.Chapter_ID = 1 and P.Rank = 4) and (P.MemberStatus_ID = 2 or P.MemberStatus_ID = 1 or P.MemberStatus_ID = 6 or P.MemberStatus_ID = 3)';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {

			$memberStatus = $Line->MemberStatus_ID;

			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');
			if ($memberStatus == 6)
				{ 
				echo ('<td><div id="Data"><font color="blue">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>'); 
				echo ('<td><div id="Data"><font color="blue">' . $Line->City . '</td>');
				echo ('<td><div id="Data" align="left"><font color="blue">' . $Line->EMail . '</td>');
				echo ('<td><div id="Data" align="left"><font color="blue">' . $Line->NumHome . '</td>');
				}
			else
				{
				echo ('<td><div id="Data">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>');
				echo ('<td><div id="Data">' . $Line->City . '</td>');
				echo ('<td><div id="Data" align="left">' . $Line->EMail . '</td>');
				echo ('<td><div id="Data" align="left">' . $Line->NumHome . '</td>');
				}
			echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="' . $Line->portrait_URL . '" height=15 border=0><span><img src="' . $Line->portrait_URL . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial .'</span></a></td>');
			echo ('</tr>');
		}
		$SQL = 'SELECT count(*) Count';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.ID = MC.People_ID and MC.Chapter_ID = 1 and P.Rank = 4) and (P.MemberStatus_ID = 2 or P.MemberStatus_ID = 1 or P.MemberStatus_ID = 6)';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan=5><font face="arial,helvetica" size=2 color="white">&nbsp;<b>Total: </b>'.$Line->Count.'</td></tr><tr><td colspan="4">&nbsp;</td></tr>');
		}

		echo ('</ul></div>');
		mysql_free_result($Result);

		dbClose($LinkID);
	?>
		</table>

		<table align="center" cellpadding="0" cellspacing="0" width="500">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>Membership Listing: Guelph Provosts  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect('d60476654');
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.ID = MC.People_ID and MC.Chapter_ID = 2 and P.Rank = 4) and (P.MemberStatus_ID = 2 or P.MemberStatus_ID = 1 or P.MemberStatus_ID = 6)';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {

			$memberStatus = $Line->MemberStatus_ID;

			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');
			if ($memberStatus == 6)
				{ 
				echo ('<td><div id="Data"><font color="blue">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>'); 
				echo ('<td><div id="Data"><font color="blue">' . $Line->City . '</td>');
				echo ('<td><div id="Data" align="left"><font color="blue">' . $Line->EMail . '</td>');
				echo ('<td><div id="Data" align="left"><font color="blue">' . $Line->NumHome . '</td>');
				}
			else
				{
				echo ('<td><div id="Data">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>');
				echo ('<td><div id="Data">' . $Line->City . '</td>');
				echo ('<td><div id="Data" align="left">' . $Line->EMail . '</td>');
				echo ('<td><div id="Data" align="left">' . $Line->NumHome . '</td>');
				}
			echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="' . $Line->portrait_URL . '" height=15 border=0><span><img src="' . $Line->portrait_URL . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial .'</span></a></td>');
			echo ('</tr>');
		}
		$SQL = 'SELECT count(*) Count';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.ID = MC.People_ID and MC.Chapter_ID = 2 and P.Rank = 4) and (P.MemberStatus_ID = 2 or P.MemberStatus_ID = 1 or P.MemberStatus_ID = 6)';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan=5><font face="arial,helvetica" size=2 color="white">&nbsp;<b>Total: </b>'.$Line->Count.'</td></tr><tr><td colspan="4">&nbsp;</td></tr>');
		}

		echo ('</ul></div>');
		mysql_free_result($Result);

		dbClose($LinkID);
	?>
	<tr>
		<td colspan="4"><font face="arial,helvetica" size=2><b>Note: </b>Provosts whose a) membership type is identified as "provost"; b) membership status is "any", and records highlighted in <font color="blue">"blue"</font> are suspended due to work or health reasons.</font></td>
	</tr>

		</table>
<br><p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center>

	</body>
</html>
