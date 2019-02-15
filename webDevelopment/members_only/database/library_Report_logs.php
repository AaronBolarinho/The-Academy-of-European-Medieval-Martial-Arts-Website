<?php
//
// Program: library_Report_logs.php
// Author: David M. Cvet
// Created: Apr 08, 2018
// Description:
// This script will list all access logs by range of dates, or by username
//---------------------------
// Updates:
//	2019 ------------------
//	jan 25:	standardized path names
//

$aims = 1;			// flag to indicate that we are now in the AIMS database system, so the menu bar needs to be expanded by the AIMS menu item
$lang = "en";
$lang_num = 0;
$modal = 0;			// disable the modal code in members_only_header2.php as no modals needed for this script
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories calling script
$current_pgm = "library_Report_logs.php".$PHP_string;
$menu_selected = "AIMS";
$display_report = 0;	// display the report only after a date selection has been made
$todays_date = date("Y-m-d");

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
// test to determine if the initial database login session remains intact or the session has timed out before attempting to connect with the database
$session_expiration = $path_members."php-bin/sub_check_session_expiration.php"; include "$session_expiration";

//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

include "config/config.php";
$config = $path_members."config/config.php"; include "$config";
$login_AIMS = $path_dbase."config/AIMS_library_list_$lang.php"; include "$login_AIMS";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
echo ('<script type="text/javascript" src="../../js-bin/beep.js"></script>');
?>
<!-- begin Zebra Datepicker (source:http://stefangabos.ro/jquery/zebra-datepicker/) -->
<script type="text/javascript" src="js-bin/jquery.min_v3.1.1.js"></script>
<script type="text/javascript" src="zebra_datepicker/js-bin/zebra_datepicker.js"></script>
<link rel="stylesheet" href="zebra_datepicker/css/metallic.css" type="text/css" />
<!-- end Zebra Datepicker (source:http://stefangabos.ro/jquery/zebra-datepicker/) -->
<?php
$full_date= date("F j, Y");
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";

// check if any PHP parameters were set and sent
if (isset($_GET['CLR']))
	{
	if ($_GET['CLR'])	
		{
		$display_report = 0; 	
		}
	}
else
	{
	if (isset($_POST['FromDate']))
		{
//		echo ('debug:sysadmin_login_records:36:$_POST[FromDate]="'.$_POST['FromDate'].'"');
		$from_date = $_POST['FromDate']; 
		$display_report = 1; 
		$table_title = "Date range: ".$from_date; 
		}
	else
		{$from_date = "";}
	if (isset($_POST['ToDate']))
		{
		$to_date = $_POST['ToDate']; 
		$display_report = 1; 
		$table_title .= "&nbsp;&nbsp;<img src=\"images/icons/hand_right_pointing.gif\" alt=\"\" style=\"vertical-align:middle;width:22px;\" />&nbsp;&nbsp;".$to_date;
		}
	else
		{$to_date = "";}
	if (isset($_POST['Quicky'])) 
		{
		$yesterday_today_all = $_POST['Quicky'];
		$display_report = 1;
		if ($yesterday_today_all == 1)	{$table_title = "Records from Yesterday Only";}
		elseif ($yesterday_today_all == 2)	{$table_title = "Records from Today Only";}
		else {$table_title = "All Log Records";}
		}
	else	{$yesterday_today_all = 0;}
}

?>
	<!-- begin main content -->
	<div id="main_content_AIMS">
	<!-- begin page header -->
	<h3><img src="../images/icons/books4.png" alt="" style="vertical-align:middle;width:40px;" /> <img src="../images/icons/logs.png" alt="" style="vertical-align:middle;width:40px;" />&nbsp;Online Library Admin: Access Log Records</h3>
	<!-- end page header -->
		<p>This is a presentation of library login records for AIMS. There is no utility to purge the table: <b><i>Online_library_accessLog</i></b> and therefore, this list may become quite long over time. Purge the table periodically retaining the lasy 6-months or so of records. The records are ordered from the most recent to the oldest.</p>
		<p>Select a date range for the report (which will reduce overhead and processing time) or select one of the quicky dates of yesterday or today. To view the entire contents of the table: <b><i>Online_library_accessLog</i></b>, click on the radio button labelled "All".</p>
		<div class="admin_stuff box">
			<form name="login_records_form" method="post" action="dbase_functions_members_logs.php">
			<div style="float:left;width:80%;">
				<table style="width:100%;margin-left:5%;">
				<tr>
					<td class="proddesc" colspan="2"><h3><?=$report_range[$lang_num]?></h3></td>
				</tr>
				<tr>
<?php				echo ('
						<td class="proddesc" align="right"><label for="FromDate">From Date:&nbsp;</label></td>
						<td class="proddesc"><input type="text" name="FromDate" id="FromDate" placeholder="yyyy-mm-dd" data-zdp_first_day_of_week="0" maxlength="10" size="9" value="" tabindex="1" onclick="this.form.SubmitButton.disabled=false" >
						<script type="text/javascript">$(\'#FromDate\').Zebra_DatePicker();</script>&nbsp;&nbsp;<label for="ToDate">To Date:&nbsp;</label><input type="text" name="ToDate"  id="ToDate"  data-zdp_first_day_of_week="0"  placeholder="'.$todays_date.'"   maxlength="10" size="9" value="'.$todays_date.'" tabindex="2">
						<script type="text/javascript">$(\'#ToDate\').Zebra_DatePicker();</script></td>
						');
?>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td class="proddesc" align="right"><label for="Quicky"><b>Quicky Dates:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label></td>
					<td class="proddesc">Yesterday:<input type="radio" name="Quicky" id="Quicky1" value="1" style="vertical-align:middle" onclick="this.form.SubmitButton.disabled=false" tabindex="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Today:<input type="radio" name="Quicky" id="Quicky2" value="2" style="vertical-align:middle" onclick="this.form.SubmitButton.disabled=false" tabindex="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All:<input type="radio" name="Quicky" id="Quicky3" value="3" style="vertical-align:middle" onclick="this.form.SubmitButton.disabled=false" tabindex="5"></td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
				</table>
			</div>
<?php
			echo ("\t\t\t".'<div style="float:left;background-color:orange;width:100%;border-bottom-right-radius:10px;border-bottom-left-radius:10px;padding-top:4px;padding-bottom:4px;text-align:center;margin-top:15px;"><input type="submit" class="button" style="vertical-align:middle" name="SubmitButton" id="SubmitButton" tabindex="5" value="Submit Library Login Report?" disabled="true" /> <button class="button" value="Clear Form" style="vertical-align:middle" formaction="library_Report_logs.php?CLR=1">Clear Form</button> <button class="button" value="" style="vertical-align:middle"  formaction="library_report_individual_accesses.php">Report Accesses</button></div>');
?>
			</form>
		</div><!-- admin_stuff box -->

<?php
if ($display_report)
	{
	$full_date= date("d-m-Y");	

//		if ($order == "userID")
//			{ echo ('<caption>Access log records - ordered by userID ('.$full_date.')<br />(options to order by accessed date or resource at the bottom)</caption>'); }
//		elseif ($order == "recent")
//			{ echo ('<caption>Access log records - ordered by accessed date ('.$full_date.')<br />(options to order by userID or resource at the bottom)</caption>'); }
//		else
//			{ echo ('<caption>Access log records - ordered by resource accessed ('.$full_date.')<br />(options to order by userID or accessed date at the bottom)</caption>'); }
?>
	<table cellpadding="0" cellspacing="0" width="650" bgcolor="white">
		<tr><th>UserID</th><th>Resource Accessed</th><th>Access Date</th><th>Access Count&nbsp;</th></tr>
<?php
		$prev_userID = "NA";
		$which = 1;
		$prev_resource = "11093";
		$i = 0;

		$LinkID=dbConnect($DB);
		$SQL  = 'SELECT userID, resourceAccessed, access_date, accesses ';
		$SQL .= 'FROM Online_library_accessLog';
	
		if ($order == "userID")
			{ $SQL .= ' ORDER BY userID, access_date'; }
		elseif ($order == "recent")
			{ $SQL .= ' ORDER BY access_date desc'; }
		else
			{ $SQL .= ' ORDER BY resourceAccessed, userID'; }

		$Result = mysqli_query($LinkID, $SQL);
		while ($Line = mysqli_fetch_object($Result)) {

			$userID 	= $Line->userID;
			$resource 	= $Line->resourceAccessed;
			$accesses 	= $Line->accesses;

			if (($prev_userID <> $userID) and ($order == "userID" or $order == "recent"))
				{ 
				$prev_userID = $userID;
				if ($which)
					{ $which = 0; }
				else
					{ $which = 1; }
				}
			elseif ($order == "resource")
				{ 
				if ($prev_resource <> $resource)
					{ 
					$prev_resource = $resource;
					if ($which)
						{ $which = 0; }
					else
						{ $which = 1; }
					}
				}

			if ($which == 0)
				{ 
				echo ('<td><div id="Data" align="left">' . $Line->userID . '</div></td>');
				echo ('<td><div id="Data" align="left">' . $Line->resourceAccessed . '</div></td>');
				echo ('<td><div id="Data" align="left">' . $Line->access_date . '</div></td>');
				echo ('<td><div id="Data" align="center">' . $Line->accesses . '</div></td>');
				}
			else
				{ 
				echo ('<td bgcolor="#FFFFCC"><div id="Data" align="left">' . $Line->userID . '</div></td>');
				echo ('<td bgcolor="#FFFFCC"><div id="Data" align="left">' . $Line->resourceAccessed . '</div></td>');
				echo ('<td bgcolor="#FFFFCC"><div id="Data" align="left">' . $Line->access_date . '</div></td>');
				echo ('<td bgcolor="#FFFFCC"><div id="Data" align="center">' . $Line->accesses . '</div></td>');
				}
			echo ('</tr>');
		}

		$SQL  = 'SELECT count(*) Count ';
		$SQL .= 'FROM Online_library_accessLog';
		$Result = mysqli_query($LinkID,$SQL);
		while ($Line = mysqli_fetch_object($Result)) {
			echo ('<tr bgcolor="gray"><td colspan="4"><font face="arial,helvetica,sans-serif" size="-2" color="white">&nbsp;<b>Total number of <b>log</b> records: </b>'.$Line->Count.'&nbsp;&nbsp;</td></tr>');
		}

		echo ('</ul></div>');

		mysqli_free_result($Result);
		dbClose($LinkID);
	?>
	<tr>
		<td colspan="4">&nbsp;<br /></td>
	</tr>
	<tr>
		<td colspan="4"><font face="arial,helvetica,sans-serif" size="-1"><b>Note: </b>The ordering of the log records can be changed by selecting one of the following:<ul><li>order the listing by userID and date of access by clicking <a href="library_Report_logs.php?Order=userID"><b>here</b></a>;</li><li>order the listing by accessed date by clicking <a href="library_Report_logs.php?Order=recent"><b>here</b></a>;</li><li>order the listing by clumping resources accessed by clicking <a href="library_Report_logs.php?Order=resource"><b>here</b></a>.</li></ul></td>
	</tr>
	</table>
<br /><p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center>
<?php
	} // if $display_report == 1, display the rows
//	<!-- being footer -->
	include "../php-bin/footer.php";
//	<!-- end footer
?>
</div><!-- main_content_AIMS -->
</div><!-- container -->
</body></html>
