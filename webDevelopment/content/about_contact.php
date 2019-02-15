<?php
// 	Program: 	about_contact.php
//	Description: 	Contact the Academy, created April 22, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
if (isset($_GET['MNU'])) { $menu_selected = "contact"; $current_pgm = "about_contact.php?MNU=contact";} else { $menu_selected = "AEMMA"; $current_pgm = "about_contact.php";}
include "../config/content_about_contact_$lang.php";
$path = "../";
include "../php-bin/header.php";
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<div class="contact_salles">
			<p><?=$p1[$lang_num]?></p>
		</div>
		<div class="contact_salles">
			<div class="contact_salles_image"><a href="<?=$google_toronto[$lang_num]?>" target="_blank" title="<?=$image_toronto_title[$lang_num]?>"><img src="../images/<?=$image_toronto[$lang_num]?>" alt="" width="100%" class="box fade" /></a></div>
			<div class="contact_salles_p"><h3><?=$title_toronto[$lang_num]?></h3><p><?=$p1_toronto[$lang_num]?></p></div>
		</div>
		<div class="contact_salles">
			<div class="contact_salles_image"><a href="<?=$google_guelph[$lang_num]?>" target="_blank" title="<?=$image_guelph_title[$lang_num]?>"><img src="../images/<?=$image_guelph[$lang_num]?>" alt="" width="100%" class="box fade" /></a></div>
			<div class="contact_salles_p"><h3><?=$title_guelph[$lang_num]?></h3><p><?=$p1_guelph[$lang_num]?></p></div>
		</div>
		<div class="contact_salles">
			<div class="contact_salles_image"><a href="<?=$google_digby[$lang_num]?>" target="_blank" title="<?=$image_digby_title[$lang_num]?>"><img src="../images/<?=$image_digby[$lang_num]?>" alt="" width="100%" class="box fade" /></a></div>
			<div class="contact_salles_p"><h3><?=$title_digby[$lang_num]?></h3><p><?=$p1_digby[$lang_num]?></p></div>
		</div>
		<div class="contact_salles">
			<div class="contact_salles_image"><a href="<?=$google_stratford[$lang_num]?>" target="_blank" title="<?=$image_stratford_title[$lang_num]?>"><img src="../images/<?=$image_stratford[$lang_num]?>" alt="" width="100%" class="box fade" /></a></div>
			<div class="contact_salles_p"><h3><?=$title_stratford[$lang_num]?></h3><p><?=$p1_stratford[$lang_num]?></p></div>
		</div>
		<div class="contact_salles">
			<div class="contact_salles_image"><a href="<?=$google_ottawa[$lang_num]?>" target="_blank" title="<?=$image_ottawa_title[$lang_num]?>"><img src="../images/<?=$image_ottawa[$lang_num]?>" alt="" width="100%" class="box fade" /></a></div>
			<div class="contact_salles_p"><h3><?=$title_ottawa[$lang_num]?></h3><p><?=$p1_ottawa[$lang_num]?></p></div>
		</div>
		<div class="contact_salles">
			<div class="contact_salles_image"><a href="<?=$google_london[$lang_num]?>" target="_blank" title="<?=$image_london_title[$lang_num]?>"><img src="../images/<?=$image_london[$lang_num]?>" alt="" width="100%" class="box fade" /></a><br />&nbsp;</div>
			<div class="contact_salles_p"><h3><?=$title_london[$lang_num]?></h3><p><?=$p1_london[$lang_num]?></p></div>
		</div>

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
