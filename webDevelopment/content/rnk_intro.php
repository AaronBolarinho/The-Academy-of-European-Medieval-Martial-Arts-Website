<?php
// 	Program: 	rnk_intro.php
//	Description: 	An overview/introduction to the AEMMA ranking system, created July 03, 2017
//	Author:		David M. Cvet
//
//	2017 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
$menu_selected = "training";
$current_pgm = "rnk_intro.php";
include "../config/content_rnk_intro_$lang.php";
$path = "../";
include "../php-bin/header.php";
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
		</div>
		<h4><?=$title_p1[$lang_num]?></h4>
		<p><?=$rnk_p11[$lang_num]?></p>
		<p><?=$rnk_p12[$lang_num]?></p>

		<h4><?=$title_p2[$lang_num]?></h4>
		<p><?=$rnk_p21[$lang_num]?></p>
		<p><?=$rnk_p22[$lang_num]?></p>
		<p><?=$rnk_p23[$lang_num]?></p>
		<p><?=$rnk_p24[$lang_num]?></p>

		<p><hr width="30%" align="left" /><ol>
		<li><a name="1"></a><?=$rnk_l1[$lang_num]?></li>
		<li><a name="2"></a><?=$rnk_l2[$lang_num]?></li>
		<li><a name="3"></a><?=$rnk_l3[$lang_num]?></li>
		</ol></p>

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
