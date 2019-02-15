<?php
 session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp");
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
		<table align="center" cellpadding="0" cellspacing="0" width="560">
<?php
	$full_date= date("d-m-Y");	

	$year = substr($full_date, 6, 4); 
	$month = substr($full_date, 3, 2); 
	$day = substr($full_date, 0, 2); 
	$feesGoodTillDate = "";
	$var_feesGoodTillDate = $year ."-". $month ."-". $day;

	echo ('<caption>Active Membership Listing: AEMMA Members : Archers Only  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect($DB);
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.FeesGoodTillDate, P.MemberType_ID, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.MemberType_ID = 4 or P.MemberType_ID = 10 or P.MemberType_ID = 11 or P.MemberType_ID = 12) and (P.MemberStatus_ID = 2 or P.MemberStatus_ID = 1 or P.MemberStatus_ID = 6)';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {

			$feesGoodTillDate = $Line->FeesGoodTillDate;
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;

			if ( $feesGoodTillDate >= $var_feesGoodTillDate)
				{
				$feesState = "P";
				}
			elseif ($memberType == 10)
				{ $feesState = "NA"; }
			else
				{ $feesState = "L"; }

			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');

			if ($memberStatus == 6)
				{ 
				echo ('<td><div id="Data"><font color="blue">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>'); 
				echo ('<td><div id="Data"><font color="blue">' . $Line->City . '</td>');
				echo ('<td><div id="Data" align="left"><font color="blue">' . $Line->EMail . '</td>');
				echo ('<td><div id="Data" align="left"><font color="blue">' . $Line->NumHome . '</td>');
				echo ('<td><div id="Data" align="center"><font color="blue"><b>S</b></td>');
				}
			elseif ($memberType == 10)
				{ 
				echo ('<td><div id="Data"><font color="purple">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>'); 
				echo ('<td><div id="Data"><font color="purple">' . $Line->City . '</td>');
				echo ('<td><div id="Data" align="left"><font color="purple">' . $Line->EMail . '</td>');
				echo ('<td><div id="Data" align="left"><font color="purple">' . $Line->NumHome . '</td>');
				echo ('<td><div id="Data" align="center"><font color="purple"><b>' . $feesState . '</b></td>');
				}
			elseif ($feesState == "L")
				{ 
				echo ('<td><div id="Data"><font color="red">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>'); 
				echo ('<td><div id="Data"><font color="red">' . $Line->City . '</td>');
				echo ('<td><div id="Data" align="left"><font color="red">' . $Line->EMail . '</td>');
				echo ('<td><div id="Data" align="left"><font color="red">' . $Line->NumHome . '</td>');
				echo ('<td><div id="Data" align="center"><font color="red"><b>' . $feesState . '</b></td>');
				}
			else
				{ 
				echo ('<td><div id="Data">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>');
				echo ('<td><div id="Data">' . $Line->City . '</td>');
				echo ('<td><div id="Data" align="left">' . $Line->EMail . '</td>');
				echo ('<td><div id="Data" align="left">' . $Line->NumHome . '</td>');
				echo ('<td><div id="Data" align="center">' . $feesState . '</td>');
				}
			echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="' . $Line->portrait_URL . '" height=15 border=0><span><img src="' . $Line->portrait_URL . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial .'</span></a></td>');
			echo ('</tr>');
		}
		$SQL = 'SELECT count(*) Count';
		$SQL .= ' FROM People P';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.MemberType_ID = 4 or P.MemberType_ID = 10 or P.MemberType_ID = 11 or P.MemberType_ID = 12) and (P.MemberStatus_ID = 2 or P.MemberStatus_ID = 1 or P.MemberStatus_ID = 6)';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan=6><font face="arial,helvetica" size=2 color="white">&nbsp;<b>Total: </b>'.$Line->Count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		}

		echo ('</ul></div>');
		mysql_free_result($Result);

		dbClose($LinkID);
	?>
	<tr>
		<td colspan="4"><font face="arial,helvetica" size=2><b>Note: </b>Traditional archers whose a) membership status is "active" or "new"; b) train at AEMMA Toronto or Guelph; and c) their membership type is "Archery only" or "Archery only occassional". "<b>Status</b>" indicates either "P" = currently paid up; "L" = lapsed membership payment as of date of this report, and records highlighted in <font color="blue">"blue"</font> are suspended due to work or health reasons.</font></td>
	</tr>

		</table>

<br><p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center>

	</body>
</html>
