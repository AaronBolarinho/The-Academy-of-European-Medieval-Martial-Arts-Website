<?php
//
// members_only_menu_labels.php == created: March 23, 2016
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
//	2019 ------------------
//	jan 25:	standardized path names
//
// English menu labels ------------
$home[0] = "home";
$logout[0] = "logout";
$AEMMA[0] = "about&nbsp;&nbsp;AEMMA";
	$academy[0] = "about&nbsp;&nbsp;AEMMA";
		$about[0] = "about the Academy";
		$arms[0] = "the Academy's armorial bearings";
		$history[0] = "history of AEMMA (detailed)";
		$rules[0] = "rules of the salle d'armes";
		$contact[0] = "contact AEMMA";
		$disclaimer[0] = "disclaimer";
		$privacy[0] = "privacy & security";
	$governance[0] = "governance";
		$exec[0] = "executive committee";
		$instructors[0] = "instructors";
	$chapters[0] = "AEMMA Chapters";
		$guelph[0] = "AEMMA Guelph, ON";
		$digby[0] = "AEMMA Digby, NS";
		$stratford[0] = "AEMMA Stratford, ON";
		$ottawa[0] = "AEMMA Ottawa, ON";
	$about_contributing_member[0] = "contributing member";
	$fees[0] = "training fees";
	$schedule[0] = "training schedule";
	$locations[0] = "locations of the Academies";
		$location_toronto[0] = "the salle d'armes in Toronto";
		$location_guelph[0] = "the school in Guelph, ON";
		$location_digby[0] = "the school in Digby, NS";
		$location_stratford[0] = "the school in Stratford, ON";
		$location_ottawa[0] = "the school in Ottawa, ON";
	$calendar[0] = "calendar of training and events";
	$faqs[0] = "<img src='".$path_members."images/icons/faqs.gif' class='fade' alt='' />&nbsp;frequently asked questions";
	$news[0] = "<img src='".$path_members."images/icons/news.png' class='fade' alt='' width='18' />&nbsp;news & press releases";
	$facebook[0] = "<img src='".$path_members."images/icons/facebook.gif' class='fade' alt='' />&nbsp;visit us on facebook";
$armizare[0] = "l`arte dell`armizare";
	$italian_art[0] = "Italian art of arms";
	$fiore[0] = "Maestro Fiore dei Liberi";
	$sources[0] = "medieval codices of the art";
		$pd[0] = "Pisani-Dossi Ms.";
		$getty[0] = "Ms. Ludwig XV13 (codex 'GETTY')";
		$morgan[0] = "Ms. M.383 (codex 'MORGAN')";
		$bnf[0] = "Mss. LATIN 11269 (BNF)";
		$LXXIV[0] = "Codices LXXXIV and CX";
