<?php
ini_set('display_errors', 'On');
// 	Program: 	mo_about_fees.php
//	Description: 	fees structure of AEMMA, created Dec 07, 2016
//	Author:		David M. Cvet
//
//	2019 ------------------
//	jan 25:	standardized path names
//
$lang = "en";
$modal = 0;					// no need for modal popups as there are no database operations (update/insert) in this script
$lang_num = 0;
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories
$current_pgm = "mo_about_fees.php";
$menu_selected = "AEMMA";

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
// begin check if the browser is still in session with DBLogin
$check_session = $path_members."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";
// test to determine if the initial database login session remains intact or the session has timed out before attempting to connect with the database
$session_expiration = $path_members."php-bin/sub_check_session_expiration.php"; include "$session_expiration";
// end setup database and members only library paths
$config = $path_members."config/config.php"; include "$config";
$config_about = $path_members."config/content_mo_about_fees_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";

$LinkID=dbConnect($DB);
// retrieve the values for fees categories, needed to build the table on the page
$SQL  = 'SELECT Fee_Name, Fee_Amount, Fee_Desc FROM Fees_Categories ';
$Result = mysqli_query($LinkID, $SQL);
$i = 0;
while ($Line = mysqli_fetch_object($Result))
	{
	$array_fee_name[$i]		= $Line->Fee_Name;
	$array_fee_amount[$i]		= $Line->Fee_Amount;
	$array_fee_desc[$i]		= $Line->Fee_Desc;
	$i++;
	}
$num_array_fees = sizeof($array_fee_name);

// retrieve the values for paypal options, needed to build the table on the page
$SQL  = 'SELECT PayPal_Amount, PayPal_Desc, PayPal_Code FROM PayPal_Categories ORDER BY PayPal_Desc';
$Result = mysqli_query($LinkID, $SQL);
$i = 0;
while ($Line = mysqli_fetch_object($Result))
	{
	$array_paypal_desc[$i]		= $Line->PayPal_Desc;
	$array_paypal_code[$i]		= $Line->PayPal_Code;
	$i++;
	}
$num_array_paypal = sizeof($array_paypal_desc);

?>
	<!-- begin main_content -->
	<div id="main_content_mo">
		<h2><?=$title[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
		</div>
		<p style="color:#461B7E;font-weight:bold;"><?=$fees_additional[$lang_num]?></p>
		<p style="color:green;"><?=$fees_incentive[$lang_num]?></p>
		<p><?=$fees_payment_method[$lang_num]?></p>
		<table width="95%" cellpadding="3" align="center">
		<tr class="chalkbar">
			<td align="left"  width="15%">Fees Type</td>
			<td align="left"  width="15%">Amount ($CAD)</td>
			<td align="left">Description</td>
		</tr>
<?php
// setup and populate the fees categories table
// NOTE: contributing fees type NOT shown on this table, as it has its own page
$class = "";
for ($i=1; $i<$num_array_fees;$i++)
	{
	echo ('	<tr '.$class.'>
			<td><b>'.$array_fee_name[$i].'</b></td>
			<td><b>'.$array_fee_amount[$i].'</b></td>
			<td>'.$array_fee_desc[$i].'</td>
		</tr>');
	if (!$class) {$class = "class='graybar'";} else {$class = "";}
	}
?>
		</table><br />&nbsp;
		<!-- NOTE: FACT has its own payment collection system !!!!!
		<table class="paypal_methods box" cellpadding="6" align="center">
		<tr class="chalkbar">
			<td><div align="center"><b>PayPal Method</b></div></td>
			<td><b>Training Fee Options</b></td>
		</tr>
		-->
<?php
// setup and populate the paypal fees options table
//$class = "";
//for ($i=0; $i<$num_array_paypal;$i++)
//	{
//	echo ('	<tr '.$class.'>
//			<td align="center">'.$array_paypal_code[$i].'</td>
///			<td class="fade">'.$array_paypal_desc[$i].'</td>
//		</tr>');
//	if (!$class) {$class = "class='graybar'";} else {$class = "";}
//	}
?>
		<!--
		</table><br />&nbsp;
		-->
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
