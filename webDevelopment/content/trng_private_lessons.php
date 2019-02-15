<?php
// 	Program: 	trng_private_lessons.php
//	Description: 	details on private lessons, created April 20, 2016
//	Author:		David M. Cvet
//
//	2017 ------------------
//
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
include "../config/content_trng_private_lessons_$lang.php";
$current_pgm = "trng_private_lessons.php";
$path = "../";
$menu_selected = "training";
include "../php-bin/header.php";
?>
<script type="text/JavaScript">
var mygallery=new fadeSlideShow({
	wrapperid: "fadeshowPrivate",
	dimensions: [260, 260],
	imagearray: [
		["../images/private/private_1.jpg", "", "", "Instructor Aldo Valente working on his Italian rapier skills"],
		["../images/private/private_2.jpg", "", "", "Instructor David M. Cvet coaching a young student to shoot longbow"],
		["../images/private/private_3.jpg", "", "", "AEMMA has a lot of weapons to choose from!"],
		["../images/private/private_4.jpg", "", "", "A pair of armoured combatants during a pas d'armes"],
		["../images/private/private_5.jpg", "", "", "Scholler Shawn Zirger demonstrating his dagger technique on Instructor Kel Rekuta"],
		["../images/private/private_6.jpg", "", "", "Instructor David M. Cvet instructing a pair of students on longsword techniques"],
		["../images/private/private_7.jpg", "", "", "Instructor Brian McIlmoyle demonstrating the finer points of arming sword"],
		["../images/private/private_8.jpg", "", "", "AEMMA trains storm troopers as well!"]
	],
	displaymode: {type:'auto', pause:5500, cycles:0, wraparound:false},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 1500, //transition duration (milliseconds)
	descreveal: "ondemand",
	togglerid: ""
})
</script>
<?php
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<h3><?=$title_p1[$lang_num]?></h3>
		<div class="about_image_arms">
			<div style="float:left;margin-bottom:10px;"><img src="../images/coatofarms/armorialBearings_CHA_230.jpg" alt="" width="100%"  /></div>
		</div>
		<table width="260" cellpadding="6" align="right"><tr><td><div id="fadeshowPrivate" class="box"></div></td></tr></table>
		<p style="margin-right:20px;"><?=$private_p1_1[$lang_num]?></p>	
		<ol>
		<li><?=$private_l1[$lang_num]?></li>
		<li><?=$private_l2[$lang_num]?></li>
		<li><?=$private_l3[$lang_num]?></li>
		<li><?=$private_l4[$lang_num]?></li>
		</ol>

		<h3><?=$title_p2[$lang_num]?></h3>
		<p><?=$private_p2_1[$lang_num]?></p>	
		<p><?=$private_p2_2[$lang_num]?></p>	

		<h3><?=$title_p3[$lang_num]?></h3>
		<p><?=$private_p3_1[$lang_num]?></p>	

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
