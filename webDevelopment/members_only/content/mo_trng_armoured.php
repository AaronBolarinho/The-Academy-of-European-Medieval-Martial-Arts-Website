<?php
// 	Program: 	mo_trng_armoured.php
//	Description: 	Armoured training page, created January 16, 2017
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
$current_pgm = "mo_trng_armoured.php";
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
$config_about = $path_members."config/content_mo_trng_armoured_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
shuffle($liberi);	// shuffle the Liberi images within the array to randomize the presentation of the folios on this page
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
$i = rand(0,9);		// randomize the armoured photos just to add a little spice to the page
$armoured_image[$lang_num] = $armoured_photo[$i];
$armoured_image_caption[$lang_num] = $armoured_photo_caption[$i];
?>
	<!-- begin main_content -->
	<div id="main_content_mo">
		<h2><?=$title[$lang_num]?>&nbsp;<img src="<?=$path?>images/training/armoured.png" alt="" style="vertical-align:middle;" /></h2>
		<h3><?=$title_1[$lang_num]?></h3>
		<p><?=$trng_1_p1[$lang_num]?></p>
		<div style="float:left;width:100%;text-align:center;">
			<div class="arte_fola"><img src="../images/training/<?=$liberi[0]?>" alt="" width="100%" class="box" /></div>
			<div class="arte_fola"><img src="../images/training/<?=$liberi[1]?>" alt="" width="100%" class="box"  /></div>
			<div class="arte_folb"><img src="../images/training/<?=$liberi[2]?>" alt="" width="100%" class="box"  /></div>
			<div class="arte_folb"><img src="../images/training/<?=$liberi[3]?>" alt="" width="100%" class="box"  /></div>
			<div class="arte_folc"><img src="../images/training/<?=$liberi[4]?>" alt="" width="100%" class="box"  /></div>
			<div style="float:left;width:100%;margin-top:15px;margin-bottom:20px;" class="caption"><?=$about_trng_caption[$lang_num]?></div>
		</div>
		<div class="trng_poleweapons">
			<div style="float:left;"><a href="../images/training/<?=$armoured_image[$lang_num]?>" title="armoured combat with poleaxe"><img src="../images/training/<?=$armoured_image[$lang_num]?>" alt="" width="100%" class="fade box" /></a></div>
			<div style="float:left;margin-top:15px;margin-bottom:15px;" class="caption"><?=$armoured_image_caption[$lang_num]?></div>
		</div>
		<p><?=$trng_1_p2[$lang_num]?></p>
		<p><?=$trng_1_p3[$lang_num]?></p>

		<p><hr width="30%" align="left" /><ol>
		<li><a name="1"></a><?=$trng_l1[$lang_num]?></li>
		<li><a name="2"></a><?=$trng_l2[$lang_num]?></li>
		<li><a name="3"></a><?=$trng_l3[$lang_num]?></li>
		</ol></p>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
