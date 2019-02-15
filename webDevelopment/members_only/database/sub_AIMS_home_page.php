<?php
//	$loginID = "";
	$LinkID=dbConnect($DB);

	// get the currently active branches
	$SQL = 'SELECT Index_ID, Chapter_ID, Chapter_Name FROM Chapters ';
	$SQL .= 'WHERE ChapterState_ID = 3 ORDER BY Index_ID';
	$Result = mysqli_query($LinkID, $SQL);
	$i=0;
	while ($Line = mysqli_fetch_object($Result)) {
		$chapter_ID[$i] = $Line->Chapter_ID;
		$chapter_name[$i] = $Line->Chapter_Name;
		$i++;
		}
	$num_array_chapters = sizeof($chapter_ID);

	// now get the membership numbers categorized by active and inactive and total these numbers
	// retrieve active and new members
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members M, Members_Chapter MC, Members_Status MS ';
		$SQL .= 'WHERE MS.Status_ID IN (1,2) AND MS.Member_ID = MC.Member_ID AND MC.Chapter_ID = "'.$chapter_ID[$i].'"';	
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_active[$i] = $Line->Count;
		}
	// retrieve inactive, lost and resigned members
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members M, Members_Chapter MC, Members_Status MS ';
		$SQL .= 'WHERE MS.Status_ID IN (3,4,5,6,7) AND MS.Member_ID = MC.Member_ID AND MC.Chapter_ID = "'.$chapter_ID[$i].'"';	
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_inactive[$i] = $Line->Count;
		}

	// now aggregate the number of recruit records associated with each chapter
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members_Chapter MC ';
		$SQL .= 'INNER JOIN (Members_Rank MR INNER JOIN Members_Status MS ON MS.Member_ID = MR.Member_ID) ON MR.Member_ID = MC.Member_ID ';
		$SQL .= 'WHERE (MC.Chapter_ID = "'.$chapter_ID[$i].'" AND MC.Current_Status = 1) AND (MC.Member_ID = MS.Member_ID AND ';
		$SQL .= 'MS.Status_ID IN (1,2) AND MS.Current_Status = 1) AND (MS.Member_ID = MR.Member_ID AND MR.Rank_ID = 1 AND MR.Current_Status = 1)';
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_tally_recruits[$i] = $Line->Count;
		$chapter_tally[$i] = $Line->Count;
		$recruits = $recruits + $Line->Count;
		}

	// now aggregate the number of scholars records associated with each chapter
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members_Chapter MC ';
		$SQL .= 'INNER JOIN (Members_Rank MR INNER JOIN Members_Status MS ON MS.Member_ID = MR.Member_ID) ON MR.Member_ID = MC.Member_ID ';
		$SQL .= 'WHERE (MC.Chapter_ID = "'.$chapter_ID[$i].'" AND MC.Current_Status = 1) AND (MC.Member_ID = MS.Member_ID AND ';
		$SQL .= 'MS.Status_ID IN (1,2) AND MS.Current_Status = 1) AND (MS.Member_ID = MR.Member_ID AND MR.Rank_ID = 2 AND MR.Current_Status = 1)';
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_tally_scholars[$i] = $Line->Count;
		$chapter_tally[$i] = $chapter_tally[$i] + $Line->Count;
		$scholars = $scholars + $Line->Count;
		}

	// now aggregate the number of free scholars records associated with each chapter
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members_Chapter MC ';
		$SQL .= 'INNER JOIN (Members_Rank MR INNER JOIN Members_Status MS ON MS.Member_ID = MR.Member_ID) ON MR.Member_ID = MC.Member_ID ';
		$SQL .= 'WHERE (MC.Chapter_ID = "'.$chapter_ID[$i].'" AND MC.Current_Status = 1) AND (MC.Member_ID = MS.Member_ID AND ';
		$SQL .= 'MS.Status_ID IN (1,2) AND MS.Current_Status = 1) AND (MS.Member_ID = MR.Member_ID AND MR.Rank_ID = 3 AND MR.Current_Status = 1)';
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_tally_free_scholars[$i] = $Line->Count;
		$chapter_tally[$i] = $chapter_tally[$i] + $Line->Count;
		$free_scholars = $free_scholars + $Line->Count;
		}

	// aggregate the number of provosts records associated with each chapter
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members_Chapter MC ';
		$SQL .= 'INNER JOIN (Members_Rank MR INNER JOIN Members_Status MS ON MS.Member_ID = MR.Member_ID) ON MR.Member_ID = MC.Member_ID ';
		$SQL .= 'WHERE (MC.Chapter_ID = "'.$chapter_ID[$i].'" AND MC.Current_Status = 1) AND (MC.Member_ID = MS.Member_ID AND ';
		$SQL .= 'MS.Status_ID IN (1,2) AND MS.Current_Status = 1) AND (MS.Member_ID = MR.Member_ID AND MR.Rank_ID = 4 AND MR.Current_Status = 1)';
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_tally_provosts[$i] = $Line->Count;
		$chapter_tally[$i] = $chapter_tally[$i] + $Line->Count;
		$provosts = $provosts + $Line->Count;
		}

	// aggregate the number of traditional archery only records associated with each chapter
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members_Chapter MC ';
		$SQL .= 'INNER JOIN (Members_Rank MR INNER JOIN Members_Status MS ON MS.Member_ID = MR.Member_ID) ON MR.Member_ID = MC.Member_ID ';
		$SQL .= 'WHERE (MC.Chapter_ID = "'.$chapter_ID[$i].'" AND MC.Current_Status = 1) AND (MC.Member_ID = MS.Member_ID AND ';
		$SQL .= 'MS.Status_ID IN (1,2) AND MS.Current_Status = 1) AND (MS.Member_ID = MR.Member_ID AND MR.Rank_ID = 10 AND MR.Current_Status = 1)';
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_tally_archery[$i] = $Line->Count;
		$chapter_tally[$i] = $chapter_tally[$i] + $Line->Count;
		$archery = $archery + $Line->Count;
		}

	$total_active = $recruits + $scholars + $free_scholars + $provosts + $archery;

