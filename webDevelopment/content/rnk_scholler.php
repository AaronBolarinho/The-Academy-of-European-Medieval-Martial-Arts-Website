<?php
// 	Program: 	rnk_free_scholler.php
//	Description: 	A presentation of the rank of free scholler, created July 06, 2017
//	Author:		David M. Cvet
//
//	2017 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
$menu_selected = "training";
$current_pgm = "rnk_scholler.php";
include "../config/content_rnk_scholler_$lang.php";
$path = "../";
include "../php-bin/header.php";
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$banner[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
		</div>
		<p><?=$rnk_p11[$lang_num]?></p>
		<p><?=$rnk_p12[$lang_num]?></p>
		<p><?=$rnk_p13[$lang_num]?></p>
		<div class="scholler_div">
			<div class="scholler_badges">
				<div style="float:left;width:100%;"><img src="../images/scholler_grappling_100.jpg" alt="" width="100%"/></div>
				<div style="float:left;width:100%;"><i>abrazare</i></div>
			</div>
			<div class="scholler_badges">
				<div style="float:left;width:100%;"><img src="../images/scholler_dagger_100.jpg" alt="" width="100%"/></div>
				<div style="float:left;width:100%;"><i>daga</i></div>
			</div>
			<div class="scholler_badges">
				<div style="float:left;width:100%;"><img src="../images/scholler_spada_100.jpg" alt="" width="100%"/></div>
				<div style="float:left;width:100%;"><i>spada</i></div>
			</div>
			<div class="scholler_badges">
				<div style="float:left;width:100%;"><img src="../images/scholler_spadaLonga_100.jpg" alt="" width="100%"/></div>
				<div style="float:left;width:100%;"><i>spada longa</i></div>
			</div>
			<div class="scholler_badges">
				<div style="float:left;width:100%;"><img src="../images/scholler_buckler_100.jpg" alt="" width="100%"/></div>
				<div style="float:left;width:100%;"><i>spada e brocchiere</i></div>
			</div>
			<div class="scholler_badges">
				<div style="float:left;width:100%;"><img src="../images/scholler_poleweapons_100.jpg" alt="" width="100%"/></div>
				<div style="float:left;width:100%;"><i>azza e lanza</i></div>
			</div>
			<div class="scholler_badges">
				<div style="float:left;width:100%;"><img src="../images/scholler_armour_100.jpg" alt="" width="100%"/></div>
				<div style="float:left;width:100%;"><i>arme</i></div>
			</div>
		</div>
		<div style="float:left;width:100%;margin-top:20px;">
			<img src="http://www.heraldry.ca/arms/c/cvet_badge.jpg" style="float:left;margin-right:6px;" alt="" /><?=$rnk_p14[$lang_num]?><br />&nbsp;
		</div>

		<h4><?=$title_p2[$lang_num]?></h4>
		<ul>
		<li><a name="21"></a><?=$rnk_l21[$lang_num]?></li>
		<li><a name="22"></a><?=$rnk_l22[$lang_num]?></li>
		<li><a name="23"></a><?=$rnk_l23[$lang_num]?></li>
		<li><a name="24"></a><?=$rnk_l24[$lang_num]?></li>
		</ul>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
