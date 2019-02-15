<?php
// 	Program: 	about_exec.php
//	Description: 	Listing of the Officers of the Academy, created May 24, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
$current_pgm = "about_exec.php";
$path = "../";
$menu_selected = "AEMMA";
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
include "../config/content_about_exec_$lang.php";
include "../php-bin/header.php";
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<table style="border-collapse:collapse;" cellpadding="10px">
		<tr>
			<td class="officers_td"><div class="officers_div"><a href="<?=$path?><?=$officers_president_image_large[$lang_num]?>" target="_blank" title="<?=$officers_image_title[$lang_num]?>"><img src="<?=$path?><?=$officers_president_image[$lang_num]?>" class="officers_portrait fade" alt="" /></a></div><b><?=$officers_president[$lang_num]?>: <?=$officers_president_name[$lang_num]?></b><br /><br /><?=$officers_president_arms_link[$lang_num]?><?=$officers_president_bio[$lang_num]?>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td class="officers_td"><div class="officers_div"><a href="<?=$path?><?=$officers_vice_president_image_large[$lang_num]?>" target="_blank" title="<?=$officers_image_title[$lang_num]?>"><img src="<?=$path?><?=$officers_vice_president_image[$lang_num]?>" class="officers_portrait fade" alt="" /></a></div><b><?=$officers_vice_president[$lang_num]?>: <?=$officers_vice_president_name[$lang_num]?></b><br /><br /><?=$officers_vice_president_arms_link[$lang_num]?><?=$officers_vice_president_bio[$lang_num]?>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td class="officers_td"><div class="officers_div"><a href="<?=$path?><?=$officers_secretary_image_large[$lang_num]?>" target="_blank" title="<?=$officers_image_title[$lang_num]?>"><img src="<?=$path?><?=$officers_secretary_image[$lang_num]?>" class="officers_portrait fade" alt="" /></a></div><b><?=$officers_secretary[$lang_num]?>: <?=$officers_secretary_name[$lang_num]?></b><br /><br /><?=$officers_secretary_arms_link[$lang_num]?><?=$officers_secretary_bio[$lang_num]?>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td class="officers_td"><div class="officers_div"><a href="<?=$path?><?=$officers_director1_image_large[$lang_num]?>" target="_blank" title="<?=$officers_image_title[$lang_num]?>"><img src="<?=$path?><?=$officers_director1_image[$lang_num]?>" class="officers_portrait fade" alt="" /></a></div><b><?=$officers_director1[$lang_num]?>: <?=$officers_director1_name[$lang_num]?></b><br /><br /><?=$officers_director1_arms_link[$lang_num]?><?=$officers_director1_bio[$lang_num]?>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td class="officers_td"><div class="officers_div"><a href="<?=$path?><?=$officers_director2_image_large[$lang_num]?>" target="_blank" title="<?=$officers_image_title[$lang_num]?>"><img src="<?=$path?><?=$officers_director2_image[$lang_num]?>" class="officers_portrait fade" alt="" /></a></div><b><?=$officers_director2[$lang_num]?>: <?=$officers_director2_name[$lang_num]?></b><br /><br /><?=$officers_director2_arms_link[$lang_num]?><?=$officers_director2_bio[$lang_num]?>
			</td>
		</tr>

		</table>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
