<?php
// 	Program: 	members_only_menu.php
//	Description: 	The default menu navigation bar for the RHSC appearing on all pages with differences 
//			made by variables, created January 2016.
//	Author:		David M. Cvet
//
//	2016 ------------------
//	nov 02:	added code to check on database connection, AIMS menu item and its drop-down selections
//	2019 ------------------
//	jan 25:	standardized path names
//
//echo ('debug:members_only_menu:10:$aims="'.$aims.'"');
$content = "content/";
?>
<script language="javascript">
function change_lang(pgm,lang,path,content,ms) {
if (lang == "en")
	{ lang_num = 1; lang = "fr"; }
else
	{ lang_num = 0; lang = "en"; }
// reset cookies to new language selected
var cookie_lang = "cookie_lang";
var cookie_num = "cookie_num";
document.cookie="cookie_lang=" + lang + "; path=/"; 
document.cookie="cookie_num=" + lang_num + "; path=/"; 

// create call PHP string
var new_pgm = "";
if (pgm == "oslj_contact.php")
	{ pgm = pgm + "?MN=" + ms; }
location.href=pgm;
}
</script>

<?php
if (!isset($_SESSION['UserID'])) {$check_session = $path_members."php-bin/sub_check_session_expiration.php"; include "$check_session";}

$sub_network = $path_members."php-bin/sub_network.php";
include "$sub_network";					// this script tests the network access, if the internet is down, then this system will operate locally (posting data locally for later transmission)
$bgcolor = "red";
if ($network_up)
	{
	// no point checking if there is a database connection if the network is down!
	$sub_dbase = $path_members."php-bin/sub_dbase_connection_check.php";
	include "$sub_dbase";				// this script tests whether or not the PHP session continues to have a connection with the database, if not, log in again
	$network_icon = "gnome_network_transmit.png";
	if ($lang == "en")
		{ $network_title = "This icon indicates that an internet connection is active and working as expected."; }
	else
		{ $network_title = "Cette icône indique que la connexion Internet est active et fonctionne comme prévu."; }
	}
else
	{
	$network_icon = "gnome_network_offline.png";
	$database_icon = "delete_database.png";
	if ($lang == "en")
		{
		$network_title = "This icon indicates that an internet connection is down or inactive.";
		$database_title = "This icon indicates that the database connection has been lost as a result of a loss of internet connection."; 
		}
	else
		{
		$network_title = "Cette icône indique qu'une connexion Internet est en panne ou inactif.";
		$database_title = "Cette icône indique que la connexion de base de données a été perdue à la suite d'une perte de connexion Internet."; 
		}
	}
if (!$dbase_connection)
	{
	// database connection has been lost or expired
	$bgcolor = "red";	// background colour of the logged in field on the end of the menu strip
	$database_icon = "delete_database.png";
	if ($lang == "en")
		{$database_title = "This icon indicates that the database connection has been lost or has not been connected to as yet.  You will need to login to the system again in order to be able to perform any functions."; }
	else
		{ $database_title = "Cette icône indique que la connexion de base de données a été perdu ou n'a pas été encore connecté à . Vous devez vous identifier à nouveau au système afin d' être en mesure de remplir les fonctions."; }
	}
else
	{
	$bgcolor = "green";	// background colour of the logged in field on the end of the menu strip
	$database_icon = "database_good.png";
	if ($lang == "en")
		{
		$database_title = "This icon indicates that the database connection is good.  The Members' Only Area should be operating normally.";
		 $logged_in = "logged in as:";
		}
	else
		{
		$database_title = "Cette icône indique que la connexion de base de données est bonne . Seulement les alentours Les membres de devrait fonctionner normalement.";
		$logged_in = "connecté en tant que :"; 
		}
	}

