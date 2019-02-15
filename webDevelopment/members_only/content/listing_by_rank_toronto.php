<?php
ini_set('display_errors', 'On');
// 	Program: 	listing_by_rank_toronto.php
//	Description: 	Listing of the instructors of the Academy, created Dec 10, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//

if (isset($_GET['CHAP'])) { $chapter_ID = $_GET['CHAP']; } else { $chapter_ID = "TO"; }		//default chapter listed
if ($list == "all" || $list == "alphabet")
	{
	$SQL  = 'SELECT DISTINCT M.Member_ID, M.School, M.FirstName, M.MiddleName, M.LastName, M.Date_Joined, M.Armigerous, RM.Rank_ID, RM.Rank_Date, RM.Current_Status, RM.Location, RM.Notes,  P.Portrait_URL, P.Portrait_File ';
	$SQL .= 'FROM Members M ';
	$SQL .= 'INNER JOIN (Members_Rank RM INNER JOIN (Members_Portraits P INNER JOIN Members_Chapter MC ON MC.Member_ID = P.Member_ID) ON RM.Member_ID = P.Member_ID) ON M.Member_ID = RM.Member_ID  ';
	$SQL .= 'WHERE RM.Rank_Date = P.Date AND RM.Rank_ID = '.$rank_ID.' AND (MC.Chapter_ID = "TO" AND MC.Current_Status = 1) ';
//	$SQL  = 'SELECT DISTINCT RM.Member_ID, RM.Rank_ID, RM.Rank_Date, RM.Current_Status, RM.Location, RM.Notes, M.Member_ID, M.FirstName, M.School, M.MiddleName, M.LastName, M.Date_Joined, M.Armigerous, P.Portrait_URL, P.Portrait_File';
//	$SQL .= ' FROM Members_Rank RM, Members M, Members_Portraits P';
//	$SQL .= ' WHERE RM.Rank_ID = '.$rank_ID.' AND (RM.Member_ID = P.Member_ID AND RM.Rank_Date = P.Date) AND RM.Member_ID = M.Member_ID';
	if ($list == "alphabet") { $SQL .= ' ORDER BY LastName'; } else { $SQL .= ' ORDER BY Rank_Date'; }
	}
else
	{
	$SQL  = 'SELECT DISTINCT M.Member_ID, M.School, M.FirstName, M.MiddleName, M.LastName, M.Date_Joined, M.Portrait_URL, M.Portrait_File, M.Armigerous, RM.Rank_ID, RM.Rank_Date, RM.Current_Status, RM.Location, RM.Notes, SM.Status_ID FROM Members M ';
	$SQL .= 'INNER JOIN (Members_Rank RM INNER JOIN (Members_Status SM INNER JOIN Members_Chapter MC ON MC.Member_ID = SM.Member_ID) ON RM.Member_ID = SM.Member_ID) ON M.Member_ID = RM.Member_ID '; 
	$SQL .= 'WHERE SM.Status_ID = 2 AND SM.Current_Status = 1 AND RM.Rank_ID = 1 AND RM.Current_Status = 1  AND (MC.Chapter_ID = "TO" AND MC.Current_Status = 1) ';
	$SQL .= 'ORDER BY Rank_Date';
	}
echo ($SQL);
// test to determine if the initial database login session remains intact or has timed out before attempting to connect with the database
if ($_SESSION['DBLogin'])
	{
	$LinkID=dbConnect($DB);
//	$SQL = 'SET SQL_BIG_SELECTS=1';
//	mysql_query('set SQL_BIG_SELECTS=1');
//SET SESSION SQL_BIG_SELECTS=1;
	$Result = mysqli_query($LinkID, $SQL);
	$i = 0;
	while ($Line = mysqli_fetch_object($Result))
		{
		if ($Line->School <> "AEMMA")
			{ $array_full_name[$i] = $Line->FirstName.' '.$Line->LastName.' ('.$Line->School.')';}
		else
			{ $array_full_name[$i] = $Line->FirstName.' '.$Line->LastName;}

		$array_test_date[$i] = $Line->Rank_Date;
		$array_location[$i] = $Line->Location;
		$array_date_joined[$i] = $Line->Date_Joined;
		$array_Portrait_URL[$i] = $Line->Portrait_URL;
		$array_Portrait_File[$i] = $Line->Portrait_File;
		$array_armigerous[$i] = $Line->Armigerous;

		if ($array_armigerous[$i]) { $array_full_name[$i] .= " <img src=\"../images/tinyShield.gif\" style=\"vertical-align:middle;\" class=\"fade\" alt=\"\" />"; }

		$array_caption[$i] = "<b>".$array_full_name[$i]."</b><br />date: ".$array_test_date[$i]."<br />location: ".$array_location[$i]."<br />start date: ".$array_date_joined[$i];
		$i++;
		}
	$array_num = sizeof($array_full_name);
	}
else
	{
	// the session has timed out, go back to AIMS login
	echo ('<script type="text/JavaScript">');
	echo ('parent.location.href="listing_by_rank.php?RNK='.$rank_ID.'"');
	echo ('</script>');
	exit;
	}	
?>
		<img src="../images/1090x4_transparent.png" width="100%" alt="" />
		<div style="float:left;width:100%;height:28px;padding-top:5px;background-color:orange;border-style:solid;border-width:1px;border-color:gray;border-radius:6px;margin-bottom:2%;margin-top:1%;" class="box">
			<div style="float:left;"><b>&nbsp;<?=$report_title?>&nbsp;&nbsp;</b>Options <img src="../images/icons/hand_right_pointing.gif" alt="" style="vertical-align:middle;" />&nbsp;</div>
<?php
if ($rank_ID <> 77)
	{
	echo('			<div style="float:left;"><form action=""><input type="radio" name="StatusSelection" value="all" '.($list == "all" ? 'checked' : '').'  title="list ALL '.$list_pref.', past and present, who are all still actively training" style="vertical-align:middle;" onclick="submit_new_list(\'all\','.$rank_ID.')" /> list all '.$list_pref.'&nbsp;&nbsp;<input type="radio" name="StatusSelection" value="current" '.($list == "current" ? 'CHECKED' : '').' title="list current members who are '.$list_pref.'" style="vertical-align:middle;" onclick="submit_new_list(\'current\','.$rank_ID.')" /> list only currently active '.$list_pref.'&nbsp;&nbsp;<input type="radio" name="StatusSelection" value="current" '.($list == "alphabet" ? 'CHECKED' : '').' title="list current members who are '.$list_pref.'" style="vertical-align:middle;" onclick="submit_new_list(\'alphabet\','.$rank_ID.')" /> order by surname for all '.$list_pref.'</form></div>');
	}
else	
	{
	echo('			<div style="float:left;"><form action=""><input type="radio" name="StatusSelection" value="all" '.($list == "all" ? 'checked' : '').'  title="list ALL '.$list_pref.', past and present, who are all still actively training" style="vertical-align:middle;" onclick="submit_new_list(\'all\','.$rank_ID.')" /> list all '.$list_pref.'</form></div>');
	}
?>
		</div>
<?php
// generate the page displaying the portraits and captions associated with the portraits
for ($i=0; $i<$array_num; $i++)
	{
	echo ('<div class="rank_listings" style="float:left;"><div style="margin-bottom:15px;width:80%;margin-left:7%;"><img src="'.$members_only_path.$array_Portrait_URL[$i].'/'.$array_Portrait_File[$i].'" alt="" width="100%" class="box" /></div><div style="margin-left:8%;"><span class="members_listing">'.$array_caption[$i].'</span></div></div>'."\n");
	}
?>
