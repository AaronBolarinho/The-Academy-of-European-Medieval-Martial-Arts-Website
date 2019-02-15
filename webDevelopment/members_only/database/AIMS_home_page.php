<?php
ini_set('display_errors','On');
//
// Program: AIMS_home_page.php
// Author: David M. Cvet
// Created: Apr 03, 2016
// Description:
//	The "home page" for database administration.
//	The program flow: admin_login_MIMS.php ==> database/Begin.php ==> Login.php (& DB.php) ==> AIMS_home_page.php
//---------------------------
// Updates:
//	2019 ------------------
//	jan 25:	standardized path names
//
$aims = 1;	// flag to indicate that we are now in the AIMS database system, so the menu bar needs to be expanded by the AIMS menu item
$lang = "en";
$lang_num = 0;
$modal = 0;	// disable the modal code in members_only_header2.php as no modals needed for this script
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories calling script
$current_pgm = "AIMS_home_page.php";
$menu_selected = "AIMS";

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
// test to determine if the initial database login session remains intact or the session has timed out before attempting to connect with the database
$session_expiration = $path_members."php-bin/sub_check_session_expiration.php"; include "$session_expiration";

//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

include "config/config.php";
$config = $path_members."config/config.php"; include "$config";
$login_AIMS = $path_dbase."config/AIMS_home_page_$lang.php"; include "$login_AIMS";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
echo ('<script type="text/javascript" src="../../js-bin/beep.js"></script>');
$full_date= date("F j, Y");
//echo ('debug:AIMS_home_page.php"29:gims="'.$aims.'"');	
?>
  <script src="js-bin/jquery.min_v1.9.1.js"></script>
  <script src="js-bin/ResponsiveSlides.min.js"></script>
  <script>
	$(function () {
	// Slideshow
	$(".rslides1").responsiveSlides({
		// ** notes: default settings in ResponsiveSlides.min.js **
		//"auto": true, 		// Boolean: Animate automatically, true or false
		//"speed": 500, 		// Integer: Speed of the transition, in milliseconds
		//"timeout": 4000, 		// Integer: Time between slide transitions, in milliseconds
		//"pager": false, 		// Boolean: Show pager, true or false
		//"nav": false, 		// Boolean: Show navigation, true or false
		//"random": false, 		// Boolean: Randomize the order of the slides, true or false
		//"pause": false, 		// Boolean: Pause on hover, true or false
		//"pauseControls": true,	// Boolean: Pause when hovering controls, true or false
		//"prevText": "Previous", 	// String: Text for the "previous" button
		//"nextText": "Next", 		// String: Text for the "next" button
		//"maxwidth": "", 		// Integer: Max-width of the slideshow, in pixels
		//"navContainer": "", 		// Selector: Where auto generated controls should be appended to, default is after the <ul>
		//"manualControls": "", 	// Selector: Declare custom pager navigation
		//"namespace": "rslides", 	// String: change the default namespace used
		//"before": $.noop, 		// Function: Before callback
		//"after": $.noop 		// Function: After callback

		// ** revised settings
		speed: 2000,
		timeout: 7500,
		maxwidth: 550,
		random: true
		});
	});
  </script>
<?php
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
// initialize SQL variables
$loginID 	= 0;
$recruits 	= 0;
$scholars 	= 0;
$free_scholars 	= 0;
$provosts 	= 0;
$archery 	= 0;
$total_active 	= 0;

$armigerous 	= 0;
$honourary_count = 0;
$inactive 	= 0;
$resigned 	= 0;
$suspended 	= 0;
$lost		= 0;
$deceased 	= 0;
$archery_inactive = 0;
$totals_other1 	= 0;
$totals_other2 	= 0;
$total_dbrecords = 0;
$male_count 	= 0;
$female_count 	= 0;
$gender_unknown = 0;
$ROM 		= 0;
$ROM_grads 	= 0;
$AEMMA 		= 0;
$AEMMA_grads 	= 0;
$ROM_archery	= 0;
$total_programs	= 0;
include "sub_AIMS_home_page.php";
?>
	<!-- begin main content -->
	<div id="main_content_AIMS">
		<div class="database_image">
			<div style="float:left;width:100%;">			
				<ul class="rslides rslides1">
      				<li><img src="images/icons/database_opened_1.png" alt="" /></li>
      				<li><img src="images/icons/database_opened_2.png" alt="" /></li>
     				<li><img src="images/icons/database_opened_3.png" alt="" /></li>
     				</ul>
			</div>
			<div style="float:left;width:100%;margin-top:8px;text-align:center;"><span class="caption"><b>AIMS</b> (<span style="color:green;"><?=$AIMS_caption[$lang_num]?></span>)</span></div>
		</div>
		<h3><?=$title[$lang_num]?></h3>
		<p><?=$p1[$lang_num]?><br /></p>
		<div align="center"><table class="AIMS_home_page_table box"><tr class="tr_text"><td><table cellpadding="3" style="border-radius:15px;background-color:white;width:100%;">
		<tr class="tr_text">