// ===> Begin other interesting statistics
	// aggregate the number of armigerous records associated with each chapter
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members_Chapter MC ';
		$SQL .= 'INNER JOIN (Members_Armigerous MA INNER JOIN Members_Status MS ON MS.Member_ID = MA.Member_ID) ON MA.Member_ID = MC.Member_ID ';
		$SQL .= 'WHERE (MC.Chapter_ID = "'.$chapter_ID[$i].'" AND MC.Current_Status = 1) AND (MC.Member_ID = MS.Member_ID AND ';
		$SQL .= 'MS.Status_ID IN (1,2,3,4,5,6,7) AND MS.Current_Status = 1) AND (MS.Member_ID = MA.Member_ID)';
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_tally_armigerous[$i] = $Line->Count;
//		$chapter_tally[$i] = $chapter_tally[$i] + $Line->Count;
		$armigerous = $armigerous + $Line->Count;
		}

	// aggregate the number of honourary records associated with each chapter
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members_Chapter MC ';
		$SQL .= 'INNER JOIN (Members_Rank MR INNER JOIN Members_Status MS ON MS.Member_ID = MR.Member_ID) ON MR.Member_ID = MC.Member_ID ';
		$SQL .= 'WHERE (MC.Chapter_ID = "'.$chapter_ID[$i].'" AND MC.Current_Status = 1) AND (MC.Member_ID = MS.Member_ID AND ';
		$SQL .= 'MS.Status_ID IN (1,2,3,4,5,6,7) AND MS.Current_Status = 1) AND (MS.Member_ID = MR.Member_ID AND MR.Rank_ID = 77 AND MR.Current_Status = 1)';
