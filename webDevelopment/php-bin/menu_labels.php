<?php
//
// menu_labels.php == created: January 24, 2016 (AEMMA)
// Author:	David M. Cvet
// Description: This script populates a variety of arrays with the names of the menu/navigation labels based on 
//		language preference ($lang). This essentially outsources the labels of each item from the menu
//		script which includes titles and sub-titles of pages to this script to ease maintenance of the 
//		code by consolidating labels into a single script.
//		Note: $title = title of web page in the main body of the presentation
//		Note: $subtitle = title of main browser across the top of the browser page
// Additional details:
// setup navigation menu where first element = language, second element = navigation category, third element = menu item 
// first element = 0 = English; first element = 1 = French;
//
// Updates:
//	2017 ----------
//
// English menu labels ------------
$home[0] = "home";
$AEMMA[0] = "about AEMMA";
	$academy[0] = "about AEMMA";
		$about[0] = "about the Academy";
		$arms[0] = "the Academy's armorial bearings";
		$history[0] = "history of AEMMA";
		$contact[0] = "contact us";
		$disclaimer[0] = "disclaimer";
		$privacy[0] = "privacy & security";
	$governance[0] = "governance";
		$exec[0] = "executive committee";
		$instructors[0] = "instructors";
	$chapters[0] = "AEMMA Chapters";
		$guelph[0] = "<img src='".$path."images/icons/facebook.gif' alt='' width='20' />AEMMA Guelph, ON";
		$digby[0] = "<img src='".$path."images/icons/facebook.gif' alt='' width='20' />AEMMA Digby, NS";
		$stratford[0] = "AEMMA Stratford, ON";
		$ottawa[0] = "<img src='".$path."images/icons/facebook.gif' alt='' width='20' />AEMMA Ottawa, ON";
	$fees[0] = "training fees";
	$schedule[0] = "training schedule";
	$location[0] = "location of the salle d'armes";
	$photos[0] = "photos of the salle d'armes";
	$guest[0] = "visit the Academy";
	$new[0] = "<img src='".$path."images/icons/new.png' alt='' width='20' />new to this? start here...";
	$faqs[0] = "<img src='".$path."images/icons/faqs.gif' alt='' width='20' />frequently asked questions";
	$news[0] = "<img src='".$path."images/icons/news.png' alt='' width='20' />news & press releases";
	$facebook[0] = "<img src='".$path."images/icons/facebook.gif' alt='' width='20' />visit us on facebook";
$armizare[0] = "<i>l`arte dell`armizare</i>";
	$italian_art[0] = "Italian art of arms";
	$fiore[0] = "Maestro Fiore dei Liberi";
//	$sources[0] = "codex médiévaux de l'art";
//		$pd[0] = "Pisani-Dossi Ms.";
//		$getty[0] = "Ms. Ludwig XV13 (codex 'GETTY')";
//		$morgan[0] = "Ms. M.383 (codex 'MORGAN')";
//		$bnf[0] = "Mss. LATIN 11269 (BNF)";
//		$LXXIV[0] = "Codices LXXXIV and CX";
$training[0] = "training";
	$intro[0] = "<img src='".$path."images/icons/new.png' alt='' width='20' />introduction to armizare";
	$styles[0] = "<img src='".$path."images/icons/swordShield.gif' alt='' width='20' />styles of combat training";
		$grappling[0] = "<img src='".$path."images/training/grappling.jpg' alt='' width='20' />grappling <i>(abrazare)</i>";
		$dagger[0] = "<img src='".$path."images/training/dagger.jpg' alt='' width='20' />dagger <i>(daga)</i>";
		$sword[0] = "<img src='".$path."images/training/sword.jpg' alt='' width='20' />sword <i>(spada)</i>";
		$poleweapon[0] = "<img src='".$path."images/training/poleweapon.jpg' alt='' width='20' />spear & poleaxe <i>(lanza & azza)</i>";
		$armoured[0] = "<img src='".$path."images/training/armoured.jpg' alt='' width='20' />armoured <i>(arme)</i>";
		$sword_buckler[0] = "<img src='".$path."images/training/sword_buckler.jpg' alt='' width='20' />sword & buckler";
		$rapier[0] = "<img src='".$path."images/training/rapier.jpg' alt='' width='20' />Italian rapier</i>";
	$ranks[0] = "<img src='".$path."images/icons/rank.png' alt='' width='20' />ranks @ AEMMA";
		$rnk_intro[0] = "introduction";
		$rnk_recruit[0] = "<img src='".$path."images/icons/R-recruit.png' alt='' width='20' />recruit";
		$rnk_scholler[0] = "<img src='".$path."images/icons/S-scholler.png' alt='' width='20' />scholler";
		$rnk_free_scholler[0] = "<img src='".$path."images/icons/F-freeScholler.png' alt='' width='20' />free scholler";
		$rnk_provost[0] = "<img src='".$path."images/icons/P-provost.png' alt='' width='20' />provost";
		$rnk_maestro[0] = "<img src='".$path."images/icons/M-maestro.png' alt='' width='20' />maestro";
	$equipment[0] = "<img src='".$path."images/icons/shoe.png' alt='equipment requirements' width='20' />equipment requirements";
		$equip_recruit[0] = "recruit gear";
		$equip_scholar[0] = "scholar gear";
	$archery[0] = "<img src='".$path."images/training/archery.jpg' alt='longbow & recurve archery' width='20' />longbow & recurve archery";
