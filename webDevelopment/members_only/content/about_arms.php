<?php
ini_set('display_errors', 'On');
// 	Program: 	about_arms.php
//	Description: 	About the Academy, created April 21, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
$lang = "en";
$modal = 0;					// no need for modal popups as there are no database operations in this script
$lang_num = 0;
$members_only_path = "../";			// the location of the members only scripts and files with respect to this calling script
$dbase_path = $path = "../database/";		// the location of the database scripts and files with respect to this calling script
$current_pgm = "about_arms.php";
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
$config_about = $members_only_path."config/content_about_arms_$lang.php"; include "$config_about";
$header = $members_only_path."php-bin/members_only_header.php"; include "$header";
$header2 = $members_only_path."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<h3><?=$title_p1[$lang_num]?></h3>
		<div class="arms_image_arms">
			<div style="float:left;margin-bottom:10px;"><a href="../images/coatofarms/aemma_arms_large.jpg" target="_blank" title="armorial bearings"><img src="../images/coatofarms/aemma_arms_400_transparent.png" alt="" width="100%" class="fade" /></a></div>
			<div style="float:left;" class="caption"><?=$aemma_arms_caption[$lang_num]?></div>
		</div>
		<div class="arms_paragraph_1">
			<p><?=$arms_p1_1[$lang_num]?></p>
			<p><?=$arms_p1_2[$lang_num]?></p>
		</div>
		<div class="arms_image_evolution">
			<div style="float:left;margin-left:15px;"><a href="../images/coatofarms/arms_evolution.png" target="_blank" title="armorial evolution"><img src="../images/coatofarms/arms_evolution.png" alt="" width="100%" class="fade" /></a></div>
			<div style="float:left;" class="caption"><?=$aemma_arms_evolution_caption[$lang_num]?></div>
		</div>


		<div class="arms_paragraph_2">
			<h3><?=$title_p2[$lang_num]?></h3>
			<div class="history_image_left">
				<div style="float:left;margin-bottom:10px;"><a href="../images/AEMMA_first_draft_coat_of_arms_1998.png" target="_blank"><img src="../images/arms_1998.png" alt="" width="100%" class="fade" title="click to view expanded image of <?=$caption_first_arms[$lang_num]?>" /></a></div>
				<div style="float:left;" class="caption"><?=$caption_first_arms[$lang_num]?></div>
			</div>
			<p><?=$arms_p2_1[$lang_num]?></p>
		</div>
		<div class="arms_paragraph_3">
			<h3><?=$title_p3[$lang_num]?></h3>
			<p><?=$arms_p3_1[$lang_num]?></p>

			<p><hr width="30%" align="left" /><ol>
			<li><a name="1"></a><?=$arms_l1[$lang_num]?></li>
			<li><a name="2"></a><?=$arms_l2[$lang_num]?></li>
			<li><a name="3"></a><?=$arms_l3[$lang_num]?></li>
			<li><a name="4"></a><?=$arms_l4[$lang_num]?></li>
			</ol></p>
		</div>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