<?php
$colspan = $num_array_chapters + 2;
echo ('	<td colspan="'.$colspan.'" style="background-color:#b1b1b1;border-top-left-radius:15px;border-top-right-radius:15px;" align="center"><b>'.$quick_stats[$lang_num].': '.$full_date.'</b></td>');
?>
		</tr>
		<tr class="tr_text">
			<td bgcolor="green" colspan="<?=$colspan?>" align="center"><font color="white"><b><?=$heading_active[$lang_num]?></b></font></td>
		</tr>
		<tr class="tr_text">
			<td bgcolor="purple"><font color="white"><b>&nbsp;<?=$heading_rank[$lang_num]?></b></font></td>
<?php
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td bgcolor="purple"><font color="white"><b>'.$chapter_ID[$i].'</b></font></td>');
		}
echo ('
	<td bgcolor="purple"><font color="white"><b>'.$heading_number[$lang_num].'</b></font></td>
		</tr>
<tr class="tr_text" class="tr_text">
	<td>&nbsp;<a href="rep_active_members.php?RNKID=1" target="_top">Recruit</a></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%">'.$chapter_tally_recruits[$i].'</td>');
		}
echo ('
	<td>&nbsp;<a href="rep_active_members.php?RNKID=1" target="_top">'.$recruits.'</a></td>
</tr>
<tr class="tr_text" style="background-color:lightgray;">
	<td>&nbsp;<a href="rep_active_members.php?RNKID=2" target="_top">Scholar</a></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%">'.$chapter_tally_scholars[$i].'</td>');
		}
echo ('
	<td>&nbsp;<a href="rep_active_members.php?RNKID=2" target="_top">'.$scholars.'</a></td>
</tr>
<tr class="tr_text">
	<td>&nbsp;<a href="rep_active_members.php?RNKID=3" target="_top">Free Scholar</a></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%">'.$chapter_tally_free_scholars[$i].'</td>');
		}
echo ('
	<td>&nbsp;<a href="rep_active_members.php?RNKID=3" target="_top">'.$free_scholars.'</a></td>
</tr>
<tr class="tr_text" style="background-color:lightgray;">
	<td>&nbsp;<a href="rep_active_members.php?RNKID=4" target="_top">Provost</a></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%">'.$chapter_tally_provosts[$i].'</td>');
		}
echo ('
	<td>&nbsp;<a href="rep_active_members.php?RNKID=4" target="_top">'.$provosts.'</a></td>
</tr>
<tr class="tr_text" style="background-color:lightgray;">
	<td>&nbsp;<a href="rep_active_members.php?RNKID=10" target="_top">Traditional Archery</a></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%">'.$chapter_tally_archery[$i].'</td>');
		}
echo ('
	<td>&nbsp;<a href="rep_active_members.php?RNKID=4" target="_top">'.$archery.'</a></td>
</tr>
<tr class="tr_text" style="background-color:#FFF380;">
	<td>&nbsp;<b>'.$heading_total_active[$lang_num].'</b></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%"><b>'.$chapter_tally[$i].'</b></td>');
		}
echo ('
	<td>&nbsp;<b>'.$total_active.'</b></td>
</tr>
<tr class="tr_text">
	<td bgcolor="purple" align="center"><font color="white"><b>'.$heading_other[$lang_num].'</b></font></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td bgcolor="purple"><font color="white"><b>'.$chapter_ID[$i].'</b></font></td>');
		}
echo ('
	<td bgcolor="purple"><font color="white"><b>'.$heading_number[$lang_num].'</b></font></td>
</tr>
<tr class="tr_text">
	<td>&nbsp;<a href="rep_armigerous_members.php" target="_top">Armigerous</a>&nbsp;<font class="footer"><i>(members who bear an assumed or grant of arms)</i></font></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%"><b>'.$chapter_tally_armigerous[$i].'</b></td>');
		}
