<?php
// 	Program: 	mo_trng_intro_armizare.php
//	Description: 	An overview page of the intro to armizare training program, start and end times and fee is defined in config.php
//			created January 10, 2017
//	Author:		David M. Cvet
//
//	2019 ------------------
//	jan 25:	standardized path names
//
$lang = "en";
$modal = 0;					// no need for modal popups as there are no database operations in this script
$lang_num = 0;
$current_pgm = "mo_trng_intro_armizare.php";
$menu_selected = "training";
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories
$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();

// begin check if the browser is still in session with DBLogin
$check_session = $path_members."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session

//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $path_members."config/config.php"; include "$config";
$config_about = $path_members."config/content_mo_trng_intro_armizare_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
?>
<script type="text/JavaScript">
var mygallery=new fadeSlideShow({
	wrapperid: "fadeshowIntro",
	dimensions: [400, 250],
	imagearray: [
		["../../images/intro/intro_1.jpg", "", "", ""],
		["../../images/intro/intro_2.jpg", "", "", ""],
		["../../images/intro/intro_3.jpg", "", "", ""],
		["../../images/intro/intro_4.jpg", "", "", ""]
	],
	displaymode: {type:'auto', pause:5500, cycles:0, wraparound:false},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 1500, //transition duration (milliseconds)
	descreveal: "ondemand",
	togglerid: ""
})
</script>
<?php
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main_content -->
	<div id="main_content_mo">
<?php
		echo ('<h2><img src="../../images/icons/'.$new_red[$lang_num].'" alt="" style="vertical-align:middle;" /> '.$title[$lang_num].'</h2>');
?>
		<p><?=$new_1_p1[$lang_num]?></p>
		<table width="30%" cellpadding="6" align="right"><tr><td><div id="fadeshowIntro" class="box"></div></td></tr></table>
		<p><?=$new_1_p2[$lang_num]?></p>

		<h4><?=$title_2[$lang_num]?></h4>
		<p><?=$new_2_p1[$lang_num]?>
		<ol>
		<li><?=$new_2_l1[$lang_num]?></li>
		<li><?=$new_2_l2[$lang_num]?></li>
		<li><?=$new_2_l3[$lang_num]?></li>
		<li><?=$new_2_l4[$lang_num]?></li>
		</ol></p>
		<p><?=$new_2_p2[$lang_num]?>
<!--
		<h4><?=$title_3[$lang_num]?></h4>
		<p><?=$new_3_p1[$lang_num]?>
-->
<?php
//		When the fee for the intro to armizare is changed in the config.php (which appears in both the title tab in the paypal form below and 
//		the text describing the course, the paypal code MUST BE regenerated in order to reflect the new price
?>
<!--		<div align="center">
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="H4ALXDH75PK38">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" class="fade" alt="" title="Click to purchase an introduction to Armizare, a $<?=$intro_fee?> value." >
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1" />
			</form>
		</div>
		<p><?=$new_3_p2[$lang_num]?>
-->
		<p><hr width="30%" align="left" /><ol>
		<li><a name="1"></a><?=$new_3_l1[$lang_num]?></li>
		<li><a name="2"></a><?=$new_3_l2[$lang_num]?></li>
		<li><a name="3"></a><?=$new_3_l3[$lang_num]?></li>
		</ol></p>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
