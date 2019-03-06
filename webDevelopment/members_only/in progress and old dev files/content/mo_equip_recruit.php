<?php
// 	Program: 	mo_equip_recruit.php
//	Description: 	A presentation of the required and standard equipment for the rank of recruit, created July 12, 2017
//	Author:		David M. Cvet
//
//	2019 ------------------
//	jan 25:	standardized path names
//
$lang = "en";
$modal = 0;					// no need for modal popups as there are no database operations in this script
$lang_num = 0;
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories
$current_pgm = "mo_equip_recruit.php";
$menu_selected = "training";
$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";

session_start();
// begin check if the browser is still in session with DBLogin
$check_session = $path_members."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $path_members."config/config.php"; include "$config";
$config_about = $path_members."config/content_mo_equip_recruit_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
$num = rand(1,3);
?>
<!-- <script type="text/javascript" src="../js-bin/test.js"></script> -->
<?php
 //include CSS Style Sheet
 echo "<link rel='stylesheet' type='text/css' href='../css/test.css' />";

 //include a javascript file
 echo "<script type='text/javascript' src='../js-bin/test.js'></script>";
?>

	<!-- begin main_content -->
	<div class="main_content_mods">
		<h2><?=$banner[$lang_num]?></h2>
		<h1 class="test textFont">Equipment Requirements</h1>
		<p class="textFont">&nbsp;&nbsp;&nbsp;&nbsp;Equipment costs for recruits in all AEMMA salles is quite low. What gear you do need will be provided for you during your first few months; this will give you time to organise your finances and your future purchases.</p>
		<p class="textFont">&nbsp;&nbsp;&nbsp;&nbsp;Talk to your salle's Free Scholar and senior students when you are ready to start purchasing gear. While you are encouraged to make purchases yourself, there are semi-regular group orders which you may have access to.</p>
		<p class="textFont">&nbsp;&nbsp;&nbsp;&nbsp;Below, you will find a list of the gear you need, suggested versions of that gear, and a broad purchasing timeline. As always, if you have any questions, ask your fellow salle members or pose your question to AEMMA members online.</p>
		<h2 class="test textFont">Needed Your First Day:</h2>

<div class="buttonGroup">
	<button class="indoorShoesButton" onclick="myFunction()">Click Me</button>
	<button class="indoorShoesButton" onclick="myFunction()">Click Me</button>
	<button class="indoorShoesButton" onclick="myFunction()">Click Me</button>
</div>

<div class="text_container textFont" id="myDIV" style="display: none;">
<h3 class="test textFont">Indoor Shoes</h3>

		<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides  fade">
    <div class="numbertext">1 / 3</div>
    <img src="../images/about_pas_d_armes_2010.jpg" style="width:100%">
    <div class="text">Caption One</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="../images/about_unarmoured_tourney_2009_400.jpg" style="width:100%">
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="../images/about_unarmoured_tourney_2009_400.jpg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

</div>

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
