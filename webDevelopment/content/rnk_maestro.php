<?php
// 	Program: 	rnk_maestro.php
//	Description: 	A presentation of the rank of maestro, created July 11, 2017
//	Author:		David M. Cvet
//
//	2017 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
$menu_selected = "training";
$current_pgm = "rnk_maestro.php";
include "../config/content_rnk_maestro_$lang.php";
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

		<h4><?=$title_p2[$lang_num]?></h4>
		<ul>
		<li><a name="21"></a><?=$rnk_l21[$lang_num]?></li>
		<li><a name="22"></a><?=$rnk_l22[$lang_num]?></li>
		<li><a name="23"></a><?=$rnk_l23[$lang_num]?></li>
		</ul>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
