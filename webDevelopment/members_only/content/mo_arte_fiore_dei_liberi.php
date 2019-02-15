<?php
// 	Program: 	mo_fiore_dei_liberi.php
//	Description: 	a general overview of Fiore dei Liberi created Jan 2017.
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
$current_pgm = "mo_fiore_dei_liberi.php";
$menu_selected = "armizare";
$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();

// begin check if the browser is still in session with DBLogin
$check_session = $path_members."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session

//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $path_members."config/config.php"; include "$config";
$config_about = $path_members."config/content_mo_fiore_dei_liberi_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
shuffle($liberi);	// shuffle the Liberi images within the array to randomize the presentation of the folios on this page
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
shuffle($liberi);	// shuffle the Liberi images within the array to randomize the presentation of the folios on this page
?>
	<!-- begin page content -->
	<div id="main_content_mo">
		<h2><?=$title[$lang_num]?></h2>
		<div class="arte_fiore_dei_liberi_prologue">
			<div style="float:left;margin-bottom:10px;"><a href="../images/liberi/prologue.jpg" target="_blank" title="<?=$arte_fiore_dei_liberi_prologue_title[$lang_num]?>"><img src="../images/liberi/prologue.jpg" alt="" width="100%" class="fade box" /></a></div>
			<div style="float:left;" class="caption"><?=$arte_fiore_dei_liberi_caption[$lang_num]?></div>
		</div>
		<p><?=$arte_p1[$lang_num]?></p>
		<p><?=$arte_p2[$lang_num]?></p>
		<div class="arte_fiore_dei_liberi_premariacco">
			<div style="float:right;margin-bottom:10px;"><a href="http://www.comune.premariacco.ud.it" target="_blank" title="<?=$arte_premariacco_title[$lang_num]?>"><img src="../images/liberi/premariacco_arms.jpg" alt="" width="100%" class="fade" /></a></div>
			<div style="float:left;" class="caption"><?=$arte_premariacco_caption[$lang_num]?></div>
		</div>
		<p><?=$arte_p3[$lang_num]?></p>
		<p><?=$arte_p4[$lang_num]?></p>

		<p><hr width="30%" align="left" /><ol>
		<li><a name="1"></a><?=$arte_l1[$lang_num]?></li>
		<li><a name="2"></a><?=$arte_l2[$lang_num]?></li>
		<li><a name="3"></a><?=$arte_l3[$lang_num]?></li>
		<li><a name="4"></a><?=$arte_l4[$lang_num]?></li>
		</ol></p>

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