include "members_only_menu_labels.php";
$style			= "style=\"background-color:#c3383d;color:white;\"";	// the background colour of the menu item when selected  (redish - colour from arms) and color of font
//$style			= "style=\"background-color:#3c5f4b;\"";	// the background colour of the menu item when selected (greenish - colour from arms) and color of font
$style_home 		= "";
$style_AEMMA 		= "";
$style_armizare		= "";
$style_training		= "";
$style_resources	= "";
$style_aims		= "";
$style_admin		= "";
$style_AIMS		= "";
$style_logout		= "";
$style_lang		= "";
switch($menu_selected)
	{
	case "home":
		$style_home = $style;
		break;
	case "logout":
		$style_logout = $style;
		break;
	case "AEMMA":
		$style_AEMMA = $style;
		break;
	case "armizare":
		$style_armizare = $style;
		break;
	case "training":
		$style_training = $style;
		break;
	case "resources":
		$style_resources = $style;
		break;
	case "admin":
		$style_admin = $style;
		break;
	case "AIMS":
		$style_AIMS = $style;
		break;
	case "lang":
		$style_lang = $style;
		break;
	}
?>
	<nav id="menu_bar">
		<input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
		<ul id="css3menu">
			<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
			<li class="topfirst"><a href="<?=$path_members?>index.php?LANG=<?=$lang?>" title="" <?=$style_home?>>&nbsp;&nbsp;<?=$home[$lang_num]?>&nbsp;&nbsp;</a></li>
<?php
if ($aims == 1)
	{ echo ('			<li class="topmenu"><a href="'.$path_dbase.'Logout.php?AIMS=1" title="" '.$style_logout.'>&nbsp;&nbsp;'.$logout[$lang_num].'&nbsp;&nbsp;</a></li>'); }
else
	{ echo ('			<li class="topmenu"><a href="'.$path_dbase.'Logout.php" title="" '.$style_logout.'>&nbsp;&nbsp;'.$logout[$lang_num].'&nbsp;&nbsp;</a></li>'); }
