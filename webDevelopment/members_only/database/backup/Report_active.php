<?php
	session_start();
	include_once 'IDValid.php';
	include_once 'DB.php';
?>

<html>
	<head>
		<link rel="stylesheet" href="css/default.css" type="text/css">
		<script type="text/javascript" src="main.js"></script>
	</head>

	<body bgcolor="white">
		<center><table cellpadding="0" cellspacing="0" width="560" bgcolor="white">
<?php
	$full_date= date("d-m-Y");	

	$year = substr($full_date, 6, 4); 
	$month = substr($full_date, 3, 2); 
	$day = substr($full_date, 0, 2); 
	$feesGoodTillDate = "";
	$var_feesGoodTillDate = $year ."-". $month ."-". $day;

	echo ('<caption>Active Membership Listing: Toronto ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status</th><th>Photo&nbsp;</th></tr>
		<tr><td id="Label" colspan=6 bgcolor="#FDD017" ><center>Committed, Instructors and Executives</center></td></tr>
	<?php
		$LinkID=dbConnect('aemma_org_-_members');
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.FeesGoodTillDate, P.MemberType_ID, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and P.ID = MC.People_ID and MC.Chapter_ID = 1 and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2) and (P.MemberType_ID = 1 or P.MemberType_ID = 5 or P.MemberType_ID = 6 or P.MemberType_ID = 7)';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {

			$feesGoodTillDate = $Line->FeesGoodTillDate;
			$memberType = $Line->MemberType_ID;
			$memberStatus = $Line->MemberStatus_ID;