//echo ('debug:sub_AIMS_home_page:132:SQL="'.$SQL.'"');exit;
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_tally_honourary[$i] = $Line->Count;
//		$chapter_tally[$i] = $chapter_tally[$i] + $Line->Count;
		$honourary_count = $honourary_count + $Line->Count;
		}

	// aggregate the number of traditional archery only records of any inactive status associated with each chapter
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members_Chapter MC ';
		$SQL .= 'INNER JOIN (Members_Rank MR INNER JOIN Members_Status MS ON MS.Member_ID = MR.Member_ID) ON MR.Member_ID = MC.Member_ID ';
		$SQL .= 'WHERE (MC.Chapter_ID = "'.$chapter_ID[$i].'" AND MC.Current_Status = 1) AND (MC.Member_ID = MS.Member_ID AND ';
		$SQL .= 'MS.Status_ID IN (3,4,5,6,7) AND MS.Current_Status = 1) AND (MS.Member_ID = MR.Member_ID AND MR.Rank_ID = 10 AND MR.Current_Status = 1)';
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_tally_archery_inactive[$i] = $Line->Count;
//		$chapter_tally[$i] = $chapter_tally[$i] + $Line->Count;
		$archery_inactive = $archery_inactive + $Line->Count;
		}

	// aggregate the number of inactive records associated with each chapter
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members_Chapter MC, Members_Status MS ';
		$SQL .= 'WHERE (MC.Chapter_ID = "'.$chapter_ID[$i].'" AND MC.Current_Status = 1) AND (MC.Member_ID = MS.Member_ID) ';
		$SQL .= 'AND (MS.Status_ID = 3 AND MS.Current_Status = 1)';
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_tally_inactive[$i] = $Line->Count;
		$chapter_tally[$i] = $Line->Count;
		$inactive = $inactive + $Line->Count;
		$totals_other1 = $totals_other1 + $Line->Count;
		}

	// aggregate the number of resigned records associated with each chapter
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members_Chapter MC, Members_Status MS ';
		$SQL .= 'WHERE (MC.Chapter_ID = "'.$chapter_ID[$i].'" AND MC.Current_Status = 1) AND (MC.Member_ID = MS.Member_ID) ';
		$SQL .= 'AND (MS.Status_ID = 4 AND MS.Current_Status = 1)';
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_tally_resigned[$i] = $Line->Count;
		$chapter_tally[$i] = $chapter_tally[$i] + $Line->Count;
		$resigned = $resigned + $Line->Count;
		$totals_other1 = $totals_other1 + $Line->Count;
		}

	// aggregate the number of lost records associated with each chapter
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members_Chapter MC, Members_Status MS ';
		$SQL .= 'WHERE (MC.Chapter_ID = "'.$chapter_ID[$i].'" AND MC.Current_Status = 1) AND (MC.Member_ID = MS.Member_ID) ';
		$SQL .= 'AND (MS.Status_ID = 5 AND MS.Current_Status = 1)';
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_tally_lost[$i] = $Line->Count;
		$chapter_tally[$i] = $chapter_tally[$i] + $Line->Count;
		$lost = $lost + $Line->Count;
		$totals_other1 = $totals_other1 + $Line->Count;
		}

	// aggregate the number of suspended records associated with each chapter
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members_Chapter MC, Members_Status MS ';
		$SQL .= 'WHERE (MC.Chapter_ID = "'.$chapter_ID[$i].'" AND MC.Current_Status = 1) AND (MC.Member_ID = MS.Member_ID) ';
		$SQL .= 'AND (MS.Status_ID = 6 AND MS.Current_Status = 1)';
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_tally_suspended[$i] = $Line->Count;
		$chapter_tally[$i] = $chapter_tally[$i] + $Line->Count;
		$suspended = $suspended + $Line->Count;
		$totals_other1 = $totals_other1 + $Line->Count;
		}

	// aggregate the number of deceased records associated with each chapter
	for ($i=0;$i<$num_array_chapters;$i++)
		{
		$SQL  = 'SELECT count(*) Count FROM Members_Chapter MC, Members_Status MS ';
		$SQL .= 'WHERE (MC.Chapter_ID = "'.$chapter_ID[$i].'" AND MC.Current_Status = 1) AND (MC.Member_ID = MS.Member_ID) ';
		$SQL .= 'AND (MS.Status_ID = 7 AND MS.Current_Status = 1)';
		$Result = mysqli_query($LinkID, $SQL);
		$Line = mysqli_fetch_object($Result);
		$chapter_tally_deceased[$i] = $Line->Count;
		$chapter_tally[$i] = $chapter_tally[$i] + $Line->Count;
		$deceased = $deceased + $Line->Count;
		$totals_other1 = $totals_other1 + $Line->Count;
		}


	$SQL = 'SELECT count(*) Count FROM Members_Rank';
	$SQL .= ' WHERE Rank_ID = 21';
	$Result = mysqli_query($LinkID, $SQL);
	while ($Line = mysqli_fetch_object($Result)) {
		$ROM = $Line->Count;
		$total_programs = $total_programs + $ROM;
		}

	$SQL = 'SELECT count(*) Count FROM Members_Rank';
	$SQL .= ' WHERE Rank_ID = 21 AND Current_Status = 0';
	$Result = mysqli_query($LinkID, $SQL);
	while ($Line = mysqli_fetch_object($Result)) {
		$ROM_grads = $Line->Count;
		}

	$SQL = 'SELECT count(*) Count FROM Members_Rank';
	$SQL .= ' WHERE Rank_ID = 22';
	$Result = mysqli_query($LinkID, $SQL);
	while ($Line = mysqli_fetch_object($Result)) {
		$AEMMA = $Line->Count;
		}

	$SQL = 'SELECT count(*) Count FROM Members_Rank';
	$SQL .= ' WHERE Rank_ID = 22 AND Current_Status = 0';
	$Result = mysqli_query($LinkID, $SQL);
	while ($Line = mysqli_fetch_object($Result)) {
		$AEMMA_grads = $Line->Count;
		$total_programs = $total_programs + $AEMMA_grads;
		}

	$SQL = 'SELECT count(*) Count FROM Members_Rank';
	$SQL .= ' WHERE Rank_ID = 23';
	$Result = mysqli_query($LinkID, $SQL);
	while ($Line = mysqli_fetch_object($Result)) {
		$ROM_archery = $Line->Count;
		$total_programs = $total_programs + $ROM_archery;
		}

	// note: armigerous is NOT included in the tally of "other records" as those records are already in the various
	// 	 categories, i.e. active, inactive, deceased, etc.
	//
	$total_other = $inactive + $resigned + $lost + $suspended + $deceased + $honourary_count;

	$SQL = 'SELECT count(*) Count FROM Members';
	$SQL .= ' WHERE Gender = "M"';
	$Result = mysqli_query($LinkID, $SQL);
	while ($Line = mysqli_fetch_object($Result)) {
		$male_count = $Line->Count;
		}
	$SQL = 'SELECT count(*) Count FROM Members';
	$SQL .= ' WHERE Gender = "F"';
	$Result = mysqli_query($LinkID, $SQL);
	while ($Line = mysqli_fetch_object($Result)) {
		$female_count = $Line->Count;
		}
	$SQL = 'SELECT count(*) Count FROM Members';
	$SQL .= ' WHERE Gender = "" OR Gender = NULL';
	$Result = mysqli_query($LinkID, $SQL);
	while ($Line = mysqli_fetch_object($Result)) {
		$gender_unknown = $Line->Count;
		}


	$SQL = 'SELECT count(*) Count';
	$SQL .= ' FROM Members';
	$Result = mysqli_query($LinkID, $SQL);
	while ($Line = mysqli_fetch_object($Result)) {
		$total_dbrecords = $Line->Count;
		}
	dbClose($LinkID);

	// calculate percentage of males versus females distribution within the GPC
	$percent_male = ($male_count/$total_dbrecords) * 100;
	$percent_female = ($female_count/$total_dbrecords) * 100;
?>

