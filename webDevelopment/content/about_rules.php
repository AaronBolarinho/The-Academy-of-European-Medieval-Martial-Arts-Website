<?php
// 	Program: 	about_rules.php
//	Description: 	About the rules of the Academy, created April 20, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
include "../members_only/config/content_about_rules_$lang.php";
$current_pgm = "about_rules.php";
$path = "../";
$menu_selected = "training";
include "../php-bin/header.php";
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
		</div>
		<p><?=$rules_intro[$lang_num]?></p>
		<ul style="list-style-type:upper-roman;line-height:1.4;">
			<li style="margin-bottom: 10px;"><?=$rules_l1[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l2[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l3[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l4[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l5[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l6[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l7[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l8[$lang_num]?></li>
			<li style="margin-bottom: 10px;"><?=$rules_l9[$lang_num]?></li>
		</ul>
		<div style="float:right;"><?=$rules_p1[$lang_num]?><br />&nbsp;</div>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
