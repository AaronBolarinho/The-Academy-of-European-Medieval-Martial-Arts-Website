<?php
// 	Program: 	about_instructors.php
//	Description: 	Listing of the instructors of the Academy, created May 30, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
$current_pgm = "about_instructors.php";
$path = "../";
$menu_selected = "AEMMA";
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
include "../config/content_about_instructors_$lang.php";
include "../php-bin/header.php";
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<table style="border-collapse:collapse;" cellpadding="10px">
		<tr>
			<td class="officers_td"><div class="officers_div"><a href="<?=$path?><?=$instructors_1_image_large[$lang_num]?>" target="_blank" title="<?=$instructors_image_title[$lang_num]?>"><img src="<?=$path?><?=$instructors_1_image[$lang_num]?>" class="officers_portrait fade" alt="" /></a></div><b><?=$instructors_1_name[$lang_num]?></b><br /><i><?=$instructors_1_style[$lang_num]?></i><br /><br /><?=$instructors_1_arms_link[$lang_num]?><?=$instructors_1_bio[$lang_num]?>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td class="officers_td"><div class="officers_div"><a href="<?=$path?><?=$instructors_2_image_large[$lang_num]?>" target="_blank" title="<?=$instructors_image_title[$lang_num]?>"><img src="<?=$path?><?=$instructors_2_image[$lang_num]?>" class="officers_portrait fade" alt="" /></a></div><b><?=$instructors_2_name[$lang_num]?></b><br /><i><?=$instructors_2_style[$lang_num]?></i><br /><br /><?=$instructors_2_arms_link[$lang_num]?><?=$instructors_2_bio[$lang_num]?>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td class="officers_td"><div class="officers_div"><a href="<?=$path?><?=$instructors_3_image_large[$lang_num]?>" target="_blank" title="<?=$instructors_image_title[$lang_num]?>"><img src="<?=$path?><?=$instructors_3_image[$lang_num]?>" class="officers_portrait fade" alt="" /></a></div><b><?=$instructors_3_name[$lang_num]?></b><br /><i><?=$instructors_2_style[$lang_num]?></i><br /><br /><?=$instructors_3_arms_link[$lang_num]?><?=$instructors_3_bio[$lang_num]?>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td class="officers_td"><div class="officers_div"><a href="<?=$path?><?=$instructors_4_image_large[$lang_num]?>" target="_blank" title="<?=$instructors_image_title[$lang_num]?>"><img src="<?=$path?><?=$instructors_4_image[$lang_num]?>" class="officers_portrait fade" alt="" /></a></div><b><?=$instructors_4_name[$lang_num]?></b><br /><i><?=$instructors_4_style[$lang_num]?></i><br /><br /><?=$instructors_4_arms_link[$lang_num]?><?=$instructors_4_bio[$lang_num]?>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		</table>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
