<?php
ini_set('display_errors', 'On');
// 	Program: 	about_contact.php
//	Description: 	Contact the Academy, created April 22, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//	dec 07:	 adjusted the Halifax contact to Ottawa
//
$lang = "en";
$modal = 0;					// no need for modal popups as there are no database operations in this script
$lang_num = 0;
$members_only_path = "../";			// the location of the members only scripts and files with respect to this calling script
$dbase_path = $path = "../database/";		// the location of the database scripts and files with respect to this calling script
$current_pgm = "about_contact.php";
$menu_selected = "AEMMA";

$ss_path = $dbase_path."ss_path.stuff"; include "$ss_path";
$db_path = $dbase_path."DB.php"; include "$db_path";
session_start();
// begin check if the browser is still in session with DBLogin
$check_session = $members_only_path."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session
//$idvalid = $dbase_path."IDValid.php"; include_once "$idvalid";
$retrieve = $members_only_path."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $members_only_path."config/config.php"; include "$config";
$config_about = $members_only_path."config/content_about_contact_$lang.php"; include "$config_about";
$header = $members_only_path."php-bin/members_only_header.php"; include "$header";
$header2 = $members_only_path."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<div class="contact_salles">
			<h3><?=$direct_contacts_title[$lang_num]?></h3>
			<p><?=$direct_contacts[$lang_num]?></p>

			<p><?=$general_contacts[$lang_num]?></p>
			<p><?=$p1[$lang_num]?></p>
		</div>
		<div class="contact_salles">
			<div class="contact_salles_image"><a href="https://www.google.ca/maps/place/927+Dupont+St,+Toronto,+ON+M6H+1Z1/@43.670075,-79.4323169,17z/data=!3m1!4b1!4m2!3m1!1s0x882b34639c563297:0x72223dde5e1ba4b8?hl=en" target="_blank" title="click to view map on directions to the Toronto location"><img src="../images/city_toronto.jpg" alt="" width="100%" class="box fade" /></a></div>
			<div class="contact_salles_p"><h3><?=$title_toronto[$lang_num]?></h3><p><?=$p1_toronto[$lang_num]?></p></div>
		</div>
		<div class="contact_salles">
			<div class="contact_salles_image"><a href="https://www.google.ca/maps/place/75+Ottawa+Crescent,+Guelph,+ON+N1E+2A8/@43.56281,-80.2471673,17z/data=!3m1!4b1!4m2!3m1!1s0x882b9af7a1479953:0x732161d530e85669?hl=en" target="_blank" title="click to view map on directions to the Guelph location"><img src="../images/city_guelph.jpg" alt="" width="100%" class="box fade" /></a></div>
			<div class="contact_salles_p"><h3><?=$title_guelph[$lang_num]?></h3><p><?=$p1_guelph[$lang_num]?></p></div>
		</div>
		<div class="contact_salles">
			<div class="contact_salles_image"><a href="https://www.google.ca/maps/place/Digby+Elementary+School/@44.6196708,-65.769947,17z/data=!3m1!4b1!4m2!3m1!1s0x4ca81d05f55d791f:0x3a9df6ae2c47fed9?hl=en" target="_blank" title="click to view map on directions to the Digby location"><img src="../images/city_digby.jpg" alt="" width="100%" class="box fade" /></a></div>
			<div class="contact_salles_p"><h3><?=$title_digby[$lang_num]?></h3><p><?=$p1_digby[$lang_num]?></p></div>
		</div>
		<div class="contact_salles">
			<div class="contact_salles_image"><a href="https://www.google.ca/maps/place/35+Mowat+St,+Stratford,+ON+N5A/@43.3619215,-80.9850722,17z/data=!3m1!4b1!4m2!3m1!1s0x882eadfe954f02f1:0x3eb2097c1e2ef6b7?hl=en" target="_blank" title="click to view map on directions to the Stratford location"><img src="../images/city_stratford.jpg" alt="" width="100%" class="box fade" /></a></div>
			<div class="contact_salles_p"><h3><?=$title_stratford[$lang_num]?></h3><p><?=$p1_stratford[$lang_num]?></p></div>
		</div>
		<div class="contact_salles">
			<div class="contact_salles_image"><a href="https://www.google.ca/maps/place/Ottawa,+ON/@45.2487794,-76.3620587,9z/data=!3m1!4b1!4m5!3m4!1s0x4cce05b25f5113af:0x8a6a51e131dd15ed!8m2!3d45.4215296!4d-75.6971931?hl=en" target="_blank" title="click to view map on directions to the Ottawa location"><img src="../images/city_ottawa.jpg" alt="" width="100%" class="box fade" /></a><br />&nbsp;</div>
			<div class="contact_salles_p"><h3><?=$title_ottawa[$lang_num]?></h3><p><?=$p1_ottawa[$lang_num]?></p></div>
		</div>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
