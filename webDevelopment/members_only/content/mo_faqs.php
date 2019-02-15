<?php
// 	Program: 	mo_faqs.php
//	Description: 	frequently asked questions, which include questions about AEMMA internal - created Dec 2017.
//	Author:		David M. Cvet
//
//	2019 ------------------
//	jan 25:	standardized path names
//
$lang = "en";
$modal = 0;					// no need for modal popups as there are no database operations in this script
$lang_num = 0;
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories
$current_pgm = "mo_faqs.php";
$root_path = "../../";
$menu_selected = "AEMMA";

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
// begin check if the browser is still in session with DBLogin
$check_session = $path_members."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $path_members."config/config.php"; include "$config";
$config_about = $path_members."config/content_mo_faqs_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
  <script src="<?=$root_path?>js-bin/jquery.min_v1.9.1.js"></script>
  <link rel="stylesheet" href="<?=$root_path?>css/faq_style.css">
  <script src="<?=$root_path?>js-bin/faq_accordion.js"></script>
<?php
include "../php-bin/header2.php";
?>
	<!-- begin page content -->
	<div id="main_content">
		<h2><img src="../images/icons/help.png" alt="" style="vertical-align:middle;" /> <?=$title[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;margin-bottom:10px;"><img src="../images/coatofarms/armorialBearings_CHA_230.jpg" alt="" width="100%"  /></div>
			<div style="float:left;" class="caption"><?=$about_aemma_arms_caption[$lang_num]?></div>
		</div>
		<p><?=$faq_intro[$lang_num]?></p>
		<div id="accordion">
			<h4 class="accordion-toggle">Q. <?=$faq_q1[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a1[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q2[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a2[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q3[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a3[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q4[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a4[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q5[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a5[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q6[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a6[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q7[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a7[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q8[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a8[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q9[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a9[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q10[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a10[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q11[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a11[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q12[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a12[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q13[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a13[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q14[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a14[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q15[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a15[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q16[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a16[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q17[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a17[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q18[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a18[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q19[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a19[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q20[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a20[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q21[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a21[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q22[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a22[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q23[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a23[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q24[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a24[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q25[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a25[$lang_num]?></p></div>

			<h4 class="accordion-toggle">Q. <?=$faq_q26[$lang_num]?></h4>
			<div class="accordion-content"><p><b>A. </b><?=$faq_a26[$lang_num]?></p></div>

		</div>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
