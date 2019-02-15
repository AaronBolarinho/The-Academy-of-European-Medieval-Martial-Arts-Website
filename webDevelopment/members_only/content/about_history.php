<?php
ini_set('display_errors', 'On');
// 	Program: 	about_history.php
//	Description: 	A description/story on the creation of the Academy, created March 28, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
$lang = "en";
$modal = 0;					// no need for modal popups as there are no database operations in this script
$lang_num = 0;
$members_only_path = "../";			// the location of the members only scripts and files with respect to this calling script
$dbase_path = $path = "../database/";		// the location of the database scripts and files with respect to this calling script
$current_pgm = "about_contact.php";
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
$config_about = $members_only_path."config/content_about_history_$lang.php"; include "$config_about";
$header = $members_only_path."php-bin/members_only_header.php"; include "$header";
echo ('<script type="text/javascript" src="../js-bin/bio_Popup.js"></script>');
$header2 = $members_only_path."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<p><?=$history_intro[$lang_num]?></p>
		<h3><?=$sub_title_1[$lang_num]?></h3>
		<div class="history_image_portrait">
			<div style="float:left;margin-bottom:10px;"><img src="../images/david_cvet_1997.jpg" alt="" width="100%" class="box" /></div>
			<div style="float:left;" class="caption">David Michael Cvet, 1997</div>
		</div>
		<p><?=$history_p1[$lang_num]?></p>
		<div class="history_image_right">
			<div style="float:left;margin-bottom:10px;"><a href="../images/AEMMA_first_draft_coat_of_arms_1998.png" target="_blank"><img src="../images/arms_1998.png" alt="" width="100%" class="fade" title="click to view expanded image of <?=$caption_image_2[$lang_num]?>" /></a></div>
			<div style="float:left;" class="caption"><?=$caption_image_2[$lang_num]?></div>
		</div>
		<h3><?=$sub_title_2[$lang_num]?></h3>
		<p><?=$history_p2[$lang_num]?></p>
		<div class="history_image_left">
			<div style="float:left;margin-bottom:10px;"><a href="../images/first_swords_design_aug20_1998.png" target="_blank"><img src="../images/first_swords_design_aug20_1998.png" alt="" width="100%" class="box fade" title="click to view <?=$caption_image_3[$lang_num]?>" /></a></div>
			<div style="float:left;" class="caption"><?=$caption_image_3[$lang_num]?></div>
		</div>
		<p><?=$history_p3[$lang_num]?></p>
		<div class="history_image_right">
			<div style="float:left;margin-bottom:10px;"><a href="../images/website_homepage_1998.png" target="_blank"><img src="../images/website_homepage_1998.png" alt="" width="100%" class="box fade" title="click to view <?=$caption_image_4[$lang_num]?>" /></a></div>
			<div style="float:left;" class="caption"><?=$caption_image_4[$lang_num]?></div>
		</div>
		<p><?=$history_p4[$lang_num]?></p>

		<h3><?=$sub_title_3[$lang_num]?></h3>
		<div class="history_image_portrait">
			<div style="float:left;margin-bottom:10px;"><img src="../images/brian_mcilmoyle_2001.png" alt="" width="100%" class="box" /></div>
			<div style="float:left;" class="caption">Brian A. McIlmoyle, 2001</div>
		</div>
		<p><?=$history_p5[$lang_num]?></p>
		<div class="history_image_right">
			<div style="float:left;margin-bottom:10px;"><img src="../images/bm_mr_innes_1998.jpg" alt="" width="100%" class="box" /></div>
			<div style="float:left;" class="caption"><?=$caption_image_5[$lang_num]?></div>
		</div>
		<p><?=$history_p6[$lang_num]?></p>
		<div class="history_image_left">
			<div style="float:left;margin-bottom:10px;"><a href="../images/groupPhotoChicago1999.jpg" target="_blank"><img src="../images/groupPhotoChicago1999.jpg" alt="" width="100%" class="fade box" title="click to view <?=$caption_image_6[$lang_num]?>" /></a></div>
			<div style="float:left;" class="caption"><?=$caption_image_6[$lang_num]?></div>
		</div>
		<p><?=$history_p7[$lang_num]?></p>

		<h3><?=$sub_title_4[$lang_num]?></h3>
		<p><?=$history_p8[$lang_num]?></p>
		<div class="history_image_left">
			<div style="float:left;margin-bottom:10px;"><a href="../images/wma2000_armoured_combatants_group.jpg" target="_blank"><img src="../images/wma2000_armoured_combatants_group.jpg" alt="" width="100%" class="fade box" title="click to view <?=$caption_image_7[$lang_num]?>" /></a></div>
			<div style="float:left;" class="caption"><?=$caption_image_7[$lang_num]?></div>
		</div>
		<p><?=$history_p9[$lang_num]?></p>
		<div class="history_image_right">
			<div style="float:left;margin-bottom:10px;"><a href="../images/toronto_star_2000.pdf" target="_blank"><img src="../images/toronto_star_2000.jpg" alt="" width="100%" class="fade box"  title="click to view <?=$caption_image_8a[$lang_num]?>"/></a></div>
			<div style="float:left;" class="caption"><?=$caption_image_8a[$lang_num]?></div>
		</div>
		<div class="history_image_left" style="width:25%;">
			<div style="float:left;margin-bottom:10px;"><a href="../images/history_masters.jpg" target="_blank"><img src="../images/history_masters.jpg" alt="" width="100%" class="fade box"  title="click to view <?=$caption_image_8b[$lang_num]?>"/></a></div>
			<div style="float:left;" class="caption"><?=$caption_image_8b[$lang_num]?></div>
		</div>
		<p><?=$history_p10[$lang_num]?></p>

		<h3><?=$sub_title_5[$lang_num]?></h3>
		<p><?=$history_p11[$lang_num]?></p>
		<div class="history_image_left">
			<div style="float:left;margin-bottom:10px;"><img src="../images/wcja_2001.jpg" alt="" width="100%" class="box"/></div>
			<div style="float:left;" class="caption"><?=$caption_image_9a[$lang_num]?></div>
		</div>
		<div class="history_image_right">
			<div style="float:left;margin-bottom:10px;"><a href="../images/history_orangeville1.jpg" target="_blank"><img src="../images/history_orangeville1.jpg" alt="" width="30%" class="fade box" title="click to view <?=$caption_image_9b1[$lang_num]?>"/></a>&nbsp;<a href="../images/history_orangeville2.jpg" target="_blank"><img src="../images/history_orangeville2.jpg" alt="" width="30%" class="fade box" title="click to view <?=$caption_image_9b2[$lang_num]?>"/></a>&nbsp;<a href="../images/history_orangeville3.jpg" target="_blank"><img src="../images/history_orangeville3.jpg" alt="" width="30%" class="fade box" title="click to view <?=$caption_image_9b3[$lang_num]?>"/></a><br />
			<a href="../images/history_orangeville4.jpg" target="_blank"><img src="../images/history_orangeville4.jpg" alt="" width="30%" class="fade box" title="click to view <?=$caption_image_9b4[$lang_num]?>"/></a>&nbsp;<a href="../images/history_orangeville5.jpg" target="_blank"><img src="../images/history_orangeville5.jpg" alt="" width="30%" class="fade box" title="click to view <?=$caption_image_9b5[$lang_num]?>"/></a>&nbsp;<a href="../images/history_orangeville6.jpg" target="_blank"><img src="../images/history_orangeville6.jpg" alt="" width="30%" class="fade box" title="click to view <?=$caption_image_9b6[$lang_num]?>"/></a><br />
			<a href="../images/history_orangeville7.jpg" target="_blank"><img src="../images/history_orangeville7.jpg" alt="" width="30%" class="fade box" title="click to view <?=$caption_image_9b7[$lang_num]?>"/></a>&nbsp;<a href="../images/history_orangeville8.jpg" target="_blank"><img src="../images/history_orangeville8.jpg" alt="" width="30%" class="fade box" title="click to view <?=$caption_image_9b8[$lang_num]?>"/></a>&nbsp;<a href="../images/history_orangeville9.jpg" target="_blank"><img src="../images/history_orangeville9.jpg" alt="" width="30%" class="fade box" title="click to view <?=$caption_image_9b9[$lang_num]?>"/></a><br /></div>
			<div style="float:left;" class="caption"><?=$caption_image_9b[$lang_num]?></div>
		</div>
		<p><?=$history_p12[$lang_num]?></p>

		<h3><?=$sub_title_6[$lang_num]?></h3>
		<div class="history_image_left">
			<div style="float:left;margin-bottom:10px;"><a href="../images/sword_delivery_2002.jpg" target="_blank"><img src="../images/sword_delivery_top_photo_2002.jpg" alt="" width="100%" class="fade box" title="click to view <?=$caption_image_10[$lang_num]?>"/></a></div>
			<div style="float:left;" class="caption"><?=$caption_image_10a[$lang_num]?></div>
		</div>
		<div class="history_image_right">
			<div style="float:left;margin-bottom:10px;"><a href="../images/history_stclair1.jpg" target="_blank"><img src="../images/history_stclair1.jpg" alt="" width="47%" class="fade box" title="click to view <?=$caption_image_10b[$lang_num]?>"/></a>&nbsp;<a href="../images/history_stclair2.jpg" target="_blank"><img src="../images/history_stclair2.jpg" alt="" width="47%" class="fade box" title="click to view <?=$caption_image_10b[$lang_num]?>"/></a><br /><a href="../images/history_stclair4.jpg" target="_blank"><img src="../images/history_stclair4.jpg" alt="" width="47%" class="fade box" title="click to view <?=$caption_image_10b[$lang_num]?>"/></a>&nbsp;<a href="../images/history_stclair3.jpg" target="_blank"><img src="../images/history_stclair3.jpg" alt="" width="47%" class="fade box" title="click to view <?=$caption_image_10b[$lang_num]?>"/></a></div>
			<div style="float:left;" class="caption"><?=$caption_image_10b[$lang_num]?></div>
		</div>
		<p><?=$history_p13[$lang_num]?></p>
		<div class="history_image_right">
			<div style="float:left;margin-bottom:10px;"><a href="../images/AEMMA_arms_painting_2005.jpg" target="_blank"><img src="../images/AEMMA_arms_painting_2005.jpg" alt="" width="100%" class="fade box"  title="click to view <?=$caption_image_11[$lang_num]?>"/></a></div>
			<div style="float:left;" class="caption"><?=$caption_image_11[$lang_num]?></div>
		</div>
		<p><?=$history_p14[$lang_num]?></p>
		<div class="history_image_left">
			<div style="float:left;margin-bottom:10px;"><a href="../images/david_via_fiore_oct5_2005.jpg" target="_blank"><img src="../images/david_via_fiore_oct5_2005.jpg" alt="" width="100%" class="fade box" title="click to view <?=$caption_image_12[$lang_num]?>"/></a></div>
			<div style="float:left;" class="caption"><?=$caption_image_12[$lang_num]?></div>
		</div>
		<p><?=$history_p15[$lang_num]?></p>
		<p><?=$history_p16[$lang_num]?></p>

		<p><hr width="30%" align="left" /><ol>
		<li><a name="1"></a><?=$history_l1[$lang_num]?></li>
		<li><a name="2"></a><?=$history_l2[$lang_num]?></li>
		<li><a name="3"></a><?=$history_l3[$lang_num]?></li>
		<li><a name="4"></a><?=$history_l4[$lang_num]?></li>
		<li><a name="5"></a><?=$history_l5[$lang_num]?></li>
		<li><a name="6"></a><?=$history_l6[$lang_num]?></li>
		<li><a name="7"></a><?=$history_l7[$lang_num]?></li>
		<li><a name="8"></a><?=$history_l8[$lang_num]?></li>
		<li><a name="9"></a><?=$history_l9[$lang_num]?></li>
		</ol></p>

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
