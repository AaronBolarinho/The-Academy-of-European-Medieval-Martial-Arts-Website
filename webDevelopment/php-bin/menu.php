<?php
// 	Program: 	menu.php
//	Description: 	The default menu navigation bar for the AEMMA appearing on all pages with differences 
//			made by variables, created January 2016.
//	Author:		David M. Cvet
//
//	2016 ------------------
//
?>
<script type="text/javascript">
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
include "menu_labels.php";
$style			= "style=\"background-color:#c3383d;\"";		// the background colour of the menu item when selected  (redish - colour from arms)
//$style			= "style=\"background-color:#3c5f4b;\"";		// the background colour of the menu item when selected (greenish - colour from arms)
$style_home 		= "";
$style_AEMMA 		= "";
$style_armizare		= "";
$style_training		= "";
$style_resources	= "";
$style_web		= "";
$style_members		= "";
$style_contact		= "";
$style_lang		= "";
switch($menu_selected)
	{
	case "home":
		$style_home = $style;
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
	case "contact":
		$style_contact = $style;
		break;
	case "members":
		$style_members = $style;
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
			<li class="topfirst"><a href="<?=$path?>main.php?LANG=<?=$lang?>" title="" <?=$style_home?>>&nbsp;&nbsp;<?=$home[$lang_num]?>&nbsp;&nbsp;</a></li>
			<li class="topmenu"><a href="#" title="" <?=$style_AEMMA?>><span>&nbsp;&nbsp;<?=$AEMMA[$lang_num]?>&nbsp;&nbsp;</span></a>
				<ul class="submenu">
					<li class="subfirst"><a href="#"><span><?=$academy[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path?><?=$content?>about_about.php" ><?=$about[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>about_arms.php" ><?=$arms[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>about_history.php" ><?=$history[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>about_contact.php" ><?=$contact[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>about_disclaimer.php" ><?=$disclaimer[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>about_privacy.php" ><?=$privacy[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#"><span><?=$governance[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path?><?=$content?>about_exec.php" ><?=$exec[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>about_instructors.php" ><?=$instructors[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" ><span><?=$chapters[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="https://www.facebook.com/profile.php?id=100011751480417" title="" target="_blank"><?=$guelph[$lang_num]?></a></li>
							<li class="subitem"><a href="https://www.facebook.com/groups/AEMMANS/" title="" target="_blank"><?=$digby[$lang_num]?></a></li>
							<li class="subitem"><a href="" title=""><?=$stratford[$lang_num]?></a></li>
							<li class="subitem"><a href="https://www.facebook.com/AEMMAOttawa/" title="" target="_blank"><?=$ottawa[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="<?=$path?><?=$content?>about_fees.php" title=""><?=$fees[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path?><?=$content?>about_schedule.php" title=""><?=$schedule[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path?><?=$content?>about_location.php" title=""><?=$location[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path?><?=$content?>about_photos.php" title=""><?=$photos[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path?><?=$content?>about_visit.php" title=""><?=$guest[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path?><?=$content?>about_new.php" title=""><?=$new[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path?><?=$content?>about_faqs.php?M=a" title=""><?=$faqs[$lang_num]?></a></li>
<!--					<li class="subitem"><a href="<?=$path?><?=$content?>about_news.php" title=""><?=$news[$lang_num]?></a></li>-->
					<li class="subitem"><a href="https://www.facebook.com/groups/AEMMA.1998/" title="" target="_blank"><?=$facebook[$lang_num]?></a></li>
				</ul>
			</li>
										
			<li class="topmenu"><a href="#" title="" <?=$style_armizare?>><span>&nbsp;&nbsp;<?=$armizare[$lang_num]?>&nbsp;&nbsp;</span></a>
				<ul class="submenu">
					<li class="subfirst"><a href="<?=$path?><?=$content?>arte_armizare.php" title=""><?=$italian_art[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path?><?=$content?>arte_fiore_dei_liberi.php" title=""><?=$fiore[$lang_num]?></a></li>
				</ul>
			</li>
			<li class="topmenu"><a href="#" title="" <?=$style_training?>><span>&nbsp;&nbsp;<?=$training[$lang_num]?>&nbsp;&nbsp;</span></a>
				<ul class="submenu">
					<li class="subfirst"><a href="<?=$path?><?=$content?>about_new.php?MNU=training" title=""><?=$intro[$lang_num]?></a></li>
					<li class="subitem"><a href="#" title=""><span><?=$styles[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path?><?=$content?>trng_grappling.php" title=""><?=$grappling[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>trng_dagger.php" title=""><?=$dagger[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>trng_sword.php" title=""><?=$sword[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>trng_pole_weapons.php" title=""><?=$poleweapon[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>trng_armoured.php" title=""><?=$armoured[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>trng_sword_buckler.php" title=""><?=$sword_buckler[$lang_num]?></a></li>
<!--							<li class="subitem"><a href="<?=$path?><?=$content?>trng_rapier.php" title=""><?=$rapier[$lang_num]?></a></li>-->
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$ranks[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path?><?=$content?>rnk_intro.php" title=""><?=$rnk_intro[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>rnk_recruit.php" title=""><?=$rnk_recruit[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>rnk_scholler.php" title=""><?=$rnk_scholler[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>rnk_free_scholler.php" title=""><?=$rnk_free_scholler[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>rnk_provost.php" title=""><?=$rnk_provost[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?><?=$content?>rnk_maestro.php" title=""><?=$rnk_maestro[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$equipment[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path?><?=$content?>equip_recruit.php" title=""><?=$equip_recruit[$lang_num]?></a></li>
<!--							<li class="subitem"><a href="<?=$path?><?=$content?>equip_scholar.php" title=""><?=$equip_scholar[$lang_num]?></a></li>-->
						</ul>
					</li>
					<li class="subitem"><a href="<?=$path?><?=$content?>trng_private_lessons.php" title=""><?=$private[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path?><?=$content?>trng_archery.php" title=""><?=$archery[$lang_num]?></a></li>
				</ul>
			</li>

			<li class="topmenu"><a href="#" title="" <?=$style_resources?>><span>&nbsp;&nbsp;<?=$resources[$lang_num]?>&nbsp;&nbsp;</span></a>
				<ul class="submenu">
					<li class="subfirst"><a href="http://armizare.blogspot.ca/" title="" target="_blank"><?=$res_blog[$lang_num]?></a></li>
					<li class="subitem"><a href="https://www.facebook.com/groups/AEMMA.1998/" title="" target="_blank"><?=$res_facebook[$lang_num]?></a></li>
					<li class="subitem"><a href="<?=$path?><?=$content?>about_faqs.php?M=r" title=""><?=$res_faqs[$lang_num]?></a></li>
					<li class="subitem"><a href="https://www.facebook.com/aemmaarchery/" title="" target="_blank"><?=$res_archery[$lang_num]?></a></li>
					<li class="subitem"><a href="https://www.youtube.com/user/AEMMAchannel" title="" target="_blank"><?=$res_youtube[$lang_num]?></a></li>
					<li class="subitem"><a href="#" title=""><span><?=$res_heraldry[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="http://www.heraldry.ca/content/heraldry_what_is_heraldry.php" title="" target="_blank"><?=$what_is_heraldry[$lang_num]?></a></li>
							<li class="subitem"><a href="http://www.heraldry.ca/content/heraldry_misconceptions.php" title="" target="_blank"><?=$her_misconceptions[$lang_num]?></a></li>
							<li class="subitem"><a href="http://www.heraldry.ca/content/heraldry_history.php" title="" target="_blank"><?=$her_history[$lang_num]?></a></li>
							<li class="subitem"><a href="http://www.heraldry.ca/content/resources_recommended.php" title="" target="_blank"><?=$her_books[$lang_num]?></a></li>
							<!--<li class="subitem"><a href="http://www.heraldry.ca/main.php?pg=l3" title="" target="_blank"><?=$her_forums[$lang_num]?></a></li>-->
							<li class="subitem"><a href="http://www.heraldry.ca" title="" target="_blank"><?=$rhsc[$lang_num]?></a></li>
							<li class="subitem"><a href="https://www.facebook.com/groups/royalheraldrysocietyofcanada" title="" target="_blank"><?=$rhsc_facebook[$lang_num]?></a></li>
						</ul>
					</li>
					<li class="subitem"><a href="#" title=""><span><?=$online_library[$lang_num]?></span></a>
						<ul class="submenu">
							<li class="subfirst"><a href="<?=$path?><?=$content?>library_startPage.php" title=""><?=$overview[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?>onlineResources/library_11c.php" title=""><?=$eleventh[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?>onlineResources/library_15c.php" title=""><?=$fifteenth[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?>onlineResources/library_16c.php" title=""><?=$sixteenth[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?>onlineResources/library_17c.php" title=""><?=$seventeeth[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?>onlineResources/library_18c.php" title=""><?=$eighteenth[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?>onlineResources/library_19c.php" title=""><?=$nineteenth[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?>onlineResources/library_20c.php" title=""><?=$twentieth[$lang_num]?></a></li>
							<li class="subitem"><a href="<?=$path?>onlineResources/library_21c.php" title=""><?=$twentyfirst[$lang_num]?></a></li>
						</ul>
					</li>
				</ul>
			</li>

			<li class="topmenu"><a href="<?=$path?><?=$content?>about_contact.php?MNU=contact" title="" <?=$style_contact?>>&nbsp;&nbsp;<?=$contact[$lang_num]?>&nbsp;&nbsp;</a></li>

			<li class="topmenu"><a href="#" title="" <?=$style_members?>><span>&nbsp;&nbsp;<?=$members_only[$lang_num]?>&nbsp;&nbsp;</span></a>
				<ul class="submenu">
					<li class="subfirst"><a href="<?=$path?><?=$content?>members_only_login.php" title=""><?=$members_only_login[$lang_num]?></a></li>
				</ul>
			</li>
<?php
if ($lang_num == 0)
	{ $alt_lang_num = 1; $alt_lang = "fr"; }
else	{ $alt_lang_num = 0; $alt_lang = "en"; }
?>
			<li class="toplast"><a href="javascript:change_lang('<?=$current_pgm?>','<?=$lang?>','<?=$path?>','<?=$content?>','<?=$menu_selected?>')" title="" <?=$style_lang?>><img src="<?=$path?>images/menu_bits/<?=$language_selection_image[$alt_lang_num]?>" height="30" style="cursor:pointer;margin-top:-7px;margin-left:3px;" alt="" title="<?=$language_title[$alt_lang_num]?>" class="fade" /></a></li>
		</ul>
	</nav>
