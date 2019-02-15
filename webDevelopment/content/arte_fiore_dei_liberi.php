<?php
// 	Program: 	arte_fiore_dei_liberi.php
//	Description: 	a general overview of Fiore dei Liberi created Jan 2017.
//	Author:		David M. Cvet
//
//	2017 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
include "../config/content_arte_fiore_dei_liberi_$lang.php";
$current_pgm = "arte_fiore_dei_liberi.php";
$path = "../";
$menu_selected = "armizare";
include "../php-bin/header.php";
include "../php-bin/header2.php";
shuffle($liberi);	// shuffle the Liberi images within the array to randomize the presentation of the folios on this page
?>
	<!-- begin page content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<div class="arte_fiore_dei_liberi_prologue">
			<div style="float:left;margin-bottom:10px;"><a href="../images/liberi/prologue.jpg" target="_blank" title="<?=$arte_fiore_dei_liberi_prologue_title[$lang_num]?>"><img src="../images/liberi/prologue.jpg" alt="" width="100%" class="fade box" /></a></div>
			<div style="float:left;" class="caption"><?=$arte_fiore_dei_liberi_caption[$lang_num]?></div>
		</div>
		<p><?=$arte_p1[$lang_num]?></p>
		<p><?=$arte_p2[$lang_num]?></p>
		<div class="arte_fiore_dei_liberi_premariacco">
			<div style="float:right;margin-bottom:10px;"><a href="http://www.comune.premariacco.ud.it" target="_blank" title="<?=$arte_premariacco_title[$lang_num]?>"><img src="../images/liberi/premariacco_arms.jpg" alt="" width="100%" class="fade" /></a></div>
			<div style="float:left;" class="caption"><?=$arte_premariacco_caption[$lang_num]?></div>
		</div>
		<p><?=$arte_p3[$lang_num]?></p>
		<p><?=$arte_p4[$lang_num]?></p>

		<p><hr width="30%" align="left" /><ol>
		<li><a name="1"></a><?=$arte_l1[$lang_num]?></li>
		<li><a name="2"></a><?=$arte_l2[$lang_num]?></li>
		<li><a name="3"></a><?=$arte_l3[$lang_num]?></li>
		<li><a name="4"></a><?=$arte_l4[$lang_num]?></li>
		</ol></p>

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
