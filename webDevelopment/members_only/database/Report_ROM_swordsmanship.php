<?php
// Program: Report_ROM_swordsmanship.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description: This report will list all individuals who have taken the ROM/introductory swordsmanship course
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
	<td class="purple_grad">&nbsp;<?=$school?> Membership Database: Inactive Records<span style="float:right"><i>Logged in as: <?=$login_ID?>&nbsp;</i></span></td>
</tr></table>
<!-- end page header -->

<table align="center" cellpadding="0" cellspacing="0" width="<?=$table_width?>">
<?php
	$full_date= date("d-m-Y");	
	echo ('<caption>Inactive Membership Listing: Toronto ('.$full_date.')</caption>');
?>
		<tr><th>&nbsp;Name</th><th>City</th><th>Email</th><th>Telephone (H)</th><th>Status&nbsp;</th><th>Photo&nbsp;</th></tr>
	<?php
		$LinkID=dbConnect($DB);
		$count = 0;
		$LinkID=dbConnect($DB);
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.City, P.EMail, P.NumHome, P.portrait_URL';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.Rec_ID = MC.People_ID and MC.Chapter_ID = 1) and (P.MemberStatus_ID = 3 or P.MemberStatus_ID = 4 or P.MemberStatus_ID = 5) and P.MemberType_ID = 8';
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->Rec_ID . ')">');
			echo ('<td><div id="Data">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>');
			echo ('<td><div id="Data">' . $Line->City . '</td>');
			echo ('<td><div id="Data" align="left">' . $Line->EMail . '</td>');
			echo ('<td><div id="Data" align="left">' . $Line->NumHome . '</td>');
			echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="' . $Line->portrait_URL . '" height=15 border=0><span><img src="' . $Line->portrait_URL . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial .'</span></a></td>');
			echo ('</tr>');
		}
		$SQL = 'SELECT count(*) Count';
		$SQL .= ' FROM People P,  Members_Chapter MC';
		$SQL .= ' WHERE P.School = "AEMMA" and (P.Rec_ID = MC.People_ID and MC.Chapter_ID = 1) and (P.MemberStatus_ID = 3 or P.MemberStatus_ID = 4 or P.MemberStatus_ID = 5) and P.MemberType_ID = 8';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan="5"><font face="arial,helvetica" size="2" color="white">&nbsp;<b>Total: </b>'.$Line->Count.'</td></tr><tr><td colspan="4">&nbsp;</td></tr>');
		}
?>

