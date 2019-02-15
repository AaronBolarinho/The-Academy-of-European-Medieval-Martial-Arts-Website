<?php
ini_set('display_errors', 'On');
// 	Program: 	mo_rnk_provost.php
//	Description: 	A members only detailed presentation of the rank of provost, created July 10, 2017
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
$current_pgm = "mo_rnk_provost.php";
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
$config_about = $path_members."config/content_mo_rnk_provost_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
?>
<script type="text/JavaScript">
// global variables
//
var window_maisterOthe
var window_provostOthe
var testWindow

function schollerTest()
{
if (!testWindow || testWindow.closed)
	{
	// window has not been opened - first invokation
	testWindow = window.open("schollerTest.htm","test","toolbar=no,menubar=no,scrollbars=yes,height=465,width=530")
	}
else
	{
	// window is opened somewhere, bring it into focus
	testWindow.close()
	testWindow = window.open("schollerTest.htm","test","toolbar=no,menubar=no,scrollbars=yes,height=465,width=530")
	}
} // end function schollerTest
function maisterOthe()
{
if (!window_maisterOthe || window_maisterOthe.closed)
	{window_maisterOthe = window.open("maisterOthe.htm","window_maisterOthe","toolbar=no,menubar=no,scrollbars=yes,height=450,width=600")}
else
	{window_maisterOthe.focus()}
} // end function maisterOthe 
function provostOthe()
{
if (!window_provostOthe || window_provostOthe.closed)
	{window_provostOthe = window.open("provostOthe.htm","window_provostOthe","toolbar=no,menubar=no,scrollbars=yes,height=450,width=600")}
else
	{window_provostOthe.focus()}
} // end function provostOthe 
</script>
<?php
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
		<li><a name="29"></a><?=$rnk_l29[$lang_num]?></li>
		<li><a name="210"></a><?=$rnk_l210[$lang_num]?>
		<ul>			
			<li><a name="211"></a><?=$rnk_l211[$lang_num]?></li>
			<li><a name="212"></a><?=$rnk_l212[$lang_num]?></li>
			<li><a name="213"></a><?=$rnk_l213[$lang_num]?></li>
			<li><a name="214"></a><?=$rnk_l214[$lang_num]?></li>
			<li><a name="215"></a><?=$rnk_l215[$lang_num]?></li>
		</ul></li>
		<li><a name="216"></a><?=$rnk_l216[$lang_num]?></li>
		<li><a name="217"></a><?=$rnk_l217[$lang_num]?></li>
		</ul>

		<h4><?=$title_p3[$lang_num]?></h4>
		<ul>
		<li><a name="31"></a><?=$rnk_l31[$lang_num]?></li>
		<li><a name="32"></a><?=$rnk_l32[$lang_num]?></li>
		<li><a name="33"></a><?=$rnk_l33[$lang_num]?></li>
		<li><a name="34"></a><?=$rnk_l34[$lang_num]?></li>
		<li><a name="35"></a><?=$rnk_l35[$lang_num]?></li>
		<li><a name="36"></a><?=$rnk_l36[$lang_num]?></li>
		<li><a name="37"></a><?=$rnk_l37[$lang_num]?></li>
		<li><a name="38"></a><?=$rnk_l38[$lang_num]?></li>
		<li><a name="39"></a><?=$rnk_l39[$lang_num]?></li>
		</ul>

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