//	$curriculum[0] = "programme d'études";
//		$curr_novice[0] = "formation novice";
//		$curr_scholar[0] = "formation scholar";
	$private[0] = "<img src='".$path."images/icons/private.png' alt='private lessons' width='20' />private lessons";
$resources[0] = "resources";
//	$res_gallery[0] = "<img src='".$path."images/icons/camera_15h.gif' alt='' width='20' />gallery";
	$res_blog[0] = "<img src='".$path."images/icons/blogger.png' alt='AEMMA blog' width='20' />AEMMA blog";
	$res_facebook[0] = "<img src='".$path."images/icons/facebook.gif' alt='AEMMA facebook' width='20' />AEMMA facebook";
	$res_faqs[0] = "<img src='".$path."images/icons/faqs.gif' alt='AEMMA FAQs' width='20' />AEMMA FAQs";
	$res_archery[0] = "<img src='".$path."images/icons/facebook.gif' alt='AEMMA FAQs' width='20' />AEMMA archery";
	$res_youtube[0] = "<img src='".$path."images/icons/youTube.jpg' alt='AEMMA Youtube Channel' width='20' />AEMMA Youtube Channel";
	$res_heraldry[0] = "<img src='".$path."images/icons/rhsc_24.gif' alt='heraldry' width='20' />heraldry";
		$what_is_heraldry[0] = "<img src='".$path."images/icons/rhsc_24.gif' alt='heraldry' width='20' />what is heraldry?";
		$her_misconceptions[0] = "<img src='".$path."images/icons/rhsc_24.gif' alt='heraldry' width='20' />common misconceptions";
		$her_history[0] = "<img src='".$path."images/icons/rhsc_24.gif' alt='heraldry' width='20' />history of heraldry";
		$her_books[0] = "<img src='".$path."images/icons/rhsc_24.gif' alt='heraldry' width='20' />recommended books";
		$her_forums[0] = "<img src='".$path."images/icons/rhsc_24.gif' alt='heraldry' width='20' />heraldry forums";
		$rhsc[0] = "<img src='".$path."images/icons/rhsc_24.gif' alt='heraldry' width='20' />Royal Heraldry Society of Canada";
		$rhsc_facebook[0] = "<img src='".$path."images/icons/facebook.gif' width='20' alt='RHSC facebook' />RHSC facebook";
	$online_library[0] = "<img src='".$path."images/icons/book_24.gif' width='22' alt='AEMMA online library' />online library";
		$overview[0] = "<img src='".$path."images/letters/number_0.png' alt='' width='20' />overview and usage";
		$eleventh[0] = "<img src='".$path."images/letters/number_11.png' alt='' width='20' />11-14th centuries";
		$fifteenth[0] = "<img src='".$path."images/letters/number_15.png' alt='' width='20' />15th century";
		$sixteenth[0] = "<img src='".$path."images/letters/number_16.png' alt='' width='20' />16th century";
		$seventeeth[0] = "<img src='".$path."images/letters/number_17.png' alt='' width='20' />17th century";
		$eighteenth[0] = "<img src='".$path."images/letters/number_18.png' alt='' width='20' />18th century";
		$nineteenth[0] = "<img src='".$path."images/letters/number_19.png' alt='' width='20' />19th century";
		$twentieth[0] = "<img src='".$path."images/letters/number_20.png' alt='' width='20' />20th century";
		$twentyfirst[0] = "<img src='".$path."images/letters/number_21.png' alt='' width='20' />21st century";
