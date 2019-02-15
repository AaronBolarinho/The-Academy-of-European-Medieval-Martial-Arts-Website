<?php
ini_set('display_errors', 'On');
// 	Program: 	about_schedule.php
//	Description: 	training schedule of AEMMA, whereby the source of the training schedules description, start  and end times are sourced from the table: Training_Schedule
//			These values are administered through the AIMS admin program. created Dec 07, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
include "../php-bin/retrieve_cookies.php";
$modal = 0;					// no need for modal popups as there are no database operations (update/insert) in this script
$path = "../";					// the location of the members only scripts and files with respect to this calling script
$dbase_path = "../members_only/database/";	// the location of the database scripts and files with respect to this calling script
$current_pgm = "about_schedule.php";
$menu_selected = "AEMMA";

$ss_path = $dbase_path."ss_path.stuff"; include "$ss_path";
$db_path = $dbase_path."DB.php"; include "$db_path";
session_start();
include "../config/config.php";
include "../config/content_about_schedule_$lang.php";
include "../php-bin/header.php";
include "../php-bin/header2.php";

$LinkID=dbConnect($DB);
// retrieve the values for fees categories, needed to build the table on the page
$SQL  = 'SELECT Day, Day_fr, Description, Description_fr, Start_Time, End_Time FROM Training_Schedule ';
$Result = mysqli_query($LinkID, $SQL);
$i = 0;
while ($Line = mysqli_fetch_object($Result))
	{
	if (!$lang_num)
		{
		$array_day[$i]		= $Line->Day;
		$array_desc[$i]		= $Line->Description;
		$array_start_time[$i]	= $Line->Start_Time;
		$array_end_time[$i]	= $Line->End_Time;
		}
	else
		{
		$array_day[$i]		= $Line->Day_fr;
		$array_desc[$i]		= $Line->Description_fr;
		$array_start_time[$i]	= $Line->Start_Time;
		$array_end_time[$i]	= $Line->End_Time;
		}
	$i++;
	}
$num_array_schedule = sizeof($array_day);
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
		</div>
		<p><?=$schedule_p1[$lang_num]?></p>
		<p><?=$schedule_p2[$lang_num]?></p>
		<table width="95%" cellpadding="3" align="center">
		<tr class="chalkbar">
			<td align="left"  width="15%"><?=$column_day[$lang_num]?></td>
			<td align="left"  width="65%"><?=$column_desc[$lang_num]?></td>
			<td align="left"><?=$column_time[$lang_num]?></td>
		</tr>
<?php
// setup and populate the schedule categories table
$class = "";
for ($i=0; $i<$num_array_schedule;$i++)
	{
	echo ('	<tr '.$class.'>
			<td><b>'.$array_day[$i].'</b></td>
			<td>'.$array_desc[$i].'</td>
			<td valign="top">'.$array_start_time[$i].' - '.$array_end_time[$i].'</td>
		</tr>');
	if (!$class) {$class = "class='graybar'";} else {$class = "";}
	}
?>
		</table><br />&nbsp;
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
