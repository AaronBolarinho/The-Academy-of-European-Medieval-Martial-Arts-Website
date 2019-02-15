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
		<table align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td><font face="arial,helvetica" size=2><center><b>The Royal Heraldry Society of Canada<br>Branch Membership Summary as of  <font color="red"><?php
			$full_date= date("d-m-Y");
			echo $full_date;
			?></font></b></center><br>&nbsp;</font></td>
		</tr>
		</table>
		<table border="1" align="center">
		<tr bgcolor="#003366"><td width="320" align="center"><font face="arial,helvetica" size=-2 color="White"><b>Branch</B></font></td><td width="150" align="center"><font face="arial,helvetica" size=-2 color="White"><B>Membership</B></font></td></tr>

<?php
		$LinkID=dbConnect('heraldry_ca_-_membership');
		$SQL  = 'SELECT B.ID, B.Description, count(*) Count FROM Members_Branch MB, Branch B, People P';
		$SQL .= ' WHERE MB.Branch_ID = B.ID and (MB.People_ID = P.ID and (P.MemberStatus_ID = 1 or P.MemberStatus_ID = 2))';
		$SQL .= '   GROUP BY B.Description';
		$SQL = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($SQL)) {
			echo ('<tr><td align="left"><font face="arial,helvetica" size=-2>' . $Line->Description . '</font></td><td align="center"><font face="arial,helvetica" size=-2>' . $Line->Count . '</font></td></tr>');
		}
		mysql_free_result($SQL);
		dbClose($LinkID);
?>
		</tr>	
		<tr>
			<td colspan="2"><font face="arial,helvetica" size=-2><b>Note: </b> Be mindful that a number of members have membership in two or more Branches and this is not highlighted in this summary presentation.</font></td>
		</tr>
		</table>
<blockquote><blockquote>
<p><font face="arial,helvetica" size=2><b>Note: </b>Branch members whose a) membership type is identified as "any" and b) status indicated as "active" or "new".</font><br>&nbsp;

<p>Select a Branch below to generate a listing of Branch members:
<ol>
<li><a href="BranchListing.php?Branch=4" class="linksred">British Columbia/Yukon</a></li>
<li><a href="BranchListing.php?Branch=6" class="linksred">Hong Kong</a></li>
<li><a href="BranchListing.php?Branch=2" class="linksred">Laurentian</a></li>
<li><a href="BranchListing.php?Branch=3" class="linksred">Ottawa</a></li>
<li><a href="BranchListing.php?Branch=5" class="linksred">Prairie</a></li>
<li><a href="BranchListing.php?Branch=1" class="linksred">Toronto</a></li>
</ol>
</blockquote></blockquote>
<br><p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center>
	</body>
</html>