$contact[0] = "contact us";
$members_only[0] = "members' area";
	$members_only_login[0] = "<img src='".$path."images/icons/lock_icon.gif' alt='' />&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

// French menu labels ------------
$home[1] = "accueil";
$AEMMA[1] = "à propos d'AEMAM";
	$academy[1] = "à propos d'AEMAM";
		$about[1] = "à propos de l'Académie";
		$arms[1] = "armoiries de l'Académie";
		$history[1] = "l'histoire d'AEMAM";
		$contact[1] = "contactez nous";
		$disclaimer[1] = "avertissement";
		$privacy[1] = "confidentialité";
	$governance[1] = "gouvernance";
		$exec[1] = "comité exécutif";
		$instructors[1] = "instructeurs";
	$chapters[1] = "chapitres de AEMAM";
		$guelph[1] = "<img src='".$path."images/icons/facebook.gif' alt='' width='20' />AEMAM Guelph, ON";
		$digby[1] = "<img src='".$path."images/icons/facebook.gif' alt='' width='20' />AEMAM Digby, NS";
		$stratford[1] = "AEMAM Stratford, ON";
		$ottawa[1] = "<img src='".$path."images/icons/facebook.gif' alt='' width='20' />AEMAM Ottawa, ON";
	$fees[1] = "frais de formation";
	$schedule[1] = "l'horaire d'entraînement";
	$location[1] = "emplacement de la salle d'armes";
	$photos[1] = "photos de la salle d'armes";
	$guest[1] = "visiter l'Académie";
	$new[1] = "<img src='".$path."images/icons/nouveau.png' alt='' width='20' />nouveau à cela? commencer ici...";
	$faqs[1] = "<img src='".$path."images/icons/faqs.gif' alt='' width='20' />questions fréquemment posées";
	$news[1] = "<img src='".$path."images/icons/news.png' alt='' width='20' />actualités  &amp;  communiqués de presse";
	$facebook[1] = "<img src='".$path."images/icons/facebook.gif' alt='' width='20' />visitez-nous sur facebook";
$armizare[1] = "<i>l`arte dell`armizare</i>";
	$italian_art[1] = "art Italien des armes";
	$fiore[1] = "Maestro Fiore dei Liberi";
	$sources[1] = "codex médiévaux de l'art";
		$pd[1] = "Pisani-Dossi Ms.";
		$getty[1] = "Ms. Ludwig XV13 (codex 'GETTY')";
		$morgan[1] = "Ms. M.383 (codex 'MORGAN')";
		$bnf[1] = "Mss. LATIN 11269 (BNF)";
		$LXXIV[1] = "Codices LXXXIV and CX";
$training[1] = "entraînement";
	$intro[1] = "<img src='".$path."images/icons/nouveau.png' alt='' width='20' />introduction à l'armizare";
	$styles[1] = "types de formation de combat";
		$grappling[1] = "<img src='".$path."images/training/grappling.jpg' alt='' width='20' />grappling <i>(abrazare)</i>";
		$dagger[1] = "<img src='".$path."images/training/dagger.jpg' alt='' width='20' />poignard <i>(daga)</i>";
		$sword[1] = "<img src='".$path."images/training/sword.jpg' alt='' width='20' />épée <i>(spada)</i>";
		$poleweapon[1] = "<img src='".$path."images/training/poleweapon.jpg' alt='' width='20' />armes polaires <i>(lanza & azza)</i>";
		$armoured[1] = "<img src='".$path."images/training/armoured.jpg' alt='' width='20' />armure <i>(arme)</i>";
		$sword_buckler[1] = "<img src='".$path."images/training/sword_buckler.jpg' alt='' width='20' />épée & bouclier";
		$rapier[1] = "<img src='".$path."images/training/rapier.jpg' alt='' width='20' />rapière italiennes</i>";
	$ranks[1] = "rangs @ AEMAM";
		$rnk_intro[1] = "introduction";
		$rnk_recruit[1] = "recruter";
		$rnk_scholler[1] = "étudiant";
		$rnk_free_scholler[1] = "étudiant gratuit";
		$rnk_provost[1] = "prévôt";
		$rnk_maestro[1] = "maestro";
	$equipment[1] = "les besoins en équipement";
		$equip_recruit[1] = "équipement de recruter";
		$equip_scholar[1] = "équipement de scholar";
	$archery[1] = "<img src='".$path."images/training/archery.jpg' alt='' width='20' />arbalète et tir à l'arc recourbée";