?>
			<li class="topmenu"><a href="#" title="" <?=$style_AEMMA?>><span>&nbsp;&nbsp;<?=$AEMMA[$lang_num]?>&nbsp;&nbsp;</span></a>
				<ul class="submenu">
					<li class="subfirst"><a href="#"><span><?=$academy[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>mo_about_about.php" ><?=$about[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_about_arms.php" ><?=$arms[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_about_history.php" ><?=$history[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_about_contact.php" ><?=$contact[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_about_rules.php" ><?=$rules[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_about_disclaimer.php" ><?=$disclaimer[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_about_privacy.php" ><?=$privacy[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#"><span><?=$governance[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>mo_about_exec.php" ><?=$exec[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_about_instructors.php" ><?=$instructors[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" ><span><?=$chapters[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="http://guelph.aemma.org" title="" target="_blank"><?=$guelph[$lang_num]?></a></li>
							<li class="subitem"><a href="http://digby.aemma.org" title="" target="_blank"><?=$digby[$lang_num]?></a></li>
							<li class="subitem"><a href="http://stratford.aemma.org" title="" target="_blank"><?=$stratford[$lang_num]?></a></li>
							<li class="subitem"><a href="http://ottawa.aemma.org" title="" target="_blank"><?=$ottawa[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_about_contributing_member.php" title=""><?=$about_contributing_member[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_about_fees.php" title=""><?=$fees[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_about_schedule.php" title=""><?=$schedule[$lang_num]?></a></li>
					<li class="subitem"><a href="#" ><span><?=$locations[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>mo_about_location_toronto.php" title=""><?=$location_toronto[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_about_location_guelph.php" title=""><?=$location_guelph[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_about_location_digby.php" title=""><?=$location_digby[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_about_location_stratford.php" title=""><?=$location_stratford[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_about_location_ottawa.php" title=""><?=$location_ottawa[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>res_calendar.php" title=""><?=$calendar[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_faqs.php" title=""><?=$faqs[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_news.php" title=""><?=$news[$lang_num]?></a></li>
					<li class="subitem"><a href="https://www.facebook.com/groups/AEMMA.1998/" title="" target="_blank"><?=$facebook[$lang_num]?></a></li>
				</ul>
			</li>
										
			<li class="topmenu"><a href="#" title="" <?=$style_armizare?>><span>&nbsp;&nbsp;<?=$armizare[$lang_num]?>&nbsp;&nbsp;</span></a>
				<ul class="submenu">
					<li class="subfirst"><a href="<?=$path_members?><?=$content?>mo_arte_armizare.php" title=""><?=$italian_art[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_fiore_dei_liberi.php" title=""><?=$fiore[$lang_num]?></a></li>
					<li class="subitem"><a href="#" title=""><span><?=$sources[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>mo_fiore_pisani_dossi.php" title=""><?=$pd[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_fiore_getty.php" title=""><?=$getty[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_fiore_morgan.php" title=""><?=$morgan[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_fiore_bnf.php" title=""><?=$bnf[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_fiore_XXIV.php" title=""><?=$LXXIV[$lang_num]?></a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="topmenu"><a href="#" title="" <?=$style_training?>><span>&nbsp;&nbsp;<?=$training[$lang_num]?>&nbsp;&nbsp;</span></a>
				<ul class="submenu">
					<li class="subfirst"><a href="<?=$path_members?><?=$content?>mo_trng_intro_armizare.php" title=""><?=$intro[$lang_num]?></a></li>
					<li class="subitem"><a href="#" title=""><span><?=$styles[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>mo_trng_grappling.php" title=""><?=$grappling[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_trng_dagger.php" title=""><?=$dagger[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_trng_sword.php" title=""><?=$sword[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_trng_pole_weapons.php" title=""><?=$poleweapon[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_trng_armoured.php" title=""><?=$armoured[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_trng_sword_buckler.php" title=""><?=$sword_buckler[$lang_num]?></a></li>
<!--							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_trng_rapier.php" title=""><?=$rapier[$lang_num]?></a></li>-->
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$ranks[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>mo_rnk_recruit.php" title=""><?=$rnk_novice[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_rnk_scholler.php" title=""><?=$rnk_scholler[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_rnk_free_scholler.php" title=""><?=$rnk_free_scholler[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_rnk_provost.php" title=""><?=$rnk_provost[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_rnk_maestro.php" title=""><?=$rnk_maestro[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$equipment[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>mo_equip_recruit.php" title=""><?=$equip_novice[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_equip_scholar.php" title=""><?=$equip_scholar[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_equip_armoured.php" title=""><?=$equip_armoured[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_equip_garments.php" title=""><?=$equip_garments[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$curriculum[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>curr_novice.php" title=""><?=$curr_novice[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>curr_scholar.php" title=""><?=$curr_scholar[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_trng_private_lessons.php" title=""><?=$private[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>mo_trng_archery.php" title=""><?=$archery[$lang_num]?></a></li>
					<li class="subitem"><a href="#" title=""><span><?=$pas[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>pas_undertaking.php" title=""><?=$pas_undertaking[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_planning.php" title=""><?=$pas_planning[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_inspections.php" title=""><?=$pas_inspections[$lang_num]?></a></li>
							<li class="subitem"><a href="#" title=""><span><?=$pas_officials[$lang_num]?></span></a>
								<ul class="submenu">
									<li class="subfirst"><a href="<?=$path_members?><?=$content?>pas_officials.php" title=""><?=$pas_off_patron[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_inspections.php" title=""><?=$pas_off_king[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_inspections.php" title=""><?=$pas_off_procession[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_inspections.php" title=""><?=$pas_off_heralds[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_inspections.php" title=""><?=$pas_off_squires[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_inspections.php" title=""><?=$pas_off_marshals[$lang_num]?></a></li>
								</ul>
							</li>
							<li class="subitem"><a href="#" title=""><span><?=$pas_protocol[$lang_num]?></span></a>
								<ul class="submenu">
									<li class="subfirst"><a href="<?=$path_members?><?=$content?>pas_protocol.php" title=""><?=$pas_accoutrements[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_protocol.php" title=""><?=$pas_opening[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_protocol.php" title=""><?=$pas_bouts[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_protocol.php" title=""><?=$pas_closing[$lang_num]?></a></li>
								</ul>
							</li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_.php" title=""><?=$pas_victory[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_.php" title=""><?=$pas_rules[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_.php" title=""><?=$pas_harness[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_.php" title=""><?=$pas_arms[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_.php" title=""><?=$pas_videos[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>pas_.php" title=""><?=$pas_references[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$trial[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>trial_.php" title=""><?=$trial_on[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$unarmoured[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>unarmoured_.php" title=""><?=$unarmoured_on[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>past_.php" title=""><?=$past_tourneys[$lang_num]?></a></li>
				</ul>
			</li>

			<li class="topmenu"><a href="#" title="" <?=$style_resources?>><span>&nbsp;&nbsp;<?=$resources[$lang_num]?>&nbsp;&nbsp;</span></a>
				<ul class="submenu">
					<li class="subfirst"><a href="<?=$path_members?><?=$content?>res_calendar.php?MNU=R" title=""><?=$res_calendar[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>res_gallery.php" title=""><?=$res_gallery[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>res_video.php" title=""><?=$res_video[$lang_num]?></a></li>
					<li class="subitem"><a href="https://www.facebook.com/groups/AEMMA.1998/" title="" target="_blank"><?=$res_facebook[$lang_num]?></a></li>
					<li class="subitem"><a href="http://mediawiki.aemma.org/index.php?title=Special:UserLogin" title="" target="_blank"><?=$res_wiki[$lang_num]?></a></li>
					<li class="subitem"><a href="https://www.youtube.com/user/AEMMAchannel" title="" target="_blank"><?=$res_youtube[$lang_num]?></a></li>
					<li class="subitem"><a href="#" title=""><span><?=$res_heraldry[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="http://www.heraldry.ca/content/heraldry_what_is_heraldry.php" target="_blank" title=""><?=$what_is_heraldry[$lang_num]?></a></li>
							<li class="subitem"><a href="http://www.heraldry.ca/content/heraldry_misconceptions.php" target="_blank" title=""><?=$her_misconceptions[$lang_num]?></a></li>
							<li class="subitem"><a href="http://www.heraldry.ca/content/heraldry_history.php" target="_blank" title=""><?=$her_history[$lang_num]?></a></li>
							<li class="subitem"><a href="http://www.heraldry.ca/content/resources_recommended.php" target="_blank" title=""><?=$her_books[$lang_num]?></a></li>
							<li class="subitem"><a href="http://www.heraldry.ca/main.php?pg=l3" title="" target="_blank"><?=$her_forums[$lang_num]?></a></li>
							<li class="subitem"><a href="http://www.heraldry.ca" target="_blank" title="" target="_blank"><?=$rhsc[$lang_num]?></a></li>
							<li class="subitem"><a href="https://www.facebook.com/groups/royalheraldrysocietyofcanada" title="" target="_blank"><?=$rhsc_facebook[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$online_library_mem[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_root?>content/library_startPage.php?MA=1" title=""><?=$overview[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_root?>onlineResources/library_11c.php?MA=1" title=""><?=$eleventh[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_root?>onlineResources/library_15c.php?MA=1" title=""><?=$fifteenth[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_root?>onlineResources/library_16c.php?MA=1" title=""><?=$sixteenth[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_root?>onlineResources/library_17c.php?MA=1" title=""><?=$seventeeth[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_root?>onlineResources/library_18c.php?MA=1" title=""><?=$eighteenth[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_root?>onlineResources/library_19c.php?MA=1" title=""><?=$nineteenth[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_root?>onlineResources/library_20c.php?MA=1" title=""><?=$twentieth[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_root?>onlineResources/library_21c.php?MA=1" title=""><?=$twentyfirst[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$links[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>location.php" title=""><?=$links_arms[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>location.php" title=""><?=$links_arms_historical[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>location.php" title=""><?=$links_archery_supplies[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>location.php" title=""><?=$links_assoc[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>location.php" title=""><?=$links_heraldry[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>location.php" title=""><?=$links_wma[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>location.php" title=""><?=$links_museums[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>location.php" title=""><?=$links_re_enact[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>location.php" title=""><?=$links_stage[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>location.php" title=""><?=$links_smiths[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>members_roll.php" title=""><?=$armoury[$lang_num]?></a></li>
					<li class="subitem"><a href="#" title=""><span><?=$members[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>listing_by_rank.php?RNK=1" title=""><?=$mem_novices[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>listing_by_rank.php?RNK=2" title=""><?=$mem_scholars[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>listing_by_rank.php?RNK=3" title=""><?=$mem_free_scholars[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>listing_by_rank.php?RNK=4" title=""><?=$mem_provosts[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>listing_by_rank.php?RNK=77" title=""><?=$mem_honourary[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>listing_by_rank.php?MS=10" title=""><?=$mem_archery[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$mem_toronto[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$mem_guelph[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$mem_digby[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$mem_stratford[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$mem_halifax[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="<?=$path_dbase?>ChangePW.php?AIMS=3" title=""><?=$changePW[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>glossary.php" title=""><?=$glossary[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>arms_armour_collections.php" title=""><?=$collections[$lang_num]?></a></li>
					<li class="subitem"><a href="#" title=""><span><?=$articles[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>aemma_articles.php" title=""><?=$articles_AEMMA[$lang_num]?></a></li>
							<li class="subitem"><a href="http://jmanly.ejmas.com" title="" target="_blank"><?=$articles_JMA[$lang_num]?></a></li>
							<li class="subitem"><a href="http://jwma.ejmas.com" title="" target="_blank"><?=$articles_JWMA[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>articles/use_of_force/use_of_force.php" title=""><?=$force[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>AEMMA_publications.php" title=""><?=$publications_AEMMA[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$book_list[$lang_num]?></a></li>
					<li class="subitem"><a href="#" title=""><span><?=$online_works[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="#" title=""><span><?=$online_works_treatises[$lang_num]?></span></a>
								<ul class="submenu">
									<li class="subfirst"><a href="<?=$path_members?><?=$content?>lib_.php" title=""><?=$online_works_fiore[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>lib_.php" title=""><?=$online_works_fiores_world[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>lib_.php" title=""><?=$online_works_free_scholar[$lang_num]?></a></li>
								</ul>
							</li>
							<li class="subitem"><a href="#" title=""><span><?=$online_books[$lang_num]?></span></a>
								<ul class="submenu">
									<li class="subfirst"><a href="<?=$path_members?><?=$content?>lib_.php" title=""><?=$online_dictionaries[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>lib_.php" title=""><?=$online_crusades[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>lib_.php" title=""><?=$online_chaucer[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>lib_.php" title=""><?=$online_archery[$lang_num]?></a></li>
								</ul>
							</li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>lib_.php" title=""><?=$online_video[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>lib_.php" title=""><?=$online_educational[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>lib_.php" title=""><?=$online_training[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>lib_.php" title=""><?=$online_armour_chest[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>lib_.php" title=""><?=$online_shield_template[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>lib_.php" title=""><?=$online_gambeson_pattern[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>lib_.php" title=""><?=$online_pells[$lang_num]?></a></li>
						</ul>
					</li>
				</ul>
			</li>
<?php
if ($_SESSION['RoleID'] > 1)	// if the user's security privilege/level is greater than "1", i.e. is a commander or above, enable the admin menu and possibly, AIMS menu	
	{
?>
			<li class="topmenu"><a href="#" title="" <?=$style_admin?>><span>&nbsp;&nbsp;<?=$admin_menu[$lang_num]?>&nbsp;&nbsp;</span></a>
				<ul class="submenu">
	<!--				<li class="subfirst"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_library_dbase[$lang_num]?></a></li>-->
					<li class="subfirst"><a href="#" title=""><span><?=$admin_administration[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_code[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_constitution[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_exec_contacts[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_disclaimer[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_documentation[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_paraphernalia[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_privacy[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_rules[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$admin_resources[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_price_list[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_swag_sources[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$admin_tourney[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_tourney_procession[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_tourney_tree_arms[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_tourney_weapons_rack[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_tourney_protocols[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_tourney_banquet[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_tourney_flyer[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$admin_judicial_duels[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_jd_overview[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_jd_pricing[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_jd_payout[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_jd_checklist[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_jd_lists_config[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_jd_helm_stand[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_jd_rack[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$admin_school_pres[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_school_overview[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_school_pricing[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_school_payout[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_school_checklist[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_school_testimonials[$lang_num]?></a></li>
						</ul>
					</li>

					<li class="subitem"><a href="#" title=""><span><?=$admin_archive[$lang_num]?>&nbsp;&nbsp;</span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?>archive/archive_updates.php" title=""><?=$admin_arch_web_updates[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_arch_affiliates[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_arch_demos[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_arch_presentations[$lang_num]?></a></li>
							<li class="subitem"><a href="#" title=""><span><?=$admin_arch_fechtkunst[$lang_num]?></span></a>
								<ul class="submenu">
									<li class="subfirst"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_arch_fechtkunst_history[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_arch_fechtkunst_masters[$lang_num]?></a></li>
								</ul>
							</li>
							<li class="subitem"><a href="<?=$path_members?>archive/archive_professional_relationships.php" title=""><?=$admin_arch_prof_relationships[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?>archive/archive_academic_advisors.php" title=""><?=$admin_arch_prof_academic_advisors[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?>archive/archive_fencing_advisors.php" title=""><?=$admin_arch_fencing_advisors[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?>archive/archive_patron.php" title=""><?=$admin_arch_patron[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?>archive/archive_research_associate.php" title=""><?=$admin_arch_research_associates[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_arch_internal_projects[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$admin_arch_events_presentations[$lang_num]?></a></li>
							<li class="subitem"><a href="#" title=""><span><?=$admin_arch_guestbooks[$lang_num]?></span></a>
								<ul class="submenu">
									<li class="subfirst"><a href="<?=$path_members?>archive/archive_guestbook.php?YR=99&SPN=1998 - 1999" title=""><?=$admin_arch_guestbooks_1999[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?>archive/archive_guestbook.php?YR=01&SPN=2000 - 2001" title=""><?=$admin_arch_guestbooks_2001[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?>archive/archive_guestbook.php?YR=03&SPN=2002 - 2003" title=""><?=$admin_arch_guestbooks_2003[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?>archive/archive_guestbook.php?YR=05&SPN=2004 - 2005" title=""><?=$admin_arch_guestbooks_2005[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?>archive/archive_guestbook.php?YR=07&SPN=2006 - 2007" title=""><?=$admin_arch_guestbooks_2007[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?>archive/archive_guestbook.php?YR=09&SPN=2008 - 2009" title=""><?=$admin_arch_guestbooks_2009[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?>archive/archive_guestbook.php?YR=10&SPN=2010 - 2011" title=""><?=$admin_arch_guestbooks_2010[$lang_num]?></a></li>
								</ul>
							</li>
						</ul>
					</li>
<?php
	if ($aims <> 1)
		{
?>
					<li class="subitem"><a href="<?=$path_members?><?=$content?>admin_login_AIMS.php" title=""><?=$admin_AIMS[$lang_num]?></a></li>
				</ul>
			</li>
<?php
		}
	elseif ($aims == 1)
		{
?>
				</ul>
			</li>

			<li class="topmenu"><a href="#" title="" <?=$style_AIMS?>><span>&nbsp;&nbsp;<?=$AIMS[$lang_num]?>&nbsp;&nbsp;</span></a>
				<ul class="submenu">
					<li class="subfirst"><a href="<?=$path_dbase?>AIMS_home_page.php" title=""><?=$aims_home[$lang_num]?></a></li>
					<li class="subitem"><a href="#" title=""><span><?=$aims_members_admin[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_dbase?>Members_list.php" title=""><?=$aims_members_list[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_dbase?>Members_show.php?STATE=Create" title=""><?=$aims_add_new_member[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_dbase?>Members_username.php" title=""><?=$aims_add_update_username[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_dbase?>Members_search.php" title=""><?=$aims_search[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$online_library[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_dbase?>library_Main.php" title=""><?=$online_library_main[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_dbase?>library_Members_list.php" title=""><?=$online_library_update[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$online_library_add[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_dbase?>library_Report_logs.php" title=""><?=$online_library_logs[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$aims_dbase_reports[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$aims_reports[$lang_num]?></a>
								<ul class="submenu">
									<li class="subfirst"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_reports_members_listing_by_status[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_reports_members_stats_status[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_reports_members_listing_by_rank[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_reports_members_stats_rank[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_reports_members_listing_by_mem_year[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_dbase?>rep_armigerous_members.php" title=""><?=$dbase_reports_members_armigerous[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_reports_members_position[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_reports_members_chapter[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_reports_members_listing_custom[$lang_num]?></a></li>
								</ul>
							</li>
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>.php" title=""><?=$aims_admin_reports[$lang_num]?></a>
								<ul class="submenu">
									<li class="subfirst"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_reports_admin_equip_members[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_reports_admin_accoutrements_AEMMA[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_reports_admin_suppliers[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_reports_admin_regalia[$lang_num]?></a></li>
									<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_reports_admin_swag[$lang_num]?></a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$aims_dbase_functions[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_functions_labels[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_functions_emails[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_functions_directory[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_functions_sources[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_functions_inventory[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_functions_chapters[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_members?><?=$content?>#" title=""><?=$dbase_functions_fees[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path_dbase?>dbase_functions_postit.php" title=""><?=$dbase_functions_postit[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="<?=$path_dbase?>Logout.php?AIMS=1" title=""><?=$aims_logout[$lang_num]?></a></li>
				</ul>
			</li>
<?php
		} // end elseif ($aims == 1)
	} // end if ($_SESSION['RoleID'] > 1)
?>
			<li class="topmenu"><a href="#"><img src="<?=$path_dbase?>images/icons/<?=$network_icon?>" height="30" style="cursor:help;margin-top:-7px;margin-left:3px;" alt="" title="<?=$network_title?>" /><img src="<?=$path_dbase?>images/icons/<?=$database_icon?>" height="30" style="cursor:help;margin-top:-7px;margin-left:3px;" alt="" title="<?=$database_title?>" /></a></li>
			<li class="topmenu_logged_in" style="padding-top:10px;color:white;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;cursor:help;" title="<?=$dbase_logged_in_title[$lang_num]?>">&nbsp;&nbsp;<?=$logged_in?>&nbsp;<?=$_SESSION['UserID']?>&nbsp;&nbsp;</li>
			<li class="toplast_seclvl" style="padding-top:10px;color:white;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;cursor:help;" title="<?=$dbase_seclvl_title[$lang_num]?>">&nbsp;&nbsp;SL:&nbsp;<?=$_SESSION['RoleID']?>&nbsp;&nbsp;</li>
		</ul>
	</nav>
gged_in?>&nbsp;<?=$_SESSION['UserID']?>&nbsp;&nbsp;</li>
			<li class="toplast_seclvl" style="padding-top:10px;color:white;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;cursor:help;" title="<?=$dbase_seclvl_title[$lang_num]?>">&nbsp;&nbsp;SL:&nbsp;<?=$_SESSION['RoleID']?>&nbsp;&nbsp;</li>
		</ul>
	</nav>
