<?php
// 	Program: 	arte_armizare.php
//	Description: 	a general overview on the arte dell'armizare created Jan 2017.
//	Author:		David M. Cvet
//
//	2017 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
include "../config/content_arte_armizare_$lang.php";
$current_pgm = "arte_armizare.php";
$path = "../";
$menu_selected = "armizare";
include "../php-bin/header.php";
include "../php-bin/header2.php";
shuffle($liberi);	// shuffle the Liberi images within the array to randomize the presentation of the folios on this page
?>
	<!-- begin page content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<p><?=$arte_intro[$lang_num]?></p>
		<div style="float:left;width:100%;text-align:center;">
			<div class="arte_fola"><img src="../images/liberi/<?=$liberi[0]?>" alt="" width="100%" class="box" /></div>
			<div class="arte_fola"><img src="../images/liberi/<?=$liberi[1]?>" alt="" width="100%" class="box"  /></div>
			<div class="arte_folb"><img src="../images/liberi/<?=$liberi[2]?>" alt="" width="100%" class="box"  /></div>
			<div class="arte_folb"><img src="../images/liberi/<?=$liberi[3]?>" alt="" width="100%" class="box"  /></div>
			<div class="arte_folc"><img src="../images/liberi/<?=$liberi[4]?>" alt="" width="100%" class="box"  /></div>
			<div style="float:left;width:100%;margin-top:15px;margin-bottom:20px;" class="caption"><?=$about_arte_caption[$lang_num]?></div>
		</div>
		<h4><?=$arte_title2[$lang_num]?></h4>
		<p><?=$arte_p2[$lang_num]?></p>
		<p><?=$arte_p3[$lang_num]?>
		<ol>
			<li><?=$arte_1_l1[$lang_num]?></li>
			<li><?=$arte_1_l2[$lang_num]?></li>
			<li><?=$arte_1_l3[$lang_num]?></li>
			<li><?=$arte_1_l4[$lang_num]?></li>
		</ol></p>

		<p><hr width="30%" align="left" /><ol>
		<li><a name="1"></a><?=$arte_2_l1[$lang_num]?></li>
		<li><a name="2"></a><?=$arte_2_l2[$lang_num]?></li>
		</ol></p>


	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
