<?php
// Program: Report_rapier.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description: This report will list all students who are taking rapier training.
//
//---------------------------
// Updates:
//	2012 ----------
//
include 'ss_path.stuff';
include_once 'IDValid.php';
?>
<!-- begin page header -->
<table align="center" width="100%" cellpadding="3" cellspacing="0" border="0">
<tr class="purple_grad">
	<td class="purple_grad">&nbsp;<?=$school?> Membership Database: Period Garments<span style="float:right"><i>Logged in as: <?=$login_ID?>&nbsp;</i></span></td>
</tr></table>
<!-- end page header -->

<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$count = 0;
	$full_date= date("d-m-Y");	
	echo ('<caption>Membership Listing: Period Garments (Toronto)  ('.$full_date.')</caption>');
?>
		<tr><th></th><th>Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status&nbsp;</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect($DB);
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.PeriodGarments, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.ID = MC.People_ID and MC.Chapter_ID = 1) and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2 or P.MemberStatus_ID = 3 or P.MemberStatus_ID = 6) and P.PeriodGarments <> "" ';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) 
			{
			$memberStatus = $Line->MemberStatus_ID;
			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');
			if ($memberStatus == 3)
				{ 
				echo ('<td width="110" valign="top"><div id="Data"><font color="purple">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</font></td>');
				echo ('<td><div id="Data"><font color="purple">' . $Line->PeriodGarments . '</font><br>&nbsp;</td>');
				}
			elseif ($memberStatus == 6)
				{ 
				echo ('<td width="110" valign="top"><div id="Data"><font color="blue">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</font></td>');
				echo ('<td><div id="Data"><font color="blue">' . $Line->PeriodGarments . '</font><br>&nbsp;</td>');
				}
			else
				{ 
				echo ('<td width="110" valign="top"><div id="Data">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>');
				echo ('<td><div id="Data">' . $Line->PeriodGarments . '<br>&nbsp;</td>');
				}
			echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="' . $Line->portrait_URL . '" height=35 border=0><span><img src="' . $Line->portrait_URL . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial .'</span></a></td>');
			echo ('</tr>');
			}

		$SQL = 'SELECT count(*) Count';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.ID = MC.People_ID and MC.Chapter_ID = 1) and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2 or P.MemberStatus_ID = 3 or P.MemberStatus_ID = 6) and P.PeriodGarments <> "" ';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan=3><font face="arial,helvetica" size=2 color="white">&nbsp;<b>Total: </b>'.$Line->Count.'</td></tr><tr><td colspan="2">&nbsp;</td></tr>');
		}

		dbClose($LinkID);
	?>
		</table>
		<table align="center" cellpadding="0" cellspacing="0" width="500">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>Membership Listing: Guelph Period Garments  ('.$full_date.')</caption>');
?>
		<tr><th>Name</th><th>Garments Description</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect($DB);
		$SQL = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, P.PeriodGarments, P.MemberStatus_ID, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.ID = MC.People_ID and MC.Chapter_ID = 2) and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2 or P.MemberStatus_ID = 3 or P.MemberStatus_ID = 6) and P.PeriodGarments <> "" ';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			$memberStatus = $Line->MemberStatus_ID;
			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');
			if ($memberStatus == 3)
				{ 
				echo ('<td width="110" valign="top"><div id="Data"><font color="purple">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</font></td>');
				echo ('<td><div id="Data"><font color="purple">' . $Line->PeriodGarments . '</font><br>&nbsp;</td>');
				}
			elseif ($memberStatus == 6)
				{ 
				echo ('<td width="110" valign="top"><div id="Data"><font color="blue">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</font></td>');
				echo ('<td><div id="Data"><font color="blue">' . $Line->PeriodGarments . '</font><br>&nbsp;</td>');
				}
			else
				{ 
				echo ('<td width="110" valign="top"><div id="Data">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>');
				echo ('<td><div id="Data">' . $Line->PeriodGarments . '<br>&nbsp;</td>');
				}
			echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="' . $Line->portrait_URL . '" height=35 border=0><span><img src="' . $Line->portrait_URL . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial .'</span></a></td>');
			echo ('</tr>');
		}
		$SQL = 'SELECT count(*) Count';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.ID = MC.People_ID and MC.Chapter_ID = 2) and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2 or P.MemberStatus_ID = 3 or P.MemberStatus_ID = 6) and P.PeriodGarments <> "" ';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan=3><font face="arial,helvetica" size=2 color="white">&nbsp;<b>Total: </b>'.$Line->Count.'</td></tr><tr><td colspan="2">&nbsp;</td></tr>');
		}

		echo ('</ul></div>');
		mysql_free_result($Result);

		dbClose($LinkID);
	?>
	<tr>
		<td colspan="5"><font face="arial,helvetica" size=2><b>Note: </b>Members whose a) membership type is identified as "any"; and b) membership status is "Active / New / Inactive; and c) members who have one or more articles of period garments.  Members who are inactive are highlighted in <font color="purple"><b>purple</b></font>, and records highlighted in <font color="blue">"blue"</font> are suspended due to work or health reasons.</font></td>
	</tr>

		</table>

<br><p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center>

	</body>
</html>
