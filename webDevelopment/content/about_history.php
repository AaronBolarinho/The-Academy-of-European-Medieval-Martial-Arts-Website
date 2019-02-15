<?php
// 	Program: 	about_history.php
//	Description: 	A brief (public) description/story on the creation of the Academy, created March 28, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
include "../config/content_about_history_$lang.php";
$current_pgm = "about_history.php";
$path = "../";
$menu_selected = "AEMMA";
include "../php-bin/header.php";
?>
<script type="text/javascript" src="../js-bin/bio_Popup.js"></script>
<?php
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<h3><?=$sub_title_1[$lang_num]?></h3>
		<div class="history_image_portrait">
			<div style="float:left;margin-bottom:10px;"><img src="../images/david_cvet_1997.jpg" alt="" width="100%" class="box" /></div>
			<div style="float:left;" class="caption">David Michael Cvet, 1997</div>
		</div>
		<p><?=$history_p1[$lang_num]?></p>

		<h3><?=$sub_title_2[$lang_num]?></h3>
		<p><?=$history_p2[$lang_num]?></p>
		<div class="history_image_right">
			<div style="float:left;margin-bottom:10px;"><a href="../images/first_swords_design_aug20_1998.png" target="_blank"><img src="../images/first_swords_design_aug20_1998.png" alt="" width="100%" class="box fade" title="click to view <?=$caption_image_3[$lang_num]?>" /></a></div>
			<div style="float:left;" class="caption"><?=$caption_image_3[$lang_num]?></div>
		</div>
		<p><?=$history_p3[$lang_num]?></p>

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
		<p><?=$history_p7[$lang_num]?></p>
		<div class="history_image_left">
			<div style="float:left;margin-bottom:10px;"><a href="../images/groupPhotoChicago1999.jpg" target="_blank"><img src="../images/groupPhotoChicago1999.jpg" alt="" width="100%" class="fade box" /></a></div>
			<div style="float:left;" class="caption"><?=$caption_image_6[$lang_num]?></div>
		</div>

		<h3><?=$sub_title_4[$lang_num]?></h3>
		<p><?=$history_p8[$lang_num]?></p>

		<h3><?=$sub_title_5[$lang_num]?></h3>
		<p><?=$history_p10[$lang_num]?></p>

		<p><hr width="30%" align="left" /><ol>
		<li><a name="1"></a><?=$history_l1[$lang_num]?></li>
		<li><a name="2"></a><?=$history_l2[$lang_num]?></li>
		</ol></p>

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