$training[0] = "training";
	$intro[0] = "<img src='".$path_members."images/icons/new.png' alt='' width='20' />introduction to armizare";
	$styles[0] = "<img src='".$path_members."images/icons/swordShield.gif' alt='' width='20' />styles of combat training";
		$grappling[0] = "<img src='".$path_members."images/training/grappling.jpg' alt='' width='20' />grappling <i>(abrazare)</i>";
		$dagger[0] = "<img src='".$path_members."images/training/dagger.jpg' alt='' width='20' />dagger <i>(daga)</i>";
		$sword[0] = "<img src='".$path_members."images/training/sword.jpg' alt='' width='20' />sword <i>(spada)</i>";
		$poleweapon[0] = "<img src='".$path_members."images/training/poleweapon.jpg' alt='' width='20' />spear & poleaxe <i>(lanza & azza)</i>";
		$armoured[0] = "<img src='".$path_members."images/training/armoured.jpg' alt='' width='20' />armoured <i>(arme)</i>";
		$sword_buckler[0] = "<img src='".$path_members."images/training/sword_buckler.jpg' alt='' width='20' />sword & buckler";
		$rapier[0] = "<img src='".$path_members."images/training/rapier.jpg' alt='' width='20' />Italian rapier";
	$ranks[0] = "<img src='".$path_members."images/icons/rank.png' alt='' width='20' />ranks @ AEMMA";
		$rnk_novice[0] = "<img src='".$path_members."images/icons/R-recruit.png' alt='' width='20' />recruit";
		$rnk_scholler[0] = "<img src='".$path_members."images/icons/S-scholler.png' alt='' width='20' />scholler";
		$rnk_free_scholler[0] = "<img src='".$path_members."images/icons/F-freeScholler.png' alt='' width='20' />free scholler";
		$rnk_provost[0] = "<img src='".$path_members."images/icons/P-provost.png' alt='' width='20' />provost";
		$rnk_maestro[0] = "<img src='".$path_members."images/icons/M-maestro.png' alt='' width='20' />maestro";
	$equipment[0] = "<img src='".$path_members."images/icons/shoe.png' alt='' width='20' />equipment requirements";
		$equip_novice[0] = "recruit gear";
		$equip_scholar[0] = "scholar gear";
		$equip_armoured[0] = "armoured kit";
		$equip_garments[0] = "period garments";
	$curriculum[0] = "<img src='".$path_members."images/icons/training.png' alt='' width='20' />curriculum";
		$curr_novice[0] = "recruit training";
		$curr_scholar[0] = "scholar training";
	$private[0] = "<img src='".$path_members."images/icons/private.png' alt='' width='20' />private lessons";
	$archery[0] = "<img src='".$path_members."images/icons/archery.jpg' alt='' width='20' />traditional archery";
	$pas[0] = "<i>pas d'armes</i>";
		$pas_undertaking[0] = "undertaking a <i>pas d'armes</i>";
		$pas_planning[0] = "planning the event";
		$pas_inspections[0] = "armour inspections";
		$pas_officials[0] = "<i>pas d'armes</i> officials";
			$pas_off_patron[0] = "patron(s) of the <i>pas d'armes</i>";
			$pas_off_king[0] = "king or arms";
			$pas_off_procession[0] = "the procession herald";
			$pas_off_heralds[0] = "the heralds";
			$pas_off_squires[0] = "the squires";
			$pas_off_marshals[0] = "the marshals";
		$pas_protocol[0] = "protocols and ceremony";
			$pas_accoutrements[0] = "combatant's accoutrements";
			$pas_opening[0] = "opening the <i>pas d'armes</i>";
			$pas_bouts[0] = "setup of the bouts";
			$pas_closing[0] = "closing the <i>pas d'armes</i>";
		$pas_victory[0] = "victory conditions";
		$pas_rules[0] = "rules of engagement";
		$pas_harness[0] = "harness requirements";
		$pas_arms[0] = "arms requirements";
		$pas_videos[0] = "selected videos";
		$pas_references[0] = "references";
	$trial[0] = "trial by combat";
		$trial_on[0] = "on the trial by combat";
	$unarmoured[0] = "unarmoured tournament";
		$unarmoured_on[0] = "on the unarmoured tourney";
	$past_tourneys[0] = "past <i>pas d'armes</i>";
