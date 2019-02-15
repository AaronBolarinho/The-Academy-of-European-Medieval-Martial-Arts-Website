<?php
// 	Program: 	equip_recruit.php
//	Description: 	A presentation of the required and standard equipment for the rank of recruit, created July 12, 2017
//	Author:		David M. Cvet
//
//	2017 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
$menu_selected = "training";
$current_pgm = "equip_recruit.php";
include "../config/content_equip_recruit_$lang.php";
$path = "../";
include "../php-bin/header.php";
include "../php-bin/header2.php";
$num = rand(1,3);
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$banner[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
		</div>
		<p><?=$equip_p11[$lang_num]?></p>
		<div class="about_image_right">
			<div style="float:left;margin-bottom:10px;"><a href="../images/recruit_equip_<?=$num?>.jpg" target="_blank" title="basic recruit equipment"><img src="../images/recruit_equip_<?=$num?>_400.jpg" alt="" width="100%" class="box fade" /></a></div>
			<div style="float:left;" class="caption"><?=$equip_recruit_caption[$lang_num]?></div>
		</div>

		<h4><?=$title_p2[$lang_num]?></h4>
		<ul>
		<li><a name="21"></a><?=$equip_l21[$lang_num]?></li>
		<li><a name="22"></a><?=$equip_l22[$lang_num]?></li>
		<li><a name="23"></a><?=$equip_l23[$lang_num]?></li>
		<li><a name="23"></a><?=$equip_l24[$lang_num]?></li>
		<li><a name="23"></a><?=$equip_l25[$lang_num]?></li>
		</ul>
		<p><?=$equip_p12[$lang_num]?></p>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
