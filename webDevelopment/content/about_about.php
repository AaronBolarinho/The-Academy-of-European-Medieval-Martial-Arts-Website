<?php
// 	Program: 	about_about.php
//	Description: 	About the Academy, created April 20, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
include "../config/content_about_about_$lang.php";
$current_pgm = "about_about.php";
$path = "../";
$menu_selected = "AEMMA";
include "../php-bin/header.php";
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<h3><?=$title_p1[$lang_num]?></h3>
		<div class="about_image_arms">
			<div style="float:left;margin-bottom:10px;"><img src="../images/coatofarms/armorialBearings_CHA_230.jpg" alt="" width="100%"  /></div>
			<div style="float:left;" class="caption"><?=$about_aemma_arms_caption[$lang_num]?></div>
		</div>
		<div class="about_image_right">
			<div style="float:left;margin-bottom:10px;"><a href="../images/about_pas_d_armes_2010.jpg" target="_blank" title="pas d'armes at AEMMA in 2010"><img src="../images/about_pas_d_armes_2010_400.jpg" alt="" width="100%" class="box fade" /></a></div>
			<div style="float:left;" class="caption"><?=$about_pas_d_armes_caption[$lang_num]?></div>
		</div>

		<p><?=$about_p1_1[$lang_num]?></p>
		<p><?=$about_p1_2[$lang_num]?></p>

		<div class="about_image_right">
			<div style="float:left;margin-bottom:10px;"><a href="../images/about_unarmoured_tourney_2009.jpg" target="_blank" title="unarmoured tournament at AEMMA in 2009"><img src="../images/about_unarmoured_tourney_2009_400.jpg" alt="" width="100%" class="box fade" /></a></div>
			<div style="float:left;" class="caption"><?=$about_unarmoured_tourney_caption[$lang_num]?></div>
		</div>
		<p><?=$about_p1_3[$lang_num]?></p>


		<h3><?=$title_p2[$lang_num]?></h3>
		<p><?=$about_p2_1[$lang_num]?></p>
		<p><?=$about_p2_2[$lang_num]?></p>


		<p><hr width="30%" align="left" /><ol>
		<li><a name="1"></a><?=$about_l1[$lang_num]?></li>
		<li><a name="2"></a><?=$about_l2[$lang_num]?></li>
		<li><a name="3"></a><?=$about_l3[$lang_num]?></li>
		<li><a name="4"></a><?=$about_l4[$lang_num]?></li>
		</ol></p>

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
