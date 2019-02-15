<?php
// 	Program: 	header.php
//	Description: 	This is the common header for the web pages for the AEMMA. Variables are assigned values by the calling scripts and
//			the various underlying pages.
//
//	2016 ------------------
//	may 20:	inserted QuanSlimBold fonts in-line in order to reduce another call to the server to load up the calibrifont.css file, and therefore, improve loading performance
//		- also inserted "async" in the javascript (sub_fadeslideshow.js), to allow asynchronous loading preventing this from blocking the load until the script is fully loaded
//	may 25: introduced a javascript which will only include the fadeslideshow scripts if the screen width > 480 pixels
//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114302675-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-114302675-1');
</script>
<!-- end Google Analytics -->
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="initial-scale=1.0, width=device-width" />
  <meta name="keywords" content="medieval swordsmanship, HEMA, medieval swordsmanship, broad blade sword, sword, sword, rapier, sword fighting, full contact, sword fighting, full contact, AEMMA, A.E.M.M.A., armour, armor, combat, sparring,  Talhoffer, Hans Talhoffer, fechtbuch, DiGrassi, Giacomo DiGrassi, defense, full contact, spada, arte of defense, claymore, swordmaster, swordplay, swordmanship, swordsmanship, sword, Toronto, Talhoffer, Hans Talhoffer, fechtbuch, sword master, medieval, martial arts, George Silver, Silver, Vincentio Saviolo, Saviolo, Fiore de Liberi, de Liberi, Talhoffer, Hans Talhoffer, fechtbuch, HEMA, Hutton, Charles Studer, Studer, Jakob Sutor, Sutor, Camillo Agrippa, Agrippa, Vincentio Saviolo, Saviolo, Alfred Hutton, Hutton, I.33, dusak, buckler, degen, spada, longsword, swordplay, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordplay, swordsmanship, Marrozo, sabre, Knftliches Fechtbuch, Knftliches, medieval swordsmanship, langen schwerdt, schwerdt, rapier, dagger, Das Solothurner Fechtbuch, Solothurner, spadone, spear, pollaxe, ringen, shield, schlager, spadroon, pallas armas, halb schwert, broadsword, fechtbuch, au plesaunce, ootrance, appellant, defendant, reihenfolgen, folgen, scholler, free scholler, provost, maister, maestro, Hounskull Basinet, Heaume, Klappvisier, Sallet, Bevor, live steel, live steel, live steel, live steel, live steel, live steel, live steel, live steel, live steel, live steel, Longbow, long ,bow, archery, archerie, arc, archers, warbow, toxophilite, crecy, poitiers, flight, clout, roving, target, bearing, arrowheads, archery, archers" />
  <meta name="description" content="The mission of AEMMA is to resurrect the combat skills, philosophies and principles of an accomplished European Medieval martial artist and to achieve a state of which would be consistent with that of a 14th century warrior in both technology and ideal." />
  <title><?=$title[$lang_num]?></title>
  <!-- do not include javascript for the banner if the screen width is <= 480, it'll save on loading -->
  <script type="text/javascript">
	if (screen && screen.width > 480) {
  		document.write('<script type="text/javascript" src="<?=$path?>js-bin/fadeslideshow_query_min.js"><\/script>');
		document.write('<script type="text/javascript" src="<?=$path?>js-bin/fadeslideshow.js"><\/script>');
	}
  </script>

<!--  <script type="text/javascript" src="<?=$path?>js-bin/fadeslideshow_query_min.js"></script>-->
<!--  <link rel="stylesheet" type="text/css" href="<?=$path?>css/quanslimfont.css" media="all">-->
  <style>
	/* special fonts for AEMMA */
	.QuanSlimBold {font-family:QuanSlimBold;font-weight:normal;font-style:normal;}
	.QuanSlimBook {font-family:QuanSlimBook;font-weight:normal;font-style:normal;}
	.QuanSlimLight {font-family:QuanSlimLight;font-weight:normal;font-style:normal;}
  </style>
<!--  <link rel="stylesheet" type="text/css" href="<?=$path?>css/calibrifont.css" media="all">-->
  <link rel="stylesheet" type="text/css" href="<?=$path?>css/MyFontsWebfontsKit.css" />
  <link rel="stylesheet" type="text/css" href="<?=$path?>css/aemma_v2.css" />
  <link rel="stylesheet" type="text/css" id="style-css" href="<?=$path?>css/menu.css" media="all" />
  <link href="<?=$path?>images/shield.ico" rel="shortcut icon" />
<!--  <link rel="stylesheet" id="style-css" href="<?=$path?>css/ResponsiveSlides.css" type="text/css" media="all">-->