//	$curriculum[1] = "programme d'études";
//		$curr_novice[1] = "formation novice";
//		$curr_scholar[1] = "formation scholar";
	$private[1] = "cours particuliers";
$resources[1] = "ressources";
	$res_gallery[1] = "<img src='".$path."images/icons/camera_15h.gif' alt='' width='20' />galerie";
	$res_blog[1] = "<img src='".$path."images/icons/blogger.png' alt='' width='20' />AEMAM blog";
	$res_facebook[1] = "<img src='".$path."images/icons/facebook.gif' alt='' width='20' />AEMAM facebook";
	$res_faqs[1] = "<img src='".$path."images/icons/faqs.gif' alt='' width='20' />AEMAM QFPs";
	$res_archery[1] = "<img src='".$path."images/icons/facebook.gif' alt='AEMAM tir à l\'arc' width='20' />AEMAM tir à l'arc";
	$res_youtube[1] = "<img src='".$path."images/icons/youTube.jpg' alt='' width='20' />chaîne AEMAM Youtube";
	$res_heraldry[1] = "<img src='".$path."images/icons/rhsc_24.gif' alt='' width='20' />héraldique";
		$what_is_heraldry[1] = "<img src='".$path."images/icons/rhsc_24.gif' alt='heraldry' width='20' />ce qui est héraldiques ?";
		$her_misconceptions[1] = "<img src='".$path."images/icons/rhsc_24.gif' alt='heraldry' width='20' />idées fausses";
		$her_history[1] = "<img src='".$path."images/icons/rhsc_24.gif' alt='heraldry' width='20' />l'histoire de l'héraldique";
		$her_books[1] = "<img src='".$path."images/icons/rhsc_24.gif' alt='heraldry' width='20' />livres recommandés";
		$her_forums[1] = "<img src='".$path."images/icons/rhsc_24.gif' alt='heraldry' width='20' />forums héraldiques";
		$rhsc[1] = "<img src='".$path."images/icons/rhsc_24.gif' alt='heraldry' width='20' />Société royale héraldique du Canada";
		$rhsc_facebook[1] = "<img src='".$path."images/icons/facebook.gif' width='20' alt='' />SRHC facebook";
	$online_library[1] = "<img src='".$path."images/icons/book_24.gif' width='20' alt='' />bibliothèque en ligne";
		$overview[1] = "<img src='".$path."images/letters/number_0.png' alt='' width='20' />vue d'ensemble et l'utilisation";
		$eleventh[1] = "<img src='".$path."images/letters/number_11.png' alt='' width='20' />11-14 siècles";
		$fifteenth[1] = "<img src='".$path."images/letters/number_15.png' alt='' width='20' />15ème siècle";
		$sixteenth[1] = "<img src='".$path."images/letters/number_16.png' alt='' width='20' />16ème siècle";
		$seventeeth[1] = "<img src='".$path."images/letters/number_17.png' alt='' width='20' />17ème siècle";
		$eighteenth[1] = "<img src='".$path."images/letters/number_18.png' alt='' width='20' />18ème siècle";
		$nineteenth[1] = "<img src='".$path."images/letters/number_19.png' alt='' width='20' />19ème siècle";
		$twentieth[1] = "<img src='".$path."images/letters/number_20.png' alt='' width='20' />20ième siècle";
		$twentyfirst[1] = "<img src='".$path."images/letters/number_21.png' alt='' width='20' />21e siècle";
$contact[1] = "contactez nous";
$members_only[1] = "zone des membres";
	$members_only_login[1] = "<img src='".$path."images/icons/lock_icon.gif' alt='' />&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

?>
