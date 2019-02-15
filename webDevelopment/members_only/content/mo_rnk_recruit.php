<?php
ini_set('display_errors', 'On');
// 	Program: 	mo_rnk_recruit.php
//	Description: 	A members only detailed presentation of the rank of recruit, created July 03, 2017
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
$current_pgm = "mo_rnk_recruit.php";
$menu_selected = "training";
$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
// begin check if the browser is still in session with DBLogin
$check_session = $path_members."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $path_members."config/config.php"; include "$config";
$config_about = $path_members."config/content_mo_rnk_recruit_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$banner[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
		</div>
		<p><?=$rnk_p11[$lang_num]?></p>
		<p><?=$rnk_p12[$lang_num]?></p>
		<p><?=$rnk_p13[$lang_num]?></p>

		<h4><?=$title_p2[$lang_num]?></h4>
		<ul>
		<li><a name="21"></a><?=$rnk_l21[$lang_num]?></li>
		<li><a name="22"></a><?=$rnk_l22[$lang_num]?></li>
		<li><a name="23"></a><?=$rnk_l23[$lang_num]?></li>
		<li><a name="24"></a><?=$rnk_l24[$lang_num]?></li>
		<li><a name="25"></a><?=$rnk_l25[$lang_num]?></li>
		<li><a name="26"></a><?=$rnk_l26[$lang_num]?></li>
		<li><a name="27"></a><?=$rnk_l27[$lang_num]?></li>
		<li><a name="28"></a><?=$rnk_l28[$lang_num]?></li>
		</ul>

		<h4><?=$title_p3[$lang_num]?></h4>
		<p><?=$rnk_p3[$lang_num]?></p>
		<ul>
		<li><a name="31"></a><?=$rnk_l31[$lang_num]?></li>
		<li><a name="32"></a><?=$rnk_l32[$lang_num]?></li>
		<li><a name="33"></a><?=$rnk_l33[$lang_num]?></li>
		<li><a name="34"></a><?=$rnk_l34[$lang_num]?></li>
		<li><a name="35"></a><?=$rnk_l35[$lang_num]?></li>
		<li><a name="36"></a><?=$rnk_l36[$lang_num]?></li>
		</ul>

		<h4><?=$title_p4[$lang_num]?></h4>
		<ul>
		<li><?=$rnk_l4a[$lang_num]?>
			<ul>
			<li><a name="41"></a><?=$rnk_l41[$lang_num]?></li>
			<li><a name="42"></a><?=$rnk_l42[$lang_num]?></li>
			<li><a name="43"></a><?=$rnk_l43[$lang_num]?></li>
			<li><a name="44"></a><?=$rnk_l44[$lang_num]?></li>
			<li><a name="45"></a><?=$rnk_l45[$lang_num]?></li>
			<li><a name="46"></a><?=$rnk_l46[$lang_num]?></li>
			</ul>
		</li>
		<li><?=$rnk_l4b[$lang_num]?>
			<ul>
			<li><a name="51"></a><?=$rnk_l51[$lang_num]?></li>
			<li><a name="52"></a><?=$rnk_l52[$lang_num]?></li>
			<li><a name="53"></a><?=$rnk_l53[$lang_num]?>
				<ul>
				<li><a name="54"></a><?=$rnk_l54[$lang_num]?></li>
				<li><a name="55"></a><?=$rnk_l55[$lang_num]?></li>
				<li><a name="56"></a><?=$rnk_l56[$lang_num]?></li>
				</ul>
			</li>
			<li><a name="57"></a><?=$rnk_l57[$lang_num]?></li>
			<li><a name="58"></a><?=$rnk_l58[$lang_num]?></li>
			</ul>
		</li>
		</ul>

		<h4><?=$title_p6[$lang_num]?></h4>
		<ul>
		<li><a name="61"></a><?=$rnk_l61[$lang_num]?></li>
		<li><a name="62"></a><?=$rnk_l62[$lang_num]?></li>
		<li><a name="63"></a><?=$rnk_l63[$lang_num]?></li>
		<li><a name="64"></a><?=$rnk_l64[$lang_num]?></li>
		</ul>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
