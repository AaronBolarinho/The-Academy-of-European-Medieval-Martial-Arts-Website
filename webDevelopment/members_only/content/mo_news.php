<?php
ini_set('display_errors', 'On');
// 	Program: 	mo_news.php
//	Description: 	news - newspaper, articles, etc., created Dec 10, 2017
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
$current_pgm = "mo_news.php";
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
$config_about = $path_members."config/content_mo_news_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main_content -->
	<div id="main_content_mo">
		<h2><img src="../images/icons/news.png" alt="news about AEMMA" style="vertical-align:middle;" /> <?=$title[$lang_num]?>&nbsp;<i>2000</i></h2>

		<div class="anim_box news_panel">
			<a href=""><div class="news_50"><div class="news_headline_alt">Ca c'est pass&eacute; - Historie M&eacute;di&eacute;vale<br /><span class="news_date_alt">&#8212;&#8212;&#8212; December, 2000</span></div></div></a>
			<a href=""><div class="news_50"><div class="news_headline">Serious swordplay - Press Herald, Maine<br /><span class="news_date">&#8212;&#8212;&#8212; November 13, 2000</span></div></div>	</a>
		</div>

		<div class="anim_box news_panel">
			<a href="">
			<div class="news_60"><img src="../images/news/global_news_2000.png" width="100%" alt="global news" /></div>
			<div class="news_40"><div class="news_headline">2nd International Western Martial Arts Workshop, Toronto<br /><span class="news_date">&#8212;&#8212;&#8212; October 14, 2000</span></div></div>
			</a>
		</div>

		<div class="anim_box news_panel">
			<a href="">
			<div class="news_40"><div class="news_headline">Once a knight - Toronto man on a mission to resurrect medieval swordsmanship<br /><span class="news_date">&#8212;&#8212;&#8212; October 2, 2000</span></div></div>
			<div class="news_60"><img src="../images/news/toronto_star_2000.png" width="100%" alt="toronto star" /></div>
			</a>
		</div>

		<div class="anim_box news_panel">
			<a href="">
			<div class="news_60"><img src="../images/news/national_post_2000.png" width="100%" alt="national post" /></div>
			<div class="news_40"><div class="news_headline">Serious Swordplay - Toronto group hopes to turn medieval fighting techniques into a proper martial art<br /><span class="news_date">&#8212;&#8212;&#8212; August 12, 2000</span></div></div>
			</a>
		</div>

		<div style="margin-bottom:20px;" class="news_panel anim_box">
			<a href="">
			<div class="news_40"><div class="news_headline">Medieval artists live by the sword - A presentation at the Welland Civic Centre<br /><span class="news_date">&#8212;&#8212;&#8212; March 20, 2000</span></div></div>
			<div class="news_60"><img src="../images/news/tribune_2000.png" width="100%" alt="welland tribune" /></div>
			</a>
		</div>

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