$resources[0] = "resources";
	$res_calendar[0] = "<img src='".$path_members."images/icons/Calendar-icon.png' width='20' class='fade' alt='' />calendar";
	$res_gallery[0] = "<img src='".$path_members."images/icons/camera_15h.gif' width='20' class='fade' alt='' />gallery";
	$res_video[0] = "<!--<img src='".$path_members."images/icons/videos_icon.png' width='20' class='fade' alt='' />-->video library";
	$res_facebook[0] = "<img src='".$path_members."images/icons/facebook.gif' width='20' class='fade' alt='' />AEMMA facebook";
	$res_wiki[0] = "<img src='".$path_members."images/icons/logo_wiki_60.png' width='20' class='fade' alt='' />AEMMA Wiki";
	$res_youtube[0] = "<img src='".$path_members."images/icons/youTube.jpg' width='20' class='fade' alt='' />AEMMA Youtube Channel";
	$res_heraldry[0] = "<img src='".$path_members."images/icons/rhsc_24.gif' width='20' class='fade' alt='' />heraldry";
		$what_is_heraldry[0] = "<img src='".$path_members."images/icons/rhsc_24.gif' width='20' class='fade' alt='' />what is heraldry?";
		$her_misconceptions[0] = "<img src='".$path_members."images/icons/rhsc_24.gif' width='20' class='fade' alt='' />common misconceptions";
		$her_history[0] = "<img src='".$path_members."images/icons/rhsc_24.gif' width='20' class='fade' alt='' />history of heraldry";
		$her_books[0] = "<img src='".$path_members."images/icons/rhsc_24.gif' width='20' class='fade' alt='' />recommended books";
		$her_forums[0] = "<img src='".$path_members."images/icons/rhsc_24.gif' width='20' class='fade' alt='' />heraldry forums";
		$rhsc[0] = "<img src='".$path_members."images/icons/globe.png' class='fade' width='20' alt='' />Royal Heraldry Society of Canada";
		$rhsc_facebook[0] = "<img src='".$path_members."images/icons/facebook.gif' width='20' class='fade' alt='' />RHSC facebook";
	$online_library_mem[0] = "<img src='".$path_members."images/icons/book_24.gif' width='20' class='fade' alt='' />online library";
		$overview[0] = "<img src='".$path_members."images/letters/number_0.png' alt='' width='20' />overview and usage";
		$eleventh[0] = "<img src='".$path_members."images/letters/number_11.png' alt='' width='20' />11-14th centuries";
		$fifteenth[0] = "<img src='".$path_members."images/letters/number_15.png' alt='' width='20' />15th century";
		$sixteenth[0] = "<img src='".$path_members."images/letters/number_16.png' alt='' width='20' />16th century";
		$seventeeth[0] = "<img src='".$path_members."images/letters/number_17.png' alt='' width='20' />17th century";
		$eighteenth[0] = "<img src='".$path_members."images/letters/number_18.png' alt='' width='20' />18th century";
		$nineteenth[0] = "<img src='".$path_members."images/letters/number_19.png' alt='' width='20' />19th century";
		$twentieth[0] = "<img src='".$path_members."images/letters/number_20.png' alt='' width='20' />20th century";
		$twentyfirst[0] = "<img src='".$path_members."images/letters/number_21.png' alt='' width='20' />21st century";
	$links[0] = "<img src='".$path_members."images/icons/globe.png' width='20' class='fade' alt='' />links to resources";
		$links_arms[0] = "arms & armour sources";
		$links_arms_historical[0] = "armour (historical reproductions)";
		$links_archery_supplies[0] = "archery supplies";
		$links_assoc[0] = "associations, federations";
		$links_heraldry[0] = "heraldry resources";
		$links_wma[0] = "WMA schools";
		$links_museums[0] = "museums & academic inst.";
		$links_re_enact[0] = "re-enactment groups";
		$links_stage[0] = "stage combat";
		$links_smiths[0] = "sword smithies & distributors";
	$armoury[0] = "<img src='".$path_members."images/icons/aemma_shield.png' width='20' class='fade' alt='' />roll of arms";
	$members[0] = "<img src='".$path_members."images/icons/user.png' width='20' class='fade' alt='' />members&nbsp;&nbsp;listings";
		$mem_novices[0] = "<img src='".$path_members."images/icons/R-recruit.png' alt='' width='20' />recruits";
		$mem_scholars[0] = "<img src='".$path_members."images/icons/S-scholler.png' alt='' width='20' />scholars";
		$mem_free_scholars[0] = "<img src='".$path_members."images/icons/F-freeScholler.png' alt='' width='20' />free scholars";
		$mem_provosts[0] = "<img src='".$path_members."images/icons/P-provost.png' alt='' width='20' />provosts";
		$mem_honourary[0] = "<img src='".$path_members."images/icons/H-honorary.png' alt='' width='20' />honourary";
		$mem_archery[0] = "traditional archery";
		$mem_toronto[0] = "members, Toronto salle";
		$mem_guelph[0] = "members, Guelph Chapter";
		$mem_digby[0] = "members, Digby Chapter";
		$mem_stratford[0] = "members, Stratford Chapter";
		$mem_halifax[0] = "members, Ottawa Chapter";
	$glossary[0] = "<img src='".$path_members."images/icons/dictionary.png' width='20' class='fade' alt='' />glossary of terms";
	$changePW[0] = "<img src='".$path_members."images/icons/security.png' width='20' class='fade' alt='' />change your password";
	$collections[0] = "<img src='".$path_members."images/icons/helm.png' width='20' class='fade' alt='' />arms and armour collections";
	$articles[0] = "<img src='".$path_members."images/icons/news-icon.png' width='20' class='fade' alt='' />articles";
		$articles_AEMMA[0] = "<img src='".$path_members."images/icons/aemma_shield.png' width='20' class='fade' alt='' />articles by AEMMA";
		$articles_JMA[0] = "<img src='".$path_members."images/logos/logo_EJMAS.jpg' width='20' class='fade' alt='' />Jrnl of Manly Arts";
		$articles_JWMA[0] = "<img src='".$path_members."images/logos/logo_EJMAS.jpg' width='20' class='fade' alt='' />Jrnl of Western Martial Art";
		$force[0] = "<img src='".$path_members."images/icons/useofforce.png' width='20' class='fade' alt='' />use of force and the law";
	$publications_AEMMA[0] = "<img src='".$path_members."images/icons/book.png' width='20' class='fade' alt='' />publications by AEMMA";
	$book_list[0] = "booklist of references";
	$online_works[0] = "online references, treatises and works";
		$online_works_treatises[0] = "historical treatises and works";
			$online_works_fiore[0] = "material related to Fiore dei Liberi";
			$online_works_fiores_world[0] = "Fiore's World";
			$online_works_free_scholar[0] = "free scholar submissions";
		$online_books[0] = "reference books and resources";
			$online_dictionaries[0] = "dictionaries";
			$online_crusades[0] = "the Crusades";
			$online_chaucer[0] = "Geoffrey Chaucer";
			$online_archery[0] = "medieval archery";
		$online_video[0] = "Flos Duallatorum video";
		$online_educational[0] = "educational resources";
		$online_training[0] = "training resources";
		$online_armour_chest[0] = "plan for a 6-board armour chest";
		$online_shield_template[0] = "plan for blank heraldic shield";
		$online_gambeson_pattern[0] = "gambeson pattern";
		$online_pells[0] = "pell designs";
