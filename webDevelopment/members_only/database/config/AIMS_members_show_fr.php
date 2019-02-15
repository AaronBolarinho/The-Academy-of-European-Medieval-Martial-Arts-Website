<?php
// Program: AIMS_members_show_fr.php
//	Description: source for the French textual content on the main members record detailed presentation (Members_show.php)
//	2016 ------------------
//
// English content -------------------
$title[1] = "AEMMA de gestion de l'information (AIMS)";
$non_armigerous_text[1] = "Ce membre est pas armigerous, ou, dans le moins, l'octroi d'armes n'a pas été entré dans GIMS dossiers d'adhésion. Si ce membre est armigerous, utiliser ce formulaire pour entrer les informations pertinentes.";
$header_bar[1] = "AEMMA ADMINISTRATION MEMBRES";
if ($state == "Update")
	{ $header_state[1] = "mettre à jour"; }
elseif ($state == "Create")
	{ $header_state[1] = "créer"; }
else	{ $header_state[1] = $state; }


// tab names
$tab0[1] = "profil personnel";
$tab1[1] = "profil d'adhésion";
$tab2[1] = "Profil de formation";
$tab3[1] = "profil financier";
$tab4[1] = "Equipment Profile";
$tab5[1] = "Accoutrements";
$tab6[1] = "Injuries Report";
$tab7[1] = "profil armigerous";
$tab8[1] = "profil username/mot de passe";



?>