echo ('
	<td>&nbsp;<a href="rep_armigerous_members.php" target="_top">'.$armigerous.'</a></td>
</tr>
<tr class="tr_text" style="background-color:lightgray;">
	<td>&nbsp;<a href="rep_other_members.php?RNKID=77" target="_top">Honourary</a> <font class="footer"><i>(individuals who have served AEMMA as Patrons, or advisors, etc.)</i></font></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%"><b>'.$chapter_tally_honourary[$i].'</b></td>');
		}
echo ('
	<td>&nbsp;<a href="rep_other_members.php?RNKID=77" target="_top">'.$honourary_count.'</a></td>
</tr>
<tr class="tr_text">
	<td>&nbsp;<a href="rep_other_members.php?MEMSTAT=3&RNKID=10" target="_top">Traditional Archery</a> <font class="footer"><i>(Inactive)</font></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%"><b>'.$chapter_tally_archery_inactive[$i].'</b></td>');
		}
echo ('
	<td>&nbsp;<a href="rep_other_members.php?MEMSTAT=3&RNKID=10" target="_top">'.$archery_inactive.'</a></td>
</tr>
<tr class="tr_text" style="background-color:lightgray;">
	<td>&nbsp;<a href="rep_other_members.php?MEMSTAT=3" target="_top">Inactive</a></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%"><b>'.$chapter_tally_inactive[$i].'</b></td>');
		}
echo ('
	<td>&nbsp;<a href="rep_other_members.php?MEMSTAT=3" target="_top">'.$inactive.'</a></td>
</tr>
<tr class="tr_text">
	<td>&nbsp;<a href="rep_other_members.php?MEMSTAT=4" target="_top">Resigned</a></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%"><b>'.$chapter_tally_resigned[$i].'</b></td>');
		}
echo ('
	<td>&nbsp;<a href="rep_other_members.php?MEMSTAT=4" target="_top">'.$resigned.'</a></td>
</tr>
<tr class="tr_text" style="background-color:lightgray;">
	<td>&nbsp;<a href="rep_other_members.php?MEMSTAT=5" target="_top">Lost</a> <font class="footer"><i>(individuals who have no viable contact information in AIMS, they are in effect, inactive)</i></font></</td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%"><b>'.$chapter_tally_lost[$i].'</b></td>');
		}
echo ('
	<td>&nbsp;<a href="rep_other_members.php?MEMSTAT=5" target="_top">'.$lost.'</a></td>
</tr>
<tr class="tr_text">
	<td>&nbsp;<a href="rep_other_members.php?MEMSTAT=6" target="_top">Suspended</a></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%"><b>'.$chapter_tally_suspended[$i].'</b></td>');
		}
echo ('
	<td>&nbsp;<a href="rep_other_members.php?MEMSTAT=6" target="_top">'.$suspended.'</a></td>
</tr>
<tr class="tr_text" style="background-color:lightgray;">
	<td>&nbsp;<a href="rep_other_members.php?MEMSTAT=7" target="_top">Deceased</a></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%"><b>'.$chapter_tally_deceased[$i].'</b></td>');
		}
$colspan_other = $num_array_chapters;