// testing for blank fees good till date for type 5,6,7 eliminates the red text for those individuals who do not pay membership fees

			if ( $feesGoodTillDate >= $var_feesGoodTillDate or $memberType >= 5 )
				{
				$feesState = "P";
				}
			else
				{ $feesState = "L"; }

			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');
			if ($feesState == "L")
				{ 
				echo ('<td><div id="Data"><font color="red">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>'); 
				echo ('<td><div id="Data"><font color="red">' . $Line->City . '</td>');
				echo ('<td><div id="Data" align="left"><font color="red">' . $Line->EMail . '</td>');
				echo ('<td><div id="Data" align="left"><font color="red">' . $Line->NumHome . '</td>');
				echo ('<td><div id="Data" align="center"><font color="red"><b>' . $feesState . '</b></td>');
				}
			elseif ($memberStatus == 1)
				{ 
				echo ('<td><div id="Data"><font color="green">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>'); 
				echo ('<td><div id="Data"><font color="green">' . $Line->City . '</td>');
				echo ('<td><div id="Data" align="left"><font color="green">' . $Line->EMail . '</td>');
				echo ('<td><div id="Data" align="left"><font color="green">' . $Line->NumHome . '</td>');
				echo ('<td><div id="Data" align="center"><font color="green"><b>' . $feesState . '</b></td>');
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
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and P.ID = MC.People_ID and MC.Chapter_ID = 1 and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2) and (P.MemberType_ID = 1 or P.MemberType_ID = 5 or P.MemberType_ID = 6 or P.MemberType_ID = 7)';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan=6><font face="arial,helvetica,sans-serif" size=-2 color="white">&nbsp;<b>Total number of active <b>committed</b> members: </b>'.$Line->Count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		}

	?>
		<tr><td id="Label" colspan=6 bgcolor="#FDD017" ><center>Casual</center></td></tr>
	<?php
		$LinkID=dbConnect('aemma_org_-_members');
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.FeesGoodTillDate, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and P.ID = MC.People_ID and MC.Chapter_ID = 1 and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2) and P.MemberType_ID = 2';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {

			$feesGoodTillDate = $Line->FeesGoodTillDate;
			$memberStatus = $Line->MemberStatus_ID;
			if ( $feesGoodTillDate >= $var_feesGoodTillDate )
				{
				$feesState = "P";
				}
			else
				{ $feesState = "L"; }

			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');
			if ($feesState == "L")
				{ 
				echo ('<td><div id="Data"><font color="red">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>'); 
				echo ('<td><div id="Data"><font color="red">' . $Line->City . '</td>');
				echo ('<td><div id="Data" align="left"><font color="red">' . $Line->EMail . '</td>');
				echo ('<td><div id="Data" align="left"><font color="red">' . $Line->NumHome . '</td>');
				echo ('<td><div id="Data" align="center"><font color="red"><b>' . $feesState . '</b></td>');
				}
			elseif ($memberStatus == 1)
				{ 
				echo ('<td><div id="Data"><font color="green">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>'); 
				echo ('<td><div id="Data"><font color="green">' . $Line->City . '</td>');
				echo ('<td><div id="Data" align="left"><font color="green">' . $Line->EMail . '</td>');
				echo ('<td><div id="Data" align="left"><font color="green">' . $Line->NumHome . '</td>');
				echo ('<td><div id="Data" align="center"><font color="green"><b>' . $feesState . '</b></td>');
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
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and P.ID = MC.People_ID and MC.Chapter_ID = 1 and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2) and P.MemberType_ID = 2';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan=6><font face="arial,helvetica,sans-serif" size=-2 color="white">&nbsp;<b>Total number of active <b>casual</b> members: </b>'.$Line->Count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		}

	?>
		<tr><td id="Label" colspan=6 bgcolor="#FDD017" ><center>Occassional</center></td></tr>
	<?php
		$LinkID=dbConnect('aemma_org_-_members');
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and P.ID = MC.People_ID and MC.Chapter_ID = 1 and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2) and P.MemberType_ID = 3';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			$feesState = "NA";
			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');
			echo ('<td><div id="Data">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>');
			echo ('<td><div id="Data">' . $Line->City . '</td>');
			echo ('<td><div id="Data" align="left">' . $Line->EMail . '</td>');
			echo ('<td><div id="Data" align="left">' . $Line->NumHome . '</td>');
			echo ('<td><div id="Data" align="center">' . $feesState . '</td>');
			echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="' . $Line->portrait_URL . '" height=15 border=0><span><img src="' . $Line->portrait_URL . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial .'</span></a></td>');
			echo ('</tr>');
		}
		$SQL = 'SELECT count(*) Count';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and P.ID = MC.People_ID and MC.Chapter_ID = 1 and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2) and P.MemberType_ID = 3';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan=6><font face="arial,helvetica,sans-serif" size=-2 color="white">&nbsp;<b>Total number of <b>occassional</b> members: </b>'.$Line->Count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');		}

	?>
		<tr><td id="Label" colspan=6 bgcolor="#FDD017" ><center>Archery Only</center></td></tr>
	<?php
		$LinkID=dbConnect('aemma_org_-_members');
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.FeesGoodTillDate, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P, Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and P.ID = MC.People_ID and MC.Chapter_ID = 1 and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2) and P.MemberType_ID = 4';
		$SQL .= ' ORDER BY P.LastName';
		
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {

			$feesGoodTillDate = $Line->FeesGoodTillDate;
			$memberStatus = $Line->MemberStatus_ID;
			if ( $feesGoodTillDate >= $var_feesGoodTillDate )
				{
				$feesState = "P";
				}
			else
				{ $feesState = "L"; }

			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');
			if ($feesState == "L")
				{ 
				echo ('<td><div id="Data"><font color="red">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>'); 
				echo ('<td><div id="Data"><font color="red">' . $Line->City . '</td>');
				echo ('<td><div id="Data" align="left"><font color="red">' . $Line->EMail . '</td>');
				echo ('<td><div id="Data" align="left"><font color="red">' . $Line->NumHome . '</td>');
				echo ('<td><div id="Data" align="center"><font color="red"><b>' . $feesState . '</b></td>');
				}
			elseif ($memberStatus == 1)
				{ 
				echo ('<td><div id="Data"><font color="green">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>'); 
				echo ('<td><div id="Data"><font color="green">' . $Line->City . '</td>');
				echo ('<td><div id="Data" align="left"><font color="green">' . $Line->EMail . '</td>');
				echo ('<td><div id="Data" align="left"><font color="green">' . $Line->NumHome . '</td>');
				echo ('<td><div id="Data" align="center"><font color="green"><b>' . $feesState . '</b></td>');
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
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and P.ID = MC.People_ID and MC.Chapter_ID = 1 and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2) and P.MemberType_ID = 4';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan=6><font face="arial,helvetica,sans-serif" size=-2 color="white">&nbsp;<b>Total number of <b>archery only</b> members: </b>'.$Line->Count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');		}


// 		Count the grand total of active members for the Toronto chapter
//
		$SQL = 'SELECT count(*) Count';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.ID = MC.People_ID and MC.Chapter_ID = 1) and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2) and (P.MemberType_ID = 1 or P.MemberType_ID = 5 or P.MemberType_ID = 6 or P.MemberType_ID = 7 or P.MemberType_ID = 3 or P.MemberType_ID = 2 or P.MemberType_ID = 4)';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan=6><font face="arial,helvetica,sans-serif" size=-2 color="white">&nbsp;<b>Total active members (Toronto): '.$Line->Count.'</b></td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		}

		echo ('</ul></div>');
		mysql_free_result($Result);

		dbClose($LinkID);
	?>
		</table></center>
		<center><table cellpadding="0" cellspacing="0" width="560" bgcolor="white">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>Active Membership Listing: Guelph ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect('aemma_org_-_members');
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.ID = MC.People_ID and MC.Chapter_ID = 2) and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2)';
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
			echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="' . $Line->portrait_URL . '" height=15 border=0><span><img src="' . $Line->portrait_URL . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial .'</span></a></td>');
			echo ('</tr>');
		}
		$SQL = 'SELECT count(*) Count';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.ID = MC.People_ID and MC.Chapter_ID = 2) and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2)';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan=6><font face="arial,helvetica,sans-serif" size=-2 color="white">&nbsp;<b>Total: </b>'.$Line->Count.'</td></tr><tr><td colspan="4">&nbsp;</td></tr>');
		}

		echo ('</ul></div>');
		mysql_free_result($Result);

		dbClose($LinkID);
	?>
	<tr>
		<td colspan="4"><font face="arial,helvetica,sans-serif" size=-1><b>Note: </b>Active members whose a) membership type is identified as "any"; and b) membership status is "active" or "new". "<b>Status</b>" indicates either "P" = currently paid up; "L" = lapsed membership payment as of date of this report and which are highlighted in <font color=red><b>red</b></font>. Any member highlighted in <font color="green"><b>green</b></font> are new members, who are on their first cycle of payments.</td>
	</tr>

		</table></center>

<br><p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center>

	</body>
</html>