$admin_menu[0] = "admin";
	$admin_administration[0] = "administration";
		$admin_code[0] = "code of ethics";
		$admin_constitution[0] = "constitution";
		$admin_exec_contacts[0] = "executive contacts";
		$admin_disclaimer[0] = "disclaimer";
		$admin_documentation[0] = "documentation";
		$admin_paraphernalia[0] = "paraphernalia";
		$admin_privacy[0] = "privacy policy";
		$admin_rules[0] = "rules of the salle d'armes";
	$admin_resources[0] = "resources";
		$admin_price_list[0] = "AEMMA wear price list";
		$admin_swag_sources[0] = "swag sources";
	$admin_tourney[0] = "tournament stuff";
		$admin_tourney_procession[0] = "tourney & opening procession";
		$admin_tourney_tree_arms[0] = "tree of arms design";
		$admin_tourney_weapons_rack[0] = "weapons rack design";
		$admin_tourney_protocols[0] = "protocols & procedures guidelines";
		$admin_tourney_banquet[0] = "tourney & banquet post-mortem (2008)";
		$admin_tourney_flyer[0] = "tourney announcement flyer (2010)";
	$admin_judicial_duels[0] = "judicial duels stuff";
		$admin_jd_overview[0] = "overview";
		$admin_jd_pricing[0] = "pricing";
		$admin_jd_payout[0] = "judicial duel payout";
		$admin_jd_checklist[0] = "checklist";
		$admin_jd_lists_config[0] = "lists configuration";
		$admin_jd_helm_stand[0] = "helm stand";
		$admin_jd_rack[0] = "weapons rack";
	$admin_school_pres[0] = "school presentations stuff";
		$admin_school_overview[0] = "overview";
		$admin_school_pricing[0] = "pricing";
		$admin_school_payout[0] = "presentation payout";
		$admin_school_checklist[0] = "checklist";
		$admin_school_testimonials[0] = "testimonials";
	$admin_archive[0] = "<img src='".$path_members."images/icons/archive.png'  width='20' class='fade' alt='' />&nbsp;archive";
		$admin_arch_web_updates[0] = "<img src='".$path_members."images/icons/logs.png' width='20' class='fade' alt='' />&nbsp;website updates log";
		$admin_arch_affiliates[0] = "affiliation program";
		$admin_arch_demos[0] = "demonstration: 14th c. trial by combat";
		$admin_arch_presentations[0] = "presentation: arms and armour";
		$admin_arch_fechtkunst[0] = "fechtk&uuml;nst";
			$admin_arch_fechtkunst_history[0] = "history and background";
			$admin_arch_fechtkunst_masters[0] = "German masters";
		$admin_arch_prof_relationships[0] = "<img src='".$path_members."images/icons/user.png' width='20' class='fade' alt='' />&nbsp;professional relationships";
		$admin_arch_prof_academic_advisors[0] = "<img src='".$path_members."images/icons/educational1.png' width='20' class='fade' alt='' />&nbsp;academic advisors";
		$admin_arch_fencing_advisors[0] = "<img src='".$path_members."images/icons/fencing.png' width='20' class='fade' alt='' />&nbsp;fencing advisors";
		$admin_arch_patron[0] = "<img src='".$path_members."images/icons/patron.jpg' width='20' class='fade' alt='' />&nbsp;patron of the <i>pas d'armes</i>";
		$admin_arch_research_associates[0] = "<img src='".$path_members."images/icons/microscope.png' width='20' class='fade' alt='' />&nbsp;research associates";
		$admin_arch_internal_projects[0] = "internal projects";
		$admin_arch_events_presentations[0] = "events, presentations and media";
		$admin_arch_guestbooks[0] = "<img src='".$path_members."images/icons/notepad_pencil.png' width='20' class='fade' alt='' />&nbsp;guestbooks";
			$admin_arch_guestbooks_1999[0] = "1998 - 1999";
			$admin_arch_guestbooks_2001[0] = "2000 - 2001";
			$admin_arch_guestbooks_2003[0] = "2002 - 2003";
			$admin_arch_guestbooks_2005[0] = "2004 - 2005";
			$admin_arch_guestbooks_2007[0] = "2006 - 2007";
			$admin_arch_guestbooks_2009[0] = "2008 - 2009";
			$admin_arch_guestbooks_2010[0] = "2010 - 2011";
	$admin_AIMS[0] = "<img src='".$path_members."images/icons/AIMS.png' width='20' alt='' class='fade' />AEMMA Info Management System (AIMS)";
	$dbase_logged_in_title[0] = "This indicates the username presently accessing this member's only area.  All resources accessed during this session are logged in the system for security and monitoring purposes.";

