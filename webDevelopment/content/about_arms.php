<?php
// 	Program: 	about_arms.php
//	Description: 	About the Academy, created April 21, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
include "../config/content_about_arms_$lang.php";
$current_pgm = "about_arms.php";
$path = "../";
$menu_selected = "AEMMA";
include "../php-bin/header.php";
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<h3><?=$title_p1[$lang_num]?></h3>
		<div class="arms_image_arms">
			<div style="float:left;margin-bottom:10px;"><a href="../images/coatofarms/aemma_arms_large.jpg" target="_blank" title="armorial bearings"><img src="../images/coatofarms/aemma_arms_400_transparent.png" alt="" width="100%" class="fade" /></a></div>
			<div style="float:left;" class="caption"><?=$aemma_arms_caption[$lang_num]?></div>
		</div>
		<div class="arms_paragraph_1">
			<p><?=$arms_p1_1[$lang_num]?></p>
			<p><?=$arms_p1_2[$lang_num]?></p>
		</div>
		<div class="arms_image_evolution">
			<div style="float:left;margin-left:15px;"><a href="../images/coatofarms/arms_evolution.png" target="_blank" title="armorial evolution"><img src="../images/coatofarms/arms_evolution.png" alt="" width="100%" class="fade" /></a></div>
			<div style="float:left;" class="caption"><?=$aemma_arms_evolution_caption[$lang_num]?></div>
		</div>


		<div class="arms_paragraph_2">
			<h3><?=$title_p2[$lang_num]?></h3>
			<p><?=$arms_p2_1[$lang_num]?></p>

			<p><hr width="30%" align="left" /><ol>
			<li><a name="1"></a><?=$arms_l1[$lang_num]?></li>
			<li><a name="2"></a><?=$arms_l2[$lang_num]?></li>
			<li><a name="3"></a><?=$arms_l3[$lang_num]?></li>
			<li><a name="4"></a><?=$arms_l4[$lang_num]?></li>
			</ol></p>
		</div>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
