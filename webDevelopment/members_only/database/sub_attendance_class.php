<?php
		$SQL = 'SELECT P.Rec_ID, P.FirstName, P.MiddleInitial, P.LastName, P.MemberStatus_ID, P.MemberType_ID, P.DateJoined, P.portrait_URL, MR.Rank_ID ';
		$SQL .= ' FROM People P ';
		$SQL .= ' INNER JOIN (Members_Chapter MC ';
		$SQL .= ' INNER JOIN Members_Rank MR ON MC.People_ID = MR.People_ID) ';
		$SQL .= ' ON P.Rec_ID = MC.People_ID ';
		if ($membertype_ID == 57)
			{ $SQL .= ' WHERE MR.People_ID = P.Rec_ID AND MR.Current = 1 AND P.MemberStatus_ID IN (1,2) AND MC.Chapter_ID = '.$chapter_ID.' AND (P.MemberType_ID = 5 OR P.MemberType_ID = 7)'; }
		else
			{ $SQL .= ' WHERE MR.People_ID = P.Rec_ID AND MR.Current = 1 AND P.MemberStatus_ID IN (1,2) AND MC.Chapter_ID = '.$chapter_ID.' AND P.MemberType_ID = '.$membertype_ID; }
		$SQL .= ' ORDER BY P.LastName';

		$Result = mysql_query($SQL, $LinkID);
		$php_variables = "?PGM=Members\&SCH=$school\&RID=$uRec_ID\&LGID=$login_ID\&SECL=$seclvl";
		$count = 0;
		while ($Line = mysql_fetch_object($Result)) 
			{
			$status = $Line->MemberStatus_ID;
			$rank_ID = $Line->Rank_ID;
			include 'sub_report_statuses.php';

			if ($rank_ID == 1) {$rank_desc = "Recruit";}
			elseif ($rank_ID == 2) {$rank_desc = "Scholler";}
			elseif ($rank_ID == 3) {$rank_desc = "Free Scholler";}
			else {$rank_desc = "Provost";}

			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);">');

			echo ('<td OnClick="navBarClick(this,1,' . $Line->Rec_ID . ',\'' . $php_variables .'\')" style="vertical-align:middle"><div id="Data">&nbsp;&nbsp;'.$cross.'<font color="'.$colour.'">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</td>'); 
			echo ('<td OnClick="navBarClick(this,1,' . $Line->Rec_ID . ',\'' . $php_variables .'\')" style="vertical-align:middle"><div id="Data"><font color="'.$colour.'">' . $rank_desc . '</td>');
			echo ('<td OnClick="navBarClick(this,1,' . $Line->Rec_ID . ',\'' . $php_variables .'\')" style="vertical-align:middle" align="center"><div id="Data" align="left"><font color="'.$colour.'">' . $Line->DateJoined . '</td>');
	
			echo ('<td><div id="Data" align="center"><a class="thumbnail" href="#thumb"><img src="' . $Line->portrait_URL . '" height="40" width="25" border="0" /><span><img src="' . $Line->portrait_URL . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial .'</span></a></td>');
			echo ('<td style="vertical-align:middle" align="center"><input type="checkbox" name ="recID_' . str_replace(' ', '', $Line->Rec_ID) . '" value="1"></td>');
			echo ('</tr>');
			$count++;
			}
		// enter last row after the last row of the while line was processed above
		echo ('<tr bgcolor="gray"><td colspan="5"><input type="hidden" name="SQL" value="'.$SQL.'"><font style="font-size:7.5pt;color:white;">&nbsp;<b>Total: </b>'.$count.'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		mysql_free_result($Result);
?>
