<?php
// 	Program: 	members_only_header.php
//	Description: 	This is the common header for the web pages for the AEMMA. Variables are assigned values by the calling scripts and
//			the various underlying pages.
//
//	2016 ------------------
//	may 20:	disabled the loading of calibrifont.css as this is now redundant
//		- inserted quanslimfont.css inline to reduce another call to the server to load up the file, and therefore, improve loading performance
//		- also inserted "async" in the javascript (sub_fadeslideshow.js), to allow asynchronous loading preventing this from blocking the load until the script is fully loaded
//	may 25: introduced a javascript which will only include the fadeslideshow scripts if the screen width > 480 pixels
//  2019 ------------------
//  jan 25: standardized path names
//
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1.0, width=device-width">
  <meta name="keywords" content="medieval swordsmanship, HEMA, medieval swordsmanship, broad blade sword, sword, sword, rapier, sword fighting, full contact, sword fighting, full contact, AEMMA, A.E.M.M.A., armour, armor, combat, sparring,  Talhoffer, Hans Talhoffer, fechtbuch, DiGrassi, Giacomo DiGrassi, defense, full contact, spada, arte of defense, claymore, swordmaster, swordplay, swordmanship, swordsmanship, sword, Toronto, Talhoffer, Hans Talhoffer, fechtbuch, sword master, medieval, martial arts, George Silver, Silver, Vincentio Saviolo, Saviolo, Fiore de Liberi, de Liberi, Talhoffer, Hans Talhoffer, fechtbuch, HEMA, Hutton, Charles Studer, Studer, Jakob Sutor, Sutor, Camillo Agrippa, Agrippa, Vincentio Saviolo, Saviolo, Alfred Hutton, Hutton, I.33, dusak, buckler, degen, spada, longsword, swordplay, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordplay, swordsmanship, Marrozo, sabre, Knftliches Fechtbuch, Knftliches, medieval swordsmanship, langen schwerdt, schwerdt, rapier, dagger, Das Solothurner Fechtbuch, Solothurner, spadone, spear, pollaxe, ringen, shield, schlager, spadroon, pallas armas, halb schwert, broadsword, fechtbuch, au plesaunce, ootrance, appellant, defendant, reihenfolgen, folgen, scholler, free scholler, provost, maister, maestro, Hounskull Basinet, Heaume, Klappvisier, Sallet, Bevor, live steel, live steel, live steel, live steel, live steel, live steel, live steel, live steel, live steel, live steel, Longbow, long ,bow, archery, archerie, arc, archers, warbow, toxophilite, crecy, poitiers, flight, clout, roving, target, bearing, arrowheads, archery, archers" />
  <meta name="description" content="The mission of AEMMA is to resurrect the combat skills, philosophies and principles of an accomplished European Medieval martial artist and to achieve a state of which would be consistent with that of a 14th century warrior in both technology and ideal." />
  <title><?=$title[$lang_num]?></title>
  <!-- do not include javascript for the banner if the screen width is <= 480, it'll save on loading -->
  <script>
	if (screen && screen.width > 480) {
  		document.write('<script type="text/javascript" src="<?=$path_members?>js-bin/fadeslideshow_query_min.js"><\/script>');
		  document.write('<script type="text/javascript" src="<?=$path_members?>js-bin/fadeslideshow.js"><\/script>');
	}
  </script>
   <script>
	/* special fonts for AEMMA */
	.QuanSlimBold {font-family:QuanSlimBold;font-weight:normal;font-style:normal;}
	.QuanSlimBook {font-family:QuanSlimBook;font-weight:normal;font-style:normal;}
	.QuanSlimLight {font-family:QuanSlimLight;font-weight:normal;font-style:normal;}
   </script>
  <link rel="stylesheet" type="text/css" href="<?=$path_members?>css/MyFontsWebfontsKit.css" media="all" />
  <link rel="stylesheet" type="text/css" href="<?=$path_members?>css/members_only.css" />
  <link rel="stylesheet" type="text/css" href="<?=$path_members?>css/dbase_ResponsiveSlides.css" />
  <link rel="stylesheet" type="text/css" href="<?=$path_members?>css/dbase_responsive_media.css" />
  <link rel="stylesheet" type="text/css" id="style-css" href="<?=$path_members?>css/members_only_menu.css" media="all" />
  <link href="<?=$path_members?>images/shield.ico" rel="shortcut icon" />