if ($_SESSION['RoleID'] == 1)
	{ $level = "You are presently logged in as a Member level."; }
elseif ($_SESSION['RoleID'] == 2)
	{ $level = "You are presently logged in as a Admin level, meaning you have accesses to generate various database reports provided by this level of access."; }
elseif ($_SESSION['RoleID'] == 3)
	{ $level = "You are presently logged in as a Executive level, meaning you have access to generate reports and view membership records."; }
elseif ($_SESSION['RoleID'] == 4)
	{ $level = "You are presently logged in as an Chapter Administrator level, meaning you have access to generate reports and view all membership records, and update/change chapter members."; }
elseif ($_SESSION['RoleID'] == 5)
	{ $level = "You are presently logged in as an SysAdmin level, meaning you have access to all reports and view/change/delete membership records."; }
else	{ $level = "You are presently logged in as a DBA and are god!"; }
	$dbase_seclvl_title[0] = "This indicates the security level (SL) of your login session. ". $level;

$AIMS[0] = "AIMS";
	$aims_home[0] = "<img src='".$path_members."images/icons/home.png' width='20' alt='' class='fade' />AIMS home page";
	$aims_members_admin[0] = "<img src='".$path_members."images/icons/admin.png' width='20' alt='' class='fade' />membership admin";
		$aims_members_list[0] = "<img src='".$path_members."images/icons/users.png' width='20' alt='' class='fade' />update / view any member record";
		$aims_add_new_member[0] = "<img src='".$path_members."images/icons/add_record.png' width='20' alt='' class='fade' />add new member record";
		$aims_add_update_username[0] = "<img src='".$path_members."images/icons/security.png' width='20' alt='' class='fade' />add / update username or password";
		$aims_search[0] = "<img src='".$path_members."images/icons/search.gif' height='20' alt='' class='fade' /> search member records";
	$online_library[0] = "<img src='".$path_members."images/icons/books4.png' height='20' alt='' class='fade' /> online library admin";
		$online_library_main[0] = "<img src='".$path_members."images/icons/books.png' height='20' alt='' class='fade' />library quick stats";
		$online_library_update[0] = "<img src='".$path_members."images/icons/users.png' height='20' alt='' class='fade' />update/view library records";
		$online_library_add[0] = "<img src='".$path_members."images/icons/add_record.png' height='20' alt='' class='fade' />add new library record";
		$online_library_logs[0] = "<img src='".$path_members."images/icons/logs.png' height='20' alt='' class='fade' />library access logs";
	$aims_dbase_reports[0] = "<img src='".$path_members."images/icons/reports1.png' width='20' alt='' class='fade' />reports";
		$aims_reports[0] = "members reports";
			$dbase_reports_members_listing_by_status[0] = "list by status";
			$dbase_reports_members_stats_status[0] = "stats by status";
			$dbase_reports_members_listing_by_rank[0] = "list by rank ";
			$dbase_reports_members_stats_rank[0] = "stats by rank";
			$dbase_reports_members_listing_by_mem_year[0] = "list by membership year";
			$dbase_reports_members_armigerous[0] = "members who are armigerous";
			$dbase_reports_members_position[0] = "list by positions";
			$dbase_reports_members_chapter[0] = "list by chapter";
			$dbase_reports_members_listing_custom[0] = "customized list";
		$aims_admin_reports[0] = "administrative reports";
			$dbase_reports_admin_equip_members[0] = "members equipment";
			$dbase_reports_admin_accoutrements_AEMMA[0] = "accoutrements possessed by AEMMA";
			$dbase_reports_admin_suppliers[0] = "regalia, equipment and swag suppliers";
			$dbase_reports_admin_regalia[0] = "regalia inventory";
			$dbase_reports_admin_swag[0] = "swag inventory";
	$aims_dbase_functions[0] = "<img src='".$path_members."images/icons/functions.png' width='20' alt='' class='fade' />functions / utilities";
		$dbase_functions_labels[0] = "export data for address labels";
		$dbase_functions_emails[0] = "export members emails";
		$dbase_functions_directory[0] = "membership list (directory)";
		$dbase_functions_sources[0] = "add / modify / delete sources";
		$dbase_functions_inventory[0] = "add / modify / delete inventory";
		$dbase_functions_chapters[0] = "add / modify / delete chapters";
		$dbase_functions_fees[0] = "<img src='".$path_members."images/icons/fees.png' width='20' alt='' class='fade' />update training fees";
		$dbase_functions_postit[0] = "<img src='".$path_members."images/icons/note.gif' style='vertical-align:middle;width:20px;margin-left:3px;cursor:help;' alt='' />enable / disable Post-it note";
	$aims_logout[0] = "<img src='".$path_members."images/icons/logout.png' width='20' alt='' class='fade' />logout of AIMS";

