<?php
// main.php == created: March 09, 2016
// author: David M. Cvet
// Description: this script is the working home page for the AEMMA website. The idea is to embedd the facebook
//		in order to make this home page reactive
//---------------------------
// Updates:
//	2016 ----------
//
if (isset($_GET['LANG'])) { $current_pgm = "main.php"; $menu_selected = "home"; } else { $current_pgm = ""; $menu_selected = "";}
include "php-bin/retrieve_cookies.php";
include "config/config.php";
include "config/content_main_$lang.php";
$path = "";
$title[$lang_num] = $AEMMA_title[$lang_num];
include "php-bin/header.php";
?>
  <script src="js-bin/jquery.min_v1.9.1.js"></script>
  <script async src="js-bin/consolidated_min.js"></script>
  <script>
	$( function()
	{
//		$( '#nav li:has(ul)' ).doubleTapToGo();
		$( '#nav li:has(ul)' ).doubleTapToGo();
	});
  </script>
  <script>
	$(function () {
	// Slideshow
	$(".rslides").responsiveSlides({
		// ** notes: default settings in ResponsiveSlides.min.js **
		//"auto": true, 		// Boolean: Animate automatically, true or false
		//"speed": 500, 		// Integer: Speed of the transition, in milliseconds
		//"timeout": 4000, 		// Integer: Time between slide transitions, in milliseconds
		//"pager": false, 		// Boolean: Show pager, true or false
		//"nav": false, 		// Boolean: Show navigation, true or false
		//"random": false, 		// Boolean: Randomize the order of the slides, true or false
		//"pause": false, 		// Boolean: Pause on hover, true or false
		//"pauseControls": true,	// Boolean: Pause when hovering controls, true or false
		//"prevText": "Previous", 	// String: Text for the "previous" button
		//"nextText": "Next", 		// String: Text for the "next" button
		//"maxwidth": "", 		// Integer: Max-width of the slideshow, in pixels
		//"navContainer": "", 		// Selector: Where auto generated controls should be appended to, default is after the <ul>
		//"manualControls": "", 	// Selector: Declare custom pager navigation
		//"namespace": "rslides", 	// String: change the default namespace used
		//"before": $.noop, 		// Function: Before callback
		//"after": $.noop 		// Function: After callback

		// ** revised settings
		speed: 3500,
		timeout: 15000,
		maxwidth: 650,
		random: true
		});
	});
  </script>
<?php
include "php-bin/header2.php";
?>
	<!-- begin page content -->
	<div id="main_content">
		<!-- begin == this is the main body of the page for content -->
		<img src="images/1090x4_transparent.png" alt="" width="100%" />
<!--		<div style="height:600px;width:100%;">-->
			<div class="div_main_paragraph">
				<h3><?=$main_heading[$lang_num]?></h3>
				<p><?=$main_paragraph[$lang_num]?></p>
			</div>
			<div class="div_main">
				<ul class="rslides">
      				<li><img src="images/main_page/AEMMA_1.jpg" alt="Academy of European Medieval Martial Arts" /></li>
     				<li><img src="images/main_page/AEMMA_2.jpg" alt="Academy of European Medieval Martial Arts" /></li>
     				<li><img src="images/main_page/AEMMA_3.jpg" alt="Academy of European Medieval Martial Arts" /></li>
     				<li><img src="images/main_page/AEMMA_4.jpg" alt="Academy of European Medieval Martial Arts" /></li>
    				<li><img src="images/main_page/AEMMA_5.jpg" alt="Academy of European Medieval Martial Arts" /></li>
    				<li><img src="images/main_page/AEMMA_6.jpg" alt="Academy of European Medieval Martial Arts" /></li>
    				<li><img src="images/main_page/AEMMA_7.jpg" alt="Academy of European Medieval Martial Arts" /></li>
    				<li><img src="images/main_page/AEMMA_8.jpg" alt="Academy of European Medieval Martial Arts" /></li>
    				<li><img src="images/main_page/AEMMA_9.jpg" alt="Academy of European Medieval Martial Arts" /></li>
    				<li><img src="images/main_page/AEMMA_10.jpg" alt="Academy of European Medieval Martial Arts" /></li>
    			</ul>
			</div>
<!--
			<div style="float:right;margin-top:0;margin-right:2%;margin-top:2%;border-style:ridge;width:30%;height:550px;background-color:#FFE5B4;">
				<p style="text-align:center;"><b>Put stuff/announcements/notices here...</b></p>
			</div>
-->
			<div class="div_main_postit">
				<div class="quote-container">
					<i class="pin"></i>
					<blockquote class="note yellow">
					<div style="float:left;width:70%;margin-top:6%;margin-left:12%;"><img src="images/AEMMA_logo_white_200_transparent.png" width="100%" alt="" /></div>
<!--					Funds are due for the longsword order from Regenyei Armory. Cash/EFT to Brian ASAP.-->
					<cite class="author">AEMMA</cite>
					</blockquote>
				</div>
			</div>
		<!-- </div> -->
		<!-- end == this is the end of the main body of the page for content -->
	</div><!-- main_content -->
<?php
// begin footer
include "php-bin/footer.php";
// end footer
?>
</div><!-- container -->
</body></html>