echo ('
	<td>&nbsp;<a href="rep_other_members.php?MEMSTAT=7" target="_top">'.$deceased.'</a></td>
</tr>
<tr class="tr_text" style="background-color:#FFF380;">
	<td>&nbsp;<b>'.$heading_totals_other1[$lang_num].'</b></td>');
	for ($i=1;$i<$num_array_chapters;$i++)
		{
		echo ('<td width="4%"><b>'.$chapter_tally[$i].'</b></td>');
		}
echo ('
	<td>&nbsp;<b>'.$totals_other1.'</b></td>
</tr>
<tr class="tr_text">
	<td colspan="'.$colspan_other.'">&nbsp;<a href="rep_other_members.php?RNKID=21" target="_top">ROM Swordmanship Program</a> <font class="footer"><i>(all individuals who had taken the ROM swordsmanship program)</i></font></td>
	<td>&nbsp;<a href="rep_other_members.php?RNKID=21" target="_top">'.$ROM.'</a></td>
</tr>
<tr class="tr_text" style="background-color:lightgray;">
	<td colspan="'.$colspan_other.'">&nbsp;<a href="rep_other_members.php?RNKID=211" target="_top">ROM => AEMMA</a> <font class="footer"><i>(graduates of the ROM program who are now AEMMA students)</i></font></td>
	<td>&nbsp;<a href="rep_other_members.php?RNKID=211" target="_top">'.$ROM_grads.'</a></td>
</tr>
<tr class="tr_text">
	<td colspan="'.$colspan_other.'">&nbsp;<a href="rep_other_members.php?RNKID=22" target="_top">AEMMA Intro Program</a> <font class="footer"><i>(all individuals who had taken the AEMMA Intro program)</i></font></td>
	<td>&nbsp;<a href="rep_other_members.php?RNKID=22" target="_top">'.$AEMMA.'</a></td>
</tr>
<tr class="tr_text" style="background-color:lightgray;">
	<td colspan="'.$colspan_other.'">&nbsp;<a href="rep_other_members.php?RNKID=221" target="_top">AEMMA => AEMMA</a> <font class="footer"><i>(graduates of the AEMMA Intro program who are now AEMMA students)</i></td>
	<td>&nbsp;<a href="rep_other_members.php?RNKID=221" target="_top">'.$AEMMA_grads.'</a></td>
</tr>
<tr class="tr_text">
	<td colspan="'.$colspan_other.'">&nbsp;<a href="rep_other_members.php?RNKID=23" target="_top">ROM/AEMMA Archery Program</a> <font class="footer"><i>(all individuals who had taken the ROM or AEMMA archery program)</i></font></td>
	<td>&nbsp;<a href="rep_other_members.php?RNKID=23" target="_top">'.$ROM_archery.'</a></td>
</tr>
<tr class="tr_text" style="background-color:#FFF380;">
	<td colspan="'.$colspan_other.'">&nbsp;<b>'.$heading_totals_other2[$lang_num].'</b></td>
	<td>&nbsp;<b>'.$total_programs.'</b></td>
</tr>
<tr class="tr_text" background="images/backgroundColor_eeeeee.jpg">
	<td colspan="'.$colspan_other.'">&nbsp;<a href="rep_other_members.php?SX=M" target="_top">Male members</a> <font class="footer"><i>(both inactive and active statuses)</i></font>&nbsp;<b>'.round($percent_male,2).'%</b></td>
	<td>&nbsp;<a href="rep_other_members.php?SX=M" target="_top">'.$male_count.'</a></td>
</tr>
<tr class="tr_text" style="background-color:lightgray;">
	<td colspan="'.$colspan_other.'">&nbsp;<a href="rep_other_members.php?SX=F" target="_top">Female members</a> <font class="footer"><i>(both inactive and active statuses)</i></font>&nbsp;<b>'.round($percent_female,2).'%</b></td>
	<td>&nbsp;<a href="rep_other_members.php?SX=F" target="_top">'.$female_count.'</a></td>
</tr>
<tr class="tr_text">
	<td colspan="'.$colspan_other.'">&nbsp;<a href="rep_other_members.php?SX=U" target="_top">Gender Unknown</a> <font class="footer"><i>(both inactive and active statuses)</i></font></td>
	<td>&nbsp;<a href="rep_other_members.php?SX=U" target="_top">'.$gender_unknown.'</a></td>
</tr>

<tr class="tr_text" background="images/backgroundColor_eeeeee.jpg">
	<td style="background-color:blue;border-bottom-left-radius:15px;color:white;" colspan="'.$colspan_other.'"><b>&nbsp;'.$heading_total_dbase[$lang_num].'</b></td>
	<td style="background-color:blue;border-bottom-right-radius:15px;color:white;"><b>&nbsp;'.$total_dbrecords.'</b></td>
</tr>
</table></td></tr></table></div><br />

<blockquote><h3>'.$notes_title[$lang_num].'</h3>
<ol>
<li>'.$notes_l1[$lang_num].'</li>
<li>'.$notes_l2[$lang_num].'</li>
<li>'.$notes_l3[$lang_num].'</li>
<li>'.$notes_l4[$lang_num].'</li>
<li>'.$notes_l5[$lang_num].'</li>
<li>'.$notes_l6[$lang_num].'</li>
</ol></blockquote>
<br /></div>
');
//	<!-- being footer -->
	include "../php-bin/footer.php";
//	<!-- end footer
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