// French menu labels ------------
?>
cons/add_record.png' height='20' alt='' class='fade' />add new library record";
		$online_library_logs[0] = "<img src='".$path_members."images/icons/logs.png' height='20' alt='' class='fade' />library access logs";
	$aims_dbase_reports[0] = "<img src='".$path_members."images/icons/reports1.png' width='20' alt='' class='fade' />reports";
		$aims_reports[0] = "members reports";
			$dbase_reports_members_listing_by_status[0] = "list by status";
			$dbase_reports_members_stats_status[0] = "stats by status";
			$dbase_reports_members_listing_by_rank[0] = "list by rank ";
			$dbase_reports_members_stats_rank[0] = "stats by rank";
			$dbase_reports_members_listing_by_mem_year[0] = "list by membership year";
			$dbase_reports_members_armigerous[0] = "members who are armigerous";
			$dbase_reports_members_position[0] = "list by positions";
			$dbase_reports_members_chapter[0] = "list by chapter";
			$dbase_reports_members_listing_custom[0] = "customized list";
		$aims_admin_reports[0] = "administrative reports";
			$dbase_reports_admin_equip_members[0] = "members equipment";
			$dbase_reports_admin_accoutrements_AEMMA[0] = "accoutrements possessed by AEMMA";
			$dbase_reports_admin_suppliers[0] = "regalia, equipment and swag suppliers";
			$dbase_reports_admin_regalia[0] = "regalia inventory";
			$dbase_reports_admin_swag[0] = "swag inventory";
	$aims_dbase_functions[0] = "<img src='".$path_members."images/icons/functions.png' width='20' alt='' class='fade' />functions / utilities";
		$dbase_functions_labels[0] = "export data for address labels";
		$dbase_functions_emails[0] = "export members emails";
		$dbase_functions_directory[0] = "membership list (directory)";
		$dbase_functions_sources[0] = "add / modify / delete sources";
		$dbase_functions_inventory[0] = "add / modify / delete inventory";
		$dbase_functions_chapters[0] = "add / modify / delete chapters";
		$dbase_functions_fees[0] = "<img src='".$path_members."images/icons/fees.png' width='20' alt='' class='fade' />update training fees";
		$dbase_functions_postit[0] = "<img src='".$path_members."images/icons/note.gif' style='vertical-align:middle;width:20px;margin-left:3px;cursor:help;' alt='' />enable / disable Post-it note";
	$aims_logout[0] = "<img src='".$path_members."images/icons/logout.png' width='20' alt='' class='fade' />logout of AIMS";

// French menu labels ------------
?>
