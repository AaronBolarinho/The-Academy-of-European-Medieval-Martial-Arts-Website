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
$current_pgm = "rnk_free_scholler.php";
include "../config/content_rnk_free_scholler_$lang.php";
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

		<h4><?=$title_p2[$lang_num]?></h4>
		<ul>
		<li><a name="21"></a><?=$rnk_l21[$lang_num]?></li>
		<li><a name="22"></a><?=$rnk_l22[$lang_num]?>
			<ul>
			<li><a name="23"></a><?=$rnk_l23[$lang_num]?></li>
			<li><a name="24"></a><?=$rnk_l24[$lang_num]?></li>
			<li><a name="25"></a><?=$rnk_l25[$lang_num]?></li>
			<li><a name="26"></a><?=$rnk_l26[$lang_num]?></li>
			<li><a name="27"></a><?=$rnk_l27[$lang_num]?></li>
			</ul>
		</li>		
		<li><a name="28"></a><?=$rnk_l28[$lang_num]?></li>
		<li><a name="29"></a><?=$rnk_l29[$lang_num]?></li>
		<li><a name="210"></a><?=$rnk_l210[$lang_num]?></li>
		<li><a name="211"></a><?=$rnk_l211[$lang_num]?></li>
		<li><a name="212"></a><?=$rnk_l212[$lang_num]?></li>
		<li><a name="213"></a><?=$rnk_l213[$lang_num]?></li>
		<li><a name="214"></a><?=$rnk_l214[$lang_num]?></li>
		</ul>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
