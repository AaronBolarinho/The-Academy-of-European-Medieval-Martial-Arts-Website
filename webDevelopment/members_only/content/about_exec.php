<?php
ini_set('display_errors', 'On');
// 	Program: 	about_exec.php
//	Description: 	Listing of the Officers of the Academy, created May 24, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
$lang = "en";
$modal = 0;					// no need for modal popups as there are no database operations in this script
$lang_num = 0;
$members_only_path = "../";			// the location of the members only scripts and files with respect to this calling script
$dbase_path = $path = "../database/";		// the location of the database scripts and files with respect to this calling script
$current_pgm = "about_exec.php";
$menu_selected = "AEMMA";

$ss_path = $dbase_path."ss_path.stuff"; include "$ss_path";
$db_path = $dbase_path."DB.php"; include "$db_path";
session_start();
// begin check if the browser is still in session with DBLogin
$check_session = $members_only_path."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session
//$idvalid = $dbase_path."IDValid.php"; include_once "$idvalid";
$retrieve = $members_only_path."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $members_only_path."config/config.php"; include "$config";
$config_about = $members_only_path."config/content_about_exec_$lang.php"; include "$config_about";
$header = $members_only_path."php-bin/members_only_header.php"; include "$header";
$header2 = $members_only_path."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<table style="border-collapse:collapse;" cellpadding="10px">
		<tr>
			<td class="officers_td"><div class="officers_div"><a href="<?=$members_only_path?><?=$officers_president_image_large[$lang_num]?>" target="_blank" title="<?=$officers_image_title[$lang_num]?>"><img src="<?=$members_only_path?><?=$officers_president_image[$lang_num]?>" class="officers_portrait fade" alt="" /></a></div><b><?=$officers_president[$lang_num]?>: <?=$officers_president_name[$lang_num]?></b><br /><br /><?=$officers_president_arms_link[$lang_num]?><?=$officers_president_bio[$lang_num]?>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td class="officers_td"><div class="officers_div"><a href="<?=$members_only_path?><?=$officers_vice_president_image_large[$lang_num]?>" target="_blank" title="<?=$officers_image_title[$lang_num]?>"><img src="<?=$members_only_path?><?=$officers_vice_president_image[$lang_num]?>" class="officers_portrait fade" alt="" /></a></div><b><?=$officers_vice_president[$lang_num]?>: <?=$officers_vice_president_name[$lang_num]?></b><br /><br /><?=$officers_vice_president_arms_link[$lang_num]?><?=$officers_vice_president_bio[$lang_num]?>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td class="officers_td"><div class="officers_div"><a href="<?=$members_only_path?><?=$officers_secretary_image_large[$lang_num]?>" target="_blank" title="<?=$officers_image_title[$lang_num]?>"><img src="<?=$members_only_path?><?=$officers_secretary_image[$lang_num]?>" class="officers_portrait fade" alt="" /></a></div><b><?=$officers_secretary[$lang_num]?>: <?=$officers_secretary_name[$lang_num]?></b><br /><br /><?=$officers_secretary_arms_link[$lang_num]?><?=$officers_secretary_bio[$lang_num]?>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td class="officers_td"><div class="officers_div"><a href="<?=$members_only_path?><?=$officers_director1_image_large[$lang_num]?>" target="_blank" title="<?=$officers_image_title[$lang_num]?>"><img src="<?=$members_only_path?><?=$officers_director1_image[$lang_num]?>" class="officers_portrait fade" alt="" /></a></div><b><?=$officers_director1[$lang_num]?>: <?=$officers_director1_name[$lang_num]?></b><br /><br /><?=$officers_director1_arms_link[$lang_num]?><?=$officers_director1_bio[$lang_num]?>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td class="officers_td"><div class="officers_div"><a href="<?=$members_only_path?><?=$officers_director2_image_large[$lang_num]?>" target="_blank" title="<?=$officers_image_title[$lang_num]?>"><img src="<?=$members_only_path?><?=$officers_director2_image[$lang_num]?>" class="officers_portrait fade" alt="" /></a></div><b><?=$officers_director2[$lang_num]?>: <?=$officers_director2_name[$lang_num]?></b><br /><br /><?=$officers_director2_arms_link[$lang_num]?><?=$officers_director2_bio[$lang_num]?>
			</td>
		</tr>
		</table>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
