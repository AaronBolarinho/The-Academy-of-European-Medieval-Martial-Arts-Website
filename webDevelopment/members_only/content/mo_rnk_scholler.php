<?php
ini_set('display_errors', 'On');
// 	Program: 	mo_rnk_scholler.php
//	Description: 	A members only detailed presentation of the rank of scholler, created July 03, 2017
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
$current_pgm = "mo_rnk_scholler.php";
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
$config_about = $path_members."config/content_mo_rnk_scholler_$lang.php"; include "$config_about";
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

		<h4><?=$title_p2[$lang_num]?></h4>
		<ul>
		<li><a name="21"></a><?=$rnk_l21[$lang_num]?></li>
		<li><a name="22"></a><?=$rnk_l22[$lang_num]?>
			<ul>
			<li><a name="23"></a><?=$rnk_l23[$lang_num]?></li>
			<li><a name="24"></a><?=$rnk_l24[$lang_num]?></li>
<!--			<li><a name="25"></a><?=$rnk_l25[$lang_num]?></li>
			<li><a name="26"></a><?=$rnk_l26[$lang_num]?></li>
			<li><a name="27"></a><?=$rnk_l27[$lang_num]?></li>
-->
			</ul>
		</li>		
<!--
		<li><a name="28"></a><?=$rnk_l28[$lang_num]?></li>
		<li><a name="29"></a><?=$rnk_l29[$lang_num]?></li>
		<li><a name="210"></a><?=$rnk_l210[$lang_num]?></li>
		<li><a name="211"></a><?=$rnk_l211[$lang_num]?></li>
		<li><a name="212"></a><?=$rnk_l212[$lang_num]?></li>
		<li><a name="213"></a><?=$rnk_l213[$lang_num]?></li>
		<li><a name="214"></a><?=$rnk_l214[$lang_num]?></li>
-->
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
		<li><a name="310"></a><?=$rnk_l310[$lang_num]?></li>
		<li><a name="311"></a><?=$rnk_l311[$lang_num]?></li>
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
			<li><a name="53"></a><?=$rnk_l53[$lang_num]?></li>
			<li><a name="54"></a><?=$rnk_l54[$lang_num]?></li>
			<li><a name="55"></a><?=$rnk_l55[$lang_num]?></li>
			<li><a name="56"></a><?=$rnk_l56[$lang_num]?></li>
			<li><a name="57"></a><?=$rnk_l57[$lang_num]?></li>
			<li><a name="58"></a><?=$rnk_l58[$lang_num]?>
				<ul>
				<li><a name="59"></a><?=$rnk_l59[$lang_num]?></li>
				<li><a name="510"></a><?=$rnk_l510[$lang_num]?></li>
				<li><a name="511"></a><?=$rnk_l511[$lang_num]?></li>
				</ul>
			</li>
			<li><a name="512"></a><?=$rnk_l512[$lang_num]?></li>
			</ul>
		</li>
		</ul>

		<h4><?=$title_p6[$lang_num]?></h4>
		<ul>
		<li><a name="61"></a><?=$rnk_l61[$lang_num]?></li>
		<li><a name="62"></a><?=$rnk_l62[$lang_num]?></li>
		<li><a name="63"></a><?=$rnk_l63[$lang_num]?></li>
		<li><a name="64"></a><?=$rnk_l64[$lang_num]?></li>
		<li><a name="65"></a><?=$rnk_l65[$lang_num]?></li>
		<li><a name="66"></a><?=$rnk_l66[$lang_num]?></li>
		</ul>

		<h4><?=$title_p7[$lang_num]?></h4>
		<p><?=$rnk_p71[$lang_num]?></p>
		<p><?=$rnk_p72[$lang_num]?></p>
		<table>
		<tr>
			<td style="vertical-align:middle;"><a href="http://www.heraldry.ca" target="_blank"><img src="../images/arms_rhsc.jpg" class="fade" width="80" border="0" alt="" /></a></td>
			<td><?=$rnk_row11[$lang_num]?>
			<p><?=$rnk_row12[$lang_num]?></p>
			<p><?=$rnk_row13[$lang_num]?></p></td>
		</tr>
		<tr><td colspan="2"><hr width="50%" /><br />&nbsp;</td></tr>
		<tr>
			<td style="vertical-align:middle;"><a href="http://www.gg.ca/heraldry" target="_blank"><img src="../images/arms_cha.jpg" class="fade" width="90" border="0" alt="" /></a></td>
			<td><?=$rnk_row21[$lang_num]?>
			<p><?=$rnk_row22[$lang_num]?></p></td>
		</tr>
		<tr><td colspan="2"><hr width="50%" /><br />&nbsp;</td></tr>
		<tr>
			<td style="vertical-align:middle;"><a href="http://www.amateurheralds.org" target="_blank"><img src="../images/arms_iaah.jpg" class="fade" width="75" border="0" alt="" /></a><br />&nbsp;</td>
			<td><?=$rnk_row31[$lang_num]?>  
			<p><?=$rnk_row32[$lang_num]?></p></td>
		</tr>
		</table>
		<p><?=$rnk_final[0]?></p>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
