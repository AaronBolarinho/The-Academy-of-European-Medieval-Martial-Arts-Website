<?php
// Program: config.php
//	Description: a single location for a variety of global variables for the AEMMA
//	2017 ------------------
//	jun 28:	added start and end times variables for the intro to armizare course page whereas, the training descriptions, start, end times are soured from
//		the database table: Training_Schedule, the fee for the course set in this config.php
//

$content = "content/";

$AEMMA_title[0]	= "The Academy of European Medieval Martial Arts";
$AEMMA_title[1]	= "L'Académie de l'Europe médiévale Arts Martiaux";
$copyright[0] = "COPYRIGHT";
$copyright[1] = "droits d'auteur";
$banner_image[0] = "banner_1500_en.jpg";
$banner_image[1] = "banner_1500_fr.jpg";

$language_selection_image[0]	= "english_lang.png";
$language_title[0]		= "Click to view the English site";
$language_selection_image[1]	= "french_lang.png";
$language_title[1]		= "Cliquez ici pour voir le site en français";

// intro to armizare begin and end times, fee
$intro_armizare_start_time[0]	= "7:30 pm";
$intro_armizare_end_time[0]	= "9:00 pm";
$intro_armizare_start_time[1]	= "19:30 h";
$intro_armizare_end_time[1]	= "21:00 h";
$intro_fee 			= "100";	// the fee for the introductory course on Armizare, a change to the fee requires new paypal code generated for about_new.php

// begin email variables
$email_access			= "access";
$email_access_1st_qual		= "aemma";
$email_access_2nd_qual		= "org";

// email variables for guest visit form
$at = "@";
$first_qualifier = "aemma";
$second_qualifier = "org";
$eaddy_1 = "david.cvet";
//$eaddy_2 = "brian.mcilmoyle";
$eaddy_2 = "david.cvet";

$eaddy_tor_1 = "krekuta";
$eaddy_tor_2 = "aldo.valente";
$eaddy_tor_3 = "aaron.bolarinho";

$eaddy_gue_1 = "david.murphy";
$eaddy_gue_2 = "aaron.beatty";

$eaddy_str_1 = "william.brickman";
$eaddy_str_2 = "";

//$eaddy_dig_1 = "jurgen.griegoschewski";
//$eaddy_dig_2 = "robert.wilkinson";
$eaddy_dig_1 = "david.cvet";
$eaddy_dig_2 = "david.cvet";

$eaddy_ott_1 = "beau.brock";
$eaddy_ott_2 = "";



?>
