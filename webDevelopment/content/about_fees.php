<?php
ini_set('display_errors', 'On');
// 	Program: 	about_fees.php
//	Description: 	fees structure of AEMMA, where fees are sourced from the database table: Fees_Categories, created Dec 07, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
include "../php-bin/retrieve_cookies.php";
$modal = 0;					// no need for modal popups as there are no database operations (update/insert) in this script
$path = "../";					// the location of the members only scripts and files with respect to this calling script
$dbase_path = "../members_only/database/";	// the location of the database scripts and files with respect to this calling script
$current_pgm = "about_fees.php";
$menu_selected = "AEMMA";

$ss_path = $dbase_path."ss_path.stuff"; include "$ss_path";
$db_path = $dbase_path."DB.php"; include "$db_path";
session_start();
include "../config/config.php";
include "../config/content_about_fees_$lang.php";
include "../php-bin/header.php";
include "../php-bin/header2.php";

$LinkID=dbConnect($DB);
// retrieve the values for fees categories, needed to build the table on the page
$SQL  = 'SELECT Fee_Name, Fee_Name_fr, Fee_Amount, Fee_Amount_fr, Fee_Desc, Fee_Desc_fr FROM Fees_Categories ';
$Result = mysqli_query($LinkID, $SQL);
$i = 0;
while ($Line = mysqli_fetch_object($Result))
	{
	if (!$lang_num)
		{
		$array_fee_name[$i]		= $Line->Fee_Name;
		$array_fee_amount[$i]		= $Line->Fee_Amount;
		$array_fee_desc[$i]		= $Line->Fee_Desc;
		}
	else
		{
		$array_fee_name[$i]		= $Line->Fee_Name_fr;
		$array_fee_amount[$i]		= $Line->Fee_Amount_fr;
		$array_fee_desc[$i]		= $Line->Fee_Desc_fr;
		}
	$i++;
	}
$num_array_fees = sizeof($array_fee_name);
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
		</div>
		<p style="color:#461B7E;font-weight:bold;"><?=$fees_additional[$lang_num]?></p>
		<p><?=$fees_payment_method[$lang_num]?></p>
		<table width="95%" cellpadding="3" align="center">
		<tr class="chalkbar">
			<td align="left"  width="15%"><?=$column_type[$lang_num]?></td>
			<td align="left"  width="15%"><?=$column_amount[$lang_num]?></td>
			<td align="left"><?=$column_desc[$lang_num]?></td>
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
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
